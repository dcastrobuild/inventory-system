<?php

include __DIR__ . '/../conexao.php';
?>

<div class="container d-flex justify-content-center mt-4">
    <div class="col-12 col-md-6 cadastro-box">
        <h2 class="text-white fw-bold text-center mb-4">Cadastrar Produto</h2>

        <form action="produto/inserir.php" method="get">
            <input class="form-control mb-3" type="text" placeholder="Nome do Produto" required name="nome">

            <input class="form-control mb-3" type="number" step="0.01" placeholder="Insira o valor" required name="valor">

            <input class="form-control mb-3" type="number" placeholder="Insira a quantidade" required name="quantidade">

            <input class="form-control mb-3" type="text" placeholder="Insira a marca" required name="marca">

            <button class="btn btn-custom w-100" type="submit">Cadastrar</button>
        </form>
    </div>
</div>


<div class="container mt-5">
    <h2 class="text-white fw-bold mb-4 text-center">Lista de Produtos Cadastrados</h2>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-dark table-hover table-bordered align-middle text-center">
            <thead class="table-custom">
                <tr>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT * FROM produto ORDER BY nome ASC";
                $result = $conn->query($select);

                if ($result->num_rows > 0) {
                    while ($produto = $result->fetch_object()) {
                        echo "<tr>
                                <td class='fw-semibold'>$produto->nome</td>
                                <td>$produto->marca</td>
                                <td>R$ ".number_format($produto->valor, 2, ',', '.')."</td>
                                <td>$produto->quantidade</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center text-secondary fw-semibold'>Nenhum produto cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
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

    .table-custom {
        background-color: #6c63ff;
        color: #fff;
        font-weight: 600;
    }

    .table td, .table th {
        text-align: center;
        vertical-align: middle;
        white-space: nowrap; 
        padding: 10px;
    }

    .table-responsive {
        width: 100%;
        max-width: 100%;
        overflow-x: auto; 
    }

    .container {
        max-width: 1000px; 
        margin: auto;
    }
</style>
