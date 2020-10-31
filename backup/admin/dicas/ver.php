<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "fotos";
		$pag = "ver-foto";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		if($_GET['id']) { $id_foto = $_GET['id']; }
		else { die("Erro de acesso."); }
		// Id do responsável pela foto
		$id_responsavel = $_SESSION['AQUACENTER_ID'];
		$busca_info = mysql_query("SELECT * FROM tb_fotos WHERE id = '$id_foto'");
		$num_info = mysql_num_rows($busca_info);
		
		// Se não há o id
		if ($num_info == 0) {
		die("Esta informa&ccedil;&atilde;o de foto n&atilde;o &eacute; v&aacute;lida.");
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
<?php } ?>
<!-- DADOS DO FOTO -->
<div id="descricao" <?php if ($a != "box") { echo 'class="no_box"'; } ?>  >
	<h3><?php if ($a != "box") { echo $info['empresa']; } else { echo utf8_encode($info['empresa']); } ?></h3>
    <p>
    Nome de usu&aacute;rio: <strong><?php echo $info['usuario']; ?></strong><br />
    <?php if($info['razao_social'] != "" ) { ?>Raz&atilde;o Social: <strong><?php echo $info['razao_social']; ?></strong><br /><?php } ?>
    <?php if($info['cnpj'] != "" ) { ?>CNPJ: <strong><?php echo ExisteChar($info['cnpj']); ?></strong><br /><?php } ?>
    <?php if($info['ie'] != "" ) { ?>IE: <strong><?php echo ExisteChar($info['ie']); ?></strong><br /><?php } ?>
    <?php if($info['endereco'] != "" ) { ?>Endere&ccedil;o: <strong><?php echo ExisteChar($info['endereco']); ?></strong><br /><?php } ?>
    <?php if($info['numero'] != "" ) { ?>N&uacute;mero: <strong><?php echo ExisteChar($info['numero']); ?></strong><br /><?php } ?>
    <?php if($info['complemento'] != "" ) { ?>Complemento: <strong><?php echo ExisteChar($info['complemento']); ?></strong><br /><?php } ?>
    <?php if($info['bairro'] != "" ) { ?>Bairro: <strong><?php echo ExisteChar($info['bairro']); ?></strong><br /><?php } ?>
    <?php if($info['cidade'] != "" ) { ?>Cidade: <strong><?php echo ExisteChar($info['cidade']); ?></strong><br /><?php } ?>
    <?php if($info['estado'] != "" ) { ?>Estado: <strong><?php if ($info['estado'] != "NN") { echo ExisteChar($info['estado']); } else { echo "N&atilde;o informado"; } ?></strong><br /><?php } ?>
    <?php if($info['cep'] != "" ) { ?>CEP: <strong><?php echo ExisteChar($info['cep']); ?></strong><br /><?php } ?>
    <?php if($info['pais'] != "" ) { ?>Pa&iacute;s: <strong><?php echo ExisteChar($info['pais']); ?></strong><br /><?php } ?>
    <?php if($info['telefone'] != "" ) { ?>Telefone: <strong><?php echo ExisteChar($info['telefone']); ?></strong><br /><?php } ?>
    <?php if($info['telefone_adicional'] != "" ) { ?>Telefone(2): <strong><?php echo ExisteChar($info['telefone_adicional']); ?></strong><br /><?php } ?>
    <?php if($info['fax'] != "" ) { ?>Fax: <strong><?php echo ExisteChar($info['fax']); ?></strong><br /><?php } ?>
    <?php if($info['site'] != "" ) { ?>Site: <strong><?php echo ExisteChar($info['site']); ?></strong><br /><?php } ?>
    <?php if ($info['observacao'] != "") { ?>
    Observa&ccedil;&atilde;o: <?php if ($a != "box") { echo $info['observacao']; } else { echo utf8_encode($info['observacao']); } ?>
    <?php } ?>
  <h4>Contato principal</h4>
    <?php if($info['nome'] != "" ) { ?>Nome: <strong><?php echo $info['nome']; ?></strong><br /><?php } ?>
    <?php if($info['email'] != "" ) { ?>E-mail: <strong><a href="mailto:<?php echo $info['email']; ?>"><?php echo ExisteChar($info['email']); ?></a></strong><br /><?php } ?>
    <?php if($info['celular'] != "" ) { ?>Celular: <strong><?php echo ExisteChar($info['celular']); ?></strong><br /><?php } ?>
    <?php if($info['rg'] != "" ) { ?>RG: <strong><?php echo ExisteChar($info['rg']); ?></strong><br /><?php } ?>
    <?php if($info['cpf'] != "" ) { ?>CPF: <strong><?php echo ExisteChar($info['cpf']); ?></strong><br /><?php } ?>
  <h4>Contato secund&aacute;rio</h4>
    <?php if($info['nome_secundario'] != "" ) { ?>Nome: <strong><?php echo ExisteChar($info['nome_secundario']); ?></strong><br /><?php } ?>
    <?php if($info['email_secundario'] != "" ) { ?>E-mail: <strong><a href="mailto:<?php echo $info['email_secundario']; ?>"><?php echo ExisteChar($info['email_secundario']); ?></a></strong><br /><?php } ?>
    <?php if($info['celular_secundario'] != "" ) { ?>Celular: <strong><?php echo ExisteChar($info['celular_secundario']); ?></strong><br /><?php } ?>
    </p>    
</div>
<!-- FIM DOS DADOS DO FOTO ->
<?php ?>