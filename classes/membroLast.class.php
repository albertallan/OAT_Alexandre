<?php

    class MembroLast{

        private $id;
        private $nome;
        private $cpf;
        private $ra;
        private $endereco;
        private $telefone;
        private $email;
        private $funcao;
   

        function __construct($id=NULL, $nome="", $cpf="",$ra='',$endereco="",$telefone="", $email="",$funcao=''){
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->ra = $ra;
            $this->endereco = $endereco;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->funcao = $funcao;
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
                        membrolast(nome,cpf,ra,endereco,telefone,email,funcao)
                        values (:nome,:cpf,:ra,:endereco,:telefone,:email,:funcao)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":ra", $this->ra, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":funcao", $this->funcao, PDO::PARAM_STR);
                    

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update membrolast set 
                        nome=:nome,
                        cpf=:cpf,
                        ra=:ra,
                        endereco=:endereco,
                        telefone=:telefone,
                        email=:email,
                        funcao=:funcao
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":ra", $this->ra, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":funcao", $this->funcao, PDO::PARAM_STR);
                    

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

            $sql = "DELETE FROM membrolast WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_membrolast(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "Select id, nome,cpf,ra,endereco, telefone, email,funcao from membrolast";

            $vMembroLast = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('cpf', $cpf);
                $stmt->bindColumn('ra', $ra);
                $stmt->bindColumn('endereco', $endereco);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('funcao',$funcao);
                

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objMembroLast = new MembroLast(
                        $id,
                        $nome,
                        $cpf,
                        $ra,
                        $endereco,
                        $telefone,
                        $email,
                        $funcao
                    );
    
                    $vMembroLast[] = $objMembroLast;

                }

                
                $stmt->closeCursor();
            }

            return $vMembroLast;
        }

        static function get_membroLast_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "select id, nome, cpf,ra,endereco,telefone, email, funcao from membrolast where id = :id";

            $objMembroLast= NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('cpf', $cpf);
                $stmt->bindColumn('ra', $ra);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('funcao', $funcao);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objMembroLast = new MembroLast(
                        $id,
                        $nome,
                        $cpf,
                        $ra,
                        $endereco,
                        $telefone,
                        $email,
                        $funcao,
                    );
    
                }
                
                $stmt->closeCursor();
            }

            return $objMembroLast;
        }

    }
