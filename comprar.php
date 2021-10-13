<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>comprar</title>
</head>
<body>
<?php 
include_once 'conexao.php';

$chave = $_SESSION['codigo'] ?? '';

$sql = "SELECT * FROM livros WHERE codigo = $chave";

$resultado = mysqli_query($conexao,$sql);

$campos = mysqli_fetch_array($resultado);

if (isset($campos['titulo'])) {

	$_SESSION['quantidade'] = $campos['quantidade'];

?>

	<form action="gravar.php" method="POST">
		<h2>Comprar</h2>
		Código
		<input type="text" name="codigo" disabled value="<?php echo $chave; ?>">
		<br>
		Título
		<input type="text" name="titulo" disabled value="<?php echo $campos['titulo'] ?? ''; ?>" >
		<br>
		Editora
		<input type="text" name="editora" disabled value="<?php echo $campos['editora'] ?? ''; ?>">
		<br>
		Publicação
		<input type="date" name="publicacao" disabled value="<?php echo $campos['publicacao'] ?? ''; ?>"> 
		<br>
		Quantidade
		<input type="number" name="quantidade" disabled value="<?php echo $campos['quantidade'] ?? ''; ?>">
		<br>
		Entrada
		<input type="number" name="entrada" autofocus>
		<br>
		<br>
		<button>Comprar</button>
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