<?php
include_once 'menu.php';
include_once '../config/conexao.php';
include_once '../DAO/usuarioDAO.php';

function consulta($consulta) {
    $conn = conexao();
    $stmt = $conn->prepare($consulta);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['alterar'])) {

    $id_usuario = filter_input(INPUT_GET, 'alterar', FILTER_SANITIZE_NUMBER_INT);
    //abre conexão       
    if (!empty($id_usuario)) {
        $conexao = conexao();

        $sql_string = 'UPDATE Cadastro_usuario set nome = ?, usuario = ?, senha = ? WHERE id_usuario = ?;';
        $SQL = $conexao->prepare($sql_string);
        $statement->bindParam(1, $nome);
        $statement->bindParam(2, $usuario);
        $statement->bindParam(3, $senha);
        $statement->bindParam(4, $id_usuario);
        $statement->execute();
    }
}
?>
<head>
    <link href="css/cadastros.css" rel="stylesheet" type="text/css"/>
</head>

<div class="container">
    <form action="../CTR/usuarioCTR.php" method="POST">
        <div class="caixa caixa2">
            <h1>Cadastro de Usuarios</h1>
            <div class="row formularios">
                <div class="form-group col-md-4">
                    <label > Usuário: </label>
                    <input type="text" name="usuario" class="form-control"
                           placeholder="Usuário de Login" />
                </div>
                <div class="form-group col-md-4">
                    <label > Senha: </label>
                    <input type="text" name="senha" class="form-control"
                           placeholder="Senha de Login" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label > Nome: </label>
                    <input type="text" name="nome" class="form-control"
                           placeholder="Nome completo" />
                </div>
            </div>

            <div class="row botoes">
                <div class="form-group col-md-12">
                    <input type="submit" name="gravar" value="Gravar" class="btn btn-success">    
                    <input type="reset" name="cancelar" value="Cancelar" class="btn btn-default">
                </div>
            </div>          

    </form>
    <?php
    $consulta = 'SELECT id_usuario as "id_usuario", nome as "Nome", usuario as "Usuario", senha as "Senha" from Cadastro_usuario;';
    $campos = 'id_usuario as "id_usuario", nome as "Nome", usuario as "Usuario", senha as "Senha"';
    $resultado = consulta_usuario($campos);

//    if (count($resultado) > 0) :
//        $linha = $resultado[0];
        ?>
        <table class="table table-hover">
            <thead class=" thead-dark ">
                <tr>
                    <?php
                    foreach ($linha as $coluna => $valor) {
                        echo '<th scope = "col">' . $coluna . '</th>';
                    }
                    ?>
                    <th scope="col"> Ações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultado as $linha) {
                    echo "<tr>";
                    echo "<td>" . $linha['id_usuario'] . "</td>";
                    echo "<td>" . $linha['Nome'] . "</td>";
                    echo "<td>" . $linha['Usuario'] . "</td>";
                    echo "<td>" . $linha['Senha'] . "</td>";
                    // Cria um link informando o ID e uma operação apagar através do método GET
                    echo "<td>"
                    . "<a class ='btn btn-primary' href=../VIEW/tabUsuarioVIEW.php" .
                    "?id=" . $linha['id_usuario'] . "> Alterar </a> "
                    . "<a class='btn btn-danger' href =../CTR/usuarioCTR.php?excluir=" . $linha['id_usuario'] . "> Excluir </a> </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
//else :
//    echo ("<script> window.alert('Nenhum registro encontrado!')
//        window.location.href='../VIEW/usuarioVIEW.php';</script>");
//endif;
?>
<div class="rodape">
    <center><p>IFSP - VOTUPORANGA @2020</p></center>
</div>
</body>
</html>
