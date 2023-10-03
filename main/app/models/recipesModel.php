<?php
namespace App\Models\recipesModel;
// Menu Recette.
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
        COUNT(c.id) AS comment_count
    FROM
        dishes d
    LEFT JOIN
        ratings r ON d.id = r.dish_id
    INNER JOIN
        users u ON d.user_id = u.id
    LEFT JOIN
        comments c ON d.id = c.dish_id
    GROUP BY
        d.id, d.name, d.description, d.picture, d.created_at, u.name
    ORDER BY
        d.created_at DESC
    LIMIT 9";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
