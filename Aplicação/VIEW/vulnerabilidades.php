<?php
include_once 'menu.php';
include_once '../config/conexao.php';
include_once '../DAO/topicoDAO.php';

function consulta($consulta) {
    $conn = conexao();
    $stmt = $conn->prepare($consulta);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<head>
    <link href="css/cadastros.css" rel="stylesheet" type="text/css"/>
</head>
<div class="container">
        <div class="caixa caixa2">
        <h1>Vulnerabilidades</h1>
    <?php
    $consulta = 'SELECT id_topico as "ID", vulnerabilidade as "Vulnerabilidade", posicao as "Posicao", ano as "Ano" from Cadastro_topico;';
    $campos = 'id_topico as "ID", vulnerabilidade as "Vulnerabilidade", posicao as "Posicao", ano as "Ano"';
    $resultado = consulta_topico($campos);

    if (count($resultado) > 0) :
        $linha = $resultado[0];
        ?>

        <table class="table table-hover">
            <thead class=" thead-dark ">
                <tr>
                    <?php
                    foreach ($linha as $coluna => $valor) {
                        echo '<th scope = "col">' . $coluna . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultado as $linha) {
                    echo "<tr>";
                    echo "<td>" . $linha['ID'] . "</td>";
                    echo "<td>" . $linha['Vulnerabilidade'] . "</td>";
                    echo "<td>" . $linha['Posicao'] . "</td>";
                    echo "<td>" . $linha['Ano'] . "</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
else :
    echo ("<script> window.alert('Nenhum registro encontrado')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
endif;
?>
<div class="rodape">
    <center><p>IFSP - VOTUPORANGA @2021</p></center>
</div>
</body>
</html>