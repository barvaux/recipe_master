<?php
namespace App\Models\IngredientsModel;

function findAllIngredients(\PDO $connexion) {
    $sql = "SELECT * FROM ingredients;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id) {
    $sql = " SELECT *
            FROM ingredients
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

