<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <img src="https://cdn.pixabay.com/photo/2012/05/07/18/57/blog-49006_1280.png" height="64" alt="Blog" loading="lazy" style="margin-top: -1px;"/>
    </a>
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Dashboard</a>
            </li>
        </ul>
        <div class="d-flex align-items-center">
            <a class="btn btn-secondary px-3 me-2" href="./login.php">Se connecter</a>
            <a class="btn btn-primary me-3" href="./register.php">S'inscrire</a>
            <form method="post">
                <button class="btn btn-danger" type="submit" name="deconnexion">Déconnexion</button>
            </form>
        </div>
    </div>
</nav>
</body>