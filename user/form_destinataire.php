<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>

<?php include "menu.php"; ?>

<?php
//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');
$id_gp=$_GET['id0'];
$id_annonce=$_GET['id1'];
//Définition de la requête
//$sql_soc="select * from  destinataire where id_gp= $id_gp";
//Exécution de la requête
//$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));


$part="select nombre_kg from annonces where id_gp= $id_gp ";
$query_part=mysqli_query($conn,$part) or die(mysqli_error($conn));
 //exploitation des données
 $soc=mysqli_fetch_assoc($query_part);
 $nombre_kg=$soc['nombre_kg'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->

        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../style/style_user.css">
    <title>postuler</title>
</head>
<body>

<div class="content" style="display: flex; justify-content: center;
    flex-direction: row; width: 100%;" >
    <div style="display: block; width: 50%;" >

<form method="post" action="ajout_colis.php?id0=<?php echo $id_gp ?>&id1=<?php echo $id_annonce ?>">
    <h2>Information du destinataire et du colis  </h2>
    <div class="field">
        <label><h3>Numero de carte d'identite :</h3></label>
        <input type="text" required placeholder="Entrer le Numero de carte d'identite " name="nin">
    </div>
    <div class="field">
        <label><h3>Nom :</h3></label>
        <input type="text" required placeholder="Entrer son nom" name="nom">
    </div>
    <div class="field">
        <label><h3>Prenom :</h3></label>
        <input type="text" required placeholder="Entrer son prenom" name="prenom">
    </div>
    <div class="field">
        <label><h3>Civilite :</h3></label>
        <select required placeholder="choisir s
        la civilite" name="civilite">
            <option value="Monsieur">Monsieur</option>
            <option value="Madame">Madame</option>
        </select>   
    </div>
    <div class="field">
        <label><h3>Adresse du destinataire :</h3></label>
        <input type="text" required placeholder="Entrer l'adresse du destinataire" name="adresse">
    </div>
    <div class="field">
        <label><h3>numero du destinataire :</h3></label>
        <input type="text" required placeholder="Entrer le numero du destinataire" name="numero">
    </div>
    <div class="field">
    <input type="number" hidden disabled required placeholder="Entrer votre" name="id_annonce" value="<?php echo $id_annonce ?>">
        <input type="number" hidden disabled required placeholder="Entrer votre" name="id_gp" value="<?php echo $id_gp ?>">
    </div>
    <div class="field">
    <label><h3>le nombre de kg disponible est de <?php echo $nombre_kg ?> </h3> </label>
    </div>
    <div class="field">
        <label><h3> Veuillez renseigner le nombre de kg a transporter :</h3></label>
        <input type="number" required placeholder="Entrer le poid du colis" name="nombre_kg_trans" max="<?php echo $nombre_kg ?>">
    </div>
    <div>
        <input id="bouton" class="ajout" type="submit" required placeholder="Entrer votre" name="ajouter destinataire" value="Ajouter destinataire">
    </div>
</form>
</div>

</div>

</body>
</html>



