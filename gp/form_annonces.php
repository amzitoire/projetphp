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
//Définition de la requête
$sql_soc="select * from annonces natural join gp ";
//Exécution de la requête
$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="../style/style_gp.css">
    
     <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->

        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    
    <title>creer annonce</title>
</head>
<body>
    <div class="content" style="display: flex; justify-content: center;
    flex-direction: row; width: 100%;" >
    <div style="display: block; width: 50%;" >

        <form method="post" action="ajout_annonces.php">
            <h1>Creer annonce  </h1>
            <div class="field">
                <label><h3>pays destination</h3></label>
                <input type="text"  required  placeholder="Entrer le pays de destination" name="pays_dest">
            </div>
            <div class="field">
                <label><h3>lieu depart</h3></label>
                <input type="text"  required  placeholder="Entrer la ville de depart " name="lieu_depart">
            </div>
            <div class="field">
                <label><h3>lieu d'arrivee</h3></label>
                <input type="text"  required  placeholder="Entrer la ville d'arrive " name="lieu_arrive">
            </div>
            <div class="field">
                <label><h3>date cloture</h3></label>
                <input type="date" id="cloture" required value=""  placeholder="Entrer " name="date_cloture">
            </div>
            <div class="field">
                <label><h3>date depart</h3></label>
                <input type="date" id="depart" required value=""  placeholder="Entrer la date de depart" name="date_depart" >
            </div>
            <div class="field">
                <label><h3>date d'arrivee</h3></label>
                <input type="date" id="arrive" required value=""  placeholder="Entrer " name="date_arrive">
            </div>
            
            <div class="field">
                <label><h3>nombre de kg</h3></label>
                <input type="number"  required  placeholder="Entrer le nombre de kilos disponible " name="nombre_kg">
            </div>
            <div class="field">
                <label><h3>prix par kg (Franc cfa)</h3></label>
                <input type="number"  required  placeholder="Entrer le prix par kg  " name="prix_kg">
            </div>
            <div class="field">
                <label><h3>transport</h3></label>
                <input type="text"  required  placeholder="Entrer le transport utilisé " name="transport">
            </div>
            

            
            <div>
                <input id="bouton" type="submit" name="ajouter annonce">
            </div>
        </form>
    </div> 
</div>
<script>

    // Use Javascript
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("cloture").setAttribute("min", today);
var cloture = document.getElementById("cloture").value;
document.getElementById("depart").setAttribute("min", today);
var arrive=  document.getElementById("depart").value;
document.getElementById("arrive").setAttribute("min", today);
</script>
</body>
</html>

