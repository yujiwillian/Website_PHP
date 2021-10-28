<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Games</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<!--Estilo css usado na página-->
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 325px;
height: 600px;
float:left;
position:relative;
	
}

</style>
</head>

<body>

<?php
// sessão
ob_start(); 
//Metodo post e variaveis
$ver=$_POST["BOT"];
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
//Conexão com o banco de dados
$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity"); 

		 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

$comando="SELECT * FROM tb_produto WHERE cod_categoria=4"; //Define o script do filtro do busca";
       $resulta=mysql_query($comando); //Executa o filtro
        $p=0;
		//Imprimi o resultado
        while($registro=mysql_fetch_array($resulta))
		{
	echo "<div class=tudo>";
	echo "<tr>";
echo "<form name=fox action=compra.php  method=POST>";
echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
 echo "<td><center>"; echo "<img src=produtos/$registro[2] width=200 heigth=200>";echo "</center></td><p></p>"; 
	echo "<td><center>"; echo"<strong>". $registro[1];echo "</strong></center></td><p></p>"; 
	echo "<td><center>"; echo $registro[13];echo "</center></td><p></p>"; 
	echo "<td><center>"; echo "<strong>Ano:</strong> ".$registro[5];echo "</center></td><p></p>"; 
    echo "<td><center>"; echo "<strong>Preço: R$</strong> ".$registro[8];echo "</center></td><p></p>"; 
	echo "<td><center>"; echo "<strong>Estoque na loja:</strong> ".$registro[9];echo "</center></td><p></p>"; 
  echo "<td><center>"; echo "<input type=image name=BOT2  src=carrinho1.png width=100 height=50 id=BOT2 value=COMPRAR>";echo "</center></td>"; 
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";

echo "</form>";
    echo "</tr>";
echo "<form name=fo action=visualiza.php  method=POST>";
	echo "<td><center>";echo "<input type=image name=BOT  src=visualiza.png width=150 height=50 id=BOT2 value=VISUALIZAR>";echo "</center></td>";
	echo "<input name=txtcod id=logcod  type=hidden value=$registro[0]>";
	echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodv id=logv  type=hidden value=$codv>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";

echo "</form>";
    echo "</tr>";
	echo "</div>";

}


echo "</table>";

//Finaliza a conexão
$close = mysql_close($conn);

?>
</body>
</html>