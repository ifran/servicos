<?php
    // if (isset($_GET['sLogout']) AND $_GET['sLogout'] == 1) {
    //     unset($_SESSION['iAdm']);
    //     headerLocation('Home');
    // }

    // if (!empty($_SESSION['iAdm']))
    // {
    //     headerLocation('Home');
    // }

    // if (!empty($_POST['sNome']) AND !empty($_POST['sSenha']))
    // {
    //     $sNome = $_POST['sNome'];
    //     $sSenha = md5($_POST['sSenha']);
        
    //     $sSql = "SELECT * FROM usuario WHERE usuario_email = '" . $sNome . "' AND usuario_senha = '" . $sSenha . "'";
    //     $oCon = new Database();
    //     $aReturn = $oCon->select($sSql);

    //     if (count($aReturn) > 0) 
    //     {
    //         $_SESSION['iAdm'] = 1;
    //         headerLocation('RegisterCard');
    //     }
    // }
?>
<link href="<?=PATH_CSS?>login.css?v=<?=$iV?>" rel="stylesheet" />
<main class="form-signin w-100 m-auto">
    <form>
        <h1 class="h3 mb-3 fw-normal">Sign In</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Endereço de e-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted"></p>
    </form>
</main>