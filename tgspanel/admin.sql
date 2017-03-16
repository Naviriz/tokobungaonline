-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jul 2015 pada 09.52
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `articleId` int(5) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(256) DEFAULT NULL,
  `articleContent` text,
  `articleDate` datetime DEFAULT NULL,
  `articleStatus` varchar(256) DEFAULT NULL,
  `articleImage` varchar(256) DEFAULT NULL,
  `userId` int(5) DEFAULT NULL,
  `categoryId` int(5) DEFAULT NULL,
  PRIMARY KEY (`articleId`),
  KEY `idxUserId` (`userId`),
  KEY `idxCategoryId` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoryarticle`
--

CREATE TABLE IF NOT EXISTS `categoryarticle` (
  `categoryId` int(5) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(256) DEFAULT NULL,
  `categoryDate` date DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoryproduct`
--

CREATE TABLE IF NOT EXISTS `categoryproduct` (
  `categoryId` int(5) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(256) DEFAULT NULL,
  `categoryDate` date DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `levelId` int(5) NOT NULL AUTO_INCREMENT,
  `levelName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`levelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`levelId`, `levelName`) VALUES
(1, 'administrator'),
(4, 'writerrr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` char(10) NOT NULL DEFAULT '',
  `productName` varchar(256) DEFAULT NULL,
  `productDescription` text,
  `productPrice` int(9) DEFAULT NULL,
  `productStock` int(5) DEFAULT NULL,
  `productSize` int(5) DEFAULT NULL,
  `productImage` varchar(256) DEFAULT NULL,
  `productUnit` varchar(30) NOT NULL,
  `supplierId` int(5) DEFAULT NULL,
  `categoryId` int(5) DEFAULT NULL,
  `userId` int(5) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `idxSupplierId` (`supplierId`),
  KEY `idxCategoryId` (`categoryId`),
  KEY `idxUserID` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierId` int(5) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(256) DEFAULT NULL,
  `supplierAddress` varchar(256) DEFAULT NULL,
  `supplierPhone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) DEFAULT NULL,
  `userPassword` varchar(200) DEFAULT NULL,
  `levelId` int(5) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `idx_idLevel` (`levelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userId`, `userName`, `userPassword`, `levelId`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'jokoooo', 'joko123', 4);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fkCategoryId` FOREIGN KEY (`categoryId`) REFERENCES `categoryarticle` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fkCategoryProduct` FOREIGN KEY (`categoryId`) REFERENCES `categoryproduct` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkSupplierID` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkUserId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_levelId` FOREIGN KEY (`levelId`) REFERENCES `level` (`levelId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
