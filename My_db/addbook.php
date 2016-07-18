<html>
  <head>
    <title>Add Book</title>
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
       // Trim white space from the name and store the name
       $NOME = trim($_POST['nome']);
       }
      
       if(empty($_POST['posizione_fissa'])){
       $data_missing[] = 'posizione_fissa';
       } else {
       // Trim white space from the name and store the name
       $POS = trim($_POST['posizione_fissa']);
       }

       if(empty($_POST['argomento'])){
       //$data_missing[] = 'argomento';
       } else {
       // Trim white space from the name and store the name
       $ARG = trim($_POST['argomento']);
       }

       if(empty($_POST['periodo'])){
       //$data_missing[] = 'periodo';
       } else {
       // Trim white space from the name and store the name
       $PER = trim($_POST['periodo']);
       }
       
       //A seconda delle info che metto
       if(!empty($_POST['title']) and !empty($_POST['posizione_fissa']) and !empty($_POST['nome'])){

       require_once('../../mysqli_connect.php');

       //Inserisco titolo e posizione del libro
       if(empty($_POST['argomento']) and empty($_POST['periodo'])){
       $query = "insert ignore into Libro (title,posizione_fissa,libro_id) values(?,?,NULL)";
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "ss",$TITLE,$POS);
       }else if(!empty($_POST['argomento']) and empty($_POST['periodo'])){
       $query = "insert ignore into Libro (title,posizione_fissa,argomento,libro_id) values(?,?,?,NULL)";
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "sss",$TITLE,$POS,$ARG);
       }else if(empty($_POST['argomento']) and !empty($_POST['periodo'])){
       $query = "insert ignore into Libro (title,posizione_fissa,periodo,libro_id) values(?,?,?,NULL)";
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "sss",$TITLE,$POS,$PER);
       }else if(!empty($_POST['argomento']) and !empty($_POST['periodo'])){
       $query = "insert ignore into Libro (title,posizione_fissa,argomento,periodo,libro_id) values(?,?,?,?,NULL)";
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "ssss",$TITLE,$POS,$ARG,$PER);
       }
       mysqli_stmt_execute($stmt);
       $affected_rows = mysqli_stmt_affected_rows($stmt);
       if($affected_rows == 1){
       echo 'Book Entered;';
       } else {
       echo 'Title already present<br />';
       echo mysqli_error();
       }
 
       //Inserisco l'autore nella lista (se non e' gia' presente)
       $query = "insert ignore into autore (nome,autore_id) values(?,NULL)";
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "s",$NOME);
       mysqli_stmt_execute($stmt);
       $affected_rows = mysqli_stmt_affected_rows($stmt);
       if($affected_rows == 1){
       echo ' Author Entered;';
       } else {
       echo 'Author already present<br />';
       echo mysqli_error();
       }

       //Collego logicamente il libro al suo autore
       $query = "insert into libro_autore(libro_id,autore_id) select libro_id, autore_id from Libro join autore where Libro.title=? and autore.nome=?";    
       $stmt = mysqli_prepare($dbc, $query);   
       mysqli_stmt_bind_param($stmt, "ss",$TITLE,$NOME);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       mysqli_close($dbc);
       
       } else {
       echo 'You need to enter the following data<br />';
       foreach($data_missing as $missing){
       echo "$missing<br />";   
       }   
       }
       }
       
       ?>
    
    <!-- You want to continue adding another book, so create again the form -->
    <form action="addbook.php" method="post">
      
      <b>Add a new book</b>
      
      <p>Titolo*:
	<input type="text" name="title" size="60" value="" />
      </p>
      
      <p>Autore*:
	<input type="text" name="nome" size="30" value="" />
      </p>
      
      <p>Posizione*:
	<input type="text" name="posizione_fissa" size="30" value="" />
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
