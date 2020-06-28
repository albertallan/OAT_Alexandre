<div class="row justify-content-md-center"> 
    <div class="col-8">
            
            <h1>Cadastro de Função:</h1>

            <p>Preencha o formulário de contato abaixo:</p>
            
            <div class="formulario">
                <form action="?pagina=processamento/processar_funcao" method="POST">
                                        
                    <div class="form-group">
                        <label>Nome da Função:</label>
                        <input type="text" class="form-control" name="nomefuncao" required placeholder="Digite o nome da função" />
                    </div>
                    <div class="form-group">
                        <label>Habilidade dessa função:</label>
                        <input type="text" class="form-control" name="habilidade" required placeholder="Digite a habilidade dessa função" />
                    </div>
                                     
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
</div>