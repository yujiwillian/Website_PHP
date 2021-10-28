<?php
//Sessão
ob_start();
//Variáveis que conduzem ao funcionamento do arquivo php
$loginx=$_POST["usuario"];
$senhax=$_POST["senha"];
//Conecta o servidor LOCALHOST com o usuario ROOT
$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
//Abre o banco de dados
mysql_select_db("betacity"); 
//Define a variavel comando com o script do select do sql 
$comando= "SELECT * FROM tb_cliente WHERE usuario_cliente='$loginx' AND senha_cliente='$senhax'";
//Executa o comando mysql
$resulta = mysql_query($comando);

//Passando informações de uma página para outra
if ($registro = mysql_fetch_array($resulta))
{
$_SESSION['logado']=1;
$_SESSION['nome_cliente']=$registro[1];
 $_SESSION['cod_cliente']=$registro[0];
$close = mysql_close($conn);
 
//Aciona o arquivo do php externo
include "produto.php";  
     }
    else
     {   echo "<script> alert('Usuário ou senha incorretos. Você precisa estar cadastrado para acessar essa página');</script>";
   $close = mysql_close($conn);
$_SESSION['logado']=0;
   include "logincliente.html";
   }
?>