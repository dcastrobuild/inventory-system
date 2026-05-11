<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #2a2a40);
        }

        .login-box {
            background-color: #2c2c3c;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.6);
        }

        h2 {
            font-weight: 600;
            letter-spacing: 1px;
            color: #f5f5f5;
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

        a {
            color: #6c63ff;
            font-weight: 500;
        }

        a:hover {
            color: #857dff;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-4 login-box">
            <h2 class="text-center mb-4">Login</h2>

            
            <form action="autenticar.php" method="post">
                <input class="form-control mb-3" type="email" required name="email" placeholder="Email">
                <input class="form-control mb-3" type="password" required name="senha" placeholder="Senha">
                <button class="btn btn-custom w-100 mb-2" type="submit">Entrar</button>
            </form>

            <div class="text-center">
                <a href="cadastrarUsuario.php" class="text-decoration-none">Criar nova conta</a>
            </div>
        </div>
    </div>

</body>

</html>
