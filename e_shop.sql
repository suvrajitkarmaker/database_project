-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2018 at 01:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `email` varchar(50) NOT NULL,
  `line1` text NOT NULL,
  `line2` text NOT NULL,
  `line3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`email`, `line1`, `line2`, `line3`) VALUES
('ahmedtanjed@gmail.com', '583', 'Peyarabagh Railgate', 'Dhaka,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productname` varchar(300) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productname`, `price`, `status`, `quantity`) VALUES
('Mens balck shirt', 2546, 'oncart', 2),
('Mens Beguli shirt', 2147, 'oncart', 3),
('Mens Beguli shirt', 2147, 'oncart', 3);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`table_name`) VALUES
('mensshirt'),
('menspant');

-- --------------------------------------------------------

--
-- Table structure for table `menspant`
--

CREATE TABLE `menspant` (
  `id` varchar(200) NOT NULL,
  `category` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menspant`
--

INSERT INTO `menspant` (`id`, `category`, `name`, `image1`, `image2`, `image3`, `image4`, `price`, `description`) VALUES
('pant1', '', 'mens gabading pant', 'mens gabading pant.jpg', '', '', '', 2353, 'beshi joss'),
('pant2', '', 'mens stylist pant', 'mens stylist pant.jpg', '', '', '', 2346, 'Beshi joss'),
('pant2', '', 'mens blue pant', 'mens blue pant.jpg', '', '', '', 1233, 'Beshi joss'),
('pant4', '', 'mens black formal pant', 'mens black formal pant.jpeg\r\n', '', '', '', 2349, 'Beshi joss'),
('pant1', '', 'black usual pant', 'black usual pant.jpg', '', '', '', 2233, 'Beshi joss');

-- --------------------------------------------------------

--
-- Table structure for table `mensshirt`
--

