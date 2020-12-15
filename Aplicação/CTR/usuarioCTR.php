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
} else if (isset($_POST['alterar'])) {
    if (alterar_usuario()) :
        echo ("<script> window.alert('Usuário Alterado com Sucesso')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
    else :
        echo ("<script> window.alert('Erro ao Alterar Usuário')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
    endif;
} else {
    //caso MedicamentoCTR seja chamada mas não entre em update, apagar, ou cadastrar informar que a rota não foi identificada
    echo ("<script> window.alert('Ação não encontrada')
        window.location.href='../VIEW/usuarioVIEW.php';</script>");
}
?>