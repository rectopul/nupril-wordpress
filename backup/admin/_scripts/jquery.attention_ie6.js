/*
 * Attention IE6: Get a better browser!!!
 * Version: 1.0.0 (02/16/2009)
 * Copyright (c) 2009 Adrian Pelletier
 * Feel free to use however you want: http://creativecommons.org/licenses/by/3.0/
*/

$(window).load(function () {
  $("body").prepend('<p id="attention_ie6"><a href="http://www.mozilla.com/firefox/" title="Clique aqui para fazer o download do Firefox agora!">Aviso: Seu navegador est&aacute; desatualizado e poder&aacute; n&atilde;o exibir esta p&aacute;gina corretamente. Clique aqui para baixar o navegador Mozilla Firefox ...</a></p>');
  $("#attention_ie6").css('display','none');
  $("#attention_ie6").slideDown();
});