<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EducaNois";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupera o ID do vídeo da URL
if(isset($_GET['codigocursos']) && is_numeric($_GET['codigocursos']) && isset($_GET['codigoassuntos']) && is_numeric($_GET['codigoassuntos'])) {
    $codigocursos = $_GET['codigocursos'];
    $codigoassuntos = $_GET['codigoassuntos'];

    // Consulta o banco de dados para obter o caminho do vídeo
    $sql = "SELECT * FROM videos WHERE codigocursos = $codigocursos AND codigoassuntos = $codigoassuntos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="video.css">
    <title>Curso | Educa Nóis</title>
</head>
<body>
        <header>
            <nav class="navigation">
                <a href="./home.html" class="logo">Educa <span>Nóis</span></a>
                <ul class="nav-menu">
                    <li class="nav-item active"><a href="./temas.php">Temas</a></li>
                    <li class="nav-item"><a href="empresas.html">Empresas parceiras</a></li>
                    <li class="nav-item"><a href="./feedback.html">Feedback</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <?php
            while ($row = $result->fetch_assoc()) {
                $video_path = "../back-end/uploads/" . $row["nome_video"];
                echo '<div class="general">';
                echo '<section class="elements">';
                echo '<h2 class="titulo">'. $row["nome_video"] .'</h2>';
                echo '<video width="640" height="360" controls>';
                echo '<source src="' . $video_path . '" type="video/mp4">'; // Corrigido
                echo 'Seu navegador não suporta o elemento de vídeo.';
                echo '</video>';
                echo '</section>';
                echo '</div>';
            }
            ?>
        </main>
</body>
</html>
<?php
    } else {
        echo "<p>Nenhum vídeo encontrado.</p>";
    }
} else {
    echo "ID do vídeo inválido.";
}

$conn->close();
?>
