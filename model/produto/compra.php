<?php
include "../db/conecta.php";

if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    $sqlUpdate = "UPDATE PRODUTOS SET quantidade = quantidade - 1 WHERE id = $idProduto";

    if (mysqli_query($conexao, $sqlUpdate)) {
        echo "Compra realizada com sucesso!";
    } else {
        echo "Erro ao atualizar a quantidade: " . mysqli_error($conexao);
    }
} else {
    echo "ID do produto não fornecido!";
    
}

header("Location: ../../view/index.php");

?>
