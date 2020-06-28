<?php

if (isset($_GET["deletar_Funcao"])) {

  $objFuncao = new Funcao($_GET["deletar_Funcao"]);

  if ($objFuncao->deletar()) {
    echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Contato deletado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
  } else {
    echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Erro ao deletar contato! Por favor, tente novamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
  }
}

$vFuncao = Funcao::get_funcao();

?>

<div class="row">
  <div class="col">
    <h1>Funções Registradas</h1>
    <table class="table table-hover">
      <thead>
        <tr>
      
          <th scope="col">ID</th>         
          <th scope="col">NOME DA FUNÇÃO</th>
          <th scope="col">HABILIDADE</th>
          
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
        <?php
        foreach ($vFuncao as $objFuncao) {
        ?>

          <tr>

            <td class='align-middle'>
              <?= $objFuncao->id ?>
            </td>
            <td class='align-middle'>
              <?= $objFuncao->nomefuncao ?>
            </td>
            <td class='align-middle'>
              <?= $objFuncao->habilidade ?>
            </td>
            <td>
              <a href="?pagina=processamento/atualizar_funcao&id_Funcao=<?= $objFuncao->id ?>" class="btn btn-info">Editar</a>
            </td>
            <td>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $objFuncao->id ?>">Excluir</a>
            </td>

          </tr>

          <!-- Modal -->
          <div class="modal fade" id="confirmDeleteModal<?= $objFuncao->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Deletar contato</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja deletar o contato <b><?= $objFuncao->nomefuncao ?></b>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a href="?pagina=processamento/funcao_registradas&deletar_Funcao=<?= $objFuncao->id ?>" class="btn btn-danger">Deletar</a>
                </div>
              </div>
            </div>
          </div>

        <?php
        }
        ?>

      </tbody>
    </table>

  </div>
</div>