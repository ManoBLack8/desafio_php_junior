<?php
class Salas 
{
    private $conn;
    private $nomeTabela = "salas";
    public $id;
    public $nome;
    public $capacidade;
    public $localizacao;
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
        $query = 'INSERT INTO ' . $this->nomeTabela . ' SET nome=:nome, capacidade=:capacidade, localizacao=:localizacao, criado_em=:criado_em';
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->capacidade = htmlspecialchars(strip_tags($this->capacidade));
        $this->localizacao = htmlspecialchars(strip_tags($this->localizacao));
        $this->criadoEm = htmlspecialchars(strip_tags($this->criadoEm));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':capacidade', $this->capacidade);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':criado_em', $this->criadoEm);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function salaPorID(){
        $query = 'SELECT * FROM ' . $this->nomeTabela . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update() {
        $query = 'UPDATE ' . $this->nomeTabela . ' SET nome = :nome, capacidade = :capacidade, localizacao = :localizacao WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->capacidade = htmlspecialchars(strip_tags($this->capacidade));
        $this->localizacao = htmlspecialchars(strip_tags($this->localizacao));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':capacidade', $this->capacidade);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->nomeTabela . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
