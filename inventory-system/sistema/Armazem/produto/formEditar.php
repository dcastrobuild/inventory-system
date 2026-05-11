<?php
include "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM produto WHERE id = $id";
    $result = $conn->query($select);
    $produto = $result->fetch_object();
}
?>

<div class="container d-flex justify-content-center mt-4">
    <div class="col-12 col-md-6 cadastro-box">
        <h2 class="text-white fw-bold text-center mb-4">Atualizar Produto</h2>

        <form action="produto/atualizar.php" method="get">
            <input type="hidden" name="id" value="<?= $produto->id ?>">

            <input class="form-control mb-3" type="text" required placeholder="Nome do produto"
                value="<?= $produto->nome ?>" name="nome">

            <input class="form-control mb-3" type="number" required placeholder="Insira a quantidade do produto"
                value="<?= $produto->quantidade ?>" name="quantidade">

            <input class="form-control mb-3" type="float" required placeholder="Insira o valor do produto"
                value="<?= $produto->valor ?>" name="valor">

            <input class="form-control mb-3" type="text" required placeholder="Insira o valor do produto"
                value="<?= $produto->marca ?>" name="marca">

            <button class="btn btn-custom w-100" type="submit">Atualizar</button>
        </form>
    </div>
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2a2a40);
    }

    .cadastro-box {
        background-color: #2c2c3c;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.6);
    }

    h2 {
        font-weight: 600;
        letter-spacing: 1px;
    }

    .form-control {
        border-radius: 8px;
        background-color: #3a3a4d;
        border: none;
        color: #f5f5f5;
    }

    .form-control::placeholder {
        color: #b0b0c0;
    }

    .btn-custom {
        background-color: #6c63ff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        color: #fff;
        transition: 0.3s;
    }

    .btn-custom:hover {
        background-color: #574fd6;
    }
</style>
