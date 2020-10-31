// ########################################### SCRIPTS DE A«√O

	/**
	* Array de objectos de qual caracter deve substituir seu par com acentos
	*/
	var specialChars = [
	{val:"a",let:"·‡„‚‰"},
	{val:"e",let:"ÈËÍÎ"},
	{val:"i",let:"ÌÏÓÔ"},
	{val:"o",let:"ÛÚıÙˆ"},
	{val:"u",let:"˙˘˚¸"},
	{val:"c",let:"Á"},
	{val:"a",let:"¡¿√¬ƒ"},
	{val:"w",let:"…» À"},
	{val:"i",let:"ÕÃŒœ"},
	{val:"o",let:"”“’‘÷"},
	{val:"u",let:"⁄Ÿ€‹"},
	{val:"c",let:"«"},
	{val:"",let:"?!()"}
	];
	
	/**
	* FunÁ„o para substituir caractesres especiais.
	* @param {str} string
	* @return String
	*/
	function replaceSpecialChars(str) {
	var $spaceSymbol = '-';
	var regex;
	var returnString = str;
	for (var i = 0; i < specialChars.length; i++) {
		regex = new RegExp("["+specialChars[i].let+"]", "g");
		returnString = returnString.replace(regex, specialChars[i].val);
		regex = null;
	}
	return returnString.replace(/\s/g,$spaceSymbol);
	};


$(document).ready(function() {
	
	$("#enviarform").click(function(){
	$("#formulario-interno").valid();
	$("#formulario-interno").submit();
	});
	
	// M·scara para reais
	$("input.reais").maskMoney({symbol:"R$",decimal:",",thousands:"."})
	
	// Mostra segunda linha de imagens 
	$("input#mostrar_segunda_linha").click(function() {
		$(".segunda_linha").fadeIn();
		$(this).fadeOut();	
	});
	
	// Mostra terceira linha de imagens 
	$("input#mostrar_terceira_linha").click(function() {
		$(".terceira_linha").fadeIn();
		$(this).fadeOut();	
	});
	
	// Mostra quarta linha de imagens 
	$("input#mostrar_quarta_linha").click(function() {
		$(".quarta_linha").fadeIn();
		$(this).fadeOut();	
	});
	
	// Monta o slug e checa o nome de usu·rio
	$("input#nome").blur(function() {
			
			$("small#status_apelido").show();
			$("small#status_apelido").html('<span class="small_loading">Checando viabilidade...</span>');			
			// Monta a slug
			var slugcontent = $(this).val();
			var slugcontent_hyphens = replaceSpecialChars(slugcontent);
			var finishedslug = slugcontent_hyphens.replace(/[^a-zA-Z0-9\-]/g,'-');
			var slug = finishedslug.toLowerCase();	
			var ident = $("#ident").val();	
			
			$.ajax({
			type: "POST",
			url: "checagem_apelido.php",
			data: "apelido="+slug+"&id="+ident,
			success: function(msg){
			
			$("small#status_apelido").ajaxComplete(function(event, request, settings){
			if(msg == 'OK'){
				$(this).html('<span class="verde">Este nome est&aacute; liberado para uso.</span>');
				// Atualiza o slug nas imagens
				//$("input.apelido").val(slug);
			} else {
				$(this).html('<span class="vermelho">O nome <b>'+ slugcontent +'</b> j&aacute; est&aacute; sendo usado, tente outro.</span>');
				// Atualiza o slug alternativo nas imagens
				//$("input.apelido").val(msg);
			}

			});}});});	
			
	});


// ################################################ Vari·veis globais ############################################# 

// Define se o tamanho da imagem È fixo e qual a dimens„o
var fixed = 1;
var size = 800;
var existevalor = '';

