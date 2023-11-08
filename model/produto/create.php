<?php
$descricao = $_POST['cDescricao'];
$quantidade = $_POST['cQuantidade'];
$preco = $_POST['cPreco'];

include "../../model/db/conecta.php";



if(isset($_FILES['cImagem'])){
    $arquivo = $_FILES['cImagem'];
    if($arquivo['size'] > 2097152) die("Arquivo muito grande!! Max: 2MB");

    if($arquivo['error']) die("Falha ao enviar arquivo");

    $pasta = "images/produtos_imagens";
    $nome_do_arquivo = $arquivo["name"];
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($nome_do_arquivo, PATHINFO_EXTENSION));

    $path = $pasta . '/' . $novo_nome_do_arquivo . "." . $extensao;

    if($extensao != "jpg" && $extensao != "png") die("Tipo de arquivo não aceito!");

    $sucess = move_uploaded_file($arquivo["tmp_name"], "../../$path");

    if($sucess){ 
        $conexao->query("INSERT INTO arquivos(nome, path) VALUES('$nome_do_arquivo','$path')") or die($conexao->error);

        $sql = "SELECT id FROM arquivos where path = '$path'";
        $rs = mysqli_query($conexao, $sql) or die($conexao->error);
        if($rs){
            if(mysqli_num_rows($rs) > 0){
                $row = mysqli_fetch_assoc($rs);
                $imagem_id = $row["id"];
            }else echo "Nenhum resultado encontrado";

            $conexao->query("INSERT INTO produtos(descricao, quantidade,preco, id_imagem) VALUES('$descricao','$quantidade','$preco','$imagem_id')") or die($conexao->error);

            header("Location: ../../view/index.php");
            exit;
        
        }else echo "Falha ao salvar no banco";


    }else echo "Falha ao enviar arquivo";
    
}

header("Location: ../../view/index.php");
            exit;

