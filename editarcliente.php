<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Alterar o meu cadastro</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
.tudo {
	background:#F60;  
border-radius: 10px;
border:#000 double 4px;
margin: 20px 6 0 10px;
width: 660px;
height: 820px;
float:left;
position:relative;
	
}

#sair
{
	background-color:#000000;
	color:#FF9900;
	width:50px;
	height:30px;
}

#sair:active
{
	background-color:#FF6600;
	color:#000000;
}

#sair:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#editar
{
	background-color:#000000;
	color:#FF9900;
	width:200px;
	height:30px;
}

#editar:active
{
	background-color:#FF6600;
	color:#000000;
}

#editar:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#pedido
{
	background-color:#000000;
	color:#FF9900;
	width:70px;
	height:30px;
}

#pedido:active
{
	background-color:#FF6600;
	color:#000000;
}

#pedido:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#carrinho
{
	background-color:#000000;
	color:#FF9900;
	width:80px;
	height:30px;
}

#carrinho:active
{
	background-color:#FF6600;
	color:#000000;
}

#carrinho:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#bot2
{
	background-color:#000000;
	color:#FF9900;
	width:80px;
	height:30px;
}

#bot2:active
{
	background-color:#FF6600;
	color:#000000;
}

#bot2:hover
{
	background-color:#000000;
	color:#FFFFFF;
}

#Button1
{
	background-color:#000000;
	color:#FF9900;
	width:80px;
	height:30px;
}

#Button1:active
{
	background-color:#FF6600;
	color:#000000;
}

#Button1:hover
{
	background-color:#000000;
	color:#FFFFFF;
}
</style>

</head>

<body>
<?php
ob_start(); 
$ver=$_POST["BOT2"];
$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$est=$_POST["txtquantprod"]; 

if ($loginy)
{
	
	echo "<div class=tudo>";


$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");

mysql_select_db("betacity");
	 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

echo "Olá, ".$loginy."  ";


echo "<form name=sair action=saircliente.php method=POST>";
echo "<input type=submit name=sair id=sair value=SAIR />";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
echo "</form>";
echo "<form name=editar action=editarcliente.php method=POST>";
echo "<input type=submit name=editar id=editar value='ALTERAR A MINHA CONTA' />";
echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
echo "</form>";

	echo "<form name=fon action=verpedido.php method=post>";

	echo "<input type=submit name=pedido id=pedido value=PEDIDO />";
	echo "<input name=txtcod2 id=logx  type=hidden value=$codx>";
	echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
	echo "<input name=txttotal id=totx  type=hidden value=$totalx>";
	echo "<input name=txtlogin id=log  type=hidden value=$loginy>";
	echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
	echo "<input name=txtnome id=nomex  type=hidden value=$nomex>";
	echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
	echo "</form>";
	
		echo "<form name=fov action=vercarrinho.php method=post>";

	echo "<input type=submit name=carrinho id=carrinho value=CARRINHO />";
	echo "<input name=txtcod2 id=logx  type=hidden value=$codx>";
	echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
	echo "<input name=txttotal id=totx  type=hidden value=$totalx>";
	echo "<input name=txtlogin id=log  type=hidden value=$loginy>";
	echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
	echo "<input name=txtnome id=nomex  type=hidden value=$nomex>";
	echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
	echo "</form>";

$comando="SELECT * FROM tb_cliente WHERE nome_cliente='$loginy'"; //Define o script do filtro do busca

                $resulta=mysql_query($comando); //Executa o filtro
                $p=0;
                
                while($registro=mysql_fetch_array($resulta))
                {  
				 echo "<form name=fc action=atualizarc.php method=post>";
                    echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
                    echo"<br><center>Nome: ";echo "<input name=txtnome type=text value=$registro[1]></center>";
                    echo"<br><center>CPF: ";echo "<input name=txtcpf type=text value=$registro[5]></center>";
                    echo"<br><center>RG: ";echo "<input name=txtrg type=text value=$registro[6]></center>";
                    echo"<br><center>Estado: ";echo "<input name=txtestado type=text value=$registro[16]></center>";
					echo"<br><center>Cidade: ";echo "<input name=txtcidade type=text value=$registro[11]></center>";
					echo"<br><center>Endereço: ";echo "<input name=txtendereco type=text value=$registro[9]></center>";
					echo"<br><center>CEP: ";echo "<input name=txtcep type=text value=$registro[17]></center>";
					echo"<br><center>Complemento: ";echo "<input name=txtcomplemento type=text value=$registro[17]></center>";
					echo"<br><center>Telefone: ";echo "<input name=txttelefone type=text value=$registro[7]></center>";
					echo"<br><center>Celular: ";echo "<input name=txtcelular type=text value=$registro[8]></center>";
					echo"<br><center>Usuário: ";echo "<input name=txtusuario type=text value=$registro[2]></center>";
					echo"<br><center>Senha: ";echo "<input name=txtsenha type=password value=$registro[3]></center>";
					echo"<br><center>Email: ";echo "<input name=txtemail type=text value=$registro[4]></center>";
                    echo "<br><center><input name=bot2 id=bot2 type=submit value=ALTERAR></center>";
					
                    echo "</form>";
					echo "<center><input id=Button1 type=button value=VOLTAR onclick=history.back(-1)></center>";
                }
}
        else
	{echo "<script> alert('Você não esta logado');</script>";
include "logincliente.html";
	}




   
        
 $close=mysql_close($conn);       
       
?>
</body>
</html>