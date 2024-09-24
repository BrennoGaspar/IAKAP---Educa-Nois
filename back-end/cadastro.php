<?php
    $nome = $_REQUEST["firstname"];
    $sobrenome = $_REQUEST["lastname"];
    $email = $_REQUEST['email'];
    $celular = $_REQUEST['number'];
    $senha = $_REQUEST['password'];
    $profissao = $_REQUEST['vocee'];
    $rg = isset($_REQUEST['rg']) ? $_REQUEST['rg'] : null;
    $cpf = isset($_REQUEST['cpf']) ? $_REQUEST['cpf'] : null;

    $endereco = "localhost";
    $banco = "EducaNois" ;
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);

    if ($profissao == "Estudante"){
        $sql = "INSERT INTO alunos (Nome, Sobrenome, Email, Celular, Senha) VALUES (:nome, :sobrenome, :email, :celular, :senha)";
    }
    elseif ($profissao == "Professor"){
        $sql = "INSERT INTO professores (Nome, Sobrenome, Email, Celular, Senha, RG, CPF) VALUES (:nome, :sobrenome, :email, :celular, :senha, :rg, :cpf)";
    }
    
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':sobrenome', $sobrenome);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':celular', $celular);
    $stm->bindValue(':senha', $senha);
    
    if ($profissao == "Professor") {
        $stm->bindValue(':rg', $rg);
        $stm->bindValue(':cpf', $cpf);
    }
    
    if ($stm->execute()) {
        echo "<script>window.location.href = '../front-end/login.html?success=true';</script>";
        exit;
    } else {
        echo "ERRO ao cadastrar usuário!";
    }
?>