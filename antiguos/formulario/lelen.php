<?
error_reporting(0);
if($mail == '')
	header("Location: error.php");
else{
$subj = "CABAÑAS LELEN / Consultas desde su website";
$body = "
Nombre y apellido: $nombre
Fecha de llegada: $llegada
Fecha de salida: $salida
Dirección: $direccion
País: $pais
E-mail: $mail
Cantidad de pasajeros: $pasajeros
Forma de pago: $pago
Comentarios: $mensaje
";
mail("reservas@lelen.com.ar",$subj,$body,"From: $nombre<$mail>");
header("Location: ok.php");
}
?> 