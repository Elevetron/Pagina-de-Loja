<?php
include "../../model/db/conecta.php";
$txtConteudo = filter_input_array
                (INPUT_GET,FILTER_DEFAULT);
if (isset($txtConteudo["id"])){
    $var_id= $txtConteudo["id"];

    $sql = "SELECT * FROM PRODUTOS";
    $sql = $sql." WHERE ID = '".$var_id."'";

    $rs = mysqli_query($conexao,$sql);
    $reg = mysqli_fetch_array($rs);
    $codigo = $reg["id"];
    $var_descricao = $reg["descricao"];
    $var_quantidade = $reg["quantidade"];
    $var_preco = $reg["preco"];
}else{
    echo "Registro não localizado!";
    echo "<meta http-equiv='Refresh' content='2;
            URL=\Trabalho-web-1\view\produto\read.php'>";
}           
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\Trabalho-web-1\css\edit.css">
    <title>Alteração de Produto</title>
</head>
<body>
<nav>
            <div class="menu">
                <div id="logo">
                    <img src="\Trabalho-web-1\images\logo_empresa.jpg" alt="Logo da Empresa" width="100" height="100">

                </div>
                <a href="\Trabalho-web-1\view\index.php" style="text-decoration: none; color: inherit;">Tela Inicial</a>
                
            </div>
        </nav>
<h1 style="text-align: center;">Alteração de Produto</h1>
    <form action="\Trabalho-web-1\model\produto\update.php" method="post">  
      <input type="hidden" name="codigoProduto" 
        value="<?php print $codigo; ?>"/>
      Descrição: <input type="text" name="cDescricao"
        value="<?php print $var_descricao; ?>"><br><br>
      Quantidade : <input type="text" name="cQuantidade"
        value="<?php print $var_quantidade; ?>"><br><br>
      Preço: <input type="text" name="cPreco"
        value="<?php print $var_preco; ?>"><br><br>

    <input type="submit" value="Alterar" name="b1">
    </form>
    
</body>
</html>