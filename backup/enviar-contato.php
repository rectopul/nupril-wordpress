<?php
	// Função para evitar spam
	function ProcPalavras ($frase, $palavras, $resultado = 0) {
	  foreach ( $palavras as $key => $value ) {
	  $pos = strpos($frase, $value);
	  if ($pos !== false) { $resultado = 1; break; }
	  }
	return $resultado;
	}
	
	// Checa se é spam
$palavras = array ("drug","Drug","DRUG","drugs","Drugs","DRUGS","medication","Medication","MEDICATION","viagra","Viagra","VIAGRA","tramadol","Tramadol","TRAMADOL", "???", "??", "goose", "MCM", "TOMS", "IWC", "????", "?????", "??????", "Goose", "UGG", "ugg", "uggs", "Nike", "nike", "Kors", "kors");

	if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
		
	//-------------------- Checa se o form foi enviado ---------------------------------------
	$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdIaBATAAAAALGdbzkg40RHfgVqzWfMKKAbgGns&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
	if ($resposta.success && ProcPalavras($mensagem, $palavras) == 0) {
	
	if ($_POST['nome'] != "" && $_POST['email'] != "" && $_POST['mensagem'] != "") { 
	
	$nome_contato = $_POST['nome'];
	$email_contato = $_POST['email'];
	$mensagem_contato = $_POST['mensagem'];	
	if($_POST['telefone']) { $telefone_contato = "Telefone : ".$_POST['telefone']."<br />"; } 
	
	//Envia por email
	$conteudo = "<br />
	Um contato foi enviado atrav&eacute;s do site Nupill:<br /><br />
	----------------------------------------------------------<br /><br />
	Nome: <strong>".$nome_contato."</strong><br />
	".$telefone_contato."
	E-mail : <strong>".$email_contato."</strong><br />
	<br />
	Mensagem: <strong>".$mensagem_contato."</strong>";
	
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
			$emailsender='admin@nupill.com.br';
	} else {
			$emailsender = "webmaster@" . $_SERVER[HTTP_HOST];
			//    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
			// você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
	}
 
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['nome'];
$emailremetente    = trim($_POST['email']);
$emaildestinatario = "faleconosco@nupill.com.br";
$assunto           = "Contato pelo site Nupill";
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = $conteudo;
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para) 
/* Enviando a mensagem */
if(mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender)) { $enviado = 'sim'; } 

	
	
	} else {
	die("Erro. Tente novamente.");	
	}	
	
	} else {
    die("Usuário mal-intencionado detectado. A mensagem não foi enviada.");	
	}
	
}
 
// Se nenhum valor foi recebido, o usuário não realizou o captcha
if (!$captcha_data) {
	die("Confirme que é um humano. Tente novamente.");	
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nupill - Fale conosco</title>
<!-- FOLHAS DE ESTILO -->
<link href="_css/estilo.css" rel="stylesheet" type="text/css" />
<!-- FIM DAS FOLHAS DE ESTILO -->
<!-- SCRIPTS -->
<script src="_ajax/jquery.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <li><a class="myriad_regular" href="dicas.php">DICAS</a></li> 
        <li><a class="myriad_regular invisible_mobile" href="https://www.youtube.com/channel/UCfx37H2rrVTjLhLfr96ZSHw/videos"  target="_blank">NUPILL TV</a></li> 
        <li><a class="myriad_regular ativo" href="fale-conosco.php">FALE CONOSCO</a></li>    
    </ul>
  <br class="limpa_float" />
  <div id="banner" class="contato">
  <img src="_imagens/banner_contato.jpg" class="visible_mobile" height="auto" width="100%">
  </div>
  
  </div>
  <!-- FIM DA DEFESA TOPO -->

</div>
<!-- FIM DO TOPO -->

<!-- CONTEÚDO -->
<div id="conteudo">

  <!-- DEFESA CONTEÚDO -->
  <div id="defesa">
  	
    <h2 class="big_blue century">Enviando sua mensagem</h2>    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
    <div class="box_maior">
    
    <div style="width:400px; float:left;">
        
    <?php if ($enviado) { ?><br />
    <p><br />
 	<font style="font-weight:bold">Sua mensagem  foi enviada com sucesso para faleconosco@nupill.com.br !<br />
 	</font>
    <br />
    Agradecemos seu contato, sua  mensagem foi enviada com sucesso.<br />
                Em breve retornaremos.<br />
                <br />
                Clique <a href="index.php">aqui</a> para voltar &agrave; p&aacute;gina inicial.</p>
	<?php } else { ?>
 	<p><font style="font-weight:bold">Sua mensagem n&atilde;o p&ocirc;de ser enviada ! Tente novamente.</font><br /><br />

	Desculpe.<br />
                Sua mensagem n&atilde;o p&ocirc;de ser enviada.<br />
                Estamos experimentando problemas em nosso servidor.<br />
                Por favor, tente novamente mais tarde.<br />
                Obrigado.<br />
                <br />
                Clique <a href="index.php">aqui</a> para voltar &agrave; p&aacute;gina inicial.</p>
 	<? } ?>
        
    <div class="clear">&nbsp;</div>

    </div>
    
    
    <div class="mini_direita">
    <br /><br />
    <h2 class="big_blue century"><span class="mini">Ou ligue:<br />
      +55 (11) 4486-8977</span></h2></div>
    
    
    </div>
    
    <div class="box alinhar_esquerda invisible_mobile">
    <h3 class="blue century">Dicas</h3>
	
	
    
    <ul>
    <li><a href="dicas.php" title="Ler mais"><strong>A beleza em todas as idades</strong> 
      20 anos Dicas Lavar seu rosto, especialmente com água quente, remove os óleos naturais. Utilize ......</a>
    </li> 
    
    <li><a href="dicas.php" title="Ler mais"><strong>Para uma pele saudável</strong> 
      Nutrição Tenha uma alimentação rica em vitamina C com frutas e legumes. Os nutricionistas indicam ...</a>
    </li> 
    
    </ul>
    
    <a href="dicas.php" class="ver_todas">Ver todas</a> 
    
    </div>
    
    <br class="limpa_float" />
    
    <ul class="categorias" style="margin-bottom:0px;">
    
    <li><a href="depilatorio.php" title="Depilat&oacute;rio"><img src="_imagens/categorias/depilatorio.jpg" width="150" height="135" alt="Depilat&oacute;rio" /></a></li>
    <li><a href="cuidado-facial.php" title="Cuidado Facial"><img src="_imagens/categorias/cuidado-facial.jpg" width="150" height="135" alt="Cuidado Facial" /></a></li>
    <li><a href="cuidado-corporal.php" title="Cuidado Corporal"><img src="_imagens/categorias/cuidado-corporal.jpg" width="150" height="135" alt="Cuidado Corporal" /></a></li>
    <li><a href="cuidado-capilar.php" title="Cuidado Capilar"><img src="_imagens/categorias/cuidado-capilar.jpg" width="150" height="135" alt="Cuidado apilar" /></a></li>
    <li><a href="nupill-men.php" title="Nupill Man"><img src="_imagens/categorias/nupill-men.jpg" width="150" height="135" alt="Nupill Man" /></a></li>
    <li style="margin:0"><a href="desodorantes.php" title="Desodorantes"><img src="_imagens/categorias/desodorantes.jpg" width="150" height="135" alt="Desodorantes" /></a></li>
   
    </ul>
    
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