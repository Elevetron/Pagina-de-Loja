<?php
$descricao = $_POST['cDescricao'];
$quantidade = $_POST['cQuantidade'];
$preco = $_POST['cPreco'];

include "../../model/db/conecta.php";



if(isset($_FILES['cImagem'])){
    
}


    // // Preparando a query com um parâmetro para a imagem
    // $sql = "INSERT INTO produtos (descricao, quantidade, preco, imagem) VALUES (?, ?, ?, ?)";
    // $stmt = $conexao->prepare($sql);
    // $stmt->bind_param("sssb", $descricao, $quantidade, $preco, $conteudo_imagem);
    // $stmt->execute();

    // if ($stmt) {
    //     echo "Registro inserido com sucesso!";
    // } else {
    //     echo "Problemas na gravação!";
    // }

    // $stmt->close();
    // $conexao->close();

?>
