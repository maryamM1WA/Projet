/*creation de la base de donnée de liste de cadeau de noel*/

CREATE DATABASE ProjetNoel;

/********************************************************************
Creation des tables
*******************************************************************/
/** création de la table info_cadeaux**/

create table info_cadeaux(
  id_cadeau INT PRIMARY KEY ,
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
/**DROP TABLE info_cadeaux; **/

/** création de la table listes**/

create table listes(
id_liste int PRIMARY KEY,
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

insert into info_cadeaux(id_cadeau,id_owner,id_liste,nom,resume,prix,image,date_debut_reservation,date_fin_reservation,etat_reservation) VALUES (0,NULL,0,'telephone','Iphone Appple 5G et 65 pouces',500,'image.png','2023-12-10','2023-12-15',TRUE);
insert into info_cadeaux(id_cadeau,id_owner,id_liste,nom,resume,prix,image,date_debut_reservation,date_fin_reservation,etat_reservation) VALUES (1,NULL,0,'Xbox','Console pour jeu video',700,'image1.png','2023-12-10','2023-12-15',TRUE);



/** insertion dans la  table liste**/

insert into listes(id_liste,id_auteur) VALUES (0,0);
insert into listes(id_liste,id_auteur) VALUES (1,0);
insert into listes(id_liste,id_auteur) VALUES (2,1);


/** insertion dans la  table auteur**/

insert into auteur(id_auteur,nom_auteur,prenom_auteur) VALUES (0,'EID','Maryam');
insert into auteur(id_auteur,nom_auteur,prenom_auteur) VALUES (1,'RAHMANI','Lydia');
insert into auteur(id_auteur,nom_auteur,prenom_auteur) VALUES (2,'SATORI','Najwa');
insert into auteur(id_auteur,nom_auteur,prenom_auteur) VALUES (3,'GRASSART','Gaelle');


/** insertion dans la  table owner_reservation**/

insert into owner_reservation(id_owner,nom_owner,prenom_owner) VALUES (0,'Ducoup','Emilie');
insert into owner_reservation(id_owner,nom_owner,prenom_owner) VALUES (1,'Ria','Léa');
insert into owner_reservation(id_owner,nom_owner,prenom_owner) VALUES (2,'Ras','Louis');
insert into owner_reservation(id_owner,nom_owner,prenom_owner) VALUES (3,'Chou','Philipe');

/********************************************************************
Suppression des tables
*******************************************************************/
/** suppression de la table info_cadeaux**/
/**DROP TABLE info_cadeaux; **/
/** suppression de la table listes**/
/**DROP TABLE listes; **/
/** suppression de la table auteur**/
/**DROP TABLE auteur; **/
/** suppression de la table owner_reservation**/
/**DROP TABLE owner_reservation; **/