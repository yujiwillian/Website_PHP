<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cadastrando Usuário</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php
//Conecta o servidor LOCALHOST com o usuario ROOT
$conn=mysql_connect("localhost","root","")or die("Não Conectado");
//Abrir o banco de dados 
mysql_select_db("betacity"); 
//Variaveis que conduzem ao funcionamento do arquivo php
	$nomecli=$_POST["txtnomecli"];
    $cpfcli=$_POST["txtcpfcli"]; 
    $rgcli=$_POST["txtrgcli"];
    $cidadecli=$_POST["txtcidadecli"];
	$estadocli=$_POST["txtestadocli"];
    $enderecocli=$_POST["txtenderecocli"];
	$complementocli=$_POST["txtcomplementocli"];
	$cepcli=$_POST["txtcepcli"];
	$telefonecli=$_POST["txttelefonecli"];
	$celularcli=$_POST["txtcelularcli"];
	$emailcli=$_POST["txtemailcli"];
	$usuariocli=$_POST["txtusuariocli"];
	$senhacli=$_POST["txtsenhacli"];
	//Define a variavel comando com o script do insert do sql 
    $comando="INSERT INTO tb_cliente(nome_cliente,cpf_cliente,rg_cliente,cidade_cliente,estado_cliente,endereco_cliente,complemento_cliente,cep_cliente,telefone_cliente,celular_cliente,email_cliente,usuario_cliente,senha_cliente) VALUES ('$nomecli','$cpfcli','$rgcli','$cidadecli','$estadocli','$enderecocli','$complementocli','$cepcli','$telefonecli','$celularcli','$emailcli','$usuariocli','$senhacli')";
    //Executa o comando mysql
    $resulta=mysql_query("$comando"); 
    //Se a variável resulta for diferente de 0 conseguiu incluir
    if($resulta!=0) { 
        echo"<script>history.go(-1);alert('Foi cadastrado com sucesso!')</script>";
	}
       else
	   
       echo"<script>history.go(-1);alert('Não foi cadastrado!')</script>";
	       
           
?>
</body>
</html>