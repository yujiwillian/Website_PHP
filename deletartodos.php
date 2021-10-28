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
	$codcliente=$_POST['txtcodcliente'];
	$codx=$_POST['txtcodproduto'];
	$codca=$_POST['txtcodcarrinho'];
    $comando="DELETE FROM tb_carrinho WHERE cod_cliente=$codcliente";
    //Define a variavel comando com o script do insert do sql, se o 
    //Campo é caracter é necessário o ' 
    $resulta=mysql_query($comando); //Executa o comando mysql
    
    if($resulta!=0) { //Se a variável resulta for diferente de 0 conseguiu incluir
        echo"<script>alert ('Foram todos deletados, atualize a página');</script>";
		echo"<script>history.back(-1);</script>";
        }
       else
       {
        echo"<script>alert('Não foi deletado');</script>";
        echo"<script>history.back(-1);</script>";
        }
		
		$comando2= "DELETE FROM tb_item WHERE cod_cliente=$codcliente";
$resulta2 = mysql_query($comando2);
		
         $close=mysql_close($conn); 
?>
</body>
</html>