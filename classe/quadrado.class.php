<?php
    class Quadrado{
        private $id;
        private $lado;
        private $cor;

        public function __construct($id, $lado, $cor){
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id; }

        public function getLado(){ return $this->lado; }
        public function setLado($lado){ $this->lado = $lado; }

        public function getCor(){ return $this->cor; }
        public function setCor($cor){ $this->cor = $cor; }
        
        public function area(){
            return $this->lado * $this->lado;
        }
        public function perimetro(){
            return $this->lado * 4;
        }

        public function diagonal(){
            return $this->lado * (sqrt(2));

        }

        public function insere() {

            require_once("conf/Conexao.php");

            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor) VALUES(:lado, :cor)');
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());

            return $stmt->execute();

        }

        function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindValue(':id', $id);
            
            return $stmt->execute();
        }

        public function editar(){

            require_once("conf/Conexao.php");

            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE quadrado
            SET lado = :lado, cor = :cor
            WHERE (id = :id);');
            $stmt->bindValue(':id', $this->getId());
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            return $stmt->execute();
        }
        
        public function __toString(){
            return "[Quadrado]<br>ID:".$this->getId()."<br>".
                    "Lado:".$this->getLado()."<br>".
                    "Cor:".$this->getCor()."<br>".
                    "Área:".$this->area()."<br>".
                    "Perimetro:".$this->perimetro()."<br>".
                    "Diagonal:".$this->diagonal()."<br>";
        }
        
        public function listarQuadrado(){
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT * FROM quadrado ORDER BY lado");
             return ($consulta->fetchall(PDO::FETCH_ASSOC));
            
        }
    }

?>