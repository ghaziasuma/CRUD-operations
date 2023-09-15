<?php 

$optionen = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

// datenbank
try {
  $db = new PDO('mysql:host=localhost;dbname=ghaziasuma_projekt','root','',$optionen); 
}
catch(PDOException $e) {
  echo 'Datenbankverbindung fehlgeschlagen';
  die();
}

$db->query('SET NAMES utf8');