<?php 
		// Checa se está conectado
		if ($conectado) {
			
		
		// Pega as ações
		if($_GET['acao']) { $acao = $_GET['acao']; }
		if($_POST['acao']) { $acao = $_POST['acao']; }
	
		} // Fim da checagem se está conectado
?>