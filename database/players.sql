-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `players`
--

-- --------------------------------------------------------

--
-- Table structure for table `players_credentials`
--

CREATE TABLE `players_credentials` (
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_credentials`
--

INSERT INTO `players_credentials` (`username`, `pass`, `firstname`, `lastname`, `email`, `dob`, `phone`, `verified`) VALUES
('$uv', '601de3667aeb03d6adc1ef6b7607771c', 'suvag', 'poddar', 'suvagpoddar01@gmail.com', '1999-04-14', '8617260445', 1),
('clutch or kick', '58bb780b870a826e189cd7342f648943', 'sagar', 'saha', 'sahasagar2143@gmail.com', '1999-07-05', '7001871808', 1),
('gh0st', '25f9e794323b453885f5181f1b624d0b', 'dibendu', 'kundu', 'dibendukundu5@gmail.com', '1999-07-05', '9635036656', 1),
('irreplaceable', 'b7c622fea882619357de90ee08f16ec0', 'arpan', 'ghosh', 'arpanghoshbiology7@gmail.com', '1999-06-22', '7001735121', 1),
('kootty420', 'a293580fb31b0a7a122499bc74b9d107', 'soura sankar', 'mondal', 'soura.kootty4@gmail.com', '2000-06-08', '9051688818', 1),
('koushikshay007', 'e07b65669aedd68a3e117fc0da4421c0', 'koushik', 'bhowmick', 'shayani00712@gmail.com', '1999-07-11', '8918530191', 1),
('rexuser410', '7b7f71bff78951c020e9c647a32bb839', 'rahul', 'durlav', 'rahuldurlav12@gmail.com', '2000-04-10', '8373021299', 1),
('x-calliber', 'f7cea74a0001be875ddcd5c244bc4c40', 'sudipta', 'dey', 'rahuldey1839@gmail.com', '1998-12-06', '7501125991', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players_details`
--

CREATE TABLE `players_details` (
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ign` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_cache` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_details`
--

INSERT INTO `players_details` (`username`, `ign`, `pic`, `pic_cache`, `color`) VALUES
('$uv', '$uv', '$uv', NULL, '#eda338'),
('clutch or kick', '✪ClUtCh Or KiCk✪', 'clutch or kick', '74651971', '#68a3e5'),
('gh0st', 'Gh0sTDibendu', 'gh0st', NULL, '#eda338'),
('irreplaceable', 'Irreplaceable', 'irreplaceable', NULL, '#68a3e5'),
('kootty420', 'kootty420', 'kootty420', '23035681', '#803ca1'),
('koushikshay007', 'Koushik007', 'koushikshay007', '74812970', '#f1d800'),
('rexuser410', 'rexuser410', 'rexuser410', '15571055', '#109856'),
('x-calliber', 'X-Calliber', 'logo', NULL, '#68a3e5');

-- --------------------------------------------------------

--
-- Table structure for table `players_pc_config`
--

CREATE TABLE `players_pc_config` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpu` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smps` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdd` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitor` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyboard` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mouse` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headphone` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_pc_config`
--

INSERT INTO `players_pc_config` (`username`, `cpu`, `mobo`, `gpu`, `ram`, `smps`, `hdd`, `monitor`, `keyboard`, `mouse`, `headphone`) VALUES
('$uv', 'i5-8250U', '', '', '12 GB', '', 'HDD', '', '', '', ''),
('clutch or kick', 'Intel Core i7-8700', 'Asus ROG Strix Z270F', 'ASUS Geforce GTX 1050Ti 4GB ROG Strix OC Edition', '4x16 GB DDR4 HyperX Fury Black 2400 MHz', 'Corsair VS450', 'Samsung 500GB SSD + 256GB KINGSTON SSD + 1 TB WD BLUE', 'Samsung 23.5 inch (59.8 cm) Curved LED Backlit Computer Monitor', 'Redgear Invador MK881 Mechanical Keyboard', 'Dragon War ELE G12 3200 DPI Mouse', 'Redgear Cosmo 7.1 USB Gaming Headphones with RGB LED Effect'),
('gh0st', 'Intel core i5-6402P', 'Asus B150M PLUS', 'GTX 1660 6GB OC', 'Corsair Vengeance DDR4 8*2=16GB RAM', 'Corsair VS 550W SMPS', '3TB HDD,Western Digital WD Green 240 GB M.2 SSD ', 'BenQ GW2283 Monitor', 'Razer Cynosa Chroma Membrane RGB Gaming Keyboard', 'Logitech G402 Hyperion Fury Gaming Mouse', 'Logitech Prodigy G231 Gaming Headphone'),
('irreplaceable', 'INTEL CORE i5-7400', 'ASUS ROG STRIX Z270F GAMING', 'ZOTAC Geforce GTX 1050Ti 4GB OC Edition', 'Corsair Vengeance 3200Mhz DDR4 8*2=16GB', 'Corsair VS650 SMPS', 'Seagate 1*2=2TB HDD 7400RPM,GIGABYTE 240 GB M.2 SSD', 'SAMSUNG LC24F390FHWXXL', 'Logitech K200', 'Logitech G102 Optical Gaming Mouse', 'Logitech Prodigy G231 Gaming Headphone'),
('kootty420', 'INTEL CORE i7-8700', 'ASUS TUF Z370 PLUS GAMING', 'MSI RTX 2070 GAMING Z', 'Corsair Vengeance 3000Mhz DDR4 8*2=16GB', 'Corsair TX650M SMPS', 'WD 1TB HDD, WD Green 240 GB M.2 SSD, SAMSUNG 970 EVO PLUS NVME M.2 SSD', 'LG 22MP68VQ', 'Razer Cynosa Chroma Membrane RGB Gaming', 'Dragon War ELE G12 3200 DPI', 'Samsung Default Headphone'),
('koushikshay007', 'Ryzen5 2600', 'Asus ROG b450f gaming ', 'Rx580 8gb', 'Corsair Vengeance 3000Mhz DDR4 8gb', 'Vs550', 'WD 500gb', 'LG', 'Logitech', 'Scorpion m350 gaming', 'Cosmicbyte Gaming Headset '),
('rexuser410', 'AMD Ryzen 3 2200 G', 'Asus Prime B450M', '', 'CORSAIR 8GB Vengeance (8*2)', 'Corsair VS450 ', 'WD10EZEX 1TB HDD and WDl 240GB Green M.2 SSD', 'LG 22 inch (55cm) IPS Monitor', 'Logitech ', 'Logitech ', ''),
('x-calliber', 'Ryzen 5 2400G', 'Gigabyte B450M', 'Vega 11', '8GB DDR4', '450W', '1TB', '21 inch LG', 'Dell', 'Red gear Thor', '');

-- --------------------------------------------------------

--
-- Table structure for table `players_social`
--

CREATE TABLE `players_social` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steam` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uplay` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_social`
--

INSERT INTO `players_social` (`username`, `steam`, `uplay`, `youtube`, `facebook`, `instagram`, `twitter`) VALUES
('$uv', 'https://steamcommunity.com/id/suvag', '', '', 'https://www.facebook.com/SuvagPoddar', '', ''),
('clutch or kick', 'http://steamcommunity.com/id/sagar66', '', 'https://m.youtube.com/unique_creations66', 'https://www.facebook.com/sahasagar66', 'Unique_creations66', 'Unique_sagar66'),
('gh0st', 'https://steamcommunity.com/id/GhostDibendu/', 'Gh0sT.Doge', 'https://www.youtube.com/channel/UCAmudnOqwBunie24uMpxD_Q?view_as=subscriber', 'https://www.facebook.com/dibendu.kundu.5/', 'ghostdibendu', 'GhostDibendu'),
('irreplaceable', 'https://steamcommunity.com/profiles/76561198256452391/', 'Mr.Maxim07', 'https://www.youtube.com/channel/UCnX1FeTXqMwvUwdSnFOjQ9Q?view_as=subscriber', 'https://www.facebook.com/profile.php?id=100007872798804', 'arpanghosh07', 'Arpanghosh0123'),
('kootty420', 'https://steamcommunity.com/id/kootty420', 'kootty420', 'https://www.youtube.com/channel/UCs7Et2UPSkDyHVpeQXukXMA', 'https://www.facebook.com/kootty', 'soura_kootty', 'soura_kootty'),
('koushikshay007', 'https://steamcommunity.com/id/kowshikbhowmick00712/', '', 'https://m.youtube.com/channel/UCOiO2AZra7APx-bNnemXQag', 'https://www.facebook.com/koushik.bhowmick.1610', 'Koushiks_007', ''),
('rexuser410', NULL, NULL, NULL, NULL, NULL, NULL),
('x-calliber', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `players_youtube`
--

CREATE TABLE `players_youtube` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_youtube`
--

INSERT INTO `players_youtube` (`username`, `video`) VALUES
('kootty420', 'Crm3JB4vSw4'),
('kootty420', 'QZHBtUDyq5I'),
('kootty420', 'cmwR1jNmNCI'),
('kootty420', 'uaWL2mxsMu8'),
('gh0st', 'fvVaC04MExk&t=138s'),
('gh0st', 'WuVXAfuoyKg&t=168s'),
('gh0st', 'lbzOARugk24'),
('gh0st', 'fvVaC04MExk'),
('gh0st', '4FmiCpTT-34'),
('gh0st', 'r_H-v6raQQc'),
('gh0st', 'WuVXAfuoyKg'),
('gh0st', '-CxIhQ0Vb5g'),
('gh0st', '4BY_NzG3SyY'),
('gh0st', 'hAUt88kHda4'),
('gh0st', 'C1psohnS3tU'),
('gh0st', 'dL316hWK3SY'),
('gh0st', 'DZ2kQOhTzGY'),
('gh0st', 'LdL-46FyOn0'),
('gh0st', 'qswdoFRpgBE'),
('gh0st', 'BdWxk8HW3fY'),
('gh0st', '_n4zgj8EQvg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players_credentials`
--
ALTER TABLE `players_credentials`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `players_details`
--
ALTER TABLE `players_details`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `players_pc_config`
--
ALTER TABLE `players_pc_config`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `players_social`
--
ALTER TABLE `players_social`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `players_youtube`
--
ALTER TABLE `players_youtube`
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players_youtube`
--
ALTER TABLE `players_youtube`
  ADD CONSTRAINT `players_youtube_ibfk_1` FOREIGN KEY (`username`) REFERENCES `players_credentials` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
