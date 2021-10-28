<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Formas de pagamento</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 660px;
height: 584px;
float:left;
position:relative;
	
}

#sair
{
	background-color:#000000;
	color:#FF9900;
	width:50px;
	height:30px;
}

#sair:active
{
	background-color:#FF6600;
	color:#000000;
}

#sair:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#editar
{
	background-color:#000000;
	color:#FF9900;
	width:200px;
	height:30px;
}

#editar:active
{
	background-color:#FF6600;
	color:#000000;
}

#editar:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#pedido
{
	background-color:#000000;
	color:#FF9900;
	width:70px;
	height:30px;
}

#pedido:active
{
	background-color:#FF6600;
	color:#000000;
}

#pedido:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#carrinho
{
	background-color:#000000;
	color:#FF9900;
	width:80px;
	height:30px;
}

#carrinho:active
{
	background-color:#FF6600;
	color:#000000;
}

#carrinho:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

</style>

</head>

<body>
<?php
ob_start(); 
$ver=$_POST["BOT2"];
$logx=$_POST["txtlog"];
$codcliente=$_POST["txtcodcliente"];
$est=$_POST["txtquantprod"];
$button=$_POST["button"];
$botaoc=$_POST["botaoc"];
$loginy=$_POST["txtlogin"];
$codx=$_POST["txtcodproduto"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];;
$nomex=$_POST["txtnome"];
$uf=$_POST["txtuf"];
$cid=$_POST["txtcidade"];
$end=$_POST["txtend"];
$comp=$_POST["txtcomplemento"];
$cep=$_POST["txtcep"];
$tel=$_POST["txttel"];

if ($loginy)
{
	
	echo "<div class=tudo>";


$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");

mysql_select_db("betacity");
	 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

echo "Olá, ".$loginy."  ";


echo "<form name=sair action=saircliente.php method=POST>";
echo "<input type=submit name=sair id=sair value=SAIR />";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
echo "</form>";
echo "<form name=editar action=editarcliente.php method=POST>";
echo "<input type=submit name=editar id=editar value='ALTERAR A MINHA CONTA' />";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
echo "</form>";

	echo "<form name=fon action=verpedido.php method=post>";

	echo "<input type=submit name=pedido id=pedido value=PEDIDO />";
	echo "<input name=txtcod2 id=logx  type=hidden value=$codx>";
	echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
	echo "<input name=txttotal id=totx  type=hidden value=$totalx>";
	echo "<input name=txtlogin id=log  type=hidden value=$loginy>";
	echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
	echo "<input name=txtnome id=nomex  type=hidden value=$nomex>";
	echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
	echo "</form>";
	
		echo "<form name=fov action=vercarrinho.php method=post>";

	echo "<input type=submit name=carrinho id=carrinho value=CARRINHO />";
	echo "<input name=txtcod2 id=logx  type=hidden value=$codx>";
	echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
	echo "<input name=txttotal id=totx  type=hidden value=$totalx>";
	echo "<input name=txtlogin id=log  type=hidden value=$loginy>";
	echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
	echo "<input name=txtnome id=nomex  type=hidden value=$nomex>";
	echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
	echo "</form>";



//Se for CONFIRMAR irá imprimir o comando
if ($button=="CONFIRMAR")
{
$comando="UPDATE tb_cliente SET uf_frete='$uf',cidade2_cliente='$cid',endereco2_cliente='$end',complemento2_cliente='$comp',cep2_cliente='$cep',telefone2_cliente='$tel'";

 $resulta=mysql_query($comando); //Executa o comando mysql
    
		
		echo "<center><h1>FORMAS DE PAGAMENTO</h1></center>";
				$comando2="SELECT * FROM tb_frete WHERE uf_frete='$uf'";
		$resulta2 = mysql_query($comando2);
$p=0;
		while ($registro2 = mysql_fetch_array($resulta2))
{
		$comandoo="SELECT * FROM tb_pgto WHERE cod_pagamento=1";
		$resulta = mysql_query($comandoo);
$p=0;
		while ($registro = mysql_fetch_array($resulta))
{
	
		

	echo "<form name=pgto action=finalcompra.php method=POST>";
echo "<center>O valor do seu frete é ".$registro2[1]."<p></p>";
echo "<input name=txtfrete id=fre  type=hidden value=$registro2[1]>";
echo"<input type=radio name=boleto value=$registro[0]>Boleto";
echo "<input type=image name=button id=ir value=CONFIRMAR src=confirm.png width=150/>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtuf type=hidden value=$uf>";
echo "<input name=txtcidade type=hidden value=$cid>";
echo "<input name=txtend type=hidden value=$end>";
echo "<input name=txtcomplemento type=hidden value=$comp>";
echo "<input name=txtcep type=hidden value=$cep>";
echo "<input name=txttel type=hidden value=$tel>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "</center></form>";
}
		$comandooo="SELECT * FROM tb_pgto WHERE cod_pagamento=2";
		$resultaa = mysql_query($comandooo);
$p=0;
		while ($registrooo = mysql_fetch_array($resultaa))
		{
echo "<center><form name=pgto action=finalcompracar.php method=POST>";
echo "<input name=txtfrete id=fre  type=hidden value=$registro2[1]>";
echo"<input type=radio name=cartao value=$registrooo[1]>Cartão";
echo "<input type=image name=button id=ir value=CONFIRMAR src=confirm.png width=150/>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtuf type=hidden value=$uf>";
echo "<input name=txtcidade type=hidden value=$cid>";
echo "<input name=txtend type=hidden value=$end>";
echo "<input name=txtcomplemento type=hidden value=$comp>";
echo "<input name=txtcep type=hidden value=$cep>";
echo "<input name=txttel type=hidden value=$tel>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "</center></form>";
}
}
}
//Caso o botão seja CANCELAR, irá fazer a seguinte ação
else
if ($botaoc=="CANCELAR")
{
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantp>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
//Inclui a seguinte página
include "vercarrinho.php";
}
}
else
	{echo "<script> alert('Você não esta logado');</script>";
include "logincliente.html";
	}
?>

