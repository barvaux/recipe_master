<?php
namespace App\Models\CategoriesModel;

function getFrancaiseRecipes(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Française'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getItalienneRecipes(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Italienne'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function getJaponaise(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Japonaise'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getMexicaine(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Mexicaine'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getIndienne(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Indienne'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getChinoise(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Chinoise'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getMediterraneenne(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Méditerranéenne'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getAfricaine(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Africaine'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getAmericaine(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Américaine'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getThailandaise(\PDO $connexion)
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
            INNER JOIN
                types_of_dishes t ON d.type_id = t.id
            WHERE
                t.name = 'Thailandaise'
            GROUP BY
                d.id, d.name, d.description, d.picture;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


