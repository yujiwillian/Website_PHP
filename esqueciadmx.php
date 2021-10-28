<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BetaCity - ADM</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style_index.css" /><!--Utilizando o estilo CSS-->
<script src="menus/SpryMenuBar.js" type="text/javascript"></script>
<link href="menus/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="banner" align="center">
</div>
<div class="conteudo" align="center">
<div class="menu" align="center">
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><center><a href="index.html">IR PARA O SITE PRINCIPAL DO BETACITY</a></center></li>
</div>
<br />
<p>
<br />
<br />
<?php
$conn=mysql_connect("localhost","root","")or die("Não Conectado"); 
mysql_select_db("betacity");
            	$usx=$_POST['admx'];
                $comando="SELECT * FROM tb_adm WHERE us_func='$usx'"; //Define o script do filtro do busca
                $resulta=mysql_query($comando); //Executa o filtro
                $p=0;
        echo "<table border=0 cellspacing=3 align=center>";
        echo "<tr bgcolor=#000000 style=color:white>";
        echo "<td> Código do administrador </td>";
        echo "<td> Senha do administrador </td>";
		echo "<td> Nome do administrador </td>";
		echo "</tr>";
       
		$registro=mysql_fetch_array($resulta);
		
        {       
            echo"<tr>";
            echo"<td>"; echo $registro[0];echo"</td>";
            echo"<td>"; echo $registro[1];echo"</td>";
			echo"<td>"; echo $registro[2];echo"</td>";
			echo"</tr>";
			}
			
            echo"</table>";
			
echo "<p>";
echo "<input type=button name=Voltar id=button value=Voltar onclick=history.back(-1) />";
			
						 $close=mysql_close($conn);   

?>
                </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
