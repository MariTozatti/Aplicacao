<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>        
        <style>
            body{
                background-image: linear-gradient(to left, rgba(255, 102, 0,.5), rgba(49, 52, 67,1));
                margin-top: 24%;
            }
        </style>

        <script>

            $(document).ready(function () {
                $('.login-info-box').fadeOut();
                $('.login-show').addClass('show-log-panel');
            });

            $(document).ready(function () {

                // Click event of the showPassword button
                $('#mostrarSenha').on('click', function () {

                    // Get the password field
                    var passwordField = $('#senha');

                    // Get the current type of the password field will be password or text
                    var passwordFieldType = passwordField.attr('type');

                    // Check to see if the type is a password field
                    if (passwordFieldType == 'password')
                    {
                        // Change the password field to text
                        passwordField.attr('type', 'text');
                    } else {
                        // If the password field type is not a password field then set it to password
                        passwordField.attr('type', 'password');
                    }
                });
            });
        </script>
    </head>
    <body>
        <form action="controller/cusuarios.php" method="POST">
            <div class="login-reg-panel">
                <div class="register-info-box">
                    <h2>Não é administrador?</h2>
                    <h4>Entre como Leitor</h4>
                    <label id="label-login" name="leitor" for="log-login-show">Leitor</label>
                    <input type="radio" name="active-log-panel" id="log-login-show">
                </div>

                <div class="white-panel">
                    <div class="login-show">
                        <h2 style="color: white">ENTRAR</h2>
                        <input type="text" name="usuario_pes" placeholder="Usuário">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" name="senha_pes" id="senha"  placeholder="Senha"/>
                            </div>
<!--                            <div class="col-md-1">
                                <span class="input-group-addon" style="margin: 0px;"><a class="glyphicon glyphicon-eye-open" id="mostrarSenha" href="#" style="margin-top: 0px;"></a></span>    
                            </div>-->
                        </div> 
                        <input type="button" name="entrar" id="entrar" value="Entrar">
                    </div>                                 
                </div>
            </div>
        </form>
    </body>
</html>
