<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
$id_annonce=$_POST['id_annonce'];
//Définition de la requête de suppression
$sql_supprim="delete from annonces where id_annonce='$id_annonce'";
//Exécution de la requête
$query_supprim=mysqli_query($conn,$sql_supprim) or die(mysqli_error($conn));
//Redirection
header("location:annonces.php");
?>