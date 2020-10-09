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
    <div class="col s8 m8 push-m2">
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
            <td><a href="alocar.php?numero_func=<?php echo $funcionario['numero_func'];?>" class="btn-floating green"><i class="material-icons">arrow_forward</i></a></td>
            <td><a href="editar.php?numero_func=<?php echo $funcionario['numero_func'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
            <td><a href="#modal<?php echo $funcionario['numero_func'];?>"  class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
            <td><a href="#modalhist<?php echo $funcionario['numero_func'];?>"  class="btn-floating grey modal-trigger"><i class="material-icons">help</i></a></td>
          <!-- Modal Structure DELETE-->
          <div id="modal<?php echo $funcionario['numero_func'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!!</h4>
              <p>Tem certeza que deseja excluir  o funcionário <?php echo $funcionario['nome_func'];?>?</p>
              </div>
              <div class="modal-footer">
              <form action="../PHP_ACTION/delete.php?" method="POST">
                  <input type="hidden" name="func" value="<?php echo $funcionario['numero_func'] ?>">
                  <button type="submit" name="btn-deletar" class="btn red">Excluir<button>
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
          </div>

          <?php 

          $func = $funcionario['numero_func'];
          $buscaHist = "SELECT * FROM hist WHERE numero_func = '$func'";

          $historicos = mysqli_query($connect, $buscaHist);

          $shist = " ";

          ?>

          <!-- Modal Structure HIST-->
          <div id="modalhist<?php echo $funcionario['numero_func'];?>" class="modal">
              <div class="modal-content">
              <h4>Histórico do funcionário</h4>
              <p>Nome: <?php echo $funcionario['nome_func'];?></p>
              </div>

              <?php 
                
                if(mysqli_num_rows($historicos) > 0):
                while($hist_func = mysqli_fetch_array($historicos)):
              ?>
              <div calss="row">
                <ul class="collection">
                   <li class="collection-item">Número do Histórico: <?php echo $hist_func['numero_hist'];?></li>
                    <li class="collection-item">Data: <?php echo $hist_func['data_ini_hist'];?></li>
                   <li class="collection-item">Cargo: <?php echo $hist_func['codigo_carg'];?></li>
                  <li class="collection-item">Salário base: <?php echo $hist_func['salario_base_func'];?></li>
               </ul>
              </div>
               <?php
                  endwhile;

                  else:
                  ?>
                  <div calss="row">
                  <ul class="collection">
                   <li class="collection-item">Sem histórico</li>
                  </ul>
                 </div>
              <?php
                  endif;
               ?>

              <div class="modal-footer">
              <form action="../PHP_ACTION/delete.php?" method="POST">
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sair</a>
              </form>
            </div>
          </div>
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
echo "<h4 class='light center'>Departamento sem funcionários</h4>";
endif;
?>
<?php
//Footer
include_once '../INCLUDES/footer.php';
?>


 <div class="fixed-action-btn">
    <a href="adicionar.php?>" class="btn-floating btn-large green">
    <i class="large material-icons">person_add</i>
</div>