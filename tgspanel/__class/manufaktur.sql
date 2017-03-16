-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jun 2015 pada 19.01
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manufaktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanbaku`
--

CREATE TABLE IF NOT EXISTS `bahanbaku` (
  `kodeBahanBaku` char(6) NOT NULL DEFAULT '',
  `namaBahanBaku` varchar(150) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stokmin` int(5) DEFAULT NULL,
  PRIMARY KEY (`kodeBahanBaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahanbaku`
--

INSERT INTO `bahanbaku` (`kodeBahanBaku`, `namaBahanBaku`, `stok`, `satuan`, `harga`, `stokmin`) VALUES
('KB0001', 'Kulit Buaya', 50, 'meter', 50000, 100),
('KB0002', 'Tali Sepatu', 100, 'meter', 2500, 100),
('KB0003', 'Kain', 200, 'meter', 70000, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detilpermintaan`
--

CREATE TABLE IF NOT EXISTS `detilpermintaan` (
  `noPermintaan` char(8) NOT NULL DEFAULT '',
  `kodeBahanBaku` char(6) NOT NULL DEFAULT '',
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`noPermintaan`,`kodeBahanBaku`),
  KEY `kodeBahanBaku` (`kodeBahanBaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detilpermintaan`
--

INSERT INTO `detilpermintaan` (`noPermintaan`, `kodeBahanBaku`, `jumlah`) VALUES
('PP150001', 'KB0002', 5),
('PP150003', 'KB0002', 2),
('PP150004', 'KB0001', 3),
('PP150004', 'KB0002', 2),
('PP150005', 'KB0002', 20),
('PP150005', 'KB0003', 40),
('PP150006', 'KB0001', 40),
('PP150006', 'KB0003', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detiltransbrgjadi`
--

CREATE TABLE IF NOT EXISTS `detiltransbrgjadi` (
  `idTrans` char(8) NOT NULL,
  `kodeBahanBaku` char(6) NOT NULL DEFAULT '',
  `jumlahStokDiPakai` int(5) DEFAULT NULL,
  PRIMARY KEY (`idTrans`,`kodeBahanBaku`),
  KEY `index_id_trans` (`idTrans`),
  KEY `index_kodeBahanBaku` (`kodeBahanBaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detiltransbrgjadi`
--

INSERT INTO `detiltransbrgjadi` (`idTrans`, `kodeBahanBaku`, `jumlahStokDiPakai`) VALUES
('BJ150001', 'KB0001', 6),
('BJ150001', 'KB0002', 4),
('BJ150001', 'KB0003', 8),
('BJ150002', 'KB0001', 6),
('BJ150002', 'KB0002', 4),
('BJ150002', 'KB0003', 8),
('BJ150003', 'KB0001', 7),
('BJ150003', 'KB0002', 8),
('BJ150004', 'KB0001', 16),
('BJ150004', 'KB0003', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detiltranspembelian`
--

CREATE TABLE IF NOT EXISTS `detiltranspembelian` (
  `noTransPembelian` char(8) NOT NULL DEFAULT '',
  `kodeBahanBaku` char(6) NOT NULL DEFAULT '',
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(8) DEFAULT NULL,
  PRIMARY KEY (`noTransPembelian`,`kodeBahanBaku`),
  KEY `kodeBahanBaku` (`kodeBahanBaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detiltranspembelian`
--

INSERT INTO `detiltranspembelian` (`noTransPembelian`, `kodeBahanBaku`, `jumlah`, `harga`) VALUES
('TP150001', 'KB0001', 3, 10000),
('TP150001', 'KB0002', 20, 3000),
('TP150002', 'KB0002', 2, 5000),
('TP150003', 'KB0001', 20, 50000),
('TP150003', 'KB0002', 100, 5000),
('TP150004', 'KB0001', 3, 2000),
('TP150005', 'KB0001', 5, 50000),
('TP150005', 'KB0003', 5, 24000),
('TP150006', 'KB0001', 3, 45000),
('TP150006', 'KB0003', 3, 5000),
('TP150007', 'KB0001', 5, 25000),
('TP150007', 'KB0003', 3, 2000),
('TP150008', 'KB0001', 3, 2000),
('TP150008', 'KB0002', 3, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detiltranspenjualan`
--

CREATE TABLE IF NOT EXISTS `detiltranspenjualan` (
  `noTransPenjualan` char(8) NOT NULL DEFAULT '',
  `idProduk` char(6) NOT NULL DEFAULT '',
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(7) DEFAULT NULL,
  PRIMARY KEY (`noTransPenjualan`,`idProduk`),
  KEY `idProduk` (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detiltranspenjualan`
--

INSERT INTO `detiltranspenjualan` (`noTransPenjualan`, `idProduk`, `jumlah`, `harga`) VALUES
('TJ150001', 'P00001', 23, 50000),
('TJ150001', 'P00002', 20, 80000),
('TJ150002', 'P00001', 10, 50000),
('TJ150003', 'P00001', 20, 50000),
('TJ150003', 'P00002', 3, 80000),
('TJ150004', 'P00001', 40, 50000),
('TJ150004', 'P00002', 2, 80000),
('TJ150005', 'P00001', 5, 50000),
('TJ150005', 'P00002', 3, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhanproduk`
--

CREATE TABLE IF NOT EXISTS `kebutuhanproduk` (
  `idProduk` char(6) NOT NULL DEFAULT '',
  `kodeBahanBaku` char(6) NOT NULL DEFAULT '',
  `jumlah` int(11) DEFAULT NULL,
  `idUser` int(5) DEFAULT NULL,
  PRIMARY KEY (`idProduk`,`kodeBahanBaku`),
  KEY `index_idProd` (`idProduk`),
  KEY `index_kodeBBaku` (`kodeBahanBaku`),
  KEY `index_idUserr` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kebutuhanproduk`
--

INSERT INTO `kebutuhanproduk` (`idProduk`, `kodeBahanBaku`, `jumlah`, `idUser`) VALUES
('P00001', 'KB0001', 3, 1),
('P00001', 'KB0002', 2, 1),
('P00001', 'KB0003', 4, 1),
('P00002', 'KB0001', 4, 1),
('P00002', 'KB0003', 4, 1),
('PB0003', 'KB0001', 20, 1),
('PB0003', 'KB0002', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `idLevel` int(5) NOT NULL AUTO_INCREMENT,
  `namaLevel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`idLevel`, `namaLevel`) VALUES
(1, 'administrator'),
(2, 'produksi'),
(4, 'penjualan'),
(13, 'pergudangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(5) NOT NULL AUTO_INCREMENT,
  `namaMenu` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `link`) VALUES
(1, 'Master Supplier', 'master_supplier.php\r\n'),
(2, 'Laporan Penjualan', 'laporan_penjualan.php'),
(3, 'Master Menu', 'master_menu.php'),
(4, 'Master Level', 'master_level.php'),
(5, 'Manage Priviledges', 'managePriviledges.php'),
(6, 'Laporan Stok', 'laporan_stok.php'),
(7, 'Transaksi Pembelian', 'pembelian.php'),
(8, 'Laporan Pembelian', 'laporanpembelian.php'),
(9, 'Master User', 'master_user.php'),
(10, 'Master Produk', 'master_produk.php'),
(11, 'Master Bahan Baku', 'master_bahanBaku.php'),
(12, 'Laporan Permintaan', 'laporanpermintaan.php'),
(13, 'Permintaan Produksi', 'permintaan.php'),
(14, 'Permintaan Bahan Baku', 'permintaanBarang.php'),
(15, 'Laporan Stock', 'LaporanStock.php'),
(16, 'Produksi Produk', 'produksiProduk.php'),
(17, 'Transaksi Penjualan', 'penjualan.php'),
(18, 'Laporan Penjualan', 'laporanPenjualan.php'),
(20, 'Laporan Produksi Produk', 'laporanProduksiProduk.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE IF NOT EXISTS `permintaan` (
  `noPermintaan` char(8) NOT NULL DEFAULT '',
  `tglPermintaan` date DEFAULT NULL,
  `idUser` int(5) DEFAULT NULL,
  `keterangan` enum('baru','ok') DEFAULT NULL,
  PRIMARY KEY (`noPermintaan`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`noPermintaan`, `tglPermintaan`, `idUser`, `keterangan`) VALUES
('PP150001', '2015-06-23', 7, 'ok'),
('PP150002', '2015-06-23', 7, 'baru'),
('PP150003', '2015-06-25', 7, 'ok'),
('PP150004', '2015-06-28', 7, 'baru'),
('PP150005', '2015-06-28', 7, 'ok'),
('PP150006', '2015-06-28', 7, 'baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `priviledges`
--

CREATE TABLE IF NOT EXISTS `priviledges` (
  `idMenu` int(5) NOT NULL DEFAULT '0',
  `idLevel` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMenu`,`idLevel`),
  KEY `index_idMenu` (`idMenu`),
  KEY `index_idLevel` (`idLevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `priviledges`
--

INSERT INTO `priviledges` (`idMenu`, `idLevel`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 13),
(7, 13),
(8, 1),
(8, 13),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(12, 13),
(13, 13),
(14, 2),
(15, 2),
(16, 2),
(17, 4),
(18, 4),
(20, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idProduk` char(6) NOT NULL DEFAULT '',
  `namaProduk` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `stok`, `harga`) VALUES
('P00001', 'Sepatu Anak', 150, 50000),
('P00002', 'Sepatu Dewasa', 200, 80000),
('PB0003', 'Sepatu Remaja', 150, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `idSupplier` int(5) NOT NULL AUTO_INCREMENT,
  `namaSupplier` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idSupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`, `alamat`, `noTelp`) VALUES
(1, 'PT Sejahtera', 'Jalan Surabaya', '089999922'),
(2, 'PT Arva Jayaaa', 'Jalan Kedung Baruk , Surabayaaa', '082929292');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksipembelian`
--

CREATE TABLE IF NOT EXISTS `transaksipembelian` (
  `noTransPembelian` char(8) NOT NULL DEFAULT '',
  `noRef` varchar(8) NOT NULL,
  `tglTrans` date DEFAULT NULL,
  `idUser` int(5) DEFAULT NULL,
  `idSupplier` int(5) DEFAULT NULL,
  PRIMARY KEY (`noTransPembelian`),
  KEY `fk_id_user` (`idUser`),
  KEY `index_id_supplier` (`idSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksipembelian`
--

INSERT INTO `transaksipembelian` (`noTransPembelian`, `noRef`, `tglTrans`, `idUser`, `idSupplier`) VALUES
('TP150001', 'RF150001', '2015-06-22', 8, 1),
('TP150002', 'RF150003', '2015-06-23', 8, 1),
('TP150003', 'RF150009', '2015-06-27', 8, 1),
('TP150004', 'RF0002', '2015-06-27', 8, 1),
('TP150005', 'asdas', '2015-06-28', 8, 1),
('TP150006', 'RF002', '2015-06-28', 8, 1),
('TP150007', 'RF0020', '2015-06-28', 8, 2),
('TP150008', 'RF15681', '2015-06-28', 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksipenjualan`
--

CREATE TABLE IF NOT EXISTS `transaksipenjualan` (
  `noTransPenjualan` char(8) NOT NULL DEFAULT '',
  `tglTrans` date DEFAULT NULL,
  `idUser` int(5) DEFAULT NULL,
  PRIMARY KEY (`noTransPenjualan`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksipenjualan`
--

INSERT INTO `transaksipenjualan` (`noTransPenjualan`, `tglTrans`, `idUser`) VALUES
('TJ150001', '2015-06-26', 9),
('TJ150002', '2015-06-26', 9),
('TJ150003', '2015-06-28', 9),
('TJ150004', '2015-06-28', 9),
('TJ150005', '2015-06-28', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transbarangjadi`
--

CREATE TABLE IF NOT EXISTS `transbarangjadi` (
  `idTrans` char(8) NOT NULL,
  `tglTrans` date DEFAULT NULL,
  `idProduk` char(6) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `idUser` int(5) DEFAULT NULL,
  PRIMARY KEY (`idTrans`),
  KEY `index_idProduk` (`idProduk`),
  KEY `Idx_IdUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transbarangjadi`
--

INSERT INTO `transbarangjadi` (`idTrans`, `tglTrans`, `idProduk`, `jumlah`, `idUser`) VALUES
('BJ150001', '2015-06-28', 'P00001', 2, 7),
('BJ150002', '2015-06-28', 'P00001', 2, 7),
('BJ150003', '2015-06-28', 'PB0003', 2, 7),
('BJ150004', '2015-06-28', 'P00002', 4, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'produksi', 'b41a09b40ee1ef79cf7621adda58ab3d'),
(8, 'pergudangan', '3115b2701a9679f3bfcc97db3772cc2e'),
(9, 'penjualan', '13bf2c8effae21d17a277520aa9b9277');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `idUser` int(5) NOT NULL DEFAULT '0',
  `idLevel` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`,`idLevel`),
  KEY `index_idUser` (`idUser`),
  KEY `index_idLevel` (`idLevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`idUser`, `idLevel`) VALUES
(1, 1),
(7, 2),
(8, 13),
(9, 4);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detilpermintaan`
--
ALTER TABLE `detilpermintaan`
  ADD CONSTRAINT `detilpermintaan_ibfk_2` FOREIGN KEY (`kodeBahanBaku`) REFERENCES `bahanbaku` (`kodeBahanBaku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no_permintaan` FOREIGN KEY (`noPermintaan`) REFERENCES `permintaan` (`noPermintaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detiltransbrgjadi`
--
ALTER TABLE `detiltransbrgjadi`
  ADD CONSTRAINT `FK_ID_TRANS` FOREIGN KEY (`idTrans`) REFERENCES `transbarangjadi` (`idTrans`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kd_bahanBaku` FOREIGN KEY (`kodeBahanBaku`) REFERENCES `bahanbaku` (`kodeBahanBaku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detiltranspembelian`
--
ALTER TABLE `detiltranspembelian`
  ADD CONSTRAINT `detiltranspembelian_ibfk_1` FOREIGN KEY (`kodeBahanBaku`) REFERENCES `bahanbaku` (`kodeBahanBaku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no_transpembelian` FOREIGN KEY (`noTransPembelian`) REFERENCES `transaksipembelian` (`noTransPembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detiltranspenjualan`
--
ALTER TABLE `detiltranspenjualan`
  ADD CONSTRAINT `FK_NO_TRANS` FOREIGN KEY (`noTransPenjualan`) REFERENCES `transaksipenjualan` (`noTransPenjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kebutuhanproduk`
--
ALTER TABLE `kebutuhanproduk`
  ADD CONSTRAINT `FK_ID_USER` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KODE_BBB` FOREIGN KEY (`kodeBahanBaku`) REFERENCES `bahanbaku` (`kodeBahanBaku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `priviledges`
--
ALTER TABLE `priviledges`
  ADD CONSTRAINT `FK_ID_LEVEL` FOREIGN KEY (`idLevel`) REFERENCES `level` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_MENU` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksipembelian`
--
ALTER TABLE `transaksipembelian`
  ADD CONSTRAINT `fk_id_supplier` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksipembelian_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksipenjualan`
--
ALTER TABLE `transaksipenjualan`
  ADD CONSTRAINT `transaksipenjualan_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transbarangjadi`
--
ALTER TABLE `transbarangjadi`
  ADD CONSTRAINT `FK_IDUSERRR` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produkk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `FK_IDLEVEL2` FOREIGN KEY (`idLevel`) REFERENCES `level` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IDUSER2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
