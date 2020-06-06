<div class="row justify-content-md-center">
    <div class="col-8">

    <?php

    if(isset($_GET['id_PessoaJ']) && isset($_POST['nome'])){

        $objJuridica= new PessoaJ(
          $_GET['id_PessoaJ'],
          $_POST['cnpj'],
          $_POST['nome'],
          $_POST['telefone'],
          $_POST['email'],
          $_POST['inscricao'],
          $_POST['razao'],
          $_POST['endereco'],
          $_POST['mensagem']
        );
       
        if( $objJuridica->salvar() ){
        

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

      if(isset($_GET['id_PessoaJ'])){

        $objJuridica = PessoaJ::get_pessoaj_por_id($_GET['id_PessoaJ']);

        if( $objJuridica ){

    ?>

          <h1>Editar Contato</h1>

          <p>Atualize os dados do formulário de contato abaixo:</p>

          <form action="?pagina=processamento/atualizar_pessoaJ&id_PessoaJ=<?= $objJuridica->id ?>" method="POST">
              <div class="form-group">
                  <label>Cnpj:</label>
                  <input type="text" class="form-control" name="cnpj" required placeholder="Digite seu nome" value="<?= $objJuridica->cnpj ?>" />
              </div>
              <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome" value="<?= $objJuridica->nome ?>" />
              </div>
              <div class="form-group">
                  <label>Telefone:</label>
                  <input type="text" class="form-control" name="telefone" required placeholder="Digite seu telefone" value="<?= $objJuridica->telefone ?>" />
              </div>
              <div class="form-group">
                  <label>E-mail:</label>
                  <input type="email" class="form-control" name="email" required placeholder="Digite seu e-mail" value="<?= $objJuridica->email ?>" />
              </div>
              <div class="form-group">
                  <label>inscricao:</label>
                  <input type="text" class="form-control" name="inscricao" required placeholder="Digite sua data de nascimento" value="<?= $objJuridica->inscricao ?>" />
              </div>
              <div class="form-group">
                  <label>razao:</label>
                  <input type="text" class="form-control" name="razao" required placeholder="Digite seu endereço" value="<?= $objJuridica->razao ?>" />
              </div>
              <div class="form-group">
                  <label>endereco:</label>
                  <input type="text" class="form-control" name="endereco" required placeholder="Digite seu endereço" value="<?= $objJuridica->endereco ?>" />
              </div>
              <div class="form-group">
                  <label>Mensagem:</label>
                  <textarea name="mensagem" class="form-control" required placeholder="Digite sua mensagem..."><?= $objJuridica->mensagem ?></textarea>
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