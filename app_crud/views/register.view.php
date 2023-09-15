<div class="register">
    <!-- logo -->
    <div>
         <a href="index.php?page=index" class=""><img src="images/logo.png" alt="Logo Time Machine"></a>
    </div>

    <!-- Registrierung -->
    <div class="inner_login mt-2 pb-2 pt-2">
        <form action="auth/users/insert.php" method="POST" class="form pt-2 pb-1">
            <div>
                <input type="text" name="name" placeholder="<?= isset($_SESSION["msg-name"]) ? $_SESSION["msg-name"] : 'Name'; unset($_SESSION["msg-name"])?>" class="feld m-1">
            </div>

            <div>
                <input type="text" name="vn" placeholder="<?= isset($_SESSION['msg-vn']) ? $_SESSION['msg-vn'] : 'Vorname'; unset($_SESSION["msg-vn"]) ?> " class="feld m-1">
            </div>

            <div>
                <input type="text" name="email" placeholder="<?= isset($_SESSION['msg-mail']) ? $_SESSION['msg-mail'] : 'Email'; unset($_SESSION["msg-mail"]) ?>" class="feld m-1">
            </div>

            <div>
                <input type="text" name="pw" placeholder="<?= isset($_SESSION['msg-pw']) ? $_SESSION['msg-pw'] : 'Passwort'; unset($_SESSION["msg-pw"]) ?>" class="feld m-1">
            </div>

            <div>
                <input type="hidden" name="token" value="<?= csrf() ?>" class="feld m-1">
            </div>

            <div class="my-2 mb-2">
                <input type="submit" name="btn" class="button submit blue f-white" value="Neues Konto erstellen">
            </div>
        </form>

        <!-- Weiterleitung zum login nach erfolgreicher Registrierung -->
        
        <div class="einloggen">
            <?php if(isset($_SESSION['register'])): ?>
                <p><a href="index.php?page=login"><?= $_SESSION['register']; ?></a></p>
        
        <!-- zurück zum Login ohne Registrierung-->
            <?php else: ?>
                <p><a href="index.php?page=login">Zum Login</a></p>
            <?php endif; ?>
        </div>
        
    </div>
</div>

<?php

// $msg = ['name', 'vn', 'mail', 'pw'];

// // foreach($msg AS $note) {
// //     echo $note[1];
// // }

// // echo $msg[1];

// for($i=0; $i<count($msg); $i++)  {
//     // echo $msg[$i];
//     // echo'<br />';
//     $search = array_search($msg[$i], $msg);
//     echo $search;

// }

?>
