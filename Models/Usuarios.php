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
    
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', md5($this->senha));
    
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
        $senhacrip = md5($this->senha);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $senhacrip);
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorne os dados do usuário
        }
    
        return false;
    }


    public function buscarNoEmail($email){
        $query = 'SELECT * FROM ' . $this->nomeTabela . ' WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        
        $this->email = htmlspecialchars(strip_tags($email));
        $stmt->bindParam(':email', $this->email);
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorne os dados do usuário
        }
        return false;

    }
    
}
?>
