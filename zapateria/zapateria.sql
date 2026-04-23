
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;


DROP DATABASE IF EXISTS `zapateria`;

CREATE DATABASE `zapateria`;
USE `zapateria`;


DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `color` (`color`) VALUES
('Negro'),
('Marrón'),
('Blanco'),
('Verde'),
('Azul'),
('Amarillo'),
('Rosa');

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `marca` (`marca`) VALUES
('Adidas'),
('Nike'),
('Puma'),
('Skechers'),
('New Balace'),
('HM'),
('Decathlon'),
('Asics'),
('Quechua'),
('Amazon');

DROP TABLE IF EXISTS `para`;

CREATE TABLE `para` (
  `id_para` int NOT NULL AUTO_INCREMENT,
  `para` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_para`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `para` (`para`) VALUES
('Hombre'),
('Mujer'),
('Niño'),
('Niña');

DROP TABLE IF EXISTS `talla`;

CREATE TABLE `talla` (
  `id_talla` int NOT NULL AUTO_INCREMENT,
  `talla` int NOT NULL,
	`talla_de` VARCHAR (5)CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `desc_cat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_talla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `talla` (`talla`,`talla_de`,`desc_cat`) VALUES
(31,'N','Niño'),
(32,'N','Niño'),
(33,'N','Niño'),
(34,'N','Niño'),
(35,'M-N','Niño-Mujer'),
(36,'M-N','Niño-Mujer'),
(37,'M','Mujer'),
(38,'H-M','Hombre-Mujer'),
(39,'H-M','Hombre-Mujer'),
(40,'H-M','Hombre-Mujer'),
(41,'H-M','Hombre-Mujer'),
(42,'H','Hombre'),
(43,'H','Hombre'),
(44,'H','Hombre'),
(45,'H','Hombre');



DROP TABLE IF EXISTS `zapato`;

CREATE TABLE `zapato` (
  `id_zapato` int NOT NULL AUTO_INCREMENT,
  `nombre_zapato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_zapato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_zapato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `zapato` (`nombre_zapato`, `descripcion_zapato`, `precio`, `imagen`) VALUES
('Nike Air Zoom Pegasus 40',	'Zapatilla de running ligera con gran amortiguación para uso diario.',	129.99,	'assets/img/AirZoomPegasus.jpg'),
('Adidas Ultraboost 1.0',	'Máximo confort y retorno de energía en cada pisada.',	149.99,	'assets/img/UltraBox.jpg'),
('Puma Velocity Nitro 2',	'Espuma reactiva ideal para entrenamientos rápidos.',	109.99,	'assets/img/velocitiyNitro2.jpg'),
('Asics Gel-Contend 9',	'Tecnología GEL para mejor absorción de impactos.',	79.99,	'assets/img/AssicsGelContend.jpg'),
('Skechers Go Walk Arch Fit',	'Perfecta para caminar con soporte ergonómico.',	69.99,	'assets/img/goWalkArchFit.jpg'),
('Nike Revolution 6 Mujer',	'Zapatilla cómoda y transpirable para uso diario.',	64.99,	'assets/img/nikeRevolutionM.jpg'),
('Adidas Runfalcon 3 Mujer',	'Ligera y versátil para gimnasio o caminar.',	59.99,	'assets/img/RunfalconM.jpg'),
('Skechers Bobs Squad Mujer',	'Plantilla memory foam y diseño moderno.',	54.99,	'assets/img/BobsSquadM.jpg'),
('Puma Cali Sport Mujer',	'Estilo urbano con comodidad deportiva.',	74.99,	'assets/img/CaliSportM.jpg'),
('New Balance Fresh Foam Arishi',	'Pisada suave ideal para caminatas.',	69.99,	'assets/img/FreshFoamArishiM.jpg'),
('Adidas Tensaur Run Niño',	'Resistente y cómoda para colegio y deporte.',	34.99,	'assets/img/tensaur-runN.webp'),
('Nike Star Runner 3 Niño',	'Ligera y transpirable para actividad diaria.',	39.99,	'assets/img/StarRunner3N.jpg'),
('Puma Flex Focus Lite Niño',	'Flexible con buena tracción.',	29.99,	'assets/img/FlexFocusLiteN.jpg'),
('Quechua MH100 Niño',	'Zapatilla de montaña con agarre resistente.',	24.99,	'assets/img/QuechuaMH100N.jpg'),
('Nike Cosmic Runner Niño',	'Cómoda para uso escolar y running básico.',	44.99,	'assets/img/NikeCosmicRunnerN.png'),
('Skechers Uno Lite Niña',	'Diseño moderno con buena amortiguación.',	54.99,	'assets/img/SkechersUnoLiteN.jpg'),
('Adidas Grand Court Niña',	'Estilo clásico y cómodo para diario.',	39.99,	'assets/img/GrandCourtN.jpg'),
('Zapatillas H&M Rosa Niña',	'Ligera, económica y casual.',	24.99,	'assets/img/ZapatillasHMRosaN.jpg'),
('Playful Summer Niña',	'Transpirable y cómoda para juegos.',	19.99,	'assets/img/PlayfulSummerN.jpg'),
('Dream Pairs Niña',	'Muy ligera y colorida para uso diario.',	34.99,	'assets/img/DreamPairsN.jpg');



DROP TABLE IF EXISTS `zapato_color`;

CREATE TABLE `zapato_color` (
  `id_zp_color` int NOT NULL AUTO_INCREMENT,
  `fk_zapato` int NOT NULL,
  `fk_color` int NOT NULL,
  PRIMARY KEY (`id_zp_color`),
  KEY `fk_zapato` (`fk_zapato`),
  KEY `fk_color` (`fk_color`),
  CONSTRAINT `zapato_color_ibfk_1` FOREIGN KEY (`fk_zapato`) REFERENCES `zapato` (`id_zapato`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zapato_color_ibfk_2` FOREIGN KEY (`fk_color`) REFERENCES `color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `zapato_color` (`fk_zapato`,`fk_color`) VALUES
('1','1'),
('1','3'),
('1','6'),
('2','1'),
('2','3'),
('2','6'),
('3','1'),
('3','2'),
('3','3'),
('4','1'),
('4','3'),
('4','4'),
('5','1'),
('5','2'),
('5','3'),
('6','1'),
('6','3'),
('6','6'),
('6','7'),
('7','1'),
('7','3'),
('7','6'),
('7','7'),
('8','3'),
('8','5'),
('8','6'),
('9','3'),
('9','5'),
('9','7'),
('10','3'),
('10','4'),
('10','5'),
('10','7'),
('11','1'),
('11','3'),
('11','4'),
('11','6'),
('12','1'),
('12','3'),
('12','4'),
('12','6'),
('13','1'),
('13','3'),
('13','5'),
('13','6'),
('14','1'),
('14','2'),
('14','3'),
('14','4'),
('15','1'),
('15','2'),
('15','3'),
('15','4'),
('16','1'),
('16','3'),
('16','6'),
('16','7'),
('17','1'),
('17','3'),
('17','6'),
('17','7'),
('18','3'),
('18','5'),
('18','6'),
('18','7'),
('19','3'),
('19','5'),
('19','7'),
('20','3'),
('20','4'),
('20','5'),
('20','7');



DROP TABLE IF EXISTS `zapato_marca`;

CREATE TABLE `zapato_marca` (
  `id_zp_marca` int NOT NULL AUTO_INCREMENT,
  `fk_zapato` int NOT NULL,
  `fk_marca` int NOT NULL,
  PRIMARY KEY (`id_zp_marca`),
  KEY `fk_zapato` (`fk_zapato`),
  KEY `fk_marca` (`fk_marca`),
  CONSTRAINT `zapato_marca_ibfk_1` FOREIGN KEY (`fk_zapato`) REFERENCES `zapato` (`id_zapato`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zapato_marca_ibfk_2` FOREIGN KEY (`fk_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `zapato_marca` (`fk_zapato`,`fk_marca`) VALUES
('1','2'),
('2','1'),
('3','3'),
('4','8'),
('5','4'),
('6','2'),
('7','1'),
('8','4'),
('9','3'),
('10','5'),
('11','1'),
('12','2'),
('13','3'),
('14','9'),
('15','2'),
('16','4'),
('17','1'),
('18','6'),
('19','7'),
('20','10');


DROP TABLE IF EXISTS `zapato_para`;

CREATE TABLE `zapato_para` (
  `id_zp_para` int NOT NULL AUTO_INCREMENT,
  `fk_zapato` int NOT NULL,
  `fk_para` int NOT NULL,
  PRIMARY KEY (`id_zp_para`),
  KEY `fk_zapato` (`fk_zapato`),
  KEY `fk_para` (`fk_para`),
  CONSTRAINT `zapato_para_ibfk_10` FOREIGN KEY (`fk_para`) REFERENCES `para` (`id_para`)  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zapato_para_ibfk_9` FOREIGN KEY (`fk_zapato`) REFERENCES `zapato` (`id_zapato`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `zapato_para` (`fk_zapato`, `fk_para`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	2),
(7,	2),
(8,	2),
(9,	2),
(10,	2),
(11,	3),
(12,	3),
(13,	3),
(14,	3),
(15,	3),
(16,	4),
(17,	4),
(18,	4),
(19,	4),
(20,	4);


DROP TABLE IF EXISTS `zapato_talla`;

CREATE TABLE `zapato_talla` (
  `id_zp_talla` int NOT NULL AUTO_INCREMENT,
  `fk_zapato` int NOT NULL,
  `fk_talla` int NOT NULL,
  PRIMARY KEY (`id_zp_talla`),
  KEY `fk_zapato` (`fk_zapato`),
  KEY `fk_talla` (`fk_talla`),
  CONSTRAINT `zapato_talla_ibfk_2` FOREIGN KEY (`fk_zapato`) REFERENCES `zapato` (`id_zapato`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zapato_talla_ibfk_3` FOREIGN KEY (`fk_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO `zapato_talla` (`fk_zapato`,`fk_talla`) VALUES
('1','7'),
('1','8'),
('1','9'),
('1','10'),
('1','11'),
('1','12'),
('1','13'),
('1','14'),
('2','7'),
('2','8'),
('2','9'),
('2','10'),
('2','11'),
('2','12'),
('2','13'),
('2','14'),
('3','7'),
('3','8'),
('3','9'),
('3','10'),
('3','11'),
('3','12'),
('3','13'),
('3','14'),
('4','7'),
('4','8'),
('4','9'),
('4','10'),
('4','11'),
('4','12'),
('4','13'),
('4','14'),
('5','7'),
('5','8'),
('5','9'),
('5','10'),
('5','11'),
('5','12'),
('5','13'),
('5','14'),
('6','4'),
('6','5'),
('6','6'),
('6','7'),
('6','8'),
('6','9'),
('6','10'),
('7','4'),
('7','5'),
('7','6'),
('7','7'),
('7','8'),
('7','9'),
('7','10'),
('8','4'),
('8','5'),
('8','6'),
('8','7'),
('8','8'),
('8','9'),
('8','10'),
('9','4'),
('9','5'),
('9','6'),
('9','7'),
('9','8'),
('9','9'),
('9','10'),
('10','4'),
('10','5'),
('10','6'),
('10','7'),
('10','8'),
('10','9'),
('10','10'),
('11','1'),
('11','2'),
('11','3'),
('11','4'),
('11','5'),
('12','1'),
('12','2'),
('12','3'),
('12','4'),
('12','5'),
('13','1'),
('13','2'),
('13','3'),
('13','4'),
('13','5'),
('14','1'),
('14','2'),
('14','3'),
('14','4'),
('14','5'),
('15','1'),
('15','2'),
('15','3'),
('15','4'),
('15','5'),
('16','1'),
('16','2'),
('16','3'),
('16','4'),
('16','5'),
('17','1'),
('17','2'),
('17','3'),
('17','4'),
('17','5'),
('18','1'),
('18','2'),
('18','3'),
('18','4'),
('18','5'),
('19','1'),
('19','2'),
('19','3'),
('19','4'),
('19','5'),
('20','1'),
('20','2'),
('20','3'),
('20','4'),
('20','5');