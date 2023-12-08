<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_owner_reservation.php');
//include('DO\DO_owner_reservation.php');

class ownerReservationDAO {

	public $conn;

	// Connexion à la base de données
	function connectionBdd() {

		// Déclaration des variables de connexion
		$DB_HOST = "127.0.0.1";
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
	function recupererListeownerreservation() : array {

		$this->connectionBdd();
		$res = $this->conn->query("SELECT id_owner, nom_owner,prenom_owner FROM owner_reservation");


		$i = 0;

		foreach ($res as $row) {
			$util = new ownerReservation;
			$util->id_owner = $row['id_owner'];
			$util->nom_owner = $row['nom_owner'];
			$util->prenom_owner = $row['prenom_owner'];

			$ownerReservation[$i] = $util;

			$i++;
		}

		return $ownerReservation;
	}
}

?>
