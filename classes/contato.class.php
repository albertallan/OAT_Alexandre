<?php

    class Contato{

        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $texto;

        function __construct($id=NULL, $nome="", $telefone="", $email="", $texto=""){
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->texto = $texto;
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
                        contato(nome,telefone,email,texto)
                        values (:nome,:telefone,:email,:texto)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":texto", $this->texto, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update contato set 
                        nome=:nome,
                        telefone=:telefone,
                        email=:email,
                        texto=:texto
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":texto", $this->texto, PDO::PARAM_STR);

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

            $sql = "DELETE FROM contato WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_contatos(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "Select id, nome, telefone, email, texto from contato";

            $vContatos = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('texto', $texto);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objContato = new Contato(
                        $id,
                        $nome,
                        $telefone,
                        $email,
                        $texto
                    );
    
                    $vContatos[] = $objContato;

                }

                
                $stmt->closeCursor();
            }

            return $vContatos;
        }

        static function get_contato_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "select id, nome, telefone, email, texto from contato where id = :id";

            $objContato = NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('texto', $texto);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objContato = new Contato(
                        $id,
                        $nome,
                        $telefone,
                        $email,
                        $texto
                    );
    
                }
                
                $stmt->closeCursor();
            }

            return $objContato;
        }

    }
