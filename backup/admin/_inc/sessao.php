<?php 
	
	// Checa se há uma Session ativa 
	if(isset($_SESSION['NUPILL'])) { $conectado = 1; }
	else {
	// Checa se há Cookies ativos
	if($_COOKIE['NUPILL_USUARIO'] && $_COOKIE['NUPILL_SENHA']){
	$cookie_usuario = $_COOKIE['NUPILL_USUARIO'];
	$cookie_senha = $_COOKIE['NUPILL_SENHA'];
	// Checa a validade dos Cookies
	$checagem = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$cookie_usuario' AND senha = '$cookie_senha' LIMIT 0, 1");
	$contagem = mysql_num_rows($checagem);
	// Se os Coookies são válidos define as Sessions
	if($contagem != 0){
	$conectado = 1;
	while ($dados_checagem = mysql_fetch_array($checagem)) {
	$_SESSION['NUPILL'] = $cookie_usuario;
	$_SESSION['NUPILL_ID'] = $dados_checagem['id'];
	$_SESSION['NUPILL_GRUPO'] = $dados_checagem['grupo'];
	$_SESSION['NUPILL_NOME'] = $dados_checagem['nome'];
	$_SESSION['NUPILL_EMAIL'] = $dados_checagem['email'];
	$_SESSION['NUPILL_DATA_ACESSO'] = $dados_checagem['acesso'];
	$_SESSION['NUPILL_CHAT'] = $dados_checagem['status_chat'];
	$_SESSION['NUPILL_IP'] = $_SERVER['REMOTE_ADDR'];
	setcookie("NUPILL_USUARIO", $cookie_usuario, time()+3600*24*15);
	setcookie("NUPILL_SENHA", $cookie_senha, time()+3600*24*15);
	
	// Salvas as permissões de acesso
	$session_permissao = "";
	$valorpermissao = explode("-", $modulos_sistema);
	$grupo_acesso_usuario = $info['grupo'];
	$busca_permissao = mysql_query("SELECT * FROM tb_grupos_usuarios WHERE id = '$grupo_acesso_usuario'");
	$dados_permissao = mysql_fetch_array($busca_permissao);
	foreach($valorpermissao as $valorpermissaoid){
	$session_permissao .= "".$valorpermissaoid.":".$dados_permissao[$valorpermissaoid]."*";
	}
	$_SESSION['NUPILL_PERMISSAO'] = $session_permissao;
	
	}
	// Se os Coookies não são válidos, redireciona
	} else {
	header('Location:../login.php?erro=3');
	die("Erro de acesso.");
	}
	// Se não há Coookies, redireciona
	} else {
	header('Location:../login.php?erro=3');
	die("Erro de acesso.");
	}
	
	}
	


	// Checa a permissao
	$valor_cru_permissao = explode("*", substr($_SESSION['NUPILL_PERMISSAO'], 0, -1));
	foreach($valor_cru_permissao as $valor_cru_permissao_id){
				
	$valor_pagina_permissao = explode(":", $valor_cru_permissao_id);
	// Cria as varáveis para o menu
		
		if ( ! $valor_pagina_permissao[1]) {
   			$valor_pagina_permissao[1] = null;
		}
		
	${"menu_".$valor_pagina_permissao[0]} = $valor_pagina_permissao[1];
	// Valida
	$permissao_negada = false;
		
	if($valor_pagina_permissao[0] == $pag_mae) {
		if($valor_pagina_permissao[1] != "1"){
		$permissao_negada = true;
		}
	}
	}
	if($permissao_negada) {
	header('Location:../painel/?atencao=2');
	die("Erro de acesso.");
	}

?>