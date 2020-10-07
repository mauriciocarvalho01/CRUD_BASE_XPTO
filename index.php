<?php

//Conexão com o banco para o READ
include_once 'PHP_ACTION/db_connect.php';

//Header
include_once 'INCLUDES/header.php';

//Message
include_once 'INCLUDES/message.php';

//Nav
include_once 'INCLUDES/menu.php';
?>

<div class="row">
    <div class="col s8 push-s2">
        <div class="row">

            <?php
                $sql = 'SELECT * FROM dpto';
                $resultado = mysqli_query($connect, $sql);
                
                while($dados = mysqli_fetch_array($resultado)):
            ?>
            <div class="col s2 m4 card1">
            <div class="card blue-grey">
                <div class="card-content white-text">
                <span class="card-title"><?php echo $dados['codigo_dpto']?></span>
                <p class="light"><?php echo $dados['nome_dpto']?></p>
                </div>
                <div class="card-action">
                <a href="Views/gerentes.php?id=<?php echo $dados['codigo_dpto'];?>">Gerente</a>
                <a href="Views/funcionarios.php?id=<?php echo $dados['codigo_dpto'];?>">Funcionários</a>
                </div>
            </div>
            </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php
//Footer
include_once 'INCLUDES/footer.php';
?>