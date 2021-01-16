<?php

//valida a senha e o usuário colocado pelo usuário

if(isset($_POST['usuario'])){ //se foi colocado algo no campo do usuário
    include_once ('../config/conexao.php'); //inclui o arquivo de conexão para comparar com o banco
    session_start(); //inicia a sessão
    
    $usuario = $_POST['usuario']; //recebe o usuario
    $senha = md5($_POST['senha']); //recebe a senha
    //md5 - criptografa a senha, quarda letras e números no banco
    
    $conn = conexao();
    
    //confere as informações (usuário e senha)
    $stmt = $conn->prepare("select * from Cadastro_usuario where usuario = ? and senha = ?");
    $stmt->bindparam(1, $usuario); 
    $stmt->bindParam(2, $senha);
    $stmt->execute();
    
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //se tudo estiver certo, redireciona para o index.php
    //se não é redirecionado para o login.php novamente
    if($res != null){
        //gravando valores na sessão aberta
        
        $_SESSION['usuario'] = $res[0]['usuario'];
        $_SESSION['senha'] = $res[0]['senha'];
        $_SESSION['id_usuario'] = $res[0]['id_usuario'];
        
        header('location:../VIEW/index.php');
    }else{
        header('location:../VIEW/login.php');
    }
}
?>


