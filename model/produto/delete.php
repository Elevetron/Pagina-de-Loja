<?php
$txtConteudo = filter_input_array
                (INPUT_GET,FILTER_DEFAULT);
if (isset($txtConteudo["id"])){
    $varId = $txtConteudo["id"];

    include "../../model/db/conecta.php";
    $sql = "DELETE FROM produtos ";
    $sql = $sql." WHERE id ='".$varId."' ";

    $rs = mysqli_query($conexao,$sql);
    if ($rs){
        print "Dados excluídos com sucesso!";
    }else{
        print "Exclusão não efetuada";
    }
    mysqli_close($conexao);
    print '<meta http-equiv="refresh" 
    content="1;URL=../../view/produto/read.php"/>';
    
}else{
    print "Exclusão não efetuada, verifique!";
    print '<meta http-equiv="refresh" 
    content="1;URL=../../view/produto/read.php"/>';
}
?>