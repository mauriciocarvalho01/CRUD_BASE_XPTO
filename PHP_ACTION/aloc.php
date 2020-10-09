<?php


//Sessão
session_start();


//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$numero_func = mysqli_escape_string($connect, $_POST['numero_func']);
    $dpto = mysqli_escape_string($connect, $_POST['dpto']);


$insere_aloc = "INSERT INTO aloc (codigo_dpto,numero_func) VALUES ('$dpto','$numero_func')";
		if(mysqli_query($connect, $insere_aloc)):
			$_SESSION['altera_aloc'] = 'Alocação feita com sucesso!';
            header('Location: ../Views/buscafuncionario.php');
			else:
			$_SESSION['altera_aloc'] = mysqli_error( $connect );
            header('Location: ../Views/buscafuncionario.php');
		endif;

endif;