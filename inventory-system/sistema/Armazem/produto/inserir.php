<?php
include '../conexao.php';

$nome = $_GET['nome'];
$valor = $_GET['valor'];
$quantidade = $_GET['quantidade'];
$marca = $_GET['marca'];

$insert = "INSERT INTO produto VALUES('', '{$nome}', '{$valor}', '{$quantidade}', '{$marca}')";
$result = $conn->query($insert);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<body style="font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #1e1e2f, #2a2a40);" data-bs-theme="dark">
<div class="container mt-5">

    <?php if ($result === true): ?>
        <div class="alert alert-success text-center fw-bold shadow-sm rounded-pill">
            ✅ Adicionado com sucesso!
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center fw-bold shadow-sm rounded-pill">
            ❌ Erro ao adicionar!
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="../index.php?pagina=listar" class="btn btn-custom px-4">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>
</div>

<style>
    .btn-custom {
        background-color: #6c63ff;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
        transition: 0.3s;
    }

    .btn-custom:hover {
        background-color: #574fd6;
    }

    .alert {
        max-width: 500px;
        margin: 0 auto;
        font-size: 1.1rem;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</body>
