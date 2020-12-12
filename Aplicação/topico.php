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
<form action="controller/ctopico.php" method="POST">
    <?php
    if (isset($_REQUEST['id'])) {
        $topico = localizarTopicosID($_REQUEST['id']);
        ?>
        <div class="container">
            <div class="caixa caixa2">
                <h1>Cadastro de Vulnerabilidades</h1>
                <div class="row formularios">
                    <div class="form-group col-md-3">
                        <label > Código: </label>
                        <input type="number" name="id_topico" class="form-control"
                               readonly value="<?php echo $topico[0]['id_topico'] ?>" readonly placeholder="Automático"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label > Ano: </label>
                        <input type="number" name="ano" class="form-control"
                               readonly value="<?php echo $topico[0]['ano'] ?>" readonly placeholder="Automático"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label > Posição: </label>
                        <input type="number" name="posicao" class="form-control"
                               readonly value="<?php echo $topico[0]['posicao'] ?>" readonly placeholder="Automático"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label > Vulnerabilidade: </label>
                        <input type="text" name="vulnerabilidade" class="form-control"
                               readonly value="<?php echo $topico[0]['vulnerabilidade'] ?>" readonly placeholder="Automático"/>
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
                <input type="submit" name="acoes" value="Outras Ações" class="btn btn-primary">
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