CREATE TABLE `mensshirt` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensshirt`
--

INSERT INTO `mensshirt` (`id`, `name`, `image1`, `image2`, `image3`, `image4`, `price`, `description`) VALUES
('shirt1', 'Black & Brown Casual Shirt', 'Black & Brown Casual Shirt.jpg', '', '', '', 1200, 'Weight (g): 2. Material: Cotton. Type: Casual'),
('shirt2', 'Blue & White Casual Shirt', 'Blue & White Casual Shirt.jpg', '', '', '', 1400, 'Weight (g): 3. Material: Cotton. Type: Casual'),
('shirt3', 'Blue check Half Sleeve Shirt', 'Blue check Half Sleeve Shirt.jpg', '', '', '', 1300, 'Weight (g): 3. Material: Cotton. Type: Casual'),
('shirt4', 'Blue Formal Shirt', 'Blue Formal Shirt.jpg', '', '', '', 1400, 'Weight (g): 4. Material: Cotton. Type: Formal'),
('shirt5', 'Brown Cotton Half Sleeve Shirt', 'Brown Cotton Half Sleeve Shirt.jpg', '', '', '', 1200, 'Weight (g): 3. Material: Cotton. Type: Casual'),
('shirt6', 'Check Half Sleeve men Shirt', 'Check Half Sleeve men Shirt.jpg', '', '', '', 1500, 'Weight (g): 3. Material: Cotton. Type: Casual'),
('shirt7', 'Check Half Sleeve Shirt', 'Check Half Sleeve Shirt.jpg', '', '', '', 1400, 'Weight (g): 2. Material: Cotton. Type: Casual'),
('shirt8', 'Deep Blue Formal Shirt', 'Deep Blue Formal Shirt.jpg', '', '', '', 1500, 'Weight (g): 2. Material: Cotton. Type: Formal'),
('shirt9', 'Deep Gray Formal Shirt', 'Deep Gray Formal Shirt.jpg', '', '', '', 1500, 'Weight (g): 2. Material: Cotton. Type: Formal'),
('shirt10', 'Gray Casual Shirt', 'Gray Casual Shirt.jpg', '', '', '', 1200, 'Weight (g): 2. Material: Cotton. Type: Casual'),
('shirt11', 'Gray Check Formal Shirt', 'Gray Check Formal Shirt.jpg', '', '', '', 1100, 'Weight (g): 3. Material: Silk. Type: Formal.'),
('shirt12', 'Gray Formal Shirt', 'Gray Formal Shirt.jpg', '', '', '', 1500, 'Weight (g): 3. Material: Silk. Type: Formal.'),
('shirt13', 'Navy Blue Formal Shirt', 'Navy Blue Formal Shirt.jpg', '', '', '', 1600, 'Weight (g): 3. Material: Silk. Type: Formal.'),
('shirt14', 'Purple Formal Shirt', 'Purple Formal Shirt.jpg', '', '', '', 1600, 'Weight (g): 3. Material: Cotton. Type: Formal.'),
('shirt15', 'Red & Black Caual Shirt', 'Red & Black Caual Shirt.jpg', '', '', '', 1200, 'Weight (g): 3. Material: Cotton. Type: Casual.'),
('shirt16', 'Red Check Casual Shirt', 'Red Check Casual Shirt.jpg', '', '', '', 1100, 'Weight (g): 2. Material: Cotton. Type: Casual.'),
('shirt17', 'Sky & White Check Full Sleeve Shirt', 'Sky & White Check Full Sleeve Shirt.jpg', '', '', '', 1300, 'Weight (g): 3. Material: Cotton. Type: Formal.'),
('shirt18', 'Sky Blue Formal Shirt', 'Sky Blue Formal Shirt.jpg', '', '', '', 1200, 'Weight (g): 3. Material: Cotton. Type: Formal.'),
('shirt19', 'Sky Formal Shirt', 'Sky Formal Shirt.jpg', '', '', '', 1300, 'Weight (g): 4. Material: Cotton. Type: Formal.'),
('shirt20', 'White Formal Shirt', 'White Formal Shirt.jpg', '', '', '', 1200, 'Weight (g): 4. Material: Cotton. Type: Formal.');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `name`, `image1`, `image2`, `image3`, `image4`, `price`, `description`) VALUES
('pant1', 'mens gabading pant', 'mens gabading pant.jpg', '', '', '', 2353, 'beshi joss'),
('pant2', 'mens stylist pant', 'mens stylist pant.jpg', '', '', '', 2346, 'Beshi joss'),
('pant2', 'mens blue pant', 'mens blue pant.jpg', '', '', '', 1233, 'Beshi joss'),
('pant4', 'mens black formal pant', 'mens black formal pant.jpeg\r\n', '', '', '', 2349, 'Beshi joss'),
('pant1', 'black usual pant', 'black usual pant.jpg', '', '', '', 2233, 'Beshi joss'),
('pant1', 'mens gabading pant', 'mens gabading pant.jpg', '', '', '', 2353, 'beshi joss'),
('pant2', 'mens stylist pant', 'mens stylist pant.jpg', '', '', '', 2346, 'Beshi joss'),
('pant2', 'mens blue pant', 'mens blue pant.jpg', '', '', '', 1233, 'Beshi joss'),
('pant4', 'mens black formal pant', 'mens black formal pant.jpeg\r\n', '', '', '', 2349, 'Beshi joss'),
('pant1', 'black usual pant', 'black usual pant.jpg', '', '', '', 2233, 'Beshi joss'),
('pant1', 'mens gabading pant', 'mens gabading pant.jpg', '', '', '', 2353, 'beshi joss'),
('pant2', 'mens stylist pant', 'mens stylist pant.jpg', '', '', '', 2346, 'Beshi joss'),
('pant2', 'mens blue pant', 'mens blue pant.jpg', '', '', '', 1233, 'Beshi joss'),
('pant4', 'mens black formal pant', 'mens black formal pant.jpeg\r\n', '', '', '', 2349, 'Beshi joss'),
('pant1', 'black usual pant', 'black usual pant.jpg', '', '', '', 2233, 'Beshi joss'),
('pant1', 'mens gabading pant', 'mens gabading pant.jpg', '', '', '', 2353, 'beshi joss'),
('pant2', 'mens stylist pant', 'mens stylist pant.jpg', '', '', '', 2346, 'Beshi joss'),
('pant2', 'mens blue pant', 'mens blue pant.jpg', '', '', '', 1233, 'Beshi joss'),
('pant4', 'mens black formal pant', 'mens black formal pant.jpeg\r\n', '', '', '', 2349, 'Beshi joss'),
('pant1', 'black usual pant', 'black usual pant.jpg', '', '', '', 2233, 'Beshi joss');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ad_line1` text NOT NULL,
  `ad_line2` text NOT NULL,
  `ad_line3` text NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ad_line1`, `ad_line2`, `ad_line3`, `p_type`, `p_number`) VALUES
('583', 'Peyarabagh', 'Dhaka,Bangladesh', 'bcash', ''),
('583', 'Peyarabagh', 'Dhaka,Bangladesh', 'bcash', '');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`firstname`, `lastname`, `email`, `password`, `gender`, `bdate`) VALUES
('Tanjed', 'Atono', 'ahmedtanjed@gmail.com', 'khan', 'male', '1996-04-07'),
('Suvrajit', 'Karmaker', 'suvrajitkarmaker2016@gmail.com', '123', 'male', '1999-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `userpic`
--

CREATE TABLE `userpic` (
  `email` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpic`
--

INSERT INTO `userpic` (`email`, `image`) VALUES
('ahmedtanjed@gmail.com', 'propic.jpg'),
('suvrajitkarmaker2016@gmail.com', 'profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
