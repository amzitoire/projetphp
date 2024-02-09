<?php
session_start();
if(!isset($_SESSION['login1'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
?>

<?php
$id1=$_SESSION['login1'];
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from destinataire natural join gp natural join annonces natural join colis where email_gp='$id1' ";
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
 <h1>Destinataires</h1>
</table>
    
    
    <?php
    while($part=mysqli_fetch_array($query_part)){//Tant qu'on extrait des lignes sous forme de tableau associatif
        extract($part);
        echo"
    <table id='annonces'>
        <caption>Destinataire</caption>
        <tr>
        <th>Numero identification national</th>
        <th>pays de destination</th>
        <th>nom</th>
        <th>prenom</th>
        <th>civilite</th>
        </tr>
        <tr>
        <td>$NIN</td>
        <td>$pays_dest</td>
        <td>$nom_dest</td>
        <td>$prenom_dest</td>
        <td>$civilite</td>
       
        </tr>
        <tr> 
        <th>numero destinataire</th>
         <th>adresse</th>
         <th>id annonce</th>
        <th>nombre kg a transporter</th>
        <th>Accepter</th>
         <th>Refuser</th>
        </tr>
        <tr> 
        <td>$numero_dest</td>
        <td>$adresse</td>
        <td>$id_annonce</td>
        <td>$nombre_kg_trans</td>

        
        <td><a href='mailto:$email_client?subject=annonce&body=bonjour votre colis pour $civilite $nom_dest $prenom_dest a ete accepter veuillez choisir un lieu de rendez vous cordialement' ><button>Accepter</button></a></td>
        <td><a href='supp_destinataire.php?id0=$NIN&id1=$id_dest&id2=$nombre_kg_trans'><button>refuser</button></a></td>
        </tr>
    </table>";
    }
    ?>
    <a href="mailto:"></a>

  <form action=""></form>
</div>
</body>
</html>