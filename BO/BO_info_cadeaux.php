<?php


  //include('DO\DO_info_cadeaux.php');

  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_info_cadeaux.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DAO/DAO_info_cadeauxn.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DTO/DTO_info_cadeaux.php');

	use infoCadeaux as infoCadeaux;
	use infoCadeauxDAO as infoCadeauxDAO;
	use infoCadeauxDTO as infoCadeauxDTO;


class infoCadeauxBO {

	// Service de récupératino de la liste des utilisateurs
	function recupererListeinfocadeaux() {

		/// Appel au DAO correspondant
		$dao = new infoCadeauxDAO;
		$listeDo = $dao->recupererListeinfocadeaux();

		// Conversion de la liste des DO récupérés en DTO
		$i = 0;
		foreach ($listeDo as $do) {
			$dto = new infoCadeauxDTO;
			$dto->id_cadeau = $do->id_cadeau;
			$dto->id_owner = $do->id_owner;
			$dto->id_liste = $do->id_liste;

      $dto->nom = $do->nom;
			$dto->resume = $do->resume;
      $dto->prix = $do->prix;
			$dto->image = $do->image;

      $dto->date_debut_reservation = $do->date_debut_reservation;
			$dto->date_fin_reservation = $do->date_fin_reservation;
			$dto->etat_reservation = $do->etat_reservation;


			$infoCadeauxDTO[$i] = $dto;






			$i++;
		}

		return $infoCadeauxDTO;
	}
}

?>
