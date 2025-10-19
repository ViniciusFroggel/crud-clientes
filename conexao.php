<?php
$host = "dpg-d3qivd0gjchc73bd95fg-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "crud_clientes_db";
$user = "crud_clientes_db_user";
$password = "izjSqf3ben7FTGwq4PNOpvUJPzB92GuP";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}
