<div class="row justify-content-md-center">
    <div class="col-8">

    <?php

    if(isset($_GET['id_Aluno']) && isset($_POST['nome'])){

        $objAluno = new Aluno(
          $_GET['id_Aluno'],
          $_POST['nome'],
          $_POST['cpf'],
          $_POST['endereco'],
          $_POST['telefone'],
          $_POST['email']
        );
       
        if( $objAluno->salvar() ){
        

      ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Contato atualizado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
        }
        else{
      ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro ao atualizar contato! Por favor, tente novamente!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php

        }

      }


    ?>

    <?php 

      if(isset($_GET['id_Aluno'])){

        $objAluno = Aluno::get_aluno_por_id($_GET['id_Aluno']);

        if( $objAluno ){

    ?>

          <h1>Editar Cadastro de Aluno</h1>

          <p>Atualize os dados do formulário do aluno abaixo:</p>

          <form action="?pagina=processamento/atualizar_alunos&id_Aluno=<?= $objAluno->id ?>" method="POST">
              <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" class="form-control" name="nome" required placeholder="Digite seu Nome" value="<?= $objAluno->nome ?>" />
              </div>
              <div class="form-group">
                  <label>Cpf:</label>
                  <input type="text" class="form-control" name="cpf" required placeholder="Digite seu CPF" value="<?= $objAluno->cpf ?>" />
              </div>
              <div class="form-group">
                  <label>Endereço:</label>
                  <input type="text" class="form-control" name="endereco" required placeholder="Digite seu endereço" value="<?= $objAluno->endereco ?>" />
              </div>
              <div class="form-group">
                  <label>Telefone:</label>
                  <input type="text" class="form-control" name="telefone" required placeholder="Digite seu Telefone" value="<?= $objAluno->telefone ?>" />
              </div>
              <div class="form-group">
                  <label>E-mail:</label>
                  <input type="email" class="form-control" name="email" required placeholder="Digite seu e-mail" value="<?= $objAluno->email ?>" />
              </div>
              <div class="form-button">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#confirmUpdateModal">Salvar</a>
                  <a href="?pagina=inicio" class="btn btn-danger">Cancelar</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="confirmUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Atualizar contato</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Deseja atualizar este contato?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                      </div>
                  </div>
              </div>

          </form>

    <?php
        }
        else{
          echo "
            <center>
              <h2>Contato não encontrado!<h2>
            </center>";
        }
      }
      else{
        
        header("Location: ?pagina=inicio");

      }
    ?>

  </div>
</div>