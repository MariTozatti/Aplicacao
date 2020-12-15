<?php
include_once '../config/conexao.php';

function gravar_usuario(){
    $conexao = conexao();
    $id_usuario = "";
    $nome = "";
    $usuario = "";

    if (isset($_POST['nome'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    }

    if (!empty($nome)) {
        try {
            // Cria o script de insert
            $sql = "INSERT INTO Cadastro_usuario (nome, senha, usuario) values (?,?,?);";
            // Prepara para inserir
            $statement = $conexao->prepare($sql);
            // Informa qual o valor da variável em sequencia
            $statement->bindParam(1, $nome);
            $statement->bindParam(2, $usuario);
            $statement->bindParam(3, $senha);
            $statement->execute();

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }return true;
}

function excluir_usuario(){
    $id_usuario = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($id_usuario)) {
        try {
            //abre conexão              
            $conexao = conexao();
            //Cria o script para apagar
            $sql = "DELETE FROM Cadastro_usuario WHERE id_usuario = ?;";
            //Prepara para apagar
            $statement = $conexao->prepare($sql);
            //Informa qual o valor da primeira variável 
            $statement->bindParam(1, $id_usuario);
            //executa
            $statement->execute();
            //Verifica a quantidade de linhas afetadas    
            if ($statement->rowCount() > 0)
                return true;
        } catch (Exception $exc) {
            console($exc->getMessage());
            return false;
        }
    }return true;
}
//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% NÃO ESTÁ FUNCIONANDO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function alterar_usuario(){
    //inicia as variáveis com os valores eperados para dados em branco
    $conexao = conexao();
    // $id = "";
    // $inicial = "";
    // $nome = "";
    // $quantidade = 0;
    // $bula = "";
    // $mg = 0;
    // $tipo = "";
    // //faz a sanitização dos dados

    $id_usuario = limpar($_POST['id_usuario']);
    $nome = limpar($_POST['nome']);
    $usuario = limpar($_POST['usuario']);
    $senha = limpar($_POST['senha']); 

    //verifica se realmente tenho o ID (chave primária) e se o Nome (dado que não pode estar em branco) está preenchido
    if (!empty($id_usuario) && !empty($nome)) {
         try {
            $sql = "UPDATE Cadastro_usuario set nome = ?, senha = ?, usuario = ? WHERE id_usuario = ?;";
            $statement = $conexao->prepare($sql);
            $statement->bindParam(1, $nome);
            $statement->bindParam(2, $usuario);
            $statement->bindParam(3, $senha);
            $statement->bindParam(4, $id_usuario);
            $statement->execute();
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    //se os dados estavam em branco ou se nenhum registro foi atualizado informa que não foi possível fazer o update.
    return false;
}

//função padrão para consultar Pessoa, pode receber uma string com os campos (ex: id_pes as Nome) e os valores para o where
function consulta_usuario($campos = '*', $add = ''){
    $sql = "SELECT $campos FROM Cadastro_usuario $add";
    $conexao = conexao();
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
