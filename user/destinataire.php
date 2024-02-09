<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>
<?php include "menu.php"; ?>

<?php

//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
$email_client=$_SESSION['login'];
//Définition de la requête de sélection
$sql_part="select * from destinataire natural join annonces natural join gp natural join colis where email_client='$email_client'";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des annonces</title>
     <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->

        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../style/style_user.css">  
</head>
<body>

<div style="display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center; background-color: rgba(255, 255, 255, 0.8);
  color: #007bff;">

<table id='annonces'>
 <h1>Destinataires</h1>
</table>

<?php
    while($part=mysqli_fetch_array($query_part)){//Tant qu'on extrait des lignes sous forme de tableau associatif
        extract($part);
        echo"
        
        <table id='annonces'>
    <caption>destinataire</caption>
    <tr>
    <th>pays destination</th>
        <th>Numero identification national</th>
        <th>nom</th>
        <th>prenom</th>
        <th>civilite</th>
        <th>adresse</th>
        <th>numero destinataire</th>
    </tr> 
    <tr>
    <td>$pays_dest</td>
    <td>$NIN</td>
    <td>$nom_dest</td>
    <td>$prenom_dest</td>
    <td>$civilite</td>
    <td>$adresse</td>
    <td>$numero_dest</td>
    </tr>
    <tr>
        <th>nombre de kg a transporter</th>
        <th>id gp</th>
        <th>nom gp</th>
        <th>prenom gp</th>
        <th>numero gp </th>
        <th>e_mail gp</th>
        <th>supprimer</th>
    </tr> 
    <tr>
        <td>$nombre_kg_trans</td>
        <td>$id_gp</td>
        <td>$nom</td>
        <td>$prenom</td>
        <td>$numtel_gp</td>
        <td>$email_gp</td>
        <td><a href='supp_destinataire.php?id0=$NIN&id1=$id_dest&id2='$nombre_kg_trans&id3='$id_colis''><button>supprimer</button></a></td>
        </tr></table>";
    }
    ?>

</div>

</body>
</html>