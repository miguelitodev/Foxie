<!-- Ícones feitos por <a href="https://www.flaticon.com/br/autores/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/br/" title="Flaticon"> www.flaticon.com</a> -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once '../assets/includes/head.php'; ?>
    <title>Login</title>
</head>

<body>
    <div class="card">
        <div class="foto">
            <img src="../assets/img/geral/origami.png" />
        </div>
        <div class="campos">

            <?php if(isset($_GET['invalid'])) echo "<p style='text-align:center;color: red;'> Login inválido! </p>" ?>

            <form action="../lib/login-validate.php" method="POST">
                <input class="input" name="email" type="email" placeholder="E-mail" require/>
                <input class="input" name="pass" type="password" placeholder="Senha" require/>
                <input class="btn" type="submit" value="ENTRAR" />
            </form>
        </div>
    </div>
</body>

</html>