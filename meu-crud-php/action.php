<?php
$db = new SQLite3('banco.db');

$action = $_GET['action'] ?? '';

if ($action === 'insert') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $email) {
        $stmt = $db->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $stmt->execute();
    }

    header('Location: index.php');
    exit;
}

if ($action === 'delete') {
    $id = $_GET['id'] ?? '';

    if ($id) {
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    header('Location: index.php');
    exit;
}

// Pode adicionar mais ações como 'edit' aqui
?>
