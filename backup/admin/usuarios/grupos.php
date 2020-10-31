<?php 
		// Configurações
		include("../_inc/config.php");
		
		// Define a página
		$pag_mae = "usuarios";
		$pag = "grupos-de-usuarios";
		
		// Checa a sessão 
		include ("../_inc/sessao.php");
		
		// Inclui as ações da página 
		include ("acoes_grupos.php");		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo_sistema; ?> :: Grupos de Usu&aacute;rios</title>
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
				Ol&aacute; <a href="../usuarios/editar-perfil.php" title="Editar seu perfil"><?php echo $_SESSION['NUPILL_NOME']; ?></a>
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
			<h2>Grupos de Usu&aacute;rios</h2>
            <p id="introducao">Determine os grupos de usu&aacute;rios e seus limites de acesso.</p>
		
			<div class="clear"></div>
			
            <!-- ATALHOS -->
            <ul class="atalhos">
			
				<li><a class="botao-atalho" href="adicionar-grupo.php" title="Adicionar grupo de usu&aacute;rios"><span>
					<img src="../_imagens/atalhos/ad_grupo.png" alt="Adicionar grupo de usu&aacute;rios" /><br />
				    Adicionar Grupo
			  </span></a></li>
                <li><a class="botao-atalho" href="index.php" title="Usu&aacute;rios"><span>
					<img src="../_imagens/atalhos/usuario.png" alt="Usu&aacute;rios" /><br />
					Usu&aacute;rios
				</span></a></li>
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
            
            <!-- ÚLTIMOS EVENTOS -->
			<div class="miolo" style="position:relative">
            
                       
   	      		<!-- CABEÇALHO -->
				<div class="miolo-cabecalho">
					<h3 class="tit-longo visivel">Grupos de Usu&aacute;rios</h3>
                </div>
				<!-- FIM DO CABEÇALHO -->             
                
   	      		<!-- CONTEÚDO DO MIOLO --> 
				<div class="miolo-conteudo">
					
                    <!-- LISTAGEM -->
 	  				<div class="conteudo-box"> 

                        <!-- TABELA -->
                        <table>
                          <thead>
                              <tr>
                                  <th>Nome</th>
                                 <th width="60">A&ccedil;&otilde;es</th>
                              </tr>
                                  
                          </thead>
                          <tfoot>
                            <tr>
                                  <td colspan="2"><?php if ($paginacao) { ?>
                                    <!-- PAGINAÇÃO -->
                                      <div class="paginacao">
                                          <?php if($ini_busca !=0) { ?><a href="index.php<?php echo $link_paginacao; ?>&ini=<?=$anterior_ini?>" title="P&aacute;gina anterior">&laquo; Anterior</a><? } 
										  // Gera número de páginas
										  for($i = 1; $i<=$num_paginas; $i++) { 
										  $pagina = $i-1;
										  $pagina_contagem = $pagina*$fim_busca;
										  $class_ativa = "";
										  if($pagina_contagem == $ini_busca) { $class_ativa = "ativo"; };
										  ?>
                                          <a href="grupos.php<?php echo $link_paginacao; ?>&ini=<?=$pagina_contagem?>" class="numero <?php echo $class_ativa; ?>" title="<?php echo $i; ?>"><?php echo $i; ?></a>
                                          <?php } if($num_resul_total > $proximo_ini) { ?>
                                          <a href="grupos.php<?php echo $link_paginacao; ?>&ini=<?=$proximo_ini?>" title="Pr&oacute;xima p&aacute;gina">Pr&oacute;xima &raquo;</a>
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
								while($dados_grupo = mysql_fetch_array($busca_visual)) { 
								
								?>
                            	<!-- ITEM -->
                              	<tr>
                                  <td><?php echo Resumo($dados_grupo['nome'],30); ?></td>
                                    <td>
                                    <a href="editar-grupo.php?id=<?php echo $dados_grupo['id']; ?>" title="Editar <?php echo $dados_grupo['nome']; ?>"><img src="../_imagens/icones/editar.png" alt="Editar <?php echo $dados_grupo['nome']; ?>" /></a>
                                    <a href="grupos.php<?php echo $link; if($ini_busca != 0) { echo '&ini='.$ini_busca; } ?>&acao=remover-grupo&id=<?php echo $dados_grupo['id']; ?>" title="Remover <?php echo $dados_grupo['nome']; ?>" onClick="return window.confirm('Você tem certeza que deseja remover o grupo de usuário <?php echo $dados_grupo['nome']; ?> ?\nCaso este grupo tenha usuários ativos, transfira-os de grupo antes de excluir.');"><img src="../_imagens/icones/fechar-grande.png" alt="Remover <?php echo $dados_grupo['nome']; ?>" /></a>
                                    </td>
                                </tr>
                                <!-- FIM DO ITEM -->
                                <?php } } else { ?>
                                <tr>
                                    <td colspan="2" class="sem-resultados">
                                    N&atilde;o h&aacute; grupos de usu&aacute;rios a serem exibidos
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                              
                        </table>
                        <!-- FIM DA TABELA -->
                      </form>
						
					</div>
                    <!-- FIM DA LISTAGEM -->
					
				</div> 
                <!-- FIM DO CONTEÚDO DO MIOLO -->
				
			</div>
            <!-- FIM DOS ÚLTIMOS EVENTOS -->            
            
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