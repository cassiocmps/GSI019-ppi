<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP ex6 - Cadastro</title>
    </head>

<body>
<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["password"] ?? "";
$hash_senha = password_hash($senha, PASSWORD_DEFAULT);


try {

  $sql = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  INSERT INTO t6ex3_usuarios (email, hash_senha)
  VALUES (?, ?)
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois precisamos
  // cadastrar dados fornecidos pelo usuário 
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email, $hash_senha]);

} 
catch (Exception $e) {  
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
    else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}

echo <<<MENSAGEM
<div class="container">
    <h1 class="display-3">DADOS INSERIDOS COM SUCESSO!</h1>
    <a href="index.html">Voltar</a>
 </div>
MENSAGEM

?>
</body>
</html>