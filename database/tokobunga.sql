-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Nov 2015 pada 14.37
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokobunga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(200) NOT NULL,
  `album_seo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `album_title`, `album_seo`) VALUES
(1, 'Bali', 'bali'),
(3, 'Activities', 'activities');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `writer` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `status` enum('P','U') NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id_article`, `writer`, `title`, `title_seo`, `status`, `content`, `date`, `thumb_image`, `meta_keyword`, `meta_description`) VALUES
(1, 'Bambang', 'Petunjuk Pemesanan', 'petunjuk-pemesanan', 'P', '<ol>\r\n<li>Pilih produk yang hendak ada pesan yang terdapat pada list produk beserta kategori yang tersedia.</li>\r\n<li>Klik produk yang hendak anda beli. Maka akan muncul tampilan produk beserta detail maupun deskripsi produk. Bila sudah muncul, klik / pilih &ldquo;Add to chart&rdquo;. Maka akan muncul kehalaman keranjang belanja anda.</li>\r\n<li>Selanjutnya silahkan masukkan Qty / jumlah produk yang Anda pesan. Apabila masih ada produk lain yang hendak juga Anda beli, silahkan klik &ldquo;Add more items&rdquo;. Apabila tidak, silahkan klik &ldquo;Checkout&rdquo; untuk mengisi data pemesan untuk konfirmasi lebih lanjut.</li>\r\n<li>Setelah itu, apabila selesai klik &ldquo;Checkout&rdquo; maka isikan data Anda secara lengkap sebagai pemesan untuk konfirmasi produk yang Anda pesan supaya pesanan Anda tersampaikan.</li>\r\n<li>Klik &ldquo;Submit&rdquo; apabila seluruh tahap pemesanan Anda lakukan.</li>\r\n<li>Silahkan tunggu beberapa menit, maka akan Anda dapatkan balasan / tanggapan mengenai produk yang telah Anda pesan dari Kami.</li>\r\n</ol>', '2015-11-20', '', '', ''),
(2, 'Bambang', 'Informasi kami', 'informasi-kami', 'P', '<p>&nbsp;</p>\r\n<p>asdsadasdas</p>', '2015-11-02', '', '', ''),
(5, 'Bambang', 'Tentang kami', 'tentang-kami', 'P', '<p style="text-align: justify;">Disajikan oleh Bambang Supriadi Ir. Owner www.tokobungasurabayaonline.com Pasar bunga Kayoon merupakan satu satunya Pasar Bunga di Indonesia yang di bangun sendiri oleh Pedagang dan bertujuan untuk kesejahteraan Pedagang</p>\r\n<p style="text-align: justify;">Pada tahun 60an para Pedagang Bunga mulai tersebar di jalan-jalan besar di Surabaya.</p>\r\n<p style="text-align: justify;">Pada waktu itu Pemerintah kota Surabaya mempunyai inisiatif untuk mengumpulkan Pedagang yang sudah mulai banyak, karena pada saat itu masih banyak orang belanda yang tinggal di surabaya, meskipun sudah lama tidak ada penjajahan. Pencinta Bunga di Surabaya sangat banyak dan ini menumbuh kembangkan Petani Bunga semakin menjanjikan di sisi ekonomis.</p>\r\n<p style="text-align: justify;">Jadilah Pasar Bunga Kayoon yang dibangun dengan sederhana oleh Pedagang dengan stand Bunga yang masih tradisional dan sederhana pula, karena Pemerintah Kota Surabaya tidak memberi dana untuk membangun Pasar Bunga kayoon.</p>\r\n<p style="text-align: justify;">Seiring dengan bertambahnya tahun, mulai lah berkembang dan bertambah banyak jumlah Pedagang dan variasi barang dagangannya. Pada saat ini sudah ada 85 Pedagang Bunga dengan barang dagangannya termasuk Bunga Potong. Bunga Potong merupakan bunga yang sudah dipanen oleh Petani Bunga dan dijual per tangkai Bunga.</p>\r\n<p style="text-align: justify;">Hasil panen bunga di Pasar Kayoon juga diperoleh dari luar kota yaitu Pasuruan, Bangil, Batu dan bahkan dari Jawa Tengah, hasil panen tersebut dikirimkan setiap hari selasa dan jumat pagi.</p>\r\n<p style="text-align: justify;">Hasil panen tersebut langsung di manfaatkan oleh semua Pedagang untuk dirangkai, berupa Buket meja, Standing dan berupa Rangkaian Bunga Papan Leter. Adapun kegunaannya menurut ucapan adalah untuk Ulang Tahun, untuk Pernikahan, Pembukaan Toko dan untuk bela sungkawa.</p>\r\n<p style="text-align: justify;">Pedagang Bunga sekarang ini sudah mulai berbenah menjadi pedagang yang modern, dengan penataan barang dagangan, cara merangkai bunga dan administrasi dan dalam sisi marketing juga perhitungannya sangat detail dan rinci.</p>\r\n<p style="text-align: justify;">Pedagang bunga yang menggunakan jasa online sudah tidak asing lagi. Persaingan sudah tidak bisa dicegah, sehingga kita berduyun duyun dengan menjajakan barang dagangan yang berkualitas tinggi, harga bersaing dan Pelayanan yang prima dan ditunjang dengan tanggung jawab yang sangat besar.</p>\r\n<p style="text-align: justify;">Pelayanan terhadap konsumen sangat Prima, dengan dilihat dari ketepatan waktu Pengiriman, Kondisi kesegaran Bunga dan didesign dengan rapi dan menarik sesuai keinginan konsumen yang sudah disepakati.</p>\r\n<p style="text-align: justify;">Dengan menunjukkan foto bunga yang diangkat dari website sekelas internasioanal. Pedagang Pasar Bunga kayoon ( Florist ) bisa merangkai bunga yang senada ciptaan Florist Eropa atau dari Manca Negara. Ikuti terus kabar di website kami www.tokobungasurabayaonline.com</p>', '2015-11-02', '14825-beauty-6.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_id`
--

CREATE TABLE IF NOT EXISTS `article_id` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `id_category` int(5) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `status` enum('P','U') NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `id_language` int(5) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data untuk tabel `article_id`
--

INSERT INTO `article_id` (`id_article`, `id_category`, `writer`, `title`, `title_seo`, `status`, `content`, `date`, `thumb_image`, `meta_keyword`, `meta_description`, `id_language`) VALUES
(4, 2, 'Administrator', 'Free Internasional Shipping', 'free-internasional-shipping', 'P', 'We are so sure she will love the free Internasional shipping, LOL.', '2013-05-23', '', 'ryde dentist, local dentist, north ryde dentist, Macquarie Park Dentist, dentist. complete dental care, bupa, medibank, Dr Ellie Nazha, Dr, Alan Samakeh, Dr Hany Kammoun, Dr Behnam Shababi', 'At Complete Dental Care we offer a wide rage of dental services. Contact us on 02 9878 8487 for more information', 1),
(17, 2, 'Administrator', 'Strategic Business Plan', 'strategic-business-plan', 'P', '<p>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est.<br />\r\n<br />\r\nVivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem.\r\n<br />\r\n<br />\r\nIn porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.<br />\r\n</p>\r\n', '2012-11-19', '92941103root-canal.jpg', 'root canal therapy, RCT, ryde dentist, local dentist, north ryde dentist, Macquarie Park Dentist, dentist. complete dental care, bupa, medibank', 'At Complete Dental Care our Dentists specialise in Root Canal Therapy (RCT). Contact us today to see our dentist', 1),
(37, 2, 'Administrator', 'Pre Opening Consultancy', 'pre-opening-consultancy', 'P', '<p>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est.<br />\r\n<br />\r\nVivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem.\r\n<br />\r\n<br />\r\nIn porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.<br />\r\n</p>\r\n', '2012-11-19', '15168527crowns.jpg', 'crowns, RCT, ryde dentist, local dentist, north ryde dentist, Macquarie Park Dentist, dentist. complete dental care, bupa, medibank', 'At Complete Dental Care our Dentists specialise in Crowns. Contact us today to see our dentist', 1),
(38, 2, 'Administrator', 'Operational Turnaround', 'operational-turnaround', 'P', '<p>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est.<br />\r\n<br />\r\nVivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem.\r\n<br />\r\n<br />\r\nIn porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.<br />\r\n</p>\r\n', '2012-11-19', '82176417bridge.jpg', 'bridges, RCT, ryde dentist, local dentist, north ryde dentist, Macquarie Park Dentist, dentist. complete dental care, bupa, medibank', 'At Complete Dental Care our Dentists specialise in Bridges. Contact us today to see our dentist', 1),
(3, 1, 'Administrator', 'Concept & Feasibility', 'concept--feasibility', 'P', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est.<br /> <br /> Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. <br /> <br /> In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</p>', '2015-10-05', '', 'ryde dentist, local dentist, north ryde dentist, Macquarie Park Dentist, dentist. complete dental care, bupa, medibank', 'At Complete Dental Care our staff are all qualified and experienced in a wide rage of dental services.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bottom`
--

CREATE TABLE IF NOT EXISTS `bottom` (
  `id_bottom` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `sort` varchar(220) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_bottom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `bottom`
--

INSERT INTO `bottom` (`id_bottom`, `title`, `url`, `sort`, `image`) VALUES
(1, 'James Backer', 'Some Care patient', ' This is testimonial text from patient, This is testimonial text from patientThis is testimonial text from patient This is testimonial text from patient.', '96405311bottom-cosmeticdentistry.png'),
(6, 'George Mansion', 'healthy lifestyle Care patient', ' thank you life skills Bali. now i can have healthy lifestyle ', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(5) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `category_seo` varchar(100) NOT NULL,
  `headline` enum('Y','N') NOT NULL,
  `sort` int(5) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`, `category_seo`, `headline`, `sort`) VALUES
(1, 'Default', 'default', 'N', 1),
(2, 'Blog', 'blog', 'N', 2),
(9, 'oke', 'oke', 'N', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_retail`
--

CREATE TABLE IF NOT EXISTS `category_retail` (
  `id_category_retail` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `sort` int(200) NOT NULL,
  PRIMARY KEY (`id_category_retail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `category_retail`
--

INSERT INTO `category_retail` (`id_category_retail`, `category_name`, `sort`) VALUES
(1, 'BALI', 1),
(2, 'JAKARTA', 2),
(3, 'JAPAN', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(5) NOT NULL AUTO_INCREMENT,
  `id_article` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `id_article`, `id_parent`, `name`, `email`, `website`, `message`, `date`) VALUES
(1, 4, 0, 'Yongki Agustinus', 'me@sensestudio.net', 'http://www.sensestudio.net', 'Selamat Pagi', '2012-07-28'),
(2, 4, 1, 'Administrator', 'info@hagiosministry.org', 'http://hagiosministry.org', 'Selamat pagi juga', '2012-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_transaksi`
--

CREATE TABLE IF NOT EXISTS `detil_transaksi` (
  `id_transaksi` int(9) NOT NULL DEFAULT '0',
  `id_product` int(5) NOT NULL DEFAULT '0',
  `qty` int(5) DEFAULT NULL,
  `price` int(9) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`,`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_transaksi`, `id_product`, `qty`, `price`) VALUES
(4, 6, 1, 300),
(4, 23, 2, 100000),
(5, 22, 3, 120000),
(6, 33, 1, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `download_name` varchar(200) NOT NULL,
  `download_seo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id_download`, `download_name`, `download_seo`) VALUES
(1, 'Warta Gereja', 'warta-gereja'),
(2, 'Materi KKA', 'materi-kka'),
(3, 'Video', 'video');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(5) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(200) NOT NULL,
  `event_seo` varchar(200) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` varchar(200) NOT NULL,
  `event_start` varchar(50) NOT NULL,
  `event_finish` varchar(50) NOT NULL,
  `event_place` varchar(200) NOT NULL,
  `event_map` text NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `event_name`, `event_seo`, `event_description`, `event_date`, `event_start`, `event_finish`, `event_place`, `event_map`) VALUES
(1, 'KKR Pemuda oleh Bapak Muda', 'kkr-pemuda-oleh-bapak-muda', 'ini deskripsinya\r\n', '15-09', '08:00', '12:00', 'Kediaman Bapak diam', '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=35.136115,86.572266&amp;t=h&amp;z=4&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=35.136115,86.572266&amp;t=h&amp;z=4&amp;source=embed" style="color:#0000FF;text-align:left">Lihat Peta Lebih Besar</a></small>'),
(3, 'Kerja Bakti membangun konter hp', 'kerja-bakti-membangun-konter-hp', '<p>\r\nini isi event untuk kerja bakti membangun count ter hp\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet, \r\n</p>\r\n', '10-08', '07:00', 'Selesai', 'Rumah kebajikan', '<iframe width=''100%'' height=''350'' frameborder=''0'' scrolling=''no'' marginheight=''0'' marginwidth=''0'' src=''https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=id&amp;q=Jalan+Permai,+Kuta,+Badung,+Bali,+Indonesia&amp;ie=UTF8&amp;geocode=FUV9fP8d81XdBg&amp;split=0&amp;hq=&amp;hnear=Jalan+Permai,+Kuta,+Badung,+Bali,+Indonesia&amp;ll=-8.618683,115.168755&amp;spn=0.010714,0.021136&amp;t=h&amp;z=14&amp;output=embed''></iframe><br /><small><a href=''https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=id&amp;q=Jalan+Permai,+Kuta,+Badung,+Bali,+Indonesia&amp;ie=UTF8&amp;geocode=FUV9fP8d81XdBg&amp;split=0&amp;hq=&amp;hnear=Jalan+Permai,+Kuta,+Badung,+Bali,+Indonesia&amp;ll=-8.618683,115.168755&amp;spn=0.010714,0.021136&amp;t=h&amp;z=14'' style=''color:#0000FF;text-align:left''>Lihat Peta Lebih Besar</a></small>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(5) NOT NULL AUTO_INCREMENT,
  `id_download` int(5) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `hit` int(200) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `id_download`, `file_name`, `file`, `date`, `hit`) VALUES
(2, 1, 'Struktur Hagios PPT', '43826294STRUKTUR HAGIOS.ppt', '2012-07-16', 7),
(3, 1, '8 April 2012', '65789795BULETIN 08 APRIL 2012.pdf', '2012-07-23', 14),
(4, 0, '', '99386596', '2012-07-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `id_album`, `image_title`, `image`) VALUES
(16, 1, 'Bali Breakfast', '5303956Bali Breakfast.jpg'),
(18, 1, 'Bali Sunset', '37878418Bali Sunset.jpg'),
(19, 1, 'Tanah Lot Temple', '22671509Tanah Lot Temple - Hindu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id_inbox` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('R','U') NOT NULL DEFAULT 'U',
  PRIMARY KEY (`id_inbox`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`id_inbox`, `name`, `email`, `subject`, `message`, `date`, `status`) VALUES
(13, '', '', '', '', '2012-09-26', 'U'),
(14, 'Rachel', 'Rnazha@optusnet.com.au', 'Contact form submission', 'Test', '2012-09-26', 'U');

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(3) NOT NULL,
  `default` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `language`
--

INSERT INTO `language` (`id_language`, `name`, `code`, `default`) VALUES
(1, 'English', 'EN', '1'),
(2, 'Indonesian', 'ID', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `menu_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `menu_type` varchar(200) NOT NULL,
  `menu_link` varchar(200) NOT NULL,
  `open` varchar(200) NOT NULL,
  `status` enum('P','U') NOT NULL,
  `sort` int(5) NOT NULL,
  `id_language` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `menu_title`, `menu_type`, `menu_link`, `open`, `status`, `sort`, `id_language`) VALUES
(10, 2, 'Rental & Living', '1', '#', 'P', 'P', 19, 2),
(9, 2, 'Education & School', '5', 'read-38-education--school', 'P', 'P', 4, 1),
(4, 0, 'Contact Us', '2', 'contact', 'P', 'P', 18, 1),
(5, 2, 'Viza & Legal', '5', 'read-3-viza--legal', 'P', 'P', 1, 1),
(7, 2, 'Investment & Properties', '5', 'read-4-investment--properties', 'P', 'P', 2, 1),
(8, 2, 'Banking & Insurance', '5', 'read-17-banking--insurance', 'P', 'P', 3, 1),
(3, 0, 'Usefull Links', '5', 'read-2-usefull-links', 'P', 'P', 3, 1),
(2, 0, 'Services', '1', '#', 'P', 'P', 2, 1),
(1, 0, 'Home', '2', 'home', 'P', 'P', 1, 1),
(10, 2, 'Rental & Living', '5', 'read-1-home', 'P', 'P', 19, 1),
(9, 2, 'Education & School', '5', 'read-38-education--school', 'P', 'P', 4, 2),
(4, 0, 'ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð½Ð°Ð¼Ð¸', '2', 'contact', 'P', 'P', 18, 2),
(5, 2, 'Viza & Legal', '5', 'read-3-viza--legal', 'P', 'P', 1, 2),
(7, 2, 'Investment & Properties', '5', 'read-4-investment--properties', 'P', 'P', 2, 2),
(11, 8, 'Banking', '5', 'read-41-banking', 'P', 'P', 20, 1),
(8, 2, 'Banking & Insurance', '5', 'read-17-banking--insurance', 'P', 'P', 3, 2),
(3, 0, 'Ð¿Ð¾Ð»ÐµÐ·Ð½Ñ‹Ðµ ÑÑÑ‹Ð»ÐºÐ¸', '5', 'read-2-usefull-links', 'P', 'P', 3, 2),
(2, 0, 'ÑƒÑÐ»ÑƒÐ³Ð¸', '1', '#', 'P', 'P', 2, 2),
(1, 0, 'Ð´Ð¾Ð¼Ð°', '2', 'home', 'P', 'P', 1, 2),
(11, 8, 'Banking', '5', 'read-41-banking', 'P', 'P', 20, 2),
(12, 8, 'Insurance', '5', 'read-42-insurance', 'P', 'P', 21, 1),
(12, 8, 'Insurance', '5', 'read-42-insurance', 'P', 'P', 21, 2),
(13, 12, 'Test LAST', '1', '#', 'P', 'P', 22, 1),
(13, 12, 'russian', '1', '#', 'P', 'P', 22, 2),
(14, 2, 'Accordion', '5', 'read-43-accordion', 'P', 'P', 23, 1),
(14, 2, 'Accordion', '5', 'read-43-accordion', 'P', 'P', 23, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(5) NOT NULL AUTO_INCREMENT,
  `id_category` int(5) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_name_seo` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `coming_date` date NOT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_size` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `product_name`, `product_name_seo`, `description`, `price`, `coming_date`, `product_image`, `product_size`) VALUES
(1, 1, 'Papan Bunga Duka Cita 6', 'papan-bunga-duka-cita-6', '<p>Rangkaian bunga dengan pojok selalu dipenuhi bunga</p>', 750000, '2015-11-20', '32998-105_0649.jpg', ''),
(17, 1, 'Papan Bunga Duka Cita 8', 'papan-bunga-duka-cita-8', '<p>Papan bunga &nbsp;cita dengan dasaran dan tulisan menggunakan digital printing. Bunga di rangkai dengan jenis bunga segar. Ukuran papan lebar 2.5meter dan panjang 1.5meter.</p>', 600000, '2015-11-20', '96481-119_4355.jpg', '1,5 x 2,5meter'),
(22, 1, 'Papan Bunga Duka Cita 1', 'papan-bunga-duka-cita-1', '<p>Rangkaian bunga duka cita spesial dengan ukuran papan 3 meter, rangkaian bunga penuh. Atas mahkota, pinggir penuh bunga dan pilihan bunga dengan kualitas nomor satu.</p>', 1500000, '2015-11-20', '32587-picture-085.jpg', ''),
(23, 1, 'Papan Bunga Duka Cita 5', 'papan-bunga-duka-cita-5', '<p>Merangkai bunga papan duka cita harus disesuaikan dengan Permintaan Pelanggan bunga, seperti Giant Supermarket, selalu bila kebutuan tentang bunga mesti hubungi kita. Sangat mudah sekali hubungi kita bila pesan karangan bunga, pesan bunga lewat telepon, pesan bunga lewat fax, pesan bunga lewat handphone, pesan bunga via shot massage service, pesan bunga online, pesan bunga lewat watsAapp, bbm.</p>\r\n<p>Ukuran 250x150cm dengan bunga segar keliling</p>', 750000, '2015-11-20', '17834-picture-44073.jpg', ''),
(6, 2, 'Standing Duka Cita 1', 'standing-duka-cita-1', '<p>Bunga segar : Stargeser, Krisan, Gelbra, Pikok, Aster</p>\r\n<p>Daun : Song of India, Pilo</p>', 500000, '2015-11-20', '50784-1-standing-d.jpg', ''),
(7, 2, 'Standing Duka Cita 2', 'standing-duka-cita-2', '<p>Bunga Segar : Gelbra, Stargeser, Pikok, Krisan, Aster, Bunga Balon</p>\r\n<p>Daun : Pilo, Song Of India, Srigading.</p>', 500000, '2015-11-20', '47597-2-standing-d.jpg', ''),
(34, 9, 'Bouquet 7', 'bouquet-7', '<p>Bunga Artifisial</p>', 500000, '2015-11-20', '64603-7-buket-500.000.jpg', ''),
(35, 9, 'Bouquet 8', 'bouquet-8', '<p>Bunga Segar : Tiger Lily, Krisan, Mawar, Anggrek, Snake dragon</p>\r\n<p>Daun : Leather Leaf, Florida Beauty</p>\r\n<p>&nbsp;</p>', 600000, '2015-11-20', '93970-8-buket-600.000.jpg', ''),
(36, 9, 'Bouquet 1', 'bouquet-1', '<p>Bunga Segar : Mawar, Stargeser, Samrok, Pompom, Anturium</p>\r\n<p>Daun : Leather Leaf, Florida Beauty</p>\r\n<p>&nbsp;</p>', 400000, '2015-11-20', '79253-1-buket-400.000.jpg', ''),
(31, 9, 'Bouquet 4', 'bouquet-4', '<p>Bunga Segar : Gelbra, Brasika, Mawar, Pompom, Krisan, Anturium, Tiger Lely, Casablanka.</p>\r\n<p>Daun : &nbsp;Song Of India, Leather Leaf</p>\r\n<p>&nbsp;</p>', 400000, '2015-11-20', '71652-4-buket-400.000.jpg', ''),
(32, 9, 'Bouquet 5', 'bouquet-5', '<p>Standing Bunga Artifisial</p>', 600000, '2015-11-20', '78054-5-buket-600.000.jpg', ''),
(33, 9, 'Bouquet 6', 'bouquet-6', '<p>Standing Bunga Artifisial</p>', 600000, '2015-11-20', '66461-6-buket-600.000.jpg', ''),
(29, 9, 'Bouquet 2', 'bouquet-2', '<p>Bunga Segar : Mawar, Gelbra, Tiger Lily, Anggrek, Pikok, Carnation</p>\r\n<p>Daun : Leather Leaf, Florida Beauty</p>\r\n<p>&nbsp;</p>', 500000, '2015-11-20', '19559-2-buket-500.000.jpg', ''),
(30, 9, 'Bouquet 3', 'bouquet-3', '<p>Bunga Segar : Gelbra, Brasika, Mawar, Pompom, Krisan, Anturium, Tiger Lely, Casablanka.</p>\r\n<p>Daun : &nbsp;Song Of India, Leather Leaf</p>\r\n<p>&nbsp;</p>', 500000, '2015-11-20', '35173-7-buket-500.000.jpg', ''),
(25, 1, 'Papan Bunga Duka Cita 3', 'papan-bunga-duka-cita-3', '<p>Design bunga papan duka cita yang seperti contoh dengan Pengirim bunga dari PT. FREEPORT INDONESIA adalah tergolong model rangkaian bunga yang baru. Dengan slempang diatas sangat lebar yang dibuat dari stearofoam dengan gambar pita bunga, rangkaian bunga magkota diatasnya, dan rangkaian bunga dibawah kanan kiri itu istilah dari florist surabaya karangan bunga kupingan.</p>\r\n<p>Ukuran 250x150cm dengan dikelilingi bunga mahkota + bawah.</p>', 1000000, '2015-11-20', '63531-105_1031.jpg', ''),
(28, 9, 'Bouquet 1', 'bouquet-1', '<p>Bunga segar : Anturium, Anggrek Dendron, Gelbra, Pompom, Krisan</p>\r\n<p>Daun : Song Of India, Leather Leaf</p>\r\n<p>&nbsp;</p>', 400000, '2015-11-20', '51485-1-buket-400.000.jpg', ''),
(24, 1, 'Papan Bunga Duka Cita 4', 'papan-bunga-duka-cita-4', '<p>Rangkaian bunga papan duka cita model terbaru degan selempang besar dan dari stearofoam. Rangkain bunga mahkota dan bawah kanan kiri ada rangkaian.</p>\r\n<p>Design bunga papan duka cita yang seperti contoh dengan Pengirim bunga dari PT. FREEPORT INDONESIA adalah tergolong model rangkaian bunga yang baru. Dengan slempang diatas sangat lebar yang dibuat dari stearofoam dengan gambar pita bunga, rangkaian bunga magkota diatasnya, dan rangkaian bunga dibawah kanan kiri itu istilah dari florist surabaya karangan bunga kupingan</p>\r\n<p>&nbsp;</p>', 1000000, '2015-11-20', '35554-picture-44081.jpg', ''),
(26, 1, 'Papan Bunga Duka Cita 2', 'papan-bunga-duka-cita-2', '<p>RANGKAIAN BUNGA PAPAN DUKA CITA DENGAN PENUH BUNGA KANAN KIRI DAN ATAS BAWAH. DIDESIGN KHUSUS BAGI PEMESAN BUNGA YANG MENGINGINKAN KWALITAS DAN BANYAKNYA BUNGA DIJAMIN. BESARNYA PAPAN 2.5 X 1.5 METER.&nbsp;</p>', 1300000, '2015-11-20', '51005-2-papan-d.jpg', ''),
(27, 1, 'Papan Bunga Duka Cita 7', 'papan-bunga-duka-cita-7', '<p>Papan bunga cita dengan dasaran dan tulisan menggunakan digital printing.</p>\r\n<p>Bunga dirangkai dengan jenis bunga segar. ukuran papan 2.5 meter lebar dan panjang 1.5 meter</p>\r\n<p>&nbsp;</p>', 600000, '2015-11-20', '96360-7-papan-d.jpg', ''),
(37, 8, 'Papan Bunga Selamat Dan Bahagia 1', 'papan-bunga-selamat-dan-bahagia-1', '', 850000, '2015-11-20', '14619-1-papan-b-850.000.jpg', ''),
(38, 8, 'Papan Bunga Selamat Dan Bahagia 2', 'papan-bunga-selamat-dan-bahagia-2', '', 500000, '2015-11-20', '64918-2-papan-b-500.000.jpg', ''),
(39, 8, 'Papan Bunga Selamat Dan Bahagia 3', 'papan-bunga-selamat-dan-bahagia-3', '', 600000, '2015-11-20', '91511-3-papan-b-600.000.jpg', ''),
(40, 8, 'Papan Bunga Selamat Dan Bahagia 4', 'papan-bunga-selamat-dan-bahagia-4', '', 1500000, '2015-11-20', '24263-4-papan-b-1.500.000.jpg', ''),
(42, 8, 'Papan Bunga Selamat Dan Bahagia 7', 'papan-bunga-selamat-dan-bahagia-7', '', 1500000, '2015-11-20', '19278-7papan-b-1.500.000.jpg', ''),
(43, 8, 'Papan Bunga Selamat Dan Bahagia 6', 'papan-bunga-selamat-dan-bahagia-6', '', 1300000, '2015-11-20', '34669-6-papan-b-1.300.000.jpg', ''),
(44, 8, 'Papan Bunga Selamat Dan Bahagia 5', 'papan-bunga-selamat-dan-bahagia-5', '', 1500000, '2015-11-20', '32810-5-papan-b-1.500.000.jpg', ''),
(47, 8, 'Papan Bunga Selamat Dan Bahagia 8', 'papan-bunga-selamat-dan-bahagia-8', '', 1000000, '2015-11-20', '47358-8-papan-b-1.000.000.png', ''),
(48, 8, 'Papan Bunga Selamat Dan Bahagia 9', 'papan-bunga-selamat-dan-bahagia-9', '', 750000, '2015-11-20', '67060-9-papan-b-750.000.png', ''),
(49, 8, 'Papan Bunga Selamat Dan Bahagia 10', 'papan-bunga-selamat-dan-bahagia-10', '', 1300000, '2015-11-20', '24874-10-papan-b-1.300.000.jpg', ''),
(50, 4, 'Papan Bunga Selamat Dan Sukses 1', 'papan-bunga-selamat-dan-sukses-1', '', 1500000, '2015-11-20', '28656-1-papan-s-1.500.000.jpg', ''),
(51, 4, 'Papan Bunga Selamat Dan Sukses 2', 'papan-bunga-selamat-dan-sukses-2', '', 1000000, '2015-11-20', '89459-2-papan-s-1.000.000.jpg', ''),
(52, 4, 'Papan Bunga Selamat Dan Sukses 3', 'papan-bunga-selamat-dan-sukses-3', '', 750000, '2015-11-20', '10226-3-papan-s-750.000.jpg', ''),
(53, 4, 'Papan Bunga Selamat Dan Sukses 4', 'papan-bunga-selamat-dan-sukses-4', '', 750000, '2015-11-20', '5504-4-papan-s-750.000.jpg', ''),
(54, 4, 'Papan Bunga Selamat Dan Sukses 5', 'papan-bunga-selamat-dan-sukses-5', '', 1200000, '2015-11-20', '91541-5-papan-s-1.200.000.jpg', ''),
(55, 4, 'Papan Bunga Selamat Dan Sukses 6', 'papan-bunga-selamat-dan-sukses-6', '', 600000, '2015-11-20', '66489-6-papan-s-600.000.jpg', ''),
(56, 4, 'Papan Bunga Selamat Dan Sukses 7', 'papan-bunga-selamat-dan-sukses-7', '', 750000, '2015-11-20', '81465-7-papan-s-750.000.jpg', ''),
(57, 3, 'Standing Selamat Dan Sukses 1', 'standing-selamat-dan-sukses-1', '', 750000, '2015-11-20', '75456-1-standing-s-750.000.jpg', ''),
(58, 10, 'Standing Selamat Dan Bahagia 1', 'standing-selamat-dan-bahagia-1', '', 850000, '2015-11-20', '84695-1-standing-b-850.000.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id_category` int(5) NOT NULL AUTO_INCREMENT,
  `id_collection` int(5) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_name_seo` varchar(200) NOT NULL,
  `sort` int(100) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id_category`, `id_collection`, `category_name`, `category_name_seo`, `sort`) VALUES
(1, 1, 'Duka Cita', 'duka-cita', 1),
(2, 2, 'Duka Cita', 'duka-cita', 1),
(3, 2, 'Selamat Dan Sukses', 'selamat-dan-sukses', 2),
(4, 1, 'Selamat Dan Sukses', 'selamat-dan-sukses', 4),
(8, 1, 'Selamat Dan Bahagia', 'selamat-dan-bahagia', 0),
(9, 3, 'Bouquet', 'bouquet', 0),
(10, 2, 'Selamat Dan Bahagia', 'selamat-dan-bahagia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_collection`
--

CREATE TABLE IF NOT EXISTS `product_collection` (
  `id_collection` int(5) NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(200) NOT NULL,
  `collection_name_seo` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id_collection`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `product_collection`
--

INSERT INTO `product_collection` (`id_collection`, `collection_name`, `collection_name_seo`, `image`, `info`) VALUES
(1, 'Papan Bunga', 'papan-bunga', '35028076collection-1.jpg', '<p>Sebuah papan yang di dasarkan pada tulisan dengan hiasan bunga yang indah</p>'),
(2, 'Standing Flower', 'standing-flower', '55389404collection-1.jpg', '<p>Rangkaian bunga yang memakai stand dari bahan besi dan dari bahan kayu</p>'),
(3, 'Bouquet', 'bouquet', '57287598product8.jpg', '<p>Hiasan bunga dengan motif pot yang unik untuk memperindah rumah anda</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_colour`
--

CREATE TABLE IF NOT EXISTS `product_colour` (
  `id_colour` int(5) NOT NULL AUTO_INCREMENT,
  `id_product` int(5) NOT NULL,
  `colour` varchar(200) NOT NULL,
  `sort` int(100) NOT NULL,
  PRIMARY KEY (`id_colour`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `product_colour`
--

INSERT INTO `product_colour` (`id_colour`, `id_product`, `colour`, `sort`) VALUES
(1, 1, '#0081bf', 1),
(3, 0, '#33FF33', 1),
(5, 1, '#00CC99', 2),
(11, 4, '#003300', 1),
(10, 3, '#6666FF', 1),
(9, 3, '#006633', 1),
(12, 4, '#3399FF', 1),
(13, 5, '#009966', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id_pi` int(5) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `sort` int(100) NOT NULL,
  PRIMARY KEY (`id_pi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `product_images`
--

INSERT INTO `product_images` (`id_pi`, `id_product`, `title`, `image`, `sort`) VALUES
(1, 1, 'ring', '37704468product1.jpg', 1),
(17, 12, 'lorem', '66143799product8.jpg', 1),
(16, 11, 'Gift Diamond Necklace', '53869629product7.jpg', 8),
(15, 10, 'Shared Prong Engagement', '78213501product6.jpg', 7),
(14, 9, 'Yellow Ring Diamond', '30133057product5.jpg', 6),
(13, 8, 'Platinum Diamond', '19052124product4.jpg', 5),
(12, 7, 'Diamond Stud Earrings ', '47167969product3.jpg', 4),
(11, 6, 'diamond ring', '39019776product2.jpg', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` int(5) NOT NULL AUTO_INCREMENT,
  `promo` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `promo`, `image`) VALUES
(1, 'Get 30% Off Valentine Day Promo', 'ring2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retail`
--

CREATE TABLE IF NOT EXISTS `retail` (
  `id_retail` int(5) NOT NULL AUTO_INCREMENT,
  `id_category_retail` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone_1` varchar(200) NOT NULL,
  `phone_2` varchar(200) NOT NULL,
  `fax_1` varchar(200) NOT NULL,
  `fax_2` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `sort` int(200) NOT NULL,
  PRIMARY KEY (`id_retail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `retail`
--

INSERT INTO `retail` (`id_retail`, `id_category_retail`, `name`, `address`, `phone_1`, `phone_2`, `fax_1`, `fax_2`, `website`, `sort`) VALUES
(1, 1, 'SURFER''S PARADISE KELAN', 'Jl By Pass Ngurah Rai No. 210, Kelan - Tuban - Bali - Indonesia', '+62 361 705385', '', '', '', 'surfersparadisebaliindo.com', 1),
(2, 1, 'SURFER''S PARADISE LEGIAN', 'Jl Legian No. 363 Legian - Bali - Indonesia', '+62 361 762 744', '', '', '', 'surfersparadisebaliindo.com', 2),
(3, 2, 'SURFER', 'Jl Legian Kaja, Legian Kaja - Bali - Indonesia', '+62 361 759 547', '', '', '', 'surfersparadisebaliindo.com', 1),
(4, 1, 'SURFER''S PARADISE LEGIAN KAJA', 'Jl Legian Kaja, Legian Kaja - Bali - Indonesia', '+62 361 759 547', '', '', '', 'surfersparadisebaliindo.com', 3),
(5, 1, 'BALI BARRELL LEGIAN', 'Jl Legian no.', '+62 361 767 240', '', '', '', '', 0),
(6, 1, 'BLUE OCEAN LEGIAN', 'Jl Legian no 99A', '+62 361 754 855', '', '+62 361 768 303', '', '', 4),
(7, 1, 'ANANTARA SEMINYAK RESORT & SPA', 'Jl Dhyana Pura Seminyak - Bali - Indonesia', '+62 361 737773', '', '+62 361 737773', '', 'anantara.com', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `site_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` text NOT NULL,
  `gmap` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `contact_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`site_name`, `email`, `phone_number`, `gmap`, `meta_keyword`, `meta_description`, `contact_text`) VALUES
('Diamond Views', 'diamondviews@gmail.com', 'Copyright Â© 2013 - <a href="home">Diamond Views</a> - All Rights Reserved.', 'http://www.facebook.com/diamondviews', 'http://www.twitter.com/diamondviews', 'http://www.path.com/diamondviews', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id_slide` int(5) NOT NULL AUTO_INCREMENT,
  `page` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `sort` int(5) NOT NULL,
  `img_title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `page`, `image`, `sort`, `img_title`) VALUES
(2, 'beranda', 'img1.png', 1, '#caption1'),
(4, 'beranda', 'img2.png', 0, '#caption2'),
(5, 'beranda', 'img3.png', 2, '#caption3'),
(8, 'beranda', 'img4.png', 3, '#caption4'),
(10, 'blog', '27447510blog-header.png', 1, NULL),
(11, 'lookbook', '1327515lookbook.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id_subscribe` int(5) NOT NULL AUTO_INCREMENT,
  `subscribe` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_subscribe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `subscribe`) VALUES
(1, 'thanks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `name`, `content`, `image`) VALUES
(7, 'LINES', 'September 2012', '92898559press-1.jpg'),
(8, 'SHOP TILL YOU DROP', 'September 2012', '62054443press-2.jpg'),
(9, 'SHOP TILL YOU DROP', 'August 2012', '71710205press-3.jpg'),
(10, 'LINES', 'August 2012', '39437866press-4.jpg'),
(11, 'INSTYLE', 'September 2013', '31713867press-5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id_testimonial` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_testimonial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id_testimonial`, `title`, `content`, `name`) VALUES
(1, 'Customer Testimonials', 'My wive love the ring that i build so much, thank you DiamondView', 'John Doe, Adelaide'),
(2, 'Lorem Ipsum dolor sit amet  ', 'Lorem ipsum dolor sit amet lorem ipsum sit dolor amet ', 'Dolor Sit Amet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(9) NOT NULL AUTO_INCREMENT,
  `transaksi_date` date DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` text,
  `status` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `transaksi_date`, `full_name`, `address`, `phone_number`, `email`, `message`, `status`) VALUES
(4, '2015-11-16', 'Tantri Mindrawan', 'asdadasdasdsadadasda', '089655067307', 'tantri07@yahoo.com', 'asdasdasdasdas', 'N'),
(5, '2015-11-16', 'hanif mahardika', 'asdasdasd', '0828271223', 'tantri07.tm@gmail.com', 'asdasdas', 'N'),
(6, '2015-11-20', 'anif', 'asdasdsad', '0202902', 'hanif@stikom.edu', 'asdasdas', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `userPassword` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `full_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `block` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `userName`, `userPassword`, `full_name`, `email`, `phone`, `level`, `block`) VALUES
(1, 'bambang30', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'Bambang', 'info@diamondviews.com', '-', 'admin', 'N'),
(3, 'tantri', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'tantri mindrawan', 'tantri07@yahoo.com', '08as9d98sda', 'user', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
