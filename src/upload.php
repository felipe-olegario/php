<?php // upload.php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi carregado sem erros
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        // Nome temporário do arquivo
        $tmp_name = $_FILES["file"]["tmp_name"];

        // Move o arquivo temporário para um local permanente
        move_uploaded_file($tmp_name, "uploads/" . $_FILES["file"]["name"]);

        // Abre o arquivo CSV para leitura
        $file = fopen("uploads/" . $_FILES["file"]["name"], "r");

        // Conexão com o banco de dados MySQL
        $conn = new mysqli("db", "meu_usuario", "meu_password", "meu_banco_de_dados");

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        fgetcsv($file, 10000, ",");

        // Loop através das linhas do arquivo CSV e insere os dados no banco de dados
        while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
            var_dump($data[0]);
            $preco = isset($data[4]) ? floatval($data[4]) : 0;
            $precoOriginal = floatval($data[5]);
            $precoMedio = floatval($data[6]);

            $sql = "INSERT INTO products (nome, marca, sabor, peso, preco, precoOriginal, precoMedio, estoque) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$preco', '$precoOriginal', '$precoMedio', 9999)";
            if ($conn->query($sql) === FALSE) {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        }

        // Fecha o arquivo CSV e a conexão com o banco de dados
        fclose($file);
        $conn->close();

        echo "Os dados foram inseridos com sucesso.";
    } else {
        echo "Erro no upload do arquivo.";
    }
}
?>
