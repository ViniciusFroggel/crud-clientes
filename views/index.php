<?php
include '../includes/conexao.php';

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="create.php" class="botao">Cadastrar Novo Cliente</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td><?= $row['endereco'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
