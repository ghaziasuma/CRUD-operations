<?php 
session_start();

require_once dirname(__DIR__,2).'/inc/db_connect.inc.php';
require_once dirname(__DIR__,2).'/inc/functions.inc.php';

if(isset($_POST)) {
    $pw = '';
    if(isset($_POST['pw'])) $pw = (string) $_POST['pw'];
    $pw_repeat= '';
    if(isset($_POST['pw_repeat'])) $pw_repeat = (string) $_POST['pw_repeat'];

    if(!empty($pw) && !empty($pw_repeat)){
        $stmt = $db->prepare('SELECT `id`, `passwort` FROM `users` WHERE `id` = :id ');
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->fetch();

        if(password_verify($pw, $result['passwort']) && $pw === $pw_repeat) {
            $stmt = $db->prepare('DELETE FROM `users` WHERE `id` = :id');
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute(); 

            logOut();

            $_SESSION['msg-note'] = 'Dein Profil wurde gelöscht';

        }

    } else {
        $_SESSION['msg-note'] = 'Bitte Passwort eingeben und bestätigen';
    }
}

header('Location:../../index.php?page=login');