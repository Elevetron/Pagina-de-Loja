<?php
$txtConteudo = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if (isset($txtConteudo["codigoProduto"])){
    $id = $txtConteudo["codigoProduto"];
    $descricao = $txtConteudo["cDescricao"];
    $quantidade = $txtConteudo["cQuantidade"];
    $preco =$txtConteudo["cPreco"];
}else{
    echo "Não foi alterado!";
    echo "<meta http-equiv='refresh' content='2;
        URL=Trabalho-web-1/view/produto/read.php'>";
}
include "../../model/db/conecta.php";
$sql = "UPDATE produtos SET ";
$sql = $sql." descricao = '$descricao',";
$sql = $sql." quantidade = '$quantidade',";
$sql = $sql." preco = '$preco'";
$sql = $sql." WHERE id = '".$id."'";

echo $sql; //para conferir se o comando esta ok
$rs = mysqli_query($conexao,$sql);
if (!$rs){
    echo "Problemas na conexão!";
    return;
}
echo "<meta http-equiv='refresh' content='2;
         URL=/Trabalho-web-1/view/produto/read.php'>";
mysqli_close($conexao);
?>