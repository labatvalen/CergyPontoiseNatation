<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--  Commandes pour ouvrir : -->
<!--  php -S localhost:8080   -->
<!--  http://localhost:8080/  -->


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<link >
    <title> Connexion </title>
</head>
    
<body class="font-weight-light" style="overflow:hidden">
    
    
<!--    Fond d'ecran de la page de connexion  -->
    <img class="wallpaper_connexion" src="Contents/piscine2.jpg" alt="wallpaper">
    
    
    <div id="background-wrap">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div>
        <div class="bubble x8"></div>
        <div class="bubble x9"></div>
        <div class="bubble x10"></div>
    </div>
    
   
<!--    Placer la card de connexion a un endroit sur la page  -->
    <!--<div class="situation_card">-->
    
    
<!--    Placer la card de connexion a un endroit sur la page  -->
    <div class="row situation_card">    
<!--        card en bootstrap  -->
        <div class="col-3">
        <div class="card" style="width: 18rem;">
<!--            image dans la card  -->
            <img src="Contents/Club.png" class="card-img-top" alt="Image du club" style="width: 285px;height:130px; border-radius: 4px">
<!--            contenu de la card  -->
            <div class="card-body">
                <h5 class="card-title">VEUILLEZ VOUS CONNECTER !</h5>
                
                <form action="connexion.php" method="post">
                    <div class="form-group">
                        <label for="inputLogin">Nom d'utilisateur</label>
                        
                        <input type="text" name="login" class="form-control" id="inputLogin" aria-describedby="emailHelp" placeholder="Entrer login" required>
                        
                        <small id="emailHelp" class="form-text text-muted">Ne partagez jamais votre login avec un autre utilisateur.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot
                            de passe</label>
                        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Entrer mdp" required>
                    </div>
                    <!--  Bouton pour afficher le mdp
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    -->
                    
<!--                    Bouton pour valider -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
          
        <div class="col-8">
        <h1 class="ml15">
            <span class="word">Bienvenue</span>
            <span class="word">sur Cergy-Pontoise Natation</span>
        </h1>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script type="text/javascript">

            anime.timeline({loop: true})
                .add({targets: '.ml15 .word',
                      scale: [14,1],
                      opacity: [0,1],
                      easing: "easeOutCirc",
                      duration: 800,
                      delay: (el, i) => 800 * i
                     }).add({
                targets: '.ml15',
                opacity: 0,
                duration: 1000000,
                easing: "easeOutExpo",
                delay: 1000
            }); 
        </script>
        </div>
    </div>
<!--    Logo de l'eisti -->
    <div>
        <img src="Contents/logo.png" class="imglogo" alt="Logo de l'Eisti">
    </div>
    
</body>
</html>