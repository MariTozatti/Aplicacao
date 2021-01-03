<?php

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
        $_SESSION['tipo'] = $res[0]['tipo'];
        $_SESSION['id_usuario'] = $res[0]['id_usuario'];
        
        header('location:../VIEW/index.php');
    }else{
        header('location:../VIEW/login.php');
    }
}

