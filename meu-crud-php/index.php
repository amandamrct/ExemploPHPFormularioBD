<?php
// Conectar ao banco de dados SQLite
$db = new SQLite3('banco.db');

// Criar a tabela se não existir
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT
)");

// Consultar todos os usuários
$results = $db->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP e SQLite</title>
</head>
<body>
<h1>Lista de Usuários</h1>
<table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>F
    <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $results->fetchArray()) : ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td>
    <a href="action.php?action=edit&id=<?php echo $row['id']; ?>">Editar</a>
    <a href="action.php?action=delete&id=<?php echo $row['id']; ?>" 
    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
    </td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<h2>Adicionar Usuário</h2>
<form action="action.php?action=insert" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit">Adicionar</button>
</form>

</body>
</html>