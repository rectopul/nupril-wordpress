<?php 
		//-------------------- Checa se há uma session ativa ---------------------------
		if(isset($_SESSION['NUPILL'])) {
		$usuario = $_SESSION['NUPILL']; 
		$checagem = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$usuario' AND status = '1' LIMIT 0, 1");
		$contagem = mysql_num_rows($checagem);
		if($contagem != 0){
		while ($dados_checagem = mysql_fetch_array($checagem)) {
		// Salvar o último acesso
		$ultimo_acesso = $dados_checagem['acesso'];
		$data_acesso = date("c");
		$id_acesso = $dados_checagem['id'];
		$acao_acesso = "login";
		$ip_acesso = $_SERVER['REMOTE_ADDR'];
		$salvar = "UPDATE tb_usuarios SET ultima_acao = '".$acao_acesso."', acesso = '".$data_acesso."', ultimo_acesso = '".$ultimo_acesso."', ip_acesso = '".$ip_acesso."' WHERE id = '$id_acesso'";
		$salvar_acesso = mysql_query($salvar);
		}
		// Redireciona
		header('Location:painel/');
		}
		} else {
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
		$grupo_acesso_usuario = $dados_checagem['grupo'];
		$busca_permissao = mysql_query("SELECT * FROM tb_grupos_usuarios WHERE id = '$grupo_acesso_usuario'");
		$dados_permissao = mysql_fetch_array($busca_permissao);
		foreach($valorpermissao as $valorpermissaoid){
		$session_permissao .= "".$valorpermissaoid.":".$dados_permissao[$valorpermissaoid]."*";
		}
		$_SESSION['NUPILL_PERMISSAO'] = $session_permissao;
		
		// Salvar o último acesso
		$ultimo_acesso = $dados_checagem['acesso'];
		$data_acesso = date("c");
		$id_acesso = $dados_checagem['id'];
		$acao_acesso = "login";
		$ip_acesso = $_SERVER['REMOTE_ADDR'];
		$salvar = "UPDATE tb_usuarios SET ultima_acao = '".$acao_acesso."', acesso = '".$data_acesso."', ultimo_acesso = '".$ultimo_acesso."', ip_acesso = '".$ip_acesso."' WHERE id = '$id_acesso'";
		$salvar_acesso = mysql_query($salvar);
		}
		// Redireciona
		header('Location:painel/');
		} 	}	}
	
		// Checa se os dados de login foram enviados
		if (isset($_POST['usuario'])) { 
		$usuario = mysql_real_escape_string($_POST['usuario']); 
		$senha = mysql_real_escape_string($_POST['senha']);
		$checagem = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$usuario'")or die("Erro. Tente novamente ou contate o administrador.");
	
		// Caso a info não bata ele redireciona para a página de erro
		$num_checagem = mysql_num_rows($checagem);
		if ($num_checagem == 0) { 
		header('Location:login.php?erro=1');
		die("Erro de acesso. Tente novamente.");
		}
		
		while($info = mysql_fetch_array($checagem)) 	
		{
		// Caso a senha não confira, mostra o erro
		if ($info['senha'] != md5($senha)) { 
		header('Location:login.php?erro=1');
		die("Erro de acesso. Tente novamente.");
		}
		
		// Caso o status esta inativo, mostra o erro
		if ($info['status'] != "1") { 
		header('Location:login.php?erro=2');
		die("Erro de acesso. Tente novamente.");
		}

		// Confirmando os dados serão criadas as Sessions e o usuário será redirecionado
		session_start();
		$_SESSION['NUPILL'] = $usuario;
		$_SESSION['NUPILL_ID'] = $info['id'];
		$_SESSION['NUPILL_GRUPO'] = $info['grupo'];
		$_SESSION['NUPILL_NOME'] = $info['nome'];
		$_SESSION['NUPILL_EMAIL'] = $info['email'];
		$_SESSION['NUPILL_DATA_ACESSO'] = $info['acesso'];
		$_SESSION['NUPILL_CHAT'] = $info['status_chat'];
		$_SESSION['NUPILL_IP'] = $_SERVER['REMOTE_ADDR'];
		
		// Se for pedido serão criados os Cookies
		if ($_POST['lembrar'] == "sim") {
		setcookie("NUPILL_USUARIO", $usuario, time()+3600*24*15);
		setcookie("NUPILL_SENHA", md5($senha), time()+3600*24*15);
		}

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
		
		// Salvar o último acesso
		$ultimo_acesso = $info['acesso'];
		$data_acesso = date("c");
		$id_acesso = $info['id'];
		$acao_acesso = "login";
		$ip_acesso = $_SERVER['REMOTE_ADDR'];
		$salvar = "UPDATE tb_usuarios SET ultima_acao = '".$acao_acesso."', acesso = '".$data_acesso."', ultimo_acesso = '".$ultimo_acesso."', ip_acesso = '".$ip_acesso."' WHERE id = '$id_acesso'";
		$salvar_acesso = mysql_query($salvar);
		
		// Redireciona
		header('Location:painel/'); 
		}
		}
?>