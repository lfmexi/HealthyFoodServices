<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_POST){
	$recipe=$_POST["receta"];

        $query= "SELECT i.Nombre AS ingrediente, ri.gramos as gramos, ri.litros as litros, ri.unidades as unidades ";
        $query= $query . "FROM Receta r JOIN Receta_Ingrediente AS ri ON r.idReceta = ri.idReceta JOIN Ingrediente AS i ON ri.idIngrediente = i.id ";
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
				