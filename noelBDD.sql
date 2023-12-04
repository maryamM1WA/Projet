/*creation de la base de donnée de liste de cadeau de noel*/

CREATE DATABASE ProjetNoel;

/********************************************************************
Creation des tables
*******************************************************************/
/** création de la table info_cadeaux**/

create table info_cadeaux(
  id_cadeau INT UNIQUE PRIMARY KEY,
  id_owner INT ,
  id_liste INT ,
  nom varchar(50),
  resume varchar(150),
  prix int,
  image varchar(150),
  date_debut_reservation DATE,
  date_fin_reservation DATE,
  etat_reservation BOOLEAN
);


/** création de la table listes**/

create table listes(
id_liste int UNIQUE PRIMARY KEY,
id_auteur int
);


/** création de la table auteur**/

create table auteur(
id_auteur int PRIMARY KEY,
nom_auteur VARCHAR(50),
prenom_auteur VARCHAR(50)
);


/** création de la table owner_reservation**/

create table owner_reservation(
id_owner int PRIMARY KEY,
nom_owner VARCHAR(50),
prenom_owner VARCHAR(50)
);



/********************************************************************/
/**Insertion de valeur dans les tables**/
/*******************************************************************/

/** insertion dans la  table info_cadeaux**/

insert into info_cadeaux(0,0,0,'telephone','Iphone Appple 5G et 65 pouces',500,'image.png','10-12-2023','15-12-2023','T');


/** insertion dans la  table owner_reservation**/

insert into owner_reservation(0,'Beladj','Lina');

/** insertion dans la  table liste**/

insert into listes(0,0);


/** insertion dans la  table auteur**/

insert into auteur(0,'EID','Maryam');