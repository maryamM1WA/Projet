<?php

//include('BO\BO_info_cadeaux.php');
//include('BO\BO_owner_reservation.php');
//include('BO\BO_auteur.php');
//include('BO\BO_listes.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/BO/BO_info_cadeaux.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/BO/BO_owner_reservation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/BO/BO_auteur.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/BO/BO_listes.php');
	use infoCadeauxBO as infoCadeauxBO;
  use ownerReservationBO as ownerReservationBO;
	use ListesBO as ListesBO;
	use AuteurBO as AuteurBO;

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



// Appel à la fonction de récupération des auteurs
$auteurBO = new AuteurBO();
$res_auteur = $auteurBO->recupererAuteur();

// Affichage des données de la table auteur
echo "<h2>Liste des auteurs</h2>";
foreach ($res_auteur as $auteur) {
    echo "ID Auteur : " . $auteur->id_auteur . "</br>";
    echo "Nom de l'auteur : " . $auteur->nom_auteur . "</br>";
    echo "Prénom de l'auteur : " . $auteur->prenom_auteur . "</br></br>";
}



// Appel à la fonction de récupération des listes
$listesBO = new ListesBO();
$res_listes = $listesBO->recupererListes();

// Affichage des données de la table listes
echo "<h2>Liste des listes</h2>";
foreach ($res_listes as $liste) {
    echo "ID Liste : " . $liste->id_liste . "</br>";
    echo "ID Auteur : " . $liste->auteur . "</br></br>";

}
	// Fermeture de la connexion
	/*if ($conn != null)
		$conn->close();*/
?>
		</div>

	</body>
</html>
