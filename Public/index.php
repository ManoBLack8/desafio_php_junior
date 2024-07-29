<?php
require_once '../controllers/UsuarioController.php';

$controller = new UsuarioController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'sair':
        $controller->sair();
        break;
    case 'login':
            $controller->logar();
        break;
    case 'index':
            $controller->index();
            break;
    case 'home':
        $controller->home();
        break;
    default:
        $controller->create();
        break;
}
?>
