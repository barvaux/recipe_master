<div class="page-header">
    <h1>AJOUT D'UN UTILISATEUR</h1>
</div>
<form action="users/create" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" />
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" />
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
