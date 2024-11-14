<?php
    $codigocurso = $_GET['codigocurso'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cursoespecifico.css">
    <title>Curso especifico</title>
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
<div class="add_title"><h1>CRIAR ASSUNTOS</h1></div>

<div class="link button-link"> 
    <a href="criarassuntohtml.php?codigocurso=<?php echo $codigocurso; ?>">Criar Assunto</a> 
</div>

<div id="dishes">
    <?php
    $endereco = "localhost";
    $banco = "EducaNois";
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM assuntos WHERE codigocursos=:codigocursos";

    $stm = $conexao->prepare($sql);
    $stm->bindValue(':codigocursos', $codigocurso);
    $stm->execute();

    while ($linha = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="dish">'; // Cartão único dentro do loop
        echo '<h3 class="dish-title">' . htmlspecialchars($linha["nome"]) . '</h3>';
        echo '<span class="dish-img">';
        echo '<img src="https://i.ytimg.com/vi/Ds1n6aHchRU/maxresdefault.jpg" alt="Imagem do assunto">';
        echo '</span>';
        echo '<button class="btn-default">';
        echo '<a href="assunto.php?codigocursos=' . urlencode($codigocurso) . '&codigoassuntos=' . urlencode($linha["codigoassuntos"]) . '"> Saiba Mais </a>';
        echo '</button>';
        echo '</div>'; // Fechamento do cartão individual
    }
    ?>
</div> <!-- Fechamento do contêiner principal -->
</body>
</html>