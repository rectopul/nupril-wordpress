<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "configuracoes";
		$pag = "config-empresa";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define a id 
		$id_editar = "1";
		
		// Checa se foi enviado informação
		if($_POST['empresa_sistema']) {
		$empresa_sistema = mysql_real_escape_string($_POST['empresa_sistema']);
		$razao_social = mysql_real_escape_string($_POST['razao_social']);
		$cpf_cnpj = mysql_real_escape_string($_POST['cpf_cnpj']);
		$rg_ie = mysql_real_escape_string($_POST['rg_ie']);
		$telefone = mysql_real_escape_string($_POST['telefone']);
		$telefone_2 = mysql_real_escape_string($_POST['telefone_2']);
		$endereco = mysql_real_escape_string($_POST['endereco']);
		$bairro = mysql_real_escape_string($_POST['bairro']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$estado = mysql_real_escape_string($_POST['estado']);
		$email_pag_seguro = mysql_real_escape_string($_POST['email_pag_seguro']);
		$email_pagamento_digital = mysql_real_escape_string($_POST['email_pagamento_digital']);
		$email_paypal = mysql_real_escape_string($_POST['email_paypal']);
		$prazo = mysql_real_escape_string($_POST['prazo']);
		$id_editor = $_SESSION['NUPILL_ID'];
		$nome_editor = $_SESSION['NUPILL_NOME'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Trabalha as formas de pagamento
		$linha_update = "forma_pag_deposito = '2', ";
		$linha_update .= "forma_pag_boleto = '2', ";
		$linha_update .= "forma_pag_pag_seguro = '2', ";
		$linha_update .= "forma_pag_pagamento_digital = '2', ";
		$linha_update .= "forma_pag_paypal = '2', ";
		$forma_pag = $_POST['forma_pag'];
		foreach($forma_pag as $i => $valorforma_pag){
		$linha_update .= "forma_pag_".$valorforma_pag." = '1', ";
		}
		
		// Se não há erros
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE sis_config SET 	empresa_sistema = '$empresa_sistema',
											razao_social = '$razao_social',
											cpf_cnpj = '$cpf_cnpj',
											rg_ie = '$rg_ie',
											telefone = '$telefone',
											telefone_2 = '$telefone_2',
											endereco = '$endereco',
											bairro = '$bairro',
											cidade = '$cidade',
											estado = '$estado',
											$linha_update
											email_pag_seguro = '$email_pag_seguro',
											email_pagamento_digital = '$email_pagamento_digital',
											email_paypal = '$email_paypal',
											prazo =' $prazo',
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
		$sucesso = "14";
		} else {
		$erro = "19";
		}
		
		} // Fim da checagem se não há erros	
		
		} // Fim da checagem se está foi enviado informação	
		
		// Pega os dados do Sistema
		$busca_dados = mysql_query("SELECT * FROM sis_config WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
		//Trabalha o estilo
		$folha_estilo = '<style type="text/css">
<!--
';
		if($dados['forma_pag_pag_seguro'] == "1") { 
			$folha_estilo .="form div#pag_seguro{ display:block; }\n";
			$required_pag_seguro = "required";
		}
		if($dados['forma_pag_pagamento_digital'] == "1") { 
			$folha_estilo .="form div#pagamento_digital{ display:block; }\n";
			$required_pagamento_digital = "required";
		}
		if($dados['forma_pag_paypal'] == "1") { 
			$folha_estilo .="form div#paypal{ display:block; }\n";
			$required_paypal = "required";
		}
	  
		$folha_estilo .= "-->
</style>
		";
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Dados Empresariais</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="stylesheet" href="../_css/estilo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../_css/tema-<?php echo $tema_sistema; ?>.css" type="text/css"media="screen" />
<?php echo $folha_estilo; ?>
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
			<h2>Dados Empresariais e de Recebimento</h2>
            <p id="introducao">Informe os dados da Institui&ccedil;&atilde;o financeira do sistema.</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
		
			<div class="clear"></div>
			
            <!-- ATALHOS -->
            <ul class="atalhos">
			
                <li><a class="botao-atalho" href="index.php" title="Configura&ccedil;&otilde;es"><span>
				<img src="../_imagens/atalhos/configuracoes.png" alt="Configura&ccedil;&otilde;es" /><br />
					Configura&ccedil;&otilde;es</span></a>
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
					<h3 class="tit-longo visivel">Dados da empresa</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- CONFIGURAÇÕES -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="empresa.php" method="post">
						<fieldset>
						  <p>
                        <label>Nome da Empresa ou Pessoa F&iacute;sica respons&aacute;vel:</label>
						<input class="input-texto input-medio required" type="text" id="empresa_sistema" name="empresa_sistema" value="<?php echo $dados['empresa_sistema']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Raz&atilde;o Social:</label>
						<input class="input-texto input-medio" type="text" id="razao_social" name="razao_social" value="<?php echo $dados['razao_social']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>CNPJ ou CPF:</label>
						<input class="input-texto input-medio required" type="text" id="cpf_cnpj" name="cpf_cnpj" value="<?php echo $dados['cpf_cnpj']; ?>" maxlength="50" />
                        </p>
                        
                        <p>
                        <label>IE ou RG:</label>
						<input class="input-texto input-medio required" type="text" id="rg_ie" name="rg_ie" value="<?php echo $dados['rg_ie']; ?>" maxlength="50" />
                        </p>
                        
                        <p>
                        <label>Telefone:</label>
						<input class="input-texto input-medio" type="text" id="telefone" name="telefone" value="<?php echo $dados['telefone']; ?>" maxlength="50" />
                        </p>
                        
                        <p>
                        <label>Telefone secund&aacute;rio:</label>
						<input class="input-texto input-medio" type="text" id="telefone_2" name="telefone_2" value="<?php echo $dados['telefone_2']; ?>" maxlength="50" />
                        </p>
                        
                        <p>
                        <label>Endere&ccedil;o:</label>
						<input class="input-texto input-grande required" type="text" id="endereco" name="endereco" value="<?php echo $dados['endereco']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Bairro:</label>
						<input class="input-texto input-grande required" type="text" id="bairro" name="bairro" value="<?php echo $dados['bairro']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Cidade:</label>
						<input class="input-texto input-grande required" type="text" id="cidade" name="cidade" value="<?php echo $dados['cidade']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Estado:</label>              
					  <select name="estado" class="input-menor required" >
                         	<option value="" <? if($dados['estado'] == "") { echo 'selected="selected"'; } ?> >Selecione</option>
                            <option value="AC" <? if($dados['estado'] == "AC") { echo 'selected="selected"'; } ?> >Acre</option>
                              <option value="AL" <? if($dados['estado'] == "AL") { echo 'selected="selected"'; } ?> >Alagoas</option>
                              <option value="AP" <? if($dados['estado'] == "AP") { echo 'selected="selected"'; } ?> >Amap&aacute;</option>
                              <option value="AM" <? if($dados['estado'] == "AM") { echo 'selected="selected"'; } ?> >Amazonas</option>
                              <option value="BA" <? if($dados['estado'] == "BA") { echo 'selected="selected"'; } ?> >Bahia</option>
                              <option value="CE" <? if($dados['estado'] == "CE") { echo 'selected="selected"'; } ?> >Cear&aacute;</option>
                              <option value="DF" <? if($dados['estado'] == "DF") { echo 'selected="selected"'; } ?> >Distrito Federal</option>
                              <option value="ES" <? if($dados['estado'] == "ES") { echo 'selected="selected"'; } ?> >Esp&iacute;rito Santo</option>
                              <option value="GO" <? if($dados['estado'] == "GO") { echo 'selected="selected"'; } ?> >Goi&aacute;s</option>
                              <option value="MA" <? if($dados['estado'] == "MA") { echo 'selected="selected"'; } ?> >Maranh&atilde;o</option>
                              <option value="MT" <? if($dados['estado'] == "MT") { echo 'selected="selected"'; } ?> >Mato Grosso</option>
                              <option value="MS" <? if($dados['estado'] == "MS") { echo 'selected="selected"'; } ?> >Mato Grosso do Sul</option>
                              <option value="MG" <? if($dados['estado'] == "MG") { echo 'selected="selected"'; } ?> >Minas Gerais</option>
                              <option value="PA" <? if($dados['estado'] == "PA") { echo 'selected="selected"'; } ?> >Par&aacute;</option>
                              <option value="PB" <? if($dados['estado'] == "PB") { echo 'selected="selected"'; } ?> >Para&iacute;ba</option>
                              <option value="PR" <? if($dados['estado'] == "PR") { echo 'selected="selected"'; } ?> >Paran&aacute;</option>
                              <option value="PE" <? if($dados['estado'] == "PE") { echo 'selected="selected"'; } ?> >Pernambuco</option>
                              <option value="PI" <? if($dados['estado'] == "PI") { echo 'selected="selected"'; } ?> >Piau&iacute;</option>
                              <option value="RJ" <? if($dados['estado'] == "RJ") { echo 'selected="selected"'; } ?> >Rio de Janeiro</option>
                              <option value="RN" <? if($dados['estado'] == "RN") { echo 'selected="selected"'; } ?> >Rio Grande do Norte</option>
                              <option value="RS" <? if($dados['estado'] == "RS") { echo 'selected="selected"'; } ?> >Rio Grande do Sul</option>
                              <option value="RO" <? if($dados['estado'] == "RO") { echo 'selected="selected"'; } ?> >Rond&ocirc;nia</option>
                              <option value="RR" <? if($dados['estado'] == "RR") { echo 'selected="selected"'; } ?> >Roraima</option>
                              <option value="SC" <? if($dados['estado'] == "SC") { echo 'selected="selected"'; } ?> >Santa Catarina</option>
                              <option value="SP" <? if($dados['estado'] == "SP") { echo 'selected="selected"'; } ?> >S&atilde;o Paulo</option>
                              <option value="SE" <? if($dados['estado'] == "SE") { echo 'selected="selected"'; } ?> >Sergipe</option>
                              <option value="TO" <? if($dados['estado'] == "TO") { echo 'selected="selected"'; } ?> >Tocantins</option> 
                        </select>
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
<script>
$(document).ready(function() {
	
	<?php
	if($dados['forma_pag_pag_seguro'] == "1") { ?>
	$("a.pag_seguro").toggle(function() {
		$("div#pag_seguro").fadeOut();
		$("#email_pag_seguro").removeClass("required");
		}, function() {
		$("div#pag_seguro").slideDown();
		$("#email_pag_seguro").addClass("required");		
	});
	<?php } else { ?>
	$("a.pag_seguro").toggle(function() {
		$("div#pag_seguro").slideDown();
		$("#email_pag_seguro").addClass("required");
		}, function() {
		$("div#pag_seguro").fadeOut();
		$("#email_pag_seguro").removeClass("required");
	});
	<?php }  
	if($dados['forma_pag_pagamento_digital'] == "1") { 
	?>
	$("a.pagamento_digital").toggle(function() {
		$("div#pagamento_digital").fadeOut();
		$("#email_pagamento_digital").removeClass("required");
		}, function() {
		$("div#pagamento_digital").slideDown();
		$("#email_pagamento_digital").addClass("required");
	});
	<?php } else { ?>
	$("a.pagamento_digital").toggle(function() {
		$("div#pagamento_digital").slideDown();
		$("#email_pagamento_digital").addClass("required");
		}, function() {
		$("div#pagamento_digital").fadeOut();
		$("#email_pagamento_digital").removeClass("required");
	});
	<?php }  
	if($dados['forma_pag_paypal'] == "1") { 
	?>
	$("a.paypal").toggle(function() {
		$("div#paypal").fadeOut();
		$("#email_paypal").removeClass("required");						  
		}, function() {
		$("div#paypal").slideDown();
		$("#email_paypal").addClass("required");
	});
	<?php } else { ?>
		$("a.paypal").toggle(function() {
		$("div#paypal").slideDown();
		$("#email_paypal").addClass("required");
		}, function() {
		$("div#paypal").fadeOut();
		$("#email_paypal").removeClass("required");
	});
	<?php } ?>	

});
</script>
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