<?php
include 'conexao.php'; // conexão PDO com PostgreSQL

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

// Busca o cliente
$stmt = $conn->prepare("SELECT * FROM clientes WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$cliente = $stmt->fetch();

// Atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    // Validação de formato de telefone
    $regexTelefone = '/^\(\d{2}\) \d{4,5}-\d{4}$/';
    if (!preg_match($regexTelefone, $telefone)) {
        echo "<script>alert('Formato de telefone inválido. Use (XX) XXXXX-XXXX'); window.history.back();</script>";
        exit;
    }

    if ($nome && $telefone && $endereco) {
        try {
            $stmt = $conn->prepare("UPDATE clientes SET nome = :nome, telefone = :telefone, endereco = :endereco WHERE id = :id");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">Sistema de Clientes</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="create.php">Cadastrar</a>
        </nav>
    </header>

    <div class="container">
        <h1>Editar Cliente</h1>

        <form method="POST">
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

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 - Sistema de Clientes | Todos os direitos reservados</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
