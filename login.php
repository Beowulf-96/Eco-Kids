<?php
    session_start();
    require_once "admin.php";

<<<<<<< HEAD
    if($_SERVER["REQUEST_METHOD"] == "POST") {
=======
    if($_SERVER["REQUEST_METHOD"] === 'POST') {
>>>>>>> c3aced386e236227c1ff9f3fb1a79df74e3df241
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $admin = new Administrador();
<<<<<<< HEAD
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
=======
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
>>>>>>> c3aced386e236227c1ff9f3fb1a79df74e3df241
