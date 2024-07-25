<?php
require_once '../config/BancoDeDados.php';
require_once '../models/Usuarios.php';

class UsuarioController {
    private $db;
    private $user;

    public function __construct() {
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->user = new Usuarios($this->db);
    }

    public function index() {
        $stmt = $this->user->read();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/Usuario/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->nome = $_POST['nome'];
            $this->user->email = $_POST['email'];
            if ($this->user->create()) {
                header('Location: /public/index.php');
            }
        }
        include '../views/Usuario/cadastro.php';
    }
}
?>
