<?php include 'db.php';

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: index.php");
}

$clientes = $pdo->query("SELECT * FROM clientes")->fetchAll();
?>

<h1>Clientes</h1>
<a href="create.php">Novo Cliente</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nome'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><a href="?delete=<?= $c['id'] ?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
</table>