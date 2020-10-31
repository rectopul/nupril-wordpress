<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "usuarios";
		$pag = "editar-usuario";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Checa se há ID
		if($_GET['id']) { $id_editar = $_GET['id']; }
		if($_POST['id']) { $id_editar = $_POST['id']; }
		if ($id_editar) {
			
		// Pega os dados do Usuário
		$busca_dados = mysql_query("SELECT * FROM tb_usuarios WHERE id = '$id_editar'");
		$dados = mysql_fetch_array($busca_dados);
		
		// Checa se foi enviado informação
		if($_POST['nome']) {
		$grupo = $_POST['grupo'];
		$status = $_POST['status'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$senha_md5 = md5($senha);
		$senha_antiga = $_POST['senha_antiga'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_edicao = date("c");
		$acao_edicao = "edicao";
		
		// Trabalha a senha
		if ($senha != "") {
			if ($senha_md5 != $senha_antiga) { $nova_senha = $senha_md5; }
			else { $nova_senha = $senha_antiga; }
		} else { $nova_senha = $senha_antiga; }
		
		// Checa se há algum usuário com o mesmo E-mail
		$checa_email = mysql_query("SELECT * FROM tb_usuarios WHERE email = '$email' AND id != '$id_editar'");
		$num_checa_email = mysql_num_rows($checa_email);
		if($num_checa_email != 0) { $erro = "15"; }
		
		// Se não foi enviado informação duplicada
		if(!$erro) {
			
		// Registra no banco de dados
		$editar = "UPDATE tb_usuarios SET 	grupo = '$grupo',
											nome = '$nome', 
											email = '$email', 
											usuario = '$usuario',
											senha = '$nova_senha',
											data_edicao = '$data_edicao',
											id_editor = '$id_editor',
											ip_editor = '$ip_editor',
											ultima_acao = '$acao_edicao',
											status = '$status'
											
											WHERE
											
											id = '$id_editar'
											";
		$editar_exec = mysql_query($editar);
	
		// Se editar
		if($editar_exec) {
		header('Location:index.php?sucesso=11');
		} else {
		$erro = "14";
		}
		
		} // Fim da checagem se não foi enviado informação duplicada	
		
		} // Fim da checagem se está foi enviado informação
		
		} else {
		header('Location:index.php'); 
		}  // Fim da checagem se há ID
		
		// Busca os grupos de usuários
		$busca_grupos = mysql_query("SELECT * FROM tb_grupos_usuarios ORDER BY nome ASC");
		$num_grupos = mysql_num_rows($busca_grupos);
		if($num_grupos == 0) { 
		header('Location:index.php?erro=16_1');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Editar usuário</title>
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
			<h2>Editar usu&aacute;rio</h2>
			<p id="introducao">Utilize o formul&aacute;rio abaixo para editar o usu&aacute;rio.</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
            
	    	<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo">
            
	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Dados do usu&aacute;rio</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- FORMULÁRIO -->
 	  				<div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="editar.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id_editar; ?>" />
                    <input type="hidden" name="senha_antiga" value="<?php echo $dados['senha']; ?>" />
						<fieldset>
                        
                        <p>
                        <label>Grupo:</label>              
						<select name="grupo" class="input-menor required" >
                            <?php // Lista os grupos
							      while($dados_grupos = mysql_fetch_array($busca_grupos)) {
							?>
                            <option value="<?php echo $dados_grupos['id']; ?>" <?php if($dados['grupo'] == $dados_grupos['id']) { echo'selected="selected"'; } ?> ><?php echo $dados_grupos['nome']; ?></option>
                            <?php } ?>
                        </select> 
						</p>
                        
                        <p>
                        <label>Status:</label>              
						<select name="status" class="input-menor required" >
                            <option value="1" <?php if($dados['status'] == "1") { echo'selected="selected"'; } ?> >Ativo</option>
                            <option value="0" <?php if($dados['status'] == "0") { echo'selected="selected"'; } ?> >Inativo</option>
                        </select> 
						</p>
                        
                        <p>
                        <label>Nome:</label>
						<input class="input-texto input-medio required" type="text" id="nome" name="nome" value="<?php echo $dados['nome']; ?>"  maxlength="255" />
                        </p>
                        
                        <p>
                        <label>Email:</label>
						<input name="email" type="text" class="input-texto input-medio email required" id="email" value="<?php echo $dados['email']; ?>" maxlength="150" />
                        </p>
                        
                        <p>
                        <label>Nome de usu&aacute;rio:</label>
						<input name="usuario" type="text" class="input-texto input-menor" id="usuario" value="<?php echo $dados['usuario']; ?>" readonly="readonly" maxlength="12" />
                        <br />
                        <small>O nome de usu&aacute;rio n&atilde;o pode ser editado.</small>
                        </p>
                        
                        <p>
                        <label>Senha:</label>
						<input name="senha" type="text" class="input-texto input-menor" id="senha" minlength="4" maxlength="8" />
                        <br />
                        <small>Caso n&atilde;o queira editar a senha, deixe o campo vazio.</small>
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