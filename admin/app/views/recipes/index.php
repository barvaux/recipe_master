<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RECETTES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Catégorie</th> <!-- Nouvelle colonne pour le nom du type de plat -->
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?php echo $recipe['id'] ?></td>
                <td><?php echo $recipe['name'] ?></td>
                <td><?php echo $recipe['type_name'] ?></td> <!-- Afficher le nom du type de plat -->
                <td><?php echo $recipe['created_at'] ?></td>
                <td>
                    <a href="recipes/editForm/<?php echo $recipe['id']; ?>" class="edit btn btn-primary">Modifier</a>
                    <a href="recipes/delete/<?php echo $recipe['id']; ?>" class="delete btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
