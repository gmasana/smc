<?php
//ini_set('display_error',1);
//error_reporting(E_ALL); 

require_once("../PHPMailer/PHPMailer.php");
require_once("../PHPMailer/SMTP.php");
require_once("../PHPMailer/Exception.php");

/*estas dos funciones sirven para mostrar los errores
en los servidores que tengan config por 
default que no se muestren*/

//$to = "cursos.prof.cristian.t@gmail.com";
//$asunto = "Prueba dese el servidor con PHP";
//$mensaje = "Este es un mensaje de prueba desde el server";
//$cabeceras = 'From: pruebas@profcristian.ed.urltemporal.com'."\r\n".'X-Mailer: PHP'.phpversion();
//
//mail($to, $asunto, $mensaje, $cabeceras);
//
//echo mensaje enviado;

if( $_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nom_ape"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $comentarios = $_POST["comentarios"];

    $mail = new PHPMailer\PHPMailer\PHPMailer;

    $mail ->Host = "smtp.gmail.com"; //Host de mensajeria del servidor
    $mail ->isSMTP();//analiza si se trata de un servidor email valido
    $mail ->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; //Corrobora que el servidor de email funcione
    $mail ->Port = 587;

    $mail ->SMTPAuth = true; //indica que pueda loguearse
    $mail ->Username = "asesores.smc@gmail.com";
    $mail ->Password = "SandraSmc_13";

    $mail ->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;//Tipo de encriptacion TLS

    $mail ->Body = "<h1>Consulta desde el Sitio local</h1>\r\n"; //Cuerpo del mensaje en HTML, el AltBody es sin etiquetas
    $mail ->Body.= "<p><strong>Nombre:</strong> " . $nombre . "</p>";
    $mail ->Body.= "<p><strong>E-Mail:</strong> " . $email . "</p>";
    $mail ->Body.= "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
    $mail ->Body.= "<p><strong>Mensaje:</strong></p>";
    $mail ->isHTML();
    $mail ->Body.= "<blockquote>" . $comentarios . "</blockquote>";
    $mail ->Subject = "Consulta desde el localhost";
    $mail ->addAddress("asesores.smc@gmail.com", "Email de pruebas");//A quien envio el mail
    $mail ->addAddress("gonzalomasana95@gmail.com", "Email de pruebas");//A quien envio como 2do destinatario
    $mail ->addReplyTo($email, $nombre);
    $mail ->setFrom("asesores.smc@gmail.com","Pruebas");
    $mail ->send();

    header("Location: ../?page=mensajenviado.php");
}

?>


