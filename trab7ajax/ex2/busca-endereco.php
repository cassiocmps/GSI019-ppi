<?php

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = htmlspecialchars($_GET['cep']);

try {

  $sql = <<<SQL
  SELECT rua, bairro, cidade
  FROM t7ex2_enderecos
  WHERE cep = '$cep'
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de injeção de SQL, 
  // pois nenhum parâmetro do usuário é utilizado na query SQL. 
  // Além disso, como há resultados a serem processados, 
  // utilizamos o método query (e não o exec).
  $stmt = $pdo->query($sql);
}
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

$row = $stmt->fetch();
$endereco = new Endereco($row['rua'], $row['bairro'], $row['cidade']);

echo json_encode($endereco);