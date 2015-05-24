<?php
include('SimpleImage.php');
header('Content-Type: text/html; charset=utf-8');

function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

if($_FILES['file']['name']){
$filename = stripslashes($_FILES['file']['name']);
$extension = getExtension($filename);

$file_path = "images/";

$file_path = $file_path . date('Ydmhisu').$_POST['user'].'.'.end(explode('.', $_FILES['file']['name']));

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {  }
 else
{
   if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
list($width,$height)=getimagesize($uploadedfile);
$newwidth=640;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
imagejpeg($tmp,$file_path,100);

imagedestroy($src);
imagedestroy($tmp);
}

//if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
//    echo "success";
//} else{
//    echo "fail";
//}
}

$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
mysql_selectdb("u147283082_hlife", $conn);
if($_POST){
	$user=$_POST['user'];
	$name=$_POST['name'];
	$ins=$_POST['ins'];
	$cat=$_POST['categoria'];
        $ingredientes=$_POST['ingredientes'];
        $query = "INSERT INTO Receta (Nombre, Instrucciones, Usuario, Fecha, Categoria, Foto) SELECT '".$name."','".$ins."',Usuario.id, CURRENT_DATE(),'".$cat."','".$file_path."' FROM Usuario WHERE Usuario.nick='".$user."';";
	//mysql_query("BEGIN");
	$result1 = mysql_query($query);
	//mysql_query("COMMIT");	
        if($result1){
           $repid = mysql_insert_id();
           $ings = json_decode($ingredientes);
           foreach ($ings as $ng) {
             $query = "INSERT INTO Receta_Ingrediente (idReceta, idIngrediente, gramos, litros, unidades) SELECT ".$repid.",Ingrediente.id,".$ng->gramos.",".$ng->litros.",".$ng->unidades." FROM Ingrediente WHERE Ingrediente.Nombre='".$ng->nombre_ingrediente."';";
             $reulta2=mysql_query($query);
           }
           mysql_close($conn);
	}
        
}
?>		