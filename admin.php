<?php
require "/fonctions/database.php";
require "templates/head.php";
session_start();
if ($_SESSION['is_admin']==false) {
    header('Location: index.php');
}

if(isset($_POST["deconnexion"])) {
    $_SESSION['is_connected']=false;
    $_SESSION['is_admin']==false;
    header('Location: index.php');
}


if(isset($_POST['formsend'])) {
    $content = $_POST['content'];
    $title = $_POST['title'];

    
    $query = $db->prepare("INSERT INTO articles(title,content,iduserfk) VALUES(:title,:content,:iduserfk)");
    $query->execute([
        'title' => $title,
        'content' => $content,
        'iduserfk' => $_SESSION['iduser']
    ]);
}

$query = $db->prepare("SELECT articles.idarticles,articles.title,articles.content,user.firstname,user.lastname,articles.iduserfk FROM articles INNER JOIN user ON articles.iduserfk=user.iduser");
$query->execute();
$list_articles = $query->fetchAll();

$query = $db->prepare("SELECT comments.idcomments,comments.content,user.firstname,user.lastname,comments.idarticlesfk,comments.iduserfk FROM comments INNER JOIN user ON comments.iduserfk=user.iduser");
$query->execute();
$list_comment = $query->fetchall();

$query = $db->prepare("SELECT * FROM user");
$query->execute();
$list_user = $query->fetchall();

if(isset($_POST['b_s_comment'])){


    $query = $db->prepare("INSERT INTO comments(content,iduserfk,idarticlesfk) VALUES(:content,:iduserfk,:idarticlesfk)");
    $query->execute([
        'content' => $_POST['comment'],
        'iduserfk' => $_SESSION['iduser'],
        'idarticlesfk' => $_POST['id_article']
    ]);
    header('Location: admin.php');

}
if(isset($_POST['b_d_comm'])){
    $query = $db->prepare("DELETE FROM comments WHERE idcomments = ".$_POST['id_com']);
    $query->execute();
    header('Location: admin.php');
}
if(isset($_POST['b_d_article'])){
    $query = $db->prepare("DELETE FROM comments WHERE idarticlesfk = ".$_POST['id_article']);
    $query->execute();
    $query = $db->prepare("DELETE FROM articles WHERE idarticles = ".$_POST['id_article']);
    $query->execute();
    header('Location: admin.php');
}

if(isset($_POST['d_user'])){
    $query = $db->prepare("DELETE FROM user WHERE iduser = ".$_POST['id_user']);
    $query->execute();
    $query = $db->prepare("DELETE FROM articles WHERE iduserfk = ".$_POST['id_user']);
    $query->execute();
    $query = $db->prepare("DELETE FROM comments WHERE iduserfk = ".$_POST['id_user']);
    $query->execute();
    header('Location: admin.php');
}

   
if(isset($_POST['inscription'])) {
    $mail = $_POST['mail'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
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
    header('Location: admin.php');
    }
    catch (Exception $e){
        echo "mail déja utilisé";
    }
    
}




?>
<body>
<div class="container">

    <h2>Table utilisateur</h2>
    <br>
    <table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
        <th scope="col">Mail</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list_user as $row) {
    echo "<tr>
    <td>" . $row["iduser"] . "</td>
    <td>" . $row["firstname"] . "</td>
    <td>" . $row["lastname"] . "</td>
    <td>" . $row["mail"] . "</td>
    <td>";
    echo '<form id="user_delete" method="post">';
    echo '<button name="d_user" type="submit" class="btn btn-danger">Suprimer utilisateur</button>';
    echo '<input type="hidden"  name="id_user" value="'. $row["iduser"] . '"/>';
    echo '</form>';};
    ?>
    </tbody>
</table>


<h2>Table Article</h2>
    <br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list_articles as $row) {
    echo "<tr>
    <td>" . $row["idarticles"] . "</td>
    <td>" . $row["title"] . "</td>
    <td>" . $row["content"] . "</td>
    <td>" . $row["iduserfk"] . "</td>
    <td>";
    echo '<form id="article_delete" method="post">';
    echo '<button name="b_d_article" type="submit" class="btn btn-danger">Suprimer article</button>';
    echo '<input type="hidden"  name="id_article" value="'. $row["idarticles"] . '"/>';
    echo '</form>';};
    ?>
    </tbody>
</table>


<h2>Table commentaire</h2>
    <br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Contenu</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Article</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list_comment as $row) {
    echo "<tr>
    <td>" . $row["idcomments"] . "</td>
    <td>" . $row["content"] . "</td>
    <td>" . $row["iduserfk"] . "</td>
    <td>" . $row["idarticlesfk"] . "</td>
    <td>";
    echo '<form id="comm_delete" method="post">';
    echo '<button name="b_d_comm" type="submit" class="btn btn-danger">Suprimer commentaire</button>';
    echo '<input type="hidden"  name="id_com" value="'. $row["idcomments"] . '"/>';
    echo '</form>';};
    ?>

    </tbody>
</table>
</div>
</body>
</html>