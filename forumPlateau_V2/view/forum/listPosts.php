<?php
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){ ?>
    <li class="list-group-item"><p><a href="#"><?= $post ?></a> par <a href="#"><?= $post->getUser() ?></a></p>
    
<?php }
