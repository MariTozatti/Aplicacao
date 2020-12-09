<?php

if (isset ($_POST['gravar'])){
    include_once('../config/conexao.php');
    include_once('../config/util.php');
}
else{
    include_once('config/conexao.php');
    include_once('config/util.php');
}
if (isset($_POST['nome'])) {
    $cod_pes = $_POST['id_usuario'];
    $nome_pes = $_POST['nome'];
    $usuario_pes = $_POST['usuario'];
    $senha_pes = $_POST['senha'];
}

if (isset($_POST['gravar'])) {

    $conn = conexao();
    $stmt = $conn->prepare("INSERT INTO Cadastro_usuario (nome, usuario, senha) values (?,?,?);");
    $stmt->bindParam(1, $nome);
    $stmt->bindparam(2, $usuario);
    $stmt->bindParam(3, $senha);
    $stmt->execute();

        modalMessage("Cadastro de usuario","Dados cadastrados com sucesso!","../index.php","../usuarios.php");           
} else
if (isset($_POST['excluir'])) {
    
    $conn = conexao();
    $stmt = $conn->prepare("DELTE INTO Cadastro_usuario (nome, usuario, senha) values (?,?,?);");
    $stmt->bindParam(1, $nome);
    $stmt->bindparam(2, $usuario);
    $stmt->bindParam(3, $senha);
    $stmt->execute();

        modalMessage("Cadastro de usuario","Dados deletados com sucesso!","../index.php","../usuarios.php");  
} else

if(isset($_POST['login'])){
    include_once ('../config/conexao.php');
    session_start();
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    
    $conn = conexao();
    
    $stmt = $conn->prepare("select * from Cadastro_usuario where usuario = ? and senha = ?");
    $stmt->bindparam(1, $usuario); 
    $stmt->bindParam(2, $senha);
    $stmt->execute();
    
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if($res != null){
        //gravando valores na sessão aberta
        $_SESSION['usuario'] = $res[0]['usuario'];
        $_SESSION['senha'] = $res[0]['senha'];
        $_SESSION['id_usuario'] = $res[0]['id_usuario'];
        
        header('location:../index.php');
    }else{
        header('location:../login.php');
    }
}

/* --------------------------- FUNÇÕES ---------------------- */

function localizarUsuarios($param) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_usuario WHERE nome LIKE '%" . $param . "%' ORDER BY id_usuario;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirUsuarios($id) {
    try {
        $conn = conexao();
        $stmt = $conn->prepare("DELETE FROM Cadastro_usuario WHERE id_usuario = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
    } catch (Exception $ex) {
        echo "<script language='javascript'> alert('Ocorreu um erro ao tentar excluir!') </script>";
    }
}

function localizarUsuariosID($id) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_usuario WHERE id_usuario =" . $id . ";");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function localizarUsuario() {
    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_usuario;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function retornaUsuariosID($id) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_usuario where id_usuario=" . $id . ";");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>