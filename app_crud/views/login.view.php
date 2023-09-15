<div class="login">
    <!-- logo -->
    <div class="mb-2">
         <a href="index.php?page=index" class=""><img src="images/logo.png" alt="Logo Time Machine"></a>
    </div>

    <!-- login -->
    <div class="inner_login mt-1 pb-2">
        
        <form action="auth/users/login.php" method="POST" class="form pt-2">

            <?php if(isset($_SESSION['msg-note'])): ?>
                <div class="f-danger"><?= $_SESSION['msg-note']; unset($_SESSION['msg-note']);?></div>
            <?php endif; ?>

            <div>
                <input type="text" name="mail" placeholder="<?= isset($_SESSION['msg-error']) ? $_SESSION['msg-error'] : 'Email'; unset($_SESSION["msg-error"])?>" class="feld m-1">
            </div>

            <div>
                <input type="text" name="pw" placeholder="<?= isset($_SESSION['msg-error']) ? $_SESSION['msg-error'] : 'Passwort'; unset($_SESSION["msg-error"])?>" class="feld m-1">
            </div>
                <input type="hidden" name="token" value="<?= csrf(); ?>" class="feld m-1">
            <div>

            </div>

            <div class="my-2">
                <input type="submit" name="anmelden" class="button submit blue f-white" value="Login">
            </div>
        </form>

        <!-- Weiterleitung zur Registrierung -->
        <div class="mb-5">
            <a href="index.php?page=register" class="button btn blue f-white w-60">Registrierung</a>
        </div>
    </div>
</div>