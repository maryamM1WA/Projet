<?php
//include('DO\DO_owner_reservation.php');
//include('DAO\DAO_owner_reservation.php');
//include('DTO\DTO_owner_reservation.php');

  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_owner_reservation.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DAO/DAO_owner_reservation.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DTO/DTO_owner_reservation.php');

	use ownerReservation as ownerReservation;
	use ownerReservationDAO as ownerReservationDAO;
	use ownerReservationDTO as ownerReservationDTO;


class ownerReservationBO {

	// Service de récupératino de la liste des utilisateurs
	function recupererListeownerreservation() {

		/// Appel au DAO correspondant
		$dao = new ownerReservationDAO();
		$listeDo = $dao->recupererListeownerreservation();

		// Conversion de la liste des DO récupérés en DTO
		$i = 0;
		foreach ($listeDo as $do) {
			$dto = new ownerReservationDTO;
			$dto->id_owner = $do->id_owner;
			$dto->nom_owner = $do->nom_owner;
			$dto->prenom_owner = $do->prenom_owner;




			$ownerReservationDTO[$i] = $dto;






			$i++;
		}

		return $ownerReservationDTO;
	}
}

?>
