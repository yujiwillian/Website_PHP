<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BetaCity ADM - Consultas de Produtos</title>
<link rel="stylesheet" type="text/css" href="style_verificar.css" /><!--Utilizando o estilo CSS-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
echo" Bem vindo $logado , Obs:Para pesquisar todos produtos deixe a caixa em branco.";
?>
<p>
<form name="verificar" action="verificarproduto.php" method="post">
<p>
<input id="Text0" name="txtnome" type="text" />
<input id="button" name="BOT1" type="submit" value="PESQUISAR" />
<input id="button" name="RESET" type="reset" value="LIMPAR" />
</form>
<p>
</div>





<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>