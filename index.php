<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNRISE AND SUNSET ALARM</title>
    <style>
        .suninfo{
            text-align:center;
            font-weight:bold;
            text-transform:uppercase;
        }
        .center{
            text-align: center;
        }
        .content{
            background:greenyellow; width: 30%; margin:auto;
        }
        .stopbtn{
            background:#ff0000;
        }
        </style>
</head>
<body>
    <h4 class="center">CLOUDWARE TASK 3</h4>
    <h4 class="center">SUNRISE AND SUNSET ALARM</h4>
    <h4 class="center">CURRENT TIME: <span id="timer"></span></h4>
    <audio id="alarm-sound" loop>
        <source src="sound/alarm-rooster.wav" type="audio/mp3">
      </audio>
      <?php
      $time = time();
      // latitude and longtitude for ibadan
      $latitude = 7.376736;
      $longitude = 3.939786;
      $suninfo = date_sun_info($time, $latitude, $longitude);
      //variable for sunrise and sunset main value
      $sunrise = date('H:i',$suninfo['sunrise']);
      $sunset  = date('H:i',$suninfo['sunset']);
      //getting hour of sunrise
      $sunrise_h = date('H',$suninfo['sunrise']);
      $sunset_h  = date('H',$suninfo['sunset']);
      //getting minute of sunrise
      $sunrise_m = date('i',$suninfo['sunrise']);
      $sunset_m = date('i',$suninfo['sunset']);
     //getting meridian of sunrise
     $sunrise_meridian = date('a',$suninfo['sunrise']);
     $sunset_meridian  = date('a',$suninfo['sunset']);
     //converting sunrise hour  to 12 hour 
        if($sunrise_h>12){
            $sunrise_new_h=$sunrise_h-12;
            $new_sunrise=$sunrise_new_h.":".$sunrise_m.":".$sunrise_meridian;
        }
        else{
            $new_sunrise=$sunrise_h.":".$sunrise_m.":".$sunrise_meridian;
        }
        //converting sunset hour  to 12 hour time
        if($sunset_h>12){
            $sunset_new_h=$sunset_h-12;
            $new_sunset=$sunset_new_h.":".$sunset_m.":".$sunset_meridian;
        }
        else{
            $new_sunset=$sunset_h.":".$sunset_m.":".$sunset_meridian;
        }
      ?>
      <div class="content">
<?php
echo "<p class='suninfo'>IBADAN SUNRISE: ".$new_sunrise."</p>";
echo "<p class='suninfo'>IBADAN SUNSET: ".$new_sunset."</p>";
?>
<script>
    var sunrise="<?php echo $sunrise?>";
    var sunset="<?php echo $sunset?>";
    var now=new Date();
    var timeInterval = setInterval(setAlarm, 1000);
    function setAlarm(){
        now=new Date();
        var current_time=now.getHours()+":"+now.getMinutes();
        if(now.getHours()>12){
            var hour=now.getHours()-12;
        }
        if(now.getHours()>=12){
            var meridian="PM";
        }
        else{
            var meridian="AM";
        }
        document.getElementById("timer").innerHTML = hour+":"+now.getMinutes()+":"+now.getSeconds()+" "+meridian;
       if(current_time==sunrise){
        document.getElementById("sun").innerHTML ="SUNRISE AS RISE";
       var sound = document.getElementById("alarm-sound");
           sound.play();
    }
    if(current_time==sunset){
        document.getElementById("sun").innerHTML ="SUNRISE AS SET";
       var sound = document.getElementById("alarm-sound");
           sound.play();
    }
    }
   function stopAlarm(){
    clearInterval(timeInterval);
    var sound = document.getElementById("alarm-sound");
           sound.pause();
   }
</script>
      </div>
      <h2 class="center" id="sun"></h2>
      <center><button onclick="stopAlarm()" class="stopbtn">STOP ALARM</button></center>
</body>
</html>