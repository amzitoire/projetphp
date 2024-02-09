<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
$NIN=$_GET['id0'];
$id_dest=$_GET['id1'];
$nombre_kg_trans=$_GET['id2'];
//Définition de la requête de suppression
$sql_supprim="delete from destinataire where NIN='$NIN' and id_annonce='$id_dest'";
$query_supprim=mysqli_query($conn,$sql_supprim) or die(mysqli_error($conn));
$sql_supprim="delete from colis where NIN='$NIN' and nombre_kg_trans='$nombre_kg_trans'";
//Exécution de la requête
$query_supprim=mysqli_query($conn,$sql_supprim) or die(mysqli_error($conn));
//Redirection

//Redirection
header("location:destinataire.php");
?>
bonjour je suis vicky la reine matayyyyyyyyyyyyyy