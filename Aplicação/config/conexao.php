<?php

//tipo de gerenciador do banco
const DBDRIVER = "mysql";
//nome do host gerenciador do banco
const HOSTNAME = "localhost";
//nome do usuário do banco
const USERNAME = "";
//senha do banco
const PASSWORD = "";
//nome do banco da aplicação/sistema
const DBNAME = "Aplicacao";

try {

    function conexao() {
        $conn = new PDO(
                DBDRIVER . ":host=" . HOSTNAME . ";port=3306;dbname=" . DBNAME . ";user=" . USERNAME . ";password=" . PASSWORD
        );

        // Tratamento necessário para que apareçam erros de comando SQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //retorna o canal de conexão com sucesso
        return $conn;
    }

} catch (PDOexception $erro) {
    echo "Ocorreu um erro " . $erro->getMessage();
}
?>



