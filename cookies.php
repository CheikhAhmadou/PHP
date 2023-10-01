<html>   
   <head>
      <title>PAGE DES COOKIES </title>
   </head>
   <body>


   <div> </div>
 <?php
   if(isset($_POST['SubmitButton'])){ 
      //Starting the session	
      //session_start();
      $expire = 60 * 60 * 24; // On définit la durée du cookie : 24h
      $setcookie['prenom'] = $_POST['prenom'];
      $setcookie['nom']  = $_POST['nom'];
      $setcookie['motdepasse'] = $_POST['motdepasse'];
      time()+$expire;

   }
		 
		 // On redirige vers le fichier login.php
         
     echo '<br?><br /?><a href="login.php">verif</a>';
     
	 
?>;
		
       
   </body>   
</html>



