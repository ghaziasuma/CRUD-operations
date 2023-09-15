<?php
    session_start();

    require_once dirname(__DIR__,2).'/inc/db_connect.inc.php'; 
    require_once dirname(__DIR__,2).'/inc/functions.inc.php';

    $page = 'edit';

    if(!empty($_POST)) {
        if(isset($_POST['name'])) $name = (string) $_POST['name'];
        if(isset($_POST['vn'])) $vorname = (string) $_POST['vn'];
        if(isset($_POST['email'])) $mail = (string) $_POST['email'];
        if(isset($_POST['motto'])) $motto = (string) $_POST['motto'];
        if(isset($_POST['info'])) $info = (string) $_POST['info'];
        if(isset($_POST['token'])) $token = (string) $_POST['token'];

        if( !empty($name) && !empty($vorname) && $token === $_SESSION['token'] ) {
            $stmt = $db->prepare('UPDATE `users` SET `name` = :name, `vorname` = :vorname, `motto` = :motto, `info` = :info, `updated_at` = NOW() WHERE `id` = :id ');

            $stmt->bindValue('name', $name);
            $stmt->bindValue('vorname', $vorname);
            $stmt->bindValue('motto', $motto);
            $stmt->bindValue('info', $info);
            $stmt->bindValue('id', $_SESSION['id']);
            $stmt->execute();

            $_SESSION['vn'] = $vorname;
            $_SESSION['n'] = $name;
            $_SESSION['msg'] = 'Eintrag wurde geändert!';
            $page='profil';
        } #ende if !empty

        else if(!empty($mail) && $token === $_SESSION['token']) {
            $stmt = $db->prepare('UPDATE `users` SET `email` = :mail, `updated_at` = NOW() WHERE `id` = :id ');

            $stmt->bindValue('mail', $mail);
            $stmt->bindValue('id', $_SESSION['id']);
            $stmt->execute();

            $_SESSION['msg'] = 'Eintrag wurde geändert!';
            $page='profil';
        }

    } else {
        $_SESSION['msg'] = 'Bitte Pflichtfelder ausfüllen';
    } #ende if else POST

    header('Location:../../index.php?page='.$page);
?>