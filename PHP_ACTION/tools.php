<?php


//Informações da conexão com o banco de dados
define('servername','localhost');
define('username','root');
define('password','');
define('dbname','xpto');




// Conexão com o banco
function connect($servename,$username,$password,$dbname)

    global $servername, $username, $password, $dbname;

    $connect = mysqli_connect($servername,$username,$password,$dbname);

    if(mysqli_connect_error()) or die echo "Erro ao conectar";
    endif;

    return $connect();

}

function QUERY(){
    connect();


}