<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$email=$_POST['email'];

        $query= "SELECT u.nick AS username, u.pass as password, u.nombre ";
        $query= $query . "FROM Usuario u ";
        $query= $query . "WHERE u.email = '".$email."'";

	$result1 = mysql_query($query);
	//mysql_query("COMMIT");
	if($result1){
          $info = mysql_fetch_row($result1);
          echo $info[0]; // 42
          echo $info[1]; // el valor de email

$para      = $email;
$titulo    = 'Bienvenido a HealthyLife '.$nombre;
$mensaje   = 'Bienvenido a HealthyLife '.$nombre . 'Estos son tus datos de registro: \r\n Usuario: ' .$info[0] . '\r\n Contraseña: ' .$info[1];
$cabeceras = 'From: noreply@healthylife.com' . "\r\n" .
    'Reply-To: lfmexi@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($email, $titulo, $mensaje, $cabeceras);
        
        }


}

?>				