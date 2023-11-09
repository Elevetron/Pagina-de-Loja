<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="\Trabalho-web-1\css\create.css">
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="../../model/produto/create.php" method="post" enctype="multipart/form-data">
        Descrição: <input type="text" name="cDescricao"><br>
        Quantidade: <input type="text" name="cQuantidade"><br>
        Preço: <input type="text" name="cPreco"><br>
        Imagem: <input type="file" name="cImagem"><br>

        <input type="submit" value="Salvar" name="b1">
    </form>
</body>
</html>
