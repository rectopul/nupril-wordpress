<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "configuracoes";
		$pag = "config-deposito";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define a id 
		$id_editar = "1";
		
		// Checa se foi enviado informação
		if($_POST['banco_1']) {
		$desconto = $_POST['desconto'];
		$banco_1 = $_POST['banco_1'];
		$agencia_1 = $_POST['agencia_1'];
		$conta_1 = $_POST['conta_1'];
		$cedente_1 = $_POST['cedente_1'];
		$cpf_cnpj_1 = $_POST['cpf_cnpj_1'];
		$banco_2 = $_POST['banco_2'];
		$agencia_2 = $_POST['agencia_2'];
		$conta_2 = $_POST['conta_2'];
		$cedente_2 = $_POST['cedente_2'];
		$cpf_cnpj_2 = $_POST['cpf_cnpj_2'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$nome_editor = $_SESSION['NUPILL_NOME'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Se não há erros
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE sis_deposito SET 	desconto = '$desconto',
											banco_1 = '$banco_1',
											agencia_1 = '$agencia_1',
											conta_1 = '$conta_1',
											cedente_1 = '$cedente_1',
											cpf_cnpj_1 = '$cpf_cnpj_1',
											banco_2 = '$banco_2',
											agencia_2 = '$agencia_2',
											conta_2 = '$conta_2',
											cedente_2 = '$cedente_2',
											cpf_cnpj_2 = '$cpf_cnpj_2',
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
		$sucesso = "16";
		} else {
		$erro = "21";
		}
		
		} // Fim da checagem se não há erros	
		
		} // Fim da checagem se está foi enviado informação	
		
		// Pega os dados do Sistema
		$busca_dados = mysql_query("SELECT * FROM sis_deposito WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Dados para Depósitos</title>
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
			<h2>Dados para Dep&oacute;sitos</h2>
            <p id="introducao">Informe os dados banc&aacute;rios para dep&oacute;sitos.</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
		
			<div class="clear"></div>
			
            <!-- ATALHOS -->
            <ul class="atalhos">
			
                <li><a class="botao-atalho" href="index.php" title="Configura&ccedil;&otilde;es"><span>
				<img src="../_imagens/atalhos/configuracoes.png" alt="Configura&ccedil;&otilde;es" /><br />
					Configura&ccedil;&otilde;es</span></a>
                </li>
               <li><a class="botao-atalho" href="empresa.php" title="Dados Empresariais"><span>
				<img src="../_imagens/atalhos/informacao.png" alt="Dados Empresariais" /><br />
					Dados Empresariais</span></a>
                </li>
          		<li><a class="botao-atalho" href="boleto.php" title="Dados para Boletos"><span>
				<img src="../_imagens/atalhos/boleto.png" alt="Dados para Boletos" /><br />
					Dados para Boletos</span></a>
                </li>
                <li><a class="botao-atalho" href="frete.php" title="Dados para Dep&oacute;sitos"><span>
				<img src="../_imagens/atalhos/frete.png" alt="Dados para Dep&oacute;sitos" /><br />
					Configura&ccedil;&otilde;es de Frete</span></a>
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
					<h3 class="tit-longo visivel">Dados banc&aacute;rios para Dep&oacute;sito</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- CONFIGURAÇÕES -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="deposito.php" method="post">
						<fieldset>
                        
						<p>
                        <label>Desconto:</label>
						<input class="input-texto input-minimo number" type="text" id="desconto" name="desconto" value="<?php echo $dados['desconto']; ?>" maxlength="3" /> %<br />
                        <small>Desconto para pagamentos em boleto. Informar em %. Caso n&atilde;o se aplique, deixe 0. </small>
                        </p>
                        </fieldset>
                        <fieldset>
                        <legend>Conta principal</legend>
                        
                        <p>
                        <label>Banco:</label>              
					  	<select name="banco_1" class="input-medio required" >
                         	<option value="Unibanco" <? if($dados['banco_1'] == "Unibanco") { echo 'selected="selected"'; } ?> >Unibanco</option>
                            <option value="Banco do Brasil" <? if($dados['banco_1'] == "Banco do Brasil") { echo 'selected="selected"'; } ?> >Banco do Brasil</option>
                            <option value="Caixa Economica Federal" <? if($dados['banco_1'] == "Caixa Economica Federal") { echo 'selected="selected"'; } ?> >Caixa Econ&ocirc;mica Federal</option>
                            <option value="Bradesco" <? if($dados['banco_1'] == "Bradesco") { echo 'selected="selected"'; } ?> >Bradesco</option>
                            <option value="HSBC" <? if($dados['banco_1'] == "HSBC") { echo 'selected="selected"'; } ?> >HSBC</option>
                            <option value="Itau" <? if($dados['banco_1'] == "Itau") { echo 'selected="selected"'; } ?> >Ita&uacute;</option>
                            <option value="Santander" <? if($dados['banco_1'] == "Santander") { echo 'selected="selected"'; } ?> >Santander</option>
                            <option value="Banco Real" <? if($dados['banco_1'] == "Banco Real") { echo 'selected="selected"'; } ?> >Banco Real</option>
                            <option value="Nossa Caixa" <? if($dados['banco_1'] == "Nossa Caixa") { echo 'selected="selected"'; } ?> >Nossa Caixa</option>
                        </select>
						</p>
                        
                        <p>
                        <label>Ag&ecirc;ncia:</label>
						<input class="input-texto input-menor" type="text" id="agencia_1" name="agencia_1" value="<?php echo $dados['agencia_1']; ?>" maxlength="50" /><br />
                        <small>Informe tamb&eacute;m o  d&iacute;gito verificador, caso exista. </small>
                        </p>
                        
                        <p>
                        <label>Conta:</label>
						<input class="input-texto input-menor" type="text" id="conta_1" name="conta_1" value="<?php echo $dados['conta_1']; ?>" maxlength="50" /> <br />
                        <small>Informe tamb&eacute;m o  d&iacute;gito verificador, caso exista. </small>
                        </p>

                        <p>
                        <label>Cedente:</label>
						<input class="input-texto input-medio" type="text" id="cedente_1" name="cedente_1" value="<?php echo $dados['cedente_1']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>CNPJ ou CPF:</label>
						<input class="input-texto input-medio" type="text" id="cpf_cnpj_1" name="cpf_cnpj_1" value="<?php echo $dados['cpf_cnpj_1']; ?>" maxlength="50" />
                        </p>
                        </fieldset>
                        <fieldset>
                        <legend>Conta secund&aacute;ria (Opcional)</legend>
                        
                        <p>
                        <label>Banco:</label>              
					  	<select name="banco_2" class="input-medio required" >
                         	<option value="Unibanco" <? if($dados['banco_2'] == "Unibanco") { echo 'selected="selected"'; } ?> >Unibanco</option>
                            <option value="Banco do Brasil" <? if($dados['banco_2'] == "Banco do Brasil") { echo 'selected="selected"'; } ?> >Banco do Brasil</option>
                            <option value="Caixa Economica Federal" <? if($dados['banco_2'] == "Caixa Economica Federal") { echo 'selected="selected"'; } ?> >Caixa Econ&ocirc;mica Federal</option>
                            <option value="Bradesco" <? if($dados['banco_2'] == "Bradesco") { echo 'selected="selected"'; } ?> >Bradesco</option>
                            <option value="HSBC" <? if($dados['banco_2'] == "HSBC") { echo 'selected="selected"'; } ?> >HSBC</option>
                            <option value="Itau" <? if($dados['banco_2'] == "Itau") { echo 'selected="selected"'; } ?> >Ita&uacute;</option>
                            <option value="Santander" <? if($dados['banco_2'] == "Santander") { echo 'selected="selected"'; } ?> >Santander</option>
                            <option value="Banco Real" <? if($dados['banco_2'] == "Banco Real") { echo 'selected="selected"'; } ?> >Banco Real</option>
                            <option value="Nossa Caixa" <? if($dados['banco_2'] == "Nossa Caixa") { echo 'selected="selected"'; } ?> >Nossa Caixa</option>
                        </select>
						</p>
                        
                        <p>
                        <label>Ag&ecirc;ncia:</label>
						<input class="input-texto input-menor" type="text" id="agencia_2" name="agencia_2" value="<?php echo $dados['agencia_2']; ?>" maxlength="50" /><br />
                        <small>Informe tamb&eacute;m o  d&iacute;gito verificador, caso exista. </small>
                        </p>
                        
                        <p>
                        <label>Conta:</label>
						<input class="input-texto input-menor" type="text" id="conta_2" name="conta_2" value="<?php echo $dados['conta_2']; ?>" maxlength="50" /> <br />
                        <small>Informe tamb&eacute;m o  d&iacute;gito verificador, caso exista. </small>
                        </p>

                        <p>
                        <label>Cedente:</label>
						<input class="input-texto input-medio" type="text" id="cedente_2" name="cedente_2" value="<?php echo $dados['cedente_2']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>CNPJ ou CPF:</label>
						<input class="input-texto input-medio" type="text" id="cpf_cnpj_2" name="cpf_cnpj_2" value="<?php echo $dados['cpf_cnpj_2']; ?>" maxlength="50" />
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