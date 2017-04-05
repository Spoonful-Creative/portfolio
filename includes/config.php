<?php

require 'functions/functions.php';

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'Portfolio';


$dbh = connectDatabase($host, $database, $user, $pass);
$projects = getProjects($dbh);

// die(var_dump($projects));