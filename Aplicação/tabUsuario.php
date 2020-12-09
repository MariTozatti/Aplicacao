<?php
include_once('config/header.php');
include_once('controller/cusuario.php');
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed);
    body{
        font-family: 'Roboto Condensed';
    }
    .caixa{
    color: black;
    padding-left: 150px;
    padding-right: 100px;
    padding-top: 25px;
    padding-bottom: 5%;
    font: couier, monospace;
    text-align: justify;   
    font-size: 21px;
    text-indent: 50px; 
    border-right: #fff solid 1px;
    border-top: #fff solid 1px;
    border-bottom: #fff solid 1px;
    margin-top: 5%;
    background-color:rgba(255,255,255,.2);
}
.caixa2{
    text-indent: 0px;
}
.rodape{
    padding-top: 1%;
    font-size:14px;
    color: #fff;
}
.txt{
    line-height: 1.5;
}
</style>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<!--///////////// TROCAR A TABELA POR UMA MAIS BONITA, ESSA TA ESTRANHA /////////// -->
<div class="conteiner" style="margin-bottom: 25px;">
    <form action="tabUsuario.php" method="POST">
        <div class="row caixa caixa2">
            <div class="col-md-3">
                <label>Localizar por descrição:</label>
            </div>
            <div class="col-md-7">
                <input type="text" name="pesquisa" class="form-control">
            </div>
            <div class="col-me-2" style="margin-bottom: 8px;">
                <input type="submit" value="Localizar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<div class="texto">
    <table class="table table-striped table-hover">
        <tr class="row">
            <th class="col-md-2">
                <span><b>Cód.</b></span>			
            </th>	
            <th class="col-md-4">
                <span><b>Nome</b></span>			
            </th>
            <th class="col-md-2">
                <span><b>Usuario</b></span>			
            </th>
            <th class="col-md-2">
                <span><b>Senha</b></span>			
            </th>
            <th class="col-md-2">
                &nbsp;
            </th>
        </tr>

        <?php
        if (isset($_POST['pesquisa'])) {
            include_once('controller/cusuario.php');
            $retorno = localizarUsuario($_POST['pesquisa']);

            for ($i = 0; $i < count($retorno); $i++) {
                echo "<tr class='row'>";
                echo "	<td class='col-md-2'>";
                echo "		<span>" . $retorno[$i]['id_usuario'] . "</span>";
                echo "	</td>";
                echo "<td class='col-md-4'>";
                echo "		<span>" . $retorno[$i]['nome'] . "</span>";
                echo "</td>";
                echo "<td class='col-md-2'>";
                echo "		<span>" . $retorno[$i]['usuario'] . "</span>";
                echo "</td>";
                echo "<td class='col-md-2'>";
                echo "	<span>" . $retorno[$i]['senha'] . "</span>";
                echo "</td>";
                echo "<td class='col-md-2'>";
                echo "	<a href='?acao=del&id=" . $retorno[$i]['id_usuario'] . "' class='btn btn-danger' style='margin-right: 10px;'>Excluir </a><a href='?acao=alt&id=" . $retorno[$i]['id_usuario'] . "' class='btn btn-primary' > Alterar</a>";
                echo "</tr>";
            }
        }
        ?>

    </table>
    <form>
        <a href='usuario.php' class='btn btn-primary' style="margin: 10px;">Voltar ao cadastro</a>
    </form>
</div>
<?php

if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "del") {
        excluirUsuarios($_REQUEST['id']);
        echo "<script language='javascript'> alert('Usuário excluído com sucesso!') </script>";
        echo " <script>document.location.href='tabUsuarios.php'</script>";
    } else if ($_REQUEST['acao'] == "alt") {
        echo "<script>document.location.href='usuarios.php?id=" . $_REQUEST['id'] . "'</script>";
    }
}
?>