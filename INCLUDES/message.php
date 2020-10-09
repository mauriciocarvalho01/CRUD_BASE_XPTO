<?php

//Sessão 
session_start();
if(isset($_SESSION['cadastro'])):
?>

<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['cadastro']; ?>'})
</script>

<?php
endif;

if(isset($_SESSION['altera_aloc'])):
?>

<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['altera_aloc']; ?>'})
</script>

<?php
endif;

if(isset($_SESSION['alterar'])):
?>
<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['alterar']; ?>'})
</script>
<?php
endif;

if(isset($_SESSION['aloc'])):
?>
<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['aloc']; ?>'})
</script>
<?php
endif;

if(isset($_SESSION['excluido'])):
?>
<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['excluido']; ?>'})
</script>
<?php
endif;
if(isset($_SESSION['excluidoaloc'])):
?>
<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['excluidoaloc']; ?>'})
</script>
<?php
endif;


//Limprar a sessão
session_unset();