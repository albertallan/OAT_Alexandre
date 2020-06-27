<div class="row justify-content-md-center"> 
    <div class="col-8">
            
            <h1>Cadastro de Aluno:</h1>

            <p>Preencha o formulário de contato abaixo:</p>
            
            <div class="formulario">
                <form action="?pagina=processamento/processar_alunos" method="POST">
                                        
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome" />
                    </div>
                    <div class="form-group">
                        <label>Cpf:</label>
                        <input type="text" class="form-control" name="cpf" required placeholder="Digite seu Cpf" onkeypress="$(this).mask('00.000.000/0000-00')" />
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input type="text" class="form-control" name="endereco" required placeholder="Digite seu Endereço" />
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="text" class="form-control" name="telefone" required placeholder="Digite seu telefone" onkeypress="$(this).mask('(00) 0000-00009')"/>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" name="email" required placeholder="Digite seu e-mail" />
                    </div>                   
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
</div>