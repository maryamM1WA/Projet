<?php
<<<<<<< HEAD
//include('DO\DO_listes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_listes.php');

=======
include('DO\DO_listes.php');
>>>>>>> 3d50f83ca544ad58ec3673f44ddd1af39d85c2d0
use ListesDAO as ListesDAO;
use Listes as Listes;

class ListesDAO {

	public $conn;

	// Connexion à la base de données
	function connectionBdd() {

		// Déclaration des variables de connexion
		$DB_HOST = "localhost";
<<<<<<< HEAD
		$DB_NAME = "projetnoel";
=======
		$DB_NAME = "projet_archi";
>>>>>>> 3d50f83ca544ad58ec3673f44ddd1af39d85c2d0
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
	function recupererListes() : array {

		$this->connectionBdd();
		$res = $this->conn->query("SELECT id_liste, id_auteur FROM listes");


		$i = 0;

		foreach ($res as $row) {
			$util = new Listes;
			$util->id_liste = $row['id_liste'];
			$util->auteur = $row['id_auteur'];
			$listes[$i] = $util;

			$i++;
		}

		return $listes;
	}
}

?>
