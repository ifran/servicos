<?php 
    header('Content-Type: text/html; charset=utf-8');
    include('Application/core/Inc.php');
    $iV = rand(1000,2000);

    function headerLocation ($sPage) {
        echo "<script>window.location.href = '" . $sPage . "' </script>";
        die();
    }
?>
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <title>Jogo da Mem&oacute;ria</title>
        <link rel="shortcut icon" href="<?=PATH_IMG?>/favicon/favicon.ico" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

        <link rel="stylesheet" href="<?=PATH_CSS?>jquery-ui.css">

        <!-- Caminha para JS -->
        <script src="<?=PATH_JS?>jquery-1.12.4.js"></script>
        <script src="<?=PATH_JS?>jquery-ui.js"></script>

        <!-- <script src="<?=PATH_JS?>bootstrap.bundle.min.js"></script> -->
        <script src="<?=PATH_JS?>genericFuncs.js?v=<?=$iV?>" type="text/javascript"></script>

        <!-- Bootstrap core CSS -->
        <link href="<?=PATH_CSS?>bootstrap.min.css" rel="stylesheet"/>
        <link href="<?=PATH_CSS?>main.css?v=<?=$iV?>" rel="stylesheet" />
        <link href="<?=PATH_CSS?>pages.css?v=<?=$iV?>" rel="stylesheet" />

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    </head>
    
    <body class="d-flex h-100 text-center text-white bgBlack">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="menu">
            <header class="mb-auto">
                <div>
                    <a href="Home"><h3 class="float-md-start mb-0">Home</h3></a>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link login bgMenu" href="Login">Login</a>
                        <a class="nav-link login bgMenu" href="Register">Quero me cadastrar</a>
                    </nav>
                </div>
            </header>
            <main class="px-3">
            <div>
                <?php 
                    if (!empty($_GET['sPage'])) {
                        include(PATH_VIEW . $_GET['sPage'] . 'View.php'); 
                    } else {
                        include(PATH_VIEW . 'HomeView.php'); 
                    }
                ?>
                </div>
            </main>

            <footer class="mt-auto text-white-50">
                <p></p>
            </footer>
        </div>
    </body>
    <script>
        $( "#tabs" ).tabs();
    </script>
</html>