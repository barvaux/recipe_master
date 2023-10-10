<?php

namespace App\Models\usersModel;

function findMostPopularUser(\PDO $connexion): ?array
{
    $sql = "SELECT u.id AS user_id, u.name AS user_name, u.created_at AS registration_date, COUNT(d.id) AS recipes_posted
    FROM users u
    LEFT JOIN dishes d ON u.id = d.user_id
    LEFT JOIN ratings r ON d.id = r.dish_id
    GROUP BY u.id, u.name, u.created_at
    ORDER BY AVG(r.value) DESC
    LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


function findOneById(\PDO $connexion, int $id): ?array
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
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


function findLatestUsers(\PDO $connexion): ?array
{
    $sql = "SELECT
                id AS user_id,
                name AS user_name,
                email AS user_email,
                biography AS user_biography,
                picture AS user_picture,
                created_at AS registration_date
            FROM
                users
            ORDER BY
                created_at DESC
            LIMIT 9;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
