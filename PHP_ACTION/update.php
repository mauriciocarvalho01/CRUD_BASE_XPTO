<?php
//Sessão
session_start();


//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$numero_func = mysqli_escape_string($connect, $_POST['numero_func']);	
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$cpf = mysqli_escape_string($connect, $_POST['cpf']);
	$data_admin = mysqli_escape_string($connect, $_POST['data_admin']);
	$codigo_carg = mysqli_escape_string($connect, $_POST['codigo_carg']);
    $situacao_func = mysqli_escape_string($connect, $_POST['situacao_func']);
	$salario_base = mysqli_escape_string($connect, $_POST['salario_base']);
	$nome_dpto = mysqli_escape_string($connect, $_POST['nome_dpto']);
	$dpto = mysqli_escape_string($connect, $_POST['dpto']);

	$sql = "UPDATE func SET nome_func = '$nome', cpf_func = '$cpf', data_admissao_func = '$data_admin',
			codigo_carg = '$codigo_carg', situacao_func = '$situacao_func',
			salario_base_func = '$salario_base' WHERE numero_func = '$numero_func'";


	if(mysqli_query($connect, $sql)):
		$_SESSION['alterar'] = 'Alterado com sucesso!';
			header('Location: ../Views/buscafuncionario.php');
		else:
		$_SESSION['alterar'] = mysqli_error( $connect );
			header('Location: ../Views/buscafuncionario.php');
			
	endif;



	$altera_dpto = "UPDATE aloc SET codigo_dpto = '$dpto', numero_func = '$numero_func' WHERE numero_func = '$numero_func'";
		if(mysqli_query($connect, $altera_dpto)):
			$_SESSION['altera_aloc'] = 'Alocação alterada com sucesso!';
			else:
				$alocar_func = "INSERT INTO aloc(codigo_dpto,numero_func) VALUES('$dpto','$numero_func')";
					if(mysqli_query($connect, $alocar_func)):
						$_SESSION['aloc'] = 'Alocado com sucesso!';
					else:
					$erro = mysql_error();
					 	$_SESSION['aloc'] = mysqli_error( $connect );
					endif;
			$_SESSION['altera_aloc'] = 'Alocação alterada sem sucesso!';
		endif;	
endif;
