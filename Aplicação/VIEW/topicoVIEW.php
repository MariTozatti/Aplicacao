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
    <form action="../CTR/topicoCTR.php" method="POST">
        <div class="caixa caixa2">
            <h1>Cadastro de Vulnerabilidades</h1>
            <div class="row formularios">
                <div class="form-group col-md-3">
                    <label > Ano: </label>
                    <input type="text" name="ano" class="form-control"
                           placeholder="Ano Referênte" 
                           pattern="[0-9]{4}" title="Insira 4 caracteres" required/>
                </div>
                <div class="form-group col-md-3">
                    <label > Posição: </label>
                    <input type="text" name="posicao" class="form-control"
                           placeholder="Posição no Hanking" 
                           pattern="[0-9]{1,2}" title="De 1 a 2 caracteres" required/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label > Vulnerabilidade: </label>
                    <input type="text" name="vulnerabilidade" class="form-control"
                           placeholder="Nome da vulnerabilidade" 
                           pattern="^(?=.*[A-Z])|(?=.*[a-z])[a-zA-Z]{1,30}$" 
                           title="Até 30 caracteres" required/>
                </div>
            </div>
            <div class="row botoes">
                <div class="form-group col-md-12">
                    <input type="submit" name="gravar" value="Gravar" class="btn btn-success">    
                    <input type="reset" name="cancelar" value="Cancelar" class="btn btn-default">
                </div>
            </div>
    </form>
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
                    <th scope="col"> Ações </th>
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
                    // Cria um link informando o ID e uma operação apagar através do método GET
                    echo "<td>"
                    . "<a class='btn btn-danger' href =../CTR/topicoCTR.php?excluir=" . $linha['ID'] . "> Excluir </a> </td>";
                    echo "</tr>";
                }
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="rodape">
    <center><p>IFSP - VOTUPORANGA @2020</p></center>
</div>
</body>
</html>