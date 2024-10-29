<?php
try {
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["password"];
    $profissao = $_REQUEST['vocee'];

    $endereco = "localhost";
    $banco = "EducaNois";
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($email == "admin@gmail.com" && $senha == "admin") {
        echo json_encode(array('success' => true, 'redirect' => './adminpage/gerenciarcurso.php'));
        exit();
    }

    if ($profissao == "Estudante") {
        $sql = "SELECT * FROM alunos WHERE Email=:email AND Senha=:senha";
    } else if ($profissao == "Professor") {
        $sql = "SELECT * FROM professores WHERE Email=:email AND Senha=:senha";
    } else {
        echo json_encode(array('success' => false, 'message' => 'Profissão inválida.'));
        exit();
    }

    $stm = $conexao->prepare($sql);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':senha', $senha);
    $stm->execute();

    if ($dados = $stm->fetch(PDO::FETCH_ASSOC)) {
        session_start();
        $_SESSION['user'] = $email;
        echo json_encode(array('success' => true, 'redirect' => 'home.html'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Email e/ou Senha inválidos. Tente novamente!'));
    }

} catch (PDOException $e) {
    echo json_encode(array('success' => false, 'message' => 'Erro na conexão ou na execução do SQL.', 'error' => $e->getMessage()));
}
?>