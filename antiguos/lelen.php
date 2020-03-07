<?
  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  require "class.phpmailer.php";

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail = new phpmailer();

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail

  //Con PluginDir le indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp que como he comentado al principio de 
  //este ejemplo va a estar en el subdirectorio includes
  $mail->PluginDir = "";

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "smtp";

  //Asignamos a Host el nombre de nuestro servidor smtp
  $mail->Host = "www.lelen.com.ar";

  //Le indicamos que el servidor smtp requiere autenticación
  $mail->SMTPAuth = true;

  //Le decimos cual es nuestro nombre de usuario y password
  $mail->Username = "106_webmaster"; 
  $mail->Password = "smandes2012";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "lelen@smandes.com.ar";
  $mail->FromName = "Lelen Cabañas";

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress("lelen@smandes.com.ar");
  $mail->AddAddress("info@lelen.com.ar");
  $mail->AddAddress("saboresydestinos@gmail.com");

  
  //Damos formato a Body
  $nombre=$_POST['NombreyApellido'];
  $telefono=$_POST['Telefono'];
  $correo=$_POST['Email'];
  $llegada=$_POST['Llegada'];
  $salida=$_POST['Salida'];
  $coment=$_POST['Comentarios'];

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = "Consulta desde Cabañas Lelen";
  $mail->Body = "Le ha llegado un comentario de $nombre consultando por Cabañas Lelen:</p>
	Nombre: $nombre</p>
	E-mail: $correo</p>
	Fecha de Llegada: $llegada</p>
	Fecha de Salida: $salida</p>
	Telefono: $telefono</p>

Y le ha enviado el siguiente mensaje:</p>

$coment
";  

  //Definimos la direccion de respuesta
  $mail->AddReplyTo("$correo","$nombre");
  
  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

  //se envia el mensaje, si no ha habido problemas 
  //la variable $exito tendra el valor true
  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep	
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
	
   }
 
		
   if(!$exito)
   {
	echo "Problemas enviando correo electrónico a ".$valor;
	echo "<br/>".$mail->ErrorInfo;	
   }
   else
   {
	echo "Mensaje enviado correctamente";
   } 
?>