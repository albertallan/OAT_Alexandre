<?php

if(isset($_POST['cnpj'])){

    $cnpj= $_POST['cnpj'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $inscricao = $_POST['inscricao'];
    $razao = $_POST['razao'];
    $endereco = $_POST['endereco'];
    $mensagem = $_POST['mensagem'];

  $sql = "Insert into 
          juridica(cnpj,nome,telefone,email,inscricao,razao,endereco,mensagem)
          values('$cnpj','$nome','$telefone','$email','$inscricao','$razao','$endereco','$mensagem')";

  if (mysqli_query($link, $sql) === TRUE){
     
  
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  Formulário enviado com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<a href ="?pagina=inicio" class="btn btn-primary">Voltar para Inicio</a>

<?php
}
else{ 
    var_dump(mysqli_error($link))
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Erro ao enviar o Formulario, tente novamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<a href ="?pagina=pessoajuridica" class="btn btn-primary">Voltar para formulario</a>

<?php
} 
?>

<?php
}
else{

    header("Location: ?pagina=pessoajuridica");

}

?>