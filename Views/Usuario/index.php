<?php
require_once '../Controllers/SalaController.php';
$controller = new SalaController();



switch ($_SESSION["usuario"]["nivelAcesso"]) {
    case 'admin':
        $controller->create();
        break;
    
    default:
        $controller->index();
        break;
}
?>


