<?php

if (isset($_POST['alterar'])||isset($_POST['gravar'])){
    include_once('../config/conexao.php');
    include_once('../config/util.php');
}
else{
    include_once('config/conexao.php');
    include_once('config/util.php');
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $id_usuario = $_POST['id_usuario']; 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
}

if (isset($_POST['gravar'])) {

    $conn = conexao();
    $stmt = $conn->prepare("INSERT INTO Cadastro_usuario (nome, usuario, senha) values (?,?,?);");
    $stmt->bindParam(1, $nome);
    $stmt->bindparam(2, $usuario);
    $stmt->bindParam(3, $senha);
    $stmt->execute();

        modalMessage("Cadastro de usuario","Dados cadastrados com sucesso!","../index.php","../usuario.php");           
} else
    if (isset($_POST['acoes'])) {
    header('location: ../tabUsuario.php');
} else
if (isset($_POST['alterar'])) {
    
    $conn = conexao();

    $stmt = $conn->prepare("UPDATE Cadastro_usuario set nome = ?, usuario = ?, senha = ? WHERE id_usuario = ?;");
    $stmt->bindParam(1, $nome);
    $stmt->bindparam(2, $usuario);
    $stmt->bindParam(3, $senha);
    $stmt->bindParam(4, $id_usuario);
    $stmt->execute();

        modalMessage("Cadastro de Usuarios","Dados alterados com sucesso!","../index.php","../usuario.php");     
} else

if(isset($_POST['usuario'])){
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