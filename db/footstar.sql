-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Dec 14. 10:32
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `footstar`
--
CREATE DATABASE IF NOT EXISTS `footstar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `footstar`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `brand`
--

CREATE TABLE `brand` (
  `brandid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `brand`
--

INSERT INTO `brand` (`brandid`, `name`) VALUES
(1, 'nike'),
(2, 'adidas'),
(3, 'north face'),
(4, 'converse'),
(5, 'puma'),
(6, 'calvin klein');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `categid` int(11) NOT NULL,
  `shoesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`categid`, `shoesid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `categid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`categid`, `name`) VALUES
(1, 'street'),
(2, 'ocassion'),
(3, 'boots'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `image`
--

CREATE TABLE `image` (
  `shoesid` int(11) NOT NULL,
  `imgnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `image`
--

INSERT INTO `image` (`shoesid`, `imgnum`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `shoes`
--

CREATE TABLE `shoes` (
  `shoesid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `brandid` int(11) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `shoes`
--

INSERT INTO `shoes` (`shoesid`, `name`, `brandid`, `gender`, `price`) VALUES
(1, 'Air Jordan 1 Mid', 1, NULL, 120),
(2, 'Nike Air Force 1 07', 1, 2, 80),
(3, 'Yeezy 350 v2', 2, NULL, 130),
(4, 'Air Max 90 G Spikeless Waterproof', 1, 1, 126),
(5, 'Blazer Mid Jumbo Voodoo', 1, 1, 130),
(6, 'Chuck Taylor All Star', 4, NULL, 82),
(7, 'Chuck Taylor All Star Move High', 4, 2, 100),
(8, 'Nike Air Max More Uptempo', 1, 1, 110);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sizes`
--

CREATE TABLE `sizes` (
  `shoeid` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `sizes`
--

INSERT INTO `sizes` (`shoeid`, `size`, `stock`) VALUES
(1, 41, 3),
(1, 42, 3),
(1, 43, 3),
(1, 47, 10),
(2, 41, 5),
(2, 42, 10),
(2, 43, 10),
(2, 44, 10),
(2, 45, 10),
(3, 41, 10),
(3, 42, 10),
(3, 43, 10),
(3, 44, 10),
(4, 38, 5),
(4, 39, 5),
(4, 40, 5),
(4, 44, 5),
(5, 40, 5),
(5, 43, 5),
(5, 44, 3),
(5, 45, 3),
(7, 35, 5),
(7, 40, 5),
(7, 41, 5),
(7, 42, 5),
(7, 43, 5),
(7, 44, 5),
(7, 45, 5),
(7, 46, 5),
(8, 40, 5),
(8, 41, 5),
(8, 42, 5),
(8, 43, 5),
(8, 44, 5),
(8, 45, 5);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD KEY `shoesid` (`shoesid`),
  ADD KEY `categid` (`categid`);

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categid`);

--
-- A tábla indexei `image`
--
ALTER TABLE `image`
  ADD KEY `shoesid` (`shoesid`);

--
-- A tábla indexei `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoesid`),
  ADD KEY `brandid` (`brandid`);

--
-- A tábla indexei `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`shoeid`,`size`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `categid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`shoesid`) REFERENCES `shoes` (`shoesid`),
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`categid`) REFERENCES `category` (`categid`);

--
-- Megkötések a táblához `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`shoesid`) REFERENCES `shoes` (`shoesid`);

--
-- Megkötések a táblához `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`brandid`) REFERENCES `brand` (`brandid`);

--
-- Megkötések a táblához `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`shoeid`) REFERENCES `shoes` (`shoesid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
