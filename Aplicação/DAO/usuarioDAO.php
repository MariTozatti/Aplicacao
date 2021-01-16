<?php
include_once '../config/conexao.php';

function gravar_usuario(){
    $conexao = conexao();
    //recebe as informações colocadas pelo usuário
    $nome = "";
    $usuario = "";
    $senha = "";

    if (isset($_POST['nome'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    }
    //isset - Informa se a variável foi iniciada
    //empty — Determina se a variável é vazia
    //filter_input - filtra caracteres específicos no campo por parâmetros
    //parâmetro escolhido - FILTER_SANITIZA_STRING - filtra carasteres especiais
    if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
        $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    }

    if (!empty($nome)) {
        try { //tente realizar a ação
            // Insere os valores informados no banco
            $sql = "INSERT INTO Cadastro_usuario (nome, usuario, senha) values (?,?,?);";
            //quantidade de "?" de acordo com a quantidade de variaveis
            // Prepara para inserir
            $statement = $conexao->prepare($sql);
            // Informa qual o valor da variável em sequência - respeitar a sequência da linha 28
            $statement->bindParam(1, $nome);
            $statement->bindParam(2, $usuario);
            $statement->bindParam(3, $senha);
            $statement->execute();

        } catch (Exception $exc) { //caso não consiga, retorne um erro
            echo $exc->getTraceAsString();
            return false;
        }
    }return true;
}

function excluir_usuario(){
    //localiza o item pelo id
    //o id é preenchido automaticamente pelo banco
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

//função padrão para consultar, pode receber uma string com os campos (ex: id_pes as Nome)
// e os valores para o where
function consulta_usuario($campos = '*', $add = ''){
    $sql = "SELECT $campos FROM Cadastro_usuario $add";
    $conexao = conexao();
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

