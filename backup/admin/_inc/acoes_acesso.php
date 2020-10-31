<?php 
		// Checa se foi enviado informação
		if($_POST['usuario'] && $_POST['senha']) { 
		$usuario = mysql_real_escape_string($_POST['usuario']);
		$senha_crua = mysql_real_escape_string($_POST['senha']);
		$senha = md5($senha_crua);
		$data = date("c");
		$ip = $_SERVER['REMOTE_ADDR'];
		
		// Checa se o registro existe no senha temp
		$busca_dados_temp = mysql_query("SELECT * FROM tb_senha_temp WHERE usuario = '$usuario' AND senha = '$senha'");
		$num_dados_temp = mysql_num_rows($busca_dados_temp);
		$dados_temp = mysql_fetch_array($busca_dados_temp);
		$email_temp = $dados_temp['email'];
		
		// Se o registro existe no senha temp
		if($num_dados_temp != 0)  { 
		$atualiza_registro = "UPDATE tb_usuarios SET senha = '$senha' WHERE email = '$email_temp'";
		$acao_atualizar = mysql_query($atualiza_registro);
		if ($acao_atualizar) {
		$deletar_temp = "DELETE FROM tb_senha_temp WHERE usuario = '$usuario' AND senha = '$senha'";
		$acao_deletar = mysql_query($deletar_temp);
		
		// Confirmando os dados serão criadas as Sessions e o usuário será redirecionado
		if ($acao_deletar) {
		$busca_info = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$usuario'");
		$info = mysql_fetch_array($busca_info);
		
		session_start();
		$_SESSION['NUPILL'] = $usuario;
		$_SESSION['NUPILL_ID'] = $info['id'];
		$_SESSION['NUPILL_GRUPO'] = $info['grupo'];
		$_SESSION['NUPILL_NOME'] = $info['nome'];
		$_SESSION['NUPILL_EMAIL'] = $info['email'];
		$_SESSION['NUPILL_DATA_ACESSO'] = $info['acesso'];
		$_SESSION['NUPILL_CHAT'] = $info['status_chat'];
		$_SESSION['NUPILL_IP'] = $ip;
		
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
		else { 
		$resposta_senha = 'Erro.<br />
						   O processo n&atilde;o p&ocirc;de ser finalizado corretamente.<br />
						   Clique <a href="contato.php">aqui</a> para em contato com o administrador do sistema.';
		}		
		
		} else { 
		$resposta_senha = 'Erro.<br />
						   O processo n&atilde;o p&ocirc;de ser finalizado corretamente.<br />
						   Clique <a href="contato.php">aqui</a> para em contato com o administrador do sistema.';
		}
		
		} else { // Se o registro não existe no senha temp
		$resposta_senha = 'Erro.<br />
						   Os dados informados n&atilde;o s&atilde;o v&aacute;lidos.<br />
						   Por favor, tente novamente.';
		} // Fim do se o registro não existe no senha temp
		
		} // Fim da checagem se foi enviado informação
?>