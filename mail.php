<?
// primero hay que incluir la clase phpmailer para poder instanciar
//un objeto de la misma
require "phpmailer/class.phpmailer.php";

//Armamos el body del mensaje
$body="
Nombre:				$_POST[name]<br>
Email:				$_POST[email]<br>
Asunto:         	$_POST[subject]<br>
Mensaje:		    $_POST[msg]<br>
";

//instanciamos un objeto de la clase phpmailer al que llamamos
//por ejemplo mail
$mail = new phpmailer();

//Definimos las propiedades y llamamos a los métodos
//correspondientes del objeto mail

$mail->PluginDir = "phpmailer/";

//Con la propiedad Mailer le indicamos que vamos a usar un
//servidor smtp
$mail->Mailer = "smtp";
//Asignamos a Host el nombre de nuestro servidor smtp
$mail->Host = "mail.exitosites.com";
//Le indicamos que el servidor smtp requiere autenticación
$mail->SMTPAuth = true;
//Le decimos cual es nuestro nombre de usuario y password
$mail->Username = "smtp@exitosites.com";
$mail->Password = "network";


//Indicamos cual es nuestra dirección de correo y el nombre que
//queremos que vea el usuario que lee nuestro correo
$mail->From = $_POST['email'];
$mail->FromName = $_POST['name'];                

$mail->ContentType = "text/html";
$mail->CharSet = "utf-8";


//Indicamos que el body del mensaje es en HTML
$mail->IsHTML(true);

//el valor por defecto 10 de Timeout es un poco escaso
//por tanto lo pongo a 30
$mail->Timeout=30;

//Indicamos cual es la dirección de destino del correo
$mail->AddAddress("asomante2000@yahoo.com");

//Asignamos asunto y cuerpo del mensaje
//El cuerpo del mensaje lo ponemos en formato html, haciendo
//que se vea en negrita
$mail->Subject = "Mensaje de la pagina";

$mail->Body = $body;

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


if(!$exito){
	echo "Problemas enviando correo electrónico a ".$valor;
	echo "<br/>".$mail->ErrorInfo;
}else{
	header("location: http://www.haciendasanantoniopr.com/contacto_ok.html");
}
?>



	

