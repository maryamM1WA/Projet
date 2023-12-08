<?php

//include('DO\DO_info_cadeaux.php');
//include('DAO\DAO_info_cadeaux.php');
//include('DTO\DTO_info_cadeaux.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_auteur.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DAO/DAO_auteur.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DTO/DTO_auteur.php');

	use Auteur as Auteur;
	use AuteurDAO as AuteurDAO;
	use AuteurDTO as AuteurDTO;


class AuteurBO {

	// Service de récupératino de la liste des utilisateurs
	function recupererAuteur() {

		/// Appel au DAO correspondant
		$dao = new AuteurDAO();
		$listeDo = $dao->recupererAuteur();

		// Conversion de la liste des DO récupérés en DTO
		$i = 0;
		foreach ($listeDo as $do) {
			$dto = new AuteurDTO;
			$dto->id_auteur = $do->id_auteur;
			$dto->nom_auteur = $do->nom_auteur;
			$dto->prenom_auteur = $do->prenom_auteur;


			$AuteurDTO[$i] = $dto;






			$i++;
		}

		return $AuteurDTO;
	}
}

?>
