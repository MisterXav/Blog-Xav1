<?php
session_start();
require "/fonctions/database.php";
require "/fonctions/query_home.php";
require "templates/head.php";

if ($_SESSION['is_connected']==false) {
    header('Location: index.php');
}

if(isset($_POST["deconnexion"])) {
    $_SESSION['is_connected']=false;
    header('Location: index.php');
}
?>
<body>

<!-- Liste article -->

<?php foreach($list_articles as $article) {?>
<div style="margin-bottom: 10px"></div>
    <div class="card mb-3" style="max-width: 70%; text-align: center; margin: auto;">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($article['content']); ?></p>
            <p class="card-text">
                <small class="text-muted">Posté par <?php echo htmlspecialchars($article['lastname'])." ".htmlspecialchars($article['firstname']); ?> </small>
            </p>
            <hr class="hr" />

<!-- Liste commentaire -->

            <h4>Commentaires :</h4>
                <?php foreach($list_comment as $comment){
                    if($comment['idarticlesfk']==$article['idarticles']){
                        echo $comment['content']."<br>"; ?>
                        <small class="text-muted">
                        <?php
                        echo "Commentaire posté par ".$comment['lastname']." ".$comment['firstname']."<br>"; ?>
                        </small>
                        <?php
                        echo "<br>";
                        if($_SESSION['iduser']==$comment['iduserfk']){?>
                            <form id="comm_delete" method="post">
                            <button name='b_d_comm' type="submit" class="btn btn-primary btn-block">Suprimer commentaire</button>
                            <input type="hidden"  name="id_com" value="<?php echo $comment['idcomments'] ?>"/>
                            </form>
                        <?php
                    };
                };
            } ?>
            <hr class="hr" />

<!-- Poster un commentaire -->

            <form id="com_form" method="post">
                <textarea id="comment" name="comment" cols="40" rows="2" placeholder="Ecrire votre commentaire ici" required class="form-control"></textarea>
                <div style="margin-bottom: 10px"></div>
                <button name='b_s_comment' type="submit" class="btn btn-primary btn-block">Poster commentaire</button>
                <input type="hidden"  name="id_article" value="<?php echo $article['idarticles'] ?>"/>
            </form>
        </div>
    </div>
</div>
<?php }; ?>

<!-- Poster un article -->
<div style="margin-bottom: 50px;"></div>
<form method='post' style="max-width: 70%; text-align: center; margin: auto;">
    <h3>Créer un article :</h3>
    <div class="form-outline mb-4">
        <label class="form-label" for="form1Example1">Titre de l'article :</label>
        <input type="text" id="title" name="title" class="form-control" />
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="form1Example2">Contenu de l'article :</label>
        <textarea name="content" id="content" class="form-control"></textarea>
    </div>
    <button name='formsend' type="submit" class="btn btn-primary btn-block">Poster l'article</button>
</form>
<div style="margin-bottom: 20px;"></div>
</style>
</body>
</html>