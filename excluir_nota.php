<?php
session_start();
$id = $_POST["id"] ?? "";
$registroExcluido = null;

foreach ($_SESSION["notas_alunos"] ?? [] as $indice => $registro) {
    if ($registro["id"] === $id) {
        $registroExcluido = $registro;
        unset($_SESSION["notas_alunos"][$indice]);
        break;
    }
}

if ($registroExcluido !== null) {
    if (!isset($_SESSION["historico"])) {
        $_SESSION["historico"] = [];
    }

    $_SESSION["historico"][] = "Nota excluída: {$registroExcluido["aluno"]} | Disciplina: {$registroExcluido["disciplina"]}";
    if (count($_SESSION["historico"]) > 5) {
        array_shift($_SESSION["historico"]);
    }
}

header("Location: listar_notas.php");
exit;
?>