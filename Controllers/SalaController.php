<?php
require_once 'Config/BancoDeDados.php';
require_once 'Models/Salas.php';
require_once 'ReservaController.php';
require_once 'Controller.php';
class SalaController extends Controller 
{
    private $db;
    private $sala;
    private $usuario;

    private $reserva;

    public function __construct() {
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->sala = new Salas($this->db);
        $reserva = new ReservaController();
    }

    public function index() {
        $stmt = $this->sala->read();
        $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->render('Sala/index', $salas);
    }

    public function create() {
        $usuario = new UsuarioController();
        if ($usuario->usuarioLogado()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->sala->nome = $_POST['nome'];
                $this->sala->capacidade = $_POST['capacidade'];
                $this->sala->localizacao = $_POST['localizacao'];
                $this->sala->create();
            }
            
            $stmt = $this->sala->read();
            $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->render('Sala/CadastroSala' , $salas);
        }else{
            header('Location: ?action=create');
        }
        
    }

    public function home(){
        $usuario = new UsuarioController();
        if ($usuario->usuarioLogado()) {
           
            $stmt = $this->sala->read();
            $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->render('Sala/Cadastro' , $salas);
        }else{
            header('Location: ?action=create');
        }
    }

    public function editar($sala_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->sala->id = $sala_id;
            $sala = $this->sala->salaPorID();
            $this->render('Sala/CadastroSala', $sala);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sala->id = $sala_id;
            $this->sala->nome = $_POST['nome'];
            $this->sala->capacidade = $_POST['capacidade'];
            $this->sala->localizacao = $_POST['localizacao'];
            $this->sala->update();
            header('Location: ?action=index');
        }
    }

    public function delete($sala_id){
        $this->sala->id = $sala_id;
        $this->sala->delete();
        $this->render('Sala/Cadastro');
    }
}