<?php 
	// Checa se est� no sistema
	if ($token) {
		
	// Se h� erros em vari�veis $_GET
	if ($_GET['atencao']) { $atencao = $_GET['atencao']; }
	if ($_GET['informacao']) { $informacao = $_GET['informacao']; }
	if ($_GET['sucesso']) { $sucesso = $_GET['sucesso']; }
	if ($_GET['erro']) { $erro = $_GET['erro']; }
	
	// Se h� erros em vari�veis $_POST
	if ($_POST['atencao']) { $atencao = $_POST['atencao']; }
	if ($_POST['informacao']) { $informacao = $_POST['informacao']; }
	if ($_POST['sucesso']) { $sucesso = $_POST['sucesso']; }
	if ($_POST['erro']) { $erro = $_POST['erro']; }
	
	if ($atencao) { 
	$id_notificacao = $atencao;
	$tipo_notificacao = "atencao";
	}
	
	if ($informacao) { 
	$id_notificacao = $informacao;
	$tipo_notificacao = "informacao";
	}
	
	if ($sucesso) { 
	$id_notificacao = $sucesso;
	$tipo_notificacao = "sucesso";
	}
	
	if ($erro) { 
	$id_notificacao = $erro;
	$tipo_notificacao = "erro";
	}
	
	// Checa se h� notifica��es
	if ($id_notificacao) {
	
	// Inclui o �ndice de notifica��es
	include ("_inc/indice_notificacoes.php");
	
	// Se a mensagem existe
	if(${"msg_".$tipo_notificacao."_" . $id_notificacao} != "") {
	
?>
          <div class="notificacao <?php echo $tipo_notificacao; ?> png_bg">
              <a href="#" class="fechar"><img src="_imagens/icones/fechar-pequeno.png" title="Fechar esta notifica&ccedil;&atilde;o" alt="Fechar" /></a>
              <div><?php echo ${"msg_".$tipo_notificacao."_" . $id_notificacao}; ?>
              </div>
          </div>
          
          <div class="clear"></div>
<?php 
	} // Fim da checagem se a mensagem existe
	} // Fim da checagem se h� notifica��es
	} // Fim da checagem se est� conectado
?>
