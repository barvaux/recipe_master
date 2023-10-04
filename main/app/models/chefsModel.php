<?php 

namespace App\Models\chefsModel;

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
