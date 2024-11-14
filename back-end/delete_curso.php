<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EducaNois";

try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o ID foi passado pela URL
    if (isset($_GET['codigocursos'])) {
        $id = $_GET['codigocursos'];

        // Prepara e executa a exclusão do tema
        $sql = "DELETE FROM cursos WHERE codigocursos = :codigo";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':codigo', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona de volta para a página principal após a exclusão
        header("Location: ../front-end/adminpage/gerenciarcurso.php"); // Altere "gerenciar.php" para o nome da sua página principal
        exit();
    } else {
        echo "ID não fornecido.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>