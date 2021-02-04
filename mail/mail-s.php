<?php
require_once("../PHPMailer/PHPMailer.php");
require_once("../PHPMailer/SMTP.php");
require_once("../PHPMailer/Exception.php");

//ini_set('display_error',1);
//error_reporting(E_ALL); 

/*estas dos funciones sirven para mostrar los errores
en los servidores que tengan config por 
default que no se muestren*/

//$to = "cursos.prof.cristian.t@gmail.com";
//$asunto = "Prueba desde el servidor con PHP";
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
    $riesgo = $_POST["riesgo"];
    $comentarios = $_POST["comentarios"];

    if ( empty($nombre) || strlen($nombre) < 3 || is_numeric($nombre)){
        //Nombre Invalido
        header("location: ../?page=siniestro&rta=0x001");

    } else if ( is_numeric(substr($nombre,0,1)) || empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        //Email Invalido
        header("location: ../?page=siniestro&rta=0x002");

    } else if(empty($comentarios) || strlen($comentarios) > 400){
        //Mensaje Invalido
        header("location: ../?page=siniestro&rta=0x003");

    } else if(empty($riesgo) || $riesgo == "none"){
        //Mensaje Invalido
        header("location: ../?page=siniestro&rta=0x006");

    } else {

        $mail = new PHPMailer\PHPMailer\PHPMailer;

        $mail ->Host = "smtp.gmail.com"; //Host de mensajeria del servidor
        $mail ->isSMTP();//analiza si se trata de un servidor email valido
        $mail ->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; //Corrobora que el servidor de email funcione
        $mail ->Port = 587;

        $mail ->SMTPAuth = true; //indica que pueda loguearse
        $mail ->Username = "asesores.smc@gmail.com";
        $mail ->Password = "SandraSmc_13";

        $mail ->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;//Tipo de encriptacion TLS
        $mail ->isHTML();

        $mail ->Body = "<h1>Detalle del siniestro</h1>\r\n"; //Cuerpo del mensaje en HTML, el AltBody es sin etiquetas
        $mail ->Body.= "<p><strong>Nombre:</strong> " . $nombre . "</p>";
        $mail ->Body.= "<p><strong>E-Mail:</strong> " . $email . "</p>";
        $mail ->Body.= "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
        $mail ->Body.= "<p><strong>Riesgo:</strong> " . $riesgo . "</p>";
        $mail ->Body.= "<p><strong>Mensaje:</strong></p>";
        $mail ->Body.= "<blockquote>" . $comentarios . "</blockquote>";
        $mail ->Subject = "Siniestro - " . $nombre;
        $mail ->addAddress("asesores.smc@gmail.com", "Email de pruebas");//A quien envio el mail
        $mail ->addAddress("gonzalomasana95@gmail.com", "Email de pruebas");//A quien envio como 2do destinatario
        $mail ->addReplyTo($email, $nombre);
        $mail ->setFrom("asesores.smc@gmail.com","Pruebas");
        $mail ->send();

        header("Location: ../?page=mensajenviado");
    }    
} else {
    header("Location: ../?page=siniestro");
}

?>
