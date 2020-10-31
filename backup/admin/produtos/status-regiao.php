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
<?php } ?>
<!-- DADOS DA MARCA -->
<div id="descricao" <?php if ($a != "box") { echo 'class="no_box"'; } ?>  >
	<h3><?php if ($a != "box") { echo $info['nome']; } else { echo utf8_encode($info['nome']); } ?></h3>
    <form id="formulario-interno" class="formulario estilo" action="regioes.php" method="post">
    <input type="hidden" value="<?php echo $id_regiao; ?>" name="id" id="id" />
    <p>&nbsp;</p>
    <p>
    <label>Escolha o que deseja fazer:</label>              
    <select id="acao" name="acao" class="input-grande" >
    	<?php if($info['status'] == "ativo") { ?>
        <option value="desativar-regiao" selected="selected" >Desativar apenas a regi&atilde;o</option>
        <option value="desativar-regiao-produto" >Desativar a regi&atilde;o e os produtos dela</option>
        <?php } if($info['status'] == "inativo") { ?>
        <option value="ativar-regiao" selected="selected" >Ativar apenas a regi&atilde;o</option>
        <option value="ativar-regiao-produto" >Ativar a regi&atilde;o e os produtos dela</option>
        <?php } ?>
    </select> 
    </p>
    
    <p><input class="botao grande" type="submit" value="Avan&ccedil;ar" /></p>
    
    </form>
</div>
<!-- FIM DOS DADOS DA MARCA -->
<script type="text/javascript" src="../_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../_scripts/jquery.config-escrita-data.js"></script>
<?php ?>