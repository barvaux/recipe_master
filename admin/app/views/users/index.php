<?php
/*
    Variables disponibles
        $users ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES UTILISATEURS</h1>
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
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['created_at'] ?></td>
                <td>
                <a href="users/editForm/<?php echo $user['id']; ?>" class="edit btn btn-primary">Modifier</a>
                <a href="users/delete/<?php echo $user['id']; ?>" class="delete btn btn-secondary">Supprimer</a>
                </td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>