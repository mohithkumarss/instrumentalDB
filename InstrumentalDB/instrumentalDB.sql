-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2023 at 10:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instrumentalDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `f_name`, `username`, `password`) VALUES
(15, 'leokonda', 'leomohith', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Guitar', 'instrument_Category850.jpeg', 'Yes', 'Yes'),
(5, 'Drums', 'instrument_Category147.jpg', 'Yes', 'Yes'),
(6, 'Piano', 'instrument_Category950.jpg', 'Yes', 'Yes'),
(7, 'Violin', 'instrument_Category777.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE `t_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `c_name` varchar(150) NOT NULL,
  `c_contact` varchar(20) NOT NULL,
  `c_mail` varchar(150) NOT NULL,
  `c_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_order`
--

INSERT INTO `t_order` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `c_name`, `c_contact`, `c_mail`, `c_address`) VALUES
(6, 'The Bass Guitar', '599.00', 3, '1797.00', '2023-01-08 07:44:43', 'Delivered', 'leo', '123456ytfdxcvb', 'leokondaleo1@gmail.com', '2345678iuytdsz vbnm,'),
(8, 'The Classical Guitar', '499.00', 1, '499.00', '2023-01-09 06:20:30', 'Delivered', 'shruthi', '9742194553', 'shruthits20@gmail.com', 'bangalore'),
(9, 'The Classical Guitar', '499.00', 1, '499.00', '2023-01-11 09:49:56', 'Delivered', 'justin', '9900814756', 'shalomjustin@gmial.com', '12345678909uytrdsxcghjkmnbv'),
(10, 'The Tenor Drum', '699.00', 1, '699.00', '2023-01-11 11:37:53', 'Delivered', 'harsha', '098766543', 'jadoo@gmail.com', '2345678909iuytredcvbklkuytres'),
(11, 'The Electric Guitar', '799.00', 5, '3995.00', '2023-01-20 07:56:39', 'Delivered', 'dfghj', '1234567', 'leokondaleo1@gmail.com', '12345uikl,mnbvfcdsdxcfvbn '),
(12, 'The Electric Guitar', '799.00', 2, '1598.00', '2023-02-09 05:45:31', 'Delivered', 'wertyhj', 'qwerty67890', 'leokonda@gmail.com', 'sdfghjkloi8765432wqasxcvbhnjkl');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'The Acoustic Guitar', 'An acoustic guitar is a musical instrument in the string family. When a string is plucked its vibration is transmitted from the bridge, resonating throughout the top of the guitar.', '699.00', 'PRD-Name-5911.jpg', 4, 'Yes', 'Yes'),
(6, 'The Electric Guitar', 'An electric guitar is a guitar that requires external amplification in order to be heard at typical performance volumes, unlike a standard acoustic guitar', '799.00', 'PRD-Name-1441.jpg', 4, 'Yes', 'Yes'),
(7, 'The Bass Guitar', 'The bass guitar, electric bass or simply bass, is the lowest-pitched member of the string family. It is a plucked string instrument similar in appearance and construction to an electric or an acoustic guitar', '599.00', 'PRD-Name-8395.jpg', 4, 'Yes', 'Yes'),
(8, 'The Classical Guitar', 'The classical guitar (also known as the nylon-string guitar or Spanish guitar) is a member of the guitar family used in classical music and other styles.', '499.00', 'PRD-Name-4187.webp', 4, 'Yes', 'Yes'),
(9, 'The Bass Drum', 'The bass drum is a large drum that produces a note of low definite or indefinite pitch. The instrument is typically cylindrical, ', '799.00', 'PRD-Name-7673.jpg', 5, 'Yes', 'Yes'),
(10, 'The Tenor Drum', 'A tenor drum is a membranophone without a snare.', '699.00', 'PRD-Name-6980.jpg', 5, 'Yes', 'Yes'),
(11, 'The Timpani', 'A type of drum categorised as a hemispherical drum, they consist of a membrane called a head stretched over a large bowl traditionally made of copper. ', '749.00', 'PRD-Name-8998.webp', 5, 'Yes', 'Yes'),
(12, 'The Bodhran', 'The classical guitar (also known as the nylon-string guitar or Spanish guitar) is a member of the guitar family used in classical music and other styles.', '599.00', 'PRD-Name-1370.webp', 5, 'Yes', 'Yes'),
(13, 'The Studio Piano', 'Studio pianos are a type of vertical, or upright, piano, which differ from grand pianos in one key way: the hammer-on-string action is vertical rather than horizontal.', '999.00', 'PRD-Name-9975.webp', 6, 'Yes', 'Yes'),
(14, 'The Digital Piano', 'A digital piano is a type of electronic keyboard instrument designed to serve primarily as an alternative to the traditional acoustic piano, both in the way it feels to play and in the sound produced.', '1099.00', 'PRD-Name-2968.webp', 6, 'Yes', 'Yes'),
(15, 'The Grand Piano', 'In grand pianos the frame and strings are horizontal, with the strings extending away from the keyboard. The action lies beneath the strings, and uses gravity as its means of return to a state of rest.\r\n', '2499.00', 'PRD-Name-9158.jpg', 6, 'Yes', 'Yes'),
(16, ' The Baroque', 'A Baroque violin is a violin set up in the manner of the baroque period of music. The term includes original instruments which have survived unmodified', '399.00', 'PRD-Name-6159.jpg', 7, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_order`
--
ALTER TABLE `t_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
