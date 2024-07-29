<?php 
class Reservas 
{
    
    private $conn;
    private $nomeTabela = "reservas";
    public $id;
    public $sala_id;
    public $usuario_id;
    public $dthora_inicio;
    public $dthora_fim;
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
        $query = 'INSERT INTO ' . $this->nomeTabela . ' SET sala_id=:sala_id, usuario_id=:usuario_id, dthora_inicio=:dthora_inicio, dthora_fim=:dthora_fim, criado_em = NOW()';
        $stmt = $this->conn->prepare($query);

        $this->sala_id = htmlspecialchars(strip_tags($this->sala_id));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));
        $this->dthora_inicio = htmlspecialchars(strip_tags($this->dthora_inicio));
        $this->dthora_fim = htmlspecialchars(strip_tags($this->dthora_fim));


        $stmt->bindParam(':sala_id', $this->sala_id);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':dthora_inicio', $this->dthora_inicio);
        $stmt->bindParam(':dthora_fim', $this->dthora_fim);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function buscarReservaEntre(){
        $and = "";
        if($this->dthora_fim == null){
            $and = "AND dthora_fim < :dthora_fim";
        }
        $query = 'SELECT * FROM ' . $this->nomeTabela.' WHERE dthora_inicio < :dthora_inicio'.$and;
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':dthora_inicio', $this->dthora_inicio);
        if($this->dthora_fim == null){
            $stmt->bindParam(':dthora_fim', $this->dthora_fim);
        }

        $stmt->execute();
        return $stmt;
    }

    public function conflictExists($sala_id, $inicio, $fim) {
        $query = 'SELECT * FROM ' . $this->nomeTabela . ' WHERE sala_id = :sala_id AND (dthora_inicio < :fim AND dthora_fim > :inicio)';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':sala_id', $sala_id);
        $stmt->bindParam(':inicio', $inicio);
        $stmt->bindParam(':fim', $fim);
    
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }

    public function getAllSalas() {
        $query = 'SELECT * FROM salas';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}