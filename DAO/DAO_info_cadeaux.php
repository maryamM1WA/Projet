<?php
//include('DO\DO_info_cadeaux.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_info_cadeaux.php');
use infoCadeauxDAO as infoCadeauxDAO;

class infoCadeauxDAO {

	public $conn;

	// Connexion à la base de données
	function connectionBdd() {

		// Déclaration des variables de connexion
		$DB_HOST = "localhost";
		$DB_NAME = "projetnoel";
		$DB_PORT = 3306;
		$DB_USER = "root";
		$DB_PSWD = "";

		try {

			$connString =
				"mysql:host=".$DB_HOST.";dbname=".$DB_NAME.";
				port=".$DB_PORT;
				$this->conn = new PDO($connString, $DB_USER, $DB_PSWD);

		}
		catch(PDOException $e) {
			die("Erreur : " . $e->getMessage());
		}
	}

	// Requête de récupération des données en BDD
	function recupererListeinfocadeaux() : array {

		$this->connectionBdd();
		$res = $this->conn->query("SELECT id_cadeau, id_owner,id_liste,nom,resume,prix,image, date_debut_reservation,date_fin_reservation,etat_reservation FROM info_cadeaux");


		$i = 0;

		foreach ($res as $row) {
			$util = new infoCadeaux;
			$util->id_cadeau = $row['id_cadeau'];
			$util->id_owner = $row['id_owner'];
			$util->id_liste = $row['id_liste'];
      $util->nom = $row['nom'];
      $util->resume = $row['resume'];
      $util->prix = $row['prix'];
      $util->image = $row['image'];
      $util->date_debut_reservation = $row['date_debut_reservation'];
      $util->date_fin_reservation = $row['date_fin_reservation'];
      $util->etat_reservation = $row['etat_reservation'];
			$infoCadeaux[$i] = $util;

			$i++;
		}

		return $infoCadeaux;
	}
}

?>
