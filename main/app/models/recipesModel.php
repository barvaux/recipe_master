<?php
namespace App\Models\RecipesModel;

function findAll(\PDO $connexion, array $categoryIds) {
    // Utilisez la clause IN pour rechercher toutes les recettes appartenant aux catégories spécifiées
    $categoryIdsString = implode(',', $categoryIds);
    
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating,
                t.name AS category_name
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.id IN ({$categoryIdsString})  -- Utilisez la clause IN ici
            GROUP BY
                d.id, d.name, d.description, d.picture, t.name;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findAllByIngredients(\PDO $connexion, array $ingredientIds) {
    // Utilisez la clause IN pour rechercher toutes les recettes contenant les ingrédients spécifiés
    $ingredientIdsString = implode(',', $ingredientIds);
    
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating,
                GROUP_CONCAT(i.name SEPARATOR ', ') AS ingredient_names
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                dishes_has_ingredients di ON d.id = di.dish_id
            INNER JOIN
                ingredients i ON di.ingredient_id = i.id
            WHERE
                i.id IN ({$ingredientIdsString})  -- Utilisez la clause IN ici
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT
                ROUND(AVG(r.value), 2) AS notation,
                d.*,
                u.id AS user_id,
                u.name AS user_name,
                t.id AS category_id,
                t.name AS category_name
            FROM
                dishes d
            JOIN
                types_of_dishes t ON d.type_id = t.id
            JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            GROUP BY
                d.id
            ORDER BY
                notation DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT
                ROUND(AVG(r.value), 2) AS notation,
                d.*,
                u.id AS user_id,
                u.name AS user_name,
                t.id AS category_id,
                t.name AS category_name
            FROM
                dishes d
            JOIN
                types_of_dishes t ON d.type_id = t.id
            JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                d.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllByUsersId(\PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM dishes
            WHERE user_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findLatestDishes(\PDO $connexion): ?array
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                d.created_at AS creation_date,
                ROUND(AVG(r.value), 1) AS average_rating,
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                GROUP_CONCAT(i.name SEPARATOR ', ') AS ingredient_names,
                GROUP_CONCAT(ROUND(di.quantity, 0) SEPARATOR ', ') AS ingredient_quantities,
                GROUP_CONCAT(i.unit SEPARATOR ', ') AS ingredient_units,
                d.prep_time AS preparation_time,
                d.portions AS portions,
                u.name AS comment_username,
                c.content AS comment_content,
                t.description AS dish_type_description
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                comments c ON d.id = c.dish_id
            INNER JOIN
                dishes_has_ingredients di ON d.id = di.dish_id
            INNER JOIN
                ingredients i ON di.ingredient_id = i.id
            LEFT JOIN
                users uc ON c.user_id = uc.id
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            GROUP BY
                d.id, d.name, d.description, d.picture, d.created_at, u.name, d.prep_time, d.portions,
                comment_username, comment_content
            ORDER BY
                d.created_at DESC
            LIMIT 9;";


    $rs = $connexion->query($sql);
    $latestDishes = $rs->fetchAll(\PDO::FETCH_ASSOC);

    // Maintenant, pour chaque recette, récupérez les commentaires
    foreach ($latestDishes as &$recipe) {
        $recipe['comments'] = getCommentsForRecipe($connexion, $recipe['dish_id']);
    }

    return $latestDishes;
}

function getCommentsForRecipe(\PDO $connexion, int $recipeId): array
{
    $sql = "SELECT
                c.user_id,
                u.name AS comment_username,
                c.content AS comment_content
            FROM
                comments c
            INNER JOIN
                users u ON c.user_id = u.id
            WHERE
                c.dish_id = :recipe_id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recipe_id', $recipeId, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}