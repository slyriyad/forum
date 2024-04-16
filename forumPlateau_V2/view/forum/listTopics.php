<?php
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <li class="list-group-item"><p><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a> par <a href="#"><?= $topic->getUser() ?></a></p>
    
<?php }



