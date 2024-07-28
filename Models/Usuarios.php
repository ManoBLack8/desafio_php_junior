<?php
class Usuarios 
{
    private $conn;
    private $nomeTabela = 'usuarios';
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $nivelAcesso;
    public $criadoEm;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->nomeTabela;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->nomeTabela . " SET nome=:nome, email=:email, senha=:senha";
        $stmt = $this->conn->prepare($query);
    
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $hashedPassword = password_hash($this->senha, PASSWORD_DEFAULT);
    
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $hashedPassword);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
    

    public function login() {
        $query = 'SELECT * FROM ' . $this->nomeTabela . ' WHERE email = :email AND senha = :senha';
        $stmt = $this->conn->prepare($query);
        
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        
        // Use password_hash() e password_verify() para maior segurança
        $hashedPassword = md5($this->senha);  // Substitua isso por password_hash() na criação de usuários
    
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $hashedPassword);
    
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorne os dados do usuário
        }
    
        return false;
    }
    
}
?>
