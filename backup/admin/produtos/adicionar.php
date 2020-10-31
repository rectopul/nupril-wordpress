<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "produtos";
		$pag = "adicionar-produto";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");

		// Checa se foi enviado informação
		if($_POST['nome']) {
		
		// Define as variáveis da página
		$nome = mysql_real_escape_string($_POST['nome']);
		$referencia = $_POST['referencia'];
		$estoque = $_POST['estoque'];
		$valor_cru = $_POST['valor'];
		$valor = ReaisBD($valor_cru);
		$valor_de_cru = $_POST['valor_de'];
		$valor_de = ReaisBD($valor_de_cru);
		$id_marca = $_POST['marca'];
		$id_categoria = $_POST['categoria'];
		$id_subcategoria = $_POST['subcategoria'];
		$id_categoria_promocional = $_POST['categoria_promocional'];
		$id_pais = $_POST['pais'];
		$id_regiao = $_POST['regiao'];
		$pontuacao = $_POST['pontuacao'];
		$tipo_uva = $_POST['tipo_uva'];
		$peso = $_POST['peso'];
		$altura = $_POST['altura'];
		$largura = $_POST['largura'];
		$comprimento = $_POST['comprimento'];
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$dados_tecnicos = mysql_real_escape_string($_POST['dados_tecnicos']);
		$imagem_1 = $_POST['imagem_nome_1'];
		$imagem_2 = $_POST['imagem_nome_2'];
		$imagem_3 = $_POST['imagem_nome_3'];
		$imagem_4 = $_POST['imagem_nome_4'];
		$imagem_5 = $_POST['imagem_nome_5'];
		$imagem_6 = $_POST['imagem_nome_6'];
		$imagem_7 = $_POST['imagem_nome_7'];
		$imagem_8 = $_POST['imagem_nome_8'];
		$multimidia = mysql_real_escape_string($_POST['multimidia']);
		$destaque = $_POST['destaque'];
		$promocao = $_POST['promocao'];
		$comprado = 0;
		$visualizado = 0;
		$status = $_POST['status'];
		$id_responsavel = $_SESSION['NUPILL_ID'];
		$nome_responsavel = $_SESSION['NUPILL_NOME'];
		$id_editor = $_SESSION['NUPILL_ID'];
		$ip_editor = $_SESSION['NUPILL_IP'];
		$data_cadastro = date("c");
		$data_edicao = date("c");
		$acao_adicionar = "adicionar";
		
		// Busca dados da marca
		$busca_bd_marca = mysql_query("SELECT * FROM tb_marcas WHERE id = '$id_marca'");
		$dados_bd_marca = mysql_fetch_array($busca_bd_marca);
		$nome_marca = $dados_bd_marca['nome'];
		$apelido_marca = $dados_bd_marca['apelido'];
		
		// Busca dados da categoria
		$busca_bd_categoria = mysql_query("SELECT * FROM tb_categorias WHERE id = '$id_categoria'");
		$dados_bd_categoria = mysql_fetch_array($busca_bd_categoria);
		$nome_categoria = $dados_bd_categoria['nome'];
		$apelido_categoria = $dados_bd_categoria['apelido'];
		
		// Busca dados da subcategoria
		$busca_bd_subcategoria = mysql_query("SELECT * FROM tb_subcategorias WHERE id = '$id_subcategoria'");
		$dados_bd_subcategoria = mysql_fetch_array($busca_bd_subcategoria);
		$nome_subcategoria = $dados_bd_subcategoria['nome'];
		$apelido_subcategoria = $dados_bd_subcategoria['apelido'];
		
		// Busca dados da categoria promocional
		$busca_bd_categoria_promocional = mysql_query("SELECT * FROM tb_categorias WHERE id = '$id_categoria_promocional'");
		$dados_bd_categoria_promocional = mysql_fetch_array($busca_bd_categoria_promocional);
		$nome_categoria_promocional = $dados_bd_categoria_promocional['nome'];	
		$apelido_categoria_promocional = $dados_bd_categoria_promocional['apelido'];	
		
		// Gera o apelido
		$apelido = GeraApelidoProduto($_POST['nome'], "-", 0);
		if($apelido == "Apelido em uso") { $erro = "52"; }
		
		// Checa se há algum produto com o mesmo nome
		$checa_nome = mysql_query("SELECT * FROM tb_produtos WHERE nome = '$nome'");
		$num_checa_nome = mysql_num_rows($checa_nome);
		if($num_checa_nome != 0) { $erro = "52"; }
		
		// Se não foi enviado informação duplicada
		if(!$erro) {
			
		// Trabalha as imagens
		// Imagem 1
		if ($imagem_1 != "") {
		rename("../../_imagens/produtos/".$imagem_1."", "../../_imagens/produtos/".$apelido."_1.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_1."", "../../_imagens/produtos/miniaturas/".$apelido."_1.jpg");
		$imagem_1 = $apelido."_1.jpg";
		}
		// Imagem 2
		if ($imagem_2 != "") {
		rename("../../_imagens/produtos/".$imagem_2."", "../../_imagens/produtos/".$apelido."_2.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_2."", "../../_imagens/produtos/miniaturas/".$apelido."_2.jpg");
		$imagem_2 = $apelido."_2.jpg";
		}
		// Imagem 3
		if ($imagem_3 != "") {
		rename("../../_imagens/produtos/".$imagem_3."", "../../_imagens/produtos/".$apelido."_3.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_3."", "../../_imagens/produtos/miniaturas/".$apelido."_3.jpg");
		$imagem_3 = $apelido."_3.jpg";
		}
		// Imagem 4
		if ($imagem_4 != "") {
		rename("../../_imagens/produtos/".$imagem_4."", "../../_imagens/produtos/".$apelido."_4.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_4."", "../../_imagens/produtos/miniaturas/".$apelido."_4.jpg");
		$imagem_4 = $apelido."_4.jpg";
		}
		// Imagem 5
		if ($imagem_5 != "") {
		rename("../../_imagens/produtos/".$imagem_5."", "../../_imagens/produtos/".$apelido."_5.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_5."", "../../_imagens/produtos/miniaturas/".$apelido."_5.jpg");
		$imagem_5 = $apelido."_5.jpg";
		}
		// Imagem 6
		if ($imagem_6 != "") {
		rename("../../_imagens/produtos/".$imagem_6."", "../../_imagens/produtos/".$apelido."_6.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_6."", "../../_imagens/produtos/miniaturas/".$apelido."_6.jpg");
		$imagem_6 = $apelido."_6.jpg";
		}
		// Imagem 7
		if ($imagem_7 != "") {
		rename("../../_imagens/produtos/".$imagem_7."", "../../_imagens/produtos/".$apelido."_7.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_7."", "../../_imagens/produtos/miniaturas/".$apelido."_7.jpg");
		$imagem_7 = $apelido."_7.jpg";
		}
		// Imagem 8
		if ($imagem_8 != "") {
		rename("../../_imagens/produtos/".$imagem_8."", "../../_imagens/produtos/".$apelido."_8.jpg");
		rename("../../_imagens/produtos/miniaturas/".$imagem_8."", "../../_imagens/produtos/miniaturas/".$apelido."_8.jpg");
		$imagem_8 = $apelido."_8.jpg";
		}
			
		// Registra no banco de dados
		$inserir = "INSERT INTO tb_produtos (
											nome,
											apelido,
											referencia,
											estoque,
											valor_de,
											valor,
											id_marca,
											nome_marca,
											apelido_marca,
											id_categoria,
											nome_categoria,
											apelido_categoria,
											id_subcategoria,
											nome_subcategoria,
											apelido_subcategoria,
											id_categoria_promocional,
											nome_categoria_promocional,
											apelido_categoria_promocional,
											id_pais,
											nome_pais,
											apelido_pais,
											id_regiao,
											nome_regiao,
											apelido_regiao,
											pontuacao,
											tipo_uva,
											peso,
											altura,
											largura,
											comprimento,
											descricao,
											dados_tecnicos,
											imagem_1,
											imagem_2,
											imagem_3,
											imagem_4,
											imagem_5,
											imagem_6,
											imagem_7,
											imagem_8,
											multimidia,
											destaque,
											promocao,
											comprado,
											visualizado,
											data_cadastro,
											id_responsavel,
											nome_responsavel,
											data_edicao,
											id_editor,
											ip_editor,
											ultima_acao,
											status
											)	VALUES (
											'$nome',
											'$apelido',
											'$referencia',
											'$estoque',
											'$valor_de',
											'$valor',
											'$id_marca',
											'$nome_marca',
											'$apelido_marca',
											'$id_categoria',
											'$nome_categoria',
											'$apelido_categoria',
											'$id_subcategoria',
											'$nome_subcategoria',
											'$apelido_subcategoria',
											'$id_categoria_promocional',
											'$nome_categoria_promocional',
											'$apelido_categoria_promocional',
											'$id_pais',
											'$nome_pais',
											'$apelido_pais',
											'$id_regiao',
											'$nome_regiao',
											'$apelido_regiao',
											'$pontuacao',
											'$tipo_uva',
											'$peso',
											'$altura',
											'$largura',
											'$comprimento',
											'$descricao',
											'$dados_tecnicos',
											'$imagem_1',
											'$imagem_2',
											'$imagem_3',
											'$imagem_4',
											'$imagem_5',
											'$imagem_6',
											'$imagem_7',
											'$imagem_8',
											'$multimidia',
											'$destaque',
											'$promocao',
											'$comprado',
											'$visualizado',
											'$data_cadastro',
											'$id_responsavel',
											'$nome_responsavel',
											'$data_edicao',
											'$id_editor',
											'$ip_editor',
											'$acao_adicionar',
											'$status'
											)";
		$inserir_exec = mysql_query($inserir) or die("Erro. Tente novamente ou contate o administrador.");
		
		// Se inserir
		if($inserir_exec) {
		header('Location:index.php?sucesso=50');
		} else {
		$erro = "50";
		}
		
		} // Fim da checagem se não foi enviado informação duplicada	
		
		} // Fim da checagem se está foi enviado informação
		
		// Busca as categorias
		$busca_categorias = mysql_query("SELECT * FROM tb_categorias WHERE tipo = 'fixa' ORDER BY nome ASC");
		if(mysql_num_rows($busca_categorias) == 0) { header('Location:index.php?erro=54'); }
		
		// Cria o token
		$token =  md5(uniqid( time() . $_SERVER['REMOTE_ADDR'] . rand(0, 9) ));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Adicionar produto</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="stylesheet" href="../_css/estilo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../_css/estilo_jcrop.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../_css/tema-<?php echo $tema_sistema; ?>.css" type="text/css"media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="_css/estilo.ie6.css" />
<![endif]-->
<!-- FIM DAS FOLHAS DE ESTILO -->	
</head>
  
<body>
<!-- DEFESA -->
<div id="defesa">
	<!-- BARRA ESQUERDA -->
    <div id="barra-esquerda">
    <div id="barra-esquerda-defesa">			
	<h1 id="barra-esquerda-titulo"><a href="#"><?php echo $titulo_sistema; ?></a></h1>
		  
			<!-- LOGO -->
			<a href="../painel/" title="<?php echo $titulo_sistema; ?>"><img id="logo" src="../_imagens/logo.png" alt="<?php echo $titulo_sistema; ?>" /></a>
		  
			<!-- LINKS DA BARRA ESQUERDA -->
			<div id="links-perfil">
				Ol&aacute; <a href="../produtos/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
                <br /><br />
				<?php if($site_sistema != "") { ?>
				<a href="<?php echo $site_sistema; ?>" target="_blank" title="Visualizar o site">Visualizar o site</a> | 
                <?php } ?>
                <a href="../logout.php" title="Sair">Sair</a>
			</div>        
			
            <!-- MENU LATERAL -->
            <?php include("../menu-lateral.php"); ?>
            <!-- FIM DO MENU LATERAL -->
            
            
            
        </div>
        </div>
        <!-- FIM DA BARRA ESQUERDA -->
		
        <!-- CONTEÚDO -->
        <div id="conteudo">
			
			<!-- INTRODUÇÃO -->
			<h2>Adicionar produto</h2>
			<p id="introducao">Utilize o formul&aacute;rio abaixo para adicionar um novo produto.</p>
            <a href="javascript:window.history.back();" class="botao voltar">&laquo; Voltar</a>
            
	    	<div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo">
            
	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Dados do produto</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- FORMULÁRIO -->
  				  <div class="conteudo-box">
                    
                    <form id="formulario-interno" class="formulario estilo" action="adicionar.php" method="post">
						<fieldset>
                        
                        <p>
                        <label>Nome:</label>
						<input class="input-texto input-medio required" type="text" id="nome" name="nome" value="<?php echo $nome; ?>" maxlength="255" /><br />
                        <small id="status_apelido"><?php if($apelido) { echo "retorno"; } ?></small>
                        </p>

                        <p>
                        <label>Categoria:</label>              
	  		  		    <select id="categoria" name="categoria" class="input-medio required" ></select>
						</p>
                        
                        <p>
                        <label>Subcategoria:</label>              
	  		  		    <select id="subcategoria" name="subcategoria" class="input-medio required" >
                        <option value="">Selecione a categoria</option>
                        </select>
						</p>
                        
                        <p>
                        <label>Exibir em lan&ccedil;amentos:</label>              
	  		  		    <select id="destaque" name="destaque" class="input-medio required" >
                        <option value="" <?php if($destaque == "") { echo'selected="selected"'; } ?> >Selecione</option>
                        <option value="1" <?php if($destaque == "1") { echo'selected="selected"'; } ?> >Sim</option>
                        <option value="2" <?php if($destaque == "2") { echo'selected="selected"'; } ?> >N&atilde;o</option>
                        </select>
						</p>
                        
						<p>
                        <label>Como aplicar</label>
						<textarea class="input-texto textarea editor" id="descricao" name="descricao" cols="79" rows="5" ><?php echo $descricao; ?></textarea>
                        </p>

                        </fieldset>
                      <fieldset>
                      <legend>Imagem do produto</legend>
                      </fieldset>
                       <?php if ($imagem_1 != "") { echo'
                    <input type="hidden" name="imagem_nome_1" class="required" id="imagem_nome_1" value="'.$imagem_1.'" />';
                    } else { echo'
                    <input type="hidden" name="imagem_nome_1" class="required" id="imagem_nome_1" value="" />';
                    } if ($imagem_2 != "") { echo'
					<input type="hidden" name="imagem_nome_2" id="imagem_nome_2" value="'.$imagem_2.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_2" id="imagem_nome_2" value="" />';
                    } if ($imagem_3 != "") { echo'
					<input type="hidden" name="imagem_nome_3" id="imagem_nome_3" value="'.$imagem_3.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_3" id="imagem_nome_3" value="" />';
					} if ($imagem_4 != "") { echo'
					<input type="hidden" name="imagem_nome_4" id="imagem_nome_4" value="'.$imagem_4.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_4" id="imagem_nome_4" value="" />';
					} if ($imagem_5 != "") { echo'
					<input type="hidden" name="imagem_nome_5" id="imagem_nome_5" value="'.$imagem_5.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_5" id="imagem_nome_5" value="" />';
					} if ($imagem_6 != "") { echo'
					<input type="hidden" name="imagem_nome_6" id="imagem_nome_6" value="'.$imagem_6.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_6" id="imagem_nome_6" value="" />';
					} if ($imagem_7 != "") { echo'
					<input type="hidden" name="imagem_nome_7" id="imagem_nome_7" value="'.$imagem_7.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_7" id="imagem_nome_7" value="" />';
					} if ($imagem_8 != "") { echo'
					<input type="hidden" name="imagem_nome_8" id="imagem_nome_8" value="'.$imagem_8.'" />';
					} else { echo'
					<input type="hidden" name="imagem_nome_8" id="imagem_nome_8" value="" />';
					} ?>
                    <p><span class="nota">Dica:</span> As imagens devem estar nos formatos <strong>.jpg , .gif ou .png</strong>. O tamanho m&aacute;ximo &eacute; de <strong>2Mb</strong>. Procure manter imagens menores em seu site, imagens maiores demoram para ser carregadas e prejudicam a experi&ecirc;ncia do usu&aacute;rio.</p>
                    <p><label for="imagem_nome_1" class="invalido" id="erro_img">Por favor, insira uma imagem no campo abaixo [ Imagem 1 ].</label></p>
                    </form>
                    
                        	<!-- PRIMEIRA LINHA -->
                            <div class="primeira_linha">
                            <div id="div_imagem_1" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem</h4>
                            <?php if ($imagem_1 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_1.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg1" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img1" style="display:none;"/>
                      		<div id="crop_preview1" class="crop_preview"></div>                       
                            <div id="upload1" class="upload">
		  					<form id="form1" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido1" name="apelido1" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident1" name="ident1" value="1"  />
                            <?php if ($imagem_1 == "") { echo'
                            <input type="file" name="file1" id="file1" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload1();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover1" value="Remover/Alterar" onClick="limpa1();" />';
							} ?>
                    </form>
                  </div>
							<div id="image1" style="display:none" class="image">
                            <form action="" method="post" id="crop_details1" class="crop_details">
                            <input type="hidden" id="x1" name="x1" />
                            <input type="hidden" id="y1" name="y1" />
                            <input type="hidden" id="w1" name="w1" />
                            <input type="hidden" id="h1" name="h1" />
                            <input type="hidden" id="apelido1" name="apelido1" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident1" name="ident1" value="1" />
                            <input type="hidden" id="fname1" name="fname1"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop1();" />
                            <input type="button" class="botao remover_img" id="remover1" value="Cancelar/Enviar outra" onClick="limpa1();" />
                  			</form>      
                            </div>
                  			
              				</div>
                            <div class="clear"></div>
                          <?php if($imagem_3 == "") { ?>
                          <?php } ?>
                    	</div>
                        <!-- FIM DA PRIMEIRA LINHA -->
                        
                        <!-- SEGUNDA LINHA -->
                        <div class="segunda_linha" <?php if($imagem_3 != "") { echo'style="display:block;"'; } ?> >

                          <div id="div_imagem_3" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 3</h4>
                            <?php if ($imagem_3 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_3.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg3" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img3" style="display:none;"/>
                      		<div id="crop_preview3" class="crop_preview"></div>                       
                            <div id="upload3" class="upload">
                            <form id="form3" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido3" name="apelido3" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident3" name="ident3" value="3"  />                        
                            <?php if ($imagem_3 == "") { echo'
                            <input type="file" name="file3" id="file3" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload3();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover3" value="Remover/Alterar" onClick="limpa3();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image3" style="display:none" class="image">
                            <form action="" method="post" id="crop_details3" class="crop_details">
                            <input type="hidden" id="x3" name="x3" />
                            <input type="hidden" id="y3" name="y3" />
                            <input type="hidden" id="w3" name="w3" />
                            <input type="hidden" id="h3" name="h3" />
                            <input type="hidden" id="apelido3" name="apelido3" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident3" name="ident3" value="3" />
                            <input type="hidden" id="fname3" name="fname3"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop3();" />
                            <input type="button" class="botao remover_img" id="remover3" value="Cancelar/Enviar outra" onClick="limpa3();" />
                  			</form>      
                            </div>

                          </div>

                          <div id="div_imagem_4" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 4</h4>
                            <?php if ($imagem_4 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_4.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg4" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img4" style="display:none;"/>
                      		<div id="crop_preview4" class="crop_preview"></div>                       
                            <div id="upload4" class="upload">
                            <form id="form4" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido4" name="apelido4" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident4" name="ident4" value="4"  />
                            <?php if ($imagem_4 == "") { echo'
                            <input type="file" name="file4" id="file4" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload4();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover4" value="Remover/Alterar" onClick="limpa4();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image4" style="display:none" class="image">
                            <form action="" method="post" id="crop_details4" class="crop_details">
                            <input type="hidden" id="x4" name="x4" />
                            <input type="hidden" id="y4" name="y4" />
                            <input type="hidden" id="w4" name="w4" />
                            <input type="hidden" id="h4" name="h4" />
                            <input type="hidden" id="apelido4" name="apelido4" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident4" name="ident4" value="4" />
                            <input type="hidden" id="fname4" name="fname4"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop4();" />
                            <input type="button" class="botao remover_img" id="remover4" value="Cancelar/Enviar outra" onClick="limpa4();" />
                  			</form>      
                            </div>
                          
                          </div>
                          <div class="clear"></div>
                          <?php if($imagem_5 == "") { ?>
                		 <div class="continuo"><input type="button" class="botao" id="mostrar_terceira_linha" value="Inserir mais imagens" /></div>
						 <?php } ?>
                          </div>
                          <!-- FIM DA SEGUNDA LINHA -->
                        
                        
                        <!-- TERCEIRA LINHA -->
                    <div class="terceira_linha" <?php if($imagem_5 != "") { echo'style="display:block;"'; } ?> >
                        
						  <div id="div_imagem_5" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 5</h4>
                            <?php if ($imagem_5 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_5.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg5" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img5" style="display:none;"/>
                      		<div id="crop_preview5" class="crop_preview"></div>                       
                            <div id="upload5" class="upload">
                            <form id="form5" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido5" name="apelido5" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident5" name="ident5" value="5"  />
                            <?php if ($imagem_5 == "") { echo'
                            <input type="file" name="file5" id="file5" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload5();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover5" value="Remover/Alterar" onClick="limpa5();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image5" style="display:none" class="image">
                            <form action="" method="post" id="crop_details5" class="crop_details">
                            <input type="hidden" id="x5" name="x5" />
                            <input type="hidden" id="y5" name="y5" />
                            <input type="hidden" id="w5" name="w5" />
                            <input type="hidden" id="h5" name="h5" />
                            <input type="hidden" id="apelido5" name="apelido5" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident5" name="ident5" value="5" />
                            <input type="hidden" id="fname5" name="fname5"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop5();" />
                            <input type="button" class="botao remover_img" id="remover5" value="Cancelar/Enviar outra" onClick="limpa5();" />
                  			</form>      
                            </div>                          
                          </div>
                          
                          <div id="div_imagem_6" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 6</h4>
                            <?php if ($imagem_6 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_6.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg6" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img6" style="display:none;"/>
                      		<div id="crop_preview6" class="crop_preview"></div>                       
                            <div id="upload6" class="upload">
                            <form id="form6" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido6" name="apelido6" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident6" name="ident6" value="6"  />
                            <?php if ($imagem_6 == "") { echo'
                            <input type="file" name="file6" id="file6" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload6();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover6" value="Remover/Alterar" onClick="limpa6();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image6" style="display:none" class="image">
                            <form action="" method="post" id="crop_details6" class="crop_details">
                            <input type="hidden" id="x6" name="x6" />
                            <input type="hidden" id="y6" name="y6" />
                            <input type="hidden" id="w6" name="w6" />
                            <input type="hidden" id="h6" name="h6" />
                            <input type="hidden" id="apelido6" name="apelido6" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident6" name="ident6" value="6" />
                            <input type="hidden" id="fname6" name="fname6"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop6();" />
                            <input type="button" class="botao remover_img" id="remover6" value="Cancelar/Enviar outra" onClick="limpa6();" />
                  			</form>      
                            </div>
                          
                          </div>
                          <div class="clear"></div>
                          <?php if($imagem_7 == "") { ?>
               		  <div class="continuo" height="30" colspan="2"><input type="button" class="botao" id="mostrar_quarta_linha" value="Inserir mais imagens" /></div>
					  <?php } ?>
               		  </div>
                        <!-- FIM DA TERCEIRA LINHA -->
                        
                        <!-- QUARTA LINHA -->
                        <div class="quarta_linha" <?php if($imagem_7 != "") { echo'style="display:block;"'; } ?> >
                        
                          <div id="div_imagem_7" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 7</h4>
                            <?php if ($imagem_7 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_7.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg7" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img7" style="display:none;"/>
                      		<div id="crop_preview7" class="crop_preview"></div>                       
                            <div id="upload7" class="upload">
                            <form id="form7" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido7" name="apelido7" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident7" name="ident7" value="7"  />
                            <?php if ($imagem_7 == "") { echo'
                            <input type="file" name="file7" id="file7" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload7();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover7" value="Remover/Alterar" onClick="limpa7();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image7" style="display:none" class="image">
                            <form action="" method="post" id="crop_details7" class="crop_details">
                            <input type="hidden" id="x7" name="x7" />
                            <input type="hidden" id="y7" name="y7" />
                            <input type="hidden" id="w7" name="w7" />
                            <input type="hidden" id="h7" name="h7" />
                            <input type="hidden" id="apelido7" name="apelido7" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident7" name="ident7" value="7" />
                            <input type="hidden" id="fname7" name="fname7"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop7();" />
                            <input type="button" class="botao remover_img" id="remover7" value="Cancelar/Enviar outra" onClick="limpa7();" />
                  			</form>      
                            </div>
                          </div>

                          <div id="div_imagem_8" class="div_imagem">
                          	<h4 class="titulo_imagem">Imagem 8</h4>
                            <?php if ($imagem_8 != "") { echo'
                            <img src="../../_imagens/produtos/'.$imagem_8.'" width="100%" />';
                            } else { echo'
                            <img src="../_imagens/item_sem_imagem.gif" id="item_semimg8" />';
                            } ?>
                            <img src="../_imagens/jquery/loading.gif" id="loading_img8" style="display:none;"/>
                      		<div id="crop_preview8" class="crop_preview"></div>                       
                            <div id="upload8" class="upload">
                            <form id="form8" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="apelido8" name="apelido8" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident8" name="ident8" value="8"  />
                            <?php if ($imagem_8 == "") { echo'
                            <input type="file" name="file8" id="file8" />                            
                            <input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload8();" />';
							} else { echo'
							<input type="button" class="botao remover_img" id="remover8" value="Remover/Alterar" onClick="limpa8();" />';
							} ?>
                            </form>
                            </div>
                            <div id="image8" style="display:none" class="image">
                            <form action="" method="post" id="crop_details8" class="crop_details">
                            <input type="hidden" id="x8" name="x8" />
                            <input type="hidden" id="y8" name="y8" />
                            <input type="hidden" id="w8" name="w8" />
                            <input type="hidden" id="h8" name="h8" />
                            <input type="hidden" id="apelido8" name="apelido8" value="<?php echo $token; ?>" class="apelido" />
                            <input type="hidden" id="ident8" name="ident8" value="8" />
                            <input type="hidden" id="fname8" name="fname8"  />
                        	<input type="button" class="botao recortar"   value="Recortar e salvar" onclick="return crop8();" />
                            <input type="button" class="botao remover_img" id="remover8" value="Cancelar/Enviar outra" onClick="limpa8();" />
                  			</form>      
                            </div>                          
                          </div>
                          <div class="clear"></div>
                    </div>
                          <!-- FIM DA QUARTA LINHA -->
                        <form>
                          
                        <p><input class="botao grande" type="button" id="enviarform" value="Adicionar Produto" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="botao grande" type="button" onclick="window.location.href='../produtos'" value="Cancelar" /></p>
						<div class="clear"></div>
					</form>
                    
        			</div>
                    <!-- FIM DO FORMULÁRIO -->
					
				</div> 
                <!-- FIM DO CONTEÚDO DO MIOLO -->
				
			</div>
            <!-- FIM DO MIOLO -->            
            
      		<div class="clear"></div>
			
            <!-- RODAPÉ -->
		  	<div id="rodape">
				
            <!-- BARRA SOCIAL -->
            <?php include("../barra-social.php"); ?>
            <!-- FIM DA BARRA SOCIAL -->    
                
			</div>
		  	<!-- FIM DO RODAPÉ -->
			
		</div> 
        <!-- FIM DO CONTEÚDO -->
		
</div>
<!-- FIM DA DEFESA -->
<!-- SCRIPTS -->
<script type="text/javascript" src="../_scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../_scripts/ajaxfileupload.js"></script>
<script type="text/javascript" src="../_scripts/jquery.jcrop.js"></script>
<script type="text/javascript" src="../_scripts/jquery.maskmoney.js"></script>
<script type="text/javascript" src="../_scripts/jquery.combo.js"></script>
<script type="text/javascript" src="../_scripts/jquery.config-escrita-data.js"></script>
<script type="text/javascript" src="../_scripts/jquery.produtos.js"></script>
<script>
<?php if(!$id_categoria) { ?>
var combo_select = "combo_categorias.php?tipo=categoria";
<?php } else { ?>
var combo_select = "combo_categorias.php?tipo=categoria&id_categoria=<?php echo $id_categoria; ?>";
$(document).ready(function() {
$("#subcategoria").load('combo_categorias.php?tipo=subcategoria&categoria=<?php echo $id_categoria; ?>&id_subcategoria=<?php echo $id_subcategoria; ?>');
});
<?php } ?>
</script>
<!--[if IE 6]>
<script type="text/javascript" src="_scripts/jquery.attention_ie6.js"></script>
<script type="text/javascript" src="_scripts/DD_belatedPNG_0.0.7a.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.png_bg, img, li');
</script>
<![endif]-->
<!-- FIM DOS SCRIPTS -->	
</body>
</html>