<?php

function csrf() {
    $csrfToken = bin2hex(random_bytes(64));
    if( !isset($_SESSION['token']) || empty($_SESSION['token'])) {
      $_SESSION['token'] = $csrfToken;
    }
    return $_SESSION['token'];
}

// 1. Buchstabe groß, Rest klein
function g($wort){
    return ucfirst(strtolower($wort));
}

// alles klein (email)
function k($wort){
    return strtolower($wort);
}

function hideWhenlogged() {
    global $page;
    if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
        
        switch ($page) {
            case 'login': $page = 'home'; break;
            case 'index': $page = 'home'; break;
            case 'register': $page = 'home'; break;
        }
    }
}

function hideWhenNotLogged() {
    global $page;
    if(!isset($_SESSION['id']) && !isset($_SESSION['login'])) {
        switch ($page) {
            case 'home': $page = 'index'; break;
        }
    }
}

function zeitformat($datum) {
    $format = '/^(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})$/';
    return $neuesFormat = preg_replace($format,'$3.$2.$1 $4:$5', $datum);
}

function logOut() {
	unset($_SESSION['vn']);
    unset($_SESSION['n']);
    unset($_SESSION['mail']);
	unset($_SESSION['id']);
	unset($_SESSION['login']);

	$_SESSION['msg-note'] = 'Du bist abgemeldet!';

	header('Location:../../index.php?page=login'); 
}
