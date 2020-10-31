<?
	//Conecta
	include "_includes/conexao.php";
	
	// Define o ini
	if (!$_GET['ini']) { $ini = "0"; } else { $ini = mysql_real_escape_string($_GET['ini']); }
	
	//Busca dicas
	$busca_cheia = mysql_query("SELECT * FROM tb_dicas");
	$busca_dicas = mysql_query("SELECT * FROM tb_dicas ORDER BY data_cadastro DESC LIMIT $ini, 5");
	
	// Paginação
	$results = 5;
	$num_cheio = mysql_num_rows($busca_cheia);
	if ($num_cheio > $results) { 
	$paginacao = 1;
	$num_paginas = ceil($num_cheio/$results);
	$proximo_ini = $ini+$results; 
	}
	if ($ini != 0) { $anterior_ini = $ini-$results; }
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nupill - Dicas</title>
<!-- FOLHAS DE ESTILO -->
<link href="_css/estilo.css" rel="stylesheet" type="text/css" />
<!-- FIM DAS FOLHAS DE ESTILO -->
<!-- SCRIPTS -->
<script type="text/javascript" src="_ajax/jquery.js"></script>
<script type="text/javascript" src="_ajax/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="_ajax/jquery.lightbox-0.5.css" media="screen" />
  <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('a.zoom').lightBox();
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
        <li><a class="myriad_regular" href="produtos.php">PRODUTOS</a></li> 
        <li><a class="myriad_regular" href="lancamentos.php">LAN&Ccedil;AMENTOS</a></li> 
        <li><a class="myriad_regular ativo" href="dicas.php">DICAS</a></li> 
        <li><a class="myriad_regular invisible_mobile" href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos"  target="_blank">NUPILL TV</a></li> 
<li><a class="myriad_regular" href="fale-conosco.php">FALE CONOSCO</a></li>    
    </ul>
  <br class="limpa_float" />
  <div id="banner" class="dicas">
  <img src="_imagens/banner_dicas.jpg" class="visible_mobile" height="auto" width="100%">
  </div>
  
  </div>
  <!-- FIM DA DEFESA TOPO -->

</div>
<!-- FIM DO TOPO -->

<!-- CONTEÚDO -->
<div id="conteudo">

  <!-- DEFESA CONTEÚDO -->
  <div id="defesa">
  
  <h3 style="margin-bottom: 10px; font-size: 15px; color: #006" class="myriad_regular defesa_mobile">Veja passo a passo como ter uma pele limpa e saudável.</h3>
  
  <object width="560" height="315" class=" defesa_mobile"><param name="movie" value="//www.youtube.com/v/KOOlkOL5Upk?version=3&amp;hl=pt_BR&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/KOOlkOL5Upk?version=3&amp;hl=pt_BR&amp;rel=0" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object><br/><br/>
  
  	<ul class="lista">
    <? //Lista os dicas
	  while ($dados_dicas = mysql_fetch_array($busca_dicas)) { 
	?>
    <li id="<?=$dados_dicas['id']?>">
    <? if($dados_dicas['imagem_1'] != "0" && $dados_dicas['imagem_1'] != "") { ?>
    <p class="img"><a href="_imagens/dicas/<?=$dados_dicas['imagem_1']?>" class="zoom"><img src="_imagens/dicas/<?=$dados_dicas['imagem_1']?>" width="100%" border="0" /></a></p>
    <? } ?>
    <h3 class="myriad_regular"><?=$dados_dicas['nome']?></h3>
    <?=$dados_dicas['descricao']?>
    </li>
    <br class="limpa_float" />
    <? } ?>
    </ul>
    
	<br class="limpa_float" />
    
    <? if ($paginacao) { ?>
    <!-- PAGINAÇÃO -->
    <div id="paginacao">
    <p id="anteriores">
	<? if($ini !=0) { ?>
    <a href="dicas.php?ini=<?=$anterior_ini?>" class="link_paginacao">&laquo;&nbsp;Anteriores</a>
	<? } else { ?>
    <a href="javascript:void(0);" class="link_paginacao">&laquo;&nbsp;Anteriores</a>
    <? } ?>
    </p>
    <p id="contagem">
    <?	
    // Gera número de páginas
    for($i = 1; $i<=$num_paginas; $i++) { 
    $pagina = $i-1;
    $pagina_contagem = $pagina*$results;
    $class = "pagina";
    if($pagina_contagem == $ini) { $class = "pagina_atual"; };
    ?> 
    <a class="<?=$class?> myriad_bold" href="dicas.php?ini=<?=$pagina_contagem?>" ><?=$i?></a>
    <? } ?>
    </p>
    <p id="proximos">
	<? if($num_cheio > $proximo_ini) { ?>
    <a href="dicas.php?ini=<?=$proximo_ini?>" class="link_paginacao">Pr&oacute;ximos&nbsp;&raquo;</a>
	<? }else { ?>
    <a href="javascript:void(0);" class="link_paginacao">Pr&oacute;ximos&nbsp;&raquo;</a>
    <? } ?>
    </p>
    </div>
    <!-- FIM DA PAGINAÇÃO -->
    <? } ?>
    
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