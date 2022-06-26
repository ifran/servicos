<link href="<?=PATH_CSS?>login.css?v=<?=$iV?>" rel="stylesheet" />
<main class="form-signin w-100 m-auto">
    <form action="loginAction.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Sign In</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Endereço de e-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted"></p>
    </form>
</main>