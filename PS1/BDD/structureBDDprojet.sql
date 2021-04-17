DROP TABLE IF EXISTS Record;
DROP TABLE IF EXISTS Liaison;
DROP TABLE IF EXISTS Performance;
DROP TABLE IF EXISTS Nation;
DROP TABLE IF EXISTS Club;
DROP TABLE IF EXISTS Lieu;
DROP TABLE IF EXISTS Nageur;
DROP TABLE IF EXISTS Groupe;
DROP TABLE IF EXISTS Saison;
DROP TABLE IF EXISTS Distance;
DROP TABLE IF EXISTS TypeNage;
DROP TABLE IF EXISTS Entraineur;




CREATE TABLE Entraineur(
	id INT PRIMARY KEY AUTO_INCREMENT,
  login VARCHAR(30) NOT NULL UNIQUE,
	mdp VARCHAR(30) NOT NULL);

CREATE TABLE TypeNage(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(30) NOT NULL UNIQUE);

CREATE TABLE Distance(
  id INT PRIMARY KEY AUTO_INCREMENT,
  longueur INT);

CREATE TABLE Saison(
  id INT PRIMARY KEY AUTO_INCREMENT,
  annee INT);

CREATE TABLE Groupe(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(30),
	idEntraineur INT,
	idSaison INT,
	FOREIGN KEY fk_entraineur(idEntraineur) REFERENCES Entraineur(id),
	FOREIGN KEY fk_saison(idSaison) REFERENCES Saison(id));

CREATE TABLE Nageur(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(30) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  age INT,
  sexe VARCHAR(30) NOT NULL,
	idGroupe INT,
	FOREIGN KEY fk_groupe(idGroupe) REFERENCES Groupe(id));

CREATE TABLE Lieu(
	id INT PRIMARY KEY AUTO_INCREMENT,
	ville VARCHAR(30));

CREATE TABLE Club(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(30),
	code VARCHAR(30));

CREATE TABLE Nation(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(30));

  CREATE TABLE Performance(
    id INT PRIMARY KEY AUTO_INCREMENT,
    heures INT,
		minutes INT,
		secondes INT,
		centiemes INT,
		temps FLOAT,
		temps25 FLOAT,
		bassin INT,
		date VARCHAR(30),
  		idNage INT,
  		idDistance INT,
		idLieu INT,

    		idNageur INT,

    		idSaison INT,
		idClub INT,
		idNation INT,
		FOREIGN KEY fk_lieu(idLieu) REFERENCES Lieu(id),
    FOREIGN KEY fk_distance(idDistance) REFERENCES Distance(id),
    FOREIGN KEY fk_nageur(idNageur) REFERENCES Nageur(id),
    FOREIGN KEY fk_type(idNage) REFERENCES TypeNage(id),
    FOREIGN KEY fk_saison(idSaison) REFERENCES Saison(id),
		FOREIGN KEY fk_club(idClub) REFERENCES Club(id),
		FOREIGN KEY fk_nation(idNation) REFERENCES Nation(id));

CREATE TABLE Record(
	id INT PRIMARY KEY AUTO_INCREMENT,
	heures INT,
	minutes INT,
	secondes INT,
	centiemes INT,
	temps FLOAT,
	idDistance INT,
	idNage INT,
	sexe VARCHAR(30),
	FOREIGN KEY fk_distance(idDistance) REFERENCES Distance(id),
	FOREIGN KEY fk_nage(idNage) REFERENCES TypeNage(id));

INSERT INTO Entraineur VALUES (1,'lv@a.fr','motdepasse');
INSERT INTO Entraineur VALUES (2,'log','mdp');
