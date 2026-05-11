<?php 
    include '../conexao.php';

    $id = $_GET['id'];

    $conn->query("DELETE FROM produto WHERE id = $id");

    header('location:../index.php?pagina=listar')


?> 