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
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cursos.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="shortcut icon" href="../assets/EduNois.jpg" type="image/x-icon">
    <title>Temas | Educa Nóis</title>
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
    <main>
    <section id="menu2">
    <h2 class="section-title">Cursos criados</h2>

    <!-- Contêiner principal, fora do loop -->
    <div id="dishes">
        <?php
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="dish">'; // Cartão único dentro do loop
                echo '<h3 class="dish-title">' . $linha["nome"] . '</h3>';
                echo '<span class="dish-img">';
                echo '<img src="https://i.ytimg.com/vi/Ds1n6aHchRU/maxresdefault.jpg">';
                echo '</span>';
                echo '<div class="dish-rate">';
                echo '<h4>' . $linha["descricao"] . '</h4>';
                echo '</div>';
                echo '<button class="btn-default">';
                echo '<a href="./cursoespecifico.php?codigocurso=' . $linha["codigocursos"] . '"> Saiba Mais </a>';
                echo '</button>';
                echo '</div>';
            }
        ?>
    </div> <!-- Fechamento do contêiner principal -->
</section>
    </main>
    <script>
        $(document).ready(function() {
            var lastScrollTop = 0;
            var delta = 5;
            var navbarHeight = $('.navigation').outerHeight();

            $(window).scroll(function(event) {
                var st = $(this).scrollTop();

                // Make sure they scroll more than delta
                if (Math.abs(lastScrollTop - st) <= delta)
                    return;

                // If they scrolled down and are past the navbar, add class .nav-up.
                // This is necessary so you never see what is "behind" the navbar.
                if (st > lastScrollTop && st > navbarHeight){
                    // Scroll Down
                    $('.navigation').addClass('hidden');
                } else {
                    // Scroll Up
                    if(st + $(window).height() < $(document).height()) {
                        $('.navigation').removeClass('hidden');
                    }
                }

                lastScrollTop = st;
            });
        });
    </script>
</body>
</html>