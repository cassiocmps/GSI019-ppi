<?
require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT nome_dep, relacao, data_nascimento, nome_seg, cpf, email, premio
  FROM dependente, segurado
  WHERE segurado.id = dependente.id_segurado
SQL;
  $stmt = $pdo->query($sql);
} catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROVA QUESTAO 2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
</head>

<body>
  <main class="container">
    <h1>CADASTRADOS</h1>
    <table class="table table-striped table-hover">
      <tr>
        <th>Dependente</th>
        <th>Relação com dependente</th>
        <th>Data de nascimento (dependente)</th>
        <th>Segurado</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Premio</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {
        $nome = htmlspecialchars($row['nome_seg']);
        $cpf = htmlspecialchars($row['cpf']);
        $email = htmlspecialchars($row['email']);
        $premio = htmlspecialchars($row['premio']);
        $dependente = htmlspecialchars($row['nome_dep']);
        $relacao = htmlspecialchars($row['relacao']);
        $data_nascimento = htmlspecialchars($row['data_nascimento']);

        echo <<<HTML
          <tr>
            <td>$dependente</td>
            <td>$relacao</td>
            <td>$data_nascimento</td>
            <td>$nome</td> 
            <td>$cpf</td>
            <td>$email</td>
            <td>$premio</td>
          </tr>      
HTML;
      }
      ?>

    </table>
  </main>

</body>

</html>