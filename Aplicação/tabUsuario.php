<?php
include_once 'config/header.php';
include_once('controller/cusuario.php');
?>
<style>   
    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed);
    body{
        font-family: 'Roboto Condensed';
    }
.caixa{
    padding-left: 10%;
    padding-right: 8%;
    padding-top: 3%;
    padding-bottom: auto;
    padding-bottom: 4%;
    margin-top: 5%;
    border-right: #fff solid 1px;
    border-top: #fff solid 1px;
    border-bottom: #fff solid 1px;
    font: couier, monospace;  
    font-size: 21px;
    text-align: justify; 
    text-indent: 50px; 
    color: black;   
    background-color:rgba(255,255,255,.2);
}
.caixa2{
    text-indent: 0px;
}
.rodape{
    padding-top: 1%;
    font-size:14px;
    color: #fff;
    margin-bottom: 3%;
}
.formularios{
    margin-top:2%;
}
.botoes{
    margin-top:3.6%;
}
</style>
<form action="controller/cusuario.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1 style="color: #fff">Usuários</h1>
            <div class="row formularios">
                <div class="form-group col-md-10">
                    <label> Pesquisa: </label>
                    <input type="text" name="pesquisa_top" class="form-control"
                           placeholder="Pesquisa por data, posição ou nome" />
                </div>
                <div class="form-group col-md-2 botoes" >
                    <input type="submit" name="localizar" value="Localizar" class="btn btn-primary">
                </div>
            </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
<!--                    <tr>
                        <td>1</td>
                        <td>Mariana</td>
                        <td>Mari</td>
                        <td></td>
                    </tr>-->
                    <?php
        if (isset($_POST['pesquisa'])) {
            include_once('controller/cusuario.php');
            $retorno = localizarUsuario($_POST['pesquisa']);

            for ($i = 0; $i < count($retorno); $i++) {
                echo "<tr>";
                echo "	<td>";
                echo "	<span>" . $retorno[$i]['id_usuario'] . "</span>";
                echo "	</td>";
                echo "<td>";
                echo "	<span>" . $retorno[$i]['nome'] . "</span>";
                echo "</td>";
                echo "<td>";
                echo "	<span>" . $retorno[$i]['usuario'] . "</span>";
                echo "</td>";
                echo "<td>";
                echo "	<a href='?acao=del&id=" . $retorno[$i]['id_usuario'] . "' class='btn btn-danger'>Excluir </a><a href='?acao=alt&id=" . $retorno[$i]['id_usuario'] . "' class='btn btn-primary' > Alterar</a>";
                echo "</tr>";
            }
        }
        ?>
                </tbody>
            </table>
            <form>
        <a href='usuario.php' class='btn btn-primary' style="margin: 10px;">Voltar ao cadastro</a>
    </form>
        </div>
    </div>
    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>

</div>
<?php
if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "del") {
        excluirUsuarios($_REQUEST['id']);
        echo "<script language='javascript'> alert('Usuario excluído com sucesso!') </script>";
        echo " <script>document.location.href='tabUsuario.php'</script>";
    } else if ($_REQUEST['acao'] == "alt") {
        echo "<script>document.location.href='usuario.php?id=" . $_REQUEST['id'] . "'</script>";
    }
}
?>
</body>
</html>
