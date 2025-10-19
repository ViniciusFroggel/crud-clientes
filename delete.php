<?php
include 'conexao.php'; // Conexão PDO com PostgreSQL

// Pega o ID do cliente e a página de redirecionamento
$id = $_GET['id'] ?? '';
$redirect = $_GET['redirect'] ?? 'index.php'; // padrão: index.php

if (!empty($id)) {
    try {
        // Query para deletar usando prepared statement
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona de volta
        header("Location: $redirect");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir cliente: " . $e->getMessage();
    }
} else {
    // Se não tiver ID, volta para a página
    header("Location: $redirect");
    exit;
}
?>
