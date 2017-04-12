<?php
/**
 * Connect to the database function
 * @param string $host 
 * @param string $database 
 * @param string $user 
 * @param string $pass 
 * @return boolean
 */
function connectDatabase($host, $database, $user, $pass){
  try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $dbh;
  } catch (PDOException $e) {
    print('Error! ' . $e->getMessage() . '<br>');
    die();
  }
}

function getProjects($dbh) {
  $sth = $dbh->prepare('SELECT * FROM projects');
  $sth->execute();
  $result = $sth->fetchAll();
  return $result;
}
/**
 * Adding a project to the database
 * @param string $dbh 
 * @param string $title 
 * @param string $image_url 
 * @param string $content 
 * @param string $link 
 * @return boolean
 */
function addProject($dbh, $title, $image_url, $content, $link) {
  //Prepare the statement that will be executed.
  $sth = $dbh->prepare('INSERT INTO Projects (title, image_url, content, link, created_at, updated_at) VALUES (:title, :image_url, :content, :link, NOW(), NOW())');
  // Binds all values together
  $sth->bindValue(':title', $title, PDO::PARAM_STR);
  $sth->bindValue(':image_url', $image_url, PDO::PARAM_STR);
  $sth->bindValue(':content', $content, PDO::PARAM_STR);
  $sth->bindValue(':link', $link, PDO::PARAM_STR);
  // Execute the statement.
  $success = $sth->execute();
  return $success;
} 
function viewProject($id, $dbh) {
  $sth = $dbh->prepare('SELECT * FROM projects WHERE id = :id');
  
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  
  $result = $sth->fetch();
  return $result;
}
function editProject($id, $dbh) {
  $sth = $dbh->prepare('SELECT * FROM projects WHERE id = :id');
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetch();
  return $result;
}
function deleteProject($id, $dbh) {
    $result = $dbh->prepare('DELETE FROM projects WHERE id = :id');
    $result->bindParam(':id', $id);
    $result->execute();
}
function redirect($url) {
    header('Location: ' . $url);
    die();
}
/**
 * Updating data from selected project
 * @param string $dbh 
 * @param string $title 
 * @param string $image_url 
 * @param string $content 
 * @param string $link 
 * @return boolean
 */
function updateProject($id, $dbh, $title, $image_url, $content, $link) {
    $sth = $dbh->prepare('UPDATE projects SET title = :title, image_url = :image_url, content = :content, link = :link WHERE id = :id');
    $sth->bindParam(':id', $id, PDO::PARAM_STR);
    $sth->bindParam(':title', $title, PDO::PARAM_STR);
    $sth->bindParam(':image_url', $image_url, PDO::PARAM_STR);
    $sth->bindParam(':content', $content, PDO::PARAM_STR);
    $sth->bindParam(':link', $link, PDO::PARAM_STR);
    $result = $sth->execute();
    return $result;
}
/**
 * Adding a new user to the database
 * @param string $dbh 
 * @param string $username 
 * @param string $email 
 * @param string $password 
 * @return boolean
 */
function addUser($dbh, $username, $email, $password) {
  $sth = $dbh->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':password', $password, PDO::PARAM_STR);
  $success = $sth->execute();
  return $success;
} 
/**
 * Logging in as registered user
 * @param type $dbh 
 * @param type $username 
 * @return type
 */
function getUser($dbh, $username) {
  $sth = $dbh->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->bindValue(':email', $username, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetch(PDO::FETCH_ASSOC);
  if(!empty($row)){
  return $row;
} 
  return false;
}

function loggedin(){
  return !empty($_SESSION['username']);
}

function showMessages($type = null)
{
  $messages = '';
  if(!empty($_SESSION['flash'])) {
    foreach ($_SESSION['flash'] as $key => $message) {
      if(($type && $type === $key) || !$type) {
        foreach ($message as $k => $value) {
          unset($_SESSION['flash'][$key][$k]);
          $key = ($key == 'error') ? 'danger': $key;
          $messages .= '<div class="alert alert-' . $key . '">' . $value . '</div>' . "\n";
        }
      }
    }
  }
  return $messages;
}

function addMessage($type, $message) {
  $_SESSION['flash'][$type][] = $message;
}
function selectedProject($id, $dbh) {
  $sth = $dbh->prepare('SELECT * FROM projects WHERE id = :id');
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetch();
  return $result;
}

function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function e($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}