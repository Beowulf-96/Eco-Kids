<?php
    require_once "conexao.php";

    class Administrador {
        private $id;
        private $nome;
        private $email;
        private $con;

        public function __construct() {
            $this->con = new Conexao();
        }

        private function existeEmail($email) {
            $sql = $this->con->conectar()->prepare("SELECT id FROM admin WHERE email =:email");
            $sql->bindParam(":email", $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetch();
            } else {
                $array = array();
            }
            return $array; 
        }

        public function adicionar($email, $nome) {
            $emailExistente = $this->existeEmail($email);
            if(count($emailExistente) == 0) {
                try{
                    $this->nome = $nome;
                    $this->email = $email;
                    $sql = $this->con->conectar()->prepare("INSERT INTO admin (nome,email) VALUES (:nome, :email)");
                    $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                    return TRUE;
                }catch(PDOException $e) {
                    return "Erro ao adicionar! " . $e->getMessage();
                }
            }else{
                return FALSE;
            }
        }

        public function listar() {
            try {
          $sql = $this->con->conectar()->prepare("SELECT * FROM admin");
          $sql->execute();
          return $sql->fetchALL();
        }catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function buscar($id) {
            try {
                $sql= $this->con->conectar()->prepare("SELECT * FROM admin WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();
                return $sql->fetch();
            } catch(PDOException $e) {
                return "Erro: " . $e->getMessage();
            }
        }
    }
?>