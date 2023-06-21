<?php
    $check_session = $this->session->userdata('student_id');
?>
<input type="hidden" class="std_id" value="<?= (isset($check_session) && !empty($check_session)) ? $check_session : '' ?>">
<input type="hidden" id="checkIn_id" value="">

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>demo_01.jpg');">
            </div>
            
            <!-- <div class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="button" id="start" class="clock_btn clock_in active"><span><i class="fa fa-play"></i></span><span>Start</span></button>
                            <button type="button" id="breakStart" class="clock_btn break_start"><span><i class="fa fa-coffee"></i></span><span>Break</span></button>
                            <button type="button" id="breakEnd" class="clock_btn break_end"><span><i class="fa fa-pause"></i></span><span>End Break</span></button>
                            <button type="button" id="stop" class="clock_btn clock_out"><span><i class="fa fa-stop"></i></span><span>Stop</span></button>
                            <h1 class="clockInOut" id="clockInOut"> 00 : 00 : 00 </h1>
                            <h1 class="breakInOut" id="breakInOut"> 00 : 00 : 00 </h1>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <div id="page_timer">
                                <h1 class="text-center">Count Up Timer (Stopwatch) Example</h1>
                                <p class="lead text-center">An easy and tiny count up timer (also called stopwatch) web app built on top of jQuery and HTML5 local storage.</p>
                                <div class="item">
                                    <div class="countup" id="countup1">
                                        <span id="hour" class="timeel hours">00</span>
                                        <span class="timeel timeRefHours">hours</span>
                                        <span id="min" class="timeel minutes">00</span>
                                        <span class="timeel timeRefMinutes">minutes</span>
                                        <span id="sec" class="timeel seconds">00</span>
                                        <span class="timeel timeRefSeconds">seconds</span>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12"> -->
                                            <button class="timer_button clock_in" data-url="<?=BASE_URL?>" id="start_button" style="display: none;"><span><i class="fa fa-play"></i></span><span>Start</span></button>
                                            <button class="timer_button break_start" data-url="<?=BASE_URL?>" id="start_break" style="display: none;"><span><i class="fa fa-coffee"></i></span><span>Break</span></button>
                                            <button class="timer_button break_end" data-url="<?=BASE_URL?>" id="end_break" style="display: none;"><span><i class="fa fa-pause"></i></span><span>End Break</span></button>
                                            <button class="timer_button clock_out" data-url="<?=BASE_URL?>" id="timer_submit" style="display: none;"><span><i class="fa fa-stop"></i></span><span>Stop</span></button>
                                        <!-- </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-auto mx-auto pt-4">
                                            <h1><div id="total_time"></div></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- project js file -->
<script src="<?=STATIC_FRONT_JS?>timer_script.js"></script>
<!-- bootstrap js bundle -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script> -->
<script>
    try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
        return true;
      }).catch(function(e) {
        var carbonScript = document.createElement("script");
        carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
        carbonScript.id = "_carbonads_js";
        document.getElementById("carbon-block").appendChild(carbonScript);
      });
    } catch(error) {
      console.log(error);
    }
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>



<script>
    
    // var timerInterval = null;
    // function startInterval() {
    //     var std_id = $('.std_id').val();
    //     $.ajax({
    //         type:'post',
    //         url:'<?=BASE_URL?>front/startInterval',
    //         data:{std_id:std_id},
    //         success:function(data){
    //             if(data.status==true){
    //                 $(".clock_in").hide();
    //                 $(".break_start, .clock_out").show();
    //                 timerInterval = setInterval(countTimer, 1000);
    //                 var totalSeconds = 0;
    //                 function countTimer() {
    //                     ++totalSeconds;
    //                     var hour = Math.floor(totalSeconds /3600);
    //                     var minute = Math.floor((totalSeconds - hour*3600)/60);
    //                     var seconds = totalSeconds - (hour*3600 + minute*60);
    //                     if(hour < 10)
    //                         hour = "0"+hour;
    //                     if(minute < 10)
    //                         minute = "0"+minute;
    //                     if(seconds < 10)
    //                         seconds = "0"+seconds;
    //                     document.getElementById("clockInOut").innerHTML = hour + " : " + minute + " : " + seconds;
    //                 }
    //                 document.getElementById("checkIn_id").value = new Number(data.data.retrun_id);
    //                 swal("Success!",data.error_msg,"success");
    //             }else{
    //                 swal("Error!",data.error_msg,"error");
    //             }
    //         }
    //     });
    // }

    function stopInterval() {
        // var std_id = $('.std_id').val();
        // var checkIn_id = $('#checkIn_id').val();
        // $.ajax({
        //     type:'post',
        //     url:'<?=BASE_URL?>front/stopInterval',
        //     data:{std_id:std_id,checkIn_id:checkIn_id},
        //     success:function(data){
        //         if(data.status==true){
        //             $(".break_start, .break_end, .clock_out").hide();
        //             $(".clock_in").show();
                    clearInterval(timerInterval);
        //             swal("Success!",data.error_msg,"success");
        //         }else{
        //             swal("Error!",data.error_msg,"error");
        //         }
        //     }
        // });
    }

    // document.getElementById("breakStart").addEventListener("click", startBreak);
    // document.getElementById("breakEnd").addEventListener("click", stopBreak);

    // You'll need a variable to store a reference to the timer
    var breakTimer = null;

    function startBreak() {
        var std_id = $('.std_id').val();
        var checkIn_id = $('#checkIn_id').val();
        $.ajax({
            type:'post',
            url:'<?=BASE_URL?>front/startBreak',
            data:{std_id:std_id,checkIn_id:checkIn_id},
            success:function(data){
                if(data.status==true){
                    $(".break_start, .clock_out, .clockInOut").hide();
                    $(".break_end, .breakInOut").show();
                    var breakTimer = setInterval(countTimer, 1000);
                    var totalSeconds = 0;
                    function countTimer() {
                        ++totalSeconds;
                        var hour = Math.floor(totalSeconds /3600);
                        var minute = Math.floor((totalSeconds - hour*3600)/60);
                        var seconds = totalSeconds - (hour*3600 + minute*60);
                        if(hour < 10)
                            hour = "0"+hour;
                        if(minute < 10)
                            minute = "0"+minute;
                        if(seconds < 10)
                            seconds = "0"+seconds;
                        document.getElementById("breakInOut").innerHTML = hour + " : " + minute + " : " + seconds;
                    }
                    swal("Success!",data.error_msg,"success");
                }else{
                    swal("Error!",data.error_msg,"error");
                }
            }
        });
    }

    function stopBreak() {
        // var std_id = $('.std_id').val();
        // var checkIn_id = $('#checkIn_id').val();
        // $.ajax({
        //     type:'post',
        //     url:'<?=BASE_URL?>front/stopBreak',
        //     data:{std_id:std_id,checkIn_id:checkIn_id},
        //     success:function(data){
        //         if(data.status==true){
        //             $(".break_end, .breakInOut").hide();
        //             $(".break_start, .clock_out, .clockInOut").show();
                    clearInterval(timerInterval);
        //             swal("Success!",data.error_msg,"success");
        //         }else{
        //             swal("Error!",data.error_msg,"error");
        //         }
        //     }
        // });
    }
    
</script>