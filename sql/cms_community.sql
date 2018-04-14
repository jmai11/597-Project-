-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 11:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `description`, `image`, `date`, `author`) VALUES
(1, 'Where are we heading?', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images/image1.jpg', '2018-04-05 07:26:42', 'john@gmail.com'),
(5, 'hi there new post here', '<p>just writing a new post so that i can blog it</p>', 'images/image3.jpg', '2018-04-11 21:31:50', 'john@gmail.com'),
(6, 'There is a feeling', '<p>Sometimes my life is coming to a point where I find great pleasures in the things I do or the people I meet.</p>', 'images/image4.jpg', '2018-04-11 21:35:30', 'alex@gmail.com'),
(8, 'Great things are happening.', '<p>hey got that new post going on here hi everyone!</p>', 'images/image5.jpg', '2018-04-11 21:34:55', 'john@gmail.com'),
(9, 'hello', '<p>posting again</p>', 'images/image6.jpg', '2018-04-11 21:32:04', 'john@gmail.com'),
(10, 'The Journey is Now', '<p>\"Travel makes one modest. You see what a tiny place you occupy in the world.\" -Gustav Flaubert</p>', 'images/image2.jpg', '2018-04-11 21:37:25', 'john@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `comment`, `date`) VALUES
(1, 'John', 'john@gmail.com', 'Hello', ' Hi there how is everyone?', '0000-00-00 00:00:00'),
(2, 'John', 'john@gmail.com', 'Hello', ' Hi there how is everyone?', '0000-00-00 00:00:00'),
(3, 'John', 'john@gmail.com', 'Hello', ' Hi there how is everyone?', '2018-02-26 15:19:34'),
(4, 'John ', 'john@gmail.com', 'Hello ', 'Hi there how is it going? ', '2018-02-26 15:19:47'),
(5, 'John ', 'john@gmail.com', 'Hello ', 'Hi there how is it going? ', '2018-02-26 16:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_role` text NOT NULL,
  `user_first` text NOT NULL,
  `user_last` text NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_about` text NOT NULL,
  `user_image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `user_first`, `user_last`, `user_name`, `user_email`, `user_password`, `user_about`, `user_image`, `date`) VALUES
(1, 'admin', 'John', ' Mai ', 'jmaican', 'john@gmail.com', 'yellow', 'hey there this is john! im so excited to be a part of this community. A little bit about me: I love music and camping. Anything with nature really. Some of the types of music I listen to are indie, rock, hip hop. I also love to cook food all the damn time. :D We can all hang out and share our ideas on new music! ', '../images/stormtrooper.jpg', '2018-04-11 20:49:16'),
(3, '0', 's', 's', 's', 's@s.com', 'titty', '', '../images/stormtrooper.jpg', '2018-04-11 20:49:45'),
(4, 'subscriber', 'Alex ', 'Liao', 'alexliao', 'alex@gmail.com', 'alex', '', '../images/stormtrooper.jpg', '2018-04-11 20:49:47'),
(5, 'subscriber', 'ed', 'al', '3dal', 'edal@gmail.com', 'red', 'hey there im ed and i am new to this community. would love to get to know everyone haha. please contact me and talk to me im very friendly. ', '../images/stormtrooper.jpg', '2018-04-11 20:49:49'),
(6, 'subscriber', 'jess', 'ng', 'jessy', 'jess@gmail.com', 'blue', 'hey there hows everyone doing. Im Jess and i would love to join this community and share my ideas! ', '', '2018-04-11 17:56:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