var definidor = $("small#status_apelido").html();
// Se n„o È retorno ele gera slug
if(definidor != 'retorno'){
var conteudocampo = $("input#nome").val()
// Se existe valor ele gera slug
if(existevalor != ''){
// Monta a slug inicial
$("small#status_apelido").show();
$("small#status_apelido").html('<span class="small_loading">Checando viabilidade...</span>');			
// Monta a slug
var slugcontent = conteudocampo;
var slugcontent_hyphens = replaceSpecialChars(slugcontent);
var finishedslug = slugcontent_hyphens.replace(/[^a-zA-Z0-9\-]/g,'-');
var slug = finishedslug.toLowerCase();		

$.ajax({
type: "POST",
url: "checagem_apelido.php",
data: "apelido="+ slug,
success: function(msg){

$("small#status_apelido").ajaxComplete(function(event, request, settings){
if(msg == 'OK'){
	$(this).html('<span class="verde">Este nome est&aacute; liberado para uso.</span>');
	// Atualiza o slug nas imagens
	//$("input.apelido").val(slug);
} else {
	$(this).html('<span class="vermelho">O nome <b>'+ slugcontent +'</b> j&aacute; est&aacute; sendo usado, tente outro.</span>');
	// Atualiza o slug alternativo nas imagens
	//$("input.apelido").val(msg);
}

});}});}}
		  else {
		  var slug = $("input.apelido").val();
		  }

// ################################################ IMAGEM 1 ############################################# 

function ajaxFileUpload1()
	{
		$("#item_semimg1").hide();
		$("#loading_img1").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=1',
				secureuri:false,
				fileElementId:'file1',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname1").val(data.msg);
							$("#loading_img1").hide();
							$("#image1").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop1"})).fadeIn(); 
							jCrop1('#jcrop1');
							$("#upload1").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords1(c)
	{
					$('#x1').val(c.x);
					$('#y1').val(c.y);
					$('#w1').val(c.w);
					$('#h1').val(c.h);

	}
	
	function jCrop1(f) {
			$(f).Jcrop({
				onChange: updateCoords1,
				onSelect: updateCoords1,
				setSelect:   [ 0, 0, 2000, 2000 ],
				boxWidth: 350 //maximum width of image
			});
	}

	function crop1() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x1').val(),y: $('#y1').val(),w: $('#w1').val(),h: $('#h1').val(),fname:$('#fname1').val(),ident:$('#ident1').val(),apelido:$('#apelido1').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview1").css({overflow:"auto"});
				   $("#crop_preview1").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido1').val() + '_' + $('#ident1').val() +'.jpg',
																				 title: 'Imagem 1',
																				 alt: 'Imagem 1'})).fadeIn();
				   $("#image1").fadeOut();
                   $("#crop_preview1").after('<input type="button" class="botao remover_img" id="remover1" value="Alterar/Remover" onClick="limpa1();" />').fadeIn();
                   $("#imagem_nome_1").val($('#apelido1').val() + '_' + $('#ident1').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview1").css({overflow:"auto"});
				   $("#crop_preview1").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido1').val() + '_' + $('#ident1').val() +'.png',
																				 title: 'Imagem 1',
																				 alt: 'Imagem 1'})).fadeIn();
				   $("#image1").fadeOut();
                   $("#crop_preview1").after('<input type="button" class="botao remover_img" id="remover1" value="Alterar/Remover" onClick="limpa1();" />').fadeIn();
                   $("#imagem_nome_1").val($('#apelido1').val() + '_' + $('#ident1').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }


			   }
			 });
	}
	
	function limpa1()
	{
		$('#div_imagem_1').html('<h4 class="titulo_imagem">Imagem 1</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg1" /><img src="../_imagens/jquery/loading.gif" id="loading_img1" style="display:none;"/><div id="crop_preview1" class="crop_preview"></div><div id="upload1" class="upload"><form id="form1" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido1" name="apelido1" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident1" name="ident1" value="1"  /><input type="file" name="file1" id="file1" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload1();" /></form></div><div id="image1" style="display:none" class="image"><form action="" method="post" id="crop_details1" class="crop_details"><input type="hidden" id="x1" name="x1" /><input type="hidden" id="y1" name="y1" /><input type="hidden" id="w1" name="w1" /><input type="hidden" id="h1" name="h1" /><input type="hidden" id="apelido1" name="apelido1" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident1" name="ident1" value="1" /><input type="hidden" id="fname1" name="fname1"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop1();" /></form></div><input type="hidden" class="required" name="imagem_nome_1" id="imagem_nome_1" value="" />');
		$("input#imagem_nome_1").val("");
	}
	
