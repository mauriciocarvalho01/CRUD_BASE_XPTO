<?php

//conexão
include_once '../PHP_ACTION/db_connect.php';

//Header
include_once '../INCLUDES/header.php';

//Message
include_once '../INCLUDES/message.php';

//Nav
include_once '../INCLUDES/menu.php';

if(isset($_GET['numero_func'])):
$id = mysqli_escape_string($connect, $_GET['numero_func']);

$sql = "SELECT * FROM func WHERE numero_func = '$id'";
$resultado = mysqli_query($connect, $sql);
$funcioanario = mysqli_fetch_array($resultado);


$departamento = "SELECT * FROM aloc 
INNER JOIN dpto USING(codigo_dpto)
WHERE numero_func = '$id'";
$dpto = mysqli_query($connect, $departamento);
$codigo_dpto = mysqli_fetch_array($dpto);


endif;

?>


<div class="row">
    <form class="col s6 m6 push-m3" action="../PHP_ACTION/update.php" method="POST">
      <div class="row">
          <div class="input-field col s6">
          <input  placeholder="Placeholder" name="numero_func" id="numero_func" type="text" class="validate disable" value="<?php echo $funcioanario['numero_func']?>">
          <label for="numero_func">Número</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="nome" id="nome" type="text" class="validate" value="<?php echo $funcioanario['nome_func']?>">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6">
          <input name="cpf" id="cpf" type="text" class="validate" value="<?php echo $funcioanario['cpf_func']?>">
          <label for="cpf">CPF</label>
        </div>
        <div class="input-field col s6">
          <input  name="data_admin" id="data_admin" type="date" class="validate" value="<?php echo $funcioanario['data_admissao_func']?>">
          <label for="data_admin">Data de Admissão</label>
        </div>
         <div class="input-field col s6">
          <input name="codigo_carg" id="codigo_carg" type="text" class="validate" value="<?php echo $funcioanario['codigo_carg']?>">
          <label for="codigo_carg">Código do Cargo</label>
        </div>
        <div class="input-field col s6">
          <input name="situacao_func" id="situacao_func" type="text" class="validate" value="<?php echo $funcioanario['situacao_func']?>">
          <label for="situacao_func">Situação do funcionário</label>
        </div>
         <div class="input-field col s6">
          <input name="salario_base" id="salario_base" type="number" class="validate" value="<?php echo $funcioanario['salario_base_func']?>">
          <label for="salario_base">Salário Base</label>
        </div>
        <div class="input-field col s6 hidden">
          <input  name="nome_dpto" id="nome_dpto" type="text" class="validate" value="<?php echo $codigo_dpto['nome_dpto']?>">
          <label for="nome_dpto">Departamento</label>
        </div>
        <div class="input-field col s6 hidden">
        <select name="dpto">
            <option value=""  selected><?php echo $codigo_dpto['codigo_dpto']?></option>
            <?php
            $cod = "SELECT * FROM dpto";
            $code = mysqli_query($connect, $cod);

            if(mysqli_num_rows($code) > 0):

             while($dept = mysqli_fetch_array($code)):
                ?>
                <option id="dpto" value="<?php echo $dept['codigo_dpto']?>"><?php echo $dept['codigo_dpto']?></option>
                <?php
                endwhile;
            endif;
            ?>
         </select>
         <label for="dpto">SIGLA</label>
        </div>
      </div>
      <div class="row">
        <button name="btn-editar" type="submit" class="btn green">Alterar</button>
        <a href="funcionarios.php?id=<?php echo $codigo_dpto['codigo_dpto'];?>"><span class="btn blue">Listar funcionários</span></a>
      </div>
    </form>
  </div>

<?php
//Footer
include_once '../INCLUDES/footer.php';
?>