<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
$NIN=$_GET['id0'];
$id_dest=$_GET['id1'];
$nombre_kg_trans=$_GET['id2'];
$id_colis=$_GET['id3'];
$sql_supprim1="delete  from colis where NIN='$NIN' ";
//Exécution de la requête
$query_supprim1=mysqli_query($conn,$sql_supprim1) or die(mysqli_error($conn));
//Définition de la requête de suppression
$sql_supprim="delete  from destinataire where NIN='$NIN' and id_dest='$id_dest'";
//Exécution de la requête
$query_supprim=mysqli_query($conn,$sql_supprim) or die(mysqli_error($conn));



//Redirection
header("location:destinataire.php");
?>