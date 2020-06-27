<?php

require("classes/conexao_bd.class.php");
require("classes/contato.class.php");
require("classes/pessoaF.class.php");
require("classes/pessoaJ.class.php");
require("classes/aluno.class.php");
require("classes/membroLast.class.php");
require("config/config.php");

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
            <div class="d-flex">
                <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                    PAGINA INICIAL
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=inicio">HOME</a>
                    <div class="dropdown-divider"></div>
                    </div>
                </div>
                <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                    CADASTRO
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=contato">CADASTRO DE CONTATO</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=pessoafisica">CADASTRO DE PESSOA FISICA</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=pessoajuridica">CADASTRO DE PESSOA JURIDICA</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=aluno">CADASTRO DE ALUNO</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=membroLast">CADASTRO DE MEMBRO LAST</a>
                    </div>
                </div>
                <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                    REGISTRO
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=processamento/contatosregistrados">REGISTRO DE CADASTROS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=processamento/pessoaF_registradas">REGISTRO DE PESSOAS FISICAS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=processamento/pessoaJ_registradas">REGISTRO DE PESSOAS JURIDICAS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=processamento/alunos_registradas">REGISTRO DE ALUNOS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?pagina=processamento/membroLast_registradas">REGISTRO DE MEMBROS LAST</a>
                    </div>
                </div>            
            </div>
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
<script src="./js/jquery.mask.min.js"></script>
</body>
</html>