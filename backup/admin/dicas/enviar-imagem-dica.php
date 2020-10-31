<?php

// Configurações
//include("../_inc/config_nosession.php");

// Função para gerar slugs
	function Slug($string, $slug)
	{
		
		// Troca tudo que não for letra ou número por um caractere ($slug)
		$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
		// Tira os caracteres ($slug) repetidos
		$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
		$string = trim($string, $slug);
		
		return $string;
		
	}

// Transforma todas as letras em minúscula
	function Minusculas($string)
	{
	
	$string = strtolower($string);
	$string = str_replace("Ç", "c", $string);
	$string = str_replace("Ã", "a", $string);
	$string = str_replace("Â", "a", $string);
	$string = str_replace("À", "a", $string);
	$string = str_replace("Á", "a", $string);
	$string = str_replace("È", "e", $string);
	$string = str_replace("Ê", "e", $string);
	$string = str_replace("É", "e", $string);
	$string = str_replace("Í", "i", $string);
	$string = str_replace("Ì", "i", $string);
	$string = str_replace("Î", "i", $string);
	$string = str_replace("Ó", "o", $string);
	$string = str_replace("Ô", "o", $string);
	$string = str_replace("Ò", "o", $string);
	$string = str_replace("Õ", "o", $string);
	$string = str_replace("Ú", "u", $string);
	$string = str_replace("Û", "u", $string);
	$string = str_replace("Ù", "u", $string);
	$string = str_replace("Ñ", "n", $string);

	// Código ASCII das vogais
	$ascii['a'] = range(224, 230);
	$ascii['e'] = range(232, 235);
	$ascii['i'] = range(236, 239);
	$ascii['o'] = array_merge(range(242, 246), array(240, 248));
	$ascii['u'] = range(249, 252);

	// Código ASCII dos outros caracteres
	$ascii['b'] = array(223);
	$ascii['c'] = array(231);
	$ascii['d'] = array(208);
	$ascii['n'] = array(241);
	$ascii['y'] = array(253, 255);

	foreach ($ascii as $key=>$item) {
		$acentos = '';
		foreach ($item AS $codigo) $acentos .= chr($codigo);
		$troca[$key] = '/['.$acentos.']/i';
	}

	$string = preg_replace(array_values($troca), array_keys($troca), $string);
	
	return $string;	
	
	}

// Gera apelido
	function GeraApelido($string, $slug = "-")
	{

	$string = Minusculas($string);
	$string = Slug($string, $slug);

	return $string;
		
	}

// Define a ação
$action = $_GET['action'];
$id_file = $_GET['id'];

switch($action) {
	
	case 'upload':
	$upload_name = "file".$id_file;
	$max_file_size_in_bytes = 1024*1024*2;
	$extension_whitelist = array("jpg", "gif", "png");
	
	/* checking extensions */
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
		echo "{";
		echo		"error: 'Erro! A Imagem (".$id_file.") precisa estar nos seguintes formatos: jpeg, gif ou png'\n";
		echo "}";
		exit(0);
	}
	
	/* file size check */
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
		echo "{";
		echo		"error: 'Erro! A Imagem (".$id_file.") está acima do tamanho máximo permitido.'\n";
		echo "}";
		exit(0);
	}
	
	
	if(isset($_FILES[$upload_name]))
		if ($_FILES[$upload_name]["error"] > 0) {
			echo "Error: " . $_FILES["file"]["error"] . "<br />";
			} else  {
				$userfile = stripslashes($_FILES[$upload_name]['name']);
				$file_size = $_FILES[$upload_name]['size'];
				$file_temp = $_FILES[$upload_name]['tmp_name'];
				$file_type = $_FILES[$upload_name]["type"];
				$file_err = $_FILES[$upload_name]['error'];
				$file_name = pathinfo($userfile);
				$basename = GeraApelido($file_name['filename']);
				$extensao = '.'.$file_name['extension'];
				$nome_arquivo = $basename.$extensao;

				if(move_uploaded_file($file_temp, "uploads/".$nome_arquivo)) {
					echo "{";
					echo		"msg: '".$nome_arquivo."'\n";
					echo "}";
				}
			}
	break;
	
	case 'crop':
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 	{
		
		$jpeg_quality = 90;
	
		$src = "uploads/".$_POST['fname'];
		$img_r = imagecreatefromjpeg($src);

        if($_POST['fixed'] == 0) {
           $targ_w = $_POST['w'];
           $targ_h = $_POST['h'];
        }
        else {
			list($width, $height) = getimagesize($src);
			$razao = 400/$_POST['w'];
			$targ_w = 400;
			$targ_h = $_POST['h']*$razao;
        }

        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		$dst_m = ImageCreateTrueColor( 200, 200 );
		
        // Cria a imagem maior 
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);		
		// Cria a miniatura
		imagecopyresampled($dst_m,$dst_r,0,0,0,0,200,200, 800, 800);
		// Define o nome da imagem
		$nome_cru = GeraApelido($_POST['apelido']);
		$nome = $nome_cru."_".$_POST['ident'].".jpg";
		// Salva a imagem maior
		imagejpeg($dst_r,"../../_imagens/dicas/".$nome,$jpeg_quality);
		// Salva a minitura
		imagejpeg($dst_m,"../../_imagens/dicas/miniaturas/".$nome,$jpeg_quality);
		
		unlink($src);
		echo 1;

	}	
	break;
	
	
}