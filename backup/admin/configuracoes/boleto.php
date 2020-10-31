<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "configuracoes";
		$pag = "config-boleto";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define a id 
		$id_editar = "1";
		
		// Checa se foi enviado informação
		if($_POST['banco']) {
		$desconto = $_POST['desconto'];
		$banco = $_POST['banco'];
		$agencia = $_POST['agencia'];
		$agencia_dv = $_POST['agencia_dv'];
		$conta = $_POST['conta'];
		$conta_dv = $_POST['conta_dv'];
		$carteira = $_POST['carteira'];
		$variacao_carteira = $_POST['variacao_carteira'];
		$contrato = $_POST['contrato'];
		$convenio = $_POST['convenio'];
		$cedente = $_POST['cedente'];
		$info_cliente = $_POST['info_cliente'];
		$info_caixa = $_POST['info_caixa'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$nome_editor = $_SESSION['NUPILL_NOME'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Se não há erros
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE sis_boleto SET 	desconto = '$desconto',
											banco = '$banco',
											agencia = '$agencia',
											agencia_dv = '$agencia_dv',
											conta = '$conta',
											conta_dv = '$conta_dv',
											carteira = '$carteira',
											variacao_carteira = '$variacao_carteira',
											contrato = '$contrato',
											convenio = '$convenio',
											cedente = '$cedente',
											info_cliente = '$info_cliente',
											info_caixa = '$info_caixa',
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
		$sucesso = "15";
		} else {
		$erro = "20";
		}
		
		} // Fim da checagem se não há erros	
		
		} // Fim da checagem se está foi enviado informação	
		
		// Pega os dados do Sistema
		$busca_dados = mysql_query("SELECT * FROM sis_boleto WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Dados para Boletos</title>
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
			<h2>Dados para Boletos</h2>
            <p id="introducao">Informe os dados que ser&atilde;o usados para criar os boletos.</p>
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
          		<li><a class="botao-atalho" href="deposito.php" title="Dados para Dep&oacute;sitos"><span>
				<img src="../_imagens/atalhos/deposito.png" alt="Dados para Dep&oacute;sitos" /><br />
					Dados para Dep&oacute;sitos</span></a>
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
					<h3 class="tit-longo visivel">Dados banc&aacute;rios para Boleto</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- CONFIGURAÇÕES -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="boleto.php" method="post">
						<fieldset>
                        
						<p>
                        <label>Desconto:</label>
						<input class="input-texto input-minimo number" type="text" id="desconto" name="desconto" value="<?php echo $dados['desconto']; ?>" maxlength="3" /> %<br />
                        <small>Desconto para pagamentos em boleto. Informar em %. Caso n&atilde;o se aplique, deixe 0. </small>
                        </p>
                        
                        <p>
                        <label>Banco:</label>              
					  	<select name="banco" class="input-medio required" >
                         	<option value="UNIBANCO-ESPECIAL" <? if($dados['banco'] == "UNIBANCO-ESPECIAL") { echo 'selected="selected"'; } ?> >Unibanco - [Carteira/Conv&ecirc;nio: Especial]</option>
                            <option value="BB-6" <? if($dados['banco'] == "BB-6") { echo 'selected="selected"'; } ?> >Banco do Brasil - [Carteira 18 e Conv&ecirc;nio de 6 D&iacute;g.] </option>
                            <option value="BB-7" <? if($dados['banco'] == "BB-7") { echo 'selected="selected"'; } ?> >Banco do Brasil - [Carteira 18 e Conv&ecirc;nio de 7 D&iacute;g.] </option>
                            <option value="BB-8" <? if($dados['banco'] == "BB-8") { echo 'selected="selected"'; } ?> >Banco do Brasil - [Carteira 18 e Conv&ecirc;nio de 8 D&iacute;g.] </option>
                            <option value="CEF-SR" <? if($dados['banco'] == "CEF-SR") { echo 'selected="selected"'; } ?> >Caixa Econ&ocirc;mica Federal - [Carteira/Conv&ecirc;nio: SR (SICOB)] </option>
                            <option value="CEF-SIGCB" <? if($dados['banco'] == "CEF-SIGCB") { echo 'selected="selected"'; } ?> >Caixa Econ&ocirc;mica Federal - [Carteira/Conv&ecirc;nio: SIGCB] </option>
                            <option value="CEF-SINCO" <? if($dados['banco'] == "CEF-SINCO") { echo 'selected="selected"'; } ?> >Caixa Econ&ocirc;mica Federal - [Carteira/Conv&ecirc;nio: SINCO] </option>
                            <option value="BRADESCO" <? if($dados['banco'] == "BRADESCO") { echo 'selected="selected"'; } ?> >Bradesco - [Carteiras: 06 / 03 / 09] </option>
                            <option value="HSBC-CNR" <? if($dados['banco'] == "HSBC-CNR") { echo 'selected="selected"'; } ?> >HSBC - [Carteira/Conv&ecirc;nio: CNR] </option>
                            <option value="ITAU" <? if($dados['banco'] == "ITAU") { echo 'selected="selected"'; } ?> >Ita&uacute; - [Carteiras: 175 / 174 / 178 / 104 / 109 / 157] </option>
                            <option value="SANTANDER" <? if($dados['banco'] == "SANTANDER") { echo 'selected="selected"'; } ?> >Santander Banespa - [Carteira/Conv&ecirc;nio: COB] </option>
                            <option value="REAL" <? if($dados['banco'] == "REAL") { echo 'selected="selected"'; } ?> >Real - [Carteira: 57] </option>
                            <option value="NOSSACAIXA" <? if($dados['banco'] == "NOSSACAIXA") { echo 'selected="selected"'; } ?> >Nossa Caixa - [Carteiras: 5 e 1] </option>
                         
                        </select>
						</p>
                        
                        <p>
                        <label>Ag&ecirc;ncia:</label>
						<input class="input-texto input-menor" type="text" id="agencia" name="agencia" value="<?php echo $dados['agencia']; ?>" maxlength="50" /> - <input class="input-texto input-minimo" type="text" id="agencia_dv" name="agencia_dv" value="<?php echo $dados['agencia_dv']; ?>" maxlength="25" /><br />
                        <small>Caso n&atilde;o haja d&iacute;gito verificador, deixe o campo em branco. </small>
                        </p>
                        
                        <p>
                        <label>Conta:</label>
						<input class="input-texto input-menor" type="text" id="conta" name="conta" value="<?php echo $dados['conta']; ?>" maxlength="50" /> - <input class="input-texto input-minimo" type="text" id="conta_dv" name="conta_dv" value="<?php echo $dados['conta_dv']; ?>" maxlength="25" /><br />
                        <small>Caso n&atilde;o haja d&iacute;gito verificador, deixe o campo em branco. </small>
                        </p>
                        
                        <p>
                        <label>Carteira:</label>
						<input class="input-texto input-menor" type="text" id="carteira" name="carteira" value="<?php echo $dados['carteira']; ?>" maxlength="100" />
                        </p>
                        
                        <p>
                        <label>Varia&ccedil;&atilde;o da Carteira:</label>
						<input class="input-texto input-menor" type="text" id="variacao_carteira" name="variacao_carteira" value="<?php echo $dados['variacao_carteira']; ?>" maxlength="100" />
                        </p>
                        
                        <p>
                        <label>Contrato:</label>
						<input class="input-texto input-medio" type="text" id="contrato" name="contrato" value="<?php echo $dados['contrato']; ?>" />
                        </p>
                        
                        <p>
                        <label>Conv&ecirc;nio:</label>
						<input class="input-texto input-medio" type="text" id="convenio" name="convenio" value="<?php echo $dados['convenio']; ?>" maxlength="100" />
                        </p>
                        
                        <p>
                        <label>Cedente:</label>
						<input class="input-texto input-medio" type="text" id="cedente" name="cedente" value="<?php echo $dados['cedente']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Informa&ccedil;&atilde;o para o cliente:</label>
						<textarea class="input-texto textarea" id="info_cliente" name="info_cliente" cols="79" rows="3" maxlength="200" ><?php echo $dados['info_cliente']; ?></textarea><br />
                        <small>Informa&ccedil;&atilde;o destinada ao cliente que aparecer&aacute; no boleto impresso.</small>
                        </p>
                        
                        <p>
                        <label>Informa&ccedil;&atilde;o para o caixa:</label>
						<textarea class="input-texto textarea" id="info_caixa" name="info_caixa" cols="79" rows="3" maxlength="200" ><?php echo $dados['info_caixa']; ?></textarea><br />
                        <small>Informa&ccedil;&atilde;o destinada ao caixa que aparecer&aacute; no boleto impresso.</small>
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