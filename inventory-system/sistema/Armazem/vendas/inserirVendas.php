<?php
include '../conexao.php';

$data = $_GET['data'];
$produto_vendido = $_GET['produto_vendido'];
$operacao = $_GET['operacao'];


$insert = "INSERT INTO compra (data, produto_vendido, operacao) 
           VALUES('$data', '$produto_vendido', '$operacao')";
$result = $conn->query($insert);


$select = "SELECT quantidade, marca FROM produto WHERE nome = '$produto_vendido'";
$result2 = $conn->query($select);
$produto = $result2->fetch_object();

$quantidadeAtual = intval($produto->quantidade);
$marca = $produto->marca; 


if ($operacao == 'entrada') {
  $quantidadeAtual++;
} else {
  $quantidadeAtual--;
}

$update = "UPDATE produto SET quantidade = $quantidadeAtual WHERE nome = '$produto_vendido'";
$result3 = $conn->query($update);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Confirmação</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e1e2f, #2a2a40);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .box {
      max-width: 500px;
      width: 100%;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.6);
    }
    .success {
      background: #e8f8ec;
      border: 1px solid #b6e2c2;
      color: #1e7b34;
    }
    .error {
      background: #fde8e8;
      border: 1px solid #f5b6b6;
      color: #b71c1c;
    }
    .alert {
      margin-top: 15px;
      padding: 10px;
      border-radius: 8px;
      background: #fff3cd;
      border: 1px solid #ffeeba;
      color: #856404;
      font-size: 14px;
      font-weight: 500;
    }
    h1 {
      font-size: 24px;
      margin-bottom: 15px;
      font-weight: 600;
    }
    p {
      margin-bottom: 20px;
      font-size: 16px;
    }
    a {
      display: inline-block;
      padding: 12px 20px;
      background: #6c63ff;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      transition: 0.3s;
    }
    a:hover {
      background: #574fd6;
    }
  </style>
</head>
<body>
  <?php if ($result === true): ?>
    <div class="box success">
      <h1>✅ Cadastrado com sucesso!</h1>
      <p>O produto <strong><?= $produto_vendido ?></strong> da marca <strong><?= $marca ?></strong> foi atualizado corretamente.</p>
      
      
      <?php if ($quantidadeAtual < 20): ?>
        <div class="alert">
          ⚠️ Atenção: Estoque baixo! Apenas <?= $quantidadeAtual ?> unidades restantes.
        </div>
      <?php endif; ?>

      <a href="../index.php?pagina=listar">Voltar</a>
    </div>
  <?php else: ?>
    <div class="box error">
      <h1>❌ Erro ao cadastrar!</h1>
      <p>Não foi possível registrar a operação. Tente novamente.</p>
      <a href="../index.php?pagina=listar">Voltar</a>
    </div>
  <?php endif; ?>
</body>
</html>
