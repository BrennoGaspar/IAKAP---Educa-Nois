<?php

    $codigocurso = $_GET['codigocursos'];
    $codigoassunto = $_GET['codigoassuntos'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assunto.css">
    <link rel="shortcut icon" href="../../assets/EduNois.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assunto</title>
</head>
<body>
<header>
<nav class="navigation">
            <a href="#" class="logo">Educa <span>Nóis</span></a>
                <ul class="nav-menu">
                    
                    <li class="nav-item">
                        <a href="add_curso.html">Adicionar tema</a>
                    </li>
                    <li class="nav-item">
                        <a href="gerenciarcurso.php">Gerenciar tema</a>
                    </li>
                    <li class="nav-item">
                        <a href="cursos.php">Temas</a>
                    </li>
    
                </ul>
        </nav>
</header>
<div class="add_title"><h1>ADICIONAR VÍDEO</h1></div>

<div class="link button-link"> 
    <a href="adicionarvideohtml.php?codigocurso=<?php echo$codigocurso;?>&codigoassunto=<?php echo$codigoassunto;?>">Add video</a> 
</div>

<section class="secao">

    <div class="total">        
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "EducaNois";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM videos WHERE codigoassuntos = ? AND codigocursos = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param("ii", $codigoassunto, $codigocurso); // "ii" indica que ambos os parâmetros são inteiros
        $stm->execute();
        $result = $stm->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Vídeos Disponíveis:</h2>";
            while ($row = $result->fetch_assoc()) {
                $video_path = "../../back-end/uploads/" . $row["nome_video"];
                echo '<div>';
                echo '<video width="320" height="240" controls>';
                echo '<source src="' . $video_path . '" type="' . $row["file_type"] . '">';
                echo 'Seu navegador não suporta o elemento de vídeo.';
                echo '</video>';
                echo '</div><br>';
            }
        } else {
            echo "<p>Nenhum vídeo encontrado.</p>";
        }

        $stm->close();
        $conn->close();
        ?>
    </div>
</selection>
</body>
</html>