<?php

session_start();

$page = $_GET['page'] ?? '';

// Funktionen und Datenbank
require_once __DIR__.'/inc/db_connect.inc.php';
require_once __DIR__.'/inc/functions.inc.php';

// header
require_once __DIR__.'/inc/header.inc.php';

// in functions definiert:
// kein Zugriff auf Seiten ohne eingeloggt zu sein
hideWhenNotLogged();
// login, Registrierung etc nicht vorhanden wenn eingeloggt
hideWhenlogged();

// unterschiedlich benannte flash messages. In fnctions definiert
// flash('name');


// navigation einbinden
$templateFile = __DIR__.'/views/' .$page. '.view.php';
if(file_exists($templateFile)) {
	require_once $templateFile;
}else {
	require_once __DIR__.'/views/index.view.php';
} 

// footer
require_once __DIR__.'/inc/footer.inc.php';