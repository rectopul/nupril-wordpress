<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "configuracoes";
		$pag = "config-frete";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define a id 
		$id_editar = "1";
		
		// Checa se foi enviado informação
		if($_POST['cep_origem']) {
		$cep_origem = $_POST['cep_origem'];
		$contrato_correios = $_POST['contrato_correios'];
		$valor_min_gratis = ReaisBD($_POST['valor_min_gratis']);
		$AC_capital = ReaisBD($_POST['AC_capital']);
		$AC_interior = ReaisBD($_POST['AC_interior']);
		$AL_capital = ReaisBD($_POST['AL_capital']);
		$AL_interior = ReaisBD($_POST['AL_interior']);
		$AP_capital = ReaisBD($_POST['AP_capital']);
		$AP_interior = ReaisBD($_POST['AP_interior']);
		$AM_capital = ReaisBD($_POST['AM_capital']);
		$AM_interior = ReaisBD($_POST['AM_interior']);
		$BA_capital = ReaisBD($_POST['BA_capital']);
		$BA_interior = ReaisBD($_POST['BA_interior']);
		$CE_capital = ReaisBD($_POST['CE_capital']);
		$CE_interior = ReaisBD($_POST['CE_interior']);
		$DF_capital = ReaisBD($_POST['DF_capital']);
		$DF_interior = ReaisBD($_POST['DF_interior']);
		$ES_capital = ReaisBD($_POST['ES_capital']);
		$ES_interior = ReaisBD($_POST['ES_interior']);
		$GO_capital = ReaisBD($_POST['GO_capital']);
		$GO_interior = ReaisBD($_POST['GO_interior']);
		$MA_capital = ReaisBD($_POST['MA_capital']);
		$MA_interior = ReaisBD($_POST['MA_interior']);
		$MT_capital = ReaisBD($_POST['MT_capital']);
		$MT_interior = ReaisBD($_POST['MT_interior']);
		$MS_capital = ReaisBD($_POST['MS_capital']);
		$MS_interior = ReaisBD($_POST['MS_interior']);
		$MG_capital = ReaisBD($_POST['MG_capital']);
		$MG_interior = ReaisBD($_POST['MG_interior']);
		$PA_capital = ReaisBD($_POST['PA_capital']);
		$PA_interior = ReaisBD($_POST['PA_interior']);
		$PB_capital = ReaisBD($_POST['PB_capital']);
		$PB_interior = ReaisBD($_POST['PB_interior']);
		$PR_capital = ReaisBD($_POST['PR_capital']);
		$PR_interior = ReaisBD($_POST['PR_interior']);
		$PE_capital = ReaisBD($_POST['PE_capital']);
		$PE_interior = ReaisBD($_POST['PE_interior']);
		$PI_capital = ReaisBD($_POST['PI_capital']);
		$PI_interior = ReaisBD($_POST['PI_interior']);
		$RJ_capital = ReaisBD($_POST['RJ_capital']);
		$RJ_interior = ReaisBD($_POST['RJ_interior']);
		$RN_capital = ReaisBD($_POST['RN_capital']);
		$RN_interior = ReaisBD($_POST['RN_interior']);
		$RS_capital = ReaisBD($_POST['RS_capital']);
		$RS_interior = ReaisBD($_POST['RS_interior']);
		$RO_capital = ReaisBD($_POST['RO_capital']);
		$RO_interior = ReaisBD($_POST['RO_interior']);
		$RR_capital = ReaisBD($_POST['RR_capital']);
		$RR_interior = ReaisBD($_POST['RR_interior']);
		$SC_capital = ReaisBD($_POST['SC_capital']);
		$SC_interior = ReaisBD($_POST['SC_interior']);
		$SP_capital = ReaisBD($_POST['SP_capital']);
		$SP_interior = ReaisBD($_POST['SP_interior']);
		$SE_capital = ReaisBD($_POST['SE_capital']);
		$SE_interior = ReaisBD($_POST['SE_interior']);
		$TO_capital = ReaisBD($_POST['TO_capital']);
		$TO_interior = ReaisBD($_POST['TO_interior']);
		$id_editor = $_SESSION['NUPILL_ID'];
		$nome_editor = $_SESSION['NUPILL_NOME'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Trabalha as formas de frete
		$linha_update = "encomenda_normal = '2', ";
		$linha_update .= "sedex = '2', ";
		$linha_update .= "sedex_10 = '2', ";
		if($_POST['modo_frete']) {
		$modo_frete = $_POST['modo_frete'];
		$modo_frete_correios = '1';
		foreach($modo_frete as $i => $valormodo_frete){
		$linha_update .= $valormodo_frete." = '1', ";
		} } else {
		$modo_frete_correios = '2';
		}
		
		// Se não há erros
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE sis_frete SET 	cep_origem = '$cep_origem',
											modo_frete_correios = '$modo_frete_correios',
											$linha_update
											contrato_correios = '$contrato_correios',
											valor_min_gratis = '$valor_min_gratis',
											AC_capital = '$AC_capital',
											AC_interior = '$AC_interior',
											AL_capital = '$AL_capital',
											AL_interior = '$AL_interior',
											AP_capital = '$AP_capital',
											AP_interior = '$AP_interior',
											AM_capital = '$AM_capital',
											AM_interior = '$AM_interior',
											BA_capital = '$BA_capital',
											BA_interior = '$BA_interior',
											CE_capital = '$CE_capital',
											CE_interior = '$CE_interior',
											DF_capital = '$DF_capital',
											DF_interior = '$DF_interior',
											ES_capital = '$ES_capital',
											ES_interior = '$ES_interior',
											GO_capital = '$GO_capital',
											GO_interior = '$GO_interior',
											MA_capital = '$MA_capital',
											MA_interior = '$MA_interior',
											MT_capital = '$MT_capital',
											MT_interior = '$MT_interior',
											MS_capital = '$MS_capital',
											MS_interior = '$MS_interior',
											MG_capital = '$MG_capital',
											MG_interior = '$MG_interior',
											PA_capital = '$PA_capital',
											PA_interior = '$PA_interior',
											PB_capital = '$PB_capital',
											PB_interior = '$PB_interior',
											PR_capital = '$PR_capital',
											PR_interior = '$PR_interior',
											PE_capital = '$PE_capital',
											PE_interior = '$PE_interior',
											PI_capital = '$PI_capital',
											PI_interior = '$PI_interior',
											RJ_capital = '$RJ_capital',
											RJ_interior = '$RJ_interior',
											RN_capital = '$RN_capital',
											RN_interior = '$RN_interior',
											RS_capital = '$RS_capital',
											RS_interior = '$RS_interior',
											RO_capital = '$RO_capital',
											RO_interior = '$RO_interior',
											RR_capital = '$RR_capital',
											RR_interior = '$RR_interior',
											SC_capital = '$SC_capital',
											SC_interior = '$SC_interior',
											SP_capital = '$SP_capital',
											SP_interior = '$SP_interior',
											SE_capital = '$SE_capital',
											SE_interior = '$SE_interior',
											TO_capital = '$TO_capital',
											TO_interior = '$TO_interior',
											id_editor = '$id_editor',
											nome_editor = '$nome_editor',
											ip_editor = '$ip_editor',
											data_edicao = '$data_edicao'
											
											WHERE
											
											id = '$id_editar'
											";
		$editar_exec = mysql_query($editar) or die(mysql_error());
	
		// Se editar
		if($editar_exec) {
		$sucesso = "16_1";
		} else {
		$erro = "21_1";
		}
		
		} // Fim da checagem se não há erros	
		
		} // Fim da checagem se está foi enviado informação	
		
		// Pega os dados do Sistema
		$busca_dados = mysql_query("SELECT * FROM sis_frete WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Configurações de frete</title>
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
			<h2>Configura&ccedil;&atilde;o de frete</h2>
            <p id="introducao">Informe os dados que ser&atilde;o usados para calcular o custo do frete.</p>
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
          		<li><a class="botao-atalho" href="deposito.php" title="Dados para Dep&oacute;sitos"><span>
				<img src="../_imagens/atalhos/deposito.png" alt="Dados para Dep&oacute;sitos" /><br />
					Dados para Dep&oacute;sitos</span></a>
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
					<h3 class="tit-longo visivel">Dados para o c&aacute;lculo do frete</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- CONFIGURAÇÕES -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="frete.php" method="post">
						<fieldset>
                        
						<p>
                        <label>CEP de origem</label>
						<input class="input-texto input-menor number" type="text" id="cep_origem" name="cep_origem" value="<?php echo $dados['cep_origem']; ?>" maxlength="8" minlength="8" /><br />
                        <small>Digite apenas os n&uacute;meros. Este &eacute; o CEP de onde as mercadorias ser&atilde;o despachadas (Loja, Dep&oacute;sito, etc). </small>
                        </p>
                        
                        <p>
                        <label>Modalidades dos Correios dispon&iacute;veis:</label>
                        <input type="checkbox" name="modo_frete[]" value="encomenda_normal" <?php if($dados['encomenda_normal'] == "1") { echo'checked="checked"'; } ?> /> Encomenda Normal (PAC)<br />
                        <input type="checkbox" name="modo_frete[]" value="sedex" <?php if($dados['sedex'] == "1") { echo'checked="checked"'; } ?> /> Sedex<br />
                        <input type="checkbox" name="modo_frete[]" value="sedex_10" <?php if($dados['sedex_10'] == "1") { echo'checked="checked"'; } ?> /> Sedex10<br />
                        <small>Caso n&atilde;o selecione nenhuma das alternativas acima o sistema n&atilde;o oferecer&aacute; transporte pelos Correios. </small>
                        </p>                  
                        
                        <p>
                        <label>Contrato com os Correios:</label>
						<input class="input-texto input-medio" type="text" id="contrato_correios" name="contrato_correios" value="<?php echo $dados['contrato_correios']; ?>" maxlength="255" /><br />
                        <small>Caso possua um contrato com os correios informe no campo acima o c&oacute;digo fornecido pela institui&ccedil;&atilde;o. </small>
                        </p>                       
                        
                        <p>
                        <label>Valor m&iacute;nimo para frete gr&aacute;tis:</label>
                        <input class="input-texto input-menor reais" type="text" id="valor_min_gratis" name="valor_min_gratis" value="<?php echo Reais($dados['valor_min_gratis']); ?>" maxlength="15" />
                        <br />
                        <small>Caso queira fazer uma promo&ccedil;&atilde;o de frete gr&aacute;tis a partir de um valor m&iacute;nimo, informe o valor acima.</small><br />
                        <small>Caso contr&aacute;rio deixe um valor alto registrado Ex. R$ 1.000.000,00.</small>
                        </p>
                        
                        </fieldset>
                        <fieldset>
                        <legend>Dados para c&aacute;lculo de frete de Transportadora</legend>
                        
                        <p><span class="nota">ATEN&Ccedil;&Atilde;O:</span> Quando o volume ou peso ultrapassam o limite m&aacute;ximo transportado pelos Correios, o sistema automaticamente calcula o valor do frete atrav&eacute;s dos custos informados abaixo. Portanto informe a tarifa (em<strong> Reais</strong>) para cada <strong>Kilo</strong> &agrave; ser entregue pelas <strong>Transportadoras</strong> em:</p>
                        
                        <!-- TABELA DE PREÇOS DA TRASPORTADORA -->
                        <table class="noline" width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          
                          <td>
                          <label class="minimo">AC Capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AC_capital" name="AC_capital" value="<?php echo Reais($dados['AC_capital']); ?>" maxlength="14" />
                          <label for="AC_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">AC Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AC_interior" name="AC_interior" value="<?php echo Reais($dados['AC_interior']); ?>" maxlength="14" />
                          <label for="AC_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">AL Capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AL_capital" name="AL_capital" value="<?php echo Reais($dados['AL_capital']); ?>" maxlength="14" />
                          <label for="AL_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">AL Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AL_interior" name="AL_interior" value="<?php echo Reais($dados['AL_interior']); ?>" maxlength="14" />
                          <label for="AL_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">AM capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AM_capital" name="AM_capital" value="<?php echo Reais($dados['AM_capital']); ?>" maxlength="14" />
                          <label for="AM_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">AM Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AM_interior" name="AM_interior" value="<?php echo Reais($dados['AM_interior']); ?>" maxlength="14" />
                          <label for="AM_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">AP capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AP_capital" name="AP_capital" value="<?php echo Reais($dados['AP_capital']); ?>" maxlength="14" />
                          <label for="AP_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">AP Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="AP_interior" name="AP_interior" value="<?php echo Reais($dados['AP_interior']); ?>" maxlength="14" />
                          <label for="AP_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">BA capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="BA_capital" name="BA_capital" value="<?php echo Reais($dados['BA_capital']); ?>" maxlength="14" />
                          <label for="BA_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">BA Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="BA_interior" name="BA_interior" value="<?php echo Reais($dados['BA_interior']); ?>" maxlength="14" />
                          <label for="BA_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">CE capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="CE_capital" name="CE_capital" value="<?php echo Reais($dados['CE_capital']); ?>" maxlength="14" />
                          <label for="CE_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">CE Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="CE_interior" name="CE_interior" value="<?php echo Reais($dados['CE_interior']); ?>" maxlength="14" />
                          <label for="CE_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">DF capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="DF_capital" name="DF_capital" value="<?php echo Reais($dados['DF_capital']); ?>" maxlength="14" />
                          <label for="DF_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">DF Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="DF_interior" name="DF_interior" value="<?php echo Reais($dados['DF_interior']); ?>" maxlength="14" />
                          <label for="DF_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">ES capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="ES_capital" name="ES_capital" value="<?php echo Reais($dados['ES_capital']); ?>" maxlength="14" />
                          <label for="ES_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">ES Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="ES_interior" name="ES_interior" value="<?php echo Reais($dados['ES_interior']); ?>" maxlength="14" />
                          <label for="ES_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">GO capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="GO_capital" name="GO_capital" value="<?php echo Reais($dados['GO_capital']); ?>" maxlength="14" />
                          <label for="GO_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">GO Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="GO_interior" name="GO_interior" value="<?php echo Reais($dados['GO_interior']); ?>" maxlength="14" />
                          <label for="GO_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">MA capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MA_capital" name="MA_capital" value="<?php echo Reais($dados['MA_capital']); ?>" maxlength="14" />
                          <label for="MA_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">MA Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MA_interior" name="MA_interior" value="<?php echo Reais($dados['MA_interior']); ?>" maxlength="14" />
                          <label for="MA_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">MG capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MG_capital" name="MG_capital" value="<?php echo Reais($dados['MG_capital']); ?>" maxlength="14" />
                          <label for="MG_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">MG Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MG_interior" name="MG_interior" value="<?php echo Reais($dados['MG_interior']); ?>" maxlength="14" />
                          <label for="MG_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">MS capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MS_capital" name="MS_capital" value="<?php echo Reais($dados['MS_capital']); ?>" maxlength="14" />
                          <label for="MS_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">MS Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MS_interior" name="MS_interior" value="<?php echo Reais($dados['MS_interior']); ?>" maxlength="14" />
                          <label for="MS_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">MT capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MT_capital" name="MT_capital" value="<?php echo Reais($dados['MT_capital']); ?>" maxlength="14" />
                          <label for="MT_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">MT Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="MT_interior" name="MT_interior" value="<?php echo Reais($dados['MT_interior']); ?>" maxlength="14" />
                          <label for="MT_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">PA capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PA_capital" name="PA_capital" value="<?php echo Reais($dados['PA_capital']); ?>" maxlength="14" />
                          <label for="PA_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">PA Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PA_interior" name="PA_interior" value="<?php echo Reais($dados['PA_interior']); ?>" maxlength="14" />
                          <label for="PA_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">PB capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PB_capital" name="PB_capital" value="<?php echo Reais($dados['PB_capital']); ?>" maxlength="14" />
                          <label for="PB_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">PB Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PB_interior" name="PB_interior" value="<?php echo Reais($dados['PB_interior']); ?>" maxlength="14" />
                          <label for="PB_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">PE capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PE_capital" name="PE_capital" value="<?php echo Reais($dados['PE_capital']); ?>" maxlength="14" />
                          <label for="PE_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">PE Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PE_interior" name="PE_interior" value="<?php echo Reais($dados['PE_interior']); ?>" maxlength="14" />
                          <label for="PE_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">PI capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PI_capital" name="PI_capital" value="<?php echo Reais($dados['PI_capital']); ?>" maxlength="14" />
                          <label for="PI_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">PI Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PI_interior" name="PI_interior" value="<?php echo Reais($dados['PI_interior']); ?>" maxlength="14" />
                          <label for="PI_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">PR capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PR_capital" name="PR_capital" value="<?php echo Reais($dados['PR_capital']); ?>" maxlength="14" />
                          <label for="PR_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">PR Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="PR_interior" name="PR_interior" value="<?php echo Reais($dados['PR_interior']); ?>" maxlength="14" />
                          <label for="PR_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">RJ capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RJ_capital" name="RJ_capital" value="<?php echo Reais($dados['RJ_capital']); ?>" maxlength="14" />
                          <label for="RJ_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">RJ Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RJ_interior" name="RJ_interior" value="<?php echo Reais($dados['RJ_interior']); ?>" maxlength="14" />
                          <label for="RJ_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">RN capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RN_capital" name="RN_capital" value="<?php echo Reais($dados['RN_capital']); ?>" maxlength="14" />
                          <label for="RN_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">RN Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RN_interior" name="RN_interior" value="<?php echo Reais($dados['RN_interior']); ?>" maxlength="14" />
                          <label for="RN_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">RO capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RO_capital" name="RO_capital" value="<?php echo Reais($dados['RO_capital']); ?>" maxlength="14" />
                          <label for="RO_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">RO Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RO_interior" name="RO_interior" value="<?php echo Reais($dados['RO_interior']); ?>" maxlength="14" />
                          <label for="RO_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">RR capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RR_capital" name="RR_capital" value="<?php echo Reais($dados['RR_capital']); ?>" maxlength="14" />
                          <label for="RR_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">RR Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RR_interior" name="RR_interior" value="<?php echo Reais($dados['RR_interior']); ?>" maxlength="14" />
                          <label for="RR_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">RS capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RS_capital" name="RS_capital" value="<?php echo Reais($dados['RS_capital']); ?>" maxlength="14" />
                          <label for="RS_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">RS Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="RS_interior" name="RS_interior" value="<?php echo Reais($dados['RS_interior']); ?>" maxlength="14" />
                          <label for="RS_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">SC capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SC_capital" name="SC_capital" value="<?php echo Reais($dados['SC_capital']); ?>" maxlength="14" />
                          <label for="SC_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">SC Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SC_interior" name="SC_interior" value="<?php echo Reais($dados['SC_interior']); ?>" maxlength="14" />
                          <label for="SC_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                          <label class="minimo">SE capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SE_capital" name="SE_capital" value="<?php echo Reais($dados['SE_capital']); ?>" maxlength="14" />
                          <label for="SE_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">SE Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SE_interior" name="SE_interior" value="<?php echo Reais($dados['SE_interior']); ?>" maxlength="14" />
                          <label for="SE_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          
                          <td>
                          <label class="minimo">SP capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SP_capital" name="SP_capital" value="<?php echo Reais($dados['SP_capital']); ?>" maxlength="14" />
                          <label for="SP_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">SP Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="SP_interior" name="SP_interior" value="<?php echo Reais($dados['SP_interior']); ?>" maxlength="14" />
                          <label for="SP_interior" class="invalido"></label>
                          </td>
                          
                        </tr>
                       <tr>
                          
                          <td>
                          <label class="minimo">TO capital:</label>
                          <input class="input-texto input-minitable reais" type="text" id="TO_capital" name="TO_capital" value="<?php echo Reais($dados['TO_capital']); ?>" maxlength="14" />
                          <label for="TO_capital" class="invalido"></label>
                          </td>
                          
                          <td>
                          <label class="minimo">TO Interior:</label>
                          <input class="input-texto input-minitable reais" type="text" id="TO_interior" name="TO_interior" value="<?php echo Reais($dados['TO_interior']); ?>" maxlength="14" />
                          <label for="TO_interior" class="invalido"></label>
                          </td>
                          
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        
                        </tr>
                        
                      </table>
                      <!-- FIM DA TABELA DE PREÇOS DA TRASPORTADORA -->
                      
                      <p>&nbsp;</p>
                        
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
<script type="text/javascript" src="../_scripts/jquery.maskmoney.js"></script>
<script type="text/javascript" src="../_scripts/jquery.config-escrita.js"></script>
<script>
$(document).ready(function() {
	
	// Máscara para reais
	$("input.reais").maskMoney({symbol:"R$",decimal:",",thousands:"."})

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