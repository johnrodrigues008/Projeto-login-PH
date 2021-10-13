<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>incluir</title>
</head>
<body>
	<?php 
	include_once 'conexao.php'; 

	$chave = $_SESSION['codigo'] ?? '';

	$sql = "SELECT * FROM livros WHERE codigo = $chave";

	$resultado = mysqli_query($conexao,$sql);

	$campos = mysqli_fetch_array($resultado);

	if (!isset($campos['titulo'])) {
	
	?>

		<form action="gravar.php" method="POST">
			<table>
				<tr>
					<h2>Incluir Livros</h2>
				</tr>
				<tr>
					<td>
						Código
					</td>
					<td>
						<input type="text" name="codigo" disabled value="<?php echo $chave; ?>">
					<td>
				</tr>
				<tr>
					<td>
						Título
					</td>
					<td>
						<input type="text" name="titulo" autofocus>
					</td>
				</tr>
				<tr>
					<td>
						Editora
					</td>
					<td>
						<input type="text" name="editora">
					</td>
				</tr>
				<tr>
					<td>
						Autor
					</td>
					<td>
						<input type="text" name="autor">
					</td>
				</tr>				
				<tr>
					<td>
						Publicação
					</td>
					<td>
						<input type="date" name="publicacao">
					</td>
				</tr>
				<tr>
					<td>
						Quantidade
					</td>
					<td>
						<input type="number" name="quantidade">
					</td>
				</tr>
			</table>
			<br>
			<br>
			<button>Incluir</button>
		</form>
	<?php

		}
		else
		{
			echo "<h3>Já existe este código " . $chave . "</h3>";
		}
		?>	
		<br>
		<br>
		<a href="index.php"><button>Voltar</button></a>

	</body>
</html>