<?php 
    session_start();
    include "../conexao.php";

     
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $resposta = $conn->query($sql);

    if($resposta->num_rows > 0){
        $usuario = $resposta->fetch_object();
        
       
        $_SESSION['usuario'] = $usuario->nome;
        $_SESSION['email']   = $usuario->email;

        header('location: ../index.php');
        exit;
    } else {
   
    echo "
    <body style=\"
        margin:0;
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2a2a40);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    \">
        <div style=\"
            background-color: #2c2c3c;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.6);
            color: #f5f5f5;
        \">
            <h3 style=\"
                color: #ff4d4d;
                font-weight: 600;
                margin-bottom: 1rem;
            \">❌ Erro ao logar</h3>
            <p>Email ou senha inválidos. Tente novamente.</p>
            <a href='login.php' style=\"
                display: inline-block;
                margin-top: 1rem;
                padding: 0.5rem 1rem;
                background-color: #6c63ff;
                color: #fff;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
            \">Voltar</a>
        </div>
    </body>
    ";
}

?>
