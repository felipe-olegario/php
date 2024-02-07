<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo CSV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 8px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-bottom: 1rem;
        }

        .custom-file-upload:hover {
            background-color: #0056b3;
        }

        /* Esconda o input file */
        input[type="file"] {
            display: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Upload de Arquivo CSV</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file" class="custom-file-upload">
            Escolha um arquivo CSV:
            <input type="file" id="file" name="file" accept=".csv" onchange="showFileName()">
        </label>
        <span id="file-name" style="margin-left: 1rem;"></span>
        <br>
        <input type="submit" value="Enviar Arquivo">
    </form>
</body>

<script>
    function showFileName() {
        const input = document.getElementById('file');
        const fileNameSpan = document.getElementById('file-name');

        if (input.files && input.files.length > 0) {
            fileNameSpan.textContent = input.files[0].name;
        } else {
            fileNameSpan.textContent = 'Nenhum arquivo selecionado';
        }
    }
</script>

</html>