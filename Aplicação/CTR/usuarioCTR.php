<?php
include_once '../config/conexao.php';
include_once '../DAO/usuarioDAO.php';

if (isset($_POST['gravar'])) {
    if (gravar_usuario()) :
        echo ("<script> window.alert('Usuário Cadastrado com Sucesso')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");

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