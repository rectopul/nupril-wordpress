<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "produtos";
		$pag = "categorias";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Checa se há ID
		if($_GET['id']) { $id_editar = $_GET['id']; }
		if($_POST['id']) { $id_editar = $_POST['id']; }
		if ($id_editar) {
			
		// Pega os dados do Usuário
		$busca_dados = mysql_query("SELECT * FROM tb_categorias WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
		// Checa se foi enviado informação
		if($_POST['nome']) {
		$nome = $_POST['nome'];
		$chamada = $_POST['chamada'];
		$tipo = "fixa";
		$porcentagem_promocao = $_POST['porcentagem_promocao'];
		$descricao = $_POST['descricao'];
		$status = $_POST['status'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Gera o apelido
		$apelido = GeraApelidoCategoria($_POST['nome'], "-", $id_editar);
		if($apelido == "Apelido em uso") { $erro = "68"; }
		
		// Checa se há alguma categoria com o mesmo nome
		$checa_nome = mysql_query("SELECT * FROM tb_categorias WHERE nome = '$nome' AND id != '$id_editar'");
		$num_checa_nome = mysql_num_rows($checa_nome);
		if($num_checa_nome != 0) { $erro = "68"; }
		
		// Se não foi enviado informação duplicada
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE tb_categorias SET nome = '$nome',
											apelido = '$apelido',
											chamada = '$chamada',
											tipo = '$tipo',
											porcentagem_promocao = '$porcentagem_promocao',
											descricao = '$descricao',
											data_edicao = '$data_edicao',
											id_editor = '$id_editor',
											ip_editor = '$ip_editor',
											ultima_acao = '$acao_edicao',
											status = '$status'
											
											WHERE
											
											id = '$id_editar'
											";
		$editar_exec = mysql_query($editar);
		
		// Atualiza as subcategorias filhas
		$editar_sub = "UPDATE tb_subcategorias SET nome_categoria_mae = '$nome'
											
											WHERE
											
											categoria_mae = '$id_editar'
											";
		$editar_exec_sub = mysql_query($editar_sub);
		
		// Atualiza os produtos
		$editar_produto = "UPDATE tb_produtos SET nome_categoria = '$nome',
												  apelido_categoria = '$apelido'
											
											WHERE
											
											id_categoria = '$id_editar'
											";
		$editar_exec_produto = mysql_query($editar_produto);
		
	
		// Se editar
		if($editar_exec) {
		header('Location:categorias.php?sucesso=67');
		} else {
		$erro = "67";
		}
		
		} // Fim da checagem se não foi enviado informação duplicada	
		
		} // Fim da checagem se está foi enviado informação
		
		} else {
		header('Location:categorias.php'); 
		}  // Fim da checagem se há ID
		
		//Trabalha o estilo
		$folha_estilo = '<style type="text/css">
<!--
';
		if($dados['tipo'] == "promocional") { 
			$folha_estilo .="form div#campo_porcentagem { display:block; }\n";
			$required_porcentagem_promocao = "required";
		}	  
		$folha_estilo .= "-->
</style>
		";
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Editar categoria</title>
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
				Ol&aacute; <a href="../categorias/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
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
			<h2>Editar Categoria</h2>
			<p id="introducao">Utilize o formul&aacute;rio abaixo para editar os dados da categoria</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
            
	    	<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo">
            
	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Dados da categoria</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- FORMULÁRIO -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="editar-categoria.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id_editar; ?>" />
						<fieldset>
                        <p>
                        <label>Nome:</label>
						<input class="input-texto input-medio required" type="text" id="nome" name="nome" value="<?php echo $dados['nome']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Chamada:</label>
						<input class="input-texto input-medio required" type="text" id="chamada" name="chamada" value="<?php echo $dados['chamada']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Descri&ccedil;&atilde;o:</label>
						<textarea class="input-texto textarea editor" id="descricao" name="descricao" cols="79" rows="3" ><?php echo $dados['descricao']; ?></textarea><br />
                        <small>Descri&ccedil;&atilde;o da categoria.</small>
                        </p>
                        
                        <p>
                        <label>Status:</label>              
		  		  		<select id="status" name="status" class="input-menor required" >
                          <option value="" <?php if($dados['status'] == "") { echo'selected="selected"'; } ?> >Selecione</option>
                          <option value="ativo" <?php if($dados['status'] == "ativo") { echo'selected="selected"'; } ?> >Ativa</option>
                          <option value="inativo" <?php if($dados['status'] == "inativo") { echo'selected="selected"'; } ?> >Inativa</option>
                        </select> 
						</p>
                        
                        <p><input class="botao grande" type="submit" value="Editar" /></p>
								
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
<script>
$(document).ready(function() {

	$("a.promocional").click(function() {
		$("div#campo_porcentagem").slideDown();
		$("#porcentagem_promocao").addClass("required");
	});
	
	$("a.fixa").click(function() {
		$("div#campo_porcentagem").fadeOut();
		$("#porcentagem_promocao").removeClass("required");
	});

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