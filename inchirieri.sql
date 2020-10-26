-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: iul. 28, 2020 la 08:40 PM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `inchirieri`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `anunt`
--

DROP TABLE IF EXISTS `anunt`;
CREATE TABLE IF NOT EXISTS `anunt` (
  `idI` int(200) NOT NULL AUTO_INCREMENT,
  `idUsers` int(255) NOT NULL,
  `categorie` varchar(200) NOT NULL DEFAULT '',
  `descriere` varchar(200) NOT NULL DEFAULT '',
  `imagine` varchar(200) NOT NULL,
  `imagine1` varchar(200) NOT NULL,
  `telefon` int(200) NOT NULL,
  `compartimentare` varchar(200) NOT NULL DEFAULT '',
  `pret` int(10) NOT NULL,
  `suprafata` int(10) NOT NULL,
  `etaj` int(10) NOT NULL,
  `an_constructie` int(10) NOT NULL,
  `titlu` varchar(200) NOT NULL DEFAULT '',
  `user` varchar(200) NOT NULL DEFAULT '',
  `data_adaugari` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idI`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `anunt`
--

INSERT INTO `anunt` (`idI`, `idUsers`, `categorie`, `descriere`, `imagine`, `imagine1`, `telefon`, `compartimentare`, `pret`, `suprafata`, `etaj`, `an_constructie`, `titlu`, `user`, `data_adaugari`) VALUES
(27, 14, '2 camere', 'descriere username 122', '4.jpg', '', 725876925, 'decomandat', 12, 21, 21, 22222, 'Test', 'admin', '2020-05-11 21:40:05'),
(30, 16, '5 camere', '121212', 'back.jpg', '', 789898989, 'semidecomandat', 22, 22, 12, 1900, 'Inchiriez', 'ben222', '2020-05-27 10:18:56'),
(31, 16, '3 camere', 'Este nou apartamentul abia ce l-am cumparat', 'flat3.jpg', '', 231, 'circular', 231, 70, 1, 1800, '22322', 'ben222', '2020-05-27 10:20:44'),
(32, 21, '2 camere', '', 'flat4.jpg', '', 722275320, 'nedecomandat', 2000, 150, 10, 2020, 'Inchiriez apartament cel mai corect pret', '12Laurentia', '2020-05-27 10:24:05'),
(33, 20, '5 camere', 'Astept telefon', 'images.png', '', 215478563, 'semidecomandat', 680, 100, 25, 2020, 'Sper sa va placa (mobilat)', 'Pereteanu ', '2020-05-27 10:27:14'),
(24, 20, '4 camere', 'Multumesc', 'flat5.jpg', '', 744771815, 'decomandat', 1356, 154, 5, 1890, 'Sunati la 112 va rog e gratis', '	\r\nIoana', '2020-05-27 10:29:37'),
(35, 22, '2 camere', 'ceva', 'images.png', '', 230313082, 'decomandat', 1459, 89, 6, 1980, 'Inchiriez', 'Petronela_Dalca', '2020-05-27 10:34:13'),
(36, 14, '2 camere', 'descriere username 122', '4.jpg', '', 725876925, 'decomandat', 12, 21, 21, 22222, 'Test', 'admin', '2020-05-11 21:40:05'),
(37, 16, '5 camere', '121212', 'back.jpg', '', 789898989, 'semidecomandat', 22, 22, 12, 1900, 'Inchiriez', 'ben222', '2020-05-27 10:18:56'),
(38, 16, '3 camere', 'Este nou apartamentul abia ce l-am cumparat', 'flat3.jpg', '', 231, 'circular', 231, 70, 1, 1800, '22322', 'ben222', '2020-05-27 10:20:44'),
(39, 21, '2 camere', '', 'flat4.jpg', '', 722275320, 'nedecomandat', 2000, 150, 10, 2020, 'Inchiriez apartament cel mai corect pret', '12Laurentia', '2020-05-27 10:24:05'),
(40, 20, '5 camere', 'Astept telefon', 'images.png', '', 215478563, 'semidecomandat', 680, 100, 25, 2020, 'Sper sa va placa (mobilat)', 'Pereteanu ', '2020-05-27 10:27:14'),
(41, 20, '4 camere', 'Multumesc', 'flat5.jpg', '', 744771815, 'decomandat', 1356, 154, 5, 1890, 'Sunati la 112 va rog e gratis', '	\r\nIoana', '2020-05-27 10:29:37'),
(42, 22, '2 camere', 'ceva', 'images.png', '', 230313082, 'decomandat', 1459, 89, 6, 1980, 'Inchiriez', 'Petronela_Dalca', '2020-05-27 10:34:13'),
(43, 14, '2 camere', '54', 'flat2.jpg', 'flat4.jpg', 725876457, 'decomandat', 45, 54, 54, 54, 'dasdasda5757', 'admin', '2020-07-11 21:47:19'),
(44, 14, '2 camere', '54', 'flat4.jpg', '', 725876457, 'decomandat', 54, 54, 54, 54, 'dasdasda', 'admin', '2020-07-11 21:49:02'),
(45, 14, '2 camere', '54', 'flat4.jpg', '', 725876457, 'decomandat', 54, 54, 54, 54, 'dasdasda', 'admin', '2020-07-11 21:49:02'),
(46, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'dafsvv', 'admin', '2020-07-11 21:50:30'),
(47, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'dafsvv', 'admin', '2020-07-11 21:50:30'),
(48, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'popopopopopo', 'admin', '2020-07-11 21:52:34'),
(49, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'popopopopopo', 'admin', '2020-07-11 21:52:34'),
(50, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'masina', 'admin', '2020-07-11 21:53:50'),
(51, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'masina', 'admin', '2020-07-11 21:53:50'),
(52, 14, '2 camere', '25', 'flat4.jpg', 'veve.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'dasdasdagdsf', 'admin', '2020-07-11 22:09:44'),
(53, 14, '2 camere', '25', 'flat4.jpg', 'veve.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'dasdasdagdsf', 'admin', '2020-07-11 22:09:44'),
(54, 14, '2 camere', '25', 'flat3.webp', 'flat4.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'fvwer', 'admin', '2020-07-11 22:14:22'),
(55, 14, '2 camere', '25', 'flat3.webp', 'flat4.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'fvwer', 'admin', '2020-07-11 22:14:22'),
(56, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'gasag', 'admin', '2020-07-11 22:14:41'),
(57, 14, '2 camere', '25', 'flat3.webp', 'flat5.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'gasag', 'admin', '2020-07-11 22:14:41'),
(58, 14, '2 camere', '25', '', '', 725876457, 'decomandat', 25, 25, 2, 25, '', 'admin', '2020-07-16 11:38:13'),
(59, 14, '2 camere', '25', '', '', 725876457, 'decomandat', 25, 25, 2, 25, '', 'admin', '2020-07-16 11:38:13'),
(60, 14, '2 camere', '25', 'atestat.jpg', '', 725876457, 'decomandat', 25, 25, 2, 25, 'dasdasda', 'admin', '2020-07-16 11:39:42'),
(61, 14, '2 camere', '25', 'atestat.jpg', '', 725876457, 'decomandat', 25, 25, 2, 25, 'dasdasda', 'admin', '2020-07-16 11:39:42'),
(62, 14, '2 camere', '25', 'dsad.jpg', 'ca.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'acum am postat', '', '2020-07-21 22:42:04'),
(63, 14, '2 camere', '25', 'dsad.jpg', 'ca.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'acum am postat', '', '2020-07-21 22:43:17'),
(64, 14, '2 camere', '25', 'dsad.jpg', 'ca.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'acum am postat', '', '2020-07-21 22:43:36'),
(65, 14, '2 camere', '25', 'flat1.jpg', '3.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'dasdasda', '', '2020-07-21 22:44:35'),
(66, 14, '2 camere', '25', 'dsad.jpg', 'ca.jpg', 725876457, 'decomandat', 25, 25, 2, 25, 'a mers', '', '2020-07-21 22:45:02');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idCotact` int(255) NOT NULL AUTO_INCREMENT,
  `mail` varchar(200) NOT NULL,
  `subiect` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  PRIMARY KEY (`idCotact`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `contact`
--

INSERT INTO `contact` (`idCotact`, `mail`, `subiect`, `text`) VALUES
(3, 'wiredo4072@provlst.com', 'Mi-am uitat parola', 'Cum pot sa-mi schimb parola daca nu o mai stiu'),
(4, 'hassan.rome@andyes.net', 'cerva', 'Nu pot sa adug un anunt ;\r\nImi da mereu eraoare \"pt a adauga un anunt trebuie sa va inregistrati \"'),
(5, 'cevasd@andyes.net', 'In caz ca nu va descurcati', 'username-ul meu este Nicolescu21312;\r\nDaca aveti vreo intrebare la care va pot raspunde  :am emailul mai sus'),
(6, 'motrogorzi@enayu.com', 'Salut!', 'Am vrut doar sa va salut '),
(7, 'ywvmt@wootap.me', 'Incarcare img', 'Nu pot sa incarc pozele pe care le-am facut cu apartamentul care doresc sa-l inchiriez'),
(8, 'nuaiciva@gmail.com', '', 'Cat timp  treb sa astept pana ma suna cineva');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(255) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL DEFAULT '',
  `prenume` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `parola` text NOT NULL,
  `imagine` varchar(200) NOT NULL DEFAULT 'images.png',
  `rol` int(1) NOT NULL DEFAULT 0,
  `data_adaugari` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`idUsers`, `nume`, `prenume`, `username`, `email`, `parola`, `imagine`, `rol`, `data_adaugari`) VALUES
(16, 'Cristofor2222', 'Bengescu222', 'ben222', 'bristof2orbengescu@smek.com', '$2y$10$5cbs7WlFlWD/YCG2/BZ.duib341Wza0G600YWYpdc1lp3Gp4AKTfe', '5.jpg', 0, '2020-05-27 09:59:11'),
(14, 'Admin', 'Admin.Admin2', 'admin', 'rent.apartments@rentables.ro', '$2y$10$P25TscTLoyVuDsePCiKvOONVwcUs4f.7WqEAQoxUMUocrwzjrgpQG', 'flat2.jpg', 1, '2020-05-26 08:44:45'),
(18, 'Mario ', 'Stanca', 'Stanca31', 'mariostanca@gmail.com', '$2y$10$GLGrHG0S9e0ip8B1RDNCT.0UzA00/QHIR83BYRgn6qDYULHLDd1Z2', 'images.png', 0, '2020-05-27 10:00:50'),
(19, 'Virgil ', 'Giurescu', 'Virgi', 'virgilgiurescu@yahoo.com', '$2y$10$urzYI4.f5.GWhLd6CnFd2.ddWJ.TbKYmfyUGeTA5h/hj3u1cNlL3q', 'images.png', 0, '2020-05-27 10:01:41'),
(20, 'Pereteanu ', 'Izbasa', 'Pereteanu ', 'pereteanuizbasa@gmail.com', '$2y$10$cN.t6m6aE1.5T9Cw7v1nJewSjsUeCjONrO28uuI1OZ8G95db0UqBe', 'images.png', 0, '2020-05-27 10:02:23'),
(21, 'Laurentia', ' Kogalniceanu', '12Laurentia', 'laurentiakogalniceanu@gmail.com', '$2y$10$Yoxu97GwRNuTdGztIuy1bOqBtf.qkDNHnx03iTH34Lk.AH6oxNDTa', 'images.png', 0, '2020-05-27 10:03:22'),
(22, 'Petronela ', 'Dalca', 'Petronela_Dalca', 'petronela_dalca@gmsil.com', '$2y$10$dwPCgAj9wnttzrp9qItAo.ZOLDvg9NfrkjrbxNa8Jbkm94uq1De1i', 'images.png', 0, '2020-05-27 10:04:22'),
(23, 'Ana', ' Nicolescu', 'Nicolescu21312', 'ananicolescu@gmail.com', '$2y$10$PE7hgjW.k.LtcgcVYsBAAunkVe97M2D9ZAS7.0OKk8yE.E6nv8CCi', 'images.png', 0, '2020-05-27 10:05:09'),
(24, 'Ioana ', 'Breban', 'Ioana ', 'wiredo4072@provlst.com', '$2y$10$.ihUeQ9zCca8pI/LaK0bAOD.UtF3dZAyCi2sCUvkrPnccJi7BEcK6', 'images.png', 0, '2020-05-27 10:06:21'),
(26, 'Cristofor2222', 'Bengescu222', 'ben222', 'bristof2orbengescu@smek.com', '$2y$10$5cbs7WlFlWD/YCG2/BZ.duib341Wza0G600YWYpdc1lp3Gp4AKTfe', '5.jpg', 0, '2020-05-27 09:59:11'),
(27, 'Admin', 'Admin.Admin2', 'admin', 'rent.apartments@rentables.ro', '$2y$10$P25TscTLoyVuDsePCiKvOONVwcUs4f.7WqEAQoxUMUocrwzjrgpQG', 'flat2.jpg', 1, '2020-05-26 08:44:45'),
(28, 'Mario ', 'Stanca', 'Stanca31', 'mariostanca@gmail.com', '$2y$10$GLGrHG0S9e0ip8B1RDNCT.0UzA00/QHIR83BYRgn6qDYULHLDd1Z2', 'images.png', 0, '2020-05-27 10:00:50'),
(29, 'Virgil ', 'Giurescu', 'Virgi', 'virgilgiurescu@yahoo.com', '$2y$10$urzYI4.f5.GWhLd6CnFd2.ddWJ.TbKYmfyUGeTA5h/hj3u1cNlL3q', 'images.png', 0, '2020-05-27 10:01:41'),
(30, 'Pereteanu ', 'Izbasa', 'Pereteanu ', 'pereteanuizbasa@gmail.com', '$2y$10$cN.t6m6aE1.5T9Cw7v1nJewSjsUeCjONrO28uuI1OZ8G95db0UqBe', 'images.png', 0, '2020-05-27 10:02:23'),
(31, 'Laurentia', ' Kogalniceanu', '12Laurentia', 'laurentiakogalniceanu@gmail.com', '$2y$10$Yoxu97GwRNuTdGztIuy1bOqBtf.qkDNHnx03iTH34Lk.AH6oxNDTa', 'images.png', 0, '2020-05-27 10:03:22'),
(32, 'Petronela ', 'Dalca', 'Petronela_Dalca', 'petronela_dalca@gmsil.com', '$2y$10$dwPCgAj9wnttzrp9qItAo.ZOLDvg9NfrkjrbxNa8Jbkm94uq1De1i', 'images.png', 0, '2020-05-27 10:04:22'),
(33, 'Ana', ' Nicolescu', 'Nicolescu21312', 'ananicolescu@gmail.com', '$2y$10$PE7hgjW.k.LtcgcVYsBAAunkVe97M2D9ZAS7.0OKk8yE.E6nv8CCi', 'images.png', 0, '2020-05-27 10:05:09'),
(34, 'Ioana ', 'Breban', 'Ioana ', 'wiredo4072@provlst.com', '$2y$10$.ihUeQ9zCca8pI/LaK0bAOD.UtF3dZAyCi2sCUvkrPnccJi7BEcK6', 'images.png', 0, '2020-05-27 10:06:21'),
(35, '', 'Alexandru Gabriel', 'root', 'floreaalexandru2002@gmail.com', '$2y$10$VEKlikk2FHVZGa09fJ35vuomSIADgFtQ4FuWywV1eV7RlME4nvl96', 'images.png', 0, '2020-07-24 15:26:38'),
(36, 'Florea', 'Tu', 'EuTu', '1@2.com', '$2y$10$BKaYndqodj0PCY3qwxOmfunuF3t8HUqs.TyY5HjeLHFnSfF13plnK', 'images.png', 0, '2020-07-24 15:30:30'),
(37, 'Florea', 'Alexandru Gabriel', 'eu', '2@1.com', '$2y$10$BZBwiZAbfu87R9T4FQJ1QOhvt.Z4vWuXyx3WXlu7phpEm77ryZr1m', 'images.png', 0, '2020-07-24 15:38:37'),
(38, 'Florea', 'Alexandru Gabriel', 'eutu123', 'ceva@gmail.com', '$2y$10$yVGIM2Ie1bHof/SW.BO/EuSL4fPLEFJeGYSshxcpJmz6EDaSs4Xm.', 'images.png', 0, '2020-07-24 15:39:01'),
(39, 'Florea', 'Alexandru Gabriel', '12', '3@2.com', '$2y$10$riLzRNHaBrFOa7ceBShWTOJcxGIDezFHMshc1Iu.7fx97RAF79LBe', 'images.png', 0, '2020-07-24 15:39:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
