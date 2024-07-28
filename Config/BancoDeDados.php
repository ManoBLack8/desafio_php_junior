<?php
class BancoDeDados {
    private $servidor = 'localhost';
    private $db_nome = 'desafio_php';
    private $usuario = 'root';
    private $senha = '';
    public $conn;

    public function Conexao() {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->servidor . ';dbname=' . $this->db_nome, $this->usuario, $this->senha);
            $this->conn->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Erro na Conexão: ' . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
