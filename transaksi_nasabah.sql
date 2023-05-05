-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 05 Bulan Mei 2023 pada 02.13
-- Versi server: 5.7.36
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datanasabah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_nasabah`
--

DROP TABLE IF EXISTS `transaksi_nasabah`;
CREATE TABLE IF NOT EXISTS `transaksi_nasabah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDataNasabah` int(11) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DebitCreditStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'D: Untuk Debit; C: Untuk Kredit',
  `Amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_nasabah_iddatanasabah_foreign` (`idDataNasabah`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_nasabah`
--

INSERT INTO `transaksi_nasabah` (`id`, `idDataNasabah`, `TransactionDate`, `Description`, `DebitCreditStatus`, `Amount`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-05-04 15:05:14', 'Tarik Tunai', 'C', '100000', NULL, NULL),
(2, 2, '2023-05-04 15:06:37', 'Beli Pulsa', 'C', '203000', NULL, NULL),
(3, 10, '2023-05-04 15:13:32', 'Setor Tunai', 'D', '25000', NULL, NULL),
(4, 10, '2023-05-04 15:14:34', 'Setor Tunai', 'D', '25000', NULL, NULL),
(5, 11, '2023-05-04 15:22:48', 'Beli Pulsa', 'D', '1000', NULL, NULL),
(6, 11, '2023-05-04 15:23:05', 'Beli Pulsa', 'C', '35000', NULL, NULL),
(7, 11, '2023-05-04 16:30:56', 'Bayar Listrik', 'D', '30000', NULL, NULL),
(8, 11, '2023-05-04 16:32:20', 'Bayar Listrik', 'D', '20000', NULL, NULL),
(9, 11, '2023-05-04 16:32:47', 'Beli Pulsa', 'D', '20000', NULL, NULL),
(10, 11, '2023-05-04 16:33:22', 'Beli Pulsa', 'D', '50000', NULL, NULL),
(11, 1, '2023-05-04 17:12:43', 'Bayar Listrik', 'D', '1100000', NULL, NULL),
(12, 2, '2023-05-04 17:14:09', 'Setor Tunai', 'D', '1100000', NULL, NULL),
(13, 4, '2023-05-04 17:14:30', 'Bayar Listrik', 'D', '1100000', NULL, NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi_nasabah`
--
ALTER TABLE `transaksi_nasabah`
  ADD CONSTRAINT `transaksi_nasabah_iddatanasabah_foreign` FOREIGN KEY (`idDataNasabah`) REFERENCES `data_nasabah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
