<?php
require_once '../config/BancoDeDados.php';
require_once '../models/Usuarios.php';
require_once 'Controller.php';

class UsuarioController extends Controller 
{
    private $db;
    private $usuario;

    public function __construct() {
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->usuario = new Usuarios($this->db);
    }

    public function index() {
        $stmt = $this->usuario->read();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/Usuario/index.php';
    }

    public function create() {
        if($this->usuarioLogado()){
            $this->render('Usuario/index');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->nome = $_POST['Unome'];
            $this->usuario->email = $_POST['Uemail'];
            $this->usuario->senha = $_POST['Usenha'];
            if($this->usuario->senha == $_POST['Usenha2']){
                if ($this->usuario->create()) {
                    header('Location: /Usuario/index.php');
                }
            }
        }
        $this->render('Usuario/Cadastro' , $this->usuario);
    }

    public function logar(){
        if($this->usuarioLogado()){
            $this->render('Usuario/index');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->email = $_POST['Uemail'];
            $this->usuario->senha = $_POST['Usenha'];
            $resultadoUsuario = $this->usuario->Login();
            if ($resultadoUsuario) {               
                $this->usuario->id = $resultadoUsuario['id'];
                $this->usuario->nome = $resultadoUsuario['nome'];
                $this->usuario->email = $resultadoUsuario['email'];
                $this->usuario->nivelAcesso = $resultadoUsuario['nivel_acesso'];
                $this->usuario->criadoEm = $resultadoUsuario['criado_em'];
                $this->iniciarSessao();
                $this->render('Usuario/index');
                
            }else{
                $this->Modal("Email ou Senha inválido", "danger");

            }
            
        }else{
            $this->render('Usuario/Login');
        }
        
    }

    private function iniciarSessao(){
        if ($this->usuario) {
            $_SESSION["usuario"]["id"] = $this->usuario->id;
            $_SESSION["usuario"]["nome"] = $this->usuario->nome;
            $_SESSION["usuario"]["email"] = $this->usuario->email;
            $_SESSION["usuario"]["nivelAcesso"] = $this->usuario->nivelAcesso;
            $_SESSION["usuario"]["criadoEm"] = $this->usuario->criadoEm;
        }
        

    }

    public function usuarioLogado(){
        session_start();
        if ($_SESSION["usuario"]["id"] == null) {
            return true;
        }
        return false;
    }
}
?>
