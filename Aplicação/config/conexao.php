<?php

const DBDRIVER = "mysql";
const HOSTNAME = "localhost";
const USERNAME = "mari";
const PASSWORD = "mari123";
const DBNAME = "Aplicacao";

try {

    function conexao() {
        $conn = new PDO(
                DBDRIVER . ":host=" . HOSTNAME . ";port=5432;dbname=" . DBNAME . ";user=" . USERNAME . ";password=" . PASSWORD
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



