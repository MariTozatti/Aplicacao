<?php
include_once 'menu.php';
include_once('../DAO/topicoDAO.php');
?>
<head>
    <link href="css/vulne.css" rel="stylesheet" type="text/css"/>
</head>
<form action="../model/ctopico.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1 style="color: #fff">Vulnerabilidades</h1>
            <div class="row formularios">
                <div class="form-group col-md-10">
                    <label> Pesquisa: </label>
                    <input type="text" name="pesquisa" class="form-control"
                           placeholder="Pesquisa por data, posição ou nome" />
                </div>
                <div class="form-group col-md-2 botoes" >
                    <input type="submit" name="localizar_vul" value="Localizar" class="btn btn-primary">
                </div>
            </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Posição</th>
                        <th scope="col">Vulnerabilidade</th>
                    </tr>
                </thead>
                <tbody>
<!--                    <tr>
                        <td>1</td>
                        <td>2020</td>
                        <td>1°</td>
                        <td>SQL Injection</td>
                    </tr>-->
                    <?php
        if (isset($_POST['pesquisa'])) {
            include_once('controller/ctopico.php');
            $retorno = localizarVulnerabilidade($_POST['pesquisa']);

            for ($i = 0; $i < count($retorno); $i++) {
                echo "<tr>";
                echo "	<td>";
                echo "	<span>" . $retorno[$i]['id_topico'] . "</span>";
                echo "	</td>";
                echo "<td>";
                echo "	<span>" . $retorno[$i]['ano'] . "</span>";
                echo "</td>";
                echo "<td>";
                echo "	<span>" . $retorno[$i]['posicao'] . "</span>";
                echo "</td>";
                echo "<td>";
                echo "	<span>" . $retorno[$i]['vulnerabilidade'] . "</span>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
                </tbody>
            </table>
            <form>
        <a href='index.php' class='btn btn-primary' style="margin: 10px;">Voltar ao Menu</a>
    </form>
        </div>
    </div>
    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>

</div>
</body>
</html>
