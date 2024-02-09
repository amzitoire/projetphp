<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas �t� cr�ee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');
//R�cup�ration des donn�es par la m�thode POST
$id_annonce=$_POST['id_annonce'];
$pays_dest=$_POST['pays_dest'];
$lieu_depart=$_POST['lieu_depart'];
$lieu_arrive=$_POST['lieu_arrive'];
$date_depart=$_POST['date_depart'];
$date_arrive=$_POST['date_arrive'];
$date_cloture=$_POST['date_cloture'];
$nombre_kg=$_POST['nombre_kg'];
$prix_kg=$_POST['prix_kg'];
$transport=$_POST['transport'];
$id=$_POST['id'];
//D�finition de la requ�te de modification
$sql_update="update annonces set 
pays_dest='$pays_dest',
lieu_depart='$lieu_depart',
lieu_arrive='$lieu_arrive',
date_depart='$date_depart',
date_arrive='$date_arrive',
date_cloture='$date_cloture',
nombre_kg='$nombre_kg',
prix_kg='$prix_kg',
transport='$transport'
where id_gp= $id and id_annonce= $id_annonce ";
//Ex�cution de la requ�te
$query_update=mysqli_query($conn,$sql_update) or die(mysqli_error($conn));
header("location:annonces.php");
exit();
?>
