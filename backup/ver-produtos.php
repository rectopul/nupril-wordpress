<?
	//Conecta
	include "_includes/conexao.php";
	
	//Define a categoria
	$categoria = mysql_real_escape_string($_GET['categoria']);
	$subcategoria = mysql_real_escape_string($_GET['subcategoria']);
	
	//Busca dados da categoria
	$busca_dados_categoria = mysql_query("SELECT * FROM tb_categorias WHERE apelido = '$categoria'") or die(mysql_error());
	$dados_categoria = mysql_fetch_array($busca_dados_categoria);  
	$id_categoria = $dados_categoria['id'];
	$nome_categoria = $dados_categoria['nome'];
	
	//Busca dados da subcategoria
	$busca_dados_subcategoria = mysql_query("SELECT * FROM tb_subcategorias WHERE apelido = '$subcategoria'");
	$dados_subcategoria = mysql_fetch_array($busca_dados_subcategoria);  
	$nome_subcategoria = $dados_subcategoria['nome'];
	
	//Busca subcategorias
	$busca_subcategorias = mysql_query("SELECT * FROM tb_subcategorias WHERE categoria_mae = '$id_categoria' ORDER BY hierarquia ASC");
	
	//Busca dados da categoria
	$busca_produtos = mysql_query("SELECT * FROM tb_produtos WHERE apelido_categoria = '$categoria' AND apelido_subcategoria = '$subcategoria'");
	$num_produtos = mysql_num_rows($busca_produtos);
	
	if($num_produtos == "0") { 
	
	echo"
	<script>
	alert('Desculpe, no momento n�o h� produtos nesta linha. Obrigado pela compreens�o.');
	window.location.href = 'produtos.php';
	</script>
	";
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nupill - <?=$nome_categoria?> &raquo; <?=$nome_subcategoria?></title>
<!-- FOLHAS DE ESTILO -->
<link href="_css/facebox.css" rel="stylesheet">
<link href="_css/estilo.css" rel="stylesheet" type="text/css" />
<link href="_css/anythingslider.css" rel="stylesheet">
<!-- FIM DAS FOLHAS DE ESTILO -->
<!-- SCRIPTS -->
<script src="_ajax/jquery.js" type="text/javascript"></script>
<script src="_ajax/jquery.anythingslider.js"></script>
<script src="_ajax/jquery.facebox.js"></script>
<script>
// DOM Ready
$(function(){
	$('#slider').anythingSlider({
   width          : 960,
   height         : 450,
   toggleControls : false,
   startStopped   : false
    })
	$('a.mais').facebox()
});

$.urlParam = function(name){
	var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}
	
$(window).load(function () {	

	if ($.urlParam("subcategoria") !== null) {
			document.getElementById('ancora').scrollIntoView();
	}
});
	
	
</script>
<!-- FIM DOS SCRIPTS -->
</head>

<body>

<!-- TOPO -->
<div id="topo">
	
  
  
  <!-- DEFESA TOPO -->
  <div id="defesa">
  
  <h1><a href="index.php" title="Nupill">Nupill</a></h1>
  
  <ul class="menu">
    	<li><a class="myriad_regular invisible_mobile" href="index.php">HOME</a></li>
        <li><a class="myriad_regular" href="sobre-a-empresa.php">A NUPILL</a></li>
        <li><a class="myriad_regular ativo" href="produtos.php">PRODUTOS</a></li> 
        <li><a class="myriad_regular" href="lancamentos.php">LAN&Ccedil;AMENTOS</a></li> 
        <li><a class="myriad_regular" href="dicas.php">DICAS</a></li> 
        <li><a class="myriad_regular invisible_mobile" href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos"  target="_blank">NUPILL TV</a></li> 
<li><a class="myriad_regular" href="fale-conosco.php">FALE CONOSCO</a></li>    
    </ul>
  <br class="limpa_float" />
  <div id="banner" class="verprodutos">
  <img src="_imagens/banner_produtos.jpg" class="visible_mobile" height="auto" width="100%">
  </div>
  
  </div>
  <!-- FIM DA DEFESA TOPO -->

</div>
<!-- FIM DO TOPO -->

<!-- CONTE�DO -->
<div id="conteudo">

  <!-- DEFESA CONTE�DO -->
  <div id="defesa">
  
  	<!-- MENU ESQUERDA -->
    <ul class="menu_esquerda">
    
    <? //Lista as subcategorias
	  while ($dados_subcategorias = mysql_fetch_array($busca_subcategorias)) { 
	?>
    <li><a href="ver-produtos.php?categoria=<?=$categoria?>&subcategoria=<?=$dados_subcategorias['apelido']?>" class="myriad_regular"><?=$dados_subcategorias['nome']?></a></li>
    <? } ?>
    
    </ul>    
    <!-- FIM DO MENU ESQUERDA -->
    
    <h2 id="ancora" class="medium_blue century tit_categoria"><?=$dados_subcategoria['chamada'];?></h2>
    <div class="descricao_categoria">
    <p><?=$dados_subcategoria['descricao'];?></p>
    </div>
    
   
   <br class="limpa_float" />
    
    <p>&nbsp;</p>
    
    <p class="breadcrumbs">
    <span class="invisible_mobile"><a href="produtos.php" class="myriad_regular">Produtos</a> &raquo; </span><a href="<?=$categoria?>.php" class="myriad_regular"><?=$nome_categoria?></a> &raquo; <span class="myriad_regular"><?=$nome_subcategoria?></span>
    </p>
    
    
    <!-- Simple AnythingSlider -->

	<ul id="slider">

		<? while($dados_produto = mysql_fetch_array($busca_produtos)) { ?>
        <li><a href="aplicacao.php?produto=<?=$dados_produto['apelido']?>" class="mais"><img src="_imagens/produtos/<?=$dados_produto['imagem_1']?>" width="960" height="450" /></a></li>
        <? } ?>

	</ul>

	<!-- END AnythingSlider -->
    
    <br class="limpa_float" />
    <p>&nbsp;</p>
    <ul class="categorias">
    
    <li><a href="depilatorio.php" title="Depilat&oacute;rio"><img src="_imagens/categorias/depilatorio.jpg" width="150" height="135" alt="Depilat&oacute;rio" /></a></li>
    <li><a href="cuidado-facial.php" title="Cuidado Facial"><img src="_imagens/categorias/cuidado-facial.jpg" width="150" height="135" alt="Cuidado Facial" /></a></li>
    <li><a href="cuidado-corporal.php" title="Cuidado Corporal"><img src="_imagens/categorias/cuidado-corporal.jpg" width="150" height="135" alt="Cuidado Corporal" /></a></li>
    <li><a href="cuidado-capilar.php" title="Cuidado Capilar"><img src="_imagens/categorias/cuidado-capilar.jpg" width="150" height="135" alt="Cuidado apilar" /></a></li>
    <li><a href="nupill-men.php" title="Nupill Man"><img src="_imagens/categorias/nupill-men.jpg" width="150" height="135" alt="Nupill Man" /></a></li>
    <li style="margin:0"><a href="desodorantes.php" title="Desodorantes"><img src="_imagens/categorias/desodorantes.jpg" width="150" height="135" alt="Desodorantes" /></a></li>
   
    </ul>
    
    <br class="limpa_float" />

  </div>
  <!-- FIM DA DEFESA CONTE�DO -->

</div>
<!-- FIM DO CONTE�DO -->
<!-- BASE -->
<div id="base">

  <!-- DEFESA BASE -->
  <div id="defesa">  

    <p class="left">&copy; 2017, Nupill Cosm&eacute;ticos <br />
    Todos os direitos rerservados.</p>
    <p class="center">
   		<a href="index.php" class="invisible_mobile">Home</a>
        <a href="sobre-a-empresa.php">A Nupill</a>
        <a href="produtos.php">Produtos</a> 
        <a href="lancamentos.php">La&ccedil;amentos</a> 
        <a href="dicas.php">Dicas</a> 
        <!--<a href="http://www.nupill.com.br/blog/">Conhe&ccedil;a nosso Blog</a>-->
<!--<a href="http://www.nupill.com.br/blog/" target="_blank" class="blog">Blog</a>-->
<a href="http://www.facebook.com.br/nupill.cosmeticos" target="_blank" class="facebook">Facebook</a>
<!--<a href="http://twitter.com/#!/Nupill1" target="_blank" class="twitter">Twitter</a>-->
<a href="https://www.instagram.com/nupill_oficial/" target="_blank" class="instagram">Instagram</a>
<a href="https://plus.google.com/u/0/107453918396455358707" target="_blank" class="googlemais">Google+</a>
<a href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos" target="_blank" class="youtube">Youtube</a>

<a href="fale-conosco.php">Fale conosco</a>  
    </p>
    <p class="right"></p>
    
  </div>
  <!-- FIM DA DEFESA BASE -->

</div>
<!-- FIM DA BASE -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23705058-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>