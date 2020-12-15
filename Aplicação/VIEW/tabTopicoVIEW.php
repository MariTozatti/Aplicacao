<?php
include_once '../DAO/topicoDAO.php';
include_once 'menu.php';
//verifica se recebeu a chave que será utilizada para atualizar o registro
if (isset($_GET['id_topico'])) {
    $id_topico = limpar($_GET['id_topico']);
} else {
    //se não tiver recebido a chave, redireciona o usuário de volta a tela de cadastro
    header('Location: topicoVIEW.php');
}

// recupera os dados do cadastro
$condicao = "where id_topico =  $id_topico";
$resultado = consulta_topico('*', $condicao);

//coloca os dados recebidos em um vetor para preencher o form
$linha = $resultado[0];
//var_dump($linha);
?>
<head>
    <link href="css/tabCadastros.css" rel="stylesheet" type="text/css"/>
</head>
<form action="../CTR/topicoCTR.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1 style="color: #fff">Vulnerabilidades</h1>
            <div class="row">
                <label for="id_topico">ID <strong><?php echo $linha["ID"] ?></strong> do registro a ser alterado</label>
                <input type="hidden" value="<?php echo $linha["ID"] ?>" name="id_topico">
                <div class="form-group">
                    <label for="Vulnerabilidade">Vulnerabilidade</label>
                    <input type="text" class="form-control" id="vulnerabilidade" name="vulnerabilidade" value="<?php echo $linha["vulnerabilidade"] ?>" aria-describedby="Inicial do medicamento">
                </div>
                <div class="form-group">
                    <label for="posicao">Posicao</label>
                    <input type="text" class="form-control" id="posicao" name="posicao" value="<?php echo $linha["posicao"] ?>" aria-describedby="Nome do medicamento">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $linha["ano"] ?>" aria-describedby="Quantidade do medicamento">
                    </div>

                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary mb-2" name="update">Atualizar</button>
                <button type="reset" class="btn btn-danger mb-2" name="cancelar">Cancelar</button>
                </form>
            </div>
        </div>
</body>
</html>