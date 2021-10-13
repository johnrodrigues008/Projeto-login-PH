<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>alterar</title>
</head>
<body>
<?php 
include_once 'conexao.php';
$chave = $_SESSION['codigo'] ?? '';

$sql = "SELECT * FROM livros WHERE codigo = $chave";

$resultado = mysqli_query($conexao,$sql);

$campos = mysqli_fetch_array($resultado);

if (isset($campos['titulo'])) {

?>

	<form action="gravar.php?acao=alterar&codigo=<?php echo $chave; ?>" method="POST">
		<h2>Alterar</h2>
		Código
		<input type="text" name="codigo" disabled value="<?php echo $chave ?? ''; ?>" >
		<br>
		Título
		<input type="text" name="titulo" value="<?php echo $campos['titulo'] ?? ''; ?>" >
		<br>

		Editora
		<input type="text" name="editora" value="<?php echo $campos['editora'] ?? ''; ?>">
		<br>
	
		autor
		<input type="text" name="autor" value="<?php echo $campos['autor'] ?? ''; ?>">
		<br>

		Publicação
		<input type="date" name="publicacao" value="<?php echo $campos['publicacao'] ?? ''; ?>">
		<br>
		Quantidade
		<input type="number" name="quantidade" value="<?php echo $campos['quantidade'] ?? ''; ?>">
		<br>
		<br>
		<button>Alterar</button>
	</form>
<?php 
}
else
{
	echo "<h3>Não existe este código " . $chave . "</h3>";
}
?>	
<br>
<br>
<a href="index.php"><button>Voltar</button></a>


</body>
</html>