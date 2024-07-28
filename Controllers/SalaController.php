<?php
require_once '../Config/BancoDeDados.php';
require_once '../Models/Salas.php';
require_once 'Controller.php';
class SalaController extends Controller 
{
    private $db;
    private $sala;

    public function __construct() {
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->sala = new Salas($this->db);
    }

    public function index() {
        $stmt = $this->sala->read();
        $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->render('Sala/index', $salas);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
        $stmt = $this->sala->read();
        $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->render('Sala/Cadastro' , $salas);
    }
}