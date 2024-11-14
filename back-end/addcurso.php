<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "EducaNois";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $tituloCurso = $_POST['tituloCurso'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO cursos (nome, descricao) VALUES (?, ?)";
    
    $stm = $conn->prepare($sql);
    
    if ($stm === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stm->bind_param("ss", $tituloCurso, $descricao);

    if ($stm->execute()) {
        echo "<script>window.location.href = '../front-end/adminpage/add_curso.html?success=true';</script>";
        exit;
    } else {
        echo "ERRO ao cadastrar curso: " . $stm->error;
    }

    $stm->close();
    $conn->close();
}
?>