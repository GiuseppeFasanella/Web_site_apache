<html>
  <head>
    <title>All my books</title>
  </head>
  <body>
<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

$query = "select Libro.title, Libro.posizione_fissa, autore.nome, Libro.periodo, Libro.argomento from Libro,autore,libro_autore where Libro.libro_id=libro_autore.libro_id and libro_autore.autore_id=autore.autore_id";

$response = @mysqli_query($dbc, $query);

if($response){
echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr>
<td align="left"><b>Titolo</b></td>
<td align="left"><b>Autore</b></td>
<td align="left"><b>Posizione</b></td>
<td align="left"><b>Periodo</b></td>
<td align="left"><b>Argomento</b></td>
</tr>';
// mysqli_fetch_array will return a row of data from the query

// until no further data is available
while($row = mysqli_fetch_array($response)){
	   echo '<tr><td align="left">' .	
	   $row['title'] . '</td><td align="left">' . 
	   $row['nome'] . '</td><td align="left">' . 
	   $row['posizione_fissa'] . '</td><td align="left">' . 
	   $row['periodo'] . '</td><td align="left">' . 
	   $row['argomento'] . '</td><td align="left">' . 
	   '</tr>';
	   }
echo '</table>';


}else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}


// Close connection to the database
mysqli_close($dbc);


?>
</body>
</html>