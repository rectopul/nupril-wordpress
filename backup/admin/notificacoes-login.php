<?php 
	// Checa se está no sistema
	if ($token) {
		
	// Se há erros em variáveis $_GET
	if ($_GET['atencao']) { $atencao = $_GET['atencao']; }
	if ($_GET['informacao']) { $informacao = $_GET['informacao']; }
	if ($_GET['sucesso']) { $sucesso = $_GET['sucesso']; }
	if ($_GET['erro']) { $erro = $_GET['erro']; }
	
	// Se há erros em variáveis $_POST
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
	
	// Checa se há notificações
	if ($id_notificacao) {
	
	// Inclui o índice de notificações
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
	} // Fim da checagem se há notificações
	} // Fim da checagem se está conectado
?>
