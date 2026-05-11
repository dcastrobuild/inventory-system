<?php

$nome_servidor = "localhost";
$nome_usuario = "root";
$senha_usuario = "";
$nome_bd = "arm_db";
$porta  = "3307";

$conn = new mysqli($nome_servidor, $nome_usuario, $senha_usuario, $nome_bd, $porta);

if ($conn->connect_error) {
    die("Erro de conexão" . $conn->connect_error);
}
 