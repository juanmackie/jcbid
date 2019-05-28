-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 28 Maj 2019, 11:50
-- Wersja serwera: 8.0.15
-- Wersja PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `auctdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fromleague` text NOT NULL,
  `toleague` text NOT NULL,
  `fromdiv` int(11) NOT NULL,
  `todiv` int(11) NOT NULL,
  `fromlp` int(11) NOT NULL,
  `tolp` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `datestart` datetime DEFAULT NULL,
  `dateend` datetime DEFAULT NULL,
  `lowestbid` decimal(10,2) NOT NULL DEFAULT '100.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `auctions`
--

INSERT INTO `auctions` (`id`, `fromleague`, `toleague`, `fromdiv`, `todiv`, `fromlp`, `tolp`, `authorid`, `datestart`, `dateend`, `lowestbid`) VALUES
(1, 'platinum', 'diamond', 2, 4, 0, 0, 1, '2019-05-27 00:00:00', '2019-06-04 00:00:00', '100.00'),
(2, 'silver', 'gold', 2, 1, 10, 35, 2, '2019-05-27 00:00:00', '2019-05-31 00:00:00', '100.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bid`
--

CREATE TABLE `bid` (
  `auctionid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `bid`
--

INSERT INTO `bid` (`auctionid`, `userid`, `amount`, `id`) VALUES
(1, 15, 80, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  `isbooster` tinyint(1) NOT NULL DEFAULT '0',
  `balance` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `description`, `isbooster`, `balance`) VALUES
(1, 'john213', 'asdas', 'im a client lorem ipsum client lorem ipsum lorem ipsum client lorem ipsum .', 0, 0),
(2, 'dave2', 'davee', 'lorem ipsum client lorem ipsum ', 0, 0),
(3, 'ewiufh', 'e4c7fbf0b3e03a3961b1a33903af4bc1', 'wefd', 1, 0),
(4, 'ewiufh', 'e4c7fbf0b3e03a3961b1a33903af4bc1', 'wefd', 1, 0),
(5, 'ewiufh', 'e4c7fbf0b3e03a3961b1a33903af4bc1', 'wefd', 1, 0),
(6, 'hello', '7d793037a0760186574b0282f2f435e7', 'ewfewf', 1, 0),
(7, 'hello', '7d793037a0760186574b0282f2f435e7', 'ewfewf', 1, 0),
(8, 'hello', '7d793037a0760186574b0282f2f435e7', 'ewfewf', 1, 0),
(9, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 0, 0),
(10, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 0, 0),
(11, 'kuba', 'fccbce33643556ee698db7d599853a1f', 'kubakubakuba', 1, 0),
(12, 'kuba', 'fccbce33643556ee698db7d599853a1f', 'asd', 1, 0),
(13, 'kuba', 'fccbce33643556ee698db7d599853a1f', 'asd', 1, 0),
(14, 'kuba', 'fccbce33643556ee698db7d599853a1f', 'asd', 1, 0),
(15, 'jakub', 'eccdacd4709395e97e6b19756c7b45c1', 'asdfasdf', 0, 0),
(16, 'hey', '6057f13c496ecf7fd777ceb9e79ae285', 'hey', 1, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `auctionid` (`auctionid`),
  ADD KEY `userid` (`userid`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `bid`
--
ALTER TABLE `bid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`auctionid`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
