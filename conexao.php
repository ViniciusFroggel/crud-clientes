<?php
// Dados de conexão extraídos da URL fornecida
$host = "dpg-d3qivd0gjchc73bd95fg-a.render.com";
$port = "5432";
$dbname = "crud_clientes_db";
$user = "crud_clientes_db_user";
$password = "izjSqf3ben7FTGwq4PNOpvUJPzB92GuP";

try {
    // Cria a conexão PDO
   $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

    // Configura o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: define o fetch padrão como associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}
?>
