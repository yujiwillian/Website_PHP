<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
Session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>BetaCity ADM - Cadastro de Produto</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style_adm.css" /><!--Utilizando o estilo CSS-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<style type="text/css">
        #Submit1
        {
	width: 189px;
	height: 30px;
	top: 460px;
	left: 263px;
        }
		 #Text0
        {
	width: 100px;
	top: 38px;
	left: 423px;
        }
	      
		</style>
        
</head>

<body>
<div class="banner" align="center">
</div>
<div class="conteudo" align="center">
<div class="menu" align="center">
<ul id="MenuBar1" class="MenuBarHorizontal">
<li><center><a href="addadm.php">CADASTRAR ADM</a></center></li>
  <li><center><a href="addproduto.php">CADASTRO DE PRODUTO</a></center></li>
  <li><center><a href="admproduto.php">CONSULTAS DE PRODUTOS</a></center></li>
<li><center><a href="logoutadm.php">SAIR</a></center></li>
</div>
<?php 
echo" Bem vindo $logado";
?>
<form name="FORMPRODUTOS" action="cadastraradm.php" method="post" >
<br /> ADMINISTRADOR: <center>
<input  name="txtusuarioadm" type="text"/>
<p>
<p>SENHA: <center>
<input name="txtsenhaadm" type="password" id="Text1" />
<p>
<input id="button" name="BOT1" type="submit" value="CADASTRAR ADM" />
<p>
<input id="but" name="BOT1" type="submit" value="DELETAR ADM" /> 
<p>
</form>
</div>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>