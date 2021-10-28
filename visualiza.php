<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Visualizar Produto</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<!--CSS na página-->
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 325px;
height: 984px;
float:left;
position:relative;
overflow:auto;
	
}
.coment {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 325px;
height: 928px;
float:left;
position:relative;
overflow:auto;
	
}

.tab {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 325px;
height: 100px;
float:left;
position:relative;
overflow:auto;
	
}
</style>


</head>


<body>
<?php
ob_start();  
$ver=$_POST["BOT"];
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$codx=$_POST["txtcod"];
$loga=$_SESSION['logado'];


$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity");
if((!isset ($_SESSION[$loginy]) == true) and (!isset ($_SESSION[$loginy]) == true)) { unset($_SESSION[$loginy]);} $logado = $_SESSION[$loginy];
			 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 
           $codx=$_POST["txtcod"];
          $comando="SELECT * FROM tb_produto WHERE cod_produto=$codx"; //Define o script do filtro do busca
        $resulta=mysql_query($comando); //Executa o filtro
        $p=0;
      
        while($registro=mysql_fetch_array($resulta))
        {
			echo "<div class=tudo>";
			echo "<form name=focompra action=compra.php  method=post>"; 
			
			echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
            	echo "<td><center>"; echo "<img src=produtos/$registro[2] width=200 heigth=200>";echo "</center></td><p></p>"; 
	echo "<td>"; echo "<strong>Nome:</strong> ".$registro[1];echo "</td><p></p>"; 
	echo "<td>"; echo "<strong>Gênero:</strong> ".$registro[13];echo "</td><p></p>"; 
	echo "<td>"; echo "<strong>Ano:</strong> ".$registro[5];echo "</td><p></p>"; 
    echo "<td>"; echo "<strong>Preço: R$</strong> ".$registro[8];echo "</td><p></p>"; 
	echo "<td>"; echo "<strong>Estoque na loja:</strong> ".$registro[9];echo "</td><p></p>"; 
	echo "<td>"; echo "<strong>Criador/Autor/Produtor/Artista: </strong>".$registro[3];echo "</td><p></p>";
	echo "<td>"; echo "<strong>Desenvolvedor/Editora/Produtora/Gravadora:</strong> ".$registro[4];echo "</td><p></p>";
	echo "<td>"; echo "<strong>Unidade de medida:</strong> ".$registro[6];echo "</td><p></p>";
	echo "<td>"; echo "<strong>Descrição:</strong> ".$registro[7];echo "</td><p></p>";
  echo "<td><center>"; echo "<input type=image name=BOT2  src=carrinho1.png width=100 height=50 id=BOT2 value=COMPRAR>";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente><p></p>";
echo "</form>";	
echo "</div>";

			
		
			
            }
		if ($codcliente!=0 || $logado!=0)
		{
				echo "<div class=coment>";
			echo "<h1>Comente:</h1>";
			echo "<form name=vis action=comentar.php method=post>";
			echo "<strong>Nome: </strong>";echo "<input name=txtusuario id=usu  type=text value=$loginy><p></p>";
 echo "<strong>Comentário: </strong>";echo "<textarea name=txtcomentar style=width:200px height:600px></textarea><p></p>";
 echo "<input name=comentar type=submit value=Comentar>";
 echo "<input name=reset value=Apagar type=reset>";
 echo "<input name=txtcod id=logy  type=hidden value=$codx>";
echo "<input name=txtlogin id=login  type=hidden value=$loginy>";
 echo "</form>";
 $comando3="SELECT * FROM tb_comentario WHERE cod_produto=$codx"; //Define o script do filtro do busca
        $resulta3=mysql_query($comando3); //Executa o filtro
        $p=0;
      
        while($registro3=mysql_fetch_array($resulta3))
		{
			echo "<strong>Nome:</strong> ".$registro3[2]."<p></p>";
            	echo "<strong>Comentário:</strong> ". $registro3[3]."<p></p>";
				echo "<form name=delc action=deletarcomentar.php method=post>";
				echo "<input name=txtcodcomm id=codcomm  type=hidden value=$registro3[0]>";
				echo "<input name=del value=Deletar type=submit>";
				 echo "<input name=txtcod id=logy  type=hidden value=$codx>";
echo "<input name=txtlogin id=login  type=hidden value=$loginy>";
 echo "</form>";
 echo "</div>";
		  }
			} 
		  else
		  {
          $comando2="SELECT * FROM tb_comentario WHERE cod_produto=$codx"; //Define o script do filtro do busca
        $resulta2=mysql_query($comando2); //Executa o filtro
        $p=0;
		
		echo "<div class=tab>";
			echo "<h1>Comentários:</h1>";
			echo "</div>";
      
        while($registro2=mysql_fetch_array($resulta2))
		{
			
			
			echo "<div class=coment>";
			echo "<strong>Nome:</strong>".$registro2[2]."<p></p>";
            	echo "<strong>Comentário:</strong>". $registro2[3]."<p></p>";
		  }
		  }
		  
echo "</table>";
echo "</div>";
$close = mysql_close($conn);

?>
</body>
</html>
