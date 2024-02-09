<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>
<?php include "menu.php"; ?>

<?php

//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');

$id=$_SESSION['login1'];
$part="select id_gp from gp where email_gp='$id' ";
$query_part=mysqli_query($conn,$part) or die(mysqli_error($conn));
 //exploitation des données
 $soc=mysqli_fetch_assoc($query_part);


//Récupération des données par post
$pays_dest=$_POST['pays_dest'];
$lieu_depart=$_POST['lieu_depart'];
$lieu_arrive=$_POST['lieu_arrive'];
$date_depart=$_POST['date_depart'];
$date_arrive=$_POST['date_arrive'];
$date_cloture=$_POST['date_cloture'];
$nombre_kg=$_POST['nombre_kg'];
$prix_kg=$_POST['prix_kg'];
$transport=$_POST['transport'];
$id_gp=$soc["id_gp"];
//Définition de la requête d'insertion
$sql_ajout="insert into annonces values(null,
'$pays_dest',
'$lieu_depart',
'$lieu_arrive',
'$date_depart',
'$date_arrive',
'$date_cloture',
'$nombre_kg',
'$prix_kg',
'$transport',
'$id_gp')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
header("location:annonces.php");
?>

