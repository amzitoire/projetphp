<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');
//Définition de la requête
$sql_soc="select * from annonces";
//Exécution de la requête
$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));

$id1=$_SESSION['login1'];
$id_annonce=$_GET['id0'];


$part="select id_gp from gp where email_gp='$id1' ";
$query_part=mysqli_query($conn,$part) or die(mysqli_error($conn));
 //exploitation des données
 $soc=mysqli_fetch_assoc($query_part);


//Récupération de l'id par GET
$id=$soc["id_gp"];
//Définition  et exécution de la requête de sélection
$sql_fiche="select * from annonces where id_gp='$id' and id_annonce='$id_annonce'";
$query_fiche=mysqli_query($conn,$sql_fiche) or die(mysqli_error($conn));
//Extraction de l'enregistrement
$fiche=mysqli_fetch_array($query_fiche);
extract($fiche);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire d'annonces</title>
    
    
    <link rel="stylesheet" href="../style/style_gp.css">

 <!-- Favicon-->
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->

        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="content" style="display: flex; justify-content: center;
    flex-direction: row; width: 100%;" >
<div style="display: block; width: 50%;" >
    
<form method="post" action="modif_annonces.php">
    <h2>Formulaire d'annonces</h2>
    <div class="field">
        <label>pays destination</label>
        <input type="text" name="pays_dest" value="<?php echo $pays_dest ?>" >
    </div>
    <div class="field">
        <label>lieu depart</label>
        <input type="text" name="lieu_depart" value="<?php echo $lieu_depart ?>">
    </div>
    <div class="field">
        <label>lieu d'arrivee</label>
        <input type="text" name="lieu_arrive" value="<?php echo $lieu_arrive ?>">
    </div>
    <div class="field">
        <label>date depart</label>
        <input type="date" name="date_depart" value="<?php echo $date_depart ?>">
    </div>
    <div class="field">
        <label>date d'arrivee</label>
        <input type="date" name="date_arrive" value="<?php echo $date_arrive ?>">
    </div>
    <div class="field">
        <label>date cloture</label>
        <input type="date" name="date_cloture" value="<?php echo $date_cloture ?>">
    </div>
    <div class="field">
        <label>nombre de kg</label>
        <input type="number" name="nombre_kg" value="<?php echo $nombre_kg ?>">
    </div>
    <div class="field">
        <label>prix par kg</label>
        <input type="number" name="prix_kg" value="<?php echo $prix_kg ?>">
    </div>
    <div class="field">
        <label>transport</label>
        <input type="text" name="transport" value="<?php echo $transport ?>">
    </div>
        
    
    <div class="field">
    <input type="hidden" name="id_annonce" value="<?php echo $id_annonce ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input id="bouton" type="submit" name="bModif" value="Modifier">
    </div>
</form>
<a href="annonces.php"><button id="annuler"> annuler</button></a>


</div>

</div>


</body>
</html>