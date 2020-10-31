<?php
	// Checa se está no sistema
	if ($token) {
	
	// ---------------------- ERROS  -------------------------------------
	
	// ---- LOGIN E SESSÃO ----
	$msg_erro_1 = "Usu&aacute;rio ou senha inv&aacute;lido(s). Tente novamente <br /> ou clique <a href='esqueci-senha.php?a=box' rel='modal'>aqui</a> caso tenha esquecido sua senha.";
	$msg_erro_2 = "Usu&aacute;rio temporariamente desabilitado.<br />Clique <a href='contato.php?a=box' rel='modal'>aqui</a> para entrar em contato.";
	$msg_erro_3 = "&Aacute;rea de acesso restrito.<br />Por favor, informe seus dados.";
	
	// ---- EVENTOS ----
	$msg_erro_4 = "O evento n&atilde;o p&ocirc;de ser removido. Tente novamente.";
	$msg_erro_5 = "Os eventos selecionados n&atilde;o puderam ser removidos. Tente novamente.";
	$msg_erro_6 = "Os status dos eventos selecionados n&atilde;o puderam ser atualizados. Tente novamente.";
	$msg_erro_7 = "O evento n&atilde;o p&ocirc;de ser inserido. Tente novamente.";
	$msg_erro_8 = "O evento n&atilde;o p&ocirc;de ser editado. Tente novamente.";
	
	// ---- USUÁRIOS ----
	$msg_erro_9 = "O usu&aacute;rio n&atilde;o p&ocirc;de ser removido. Tente novamente.";
	$msg_erro_9_1 = "O grupo de usu&aacute;rio n&atilde;o p&ocirc;de ser removido. Tente novamente.";
	$msg_erro_10 = "Os usu&aacute;rios selecionados n&atilde;o puderam ser removidos. Tente novamente.";
	$msg_erro_11 = "Os usu&aacute;rios selecionados n&atilde;o puderam ser ativados. Tente novamente.";
	$msg_erro_12 = "Os usu&aacute;rios selecionados n&atilde;o puderam ser desativados. Tente novamente.";
	$msg_erro_13 = "O usu&aacute;rio n&atilde;o p&ocirc;de ser inserido. Tente novamente.";
	$msg_erro_13_1 = "O grupo de usu&aacute;rios n&atilde;o p&ocirc;de ser inserido. Tente novamente.";
	$msg_erro_14 = "O usu&aacute;rio n&atilde;o p&ocirc;de ser editado. Tente novamente.";
	$msg_erro_14_1 = "O grupo de usu&aacute;rios n&atilde;o p&ocirc;de ser editado. Tente novamente.";
	$msg_erro_15 = "O e-mail informado j&aacute; pertence &agrave; um usu&aacute;rio registrado. Por favor, informe outro.";
	$msg_erro_15_1 = "O nome informado para o grupo j&aacute; pertence &agrave; outro. Por favor, informe um nome diferente.";
	$msg_erro_16 = "O nome de usu&aacute;rio informado j&aacute; est&aacute; registrado. Por favor, informe outro.";
	$msg_erro_16_1 = "Antes de adicionar um usua&aacute;rio &eacute; necess&aacute;rio criar um grupo. Clique <a href='../usuarios/adicionar-grupo.php'>aqui</a> para criar.";
	
	// ---- PERFIL ----
	$msg_erro_17 = "Seu perfil n&atilde;o p&ocirc;de ser editado. Tente novamente.";
	
	// ---- CONFIGURAÇÕES ----
	$msg_erro_18 = "As configura&ccedil;&otilde;es do sistema n&atilde;o puderam ser alteradas.";
	$msg_erro_19 = "Os dados empresariais n&atilde;o puderam ser alterados.";
	$msg_erro_20 = "Os dados para boletos n&atilde;o puderam ser alterados.";
	$msg_erro_21 = "Os dados para dep&oacute;sitos n&atilde;o puderam ser alterados.";
	$msg_erro_21_1 = "As configura&ccedil;&otilde;es de frete n&atilde;o puderam ser alterados.";
	
	// ---- MENSAGENS ----
	$msg_erro_22 = "A mensagem n&atilde;o p&ocirc;de ser enviada. Tente novamente";
	$msg_erro_23 = "&Eacute; imposs&iacute;vel enviar mensagens pois n&atilde;o h&aacute; outro usu&aacute;rio ativo no sistema.";
	$msg_erro_24 = "A mensagem n&atilde;o p&ocirc;de ser removida. Tente novamente";
	$msg_erro_25 = "As mensagens selecionadas n&atilde;o puderam ser removidas. Tente novamente";
	$msg_erro_26 = "Os status das mensagens selecionadas n&atilde;o puderam ser alterados. Tente novamente";
	
	// ---- CLIENTES ----
	$msg_erro_27 = "O e-mail informado j&aacute; pertence &agrave; um cliente registrado. Por favor, informe outro.";
	$msg_erro_28 = "Este nome de usu&aacute;rio j&aacute; est&aacute; registrado para outro cliente. Por favor, informe outro.";
	$msg_erro_29 = "O cliente n&atilde;o p&ocirc;de ser inserido. Tente novamente.";
	$msg_erro_30 = "O cliente n&atilde;o p&ocirc;de ser editado. Tente novamente.";
	$msg_erro_31 = "O cliente n&atilde;o p&ocirc;de ser removido. Tente novamente.";
	$msg_erro_32 = "Os clientes selecionados n&atilde;o puderam ser removidos. Tente novamente.";
	
	// ---- FINANCEIRO ----
	$msg_erro_33 = "A conta n&atilde;o p&ocirc;de ser inserida. Tente novamente.";
	$msg_erro_34 = "Por favor, informa o nome do cliente.";
	
	// ---- PRODUTOS ----
	$msg_erro_50 = "O produto n&atilde;o p&ocirc;de ser inserido. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_51 = "O produto n&atilde;o p&ocirc;de ser editado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_52 = "Este nome de produto est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_53 = "Antes de inserir um produto &eacute; necess&aacute;rio cadastrar uma Marca.";
	$msg_erro_54 = "Antes de inserir um produto &eacute; necess&aacute;rio cadastrar uma Categoria.";
	$msg_erro_55 = "O produto n&atilde;o p&ocirc;de ser removido. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_56 = "Os produtos selecionados n&atilde;o puderam ser removidos. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_57 = "O status do(s) produto(s) n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
			
	// ---- BANNERS ----
	$msg_erro_150 = "O banner n&atilde;o p&ocirc;de ser inserido. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_151 = "O banner n&atilde;o p&ocirc;de ser editado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_152 = "Este nome de banner est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_153 = "Antes de inserir um banner &eacute; necess&aacute;rio cadastrar uma Marca.";
	$msg_erro_154 = "Antes de inserir um banner &eacute; necess&aacute;rio cadastrar uma Categoria.";
	$msg_erro_155 = "O banner n&atilde;o p&ocirc;de ser removido. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_156 = "Os banners selecionados n&atilde;o puderam ser removidos. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_157 = "O status do(s) banner(s) n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- MARCAS ----
	$msg_erro_60 = "A marca n&atilde;o p&ocirc;de ser inserida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_61 = "A marca n&atilde;o p&ocirc;de ser editada. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_62 = "Este nome de marca est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_63 = "A marca n&atilde;o p&ocirc;de ser removida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_64 = "N&atilde; foi poss&iacute;vel realizar a remo&ccedil;&atilde;o. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_65 = "O status da marca n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- CATEGORIAS ----
	$msg_erro_66 = "A categoria n&atilde;o p&ocirc;de ser inserida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_67 = "A categoria n&atilde;o p&ocirc;de ser editada. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_68 = "Este nome de categoria est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_69 = "A categoria n&atilde;o p&ocirc;de ser removida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_70 = "N&atilde; foi poss&iacute;vel realizar a remo&ccedil;&atilde;o. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_71 = "O status da categoria n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- SUBCATEGORIAS ----
	$msg_erro_72 = "A subcategoria n&atilde;o p&ocirc;de ser inserida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_73 = "A subcategoria n&atilde;o p&ocirc;de ser editada. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_74 = "Antes de inserir uma Subcategoria &eacute; necess&aacute;rio cadastrar uma Categoria.";
	$msg_erro_75 = "A subcategoria n&atilde;o p&ocirc;de ser removida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_76 = "N&atilde; foi poss&iacute;vel realizar a remo&ccedil;&atilde;o. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_77 = "O status da subcategoria n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- REGIÕES ----
	$msg_erro_72_1 = "A regi&atilde;o n&atilde;o p&ocirc;de ser inserida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_73_1 = "A regi&atilde;o n&atilde;o p&ocirc;de ser editada. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_74_1 = "Este nome de regi&atilde;o est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_75_1 = "A regi&atilde;o n&atilde;o p&ocirc;de ser removida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_76_1 = "N&atilde; foi poss&iacute;vel realizar a remo&ccedil;&atilde;o. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_77_1 = "O status da regi&atilde;o n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- PEDIDOS ----
	$msg_erro_80 = "O pedido n&atilde;o p&ocirc;de ser editado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_81 = "O pedido n&atilde;o p&ocirc;de ser cancelado. Tente novamente ou entre em contato com o administrador..";
	$msg_erro_82 = "O status do pedido n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_83 = "Os status dos pedidos selecionados n&atilde;o puderam ser alterados. Tente novamente ou entre em contato com o administrador.";
	
	// ---- PÁGINAS ----
	$msg_erro_85 = "A dica n&atilde;o p&ocirc;de ser inserida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_86 = "A dica n&atilde;o p&ocirc;de ser editada. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_87 = "Este nome de dica est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_88 = "A dica n&atilde;o p&ocirc;de ser removida. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_88_1 = "As dicas n&atilde;o puderam ser removidas. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_89 = "O status da(s) dica(s) n&atilde;o p&ocirc;de ser alterado. Tente novamente ou entre em contato com o administrador.";
	
	// ---- CUPONS ----
	$msg_erro_90 = "O cupom n&atilde;o p&ocirc;de ser criado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_91 = "O cupom n&atilde;o p&ocirc;de ser editado. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_92 = "Este c&oacute;digo est&aacute; sendo usado. Por favor tente outro.";
	$msg_erro_93 = "H&aacute; um cupom v&aacute;lido para o mesmo produto no per&iacute;odo escolhido. Por favor escolha outro per&iacute;odo.";
	$msg_erro_94 = "H&aacute; um cupom v&aacute;lido para a mesma categoria no per&iacute;odo escolhido. Por favor escolha outro per&iacute;odo.";
	$msg_erro_95 = "H&aacute; um cupom v&aacute;lido para todo o site no per&iacute;odo escolhido. Por favor escolha outro per&iacute;odo.";
	$msg_erro_96 = "O cupom n&atilde;o p&ocirc;de ser removido. Tente novamente ou entre em contato com o administrador.";
	$msg_erro_97 = "Os cupons n&atilde;o puderam ser removidos. Tente novamente ou entre em contato com o administrador.";
	
	// ---------------------- FIM DOS ERROS  -------------------------------
	
	
	// ---------------------- SUCESSOS  ------------------------------------
	
	// ---- EVENTOS ----
	$msg_sucesso_1 = "O evento foi removido com sucesso.";
	$msg_sucesso_2 = "Os eventos selecionados foram removidos com sucesso.";
	$msg_sucesso_3 = "Os status dos eventos selecionados foram atualizados com sucesso.";
	$msg_sucesso_4 = "O evento foi inserido com sucesso.";
	$msg_sucesso_5 = "O evento foi editado com sucesso.";
	
	// ---- USUÁRIOS ----
	$msg_sucesso_6 = "O usu&aacute;rio foi removido com sucesso.";
	$msg_sucesso_6_1 = "O grupo de usu&aacute;rios foi removido com sucesso.";
	$msg_sucesso_7 = "Os usu&aacute;rios selecionados foram removidos com sucesso.";
	$msg_sucesso_8 = "Os usu&aacute;rios selecionados foram ativados com sucesso.";
	$msg_sucesso_9 = "Os usu&aacute;rios selecionados foram desativados com sucesso.";
	$msg_sucesso_10 = "O usu&aacute;rio foi inserido com sucesso.";
	$msg_sucesso_10_1 = "O grupo de usu&aacute;rios foi inserido com sucesso.";
	$msg_sucesso_11 = "O usu&aacute;rio foi editado com sucesso.";
	$msg_sucesso_11_1 = "O grupo de usu&aacute;rios foi editado com sucesso.<br />Caso tenha alterado as permiss&otilde;es de acesso, note que elas ser&atilde;o v&aacute;lidas apenas a partir do pr&oacute;ximo login de cada usu&aacute;rio.";
	
	// ---- PERFIL ----
	$msg_sucesso_12 = "Seu perfil foi editado com sucesso.";
	
	// ---- CONFIURAÇÕES ----
	$msg_sucesso_13 = "As configura&ccedil;&otilde;es do sistema foram alteradas com sucesso.";
	$msg_sucesso_14 = "Os dados empresariais foram alterados com sucesso.";
	$msg_sucesso_15 = "Os dados para boletos foram alterados com sucesso.";
	$msg_sucesso_16 = "Os dados para dep&oacute;sitos foram alterados com sucesso.";
	$msg_sucesso_16_1 = "As configura&ccedil;&otilde;es de frete foram alterados com sucesso.";
	
	// ---- MENSAGENS ----
	$msg_sucesso_17 = "A mensagem foi enviada com sucesso.";
	$msg_sucesso_18 = "A mensagem foi removida com sucesso.";
	$msg_sucesso_19 = "As mensagens selecionadas foram removidas com sucesso.";
	$msg_sucesso_20 = "Os status das mensagens selecionadas foram alterados com sucesso.";
	
	// ---- CLIENTES ----
	$msg_sucesso_21 = "O cliente foi inserido com sucesso.";
	$msg_sucesso_22 = "O cliente foi editado com sucesso.";
	$msg_sucesso_23 = "O cliente foi removido com sucesso.";
	$msg_sucesso_24 = "Os clientes selecionados foram removidos com sucesso.";
	
	// ---- FINANCEIRO ----
	$msg_sucesso_25 = "A conta foi inserida com sucesso.";
	
	// ---- PRODUTOS ----
	$msg_sucesso_50 = "O produto foi inserido com sucesso.";
	$msg_sucesso_51 = "O produto foi editado com sucesso.";
	$msg_sucesso_52 = "O produto foi removido com sucesso.";
	$msg_sucesso_55 = "O produto foi removido com sucesso.";
	$msg_sucesso_56 = "Os produtos selecionados foram removidos com sucesso.";
	$msg_sucesso_57 = "O status do(s) produto(s) foi alterado com sucesso.";
		
	// ---- PRODUTOS ----
	$msg_sucesso_150 = "O banner foi inserido com sucesso.";
	$msg_sucesso_151 = "O banner foi editado com sucesso.";
	$msg_sucesso_152 = "O banner foi removido com sucesso.";
	$msg_sucesso_155 = "O banner foi removido com sucesso.";
	$msg_sucesso_156 = "Os banners selecionados foram removidos com sucesso.";
	$msg_sucesso_157 = "O status do(s) banner(s) foi alterado com sucesso.";
	
	// ---- MARCAS ----
	$msg_sucesso_60 = "A marca foi inserida com sucesso.";
	$msg_sucesso_61 = "A marca foi editada com sucesso.";
	$msg_sucesso_63 = "A marca foi removida com sucesso.";
	$msg_sucesso_64 = "A transfer&ecirc;ncia dos produtos e remo&ccedil;&atilde;o da marca foram realizados com sucesso.";
	$msg_sucesso_65 = "O status da marca foi alterado com sucesso.";
	
	// ---- CATEGORIAS ----
	$msg_sucesso_66 = "A categoria foi inserida com sucesso.";
	$msg_sucesso_67 = "A categoria foi editada com sucesso.";
	$msg_sucesso_69 = "A categoria foi removida com sucesso.";
	$msg_sucesso_70 = "A transfer&ecirc;ncia dos produtos e remo&ccedil;&atilde;o da categoria foram realizados com sucesso.";
	$msg_sucesso_71 = "O status da categoria foi alterado com sucesso.";
	
	// ---- SUBCATEGORIAS ----
	$msg_sucesso_72 = "A subcategoria foi inserida com sucesso.";
	$msg_sucesso_73 = "A subcategoria foi editada com sucesso.";
	$msg_sucesso_75 = "A subcategoria foi removida com sucesso.";
	$msg_sucesso_76 = "A transfer&ecirc;ncia dos produtos e remo&ccedil;&atilde;o da subcategoria foram realizados com sucesso.";
	$msg_sucesso_77 = "O status da subcategoria foi alterado com sucesso.";
	
	// ---- SUBCATEGORIAS ----
	$msg_sucesso_72_1 = "A regi&atilde;o foi inserida com sucesso.";
	$msg_sucesso_73_1 = "A regi&atilde;o foi editada com sucesso.";
	$msg_sucesso_75_1 = "A regi&atilde;o foi removida com sucesso.";
	$msg_sucesso_76_1 = "A transfer&ecirc;ncia dos produtos e remo&ccedil;&atilde;o da regi&atilde;o foram realizados com sucesso.";
	$msg_sucesso_77_1 = "O status da regi&atilde;o foi alterado com sucesso.";
	
	// ---- PEDIDOS ----
	$msg_sucesso_80 = "O pedido foi editado com sucesso.";
	$msg_sucesso_81 = "O pedido foi cancelado com sucesso.";
	$msg_sucesso_82 = "O status do pedido foi alterado com sucesso.";
	$msg_sucesso_83 = "Os status dos pedidos selecionados foram alterados com sucesso.";
	
	// ---- PÁGINAS ----
	$msg_sucesso_85 = "A dica foi inserida com sucesso.";
	$msg_sucesso_86 = "A dica foi editada com sucesso.";
	$msg_sucesso_88 = "A dica foi removida com sucesso.";
	$msg_sucesso_88_1 = "As dicas foram removidas com sucesso.";
	$msg_sucesso_89 = "O status da(s) dica(s) foi alterado com sucesso.";
	
	// ---- CUPONS ----
	$msg_sucesso_90 = "O cupom foi criado com sucesso.";
	$msg_sucesso_91 = "O cupom foi editado com sucesso.";
	$msg_sucesso_96 = "O cupom foi removido com sucesso.";
	$msg_sucesso_97 = "Os cupons foram removidos com sucesso.";
	
	
	// ---------------------- FIM DOS SUCESSO  -----------------------------
	
	// ---------------------- ATENÇÕES  ------------------------------------

	// ---- USUÁRIOS ----
	$msg_atencao_1 = "Voc&ecirc; foi desconectado do sistema, pois seu usu&aacute;rio foi removido.";
	$msg_atencao_2 = "A &aacute;rea que tentou acessar n&atilde;o &eacute; permitida ao seu grupo de usu&aacute;rios.";
	
	// ---- EVENTOS ----
	$msg_atencao_3 = "O evento que tentou editar n&atilde; est&aacute; vinculado ao seu usu&aacute;rio.";
	
	// ---- MENSAGENS ----
	$msg_atencao_4 = "A mensagem que tentou responder n&atilde; est&aacute; vinculado ao seu usu&aacute;rio.";
	
	// ---------------------- FIM DAS ATENÇÕES -----------------------------

	} // Fim da checagem se está conectado
	
?>