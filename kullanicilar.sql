-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE `kullanicilar` (
  `tc` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `adisoyadi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parola` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `kullanicilar` (`tc`, `adisoyadi`, `parola`, `tur`) VALUES
('23020601880',	'batuhan',	'kaya1994',	1);

-- 2020-02-12 12:41:06
