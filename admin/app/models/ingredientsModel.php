<?php

function findAllIngredients(\PDO $connexion) {
    $sql = "SELECT * 
            FROM ingredients 
            ORDER BY name ASC";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
