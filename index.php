<?php

// chercher notre classes 'etudiant.php';

//require_once 'classes/etudiant.php';

require_once'C:\wamp64\www\Projet\etudiant'

// on instancie la classe etudiant pour pour avoir toutes les valeurs avec autant d'enregistrement possible :c'est la méme chose 
// que insertion des lignes dans une base de données<Peupler une base de données>


$etudiant1= new etudiant ;  // METHODE 1


//var_dump($etudiant1);


//$etudiant2=  new etudiant; // METHODE 1

//var_dump($etudiant2); // pour afficher le resultat sur un navigateur

// assigner la variable nom etudiant sa valeur
// METHODE 1
// Exemple de la ligne 1 (etudiant1)


$etudiant1->nom="maria";
$etudiant1->mail="maria@gmail.com";
$etudiant1->adresse="2 rue de la libération";
$etudiant1->salaire=2220;

var_dump($etudiant1);

// Exemple de la ligne (etudiant2)

/*$etudiant1->nom="abi";
$etudiant1->mail="abi@gmail.com";
$etudiant1->adresse="2 rue de la république";
$etudiant1->salaire=2120;



// METHODE 2 : UTILISATION DE LA FONCTION : public function __construct(string $nom_x_personne, string $x_mail, string $x_adresse, float $x_salaire=100)
// qui affecte directement une chaque ligne (etudiant 1, etudiant2) sa valeur stocker sur la variable nom


$etudiant1= new etudiant("maria","maria@gmail.com","2 rue de la libération", 2220);  
// ici mem ci la valeur 2220 (salaire de maria ) etait vide , le code va marcher et il va juste remplacer cette valeur par 100


$etudiant2=  new etudiant("abi","abi@gmail.com","2 rue de la république", 2120);
// ici mem ci la valeur 2120 (salaire de abi ) etait vide , le code va marcher et il va juste remplacer cette valeur par 100



//// AUTRE OPERATION
// Deposer de l'argenet avec la fonction  public function deposer(float $somme_ajouter)
  
$etudiant1-> deposer(100); // nous avons augmenté sur le salaire de maria 100 euro. Si on voulais deposer (-100) , il va pas le tenir en compte car nous avions fixé une condition if 


// voir le salaier d'un étudiant avec la fonction public function voirsalaire()

#$etudiant1-> voirsalaire(); 

var_dump($etudiant1); // on aura commme resultat qui va afficher sous forme de phrase : le salire de l'etudiant est 2220 euro

#$etudiant2-> voirsalaire(); 

var_dump($etudiant2); //  on aura commme resultat qui va afficher sous forme de phrase : le salire de l'etudiant est 2120 euro


// retirer de l'argent sur les salaires des etudiants
#$etudiant1-> retirer(100);
#$etudiant2-> retirer(100);
