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
?>
<head>
    <link href="css/cadastros.css" rel="stylesheet" type="text/css"/>
</head>
<!--
++++++++++++++++++++++++ INFORMAÇÕES ++++++++++++++++++++++++++
pattern - define o que pode ser posto no campo, ex: 
pattern="[0-9]{4}" - aceita apenas números, no máximo 4 caracteres.
ATENÇÃO - pattern não aceita espaços!!!
maxlenght - caracter máximo que pode ser colocado no campo.
minlenght - caracter mínimo que pode ser colocado no campo.
required - torna o campo obrigátorio.
onchange="verificar" - função JavaScript para validar os campos.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<div class="container">
    <form action="../CTR/usuarioCTR.php" method="POST">
        <div class="caixa caixa2">
            <h1>Cadastro de Usuarios</h1>
            <div class="row formularios">
                <div class="form-group col-md-4">
                    <label > Usuário: </label>
                    <input type="text" name="usuario" class="form-control"
                           placeholder="Letras maiúsculas e/ou minúsculas" 
                           pattern="^(?=.*[A-Z])|(?=.*[a-z])[a-zA-Z]{1,20}$" 
                           title="Até 20 caracteres" 
                           onchange="verificar()" 
                           maxlength="20" required/>
                </div>
                <div class="form-group col-md-4">
                    <label > Senha: </label>
                    <input type="text" name="senha" class="form-control"
                           placeholder="Letra maiúscula, minúscula e números" 
                           pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9]{8,}$" 
                           title="Insira no mínimo 8 caracteres"  
                           minlength="8" required/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label > Nome: </label>
                    <input type="text" id="entrada" name="nome" class="form-control"
                           placeholder="Nome Completo" 
                           onchange="verificar()" 
                           minlength="1" maxlength="50" required/>
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
    $consulta = 'SELECT id_usuario as "ID", nome as "Nome", usuario as "Usuario" from Cadastro_usuario;';
    $campos = 'id_usuario as "ID", nome as "Nome", usuario as "Usuario"';
    $resultado = consulta_usuario($campos);

    if (count($resultado) > 0) :
        $linha = $resultado[0];
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
                    echo "<td>" . $linha['ID'] . "</td>";
                    echo "<td>" . $linha['Nome'] . "</td>";
                    echo "<td>" . $linha['Usuario'] . "</td>";
                    // Cria um link informando o ID e uma operação apagar através do método GET
                    echo "<td>"
                    . "<a class='btn btn-danger' href =../CTR/usuarioCTR.php?excluir=" . $linha['ID'] . "> Excluir </a> </td>";
                    echo "</tr>";
                }
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="rodape">
    <center><p>IFSP - VOTUPORANGA @2021</p></center>
</div>
</body>
</html>
