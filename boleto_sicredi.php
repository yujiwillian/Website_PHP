<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Betacity - Boleto</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
#pedido
{
	background-color:#000000;
	color:#FF9900;
	width:150px;
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
</style>

</head>

<body>

<?php

ob_start();
$conn=mysql_connect("localhost", "root","") or  die("Não conectado ");
mysql_select_db("betacity"); 


	 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

$logx=$_POST["txtlog"];
$loginy=$_POST["txtlogin"];
$codcliente=$_POST["txtcodcliente"];
$codx=$_POST["txtcodproduto"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];;
$nomex=$_POST["txtnome"];
$uf=$_POST["txtuf"];
$cid=$_POST["txtcidade"];
$end=$_POST["txtend"];
$comp=$_POST["txtcomplemento"];
$cep=$_POST["txtcep"];
$tel=$_POST["txttel"];
$est=$_POST["txtquantprod"]; 



$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = date("y");	// Ano da geração do título ex: 07 para 2007 
$dadosboleto["nosso_numero"] = "13871";  			// Nosso numero (máx. 5 digitos) - Numero sequencial de controle.
$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $total; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $loginy;
$dadosboleto["endereco1"] = $end.' - '.$comp;
$dadosboleto["endereco2"] = $cid.' - '.$uf.' - '.$cep;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja BetaCity";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a compra<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Loja Betacity - http://www.betacity.com.br";

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: betacitysite@live.com";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema da Loja Betacity";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";	    // N - remeter cobrança sem aceite do sacado  (cobranças não-registradas)
                                  // S - remeter cobrança apos aceite do sacado (cobranças registradas)
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = ""; // OS - Outros segundo manual para cedentes de cobrança SICREDI


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - SICREDI
$dadosboleto["agencia"] = "1234"; 	// Num da agencia (4 digitos), sem Digito Verificador
$dadosboleto["conta"] = "12345"; 	// Num da conta (5 digitos), sem Digito Verificador
$dadosboleto["conta_dv"] = "6"; 	// Digito Verificador do Num da conta

// DADOS PERSONALIZADOS - SICREDI
$dadosboleto["posto"]= "18";      // Código do posto da cooperativa de crédito
$dadosboleto["byte_idt"]= "2";	  // Byte de identificação do cedente do bloqueto utilizado para compor o nosso número.
                                  // 1 - Idtf emitente: Cooperativa | 2 a 9 - Idtf emitente: Cedente
$dadosboleto["carteira"] = "A";   // Código da Carteira: A (Simples) 

// SEUS DADOS
$dadosboleto["identificacao"] = "Loja Betacity";
$dadosboleto["cpf_cnpj"] = "038.377.532-00";
$dadosboleto["endereco"] = "Av. Pereira Barreto, 400 - Baeta Neves";
$dadosboleto["cidade_uf"] = "São Bernardo do Campo/SP";
$dadosboleto["cedente"] = "LOJA BETACITY";

// NÃO ALTERAR!
include("funcoes_sicredi.php"); 
include("layout_sicredi.php");

echo "<form name=ped action=verpedido.php id=pedi method=post>";

echo "<input type=submit name=pedido id=pedido value='Ver meus itens pedidos'>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";
 echo "<input name=txtlog id=logx  type=hidden value=$logx>";
 echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtquantp id=quantp  type=hidden value=$quantx>";
echo "<input name=txttotal id=tot  type=hidden value=$totalx>";
echo "<input name=txtnome id=codnome  type=hidden value=$nomex>";
echo "<input name=txtcodproduto id=codc type=hidden value=$codx>";
echo "<input name=txtuf type=hidden value=$uf>";
echo "<input name=txtcidade type=hidden value=$cid>";
echo "<input name=txtend type=hidden value=$end>";
echo "<input name=txtcomplemento type=hidden value=$comp>";
echo "<input name=txtcep type=hidden value=$cep>";
echo "<input name=txttel type=hidden value=$tel>";
echo "<input name=txttotalx type=hidden value=$total>";
echo "<input name=txtvenda type=hidden value=$venda>";
echo "<input name=txtquantprod id=quantprod  type=hidden value=$est >";
echo "</form>";
?>
</body>
</html>