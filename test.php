<?php
require 'templates/head.php';

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

// Sélection des articles de blog
$articles = $bdd->query('SELECT * FROM articles');

// Boucle sur les articles
echo 'here';
while ($article = $articles->fetch()) {
    // Génération de la page pour chaque article
    ob_start(); // Début de la mise en tampon de sortie
    include 'templates/head.php'; // Inclusion du fichier head.php
    $head = ob_get_clean(); // Récupération du contenu mis en tampon de sortie
    $page = '<html>'
    . $head // Ajout du contenu de head.php dans la page
    . '<head><title>' . $article['titre'] . '</title></head>'
    . '<body>'
    . '<h1>' . $article['titre'] . '</h1>'
    . '<p>' . $article['contenu'] . '</p>'
    . '<div style="margin-bottom: 10px"></div>'
    . '<div class="card mb-3" style="max-width: 70%; text-align: center; margin: auto;">'
    . '<div class="card-body">'
    . 'test'
    . '<h5 class="card-title">' . $article['title'] . '</h5>'
    . '<p class="card-text">' . $article['content'] . '</p>'
    . '<p class="card-text">'
    . '<small class="text-muted">Posté par' . $article['lastname'] ." ".$article['firstname'] . '</small>'
    . '</p>'
    . '<hr class="hr" />'

    // <!-- Liste commentaire -->

    . '<h4>Commentaires :</h4>';
    $comments = $bdd->query('SELECT * FROM comments WHERE idarticlesfk = ' . $article['idarticles']);

    // Boucle sur les commentaires
    for ($i = 0; $i < $comments->rowCount(); $i++) {
        $comment = $comments->fetch();
        $page = '<h2>' . $comment['author'] . '</h2>'
        . '<p>' . $comment['content'] . '</p>';
    }
    // . '        if($comment['idarticlesfk']==$article['idarticles']){'
    // . '            ' . $comment['content'] . '<br>'
    // . '            <small class="text-muted">'
    // . '            Commentaire posté par '.$comment['lastname']." ".$comment['firstname'].'<br>'
    // . '            </small>'
    // . '            <br>'
    // . '            if($_SESSION['iduser']==$comment['iduserfk']){'
    // . '                <form id="comm_delete" method="post">'
    // . '                <button name='b_d_comm' type="submit" class="btn btn-primary btn-block">Suprimer commentaire</button>'
    // . '                <input type="hidden"  name="id_com" value="' . $comment['idcomments'] . '"/>'
    // . '                </form>'
    // . '        }'
    // . '    }'
    // . '<hr class="hr" />'

//<!-- Poster un commentaire -->

    // . '<form id="com_form" method="post">'
    // . '    <textarea id="comment" name="comment" cols="40" rows="2" placeholder="Ecrire votre commentaire ici" required class="form-control"></textarea>'
    // . '    <div style="margin-bottom: 10px"></div>'
    // . '    <button name='b_s_comment' type="submit" class="btn btn-primary btn-block">Poster commentaire</button>'
    // . '    <input type="hidden"  name="id_article" value="<?php echo $article['idarticles'] "/>'
    // . '</form>'
    // . '</div>'
    // . '</div>'
    // . '</div>'




    $page = '</div>'
    . '</div>'
    . '</div'
    . '</body>'
    . '</html>';

    // Écriture de la page dans un fichier
    file_put_contents($article['idarticles'] . '.html', $page);
}

?>
