-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 08:31 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniquemappersteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `passport` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `city` varchar(17) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `passport`, `email`, `fname`, `lname`, `city`, `password`, `phone`) VALUES
('ADMIN/01', 'ADMIN_01.jpeg', 'ikeogu31@gmail.com', 'esmmanuel', 'chidera', 'Port Harcourt', '', '09032435354'),
('ADMIN/02', 'ADMIN_02.jpeg', 'ikeogu322@gmail.com', 'Emmanuel', 'dera', 'PH', '', '989394444');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` varchar(10) NOT NULL,
  `image` varchar(60) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(39) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tags` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `image`, `text`, `date`, `title`, `name`, `tags`) VALUES
('blog/01', 'blog_01.jpeg', 'The day we attended a meeting along stadium road based on environmental issues. to keep a memory we took a shot.                            ', '2018-08-07 08:20:11', 'An Outing Day ', 'Lucky Dera', 'Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` varchar(19) NOT NULL,
  `image` varchar(225) NOT NULL,
  `text` varchar(350) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `image`, `text`, `date`, `name`) VALUES
('comment/01', 'comment_01.jpeg', 'yes, it was a moment to remember,and also at a cool evening .', '2018-08-07 21:50:19', 'emmanuel');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `passport` varchar(325) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `name`, `passport`, `date`, `title`) VALUES
('Img/001', 'hello', 'Img_001.png', '0000-00-00', ''),
('Img/002', 'hello', 'Img_002.png', '0000-00-00', ''),
('Img/003', 'let girls map', 'Img_003.jpeg', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `interview_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `level` varchar(7) NOT NULL,
  `join` varchar(100) NOT NULL,
  `mapped` varchar(4) NOT NULL,
  `mapping` varchar(4) NOT NULL,
  `cgpa` varchar(7) NOT NULL,
  `hcourse` varchar(2) NOT NULL,
  `lcourse` varchar(2) NOT NULL,
  `software` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `website` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `aboutme` text NOT NULL,
  `interest` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `subheading` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `body` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `passport`, `subheading`, `date`, `body`) VALUES
('prj/001', 'Let Girls map', 'prj_001.jpeg', 'Let Girls  be Mappers', '2017-09-28', 'This project was made global to all the Youthmappers chapter. Its aim was to get the female folks involved in  mapping activities. So it was a great thing to allow girls to be because all this while they felt left out.'),
('prj/002', 'Risk Reduction', 'prj_002.jpeg', 'Mapping of Vulnerability Areas.', '2018-07-13', 'We have places that are vulnerable in Our Nigerian Communities. So this project was to map out these places and put on the map. so quick response and aid from NGO\'s. '),
('prj/003', 'GENDER EQUALITY', 'prj_003.jpeg', 'To Promote Gender Equality ', '2018-07-30', 'Most times the females are lesser in number in activities that requires a good number of both male and female. So this project was to promote girls so they can be part of any activity and also take the Lead.');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `member_id` varchar(15) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `osm_userName` varchar(25) NOT NULL,
  `email` varchar(70) NOT NULL,
  `passport` varchar(19) NOT NULL,
  `date_you_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dept` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `level` varchar(10) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `matno` varchar(20) NOT NULL,
  `member_category` varchar(25) NOT NULL,
  `PC` varchar(5) NOT NULL,
  `terms` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`member_id`, `first_name`, `last_name`, `phone`, `osm_userName`, `email`, `passport`, `date_you_joined`, `dept`, `age`, `level`, `faculty`, `sex`, `matno`, `member_category`, `PC`, `terms`) VALUES
('team/001', 'Lucky', 'Dera', '08133627610', 'Ikeogu', 'ikeogu31@gmail.com', 'team_001.jpeg', '2018-06-12 12:32:02', 'Computer Science', '2018-05-31', '400', 'Sciences', 'M', '', '', '', ''),
('team/002', 'Ikeogu', 'Emmanuel', '08133627610', 'Emmanuel Chidera', 'ikeogu322@gmail.com', 'team_002.jpeg', '2018-06-18 17:22:15', 'Computer Science', '2018-06-04', '400', 'Science', 'M', 'U2014/5570038', '', 'Yes', 'Yes'),
('team/004', 'dfdfhajhfaj', 'sdfdfnmdnfma', '098098008', 'jkhkerjwrqh', 'dfdfnfm@GMAIL.COM', 'team_004.jpeg', '2018-08-09 23:28:31', 'rtrtertejrtjter', '2018-07-31', '100', 'retertet', 'M', 'feelwhelw', '', 'Yes', 'Yes'),
('team/003', 'dfdfhajhfaj', 'sdfdfnmdnfma', '098098008', 'jkhkerjwrqh', 'dfdfnfm@GMAIL.COM', 'team_003.jpeg', '2018-08-09 23:25:07', 'rtrtertejrtjter', '2018-07-31', '100', 'retertet', 'M', 'feelwhelw', '', 'Yes', 'Yes'),
('team/005', 'wkfdjfhsjfhja', 'dfsdndf,a,nfdm', '4755947987', 'DFADFHF', 'ndnan@GMAIL.COM', 'team_005.jpeg', '2018-08-09 23:34:54', 'DFFBAFJ', '2018-08-08', '100', 'ADFAFKAF', 'M', 'HFGDHGGFH', '', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `name` (`name`,`passport`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`interview_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
