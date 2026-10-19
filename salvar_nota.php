<?php
session_start();

if (!isset($_SESSION["notas_alunos"])) {
    $_SESSION["notas_alunos"] = [];
}

$aluno = trim($_POST["aluno"] ?? "");
$disciplina = trim($_POST["disciplina"] ?? "");
$nota = $_POST["nota"] ?? "";

if (
    $aluno === "" || $disciplina === "" || $nota === "" ||
    !is_numeric($nota) || (float) $nota < 0 || (float) $nota > 10
) {
    exit("Dados inválidos. Volte ao formulário e tente novamente.");
}

$_SESSION["notas_alunos"][] = [
    "id" => uniqid(),
    "aluno" => $aluno,
    "disciplina" => $disciplina,
    "nota" => (float) $nota,
    "alterado_em" => date("d/m/Y H:i")
];

if (!isset($_SESSION["historico"])) {
    $_SESSION["historico"] = [];
}

$_SESSION["historico"][] = "Nota cadastrada: $aluno | Disciplina: $disciplina | Nota: $nota";
if (count($_SESSION["historico"]) > 5) {
    array_shift($_SESSION["historico"]);
}

header("Location: listar_notas.php");
exit;
?>