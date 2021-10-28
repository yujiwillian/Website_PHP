<?php
ob_start();
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$codx=$_POST["txtcodproduto"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];;
$nomex=$_POST["txtnome"];
$est=$_POST["txtquantprod"]; 

$_SESSION['logado']=1;
$_SESSION['nome_cliente']=$loginy;
$_SESSION['cod_cliente']=$codcliente;
if ($botao=="FINALIZAR A COMPRA")
{
include "confirmar.php";
}
else
if ($botaof=="CONTINUAR A COMPRAR")
{
include "produto.php";
}
?>