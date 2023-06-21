<script src="<?= STATIC_FRONT_ASSETS ?>js/form-validator.min.js"></script>
<style>
    .redBorderClass {
        border: 1px solid red !important;
    }
</style>
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Enroll Now</h2>
            <p>Fill the form for Enrollment</p>
        </div>
    </div>
</div>
<section class="contact-area ptb-100">
    <div class="container">
        <div class="contact-inner">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">
                        <form class="defaultform enrollmentForm" method="post">
                            <h5>Course Details</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Course <span class="text-danger">*</span></label>
                                        <select name="course" class="form-control validatefield">
                                            <option value="">Select a course</option>
                                            <?php if (isset($courses) && !empty($courses)) {
                                                foreach ($courses as $course) {
                                                    if (isset($course['title']) && !empty($course['title'])) {
                                            ?>
                                                        <option value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Class Timing <span class="text-danger">*</span></label>
                                        <select name="shift" class="form-control validatefield">
                                            <option value="">Select a shift</option>
                                            <option value="morning">Morning</option>
                                            <option value="evening">Evening</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5>Personal Details</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control validatefield" data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" data-error="Please enter your email address" class="form-control validatefield">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone_number" data-error="Please enter your phone number" class="form-control validatefield">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <h5>Educational Details <small>(Your latest qualification)</small></h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Exam Passed/Degree Name <span class="text-danger">*</span></label>
                                        <input type="text" name="degree" class="form-control validatefield" data-error="Please enter your Degree">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name of School/Board <span class="text-danger">*</span></label>
                                        <input type="text" name="board" class="form-control validatefield" data-error="Please enter name of School/Board">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control validatefield" data-error="Please enter Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Year of Passing <span class="text-danger">*</span></label>
                                        <input type="text" name="passing_year" class="form-control validatefield" data-error="Please enter Year of passing">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Grade/Marks <span class="text-danger">*</span></label>
                                        <input type="text" name="marks" class="form-control validatefield" data-error="Please enter % of marks/grade">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Career Plan</label>
                                        <textarea name="futureplan" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <button type="button" class="default-btn enrollment_submit"><i class="bx bxs-paper-plane"></i>Submit</button>
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

<script type="text/javascript">
    (function($) {
        "use strict"; // Start of use strict
        $(".contact_submittt").validator().on("submit", function(event) {
            if (event.isDefaultPrevented()) {
                // handle the invalid form...
                formError();
                submitMSG(false, "Did you fill in the form properly?");
            } else {
                alert("asfdsadfsadf");
                // everything looks good!
                event.preventDefault();
                submitForm();
            }
        });

        $('.enrollment_submit').on('click', function(event) {
            event.preventDefault();
            if (validateForm()) {
                var form_data = $('.enrollmentForm').serialize();
                $.ajax({
                    type: 'post',
                    url: "<?= BASE_URL . 'front/enrollmentSubmit' ?>",
                    data: form_data,
                    success: function(data) {
                        if (data.status == true) {
                            swal("Success!", "Your request has been sent.", "success");
                            location.reload();
                        } else {
                            swal("Error!", "Some Error Occur While processing request, We will fix it soon", "error");
                        }
                    }
                });
            }
        });

        function submitMSG(valid, msg) {
            if (valid) {
                var msgClasses = "h4 text-left tada animated text-success";
            } else {
                var msgClasses = "h4 text-left text-danger";
            }
            $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
        }
    }(jQuery)); // End of use strict

    var previousText = $('.submit_button').html();
    $(document).on({
        ajaxStart: function() {
            $(".submit_button").html('<i class="fa fa-circle-o-notch fa-spin" style="top: 28%; color: white;"></i> Processing...');
        },
        ajaxStop: function() {
            $(".submit_button").html(previousText);
        },
        ajaxError: function() {
            $(".submit_button").html(previousText);
        }
    });
    var validate_input = "input[type=text],input[type=radio],input[type=email],input[type=password], select";

    function validateremove() {
        $(validate_input).off('keyup').keyup(function() {
            $("body").find('.redBorderClass').removeClass("redBorderClass");
        });
        $(validate_input).off('click').click(function() {
            $("body").find('.redBorderClass').removeClass("redBorderClass");
        });
    }
    validateremove();

    function validateForm() {
        var isValid = true;
        $('.validatefield').each(function() {
            if ($(this).val() === '') {
                $(this).addClass("redBorderClass");
                isValid = false;
            } else
                $(this).removeClass("redBorderClass");
        });
        return isValid;
    }
</script>