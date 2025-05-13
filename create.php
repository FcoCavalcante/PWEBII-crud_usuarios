<?php
require 'conexao.php';

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $mensagem = "✅ Usuário cadastrado com sucesso!";
    } else {
        $mensagem = "❌ Erro ao cadastrar.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Cadastro de Usuário</h2>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <form method="POST" action="create.php">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>