<html>
<head>
<meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<?php
if (isset($_POST['LightON']))
{
echo "<p>Light On </p>";
exec('sudo /var/www/html/light_project/lighton.py2>&1', $output);
print_r($output);
}
if (isset($_POST['LightOFF']))
{
echo "<p>Light Off </p>";
exec("sudo /var/www/html/light_project/lightoff.py");
}
?>

<form method="post">
<button class="btn" name="LightON">Light ON</button>&nbsp;
<button class="btn" name="LightOFF">Light OFF</button><br><br>
</form> 


</html>
