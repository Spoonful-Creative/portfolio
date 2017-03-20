<?php

function connectDatabase($host, $database, $user, $pass){
  try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $dbh;

  } catch (PDOException $e) {
    print('Error! ' . $e->getMessage() . '<br>');
    die();
  }
}

// This function returns all websites from the database
function getProjects($dbh) {
  $sth = $dbh->prepare("SELECT * FROM Projects");
  $sth->execute();

  $result = $sth->fetchAll();
  return $result;
}