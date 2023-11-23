<?php
include "../model/db/conecta.php";
$sql = "SELECT * FROM PRODUTOS";
$rs = mysqli_query($conexao, $sql);
$total_registros = mysqli_num_rows($rs);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Equipamentos de Segurança</title>
    <link rel="stylesheet" href="../css/index.css">

    <head>

    <body>
        <nav>
            <div class="menu">
                <div id="logo">
                    <img src="../images/logo_empresa.jpg" alt="Logo da Empresa" width="100" height="100">

                </div>
                <div class="links-menu">
                    <a href="../view/produto/create.php" style="text-decoration: none; color: inherit;">Cadastrar Produtos</a>
                    <a href="../view/produto/read.php" style="text-decoration: none; color: inherit;">Consulta de Produtos</a>
                </div>
                
            </div>
        </nav>

        <div class="titulo">
            <h1>Elevetron Segurança</h1>
        </div>


        <div class="produtos">
    <h1>Equipamentos de Segurança</h1>
    <?php
    $rs_produtos = mysqli_query($conexao, $sql);
    while ($reg = mysqli_fetch_array($rs_produtos)) {
        $id = $reg["id"];
        $descricao = $reg["descricao"];
        $preco = str_replace('.', ',', $reg["preco"]);
        $id_imagem = $reg['id_imagem'];
        $quantidade = $reg['quantidade'];

        if ($quantidade > 0) {
            $rs_imagem = mysqli_query($conexao, "SELECT path FROM arquivos WHERE id = $id_imagem") or die("Erro na consulta: " . mysqli_error($conexao));

            if ($rs_imagem && mysqli_num_rows($rs_imagem) > 0) {
                $row = mysqli_fetch_assoc($rs_imagem);
                $path = $row["path"];
                if (!file_exists("../$path")) {
                    $path = "images/imagens_padrao/sem_imagem.png";
                }
            } else {
                $path = "images/imagens_padrao/sem_imagem.png";
            }
    ?>
            <div class="product">
                <div class="imagem-do-produto">
                    <img src="<?php echo "../$path"; ?>" alt="<?php echo $descricao; ?>">
                </div>
                <div class="conteudo-do-produto">
                    <p><?php echo $descricao; ?></p>
                    <p class="price">R$ <?php echo $preco; ?></p>
                    <p class="quantity">Quantidade: <?php echo $quantidade; ?></p>

                    <button onclick="confirmarCompra('<?php echo $id; ?>', '<?php echo $quantidade; ?>')">Comprar</button>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>


    </body>

</html>

<script>

    function confirmarCompra(idProduto, quantidade) {
    var resposta = confirm("Deseja continuar com a compra?");

    if (resposta == true) {
        window.location.href = "../model/produto/compra.php?id=" + idProduto;
    } else {
        
        alert("Compra cancelada");
    }
}

</script>