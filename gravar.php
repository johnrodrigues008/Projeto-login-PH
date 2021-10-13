<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>gravar</title>
</head>
<body>

	<?php
	include_once 'conexao.php'; 

	// pegando as variaveis de sessao
	$acao = $_SESSION['acao'];
	$chave = $_SESSION['codigo'];

	// pegando as variaveis do POST

	$titulo = $_POST['titulo'] ?? '';
	$editora = $_POST['editora'] ?? '';
	$autor = $_POST['autor'] ?? '';
	$publicacao = $_POST['publicacao'] ?? '';
	$quantidade = $_POST['quantidade'] ?? '';
 
	echo "<h2>Gravar - $acao - $chave </h2>";

	if ($acao == 'incluir') {
		// fazer insert na tabela livro

		$sql = "INSERT INTO livros (codigo,titulo,editora,autor,publicacao,quantidade) VALUES
		('$chave','$titulo','$editora','$autor','$publicacao','$quantidade')";
		if (mysqli_query($conexao,$sql)) {
			// deu certo
			echo "Cliente gravado com sucesso!";
		}
		else{
			// deu errado
			echo "Erro na gravação";

		}
	}

	if ($acao == 'alterar'){
		// fazer update na tabela livro
		$sql = "UPDATE livros SET codigo = '$chave', titulo = '$titulo', editora = '$editora', autor = '$autor', publicacao = '$publicacao', quantidade = '$quantidade' WHERE codigo = '$chave'";
	
		if(mysqli_query($conexao,$sql)){
			// deu certo
			echo "Alteração feita com sucesso!<br>";
		}
		else
		{
			// deu errado
			echo "Houve erro em sua Alteração!<br>";
			echo $sql;
		}


	}

	if ($acao == 'excluir'){
		// fazer delete na tabela livro
		$sql = "DELETE FROM livros WHERE codigo = $chave";

		if(mysqli_query($conexao,$sql)){
			// deu certo
			echo "Exclusão feita com sucesso!<br>";
		}
		else
		{
			// deu errado
			echo "Houve erro em sua Exclusão!<br>";
		}






	}
	// --------------------------------terminar essa parte --------------------------------------------------
	if ($acao == 'comprar'){
		// adicionar da quantidade
		$quantidade = $_SESSION['quantidade'];
		$entrada = $_POST['entrada'];

		$sql = "UPDATE livros SET quantidade = $quantidade + $entrada WHERE codigo = $chave";
		
		if(mysqli_query($conexao,$sql)){
			// deu certo
			echo "Compra feita com sucesso!<br>";
		}
		else
		{
			// deu errado
			echo "Houve erro em sua Compra!<br>";
		}
	
	}

	if ($acao == 'vender'){
		// subtrair da quantidade
		$quantidade = $_SESSION['quantidade'];
		$entrada = $_POST['saida'];

		$sql = "UPDATE livros SET quantidade = $quantidade - $entrada WHERE codigo = $chave";
		
		if(mysqli_query($conexao,$sql)){
			// deu certo
			echo "Venda feita com sucesso!<br>";
		}
		else
		{
			// deu errado
			echo "Houve erro em sua Venda!<br>";
		}
	}

	?>
	
<!-- --------------------------------------------------------------------- -->








	<?php 
		$conexao->close();

	?>


	<a href="index.php"><button>Voltar</button></a>
</body>
</html>


