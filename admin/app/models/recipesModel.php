<?php

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.id, d.name, d.created_at, t.name AS type_name
            FROM dishes d
            LEFT JOIN types_of_dishes t ON d.type_id = t.id
            ORDER BY d.name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
            SET name = :name,
                description = :description,
                user_id = :user_id,
                type_id = :type_id,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
    $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_INT);
    return $rs->execute();
}


function delete(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM dishes
            WHERE id =:id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());
}

function findOneById(\PDO $connexion, int $id)
{
    $sql = "SELECT *
            FROM dishes
            WHERE id =:id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function updateOneById(\PDO $connexion, array $data = null)
{
    $sql = "UPDATE dishes
            SET name       = :name,
                created_at = NOW()
                WHERE id   = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return intval($rs->execute());
} 

