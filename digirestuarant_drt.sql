-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 12:54 AM
-- Server version: 10.3.29-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digirestuarant_drt`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(2) NOT NULL,
  `pagename` varchar(25) NOT NULL,
  `icon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `pagename`, `icon`) VALUES
(1, 'Dashboard', 'entypo-gauge'),
(2, 'General', 'glyphicon glyphicon-cog');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `restuarant_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `restuarant_id`, `company_id`) VALUES
(6, 'Screen 1', 8, 31),
(7, 'screen 1', 24, 45);

-- --------------------------------------------------------

--
-- Table structure for table `promotion2`
--

CREATE TABLE `promotion2` (
  `id` int(11) NOT NULL,
  `first_line` text NOT NULL,
  `first_line_version` text NOT NULL,
  `second_line` text NOT NULL,
  `secondlineversion` text NOT NULL,
  `dodakti_item` text NOT NULL,
  `dodakti_item_price` text NOT NULL,
  `dodakti_item_scnd` text NOT NULL,
  `dodakti_item_scnd_price` text NOT NULL,
  `dodakti_item_thrd` text NOT NULL,
  `dodakti_item_thrd_price` text NOT NULL,
  `dodakti_item_forth` text NOT NULL,
  `dodakti_item_forth_price` text NOT NULL,
  `dodakti_item_fifth` text NOT NULL,
  `dodakti_item_fifth_price` text NOT NULL,
  `dodakti_item_sixth` text NOT NULL,
  `dodakti_item_sixth_price` text NOT NULL,
  `dodakti_item_sevnth` text NOT NULL,
  `dodakti_item_sevnth_price` text NOT NULL,
  `dodakti_item_eight` text NOT NULL,
  `dodakti_item_eight_price` text NOT NULL,
  `dodakti_item_nine` text NOT NULL,
  `dodakti_item_nine_price` text NOT NULL,
  `start_Date` date NOT NULL,
  `end_Date` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `versiontype` text NOT NULL,
  `duration` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `playlistid` int(11) NOT NULL,
  `pro_type` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `firstdish` text NOT NULL,
  `dish1price` text NOT NULL,
  `dish1version` text NOT NULL,
  `seconddish` text NOT NULL,
  `dish2price` text NOT NULL,
  `dish2version` text NOT NULL,
  `thirddish` text NOT NULL,
  `dish3price` text NOT NULL,
  `dish3version` text NOT NULL,
  `leftproduct` text NOT NULL,
  `leftproductprice` text NOT NULL,
  `leftproductversion` text NOT NULL,
  `rightproductprice` text NOT NULL,
  `rightproductversion` text NOT NULL,
  `versiontype` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `rightproduct` text NOT NULL,
  `start_Date` date NOT NULL,
  `end_Date` date NOT NULL,
  `duration` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `playlistid` int(11) NOT NULL,
  `pro_type` int(1) NOT NULL DEFAULT 1,
  `first_line` text NOT NULL,
  `first_line_version` text NOT NULL,
  `second_line` text NOT NULL,
  `secondlineversion` text NOT NULL,
  `dodakti_item` text NOT NULL,
  `dodakti_item_price` text NOT NULL,
  `dodakti_item_scnd` text NOT NULL,
  `dodakti_item_scnd_price` text NOT NULL,
  `dodakti_item_thrd` text NOT NULL,
  `dodakti_item_thrd_price` text NOT NULL,
  `dodakti_item_forth` text NOT NULL,
  `dodakti_item_forth_price` text NOT NULL,
  `dodakti_item_fifth` text NOT NULL,
  `dodakti_item_fifth_price` text NOT NULL,
  `dodakti_item_sixth` text NOT NULL,
  `dodakti_item_sixth_price` text NOT NULL,
  `dodakti_item_sevnth` text NOT NULL,
  `dodakti_item_sevnth_price` text NOT NULL,
  `dodakti_item_eight` text NOT NULL,
  `dodakti_item_eight_price` text NOT NULL,
  `dodakti_item_nine` text NOT NULL,
  `dodakti_item_nine_price` text NOT NULL,
  `image` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `firstdish`, `dish1price`, `dish1version`, `seconddish`, `dish2price`, `dish2version`, `thirddish`, `dish3price`, `dish3version`, `leftproduct`, `leftproductprice`, `leftproductversion`, `rightproductprice`, `rightproductversion`, `versiontype`, `company_id`, `date`, `rightproduct`, `start_Date`, `end_Date`, `duration`, `start_time`, `end_time`, `playlistid`, `pro_type`, `first_line`, `first_line_version`, `second_line`, `secondlineversion`, `dodakti_item`, `dodakti_item_price`, `dodakti_item_scnd`, `dodakti_item_scnd_price`, `dodakti_item_thrd`, `dodakti_item_thrd_price`, `dodakti_item_forth`, `dodakti_item_forth_price`, `dodakti_item_fifth`, `dodakti_item_fifth_price`, `dodakti_item_sixth`, `dodakti_item_sixth_price`, `dodakti_item_sevnth`, `dodakti_item_sevnth_price`, `dodakti_item_eight`, `dodakti_item_eight_price`, `dodakti_item_nine`, `dodakti_item_nine_price`, `image`, `type`) VALUES
(37, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 31, '0000-00-00', '', '2020-07-27', '2020-07-29', '10', '00:00:00', '00:00:00', 6, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/joshua-earle-9idqIGrLuTE-unsplash.jpg', 'Image'),
(38, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 31, '0000-00-00', '', '2020-07-27', '2020-07-29', '18', '00:00:00', '00:00:00', 6, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/Nature_Beautiful_short_video_720p_HD.mp4', 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_image`
--

