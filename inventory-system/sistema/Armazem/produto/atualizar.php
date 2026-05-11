<?php
include '../conexao.php';

$id   = $_GET['id'];
$nome = $_GET['nome'];
$valor = $_GET['valor'];
$quantidade = $_GET['quantidade'];
$marca = $_GET['marca'];

$update = "UPDATE produto SET nome ='$nome', valor = '$valor', quantidade = '$quantidade', marca = '$marca' WHERE id = $id";
$result = $conn->query($update);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<body style="font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #1e1e2f, #2a2a40);" data-bs-theme="dark">

<div class="container d-flex justify-content-center">
    <div class="mt-5 p-4 rounded shadow-lg text-center"
         style="
            max-width: 500px;
            width: 100%;
            background: #2c2c3c;
            border: none;
         ">

        <?php if ($result === true): ?>
            <div class="alert alert-success fw-bold rounded-pill shadow-sm">
                ✅ Atualizado com sucesso!
            </div>
        <?php else: ?>
            <div class="alert alert-danger fw-bold rounded-pill shadow-sm">
                ❌ Erro ao atualizar!
            </div>
        <?php endif; ?>

        <a href="../index.php?pagina=listar" class="btn btn-custom mt-3 px-4">
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
        max-width: 400px;
        margin: 0 auto;
        font-size: 1.1rem;
    }
</style>
</body>
