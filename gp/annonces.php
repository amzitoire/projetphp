<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>






<?php
$id=$_SESSION['login1'];
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from annonces natural join gp where email_gp='$id' ";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des annonces</title>
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
<?php include "menu.php"; ?>

<div style="display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;  background-color: rgba(33, 37, 41, 0.8);
  color: #ffc800;">

<table id='annonces'>
<h1>Annonces</h1>
</table>


    <?php
    while($part=mysqli_fetch_array($query_part)){//Tant qu'on extrait des lignes sous forme de tableau associatif
        extract($part);
        echo"
        
        <table  id='annonces'>
    <caption>mon annonce</caption>
    <tr>
        <th>numero annonce</th>
        <th>pays destination</th>
        <th>lieu depart</th>
        <th>lieu d'arrivee</th>
        <th>date depart</th>
        <th>date d'arrive</th>
        <th>date cloture </th>
       
    </tr>
    <tr>
    <td>$id_annonce</td>
        <td>$pays_dest</td>
        <td>$lieu_depart</td>
        <td>$lieu_arrive</td>
        <td>$date_depart</td>
        <td>$date_arrive</td>
        <td>$date_cloture</td>
        
    </tr>
     <tr>
    <th>nombre kg </th>
        <th>prix kg </th>
        <th>transport</th>
        <th>numero gp </th>
        <th>e_mail gp</th>
        <th>modifier </th>
        <th>supprimer</th>
    </tr>
    <tr>
        <td>$nombre_kg</td>
        <td>$prix_kg</td>
        <td>$transport</td>
        <td>$numtel_gp</td>
        <td>$email_gp</td>
        <td><a href='fiche_annonces.php?id0=$id_annonce'> <button>modifier</button></a></td>
        <td><a href='fiche_annonces_supp.php?id0=$id_annonce'> <button>supprimer</button></a></td>
    </tr>
        </table>";
    }
    ?>
  
</div>

</body>
</html>