<?php

if (isset($_GET["deletar_MembroLast"])) {

  $objMembroLast = new MembroLast($_GET["deletar_MembroLast"]);

  if ($objMembroLast->deletar()) {
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

$vMembroLast = MembroLast::get_membrolast();

?>

<div class="row">
  <div class="col">
    <h1>Membros da Last Registradas</h1>
    <table class="table table-hover">
      <thead>
        <tr>
      
          <th scope="col">ID</th>         
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">RA</th>
          <th scope="col">Telefone</th>
          <th scope="col">E-mail</th>
          <th scope="col">Função</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
        <?php
        foreach ($vMembroLast as $objMembroLast) {
        ?>

          <tr>

            <td class='align-middle'>
              <?= $objMembroLast->id ?>
            </td>
            <td class='align-middle'>
              <?= $objMembroLast->nome ?>
            </td>
            <td class='align-middle'>
              <?= $objMembroLast->cpf ?>
            </td>
            <td class='align-middle'>
              <?= $objMembroLast->telefone ?>
            </td>
            <td class='align-middle'>
              <?= $objMembroLast->email ?>
            </td>
            <td class='align-middle'>
              <?= $objMembroLast->funcao ?>
            </td>
            <td>
              <a href="?pagina=processamento/atualizar_membroLast&id_MembroLast=<?= $objMembroLast->id ?>" class="btn btn-info">Editar</a>
            </td>
            <td>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $objMembroLast->id ?>">Excluir</a>
            </td>

          </tr>

          <!-- Modal -->
          <div class="modal fade" id="confirmDeleteModal<?= $objMembroLast->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Deletar contato</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja deletar o contato <b><?= $objMembroLast->nome ?></b>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a href="?pagina=processamento/membroLast_registradas&deletar_MembroLast=<?= $objMembroLast->id ?>" class="btn btn-danger">Deletar</a>
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