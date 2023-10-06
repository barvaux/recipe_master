<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;


function dashboardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Dashboard";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}

function logoutAction()
{
    // On tue la variable de session 'user'
    unset($_SESSION['user']);
    // On redirige vers le site public (PUBLIC_ROOT)
    header('Location: ' .  PUBLIC_ROOT);
}


// Liste des users 

include_once '../app/models/usersModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $users
    $users = UsersModel\findAll($connexion);

    // Je charge la vue users.index dans $content
    global $title, $content;
    $title = "Liste des utilisateurs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function addAction()
{
    // Je charge la vue users.add dans $content
    global $title, $content;
    $title = "Ajouter un utilisateur";
    ob_start();
    include '../app/views/users/add.php';
    $content = ob_get_clean();
}

function deleteAction(\PDO $connexion, int $id)
{ 
    $return = UsersModel\delete($connexion, $id);

    header('location: ' . ADMIN_ROOT . 'users');
}

function editFormAction(\PDO $connexion, int $id)
{ 
    $user = UsersModel\findOneById($connexion, $id);

    // Je charge la vue editForm dans $content
    global $title, $content;
    $title = "MODIFICATION D'UN UTILISATEUR"; 
    ob_start();
    include '../app/views/users/editForm.php';
    $content = ob_get_clean();  
}


function editAction(\PDO $connexion, array $data = null)
{ 
    $return = UsersModel\updateOneById($connexion, $data);

    header('location: ' . ADMIN_ROOT . 'users');
}


function createAction(\PDO $connexion, array $data)
{
    // Assurez-vous que $data contient une valeur pour 'email'
    if (empty($data['email'])) {
        // Gérez le cas où l'email est manquant
        // Vous pouvez rediriger vers une page d'erreur ou afficher un message
        echo "L'adresse e-mail est requise.";
        return;
    }

    // Assurez-vous également que $data contient une valeur pour 'password'
    if (empty($data['password'])) {
        // Gérez le cas où le mot de passe est manquant
        // Vous pouvez rediriger vers une page d'erreur ou afficher un message
        echo "Le mot de passe est requis.";
        return;
    }

    // Appel au modèle pour insérer l'utilisateur avec les colonnes 'email' et 'password'
    $userInserted = UsersModel\insertOne($connexion, $data);

    if ($userInserted) {
        // Redirigez vers la liste des utilisateurs en cas de succès
        header('Location: ' . ADMIN_ROOT . 'users');
    } else {
        // Gérez le cas où l'insertion a échoué
        echo "L'insertion de l'utilisateur a échoué.";
    }
}
