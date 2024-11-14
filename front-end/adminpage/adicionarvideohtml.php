<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adicionarvideohtml.css">
    <link rel="shortcut icon" href="../../assets/EduNois.jpg" type="image/x-icon">
    <title>Criar Vídeo</title>
</head>
<body>
<header>
    <nav class="navigation">
        <a href="#" class="logo">Educa <span>Nóis</span></a>
        <ul class="nav-menu">
            <li class="nav-item"><a href="add_curso.html">Adicionar tema</a></li>
            <li class="nav-item"><a href="gerenciarcurso.php">Gerenciar tema</a></li>
            <li class="nav-item"><a href="cursos.php">Temas</a></li>
        </ul>
    </nav>
</header>

<div class="add_title">
    <h1>ADICIONAR VÍDEO</h1>
</div>

<div class="form-container">
    <?php 
        echo '<form method="post" enctype="multipart/form-data" action="criarvideo.php?codigocurso='.$_GET['codigocurso'].'&codigoassunto='.$_GET['codigoassunto'].'">';
    ?>
        <label for="video">Vídeo:</label>
        <input type="file" id="video" name="video" accept="video/mp4" required>
        <br>
        <input class="submit-btn" type="submit" value="Enviar">
    </form>
</div>
</body>
</html>