<?php


$servidor = 'localhost';
$usuario = 'root';
$senha = 'root';
$banco = 'projetomatutino';

if ($conexao = mysqli_connect($servidor,$usuario,$senha,$banco)) {
	// deu certo
	session_start();
	/* ------------------------------- */
	$sql = "SELECT * FROM usuarios WHERE usuario = ''";
	if ($resultado = mysqli_query($conexao,$sql)){
		if($campos = mysqli_fetch_array($resultado)){
			if (isset($campos['usuario'])){
				// tudo certo
				$_SESSION['usuario'] = $campos['usuario'] ?? '';
				$_SESSION['senha'] = $campos['senha'] ?? '';
				$_SESSION['incluir'] = $campos['incluir'] ?? '';
				$_SESSION['alterar'] = $campos['alterar'] ?? '';
				$_SESSION['excluir'] = $campos['excluir'] ?? '';
				$_SESSION['consultar'] = $campos['consultar'] ?? '';
				$_SESSION['comprar'] = $campos['comprar'] ?? '';
				$_SESSION['vender'] = $campos['vender'] ?? '';
				$_SESSION['ativo'] = $campos['ativo'] ?? '';	
			}
			else{
				// não achou o marcelo
				die ("Você não pode estar aqui !!!");
			}
		}
	}
	
}
else
{
	// deu errado
	die('não foi possivel acessar o banco de dados!' . $conexao->error);
}
?>