-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 08:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumskuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `commentid`, `content`, `datetime`) VALUES
(1, 1, 13, 'hahahahaha', '2023-11-19 19:59:21'),
(2, 9, 13, 'apaan si ketawa2 sendiri di post sendiri', '2023-11-19 20:13:39'),
(3, 5, 13, 'tau dah kucing ga jelas, mending berobat sana pake petaholic', '2023-11-19 20:15:25'),
(4, 6, 13, 'teman temannkuu sudah nikahhh.... aku masihh nonton spongeeebobbb', '2023-11-19 20:18:26'),
(5, 4, 13, 'ini fitur comments ga ada faedahnya woi', '2023-11-19 20:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `content`, `datetime`) VALUES
(1, 1, 'Ini judul', 'Halo ini isi dari post gua, blablablabbablablbalbla, lorem ipsum dolor sit amet wkaoakwoaowakakokow mantap bang.', '2023-02-16 15:20:20'),
(2, 5, 'hugo ganteng', 'woiwoiwoi 123 123 123 12 laper woi mau makankowkaowkoawkowkaokawoawkok skuy makan skuyyyy.', '2023-02-16 15:49:15'),
(4, 4, 'Test nathan', 'Halo guys ini post pertama gua di ForumSkuyyyyyy!!!', '2023-02-17 08:06:49'),
(5, 6, 'Halo saya ale', 'Hello bro, saya agustinus leonardo tinggal di kalibata salken yahhhhhhh!!!!', '2023-02-17 08:08:45'),
(6, 7, 'Perkenalkan', 'Halo kawan2 nama saya joshua, saya mahasiswa bina nusantara jurusan cyber security anjayyyyy.', '2023-02-17 08:33:28'),
(7, 1, 'hai teman2', 'hai ges namaku max, kucing tinggal di jalan salam', '2023-09-14 13:45:08'),
(8, 1, 'Jonathan ganteng', 'Sebab kau terlalu indahhhhhhhhh', '2023-09-14 13:58:54'),
(9, 1, 'awikwok', 'AHAHAHAHHAHAHAHAHAHAHAAHAH SEC PROG GAS', '2023-11-19 16:06:21'),
(11, 9, 'HEHEHEHE', 'XSS bisa nih di web ini', '2023-11-19 18:05:02'),
(12, 1, 'dsaasddsaads', 'dsaasddsadsaadsdas', '2023-11-19 18:17:07'),
(13, 1, 'Wuadidadiwudidaww', 'Pergi ke pasar beli jambu', '2023-11-19 19:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `picture`) VALUES
(1, 'makusa', 'makusa', 'makusa.jpg'),
(2, 'gegegimang', 'aaaaaaaa', 'default.jpg'),
(3, 'timothy', 'timothy1', 'default.jpg'),
(4, 'nathan', 'nathan123', 'nathan.jpg'),
(5, 'hugocuandri', 'hugo123123', 'hugocuandri.png'),
(6, 'agustinusleo', 'alealeale', 'agustinusleo.jpg'),
(7, 'JoshuaRL', 'joshua123', 'joshuarl.jpeg'),
(8, 'makusa1', '12345678', 'default.jpg'),
(9, 'makusa2', '12345678', 'makusa2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
