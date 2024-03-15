-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 12:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `username`, `email`, `text`) VALUES
(4, 'water', 'earth@hotmail.com', 'hahaha hoohoho merry christmas'),
(15, 'lawdm', 'kugapalan2003@outlook.com', 're;geu');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `name` varchar(100) NOT NULL,
  `prijs` decimal(11,0) NOT NULL,
  `info` text NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`name`, `prijs`, `info`, `foto`, `product_id`) VALUES
('LG OLED97M39LA (2023)', '27999', 'LG bewijst al jaren dat zij met hun oledpanelen bijzondere tv’s maken en de LG OLED97M39LA (2023) doet daar nog een schep bovenop. Deze signature-lijn van LG is namelijk bijna volledig draadloos.', 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_120426496?x=1800&y=1800&format=jpg&quality=80&sp=yes&strip=yes&ex=1800&ey=1800&align=center&resizesource&unsharp=1.5x1+0.7+0.02', 1),
('Samsung Odyssey ARK LS55BG970NUXEN', '1999', 'Met de Samsung Odyssey Ark LS55BG970NUXEN 55 inch 165Hz gaming monitor ga je de ultieme gaming ervaring aan. Op het extreem grote speelveld geniet je van een ongekend overzicht, in welke soort game dan ook.', 'https://image.coolblue.nl/max/2048x1536/products/1809223', 2),
('PHILIPS 43PUS8108/12 (2023)', '399', 'De Philips 43PUS8108 toont aan dat je met slimme basisfunctionaliteiten genoeg kunt genieten. Deze slanke 4K-led-tv met 3-zijdig Ambilight is namelijk compatibel met diverse HDR-instellingen voor gedetailleerde beelden', 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_105875150?x=1800&y=1800&format=jpg&quality=80&sp=yes&strip=yes&ex=1800&ey=1800&align=center&resizesource&unsharp=1.5x1+0.7+0.02', 3),
('Everglades EVWM71402AG', '419', 'In het moderne huishouden speelt een wasmachine een essentiële rol bij het onderhouden van de dagelijkse routines. De Everglades EVWM71402AG, met zijn royale capaciteit van 7 kg, 15 programma’s, verfijnde titanium grijze afwerking en indrukwekkende centrifugesnelheid van 1400 toeren per minuut, is de ideale metgezel voor iedereen die streeft naar zorgvuldige kledingverzorging en duurzaamheid.', 'https://media.s-bol.com/BQvM3Z03Gv8k/mOZnp63/857x1200.jpg', 19),
('Bosch Wab28160 Wasmachine 6kg 1400t', '269', 'Deze wasmachine beschikt over een onbalans controlesysteem. Het slimme systeem controleert, gedurende de wascyclus, nauwlettend de balans in het apparaat. Wanneer de was niet gelijkmatig over de trommel verdeeld is en de balans niet optimaal is, wordt het centrifugeerproces aangepast en wordt er steeds met het optimale toerental gecentrifugeerd. Hierdoor wordt het trillen en schudden van de machine zo veel mogelijk voorkomen en heeft u een geruisloze machine.', 'https://media.welhof.com/media/catalog/product/cache/57e10fee1965e72fd2b427b83dc00dc5/5/7/5712_bosch_wab_28160_nl.jpg', 20),
('Samsung Bespoke 5000-Serie WW11BB534AAB/S2', '639', 'SpaceMax™\r\nMaak je interieur nog mooier en was grotere wasladingen van maar liefst 11 kg in een standaard trommel van 600 mm.\r\n\r\nAI Control\r\nDoe je was gemakkelijk en doeltreffend met AI Control.', 'https://img.artencraft.be/i/3521341_949x714.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type_of_user` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type_of_user`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'user', '123', 'user'),
(3, 'patrick', '123', 'user'),
(4, 'patrick', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
