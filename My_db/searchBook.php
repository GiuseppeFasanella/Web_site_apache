<html>
  <head>
    <title>Search a Book</title>
  </head>
  <body>
    <?php
       
       if(isset($_POST['submit'])){
       $data_missing = array();
       
       if(empty($_POST['title'])){
       $data_missing[] = 'Title';
       } else {
       // Trim white space from the name and store the name
       $TITLE = trim($_POST['title']);
       }      
       if(empty($_POST['nome'])){
       $data_missing[] = 'nome';
       } else {
       $NOME = trim($_POST['nome']);
       }
       if(empty($_POST['argomento'])){
       $data_missing[] = 'argomento';
       } else {
       $ARG = trim($_POST['argomento']);
       }
       if(empty($_POST['periodo'])){
       $data_missing[] = 'periodo';
       } else {
       $PER = trim($_POST['periodo']);
       }

       if(!empty($_POST['title']) and empty($_POST['nome']) and empty($_POST['argomento']) and empty($_POST['periodo'])){ 
       
       require_once('../../mysqli_connect.php');
       
       $query = "select title, posizione_fissa from Libro where title like";
       $query= $query. "\"%".$TITLE."%\"";
       echo "Query is: ". $query."<br><br>";
       $response = @mysqli_query($dbc, $query);
      
       $count=0; 
       if($response){
       echo '<table align="left"
		    cellspacing="5" cellpadding="8">
       <tr>
	 <td align="left"><b>Titolo</b></td>
	 <td align="left"><b>Posizione</b></td>
       </tr>';
       while($row = mysqli_fetch_array($response)){
       echo '<tr><td align="left">' .	
	  $row['title'] . '</td><td align="left">' . 
	  $row['posizione_fissa'] . '</td><td align="left">' . 
	  '</tr>';
       $count=$count+1;
       }
       echo '</table>';
    }else {
    echo "0 results";
    }
    //Questo serve solo ad abbassare il form per la nuova query, che altrimenti si sovrappone all'output della query
    if($count == 1 || $count ==2 || $count ==3){
    echo "<br><br>";
    }
    while($count){
    echo "<br><br><br>";
    $count=$count -1;
    }

    } else if(empty($_POST['title']) and !empty($_POST['nome']) and empty($_POST['argomento']) and empty($_POST['periodo'])){
    require_once('../../mysqli_connect.php');
    //ricerca per autore; 
    $query="select Libro.title, Libro.posizione_fissa from Libro,autore,libro_autore where Libro.libro_id=libro_autore.libro_id and libro_autore.autore_id=autore.autore_id and autore.nome like";
    //Libro.argomento="Decadentismo";
    $query= $query. "\"%".$NOME."%\"";
    echo "Query is: ". $query."<br><br>";
    $response = @mysqli_query($dbc, $query);
    $count = 0;
    if($response){
    echo '<table align="left"
		 cellspacing="5" cellpadding="8">
      <tr>
	<td align="left"><b>Titolo</b></td>
	<td align="left"><b>Posizione</b></td>
      </tr>';
      while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="left">' .	
	  $row['title'] . '</td><td align="left">' . 
	  $row['posizione_fissa'] . '</td><td align="left">' . 
	  '</tr>';
      $count=$count+1;
      }
      echo '</table>';
    }else {
    echo "0 results";
    }
    
    //Questo serve solo ad abbassare il form per la nuova query, che altrimenti si sovrappone all'output della query
    if($count == 1 || $count ==2 || $count ==3){
    echo "<br><br>";
    }
    while($count){
    echo "<br><br><br>";
    $count=$count -1;
    } 
    }else if(empty($_POST['title']) and empty($_POST['nome']) and !empty($_POST['argomento']) and empty($_POST['periodo'])){ 
    require_once('../../mysqli_connect.php');
    //Ricerca per periodo;
    $query="select Libro.title, Libro.posizione_fissa, autore.nome from Libro,autore,libro_autore where Libro.libro_id=libro_autore.libro_id and libro_autore.autore_id=autore.autore_id and Libro.argomento like";
    $query= $query. "\"%".$ARG."%\"";
    echo "Query is: ". $query."<br><br>";
    $response = @mysqli_query($dbc, $query);

    if($response){
    echo '<table align="left"
		 cellspacing="5" cellpadding="8">
      <tr>
	<td align="left"><b>Titolo</b></td>
	<td align="left"><b>Autore</b></td>
	<td align="left"><b>Posizione</b></td>
      </tr>';
      while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="left">' .	
	  $row['title'] . '</td><td align="left">' . 
	  $row['nome'] . '</td><td align="left">' . 
	  $row['posizione_fissa'] . '</td><td align="left">' . 
	  '</tr>';
      $count=$count+1;
      }
      echo '</table>';
    }else {
    echo "0 results";
    }
    
    //Questo serve solo ad abbassare il form per la nuova query, che altrimenti si sovrappone all'output della query
    if($count == 1 || $count ==2 || $count ==3){
    echo "<br><br>";
    }
    while($count){
    echo "<br><br><br>";
    $count=$count -1;
    }
    }else if(empty($_POST['title']) and empty($_POST['nome']) and empty($_POST['argomento']) and !empty($_POST['periodo'])){  
    require_once('../../mysqli_connect.php');
    //ricerca per periodo;
    $query="select Libro.title, Libro.posizione_fissa, autore.nome from Libro,autore,libro_autore where Libro.libro_id=libro_autore.libro_id and libro_autore.autore_id=autore.autore_id and Libro.periodo like";
    $query= $query. "\"%".$PER."%\"";
    echo "Query is: ". $query."<br><br>";
    $response = @mysqli_query($dbc, $query);
    $count=0;
    if($response){
    echo '<table align="left"
		 cellspacing="5" cellpadding="8">
      <tr>
	<td align="left"><b>Titolo</b></td>
	<td align="left"><b>Autore</b></td>
	<td align="left"><b>Posizione</b></td>
      </tr>';
      while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="left">' .	
	  $row['title'] . '</td><td align="left">' . 
	  $row['nome'] . '</td><td align="left">' . 
	  $row['posizione_fissa'] . '</td><td align="left">' . 
	  '</tr>';
      $count=$count+1;
      }
      echo '</table>';
    }else {
    echo "0 results";
    }
    
    //Questo serve solo ad abbassare il form per la nuova query, che altrimenti si sovrappone all'output della query
    if($count == 1 || $count ==2 || $count ==3){
    echo "<br><br>";
    }
    while($count){
    echo "<br><br><br>";
    $count=$count -1;
    }
    } else {
    echo "Query not implemented. I don't know what I should do !<br />";
    }
    

    }
    
       
    ?>
    
    <!-- You want to continue adding another book, so create again the form -->
    <form action="searchBook.php" method="post">
      
      <b>Go for your search!</b>
      
      <p>Titolo:
	<input type="text" name="title" size="60" value="" />
      </p>
      
      <p>Autore:
	<input type="text" name="nome" size="30" value="" />
      </p>
      
      <p>Argomento:
	<input type="text" name="argomento" size="30" value="" />
      </p>

      <p>Periodo:
	<input type="text" name="periodo" size="30" value="" />
      </p>
      
      <p>
	<input type="submit" name="submit" value="Send" />
      </p>
      
    </form>
  </body>
</html>
