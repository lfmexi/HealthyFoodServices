<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$user=trim($_POST['user']);
	$newpass=md5(trim($_POST['newpass']));
	$oldpass=md5(trim($_POST['oldpass']));
        $query = "UPDATE Usuario SET pass='".$newpass."' WHERE nick='".$user."' AND pass='".$oldpass."'";            
        $result1 = mysql_query($query);
	if($result1){
          if (mysql_affected_rows() == 0){
            echo 'Contraseña incorrecta';
          }else{
             echo 'Datos actualizados';
          }
           mysql_close($conn);
	}else{
            echo 'Ocurrió un error inesperado, intente de nuevo más tarde';
        }
}
?>
									