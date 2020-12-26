<?php
include_once '../DAO/usuarioDAO.php';
include_once 'menu.php';
//verifica se recebeu a chave que será utilizada para atualizar o registro
if (isset($_GET['id_usuario'])) {
    $id_usuario = limpar($_GET['id_usuario']);
} else {
    //se não tiver recebido a chave, redireciona o usuário de volta a tela de cadastro
    header('Location: usuarioVIEW.php');
}

// recupera os dados do cadastro
$condicao = "where id_usuario =  $id_usuario";
$resultado = consulta_usuario('*', $condicao);

//coloca os dados recebidos em um vetor para preencher o form
$linha = $resultado[0];
//var_dump($linha);
?>
<head>
    <link href="css/tabCadastros.css" rel="stylesheet" type="text/css"/>
</head>
<form action="../CTR/usuarioCTR.php" method="POST">
    <div class="container">
        <div class="caixa caixa2">
            <h1 style="color: #fff">Vulnerabilidades</h1>
            <div class="row">
                <label for="id_usuario">ID <strong><?php echo $linha["id_usuario"] ?></strong> do registro a ser alterado</label>
                <input type="hidden" value="<?php echo $linha["id_usuario"] ?>" name="id_usuario">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha["nome"] ?>" aria-describedby="Nome completo">
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $linha["usuario"] ?>" aria-describedby="Usuário de login">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="senha">Senha</label>
                        <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $linha["senha"] ?>" aria-describedby="Senha de login">
                    </div>

                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary mb-2" name="update">Atualizar</button>
                <button type="reset" class="btn btn-danger mb-2" name="cancelar">Cancelar</button>
                <!-- <button type="submit" class="btn-lg btn-primary mb-2" name="update">Atualizar</button>
                     <button type="submit" action="action" onclick="window.history.go(-1); return false;"  class="btn btn-warning mb-2" > Voltar </button>-->


                </form>
            </div>
        </div>
</body>
</html>