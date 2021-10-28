<?php
$conn=mysql_connect("localhost","root","")or die("Não Conectado"); //Conecta o servidor LOCALHOST com o usuario ROOT
mysql_select_db("betacity"); //Abrir o banco de dados
	$codclix=$_POST["txtcod"];
    $nomex=$_POST["txtnome"]; 
    $cpfx=$_POST["txtcpf"];
    $rgx=$_POST["txtrg"];
    $estadox=$_POST["txtestado"];
	$cidadex=$_POST["txtcidade"];
	$enderecox=$_POST["txtendereco"];
	$cepx=$_POST["txtcep"];
	$complementox=$_POST["txtcomplemento"];
	$telefonex=$_POST["txttelefone"];
	$celularx=$_POST["txtcelular"];
	$usuariox=$_POST["txtusuario"];
	$senhax=$_POST["txtsenha"];
	$emailx=$_POST["txtemail"];
    $comando="UPDATE tb_cliente SET nome_cliente='$nomex',cpf_cliente='$cpfx', rg_cliente='$rgx', estado_cliente='$estadox', cidade_cliente='$cidadex',endereco_cliente='$enderecox',cep_cliente='$cepx',complemento_cliente='$complementox',telefone_cliente='$telefonex',celular_cliente='$celularx',usuario_cliente='$usuariox',senha_cliente='$senhax',email_cliente='$emailx' WHERE cod_cliente=$codclix";
    //Define a variavel comando com o script do insert do sql, se o 
    //Campo é caracter é necessário o ' 
    $resulta=mysql_query($comando); //Executa o comando mysql
    
    if($resulta!=0) { //Se a variável resulta for diferente de 0 conseguiu incluir
        echo"<script>alert('Foi alterado');</script>";
        echo "<script> history.go(-1);</script>";
        }
       else
       {
        echo"<script>alert('Erro de alteração');</script>";
        echo"<script>history.go(-1);</script>";
        }
         $close=mysql_close($conn); 
?>