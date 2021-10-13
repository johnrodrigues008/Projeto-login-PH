<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>index</title>
	<style>
	fieldset{
		border: groove; color: blue;
	}
</style>
</head>
<body>

	<?php
		include_once 'conexao.php';
	
		$_SESSION['codigo'] = $_GET['codigo'] ?? '';
		$_SESSION['acao'] = $_GET['acao'] ?? '';
		
		if ($_SESSION['acao'] == 'incluir'){
			header("Location: ./incluir.php");
			exit();
		}
		
		if ($_SESSION['acao'] == 'alterar'){
			header("Location: ./alterar.php");
			exit();
		}
		if ($_SESSION['acao'] == 'excluir'){
			header("Location: ./excluir.php");
			exit();
		}
		if ($_SESSION['acao'] == 'comprar'){
			header("Location: ./comprar.php");
			exit();
		}
		if ($_SESSION['acao'] == 'vender'){
			header("Location: ./vender.php");
			exit();

		}
		if (!isset($_SESSION['ativo'])){
			header("Location: ./login.php");
		}
		else
		{
			// echo 'fez login';
		}
		
	?>
	<form action="index.php" method="GET" >

		<h1 align="center"> Menu Principal </h1>
		<p align="center"> Este sistema faz o cadastro de livros e a sua manutenção. Também permite registrar o entrada e saída de livros.</p>
		<fieldset>
			<br>
			Código do Livro
			<input type="text" name="codigo" size="5" maxlength="5" required>
			<br>
			<br>
			<button <?php if($_SESSION['incluir']!='S') { echo '';} ?>  name="acao" value='incluir'>Incluir Livros</button>
			<button <?php if($_SESSION['alterar']!='S') { echo '';} ?>  name="acao" value='alterar'>Alterar Livros</button>
			<button <?php if($_SESSION['excluir']!='S') { echo '';} ?>  name="acao" value='excluir'>Excluir Livros</button>
			<button <?php if($_SESSION['comprar']!='S') { echo '';} ?>  name="acao" value='comprar'>Comprar Livros</button>
			<button <?php if($_SESSION['vender']!='S') { echo '';} ?>  name="acao" value='vender'>Vender Livros</button>
		</fieldset>
	</form>
	<br>
	<br>
	
<a href="fechar.php"><button>Sair</button></a>	




</body>
</html>

