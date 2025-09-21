<?php
    $session_start();
    if (isset($_SESSION['usuario'])) {
        header("Location: admin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lant="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Eco Kids</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <form action="processa_login.php" method="POST">

        </form>
    </body>
</html>