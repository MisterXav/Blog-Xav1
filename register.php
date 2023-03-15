<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<?php 
    require "/fonctions/database.php";
    require "templates/head.php";
    
    if(isset($_POST['inscription'])) {
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); Le hash ne marche pas  Warning: main(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected the timezone 'UTC' for now, but please set date.timezone to select your timezone. in D:\Dev\Projet_Blog\Laragon\www\register.php on line 14
        $lastname = strtolower($_POST['Nom']);
        $firstname = strtolower($_POST['Prénom']);
        try {
            $query = $db->prepare("INSERT INTO user(mail,password,lastname,firstname) VALUES(:mail,:password,:lastname,:firstname)");
        $query->execute([
            'mail' => $mail,
            'password' => $password,
            'lastname' => $lastname,
            'firstname' => $firstname
        ]);
        echo "inscription réussie";
        header('Location: login.php');
        }
        catch (Exception $e){
            echo "mail déja utilisé";
        }
        
    }

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
              <h2 class="fw-bold mb-2 text-uppercase">S'enregistrer</h2>
              <p class="text-white-50 mb-5">Bienvenue sur le blog !</p>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="mail">Email</label>
                <input type="mail" id="mail" name="mail" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="mail">Nom</label>
                <input type="Nom" id="Nom" name="Nom" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="mail">Prénom</label>
                <input type="Prénom" id="Prénom" name="Prénom" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="inscription">S'inscrire</button>
              </form>
            </div>

            <div>
              <p class="mb-0">Vous avez un compte ? <a href="login.php" class="text-white-50 fw-bold">Se connecter</a>
              </p>
            </div>

</body>
</html>