<?php
include '../includes/conexao.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $sql = "DELETE FROM clientes WHERE id = $id";
    $conn->query($sql);
}

header("Location: index.php");
exit;
?>
