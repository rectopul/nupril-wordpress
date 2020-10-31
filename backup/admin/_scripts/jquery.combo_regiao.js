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
		comboDinamicoReg("pais", "regiao");
	}
);
/*
 * função para carregar uma lista dinâmica
 */
comboDinamicoReg = function(pais, regiao) {
	/*
	 * Variáveis que precisamos pegar
	 * Usamos getElementById() pois é assim que conseguiremos
	 * passar o elemento por variável para jQuery
	 */
	var pais   = document.getElementById(pais);
	var regiao = document.getElementById(regiao);
	/*
	 * Carregamos a lista automaticamente quando a página carrega
	 */
	$(pais).load(combo_pais);
	/*
	 * Populamos o combo dos regiaos quando trocamos um valor no pais
	 * Os próximos blocos serão similares quanto à validação pelo valor igual à zero
	 */
	$(pais).change(
		function() {
			if($(this).val() == 0) {
				alert('Você precisa informar uma país!');
				$(this).focus();
			} else {
				$(regiao).load('combo_regioes.php?tipo=regiao&pais=' + $(this).val());
			}
		}
	);
}