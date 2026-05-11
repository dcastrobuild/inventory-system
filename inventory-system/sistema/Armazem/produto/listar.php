<h2 class="fw-bold text-light mb-4 text-center">Lista de Produtos</h2>

<?php
include('conexao.php');
$select = "SELECT * FROM produto ORDER BY nome ASC";
$result = $conn->query($select);
?>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-dark table-hover table-bordered align-middle text-center">
        <thead class="table-custom">
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Marca</th>
                <th>Situação</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($produto = $result->fetch_object()) {

                    echo "<tr>
                            <td class='fw-semibold'>$produto->nome</td>
                            <td>R$ $produto->valor</td>
                            <td>$produto->quantidade</td>
                            <td>$produto->marca</td>";

                    if ($produto->quantidade >= 20) {
                        echo "<td><span class='badge bg-success px-3 py-2'>Tem Estoque ✅</span></td>";
                    } else {
                        echo "<td><span class='badge bg-danger px-3 py-2'>Repor estoque ❌</span></td>";
                    }

                    echo "
                        <td>
                            <a class='btn btn-warning btn-sm me-1 fw-semibold' href='?pagina=editar&id=$produto->id'>
                                <i class='bi bi-pencil-square me-1'></i> Editar
                            </a>

                            <button class='btn btn-danger btn-sm fw-semibold' data-bs-toggle='modal'
                                data-bs-target='#modalExcluir$produto->id'>
                                <i class='bi bi-trash me-1'></i> Excluir
                            </button>

                            <!-- Modal de confirmação -->
                            <div class='modal fade' id='modalExcluir$produto->id' tabindex='-1'>
                                <div class='modal-dialog'>
                                    <div class='modal-content bg-dark text-light'>
                                        <div class='modal-header border-0'>
                                            <h5 class='modal-title fw-bold'>Confirmar Exclusão</h5>
                                            <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal'></button>
                                        </div>
                                        <div class='modal-body'>
                                            Deseja realmente excluir o produto <strong>$produto->nome</strong>?
                                        </div>
                                        <div class='modal-footer border-0'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                            <a href='produto/apagar.php?id=$produto->id' class='btn btn-danger'>Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>";
                }
            } else {
                echo "
                    <tr>
                        <td colspan='6' class='text-center text-secondary fw-semibold p-3'>
                            Nenhum produto encontrado
                        </td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2a2a40);
    }

    .table-custom {
        background-color: #6c63ff;
        color: #fff;
        font-weight: 600;
    }

    .table td, .table th {
        text-align: center;
        vertical-align: middle;
    }

    .btn-warning {
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-danger {
        border-radius: 8px;
        font-weight: 600;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>
