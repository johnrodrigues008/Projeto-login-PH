<?php
include_once 'conexao.php';
// fecha o banco de dados
$conexao->close();
// mata as variaveis da sessao
session_destroy();
// sai
header("Location: ./login.php");
?>