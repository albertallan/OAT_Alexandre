<?php

if (isset($_GET["deletar_PessoaJ"])) {

  $objJuridica = new PessoaJ($_GET["deletar_PessoaJ"]);

  if ($objJuridica->deletar()) {
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

$vJuridica = PessoaJ::get_PessoaJ();

?>

<div class="row">
  <div class="col">
    <h1>Pessoas Juridicas Registradas</h1>
    <table class="table table-hover">
      <thead>
        <tr>
      
          <th scope="col">ID</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">E-mail</th>
          <th scope="col">Inscrição</th>
          <th scope="col">Razão</th>
          <th scope="col">Endereço</th>
          <th scope="col">Mensagem</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
        <?php
        foreach ($vJuridica as $objJuridica) {
        ?>

          <tr>

            <td class='align-middle'>
              <?= $objJuridica->id ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->cnpj ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->nome ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->telefone ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->email ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->inscricao ?>
            </td>
            <td class='align-middle'>
                <?= $objJuridica->razao?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->endereco ?>
            </td>
            <td class='align-middle'>
              <?= $objJuridica->mensagem ?>
            </td>
            <td>
              <a href="?pagina=processamento/atualizar_pessoaJ&id_PessoaJ=<?= $objJuridica->id ?>" class="btn btn-info">Editar</a>
            </td>
            <td>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $objJuridica->id ?>">Excluir</a>
            </td>

          </tr>

          <!-- Modal -->
          <div class="modal fade" id="confirmDeleteModal<?= $objJuridica->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Deletar contato</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja deletar o contato <b><?= $objJuridica->nome ?></b>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a href="?pagina=processamento/pessoaJ_registradas&deletar_PessoaJ=<?= $objJuridica->id ?>" class="btn btn-danger">Deletar</a>
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