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
if(isset($_GET['codigo']) && is_numeric($_GET['codigo'])) {
    $video_id = $_GET['codigo'];

    // Consulta o banco de dados para obter o caminho do vídeo
    $sql = "SELECT * FROM cursos WHERE codigo = $video_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $video_path = "../back-end/uploads/" . $row["nome_video"];
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
            <div class="general">
                <section class="elements">
                    <h2 class='titulo'><?php echo $row["nome"] ?></h2>
                    <video width="640" height="360" controls>
                        <source src="<?php echo $video_path; ?>" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
                    <p class="descricao"><?php echo $row["descricao"] ?></p>
                </section>
            </div>
        </main>
</body>
</html>
<?php
    } else {
        echo "Vídeo não encontrado.";
    }
} else {
    echo "ID do vídeo inválido.";
}

$conn->close();
?>