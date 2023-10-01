<?php
   if(isset($_POST['SubmitButton'])){ 
      //Starting the session	
      //session_start();
      $_SESSION['prenom'] = $_POST['prenom'];
      $_SESSION['nom']  = $_POST['nom'];
      $_SESSION['motdepasse']  = $_POST['motdepasse'];
          
          // On redirige vers le fichier admin.php
        echo '<br?><br /?><a href="cookies.php">recup</a>'; 
       
   }
?>
<html>
   <body>
      <form action="#" method="post">
         <br?> <label for="fname">SE CONNECTER</label?><br><br>
         
         <label for="prenom"?>Prénom:</label>
         <input type="text" id="prenom" name="prenom"><br><br>
         <label for="nom"?>Nom:
         <input type="text" id="nom" name="nom"><br?><br>   <br>
         <label for="lname"?>Mot de passe:
         <input type="text" id="motdepasse" name="motdepasse"><br?><br>         <br>
         <input type="submit" name="SubmitButton"/?><br>
         <?php echo '<br?><br /?><a href="cookies.php">cookies</a>'; ?>
      </form>
   </body>
</html>
