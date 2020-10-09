<?php
//Sessão
session_start();


//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

    $func = mysqli_escape_string($connect, $_POST['func']);
	$id = mysqli_escape_string($connect, $_POST['id']);

	$delete_aloc = "DELETE FROM aloc WHERE numero_func = '$func'";


if(mysqli_query($connect, $delete_aloc)):

$delete_func = "DELETE FROM func WHERE numero_func = '$func'";

if(mysqli_query($connect, $delete_aloc)):
   $_SESSION['excluido'] = 'Excluido com sucesso!';
	header("Location: ../Views/funcionarios.php?id=$id");
	else:
	$_SESSION['excluido'] = 'Erro ao excluir!';
	header("Location: ../Views/funcionarios.php?id=$id");
	endif;    
	endif;
endif;
