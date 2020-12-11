<?php
include_once 'config/header.php';

include_once ('controller/cusuario.php');
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed);
    body{
        font-family: 'Roboto Condensed';
    }
    .caixa{
        padding-left: 10%;
        padding-right: 8%;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-left: 9%;
        margin-right: 9%;
        margin-top: 4%;
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
    }
    .formularios{
        margin-top:2%;
    }
</style>
<form action="controller/cusuario.php" method="POST">
    <?php
    if (isset($_REQUEST['id'])) {
        $usuario = localizarUsuariosID($_REQUEST['id']);
        ?>

        <div class="container">
            <div class="caixa caixa2">
                <h1>Cadastro de Usuários</h1>
                <div class="row formularios">
                    <div class="form-group col-md-11">
                        <label> Nome: </label>
                        <input type="text" name="nome" class="form-control"
                               readonly value="<?php echo $usuario[0]['nome'] ?>" readonly placeholder="Automático" />
                    </div>
                    <div class="form-group col-md-1">
                        <label> Código: </label>
                        <input type="text" name="id_usuario" class="form-control"
                               readonly value="<?php echo $usuario[0]['id_usuario'] ?>" readonly placeholder="Automático" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label > Usuário de Login: </label>
                        <input type="text" name="usuario" class="form-control"
                               readonly value="<?php echo $usuario[0]['usuario'] ?>" readonly placeholder="Automático" />
                    </div>
                    <div class="form-group col-md-6">
                        <label > Senha: </label>
                        <input type="text" name="senha" class="form-control"
                               readonly value="<?php echo $usuario[0]['senha'] ?>" readonly placeholder="Automático" />
                    </div>
                </div>
                <div class="row botoes">
                    <div class="form-group col-md-12">
                        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>
    <?php
} else {
    ?>
    <div class="caixa caixa2">
        <h1>Cadastro de Usuários</h1>
        <div class="row formularios">
            <div class="form-group col-md-12">
                <label> Nome: </label>
                <input type="text" name="nome" class="form-control"
                       placeholder="Nome completo" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label > Usuário de Login: </label>
                <input type="text" name="usuario" class="form-control"
                       placeholder="Nome do usuário(login)" />
            </div>
            <div class="form-group col-md-6">
                <label > Senha: </label>
                <input type="text" name="senha" class="form-control"
                       placeholder="Senha do usuário(login)" />
            </div>
        </div>
        <div class="row botoes">
            <div class="form-group col-md-12">
                <input type="submit" name="gravar" value="Gravar" class="btn btn-success">
                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                <input type="submit" name="excluir" value="Excluir" class="btn btn-danger">
            </div>
        </div>
    </div>

    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>



    <?php
}
?>
</body>
</html>
