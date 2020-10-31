<?php 
		// Checa se estс conectado
		if ($conectado) {
			
		
		// Pega as aчѕes
		if($_GET['acao']) { $acao = $_GET['acao']; }
		if($_POST['acao']) { $acao = $_POST['acao']; }
		
		
		//-------------------- Removendo Subcategoria e Produtos --------------------------
		if($acao == "remover") {
		$id_remover = $_POST['id'];
		$excluir_produtos = "DELETE FROM tb_produtos WHERE id_subcategoria = '$id_remover'";
		$excluir_produtos_exec = mysql_query($excluir_produtos);
		if($excluir_produtos_exec) { 
		$excluir = "DELETE FROM tb_subcategorias WHERE id = '$id_remover'";
		$excluir_exec = mysql_query($excluir);
		}
		if($excluir_exec) { 
		$sucesso = "75";
		} else { $erro = "75"; }
		}
		//-------------------- Removendo Subcategoria e Produtos --------------------
		
		//-------------------- Transferindo os produtos e Removendo a Subcategoria --------------------------
		if($acao == "transferir-remover") {
		$id_remover = $_POST['id'];
		$id_subcategoria_destino = $_POST['id_subcategoria_destino'];
		//Busca os dados da subcategoria destino
		$busca_subcategoria_destino = mysql_query("SELECT * FROM tb_subcategorias WHERE id = '$id_subcategoria_destino'");
		$dados_subcategoria_destino = mysql_fetch_array($busca_subcategoria_destino);
		$nome_subcategoria_destino = $dados_subcategoria_destino['nome'];
		$apelido_subcategoria_destino = $dados_subcategoria_destino['apelido'];
		$alterar = "UPDATE tb_produtos SET id_subcategoria = '$id_subcategoria_destino', nome_subcategoria = '$nome_subcategoria_destino', apelido_subcategoria = '$apelido_subcategoria_destino' WHERE id_subcategoria = '$id_remover'";
		$alterar_exec = mysql_query($alterar);
		if($alterar_exec) {
		$excluir = "DELETE FROM tb_subcategorias WHERE id = '$id_remover'";
		$excluir_exec = mysql_query($excluir);
		}
		if($excluir_exec) { 
		$sucesso = "76";
		} else { $erro = "76"; }
		}
		//-------------------- Fim do Transferindo os produtos e Removendo a Subcategoria --------------------
		
		//-------------------- Status = Ativo ---------------	
		if($acao == "ativar-subcategoria") {
		$id_alterar = $_POST['id'];
		$alterar = "UPDATE tb_subcategorias SET status = 'ativo' WHERE id = '$id_alterar'";
		$alterar_exec = mysql_query($alterar); 
		if($alterar_exec) { $sucesso = "77"; }	else { $erro = "77"; }		
		}
		//-------------------- Fim do Status = Ativo ---------
		
		//-------------------- Status = Inativo ---------------	
		if($acao == "desativar-subcategoria") {
		$id_alterar = $_POST['id'];
		$alterar = "UPDATE tb_subcategorias SET status = 'inativo' WHERE id = '$id_alterar'";
		$alterar_exec = mysql_query($alterar); 
		if($alterar_exec) { $sucesso = "77"; }	else { $erro = "77"; }		
		}
		//-------------------- Fim do Status = Inativo ---------
		
		//-------------------- Status = Inativo E Status Produto = Inativo ---------------	
		if($acao == "ativar-subcategoria-produto") {
		$id_alterar = $_POST['id'];		
		$alterar = "UPDATE tb_subcategorias SET status = 'ativo' WHERE id = '$id_alterar'";
		$alterar_exec = mysql_query($alterar); 
		if($alterar_exec) { 
		$alterar_produtos = "UPDATE tb_produtos SET status = 'ativo' WHERE id_subcategoria = '$id_alterar'";
		$alterar_produto_exec = mysql_query($alterar); 
		$sucesso = "77"; 
		} else { $erro = "77"; }		
		}
		//-------------------- Fim do Status = Inativo E Status Produto = Inativo ---------
		
		//-------------------- Status = Inativo E Status Produto = Inativo ---------------	
		if($acao == "desativar-subcategoria-produto") {
		$id_alterar = $_POST['id'];		
		$alterar = "UPDATE tb_subcategorias SET status = 'inativo' WHERE id = '$id_alterar'";
		$alterar_exec = mysql_query($alterar); 
		if($alterar_exec) { 
		$alterar_produtos = "UPDATE tb_produtos SET status = 'inativo' WHERE id_subcategoria = '$id_alterar'";
		$alterar_produto_exec = mysql_query($alterar); 
		$sucesso = "77"; 
		} else { $erro = "77"; }		
		}
		//-------------------- Fim do Status = Inativo E Status Produto = Inativo ---------
		
		
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
		AND (nome LIKE '%".$p."%' 
		OR apelido LIKE '%".$p."%'
		OR nome_categoria_mae LIKE '%".$p."%'
		OR descricao LIKE '%".$p."%'
		OR nome_responsavel LIKE '%".$p."%')";
		}
		
		// Se existe filtro
		if($_GET['filtro']) { $filtro = $_GET['filtro']; }
		if($_POST['filtro']) { $filtro = $_POST['filtro']; }
		if($filtro) {
		$filtragem = true;
		if($filtro == "ativo") { $filtro_print = "Ativas"; }
		if($filtro == "inativo") { $filtro_print = "Inativas"; }
		$where_busca .= " AND status = '".$filtro."'";
		}
		
		// Define a data de hoje
		$hoje = date("Y-m-d");
	
		// Executa a busca visual e a busca completa das pсginas
		$busca_visual = mysql_query("SELECT * FROM tb_subcategorias $where_busca $ordem_busca LIMIT $ini_busca, $fim_busca");
		$busca_completa = mysql_query("SELECT * FROM tb_subcategorias $where_busca");
		
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