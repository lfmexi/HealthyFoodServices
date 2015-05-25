<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_REQUEST){
	$recipe=$_REQUEST['receta'];

        $query= "SELECT u.nick AS username, r.Nombre AS nombre, r.Categoria AS categoria, SUM( i.cantidad*ri.gramos/100 ) AS calorias, r.Instrucciones AS instrucciones, r.Foto AS url ";
        $query= $query . "FROM Usuario u JOIN Receta AS r ON r.Usuario=u.id JOIN Receta_Ingrediente AS ri ON r.idReceta = ri.idReceta JOIN Ingrediente AS i ON ri.idIngrediente = i.id ";
        $query= $query . "WHERE r.Nombre = '".$recipe."'";
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
			