<?php
require_once '../controllers/UsuarioController.php';

$controller = new UsuarioController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'login':
            $controller->logar();
        break;
    case 'index':
            $controller->index();
            break;
    default:
        $controller->create();
        break;
}
?>
