<?php
    $nome = $_REQUEST["nome"];
    $descricao = $_REQUEST["descricao"];
    $codigocurso = $_GET['codigocurso'];
    
    $endereco = "localhost";
    $banco = "EducaNois" ;
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);

    
    $sql = "INSERT INTO assuntos (codigocursos, nome, descricao) VALUES (:codigocursos, :nome, :descricao)";
    
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':descricao', $descricao);
    $stm->bindValue(':codigocursos', $codigocurso);
    
    if ($stm->execute()) {
        echo "<script>window.location.href = './cursoespecifico.php?codigocurso=".$codigocurso."';</script>";
        exit;
    } else {
        echo "ERRO ao cadastrar usuário!";
    }
?>