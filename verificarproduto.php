<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
// sessão
ob_start();// inicializa a session
       
// echo "Bem vindo $logx seu codigo é $loginy";

$host = "localhost";
$user = "root";
$pass = "";
$banco = "betacity";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die (mysql_error());

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];

echo" Bem vindo $logado , Obs:Para pesquisar todos produtos deixe a caixa em branco.";?>
<p>
<form name="verificar" action="verificarproduto.php" method="post">
<p>
<input id="Text0" name="txtnome" type="text" />
<input id="button" name="BOT1" type="submit" value="PESQUISAR" />
<input id="button" name="RESET" type="reset" value="LIMPAR" />
</form>
<p>
<?php

	   $ver=$_POST["BOT1"]; //Acessa o VALUE do bot1
       $conn=mysql_connect("localhost","root","")or die("Não Conectado"); 
	   mysql_select_db("betacity");

if($ver=="PESQUISAR")
            {
       $nomex=$_POST["txtnome"];
	   $comando="SELECT * FROM tb_produto WHERE nome_produto LIKE '%$nomex%'"; //Define o script do filtro do busca";
       $resulta=mysql_query($comando); //Executa o filtro
       $p=0;
        while($registro=mysql_fetch_array($resulta))
		{
	echo "<tr>";
	echo "<br>";
echo "<form name=form id=form action=visualizar.php  method=POST>";
	 echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
 	 echo "<td>";
	 echo "<img src=produtos/$registro[2] width=200 heigth=200>";
	 echo "</td><p></p>"; 
	 echo "<input name=txtcod type=hidden value=$registro[0]>";
     echo "<input name=txtnome type=hidden value=$registro[1]>";
     echo "<input name=txtvalor type=hidden value=$registro[8]>";
     echo "<input name=txtquant type=hidden value=$registro[9]>";
     echo "<input name=txtfoto type=hidden value=$registro[2]>";
     echo "<td>";
	 echo "<input type=submit id=button name=BOT2  value='VISUALIZAR' id=BOT2>";
	 echo "</td>"; 
echo "</form>";
"<p>";
echo "<form name=form id=form action=deletarprod.php  method=POST>";
	echo "<td><input name=BOT id=button type=submit value='DELETAR' id=BOT></td>";
	echo "<input name=txtcod id=logcod  type=hidden value=$registro[0]>";
echo "</form>";

echo "<form name=form id=form action=atualizar.php method=post>";
    echo "<td><input name=bot2 id=button type=submit value=ALTERAR></td>";
	echo "<br>";
	echo "<input name=txtcod type=hidden value=$registro[0]>";
    echo "<br>Nome do produto: ";
	echo "<input name=txtnome type=text value=$registro[1]>";
    echo "<br>Valor do produto: ";
	echo "<input name=txtvalor type=text value=$registro[8]>";
    echo "<br>Quantidade do produto: ";
	echo "<input name=txtquant type=text value=$registro[9]>";
    echo "<br>Foto do produto: ";
	echo "<input name=txtfoto type=text value=$registro[2]>";
	echo "<p>";
	echo "<br>";
echo "</form>"; 
"</tr>";


}
	}

?>
				</div>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>

</body>
</html>