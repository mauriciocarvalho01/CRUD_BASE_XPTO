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





// funcionários Gerenciados por Gerente setor ID
$buscafuncionarios = "SELECT * FROM func";

$funcionarios = mysqli_query($connect, $buscafuncionarios);



if(mysqli_num_rows($funcionarios) > 0):


?>
<h4 class="light center">Funcionários</h4>
<?php
?>
<div class="row">
    <div class="col s12 m6 push-m3">
<table class="centered responsive-table striped">
        <thead>
          <tr>
              <th>Número</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Data da admissão</th>
               <th>Data da Saída</th>
              <th>Situação</th>
              <th>Cargo</th>
              <th>Salário base</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($funcionario = mysqli_fetch_array($funcionarios)):
        ?>  
          <tr>
            <td><?php echo $funcionario['numero_func'] ?></td>
            <td><?php echo $funcionario['nome_func'] ?></td>
            <td><?php echo $funcionario['cpf_func'] ?></td>
            <td><?php echo $funcionario['data_admissao_func'] ?></td>
            <td><?php echo $funcionario['data_saida_func'] ?></td>
            <td><?php echo $funcionario['situacao_func'] ?></td>
            <td><?php echo $funcionario['codigo_carg'] ?></td>
            <td><?php echo $funcionario['salario_base_func'] ?></td>
            <td><a href="editar.php?numero_func=<?php echo $funcionario['numero_func'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
            <td><a href="#modal<?php echo $funcionario['numero_func'];?>"  class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
            <?php 

              $d = $funcionario['numero_func'];
              $buscaDpto_funcionarios = "SELECT * FROM aloc WHERE numero_func = '$d'";

              $dpto = mysqli_query($connect, $buscaDpto_funcionarios);
              
              
              if($codigo_dpto = mysqli_fetch_array($dpto)):


            ?>
          <!-- Modal Structure -->
          <div id="modal<?php echo $funcionario['numero_func'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!!</h4>
              <p>Tem certeza que deseja excluir  o funcionário <?php echo $funcionario['nome_func'];?>?</p>
              </div>
              <div class="modal-footer">
              <form action="../PHP_ACTION/delete.php?" method="POST">
                  <input type="hidden" name="func" value="<?php echo $funcionario['numero_func'] ?>">
                  <input type="hidden" name="id" value="<?php echo $d;?>">
                  <button type="submit" name="btn-deletar" class="btn red">Excluir<button>
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
          </div>
          </tr>
        <?php
        endif;
            endwhile;
        ?>
        </tbody>
      </table>
    </div>
</div>


<?php
else:
echo "<h4 class='light center'>Departamento sem funcionários</h4>";
endif;
?>
<?php
//Footer
include_once '../INCLUDES/footer.php';
?>