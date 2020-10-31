<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "regioes";
		$pag = "status-regiao";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		if($_GET['id']) { $id_regiao = $_GET['id']; }
		else { die("Erro de acesso."); }
		
		// Pega os dados
		$busca_info = mysql_query("SELECT * FROM tb_regioes WHERE id = '$id_regiao'");
		$num_info = mysql_num_rows($busca_info);
		
		// Se não há o id
		if ($num_info == 0) {
		die("Esta informa&ccedil;&atilde;o de regiao n&atilde;o &eacute; v&aacute;lida.");
		} else {		
		$info = mysql_fetch_array($busca_info);
		}
		
		//Define a pais mãe
		$pais_mae = $info['pais_mae'];
		
		// Busca produtos cadastrados com a regiao
		$busca_produtos = mysql_query("SELECT * FROM tb_produtos WHERE id_regiao = '$id_regiao'");
		$num_produtos = mysql_num_rows($busca_produtos);
		
		// Busca as outras regioes
		$busca_regioes = mysql_query("SELECT * FROM tb_regioes WHERE id != '$id_regiao' AND pais_mae != '$pais_mae' ORDER BY nome ASC");
		$num_regioes = mysql_num_rows($busca_regioes);
		
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
			$folha_estilo .="form div#select_regioes { display:block; }\n";
			$required_regiao_destino = "required";
		}	  
		$folha_estilo .= "-->
</style>
		";
?>
<?php echo $folha_estilo; ?>
<!-- DADOS DA MARCA -->
<div id="descricao" <?php if ($a != "box") { echo 'class="no_box"'; } ?>  >
	<h3>Removendo a regiao: <?php if ($a != "box") { echo $info['nome']; } else { echo utf8_encode($info['nome']); } ?></h3>
    <form id="formulario-interno" class="formulario estilo" action="regioes.php" method="post">
    <input type="hidden" value="<?php echo $id_regiao; ?>" name="id" id="id" />
    <p>&nbsp;</p>
    <p>
    <label>O que gostaria de fazer:</label>
    <?php if($num_produtos != 0 && $num_regioes != 0) { ?>
    <input type="radio" value="transferir-remover" name="acao" checked="checked" />
    Transferir os produtos  para outra regiao e depois remov&ecirc;-la.<br />
    <?php } ?>
    <input type="radio" value="remover" name="acao" <?php if($num_produtos == 0 or $num_regioes == 0) { echo'checked="checked"'; } ?> />
    Remover a regiao<?php if($num_produtos != 0) { echo' e os produtos dela'; } ?>.
    </p>
    <?php if($num_produtos != 0 && $num_regioes != 0) { ?>
    <div id="select_regioes">
    <p>
    <label>Escolha a regi&atilde;o para qual deseja transferir os produtos :</label>              
    <select id="id_regiao_destino" name="id_regiao_destino" class="input-medio <?php echo $required_regiao_destino; ?>" >
        <?php // Lista os grupos
              while($dados_regioes = mysql_fetch_array($busca_regioes)) {
        ?>
        <option value="<?php echo $dados_regioes['id']; ?>" ><?php if ($a != "box") { echo $dados_regioes['nome']; } else { echo utf8_encode($dados_regioes['nome']); } ?></option>
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
<?php if($num_produtos != 0 && $num_regioes != 0) { ?>
<script>
$(document).ready(function() {
	
	$("a.transferir-remover").click(function() {
		$("div#select_regioes").slideDown();
		$("#id_regiao_destino").addClass("required");	
	});
	
	$("a.remover").click(function() {
		$("div#select_regioes").fadeOut();
		$("#id_regiao_destino").removeClass("required");	
	});


});
</script>
<?php } ?>