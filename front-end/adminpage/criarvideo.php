<?php
    $codigocurso = $_GET['codigocurso'];
    $codigoassunto = $_GET['codigoassunto'];
    
    $endereco = "localhost";
    $banco = "EducaNois" ;
    $usuario = "root";
    $senhaa = "";

    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senhaa);

    
    if (isset($_FILES['video'])) {
        $nome_video = $_FILES['video']['name'];
        $file_size = $_FILES['video']['size'];
        $file_type = $_FILES['video']['type'];
        $file_tmp = $_FILES['video']['tmp_name'];

        $upload_dir = "../../back-end/uploads/";
        $upload_file = $upload_dir . basename($nome_video);

        if (move_uploaded_file($file_tmp, $upload_file)) {
            $sql = "INSERT INTO videos (codigoassuntos, codigocursos, nome_video, file_size, file_type) VALUES (:codigoassuntos, :codigocursos, :nome_video, :file_size, :file_type)";
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':codigoassuntos', $codigoassunto);
            $stm->bindValue(':codigocursos', $codigocurso);
            $stm->bindValue(':nome_video', $nome_video);
            $stm->bindValue(':file_size', $file_size);
            $stm->bindValue(':file_type', $file_type);

            // Executar a consulta e verificar o resultado
            if ($stm->execute()) {
                echo "<script>window.location.href = './assunto.php?codigocursos=".$codigocurso."&codigoassuntos=".$codigoassunto."';</script>";
                exit;
            } else {
                echo "Erro ao cadastrar vídeo no banco de dados!";
            }
        } else {
            echo "Erro ao fazer o upload do arquivo!";
        }
    } else {
        echo "Nenhum arquivo enviado!";
    }
?>