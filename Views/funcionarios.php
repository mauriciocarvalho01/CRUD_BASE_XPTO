<?php

//Conexão com o banco para o READ
include_once '../PHP_ACTION/db_connect.php';

//Header
include_once '../INCLUDES/header.php';

//Message
include_once '../INCLUDES/message.php';
//Nav
include_once '../INCLUDES/menu.php';

  
?>


<?php


if (isset($_GET['id'])):
$id = mysqli_escape_string($connect, $_GET['id']);


// funcionários Gerenciados por Gerente setor ID
$buscafuncionarios = "SELECT numero_func, codigo_carg, nome_func,numero_gerente,nome_dpto
                        FROM carg INNER JOIN func USING(codigo_carg) 
                        INNER JOIN aloc USING(numero_func)
                        INNER JOIN dpto USING(codigo_dpto)
                        WHERE codigo_dpto = '$id'";

$funcionarios = mysqli_query($connect, $buscafuncionarios);

endif;


if(mysqli_num_rows($funcionarios) > 0):


?>
<h4 class="light center">Funcionários do departamento <?php echo $id?></h4>
<?php
     while($funcionario = mysqli_fetch_array($funcionarios)):
?>
<div class="row">
    <div class="col s12 m6 push-m3">
  <ul class="collection">
    <li class="collection-item avatar">
     <i class="material-icons circle blue">person</i>
     <span class="title">Nome: <?php echo $funcionario['nome_func'] ?></span>
     <br>
       <span class="title">Número do funcionário: <?php echo $funcionario['numero_func'] ?></span>
       <br>
      <span class="title">Código do Cargo: <?php echo $funcionario['codigo_carg'] ?></span>
      <p>Código do Departamento: <?php echo $id ?><br>
         Departamento: <?php echo $funcionario['nome_dpto'] ?>
      </p>
      <div class="secondary-content">
  <ul>
      <a href="#!" class="btn-floating"><i class="material-icons">edit</i></a>
      <a href="#!" class="btn-floating red"><i class="material-icons">delete</i></a>
  </ul>
</div>
    </li>
  </ul>
  </div>
  </div>
<?php
endwhile;
else:
echo "<h4 class='light center'>Departamento sem funcionários</h4>";
endif;
?>
<?php
//Footer
include_once '../INCLUDES/footer.php';
?>