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
                t.name AS category_name,
                t.description AS category_description
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.id IN ({$categoryIdsString}) 
            GROUP BY
                d.id, d.name, d.description, d.picture, t.name, t.description;";

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
                GROUP_CONCAT(i.name SEPARATOR ', ') AS ingredient_names,
                t.description AS category_description
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                dishes_has_ingredients di ON d.id = di.dish_id
            INNER JOIN
                ingredients i ON di.ingredient_id = i.id
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                i.id IN ({$ingredientIdsString})  
            GROUP BY
                d.id, d.name, d.description, d.picture, t.description;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.prep_time AS preparation_time,
                d.portions AS number_of_portions,
                d.picture AS dish_picture,
                d.created_at AS creation_date,
                u.name AS user_name,
                t.name AS category_name,
                t.description AS category_description,
                ROUND(AVG(r.value), 1) AS notations,
                GROUP_CONCAT(DISTINCT i.name SEPARATOR ', ') AS ingredient_names,
                COUNT(DISTINCT c.id) AS comment_count,
                GROUP_CONCAT(DISTINCT ROUND(di.quantity, 0) SEPARATOR ', ') AS ingredient_quantities,
                GROUP_CONCAT(DISTINCT i.unit SEPARATOR ', ') AS ingredient_units,
                GROUP_CONCAT(DISTINCT c.content SEPARATOR ' | ') AS comments,
                uc.name AS comment_username
            FROM
                dishes d
            LEFT JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                types_of_dishes t ON d.type_id = t.id
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            LEFT JOIN
                dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN
                ingredients i ON di.ingredient_id = i.id
            LEFT JOIN
                comments c ON d.id = c.dish_id
            LEFT JOIN
                users uc ON c.user_id = uc.id
            WHERE
                d.id = :id
            GROUP BY
                d.id,
                d.name,
                d.description,
                d.prep_time,
                d.portions,
                d.picture,
                d.created_at,
                u.name,
                t.name,
                t.description,
                uc.name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllByUsersId(\PDO $connexion, int $id): array
{
    $sql = "SELECT 
            u.id AS user_id,
                u.name AS user_name,
                u.email AS user_email,
                u.biography AS user_biography,
                u.picture AS user_picture,
                u.created_at AS user_creation_date,
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating,
                t.description AS category_description
            FROM
                users u
            LEFT JOIN
                dishes d ON u.id = d.user_id
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            LEFT JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                u.id = :id
            GROUP BY
                u.id, u.name, u.email, u.biography, u.picture, u.created_at, d.id, d.name, d.description, d.picture, t.description;";
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
                t.description AS category_description
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
                comment_username, comment_content, category_description 
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

function findRandomDish(\PDO $connexion): ?array
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                d.created_at,
                ROUND(AVG(r.value), 1) AS average_rating,
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                t.description AS category_description 
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            INNER JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                comments c ON d.id = c.dish_id
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id 
            GROUP BY
                d.id, d.name, d.description, d.picture, d.created_at, u.name, category_description 
            ORDER BY
                RAND()
            LIMIT 1;";

    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}



function findThreePopularDishes(\PDO $connexion): ?array
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                ROUND(AVG(r.value), 1) AS average_rating,
                d.description AS dish_description,
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                d.picture AS dish_picture,
                t.description AS category_description
            FROM
                dishes d
            JOIN
                ratings r ON d.id = r.dish_id
            JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                comments c ON d.id = c.dish_id
            JOIN
                types_of_dishes t ON d.type_id = t.id
            GROUP BY
                d.id, d.name, d.description, u.name
            ORDER BY
                average_rating DESC
            LIMIT 3";


    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}



function findUserMostPopularRecipes(\PDO $connexion): ?array
{
    $sql = "SELECT
                d.name AS dish_name,
                d.created_at AS creation_date,
                d.description AS dish_description,
                d.picture AS dish_picture,
                r.value AS rating_value,
                t.description AS category_description
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                d.user_id = (
                    SELECT
                        u.id
                    FROM
                        users u
                    LEFT JOIN
                        dishes du ON u.id = du.user_id
                    LEFT JOIN
                        ratings r ON du.id = r.dish_id
                    GROUP BY
                        u.id
                    ORDER BY
                        AVG(r.value) DESC
                    LIMIT 1
                )
            ORDER BY
                d.created_at DESC
            LIMIT 2;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

