<html>
<head>
<meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<?php
if (isset($_POST['LightON']))
{
echo "<p>Light On </p>";
exec("sudo /home/pi/lighton.py");
}
if (isset($_POST['LightOFF']))
{
echo "<p>Light Off </p>";
exec("sudo /home/pi/lightoff.py");
}
?>

<form method="post">
<button class="btn" name="LightON">Light ON</button>&nbsp;
<button class="btn" name="LightOFF">Light OFF</button><br><br>
</form> 


</html>