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


// This function adds the contents of the feedback from to the database
function addFeedbackToDatabase($dbh, $title, $image_url, $content, $link) {
  //Prepare the statement that will be executed.
  $sth = $dbh->prepare('INSERT INTO projects (title, image_url, content, link, created_at, updated_at) VALUES (:title, :image_url, :content, :link, NOW(), NOW())');

  // Bind the "$title" to the SQL statement.
  $sth->bindValue(':title', $title, PDO::PARAM_STR);
  // Bind the "$image_url" to the SQL statement.
  $sth->bindValue(':image_url', $image_url, PDO::PARAM_STR);
  // Bind the "$content" to the SQL statement.
  $sth->bindValue(':content', $content, PDO::PARAM_STR);
  // Bind the "$link" to the SQL statement.
  $sth->bindValue(':link', $link, PDO::PARAM_STR);

  // Execute the statement.
  $success = $sth->execute();

  return $success;
}