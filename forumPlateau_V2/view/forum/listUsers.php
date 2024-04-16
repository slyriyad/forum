<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des utilisateurs</h1>
<ul class="list-group">
<?php
foreach($users as $user ){ ?>
    <li class="list-group-item"><p><?= $user->getNickName() ?></p>
        
    </li>
<?php }


  
