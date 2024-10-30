<?php
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($action) {
    case 'show':
        if ($id) $controller->show($id);
        break;
    case 'tambah':
        $controller->tambah();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'hapus':
        if ($id) $controller->hapus($id);
        break;
    default:
        $controller->index();
        break;
}
?>