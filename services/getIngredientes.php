<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
mysql_set_charset("utf8");
if($_POST){
	$patron=$_POST['patron'];
	$query = "SELECT Nombre as nombre, cantidad as calorias, medida as tipoMedida FROM Ingrediente WHERE UPPER(Nombre)like UPPER('%".$patron."%') ORDER BY nombre ASC;";
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
