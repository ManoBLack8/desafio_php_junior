<?php 
class Controller 
{

    public function __construct(){
        if(isset($_GET['acao'])){
            $func = $_GET['acao'];
            $func();
        }
        
    }
    protected function render($view, $data = []){
        include 'Views/Layout/header.php';
        include 'Views/'.$view.'.php';
        include 'Views/Layout/footer.php';
    }

    protected function Modal($texto, $alerta){
        include 'Views/Layout/header.php';
        include 'Views/Modals/modal.php';
        include 'Views/Layout/footer.php';
        include 'Views/Modals/executarModal.php';
    }
}