<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('conexao.php');

$nomeUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "Visitante";
?>

<h1 class="text-center mb-4 fw-bold text-white">
    Olá, seja bem-vindo <?= $nomeUsuario ?>!
</h1>
 

<div class="container mt-4">
    <form class="input-group mb-4 shadow-sm" action="" method="get">
        <input name="busca" type="text" required class="form-control"
            placeholder="Digite o nome do produto"
            value="<?= isset($_GET['busca']) ? $_GET['busca'] : '' ?>">
        <button class="btn btn-custom" type="submit">Pesquisar</button>
    </form>

    <?php if (isset($_GET['busca'])): ?>
        <div class="mb-3 text-end">
            <a href="?pagina=home" class="btn btn-outline-light btn-sm">Apagar busca</a>
        </div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-dark table-hover table-bordered align-middle text-center">
            <thead class="table-custom">
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Situação</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];
                    $select = "SELECT * FROM produto WHERE nome LIKE '%$busca%' ORDER BY nome ASC";
                    $result = $conn->query($select);

                    if ($result->num_rows > 0) {
                        while ($produto = $result->fetch_object()) {
                            echo "<tr>
                                    <td class='fw-semibold'>$produto->nome</td>
                                    <td>R$ $produto->valor</td>
                                    <td>$produto->marca</td>";

                            if ($produto->quantidade >= 20) {
                                echo "<td><span class='badge bg-success px-3 py-2'>Tem Estoque ✅</span></td>";
                            } else {
                                echo "<td><span class='badge bg-danger px-3 py-2'>Repor estoque ❌</span></td>";
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "
                        <tr> 
                            <td colspan='3' class='text-center text-secondary fw-semibold'>
                                Nenhum produto encontrado
                            </td>
                        </tr>";
                    }
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
    }
</style>
