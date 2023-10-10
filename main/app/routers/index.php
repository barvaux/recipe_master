<?php

// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

// DETAIL DES CATEGORIE
// PATTERN: ?categorieId=x
// CTRL : categoriesController
// ACTION SHOW
elseif (isset($_GET['categorieId'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\showAction($connexion, $_GET['categorieId']);

// DETAIL DES INGREDIENTS
// PATTERN: ?ingredientId=x
// CTRL : ingredientsController
// ACTION SHOW
elseif (isset($_GET['ingredientId'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\showAction($connexion, $_GET['ingredientId']);

// ROUTE DES RECETTES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

// ROUTE DÉTAIL D'UNE RECETTE
// PATTERN: ?recipeId=x
elseif (isset($_GET['recipeId'])) :
    include_once '../app/controllers/recipesController.php';
    \App\Controllers\RecipesController\showAction($connexion, $_GET['recipeId']);

// CHEFS: ROUTER DES CHEFS
// PATTERN: ?chefs=xxx
elseif (isset($_GET['chefs'])) :
    include_once '../app/routers/chefs.php';

// ROUTE DÉTAIL D'UNE RECETTE
// PATTERN: ?recipeId=x
elseif (isset($_GET['users'])) :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\showAction($connexion, $_GET['usersId']);


// PATTERN: /
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
