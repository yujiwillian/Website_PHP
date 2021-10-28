<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Carrinho</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">


<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 660px;
height: 100%;
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

#del
{
	background-color:#000000;
	color:#FF9900;
	width:200px;
	height:30px;
}

#del:active
{
	background-color:#FF6600;
	color:#000000;
}

#del:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#delt
{
	background-color:#000000;
	color:#FF9900;
	width:250px;
	height:30px;
}

#delt:active
{
	background-color:#FF6600;
	color:#000000;
}

#delt:hover
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
$logx=$_POST["txtlog"];
$codx=$_POST["txtcod2"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];;
$nomex=$_POST["txtnome"];

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

$comando= "SELECT * FROM tb_carrinho WHERE cod_cliente=$codcliente ";
$resulta = mysql_query($comando);
$p=0;

while ($registro = mysql_fetch_array($resulta))
{
	echo "<tr>";
echo "<form name=fox action=deletacodcompra.php  method=POST>"; 
	echo "<center><td>"; echo '<strong>Nome: '.$registro[4]; echo "<p></p></strong></td></center>";
	echo "<center><td>"; echo '<strong>Preço: R$ '.$registro[5];echo "<p></p></strong></td></center>"; 
    echo "<center><td>"; echo '<strong>Quantidade: '.$registro[3];echo "<p></p></strong></td></center>"; 
	echo "<input name=txtcodproduto id=codprod  type=hidden value=$codx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codcli  type=hidden value=$codcliente>";

echo "<input name=txtcodcarrinho id=codca  type=hidden value=$registro[0]>";
echo "</tr>";
	echo "<tr><td>"; echo "<input type=submit name=deletar value='DELETAR PRODUTO' id=del>";echo "<p></p></td>";
echo "</form>";
    echo "</tr>";

}

echo "</table>";

$comando2= "SELECT SUM(preco_carrinho) AS TOT FROM tb_carrinho WHERE cod_cliente=$codcliente";
$resulta2 = mysql_query($comando2);
while ($registro2 = mysql_fetch_array($resulta2))
{
echo "<form name=foins action=verificarfim.php method=post>";
echo   "<br><br>
                                                                                  <center><strong>Total da compra : R$".$registro2 [0];												  
 echo "</strong></center><input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codcli  type=hidden value=$codcliente>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$registro2[0]>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "<input name=botao id=btn2 type=image value='FINALIZAR A COMPRA' src=confirm.png width=150>" ;
echo "</form>";
echo "<form name=delt action=deletartodos.php method=post>";
	echo "<td>"; echo "<input type=submit name=deletart value='DELETAR TODOS OS PRODUTOS' id=delt>";echo "<p></p></td>"; 
	echo "<input name=txtcodproduto id=codprod  type=hidden value=$codx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codcli  type=hidden value=$codcliente>";
	echo "</form>";
}


	
	echo "<form name=foi action=produto.php method=post>";
$_SESSION['logado']=1;
$_SESSION['nome_cliente']=$loginy;
$_SESSION['cod_cliente']=$codcliente;
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codcli  type=hidden value=$codcliente>";
	echo "<input name=txtquantp id=quantp  type=hidden value=$quantp>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<p></p><input name=botaof id=btn3 type=image value='CONTINUAR A COMPRAR' src=cont.png>" ;
	echo "</form>";
	echo "</div>";
}
else
{
	echo "<script>alert ('Você não está logado para acessar essa página')</script>";
	echo "<script>history.back(-1)</script>";
}
	$close = mysql_close($conn);
?>
</body>
</html>