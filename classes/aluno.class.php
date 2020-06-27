<?php

    class Aluno{

        private $id;
        private $nome;
        private $cpf;
        private $endereco;
        private $telefone;
        private $email;
   

        function __construct($id=NULL, $nome="", $cpf="",$endereco="",$telefone="", $email=""){
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->endereco = $endereco;
            $this->telefone = $telefone;
            $this->email = $email;
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
                        aluno(nome,cpf,endereco,telefone,email)
                        values (:nome,:cpf,:endereco,:telefone,:email)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update aluno set 
                        nome=:nome,
                        cpf=:cpf,
                        endereco=:endereco,
                        telefone=:telefone,
                        email=:email
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    

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

            $sql = "DELETE FROM aluno WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_alunos(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "Select id, nome,cpf,endereco, telefone, email from aluno";

            $vAluno = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('cpf', $cpf);
                $stmt->bindColumn('endereco', $endereco);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objAluno = new Aluno(
                        $id,
                        $nome,
                        $cpf,
                        $endereco,
                        $telefone,
                        $email
                    );
    
                    $vAluno[] = $objAluno;

                }

                
                $stmt->closeCursor();
            }

            return $vAluno;
        }

        static function get_aluno_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "select id, nome, cpf ,endereco,telefone, email from aluno where id = :id";

            $objAluno = NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('cpf', $cpf);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objAluno = new Aluno(
                        $id,
                        $nome,
                        $cpf,
                        $endereco,
                        $telefone,
                        $email
                    );
    
                }
                
                $stmt->closeCursor();
            }

            return $objAluno;
        }

    }
