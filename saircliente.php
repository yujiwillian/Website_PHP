<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Sair</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>

<?php

ob_start(); //inicia a sessão que foi aberta


//Variaveis abaixo que permite destruir a session
$loga=$_SESSION_destroy['logado'];
$loginy=$_SESSION_destroy['nome_cliente'];
$codcliente=$_SESSION_destroy['cod_cliente'];

session_unset(); //limpamos as variaveis globais das sessões



echo "<script>alert('Você saiu!')</script>"; //inclui para uma certa página
include'logincliente.html';



?>
</body>
</html>