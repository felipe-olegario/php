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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            transition: background-color 0.5s ease;
        }

        body.background-change {
            background-color: #e0e0e0;
        }

        h2 {
            text-align: center;
            color: #333;
            animation: fade-in 1s ease-out;
        }

        form {
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: slide-in 1s ease-out;
            position: relative;
            overflow: hidden;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }

        .custom-file-upload {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-bottom: 1rem;
            animation: glow 2s ease-in-out infinite;
        }

        .custom-file-upload:hover {
            background-color: #0056b3;
        }

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
            position: absolute;
            bottom: 20px;
            right: 20px;
            animation: slide-in 1s ease-out;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #drop_zone {
            border: 2px solid blue;
            width: 200px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
            cursor: pointer;
        }

        #file-name {
            display: block;
            color: #333;
            margin-bottom: 1.5rem;
            animation: fade-in 1s ease-out;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes slide-in {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* @keyframes pulse {
            0% {
                transform: scale(1);
                background-color: blue;
            }

            50% {
                transform: scale(1.1);
                background-color: lightblue;
            }

            100% {
                transform: scale(1);
                background-color: blue;
            }
        } */

        @keyframes glow {
            0% {
                text-shadow: 0 0 5px #007bff, 0 0 10px #007bff, 0 0 15px #007bff, 0 0 20px #007bff;
            }

            50% {
                text-shadow: 0 0 10px #007bff, 0 0 20px #007bff, 0 0 30px #007bff, 0 0 40px #007bff;
            }

            100% {
                text-shadow: 0 0 5px #007bff, 0 0 10px #007bff, 0 0 15px #007bff, 0 0 20px #007bff;
            }
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
        <a id="downloadLink" style="display: none;">My File</a>
        <span id="file-name" style="margin-left: 1rem;"></span>
        <br>
        <input type="submit" value="Enviar Arquivo">
    </form>
</body>

<script>
    const link = document.getElementById("downloadLink");
    link.href = "path/to/your/file.csv";
    link.download = "file.csv";
    link.click();
    function showFileName() {
        const input = document.getElementById('file');
        const fileNameSpan = document.getElementById('file-name');

        if (input.files && input.files.length > 0) {
            fileNameSpan.textContent = input.files[0].name;
        } else {
            fileNameSpan.textContent = 'Nenhum arquivo selecionado';
        }
    }

    function drop(ev) {
        ev.preventDefault();
        var data=ev.dataTransfer.getData("Text");
        ev.target.appendChild(document.getElementById(data));
    }
    function dragOverHandler(ev) {
        ev.preventDefault();
        const fileInput = document.getElementById('file');
        const file = ev.dataTransfer.files[0];
        fileInput.files = file ? [file] : [];
        showFileName();
    }
</script>

</html>