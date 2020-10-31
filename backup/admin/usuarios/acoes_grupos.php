<?php 
		// Checa se estс conectado
		if ($conectado) {
			
		
		// Pega as aчѕes
		if($_GET['acao']) { $acao = $_GET['acao']; }
		if($_POST['acao']) { $acao = $_POST['acao']; }
		
		//-------------------- Removendo Grupo --------------------------
		if($acao == "remover-grupo") {
		$id_remover = $_GET['id'];
		$excluir = "DELETE FROM tb_grupos_usuarios WHERE id = '$id_remover'";
		$excluir_exec = mysql_query($excluir);
		if($excluir_exec) { 
		$sucesso = "6_1";
		} else { $erro = "9_1"; }
		}
		//-------------------- Fim do Removendo Grupo --------------------
		
		
		// Pega o INЭCIO DA BUSCA
		if (!$_GET['ini']) { $ini_busca = "0"; }
		else { $ini_busca = $_GET['ini']; }
		
		// Pega o FIM DA BUSCA
		if($_GET['num_result']) { $num_result= $_GET['num_result']; }
		if($_POST['num_result']) { $num_result = $_POST['num_result']; }
		if (!$num_result) { $fim_busca = $num_result_sistema; }		
		else { 
		$filtragem = true;
		$fim_busca = $num_result;
		}
		
		// Define a Ordem
		$ordem_busca = "ORDER BY nome ASC";
		
		// Cria uma condiчуo que щ sempre valida
		$where_busca = "WHERE id != '0'";
		
		// Define a data de hoje
		$hoje = date("Y-m-d");
	
		// Executa a busca visual e a busca completa dos grupos
		$busca_visual = mysql_query("SELECT * FROM tb_grupos_usuarios $where_busca $ordem_busca LIMIT $ini_busca, $fim_busca");
		$busca_completa = mysql_query("SELECT * FROM tb_grupos_usuarios $where_busca");
		
		// Define a Paginaчуo
		$num_resul_total = mysql_num_rows($busca_completa);
		if ($num_resul_total > $fim_busca) { 
		$paginacao = 1;
		$num_paginas = ceil($num_resul_total/$fim_busca);
		$proximo_ini = $ini_busca+$fim_busca; 
		}
		if ($ini_busca != 0) { $anterior_ini = $ini_busca-$fim_busca; }
		
		
		// Define os links da pсgina
		$link = "?token=".$token."";
		if ($num_result) { $link .= "&num_result=".$num_result.""; }
		if ($ini_busca != 0) { $link .= '&ini='.$ini_busca; }
		
		$link_paginacao = "?token=".$token."";
		if ($num_result) { $link_paginacao .= "&num_result=".$num_result.""; }

		
		} // Fim da checagem se estс conectado
?>