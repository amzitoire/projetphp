<?php
session_start();
if(isset($_SESSION['login'])){//Si la variable session a �t� cr�ee
    header("location:annonces.php");
    exit();
}
if(isset($_POST['Bconnexion'])){//SI on clique sur le bouton connexion
    //Appel du fichier de connexion � la bd
    require_once('../connexion_db/conn_db.php');
    //R�cup�ration des donn�es par la m�thode POST
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    //D�finition de la requ�te de selection
    $sql_auth="select count(*) nbl from client where email_client='$login' and mdp='$mdp'";
    $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
    $auth=mysqli_fetch_object($query_auth);
    if($auth->nbl==1){//Si l'authentification est correcte
        //Cr�ation d'une variable session
        $_SESSION['login']=$login;
        header("location:annonces.php");
        exit();
    }else
    {
       header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion  gp</title>
    <link rel="stylesheet" href="../style/style_user.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<ul>
    <li class="menu_con" style="float: left;"><a href="../index.php">Accueil</a></li>
    
    <li class="menu_con" style="float: right;"><a href="../form_inscription_user.php">inscription client</a></li>
    <li class="menu_con" style="float: right;"><a href="../form_inscription_gp.php">inscription gp</a>
</li><li class="menu_con" style="float: right;"><a href="../gp/index.php">je suis gp</a></li>
</ul>

<div class="container">

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
    <h2>Authentification client</h2>
    <label for="email2" class="mb-2 mr-sm-2">login Email:</label>
    <input type="text" class="form-control mb-2 mr-sm-2" id="email2" placeholder="Entrer email"  name="login">
    <label for="pwd2" class="mb-2 mr-sm-2">Mot de passe:</label>
    <input type="password" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="Entrer Mot de passe" name="mdp">
     
    <button  id="bouton" type="submit" name="Bconnexion" value="Connexion" class="btn btn-primary mb-2">connexion</button>

    <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
  </form>
</div>
</body>
</html>