// ################################################ IMAGEM 2 ############################################# 

function ajaxFileUpload2()
	{
		$("#item_semimg2").hide();
		$("#loading_img2").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=2',
				secureuri:false,
				fileElementId:'file2',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname2").val(data.msg);
							$("#loading_img2").hide();
							$("#image2").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop2"})).fadeIn(); 
							jCrop2('#jcrop2');
							$("#upload2").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords2(c)
	{
					$('#x2').val(c.x);
					$('#y2').val(c.y);
					$('#w2').val(c.w);
					$('#h2').val(c.h);

	}
	
	function jCrop2(f) {
			$(f).Jcrop({
				onChange: updateCoords2,
				onSelect: updateCoords2,
				setSelect:   [ 0, 0, 2000, 2000 ],
				boxWidth: 350 //maximum width of image
			});
	}

	function crop2() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x2').val(),y: $('#y2').val(),w: $('#w2').val(),h: $('#h2').val(),fname:$('#fname2').val(),ident:$('#ident2').val(),apelido:$('#apelido2').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview2").css({overflow:"auto"});
				   $("#crop_preview2").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido2').val() + '_' + $('#ident2').val() +'.jpg',
																				 title: 'Imagem 2',
																				 alt: 'Imagem 2'})).fadeIn();
				   $("#image2").fadeOut();
                   $("#crop_preview2").after('<input type="button" class="botao remover_img" id="remover2" value="Alterar/Remover" onClick="limpa2();" />').fadeIn();
                   $("#imagem_nome_2").val($('#apelido2').val() + '_' + $('#ident2').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview2").css({overflow:"auto"});
				   $("#crop_preview2").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido2').val() + '_' + $('#ident2').val() +'.png',
																				 title: 'Imagem 2',
																				 alt: 'Imagem 2'})).fadeIn();
				   $("#image2").fadeOut();
                   $("#crop_preview2").after('<input type="button" class="botao remover_img" id="remover2" value="Alterar/Remover" onClick="limpa2();" />').fadeIn();
                   $("#imagem_nome_2").val($('#apelido2').val() + '_' + $('#ident2').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa2()
	{
		$('#div_imagem_2').html('<h4 class="titulo_imagem">Imagem 2</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg2" /><img src="../_imagens/jquery/loading.gif" id="loading_img2" style="display:none;"/><div id="crop_preview2" class="crop_preview"></div><div id="upload2" class="upload"><form id="form2" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido2" name="apelido2" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident2" name="ident2" value="2"  /><input type="file" name="file2" id="file2" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload2();" /></form></div><div id="image2" style="display:none" class="image"><form action="" method="post" id="crop_details2" class="crop_details"><input type="hidden" id="x2" name="x2" /><input type="hidden" id="y2" name="y2" /><input type="hidden" id="w2" name="w2" /><input type="hidden" id="h2" name="h2" /><input type="hidden" id="apelido2" name="apelido2" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident2" name="ident2" value="2" /><input type="hidden" id="fname2" name="fname2"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop2();" /></form></div><input type="hidden" name="imagem_nome_2" id="imagem_nome_2" value="" />');
		$("input#imagem_nome_2").val("");
	}
	
// ################################################ IMAGEM 3 ############################################# 

function ajaxFileUpload3()
	{
		$("#item_semimg3").hide();
		$("#loading_img3").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=3',
				secureuri:false,
				fileElementId:'file3',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname3").val(data.msg);
							$("#loading_img3").hide();
							$("#image3").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop3"})).fadeIn(); 
							jCrop3('#jcrop3');
							$("#upload3").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords3(c)
	{
					$('#x3').val(c.x);
					$('#y3').val(c.y);
					$('#w3').val(c.w);
					$('#h3').val(c.h);

	}
	
	function jCrop3(f) {
			$(f).Jcrop({
				onChange: updateCoords3,
				onSelect: updateCoords3,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop3() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x3').val(),y: $('#y3').val(),w: $('#w3').val(),h: $('#h3').val(),fname:$('#fname3').val(),ident:$('#ident3').val(),apelido:$('#apelido3').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview3").css({overflow:"auto"});
				   $("#crop_preview3").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido3').val() + '_' + $('#ident3').val() +'.jpg',
																				 title: 'Imagem 3',
																				 alt: 'Imagem 3'})).fadeIn();
				   $("#image3").fadeOut();
                   $("#crop_preview3").after('<input type="button" class="botao remover_img" id="remover3" value="Alterar/Remover" onClick="limpa3();" />').fadeIn();
                   $("#imagem_nome_3").val($('#apelido3').val() + '_' + $('#ident3').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview3").css({overflow:"auto"});
				   $("#crop_preview3").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido3').val() + '_' + $('#ident3').val() +'.png',
																				 title: 'Imagem 3',
																				 alt: 'Imagem 3'})).fadeIn();
				   $("#image3").fadeOut();
                   $("#crop_preview3").after('<input type="button" class="botao remover_img" id="remover3" value="Alterar/Remover" onClick="limpa3();" />').fadeIn();
                   $("#imagem_nome_3").val($('#apelido3').val() + '_' + $('#ident3').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa3()
	{
		$('#div_imagem_3').html('<h4 class="titulo_imagem">Imagem 3</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg3" /><img src="../_imagens/jquery/loading.gif" id="loading_img3" style="display:none;"/><div id="crop_preview3" class="crop_preview"></div><div id="upload3" class="upload"><form id="form3" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido3" name="apelido3" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident3" name="ident3" value="3"  /><input type="file" name="file3" id="file3" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload3();" /></form></div><div id="image3" style="display:none" class="image"><form action="" method="post" id="crop_details3" class="crop_details"><input type="hidden" id="x3" name="x3" /><input type="hidden" id="y3" name="y3" /><input type="hidden" id="w3" name="w3" /><input type="hidden" id="h3" name="h3" /><input type="hidden" id="apelido3" name="apelido3" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident3" name="ident3" value="3" /><input type="hidden" id="fname3" name="fname3"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop3();" /></form></div><input type="hidden" name="imagem_nome_3" id="imagem_nome_3" value="" />');
		$("input#imagem_nome_3").val("");
	}

// ################################################ IMAGEM 4 ############################################# 

function ajaxFileUpload4()
	{
		$("#item_semimg4").hide();
		$("#loading_img4").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=4',
				secureuri:false,
				fileElementId:'file4',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname4").val(data.msg);
							$("#loading_img4").hide();
							$("#image4").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop4"})).fadeIn(); 
							jCrop4('#jcrop4');
							$("#upload4").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords4(c)

	{
					$('#x4').val(c.x);
					$('#y4').val(c.y);
					$('#w4').val(c.w);
					$('#h4').val(c.h);

	}
	
	function jCrop4(f) {
			$(f).Jcrop({
				onChange: updateCoords4,
				onSelect: updateCoords4,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop4() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x4').val(),y: $('#y4').val(),w: $('#w4').val(),h: $('#h4').val(),fname:$('#fname4').val(),ident:$('#ident4').val(),apelido:$('#apelido4').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview4").css({overflow:"auto"});
				   $("#crop_preview4").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido4').val() + '_' + $('#ident4').val() +'.jpg',
																				 title: 'Imagem 4',
																				 alt: 'Imagem 4'})).fadeIn();
				   $("#image4").fadeOut();
                   $("#crop_preview4").after('<input type="button" class="botao remover_img" id="remover4" value="Alterar/Remover" onClick="limpa4();" />').fadeIn();
                   $("#imagem_nome_4").val($('#apelido4').val() + '_' + $('#ident4').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview4").css({overflow:"auto"});
				   $("#crop_preview4").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido4').val() + '_' + $('#ident4').val() +'.png',
																				 title: 'Imagem 4',
																				 alt: 'Imagem 4'})).fadeIn();
				   $("#image4").fadeOut();
                   $("#crop_preview4").after('<input type="button" class="botao remover_img" id="remover4" value="Alterar/Remover" onClick="limpa4();" />').fadeIn();
                   $("#imagem_nome_4").val($('#apelido4').val() + '_' + $('#ident4').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa4()
	{
		$('#div_imagem_4').html('<h4 class="titulo_imagem">Imagem 4</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg4" /><img src="../_imagens/jquery/loading.gif" id="loading_img4" style="display:none;"/><div id="crop_preview4" class="crop_preview"></div><div id="upload4" class="upload"><form id="form4" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido4" name="apelido4" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident4" name="ident4" value="4"  /><input type="file" name="file4" id="file4" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload4();" /></form></div><div id="image4" style="display:none" class="image"><form action="" method="post" id="crop_details4" class="crop_details"><input type="hidden" id="x4" name="x4" /><input type="hidden" id="y4" name="y4" /><input type="hidden" id="w4" name="w4" /><input type="hidden" id="h4" name="h4" /><input type="hidden" id="apelido4" name="apelido4" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident4" name="ident4" value="4" /><input type="hidden" id="fname4" name="fname4"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop4();" /></form></div><input type="hidden" name="imagem_nome_4" id="imagem_nome_4" value="" />');
		$("input#imagem_nome_4").val("");
	}

// ################################################ IMAGEM 5 ############################################# 

function ajaxFileUpload5()
	{
		$("#item_semimg5").hide();
		$("#loading_img5").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=5',
				secureuri:false,
				fileElementId:'file5',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname5").val(data.msg);
							$("#loading_img5").hide();
							$("#image5").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop5"})).fadeIn(); 
							jCrop5('#jcrop5');
							$("#upload5").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords5(c)
	{
					$('#x5').val(c.x);
					$('#y5').val(c.y);
					$('#w5').val(c.w);
					$('#h5').val(c.h);

	}
	
	function jCrop5(f) {
			$(f).Jcrop({
				onChange: updateCoords5,
				onSelect: updateCoords5,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop5() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x5').val(),y: $('#y5').val(),w: $('#w5').val(),h: $('#h5').val(),fname:$('#fname5').val(),ident:$('#ident5').val(),apelido:$('#apelido5').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview5").css({overflow:"auto"});
				   $("#crop_preview5").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido5').val() + '_' + $('#ident5').val() +'.jpg',
																				 title: 'Imagem 5',
																				 alt: 'Imagem 5'})).fadeIn();
				   $("#image5").fadeOut();
                   $("#crop_preview5").after('<input type="button" class="botao remover_img" id="remover5" value="Alterar/Remover" onClick="limpa5();" />').fadeIn();
                   $("#imagem_nome_5").val($('#apelido5').val() + '_' + $('#ident5').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview5").css({overflow:"auto"});
				   $("#crop_preview5").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido5').val() + '_' + $('#ident5').val() +'.png',
																				 title: 'Imagem 5',
																				 alt: 'Imagem 5'})).fadeIn();
				   $("#image5").fadeOut();
                   $("#crop_preview5").after('<input type="button" class="botao remover_img" id="remover5" value="Alterar/Remover" onClick="limpa5();" />').fadeIn();
                   $("#imagem_nome_5").val($('#apelido5').val() + '_' + $('#ident5').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa5()
	{
		$('#div_imagem_5').html('<h4 class="titulo_imagem">Imagem 5</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg5" /><img src="../_imagens/jquery/loading.gif" id="loading_img5" style="display:none;"/><div id="crop_preview5" class="crop_preview"></div><div id="upload5" class="upload"><form id="form5" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido5" name="apelido5" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident5" name="ident5" value="5"  /><input type="file" name="file5" id="file5" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload5();" /></form></div><div id="image5" style="display:none" class="image"><form action="" method="post" id="crop_details5" class="crop_details"><input type="hidden" id="x5" name="x5" /><input type="hidden" id="y5" name="y5" /><input type="hidden" id="w5" name="w5" /><input type="hidden" id="h5" name="h5" /><input type="hidden" id="apelido5" name="apelido5" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident5" name="ident5" value="5" /><input type="hidden" id="fname5" name="fname5"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop5();" /></form></div><input type="hidden" name="imagem_nome_5" id="imagem_nome_5" value="" />');
		$("input#imagem_nome_5").val("");
	}

// ################################################ IMAGEM 6 ############################################# 

function ajaxFileUpload6()
	{
		$("#item_semimg6").hide();
		$("#loading_img6").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=6',
				secureuri:false,
				fileElementId:'file6',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname6").val(data.msg);
							$("#loading_img6").hide();
							$("#image6").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop6"})).fadeIn(); 
							jCrop6('#jcrop6');
							$("#upload6").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords6(c)
	{
					$('#x6').val(c.x);
					$('#y6').val(c.y);
					$('#w6').val(c.w);
					$('#h6').val(c.h);

	}
	
	function jCrop6(f) {
			$(f).Jcrop({
				onChange: updateCoords6,
				onSelect: updateCoords6,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop6() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x6').val(),y: $('#y6').val(),w: $('#w6').val(),h: $('#h6').val(),fname:$('#fname6').val(),ident:$('#ident6').val(),apelido:$('#apelido6').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview6").css({overflow:"auto"});
				   $("#crop_preview6").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido6').val() + '_' + $('#ident6').val() +'.jpg',
																				 title: 'Imagem 6',
																				 alt: 'Imagem 6'})).fadeIn();
				   $("#image6").fadeOut();
                   $("#crop_preview6").after('<input type="button" class="botao remover_img" id="remover6" value="Alterar/Remover" onClick="limpa6();" />').fadeIn();
                   $("#imagem_nome_6").val($('#apelido6').val() + '_' + $('#ident6').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview6").css({overflow:"auto"});
				   $("#crop_preview6").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido6').val() + '_' + $('#ident6').val() +'.png',
																				 title: 'Imagem 6',
																				 alt: 'Imagem 6'})).fadeIn();
				   $("#image6").fadeOut();
                   $("#crop_preview6").after('<input type="button" class="botao remover_img" id="remover6" value="Alterar/Remover" onClick="limpa6();" />').fadeIn();
                   $("#imagem_nome_6").val($('#apelido6').val() + '_' + $('#ident6').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa6()
	{
		$('#div_imagem_6').html('<h4 class="titulo_imagem">Imagem 6</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg6" /><img src="../_imagens/jquery/loading.gif" id="loading_img6" style="display:none;"/><div id="crop_preview6" class="crop_preview"></div><div id="upload6" class="upload"><form id="form6" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido6" name="apelido6" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident6" name="ident6" value="6"  /><input type="file" name="file6" id="file6" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload6();" /></form></div><div id="image6" style="display:none" class="image"><form action="" method="post" id="crop_details6" class="crop_details"><input type="hidden" id="x6" name="x6" /><input type="hidden" id="y6" name="y6" /><input type="hidden" id="w6" name="w6" /><input type="hidden" id="h6" name="h6" /><input type="hidden" id="apelido6" name="apelido6" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident6" name="ident6" value="6" /><input type="hidden" id="fname6" name="fname6"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop6();" /></form></div><input type="hidden" name="imagem_nome_6" id="imagem_nome_6" value="" />');
		$("input#imagem_nome_6").val("");
	}

// ################################################ IMAGEM 7 ############################################# 

function ajaxFileUpload7()
	{
		$("#item_semimg7").hide();
		$("#loading_img7").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=7',
				secureuri:false,
				fileElementId:'file7',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname7").val(data.msg);
							$("#loading_img7").hide();
							$("#image7").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop7"})).fadeIn(); 
							jCrop7('#jcrop7');
							$("#upload7").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords7(c)
	{
					$('#x7').val(c.x);
					$('#y7').val(c.y);
					$('#w7').val(c.w);
					$('#h7').val(c.h);

	}
	
	function jCrop7(f) {
			$(f).Jcrop({
				onChange: updateCoords7,
				onSelect: updateCoords7,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop7() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x7').val(),y: $('#y7').val(),w: $('#w7').val(),h: $('#h7').val(),fname:$('#fname7').val(),ident:$('#ident7').val(),apelido:$('#apelido7').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				   if(msg == 1) {
					   
				   $("#crop_preview7").css({overflow:"auto"});
				   $("#crop_preview7").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido7').val() + '_' + $('#ident7').val() +'.jpg',
																				 title: 'Imagem 7',
																				 alt: 'Imagem 7'})).fadeIn();
				   $("#image7").fadeOut();
                   $("#crop_preview7").after('<input type="button" class="botao remover_img" id="remover7" value="Alterar/Remover" onClick="limpa7();" />').fadeIn();
                   $("#imagem_nome_7").val($('#apelido7').val() + '_' + $('#ident7').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview7").css({overflow:"auto"});
				   $("#crop_preview7").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido7').val() + '_' + $('#ident7').val() +'.png',
																				 title: 'Imagem 7',
																				 alt: 'Imagem 7'})).fadeIn();
				   $("#image7").fadeOut();
                   $("#crop_preview7").after('<input type="button" class="botao remover_img" id="remover7" value="Alterar/Remover" onClick="limpa7();" />').fadeIn();
                   $("#imagem_nome_7").val($('#apelido7').val() + '_' + $('#ident7').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa7()
	{
		$('#div_imagem_7').html('<h4 class="titulo_imagem">Imagem 7</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg7" /><img src="../_imagens/jquery/loading.gif" id="loading_img7" style="display:none;"/><div id="crop_preview7" class="crop_preview"></div><div id="upload7" class="upload"><form id="form7" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido7" name="apelido7" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident7" name="ident7" value="7"  /><input type="file" name="file7" id="file7" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload7();" /></form></div><div id="image7" style="display:none" class="image"><form action="" method="post" id="crop_details7" class="crop_details"><input type="hidden" id="x7" name="x7" /><input type="hidden" id="y7" name="y7" /><input type="hidden" id="w7" name="w7" /><input type="hidden" id="h7" name="h7" /><input type="hidden" id="apelido7" name="apelido7" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident7" name="ident7" value="7" /><input type="hidden" id="fname7" name="fname7"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop7();" /></form></div><input type="hidden" name="imagem_nome_7" id="imagem_nome_7" value="" />');
		$("input#imagem_nome_7").val("");
	}

// ################################################ IMAGEM 8 ############################################# 

function ajaxFileUpload8()
	{
		$("#item_semimg8").hide();
		$("#loading_img8").fadeIn();

		$.ajaxFileUpload
		(
			{
				url:'enviar-imagem-produto.php?action=upload&id=8',
				secureuri:false,
				fileElementId:'file8',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined') {
						if(data.error != '')
							alert(data.error);
					} else {
							$("#fname8").val(data.msg);
							$("#loading_img8").hide();
							$("#image8").prepend($(document.createElement("img")).attr({src: "uploads/"+data.msg,id:"jcrop8"})).fadeIn(); 
							jCrop8('#jcrop8');
							$("#upload8").hide();
					}
				}			
			}
		)
		return false;
	}

	function updateCoords8(c)
	{
					$('#x8').val(c.x);
					$('#y8').val(c.y);
					$('#w8').val(c.w);
					$('#h8').val(c.h);

	}
	
	function jCrop8(f) {
			$(f).Jcrop({
				onChange: updateCoords8,
				onSelect: updateCoords8,
				setSelect:   [ 0, 0, 2000, 2000 ],
				aspectRatio: 1,
				boxWidth: 350 //maximum width of image
			});
	}

	function crop8() {
		$(".recortar").attr("disabled","disabled");
		$.ajax({
			   type: "POST",
			   url:"enviar-imagem-produto.php?action=crop",
			   data: {x: $('#x8').val(),y: $('#y8').val(),w: $('#w8').val(),h: $('#h8').val(),fname:$('#fname8').val(),ident:$('#ident8').val(),apelido:$('#apelido8').val(),fixed:fixed,size:size},
			   success: function(msg){
				   
				  if(msg == 1) {
					   
				   $("#crop_preview8").css({overflow:"auto"});
				   $("#crop_preview8").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido8').val() + '_' + $('#ident8').val() +'.jpg',
																				 title: 'Imagem 8',
																				 alt: 'Imagem 8'})).fadeIn();
				   $("#image8").fadeOut();
                   $("#crop_preview8").after('<input type="button" class="botao remover_img" id="remover8" value="Alterar/Remover" onClick="limpa8();" />').fadeIn();
                   $("#imagem_nome_8").val($('#apelido8').val() + '_' + $('#ident8').val() +'.jpg');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   }
				   else {
					   
				   $("#crop_preview8").css({overflow:"auto"});
				   $("#crop_preview8").html($(document.createElement("img")).attr({
																				 src: '../../_imagens/produtos/' + $('#apelido8').val() + '_' + $('#ident8').val() +'.png',
																				 title: 'Imagem 8',
																				 alt: 'Imagem 8'})).fadeIn();
				   $("#image8").fadeOut();
                   $("#crop_preview8").after('<input type="button" class="botao remover_img" id="remover8" value="Alterar/Remover" onClick="limpa8();" />').fadeIn();
                   $("#imagem_nome_8").val($('#apelido8').val() + '_' + $('#ident8').val() +'.png');
				   $(".recortar").removeAttr("disabled");
				   $("label#erro_img").fadeOut();
				   
				   }
			   }
			 });
	}
	
	function limpa8()
	{
		$('#div_imagem_8').html('<h4 class="titulo_imagem">Imagem 8</h4><img src="../_imagens/item_sem_imagem.gif" id="item_semimg8" /><img src="../_imagens/jquery/loading.gif" id="loading_img8" style="display:none;"/><div id="crop_preview8" class="crop_preview"></div><div id="upload8" class="upload"><form id="form8" action="" method="post" enctype="multipart/form-data"><input type="hidden" id="apelido8" name="apelido8" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident8" name="ident8" value="8"  /><input type="file" name="file8" id="file8" /><input type="button" id="buttonUpload" value="Enviar" onClick="return ajaxFileUpload8();" /></form></div><div id="image8" style="display:none" class="image"><form action="" method="post" id="crop_details8" class="crop_details"><input type="hidden" id="x8" name="x8" /><input type="hidden" id="y8" name="y8" /><input type="hidden" id="w8" name="w8" /><input type="hidden" id="h8" name="h8" /><input type="hidden" id="apelido8" name="apelido8" value="'+ slug +'" class="apelido" /><input type="hidden" id="ident8" name="ident8" value="8" /><input type="hidden" id="fname8" name="fname8"  /><input type="button" class="botao recortar" value="Recortar e salvar" onclick="return crop8();" /></form></div><input type="hidden" name="imagem_nome_8" id="imagem_nome_8" value="" />');
		$("input#imagem_nome_8").val("");
	}
