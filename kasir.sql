-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2013 at 09:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_brg`, `harga`, `stok`) VALUES
('BRG001', 'Sunslick', 500, 31),
('BRG002', 'Mizone', 4300, 45),
('BRG003', 'Pulp Orange', 6500, 40),
('BRG004', 'TimTam', 1000, 65),
('BRG005', 'Biskuat', 700, 54),
('BRG006', 'Dua Kelinci', 2800, 12),
('BRG007', 'Tanggo', 1800, 18),
('BRG008', 'Chitato', 2000, 58),
('BRG009', 'Oreo', 1500, 74),
('BRG010', 'Taro Snack', 1700, 74),
('BRG011', 'Nutri Sari', 1000, 22),
('BRG012', 'Smartfreen', 290000, 27),
('BRG013', 'TelkomFlash', 500000, 47),
('BRG014', 'Samsung', 1200000, 17),
('BRG015', 'Maxtron', 450000, 57);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `id_pembeli` varchar(10) DEFAULT NULL,
  `kd_brg` varchar(10) DEFAULT NULL,
  `jlh_beli` int(11) DEFAULT NULL,
  `tgl_beli` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `kd_brg` varchar(10) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kd_brg`, `stok`) VALUES
('BRG001', 35),
('BRG002', 63),
('BRG003', 50),
('BRG004', 65),
('BRG005', 54),
('BRG006', 12),
('BRG007', 18),
('BRG008', 58),
('BRG009', 74),
('BRG010', 74),
('BRG011', 22),
('BRG012', 27),
('BRG013', 47),
('BRG014', 17),
('BRG015', 57),
('BRG016', 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
