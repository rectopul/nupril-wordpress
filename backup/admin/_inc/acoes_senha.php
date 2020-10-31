<?php 
		// Checa se foi enviado informação
		if($_POST['email']) { 
		$email = mysql_real_escape_string($_POST['email']);
		$data = date("c");
		$ip = $_SERVER['REMOTE_ADDR'];
		
		// Checa se o email existe no cadastro
		$busca_email_cadastro = mysql_query("SELECT * FROM tb_usuarios WHERE email = '$email'");
		$num_email_cadastro = mysql_num_rows($busca_email_cadastro);
		$dados_email_cadastro = mysql_fetch_array($busca_email_cadastro);
		$nome_cadastro = $dados_email_cadastro['nome'];
		$usuario_cadastro = $dados_email_cadastro['usuario'];
		
		// Se o email existe no cadatro
		if($num_email_cadastro != 0)  { 
		
		$nova_senha_crua = rand(0,99999999);
		$nova_senha = md5($nova_senha_crua);
		
		// Checa se já foi pedida nova senha
		$busca_email_repetido = mysql_query("SELECT * FROM tb_senha_temp WHERE email = '$email'");
		$num_email_repetido = mysql_num_rows($busca_email_repetido);
		
		// Se já foi pedida
		if ($num_email_repetido != 0) {
		$atualiza_senha = "UPDATE tb_senha_temp SET senha = '$nova_senha', data = '$data', ip = '$ip' WHERE email = '$email'";
		$acao_atualizar = mysql_query($atualiza_senha);
		if ($acao_atualizar) { $re_senha = true; }
		
		} // Fim do Se já foi pedida
		else { // Se não foi pedida
		
		$registra_senha = "INSERT INTO tb_senha_temp (usuario, senha, email, data, ip) VALUES ('$usuario_cadastro', '$nova_senha', '$email', '$data', '$ip')";
		$acao_registrar = mysql_query($registra_senha);
		if ($acao_registrar) { $re_senha = true; }
		
		}// Fim do Se não foi pedida
		
		// Se a nova senha foi gerada envia o email
		if ($re_senha) {
		
		$assunto = "Senha temporária";
		$destino = $email; // Email do usuário.
			
		// Mensagem enviada:
		$conteudo = '
		'.$nome_cadastro.',<br><br>
		Uma nova senha foi requerida para acessar o sistema '.$titulo_sistema.'.<br>
		Caso n&atilde;o tenha pedido uma nova senha, ignore esta mensagem.<br><br>
		Para recuperar sua senha clique <a href="'.$url_sistema.'recuperar-acesso.php">aqui</a> ou acesse o endere&ccedil;o: "'.$url_sistema.'recuperar-acesso.php" e informe os dados abaixo.<br><br>
		--------------------------------------------------------------------------<br><br>
		Usu&aacute;rio: <strong>'.$usuario_cadastro.'</strong><br>
		Senha tempor&aacute;ria: <strong>'.$nova_senha_crua.'</strong><br>
		--------------------------------------------------------------------------<br><br>
		Aten&ccedil;&atilde;o: ap&oacute;s recuperar seu acesso com a senha acima, ela se tronar&aacute; sua nova senha.<br>
		Qualquer d&uacute;vida, clique <a href="'.$url_sistema.'contato.php">aqui</a> para entrar em contato.<br><br>
		Atenciosamente,<br>
		'.$titulo_sistema.'.';
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: ".$titulo_sistema." <".$email_saida_sistema.">\r\n";
		$headers .= "Reply-To: ".$email_responsavel_sistema."\r\n";
    	$headers .= "Return-Path: ".$email_responsavel_sistema."\r\n";
		$envia_mail = mail($destino, $assunto, $conteudo, $headers);
			
		if ($envia_mail) { 
			$resposta_senha = '<h2>'.$nome_cadastro.',</h2>
			<p>
			A nova senha foi enviada com sucesso.<br />
			Por favor confira seu e-mail.<br /><br />
			Atenciosamente,<br />
			'.$empresa_sistema.'.
			</p>';
			}
		
		}// Fim do Se a nova senha foi gerada envia o email
		
		}// Fim do Se o email existe no cadastro
		else { // Se o email não existe no cadastro
		$resposta_senha = '<h2>Erro.</h2>
							 <p>
							 O e-mail informado ('.$email.') n&atilde;o consta no sistema.<br />
							 Tente novamente.<br /><br />
							 Atenciosamente,<br />
							 '.$empresa_sistema.'.
							 </p>';
		}// Fim do se o email não existe no cadastro
			
		// Se não foi enviado informação, redireciona
		} else {
		header('Location:esqueci-senha.php'); 
		}
?>