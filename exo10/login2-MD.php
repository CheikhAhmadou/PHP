<html>
    <body>
    <!-- On crée le formulaire -->
    
        <fieldset style='width:30%'><br />
            <legend>Authentification</legend>
            <form action='' method='get'>
                <div id='nom'>
                    <label>Nom : </label>
                    <input type='text' name='nom' value='' />                                
                </div><br />
                <div id='prenom'>
                    <label>Prenom(s):</label>
                    <input type='text' name='prenom' value='' />                                  
                </div><br />
                <div id='pwd'>
                    <label>Mot de passe</label>
                    <input type='password' name='mdp' value='' />                                  
                </div><br />
                <div id='sub'>
                    <input type='submit' name='sub' value='Valider' />                                    
                </div>
            </form>       
        </fieldset>

    </body>
</html>

<?php
    if (isset($_GET['nom'], $_GET['prenom'], $_GET['mdp'])){
        //header('Location:stockage-MD.php');
		header('Location:stockage-MD.php?nom='.$_GET['nom'].'&prenom='.$_GET['prenom'].'&mdp='.$_GET['mdp']);
    }
?>


