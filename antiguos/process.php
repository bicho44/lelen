<?php
include("global.inc.php");
$errors=0;
$error="Se han encontrado los siguientes errores.<ul>";
pt_register('POST','NombreyApellido');
pt_register('POST','Llegada');
pt_register('POST','Partida');
pt_register('POST','Direccion');
pt_register('POST','Pais');
pt_register('POST','Email');
pt_register('POST','Pasajeros');
pt_register('POST','Pagos');
pt_register('POST','Comentarios');
$Comentarios=preg_replace("/(\015\012)|(\015)|(\012)/","&nbsp;<br />", $Comentarios);if($NombreyApellido=="" || $Email=="" ){
$errors=1;
$error.="<li>No ha ingresado 1 o mas de los campos requeridos. Por favor, vuelva atras e ingreselos.";
}
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$Email)){
$error.="<li>Direccion de Email invalida";
$errors=1;
$error.="<li>No ha ingresado 1 o mas de los campos requeridos. Por favor, vuelva atras e ingreselos.<br> <br>  <INPUT TYPE=BUTTON ONCLICK='history.back()' VALUE='  Regresar al formulario '><HR>";
}
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$Email)){
$error.="<li>Direccion de Email invalida.<br> <br>  <INPUT TYPE=BUTTON ONCLICK='history.back()' VALUE='  Regresar al formulario '><HR>";
$errors=1;
}
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Nombre: ".$NombreyApellido."<br>
Fecha de llegada: ".$Llegada."<br>
Fecha de salida: ".$Partida."<br>
Direccion: ".$Direccion."<br>
Pais: ".$Pais."<br>
E-mail: ".$Email."<br>
Cantidad de Pasajeros: ".$Pasajeros."<br>
Forma de pago: ".$Pagos."<br>
Comentarios: ".$Comentarios."<br>

";
$message = stripslashes($message);

$cabeceras.= "MIME-Version: 1.0\r\n";
$cabeceras.= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabeceras.= "From: $Email\r\n";
$cabeceras.= "Reply-To: {$_POST[Email]}\r\n"; /* Aca le envias la respuesta a la persona que te mando el formulario al presionar RESPONDER */

/* LA CANTIDAD QUE NECESITES MANDAR */
mail("lelen@smandes.com.ar","Consulta desde su pagina web",$message,"$cabeceras");
mail("info@lelen.com.ar","Consulta desde su pagina web",$message,"$cabeceras");
mail("info@saboresydestinos.com.ar","Consulta desde su pagina web",$message,"$cabeceras");
mail("saboresydestinos@gmail.com","Consulta desde su pagina web",$message,"$cabeceras");




/* SE REFRESCA LA PAGINA A LA SIGUIENTE DIRECCION */
header("Refresh: 0;url=http://www.lelen.com.ar/gracias.html");
?><?php 
}
?>