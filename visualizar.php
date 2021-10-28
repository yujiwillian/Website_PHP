<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BetaCity ADM - Consultas de Produtos</title>
<link rel="stylesheet" type="text/css" href="style_visualizar.css" /><!--Utilizando o estilo CSS-->
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

// Esse bloco de código em php verifica e  

$host = "localhost";
$user = "root";
$pass = "";
$banco = "betacity";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die (mysql_error());

mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8');
?>

<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a indexadm.php. */
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { unset($_SESSION['login']); unset($_SESSION['senha']); header('location:indexadm.php'); } $logado = $_SESSION['login'];

echo" Bem vindo $logado , Obs:Para pesquisar todos produtos deixe a caixa em branco.";?>
<form name="verificar" action="verificarproduto.php" method="post">
<p>
<input id="Text0" name="txtnome" type="text" />
<input id="button" name="BOT1" type="submit" value="PESQUISAR" />
<input id="button" name="RESET" type="reset" value="LIMPAR" />
</form>

<?php

$conn=mysql_connect("localhost","root","")or die("Não Conectado"); 
mysql_select_db("betacity");


$codx=$_POST["txtcod"];
$comando="SELECT * FROM tb_produto WHERE cod_produto=$codx";
 //Define o script do filtro do busca
 
        $resulta=mysql_query($comando); //Executa o filtro
        $p=0;
      
    while($registro=mysql_fetch_array($resulta))
        {
echo "<form name=focompra id=form action=deletarprod.php  method=post>"; 
	echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
   	echo "<td>"; echo "<img src=produtos/$registro[2] width=200 heigth=200>";
	echo "</td><p></p>";
	echo "<td>"; echo "Nome: ".$registro[1];echo "</td><p></p>"; 
	echo "<td>"; echo "Gênero: ".$registro[13];echo "</td><p></p>"; 
	echo "<td>"; echo "Ano: ".$registro[5];echo "</td><p></p>"; 
    echo "<td>"; echo "Preço: R$ ".$registro[8];echo "</td><p></p>"; 
	echo "<td>"; echo "Estoque na loja: ".$registro[9];echo "</td><p></p>"; 
	echo "<td>"; echo "Criador/Autor/Produtor/Artista: ".$registro[3];echo "</td><p></p>";
	echo "<td>"; echo "Desenvolvedor/Editora/Produtora/Gravadora: ".$registro[4];
	echo "</td><p></p>";
	echo "<td>"; echo "Unidade de medida: ".$registro[6];echo "</td><p></p>";
	echo "<td>"; echo "Descrição: ".$registro[7];echo "</td><p></p>";
	echo "<td>"; echo "<input id=button_voltar type=submit name=BOT2  value='DELETE' id=BOT2>";	echo "</td>"; 
echo "</form>";
	echo "</table>";
	echo "<br>";
	
echo "<form name=form_voltar id=form action=admproduto.php method=post >"; 
	echo "<input id=button_voltar type=submit value=VOLTAR >";
echo "</form>";	
            }
	
?>


</div>

</body>
</html>