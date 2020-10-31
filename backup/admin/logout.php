<?php 
	// Desativa as Sessions
	session_start();
	
	// Funções
	include("_inc/funcoes.php");
	
	unset($_SESSION['NUPILL']);
	unset($_SESSION['NUPILL_ID']);
	unset($_SESSION['NUPILL_GRUPO']);
	unset($_SESSION['NUPILL_NOME']);
	unset($_SESSION['NUPILL_EMAIL']);
	unset($_SESSION['NUPILL_DATA_ACESSO']);
	unset($_SESSION['NUPILL_IP']);
	unset($_SESSION['NUPILL_CHAT']);
	unset($_SESSION['NUPILL_PERMISSAO']);
	// Se há Cookies, os desativa
	if($_COOKIE['NUPILL_USUARIO'] && $_COOKIE['NUPILL_SENHA']){
	setcookie("NUPILL_USUARIO", $usuario, time()-3600);
	setcookie("NUPILL_SENHA", md5($senha), time()-3600);
	}
	// Limpa o cache do Chat.
	foreach($counter_matrix as $key => $val){
		if($val['user_online_id'] == $_SESSION['NUPILL_ID']){
			unset($counter_matrix[$key]);
		}
	}
	header('Location:index.php'); 
?>