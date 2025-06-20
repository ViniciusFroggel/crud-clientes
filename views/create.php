<?php
include '../includes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO clientes (nome, telefone, endereco) VALUES ('$nome', '$telefone', '$endereco')";

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
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" required><br><br>

        <input type="submit" value="Cadastrar">
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>
