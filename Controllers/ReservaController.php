<?php
require_once 'Models/Reservas.php';
require_once 'Controller.php';
class ReservaController extends Controller 
{
    private $db;
    private $reserva;

    public function __construct() {
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->reserva = new Reservas($this->db);
    }

    public function index() {
        $stmt = $this->reserva->read();
        $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/Reserva/index.php';
    }

    public function create($sala_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->reserva->sala_id = $sala_id;
            $this->reserva->usuario_id = $_SESSION["usuario"]["id"];
            $this->reserva->dthora_inicio = $_POST["dthora_inicio"];
            $this->reserva->dthora_fim = $_POST["dthora_fim"];

            if ($this->reserva->conflictExists($this->reserva->sala_id, $this->reserva->dthora_inicio, $this->reserva->dthora_fim)) {
                $this->Modal("Já tem uma sala sendo usada nesse tempo", "danger");
                $this->render('Reserva/Cadastro');
            } else {
                if ($this->reserva->create()) {
                    header('Location: ?action=index');
                } else {
                    echo "Erro ao criar reserva.";
                }
            }
        }
        $this->render('Reserva/Cadastro');
    }

    public function filtrarSala() {
        $inicio = $_POST["dataFormSalaInicio"];
        $fim = $_POST["dataFormSalaFim"];
    
        $stmt = $this->reserva->getAllSalas();
        $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($salas as &$sala) {
            $sala['alerta'] = $this->reserva->conflictExists($sala['id'], $inicio, $fim) ? 'danger' : 'success';
        }
    
        $this->render('Sala/index', $salas);
    }

    
}
