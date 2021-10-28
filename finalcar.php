<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?
ob_start(); 
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$codx=$_POST["txtcodproduto"];
$quantx=$_POST["txtquantp"];
$total=$_POST["txttotal"];;
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
$tc=$_POST["txttc"]; 
$nt=$_POST["txtnt"]; 
$num=$_POST["txtnum"]; 
$cods=$_POST["txtcods"]; 

$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity"); 

		 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

 $comando= "INSERT INTO tb_cartao(tipo_cartao,nome_cartao,numero_cartao,codigo_cartao,cod_cliente) VALUES ('$tc','$nt','$num','$cods',$codcliente)";
$resulta = mysql_query($comando);

if ($resulta!=0)
{
	echo "<script>alert('O seu pagamento foi incluido')</script>";
	include 'verpedido.php';
}
else
{
	echo "<script>alert('Não foi incluido')</script>";
	echo "<script>history.back(-1)</script>";
}
?>
</body>
</html>