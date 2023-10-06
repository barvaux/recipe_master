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

function findMostPopularUserPicture(\PDO $connexion): ?string
{
    $sql = "SELECT u.picture AS user_picture
            FROM users u
            WHERE u.id = (
                SELECT u.id
                FROM users u
                LEFT JOIN dishes d ON u.id = d.user_id
                LEFT JOIN ratings r ON d.id = r.dish_id
                GROUP BY u.id
                ORDER BY AVG(r.value) DESC
                LIMIT 1
            )";
    $rs = $connexion->query($sql);
    $row = $rs->fetch(\PDO::FETCH_ASSOC);

    if ($row && isset($row['user_picture'])) {
        return $row['user_picture']; 
    } else {
        return null;
    }
}



function findOneByName(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}