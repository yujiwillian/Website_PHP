<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cadastrando Produto</title>
<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php
$conn=mysql_connect("localhost","root","")or die("Não Conectado"); //Conecta o servidor LOCALHOST com o usuario ROOT
mysql_select_db("betacity"); //Abrir o banco de dados
// armazena na variavel o conteudo que esta na caixa de texto

    $codcat=$_POST["txtcodcat"]; 
	$nomeprod=$_POST["txtnomeprod"];
	$nomegenero=$_POST["txtgeneroprod"];
    $foto=$_FILES["fotoprod"]; 
    $criadorprod=$_POST["txtcriadorprod"];
    $desenvolvedorprod=$_POST["txtdesenvolvedorprod"];
    $anoprod=$_POST["txtanoprod"];
	$unimedprod=$_POST["txtunimedprod"];
	$descprod=$_POST["txtdescprod"];
	$precoprod=$_POST["txtprecoprod"];
	$estoqueprod=$_POST["txtestoqueprod"];
	$codfunc=$_POST["txtcodfunc"];
	$codforn=$_POST["txtcodforn"];
	//$nome_imagem=$_POST["fotoprod"];
	$nome_imagem=$foto["fotoprod"]; 
//$caminho_imagem = "produtos/" .$nome_imagem;

// Se a foto estiver sido selecionada 
if (!empty($foto["name"])) {   
// Largura máxima em pixels 
$largura = 99999; // Altura máxima em pixels
 $altura = 9999; // Tamanho máximo do arquivo em bytes 
  // Pega as dimensões da imagem 
  $dimensoes = getimagesize($foto["tmp_name"]);   // Verifica se a largura da imagem é maior que a largura permitida 
  if($dimensoes[0] > $largura) { $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; }  
   // Verifica se a altura da imagem é maior que a altura permitida 
   if($dimensoes[1] > $altura) { $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; } 
        // Se não houver nenhum erro 
		if (count($error) == 0) {   
		// Pega extensão da imagem 
		preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
		   // Gera um nome único para a imagem
		    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];  
			 // Caminho de onde ficará a imagem
			  $caminho_imagem = "produtos/" . $nome_imagem; 
			  
			     // Insere os dados no banco 
				$comando=mysql_query("INSERT INTO tb_produto(nome_produto,genero_produto,foto_produto,criador_produto,desenvolvedor_produto,ano_produto,unidade_medida_produto,descricao_produto,preco_produto,estoque_produto,cod_categoria,cod_func,cod_fornecedor) VALUES ('$nomeprod','$nomegenero','$nome_imagem','$criadorprod','$desenvolvedorprod','$anoprod','$unimedprod','$descprod',$precoprod,$estoqueprod,$codcat,$codfunc,$codforn)"); 
				 // Faz o upload da imagem para seu respectivo caminho 
			   move_uploaded_file($foto["tmp_name"],$caminho_imagem);  
				  // Se os dados forem inseridos com sucesso 
				  if ($comando){ echo "Você foi cadastrado com sucesso."; } } 
				    // Se houver mensagens de erro, exibe-as 
					if (count($error) != 0) { foreach ($error as $erro) { echo $erro . ""; } } }  
					
					if($comando!=0) { //Se a variável resulta for diferente de 0 conseguiu incluir
        echo"<script>history.go(-1);alert('Foi cadastrado com sucesso!')</script>";
	}
       else
	   
       echo"<script>history.go(-1);alert('Não foi cadastrado!')</script>";

 
           
?>
</body>
</html>