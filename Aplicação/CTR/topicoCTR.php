<?php
include_once '../config/conexao.php';
include_once '../DAO/topicoDAO.php';

//CTR - é o que liga as funções (DAO) e a tela (VIEW)

if (isset($_POST['gravar'])) {
    if (gravar_topico()) : //chama a função do DAO
        echo ("<script> window.alert('Vulnerabilidade Cadastrada com Sucesso')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
        // mostra a mensagem para o usuário
    else : echo ("<script> window.alert('Erro ao Cadastrar Vulnerabilidade')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
    endif;
} else if (isset($_GET['excluir'])) {
    if (excluir_topico()) :
        echo ("<script> window.alert('Vulnerabilidade Excluida com Sucesso')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
    else : echo ("<script> window.alert('Erro ao Excluir Vulnerabilidade')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
    endif;
} else {
    echo ("<script> window.alert('Ação não encontrada')
        window.location.href='../VIEW/topicoVIEW.php';</script>");
}
?>