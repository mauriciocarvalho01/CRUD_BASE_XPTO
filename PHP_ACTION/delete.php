<?php
//Sessão
session_start();


//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

    $func = mysqli_escape_string($connect, $_POST['func']);

	$delete_aloc = "DELETE FROM aloc WHERE   = '$func'";

	//if01
	if(mysqli_query($connect, $delete_aloc)):

	$_SESSION['excluidoaloc'] = 'Desalocado com sucesso!';
	header("Location: ../Views/buscafuncionario.php#!");
	else:
		$_SESSION['excluidoaloc'] = 'Erro ao desalocar!';
		header("Location: ../Views/buscafuncionario.php#!");
	endif;


	$delete_func = "DELETE FROM func WHERE numero_func = '$func'";

	//if01
	if(mysqli_query($connect, $delete_func)):

	$_SESSION['excluido'] = 'Excluido com sucesso!';
	header("Location: ../Views/buscafuncionario.php#!");
	else:
		$_SESSION['excluido'] = 'Erro ao excluir!';
		header("Location: ../Views/buscafuncionario.php#!");
	endif;
endif;
