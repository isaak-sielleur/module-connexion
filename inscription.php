<!DOCTYPE html>
<html>

  <head>

      <link rel="stylesheet" type="text/css" href="module.css">
      <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Yanone+Kaffeesatz&display=swap" rel="stylesheet">
      <title>Présentation</title>
      <link rel="icon" type="png" href="images/logo.png">
      <meta charset="UTF-8">
  
  </head>

  <header class="headaccueil">

  </header>

  <body class="backaccueil">

  <main>


  </main>

  <section>
        <div class="body-content">

            <div class="module">

                <h1 class="h1inscri">Créer un compte</h1>

                <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">;

                    <div class="alert alert-error"></div>
                    <input class="inputinscri" type="text" placeholder="Utilisateur" name="login" required />

                    <input class="inputinscri" type="text" placeholder="Prenom" name="prenom" required />

                    <input class="inputinscri" type="text" placeholder="Nom" name="name" required />

                    <input class="inputinscri" type="password" placeholder="Mot de passe" name="password" autocomplete="new-password" required />

                    <input class="inputinscri" type="password" placeholder="Confirmer le mot de passe" name="confirmpassword" autocomplete="new-password" required />

                    <input class="inputinscri" type="submit" value="Register" name="register" class="btn btn-block btn-primary"/>

                </form>
                <?php

                    if (isset($_POST['register'])) {

                        $login= $_POST ['login'];
                        $prenom= $_POST ['prenom'];
                        $nom= $_POST ['name'];
                        $password= $_POST ['password'];
                        
                        $link= mysqli_connect("127.0.0.1", "root", "", "moduleconnexion");
                        $query= mysqli_query($link, "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')");

                        header ('location: connexion.php');
                        
                    }
    
            ?>
            </div>
            </div>

  </section>
    <label class="fab">

						<input type="checkbox">

						<div class="fab-menu">

						<div class="fab-btn">+</div>

						<ul>
                        <li tooltipe="Connexion"><a href="inscription.php" target="_blank"><button>Connexion</button></a></li>
                        <li tooltip="Deconnexion"><a href="deconnexion.php" target="_blank"><button>Deconnexion</button></a></li>
                        <?php
                            if(isset($_POST['deconnexion']))
                        {

                            echo "On vous deconnecte";
                            session_unset();

                        }
                        ?>
                        </ul>
                        </div>

                        <div class="fab-blank"></div>

    </label> 



  </body>

  </html>
