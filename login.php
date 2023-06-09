
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<?php 
require "/fonctions/verification.php";
require "templates/head.php";
?>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            
            <form method="post">
              <h2 class="fw-bold mb-2 text-uppercase">Se connecter</h2>
              <p class="text-white-50 mb-5">Veuillez rentrer vos identifiants pour vous connecter</p>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="mail">Email</label>
                <input type="mail" id="mail" name="mail" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="connexion">Se connecter</button>
              </form>
            </div>

            <div>
              <p class="mb-0">Vous n'avez pas de compte ? <a href="register.php" class="text-white-50 fw-bold">S'enregistrer</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>