
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription gp</title>
    <link rel="stylesheet" href="style/style_home_gp.css"> 
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    
</head>
<body style=" background: -webkit-linear-gradient(left, #ff7300, #ffc800);">
    <?php include "menu.php"; ?>
<?php
//Appel du fichier de connexion
require_once('connexion_db/conn_db.php');
//DÃ©finition de la requÃªte
$sql_soc="select * from gp ";
//ExÃ©cution de la requÃªte
$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));
?>

<form method="post" action="ajout_gp.php">   
<div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                            <h3>Bienvenue</h3>
                            <p>Inscrivez vous en temps que GP et postez des offres sur le site</p>
                            <input type="submit" name="" value="S'INSCRIRE"/><br/>
                        </div>
                        <div class="col-md-9 register-right">
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="form_inscription_user.php" role="tab" aria-controls="home" aria-selected="true">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="" role="tab" aria-controls="profile" aria-selected="false">GP</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Inscription GP</h3>
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="text" class="form-control" required placeholder="Entrer votre prenom *" placeholder="Entrer votre" name="prenom">
                                            </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" required placeholder="Entrer votre nom *" placeholder="Entrer votre" name="nom">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"  name="mdp" required placeholder="Mot de passe *" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="mdp" required  placeholder="Confirmer Mot de passe *" value="" />
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" required placeholder="votre Email *" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="tel"  name="numtel_gp" class="form-control" required placeholder="votre numero *" value="" />
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
</div>  

</form>
</body>
</html>
