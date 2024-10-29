<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua as credenciais pelos seus próprios)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "EducaNois";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupera os dados do formulário
    $tituloCurso = $_POST['tituloCurso'];
    $materia = $_POST['materia'];
    $descricao = $_POST['descricao'];

    // Verifica se um arquivo foi enviado
    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK){
        $file_name = $_FILES['video']['name'];
        $file_size = $_FILES['video']['size'];
        $file_tmp = $_FILES['video']['tmp_name'];
        $file_type = $_FILES['video']['type'];
        
        // Move o arquivo enviado para a pasta desejada
        $upload_directory = "../back-end/uploads/"; // Diretório onde os vídeos serão salvos
        $uploaded_file_path = $upload_directory . $file_name;

        if(move_uploaded_file($file_tmp, $uploaded_file_path)){
            // Insere os dados no banco de dados
            $sql = "INSERT INTO cursos (nome, descricao, nome_video, file_size, file_type) VALUES ('$tituloCurso', '$descricao', '$file_name', '$file_size', '$file_type')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Vídeo enviado com sucesso.";
                header("Location: ../front-end/adminpage/gerenciarcurso.php"); // Altere "gerenciar.php" para o nome da sua página principal
                exit();
            } else {
                echo "Erro ao enviar o vídeo: " . $conn->error;
            }
        } else {
            echo "Erro ao mover o arquivo para o diretório de upload.";
        }
    } else {
        echo "Erro no envio do arquivo: " . $_FILES['video']['error'];
    }
    $conn->close();
}
?>