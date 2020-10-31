<?php 
		// Checa se estс conectado
		if ($conectado) {
			
		
		// Pega as aчѕes
		if($_GET['acao']) { $acao = $_GET['acao']; }
		if($_POST['acao']) { $acao = $_POST['acao']; }
		
		
		//-------------------- Status = Ativo [Em lote] ---------------	
		if($acao == "status-ativos") {
		// Trabalha os itens
		$item = $_POST['item'];
		foreach($item as $id_status => $item) {
		$alterar = "UPDATE tb_dicas SET status = 'ativo' WHERE id = '$id_status'";
		$alterar_exec = mysql_query($alterar); 
		}
		if($alterar_exec) { $sucesso = "57"; }	else { $erro = "57"; }		
		}
		//-------------------- Fim do Status = Ativo [Em lote] ---------
		
		//-------------------- Status = Inativo [Em lote] ---------------	
		if($acao == "status-inativos") {
		// Trabalha os itens
		$item = $_POST['item'];
		foreach($item as $id_status => $item) {
		$alterar = "UPDATE tb_dicas SET status = 'inativo' WHERE id = '$id_status'";
		$alterar_exec = mysql_query($alterar); 
		}
		if($alterar_exec) { $sucesso = "57"; }	else { $erro = "57"; }		
		}
		//-------------------- Fim do Status = Inativo [Em lote] ---------
		
		//-------------------- Removendo Dica --------------------------
		if($acao == "remover-foto") {
		$id_remover = $_GET['id'];
		$excluir = "DELETE FROM tb_dicas WHERE id = '$id_remover'";
		$excluir_exec = mysql_query($excluir);
		if($excluir_exec) { 
		$sucesso = "55";
		} else { $erro = "55"; }
		}
		//-------------------- Fim do Removendo Dica --------------------
		
		
		//-------------------- Removendo Dicas [Em lote] ----------------	
		if($acao == "remover-dicas-lote") {
		// Trabalha os itens
		$item = $_POST['item'];
		foreach($item as $id_remover => $item) {
		$excluir = "DELETE FROM tb_dicas WHERE id = '$id_remover'";
		$excluir_exec = mysql_query($excluir);
		}	
		if($excluir_exec) { $sucesso = "56"; }	else { $erro = "56"; }	
		}
		//-------------------- Fim do Removendo Dica [Em lote] ----------
		
		
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
		if($_GET['ordem']) { $ordem = $_GET['ordem']; }
		if($_POST['ordem']) { $ordem = $_POST['ordem']; }
		if (!$ordem) { $ordem = "padrao"; }
		if ($ordem == "recentes" or $ordem == "padrao") { 
		$ordem_busca = "ORDER BY data_cadastro DESC";
		$ordem_print = "Mais recentes";
		}
		if ($ordem == "antigos") { 
		$ordem_busca = "ORDER BY data_cadastro ASC";
		$ordem_print = "Mais antigos";
		}
		if ($ordem == "nome_az") { 
		$ordem_busca = "ORDER BY nome ASC";
		$ordem_print = "Nome - A &raquo; Z";
		}
		if ($ordem == "nome_za") { 
		$ordem_busca = "ORDER BY nome DESC"; 
		$ordem_print = "Nome - Z &raquo; A";
		}
		if ($ordem == "estoque_az") { 
		$ordem_busca = "ORDER BY estoque DESC";
		$ordem_print = "Mais em estoque";
		}
		if ($ordem == "estoque_za") { 
		$ordem_busca = "ORDER BY estoque ASC"; 
		$ordem_print = "Menos em estoque";
		}
		if ($ordem == "preco_az") { 
		$ordem_busca = "ORDER BY valor ASC";
		$ordem_print = "Menor pre&ccedil;o";
		}
		if ($ordem == "preco_za") { 
		$ordem_busca = "ORDER BY valor DESC"; 
		$ordem_print = "Maior pre&ccedil;o";
		}
		if ($ordem == "status") { 
		$ordem_busca = "ORDER BY status ASC"; 
		$ordem_print = "Status";
		}
		
		// Cria uma condiчуo que щ sempre valida
		$where_busca = "WHERE id != '0'";
		
		// Se existe busca por palavra-chave
		if($_GET['p']) { $p = mysql_real_escape_string($_GET['p']); }
		if($_POST['p']) { $p = mysql_real_escape_string($_POST['p']); }

		if($p) {
		$filtragem = true;
		$where_busca .= " 
		AND ( nome LIKE '%".$p."%'
		OR descricao LIKE '%".$p."%'
		OR nome_responsavel LIKE '%".$p."%')";
		}		
		
		// Se existe filtro
		if($_GET['filtro']) { $filtro = $_GET['filtro']; }
		if($_POST['filtro']) { $filtro = $_POST['filtro']; }
		if($filtro) {
		$filtragem = true;
		if($filtro == "ativo") { $filtro_print = "Ativos"; }
		if($filtro == "inativo") { $filtro_print = "Inativos"; }
		$where_busca .= " AND status = '".$filtro."'";
		}
		
		// Define a data de hoje
		$hoje = date("Y-m-d");
	
		// Executa a busca visual e a busca completa dos dicas
		$busca_visual = mysql_query("SELECT * FROM tb_dicas $where_busca $ordem_busca LIMIT $ini_busca, $fim_busca");
		$busca_completa = mysql_query("SELECT * FROM tb_dicas $where_busca");
		
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
		if ($ordem) { $link .= "&ordem=".$ordem.""; }
		if ($filtro) { $link .= "&filtro=".$filtro.""; }
		if ($p) { $link .= "&p=".$p.""; }
		if ($num_result) { $link .= "&num_result=".$num_result.""; }
		if ($ini_busca != 0) { $link .= '&ini='.$ini_busca; }
		
		$link_paginacao = "?token=".$token."";
		if ($ordem) { $link_paginacao  .= "&ordem=".$ordem.""; }
		if ($filtro) { $link_paginacao .= "&filtro=".$filtro.""; }
		if ($p) { $link_paginacao .= "&p=".$p.""; }
		if ($num_result) { $link_paginacao .= "&num_result=".$num_result.""; }
		
		$link_filtro = "?token=".$token."";
		if ($ordem) { $link_filtro .= "&ordem=".$ordem.""; }
		
		} // Fim da checagem se estс conectado
?>