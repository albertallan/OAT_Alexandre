<?php

    class PessoaJ{

        private $id;
        private $cnpj;
        private $nome;
        private $telefone;
        private $email;
        private $inscricao;
        private $razao;
        private $endereco;
        private $mensagem;

        function __construct($id=NULL,$cnpj="", $nome="", $telefone="", $email="",$inscricao="",$razao="",$endereco="", $mensagem=""){
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->inscricao = $inscricao;
            $this->razao=$razao;
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
                        juridica(cnpj,nome,telefone,email,inscricao,razao,endereco,mensagem)
                        values (:cpf,:nome,:telefone,:email,:inscricao,:razao,:endereco,:mensagem)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":inscricao",$this->inscricao, PDO::PARAM_STR);
                    $stmt->bindParam(":razao", $this->razao, PDO::PARAM_STR);
                    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "Update juridica set
                        cnpj=:cnpj, 
                        nome=:nome,
                        telefone=:telefone,
                        email=:email,
                        inscricao=:inscricao,
                        razao=: razao,
                        endereco=:endereco,
                        mensagem=:mensagem
                        where id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_INT);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":inscricao", $this->inscricao, PDO::PARAM_INT);
                    $stmt->bindParam("razao", $this->razao, PDO::PARAM_STR);
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

            $sql = "DELETE FROM juridica WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_PessoaJ(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id,cnpj,nome,telefone,email,inscricao,razao,endereco,mensagem from juridica";

            $vJuridica = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('cnpj',$cnpj);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('inscricao',$inscricao);
                $stmt->bindColumn('razao',$razao);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('mensagem', $mensagem);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objJuridica = new PessoaJ(
                        $id,
                        $cnpj,
                        $nome,
                        $telefone,
                        $email,
                        $inscricao,
                        $razao,
                        $endereco,
                        $mensagem
                    );
    
                    $vJuridica[] = $objJuridica;

                }

                
                $stmt->closeCursor();
            }

            return $vJuridica;
        }

        static function get_pessoaj_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id,cpf,nome, telefone, email,inscricao,razao,endereco,mensagem from juridica where id = :id";

            $objJuridica = NULL;

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('cnpj',$cnpj);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('inscricao',$inscricao);
                $stmt->bindColumn('razao',$razao);
                $stmt->bindColumn('endereco',$endereco);
                $stmt->bindColumn('mensagem', $mensagem);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objJuridica = new PessoaJ(
                        $id,
                        $cnpj,
                        $nome,
                        $telefone,
                        $email,
                        $inscricao,
                        $razao,
                        $endereco,
                        $mensagem
                    );
    
                }
                
                $stmt->closeCursor();
            }

            return $objJuridica;
        }

    }
