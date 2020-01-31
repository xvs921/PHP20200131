-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3307
-- Létrehozás ideje: 2020. Jan 31. 07:44
-- Kiszolgáló verziója: 10.1.34-MariaDB
-- PHP verzió: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `Hangszerek`
--
CREATE DATABASE IF NOT EXISTS `Hangszerek` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `Hangszerek`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hangszer`
--

CREATE TABLE `hangszer` (
  `id` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `tipus` text COLLATE utf8_hungarian_ci NOT NULL,
  `marka` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `gyartasiIdo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hangszer`
--

INSERT INTO `hangszer` (`id`, `ar`, `tipus`, `marka`, `gyartasiIdo`) VALUES
(1, 10000, 'fuvós', 'yahama', '2020-03-12');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `hangszer`
--
ALTER TABLE `hangszer`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `hangszer`
--
ALTER TABLE `hangszer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
