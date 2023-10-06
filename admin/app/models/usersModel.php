<?php

namespace App\Models\UsersModel;

function findOneByNamePassword(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name
            AND password = :password;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}


// Liste des users

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO users
            SET name = :name,
                email = :email,
                password = :password, 
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    return $rs->execute();
}


function delete(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM users
            WHERE id =:id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());
}

function findOneById(\PDO $connexion, int $id)
{
    $sql = "SELECT *
            FROM users
            WHERE id =:id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function updateOneById(\PDO $connexion, array $data = null)
{
    $sql = "UPDATE users
            SET name       = :name,
                created_at = NOW()
                WHERE id   = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return intval($rs->execute());
} 

