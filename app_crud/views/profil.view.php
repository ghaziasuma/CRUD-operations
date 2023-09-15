<?php
    $stmt = $db->prepare('SELECT * FROM `users` WHERE `id` = :id');
    $stmt->bindValue('id', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->fetch();
?>

<div class="profil px-4">

<h2><?= $result['vorname'] . ' ' . $result['name']?></h2>

<div>
    <p>
        <a href="index.php?page=edit" class="button blue mb-1 f-white">Profil bearbeiten</a>
        <a href="index.php?page=profil&del" class="button danger f-white">Profil löschen</a>
    </p>
</div>

<div>
    <p>angemeldet seit: <?= zeitformat($result['created_at'])?></p>
    <p>bearbeitet am: <?= zeitformat($result['updated_at'])?></p>
</div>

<?php if (isset($_GET['del'])):?>

<div>
    <?php if(isset($_SESSION['msg-note'])): ?>
        <div><?= $_SESSION['msg-note']; unset($_SESSION['msg-note']);?></div>
    <?php endif; ?>
        
        <form action="auth/users/delete.php" method="POST" class="delete form pt-2 pb-2">
            <div class="p-1 fs-3 fw-bold">Möchtest Du wirklich dein Profil löschen?</div>
            <div>
                <input type="text" name="pw" placeholder="Passwort" class="feld m-1">
            </div>

            <div>
                <input type="text" name="pw_repeat" placeholder="Passwort wiederholen" class="feld m-1">
            </div>

            <div class="my-2">
                <input type="submit" name="loeschen" class="button submit blue f-white" value="Profil endgültig löschen">
            </div>
        </form>
</div>

<?php endif; #ende löschen?>

</div>