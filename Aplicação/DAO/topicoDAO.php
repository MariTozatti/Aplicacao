<?php
include_once '../config/conexao.php';

function gravar_topico(){
    $conexao = conexao();
    $id_topico = "";
    $vulnerabilidade = "";
    $posicao = "";
    $ano = "";

    if (isset($_POST['vulnerabilidade'])) {
        $vulnerabilidade = filter_input(INPUT_POST, 'vulnerabilidade', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['posicao']) && !empty($_POST['posicao'])) {
        $posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['ano']) && !empty($_POST['ano'])) {
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
    }

    if (!empty($vulnerabilidade)) {
        try {
            // Cria o script de insert
            $sql = "INSERT INTO Cadastro_topico (vulnerabilidade, ano, posicao) values (?,?,?);";
            // Prepara para inserir
            $statement = $conexao->prepare($sql);
            // Informa qual o valor da variável em sequencia
            $statement->bindParam(1, $vulnerabilidade);
            $statement->bindParam(2, $posicao);
            $statement->bindParam(3, $ano);
            $statement->execute();

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }return true;
}

function excluir_topico(){
    $id_topico = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($id_topico)) {
        try {
            //abre conexão              
            $conexao = conexao();
            //Cria o script para apagar
            $sql = "DELETE FROM Cadastro_topico WHERE id_topico = ?;";
            //Prepara para apagar
            $statement = $conexao->prepare($sql);
            //Informa qual o valor da primeira variável 
            $statement->bindParam(1, $id_topico);
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
function alterar_topico(){
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

    $id_topico = limpar($_POST['id_topico']);
    $vulnerabilidade = limpar($_POST['vulnerabilidade']);
    $posicao = limpar($_POST['posicao']);
    $ano = limpar($_POST['ano']); 

    //verifica se realmente tenho o ID (chave primária) e se o Nome (dado que não pode estar em branco) está preenchido
    if (!empty($id_topico) && !empty($vulnerabilidade)) {
         try {
            $sql = "UPDATE Cadastro_topico set vulnerabilidade = ?, ano = ?, posicao = ? WHERE id_topico = ?;";
            $statement = $conexao->prepare($sql);
            $statement->bindParam(1, $vulnerabilidade);
            $statement->bindParam(2, $posicao);
            $statement->bindParam(3, $ano);
            $statement->bindParam(4, $id_topico);
            $statement->execute();
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    //se os dados estavam em branco ou se nenhum registro foi atualizado informa que não foi possível fazer o update.
    return true;
}

//função padrão para consultar Pessoa, pode receber uma string com os campos (ex: id_pes as Nome) e os valores para o where
function consulta_topico($campos = '', $add = ''){
    $sql = "SELECT $campos FROM Cadastro_topico $add";
    $conexao = conexao();
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}