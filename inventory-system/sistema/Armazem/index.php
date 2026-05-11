<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: auth/login.php');
}

$usuario = $_SESSION['usuario'];
?> 

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <title>Início</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e1e2f, #2a2a40);
      color: #f5f5f5;
    }

    .navbar {
      background: #6c63ff !important;
    }

    .navbar-brand {
      color: #fff !important;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .nav-link {
      color: #f5f5f5 !important;
      transition: 0.3s;
    }

    .nav-link:hover {
      color: #d1d1ff !important;
    }

    .navbar-text {
      color: #fff !important;
      font-weight: 500;
    }

    .btn-logout {
      background-color: #2c2c3c;
      border: none;
      border-radius: 20px;
      font-weight: 500;
      color: #fff;
      transition: 0.3s;
    }

    .btn-logout:hover {
      background-color: #44445a;
    }

    .container {
      background-color: #2c2c3c;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.6);
    }
  </style>
</head>

<body class="d-flex">

  <nav class="navbar shadow">

    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

        </a>
      </button>
      <a class="navbar-brand" href="index.php">
        <i class="bi bi-house-door-fill me-1"></i> Início
      </a>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="?pagina=cadastrar">
              <i class="bi bi-box-seam me-1"></i> Cadastrar o produto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="?pagina=registrar">
              <i class="bi bi-cash-stack me-1"></i> Registrar Operação
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="?pagina=listar">
              <i class="bi bi-list-ul me-1"></i> Listar
            </a>
          </li>
        </ul>
        <br><br>
        <ul class="navbar-nav align-items-center">
          <span class="navbar-text me-3 d-flex align-items-center" style="font-size: 15px;">
            <i class="bi bi-person-circle fs-5 me-1"></i>
            <?= $usuario ?>
          </span>

          <a class="btn btn-logout btn-sm d-flex align-items-center px-3" href="?pagina=sair">
            <i class="bi bi-box-arrow-right me-1"></i> Sair
          </a>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <?php
    switch (@$_REQUEST['pagina']) {
      case 'cadastrar':
        include('produto/formCadastrar.php');
        break;
      case 'registrar':
        include('vendas/formVendas.php');
        break;
      case 'editar':
        include('produto/formEditar.php');
        break;
      case 'listar':
        include('produto/listar.php');
        break;
      case 'sair':
        include('auth/sair.php');
        break;
      default:
        include("home.php");
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>