<?php
include("conf_global.inc");
$ipdb = '127.0.0.1:3306';
$userdb = 'root';
$passwd = 'tesisHealthyFood';
$dbname = 'healthyFood';
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);
mysql_selectdb($dbname, $conn);
echo $ipdb;
if($_REQUEST){
	$user=$_REQUEST['user'];
	$pass=md5($_REQUEST['pass']);
	$query = "SELECT id,nick,nombre,birth, sexo as sex FROM Usuario WHERE nick='".$user."' and pass='".$pass."';";
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
