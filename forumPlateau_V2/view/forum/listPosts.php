<?php
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){ ?>
    <li class="list-group-item"><p><a href="#"><?= $post ?></a> par <a href="#"><?= $post->getUser() ?></a></p>
    <form action="index.php?ctrl=forum&action=delpost" method="post">
        <input type="hidden" name="supPost" value="<?= $post->getId() ?>">
        <input type="submit" class="btn btn-danger" name="del" value ="Supprimer">
    </form>
<?php }
