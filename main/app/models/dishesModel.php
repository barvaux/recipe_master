<?php

namespace App\Models\dishesModel;

function findRandomDish(\PDO $connexion): ?array
{
    $sql = "SELECT
                d.id,
                d.name AS dish_name,
                d.description AS dish_description,
                d.picture AS dish_picture,
                d.created_at,
                AVG(r.value) AS average_rating,
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
                RAND()
            LIMIT 1;";

    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

// function findMostPopularDish(\PDO $connexion): ?array
// {
//     $sql = "SELECT d.id, d.name, ROUND(AVG(r.value), 1) AS average_rating
//             FROM dishes d
//             JOIN ratings r ON d.id = r.dish_id
//             GROUP BY d.id, d.name
//             ORDER BY average_rating DESC
//             LIMIT 1";
//     $rs = $connexion->query($sql);
//     return $rs->fetch(\PDO::FETCH_ASSOC);
// }



// function findCreatorOfMostPopularDish(\PDO $connexion): ?array
// {
//     $sql = "SELECT u.id AS user_id, u.name AS user_name
//             FROM users u
//             JOIN dishes d ON u.id = d.user_id
//             JOIN (
//                 SELECT d.id, AVG(r.value) AS average_rating
//                 FROM dishes d
//                 JOIN ratings r ON d.id = r.dish_id
//                 GROUP BY d.id
//                 ORDER BY average_rating DESC
//                 LIMIT 1
//             ) AS top_rated_dish ON d.id = top_rated_dish.id";
//     $rs = $connexion->query($sql);
//     return $rs->fetch(\PDO::FETCH_ASSOC);
// }

// function findDescriptionOfMostPopularDish(\PDO $connexion): ?string
// {
//     $sql = "SELECT d.description
//             FROM dishes d
//             JOIN (
//                 SELECT dish_id, AVG(value) AS average_rating
//                 FROM ratings
//                 GROUP BY dish_id
//                 ORDER BY average_rating DESC
//                 LIMIT 1
//             ) AS top_rated_dish ON d.id = top_rated_dish.dish_id";

//     $rs = $connexion->query($sql);
//     $description = $rs->fetchColumn();

//     return $description;
// }

// function findRatingOfMostPopularDish(\PDO $connexion): ?float
// {
//     $sql = "SELECT AVG(r.value) AS average_rating
//             FROM ratings r
//             WHERE r.dish_id = (
//                 SELECT dish_id
//                 FROM ratings
//                 GROUP BY dish_id
//                 ORDER BY AVG(value) DESC
//                 LIMIT 1
//             )";

//     $rs = $connexion->query($sql);
//     $rating = $rs->fetchColumn();

//     return $rating ? (float)$rating : null;
// }

// function findCommentCountOfMostPopularDish(\PDO $connexion): ?int
// {
//     $sql = "SELECT COUNT(c.id) AS comment_count
//             FROM comments c
//             WHERE c.dish_id = (
//                 SELECT dish_id
//                 FROM ratings
//                 GROUP BY dish_id
//                 ORDER BY AVG(value) DESC
//                 LIMIT 1
//             )";

//     $rs = $connexion->query($sql);
//     $commentCount = $rs->fetchColumn();

//     return $commentCount !== false ? (int)$commentCount : null;
// }

function findThreePopularDishes(\PDO $connexion): ?array
{
    $sql = "SELECT
        d.name AS dish_name,
        ROUND(AVG(r.value), 1) AS average_rating,
        d.description AS dish_description,
        u.name AS user_name,
        COUNT(c.id) AS comment_count,
        d.picture AS dish_picture
    FROM
        dishes d
    JOIN
        ratings r ON d.id = r.dish_id
    JOIN
        users u ON d.user_id = u.id
    LEFT JOIN
        comments c ON d.id = c.dish_id
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
    $sql = "SELECT d.name AS dish_name, 
    d.created_at AS creation_date, 
    d.description AS dish_description,
    d.picture AS dish_picture 
    FROM dishes d
    WHERE d.user_id = (
        SELECT u.id
        FROM users u
        LEFT JOIN dishes du ON u.id = du.user_id
        LEFT JOIN ratings r ON du.id = r.dish_id 
        GROUP BY u.id
        ORDER BY AVG(r.value) DESC
        LIMIT 1
    )
    ORDER BY d.created_at DESC
    LIMIT 2;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
        }

function findRatingsOfUserMostPopularRecipes(\PDO $connexion): ?array
{
    $sql = "SELECT
            d.name AS dish_name,
            d.created_at AS creation_date,
            ROUND(AVG(r.value), 1) AS average_rating,
            d.picture AS dish_picture
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            WHERE d.user_id = (
            SELECT u.id
            FROM users u
            LEFT JOIN dishes du ON u.id = du.user_id
            LEFT JOIN ratings ru ON du.id = ru.dish_id
            GROUP BY u.id
            ORDER BY AVG(ru.value) DESC
            LIMIT 1
        )
        GROUP BY d.id, d.name, d.created_at, d.picture
        ORDER BY d.created_at DESC
        LIMIT 2;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


