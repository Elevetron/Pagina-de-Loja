<?php
$txtConteudo = filter_input_array
                (INPUT_GET,FILTER_DEFAULT);
if (isset($txtConteudo["id"])){
    $varId = $txtConteudo["id"];

    include "conecta.php";
    $sql = "DELETE FROM PRODUTOS ";
    $sql = $sql." WHERE ID ='".$varId."' ";

    $rs = mysqli_query($conexao,$sql);
    if ($rs){
        print "Dados excluídos com sucesso!";
    }else{
        print "Exclusão não efetuada";
    }
    mysqli_close($conexao);
    print '<meta http-equiv="refresh" 
    content="2;URL=index.php"/>';
}else{
    print "Exclusão não efetuada, verifique!";
}
?>