<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="criarassuntohtml.css">
    <link rel="shortcut icon" href="../../assets/EduNois.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar assunto</title>
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
<div class="add_title"><h1>CRIAR ASSUNTOS</h1></div>
<section class="secao">
    <div class="total">
        <form method="post" action="criarassunto.php?codigocurso=<?php echo $_GET['codigocurso']; ?>">
            <div class="inputs">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="inputs">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" required>
            </div>
            <div class="inputs">
                <input class="submit-btn" type="submit" value="Enviar">
            </div>
        </form>
    </div>
</section>
</body>
</html>