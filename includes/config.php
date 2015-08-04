<?php
session_start();
/* Chaine de connexion:
mysql : le système SGBD utilisé
dbname : le nom de la base de données
host : l'adresse du serveur*/
$dsn = 'mysql:dbname=ecole;host=localhost';
$user = 'root'; //super-utilisateur universel
$password = '';

$conn = new PDO($dsn, $user, $password) or die("connexion échouée");
