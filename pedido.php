<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Produtos</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 660px;
height: 800px;
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
	
	$codx=$_POST["txtcod2"];
$quantx=$_POST["txtquantp"];

$comando= "SELECT * FROM tb_produto WHERE cod_produto=$codx";



$resulta = mysql_query($comando);
$p=0;
while($registro = mysql_fetch_array($resulta))
{
if ($quantx>$registro[9])

{

echo "<script>history.back(-1); alert('Quantidade insuficiente');</script>";
}

else
{
 echo "<form name=focompra action=insere.php method=post>"; 
 echo "<input name=txtcod2 id=codx  type=hidden value=$codx>";
	echo "<center><td>"; echo "<img src=produtos/$registro[2] width=200 heigth=200>";echo "</td></center><p></p>"; 
	echo "<center><td><strong>"; echo $registro[1];echo "</strong></td></center><p></p>";echo "<input name=txtnome id=codn  type=hidden value=$registro[1]>";
	echo "<center><td><strong>"; echo $registro[13];echo "</strong></td></center><p></p>"; 
	echo "<center><td>"; echo "<strong>Ano:</strong> ".$registro[5];echo "</td></center><p></p>"; 
    echo "<center><td>"; echo "<strong>Por: R$</strong> ".$registro[8];echo "</td></center><p></p>"; 
	echo "<center><td>"; echo "<strong>Estoque na loja:</strong> ".$registro[9];echo "</td></center><p></p>"; 
    $total=$quantx*$registro[8];
     echo " <center><strong>Quantidade Pedida </strong>".$quantx." </center><br>" ;
      echo " <center><strong>Valor total: R$</strong> ".$total."</center><br>" ;
      echo "<input name=txttotal id=tot  type=hidden value=$total>";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codcli type=hidden value=$codcliente>";
      echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
	  	 echo "<input name=txtquantprod id=quantprod  type=hidden value=$registro[9] >";
      echo "<center><input name=botao id=btn2 type=image src=confirm.png value=CONFIRMAR width=150></center>" ;
  echo "</form>";
  echo "<center><input id=Button1 type=image src=voltar.png value=VOLTAR onclick=history.back(-1) width=100></center>";
  echo "</div>";
}
}
echo "</table>";

$close = mysql_close($conn);


}
else
	{echo "<script> alert('Você não esta logado');</script>";
include "logincliente.html";
	}

?>
</body>
</html>
