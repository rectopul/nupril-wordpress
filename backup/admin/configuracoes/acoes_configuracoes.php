<?php 
	
	//  Abre o arquivo
    $arq_config = fopen("../_inc/config.php", "w");
 
    //  Verifica se o arquivo foi aberto ou criado com sucesso
    if($arq_config) {
    
		$conteudo_config = "<?php\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// ------ Inicia a sessão -------------------\r\n";
		$conteudo_config .= "session_start();\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// Conecta\r\n";
		$conteudo_config .= "include(\"conexao.php\");\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// Define as variáveis Globais\r\n";
		$conteudo_config .= "$"."titulo_sistema = \"$titulo_sistema\"; // Título do Sistema\r\n";
		$conteudo_config .= "$"."url_sistema = \"$url_sistema\"; // Endereço do sistema na Web\r\n";
		$conteudo_config .= "$"."site_sistema = \"$site_sistema\"; // Site alimentado pelo sistema\r\n";
		$conteudo_config .= "$"."responsavel_sistema = \"$responsavel_sistema\"; // Nome do responsável pelo sistema\r\n";
		$conteudo_config .= "$"."email_responsavel_sistema = \"$email_responsavel_sistema\"; // Email do responsável pelo sistema\r\n";
		$conteudo_config .= "$"."email_saida_sistema = \"$email_saida_sistema\"; // Email de contato para os formulários\r\n";
		$conteudo_config .= "$"."email_saida_loja = \"$email_saida_loja\"; // Email de contato para os clientes\r\n";
		$conteudo_config .= "$"."tema_sistema = \"$tema_sistema\"; // Tema do sistema. Opções: azul, verde e cinza.\r\n";
		$conteudo_config .= "$"."num_result_sistema = $num_result_sistema; // Número de resultados a serem exibidos nas listagens.\r\n";
		
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// Define os Módulos\r\n";
		$conteudo_config .= "$"."modulos_sistema =  \"dicas-produtos-usuarios-configuracoes\";\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// Define o Token\r\n";
		$conteudo_config .= "$"."token =  md5(uniqid( time() . "."$"."_SERVER['REMOTE_ADDR'] . rand(0, 9) ));\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "// Inclui as funções\r\n";
		$conteudo_config .= "include(\"funcoes.php\");\r\n";
		$conteudo_config .= "\r\n";
		$conteudo_config .= "?>";
		
		// Grava o conteúdo no arquivo.
	    fputs($arq_config, $conteudo_config);
        // Fecha o arquivo
		fclose($arq_config);
     
	 } else {
       die ("Erro ao abrir o arquivo. Verifique as permissões para este arquivo.");
     }
		
?>