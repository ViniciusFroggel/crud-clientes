<?php
include '../includes/conexao.php';

$id = $_GET['id'];

// Consulta o cliente pelo ID
$sql = "SELECT * FROM clientes WHERE id = $id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();

// Atualiza os dados se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    if ($nome != "" && $telefone != "" && $endereco != "") {
        $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro: " . $conn->error;
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>

        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" required>

            <div class="botoes-form">
                <button type="submit" class="botao-salvar">Salvar</button>
                <a href="index.php" class="botao-voltar">Voltar</a>
            </div>
        </form>
    </div>

    <!-- JS Externo -->
    <script src="../assets/js/script.js"></script>
</body>
</html>
