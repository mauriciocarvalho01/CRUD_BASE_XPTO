<?php
// Conexão
include_once '../PHP_ACTION/db_connect.php';

//Header
include_once '../INCLUDES/header.php';

//Message
include_once '../INCLUDES/message.php';

//Nav
include_once '../INCLUDES/menu.php';

if(isset($_GET['dpto'])):
$dpto = mysqli_escape_string($connect,$_GET['dpto']);
else:
$dpto = "Não achou a avriavel";

endif;
?>


<div class="row">
    <form class="col s6 m6 push-m3" action="../PHP_ACTION/create.php" method="POST">
      <div class="row">
         <div class="input-field col s6 hidden">
          <input placeholder="Placeholder" name="dpto" id="dpto" type="text" class="validate" value="<?php echo $dpto;?>">
          <label for="dpto">Departamento</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="nome" id="nome" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6">
          <input name="cpf" id="cpf" type="text" class="validate">
          <label for="cpf">CPF</label>
        </div>
        <div class="input-field col s6">
          <input name="data_admin" id="data_admin" type="date" class="validate">
          <label for="data_admin">Data de Admissão</label>
        </div>
        <div class="input-field col s6">
          <input name="situacao_func" id="situacao_func" type="text" class="validate">
          <label for="situacao_func">Situação do funcionário</label>
        </div>
        <div class="input-field col s6">
          <input name="codigo_carg" id="codigo_carg" type="text" class="validate">
          <label for="codigo_carg">Código do Cargo</label>
        </div>
         <div class="input-field col s6">
          <input name="salario_base" id="salario_base" type="number" class="validate">
          <label for="salario_base">Salário Base</label>
        </div>
      </div>
      <div class="row">
        <button name="btn-cadastrar" type="submit" class="btn green">Cadastrar</button>
        <a href="funcionarios.php?id=<?php echo $dpto;?>"><span class="btn blue">Listar funcionários</span></a>
      </div>
    </form>
  </div>
        


<?php
//Footer
include_once '../INCLUDES/footer.php';
?>