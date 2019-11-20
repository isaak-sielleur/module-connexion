<<<<<<< HEAD









<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page de connexion</title>
    <link rel='stylesheet' type='text/css' href='module.css'>
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>
<body class="bodyconnexion">
    <h1>Connexion</h1>
    <form class="formconnexion" method="post">
        <input class="inputconnexion" type="text" name="login" placeholder="login"/>
        <br/>
        <br/>
        
        <input class="inputconnexion" type="password" name="password" placeholder="password">
        <br/>
        <br/>
        <input id="connexion" type="submit" name="submit" value="Connexion"/>
        <br/>
    </form>
    <?php
    session_start();
    if (isset($_POST['submit']))
		
		{
			$login= $_POST['login'];
			$password = $_POST['password'];
		
		if ($login && $password)
		{
			$connexion = mysqli_connect('localhost','root','', 'moduleconnexion') or die ('Error');
			$requete= "SELECT * FROM utilisateurs WHERE login='".$login."'";
			$query = mysqli_query ($connexion, $requete);
			$rows= mysqli_fetch_assoc($query);
			
			if ($login == $rows['login'])
			{
				
				if ($password == $rows['password'])
				{
					$_SESSION['login']=$login;
					$_SESSION['password']=$password;
					header('location: profil.php');
					
				} else echo 'mot de passe incorrect';
				
				
				
			}else echo "<p>Login ou Mot de passe incorrect</p>";
		
		} else echo "<p>Veuillez saisir tous les champs</p>";
	
		}
	?>

			<label class="fab">

						<input type="checkbox">

						<div class="fab-menu">

						<div class="fab-btn">+</div>

						<ul>

						
						<li tooltipe="Inscription"><a href="inscription.php" target="_blank"><button>Inscription</button></a></li>
						
						
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










