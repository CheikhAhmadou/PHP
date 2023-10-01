<?php
/**
 * objet étudiant
 */
class etudiant
{
    // proprités
    /**
     * nom de l'étudiant
     *
     * @var string
     */
    public $nom;

    /**
     * mail de de l'étudiant
     *
     * @var string
     */
    public $mail;

    /**
     * adresse de l'étudiant
     *
     * @var string
     */
    public $adresse;

    /**
     * Salaire de l'étudiant
     *
     * @var float
     */
    public $salaire;


   
    // METHODE 2 POUR INSTANCIER UN OBJET
   // Créer une fonction magique (une fonction qui va s'excécuter automatiquement dès lors qu'on fasse  un "New" sur une classé crée).
   
   public function __construct(string $nom_x_personne, string $x_mail, string $x_adresse, float $x_salaire=100) 
      // On definit que variable 100 ($salaire=100) pour que à chaque fois que la valeur du salaire est manquante , il va mettre automatiqument 100; 
   {
        // mon attribut le nom à la variable etudiant de l'instance créé
       // l'instance crée  à l'interieur de l'objet , l'intance de l'objet est connu sous le nom "$this"

       $this->nom=$nom_x_personne;
       $this->mail=$x_mail ;
       $this->adresse=$x_adresse;
       $this->salaire=$x_salaire;

      
       
   }
}


   //////AUTRES OPERATIONS 
   // ajout d'une valeur sur celle existante, on le fait toujour avec une fonction à defenir dans la foulée.
   // Par exemple sur cette fonction , nous allons deposer de l'argent sur le compte des etudiants 


   /*public function deposer(float $somme_ajouter)
    {
        // On verifie sur sur le compte compte des etudiant , la somme qui existe est >0 car ajouter une valeur négatif revient à dire  sousterer une valeur

        if($somme_ajouter>0){
        $this->salaire+=$somme_ajouter; 
        }

    }   



   // voir le salaire d'un etudiant sous forme de phrase "chaine de carectere
   #public function voirsalaire()
   /* {
       
     
        echo " le salire de l'etudiant est $this-> salaire euro"; // on va pouvoir afficher le salaire d'un etudiant 1 ou 2
    }
   


    // on pouvait retour directement la resultat sous forme de valeur pas avec une chaine de caracetere (phrase) comme avec l'exemple precedente.
    // on le fait avec avec return qui retourne la valeur au lieu de echo qui l'affiche par une chaine de caractere


    #public function voirsalaire()

    {
        return " le salaire de l'etudiant est $this-> salaire "; // on va pouvoir afficher le salaire d'un etudiant 1 ou 2
    }



    // on retire de l'argent 
    // Ce qui veeut que le salaire soit superieur la somme qu'on veut retirer

   
   # public function retirer(float $somme_retirer)

    {
        if($salaire > 0 && $this->salaire=$somme_retirer){
             $this->salaire-=$somme_retirer;
        } else {
            echo"somme insuffisante";
        }

    }



    

