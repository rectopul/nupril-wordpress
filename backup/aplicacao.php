<?
	//Conecta
	include "_includes/conexao.php";
	
	//Define a categoria
	$apelido = $_GET['produto'];
	
	//Busca dados do produto
	$busca_dados_produto = mysql_query("SELECT * FROM tb_produtos WHERE apelido = '$apelido'");
	$dados_produto = mysql_fetch_array($busca_dados_produto); 
	$num_produtos = mysql_num_rows($busca_dados_produto);  
	
	if($num_produtos == "0") { 
	
	echo"
	<script>
	alert('Desculpe, no momento não há produtos nesta linha. Obrigado pela compreensão.');
	window.location.href = 'produtos.php';
	</script>
	";
	
	}

?>
<h3>Como aplicar &raquo; <? echo utf8_encode($dados_produto['nome']); ?></h3>
<? echo utf8_encode($dados_produto['descricao']); ?>
