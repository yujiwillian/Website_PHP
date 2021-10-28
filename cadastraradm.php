<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cadastrando ADM</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
        <?php

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];




$host = "localhost";
$user = "root";
$pass = "";
$banco = "betacity";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>


<?php
//Conecta o servidor LOCALHOST com o usuario ROOT
//Abrir o banco de dados 
//Variaveis que conduzem ao funcionamento do arquivo php
	$ver=$_POST["BOT1"];
	$senfunc=$_POST["txtsenhaadm"];
    $usfunc=$_POST["txtusuarioadm"]; 
    if ($ver=="CADASTRAR ADM")
	{
	//Define a variavel comando com o script do insert do sql 
    $comando="INSERT INTO tb_adm(sen_func,us_func) VALUES ('$senfunc','$usfunc')";
	
    //Executa o comando mysql
	
    $resulta=mysql_query("$comando");
	 
    //Se a variável resulta for diferente de 0 conseguiu incluir
	
    if($resulta!=0) { 
        echo"<script>history.go(-1);alert('Foi cadastrado com sucesso!')</script>";
	}
       else
	   
       echo"<script>history.go(-1);alert('Não foi cadastrado!')</script>";
	       
	}
	
	else
	{
		if ($ver=="DELETAR ADM")
		  $comando="DELETE FROM tb_adm WHERE us_func='$usfunc' AND sen_func='$senfunc'";
	
    //Executa o comando mysql
	
    $resulta=mysql_query("$comando");
	 
    //Se a variável resulta for diferente de 0 conseguiu incluir
	
    if($resulta!=0) { 
        echo"<script>history.go(-1);alert('Foi deletado com sucesso!')</script>";
	}
       else
	   
       echo"<script>history.go(-1);alert('Não foi deletado!')</script>";
	       
	}

?>
</body>
</html>