<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$user=$_POST["user"];

        $query= "SELECT r.Nombre AS receta ";
        $query= $query . "FROM Usuario u JOIN Receta AS r ON u.id = r.Usuario ";
        $query= $query . "WHERE u.nick = '".$user."'";
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
				