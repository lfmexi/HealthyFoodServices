<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_POST){
	$recipe=$_POST['receta'];
	$user=$_POST['user'];

        $query= "SELECT Rating.valor as rating ";
        $query= $query . "FROM Rating JOIN Receta ON Rating.idReceta=Receta.idReceta JOIN Usuario ON Usuario.id = Rating.idUsuario ";
        $query= $query . "WHERE Receta.Nombre = '".$recipe."' AND Usuario.nick = '".$user."' AND Rating.valor  is not NULL" ;
	//mysql_query("BEGIN");
	$result1 = mysql_query($query);
	//mysql_query("COMMIT");
	if($result1){
        $bdds = array();
	    $campo=array_keys($bdds);
	
	    while($r = mysql_fetch_assoc($result1)){
		    $bdds[] = $r;
	    }
	    mysql_close($conn);
	    echo json_encode($bdds);
    }
}
?>
			