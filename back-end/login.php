<?php
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["password"];
    $profissao = $_REQUEST['vocee'];

    $endereco = "localhost";
    $banco = "EducaNois";
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);

    if($profissao == "Estudante"){
        $sql = "SELECT * FROM alunos WHERE Email=:email and Senha=:senha";
    } else if($profissao == "Professor"){
        $sql = "SELECT * FROM professores WHERE Email=:email and Senha=:senha";
    }

    $stm = $conexao->prepare($sql);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':senha', $senha);

    $stm->execute();

    if( $dados = $stm->fetch(PDO::FETCH_ASSOC) ){

        session_start();
        $_SESSION['user'] = $email;
        echo json_encode(array('success' => true));

    }else{

        echo json_encode(array('success' => false, 'message' => 'Email e/ou Senha inválidos. Tente novamente!'));

    }
?>