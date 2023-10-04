<?php

namespace App\Controllers\ChefsController;

function latestUsersAction(\PDO $connexion)
{
    include_once '../app/models/chefsModel.php'; 
    $latestUsers = \App\Models\chefsModel\findLatestUsers($connexion); 
    
    global $title, $content;
    $title = "Les 9 dernier utilisateur";
    ob_start();
    include '../app/views/chefs/index.php'; 
    $content = ob_get_clean();
}
