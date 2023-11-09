<?php
$txtConteudo = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if (isset($txtConteudo["codigoProduto"])){
    $id = $txtConteudo["codigoProduto"];
    $descricao = $txtConteudo["cDescricao"];
    $quantidade = $txtConteudo["cQuantidade"];
    $preco =$txtConteudo["cPreco"];
}else{
    echo "Não foi alterado!";
    echo "<meta http-equiv='refresh' content='0;
        URL=Trabalho-web-1/view/produto/read.php'>";
}
include "conecta.php";
$sql = "UPDATE PRODUTOS SET ";
$sql = $sql." DESCRICAO = '$descricao',";
$sql = $sql." QUANTIDADE = '$quantidade',";
$sql = $sql." PRECO = '$preco'";
$sql = $sql." WHERE ID = '".$id."'";

echo $sql; //para conferir se o comando esta ok
$rs = mysqli_query($conexao,$sql);
if (!$rs){
    echo "Problemas na conexão!";
    return;
}
echo "<meta http-equiv='refresh' content='0;
         URL=Trabalho-web-1/view/produto/read.php'>";
mysqli_close($conexao);
?>