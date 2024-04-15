<?php

include "phpmailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

$mail->isSMTP();       
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587;   
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'tls';  
$mail->Username = 'cerrajeriamasterkey12@gmail.com';   
$mail->Password = 'vkvn olyf xlbm gdhx';  

$mail->setFrom('cerrajeriamasterkey12@gmail.com', 'Cerrajeria MasterKey');
$mail->addAddress($_POST['email'], $_POST['nombre']);     // Add a recipient
$mail->addReplyTo('cerrajeriamasterkey12@gmail.com', 'Cerrajeria MasterKey');

$mail->isHTML(true);   

$mail->Subject = 'Confirmación de cita. MasterKey';
$mail->Body    = '<b>Nombre: </b>'.$_POST['nombre'].'<br><b>Email: </b>'.$_POST['email'].'<br><b>Celular: </b>'.$_POST['celular'].'<br><b>Horario: </b>'.$_POST['horario'].'<br><b>Su cita ha sido agendada. Nos contactarémos con usted en la brevedad de lo posible</b>';


if(!$mail->send()) {
    echo 'Algo salio mal intentalo de nuevo';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    echo '
    <script>
      alert("Gracias por contactarnos, nosotros nos comunicamos contigo a la brevedad.");
      location.href="index.php";
    </script>
  ';
    echo 'Gracias '.$_POST['nombre'].' por contactarnos, nosotros nos comumnicamos contigo a la brevedad.';
}

?>