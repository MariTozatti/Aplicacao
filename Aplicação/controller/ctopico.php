<?php

if (isset($_POST['alterar']) || isset($_POST['gravar'])) {
    include_once('../config/conexao.php');
    include_once('../config/util.php');
} 
else {
    include_once('config/conexao.php');
    include_once('config/util.php');
}
if (isset($_POST['vulnerabilidade'])) {
    $vulnerabilidade = $_POST['vulnerabilidade'];
    $ano = $_POST['ano'];
    $posicao = $_POST['posicao'];
    $id_topico = $_POST['id_topico'];
}

if (isset($_POST['gravar'])) {

    $conn = conexao();
    $stmt = $conn->prepare("INSERT INTO Cadastro_topico (vulnerabilidade, ano, posicao) values (?,?,?);");
    $stmt->bindParam(1, $vulnerabilidade);
    $stmt->bindparam(2, $ano);
    $stmt->bindParam(3, $posicao);
    $stmt->execute();

    modalMessage("Cadastro de Tópicos", "Dados cadastrados com sucesso!", "../index.php", "../topico.php");
} else
if (isset($_POST['acoes'])) {
    header('location: ../tabTopico.php');
}else
if (isset($_POST['alterar'])) {
    $conn = conexao();
    $stmt = $conn->prepare("UPDATE Cadastro_topico set vulnerabilidade = ?, ano = ?, posicao = ? WHERE id_topico = ?;");
    $stmt->bindParam(1, $vulnerabilidade);
    $stmt->bindparam(2, $ano);
    $stmt->bindParam(3, $posicao);
    $stmt->bindParam(4, $id_topico);
    $stmt->execute();

    modalMessage("Cadastro de Tópicos", "Dados alterados com sucesso!", "../index.php", "../topico.php");
} else 
if (isset($_POST['localizar_vul'])){
    header('location: ../vulnerabilidades.php');
}

/* --------------------------- FUNÇÕES ---------------------- */

function localizarTopicos($param) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_topico WHERE vulnerabilidade LIKE '" . $param . "' ORDER BY id_topico;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirTopicos($id) {
    try {
        $conn = conexao();
        $stmt = $conn->prepare("DELETE FROM Cadastro_topico WHERE id_topico = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
    } catch (Exception $ex) {
        echo "<script language='javascript'> alert('Ocorreu um erro ao tentar excluir!') </script>";
    }
}

function localizarTopicosID($id) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_topico WHERE id_topico =" . $id . ";");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function localizarTopico() {
    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_topico;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function retornaTopicosID($id) {

    $conn = conexao();
    $stmt = $conn->prepare("SELECT * FROM Cadastro_topico where id_topico=" . $id . ";");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function localizarVulnerabilidade() {
    $conn = conexao();
    if ($ano != "") {
        $stmt = $conn->prepare("SELECT * FROM Cadastro_topico WHERE ano= ?");
        $stmt->bindparam(1, $ano);
    } else {
        if ($posicao != "") {
            $stmt = $conn->prepare("SELECT * FROM Cadastro_topico WHERE posicao= ?");
            $stmt->bindParam(1, $posicao);
        } else {
            if ($vulnerabilidde != "") {
                $stmt = $conn->prepare("SELECT * FROM Cadastro_topico WHERE vulnerabilidde= ?");
                $stmt->bindParam(1, $vulnerabilidade);
            }
        }
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>