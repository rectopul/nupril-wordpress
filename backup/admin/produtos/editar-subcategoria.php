<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "produtos";
		$pag = "subcategorias";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Checa se há ID
		if($_GET['id']) { $id_editar = $_GET['id']; }
		if($_POST['id']) { $id_editar = $_POST['id']; }
		if ($id_editar) {
			
		// Pega os dados do Usuário
		$busca_dados = mysql_query("SELECT * FROM tb_subcategorias WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
		// Checa se foi enviado informação
		if($_POST['nome']) {
		$nome = $_POST['nome'];
		$categoria_mae = $_POST['categoria_mae'];
		$descricao = $_POST['descricao'];
		$hierarquia = $_POST['hierarquia'];
		$chamada = $_POST['chamada'];
		$status = $_POST['status'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Gera o apelido
		$apelido = GeraApelidoSubcategoria($_POST['nome'], "-", $id_editar);
		
		// Busca dados da categoria mãe
		$busca_bd_categoria_mae = mysql_query("SELECT * FROM tb_categorias WHERE id = '$categoria_mae'");
		$dados_bd_categoria_mae = mysql_fetch_array($busca_bd_categoria_mae);
		$nome_categoria_mae = $dados_bd_categoria_mae['nome'];		
		
		// Se não foi enviado informação duplicada
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE tb_subcategorias SET nome = '$nome',
											apelido = '$apelido',
											categoria_mae = '$categoria_mae',
											nome_categoria_mae = '$nome_categoria_mae',
											chamada = '$chamada',
											descricao = '$descricao',
											hierarquia = '$hierarquia',
											data_edicao = '$data_edicao',
											id_editor = '$id_editor',
											ip_editor = '$ip_editor',
											ultima_acao = '$acao_edicao',
											status = '$status'
											
											WHERE
											
											id = '$id_editar'
											";
		$editar_exec = mysql_query($editar);
		
		// Atualiza os produtos
		$editar_produto = "UPDATE tb_produtos SET nome_subcategoria = '$nome',
												  apelido_subcategoria = '$apelido'
											
											WHERE
											
											id_subcategoria = '$id_editar'
											";
		$editar_exec_produto = mysql_query($editar_produto);
	
		// Se editar
		if($editar_exec) {
		header('Location:subcategorias.php?sucesso=73');
		} else {
		$erro = "73";
		}
		
		} // Fim da checagem se não foi enviado informação duplicada	
		
		} // Fim da checagem se está foi enviado informação
		
		} else {
		header('Location:subcategorias.php'); 
		}  // Fim da checagem se há ID
		
		// Busca as categorias mães
		$busca_categorias_maes = mysql_query("SELECT * FROM tb_categorias WHERE tipo = 'fixa' ORDER BY nome ASC");
		if(mysql_num_rows($busca_categorias_maes) == 0) { header('Location:index.php?erro=74'); }
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Editar subcategoria</title>
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
				Ol&aacute; <a href="../subcategorias/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
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
			<h2>Editar Subcategoria</h2>
			<p id="introducao">Utilize o formul&aacute;rio abaixo para editar os dados da subcategoria</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
            
	    	<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo">
            
	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Dados da subcategoria</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- FORMULÁRIO -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="editar-subcategoria.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id_editar; ?>" />
						<fieldset>
                        <p>
                        <label>Nome:</label>
						<input class="input-texto input-medio required" type="text" id="nome" name="nome" value="<?php echo $dados['nome']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Hierarquia:</label>
						<input class="input-texto input-medio required numbers" type="text" id="hierarquia" name="hierarquia" value="<?php echo $dados['hierarquia']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Categoria m&atilde;e:</label>              
		  		  		<select id="categoria_mae" name="categoria_mae" class="input-menor required" >
                            <?php // Lista os grupos
							      while($dados_categorias_maes = mysql_fetch_array($busca_categorias_maes)) {
							?>
                            <option value="<?php echo $dados_categorias_maes['id']; ?>" <?php if($dados['categoria_mae'] == $dados_categorias_maes['id']) { echo'selected="selected"'; } ?> ><?php echo $dados_categorias_maes['nome']; ?></option>
                            <?php } ?>
                            
                        </select><br />
						</p>
                        
                        <p>
                        <label>Chamada:</label>
						<input class="input-texto input-medio required" type="text" id="chamada" name="chamada" value="<?php echo $dados['chamada']; ?>" maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Descri&ccedil;&atilde;o:</label>
						<textarea class="input-texto textarea" id="descricao" name="descricao" cols="79" rows="3" maxlength="250" ><?php echo $dados['descricao']; ?></textarea><br />
                        <small>Descri&ccedil;&atilde;o da subcategoria.</small>
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