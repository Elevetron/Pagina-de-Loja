<?php
include "../../model/db/conecta.php";


if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    
    $sql = "SELECT * FROM PRODUTOS WHERE id = $id_produto";
    $rs = mysqli_query($conexao, $sql);

  
    if ($reg = mysqli_fetch_array($rs)) {
        $descricao = $reg["descricao"];
        $quantidade = $reg["quantidade"];
        $preco = str_replace('.', ',', $reg["preco"]);
    } else {

        header("Location: read.php");
        exit();
    }
} else {
    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produto</title>
    <link rel="stylesheet" href="../../css/create.css">
</head>

<body>
    <nav>
        <div class="menu">
            <div id="logo">
                <a href="../index.php" style="text-decoration: none; color: inherit;">
                    <img src="../../images/logo_empresa.jpg" alt="Logo da Empresa" width="100" height="100">
                </a>
            </div>
        </div>
    </nav>

    <div class="titulo">
        <h1>Elevetron Segurança</h1>
    </div>

    <h1>Edição de Produto</h1>
    <form action="../../model/produto/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">

        Descrição: <input type="text" name="cDescricao" value="<?php echo $descricao; ?>"><br>
        Quantidade: <input type="text" name="cQuantidade" value="<?php echo $quantidade; ?>"><br>
        Preço: <input type="text" name="cPreco" value="<?php echo $preco; ?>"><br>
        Imagem: <input type="file" name="cImagem"><br>

        <input type="submit" value="Salvar" name="b1">
    </form>
</body>

</html>
