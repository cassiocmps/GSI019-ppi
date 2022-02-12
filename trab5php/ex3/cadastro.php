<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP ex3</title>
    </head>

<body>
    <?php

    function salvaString($string, $arquivo){
        $arq = fopen($arquivo, "w");
        fwrite($arq, $string);
        fclose($arq);
    }

    $email = $_POST["email"];
    $senha = $_POST["password"];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $femail = "email.txt";
    $fsenha = "senhaHash.txt";
    
    salvaString($email, $femail);
    salvaString($senhaHash, $fsenha);

    echo <<<MENSAGEM
    <div class="container">
        <h1 class="display-3">DADOS INSERIDOS COM SUCESSO!</h1>
     </div>
MENSAGEM
    ?>
</body>
</html>