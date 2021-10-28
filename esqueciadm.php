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
<div class="menubot" align="center">
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><center><a href="index.html">IR PARA O SITE PRINCIPAL DO BETACITY</a></center></li>
</div>
<form id="form1" name="esqueciadm" method="post" action="esqueciadmx.php"><!--Efetua a ação no arquivo php-->
<br />
<p>
<br />
<br />
<h1 align="center"><strong>ADMINISTRADOR:</h1>
<input name="admx" type="text"  id="textfield" />
<p><input type="button" name="voltar" id="button" value="Voltar" onclick="history.back(-1)" />
<input type="submit" name="adm" id="button" value="VERIFICAR" />
</form>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
