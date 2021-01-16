<?php
include_once '../config/conexao.php';
include_once '../DAO/usuarioDAO.php';

//CTR - é o que liga as funções (DAO) e a tela (VIEW)

if (isset($_POST['gravar'])) {
    if (gravar_usuario()) : //chama a função do DAO
        echo ("<script> window.alert('Usuário Cadastrado com Sucesso')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
        // mostra a mensagem para o usuário
    else : echo ("<script> window.alert('Erro ao Cadastrar Usuário')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
    endif;
} else if (isset($_GET['excluir'])) {
    if (excluir_usuario()) :
        echo ("<script> window.alert('Usuário Excluido com Sucesso')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
    else : echo ("<script> window.alert('Erro ao Excluir Usuário')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
    endif;  
} else {
        echo ("<script> window.alert('Ação não encontrada')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
}
?>