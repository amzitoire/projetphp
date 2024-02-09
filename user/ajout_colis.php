<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>
<?php

//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');
$email_client=$_SESSION['login'];
//Récupération des données par post
$nin=$_POST['nin'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$civilite=$_POST['civilite'];
$adresse=$_POST['adresse'];
$numero_dest=$_POST['numero'];
$nombre_kg_trans=$_POST['nombre_kg_trans'];
$id_gp=$_GET['id0'];
$id_annonce=$_GET['id1'];
//Définition de la requête d'insertion
$sql_ajout="insert into colis values(null,
'$nombre_kg_trans','$nin')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));

$part="select id_colis from colis where NIN=$nin and nombre_kg_trans=$nombre_kg_trans ";
$query_part=mysqli_query($conn,$part) or die(mysqli_error($conn));
 //exploitation des données
 $soc=mysqli_fetch_assoc($query_part);
 $id_colis=$soc["id_colis"];

 //$sql_ajout="insert into transporter values('$id_gp','$id_colis')";
//Exécution de la requête
//$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));

$sql_ajout="insert into destinataire values(null,'$nin','$nom','$prenom','$civilite','$adresse','$numero_dest',
'$id_gp','$id_annonce','$email_client')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
header("location:destinataire.php");
?>

