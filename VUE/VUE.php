<?php
	include('BO\BO_info_cadeaux.php');
  include('BO/BO_owner_reservation.php');
	use infoCadeauxBO as infoCadeauxBO;
  use ownerReservationBO as ownerReservationBO;


?>
<html>

	<head>
		<title>Liste cadeau de noël</title>
	</head>

	<body style="font-family: 'Arial', sans-serif;font-size: 16px;color: #333;background-color: #fff;	line-height: 1.6;">
	<div>
			<h1 style=' margin: 10px;border: 2px solid #000; padding: 10px;display: inline-block; '>Bienvenue sur la plateforme de gestion de liste de cadeau pour noël</h1>
<br><br>



<script>

function Affiche(id)
{

 if (document.getElementById(id).style.display == 'none')  {

	document.getElementById(id).style.display = 'block';

	} else if(document.getElementById(id).style.display == 'block') {

	document.getElementById(id).style.display = 'none';

	}
};


</script>

<?php
//Récupération des DAO et DO
$bdd = new infoCadeauxBO;
$res_info_cadeau = $bdd->recupererListeinfocadeaux();



$count = count($res_info_cadeau);
for ($i = 0; $i < $count; $i++) {



//." <button type='button' name='button'onclick={Affiche(". $i .")}>Détails</button></br>  "
	//echo " id_liste  : ". $res_info_cadeau[$i]->id_liste ." </br>  ";
	echo " Nom du cadeau  : ". $res_info_cadeau[$i]->nom . "</br>";
  //echo " id_cadeau  : ". $res_info_cadeau[$i]->id_cadeau ." </br>  ";
//	echo "<div id='" . $i.  "' style='display:none'>";
  echo " Description du cadeau  : ". $res_info_cadeau[$i]->resume ." </br>  ";
  echo " Prix du cadeau : ". $res_info_cadeau[$i]->prix ." € </br>  ";
  echo " Image  : <img  src='Image/". $res_info_cadeau[$i]->image ."' style='width:7%;height:10%' /> </br>  ";
  echo " Date de début de reservation  : ". $res_info_cadeau[$i]->date_debut_reservation ." </br>  ";
  echo " Date de fin de reservation  : ". $res_info_cadeau[$i]->date_fin_reservation ." </br>  ";
	$etat=$res_info_cadeau[$i]->etat_reservation;
	if ($etat == "1"){
		$etat='réservé';
		echo " Personne ayant réservé le cadeau  : ". $res_info_cadeau[$i]->id_owner ." </br>    ";	;
	} else {
		$etat='disponible';
	}
  echo " Etat du cadeau  : ". $etat ." </br></br></br>";
	//echo " </div>";


}
// Appel à la fonction de récupération de la liste des réservations
$ownerReservationBO = new ownerReservationBO();
$res_owner_reservation = $ownerReservationBO->recupererListeownerreservation();

// Affichage des données de la table owner_reservation
echo "<h2>Liste des réservations</h2>";
foreach ($res_owner_reservation as $owner_reservation) {
    echo "ID Owner : " . $owner_reservation->id_owner . "</br>";
    echo "Nom du propriétaire : " . $owner_reservation->nom_owner . "</br>";
    echo "Prénom du propriétaire : " . $owner_reservation->prenom_owner . "</br></br>";
}


	// Fermeture de la connexion
	/*if ($conn != null)
		$conn->close();*/
?>
		</div>

	</body>
</html>
