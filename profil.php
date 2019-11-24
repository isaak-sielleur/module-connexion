<?php
session_start();

$connexion = mysqli_connect("localhost","root", "","moduleconnexion");

$requete= "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$query= mysqli_query($connexion,$requete);
$data = mysqli_fetch_assoc($query);
?>

<html>
    <head>
    <meta charset="utf-8">
        <title>Page de profil</title>
        <link rel="stylesheet" href="module.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
    </head>
    <body class="bodyprofil">
        <section>
                <h1 class="h1profil ">Profil</h1>
               
                <form class="formprofil" method="post" >

                <div class="alert alert-error"></div>
                
                    <input style="color:black" class="inputprofil" type="text" name="login" placeholder="login" value="<?php echo $data['login']; ?>" required>
                    <br/>
                    
                    <input style="color:black" class="inputprofil"  type="text" name="prenom"  placeholder="prenom" value="<?php echo $data['prenom']; ?>" required>
                    <br/>

                    <input style="color:black" class="inputprofil"  type="text" name="nom" placeholder="nom" value="<?php echo $data['nom']; ?>" required>
                    <br/>
                    
                    <input style="color:black" class="inputprofil"  type="password" name="password" placeholder="password" value="<?php echo $data['password']; ?>" required>
                    <br/>
                    
                    <input id="valider" name="submit" type="submit" value="Valider">
                    
                </form>

                    <?php
                

                     if (isset($_POST['submit']))
                    {
                        $pass = $_POST['password'];
                        $nomdefamille = $_POST['nom'];
                        $monprenom = $_POST['prenom'];
                        $login = $_POST['login'];
                     //requete update sql
                    $sql = "UPDATE utilisateurs SET prenom = '$monprenom', login = '$login', nom = '$nomdefamille', password = '$pass' WHERE login = '".$_SESSION['login']."'";
                     mysqli_query($connexion, $sql);
                     $_SESSION['login'] = $login;
                     header("Refresh:0");
                    }
                    ?>
        
        </section>

        <label class="fab">

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