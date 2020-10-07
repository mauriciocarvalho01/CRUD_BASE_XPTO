<?php
//Conectar no banco de dados

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xpto";


$connect = mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_error()) : echo "Erro ao connectar ". mysqli_connect_error();
endif;


