<?php
//Sessão
session_start();


//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$idade = mysqli_escape_string($connect, $_POST['idade']);
    $id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE clintes SET nome = '$nome', sobre = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";


if(mysqli_query($connect, $sql)):

    $_SESSION['mensagem'] = 'Alterado com sucesso!';
		header('Location: ../index.php');
	else:
    $_SESSION['mensagem'] = 'Erro ao alterar!';
		header('Location: ../index.php');
        
	endif;
endif;
