
<?php
$conn=mysql_connect("localhost","root","")or die("Não Conectado"); //Conecta o servidor LOCALHOST com o usuario ROOT
mysql_select_db("betacity"); //Abrir o banco de dados

	$nomeprod=$_POST["txtnome"];
	$valorprod=$_POST["txtvalor"];
	$quantprod=$_POST["txtquant"];
	$fotoprod=$_POST["txtfoto"];
	$codclix=$_POST["txtcod"];
	
  $comando="update tb_produto set foto_produto='$fotoprod',nome_produto='$nomeprod',preco_produto=$valorprod,estoque_produto=$quantprod WHERE cod_produto=$codclix";    
// $comando="update tb_produto set foto_produto='ggg',nome_produto='hhhh',preco_produto=34,estoque_produto=255 WHERE cod_produto=2";
//Define a variavel comando com o script do insert do sql, se o 
    //Campo é caracter é necessário o ' 
    $resulta=mysql_query($comando); //Executa o comando mysql
      
    if($resulta!=0)  //Se a variável resulta for diferente de 0 conseguiu incluir
	header("Location: admproduto.php");
		exit;		 
?>

