<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_POST){
	$user=trim($_POST['user']);
	$name=$_POST['name'];
	$pass=md5($_POST['pass']);
	$email=$_POST['email'];
	$sexo=$_POST['sex'];
	$birth=$_POST['fecha'];
        $query = mysql_query("SELECT nick FROM Usuario WHERE nick='".$user."'");
            
        if (mysql_num_rows($query) == 0){
              $query = mysql_query("SELECT email FROM Usuario WHERE email='".$email."'");
        
              if (mysql_num_rows($query) == 0){
	          $query = "INSERT INTO Usuario (nick, nombre, pass, email, sexo, birth) VALUES ('".$user."','".$name."','".$pass."','".$email."','".$sexo."','".$birth."');";
	          $result1 = mysql_query($query);
	          if($result1){
                     echo 'Insertado';
                     mysql_close($conn);
	          }
              }else{
                  echo 'Ya existe un usuario con ese email';
              }
        }else{
            echo 'Ya existe un usuario con ese nombre';
        }
}
?>
								