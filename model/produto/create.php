<?php
$descricao = $_POST['cDescricao'];
$quantidade = $_POST['cQuantidade'];
$preco = $_POST['cPreco'];

include "../../model/db/conecta.php";

if (isset($_FILES["cImagem"]) && $_FILES["cImagem"]["error"] == UPLOAD_ERR_OK) {
    $imagem_tmp = $_FILES["cImagem"]["tmp_name"];
    $conteudo_imagem = file_get_contents($imagem_tmp);

    // Preparando a query com um parâmetro para a imagem
    $sql = "INSERT INTO produtos (descricao, quantidade, preco, imagem) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssb", $descricao, $quantidade, $preco, $conteudo_imagem);
    $stmt->execute();

    if ($stmt) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Problemas na gravação!";
    }

    $stmt->close();
    $conexao->close();
} else {
    echo 'Erro no envio do arquivo!';
}
?>
