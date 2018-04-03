
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

/*selection */
SELECT * FROM lecteurs WHERE id = 1;
SELECT * FROM lecteurs;


https://technet.microsoft.com/en-us/library/cc793139(v=sql.90).aspx
