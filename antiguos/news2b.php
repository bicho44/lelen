<?
error_reporting(0);
if($mail == '')
	header("Location: error2.php");
else{
$subj = "CABA�AS LELEN / Consultas desde su website";
$body = "
Fecha de llegada: $llegada
Fecha de salida: $salida
Nombre y apellido: $nombre
Direcci�n: $direccion
Pa�s: $pais
E-mail: $mail
Adultos: $adults
Kids: $kids
Comentarios: $mensaje

";
mail("lelen@smandes.com.ar, emerexcv@hotmail.com",$subj,$body,"From: $nombre<$nombre>");
header("Location: ok2.php");
}
?> 