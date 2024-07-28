<?php
require_once '../Models/Reservas.php';
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
        include '../views/Reserva/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->reserva->create()) {
                header('Location: /public/index.php');
            }
        }
        $this->render('Reserva/Cadastro' , $this->reserva);
    }
}
