<?php
include 'includes/conexao.php';
$result = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Clientes</title>
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
                    <?php while($cli = $result->fetch_assoc()): ?>
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
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="aviso">Nenhum cliente cadastrado.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 - Sistema de Clientes | Todos os direitos reservados</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
