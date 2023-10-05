<?php
namespace App\Models\CategoriesModel;

function getEntreesRecipes(\PDO $connexion)
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                d.name LIKE '%lunch%' OR d.description LIKE '%lunch%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getPlatsPrincipauxRecipes(\PDO $connexion)
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                (d.name LIKE '%main%' OR d.description LIKE '%main%')
                AND (d.name NOT LIKE '%cake%' AND d.description NOT LIKE '%cake%')
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function getDesserts(\PDO $connexion)
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                d.name LIKE '%cake%' OR d.description LIKE '%cake%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getVegetarien(\PDO $connexion)
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                d.name LIKE '%fruit%' OR d.description LIKE '%fruit%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getVegan(\PDO $connexion)
{
    $sql = "SELECT
                d.id AS dish_id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 1) AS average_rating
            FROM
                dishes d
            LEFT JOIN
                ratings r ON d.id = r.dish_id
            WHERE
                d.name LIKE '%vegan%' OR d.description LIKE '%vegan%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
