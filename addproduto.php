<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>BetaCity ADM - Cadastro de Produto</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style_cadastro.css" /><!--Utilizando o estilo CSS-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        
</head>

<body>
<div class="tudo">
<div class="banner" align="center">
</div>

<div class="conteudo" align="left">
<div class="menu">
<ul id="MenuBar1" class="MenuBarHorizontal">
<li><center><a href="addadm.php">CADASTRAR ADM</a></center></li>
  <li><center><a href="addproduto.php">CADASTRO DE PRODUTO</a></center></li>
  <li><center><a href="admproduto.php">CONSULTAS DE PRODUTOS</a></center></li>
<li><center><a href="logoutadm.php">SAIR</a></center></li>
</ul>
</div>
<p>
<?php 
echo"<center> Bem vindo $logado</center>";
?>
<p>
<form name="FORMPRODUTOS" id="form" action="cadastrarproduto.php" style="padding-left:10px;"
method="post" enctype="multipart/form-data">
CÓDIGO DA CATEGORIA:
<input id="Text0" name="txtcodcat" type="text" />
NOME DO PRODUTO:
<input id="Text1" name="txtnomeprod" type="text" />
<p>

<p>GENERO DO PRODUTO:
<input id="Text12" name="txtgeneroprod" type="text" />
FOTO DO PRODUTO:
<input name="fotoprod" type="file" id="Text2" maxlength="900"/>
<p>

<p>CRIADOR/AUTOR/PRODUTOR/ARTISTA DO PRODUTO:
<input id="Text3" name="txtcriadorprod" type="text" />
<p>
<p>DESENVOLVEDOR/EDITORA/PRODUTORA/GRAVADORA:
<input id="Text4" name="txtdesenvolvedorprod" type="text" />
<p>

<p>ANO DO PRODUTO:
<input id="Text5" name="txtanoprod" type="text" />
UNIDADE DE MEDIDA DO PRODUTO:
<input id="Text6" name="txtunimedprod" type="text" />
<p>

<p>DESCRIÇÃO DO PRODUTO:
<p><textarea id="TextArea1" name="txtdescprod" cols="105" rows="3"></textarea>
<p>

<p>PREÇO DO PRODUTO:
<input id="Text8" name="txtprecoprod" type="text" />
ESTOQUE DO PRODUTO:
<input id="Text9" name="txtestoqueprod" type="text" />
<p>

<p>CÓDIGO DO FUNCIONÁRIO:
<input id="Text10" name="txtcodfunc" type="text" />
CÓDIGO DO FORNECEDOR:
<input id="Text11" name="txtcodforn" type="text" />
<p>

<center><strong><input id="button" name="BOT1" type="submit" value="CADASTRAR PRODUTO" />
</strong></center>
<p>
</form>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>