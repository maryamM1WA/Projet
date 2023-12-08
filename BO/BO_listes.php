<?php


<<<<<<< HEAD
//include('DO\DO_listes.php');
//include('DAO\DAO_listes.php');
//include('DTO\DTO_listes.php');
  //require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DO/DO_listes.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DAO/DAO_listes.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Projet/DTO/DTO_listes.php');


	//use Listes as Listes;
=======
  //include('DO\DO_info_cadeaux.php');
  include('DAO\DAO_listes.php');
  include('DTO\DTO_listes.php');

	use Listes as Listes;
>>>>>>> 3d50f83ca544ad58ec3673f44ddd1af39d85c2d0
	use ListesDAO as ListesDAO;
	use ListesDTO as ListesDTO;


class ListesBO {

	// Service de récupératino de la liste des utilisateurs
	function recupererListes() {

		/// Appel au DAO correspondant
		$dao = new ListesDAO;
		$listeDo = $dao->recupererListes();

		// Conversion de la liste des DO récupérés en DTO
		$i = 0;
		foreach ($listeDo as $do) {
			$dto = new ListesDTO;
			$dto->id_liste = $do->id_liste;
			$dto->auteur = $do->auteur;
			$ListesDTO[$i] = $dto;






			$i++;
		}

		return $ListesDTO;
	}
}

?>
