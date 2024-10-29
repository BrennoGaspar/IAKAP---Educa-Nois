<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EducaNois";

$conexao = new PDO( "mysql:host=$servername;dbname=$dbname" , $username  , $password  ) ;

    $sql = "SELECT * FROM cursos" ;
    $stm = $conexao->prepare($sql) ;
    $resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gerenciar.css">
    <link rel="shortcut icon" href="../../assets/EduNois.jpg" type="image/x-icon">
    <title>Gerenciar tema | Educa Noís</title>
</head>

<body>
<header>
        <nav class="navigation">
            <a href="#" class="logo">Educa <span>Nóis</span></a>
                <ul class="nav-menu">
                   
                    <li class="nav-item">
                        <a href="add_curso.html">Adicionar tema</a>
                    </li>
                
                </ul>
        </nav>
</header>
<div class="gerenciar_title"><h1>GERENCIAR TEMAS</h1></div>

<section class="secao">
    <div class="total">
        <div class="cabecalho">
            <div><p>Tema</p></div>
            <div><p>Descrição</p></div>
            <div><p>Ações</p></div>
        </div>

        <?php
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="temas">';
                    echo '<div><p>'. $linha["nome"] .'</p></div>';
                    echo '<div><p>'. $linha["descricao"] .'</p></div>';
                    echo '<div><a href="../../back-end/delete_curso.php?codigo='. $linha["codigo"] .'">❌</a></div>';
                echo '</div>';
            }
        ?>

    </div>
</section>
</body>
</html>