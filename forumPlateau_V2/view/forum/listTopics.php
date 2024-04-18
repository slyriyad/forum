<?php
    $topics = $result["data"]['topics']; 
    $category = $result["data"]['category']; 
?>

<h1 style="text-align: center;color: black;margin:5% 0%"><?= $category->getName() ?></h1>

<?php
foreach($topics as $topic ){ ?>
    <li class="list-group-item"><p><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a> par <a href="#"><?= $topic->getUser() ?></a></p>
    
<?php }



