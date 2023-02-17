-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `content`, `datetime`) VALUES
(1, 1, 'Ini judul', 'Halo ini isi dari post gua, blablablabbablablbalbla, lorem ipsum dolor sit amet wkaoakwoaowakakokow mantap bang.', '2023-02-16 15:20:20'),
(2, 5, 'hugo ganteng', 'woiwoiwoi 123 123 123 12 laper woi mau makankowkaowkoawkowkaokawoawkok skuy makan skuyyyy.', '2023-02-16 15:49:15'),
(4, 4, 'Test nathan', 'Halo guys ini post pertama gua di ForumSkuyyyyyy!!!', '2023-02-17 08:06:49'),
(5, 6, 'Halo saya ale', 'Hello bro, saya agustinus leonardo tinggal di kalibata salken yahhhhhhh!!!!', '2023-02-17 08:08:45'),
(6, 7, 'Perkenalkan', 'Halo kawan2 nama saya joshua, saya mahasiswa bina nusantara jurusan cyber security anjayyyyy.', '2023-02-17 08:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `picture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'JoshuaRL', 'joshua123', 'joshuarl.jpeg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
