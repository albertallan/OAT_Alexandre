<?php

    class PessoaF{

        private $id;
        private $cpf;
        private $nome;
        private $telefone;
        private $email;
        private $datanascimento;
        private $endereco;
        private $mensagem;

        function __construct($id=NULL,$cpf="", $nome="", $telefone="", $email="",$datanascimento="",$endereco="", $mensagem=""){
            $this->id = $id;
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->datanascimento = $datanascimento;
            $this->endereco = $endereco;
            $this->mensagem = $mensagem;
        }

        function __get($atributo){
            return $this->$atributo;
        }

        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __toString(){
            return $this->nome . " (" . $this->id . ")";
        }

        function salvar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            if($this->id === NULL){
                $sql = "Insert into 
                        fisica(cpf,nome,telefone,email,datanascimento,endereco,mensagem)
                        values (:cpf,:nome,:telefone,:email,:datanascimento,:endereco,:mensagem)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":datanascimento",$this->datanascimento, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update fisica set
                        cpf=:cpf, 
                        nome=:nome,
                        telefone=:telefone,
                        email=:email,
                        datanascimento=:datanascimento,
                        endereco=:endereco,
                        mensagem=:mensagem
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_INT);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":datanascimento", $this->datanascimento, PDO::PARAM_INT);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    return TRUE;
                }

            }
            
            return FALSE;
        }

        function deletar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "DELETE FROM fisica WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_PessoaF(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "Select id,cpf,nome,telefone,email,datanascimento,endereco,mensagem from fisica";

            $vFisica = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('cpf',$cpf);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('datanascimento',$datanascimento);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('mensagem', $mensagem);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objFisica = new PessoaF(
                        $id,
                        $cpf,
                        $nome,
                        $telefone,
                        $email,
                        $datanascimento,
                        $endereco,
                        $mensagem
                    );
    
                    $vFisica[] = $objFisica;

                }

                
                $stmt->closeCursor();
            }

            return $vFisica;
        }

        static function get_pessoaf_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id,cpf,nome, telefone, email,datanascimento,endereco,mensagem from fisica where id = :id";

            $objFisica = NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('cpf',$cpf);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('datanascimento',$datanascimento);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('mensagem', $mensagem);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objFisica = new PessoaF(
                        $id,
                        $cpf,
                        $nome,
                        $telefone,
                        $email,
                        $datanascimento,
                        $endereco,
                        $mensagem
                    );
    
                }
                
                $stmt->closeCursor();
            }

            return $objFisica;
        }

    }
