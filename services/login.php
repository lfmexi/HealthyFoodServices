<?php
$ipdb = '127.0.0.1';
$userdb = 'root';
$passwd = 'tesisHealthyFood';
$dbname = 'healthyFood';

header('Content-Type: text/html; charset=utf-8');

$conn = new mysqli($ipdb,$userdb,$passwd,$dbname);

if($conn){
	if($_POST){
		$user=$_POST['user'];
		$pass=md5($_POST['pass']);
		$query = "SELECT id,nick,nombre,birth, sexo as sex FROM Usuario WHERE nick='$user' and pass='$pass';";
		//mysql_query("BEGIN");
		$result1 = $conn->query($query);
		//mysql_query("COMMIT");
		if($result1){

	        $bdds = array();
		    $campo=array_keys($bdds);
		
		    while($r = $result1->fetch_assoc()){
			    $bdds[] = $r;
		    }
		    echo json_encode($bdds);
	    }
	    $result1->close();
	}	
}
$conn->close();
?>
