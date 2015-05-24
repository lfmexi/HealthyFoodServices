<?php
require_once("conf_global.inc");
header('Content-Type: text/html; charset=utf-8');
$conn = mysql_connect($ipdb,$userdb,$passwd);

mysql_selectdb($dbname, $conn);

if($_POST){
  $user=trim($_POST['user']);
  if (isset($_POST['nuser'])){
  }
  if (isset($_POST['email'])){
    $email=trim($_POST['email']);
    $query = "UPDATE Usuario SET email='".$email."' WHERE nick='".$user."'";            
    $result1 = mysql_query($query);
    if($result1){
      if (mysql_affected_rows() == 0){
        echo 'No fue posible actualizar su correo electrónicoo';
      }else{
        echo 'Correo electrónico actualizados\n';
      }
    }else{
        echo 'Ocurrió un error inesperado, intente de nuevo más tarde';
    }  
  }
  if (isset($_POST['name'])){
    $name=trim($_POST['name']);
    $query = "UPDATE Usuario SET nombre='".$name."' WHERE nick='".$user."'";            
    $result1 = mysql_query($query);
    if($result1){
      if (mysql_affected_rows() == 0){
//        echo 'No fue posible actualizar su nombre\n';
      }else{
//        echo 'Nombre actualizados';
      }
      mysql_close($conn);
    }else{
      echo 'Ocurrió un error inesperado, intente de nuevo más tarde';
    }
  }
      mysql_close($conn);
}
?>
											