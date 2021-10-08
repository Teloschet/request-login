<?php
include_once("api/settings.php");
include_once("includes/header.php");
?>

<body class="text-center">
        <main class="form-signin">
            <form method="post">
                <?= Login::register() ?>
                <img class="mb-4" src="assets/tc.png" alt="">
                <h1 class="h3 mb-3 fw-normal">Registrar no sistema</h1>
            
                <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="usuário" name="username">
                <label for="floatingInput">Usuário</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Senha</label>
                </div>
            
                <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar de mim (1 dia)
                </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Registrar</button>
                <p class="mt-5 mb-3 text-muted">&copy; teloschet | Last Update 08/10</p>
            </form>
        </main>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>