CREATE TABLE `promotion_image` (
  `image_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_image`
--

INSERT INTO `promotion_image` (`image_id`, `company_id`, `name`, `image`) VALUES
(1, 31, 'Testing promotion', 'assets/images/layout.jpeg'),
(2, 31, 'Testing promotion 2', 'assets/images/layout2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_image2`
--

CREATE TABLE `promotion_image2` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `duration` text NOT NULL,
  `start_Date` date NOT NULL,
  `end_Date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `company_id` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `pro_type` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`id`, `Name`, `company_id`) VALUES
(8, 'Restaurant 1', 31),
(9, 'Restaurant 2', 31),
(24, 'Restaurant 1', 45);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(3) NOT NULL,
  `parentid` int(3) NOT NULL,
  `subpagename` varchar(30) NOT NULL,
  `pageurl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `parentid`, `subpagename`, `pageurl`) VALUES
(2, 2, 'User Management', 'Employee'),
(5, 2, 'Restaurant', 'Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` text NOT NULL,
  `Joining_date` date NOT NULL,
  `status` enum('Active','InActive','Block') NOT NULL DEFAULT 'Active',
  `user_status` enum('User','Admin','Buyer','Employee') NOT NULL,
  `cellno` text NOT NULL,
  `businessname` text NOT NULL,
  `oauth` text NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `email`, `pass`, `Joining_date`, `status`, `user_status`, `cellno`, `businessname`, `oauth`, `company_id`) VALUES
(42, 'Ahmad  Shakeel', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-07-26', 'Active', 'Admin', '', '', '', 31),
(43, 'New User', 'ahmad@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-07-26', '', 'Employee', '', '', '', 31),
(44, 'Numan Khan', 'numan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-07-26', 'Active', 'Employee', '', '', '', 31),
(45, 'Ahmed', 'admin00@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-07-26', 'Active', 'Admin', '', '', '', 45),
(46, 'NK', 'nk@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-07-27', 'Active', 'Employee', '', '', '', 31);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `rec_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`rec_id`, `company_id`, `user_id`, `restaurant_id`) VALUES
(20, 31, 43, 8),
(21, 31, 43, 9),
(22, 31, 44, 8),
(23, 31, 44, 10),
(24, 31, 42, 23),
(25, 45, 45, 24),
(26, 31, 42, 25),
(27, 31, 42, 26),
(28, 31, 46, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `u_id`, `page_id`) VALUES
(95, 44, 5),
(96, 43, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion2`
--
ALTER TABLE `promotion2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_image`
--
ALTER TABLE `promotion_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `promotion_image2`
--
ALTER TABLE `promotion_image2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotion2`
--
ALTER TABLE `promotion2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `promotion_image`
--
ALTER TABLE `promotion_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion_image2`
--
ALTER TABLE `promotion_image2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
