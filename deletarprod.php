
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Deletar</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>

<?php
$conn=mysql_connect("localhost","root","")or die("Não Conectado"); //Conecta o servidor LOCALHOST com o usuario ROOT
mysql_select_db("betacity"); //Abrir o banco de dados
	$loginy=$_POST['txtlogin'];
	
	$codx=$_POST['txtcod'];
	$comando="DELETE FROM tb_produto WHERE cod_produto=$codx";
    //Define a variavel comando com o script do insert do sql, se o 
    //Campo é caracter é necessário o ' 
    $resulta=mysql_query($comando); //Executa o comando mysql
    
    if($resulta!=0)  //Se a variável resulta for diferente de 0 conseguiu incluir
	header("Location: admproduto.php");
		exit;		 
?>

</body>
</html>