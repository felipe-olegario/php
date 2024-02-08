<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 5rem;
    }

    div {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: auto;
        padding: 10rem;
        background-color: white;
    }

    a:link,
    a:visited {
        background-color: blue;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    a:hover,
    a:active {
        background-color: red;
    }
</style>

<body>
    <div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o arquivo foi carregado sem erros
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                // Nome temporário do arquivo
                $tmp_name = $_FILES["file"]["tmp_name"];

                // Abre o arquivo CSV para leitura
                $file = fopen($tmp_name, "r");

                // Conexão com o banco de dados MySQL
                $conn = new mysqli("db", "meu_usuario", "meu_password", "meu_banco_de_dados");

                // Verifica se a conexão foi estabelecida com sucesso
                if ($conn->connect_error) {
                    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                }

                fgetcsv($file, 10000, ",");

                // Loop através das linhas do arquivo CSV e insere os dados no banco de dados
                while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
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

                echo "Os dados foram inseridos com sucesso!";
            } else {
                echo "Erro no upload do arquivo.";
            }
        }
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a pagina anterior</a></p>
    </div>
</body>

</html>