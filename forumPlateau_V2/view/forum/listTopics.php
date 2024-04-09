<?php
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <li class="list-group-item"><p><a href="#"><?= $topic ?></a> par <a href="#"><?= $topic->getUser() ?></a></p>
    <form action="index.php?ctrl=forum&action=delTopic" method="post">
        <input type="hidden" name="supCat" value="<?= $topic->getId() ?>">
        <input type="submit" class="btn btn-danger" name="del" value ="Supprimer">
    </form>
<?php }



