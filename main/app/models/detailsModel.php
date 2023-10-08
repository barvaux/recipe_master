<?php
namespace App\Models\DetailsModel;

function findRecipeDetailsById(\PDO $connexion, int $recipeId) {
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
                ROUND(AVG(r.value), 1) AS average_rating,
                GROUP_CONCAT(i.name SEPARATOR ', ') AS ingredient_names,
                COUNT(c.id) AS comment_count
            FROM
                dishes d
            LEFT JOIN
                users u ON d.user_id = u.id
            LEFT JOIN
                types_of_dishes t ON d.type_id = t.id
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            LEFT JOIN
                dish_ingredients di ON d.id = di.dish_id
            LEFT JOIN
                ingredients i ON di.ingredient_id = i.id
            LEFT JOIN
                comments c ON d.id = c.dish_id
            WHERE
                d.id = :dishId
            GROUP BY
                d.id, d.name, d.description, d.prep_time, d.portions, d.picture, d.created_at, u.name, t.name;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dishId', $recipeId, \PDO::PARAM_INT);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
