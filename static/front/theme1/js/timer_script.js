window.addEventListener('load', function () {
    // console.log("Windows loading");

    //Getting dashboard  (Checking if we are in dashboard or not)
    var dashboard = document.getElementById("page_timer");
    //Start button
    var start_button = document.getElementById("start_button");
    //Stop button
    var stop_button = document.getElementById("timer_submit");
    //Break Start button
    var startBreak = document.getElementById("start_break");
    //Break End button
    var stopBreak = document.getElementById("end_break");
    //timer
    var hour = document.getElementById("hour");
    var mint = document.getElementById("min");
    var secd = document.getElementById("sec");

    if (dashboard != null && localStorage.getItem('start_button') == null) {
        // alert("in Dashboard and start button not clicked");
        $("#start_button").removeAttr("style").show();
        //Declaring variable
        var hr = 0;
        var min = 0;
        var sec = 0;
    } else if ((dashboard != null && localStorage.getItem('start_button') != null)) {
        // alert("in Dashboard and start button clicked");
        $("#start_button").hide();
        $("#start_break, #timer_submit").removeAttr("style").show();
    }
    
    if ((dashboard != null && localStorage.getItem('start_break') != null)) {
        // alert("in Dashboard and start break button clicked");
        $("#start_break").hide();
        $("#end_break, #timer_submit").removeAttr("style").show();
    } else if ((dashboard != null && localStorage.getItem('end_break') != null)) {
        // alert("in Dashboard and end break button clicked");
        $("#end_break").hide();
        $("#start_break, #timer_submit").removeAttr("style").show();
    }

    if (start_button) {
        start_button.addEventListener('click', function () {
            var std_id = $('.std_id').val();
            var base_url = $(this).attr('data-url');
            $.ajax({
                type:'post',
                url: base_url+'front/startInterval',
                data:{std_id:std_id},
                success:function(data){
                    if(data.status==true){
                        // console.log('start button working');
                        localStorage.setItem('start_button', 'clicked');
                        $("#start_button").hide();
                        $("#start_break, #timer_submit").removeAttr("style").show();
                        var total_time = document.getElementById("total_time");
                        if (total_time) {
                            total_time.innerHTML = "Counting...";
                        }
                        timerCycle();
                        swal("Success!",data.error_msg,"success");
                    }else{
                        swal("Error!",data.error_msg,"error");
                    }
                }
            });
        });
    }

    if (startBreak) {
        startBreak.addEventListener('click', function () {
            var base_url = $(this).attr('data-url');
            $.ajax({
                type:'post',
                url: base_url+'front/startBreak',
                data: '',
                success:function(data){
                    if(data.status==true){
                        // console.log('Break button working');
                        if (localStorage.getItem('end_break') != null) {
                            localStorage.removeItem('end_break');
                        }
                        localStorage.setItem('start_break', 'clicked');
                        $("#start_break").hide();
                        $("#end_break").removeAttr("style").show();
                        var total_time = document.getElementById("total_time");
                        if (total_time) {
                            total_time.innerHTML = hr + ':' + min + ':' + sec;
                        }
                        clearTimeout(cycle);
                        swal("Success!",data.error_msg,"success");
                    }else{
                        swal("Error!",data.error_msg,"error");
                    }
                }
            });
        });
    }

    if (stopBreak) {
        stopBreak.addEventListener('click', function () {
            var base_url = $(this).attr('data-url');
            $.ajax({
                type:'post',
                url: base_url+'front/stopBreak',
                data: '',
                success:function(data){
                    if(data.status==true){
                        // console.log('Stop break button working');
                        sec = localStorage.getItem('sec');
                        min = localStorage.getItem('min');
                        hr = localStorage.getItem('hr');
                        localStorage.removeItem('start_break');
                        localStorage.setItem('end_break', 'clicked');
                        $("#end_break").hide();
                        $("#start_break").removeAttr("style").show();
                        var total_time = document.getElementById("total_time");
                        if (total_time) {
                            total_time.innerHTML = "Counting...";
                        }
                        timerCycle();
                        swal("Success!",data.error_msg,"success");
                    }else{
                        swal("Error!",data.error_msg,"error");
                    }
                }
            });
        });
    }

    if (stop_button) {
        stop_button.addEventListener('click', function () {
            var base_url = $(this).attr('data-url');
            $.ajax({
                type:'post',
                url: base_url+'front/stopInterval',
                data: '',
                success:function(data){
                    if(data.status==true){
                        // console.log('Stop button working');
                        localStorage.clear();
                        hour.innerHTML = '00';
                        mint.innerHTML = '00';
                        secd.innerHTML = '00';
                        var total_time = document.getElementById("total_time");
                        if (total_time) {
                            total_time.innerHTML = hr + ':' + min + ':' + sec;
                        }
                        clearTimeout(cycle);
                        hr = 0;
                        min = 0;
                        sec = 0;
                        $("#start_break, #end_break, #timer_submit").hide();
                        $("#start_button").show();
                        swal("Success!",data.error_msg,"success");
                    }else{
                        swal("Error!",data.error_msg,"error");
                    }
                }
            });
        });
    }

    //continue timer on other pages
    if (dashboard == null && localStorage.getItem('start_button') != null && localStorage.getItem('start_break') == null) {
        sec = localStorage.getItem('sec');
        min = localStorage.getItem('min');
        hr = localStorage.getItem('hr');
        timerCycle();
        //continue timer on coming back Dashboard
    } else if (dashboard != null && localStorage.getItem('start_button') != null && localStorage.getItem('start_break') == null) {
        sec = localStorage.getItem('sec');
        min = localStorage.getItem('min');
        hr = localStorage.getItem('hr');
        if (total_time) {
            total_time.innerHTML = "Counting...";
        }
        timerCycle();
    }

    //continue timer on other pages
    if (dashboard == null && localStorage.getItem('start_break') != null) {
        clearTimeout(cycle);
        //continue timer on coming back Dashboard
    } else if (dashboard != null && localStorage.getItem('start_break') != null) {
        sec = localStorage.getItem('sec');
        min = localStorage.getItem('min');
        hr = localStorage.getItem('hr');
        if (total_time) {
            total_time.innerHTML = hr + ':' + min + ':' + sec;
        }
        clearTimeout(cycle);
    }

    function timerCycle() {
        sec = parseInt(sec);
        min = parseInt(min);
        hr = parseInt(hr);
        sec = sec + 1;
        if (sec == 60) {
            min = min + 1;
            sec = 0;
        }
        if (min == 60) {
            hr = hr + 1;
            min = 0;
            sec = 0;
        }
        if (sec < 10 || sec == 0) {
            sec = '0' + sec;
        }
        if (min < 10 || min == 0) {
            min = '0' + min;
        }
        if (hr < 10 || hr == 0) {
            hr = '0' + hr;
        }

        localStorage.setItem('hr', hr);
        localStorage.setItem('min', min);
        localStorage.setItem('sec', sec);
        // console.log(timer);
        // console.log(timer.innerHTML);
        hour.innerHTML = hr;
        mint.innerHTML = min;
        secd.innerHTML = sec;

        // if (dashboard == null && localStorage.getItem('start_button') != null) {
        //     var side_timer = document.getElementById('time_title');
        //     if (side_timer) {
        //         handling other counter changeing URL     [Put Where you want to show your counter after URL change]
        //         hour.innerHTML = hr;
        //         min.innerHTML = min;
        //         sec.innerHTML = sec;
        //     }
        // } else {
        // }
        cycle = setTimeout(timerCycle, 1000);
    }

    //AJax funtion to save the data
    // function saveData(hr, min, sec) {
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'POST',
    //         url: '/timer',
    //         data: {
    //             'hr': hr,
    //             'min': min,
    //             'sec': sec,
    //         },
    //         success: function (data) {
    //             document.getElementById("time_msg").innerHTML = data.msg;
    //             $("#time_msg").slideDown(1000);
    //             $("#time_msg").delay(3000).slideUp(1000);
    //         },
    //         error: function (data, textStatus, errorThrown) {
    //             console.log("Error:");
    //             console.log(data);
    //         },
    //     });
    // }

})
