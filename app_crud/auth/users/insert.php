<?php
session_start();

require_once dirname(__DIR__,2).'/inc/db_connect.inc.php'; 
require_once dirname(__DIR__,2).'/inc/functions.inc.php';

if(isset($_POST)) {
    if(isset($_POST['name'])) $name = (string) $_POST['name'];
    if(isset($_POST['vn'])) $vorname = (string) $_POST['vn'];
    if(isset($_POST['email'])) $mail = (string) $_POST['email'];
    if(isset($_POST['pw'])) $pw = (string) $_POST['pw'];
    if(isset($_POST['token'])) $token = (string) $_POST['token'];

    if(empty($name)) {
        $_SESSION['msg-name'] = 'Bitte Ihren Namen eintragen';
    } else if(empty($vorname)) {
        $_SESSION['msg-vn'] = 'Bitte Ihren Vornamen eintragen';
    } else if(empty($mail)) {
        $_SESSION['msg-mail'] = 'Bitte eine Email eintragen';
    } else if(empty($pw)) {
        $_SESSION['msg-pw'] = 'Bitte Passwort eingeben';
    } else if(!empty($mail) && $token === $_SESSION['token']) {
        $stmt = $db->prepare('SELECT `email` FROM `users` WHERE `email` = :mail'); 
        $stmt->bindValue('mail', $mail);
        $stmt->execute();
        $result = $stmt->fetch();

        if(!empty($result['email'])) {
            $_SESSION['msg-mail'] = 'E-Mail existiert bereits!';
        } else {
            $stmt = $db->prepare('INSERT INTO `users` (`name`, `vorname`, `email`, `passwort`) VALUES (:name, :vname, :mail, :pw) ');
            $stmt->bindValue('name', g($name));
            $stmt->bindValue('vname', g($vorname));
            $stmt->bindValue('mail', k($mail));
            $stmt->bindValue('pw', password_hash($pw, PASSWORD_DEFAULT));
            $stmt->execute();
    
            $_SESSION['register'] = 'Sie können sich nun einloggen!';
        }
    } 
} 

header('Location:../../index.php?page=register');