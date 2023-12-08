<?php
//include('DO\DO_auteur.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_auteur.php');

use Auteur as  Auteur;

class AuteurDAO {

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
	function recupererAuteur() : array {

		$this->connectionBdd();
		$res = $this->conn->query("SELECT id_auteur,nom_auteur,prenom_auteur FROM auteur");


		$i = 0;

		foreach ($res as $row) {
			$util = new Auteur;
			$util->id_auteur = $row['id_auteur'];
			$util->nom_auteur= $row['nom_auteur'];
			$util->prenom_auteur = $row['prenom_auteur'];
      $Auteur[$i] = $util;
			$i++;
		}

		return $Auteur;
	}
}

?>
