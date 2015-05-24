<?php
header('Content-Type: text/html; charset=utf-8');
function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz$_?!-0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}

$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$email=$_POST['email'];
        $randstr = randStrGen(8);
        echo $randstr;

        $query= "UPDATE Usuario SET pass=MD5(".$randstr.")";
        $query= $query . "WHERE email = 'angel.cj.o@gmail.com'";

	$result1 = mysql_query($query);
	//mysql_query("COMMIT");

        $query2= "SELECT u.nick AS username, u.nombre ";
        $query2= $query2 . "FROM Usuario u ";
        $query2= $query2 . "WHERE u.email = '".$email."'";
	$result2 = mysql_query($query2);

	if($result2){
          $info = mysql_fetch_row($result2);
$para      = $email;
$titulo    = 'Bienvenido a HealthyLife '.$nombre;
$mensaje   = 'Bienvenido a HealthyLife '.$nombre . 'Estos son tus datos de registro:  Usuario: ' .$info[0] . '  Contraseña: ' .$randstr;
$cabeceras = 'From: noreply@healthylife.com' . "\r\n" .
    'Reply-To: lfmexi@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($email, $titulo, $mensaje, $cabeceras);
        
        }


}

?>