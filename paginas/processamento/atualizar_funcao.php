<div class="row justify-content-md-center">
    <div class="col-8">

    <?php

    if(isset($_GET['id_Funcao']) && isset($_POST['nomefuncao'])){

        $objFuncao = new Funcao(
          $_GET['id_Funcao'],
          $_POST['nomefuncao'],
          $_POST['habilidade']
        );
       
        if( $objFuncao->salvar() ){
        

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

      if(isset($_GET['id_Funcao'])){

        $objFuncao = Funcao::get_funcao_por_id($_GET['id_Funcao']);

        if( $objFuncao ){

    ?>

          <h1>Editar Formulario de Função</h1>

          <p>Atualize os dados do formulário do aluno abaixo:</p>

          <form action="?pagina=processamento/atualizar_funcao&id_Funcao=<?= $objFuncao->id ?>" method="POST">
              <div class="form-group">
                  <label>Nome da Função:</label>
                  <input type="text" class="form-control" name="nomefuncao" required placeholder="Digite o nome da função" value="<?= $objFuncao->nomefuncao ?>" />
              </div>
              <div class="form-group">
                  <label>Habilidade de Função:</label>
                  <input type="text" class="form-control" name="habilidade" required placeholder="Digite a habilidade da função" value="<?= $objFuncao->habilidade?>" />
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