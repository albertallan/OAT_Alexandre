<div class="row justify-content-md-center">
<div class="row">
    <div class="col">

    <?php

      if(isset($_POST['nome'])){

        $objMembroLast = new MembroLast(
          NULL,         
          $_POST['nome'],
          $_POST['cpf'],
          $_POST['ra'],
          $_POST['endereco'],
          $_POST['telefone'],
          $_POST['email'],
          $_POST['funcao']
        );

        if( $objMembroLast->salvar() ){

      ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Formulário enviado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <center>
        <a href="?pagina=inicio" class="btn btn-primary">Voltar para Início</a>
      </center>

      <?php
        }
        else{
      ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro ao enviar formulário! Por favor, tente novamente!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <center>
        <a href="?pagina=contato" class="btn btn-primary">Voltar para Contato</a>
      </center>

      <?php

        }

      }
      else{
        
        header("Location: ?pagina=inicio");

      }

    ?>

  </div>
</div>