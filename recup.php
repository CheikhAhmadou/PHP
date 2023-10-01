<html>   
   <head>
      <title>PAGE DE RECUPERATION </title>
   </head>
   <body>


   <div> </div>
 <?php
   if(isset($_POST['SubmitButton'])){ 
      //Starting the session	
      //session_start();
      $_SESSION['prenom'] = $_POST['prenom'];
      $_SESSION['nom']  = $_POST['nom'];
      $_SESSION['motdepasse'] = $_POST['motdepasse'];
   }
		 
		 // On redirige vers le fichier admin.php
     echo '<br?><br /?><a href="verif.php">recup</a>'; 
	 
?>;
		
       
   </body>   
</html>