<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_GET["segurado_nome"] ?? "";
$cpf = $_GET["segurado_cpf"] ?? "";
$email = $_GET["segurado_email"] ?? "";
$premio = $_GET["segurado_premio"] ?? "";
$dependente = $_GET["dependente_nome"] ?? "";
$d_relacao = $_GET["dependente_relacao"] ?? "";
$d_nasc = $_GET["dependente_nascimento"] ?? "";

try {

  $sql_segurado = <<<SQL
  INSERT INTO segurado (id, nome_seg, cpf, email, premio)
  VALUES (DEFAULT, ?, ?, ?, ?)
  SQL;

  $sql_dependente = <<<SQL
  INSERT INTO dependente (id, nome_dep, relacao, data_nascimento, id_segurado)
  VALUES (DEFAULT, ?, ?, ?, ?)
  SQL;

  $sql_consulta_id = <<<SQL
  SELECT id
  FROM segurado
  WHERE nome_seg = '$nome'
  SQL;

  $stmt = $pdo->prepare($sql_segurado);
  $stmt->execute([$nome, $cpf, $email, $premio]);

  $stmt = $pdo->query($sql_consulta_id);
  $row = $stmt->fetch();
  $id_segurado = $row['id'];

  $stmt = $pdo->prepare($sql_dependente);
  $stmt->execute([$dependente, $d_relacao, $d_nasc, $id_segurado]);

  header("location: questao1.html");
  exit();

} 
catch (Exception $e) {  
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
