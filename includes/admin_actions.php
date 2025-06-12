<?php
session_start();
require_once 'check_admin.php'; // Script de segurança
require_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$action = $_REQUEST['action'] ?? '';

switch ($action) {
    case 'add_destino':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = "INSERT INTO destinos (nome, pais, descricao, preco, imagem) VALUES (:nome, :pais, :descricao, :preco, :imagem)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $_POST['nome']);
            $stmt->bindParam(':pais', $_POST['pais']);
            $stmt->bindParam(':descricao', $_POST['descricao']);
            $stmt->bindParam(':preco', $_POST['preco']);
            $stmt->bindParam(':imagem', $_POST['imagem']);
            $stmt->execute();
        }
        break;

    case 'delete_destino':
        if (isset($_GET['id'])) {
            $query = "DELETE FROM destinos WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
        }
        break;
}

// Redireciona de volta para o painel do admin após a ação
header("Location: ../admin_dashboard.php");
exit();