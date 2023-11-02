<?php
include "../model/db/conecta.php";
$sql = "SELECT * FROM PRODUTOS";
$rs = mysqli_query($conexao,$sql);
$total_registros = mysqli_num_rows($rs);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT imagem FROM produtos WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $imagem = mysqli_fetch_assoc($result)['imagem'];
        header('Content-Type: image/jpeg');
        echo base64_decode($imagem);
        exit;
    }
}



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
                <a href="../view/produto/create.php" style="text-decoration: none; color: inherit;">Cadastrar Produtos</a>
                <a href="../view/produto/read.php" style="text-decoration: none; color: inherit;">Consulta de Produtos</a>
            </div>
        </nav>
        
            <div class="titulo">
                <h1>Elevetron Segurança</h1>
            </div>
           

            <div class="produtos">
                <h1>Equipamentos de Segurança</h1>
                <?php
                        while ($reg = mysqli_fetch_array($rs)){
                            $id = $reg["id"];
                            $descricao = $reg["descricao"];
                            $preco = $reg["preco"];
                            $preco = str_replace('.', ',', $preco);
                            
                       
                    ?>
                <div class="product">
                <img src="exibicao_imagem.php?id=<?php echo $id; ?>" alt="<?php echo $descricao; ?>">
                    <p><?php print $descricao; ?></p>
                    <p class="price">R$ <?php print  $preco; ?></p>
                    <button>Comprar</button>
                </div>
                <?php } ?>
               
            </div>
    </body>

</html>