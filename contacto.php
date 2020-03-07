<?php

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$EmailFrom = $_POST['email'];
$fechain = $_POST['fechain'];
$fechaout = $_POST['fechaout'];
$cantidad = $_POST['cantidad'];
$mensaje = $_POST['mensaje'];
$fecha = date("d-m-Y H:i:s");

$consulta = $_POST['consulta'];

$campos = '
NOMBRE:  '. $nombre .'
TELEFONO:  '. $telefono .'
EMAIL:  '. $EmailFrom .' 
FECHA ENTRADA:  '. $fechain .' 
FECHA SALIDA:  '. $fechaout .' 
CANTIDAD DE PERSONAS:  '. $cantidad .'
OBSERVACIONES:  '. $mensaje .' 
FECHA: '. $fecha .'


'; 

/* LELEN */
if($EmailFrom==NULL/*|$apellido==NULL|$EmailFrom==NULL*/) {
echo "un campo está vacio.";
}else{
mail("lelen@smandes.com.ar", "CONTACTO DESDE LELEN.COM.AR", $campos, "From: <$EmailFrom>", "Reply-to: <$EMAIL2>");
mail("gilesdenis@perfidivendres.com", "CONTACTO DESDE LELEN.COM.AR", $campos, "From: <$EmailFrom>", "Reply-to: <$EMAIL2>");
mail("ivana@perfidivendres.com", "CONTACTO DESDE LELEN.COM.AR", $campos, "From: <$EmailFrom>", "Reply-to: <$EMAIL2>");
}

Header( "Location: http://www.lelen.com.ar/gracias.html" );

$file = "datos-lelen-2013.html"; 
if (!$file_handle = fopen($file,"a")) 
{ echo "No se puede abrir el archivo"; } 
elseif (!fwrite ($file_handle, utf8_decode ("
<br>
NOMBRE:  $nombre <br>
TELEFONO:  $telefono <br>
EMAIL:  $EmailFrom <br>
FECHA IN:  $fechain <br>
FECHA SALIDA:  $fechaout <br>
CANTIDAD DE PERSONAS:  $cantidad <br>
OBSERVACIONES:  $mensaje <br>
Fecha: $fecha <br><br>
*****************************************************************************<br><br>
" ))) 

fclose($file_handle); 

$file = "datos-lelen-2013.csv"; 
if (!$file_handle = fopen($file,"a")) 
{ echo "No se puede abrir el archivo"; } 
elseif (!fwrite ($file_handle, utf8_decode ("
$nombre;$telefono;$fechain;$fechaout;$cantidad;$mensaje;$EmailFrom;$fecha" ))) 

{ echo "No se Puede escribir en el archivo"; }
else
{ echo "Se ha escrito en el archivo satisfactoriamente"; } 
fclose($file_handle); 

?>
