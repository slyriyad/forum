<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>
<ul class="list-group">
<?php
foreach($categories as $category ){ ?>
    <li class="list-group-item"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a><br>
        
    </li>
    
<?php } ?>
</ul>



  
