<div class="row">
    <div class="col-lg-10 col-xs-10 col-sm-10">
        <div class="form-group">
            <label for="txtBuildingName" class="control-label col-md-4">
                Name <span class="required" style="color:red">*</span>
            </label>
            <div class="col-md-8">
                <input type="text" name="currency" value="" id="" class="form-control validatefield">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", ".currency", function (event) {
        event.preventDefault();
        var currency = $('input[name="currency"]').val();
        if(currencyvalidation()) {
            $.ajax({
                type: 'POST',
                url: "<?php echo ADMIN_BASE_URL ?>outlet/set_currency",
                data: {'currency': currency},
                async: false,
                success: function (test_body) {
                    var test_desc = test_body;
                    $('#setcurrency').modal('show')
                    $("#setcurrency .modal-body").html(test_desc);
                }
            });
        }
    });
    $('.currencyvalidation').submit(function(e){
        e.preventDefault();
        var self = this;
        var id = $(this).attr('data-id');
        var txtEmail = $("#txtEmail").val();
        if(validateForm()) {
            $.ajax({
                type: 'POST',
                url: "<?php echo ADMIN_BASE_URL ?>outlet/check_duplicate_email",
                data: {'id': id, 'email': txtEmail},
                async: false,
                success: function (data) {
                    if(data.response == true){
                        self.submit();
                    }
                    else
                        $('#txtEmail').css("border", "1px solid red");
            }});
        }
    });
    function currencyvalidation() {
        var isValid = true;
        $('.validatefield').each(function() {
            if ( $(this).val() === '') {
                $(this).css("border", "1px solid red");
                isValid = false;
            }
            else 
                $(this).css("border", "1px solid #dde6e9");
        });
        return isValid;
    }
</script>