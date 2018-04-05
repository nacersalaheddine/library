
CREATE DATABASE library;
USE library;

GRANT ALL PRIVILEGES ON library.*
TO 'lib'@'localhost'


/*creation*/
CREATE TABLE lecteurs(
 `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
   PRIMARY KEY  (`id`)
) ;

CREATE TABLE admins(
 `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
   PRIMARY KEY  (`id`)
) ;
CREATE TABLE livres (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `nbr_exemplairs` int(11) NOT NULL,
   PRIMARY KEY  (`id`)
) ;

create table emprent(
  `id` int(11) NOT NULL auto_increment,
  `id_lecteur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL unique,
  `date_emprent` DATE NOT NULL,
  `date_ret`  DATE  NOT NULL,
   PRIMARY KEY (`id`),
   FOREIGN KEY(`id_lecteur`)  REFERENCES lecteurs(`id`),
   FOREIGN KEY(`id_livre`) REFERENCES  livres(`id`)


);

/*Insertion*/
/*lecteurs*/
INSERT INTO lecteurs (id, username, password, first_name, last_name)
VALUES (1, 'salaheddine05', '1994', 'salah eddine', 'nacer');

INSERT INTO lecteurs (id, username, password, first_name, last_name)
VALUES (2, 'morad45', 'morad123', 'morad', 'moradi');
/*admins*/
INSERT INTO admins (id, username, password, first_name, last_name)
VALUES (1, 'admin', '1994', 'salah eddine', 'nacer');

INSERT INTO admins (id, username, password, first_name, last_name)
VALUES (2, 'admin', 'admin', 'admin firstname', 'admin lastname');


/*emprent*/
INSERT INTO emprent (id, id_lecteur, id_livre, date_emprent, date_ret)
VALUES (1, 1, 2, "2018-4-5", "2018-4-20");


/*update*/
 UPDATE livres SET nbr_exemplairs = nbr_exemplairs - 1 WHERE id = 2;

/*selection */
SELECT * FROM lecteurs WHERE id = 1;
SELECT * FROM lecteurs;


https://technet.microsoft.com/en-us/library/cc793139(v=sql.90).aspx
