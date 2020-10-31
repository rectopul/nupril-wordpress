<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "usuarios";
		$pag = "adicionar-grupo";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Define as variáveis da página
		$nome = $_POST['nome'];
		
		// Checa se foi enviado informação
		if($_POST['nome']) { 
		$id_responsavel = $_SESSION['NUPILL_ID'];
		$nome_responsavel = $_SESSION['NUPILL_NOME'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_cadastro = date("c");
		$data_edicao = date("c");
		
		// Cria as variáveis com o post
		$acesso = $_POST['acesso'];
		$linha_insert = "";
		$linha_values = "";
		foreach($acesso as $i => $valoracesso){
		if($acesso != "") {
		$linha_insert .= $valoracesso.", ";
		$linha_values .= "'1', ";
		}
		}
		
		
		// Checa se há algum grupo com o mesmo nome
		$checa_nome = mysql_query("SELECT * FROM tb_grupos_usuarios WHERE nome = '$nome'");
		$num_checa_nome = mysql_num_rows($checa_nome);
		if($num_checa_nome != 0) { $erro = "15_1"; }
		
		// Se não foi enviado informação duplicada
		if(!$erro) {
			
		// Registra no banco de dados
		$inserir = "INSERT INTO tb_grupos_usuarios (
											nome, 
											$linha_insert
											data_cadastro,
											id_responsavel,
											nome_responsavel,
											data_edicao,
											id_editor,
											ip_editor
											)	VALUES (
											'$nome', 
											$linha_values
											'$data_cadastro',
											'$id_responsavel',
											'$nome_responsavel',
											'$data_edicao',
											'$id_editor',
											'$ip_editor'
											)";
		$inserir_exec = mysql_query($inserir) or die("Erro. Tente novamente ou contate o administrador.");
		
		// Se inserir
		if($inserir_exec) {
		header('Location:grupos.php?sucesso=10_1');
		} else {
		$erro = "13_1";
		}
		
		} // Fim da checagem se não foi enviado informação duplicada	
		
		} // Fim da checagem se está foi enviado informação		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Adicionar grupo de usuários</title>
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
			<h2>Adicionar Grupo de usu&aacute;rios</h2>
			<p id="introducao">Utilize o formul&aacute;rio abaixo para adicionar um novo grupo de usu&aacute;rios.</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
            
	    	<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo">
            
	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Dados do grupo</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- FORMULÁRIO -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="adicionar-grupo.php" method="post">
						<fieldset>
                                               
                        <p>
                        <label>Nome:</label>
						<input class="input-texto input-medio required" type="text" id="nome" name="nome" value="<?php echo $nome; ?>" />
                        </p>
                        
                        
                        <p>
                        <label>Este grupo ter&aacute; acesso &agrave;s seguintes &aacute;reas</label>
						
                        <? $valormodulo = explode("-", $modulos_sistema);
						   $contagem = "1";
						   foreach($valormodulo as $valorid){
							$validate_text = "";
							if($contagem == 1) { $validate_text = 'validate="required:true, minlength:1"'; }
							echo '<input type="checkbox" value="'.$valorid.'" name="acesso[]" '.$validate_text.' /> '.InfoModulo($valorid, nome).'<br />
							';
						    $contagem ++;
						   } 
						?>

                        <label for="acesso[]" class="invalido">Selecione pelo menos uma op&ccedil;&atilde;o acima.</label>
                        </p>
                        

                        
                        <p><input class="botao grande" type="submit" value="Adicionar" /></p>
								
						</fieldset>
						<div class="clear"></div>
					</form>
                    
                    </div>
                    <!-- FIM DO FORMULÁRIO -->
					
				</div> 
                <!-- FIM DO CONTEÚDO DO MIOLO -->
				
			</div>
            <!-- FIM DO MIOLO -->            
            
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
<script type="text/javascript" src="../_scripts/jquery.config-escrita-data.js"></script>
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