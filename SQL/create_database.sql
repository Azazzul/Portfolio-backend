drop database if exists portfolio;
create database portfolio;

use portfolio;
create TABLE EXPERIENCE
(
    id          INT auto_increment,
    title       VARCHAR(50),
    entreprise  VARCHAR(50)  NOT NULL,
    images      VARCHAR(50),
    date        DATE,
    description VARCHAR(500) NOT NULL,
    primary key (id)
);


CREATE TABLE DIPLOME
(
    id          INT auto_increment,
    date_debut  DATE,
    date_fin    DATE,
    nom_ecole   VARCHAR(30),
    nom_diplome varchar(100),
    logo_ecole  VARCHAR(100),
    description VARCHAR(200),
    primary key (id)
);

create table utilisateurs
(
    id       INT auto_increment,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) not null,
    primary key (id)
);

create table PROJECT
(
    id          INT auto_increment,
    title       VARCHAR(50) NOT NULL ,
    nom         VARCHAR(50) not null ,
    client      VARCHAR(50),
    dates       DATE,
    images      VARCHAR(200),
    lien        VARCHAR(100),
    description VARCHAR(500) NOT NULL,
    primary key (id)
);

create table competence
(
    id             int auto_increment,
    nom_competence VARCHAR(50) NOT NULL,
    image           VARCHAR(50),
    primary key (id)
);
# TODO : check les competence et les images'
insert into competence(nom_competence) value ('C');
INSERT INTO utilisateurs (username, password)
values ('root', 'root');
INSERT INTO `project` (`nom`, title, `client`, `dates`, `images`, `lien`, `description`)
VALUES ('Labyrinthe ', 'Labyrinthe', 'IUT de lens', '2023-06-19', '/assets/screenshot/lab1.png', 'https://github.com/Azazzul/Projet-labyrinthe', 'Un projet consistant a refaire le jeu du labyrinthe en java a partir d\' une librairie fournie par les professeurs');
INSERT INTO `project` (`nom`, title, `client`, `dates`, `images`, `lien`, `description`)
VALUES ('Labyrinthe2 ', 'Labyrinthe2', 'IUT de lens', '2023-06-19', '/assets/screenshot/lab1.png', 'https://github.com/Azazzul/Projet-labyrinthe', 'Un projet consistant a refaire le jeu du labyrinthe en java a partir d\' une librairie fournie par les professeurs');

INSERT INTO DIPLOME (`date_debut`, `date_fin`, `nom_diplome`, `nom_ecole`, `logo_ecole`, `description`)
VALUES ('2017-07-1', '2020-09-1', 'Baccalauréat professionnel Système numérique RISC', 'LYPSO', '',
        'Baccalauréat professionnel spécialisé en réseaux et dans les systemes communiquant');
INSERT INTO DIPLOME (`date_debut`, `date_fin`, `nom_diplome`, `nom_ecole`, `logo_ecole`, `description`)
VALUES ('2022-09-1', '2023-07-1', 'Diplome d\'ingé  ', 'ISEN LILLE', '',
        'diplome ingénieur');