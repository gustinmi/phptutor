-- Create tutorial database

CREATE DATABASE phptut1 DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_bin;
CREATE USER 'phptut1'@'localhost' IDENTIFIED BY 'p';
grant all privileges on phptut1.* to 'phptut1'@'localhost';

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `items_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `content` VARCHAR( 2000 ) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

ALTER TABLE `items_data`
  ADD CONSTRAINT `items_id_fk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

insert into items values (null , 'folder 1');
insert into items values (null , 'folder 2');
insert into items values (null , 'folder 3');

INSERT INTO  `items_data` (`id` , `item_id` , `name`, `content` ) VALUES (NULL ,  '1',  'file', 'file1.txt');
INSERT INTO  `items_data` (`id` , `item_id` , `name`, `content` ) VALUES (NULL ,  '2',  'file', 'file2.txt');
INSERT INTO  `items_data` (`id` , `item_id` , `name`, `content` ) VALUES (NULL ,  '3',  'directory', 'tmp');
