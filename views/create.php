<?php
include '../includes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    if ($nome != "" && $telefone != "" && $endereco != "") {
        $sql = "INSERT INTO clientes (nome, telefone, endereco) VALUES ('$nome', '$telefone', '$endereco')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
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
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Cliente</h1>
        <form name="formCliente" method="POST" onsubmit="return validarFormulario();">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="(XX) 9XXXX-XXXX" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" placeholder="Digite o endereço" required>

            <input type="submit" value="Cadastrar">
            <a href="index.php" class="botao-voltar">Voltar</a>
        </form>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>
