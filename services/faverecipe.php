<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$user=$_POST['user'];
	$recipe=$_POST['receta'];
	$query = mysql_query("SELECT fave FROM Rating JOIN Usuario ON Usuario.id=Rating.idUsuario JOIN Receta ON Receta.idReceta=Rating.idReceta WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'") ;
        if (mysql_num_rows($query) != 0){
          $result1 = mysql_query("UPDATE  Rating JOIN Usuario ON Usuario.id=Rating.idUsuario JOIN Receta ON Receta.idReceta=Rating.idReceta SET Rating.fave = 1  WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'");
	  //mysql_query("COMMIT");	
          if($result1){
            echo 'Insertado';
            mysql_close($conn);
          }
        }else{
	  $query = "INSERT INTO Rating (idUsuario,idReceta,fave) SELECT Usuario.id,Receta.idReceta, 1 FROM Usuario, Receta WHERE Usuario.nick='".$user."' AND Receta.nombre='".$recipe."'";
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
										