<?php
    $categories = $result["data"]['categories']; 
?>

<h1 style="text-align: center;color: black;margin:5% 0%">Liste des catégories</h1>
<ul class="list-group" style>
<?php
foreach($categories as $category ){ ?>
    <li class="list-group-item" style=" text-align:center;"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>" style="text-decoration:none;color:black;font-size:2.5vw"><?= $category->getName() ?></a><br>
        
    </li>
    
<?php } ?>
</ul>



  
