<?php
require_once '../controllers/UsuarioController.php';

$controller = new UsuarioController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    default:
        $controller->index();
        break;
}
?>
