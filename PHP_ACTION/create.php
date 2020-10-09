<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';


//Criar funcionário
if(isset($_POST['btn-cadastrar'])):
	$dpto = mysqli_escape_string($connect,$_POST['dpto']);
	$nome = mysqli_escape_string($connect,$_POST['nome']);
	$cpf = mysqli_escape_string($connect,$_POST['cpf']);
	$data_admin = mysqli_escape_string($connect,$_POST['data_admin']);
	$situacao_func = mysqli_escape_string($connect,$_POST['situacao_func']);
	$codigo_carg = mysqli_escape_string($connect,$_POST['codigo_carg']);
	$salario_base = mysqli_escape_string($connect,$_POST['salario_base']);
	$null = null;



	$create_func = "INSERT INTO func(numero_func, nome_func, cpf_func,
	data_admissao_func, data_saida_func, situacao_func,
	codigo_carg, salario_base_func)
		VALUES('$null','$nome', '$cpf', '$data_admin', '$null', '$situacao_func', '$codigo_carg', '$salario_base')";


if(mysqli_query($connect, $create_func)):


	$_SESSION['cadastro'] = "Funcionário Cadastrado com Sucesso!";
	header("Location:../Views/funcionarios.php?id=$dpto");
else:
	$_SESSION['cadastro'] = "Erro ao Cadastrar!";
	header("Location:../Views/funcionarios.php?id=$dpto");
endif;
endif;





/*

$numero_func = "SELECT numero_func FROM func WHERE cpf_func = '$cpf'";

if(mysqli_query($connect, $numero_func)):
	$func = $numero_func;
	echo "Achou o funcuonario".$func;
else:
$func = "Não achou o func";
endif;

$aloc_func = "INSERT INTO aloc(codigo_dpto,numero_func) VALUES ('$dpto','$func')";

		if(mysqli_query($connect, $aloc_func)):

			$_SESSION['alocação'] = "sucesso";
			//header("Location:../index.php");
			echo "alocou".$func;

			else:
			$_SESSION['alocação'] = "erro";
			//header('Location:../index.php');
			echo "Não alocou".$func;

	endif;


*/

