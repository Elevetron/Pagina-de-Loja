<?php
include "../db/conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produto = $_POST["id_produto"];
    $descricao = $_POST["cDescricao"];
    $quantidade = $_POST["cQuantidade"];
    $preco = $_POST["cPreco"];

    
    if ($_FILES["cImagem"]["size"] > 0) {
        
        $target_dir = "../images/upload/";
        $target_file = $target_dir . basename($_FILES["cImagem"]["name"]);
        move_uploaded_file($_FILES["cImagem"]["tmp_name"], $target_file);

        
        $sqlUpdate = "UPDATE PRODUTOS SET descricao = '$descricao', quantidade = $quantidade, preco = '$preco', path_imagem = '$target_file' WHERE id = $id_produto";
    } else {
        
        $sqlUpdate = "UPDATE PRODUTOS SET descricao = '$descricao', quantidade = $quantidade, preco = '$preco' WHERE id = $id_produto";
    }

    if (mysqli_query($conexao, $sqlUpdate)) {
        header("Location: ../../view/produto/read.php");
        exit();
    } else {
        echo "Erro ao atualizar o produto: " . mysqli_error($conexao);
    }
} else {
    echo "Requisição inválida!";
}
?>
