-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: ian. 27, 2024 la 01:42 AM
-- Versiune server: 10.4.28-MariaDB
-- Versiune PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `angajati_2023`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

CREATE TABLE `angajati` (
  `id_angajat` int(6) UNSIGNED NOT NULL,
  `nume_angajat` varchar(255) NOT NULL,
  `prenume_angajat` varchar(255) NOT NULL,
  `telefon_angajat` varchar(255) NOT NULL,
  `email_angajat` varchar(255) NOT NULL,
  `cnp_angajat` varchar(255) NOT NULL,
  `data_start_angajat` varchar(255) NOT NULL,
  `reg_angajat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `angajati`
--

INSERT INTO `angajati` (`id_angajat`, `nume_angajat`, `prenume_angajat`, `telefon_angajat`, `email_angajat`, `cnp_angajat`, `data_start_angajat`, `reg_angajat`) VALUES
(1, 'Adi', 'Pop', '0723111111', 'adytzul89@gmail.com', '1890000000000', '2023-07-20', '2023-11-24 01:07:59'),
(2, 'Dorela', 'Tudora', '0723222222', 'dore.tudor@mail.com', '1790000000001', '2023-05-12', '2023-12-09 14:50:05'),
(5, 'Dorel', 'Tudor', '0723222222', 'dore.tudor@mail.com', '1790000000002', '2023-05-12', '2023-12-09 14:50:10'),
(6, 'Andrei', 'C', '0723333333', 'andreic@gmail.com', '1890000000001', '2023-07-07', '2023-12-09 14:50:16');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati_stersi`
--

CREATE TABLE `angajati_stersi` (
  `id_angajat` int(6) UNSIGNED NOT NULL,
  `nume_angajat` varchar(255) NOT NULL,
  `prenume_angajat` varchar(255) NOT NULL,
  `telefon_angajat` varchar(255) NOT NULL,
  `email_angajat` varchar(255) NOT NULL,
  `cnp_angajat` varchar(255) NOT NULL,
  `data_start_angajat` varchar(255) NOT NULL,
  `reg_angajat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `angajati_stersi`
--

INSERT INTO `angajati_stersi` (`id_angajat`, `nume_angajat`, `prenume_angajat`, `telefon_angajat`, `email_angajat`, `cnp_angajat`, `data_start_angajat`, `reg_angajat`) VALUES
(1, 'Adi', 'Pop', '0723111111', 'adytzul89@gmail.com', '1890000000000', '2023-07-20', '2023-11-24 01:07:59'),
(2, 'Dorel', 'Tudor', '0723222222', 'dore.tudor@mail.com', '1790000000000', '2023-05-12', '2023-11-24 01:17:30'),
(3, 'Dorel', 'Tudor', '0723222222', 'dore.tudor@mail.com', '1790000000000', '2023-05-12', '2023-11-24 01:18:46'),
(4, 'Dorel', 'Tudor', '0723222222', 'dore.tudor@mail.com', '1790000000000', '2023-05-12', '2023-11-24 01:19:53'),
(5, 'Dorel', 'Tudor', '0723222222', 'dore.tudor@mail.com', '1790000000000', '2023-05-12', '2023-11-24 01:20:25');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`id_angajat`);

--
-- Indexuri pentru tabele `angajati_stersi`
--
ALTER TABLE `angajati_stersi`
  ADD PRIMARY KEY (`id_angajat`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `angajati`
--
ALTER TABLE `angajati`
  MODIFY `id_angajat` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `angajati_stersi`
--
ALTER TABLE `angajati_stersi`
  MODIFY `id_angajat` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
