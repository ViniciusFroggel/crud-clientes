<?php
include '../includes/conexao.php';

$id = $_GET['id'] ?? '';

if (empty($id)) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM clientes WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("Location: index.php");
    exit;
}

$cliente = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    if ($nome != "" && $telefone != "" && $endereco != "") {
        $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao editar: " . $conn->error;
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
        <form name="formCliente" method="POST" onsubmit="return validarFormulario();">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" required>

            <input type="submit" value="Salvar">
            <a href="index.php" class="botao-voltar">Voltar</a>
        </form>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>
