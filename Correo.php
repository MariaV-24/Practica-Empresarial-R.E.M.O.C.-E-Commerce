<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/*para jalar el nombre del campo especifico, vamos a colocar lo que pusimos en el  atributo NAME de cd campo*/
/*si estripamos en enviar  */
if (isset($_POST['enviar'])) {
    //si no esta vacio
    if (!empty($_POST['name']) && !empty($_POST['asunto']) 
        && !empty($_POST['msj']) &&!empty($_POST['correo'])) {
        
            $name = $_POST["name"];
            $correo = $_POST["correo"];
            $asunto = $_POST["asunto"];
            $msj = $_POST["msj"];
        
            $body = "Nombre: " . $name . "<br>Correo: " . $correo  . "<br>Asunto: " . $asunto . "<br>Mensaje: " . $msj;
        
			//Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

            // echo $body;
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

            //esto es para el accedo a la cuenta ↓
            $mail->Username   = 'gestionproyectosmusade@gmail.com';                     //SMTP username
            $mail->Password   = 'gestion2020';                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //esto es desde donde se le va enviar ↓
            $mail->setFrom('gestionproyectosmusade@gmail.com', $name);

            //esto es a quien se le va a enviar ↓
            $mail->addAddress('gestionproyectosmusade@gmail.com');     //Add a recipient

            //Content
            //Enviar correos en formato html
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "NUEVA CONSULTA DE LA TIENDA";
            $mail->Body    = $body;
            $mail->CharSet = 'UTF-8';

            if (isset($_POST['enviar'])){
                Header("Location: Contactenos.php");              
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Error al mandar el Correo. Mailer Error: {$mail->ErrorInfo}";
        }
            }
}


?>