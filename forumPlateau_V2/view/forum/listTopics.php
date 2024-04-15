<?php
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <li class="list-group-item"><p><a href="#"><?= $topic->getTitle() ?></a> par <a href="#"><?= $topic->getUser() ?></a></p>
    <form action="index.php?ctrl=forum&action=delTopic" method="post">
        <input type="hidden" name="supPost" value="<?= $topic->getId() ?>">
        <input type="submit" class="btn btn-danger" name="del" value ="Supprimer">
    </form>
    <form action="index.php?ctrl=forum&action=updateTopic&id=<?= $topic->getId() ?>" method="post">
        <input type="hidden" name="updCat" value="<?= $topic->getId() ?>">
        <input type="submit" class="btn btn-primary" name="update" value ="Modifier">
    </form>
<?php }



