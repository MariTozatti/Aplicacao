<?php
include_once 'config/header.php';
include_once('controller/ctopicos.php');
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
    padding-bottom: auto;
    padding-bottom: 10px;
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
.botoes{
    margin-top:3.6%;
}
</style>
<form action="controller/ctopicos.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1 style="color: #fff">Vulnerabilidades</h1>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Posição</th>
                        <th scope="col">Vulnerabilidade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2020</td>
                        <td>1°</td>
                        <td>SQL Injection</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="rodape">
        <center><p>IFSP - VOTUPORANGA @2020</p></center>
    </div>

</div>
</form>
</body>
</html>
