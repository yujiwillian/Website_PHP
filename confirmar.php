<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Confirma Endereço</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 660px;
height: 670px;
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
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$est=$_POST["txtquantprod"]; 

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

$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$codx=$_POST["txtcodproduto"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];;
$nomex=$_POST["txtnome"];
$est=$_POST["txtquantprod"];

$comando="SELECT * FROM tb_cliente WHERE nome_cliente='$loginy'"; //Define o script do filtro do busca

                $resulta=mysql_query($comando); //Executa o filtro
                $p=0;
                
                while($registro=mysql_fetch_array($resulta))
                {  
				 echo "<form name=conen action=formpgto.php method=post>";
echo "<center><h1>CONFIRME SEU ENDEREÇO PARA ENTREGA</h1></center>";
echo "<center><p></p>UF: ";
echo "<input name=txtuf type=text value=$registro[19]>";
echo "<p></p>CIDADE: ";
echo "<input name=txtcidade type=text value=$registro[12]>";
echo "<p></p>ENDEREÇO: ";
echo "<input name=txtend type=text value=$registro[10]>";
echo "<p></p>COMPLEMENTO: ";
echo "<input name=txtcomplemento type=text value=$registro[14]>";
echo "<p></p>CEP: ";
echo "<input name=txtcep type=text value=$registro[13]>";
echo "<p></p>TELEFONE: ";
echo "<input name=txttel type=text value=$registro[18]>";
echo "<p></p><input type=image src=confirm.png name=button id=ir value=CONFIRMAR width=200/>";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "</form>";
				}
				echo "<form name=conen action=vercarrinho.php method=post>";
				echo "<input name=botaoc id=btnc type=image src=canc.png width=200 value='CANCELAR'>" ;
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "</form>";
$close = mysql_close($conn);
}
else
	{echo "<script> alert('Você não esta logado');</script>";
include "logincliente.html";
	}

?>

</body>
</html>