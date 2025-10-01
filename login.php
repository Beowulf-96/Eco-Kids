<?php
    session_start();
    require_once "admin.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $admin = new Administrador();
        $admin->autenticar($email, $senha);

        if($usuario) {
            $_SESSION['admin_id'] = $usuario['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            $erro = "Email ou senha incorretos.";
        }
    }
?>