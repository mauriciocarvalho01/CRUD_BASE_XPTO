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
$nome_dpto = mysqli_fetch_array($dpto);

$codigo_departamento = "SELECT * FROM aloc 
INNER JOIN dpto USING(codigo_dpto)
WHERE numero_func = '$id'";
$cod_dpto = mysqli_query($connect, $codigo_departamento);
$codigo_dpto = mysqli_fetch_array($cod_dpto);


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
          <input name="salario_base_func" id="salario_base_func" type="text" class="validate" value="<?php echo $funcioanario['salario_base_func']?>">
          <label for="salario_base_func">Salário</label>
        </div>
        <div class="input-field col s6">
        <select name="nome_dpto">
            <option value=""  selected><?php echo $nome_dpto['nome_dpto']?></option>
            <?php

            if(mysqli_num_rows($dpto) > 0):

             while($nome_dpto = mysqli_fetch_array($dpto)):
                ?>
                <option id="nome_dpto" value="<?php echo $nome_dpto['nome_dpto']?>"><?php echo $nome_dpto['nome_dpto']?></option>
                <?php
              endwhile;
            endif;
            ?>
         </select>
         <label for="nome_dpto">Nome do Departamento</label>
        </div>

        <div class="input-field col s6">
        <select name="dpto">
            <option value=""  selected><?php echo $codigo_dpto['codigo_dpto']?></option>
            <?php

           if(mysqli_num_rows($cod_dpto) > 0):

             while($cod_dpto = mysqli_fetch_array($cod_dpto)):
                ?>
                <option id="dpto" value="<?php echo $cod_dpto['codigo_dpto']?>"><?php echo $cod_dpto['codigo_dpto']?></option>
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
        <a href="alocar.php?numero_func=<?php echo $id;?>"><span class="btn blue">Alocar funcionário</span></a>
      </div>
    </form>
  </div>

<?php
//Footer
include_once '../INCLUDES/footer.php';
?>