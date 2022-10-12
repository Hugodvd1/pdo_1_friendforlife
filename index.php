<?php

$pdo = new \PDO('mysql:host=localhost;dbname=pdo_Quest', 'hugodvd', 'password');

require_once './_connect.php';

$pdo = new \PDO(DSN, USER, PASS);

//recuperation des données sur BDD

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_BOTH);
var_dump($friends);

// envoie des données sur bdd 

$errors = [];
if (!empty($_POST)) {
    $friends = array_map('trim', $_POST);
    $friends = array_map('htmlentities', $friends);
    $firstname = $friends["firstname"];
    $lastname = $friends["lastname"];
    
// sécurisation
    if (empty($errors)) {
      $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
      $statement = $pdo->prepare($query);
      $statement->bindValue(':firstname', $firstname);
      $statement->bindValue(':lastname', $lastname);
      $statement->execute();
      header("Location: /");

      
  }
}



 ?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" class="friendform">
  <div class="form-example">
    
    <label for="firstname">Enter a firstname <title></title>: </label>
    <input type="text" name="firstname" id="firstname">
  </div>
  <div class="form-example">
    <label for="firstname">Enter a Lastname </label>
    <input type="content" name="lastname" id="lastname">
  </div>
  <div class="form-example">
    <input type="submit" value="Insert!">
</body>
</html>