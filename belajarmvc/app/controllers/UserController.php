<?php
require_once 'app/models/User.php';

class UserController {
    private $userModel;

    public function __construct($dbConnection)
    {
        $this->userModel = new User($dbConnection);
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once 'app/views/userListView.php';
    }

    public function show($id) {
        $user = $this->userModel->getUserById($id);
        require_once 'app/views/userView.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->tambahData($id, $name, $email);
            header('Location: index.php');
        } else {
            require_once 'app/views/input.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->editData($id, $name, $email);
            header('Location: index.php');
        } else {
            $user = $this->userModel->getUserById($id);
            require_once 'app/views/edit.php';
        }
    }

    public function hapus($id) {
        $this->userModel->hapusData($id);
        header('Location: index.php'); // Redirect back to the user list after deletion
    }
}
?>