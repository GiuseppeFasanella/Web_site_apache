<?php
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '*****');
DEFINE ('DB_HOST', 'usersif.ddns.net');
DEFINE ('DB_NAME', 'Library');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,3306);

if(mysqli_connect_error($dbc)){
exit('Error'. mysqli_connect_error($connection));
}

?>
