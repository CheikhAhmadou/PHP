<?php
  // Definition des constantes et variables
  define('prenom','toto');
  define('nom', 'jr');
  define('password','tata');
  $errorMessage = '';
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['login'] !== LOGIN) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== PASSWORD) 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['password'] = tata;
		
        // On redirige vers le fichier admin.php
        header('http://localhost/Projet/verif.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Formulaire d'authentification</title>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <fieldset>
        <legend>Identifiez-vous</legend>
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
          }
        ?>
        <p>
        <label id="name_label">nom</label>
        <input type="text" name="nom" value="" />
        </p>
        <p>
        <label id="name_label">prenom</label>
        <input type="text" name="prenom" value="" />
        </p>
        <p>
        <label for="motPasse">motPasse :</label> 
        <input type="motPasse" name="motPasse" id="motPasse" value="" /> 
        <input type="submit" name="submit" value="Validation" />
        </p>
      </fieldset>
    </form>
  </body>
</html>