<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
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
