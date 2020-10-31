<?php
	
	// Data simplificada
	function DataSimples($data_crua)
	{
		 $data_simples = substr($data_crua,8,2) . "/" .substr($data_crua,5,2) . "/" . substr($data_crua,0,4);
		 return ($data_simples);
	}
	 
	 // Data extensa
	function DataExtensa($data_crua)
	{
		 if (substr($data_crua,5,2) == "01") { $mes = "Janeiro"; }
		 if (substr($data_crua,5,2) == "02") { $mes = "Fevereiro"; }
		 if (substr($data_crua,5,2) == "03") { $mes = "Mar&ccedil;o"; }
		 if (substr($data_crua,5,2) == "04") { $mes = "Abril"; }
		 if (substr($data_crua,5,2) == "05") { $mes = "Maio"; }
		 if (substr($data_crua,5,2) == "06") { $mes = "Junho"; }
		 if (substr($data_crua,5,2) == "07") { $mes = "Julho"; }
		 if (substr($data_crua,5,2) == "08") { $mes = "Agosto"; }
		 if (substr($data_crua,5,2) == "09") { $mes = "Setembro"; }
		 if (substr($data_crua,5,2) == "10") { $mes = "Outubro"; }
		 if (substr($data_crua,5,2) == "11") { $mes = "Novembro"; }
		 if (substr($data_crua,5,2) == "12") { $mes = "Dezembro"; }
		 $data_extensa = substr($data_crua,8,2) . " de " .$mes. " de " . substr($data_crua,0,4) . " &agrave;s " . substr($data_crua,11,5);
		 return ($data_extensa);
	}
	
	// Data extensa sem horas
	function DataExt($data_crua)
	{
		 if (substr($data_crua,5,2) == "01") { $mes = "Janeiro"; }
		 if (substr($data_crua,5,2) == "02") { $mes = "Fevereiro"; }
		 if (substr($data_crua,5,2) == "03") { $mes = "Mar&ccedil;o"; }
		 if (substr($data_crua,5,2) == "04") { $mes = "Abril"; }
		 if (substr($data_crua,5,2) == "05") { $mes = "Maio"; }
		 if (substr($data_crua,5,2) == "06") { $mes = "Junho"; }
		 if (substr($data_crua,5,2) == "07") { $mes = "Julho"; }
		 if (substr($data_crua,5,2) == "08") { $mes = "Agosto"; }
		 if (substr($data_crua,5,2) == "09") { $mes = "Setembro"; }
		 if (substr($data_crua,5,2) == "10") { $mes = "Outubro"; }
		 if (substr($data_crua,5,2) == "11") { $mes = "Novembro"; }
		 if (substr($data_crua,5,2) == "12") { $mes = "Dezembro"; }
		 $data_ext = substr($data_crua,8,2) . " de " .$mes. " de " . substr($data_crua,0,4);
		 return ($data_ext);
	}
	
	// Data simples com horário
	function DataRes($data_crua)
	{
		 $data_res = substr($data_crua,8,2) . "/" .substr($data_crua,5,2) . "/" . substr($data_crua,0,4) ." &agrave;s " . substr($data_crua,11,5);
		 return ($data_res);
	}
	
	// Data simplificada porém invertida para o banco de dados aaaa-mm-dd
	function DataBD($data_crua)
	{
		 $data_bd = substr($data_crua,6,4) . "-" .substr($data_crua,3,2) . "-" . substr($data_crua,0,2);
		 return ($data_bd);
	}
	
	// Mês atual
	function MesAtual($data_crua)
	{
		 if (substr($data_crua,5,2) == "01") { $mes_atual = "Janeiro"; }
		 if (substr($data_crua,3,2) == "02") { $mes_atual = "Fevereiro"; }
		 if (substr($data_crua,5,2) == "03") { $mes_atual = "Mar&ccedil;o"; }
		 if (substr($data_crua,5,2) == "04") { $mes_atual = "Abril"; }
		 if (substr($data_crua,5,2) == "05") { $mes_atual = "Maio"; }
		 if (substr($data_crua,5,2) == "06") { $mes_atual = "Junho"; }
		 if (substr($data_crua,5,2) == "07") { $mes_atual = "Julho"; }
		 if (substr($data_crua,5,2) == "08") { $mes_atual = "Agosto"; }
		 if (substr($data_crua,5,2) == "09") { $mes_atual = "Setembro"; }
		 if (substr($data_crua,5,2) == "10") { $mes_atual = "Outubro"; }
		 if (substr($data_crua,5,2) == "11") { $mes_atual = "Novembro"; }
		 if (substr($data_crua,5,2) == "12") { $mes_atual = "Dezembro"; }
		 return ($mes_atual);
	}
	
	// Função para Resumir
	function Resumo($string,$chars)
	{
		  if (strlen($string) > $chars) {
			while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))){
			  $chars++;
			};
		  };
		  return substr($string,0,$chars);
	}	
	
	// Função para Resumir sem reticências
	function ResumoSimples($string,$chars)
	{
		  if (strlen($string) > $chars) {
			while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))){
			  $chars++;
			};
		  };
		  return substr($string,0,$chars);
			
	}
		
	// Função para gerar slugs
	function Slug($string, $slug)
	{
		
		// Troca tudo que não for letra ou número por um caractere ($slug)
		$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
		// Tira os caracteres ($slug) repetidos
		$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
		$string = trim($string, $slug);
		
		return $string;
		
	}
	
	// Transforma todas as letras em minúscula
	function Minusculas($string)
	{
	
	$string = strtolower($string);
	$string = str_replace("Ç", "c", $string);
	$string = str_replace("Ã", "a", $string);
	$string = str_replace("Â", "a", $string);
	$string = str_replace("À", "a", $string);
	$string = str_replace("Á", "a", $string);
	$string = str_replace("È", "e", $string);
	$string = str_replace("Ê", "e", $string);
	$string = str_replace("É", "e", $string);
	$string = str_replace("Í", "i", $string);
	$string = str_replace("Ì", "i", $string);
	$string = str_replace("Î", "i", $string);
	$string = str_replace("Ó", "o", $string);
	$string = str_replace("Ô", "o", $string);
	$string = str_replace("Ò", "o", $string);
	$string = str_replace("Õ", "o", $string);
	$string = str_replace("Ú", "u", $string);
	$string = str_replace("Û", "u", $string);
	$string = str_replace("Ù", "u", $string);
	$string = str_replace("Ñ", "n", $string);

	// Código ASCII das vogais
	$ascii['a'] = range(224, 230);
	$ascii['e'] = range(232, 235);
	$ascii['i'] = range(236, 239);
	$ascii['o'] = array_merge(range(242, 246), array(240, 248));
	$ascii['u'] = range(249, 252);

	// Código ASCII dos outros caracteres
	$ascii['b'] = array(223);
	$ascii['c'] = array(231);
	$ascii['d'] = array(208);
	$ascii['n'] = array(241);
	$ascii['y'] = array(253, 255);

	foreach ($ascii as $key=>$item) {
		$acentos = '';
		foreach ($item AS $codigo) $acentos .= chr($codigo);
		$troca[$key] = '/['.$acentos.']/i';
	}

	$string = preg_replace(array_values($troca), array_keys($troca), $string);
	
	return $string;	
	
	}
	
	// Gera apelido
	function GeraApelido($string, $slug = "-")
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);

	return $string;
		
	}
	
	// Gera apelido para o produto
	function GeraApelidoProduto($string, $slug, $id_produto)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há algum produto com o mesmo apelido
	if($id_produto != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_produtos WHERE apelido = '$string' AND id != '$id_produto'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_produtos WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}

	// Gera apelido para o banner
	function GeraApelidoBanner($string, $slug, $id_banner)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há algum banner com o mesmo apelido
	if($id_banner != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_banners WHERE apelido = '$string' AND id != '$id_banner'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_banners WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	// Gera apelido para a página
	function GeraApelidoPagina($string, $slug, $id_pagina)
	{

	$string = Minusculas($string);

	// Gera slug
	$string = Slug($string, $slug);
	
	// Checa se há alguma página com o mesmo apelido
	if($id_pagina != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_paginas WHERE apelido = '$string' AND id != '$id_pagina'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_paginas WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	// Gera apelido para a marca
	function GeraApelidoMarca($string, $slug, $id_marca)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há alguma marca com o mesmo apelido
	if($id_marca != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_marcas WHERE apelido = '$string' AND id != '$id_marca'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_marcas WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	// Gera apelido para a dica
	function GeraApelidoDica($string, $slug, $id_dica)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há algum dica com o mesmo apelido
	if($id_dica != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_dicas WHERE apelido = '$string' AND id != '$id_dica'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_dicas WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	// Gera apelido para a categoria
	function GeraApelidoCategoria($string, $slug, $id_categoria)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há alguma categoria com o mesmo apelido
	if($id_categoria != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_categorias WHERE apelido = '$string' AND id != '$id_categoria'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_categorias WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	
	// Gera apelido para a subcategoria
	function GeraApelidoSubcategoria($string, $slug, $id_subcategoria)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	return $string;
		
	}
	
	// Gera apelido para a região
	function GeraApelidoRegiao($string, $slug, $id_regiao)
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);
	
	// Checa se há alguma categoria com o mesmo apelido
	if($id_regiao != 0) { $checa_apelido = mysql_query("SELECT * FROM tb_regioes WHERE apelido = '$string' AND id != '$id_regiao'");	}
	else { $checa_apelido = mysql_query("SELECT * FROM tb_regioes WHERE apelido = '$string'");	}
	$num_checa_apelido = mysql_num_rows($checa_apelido);
	if($num_checa_apelido != 0) { $string = 'Apelido em uso'; }
	
	return $string;
		
	}
	
	
	// Verifica a existência de caracteres
	function ExisteChar($string)
	{
		 if($string != "") { $resposta = $string; }
		 else { $resposta = "N&atilde;o informado."; }
		 return $resposta;		 
	}
	
	// Trabalha os valores em Reais para exibição
	function Reais($string)
	{
		$valor = number_format($string, 2, ',', '.');
		return $valor;
	}
	
	// Trabalha os valores em Reais para inserção no BD
	function ReaisBD($string)
	{
		$valor = str_replace('.', "", $string);	
		$valor = str_replace(',', ".", $valor);
		return $valor;
	}
	
	// Trabalha as formas de pagamento
	function FormaPag($string)
	{
		if ($string == "boleto") { $nome_exib = "Boleto"; }
		if ($string == "deposito") { $nome_exib = "Dep&oacute;sito"; }
		if ($string == "pag_seguro") { $nome_exib = "Pag Seguro"; }
		if ($string == "pagamento_digital") { $nome_exib = "Pagamento Digital"; }
		if ($string == "paypal") { $nome_exib = "Paypal"; }
		if ($string == "visa_credito") { $nome_exib = "Visa Cr&eacute;dito"; }
		if ($string == "mastercard_credito") { $nome_exib = "Mastercard Cr&eacute;dito"; }
		
		return $nome_exib;
	}
	
	// Trabalha os modos de frete
	function ModoFrete($string)
	{
		if ($string == "pac") { $nome_exib = "PAC - Correios"; }
		if ($string == "sedex") { $nome_exib = "SEDEX - Correios"; }
		if ($string == "sedex10") { $nome_exib = "SEDEX10 - Correios"; }
		if ($string == "moto_boy") { $nome_exib = "Moto boy"; }
		if ($string == "trasportadora") { $nome_exib = "Transportadora"; }
		if ($string == "frete_gratis") { $nome_exib = "Frete Gr&aacute;tis"; }
		
		return $nome_exib;
	}
	
	// Trabalha os status de pedido
	function StatusPedido($string)
	{
		if ($string == "aguardando") { $nome_exib = "Aguard. Pagamento"; }
		if ($string == "confirmado") { $nome_exib = "Pag. Confirmado"; }
		if ($string == "enviado") { $nome_exib = "Enviado"; }
		if ($string == "finalizado") { $nome_exib = "Finalizado"; }
		if ($string == "cancelado") { $nome_exib = "Cancelado"; }
		if ($string == "devolvido") { $nome_exib = "Devolvido"; }
		
		return $nome_exib;
	}
	
	// Trabalha o número do pedido
	function NumPedido($string)
	{
		$valor = sprintf("%06s", $string);
		return $valor;
	}
	
	// Infomações sobre os módulos
	function InfoModulo($nome_simples, $requisicao)
	{
		 // Produtos 
		 if ($nome_simples == "produtos") {
			 if($requisicao == "nome") {
			 $resposta = "Produtos";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "marcas:Marcas*categorias:Categorias*subcategorias:Subcategorias*adicionar-produto:Adicionar produto";
			 }
		 }
		 		 
		 // Banners  
		 if ($nome_simples == "banners") {
			 if($requisicao == "nome") {
			 $resposta = "Banners";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-cliente:Adicionar banner";
			 }
		 }
		
		// Clientes  
		 if ($nome_simples == "clientes") {
			 if($requisicao == "nome") {
			 $resposta = "Clientes";
			 }
		//	 if($requisicao == "submenus") {
		//	 $resposta = "adicionar-cliente:Adicionar cliente";
		//	 }
		 }
		 
		 // Pedidos
		 if ($nome_simples == "pedidos") {
			 if($requisicao == "nome") {
			 $resposta = "Pedidos";
			 }
		 }
		 
		 // Ferramentas
		 if ($nome_simples == "ferramentas") {
			 if($requisicao == "nome") {
			 $resposta = "Ferramentas";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "estatisticas:Estat&iacute;sticas*suporte:Suporte Online*cupons:Cupons de desconto";
			 }
		 }
		 
		 // P&aacute;ginas
		 if ($nome_simples == "paginas") {
			 if($requisicao == "nome") {
			 $resposta = "P&aacute;ginas";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-pagina:Adicionar p&aacute;gina";
			 }
		 }
		 
		 // Usuários
		 if ($nome_simples == "usuarios") {
			 if($requisicao == "nome") {
			 $resposta = "Usu&aacute;rios";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-usuario:Adicionar usu&aacute;rio*grupos-de-usuarios:Grupos de Usu&aacute;rios";
			 }
		 }
		 
		 // Configurações
		 if ($nome_simples == "configuracoes") {
			 if($requisicao == "nome") {
			 $resposta = "Configura&ccedil;&otilde;es";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "config-empresa:Dados empresariais*config-boleto:Dados para boletos*config-deposito:Dados para dep&oacute;sitos*config-frete:Configura&ccedil;&otilde;es de frete";
			 }
		 }
		 
		 // Mensagens 
		 if ($nome_simples == "mensagens") {
			 if($requisicao == "nome") {
			 $resposta = "Mensagens";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-mensagem:Adicionar mensagem*mensagens-enviadas:Mensagens enviadas";
			 }
		 }
		 
		 // Eventos  
		 if ($nome_simples == "eventos") {
			 if($requisicao == "nome") {
			 $resposta = "Eventos";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-evento:Adicionar evento*calendario-eventos:Calend&aacute;rio de Eventos";
			 }
		 }
		 
		  // Eventos  
		 if ($nome_simples == "dicas") {
			 if($requisicao == "nome") {
			 $resposta = "Dicas";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-dica:Adicionar dica";
			 }
		 }
		 
		 // Propostas 
		 if ($nome_simples == "propostas") {
			 if($requisicao == "nome") {
			 $resposta = "Propostas";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-proposta:Adicionar proposta";
			 }
		 }
		 
		 // Projetos 
		 if ($nome_simples == "projetos") {
			 if($requisicao == "nome") {
			 $resposta = "Projetos";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-projeto:Adicionar projeto";
			 }
		 }
		 
		 // Financeiro 
		 if ($nome_simples == "financeiro") {
			 if($requisicao == "nome") {
			 $resposta = "Financeiro";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "adicionar-pagamento:Adicionar pagamento*adicionar-mensalista:Adicionar mensalista";
			 }
		 }
		 
		 // Suporte 
		 if ($nome_simples == "suporte") {
			 if($requisicao == "nome") {
			 $resposta = "Suporte";
			 }
			 if($requisicao == "submenus") {
			 $resposta = "tickets:Tickets*perguntas-frequentes:Perguntas frequentes";
			 }
		 }
		 
		 return ($resposta);
	}
	
	// Função que cria as mensagens para o cliente
	function MensagemCliente($status, $id_pedido, $mensagem_status, $cod_rastreamento) {
	
	// Define se foi enviado código de rastreamento
	if ($cod_rastreamento != 0) {
	$p_rastreamento = '<p style="font:12px Arial;">&nbsp;<br />C&oacute;digo de rastreamento do seu pedido no Correios: <strong>'.$cod_rastreamento.'</strong></p>'; 
	}
	
	// Pega as informações do sistema para montar a mensagem
	$busca_dados_sistema = mysql_query("SELECT * FROM sis_config WHERE id = '1'");
	$dados_sistema = mysql_fetch_array($busca_dados_sistema);
	$email_saida_loja = $dados_sistema['email_saida_loja'];
	$nome_loja = $dados_sistema['titulo_sistema'];
	$site_sistema = $dados_sistema['site_sistema'];
	
	// Pega os dados do pedido
	$busca_dados_pedido = mysql_query("SELECT * FROM tb_pedidos WHERE id = '$id_pedido'");
	$dados_pedido = mysql_fetch_array($busca_dados_pedido);
	$email_cliente = $dados_pedido['email'];
	$nome_cliente = $dados_pedido['nome'];
	$num_pedido = NumPedido($id_pedido);
	$assunto_mensagem = $nome_loja." :: Situação do Pedido ".$num_pedido."";
	$assunto_mensagem_latin = $nome_loja." :: Situa&ccedil;&atilde;o do Pedido ".$num_pedido."";
	$conteudo_email = '
	<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=iso-8859-1">
	<title>'.$assunto_mensagem_latin.'</title>
	</head>
	<body bgcolor="#F9F9F9">
	<table style="padding:20px;" width="100%" bgcolor="#F9F9F9">
	<tr>
	<td><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
	<tbody>
	<tr>
	<td style="padding-bottom:5px;">
	<table style="background-color:#ffffff; border:1px solid #ddd; width:100%; padding:10px 15px;">
		<tr>
			<td width="180"><img src="'.$site_sistema.'/_imagens/logo_email.gif" alt="'.$nome_loja.'" /></td>
			<td align="right" style="font-family:arial; font-size:16px; font-weight:bold; color:#666;">Situa&ccedil;&atilde;o do Pedido '.$num_pedido.' &nbsp;</td>
		</tr>
	
	</table>
	</td>
	</tr>
	<tr>
	<td style="background:#FFFFFF; padding:15px; border:1px solid #ddd;">
	<table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td style="font:13px Arial;">
	<p>Prezado(a) <strong style="color:#C00">'.$nome_cliente.'</strong>,<br />&nbsp;</p>
	</td>
	</tr>
	<tr>
	<td style="padding-top:15px;">
	<p style="font:12px Arial;">
	'.$mensagem_status.'</p>
	'.$p_rastreamento.'
	<p style="font:12px Arial;">
	<a title="Acompanhe seu pedido" style="color: #cc0000;" href="'.$site_sistema.'/minha-conta.php" target="_blank">Acesse aqui para acompanhar seu(s) pedido(s) e o andamento de sua(s) compra(s).</a></p></td>
	</tr>
	</table>
	</td>
	</tr>
	<td style="font:11px Arial; background:#f1f1f1; padding:15px; border:1px solid #ddd;">
		
	<p>Se houver d&uacute;vidas em rela&ccedil;&atilde;o ao seu pedido, <a href="'.$site_sistema.'/contato.php" title="Atendimento ao Cliente" target="_blank" style="color: #cc0000;">acesse aqui</a> e fale conosco.</p>
	
		<p style="font-size:13px;">Agradecemos por escolher a '.$nome_loja.'.<br />Esperamos ter voc&ecirc; sempre como nosso cliente.</p></td>
	<tr>
	<td height="90" style="font:12px Arial; background:#b60f09; color:#FFFFFF; padding:10px 15px">
	<table>
		<tr>
			<td style="padding-left:10px">
			  <p style="font:12px arial; color:#ffffff">Atenciosamente,<br />
				<span style="font:bold 20px arial;">Equipe '.$nome_loja.'</span><br />
				<a href="'.$site_sistema.'" title="'.$nome_loja.'" target="_blank" style="color:#FFFF00">'.$site_sistema.'</a></p>
			</td>
		</tr>
	</table>
	</td>
	
	</tr>
	</tbody>
	</table></td>
	</tr>
	<tr>
	<td align="center"><p style="font:10px Arial;">Esta &eacute; uma mensagem autom&aacute;tica. Por favor, n&atilde;o a responda.</p></td>
	</tr>
	</table>
	</body>
	</html>';
	
	// Define os headers e envia
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "To: ".$nome_cliente." <".$email_cliente.">" . "\r\n";
	$headers .= "From: ".$nome_loja." <".$email_saida_loja.">" . "\r\n";
	$headers .= "Return-Path: <".$email_saida_loja.">" . "\r\n";
	$envia_mail = mail($email_cliente, $assunto_mensagem, $conteudo_email, $headers);
	if($envia_mail) { 
	$resultado = "
	Cliente: ".$nome_cliente."<br />
	E-mail: ".$email_cliente."<br />
	Assunto: ".$assunto_mensagem."<br />
	Saida: ".$email_saida_loja."<br />
	Loja: ".$nome_loja."<br />
	Mensagem: ".$mensagem_status."<br />
	"; } else { $resultado = "erro"; }
	
	// Devolve o resultado
	return $resultado;
	
	}
	
	
	
	
	

	
?>