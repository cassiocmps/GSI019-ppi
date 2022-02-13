<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_GET['cep'] ?? '';
console.error($cep);

$sql = <<<SQL
    SELECT rua, bairro, cidade
    FROM t7ex2_enderecos
    WHERE cep = $cep
    SQL;

  try {
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$email]);
    $stmt->exec([$cep]);
    $row = $stmt->fetch();
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
  
  class Endereco
  {
    public $rua;
    public $bairro;
    public $cidade;
    
    function __construct($rua, $bairro, $cidade)
    {
      $this->rua = $row['rua'];
      $this->bairro = $row['bairro'];
      $this->cidade = $row['cidade'];
    }
  }
  
  $endereco = array_key_exists($cep, $enderecos) ? 
  $enderecos[$cep] : new Endereco('', '', '');
  
  echo json_encode($endereco);

?>