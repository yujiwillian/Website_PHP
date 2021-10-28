<?php
function sendMail($para,$de,$mensagem,$assunto)
{
	$de=$_POST["email"];
	$mensagem=$_POST["mensagem"];
    //DADOS SMTP
    $smtp = "mail.yahoo.com.br";
    $usuario = "betacitysite@yahoo.com.br";
    $senha = "L0c41h05t";

    require_once 'smtp.php';
	$para=$usuario;
    $mail = new SMTP;
    $mail->Delivery('relay');
    $mail->Relay($smtp, $usuario, $senha, 25, 'login', false);
    $mail->TimeOut(10);
    $mail->Priority('high');
    $mail->From($de);
    $mail->AddTo($para);
    $mail->Html($mensagem);

    if($mail->Send($assunto))
        return true;
    else
        return false;
} 
?>