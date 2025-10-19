<?php
include '../includes/conexao.php';

// Pega o ID do cliente e a página de redirecionamento
$id = $_GET['id'] ?? '';
$redirect = $_GET['redirect'] ?? 'index.php'; // Se não enviar, volta para index.php por padrão

if (!empty($id)) {
    // Query para deletar
    $sql = "DELETE FROM clientes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a página de onde veio
        header("Location: $redirect");
        exit;
    } else {
        echo "Erro ao excluir cliente: " . $conn->error;
    }
} else {
    // Se não tiver ID, apenas volta
    header("Location: $redirect");
    exit;
}
?>
