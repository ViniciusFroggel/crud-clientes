
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_clientes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

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
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Adicionar Novo Cliente</h2>
    <form method="post">
        <p><input type="text" name="nome" placeholder="Nome" required></p>
        <p><input type="text" name="telefone" placeholder="Telefone" required></p>
        <p><input type="text" name="endereco" placeholder="Endereço" required></p>
        <p>
            <input type="submit" value="Salvar" class="button">
            <a href="index.php" class="button">Cancelar</a>
        </p>
    </form>
</div>
</body>
</html>
