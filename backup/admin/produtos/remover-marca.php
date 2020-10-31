<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "marcas";
		$pag = "status-marca";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		if($_GET['id']) { $id_marca = $_GET['id']; }
		else { die("Erro de acesso."); }
		
		// Pega os dados
		$busca_info = mysql_query("SELECT * FROM tb_marcas WHERE id = '$id_marca'");
		$num_info = mysql_num_rows($busca_info);
		
		// Se não há o id
		if ($num_info == 0) {
		die("Esta informa&ccedil;&atilde;o de marca n&atilde;o &eacute; v&aacute;lida.");
		} else {		
		$info = mysql_fetch_array($busca_info);
		}
		
		// Busca produtos cadastrados com a marca
		$busca_produtos = mysql_query("SELECT * FROM tb_produtos WHERE id_marca = '$id_marca'");
		$num_produtos = mysql_num_rows($busca_produtos);
		
		// Busca as outras marcas
		$busca_marcas = mysql_query("SELECT * FROM tb_marcas WHERE id != '$id_marca' ORDER BY nome ASC");
		$num_marcas = mysql_num_rows($busca_marcas);
		
		$a = $_GET['a'];
		if ($a != "box") {  ?>
<style type="text/css">
<!--
#descricao {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	line-height: 18px;
			}
			
#descricao.no_box {
	background-color:F4F4F4;
	margin:0px;
	padding-top:0px;
	padding-right:10px;
	padding-left:10px;
	padding-bottom:20px;
	border:solid 1px #CCC;
			}
h4 {
	margin-bottom: 10px;
	padding-top: 15px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #E9E9E9;
	margin-top: 0px;
	margin-right: 0px;
	margin-left: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	width: 250px;
			}
-->
</style>  
<?php } else { ?>
<style type="text/css">
<!--
h4 {
	margin-bottom: 10px;
	padding-top: 15px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
	margin-top: 0px;
	margin-right: 0px;
	margin-left: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	width: 250px;
			}
-->
</style>
<link rel="stylesheet" href="../_css/estilo_facebox.css" type="text/css" media="screen" />  
<?php } 
//Trabalha o estilo
		$folha_estilo = '<style type="text/css">
<!--
';
		if($num_produtos != 0) {
			$folha_estilo .="form div#select_marcas { display:block; }\n";
			$required_marca_destino = "required";
		}	  
		$folha_estilo .= "-->
</style>
		";
?>
<?php echo $folha_estilo; ?>
<!-- DADOS DA MARCA -->
<div id="descricao" <?php if ($a != "box") { echo 'class="no_box"'; } ?>  >
	<h3>Removendo a marca/produtor: <?php if ($a != "box") { echo $info['nome']; } else { echo utf8_encode($info['nome']); } ?></h3>
    <form id="formulario-interno" class="formulario estilo" action="marcas.php" method="post">
    <input type="hidden" value="<?php echo $id_marca; ?>" name="id" id="id" />
    <p>&nbsp;</p>
    <p>
    <label>O que gostaria de fazer:</label>
    <?php if($num_produtos != 0 && $num_marcas != 0) { ?>
    <input type="radio" value="transferir-remover" name="acao" checked="checked" />
    Transferir os produtos  para outra marca e depois remov&ecirc;-la.<br />
    <?php } ?>
    <input type="radio" value="remover" name="acao" <?php if($num_produtos == 0 or $num_marcas == 0) { echo'checked="checked"'; } ?> />
    Remover a marca<?php if($num_produtos != 0) { echo' e os produtos dela'; } ?>.
    </p>
    <?php if($num_produtos != 0 && $num_marcas != 0) { ?>
    <div id="select_marcas">
    <p>
    <label>Escolha a marca para qual deseja transferir os produtos :</label>              
    <select id="id_marca_destino" name="id_marca_destino" class="input-medio <?php echo $required_marca_destino; ?>" >
        <?php // Lista os grupos
              while($dados_marcas = mysql_fetch_array($busca_marcas)) {
        ?>
        <option value="<?php echo $dados_marcas['id']; ?>" ><?php if ($a != "box") { echo $dados_marcas['nome']; } else { echo utf8_encode($dados_marcas['nome']); } ?></option>
        <?php } ?>
        
    </select> 
    </p>
    </div>
    <? } ?>
    <p><input class="botao grande" type="submit" value="Avan&ccedil;ar" /></p>
    
    </form>
</div>
<!-- FIM DOS DADOS DA MARCA -->
<script type="text/javascript" src="../_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../_scripts/jquery.config-escrita-data.js"></script>
<?php if($num_produtos != 0 && $num_marcas != 0) { ?>
<script>
$(document).ready(function() {
	
	$("a.transferir-remover").click(function() {
		$("div#select_marcas").slideDown();
		$("#id_marca_destino").addClass("required");	
	});
	
	$("a.remover").click(function() {
		$("div#select_marcas").fadeOut();
		$("#id_marca_destino").removeClass("required");	
	});


});
</script>
<?php } ?>