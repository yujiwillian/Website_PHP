<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Boleto</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>

<?php
ob_start();
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
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
$formpgto=$_POST["boleto"];
$frete=$_POST["txtfrete"];
$est=$_POST["txtquantprod"]; 

$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity"); 
	 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

//soma todos os precos do pedido
$total=$totalx+$frete;

$dias_de_prazo_para_pagamento=7;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400)); 
$data_compra = date("d/m/Y");

$comando="INSERT INTO tb_venda(cod_pagamento,cod_cliente,uf_frete,complemento_venda,cep_venda,cidade_venda,end_venda,data_compra,data_vencimento) VALUES ($formpgto,$codcliente,'$uf','$comp','$cep','$cid','$end','$data_compra','$data_venc')";
$resulta = mysql_query($comando);



//insere os dados na tabela pagamento


include "boleto_sicredi.php";
$close = mysql_close($conn);
?>
</body>
</html>