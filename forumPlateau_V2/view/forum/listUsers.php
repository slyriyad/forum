<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des utilisateurs</h1>

<?php
foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByUser&id=<?= $user->getId() ?>"><?= $user->getNickName() ?></a></p>
<?php }


  
