<?php include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['email']]);
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Salvar</button>
</form>