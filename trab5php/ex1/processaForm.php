<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP ex1</title>
    <style>
        .form-floating{
            background-color: lightblue;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php

    $cep = htmlspecialchars($_POST["cep"]);
    $logradouro = htmlspecialchars($_POST["logradouro"]);
    $bairro = htmlspecialchars($_POST["bairro"]);
    $cidade = htmlspecialchars($_POST["cidade"]);
    $estado = htmlspecialchars($_POST["estado"]);

    echo <<<CAMPOS
    <div class="container">
        <div class="row g-2">
            <div class="form-floating col-md-2"> $cep </div>
            <div class="form-floating col-md-5"> $logradouro </div>
            <div class="form-floating col-md-2"> $bairro </div>
            <div class="form-floating col-md-2"> $cidade </div>
            <div class="form-floating col-md-1"> $estado </div>
        </div>
    </div>
CAMPOS
    ?>

</body>
</html>