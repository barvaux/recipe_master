<?php
namespace App\Models\IngredientsModel;

function getPoulet(\PDO $connexion)
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
                d.name LIKE '%chicken%' OR d.description LIKE '%chicken%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getBoeuf(\PDO $connexion)
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
                d.name LIKE '%beef%' OR d.description LIKE '%beef%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function getPoisson(\PDO $connexion)
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
                d.name LIKE '%fish%' OR d.description LIKE '%fish%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getLegumes(\PDO $connexion)
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
                d.name LIKE '%vegetable%' OR d.description LIKE '%vegetable%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getFromage(\PDO $connexion)
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
                d.name LIKE '%cheese%' OR d.description LIKE '%cheese%'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
