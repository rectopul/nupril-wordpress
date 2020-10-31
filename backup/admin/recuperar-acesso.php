<?php 
		// Configura��es
		include("_inc/config.php");
		
		// Define a p�gina
		$pag_mae = "acesso";
		$pag = "acesso";
		
		// Inclui as a��es da p�gina 
		include ("_inc/acoes_acesso.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Recuperar acesso</title>
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
</head>
<body id="login">
		<!-- DEFESA -->
		<div id="login-defesa" class="png_bg">
			<div id="login-topo">
			
				<h1>Soloaga Designs</h1>
				<!-- LOGO -->
				<img id="logo" src="_imagens/logo.png" alt="<?php echo $titulo_sistema; ?>"  title="<?php echo $titulo_sistema; ?>" />
		  	</div>
            <!-- CONTE�DO -->
			<div id="login-conteudo">
                <!-- FOMUL�RIO DE CONTATO -->
                <div id="contato">
                    <form id="formulario-contato" class="formulario contato" action="recuperar-acesso.php" method="post">
                    <h4>Recuperar acesso &agrave; &aacute;rea restrita</h4>
                    <p>Para recuperar seu acesso, informe o usu&aacute;rio e senha que foram enviados para o seu e-mail.</p>
                        <?php if($resposta_senha) { ?>
                        <div class="notificacao erro png_bg">
                        <a href="#" class="fechar"><img src="_imagens/icones/fechar-pequeno.png" title="Fechar esta notifica&ccedil;&atilde;o" alt="Fechar" /></a>
                        <div><?php echo $resposta_senha; ?></div>
                        </div>
                        <?php } ?>
                        <fieldset>
                        <p>
                        <label>Usu&aacute;rio*:</label>
                        <input class="input-texto input-medio required" type="text" id="usuario" name="usuario" />
                        </p>
                        <p>
                        <label>Senha*:</label>
                        <input class="input-texto input-medio required" type="password" id="senha" name="senha" />
                        <br />
                        <small>*Campos obrigat&oacute;rios</small>
                        </p>
                        </fieldset>
                        <fieldset>
                        <p id="botao-login"><input class="botao" type="submit" value="Enviar" /></p>
                        </fieldset>
                    </form>
                    
                    
                    
                </div>
                <!-- FIM DO FOMUL�RIO DE CONTATO -->
				</div>
            <!-- FIM DO CONTE�DO -->
			
		</div>
        <!-- FIM DA DEFESA -->
<!-- SCRIPTS -->
<script type="text/javascript" src="_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="_scripts/jquery.config-login.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="_scripts/jquery.attention_ie6.js"></script>
<script type="text/javascript" src="_scripts/DD_belatedPNG_0.0.7a.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.png_bg, img, li');
</script>
<![endif]-->
<!-- FIM DOS SCRIPTS -->		
</body>
</html>