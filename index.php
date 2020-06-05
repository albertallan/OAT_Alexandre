<?php


require("classes/conexao_bd.class.php");
require("classes/contato.class.php");
//require("classes/pessoaF.class.php");

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo de Estudos em Sustentabilidade e Tecnologia</title>
    
    
    <link href="./css/estilo.css" rel="stylesheet">

    <link href="./css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div id="container">
        <div id="header">
    
            <h1>Grupo de Estudos em Sustentabilidade e Tecnologia</h1>
            <p class="lead">Universidade do Vale do Rio Verde</p>

        </div>
    
        <div id="menu">

            <ul>
                <li><a href="?pagina=inicio">HOME</a></li>
                <li><a href="?pagina=contato">CONTATO</a></li>
                <li><a href="?pagina=pessoafisica">CADASTRO DE PESSOA FISICA</a></li>
                <li><a href="?pagina=pessoajuridica">CADASTRO DE PESSOA JURIDICA</a></li>
                <li><a href="?pagina=processamento/contatosregistrados">REGISTRO DE CADASTROS</a></li>
            </ul>

        </div>
        <div id="cols">
            <div id="col1">       
                <div id="main">

                    <?php

                    include("./paginas/$pagina.php");
                    
                    ?>    

                </div>
            </div>
        </div>
        <div id="footer">
            <div id="container">
                <p>Todos os direitos reservados</p>
            </div>
        </div>
    </div>

<script src="./js/jquery-3.4.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
</body>
</html>