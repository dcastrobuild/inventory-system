<?php
include('conexao.php');
?>

<div class="container mt-4">
    <div class="col-12 col-md-6 cadastro-box mx-auto">
        <h2 class="text-white fw-bold text-center mb-4">Registrar Operação</h2>

        <form action="vendas/inserirVendas.php" method="get">
            
            <input class="form-control mb-3" type="date" required name="data">

            
            <select name="produto_vendido" class="form-control mb-3" required>
                <option disabled selected>Selecione o produto</option>
                <?php
                $select = "SELECT nome FROM produto";
                $result = $conn->query($select);

                while ($produto = $result->fetch_object()) {
                    echo "<option value='$produto->nome'>$produto->nome</option>";
                }
                ?>
            </select>

            
            <select name="marca" class="form-control mb-3" required>
                <option disabled selected>Selecione a marca</option>
                <?php
                $selectMarca = "SELECT DISTINCT marca FROM produto";
                $resultMarca = $conn->query($selectMarca);

                while ($marca = $resultMarca->fetch_object()) {
                    echo "<option value='$marca->marca'>$marca->marca</option>";
                }
                ?>
            </select>

            
            <select name="operacao" class="form-control mb-3" required>
                <option disabled selected>Selecione a operação</option>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>

           
            <button class="btn btn-custom w-100" type="submit">Registrar</button>
        </form>
    </div>
</div>


<div class="container mt-5">
    <h3 class="text-white fw-bold mb-3 text-center">Histórico de Operações</h3>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-dark table-hover table-bordered align-middle text-center">
            <thead class="table-custom">
                <tr>
                    <th>Produto</th>
                    <th>Marca</th>
                    <th>Data</th>
                    <th>Operação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $select = "SELECT c.produto_vendido, p.marca, c.data, c.operacao 
                           FROM compra c 
                           JOIN produto p ON c.produto_vendido = p.nome
                           ORDER BY c.data DESC";
                $result = $conn->query($select);

                if ($result->num_rows > 0) {
                    while ($compra = $result->fetch_object()) {
                        echo "<tr>
                                <td class='fw-semibold'>$compra->produto_vendido</td>
                                <td>$compra->marca</td>
                                <td>$compra->data</td>
                                <td>
                                    <span class='badge ".($compra->operacao == 'entrada' ? 'bg-success' : 'bg-danger')." px-3 py-2'>
                                        $compra->operacao
                                    </span>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center text-secondary fw-semibold'>Nenhuma operação registrada</td></tr>";
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

    h2, h3 {
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
    }

    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }
</style>
