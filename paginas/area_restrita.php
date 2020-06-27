<?php

if(!isset($_SESSION['id'])){

    header("Location: ?pagina=login");

}

?>

<div class="row justify-content-md-center">

    <div class="col-8">

        <h1>Área restrita</h1>

        <p>Bem-vindo <?= $_SESSION['nome'] ?> <?= $_SESSION['sobrenome'] ?>
        </p>

    </div>

</div>