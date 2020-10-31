<?php
	// Configurações
	include("../_inc/config.php");
		
	// Define a página
	$pag_mae = "paises";
	$pag = "combo-pais";
		
	// Checa a sessão 
	include ("../_inc/sessao.php");
	
	$con = new PDO("mysql:host={$host};dbname={$dbname}", $user, $senha);
	$con->query('SET NAMES utf8');
	/*
	 * Através deste bloco vamos alterar nossas consultas dinâmicas
	 *
	 * $sql = consulta própria do tipo
	 * $option = titulo que aparece no primeiro option da listagem
	 * $string = auxiliador da busca de resultados
	 */
	switch($_GET['tipo'])
	{
		case 'pais' :
			$sql = "SELECT * FROM tb_paises ORDER BY nome ASC";
			$option = '';
			$string = 'id';
			break;
		case 'regiao' :
			$sql = sprintf("SELECT * FROM tb_regioes WHERE pais_mae = '%s' ORDER BY nome ASC", $_GET['pais']);
			$option = '';
			$string = 'id';
			break;		
	}
	/*
	 * Executamos o SQL aqui
	 */
	$consulta = $con->query($sql);
	/*
	 * Iniciamos o resultado como null
	 */
	$resultado = null;
	/*
	 * O primeiro option que vai aparecer já com o titulo dinâmico a partir de $option
	 */

	$resultado = '<option value="">Selecione</option>';
	/*
	 * Se for regiao pode ser vazio
	 */
	if($_GET['tipo'] == 'regiao') {
	if($_GET['id_regiao'] == '0') { $selected = 'selected="selected"'; }
	$resultado .= sprintf(
		'<option '.$selected.' value="%s">N&atilde;o tem regi&atilde;o</option>',
		0
	);
	}
	/*
	 * Buscamos os resultados usando $c->string para identificar o ID dinamico pois varia, no caso temos iso3, uf, nome e nome
	 */
	if($_GET['tipo'] == 'regiao') {
	$campo = nome	;
	} else {
	$campo = nome_latin	;
	}
	
	while($c = $consulta->fetch(PDO::FETCH_OBJ)) {
		$resultado .= sprintf(
			'<option value="%s">%s</option>',
			$c->$string,
			// o campo nome é comum a todos
			$c->$campo			
		); 
	}
	
	// Se for retorno de pais
	if($_GET['id_pais'] && $_GET['tipo'] == 'pais') {
	$id_cpais = $_GET['id_pais'];
	$sql2 = "SELECT * FROM tb_paises WHERE id = '".$id_cpais."'";
	$option2 = '';
	$string2 = 'id';
	$consulta2 = $con->query($sql2);
	while($cc = $consulta2->fetch(PDO::FETCH_OBJ)) {
		$resultado .= sprintf(
			'<option selected="selected" value="%s">%s - [Op&ccedil;&atilde;o salva]</option>',
			$cc->$string2,
			// o campo nome é comum a todos
			$cc->nome_latin			
		); 
	}
	
	}
	
	// Se for retorno de regiao
	if($_GET['id_regiao'] && $_GET['tipo'] == 'regiao') {
	$id_subcpais = $_GET['id_regiao'];
	$sql3 = "SELECT * FROM tb_regioes WHERE id = '".$id_subcpais."'";
	$option3 = '';
	$string3 = 'id';
	$consulta3 = $con->query($sql3);
	while($ccc = $consulta3->fetch(PDO::FETCH_OBJ)) {
		$resultado .= sprintf(
			'<option selected="selected" value="%s">%s - [Op&ccedil;&atilde;o salva]</option>',
			$ccc->$string3,
			// o campo nome é comum a todos
			$ccc->nome			
		); 
	}
	
	}
	
	/*
	 * Imprimimos o resultado
	 */
	print $resultado;
?>