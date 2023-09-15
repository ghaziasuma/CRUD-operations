<?php 

session_start();

require_once dirname(__DIR__,2).'/inc/db_connect.inc.php';
require_once dirname(__DIR__,2).'/inc/functions.inc.php';

// session löschen 
logOut();

header('Location:../../index.php?page=login');