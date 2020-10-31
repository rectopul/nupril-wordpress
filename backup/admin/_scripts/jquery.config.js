// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX CONFIG DA PÁGINA XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// Inicia as configurações Jquery
$(document).ready(function(){
	
	// Menu Lateral:
		
		$("#menu-lateral li ul").hide(); // Esconde todos os submenus
		$("#menu-lateral li a.ativo").parent().find("ul").slideToggle("slow"); // Abre o item ativo 
		
		$("#menu-lateral li a.item span").click( 
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); 
				$(this).parent().next().slideToggle("normal");
				if($(this).hasClass('mostrar')) {
				$(this).removeClass('mostrar').addClass('esconder');
				$(this).attr("title", "Esconder");
				} else {
				$(this).removeClass('esconder').addClass('mostrar');
				$(this).attr("title", "Expandir");
				}
				return false;
			}			
		);
		
		$("#menu-lateral li a.sem-submenu").click( 
			function () {
				window.location.href=(this.href); 
				return false;
			}
		);

    // Minimizar box de conteúdo
		
		$(".miolo-cabecalho h3").css({ "cursor":"pointer" }); 
		$(".box-fechado .miolo-conteudo").hide(); 
		$(".box-fechado .miolo-tabs").hide(); 
		
		$(".miolo-cabecalho h3").click( 
			function () {	  
			  if ($(this).hasClass('escondido')){
					$(this).removeClass('escondido').addClass('visivel');
					$(this).parent().next().toggle(); 
			  		$(this).parent().parent().toggleClass("box-fechado"); 
			  		$(this).parent().find(".miolo-tabs").toggle();
				} else {
					$(this).removeClass('visivel').addClass('escondido');
					$(this).parent().next().toggle(); 
			 		$(this).parent().parent().toggleClass("box-fechado"); 
			  		$(this).parent().find(".miolo-tabs").toggle();
				} 
			   
			}
		);

    // Conteúdo em abas:
		
		$('.miolo .miolo-conteudo div.conteudo-box').hide();
		$('ul.miolo-tabs li a.tab-ativa').addClass('ativo');
		$('.miolo-conteudo div.tab-ativa').show();
		
		$('.miolo ul.miolo-tabs li a').click( 
			function() { 
				$(this).parent().siblings().find("a").removeClass('ativo');
				$(this).addClass('ativo');
				var ativoTab = $(this).attr('href'); 
				$(ativoTab).siblings().hide();
				$(ativoTab).show();
				return false; 
			}
		);

    // Botão fechar:
		
		$(".fechar").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);

    // Inicia o Facebox:
	
		$('a[rel*=modal]').facebox(); // Applies modal window to any link with attribute rel="modal"

});
    