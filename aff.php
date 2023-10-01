<?php
##connecter la base de données

    $host = 'localhost';
    $dbname = 'Vehicules';
    $username = 'postgres';
    $password = 'cheikh';
 
  $db = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
   
  try{
     $conn = new PDO($db);
     
     if($conn){
      echo "Connecté à $dbname avec succès!";
     }
  }catch (PDOException $e){
     echo $e->getMessage();
  }

  $stmt = $conn->prepare("SELECT* 'idL','longL', 'latL' from lieu ");
  $stmt->execute();
  $results = $stmt->fetchAll();
  $json = json_encode($results);

  ?>;