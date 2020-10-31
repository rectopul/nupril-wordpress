<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "produtos";
		$pag = "subcategorias";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Inclui as ações da página 
		include ("acoes_subcategorias.php");		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Subcategorias</title>
<!-- METAS PARA FERRAMENTAS DE BUSCA -->
<meta name="robots" content="noindex,nofollow">
<!-- FIM DAS METAS PARA FERRAMENTAS DE BUSCA -->
<!-- FOLHAS DE ESTILO -->
<link rel="stylesheet" href="../_css/estilo.css" type="text/css" media="screen" />
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
				Ol&aacute; <a href="../subcategorias/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
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
			<h2>Subcategorias</h2>
            <p id="introducao">Administre aqui as subcategorias de produtos da sua loja virtual</p>
		
			<div class="clear"></div>
			
            <!-- ATALHOS -->
            <ul class="atalhos">
			
                <li><a class="botao-atalho" href="adicionar-subcategoria.php" title="Adicionar Subcategoria"><span>
                <img src="../_imagens/atalhos/ad_subcategoria.png" alt="Adicionar Subcategoria" /><br />
          Adicionar Subcategoria</span></a></li>
                <li><a class="botao-atalho" href="../produtos" title="Voltar para Produtos"><span>
              <img src="../_imagens/atalhos/produto.png" alt="Voltar para Produtos" /><br />
                  Voltar para Produtos</span></a>
                </li>
				<li><a class="botao-atalho" href="../painel/" title="Ir para o Painel"><span>
					<img src="../_imagens/atalhos/inicio.png" alt="Ir para o Painel" /><br />
					Ir para o Painel
				</span></a></li>
				
			</ul>
            <!-- FIM DOS ATALHOS -->
			
	    <div class="clear"></div>
			
            <!-- NOTIFICAÇÕES -->
            <?php include("../notificacoes.php"); ?>
            <!-- FIM DAS NOTIFICAÇÕES  -->
            
            <!-- MIOLO -->
			<div class="miolo" style="position:relative">
            
                       
   	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Subcategorias</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- LISTAGEM -->
 	  				<div class="conteudo-box"> 
						
                        <!-- FILTRAGEM -->
                        <div class="filtragem">
                        <form id="formulario-filtro" class="formulario" action="subcategorias.php<?php echo $link_filtro; ?>" method="post">
                        <input name="p" type="text" class="input-texto input-menor" id="p" title="Palavra-chave:" maxlength="35" <?php if($p) { echo 'value="'.$p.'"';  } ?> />
                        
                        <select name="filtro" >
                          <option value="" <?php if(!$filtro) { echo'selected="selected"'; } ?> >Status ...</option>
                            <option value="ativo" <?php if($filtro == "ativo") { echo'selected="selected"'; } ?> >Ativas</option>
                            <option value="inativo" <?php if($filtro == "inativo") { echo'selected="selected"'; } ?> >Inativas</option>
                        </select>
                        
                        <select name="ordem" >
                        	<option value="padrao" <?php if($ordem == "padrao") { echo'selected="selected"'; } ?> >Ordenar por ...</option>
                            <option value="recentes" <?php if($ordem == "recentes") { echo'selected="selected"'; } ?> >Mais recentes</option>
                            <option value="antigos" <?php if($ordem == "antigos") { echo'selected="selected"'; } ?> >Mais antigos</option>
                            <option value="nome_az" <?php if($ordem == "nome_az") { echo'selected="selected"'; } ?> >Nome - A &raquo; Z</option>
                            <option value="nome_za" <?php if($ordem == "nome_za") { echo'selected="selected"'; } ?> >Nome - Z &raquo; A</option>
                         </select>
                        
                        <select name="num_result" >
                        	<option value="<?php echo $num_result_sistema; ?>" <?php if($num_result == $num_result_sistema) { echo'selected="selected"'; } ?> ><?php if($num_result == $num_result_sistema) { echo'Resultados'; } else { echo $num_result_sistema; } ?></option>
                            <option value="<?php echo $num_result_sistema*2; ?>" <?php if($num_result == $num_result_sistema*2) { echo'selected="selected"'; } ?> ><?php echo $num_result_sistema*2; ?></option>
                            <option value="<?php echo $num_result_sistema*5; ?>" <?php if($num_result == $num_result_sistema*5) { echo'selected="selected"'; } ?> ><?php echo $num_result_sistema*5; ?></option>
                            <option value="<?php echo $num_result_sistema*10; ?>" <?php if($num_result == $num_result_sistema*10) { echo'selected="selected"'; } ?> ><?php echo $num_result_sistema*10; ?></option>
                            <option value="<?php echo $num_result_sistema*20; ?>" <?php if($num_result == $num_result_sistema*20) { echo'selected="selected"'; } ?> ><?php echo $num_result_sistema*20; ?></option>
                            <option value="<?php echo $num_result_sistema*50; ?>" <?php if($num_result == $num_result_sistema*50) { echo'selected="selected"'; } ?> ><?php echo $num_result_sistema*50; ?></option>
                         </select>

                        </select>
                        <input class="botao" type="submit" value="Mostrar">
                        <?php if($filtragem) { ?>
                        <p class="mostrafiltro">
                        <?php if($num_result) { ?>Mostrando: <strong><?php echo $num_result; ?></strong> result. por p&aacute;g.&nbsp;|&nbsp;<?php } ?>
                        <?php if($p) { ?>Palavra-chave: <strong><?php echo $p; ?></strong>&nbsp;|&nbsp;<?php } ?>
                        <?php if($filtro) { ?>Status: <strong><?php echo $filtro_print; ?></strong>&nbsp;|&nbsp;<?php } ?>
                        <?php if($ordem) { ?>Ordenado por: <strong><?php echo $ordem_print; ?></strong><?php } ?>
                        
                        <a class="limpar" href="subcategorias.php<?php echo $link_filtro; ?>" title="Limpar busca">[X] Limpar</a></p>
						<?php } ?>                        
                        </form>
                        </div>
                        <!-- FIM DA FILTRAGEM -->
                        
                        <div class="clear"></div>
                        
                        <!-- TABELA -->
                        <table>
                          <thead>
                              <tr>
                                 <th>Nome</th>
                                 <th>Categoria m&atilde;e</th>
                                 <th>Data da cria&ccedil;&atilde;o</th>
                                 <th>Respons&aacute;vel</th>
                                 <th>Status</th>
                                 <th>A&ccedil;&otilde;es</th>
                              </tr>
                                  
                          </thead>
                          <tfoot>
                            <tr>
                                  <td colspan="6">
                                      <?php if ($paginacao) { ?>
                                      <div class="clear"></div>
                                      <!-- PAGINAÇÃO -->
                                      <div class="paginacao">
                                          <?php if($ini_busca !=0) { ?><a href="subcategorias.php<?php echo $link_paginacao; ?>&ini=<?=$anterior_ini?>" title="P&aacute;gina anterior">&laquo; Anterior</a><? } 
										  // Gera número de páginas
										  for($i = 1; $i<=$num_paginas; $i++) { 
										  $pagina = $i-1;
										  $pagina_contagem = $pagina*$fim_busca;
										  $class_ativa = "";
										  if($pagina_contagem == $ini_busca) { $class_ativa = "ativo"; };
										  ?>
                                          <a href="subcategorias.php<?php echo $link_paginacao; ?>&ini=<?=$pagina_contagem?>" class="numero <?php echo $class_ativa; ?>" title="<?php echo $i; ?>"><?php echo $i; ?></a>
                                          <?php } if($num_resul_total > $proximo_ini) { ?>
                                          <a href="subcategorias.php<?php echo $link_paginacao; ?>&ini=<?=$proximo_ini?>" title="Pr&oacute;xima p&aacute;gina">Pr&oacute;xima &raquo;</a>
                                          <?php } ?>
                                      </div>
                                      <!-- FIM DA PAGINAÇÃO -->
                                      <?php } ?>
                                      <div class="clear"></div>
                                  </td>
                            </tr>
                          </tfoot>
                           
                            <tbody>
                            	<?php if($num_resul_total != 0) {	
								while($dados_subcategoria = mysql_fetch_array($busca_visual)) { 							

								?>
                            	<!-- ITEM -->
                              	<tr>
                                  	<td title="<?php echo $dados_subcategoria['descricao']; ?>"><?php echo Resumo($dados_subcategoria['nome'],30); ?></td>
                                    <td><?php echo Resumo($dados_subcategoria['nome_categoria_mae'],30); ?></td>
                                    <td><?php echo DataSimples($dados_subcategoria['data_cadastro']); ?></a></td>
                                    <td><?php echo Resumo($dados_subcategoria['nome_responsavel'],30); ?></td>
                                    <td><?php echo ucfirst($dados_subcategoria['status']); ?></td>
                                    <td>                                    
                                    <a href="editar-subcategoria.php?id=<?php echo $dados_subcategoria['id']; ?>" title="Editar <?php echo $dados_subcategoria['nome']; ?>"><img src="../_imagens/icones/editar.png" alt="Editar <?php echo Resumo($dados_subcategoria['nome'],30); ?>" /></a>
                                    <a href="status-subcategoria.php?a=box&id=<?php echo $dados_subcategoria['id']; ?>" rel="modal" title="Alterar status da subcategoria <?php echo Resumo($dados_subcategoria['nome'],30); ?>"><img src="../_imagens/icones/alterar-status.png" alt="Remover subcategoria <?php echo Resumo($dados_subcategoria['nome'],30); ?>" /></a>
                                    <a href="remover-subcategoria.php?a=box&id=<?php echo $dados_subcategoria['id']; ?>" rel="modal" title="Remover <?php echo $dados_subcategoria['nome']; ?>"><img src="../_imagens/icones/fechar-grande.png" alt="Remover <?php echo $dados_subcategoria['nome']; ?>" /></a>
                                    </td>
                                </tr>
                                <!-- FIM DO ITEM -->
                                <?php } } else { ?>
                                <tr>
                                    <td colspan="6" class="sem-resultados">
                                    N&atilde;o h&aacute; subcategorias a serem exibidas
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                              
                        </table>
                        <!-- FIM DA TABELA -->
						
					</div>
                    <!-- FIM DA LISTAGEM -->
					
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
<script type="text/javascript" src="../_scripts/jquery.config-leitura.js"></script>
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