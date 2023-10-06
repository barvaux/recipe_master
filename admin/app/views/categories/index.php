<?php
/*
    Variables disponibles
        $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><?php echo $category['created_at'] ?></td>
                <td>
                <a href="categories/editForm/<?php echo $category['id']; ?>" class="edit btn btn-primary">Modifier</a>
                <a href="categories/delete/<?php echo $category['id']; ?>" class="delete btn btn-secondary">Supprimer</a>
                </td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>