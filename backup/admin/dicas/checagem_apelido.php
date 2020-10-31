<?php

// Configurações
include("../_inc/config.php");

// Define a página
$pag_mae = "dicas";
$pag = "enviar-imagem";

// Checa a sessão 
include ("../_inc/sessao.php");

//Checa viabilidade do nome
if(isSet($_POST['apelido']))
{

$apelido_check = $_POST['apelido'];

$checa_viabilidade = mysql_query("SELECT apelido FROM tb_dicas WHERE apelido='$apelido_check'");

if(mysql_num_rows($checa_viabilidade))
{
$slug_alternativo = $apelido_check."-alter";
echo $slug_alternativo;
}
else
{
echo 'OK';
}}
?>