<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Deletar Comentário</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<?php
ob_start(); 
$loginy=$_POST["txtlogin"];
$codx=$_POST["txtcod"];
$comentar=$_POST["txtcomentar"];
$comm=$_POST["txtcodcomm"];

$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity");

$comando= "DELETE FROM tb_comentario WHERE cod_comentario=$comm";
$resulta = mysql_query($comando);

if ($resulta!=0)
{
	echo "<script>history.back(-1);alert('Foi apagado')</script>";
}
else
{
	echo "<script>history.back(-1);alert('Não foi apagado')</script>";
}

$close=mysql_close($conn); 
?>
</body>
</html>