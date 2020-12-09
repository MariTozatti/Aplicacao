<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="apple-mobile-web-app-title" content="CodePen">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="bootstrap-3.4.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>        
        <script src="js/validator.js" type="text/javascript"></script>
        
        <title>Aplicação</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            window.console = window.console || function (t) {};
        </script>
        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>
        <style>
            body{
                background-image: linear-gradient(to left, rgba(94,47,55,1), rgba(24,26,65,1));
                
            }
        </style>


    </head>
    <body translate="no" class="js">
        <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <defs>
            <symbol viewBox="0 0 60 60" id="icon-facebook">
                <path d="M25.8 46.3h6.7V30H37l.6-5.6h-5.1v-2.8c0-1.5.1-2.3 2.2-2.3h2.8v-5.6H33c-5.4 0-7.3 2.7-7.3 7.3v3.4h-3.4V30h3.4v16.3zM30 60C13.4 60 0 46.6 0 30S13.4 0 30 0s30 13.4 30 30-13.4 30-30 30z"></path>
            </symbol>
            <symbol viewBox="0 0 60 60" id="icon-linkedin">
                <path d="M46.8 44.1V32.4c0-6.3-3.3-9.2-7.8-9.2-3.6 0-5.2 2-6.1 3.4v-2.9h-6.8c.1 1.9 0 20.4 0 20.4h6.8V32.7c0-.6 0-1.2.2-1.7.5-1.2 1.6-2.5 3.5-2.5 2.5 0 3.4 1.9 3.4 4.6V44l6.8.1zM19 20.9c2.4 0 3.8-1.6 3.8-3.5 0-2-1.5-3.5-3.8-3.5s-3.8 1.5-3.8 3.5 1.4 3.5 3.8 3.5zM30 60C13.4 60 0 46.6 0 30S13.4 0 30 0s30 13.4 30 30-13.4 30-30 30zm-7.6-15.9V23.7h-6.8v20.4h6.8z"></path>
            </symbol>
            <symbol viewBox="0 0 60 60" id="icon-twitter">
                <path d="M34.2 18.3c-2.6 1-4.3 3.4-4.1 6.1l.1 1-1-.1c-3.8-.5-7.1-2.1-10-4.9L17.7 19l-.4 1c-.8 2.3-.3 4.7 1.3 6.3.8.9.6 1-.8.5-.5-.2-.9-.3-1-.2-.1.1.4 2.1.8 2.8.5 1.1 1.7 2.1 2.9 2.7l1 .5h-1.2c-1.2 0-1.2 0-1.1.5.4 1.4 2.1 2.8 3.9 3.5l1.3.4-1.1.7c-1.7 1-3.6 1.5-5.6 1.6-.9 0-1.7.1-1.7.2 0 .2 2.6 1.4 4 1.9 4.5 1.4 9.8.8 13.7-1.6 2.8-1.7 5.7-5 7-8.2.7-1.7 1.4-4.9 1.4-6.4 0-1 .1-1.1 1.2-2.3.7-.7 1.3-1.4 1.5-1.6.2-.4.2-.4-.9 0-1.8.6-2 .6-1.2-.4.6-.7 1.4-1.9 1.4-2.3 0-.1-.3 0-.7.2-.4.2-1.2.5-1.8.7l-1.1.4-1-.7c-.6-.4-1.4-.8-1.8-.9-.9-.4-2.6-.4-3.5 0zM30 60C13.4 60 0 46.6 0 30S13.4 0 30 0s30 13.4 30 30-13.4 30-30 30z"></path>
            </symbol>
        </defs>
    </svg>

    <div class="hero">
        <header id="masthead" role="banner">
            <div class="container">
                <button class="hamburger hamburger--boring" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                    <span class="hamburger-label">Menu</span>
                </button>
                <form id="masthead-search">
                    <input type="search" name="s" aria-labelledby="search-label" placeholder="Pesquisar…" class="draw">
                    <button type="submit">→</button>
                </form>        
                <nav id="site-nav" role="navigation">
                    <div class="col">
                        <h4>OWASP</h4>
                        <ul>
                            <li><a href="index.php">O que é?</a></li>
                            <li><a href="https://owasp.org/" target="_blank">Site Oficial</a></li>
                        </ul>            
                    </div>
                    <div class="col">
                        <h4>Vulnerabilidades</h4>
                        <ul>
                            <li><a href="top10.php">Pesquisa</a></li>
                        </ul> 
                    </div>
                    <div class="col">
                        <h4>Cadastro</h4>
                        <ul>
                            <li><a href="usuario.php">Usuários</a></li>
                            <li><a href="topico.php">Vulnerabilidades</a></li>
                        </ul>             
                    </div>
                    <div class="col">
                        <a href="login.php"><h4>Login</h4> </a>
                        <a href="#"><h4>Logout</h4> </a>           
                    </div>
                    <div class="col">
                        <ul class="social">
                            <li><a href="https://www.facebook.com/mariana.dealmeida.549" target="_blank"><svg title="Facebook"><use xlink:href="#icon-facebook"></use></svg></a></li>
                            <li><a href=""><svg title="Twitter"><use xlink:href="#icon-twitter"></use></svg></a></li>
                            <li><a href=""><svg title="LinkedIn"><use xlink:href="#icon-linkedin"></use></svg></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script id="rendered-js">
            $(function () {
                $('body').addClass('js');

                var $hamburger = $('.hamburger'),
                        $nav = $('#site-nav'),
                        $masthead = $('#masthead');

                $hamburger.click(function () {
                    $(this).toggleClass('is-active');
                    $nav.toggleClass('is-active');
                    $masthead.toggleClass('is-active');
                    return false;
                });
            });
//# sourceURL=pen.js
    </script>
</body>
</html>
