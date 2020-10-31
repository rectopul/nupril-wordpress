<?php 
	// Checa se está conectado
	if ($conectado) 	{
?>
			<ul id="menu-lateral">  
				<li><a href="../painel" class="item sem-submenu <?php if($pag_mae == "painel") { echo "ativo"; } ?>" title="Painel">Painel</a>       
				</li>
                <?php if($menu_banners == "1") { ?>
                <li>
					<a href="../banners" class="item <?php if($pag_mae == "banners") { echo "ativo"; } ?>" title="Banners">Banners<?php if($pag_mae == "banners") { ?><span class="esconder" title="Esconder">&nbsp;</span><?php } else { ?><span class="mostrar" title="Expandir">&nbsp;</span><?php } ?></a>
					<ul>
                        <li><a <?php if($pag == "adicionar-banner") { echo 'class="ativo"'; } ?> href="../banners/adicionar.php" title="Adicionar novo banner">Adicionar banner</a></li>
					</ul>
				</li>
                <?php } if($menu_produtos == "1") { ?>
                <li>
					<a href="../produtos" class="item <?php if($pag_mae == "produtos") { echo "ativo"; } ?>" title="Produtos">Produtos<?php if($pag_mae == "produtos") { ?><span class="esconder" title="Esconder">&nbsp;</span><?php } else { ?><span class="mostrar" title="Expandir">&nbsp;</span><?php } ?></a>
					<ul>
                        <li><a <?php if($pag == "categorias") { echo 'class="ativo"'; } ?> href="../produtos/categorias.php" title="Categorias">Categorias</a></li>
                        <li><a <?php if($pag == "subcategorias") { echo 'class="ativo"'; } ?> href="../produtos/subcategorias.php" title="Subcategorias">Subcategorias</a></li>
                        <li><a <?php if($pag == "adicionar-produto") { echo 'class="ativo"'; } ?> href="../produtos/adicionar.php" title="Adicionar novo produto">Adicionar produto</a></li>
					</ul>
				</li>
                 <?php } if($menu_dicas == "1") { ?>
                <li>
					<a href="../dicas" class="item <?php if($pag_mae == "dicas") { echo "ativo"; } ?>" title="Dicas">Dicas<?php if($pag_mae == "dicas") { ?><span class="esconder" title="Esconder">&nbsp;</span><?php } else { ?><span class="mostrar" title="Expandir">&nbsp;</span><?php } ?></a>
					<ul>
                        <li><a <?php if($pag == "adicionar-dica") { echo 'class="ativo"'; } ?> href="../dicas/adicionar.php" title="Adicionar nova dica">Adicionar dica</a></li>
					</ul>
				</li>
                <?php } if($menu_usuarios == "1") { ?>
                <li>
					<a href="../usuarios" class="item <?php if($pag_mae == "usuarios") { echo "ativo"; } ?>" title="Usu&aacute;rios">Usu&aacute;rios<?php if($pag_mae == "usuarios") { ?><span class="esconder" title="Esconder">&nbsp;</span><?php } else { ?><span class="mostrar" title="Expandir">&nbsp;</span><?php } ?></a>
					<ul>
						<li><a <?php if($pag == "adicionar-usuario") { echo 'class="ativo"'; } ?> href="../usuarios/adicionar.php" title="Adicionar novo usu&aacute;rio">Adicionar usu&aacute;rio</a></li>
                        <li><a <?php if($pag == "grupos-de-usuarios") { echo 'class="ativo"'; } ?> href="../usuarios/grupos.php" title="Grupos de Usu&aacute;rios">Grupos de Usu&aacute;rios</a></li>
				  </ul>
			  	</li>
                <?php } if($menu_configuracoes == "1") { ?>
          		<li>
					<a href="../configuracoes" class="item <?php if($pag_mae == "configuracoes") { echo "ativo"; } ?>" title="Configura&ccedil;&otilde;es">Configura&ccedil;&otilde;es<?php if($pag_mae == "configuracoes") { ?><span class="esconder" title="Esconder">&nbsp;</span><?php } else { ?><span class="mostrar" title="Expandir">&nbsp;</span><?php } ?></a>
                    <ul>
                    	<li><a <?php if($pag == "config-empresa") { echo 'class="ativo"'; } ?> href="../configuracoes/empresa.php" title="Dados empresariais">Dados empresariais</a></li>
					</ul>
				</li>
                <?php } ?>
                <li>
					<a href="../logout.php" class="item sem-submenu" title="Sair">Sair</a>
				</li>      
			</ul> 
<?php } // Fim da checagem se está conectado
	  else { die("Erro de acesso"); }
?>
