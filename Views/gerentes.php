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

//Gerentes do setor ID
    $buscaGerente = "SELECT numero_func, nome_func, nome_dpto FROM
    func INNER JOIN dpto ON numero_gerente = numero_func WHERE codigo_dpto = '$id'";
$gerentes = mysqli_query($connect, $buscaGerente);



// funcionários Gerenciados por Gerente setor ID
$buscafuncionarios = "SELECT numero_func, codigo_carg, nome_func,numero_gerente
                        FROM carg INNER JOIN func USING(codigo_carg) 
                        INNER JOIN aloc USING(numero_func)
                        INNER JOIN dpto USING(codigo_dpto) 
                        WHERE numero_gerente = (SELECT numero_func 
                        FROM func INNER JOIN dpto ON numero_gerente = numero_func 
                        WHERE codigo_dpto = '$id') GROUP BY numero_func";

$funcionarios = mysqli_query($connect, $buscafuncionarios);

endif;


if(mysqli_num_rows($gerentes) > 0):

while($gerente = mysqli_fetch_array($gerentes)):
?> 
<div class="row">
    <div class="col s12 m6 push-m3 z-depth-2">
  <ul class="collection">
    <li class="collection-item avatar">
     <i class="material-icons circle blue">person</i>
     <span class="title">Numero do Gerente: <?php echo $gerente['numero_func'] ?></span>
     <br>
      <span class="title">Nome: <?php echo $gerente['nome_func'] ?></span>
      <p>Código do Departamento: <?php echo $id ?><br>
         Departamento: <?php echo $gerente['nome_dpto'] ?>
      </p>
      <div class="secondary-content">
  <ul>
     <a href="#!" class="btn-floating"><i class="material-icons">grade</i></a>
      <a href="#!" class="btn-floating"><i class="material-icons">edit</i></a>
      <a href="#!" class="btn-floating red"><i class="material-icons">delete</i></a>
  </ul>
</div>
    </li>
  </ul>
  </div>
  </div>
<h6 class="light center">Funcionários Gerenciados por <?php echo $gerente['nome_func']?></h6>
<?php
endwhile;
?>
<div class="row">
    <div class="col s12 m6 push-m3">
<table class="centered responsive-table striped">
        <thead>
          <tr>
              <th>Número</th>
              <th>Código do Cargo</th>
              <th>Nome</th>
              <th>Número do Gerente</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($funcionario = mysqli_fetch_array($funcionarios)):
        ?>  
          <tr>
            <td><?php echo $funcionario['numero_func'] ?></td>
            <td><?php echo $funcionario['codigo_carg'] ?></td>
            <td><?php echo $funcionario['nome_func'] ?></td>
            <td><?php echo $funcionario['numero_gerente'] ?></td>
          </tr>
        <?php
            endwhile;
        ?>
        </tbody>
      </table>
    </div>
</div>
<?php
else:
echo "<h4 class='light center'>Departamento sem gerente</h4>";
endif;
?>
<?php
//Footer
include_once '../INCLUDES/footer.php';
?>