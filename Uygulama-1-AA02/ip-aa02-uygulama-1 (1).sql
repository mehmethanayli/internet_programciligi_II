-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Nis 2023, 16:55:56
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ip-aa02-uygulama-1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPass` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `userName`, `userPass`, `isActive`, `createdAt`) VALUES
(1, 'Mehmet', 12345, 0, '2023-03-13 12:49:18'),
(2, 'Mehmet', 12345, 1, '2023-03-13 12:49:49'),
(3, 'Mehmet', 12345, 1, '2023-03-13 12:51:06'),
(4, 'Mehmet', 12345, 1, '2023-03-13 12:52:07'),
(5, 'Mehmet', 12345, 1, '2023-03-13 12:57:26'),
(6, 'Mehmet', 12345, 1, '2023-03-13 12:57:31'),
(7, 'Ali', 12345, 1, '2023-03-20 12:12:52'),
(8, 'Mehmet', 1234555555, 1, '2023-03-27 13:04:03'),
(9, 'Mehmet', 1234555656, 1, '2023-03-27 13:22:31'),
(10, '', 0, 1, '2023-03-27 13:45:50'),
(11, '', 0, 1, '2023-03-27 13:59:00'),
(12, 'sadasdasd', 0, 1, '2023-03-27 13:59:51');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
