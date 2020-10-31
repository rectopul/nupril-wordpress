<?php
	// Configurações
	include("../_inc/config.php");
		
	// Define a página
	$pag_mae = "categorias";
	$pag = "combo-categoria";
		
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
		case 'categoria' :
			$sql = "SELECT * FROM tb_categorias ORDER BY nome ASC";
			$option = '';
			$string = 'id';
			break;
		case 'subcategoria' :
			$sql = sprintf("SELECT * FROM tb_subcategorias WHERE categoria_mae = '%s' ORDER BY nome ASC", $_GET['categoria']);
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
	 * Se for subcategoria pode ser vazio
	 */
	if($_GET['tipo'] == 'subcategoria') {
	if($_GET['id_subcategoria'] == '0') { $selected = 'selected="selected"'; }
	$resultado .= sprintf(
		'<option '.$selected.' value="%s">N&atilde;o tem subcategoria</option>',
		0
	);
	}
	/*
	 * Buscamos os resultados usando $c->string para identificar o ID dinamico pois varia, no caso temos iso3, uf, nome e nome
	 */
	while($c = $consulta->fetch(PDO::FETCH_OBJ)) {
		$resultado .= sprintf(
			'<option value="%s">%s</option>',
			$c->$string,
			// o campo nome é comum a todos
			$c->nome			
		); 
	}
	
	// Se for retorno de categoria
	if($_GET['id_categoria'] && $_GET['tipo'] == 'categoria') {
	$id_ccategoria = $_GET['id_categoria'];
	$sql2 = "SELECT * FROM tb_categorias WHERE id = '".$id_ccategoria."'";
	$option2 = '';
	$string2 = 'id';
	$consulta2 = $con->query($sql2);
	while($cc = $consulta2->fetch(PDO::FETCH_OBJ)) {
		$resultado .= sprintf(
			'<option selected="selected" value="%s">%s - [Op&ccedil;&atilde;o salva]</option>',
			$cc->$string2,
			// o campo nome é comum a todos
			$cc->nome			
		); 
	}
	
	}
	
	// Se for retorno de subcategoria
	if($_GET['id_subcategoria'] && $_GET['tipo'] == 'subcategoria') {
	$id_subccategoria = $_GET['id_subcategoria'];
	$sql3 = "SELECT * FROM tb_subcategorias WHERE id = '".$id_subccategoria."'";
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