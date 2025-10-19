<?php
include 'conexao.php';

// Consulta todos os clientes
$stmt = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
$clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Clientes</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">Sistema de Clientes</div>
        <nav>
            <a href="index.php" class="botao">Home</a>
            <a href="create.php" class="botao">Cadastrar</a>
        </nav>
    </header>

    <div class="container">
        <h1>Dashboard de Clientes</h1>

        <div class="botoes-dashboard">
            <a href="create.php" class="botao">Cadastrar Cliente</a>
            <button onclick="toggleLista()" class="botao">Listar Clientes</button>
        </div>

        <div id="lista-clientes" style="display:none;">
            <h2>Lista de Clientes</h2>

            <div class="filtro-pesquisa">
                <input type="text" id="pesquisa" placeholder="Pesquisar por nome, código, telefone ou endereço...">
            </div>

            <?php if (count($clientes) > 0): ?>
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
                    <?php foreach($clientes as $cli): ?>
                    <tr>
                        <td data-label="Código"><?= htmlspecialchars($cli['id']) ?></td>
                        <td data-label="Nome"><?= htmlspecialchars($cli['nome']) ?></td>
                        <td data-label="Telefone"><?= htmlspecialchars($cli['telefone']) ?></td>
                        <td data-label="Endereço"><?= htmlspecialchars($cli['endereco']) ?></td>
                        <td data-label="Ações">
                            <a href="edit.php?id=<?= $cli['id'] ?>" class="botao-acao editar">Editar</a>
                            <a href="delete.php?id=<?= $cli['id'] ?>" class="botao-acao excluir" onclick="return confirmarExclusao()">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="aviso">Nenhum cliente cadastrado.</div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 - Sistema de Clientes | Todos os direitos reservados</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
