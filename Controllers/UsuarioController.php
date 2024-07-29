<?php
require_once '../config/BancoDeDados.php';
require_once '../models/Usuarios.php';
require_once 'SalaController.php';
require_once 'Controller.php';

class UsuarioController extends Controller 
{
    private $db;
    private $usuario;
    private $salas;
    public function __construct() {
        @session_start();
        $database = new BancoDeDados();
        $this->db = $database->Conexao();
        $this->usuario = new Usuarios($this->db);
        $this->salas = new SalaController();
    }

    public function index() {
        if($this->usuarioLogado()){
            $stmt = $this->usuario->read();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->salas->index();
        }else{
            header('Location: ../Public/?action=create');
        }
        
    }

    public function create() {
        if($this->usuarioLogado()){
            header('Location: ../Public/?action=index');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->nome = trim($_POST['Unome']);
            $this->usuario->email = trim($_POST['Uemail']);
            $this->usuario->senha = trim($_POST['Usenha']);
            if($this->usuario->nome != '' or $this->usuario->email != ''){
                if($this->usuario->senha != ''){
                    if(!$this->verificarDuplicidadeEmail($this->usuario->email)){
                        if($this->usuario->senha == $_POST['Usenha2']){
                            if($this->usuario->create()) {
                                header('Location: ../Public/?action=login');
                            }
                        }else {
                            $this->Modal("Senha não são iguais", "danger");
                            $this->render('Usuario/Login');
                        }
                    }else{
                        $this->Modal("Email já existente", "danger");
                    }
                }else{
                    $this->Modal("Preencha o campo senha", "danger");
                }
                
            }else{
                $this->Modal("Preencha os Campos obrigatorios", "danger");
            }
                
        }
        $this->render('Usuario/Cadastro' , $this->usuario);
    }

    public function logar(){
        if($this->usuarioLogado()){
            header('Location: ../Public/?action=index');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->email = trim($_POST['Uemail']);
            $this->usuario->senha = trim($_POST['Usenha']);
            
            $resultadoUsuario = $this->usuario->Login();
            if ($resultadoUsuario) {               
                $this->usuario->id = $resultadoUsuario['id'];
                $this->usuario->nome = $resultadoUsuario['nome'];
                $this->usuario->email = $resultadoUsuario['email'];
                $this->usuario->nivelAcesso = $resultadoUsuario['nivel_acesso'];
                $this->usuario->criadoEm = $resultadoUsuario['criado_em'];
                $this->iniciarSessao();
                if ($this->usuario->nivelAcesso == 'admin') {
                    $this->salas->create();                        
                }else {
                    $this->salas->index();

                }
                
                
            }else{
                $this->Modal("Email ou Senha inválido", "danger");
                $this->render('Usuario/Login');
            }
            
        }else{
            $this->render('Usuario/Login');
        }
        
    }

    public function home(){
        if ($_SESSION["usuario"]["nivelAcesso"] == 'admin') {
            $this->salas->create();
        }else{
            $this->salas->index();
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
        if (@$_SESSION["usuario"]["id"] > 0) {
            return true;
        }
        return false;
    }

    public function sair(){
        session_destroy();
        header('Location: ../Public/?action=create');
    }

    public function verificarDuplicidadeEmail($email){
        if($this->usuario->buscarNoEmail($email)){
            return true;
        }
        return false;
    }
}
?>
