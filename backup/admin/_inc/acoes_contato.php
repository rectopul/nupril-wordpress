<?php 
		// Checa se foi enviado informação
		if($_POST['nome'] && $_POST['email'] && $_POST['mensagem']) { 
		$nome = mysql_real_escape_string($_POST['nome']);
		$email = mysql_real_escape_string($_POST['email']);
		$mensagem = mysql_real_escape_string($_POST['mensagem']);
		$data = date("c");
		$ip = $_SERVER['REMOTE_ADDR'];
			
		// Envia os dados para o email do sistema
		$assunto = $titulo_sistema . " : Contato";
		$destino = $email_responsavel_sistema; // Email do seu suporte.
		
		// Mensagem enviada:
		$conteudo = '
		Ol&aacute;,<br>
		um contato foi enviado pelo sistema '.$titulo_sistema.'. Seguem os dados do contato:<br><br>
		--------------------------------------------------------------------------<br><br>
		Data: <strong>'.DataExtensa($data).'</strong><br>
		Nome: <strong>'.$nome.'</strong><br>
		Email: <strong>'.$email.'</strong><br>
		IP: <strong>'.$ip.'</strong><br>
		Mensagem: <strong>'.$mensagem.'</strong><br><br>
		--------------------------------------------------------------------------<br><br>
		'.$titulo_sistema.'.
		';
	
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: ".$nome." <".$email_saida_sistema.">\r\n";
		$headers .= "Reply-To: ".$email."\r\n";
    	$headers .= "Return-Path: ".$email."\r\n";
		$envia_mail = mail($destino, $assunto, $conteudo, $headers);
		
		// Se enviar o email
		if($envia_mail) {
		$resposta_contato = '<h2>'.$nome.',</h2>
							 <p>
							 Sua mensagem foi enviada com sucesso. <br />
							 Em breve retornaremos seu contato.<br /><br />
							 Atenciosamente,<br />
							 '.$empresa_sistema.'.
							 </p>';
		// Registra no banco de dados
		$inserir = "INSERT INTO sis_contato (
												  nome, 
												  email, 
												  mensagem,
												  data, 
												  ip
												  )	VALUES (
												  '$nome', 
												  '$email', 
												  '$mensagem', 
												  '$data', 
												  '$ip'
												  )";
		$inserir_exec = mysql_query($inserir);
		} else {
			$resposta_contato = '<h2>'.$nome.',</h2>
								 <p>Desculpe, sua mensagem n&atilde;o p&ocirc;de ser enviada.<br />
								 Estamos experimentando problemas em nosso servidor.<br />
								 Clique <a href="contato.php">aqui</a> para tentar novamente ou volte mais tarde.<br /><br />
								 Atenciosamente,<br />
								 '.$empresa_sistema.'.
								 </p>';
		}
		
		// Se não foi enviado informação, redireciona
		} else {
		header('Location:contato.php'); 
		}
?>