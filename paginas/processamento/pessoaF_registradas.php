<?php

if (isset($_GET["deletar_PessoaF"])) {

  $objFisica = new PessoaF($_GET["deletar_PessoaF"]);

  if ($objFisica->deletar()) {
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

$vFisica = PessoaF::get_PessoaF();

?>

<div class="row">
  <div class="col">
    <h1>Pessoas Fisicas Registradas</h1>
    <table class="table table-hover">
      <thead>
        <tr>
      
          <th scope="col">ID</th>
          <th scope="col">CPF</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">E-mail</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Endereço</th>
          <th scope="col">Mensagem</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
        <?php
        foreach ($vFisica as $objFisica) {
        ?>

          <tr>

            <td class='align-middle'>
              <?= $objFisica->id ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->cpf ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->nome ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->telefone ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->email ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->datanascimento ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->endereco ?>
            </td>
            <td class='align-middle'>
              <?= $objFisica->mensagem ?>
            </td>
            <td>
              <a href="?pagina=processamento/atualizar_pessoaF&id_PessoaF=<?= $objFisica->id ?>" class="btn btn-info">Editar</a>
            </td>
            <td>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $objFisica->id ?>">Excluir</a>
            </td>

          </tr>

          <!-- Modal -->
          <div class="modal fade" id="confirmDeleteModal<?= $objFisica->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Deletar contato</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja deletar o contato <b><?= $objFisica->nome ?></b>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a href="?pagina=processamento/pessoaF_registradas&deletar_PessoaF=<?= $objFisica->id ?>" class="btn btn-danger">Deletar</a>
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