<?php
session_start();

require_once dirname(__DIR__,2).'/inc/db_connect.inc.php'; 
require_once dirname(__DIR__,2).'/inc/functions.inc.php';

if(!empty($_POST)) {
    if(isset($_POST['mail'])) $mail = (string) $_POST['mail'];
    if(isset($_POST['pw'])) $pw = (string) $_POST['pw'];
    if(isset($_POST['token'])) $token = (string) $_POST['token'];

    if(!empty($mail) && !empty($pw) && $token === $_SESSION['token']) {
        $stmt = $db->prepare('SELECT * FROM `users` WHERE `email` = :mail ');
        $stmt->bindValue('mail', $mail);
        $stmt->execute();
        $user = $stmt->fetch();

        if($user['email'] && password_verify($pw, $user['passwort'])) {
            $_SESSION['vn'] = $user['vorname'];
            $_SESSION['n'] = $user['name'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['mail'] = $user['email'];
            $_SESSION['login'] = true;

            $_SESSION['msg'] = 'Login erfolgreich!';
        } else {
            $_SESSION['msg-note'] = 'Falsche logindaten';
            
        }
    }
}

if(isset($_SESSION['id']) || isset($_SESSION['login'])):
    header('Location:../../index.php?page=home');
    
else:
    header('Location:../../index.php?page=login');
endif;