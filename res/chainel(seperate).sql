-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 02:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chainel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bclient`
--

CREATE TABLE IF NOT EXISTS `bclient` (
  `client_code` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `ref_name1` text NOT NULL,
  `ref_name2` text NOT NULL,
  `ref_name3` text NOT NULL,
  `ref_name4` text NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `email3` varchar(50) NOT NULL,
  `email4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is blient table that store basics information about client in database name';

--
-- Dumping data for table `bclient`
--

INSERT INTO `bclient` (`client_code`, `name`, `location`, `address`, `tel`, `user_email`, `ref_name1`, `ref_name2`, `ref_name3`, `ref_name4`, `email1`, `email2`, `email3`, `email4`) VALUES
('amit123', 'Amit Kumar', 'japan920', 'Delhi', 2147483647, 'dbnerddb@gmail.com', 'Rahul Rana', 'Amar', '', '', 'rahul123@gmail.com', 'amar@gmail.com', '', ''),
('amit12315', 'Amit Kumar', 'japan920', 'Delhi', 2147483647, 'amit@gmail.com', 'Rahul Rana', 'Amar', '', '', 'sdf@dfdf.com', 'amar@gmail.com', '', ''),
('bond1234', 'Ravi Kumar', 'pat8044', 'Patna', 2147483647, '', 'amit', '', '', '', '', '', '', ''),
('Gaurav1223', 'Gaurav singh', 'Mum12321', 'Pune mumbai', 2147483647, '', 'Amit Sharma', '', '', '', 'amit@gmail.com', '', '', ''),
('Javed123', 'Javed Akhter ', 'Delhi1235', 'Anand Vihar, Delhi ', 2147483647, '', 'Amit Kumar', 'Aashish Singh', 'sdfdfsd', 'Amol Balasaheb', 'amit@gmail.com', 'aashish@gmail.com', 'sdfsdf@dfdg', 'amol@gmail.com'),
('Misty23141', 'Misty sharma', 'Rusia232', 'Patna', 2147483647, '', 'db', '', '', '', 'db@gmail.com', '', '', ''),
('Mohit23423', 'Mohit Patil', 'Delhi1235', 'Delhi', 2147483647, '', 'Gaurav', '', '', '', 'gaurav@gmail.com', '', '', ''),
('Prince3123', 'Prince', 'p21232323', 'Pune				', 2147483647, '', 'Ravi Kumar', '', '', '', 'ravi@ddf.cl', '', '', ''),
('raj2312356', 'Ankit Singh', 'japan920', 'Patna', 2147483647, '', 'ertetet', '', '', '', 'sdfgdg@dg.com', '', '', ''),
('Rakesh1233', 'Rakesh Roushan', 'qutar232', 'Mumbai', 2147483647, '', 'sdf', '', '', '', 'sdf@gfd.com', '', '', ''),
('ram1234', 'Ramesh', 'Mum12321', 'pune maharastra', 5476864, '', 'fghfhf', 'ddddddd', 'gggggg', 'eeeeeeee', 'dfgh@dfgdfg', 'dfgh@dfgdfg', 'dfgh@dfgdfg', 'dfgh@dfgdfg'),
('Rohit12342', 'Rohit Kumar', 'japan920', 'Delhi', 2147483647, '', 'Rahul Rana', 'Amard', '', '', 'sdfsdf', 'amar@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `clients_register`
--

CREATE TABLE IF NOT EXISTS `clients_register` (
  `client_code` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `ref_name1` text NOT NULL,
  `ref_name2` text NOT NULL,
  `ref_name3` text NOT NULL,
  `ref_name4` text NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `email3` varchar(50) NOT NULL,
  `email4` varchar(50) NOT NULL,
  `link_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is blient table that store basics information about client in database name';

--
-- Dumping data for table `clients_register`
--

INSERT INTO `clients_register` (`client_code`, `name`, `location`, `address`, `tel`, `ref_name1`, `ref_name2`, `ref_name3`, `ref_name4`, `email1`, `email2`, `email3`, `email4`, `link_id`) VALUES
('4534534534', 'ojkoptry', 'Alla1234', 'dfdfg', 2147483647, 'dfgdf', '', '', '', 'gdfg@fdgfg', '', '', '', '10282015022617'),
('5464654635', 'ggjghjgh', 'bang1234', 'hgjgjgh', 2147483647, 'jghj', '', '', '', 'gh@fgf', '', '', '', '10232015030021'),
('amit123', 'dfdsfdsfsd', 'kol80076', 'gfdgdfg', 2147483647, 'dfgdf', '', '', '', 'gdfg@edfdfg.ghfg', '', '', '', '10232015023204'),
('dove12345f', 'fffffffffff', 'Delhi1232', 'ffffffffff', 2147483647, 'jhjhj', '', '', '', 'hjh@hgh.jk', '', '', '', '11032015083005'),
('Javed123', 'Javed', 'kerala123', 'Bangluru K.', 2147483646, 'Amit Kumar', '', '', '', 'amit@gmail.com', '', '', '', '10292015055421'),
('prd123', 'Priyaranjan', 'pat8044', 'Frazer Road, Patna', 2147483647, 'dfhdfh', 'dfgd@', '', '', 'dfgdf', '', '', '', '10232015023057');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_code` varchar(10) NOT NULL,
  `location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_code`, `location_name`) VALUES
('0890980', 'jkjhk'),
('aaaaaaaaa', 'aaaaaaaaaaaa'),
('ban ', 'Bangluruu'),
('bang1234h', 'Bangluru'),
('bang123d', 'Bangluru '),
('dddddddddd', 'ddddddddddddddddd'),
('Delhi1232', 'Delhi north'),
('Delhi1235', 'Delhi'),
('fd', 'df'),
('japan920', 'Japan'),
('kerala123', 'kerala north'),
('kol80076', 'Kolkata'),
('Mum12321', 'Mumbai'),
('pat8044', 'Patna West'),
('punjab32', 'Punjab'),
('qutar232', 'Qutar'),
('Rusia232', 'Rusia'),
('sdf', 'dsf'),
('ssssssssss', 'sssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE IF NOT EXISTS `new_user` (
  `user_code` varchar(25) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_location` text NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_ref_name` text NOT NULL,
  `user_ref_name2` text NOT NULL,
  `user_ref_name3` text NOT NULL,
  `user_ref_name4` text NOT NULL,
  `user_ref_email` varchar(50) NOT NULL,
  `user_ref_email2` varchar(50) NOT NULL,
  `user_ref_email3` varchar(50) NOT NULL,
  `user_ref_email4` varchar(50) NOT NULL,
  `is_admin` int(2) NOT NULL COMMENT 'if it is 1 then admin otherwise user',
  `client_code` varchar(25) NOT NULL,
  `link_id` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL COMMENT 'if 0 it not approved, if 1 then approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`user_code`, `user_name`, `user_password`, `user_location`, `user_address`, `user_contact`, `user_email`, `user_ref_name`, `user_ref_name2`, `user_ref_name3`, `user_ref_name4`, `user_ref_email`, `user_ref_email2`, `user_ref_email3`, `user_ref_email4`, `is_admin`, `client_code`, `link_id`, `flag`) VALUES
('alex1234', 'Alex P. ', '827ccb0eea8a706c4c34a16891f84e7b', 'Rusia232', 'rrrrrrrrrr', 2147483647, 'alex@gmail.com', 'javed', '', '', '', 'javed@gmail.com', '', '', '', 1, 'Mohit23423', '', 1),
('amit1234', 'Amit Kumar', '827ccb0eea8a706c4c34a16891f84e7b', 'Mum12321', 'jsdlfjsdlf', 2147483647, 'amit@gmail.com', 'Amit Kumar', '', '', '', 'amit@gmail.com', '', '', '', 1, '', 'Activated', 0),
('bond1234', 'James Bond', '827ccb0eea8a706c4c34a16891f84e7b', 'Rusia232', 'fgfgfgfgfgfgfgfg', 2147483647, 'bond@live.com', 'alex', 'fg', '', '', 'alex@live.com', '', '', '', 0, 'Rakesh1233', 'Activated', 0),
('dbnerd123', 'Dbnerd', '827ccb0eea8a706c4c34a16891f84e7b', 'Delhi1232', 'Delhi', 2147483647, 'dbnerddb@gmail.com', 'db', '', '', '', 'dbnerddb@gmail.com', '', '', '', 0, '', 'Activated', 0),
('dharam123', 'Dbnerd', '827ccb0eea8a706c4c34a16891f84e7b', 'Delhi1232', 'Delhi', 2147483647, 'kumar.dharambir99@gmail.com', 'db', '', '', '', 'dbnerddb@gmail.com', '', '', '', 0, '', 'Activated', 1),
('javed123', 'Javed', '827ccb0eea8a706c4c34a16891f84e7b', 'bang123d', 'Bangluru', 2147483647, 'javed@gmail.com', 'Amit Kumar', 'alex', 'tom', 'dick', 'amit@gmail', 'alex@gmail.com', 'tom@gmail.com', 'dick@gmail.com', 0, 'Javed123', 'Activated', 0),
('yusufjiruwala', 'yusuf jiruwala', 'abcde', 'bang1234h', 'sadf', 1111111111, 'jiruwala@ymail.com', 'a', '', '', '', 'jiruwala@ymail.com', '', '', '', 0, '', '11072015010220', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE IF NOT EXISTS `order1` (
  `keyfield` varchar(10) NOT NULL,
  `order1_no` varchar(15) NOT NULL,
  `order1_type` text NOT NULL,
  `order1_date` date NOT NULL,
  `order1_client_code` varchar(10) NOT NULL,
  `order1_client_name` text NOT NULL,
  `order1_amount` int(8) NOT NULL,
  `order1_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`keyfield`, `order1_no`, `order1_type`, `order1_date`, `order1_client_code`, `order1_client_name`, `order1_amount`, `order1_flag`) VALUES
('123', '34533', 'cod', '2015-10-13', 'Rak23424', 'Rakesh Sharma', 45980, 1),
('456', '213213', 'cod', '2015-10-13', 'Jais2308', 'Rahul Jaiswal', 56433, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order2`
--

CREATE TABLE IF NOT EXISTS `order2` (
  `keyfield` varchar(10) NOT NULL,
  `order2_pos_no` int(8) NOT NULL,
  `order2_prod_code` varchar(10) NOT NULL,
  `order2_price` int(8) NOT NULL,
  `order2_description` text NOT NULL,
  `order2_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order2`
--

INSERT INTO `order2` (`keyfield`, `order2_pos_no`, `order2_prod_code`, `order2_price`, `order2_description`, `order2_flag`) VALUES
('123', 453, 'sd34324', 5678, 'Recieving data from php', 1),
('456', 345, 'sd75645', 3456, 'Sending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_code` varchar(10) NOT NULL,
  `prod_descr` varchar(100) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_ctg_code` text NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_code`, `prod_descr`, `prod_price`, `prod_ctg_code`, `flag`) VALUES
('7687876', 'fgfg', 43, '123', 0),
('dfsd', 'fds', 45345345, '123', 2),
('sdfsdf', 'Web', 45345345, '123', 1),
('sdfsdf324', 'Webs', 45345345, 'sdf', 0),
('sdfsdfa', 'Web', 45345345, '321', 1),
('sdfsdfafdf', 'Webs', 45345345, '123a', 0),
('sdfsdfas', 'Webs', 45345345, '123', 0),
('sdfsdfdfsd', 'Web', 45345345, '123', 1),
('sdfsdff', 'CD', 45435, 'sssssssss', 0),
('sdfsdffdsf', 'CD', 45435, 'dfgdfd', 0),
('ssssssss', 'CD', 43535, 'ghjgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `prod_ctg_code` varchar(10) NOT NULL,
  `prod_ctg_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`prod_ctg_code`, `prod_ctg_title`) VALUES
('123', 'sss123'),
('123a', 'asdffaa'),
('321', 'dsf'),
('sdf', 'dsfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_name` text NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `client_code` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `is_admins` tinyint(1) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users  table stores user information that user could login or not. If it is admi';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `user_code`, `client_code`, `password`, `is_admins`, `user_contact`, `email_address`) VALUES
('Amit Kumar', 'amit123', 'amit123ss', '123', 1, 214748323, 'amit@gmail.com'),
('ddddddddddd', 'dfdf', '', 'df', 0, 343, 'df'),
('sdf', 'dsf', '', 'df', 0, 300000, 'fdsf'),
('Javed', 'Javed1', 'javed123', '123', 1, 4353453, 'javed@mall.com'),
('Javed', 'javed123', 'Javed123', '12345', 1, 2147483647, 'javed@gmail.com'),
('prd', 'prd123', 'prd123', '123', 0, 657467846, 'sdf@dg.fg'),
('sdf', 'sdf', 'dsfsd', 'dsfsdf', 0, 4534, '5df@dfd.gghf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bclient`
--
ALTER TABLE `bclient`
 ADD PRIMARY KEY (`client_code`);

--
-- Indexes for table `clients_register`
--
ALTER TABLE `clients_register`
 ADD PRIMARY KEY (`client_code`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_code`);

--
-- Indexes for table `new_user`
--
ALTER TABLE `new_user`
 ADD PRIMARY KEY (`user_code`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
 ADD PRIMARY KEY (`keyfield`);

--
-- Indexes for table `order2`
--
ALTER TABLE `order2`
 ADD PRIMARY KEY (`keyfield`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`prod_code`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`prod_ctg_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
