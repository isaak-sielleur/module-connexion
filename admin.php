   <?php
            session_start();
            $connexion=mysqli_connect("localhost","root", "","moduleconnexion");

            $requete= "SELECT * FROM utilisateurs";

            $query= mysqli_query($connexion,$requete);

            $resulat=mysqli_fetch_all($query, MYSQLI_ASSOC);


            ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page administrateur</title>
        <link rel="stylesheet" href="module.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
    </head>

    <body class="bodyadmin">
 
           <section class="flexadmin">
            
           <?php
           if ($_SESSION['login'] !="admin")
           {
             echo "Vous ne pouvez pas voir le contenu de cet page";
           }
           else{
          ?>
                   <table class="tableadmin">
                        <thead>
                             <tr id="tradmin">
                                <th>id</th>
                                <th>login</th>
                                <th>prenom</th>
                                <th>nom</th>
                                <th>password</th>            
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach($resulat as $utilisateurs){ ?>
                            
                           <tr class="tradmin">
                                <td> &nbsp;<?php echo $utilisateurs["id"]; ?></td>
                                <td> &nbsp;<?php echo $utilisateurs["login"]; ?></td>
                                <td> &nbsp;<?php echo $utilisateurs["prenom"]; ?> </td>
                                <td> &nbsp;<?php echo $utilisateurs["nom"]; ?></td>
                                <td> &nbsp;<?php echo $utilisateurs["password"]; ?></td>
                            </tr>
                            
                            <?php } ?>
                       </tbody>
                    
                        </table>
           <?php } ?>
            
            </section>
            <label class="fab" id="fabad">

                <input type="checkbox">

                <div class="fab-menu">

                <div class="fab-btn">+</div>

                    <ul>
                        <li tooltip="Profil"><a href="profil.php"><button>Profil</button></a></li>
                        <li tooltip="Administration"><a href="admin.php" target="_blank"><button>Administration</button></a></li>
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