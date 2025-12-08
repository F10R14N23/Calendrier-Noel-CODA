<?php

//Ouvrture et lecture fichier

$nom_fichier = "data";
$mode_lecture = "r";
$fichier_handle = fopen($nom_fichier, $mode_lecture);

if ($fichier_handle === false) {
    echo "Erreur, Fichier non Lu\n";
}


$totaux_calories = [];


// Séparation des BLOCS d'Elfes ---
$contenu_brut = file_get_contents($nom_fichier);

$blocs_elfes = explode("\n\n", $contenu_brut);



// Regroupement

foreach ($blocs_elfes as $bloc) {

    $lignes_elfe = explode("\n", trim($bloc));

    $nom_elfe = array_shift($lignes_elfe);

    $total_calories = array_sum($lignes_elfe);

    $totaux_calories[$nom_elfe] = $total_calories;
}



// Tri et Top 3

arsort($totaux_calories, SORT_NUMERIC);

$top_3 = array_slice($totaux_calories, 0, 3, true);


// Affichage

if (!empty($top_3)) {

    echo "\nTop 3 des Elfes Transportant le Plus de Calories \n";
    echo "--------------------------------------------------\n";

    $rang = 1;

    foreach ($top_3 as $nom_elfe => $calories) {

        echo "*$rang: $nom_elfe - Total Calories: $calories\n";
        $rang++;

    }

}