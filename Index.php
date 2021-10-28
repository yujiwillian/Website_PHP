    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <title>BetaCity</title>
<!--Icone do site-->
<link rel="shortcut icon" href="favicon.ico">
    <link href="style/index.css" rel="stylesheet" type="text/css" />
</head>









<body>

    <form id="frmGeral">
         
          
                        <?php
						echo "<form name=pesq action=listarprod.php method=post target=ifrConteudo>";


echo "</form>";
                        ?>
                        
    
    
    
    
    
    
    
    <div class="tudo">
        <div class="banner">

        <!--Colocando um arquivo em flash-->
<object width="900" height="263" loop="no">
<param name="movie" value="">
<embed src="imagens/banner/betacityflashbanner.swf" width="900" height="263" loop="no">
</embed>
</object>












        <!--
Menu com botões
-->

        <div id="cssmenu">
        <div align="justify">
                <ul>
                    <li class='active'><a href='#'  class="botao" onclick="direcionar('home.html');"><span>Home</span></a>
                    </li>
                    <li><a href='#'  class="botao" onclick="direcionar('QuemSomos.html');"><span>Quem somos</span></a></li>
                    <li><a href='#'  class="botao" onclick="direcionar('logincliente.html');"><span>Login</span></a></li>
                    <li><a href='#'  class="botao" onclick="direcionar('vercarrinho.php');"><span>Compras</span></a></li>
                    <li><a href='#'  class="botao" onclick="direcionar('Cadastro.html');"><span>Cadastro</span></a></li>
                    <li><a href="mailto:betacitysite@live.com?subject=Fale conosco &amp;cc=
&amp;body=Enviando%20minha%20pergunta." class="botao"><span>Fale Conosco</span></a></li>
                    
   
                   
 <li class='last'></li>
</ul>
</div>
<br />
</div>
        
        
        
        
        
        
        
        
        
        
         <!--
Menu com as categorias
-->
        
        <link href="style/menu.css" rel="stylesheet" type="text/css" />
        <div class="menu1">
            <ul id="nav" align="left">
               
<ul id="nav">
<ul>
  
  
  <li><a href="#" onclick="direcionar('livro.php')";>Livros</a>
    
</li>
 
  
  
  <li><a href="#" onclick="direcionar('game.php')";>Games</a>
    
</li>
  
  
  <li><a href="#" onclick="direcionar('dvd.php')";>Dvd</a>
    
  </li>
      
  
  
  <li><a href="#" onclick="direcionar('cd.php')";>CD</a>
    
</li>
      
</ul>

</div>
 </ul>
</div>
</style>
        
        
        
        
        
        
        
        
     <!--
Conteudo com produtos 
-->    
   
        
        <div class="conteudo">
        
        <div class="conteudox">
        <table border="0">
        <tr>
        <td>
         <img src="imagens/icons/facebook2.png" width="50" onmouseover="this.src='imagens/icons/facebook.png'"
                            onmouseout="this.src='imagens/icons/facebook2.png'" onclick="direcionar('#');"
                            style="cursor: pointer" alt="facebook" />
                        <img src="imagens/icons/twitter2.png" width="50" onmouseover="this.src='imagens/icons/twitter.png'"
                            onmouseout="this.src='imagens/icons/twitter2.png'" onclick="direcionar('#');"
                            style="cursor: pointer" />
                        <img src="imagens/icons/youtube2.png" width="52" onmouseover="this.src='imagens/icons/youtube.png'"
                            onmouseout="this.src='imagens/icons/youtube2.png'" onclick="direcionar('#');"
                            style="cursor: pointer" />
                            </td>
                            <td >
                   <?php
				   $_SESSION['logado']=1;
$_SESSION['nome_cliente']=$registro[1];
 $_SESSION['cod_cliente']=$registro[0];
						echo "<form name=pesq action=listarprod.php method=post target=ifrConteudo>";

						echo "Pesquisar: ";
						echo "<input name=pesquise type=text  id=textfield style=width: 300px/>   ";

echo "<input name=button type=image name=button id=ok src=imagens/botoes/botao_pesquisa.png width=30px >";

	echo "<input name=txtlogin id=logy  type=hidden value=$loginy>";
echo "<input name=txtcodcliente id=codc  type=hidden value=$codcliente>";

echo "</form>";
                        ?>       
                        </td>
                        </tr>
                        </table>
                      </div>
                        </iframe>
            <iframe id="ifrConteudo" name="ifrConteudo" src="Home.html" width="100%" height="100%" frameborder="0" scrolling="auto">

            </iframe>

         
            <div id="rodape">
Betacity.com.br é um trabalho produzido por um grupo de alunos da Etec Lauro Gomes
</div>
        </div>
    </div>
    <script language="javascript" type="text/javascript">
    function direcionar(pagina) {
        document.getElementById("ifrConteudo").src = pagina;
    }
</script>
    </form>
</body>
</html>

