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
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
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
    <h1>Editar Cliente</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>" required><br><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" value="<?= $cliente['endereco'] ?>" required><br><br>

        <input type="submit" value="Salvar">
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>
