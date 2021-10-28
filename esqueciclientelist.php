<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Esqueci usuário ou senha</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">

<style type="text/css">
		.tudo {
	background:#F60;
	border-radius: 10px;
	border:#000 double 4px;
	margin: 20px 6 0 10px;
	width: 679px;
	height: 584px;
	float:left;
	position:relative;
}
</style>
</head>

<body>
<?php
$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity"); 

		 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 


$email=$_POST['email'];
$comando= "SELECT * FROM tb_cliente WHERE email_cliente='$email'";
$resulta = mysql_query($comando);
$p=0;
echo "<div class=tudo>";
echo "<table border=0 cellspacing=1 align=center>";
echo "<tr bgcolor=#00000 style=color:white>";
echo "	<td> Seu email </td>";
echo"	<td> Seu usuário </td>";
echo"	<td> Sua senha </td>";
echo "</tr>";
while ($registro = mysql_fetch_array($resulta))
  {
            echo"<tr>";
            echo"<td><center>";echo$registro[4];echo"</center></td>";
            echo"<td><center>";echo$registro[2];echo"</center></td>";
            echo"<td><center>";echo$registro[3];echo"</center></td>";
            echo"</tr>";
            }
            echo"</table>";
			
        echo "</div>";
		
			 $close=mysql_close($conn);   
?>
</body>
</html>