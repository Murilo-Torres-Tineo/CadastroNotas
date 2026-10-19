<?php
function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            padding: 20px;
        }

        .container {
            max-width: 1100px;
        }

        .lista {
            margin-top: 20px;
            padding-left: 20px;
        }

        .lista li {
            margin-bottom: 18px;
            line-height: 1.5;
        }

        .lista strong {
            color: #172b4d;
        }

        .links {
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .links a {
            text-decoration: none;
            background: #4b6cb7;
            color: white;
            padding: 10px 14px;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Questionário</h1>

        <div class="links">
            <a href="index.php">Cadastro</a>
            <a href="listar_notas.php">Listagem</a>
            <a href="historico.php">Histórico</a>
        </div>

        <ol class="lista">
            <li>
                <strong>O que é uma sessão em PHP?</strong><br>
                É um mecanismo para guardar dados durante a navegação do usuário no site. Os dados ficam armazenados no
                servidor para a mesma sessão do navegador e podem ser acessados em várias páginas.
            </li>

            <li>
                <strong>Por que utilizamos isset() antes de criar o array de notas dos alunos?</strong><br>
                Para verificar se a variável de sessão já existe e evitar criar o array várias vezes e sobrescrever os
                registros anteriores.
            </li>

            <li>
                <strong>Qual é a diferença entre $_POST e $_SESSION?</strong><br>
                `$_POST` recebe dados enviados por formulário; `$_SESSION` guarda dados da sessão para uso entre
                páginas.
            </li>

            <li>
                <strong>Para que serve o comando foreach na listagem dos registros?</strong><br>
                Para percorrer o array de notas e mostrar cada registro em uma linha da tabela.
            </li>

            <li>
                <strong>Qual é a função de count() no arquivo listar_notas.php?</strong><br>
                Conta quantos registros existem no array para exibir o total de notas cadastradas.
            </li>

            <li>
                <strong>Como o sistema identifica qual registro deve ser editado ou excluído?</strong><br>
                Pelo campo `id`, que é único para cada registro e é enviado na URL ou em um campo oculto do formulário.
            </li>

            <li>
                <strong>Qual é a diferença entre unset() e session_destroy()?</strong><br>
                `unset()` remove apenas um item específico; `session_destroy()` encerra toda a sessão, apagando todos os
                dados.
            </li>

            <li>
                <strong>Qual é a importância de utilizar sessões ($_SESSION) neste projeto? O que aconteceria com os
                    registros se o sistema utilizasse apenas variáveis comuns do PHP?</strong><br>
                As sessões permitem manter os dados durante a navegação. Se usasse apenas variáveis comuns, os registros
                seriam perdidos ao trocar de página ou recarregar a aplicação.
            </li>

            <li>
                <strong>Por que os dados cadastrados neste projeto podem ser perdidos? O que você mudaria para que as
                    notas continuassem salvas mesmo depois de fechar o navegador?</strong><br>
                Porque ficam na sessão do navegador e podem expirar ao final da sessão ou ao fechar o navegador. Para
                manter salvo, seria necessário usar um banco de dados ou outra forma de persistência.
            </li>

            <li>
                <strong>Como o recurso de edição ajuda a corrigir uma nota cadastrada incorretamente? Por que é
                    importante permitir a alteração sem precisar excluir e cadastrar tudo novamente?</strong><br>
                Permite corrigir erros rapidamente, sem apagar e regravar tudo. Isso economiza tempo e reduz risco de
                perda de dados.
            </li>

            <li>
                <strong>Por que cada registro precisa ter um identificador único? O que poderia acontecer se o sistema
                    tentasse editar ou excluir um aluno utilizando apenas o nome dele?</strong><br>
                Porque nomes podem se repetir. Sem `id`, o sistema poderia alterar ou excluir o registro errado.
            </li>

            <li>
                <strong>Qual é a importância de validar a nota antes de armazená-la? O que poderia acontecer se o
                    sistema aceitasse valores negativos, notas acima de 10 ou campos vazios?</strong><br>
                Para evitar dados inválidos e inconsistentes. Valores fora do intervalo ou vazios podem gerar erros,
                registros ruins e problemas na lógica do sistema.
            </li>

            <li>
                <strong>Por que o histórico deve armazenar somente as cinco operações mais recentes? Em quais situações
                    seria interessante guardar um histórico maior ou completo?</strong><br>
                Para não encher a sessão e manter a leitura simples. Um histórico maior seria útil em auditoria,
                relatórios ou análise de uso.
            </li>

            <li>
                <strong>Como o histórico de operações pode ajudar a identificar erros ou acompanhar as alterações
                    realizadas no sistema? Quais informações deveriam ser registradas para tornar esse recurso mais
                    útil?</strong><br>
                Ajuda a ver o que foi alterado, quando e em qual registro. Informações úteis: tipo da operação, aluno,
                disciplina, data/hora, usuário e descrição da ação.
            </li>

            <li>
                <strong>Como o uso de sessões e a ausência de um banco de dados podem limitar o compartilhamento das
                    informações entre professores que utilizam computadores diferentes?</strong><br>
                Porque cada computador tem sua própria sessão. Sem banco de dados, os dados não ficam centralizados para
                todos acessarem.
            </li>

            <li>
                <strong>Quais cuidados de segurança devem ser tomados ao exibir os nomes dos alunos e suas notas em uma
                    página PHP? Por que devemos utilizar recursos como htmlspecialchars()?</strong><br>
                Deve-se evitar mostrar conteúdo bruto porque ele pode conter HTML ou scripts maliciosos.
                `htmlspecialchars()` protege a página e evita ataques de injeção.
            </li>

            <li>
                <strong>Se você fosse responsável por transformar este projeto em um sistema utilizado por uma escola
                    real, quais três melhorias implementariam e por quê?</strong><br>
                1. Banco de dados para persistência e compartilhamento.<br>
                2. Login e controle de acesso para diferenciar usuários.<br>
                3. Validação e relatórios mais completos para melhorar segurança e gestão.
            </li>
        </ol>
    </main>
</body>

</html>