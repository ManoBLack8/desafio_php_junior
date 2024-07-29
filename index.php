<?php
require_once 'Controllers/UsuarioController.php';
require_once 'Controllers/SalaController.php';
require_once 'Controllers/ReservaController.php';

$controller = new UsuarioController();
$salaController = new SalaController();
$reservaController = new ReservaController();
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
    case 'filtrarSala':
        $reservaController->filtrarSala();
        break;
    case 'reservar':
        $reservaController->create($_GET['id']);
        break;
    case 'cadastrar_sala':
        $salaController->create();
        break;
    case 'editar_sala':
        $salaController->editar($_GET['id']);
    case 'excluir_sala':
        $salaController->delete($_GET['id']);
    default:
        $controller->create();
        break;
}
?>
