<?php
include "../../model/db/conecta.php";

$sql = "SELECT * FROM PRODUTOS";
//busca na tabela pessoa todos os registros
$rs = mysqli_query($conexao,$sql);
$total_registros = mysqli_num_rows($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Pessoa</title>
    <script language="Javascript">
        function confirmacao(id,descricao){
            var resp = confirm("Deseja remover "+
                        descricao+"?");
            if (resp == true){
                window.location.href=
                        "excluiProduto.php?+id="+id;
            }
        }
    </script>
</head>
<body>
<h1>Relação de Produtos</h1>    
<table cellspacing="0" border="1">
<thead>
    <tr><th>Id</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
</thead>
<?php
    while ($reg = mysqli_fetch_array($rs)){
        $id = $reg["id"];
        $descricao = $reg["descricao"];
        $quantidade = $reg["quantidade"];
        $preco = $reg["preco"];
    //} enquanto não será fechado aqui
?>
<tr>
    <td><?php print $descricao; ?></td>
    <td><?php print $quantidade; ?></td>
    <td><?php print $preco; ?></td>
    <td><!-- botão de alteração -->
        <a href="alteraProduto.php?id=
         <?php print $id;?>">
         <img src="alterar.png" border="0"
         width="20px" heigth="20px"></a>
        <!-- botão de exclusão -->
        <a href="javascript:func()" 
        onclick="confirmacao
        ('<?php print $id; ?>',
        '<?php print $descricao; ?>')">
         <img src="excluir.png" border="0"
         width="20px" heigth="20px"></a>
    </td>
</tr>
<?php } ?>
</table>
</body>
</html>