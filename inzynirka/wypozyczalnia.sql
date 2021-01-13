-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Wrz 2020, 10:48
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`ID`, `Nazwa`, `Password`) VALUES
(0, 'admin', '$2y$10$DkuNwWvtswiP9MRgLQ/seu0B.gpDNEiVJ1/./vNM/dVh.wSUBvH1G');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazdy`
--

CREATE TABLE `pojazdy` (
  `IDPojazdu` int(11) NOT NULL,
  `Marka` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Model` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `CenaZaDzien` int(11) NOT NULL,
  `TypPaliwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `RokProdukcji` int(6) NOT NULL,
  `Siedzenia` int(6) NOT NULL,
  `Zdjecie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Dostepny` varchar(3) COLLATE utf8_polish_ci NOT NULL DEFAULT 'tak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pojazdy`
--

INSERT INTO `pojazdy` (`IDPojazdu`, `Marka`, `Model`, `CenaZaDzien`, `TypPaliwa`, `RokProdukcji`, `Siedzenia`, `Zdjecie`, `Dostepny`) VALUES
(1, 'Audi', 'R8', 100, 'Benzyna', 2016, 4, '', 'tak'),
(12, 'Mercedes-Benz', 'A200', 50, 'Benzyna', 0, 2, '', 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID` int(11) NOT NULL,
  `Name` varchar(120) COLLATE utf8_polish_ci NOT NULL,
  `Mail` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `ContactNo` char(11) COLLATE utf8_polish_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `City` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `PrawoP` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `PrawoT` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Zweryfikowany` varchar(255) COLLATE utf8_polish_ci DEFAULT 'nie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID`, `Name`, `Mail`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `PrawoP`, `PrawoT`, `RegDate`, `UpdateDate`, `Zweryfikowany`) VALUES
(3, 'test1', 'test1@wp.pl', '$2y$10$4uUzASya8xgYNma0Mt2f7OpnKEmq0daFLNfTAVNf7OtglCFU8Lo8K', '', '', '', 'Warszawa', '', '', '', '2020-08-17 14:59:40', '2020-08-31 12:28:23', '0'),
(4, 'adam', 'adam@wp.pl', '$2y$10$uIJkukCkEYkSxPwgsCakPODvTVQ.jKIOrX9q/IWNlrNgD9VLDN1mW', '', '', '', '', '', '', '', '2020-08-17 15:27:46', NULL, '0'),
(5, 'maro', 'marooo@wp.pl', '$2y$10$WuaOnFGG6gpjErRIQjluheCs98NC1GtMD/abYL6MXqpr3BXcmxID6', '', '', 'Osiedlowa 12', 'Radom', '', '', '', '2020-08-17 15:33:13', '2020-09-07 23:08:01', 'tak'),
(9, 'raz', 'raz@wp.pl', '$2y$10$cdkRUocjWVtvYFqEz0NbputTF6tJgNPdI.a.KfwfTzU/tIVZ10lDS', '', '', '', '', '', '', '', '2020-08-31 17:47:25', '2020-09-07 10:56:00', 'tak'),
(10, 'lol', 'lol@wp.pl', '$2y$10$RiMPMlchu1.YOgLh1Gou4eLhxfuCZ7Zvwoue2zJB0z8c47y6yMgjS', '', '', '', '', '', '', '', '2020-08-31 17:48:36', '2020-09-07 10:47:33', 'tak'),
(11, 'filip', 'filip@wp.pl', '$2y$10$8N7jfWtZaYPCzU3NdbLk9ey2/cuBHmTcAo4rwpYSv75fEDFp04oX.', '', '', '', '', '', '', '', '2020-09-07 11:53:20', NULL, 'nie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE `wypozyczenie` (
  `ID` int(11) NOT NULL,
  `Mail` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `IDPojazdu` int(11) NOT NULL,
  `Rozpoczecie` date NOT NULL,
  `Zakonczenie` date NOT NULL,
  `Zaplata` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Informacja` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `DataUmieszczenia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `AdminID` (`ID`);

--
-- Indeksy dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  ADD PRIMARY KEY (`IDPojazdu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Mail` (`Mail`) USING BTREE;

--
-- Indeksy dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Mail` (`Mail`) USING BTREE,
  ADD KEY `IDPojazdu` (`IDPojazdu`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  MODIFY `IDPojazdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD CONSTRAINT `wypozyczenie_ibfk_1` FOREIGN KEY (`IDPojazdu`) REFERENCES `pojazdy` (`IDPojazdu`),
  ADD CONSTRAINT `wypozyczenie_ibfk_2` FOREIGN KEY (`Mail`) REFERENCES `uzytkownicy` (`Mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
