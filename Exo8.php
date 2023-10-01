<fieldset>
<legend> Identificatioin </legend>
<form action="verif.php" method="get">
<div id="name">
<label id="name_label">prenom</label>
<input type="text" name="prenom" value="" />
</div>
<div id="name">
<label id="name_label">nom</label>
<input type="text" name="nom" value="" />
</div>
<div id="passwd">
<label>motPasse</label>
<input type="password" name="passwd" value="" />
</div>
<div id="submit">
<input type="submit" value="Validation" />
</div>
</form>
</fieldset>
 

<?php
    //On démarre une nouvelle session
    session_start();
    
    //On définit des variables de session
    $_SESSION['prenom'] = 'cheikh';
    $_SESSION['nom'] = 'KC';
    $_SESSION['password']='geo';



?>
