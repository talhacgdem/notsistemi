-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220827.0877a410a3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Ağu 2022, 17:08:30
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veysel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `docname` varchar(250) NOT NULL,
  `path` varchar(50) NOT NULL,
  `note` int(11) NOT NULL DEFAULT -1,
  `studentid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `hwid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `docs`
--

INSERT INTO `docs` (`id`, `docname`, `path`, `note`, `studentid`, `date`, `hwid`) VALUES
(6, 'EVE_FILE_(1).pdf', '61a6cc726f218f1a4a1a41250af47633.pdf', -1, 5, '2022-08-12 16:17:08', 2),
(7, '46A1W-ProgramBaşvuruları-V1_(6).pdf', '31604a69fb01183ea3d5c20e35902f11.pdf', 86, 5, '2022-08-12 16:32:15', 3),
(8, 'EN_MUHAMMED_TALHA_ÇİĞDEM.pdf', '830be90c8f796a54850d980c2ec74b60.pdf', 25, 6, '2022-08-21 15:10:20', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `lastdate` datetime NOT NULL DEFAULT current_timestamp(),
  `lessonid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `homeworks`
--

INSERT INTO `homeworks` (`id`, `caption`, `description`, `lastdate`, `lessonid`) VALUES
(2, 'deneme ödev', 'burada şunları yapın', '2022-08-13 23:59:59', 2),
(3, 'deneme ödev', 'burada şunları yapın', '2022-08-12 23:59:59', 3),
(6, 'asdasd', 'wqeqweqwe', '2022-08-26 23:59:59', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessonforstu`
--

CREATE TABLE `lessonforstu` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lessonforstu`
--

INSERT INTO `lessonforstu` (`id`, `studentid`, `lessonid`) VALUES
(4, 5, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `academic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `academic`) VALUES
(2, 'Algoritma Analizi', 2),
(3, 'Veysel dersi', 2),
(4, 'deneme', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `type`, `name`, `mail`, `username`, `password`) VALUES
(1, 0, 'yönetici', 'root@root.net', 'root', 'root'),
(2, 1, 'Talha', 'talhacgdem@gmail.com', 'akademisyen', '123456'),
(5, 2, 'Veysel', 'talhacgdem@hotmail.com', 'ogrenci', '123456'),
(6, 2, 'Bektaş', 'bektas@gmail.com', 'bektas', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lessonforstu`
--
ALTER TABLE `lessonforstu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lessonforstu`
--
ALTER TABLE `lessonforstu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
