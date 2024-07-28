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
        $query = 'INSERT INTO ' . $this->nomeTabela . ' SET sala_id=:sala_id, usuario_id=:usuario_id, dthora_inicio=:dthora_inicio, dthora_fim=:dthora_fim, criado_em=:criado_em';
        $stmt = $this->conn->prepare($query);

        $this->sala_id = htmlspecialchars(strip_tags($this->sala_id));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));
        $this->dthora_inicio = htmlspecialchars(strip_tags($this->dthora_inicio));
        $this->dthora_fim = htmlspecialchars(strip_tags($this->dthora_fim));
        $this->criadoEm = htmlspecialchars(strip_tags($this->criadoEm));


        $stmt->bindParam(':sala_id', $this->sala_id);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':dthora_inicio', $this->dthora_inicio);
        $stmt->bindParam(':dthora_fim', $this->dthora_fim);
        $stmt->bindParam(':criado_em', $this->criadoEm);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}