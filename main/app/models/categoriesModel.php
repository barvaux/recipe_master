<?php
namespace App\Models\CategoriesModel;

function findAllCategories(\PDO $connexion) {
    $sql = "SELECT * FROM types_of_dishes;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id) {
    $sql = " SELECT *
            FROM types_of_dishes
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

