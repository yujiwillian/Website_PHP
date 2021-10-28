<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Comentário</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<?php
ob_start(); 
$loginy=$_POST["txtlogin"];
$codx=$_POST["txtcod"];
$comentar=$_POST["txtcomentar"];

$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity");

$comando= "INSERT INTO tb_comentario(usuario_cliente,cod_produto,comentario) VALUES ('$loginy',$codx,'$comentar')";
$resulta = mysql_query($comando);

if ($resulta!=0)
{
	echo "<script>history.back(-1);alert('Foi inserido')</script>";
}
else
{
	echo "<script>history.back(-1);alert('Não foi inserido')</script>";
}

$close=mysql_close($conn); 
?>
</body>
</html>