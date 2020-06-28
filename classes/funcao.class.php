<?php

    class Funcao{

        private $id;
        private $nomefuncao;
        private $habilidade;

   

        function __construct($id=NULL, $nomefuncao="", $habilidade=""){
            $this->id = $id;
            $this->nomefuncao = $nomefuncao;
            $this->habilidade = $habilidade;

        }

        function __get($atributo){
            return $this->$atributo;
        }

        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __toString(){
            return $this->nomefuncao . " (" . $this->id . ")";
        }

        function salvar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            if($this->id === NULL){
                $sql = "Insert into 
                        funcao(nomefuncao,habilidade)
                        values (:nomefuncao,:habilidade)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nomefuncao", $this->nomefuncao, PDO::PARAM_STR);
                    $stmt->bindParam(":habilidade", $this->habilidade, PDO::PARAM_STR);
                                   
                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update funcao set 
                        nomefuncao=:nomefuncao,
                        habilidade=:habilidade
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":nomefuncao", $this->nomefuncao, PDO::PARAM_STR);
                    $stmt->bindParam(":habilidade", $this->habilidade, PDO::PARAM_STR);
                    
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

            $sql = "DELETE FROM funcao WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_funcao(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "Select id,nomefuncao,habilidade from funcao";

            $vFuncao = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nomefuncao', $nomefuncao);
                $stmt->bindColumn('habilidade', $habilidade);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objFuncao = new Funcao(
                        $id,
                        $nomefuncao,
                        $habilidade
                    );
    
                    $vFuncao[] = $objFuncao;

                }

                
                $stmt->closeCursor();
            }

            return $vFuncao;
        }

        static function get_funcao_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "select id, nomefuncao, habilidade from funcao where id = :id";

            $objFuncao = NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nomefuncao', $nomefuncao);
                $stmt->bindColumn('habilidade', $habilidade);
               
                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objFuncao = new Funcao(
                        $id,
                        $nomefuncao,
                        $habilidade
                    );
                }
                
                $stmt->closeCursor();
            }

            return $objFuncao;
        }

    }
