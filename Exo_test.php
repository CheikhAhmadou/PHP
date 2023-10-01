<?php
$prenom= 'Marc';
$nom='Doe';
$note1=10;
$note2=20;
$moyenne=($note1+$note2)/2;

//echo ' Bonjour '  . $prenom. ' '. $nom. ' vous avez eu ' . (($note1+$note2) / 2) . ' de moyenne ';
//echo "\nbonjour $prenom $nom vous avez eu $moyenne de moyenne";  // Methode 2


$classe=[
    'nom'=> ['Mohamed','Ahmed', 'Rafika', 'Aicha','Sami', 'Samar', 'Rafik','Samiha', 'Fourat', 'Sami', 'Noura'],
    'notes' => [10,15,08,15,17,12,19,20,11,05,14]
];

echo $classe ;
?>
