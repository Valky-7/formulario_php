<?php

session_start();

if (!isset($_SESSION["alunos"])) {
    $_SESSION["alunos"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $idade = $_POST["idade"];
    $email = trim($_POST["email"]);
    $cursos = $_POST["cursos"];
    $turma = $_POST["turma"];
    $telefone = trim($_POST["telefone"]);
    
    $aluno = [
        "nome" => $nome,
        "idade" => $idade,
        "email" => $email,
        "cursos" => $cursos,
        "turma" => $turma,
        "telefone" => $telefone
    ];
    
    $_SESSION["alunos"][] = $aluno;
}
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sistema Escolar</h1><br>
    
    <h2>Cadastro de Alunos</h2>

    <div class="form">
        
        <form method="POST" action="">
            
            <label>Nome Completo</label>
            <input type="text" id="nome" name="nome">

            <label>Idade</label>
            <input type="number" id="idade" name="idade" required>

            <label>E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="cursos">Cursos</label>
            <select name="cursos" id="cursos" required>
                <option value="Técnico em Informática para Internet">Técnico em Informática para Internet</option>
                <option value="Técnico em Mecatrônica">Técnico em Mecatrônica</option>
                <option value="Técnico em Multimídia">Técnico em Multimídia</option>
                <option value="Curso de Torneiro Mecânico">Curso de Torneiro Mecânico</option>
            </select>

            <label>Turma</label>
            <input type="text" id="turma" name="turma" required>

            <label>Telefone</label>
            <input type="text" id="telefone" name="telefone" required>

            <button type="submit" class="btn-secondary">Cadastrar Aluno</button>

        </form>

    </div>

    <br><h2>Alunos Cadastrados</h2>
<?php

    if (count($_SESSION["alunos"]) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Idade</th>";
        echo "<th>Email</th>";
        echo "<th>Cursos</th>";
        echo "<th>Turma</th>";
        echo "<th>Telefone</th>";
        echo "</tr>";
   
    foreach ($_SESSION["alunos"] as $aluno) {
        echo "<tr>";
        echo "<td>" . $aluno["nome"] . "</td";
        echo "<td>" . $aluno["idade"] . "</td";
        echo "<td>" . $aluno["email"] . "</td";
        echo "<td>" . $aluno["cursos"] . "</td";
        echo "<td>" . $aluno["turma"] . "</td";
        echo "<td>" . $aluno["telefone"] . "</td";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum aluno cadastrado.</p>";

}

?>

</body>
</html>