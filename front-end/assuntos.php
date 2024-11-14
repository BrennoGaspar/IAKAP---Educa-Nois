<?php
// Verifica se o parâmetro codigocursos está definido e é numérico
if (!isset($_GET['codigocursos']) || !is_numeric($_GET['codigocursos'])) {
    die("ID do curso inválido.");
}

$codigocurso = $_GET['codigocursos'];

try {
    $endereco = "localhost";
    $banco = "EducaNois";
    $usuario = "root";
    $senhaa = "";

    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara e executa a consulta
    $sql = "SELECT * FROM assuntos WHERE codigocursos = :codigocursos";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':codigocursos', $codigocurso);
    $stm->execute();

    // Verifica se retornou resultados
    if ($stm->rowCount() == 0) {
        echo "<p>Nenhum assunto encontrado para este curso.</p>";
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assuntos.css">
    <title>Curso Específico</title>
</head>
<body>
<header>
    <nav class="navigation">
        <a href="./home.html" class="logo">Educa <span>Nóis</span></a>
        <ul class="nav-menu">
            <li class="nav-item active">
                <a href="./temas.php">Temas</a>
            </li>
            <li class="nav-item">
                <a href="empresas.html">Empresas parceiras</a>
            </li>
            <li class="nav-item">
                <a href="feedback.html">Feedback</a>
            </li>
        </ul>
    </nav>
</header>
<div class="add_title"><h1>ASSUNTOS</h1></div>

<div id="dishes">
    <?php
    while ($linha = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="dish">'; // Cartão único dentro do loop
        echo '<h3 class="dish-title">' . htmlspecialchars($linha["nome"]) . '</h3>';
        echo '<span class="dish-img">';
        echo '<img src="https://i.ytimg.com/vi/Ds1n6aHchRU/maxresdefault.jpg" alt="Imagem do assunto">';
        echo '</span>';
        echo '<button class="btn-default">';
        echo '<a href="video.php?codigocursos=' . urlencode($codigocurso) . '&codigoassuntos=' . urlencode($linha["codigoassuntos"]) . '"> Saiba Mais </a>';
        echo '</button>';
        echo '</div>'; // Fechamento do cartão individual
    }
    ?>
</div> <!-- Fechamento do contêiner principal -->
   
</body>
</html>
