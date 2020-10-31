/*
 * Autor: Gilberto Albino
 * Data: 31/03/2009
 * Apaga isto por favor, hehe :D
 */
jQuery(document).ready
(
	function() 
	{
		/*
		 * Chamamos aqui a função que vai controlar os campos.
		 * Desta forma, caso você precise repetir o combo dinâmico
		 * basta trocar os ID's dos SELECT's
		 */
		comboDinamico("categoria", "subcategoria");
	}
);
/*
 * função para carregar uma lista dinâmica
 */
comboDinamico = function(categoria, subcategoria) {
	/*
	 * Variáveis que precisamos pegar
	 * Usamos getElementById() pois é assim que conseguiremos
	 * passar o elemento por variável para jQuery
	 */
	var categoria   = document.getElementById(categoria);
	var subcategoria = document.getElementById(subcategoria);
	/*
	 * Carregamos a lista automaticamente quando a página carrega
	 */
	$(categoria).load(combo_select);
	/*
	 * Populamos o combo dos subcategorias quando trocamos um valor no categoria
	 * Os próximos blocos serão similares quanto à validação pelo valor igual à zero
	 */
	$(categoria).change(
		function() {
			if($(this).val() == 0) {
				alert('Você precisa informar uma categoria!');
				$(this).focus();
			} else {
				$(subcategoria).load('combo_categorias.php?tipo=subcategoria&categoria=' + $(this).val());
			}
		}
	);
}