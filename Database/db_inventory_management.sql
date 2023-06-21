-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 10.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `idCheckout` int(11) NOT NULL,
  `idOrder` int(9) DEFAULT NULL,
  `SKU` varchar(20) NOT NULL,
  `productPrice` int(9) NOT NULL,
  `qtyOrder` int(9) NOT NULL,
  `priceAmount` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`idCheckout`, `idOrder`, `SKU`, `productPrice`, `qtyOrder`, `priceAmount`) VALUES
(1, 2, 'BJR-TBL055-PNJ6', 3000, 3, 9000),
(34, 4, 'BJR-TBL055-PNJ6', 1000, 1, 1000),
(35, 4, 'BJR-TBL070-PNJ6', 4000, 1, 4000),
(36, 5, 'BJR-TBL070-PNJ6', 4000, 2, 8000),
(37, 5, 'BJR-TBL055-PNJ6', 1000, 2, 2000),
(38, 6, 'BJR-TBL055-PNJ6', 1000, 4, 4000),
(39, 6, 'BJR-TBL070-PNJ6', 4000, 7, 28000),
(40, 7, 'BJR-TBL055-PNJ6', 1000, 2, 2000),
(41, 7, 'BJR-TBL060-PNJ6', 2000, 3, 6000),
(42, 7, 'BJR-TBL070-PNJ6', 4000, 4, 16000),
(43, 8, 'BJR-TBL065-PNJ6', 3000, 2, 6000),
(44, 8, 'BJR-TBL070-PNJ6', 4000, 6, 24000),
(45, 8, 'BJR-TBL055-PNJ6', 1000, 2, 2000),
(46, 8, 'BJR-TBL060-PNJ6', 2000, 2, 4000),
(47, 9, 'BJR-TBL055-PNJ6', 1000, 4, 4000),
(48, 9, 'BJR-TBL060-PNJ6', 2000, 1, 2000),
(49, 9, 'BJR-TBL065-PNJ6', 3000, 1, 3000),
(50, 9, 'BJR-TBL070-PNJ6', 4000, 1, 4000),
(51, 9, 'BJR-TBL075-PNJ6', 5000, 7, 35000),
(52, 10, 'BJR-TBL055-PNJ6', 1000, 2, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(11) NOT NULL,
  `buyerName` varchar(20) NOT NULL,
  `bankAccountNumber` varchar(20) NOT NULL DEFAULT '-',
  `orderTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paymentStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `buyerName`, `bankAccountNumber`, `orderTimestamp`, `paymentStatus`) VALUES
(1, 'rizal', '-', '2023-06-17 09:45:59', 0),
(2, 'orang', '-', '2023-06-18 16:15:58', 0),
(3, 'jihan', '14213412341234', '2023-06-19 17:42:29', 0),
(4, 'jihan', '14213412341234', '2023-06-19 17:44:44', 0),
(5, 'unaki', '444-44-4-4-444', '2023-06-19 17:45:23', 0),
(6, 'nabila', '234-123654-34', '2023-06-19 18:27:31', 0),
(7, 'sdf', '62322-231-123', '2023-06-19 19:19:40', 0),
(8, '', '', '2023-06-20 06:45:18', 0),
(9, 'jihyo', '44233-23456-23', '2023-06-20 06:55:50', 0),
(10, 'dahyun', '134-34-1240124-12', '2023-06-20 07:19:58', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `SKU` varchar(20) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productDescription` varchar(50) NOT NULL,
  `sellingPrice` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`SKU`, `productName`, `productDescription`, `sellingPrice`) VALUES
('BJR-TBL055-PNJ6', 'Baja Ringan 55', 'Tebal : 0.55, Panjang : 6M', 1000),
('BJR-TBL060-PNJ6', 'Baja Ringan 60', 'Tebal : 0.60, Panjang : 6M', 2000),
('BJR-TBL065-PNJ6', 'Baja Ringan 65', 'Tebal : 0.65, Panjang : 6M', 3000),
('BJR-TBL070-PNJ6', 'Baja Ringan 70', 'Tebal : 0.70, Panjang : 6M', 4000),
('BJR-TBL075-PNJ6', 'Baja Ringan 75', 'Tebal : 0.75, Panjang : 6M', 5000),
('BSLDFJ', '3f423vgrebv', '2bredgdfgbdsg', 1020),
('BSLDFJasdf', ' sdfvasdf', 'vadfsdvfadvfasdvfasdvfs', 1000),
('BSLDFJaswerfwe', ' asdfvag dsv', 'avsdfas  f ', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purcase`
--

CREATE TABLE `tbl_purcase` (
  `idPurcase` int(11) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `buyingPrice` int(9) NOT NULL,
  `qtyPurcase` int(9) NOT NULL,
  `priceAmount` int(9) NOT NULL,
  `purcaseTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_purcase`
--

INSERT INTO `tbl_purcase` (`idPurcase`, `SKU`, `buyingPrice`, `qtyPurcase`, `priceAmount`, `purcaseTimestamp`) VALUES
(1, 'BJR-TBL070-PNJ6', 6000, 40, 9000, '2023-06-17 14:26:05'),
(2, 'BJR-TBL055-PNJ6', 3000, 20, 9000, '2023-06-17 14:26:05'),
(3, 'BJR-TBL055-PNJ6', 9000, 30, 100000, '2023-06-17 14:26:05'),
(4, 'BJR-TBL060-PNJ6', 6000, 7, 100000, '2023-06-19 18:46:48'),
(5, 'BJR-TBL060-PNJ6', 3000, 4, 9000, '2023-06-19 18:46:48'),
(6, 'BJR-TBL055-PNJ6', 6000, 10, 60000, '2023-06-19 19:12:12'),
(7, 'BJR-TBL065-PNJ6', 1004, 4, 4016, '2023-06-13 17:00:00'),
(8, 'BJR-TBL070-PNJ6', 1004, 4, 4016, '2023-06-12 17:00:00'),
(9, 'BJR-TBL075-PNJ6', 10234, 7, 71638, '2023-06-12 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`idCheckout`),
  ADD KEY `idOrder` (`idOrder`,`SKU`),
  ADD KEY `SKU` (`SKU`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indeks untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`SKU`);

--
-- Indeks untuk tabel `tbl_purcase`
--
ALTER TABLE `tbl_purcase`
  ADD PRIMARY KEY (`idPurcase`),
  ADD KEY `SKU` (`SKU`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `idCheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_purcase`
--
ALTER TABLE `tbl_purcase`
  MODIFY `idPurcase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD CONSTRAINT `tbl_checkout_ibfk_1` FOREIGN KEY (`SKU`) REFERENCES `tbl_product` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_checkout_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_purcase`
--
ALTER TABLE `tbl_purcase`
  ADD CONSTRAINT `tbl_purcase_ibfk_1` FOREIGN KEY (`SKU`) REFERENCES `tbl_product` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
