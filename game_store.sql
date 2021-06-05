-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 08:52 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id_description` int(11) NOT NULL,
  `description_name` text COLLATE utf8_bin NOT NULL,
  `id_games` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id_description`, `description_name`, `id_games`) VALUES
(1, 'Dead by Daylight_description.htm', 1),
(2, 'XCOM2_description.htm', 2),
(3, 'Battlefield V_description.htm', 3),
(4, 'Battlefield 4_description.htm', 4),
(5, 'Slay the Spire_description.htm', 5);

-- --------------------------------------------------------

--
-- Table structure for table `dlc`
--

CREATE TABLE `dlc` (
  `id_dlc` int(11) NOT NULL,
  `dlc_names` text COLLATE utf8_bin NOT NULL,
  `dlc_price` int(11) NOT NULL,
  `dlc_release_date` text COLLATE utf8_bin NOT NULL,
  `id_games` int(11) NOT NULL,
  `insert_dlc_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dlc`
--

INSERT INTO `dlc` (`id_dlc`, `dlc_names`, `dlc_price`, `dlc_release_date`, `id_games`, `insert_dlc_time`) VALUES
(1, 'A Binding of Kin Chapter', 139, '2/12/2020', 1, '2021-03-21 15:09:08'),
(2, 'Chains of Hate Chapter', 139, '10/4/2020', 1, '2021-03-21 15:09:08'),
(3, 'Cursed Legacy Chapter', 139, '4/12/2019', 1, '2021-03-21 15:09:08'),
(4, 'Descend Beyond chapter', 139, '8/11/2020', 1, '2021-03-21 15:09:08'),
(5, 'Ghost Face', 99, '18/5/2019', 1, '2021-03-21 15:09:08'),
(6, 'Silent Hill Chapter', 139, '16/5/2020', 1, '2021-03-21 15:09:08'),
(7, 'Stranger Things Chapter', 209, '17/9/2019', 1, '2021-03-21 15:09:08'),
(8, 'Reinforcement Pack', 369, '5/2/2016', 2, '2021-03-21 15:37:05'),
(9, 'War of chosen', 950, '4/12/2018', 2, '2021-03-21 15:37:06'),
(10, 'Premium Starter Pack 01', 1190, '11/5/2020', 3, '2021-03-21 15:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `dlc_description`
--

CREATE TABLE `dlc_description` (
  `id_dlc_description` int(11) NOT NULL,
  `description_name` text COLLATE utf8_bin NOT NULL,
  `id_dlc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dlc_description`
--

INSERT INTO `dlc_description` (`id_dlc_description`, `description_name`, `id_dlc`) VALUES
(1, 'A Binding of Kin Chapter_description.htm', 1),
(2, 'Chains of Hate Chapter_description.htm', 2),
(3, 'Cursed Legacy Chapter_description.htm', 3),
(4, 'Descend Beyond chapter_description.htm', 4),
(5, 'Ghost Face_description.htm', 5),
(6, 'Silent Hill Chapter_description.htm', 6),
(7, 'Stranger Things Chapter_description.htm', 7),
(8, 'Reinforcement Pack_description.htm', 8),
(9, 'War of chosen_description.htm', 9),
(10, 'Premium Starter Pack_description.htm', 10);

-- --------------------------------------------------------

--
-- Table structure for table `dlc_images`
--

CREATE TABLE `dlc_images` (
  `id_dlc` int(11) NOT NULL,
  `dlc_image_name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dlc_images`
--

INSERT INTO `dlc_images` (`id_dlc`, `dlc_image_name`) VALUES
(1, 'A Binding of Kin Chapter_1_1.jpg'),
(2, 'Chains of Hate Chapter_1.jpg'),
(3, 'Cursed Legacy Chapter_1.jpg'),
(4, 'Descend Beyond chapter_1.jpg'),
(5, 'Ghost Face_1.jpg'),
(6, 'Silent Hill Chapter_1.jpg'),
(7, 'Stranger Things Chapter_1.jpg'),
(8, 'XCOM2_2_1.jpg'),
(8, 'XCOM2_2_2.jpg'),
(9, 'XCOM2_1_1.jpg'),
(9, 'XCOM2_1_2.jpg'),
(9, 'XCOM2_1_3.jpg'),
(9, 'XCOM2_1_4.jpg'),
(10, 'Battlefield V_1_1.jpg'),
(10, 'Battlefield V_1_2.jpg'),
(10, 'Battlefield V_1_3.jpg'),
(10, 'Battlefield V_1_4.jpg'),
(10, 'Battlefield V_1_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `game_lists`
--

CREATE TABLE `game_lists` (
  `id_games` int(11) NOT NULL,
  `game_names` text COLLATE utf8_bin NOT NULL,
  `release_date` text COLLATE utf8_bin NOT NULL,
  `developers` text COLLATE utf8_bin NOT NULL,
  `publishers` text COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `insert_time_game` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `game_lists`
--

INSERT INTO `game_lists` (`id_games`, `game_names`, `release_date`, `developers`, `publishers`, `price`, `insert_time_game`) VALUES
(1, 'Dead by Daylight', '14/5/2016', 'Behaviour Interactive Inc.', 'Behaviour Interactive Inc.', 369, '2021-03-21 15:09:07'),
(2, 'XCOM2', '5/2/2016', ' Firaxis Games, Feral Interactive (Mac), Feral Interactive (Linux)', ' 2K, Feral Interactive (Mac), Feral Interactive (Linux)', 1499, '2021-03-21 15:37:04'),
(3, 'Battlefield V', '9/9/2018', 'DICE', 'Electronic Arts', 1899, '2021-03-21 15:44:47'),
(4, 'Battlefield 4', '29/9/2013', 'DICE', 'Electronic Arts', 1299, '2021-03-21 15:48:26'),
(5, 'Slay the Spire', '12/8/2018', 'test1', 'test1', 99, '2021-03-24 09:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `match_game_tags`
--

CREATE TABLE `match_game_tags` (
  `id_games` int(11) NOT NULL,
  `id_tags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `match_game_tags`
--

INSERT INTO `match_game_tags` (`id_games`, `id_tags`) VALUES
(1, 1),
(1, 38),
(1, 39),
(1, 44),
(1, 52),
(2, 3),
(2, 7),
(2, 13),
(2, 15),
(2, 19),
(2, 31),
(2, 34),
(2, 46),
(2, 53),
(2, 58),
(2, 61),
(3, 1),
(3, 4),
(3, 30),
(3, 46),
(3, 52),
(3, 55),
(3, 56),
(3, 58),
(3, 60),
(4, 1),
(4, 4),
(4, 30),
(4, 46),
(4, 52),
(4, 55),
(4, 58),
(4, 60),
(5, 2),
(5, 6),
(5, 12),
(5, 13),
(5, 15),
(5, 17),
(5, 23),
(5, 30),
(5, 36),
(5, 52),
(5, 53),
(5, 56),
(5, 58),
(5, 60),
(5, 62),
(6, 1),
(6, 28),
(6, 51),
(7, 4),
(7, 24),
(7, 28),
(7, 51);

-- --------------------------------------------------------

--
-- Table structure for table `minimum_requirment`
--

CREATE TABLE `minimum_requirment` (
  `id_games` int(11) NOT NULL,
  `min_os` text COLLATE utf8_bin NOT NULL,
  `min_processor` text COLLATE utf8_bin NOT NULL,
  `min_memory` text COLLATE utf8_bin NOT NULL,
  `min_grapics` text COLLATE utf8_bin NOT NULL,
  `min_storage` text COLLATE utf8_bin NOT NULL,
  `min_addition_note` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `minimum_requirment`
--

INSERT INTO `minimum_requirment` (`id_games`, `min_os`, `min_processor`, `min_memory`, `min_grapics`, `min_storage`, `min_addition_note`) VALUES
(1, 'Windows 10 64-bit Operating System', 'Intel Core i3-4170 or AMD FX-8120', ' 8 GB RAM', 'DX11 Compatible GeForce GTX 460 1GB or AMD HD 6850 1GB', '50 GB available space', 'With these requirements, it is recommended that the game is played on Low quality settings.'),
(2, 'Windows® 7, 64-bit', 'Intel Core 2 Duo E4700 2.6 GHz or AMD Phenom 9950 Quad Core 2.6 GHz', '4 GB RAM', '1GB ATI Radeon HD 5770, 1GB NVIDIA GeForce GTX 460 or better', ' 45 GB available space', ''),
(3, ' 64-bit Windows 7, Windows 8.1 and Windows 10', 'AMD FX-8350/ Core i5 6600K', '8 GB RAM', 'NVIDIA GeForce® GTX 1050 / NVIDIA GeForce® GTX 660 2GB or AMD Radeon™ RX 560 / HD 7850 2GB', '50 GB available space', ''),
(4, 'Windows 8 32-bit', 'Processor (AMD): Athlon X2 2.8 GHz Processor (Intel): Core 2 Duo 2.4 GHz', '4 GB RAM', 'Graphics card (AMD): AMD Radeon HD 3870 Graphics card (NVIDIA): Nvidia GeForce 8800 GT', '30 GB available space', ''),
(5, 'Windows® 7, 64-bit', 'Intel Core 2 Duo E4700 2.6 GHz or AMD Phenom 9950 Quad Core 2.6 GHz', '4 GB RAM', '1GB ATI Radeon HD 5770, 1GB NVIDIA GeForce GTX 460 or better', '45 GB available space', ''),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `minor_images`
--

CREATE TABLE `minor_images` (
  `id_games` int(11) NOT NULL,
  `minor_images_name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `minor_images`
--

INSERT INTO `minor_images` (`id_games`, `minor_images_name`) VALUES
(1, 'Dead by Daylight_1.jpg'),
(1, 'Dead by Daylight_2.jpg'),
(2, 'XCOM2_1.jpg'),
(2, 'XCOM2_2.jpg'),
(2, 'XCOM2_3.jpg'),
(2, 'XCOM2_4.jpg'),
(2, 'XCOM2_5.jpg'),
(2, 'XCOM2_6.jpg'),
(2, 'XCOM2_7.jpg'),
(3, 'Battlefield V_1.jpg'),
(3, 'Battlefield V_2.jpg'),
(3, 'Battlefield V_3.jpg'),
(3, 'Battlefield V_4.jpg'),
(3, 'Battlefield V_5.jpg'),
(3, 'Battlefield V_6.jpg'),
(3, 'Battlefield V_7.jpg'),
(3, 'Battlefield V_8.jpg'),
(4, 'Battlefield_4_1.jpg'),
(4, 'Battlefield_4_2.jpg'),
(4, 'Battlefield_4_3.jpg'),
(4, 'Battlefield_4_4.jpg'),
(4, 'Battlefield_4_5.jpg'),
(5, 'Slay_the_Spire_1.jpg'),
(5, 'Slay_the_Spire_2.jpg'),
(5, 'Slay_the_Spire_3.jpg'),
(6, 'XCOM2_1.jpg'),
(6, 'XCOM2_2.jpg'),
(6, 'XCOM2_3.jpg'),
(6, 'XCOM2_4.jpg'),
(6, 'XCOM2_5.jpg'),
(6, 'XCOM2_6.jpg'),
(6, 'XCOM2_7.jpg'),
(7, 'XCOM2_1.jpg'),
(7, 'XCOM2_2.jpg'),
(7, 'XCOM2_3.jpg'),
(7, 'XCOM2_4.jpg'),
(7, 'XCOM2_5.jpg'),
(7, 'XCOM2_6.jpg'),
(7, 'XCOM2_7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recommend_requirment`
--

CREATE TABLE `recommend_requirment` (
  `id_games` int(11) NOT NULL,
  `rec_os` text COLLATE utf8_bin NOT NULL,
  `rec_processor` text COLLATE utf8_bin NOT NULL,
  `rec_memory` text COLLATE utf8_bin NOT NULL,
  `rec_grapics` text COLLATE utf8_bin NOT NULL,
  `rec_storage` text COLLATE utf8_bin NOT NULL,
  `rec_addition_note` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `recommend_requirment`
--

INSERT INTO `recommend_requirment` (`id_games`, `rec_os`, `rec_processor`, `rec_memory`, `rec_grapics`, `rec_storage`, `rec_addition_note`) VALUES
(1, 'Windows 10 64-bit Operating System', ' Intel Core i3-4170 or AMD FX-8300 or higher', ' 8 GB RAM', 'DX11 Compatible GeForce GTX 460 1GB or AMD HD 6850 1GB', '50 GB available space', ''),
(2, 'Windows® 7, 64-bit', '3GHz Quad Core', '8 GB RAM', '2GB ATI Radeon HD 7970, 2GB NVIDIA GeForce GTX 770 or better', '45 GB available sp', ''),
(3, '64-bit Windows 10 or later', 'AMD Ryzen 3 1300X/Intel Core i7 4790', '12 GB RAM', 'NVIDIA GeForce® GTX 1060 6GB/AMD Radeon™ RX 580 8GB', '50 GB available space', ''),
(4, 'Windows 8 64-bit', 'Processor (AMD): Six-core CPU Processor (Intel): Quad-core CPU', '8 GB RAM', 'Graphics card (AMD): AMD Radeon HD 7870 Graphics card (Nvidia): NVIDIA GeForce GTX 660', '30 GB available space', ''),
(5, '', '', '', '', '', ''),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(11) NOT NULL,
  `tag_name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tags`, `tag_name`) VALUES
(1, 'action'),
(2, 'shooting'),
(3, 'strategy'),
(4, 'first-person-shooter'),
(5, 'third-person-shooter'),
(6, 'simulation'),
(7, 'turn-base'),
(8, 'adventure'),
(9, 'RTS'),
(10, 'farming'),
(11, 'rogue-like'),
(12, 'casual'),
(13, 'difficult'),
(14, 'racing'),
(15, 'survival'),
(16, 'sandbox'),
(17, 'robot'),
(18, 'building'),
(19, 'sci-fi'),
(20, 'indie'),
(21, 'crafting'),
(22, 'open-world'),
(23, 'fishing'),
(24, 'cute'),
(25, 'RPG'),
(26, 'exploration'),
(27, 'management'),
(28, '2D'),
(29, 'co-op'),
(30, 'multi-player'),
(31, 'single-player'),
(32, 'romanctic'),
(33, 'funny'),
(34, 'space'),
(35, 'fantasy'),
(36, 'realistic'),
(37, 'looting'),
(38, 'horror'),
(39, 'gore'),
(40, 'pixel-graphics'),
(41, 'battle royale'),
(42, 'crime'),
(43, 'noir'),
(44, 'violent'),
(45, 'story rich'),
(46, 'character customization'),
(47, 'futuristic'),
(48, 'economy'),
(49, 'hack and slash'),
(50, 'mythology'),
(51, 'bullet hell'),
(52, 'PVP'),
(53, 'PVE'),
(54, 'naval'),
(55, 'war'),
(56, 'historical'),
(57, 'medieval'),
(58, 'tactical'),
(59, 'great soundtrack'),
(60, 'military'),
(61, 'alien'),
(62, 'western');

-- --------------------------------------------------------

--
-- Table structure for table `thumnail_images`
--

CREATE TABLE `thumnail_images` (
  `id_thumbnail_images` int(11) NOT NULL,
  `image_name` text COLLATE utf8_bin NOT NULL,
  `id_games` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `thumnail_images`
--

INSERT INTO `thumnail_images` (`id_thumbnail_images`, `image_name`, `id_games`) VALUES
(1, 'Dead by Daylight_thumbnaill.jpg', 1),
(2, 'XCOM2_thumbnaill.jpg', 2),
(3, 'Battlefield V_thumbnail.jpg', 3),
(4, 'Battlefield 4_thumbnail.jpg', 4),
(5, 'Slay_the_Spire_thumbnaill.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `usernames` varchar(20) COLLATE utf8_bin NOT NULL,
  `passwords` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `usernames`, `passwords`) VALUES
(1, 'Iden', 'sittasitta683'),
(2, 'I', 'sittasitta683'),
(3, 'Iden97', '12345'),
(4, 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id_users` int(11) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `birthdate` text COLLATE utf8_bin NOT NULL,
  `sex` varchar(10) COLLATE utf8_bin NOT NULL,
  `country` text COLLATE utf8_bin NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id_users`, `email`, `birthdate`, `sex`, `country`, `insert_time`) VALUES
(1, 'sitta.s@outlook.co.th', '2020-01-15', 'male', 'Thailand', '2021-01-15 03:54:22'),
(2, 'i@gmail.com', '2020-01-15', 'male', 'Thailand', '2021-01-15 03:58:50'),
(3, 'money_683@hotmail.com', '2020-02-16', 'female', 'Thailand', '2021-01-15 04:01:30'),
(4, 'aaaaa@hotmail.com', '2018-07-24', 'male', 'Thailand', '2021-05-24 07:33:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id_description`);

--
-- Indexes for table `dlc`
--
ALTER TABLE `dlc`
  ADD PRIMARY KEY (`id_dlc`);

--
-- Indexes for table `dlc_description`
--
ALTER TABLE `dlc_description`
  ADD PRIMARY KEY (`id_dlc_description`);

--
-- Indexes for table `game_lists`
--
ALTER TABLE `game_lists`
  ADD PRIMARY KEY (`id_games`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indexes for table `thumnail_images`
--
ALTER TABLE `thumnail_images`
  ADD PRIMARY KEY (`id_thumbnail_images`),
  ADD KEY `thumnail_images_ibfk_1` (`id_games`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id_description` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dlc`
--
ALTER TABLE `dlc`
  MODIFY `id_dlc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dlc_description`
--
ALTER TABLE `dlc_description`
  MODIFY `id_dlc_description` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game_lists`
--
ALTER TABLE `game_lists`
  MODIFY `id_games` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `thumnail_images`
--
ALTER TABLE `thumnail_images`
  MODIFY `id_thumbnail_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thumnail_images`
--
ALTER TABLE `thumnail_images`
  ADD CONSTRAINT `thumnail_images_ibfk_1` FOREIGN KEY (`id_games`) REFERENCES `game_lists` (`id_games`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
