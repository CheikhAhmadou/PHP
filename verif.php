<html>   
   <head>
      <title>PAGE DE VERIFICATION </title>
   </head>
   <body>

   <div> </div>
 <?php
   if(isset($_POST['SubmitButton'])){ 
      //Starting the session	
      //session_start();
      $_SESSION['prenom'] = $_POST['prenom'];
      $_SESSION['nom']  = $_POST['nom'];
      $_SESSION['motdepasse']  = $_POST['motdepasse'];
   }
		 
		 // On redirige vers le fichier admin.php
     echo '<br?><br /?><a href="login.php">login</a>'; 


     // Session is starting
session_start();
$username = $_POST["username"];

if (isset($_POST["Login"])) {
  // Session Variables are created
  $_SESSION["user"] = $username;

  // Login time is stored within a session variable
  $_SESSION["login_time_stamp"] = time();
  header("Location:homepage.php");
}
?>;
		
       
   </body>   
</html>