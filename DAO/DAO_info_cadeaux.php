<?php
include('DO\DO_info_cadeaux.php');
use infoCadeauxDAO as infoCadeauxDAO;

class infoCadeauxDAO {

	public $conn;

	// Connexion à la base de données
	function connectionBdd() {

		// Déclaration des variables de connexion
		$DB_HOST = "localhost";
		$DB_NAME = "ProjetNoel";
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
			$util->date_de_reservation = $row['date_de_reservation'];
      $util->etat_reservation = $row['etat_reservation'];
			$infoCadeaux[$i] = $util;

			$i++;
		}

		return $infoCadeaux;
	}

	function supprimerListeinfocadeaux() : array {

		$this->connectionBdd();



		$query = "SELECT c.id_cadeau, c.id_owner, c.id_liste, c.nom, c.resume, c.prix, c.image, c.date_debut_reservation, c.date_fin_reservation, c.etat_reservation
								FROM info_cadeaux c
								INNER JOIN listes l ON c.id_liste = l.id_liste
								WHERE l.id_auteur = :idAuteur";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':idAuteur', $idAuteur, PDO::PARAM_INT);
		$stmt->execute();



		$res = $this->conn->query("DELETE FROM info_cadeaux WHERE id_liste =0 ");





		$res2 = $this->conn->query("SELECT id_cadeau, id_owner,id_liste,nom,resume,prix,image, date_debut_reservation,date_fin_reservation,date_de_reservation,etat_reservation FROM info_cadeaux");


		$i = 0;

		foreach ($res2 as $row) {
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
			$util->date_de_reservation = $row['date_de_reservation'];
			$util->etat_reservation = $row['etat_reservation'];
			$infoCadeaux2[$i] = $util;

			$i++;
		}

		return $infoCadeaux2;

	}

function recupererListeinfocadeauxParAuteur($idAuteur) : array {
			 // Connexion à la base de données
			 $this->connectionBdd();

			 // Requête de récupération des données en BDD
			 $query = "SELECT c.id_cadeau, c.id_owner, c.id_liste, c.nom, c.resume, c.prix, c.image, c.date_debut_reservation, c.date_fin_reservation,c.date_de_reservation, c.etat_reservation
									 FROM info_cadeaux c
									 INNER JOIN listes l ON c.id_liste = l.id_liste
									 WHERE l.id_auteur = :idAuteur";

			 $stmt = $this->conn->prepare($query);
			 $stmt->bindParam(':idAuteur', $idAuteur, PDO::PARAM_INT);
			 $stmt->execute();


			 $infoCadeaux = array(); // Initialisez votre tableau

			 $i = 0;
			 foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
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
					 $util->date_de_reservation = $row['date_de_reservation'];
					 $util->etat_reservation = $row['etat_reservation'];
					 $infoCadeaux[$i] = $util;
					 $i++;
			 }

			 return $infoCadeaux;
	 }


}


?>
