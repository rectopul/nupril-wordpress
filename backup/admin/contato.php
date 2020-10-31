<?php 
		// Configurações
		include("_inc/config.php");
		
		$a = $_GET['a'];
		if ($a != "box") {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Contato</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="stylesheet" href="_css/estilo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="_css/tema-<?php echo $tema_sistema; ?>.css" type="text/css"media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="_css/estilo.ie6.css" />
<![endif]-->
<!-- FIM DAS FOLHAS DE ESTILO -->
<?php } if ($a != "box") { ?>	
</head>
<body id="login">
		<!-- DEFESA -->
		<div id="login-defesa" class="png_bg">
			<div id="login-topo">
			
				<h1>Soloaga Designs</h1>
				<!-- LOGO -->
				<img id="logo" src="_imagens/logo.png" alt="<?php echo $titulo_sistema; ?>"  title="<?php echo $titulo_sistema; ?>" />
		  	</div>
            <!-- CONTEÚDO -->
			<div id="login-conteudo">
                <?php } ?>	
                <!-- FOMULÁRIO DE CONTATO -->
                <div id="contato">
                    <form id="formulario-contato" class="formulario contato" action="enviar-contato.php" method="post">
                    <h4>Formul&aacute;rio de Contato</h4>
                        <fieldset>
                        <p>
                        <label <?php if ($a == "box") { echo 'class="preto"'; } ?> >Nome*:</label>
                        <input class="input-texto input-medio required" type="text" id="nome" name="nome" />
                        </p>
                        <p>
                        <label <?php if ($a == "box") { echo 'class="preto"'; } ?> >Email*:</label>
                        <input class="input-texto input-medio required email" type="text" id="email" name="email" />
                        </p>
                        <p>
                        <label <?php if ($a == "box") { echo 'class="preto"'; } ?> >Mensagem*:</label>
                        <textarea class="textarea required" name="mensagem" id="mensagem" rows="5" ></textarea>
                        <br />
                        <small>*Campos obrigat&oacute;rios</small>
                        </p>
                        </fieldset>
                        <fieldset>
                        <p id="botao-login"><input class="botao" type="submit" value="Enviar mensagem" /></p>
                        </fieldset>
                    </form>
                </div>
                <!-- FIM DO FOMULÁRIO DE CONTATO -->
				<?php if ($a != "box") { ?>	
			</div>
            <!-- FIM DO CONTEÚDO -->
			
		</div>
        <!-- FIM DA DEFESA -->
<!-- SCRIPTS -->
<script type="text/javascript" src="_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="_scripts/jquery.config-login.js"></script>
<?php if ($a != "box") { ?>
<script type="text/javascript">
	$(document).ready(function(){
		// Inicia a validação
		$("form.formulario").validate();
	});
</script>
<!--[if IE 6]>
<script type="text/javascript" src="_scripts/jquery.attention_ie6.js"></script>
<script type="text/javascript" src="_scripts/DD_belatedPNG_0.0.7a.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.png_bg, img, li');
</script>
<![endif]-->
<?php } else { ?>
<script type="text/javascript">
    $("form.contato").validate();
</script>
<?php } ?>
<!-- FIM DOS SCRIPTS -->		
</body>
</html>
<?php } ?>	