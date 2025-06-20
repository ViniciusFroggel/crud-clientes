<?php
include '../includes/conexao.php';

// Buscar clientes
$sql = "SELECT * FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Clientes</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Gerenciamento de Clientes</h1>

        <div class="botoes-dashboard">
            <a href="create.php" class="botao">Cadastrar Cliente</a>
            <button onclick="toggleLista()" class="botao">Listar Clientes</button>
        </div>

        <div id="lista-clientes" style="display: none; overflow: hidden; margin-top: 30px;">
            <h2>Lista de Clientes</h2>

            <div class="filtro-pesquisa">
                <input type="text" id="pesquisa" placeholder="Pesquisar por nome, código, telefone ou endereço...">
            </div>

            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($cliente = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($cliente['id']) ?></td>
                                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                                <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $cliente['id'] ?>" class="botao-acao editar">Editar</a>
                                    <a href="delete.php?id=<?= $cliente['id'] ?>&redirect=index.php"
                                       class="botao-acao excluir"
                                       onclick="return confirmarExclusao();">
                                       Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="aviso">Nenhum cliente cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>
