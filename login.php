<?php
    session_start();
    require_once "admin.php";

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $admin = new Administrador();
        $logado = $admin->login($email, $senha);

        if($logado) {
            $_SESSION['admin_id'] = $logado['id'];
            $_SESSION['nome_id'] = $logado['nome'];
            header('Location: dashboard.php');
            exit;
        } else {
            echo "Email ou senha inválidos!";
        }
    }
?>

<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</Button>
</form>