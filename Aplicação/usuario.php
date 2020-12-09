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
    color: black;
    padding-left: 150px;
    padding-right: 100px;
    padding-top: 25px;
    padding-bottom: 3%;
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
.formularios{
    margin-top:2%;
}
</style>
<form action="controller/cusuario.php" method="POST">
    <div class="container">
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
                        <input type="submit" name="excluir" value="Excluir" class="btn btn-danger">
                    </div>
                </div>
            </div>
            <div class="rodape">
                <center><p>IFSP - VOTUPORANGA @2020</p></center>
            </div>
        </div>
</form>
</body>
</html>
