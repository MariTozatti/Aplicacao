<?php
include_once 'config/header.php';

include_once ('controller/ctopico.php');
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
<form action="controller/ctopico.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1>Cadastro de Vulnerabilidades</h1>
            <div class="row formularios">
                <div class="form-group col-md-3">
                    <label > Ano: </label>
                    <input type="text" name="ano" class="form-control"
                           placeholder="Ano Referênte" />
                </div>
                <div class="form-group col-md-3">
                    <label > Posição: </label>
                    <input type="text" name="posicao" class="form-control"
                           placeholder="Posição no Hanking" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label > Vulnerabilidade: </label>
                    <input type="text" name="vulnerabilidade" class="form-control"
                           placeholder="Nome da vulnerabilidade" />
                </div>
            </div>
            <div class="row botoes">
                <div class="form-group col-md-12">
                    <input type="submit" name="gravar" value="Gravar" class="btn btn-success">
                    <input type="submit" name="excluir" value="Excluir" class="btn btn-danger">
                </div>
            </div>
        </div>
    </div>
    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>
</form>
</body>
</html>
