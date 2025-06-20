
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_clientes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}

$sql = "SELECT * FROM clientes WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Editar Cliente</h2>
    <form method="post">
        <p><input type="text" name="nome" value="<?= $row['nome'] ?>" required></p>
        <p><input type="text" name="telefone" value="<?= $row['telefone'] ?>" required></p>
        <p><input type="text" name="endereco" value="<?= $row['endereco'] ?>" required></p>
        <p>
            <input type="submit" value="Atualizar" class="button">
            <a href="index.php" class="button">Cancelar</a>
        </p>
    </form>
</div>
</body>
</html>
