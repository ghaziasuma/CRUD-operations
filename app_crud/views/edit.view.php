<?php
    $stmt = $db->prepare('SELECT * FROM `users` WHERE `id` = :id');
    $stmt->bindValue('id', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->fetch();
?>

<div class="edit">
<form action="auth/users/update.php" method="POST" class="form pt-2 pb-2">
            <div>
                <input type="text" name="name" placeholder="Name" class="feld m-1">
            </div>

            <div>
                <input type="text" name="vn" placeholder="Vorname" class="feld m-1">
            </div>

            <div>
                <input type="text" name="email" placeholder="Email" class="feld m-1">
            </div>

            <div>
                <input type="text" name="motto" placeholder="Motto" class="feld m-1">
            </div>

            <div>
                <textarea type="text" name="info" placeholder="Über mich" class="feld m-1"></textarea>
            </div>

            <div>
                <input type="hidden" name="token" value="<?= csrf() ?>" class="feld m-1">
            </div>

            <div class="my-2 mb-2">
                <input type="submit" name="btn" class="button submit blue f-white" value="Daten ändern">
            </div>
        </form>
</div>