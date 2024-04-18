<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>FORUM</title>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light" style="justify-content:center">
                        <div class="container" style="margin:0%" >
                            <a class="navbar-brand" href="#">
                            <h3 class="my-0 mr-md-auto font-weight-normal" style="color: rgb(0,0,0); font-weight: 700;text-decoration:none"><a href="index.php?home"style="color: rgb(0,0,0); font-weight: 700;text-decoration:none;margin-right:10%">FORUM</h3>
                            </a>
                            <button class="d-lg-none navbar-burger btn px-0 rounded-pill" style="border: none;" type="button">
                                <svg class="text-dark" width="51" height="51" viewbox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="28" fill="currentColor"></rect>
                                <path d="M37 32H19M37 24H19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav w-100 me-4">
                                    <li class="nav-item me-4"><a class="nav-link" href="index.php?ctrl=forum&action=listCategories">Liste des catégories</a></li>
                                    <li class="nav-item me-4"><a class="nav-link" href="index.php?ctrl=forum&action=listTopics">Liste des topics</a></li>
                                    <?php
                                    if(App\Session::isAdmin()){
                                    ?>
                                    <li class="nav-item "><a class="nav-link" href="index.php?ctrl=forum&action=listUsers">Voir la liste des gens</a>
                                     <?php } ?>
                                     <?php
                                    // si l'utilisateur est connecté 
                                    if(App\Session::getUser()){
                                    ?>
                                    <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
                                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                    <?php
                                    } else {
                                        ?>
                                </ul>
                                <li class="nav-item" style="list-style-type: none;"><a class="nav-link" href="index.php?ctrl=security&action=login">Connexion</a></li>
                                <div class="flex-shrink-0" style="margin-left:5%"><a class="btn btn-dark py-3" style="background-color: rgb(0,0,0)" href="index.php?ctrl=security&action=register">Inscription</a></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </nav>
                    <div class="d-none navbar-menu position-fixed top-0 start-0 bottom-0 w-75 mw-xs" style="z-index: 9999;">
                        <div class="navbar-close navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-dark" style="opacity: 75%;"></div>
                            <nav class="position-relative h-100 w-100 d-flex flex-column justify-content-between py-8 px-8 bg-white overflow-auto">
                                <div class="d-flex align-items-center">
                                    <a class="me-auto h4 mb-0 text-decoration-none" href="#">
                                    <img class="img-fluid" src="../public/img/logo.png" alt="">
                                    </a>
                                    <a class="navbar-close" href="#">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 18L18 6M6 6L18 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    </a>
                                </div>
                            <div class="py-12">
                                <ul class="nav flex-column">
                                    <li class="nav-item me-4"><a class="nav-link" href="index.php?ctrl=forum&action=listCategories">Liste des catégories</a></li>
                                    <li class="nav-item me-4"><a class="nav-link" href="index.php?ctrl=forum&action=listTopics">Liste des topics</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=security&action=login">Connexion</a></li>
                                    <?php
                                    if(App\Session::isAdmin()){
                                    ?>
                                    <a href="index.php?ctrl=forum&action=listUsers">Voir la liste des gens</a>
                                     <?php } ?>
                                     <?php
                                    // si l'utilisateur est connecté 
                                    if(App\Session::getUser()){
                                    ?>
                                    <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
                                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                    <?php
                                    } else {
                                        ?>
                                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=security&action=login">Connexion</a></li>
                                </ul>
                                <div class="flex-shrink-0"><a class="btn btn-dark py-3" style="background-color: rgb(0,0,0)" href="index.php?ctrl=security&action=register">Inscription</a></div>
                                <?php
                                }
                                ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
                
                <main id="forum" style="height:85vh">
                    <?= $page ?>
                </main>
            </div>
            <footer class="blog-footer" style="display:flex;justify-content:center;height:2vh">
                <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>