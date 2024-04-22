<?php if(App\Session::getUser()){ ?>
<div style="display:flex;flex-direction:column;height:80vh;justify-content: space-evenly">
    <h1 style="text-align: center;color:black;font-size:5vw">BIENVENUE SUR LE FORUM <br><?= App\Session::getUser()?></h1>
    <p style="text-align: center;">Bienvenue dans notre communauté dynamique, où chaque voix compte et chaque idée trouve sa place. Rejoignez-nous pour des discussions passionnantes, des échanges enrichissants et une expérience inoubliable !</p>

    <div style="display:flex;flex-direction:row;justify-content: center;align-items:center">
        <li class="nav-item" style="list-style-type: none;"><a class="nav-link" href="index.php?ctrl=security&action=login">Connexion</a></li>
        <div class="flex-shrink-0" style="margin-left:5%"><a class="btn btn-dark py-3" style="background-color: rgb(0,0,0)" href="index.php?ctrl=security&action=register">Inscription</a></div>
    </div>
</div>

<?php } else {?>
<div style="display:flex;flex-direction:column;height:80vh;justify-content: space-evenly">
    <h1 style="text-align: center;color:black;font-size:5vw">BIENVENUE SUR LE FORUM</h1>
    <p style="text-align: center;">Bienvenue dans notre communauté dynamique, où chaque voix compte et chaque idée trouve sa place. Rejoignez-nous pour des discussions passionnantes, des échanges enrichissants et une expérience inoubliable !</p>

    <div style="display:flex;flex-direction:row;justify-content: center;align-items:center">
        <li class="nav-item" style="list-style-type: none;"><a class="nav-link" href="index.php?ctrl=security&action=login">Connexion</a></li>
        <div class="flex-shrink-0" style="margin-left:5%"><a class="btn btn-dark py-3" style="background-color: rgb(0,0,0)" href="index.php?ctrl=security&action=register">Inscription</a></div>
</div>
</div>
<?php } ?>