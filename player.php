<html>
<head>
<meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<?php
if (isset($_POST['Play']))
{
exec("sudo /home/pi/Desktop/Sveglia_mattutina/play_this.sh"); 
}
if (isset($_POST['Kill']))
{
exec("sudo /home/pi/Desktop/Sveglia_mattutina/killer_alarm_pi.sh"); 
}
?>

<form method="post">
<button class="btn" name="Play">Play</button>&nbsp;
<button class="btn" name="Kill">Kill</button><br><br>
</form> 


</html>
