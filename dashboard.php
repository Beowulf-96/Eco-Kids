<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h1>asdasdasda</h1>
<a href="logout.php"> Sair </a>