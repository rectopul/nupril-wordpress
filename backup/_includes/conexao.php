<?
// Conexão
	$host = "mysql01.nupill.hospedagemdesites.ws";
	$user = "nupill";
	$senha = "solsystem2015";
	$dbname = "nupill";
// Seleciona o Banco de Dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");

// Seleciona o Banco de Dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");

function resumo($string,$chars)
	{
		  if (strlen($string) > $chars) {
			while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))){
			  $chars++;
			};
		  };
		  return substr($string,0,$chars);
	}	
	

?>