<?php
    include 'header_admin.php';

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin/login.php");
    exit;
}
?>

<h1>asdasdasda</h1>
<a href="admin/logout.php"> Sair </a>