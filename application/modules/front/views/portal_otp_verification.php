<style>
fieldset {
	border: none;
	margin-bottom: 30px;
}
legend {
	font-size: 0;
}
input[type="number"] {
	width: 4rem;
	height: 4rem;
	font-size: 2rem;
	border: none;
	text-align: center;
	outline: none;
	border-radius: 0.5rem;
	background: linear-gradient(145deg, #e6e6e6, #ffffff);
	box-shadow:  25px 25px 56px #d9d9d9, -25px -25px 56px #ffffff;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
/* Firefox */
input[type=number] {
	-moz-appearance: textfield;
}
</style>
<section class="contact-area ptb-100">
  <div class="container">
    <div class="contact-inner">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="contact-image" data-tilt>
              <img src="<?=STATIC_FRONT_ASSETS?>img/contact.png" alt="image">
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col_form">
          <div class="contact-form">
            <h3>OTP Verification</h3>
            <?php
              if(isset($code) && !empty($code)){
                $code_array = preg_split('#(?<=\d)#i', $code);
              }
            ?>
            <form class="form-horizontal verification_form" method="POST" autocomplete="off" id="emailVerify">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <input type="hidden" class="hdnId" name="email" value="<?=((isset($email) && !empty($email)) ? $email : '')?>">
                  <fieldset name='verification_code' data-number-code-form>
                    <input type="number" min='0' max='9' class="num0" name='number-code-0' data-number-code-input='0' required placeholder="X" value="<?=((isset($code_array['0'])) ? $code_array['0'] : '')?>">
                    <input type="number" min='0' max='9' class="num1" name='number-code-1' data-number-code-input='1' required placeholder="X" value="<?=((isset($code_array['1'])) ? $code_array['1'] : '')?>">
                    <input type="number" min='0' max='9' class="num2" name='number-code-2' data-number-code-input='2' required placeholder="X" value="<?=((isset($code_array['2'])) ? $code_array['2'] : '')?>">
                    <input type="number" min='0' max='9' class="num3" name='number-code-3' data-number-code-input='3' required placeholder="X" value="<?=((isset($code_array['3'])) ? $code_array['3'] : '')?>">
                  </fieldset>
                </div>
                <?php
                  if(isset($verify_err) && !empty($verify_err)){
                      echo'<div class="text-center"><label style="color:red;">'.$verify_err.'</label></div>';
                  }
                ?>
                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn forgot-form-btn"><i class='bx bxs-paper-plane'></i>Verify</button>
                    <div class="clearfix"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Area -->

<script>
  $('.forgot-form-btn').on('click',function(e){
    e.preventDefault();
    var number_code;
    number_code = $('.num0').val();
    number_code += $('.num1').val();
    number_code += $('.num2').val();
    number_code += $('.num3').val();
    var email = $('.hdnId').val();
    self = this;
    $('.submit_button').button('loading');
    $.ajax({
      type:'post',
      url:'<?=BASE_URL . 'front/verify/'?>',
      data:{'number_code':number_code,'email':email},
      success:function(data){
        if(data.status==true){
          window.location.href = '<?=BASE_URL?>portal-genrate-password?nId='+data.data.id;
        }
      },
      error:function(data){
        swal('Error','Incorrect Email, Please enter a registered email!','error');
      }
    })
  })
</script>

<script>
  const numberCodeForm = document.querySelector('[data-number-code-form]');
  const numberCodeInputs = [...numberCodeForm.querySelectorAll('[data-number-code-input]')];

  // Event callbacks
  const handleInput = ({target}) => {
    if (!target.value.length) { return target.value = null; }
    const inputLength = target.value.length;
    let currentIndex = Number(target.dataset.numberCodeInput);
    if (inputLength > 1) {
      const inputValues = target.value.split('');
      inputValues.forEach((value, valueIndex) => {
        const nextValueIndex = currentIndex + valueIndex;
        if (nextValueIndex >= numberCodeInputs.length) { return; }
        numberCodeInputs[nextValueIndex].value = value;
      });
      currentIndex += inputValues.length - 2;
    }
    const nextIndex = currentIndex + 1;
    if(nextIndex < numberCodeInputs.length) {
      numberCodeInputs[nextIndex].focus();
    }
  }

  const handleKeyDown = e => {
    const {code, target} = e;
    const currentIndex = Number(target.dataset.numberCodeInput);
    const previousIndex = currentIndex - 1;
    const nextIndex = currentIndex + 1;
    const hasPreviousIndex = previousIndex >= 0;
    const hasNextIndex = nextIndex <= numberCodeInputs.length - 1
    switch(code) {
      case 'ArrowLeft':
      case 'ArrowUp':
        if (hasPreviousIndex) {
          numberCodeInputs[previousIndex].focus();
        }
        e.preventDefault();
        break;
      case 'ArrowRight':
      case 'ArrowDown':
        if (hasNextIndex) {
          numberCodeInputs[nextIndex].focus();
        }
        e.preventDefault();
        break;
      case 'Backspace':
        if (!e.target.value.length && hasPreviousIndex) {
          numberCodeInputs[previousIndex].value = null;
          numberCodeInputs[previousIndex].focus();
        }
        break;
      default:
        break;
    }
  }

  // Event listeners
  numberCodeForm.addEventListener('input', handleInput);
  numberCodeForm.addEventListener('keydown', handleKeyDown);
</script>