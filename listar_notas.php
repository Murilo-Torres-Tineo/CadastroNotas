<?php
session_start();

$registros = $_SESSION["notas_alunos"] ?? [];

function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Notas cadastradas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <h1>Notas cadastradas</h1>
        <p>Total de registros: <?= count($registros) ?></p>
        <p><a href="index.php">Cadastrar outra nota</a></p>
        <p><a href="historico.php">Ver histórico</a></p>
        <p><a href="questionario.php">Questionário</a></p>

        <?php if (empty($registros)): ?>
            <p>Nenhuma nota cadastrada ainda.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Aluno</th>
                    <th>Disciplina</th>
                    <th>Nota</th>
                    <th>Última alteração</th>
                    <th>Ações</th>
                </tr>

                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?= h($registro["aluno"]) ?></td>
                        <td><?= h($registro["disciplina"]) ?></td>
                        <td><?= h(number_format($registro["nota"], 1, ",", ".")) ?></td>
                        <td><?= h($registro["alterado_em"]) ?></td>
                        <td>
                            <a href="editar_nota.php?id=<?= urlencode($registro["id"]) ?>">Editar</a>

                            <form action="excluir_nota.php" method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= h($registro["id"]) ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>
</body>

</html>