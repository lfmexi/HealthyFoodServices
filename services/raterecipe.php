<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_POST){
	$user=$_POST['user'];
	$rating=$_POST['rating'];
	$recipe=$_POST['receta'];
	$query = mysql_query("SELECT valor FROM Rating JOIN Usuario ON Usuario.id=Rating.idUsuario JOIN Receta ON Receta.idReceta=Rating.idReceta WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'") ;
        if (mysql_num_rows($query) != 0){
          $query = mysql_query("UPDATE  Rating JOIN Usuario ON Usuario.id=Rating.idUsuario JOIN Receta ON Receta.idReceta=Rating.idReceta SET Rating.valor = ".$rating."  WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'");
	  //mysql_query("BEGIN");
	  $result1 = mysql_query($query);
	  //mysql_query("COMMIT");	
          if($result1){
            echo 'Insertado';
            mysql_close($conn);
          }
        }else{
	  $query = "INSERT INTO Rating (idUsuario,idReceta,valor) SELECT Usuario.id,Receta.idReceta, ".$rating." FROM Usuario, Receta WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'";
	  //mysql_query("BEGIN");
	  $result1 = mysql_query($query);
	  //mysql_query("COMMIT");	
          if($result1){
            echo 'Insertado';
            mysql_close($conn);
	  }
        }
}
?>
										