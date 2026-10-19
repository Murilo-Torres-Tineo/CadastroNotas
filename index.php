<?php
session_start();

if (!isset($_SESSION['notas_alunos'])) {
    $_SESSION['notas_alunos'] = [];
}

$msg = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Notas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Cadastro de Notas dos Alunos</h1>

        <?php if ($msg !== ''): ?>
            <div class="mensagem"><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form action="salvar_nota.php" method="POST" class="formulario">
            <label for="aluno">Nome do aluno:</label>
            <input type="text" id="aluno" name="aluno" placeholder="Digite o nome" required>

            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina" placeholder="Digite a disciplina" required>

            <label for="nota">Nota (0 a 10):</label>
            <input type="number" id="nota" name="nota" min="0" max="10" step="0.1" placeholder="0.0 a 10.0" required>

            <button type="submit">Cadastrar nota</button>
        </form>

        <div class="acoes">
            <a href="listar_notas.php">Consultar notas cadastradas</a>
            <a href="historico.php">Ver histórico</a>
            <a href="questionario.php">Questionário</a>
        </div>
    </div>
</body>

</html>