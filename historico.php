<?php
session_start();

$historico = $_SESSION["historico"] ?? [];

function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de operações</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>Histórico das últimas operações</h1>

        <p><a href="index.php">Cadastrar nova nota</a></p>
        <p><a href="listar_notas.php">Voltar para a listagem</a></p>

        <?php if (empty($historico)): ?>
            <p>Nenhuma operação registrada ainda.</p>
        <?php else: ?>
            <ol>
                <?php foreach ($historico as $item): ?>
                    <li><?= h($item) ?></li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
    </main>
</body>
</html>
