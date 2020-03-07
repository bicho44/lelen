<html>
<head>
<title>Envienos su consulta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function Validator(form)
{
	if (form.nombre.value == "")
	{
		alert("Por favor, cargue su nombre.");
		form.nombre.focus();
		return false;
	}
	if (form.email.value == "")
	{
		alert("Por favor, cargue su e-mail.");
		form.email.focus();
		return false;
	}
	return true;
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" link="#999999" vlink="#999999" alink="#999999" leftmargin="0" topmargin="0" onLoad="MM_preloadImages('img/b.home.on.jpg','img/b.company.on.jpg','img/b.business.on.jpg','img/b.contact.on.jpg')">
<form method="POST" action="consultas2.php" onSubmit="return Validator(this);">
  <div align="center">
  <table width="99%" border="0" cellspacing="0" cellpadding="2">
    <tr bgcolor="#FFFFFF">
      <td colspan="2" height="25" valign="top"> <div align="center"><font color="#003399" size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <?
	if ($_SERVER["REQUEST_METHOD"] == "POST"){


		$consulta = ereg_replace( "\n",'<br>', $_POST["consulta"]);


	 	if (
				! preg_match ('/\n/', $_POST["nombre"]) and
				! preg_match ('/\n/', $_POST["email"]) and
				! preg_match ('/\n/', $_POST["telefono"])
			){




			$busqueda = '/Content-type/';

			if(! preg_match ('/Content-type/i',  $consulta )){

				require("phpmailer/class.phpmailer.php");

				$mail = new PHPMailer(); // send via SMTP
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->Username = "106_webmaster"; // SMTP username
				$mail->Password = "ariana2011"; // SMTP password
				$webmaster_email = "lelen@smandes.com.ar"; //Reply to this email ID
				$email="lelen@smandes.com.ar"; // Recipients email ID
				$name="name"; // Recipient's name
				$mail->From = $webmaster_email;
				$mail->FromName = "CABAÑAS LELEN - Consultas";
				$mail->AddAddress($email,$name);
// 				$mail->AddReplyTo($webmaster_email,"LELEN.COM.AR");
// 				$mail->WordWrap = 50; // set word wrap
// 				$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
// 				$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
				$mail->IsHTML(true); // send as HTML
				$mail->Subject = "Contacto desde Lelen.com.ar";
 //HTML if(!class_exists('PHPMailer')) {
;

				$mensaje = "Mensaje enviado desde Lelen.com.ar.\n<br/>";
				$mensaje .= "Nombre : " . $_POST["nombre"] . "\n<br/>";
				$mensaje .= "Email : " . $_POST["email"] . "\n<br/>";
				$mensaje .= "Telefono : " . $_POST["telefono"] . "\n<br/>";
				$mensaje .= "Fecha de llegada : " . $_POST["llegada"] . "\n<br/>";
				$mensaje .= "Fecha de salida : " . $_POST["salida"] . "\n<br/>";
				$mensaje .= "Consulta : " . $consulta . "\n";

				$mail->Body = $mensaje;
// 				$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
				if(!$mail->Send()){
					echo "Mailer Error: " . $mail->ErrorInfo;
				}else{
					echo "Su mensaje ha sido enviado";
				}

/*

				$mensaje = "Mensaje enviado desde Lelen.com.ar.\n";
				$mensaje .= "Nombre : " . $_POST["nombre"] . "\n";
				$mensaje .= "Email : " . $_POST["email"] . "\n";
				$mensaje .= "Telefono : " . $_POST["telefono"] . "\n";
				$mensaje .= "Fecha de llegada : " . $_POST["llegada"] . "\n";
				$mensaje .= "Fecha de salida : " . $_POST["salida"] . "\n";
				$mensaje .= "Consulta : " . $consulta . "\n";
				mail("info@saboresydestinos.com.ar", "Mensaje desde Lelen.com.ar", $mensaje);
				echo "El mensaje se ha enviado correctamente";
*/
			}else{
				echo "<h3>your message is absolutly wrong</h3>";
			}
		}else{
			echo "<h3>your message is absolutly wrong
}g  </h3>";
		}
	}
	?>
          </font></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td> 
			<font face="Trebuchet MS" style="font-size: 9pt">
			Nombre:</font></td>
      <td> <font face="Trebuchet MS"> 
		<input name="nombre" type="text" size="35" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="1"></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td> <font face="Trebuchet MS" style="font-size: 9pt">
			E-mail:</font></td>
      <td> <font face="Trebuchet MS"> 
		<input name="email" type="text" size="35" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="2"></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td> <font face="Trebuchet MS" style="font-size: 9pt">
			Teléfono:</font></td>
      <td> <font face="Trebuchet MS"> 
		<input name="telefono" type="text" size="35" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="3"></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td> <font face="Trebuchet MS" style="font-size: 9pt">
			Fecha de llegada:</font></td>
      <td> <font face="Trebuchet MS"> 
		<input name="llegada" type="text" size="35" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="4"></font></td>
    </tr>
        <tr bgcolor="#FFFFFF">
      <td> <font face="Trebuchet MS" style="font-size: 9pt">
			Fecha de salida:</font></td>
      <td> <font face="Trebuchet MS"> 
		<input name="salida" type="text" size="35" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="5"></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top"> <font face="Trebuchet MS" style="font-size: 9pt">
			Consulta:</font></td>
      <td> <font face="Trebuchet MS"> 
		<textarea name="consulta" cols="35" rows="4" style="color: #85B000; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #85B000" tabindex="6"></textarea></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td> 
		<p align="left"><font face="Trebuchet MS"> 
		<input type="submit" name="Submit" value="Enviar" style="color: #FFFFFF; font-family: Trebuchet MS; font-size: 8pt; font-weight: bold; border: 1px solid #000000; background-color: #85B000"></font></td>
      <td> &nbsp;</td>
    </tr>
    </table>
	</div>
	</div>
</form>
</body>
</html>