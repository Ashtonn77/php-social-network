-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.epizy.com
-- Generation Time: Oct 08, 2020 at 04:13 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26911612_expressive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirations`
--

CREATE TABLE `aspirations` (
  `aspirations_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bucket_list_1` text NOT NULL,
  `bucket_list_2` text NOT NULL,
  `bucket_list_3` text NOT NULL,
  `bucket_list_4` text NOT NULL,
  `goals_1` text NOT NULL,
  `goals_2` text NOT NULL,
  `goals_3` text NOT NULL,
  `goals_4` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aspirations`
--

INSERT INTO `aspirations` (`aspirations_id`, `user_id`, `bucket_list_1`, `bucket_list_2`, `bucket_list_3`, `bucket_list_4`, `goals_1`, `goals_2`, `goals_3`, `goals_4`) VALUES
(1, 1, 'Hike across a treacherous, snowy landscape', 'Have lunch with Elon Musk/Jeff Bezos', 'Write a novel/screenplay', 'Make a complete fool of myself on purpose, in public', 'Build an application that obtains over a million users in traffic', 'Build a community rehab', 'Travel to all the Nordic countries', 'Become fluent in another language'),
(3, 4, 'Aaaa', 'Aaaa', 'Aaaa', 'Aaaa', 'Aaaa', 'Aaaa', 'Aaaa', 'Aaaa'),
(4, 5, 'Qqqq', 'Qqq', 'Qqq', 'Qqq', 'Qqqq', 'Qqq', 'Qqqq', 'Qqqq'),
(5, 6, 'Write 20 novels', 'Meet the president', 'Dance in the rain with a complete stranger', 'Drive a racecar', 'Write a poem every week this year', ' Be more open to love', 'Travel to France for a month and eat nothing but croissants and jam', 'Move into my own apartment'),
(6, 7, 'Travel the entire Asian continent', 'Climb a one of Japans highest mountains', 'Eat an American cheese burger', 'Have a cup of tea over a snow covered landscape', 'Buy my wife a new house', 'Finish a novel in a year or less', 'Learn how to play an instrument', 'Be a better role model to my children and grandchildren'),
(7, 8, 'Kiss a complete stranger then run away', 'Eat food so spicy my ears blow out steam', 'Run across three cities', 'Paint the sunset over Spain\'s highest mountain top', 'Gift the princess of Spain a painting', 'Do more for the underprivileged  ', 'Take my wife dancing', 'Be more economically responsible'),
(8, 9, 'Build a school dedicated to teachings of love and simplicity', 'Travel to Africa and spread the word of love', 'Sing on top of a rooftop at night', 'Swim with sharks', 'Be more open to criticism', 'Listen more intently when people speak', 'Find more time to pray during the day', 'Meditate for 24 hours'),
(9, 10, 'Do a Rock n\' Roll world tour', 'Teach music at a school of some sort', 'Go ice-skating', 'Learn how to meditate', 'Spend more time with my wife and kids', 'Write a song for the president', 'Go on a diet and workout more', 'Do more for the folks back home'),
(10, 11, 'Go bungee jumping', 'Swim naked in the ocean', 'Eat snails', 'Post my writings', 'Write ten new short stories this year', 'Win a writers award of some sort', 'Be kinder to the people around me', 'Practice patience'),
(11, 12, 'Travel to Thailand for a year', 'Go mountain climbing', 'Swim with sharks', 'Meet Eminem', 'Perform in front of an audience', 'Ask Jane out', 'Buy my own car', 'Stop living inside my head'),
(12, 13, 'Write a song for my boyfriend', 'Sing the song to him', 'Slow dance in the middle of a crowded room', 'Go ice fishing in Alaska', 'Buy my own house', 'Buy my mother a house', 'Invest my money more wisely', 'Learn something new - maybe biology'),
(13, 15, 'Visit Paris', 'Fall in love', 'Go to fashion week', 'Drive a lambo', 'Read a book this year', 'Start a business', 'Learn to love life', 'Be happy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_likes` int(11) NOT NULL DEFAULT '0',
  `comment_dislikes` int(11) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment_content`, `comment_likes`, `comment_dislikes`, `date_created`) VALUES
(1, 11, 7, 'So true...you have quite the way with words, Haruki', 1, 0, '2020-10-06'),
(2, 6, 15, 'Love it!', 3, 2, '2020-10-06'),
(3, 7, 8, 'Beautiful piece of your soul ', 4, 0, '2020-10-06'),
(4, 1, 5, 'Surreal', 3, 0, '2020-10-06'),
(5, 9, 6, 'Perfect words, my friend', 2, 0, '2020-10-06'),
(6, 10, 12, 'I know exactly how you feel', 2, 1, '2020-10-06'),
(7, 1, 11, 'Consider me excited', 1, 0, '2020-10-06'),
(8, 15, 17, 'Hello from the other side', 0, 0, '2020-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `dislikes_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`dislikes_id`, `user_id`, `post_id`) VALUES
(1, 11, 7),
(2, 11, 7),
(3, 11, 7),
(4, 11, 7),
(5, 11, 10),
(6, 11, 3),
(7, 6, 15),
(8, 6, 12),
(9, 6, 11),
(10, 6, 11),
(11, 6, 5),
(12, 7, 15),
(13, 8, 9),
(14, 9, 11),
(15, 9, 10),
(16, 9, 7),
(17, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_list_id`, `user_id`, `friend_id`, `friend_name`, `date_created`) VALUES
(1, 13, 12, 'John Black', '2020-10-06'),
(2, 12, 13, 'Zoey Doe', '2020-10-06'),
(3, 6, 12, 'John Black', '2020-10-06'),
(4, 12, 6, 'Sylvia Plath', '2020-10-06'),
(5, 8, 12, 'John Black', '2020-10-06'),
(6, 12, 8, 'Salvador Dali', '2020-10-06'),
(7, 6, 13, 'Zoey Doe', '2020-10-06'),
(8, 13, 6, 'Sylvia Plath', '2020-10-06'),
(9, 7, 13, 'Zoey Doe', '2020-10-06'),
(10, 13, 7, 'Haruki Murakami', '2020-10-06'),
(11, 9, 13, 'Zoey Doe', '2020-10-06'),
(12, 13, 9, 'Osho Rajneesh', '2020-10-06'),
(13, 11, 13, 'Zoey Doe', '2020-10-06'),
(14, 13, 11, 'Samantha Summers', '2020-10-06'),
(15, 13, 6, 'Sylvia Plath', '2020-10-06'),
(16, 6, 13, 'Zoey Doe', '2020-10-06'),
(17, 8, 6, 'Sylvia Plath', '2020-10-06'),
(18, 6, 8, 'Salvador Dali', '2020-10-06'),
(19, 10, 6, 'Sylvia Plath', '2020-10-06'),
(20, 6, 10, 'Elvis Presley', '2020-10-06'),
(21, 11, 6, 'Sylvia Plath', '2020-10-06'),
(22, 6, 11, 'Samantha Summers', '2020-10-06'),
(23, 12, 6, 'Sylvia Plath', '2020-10-06'),
(24, 6, 12, 'John Black', '2020-10-06'),
(25, 8, 1, 'Ashton Naidoo', '2020-10-06'),
(26, 1, 8, 'Salvador Dali', '2020-10-06'),
(27, 11, 1, 'Ashton Naidoo', '2020-10-06'),
(28, 1, 11, 'Samantha Summers', '2020-10-06'),
(29, 6, 7, 'Haruki Murakami', '2020-10-06'),
(30, 7, 6, 'Sylvia Plath', '2020-10-06'),
(31, 9, 7, 'Haruki Murakami', '2020-10-06'),
(32, 7, 9, 'Osho Rajneesh', '2020-10-06'),
(33, 12, 7, 'Haruki Murakami', '2020-10-06'),
(34, 7, 12, 'John Black', '2020-10-06'),
(35, 1, 8, 'Salvador Dali', '2020-10-06'),
(36, 8, 1, 'Ashton Naidoo', '2020-10-06'),
(37, 9, 8, 'Salvador Dali', '2020-10-06'),
(38, 8, 9, 'Osho Rajneesh', '2020-10-06'),
(39, 12, 8, 'Salvador Dali', '2020-10-06'),
(40, 8, 12, 'John Black', '2020-10-06'),
(41, 13, 9, 'Osho Rajneesh', '2020-10-06'),
(42, 9, 13, 'Zoey Doe', '2020-10-06'),
(43, 1, 9, 'Osho Rajneesh', '2020-10-06'),
(44, 9, 1, 'Ashton Naidoo', '2020-10-06'),
(45, 7, 9, 'Osho Rajneesh', '2020-10-06'),
(46, 9, 7, 'Haruki Murakami', '2020-10-06'),
(47, 10, 9, 'Osho Rajneesh', '2020-10-06'),
(48, 9, 10, 'Elvis Presley', '2020-10-06'),
(49, 1, 10, 'Elvis Presley', '2020-10-06'),
(50, 10, 1, 'Ashton Naidoo', '2020-10-06'),
(51, 7, 10, 'Elvis Presley', '2020-10-06'),
(52, 10, 7, 'Haruki Murakami', '2020-10-06'),
(53, 7, 11, 'Samantha Summers', '2020-10-06'),
(54, 11, 7, 'Haruki Murakami', '2020-10-06'),
(55, 10, 11, 'Samantha Summers', '2020-10-06'),
(56, 11, 10, 'Elvis Presley', '2020-10-06'),
(57, 6, 1, 'Ashton Naidoo', '2020-10-06'),
(58, 1, 6, 'Sylvia Plath', '2020-10-06'),
(59, 7, 1, 'Ashton Naidoo', '2020-10-06'),
(60, 1, 7, 'Haruki Murakami', '2020-10-06'),
(61, 15, 1, 'Ashton Naidoo', '2020-10-07'),
(62, 1, 15, 'Alisha Singh', '2020-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `hobbies_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hobbie_1` varchar(15) NOT NULL DEFAULT '',
  `hobbie_2` varchar(15) NOT NULL DEFAULT '',
  `hobbie_3` varchar(15) NOT NULL DEFAULT '',
  `hobbie_4` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hobbies_id`, `user_id`, `hobbie_1`, `hobbie_2`, `hobbie_3`, `hobbie_4`) VALUES
(1, 1, 'coding', 'gaming', 'gym', 'movies'),
(2, 2, 'cooking', 'painting', 'reading', 'traveling'),
(3, 3, 'coding', 'fishing', 'cooking', 'gaming'),
(4, 4, 'movies', 'painting', 'reading', 'traveling'),
(5, 5, 'music', 'coding', 'fishing', 'cooking'),
(6, 6, 'cooking', 'painting', 'reading', 'traveling'),
(7, 7, 'music', 'fishing', 'painting', 'reading'),
(8, 8, 'music', 'painting', 'reading', 'traveling'),
(9, 9, 'movies', 'painting', 'reading', 'traveling'),
(10, 10, 'music', 'gym', 'reading', 'traveling'),
(11, 11, 'music', 'cooking', 'movies', 'reading'),
(12, 12, 'fishing', 'cooking', 'painting', 'traveling'),
(13, 13, 'music', 'gaming', 'movies', 'traveling'),
(14, 15, 'music', 'movies', 'painting', 'traveling');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likes_id`, `user_id`, `post_id`) VALUES
(1, 11, 11),
(2, 11, 10),
(3, 11, 7),
(4, 11, 7),
(5, 11, 7),
(6, 11, 7),
(7, 11, 7),
(8, 11, 7),
(9, 11, 7),
(10, 11, 10),
(11, 11, 4),
(12, 11, 3),
(13, 11, 3),
(14, 11, 3),
(15, 11, 2),
(16, 11, 2),
(17, 11, 1),
(18, 6, 15),
(19, 6, 15),
(20, 6, 15),
(21, 6, 15),
(22, 6, 15),
(23, 6, 12),
(24, 6, 12),
(25, 6, 12),
(26, 6, 11),
(27, 6, 11),
(28, 6, 7),
(29, 6, 7),
(30, 6, 7),
(31, 6, 6),
(32, 6, 6),
(33, 6, 6),
(34, 6, 6),
(35, 6, 5),
(36, 6, 5),
(37, 6, 4),
(38, 6, 4),
(39, 6, 3),
(40, 6, 3),
(41, 6, 1),
(42, 6, 1),
(43, 6, 1),
(44, 7, 12),
(45, 7, 12),
(46, 7, 15),
(47, 7, 15),
(48, 7, 11),
(49, 7, 10),
(50, 7, 9),
(51, 7, 9),
(52, 7, 9),
(53, 7, 9),
(54, 7, 8),
(55, 7, 7),
(56, 7, 4),
(57, 7, 3),
(58, 7, 1),
(59, 8, 15),
(60, 8, 9),
(61, 8, 8),
(62, 8, 8),
(63, 8, 6),
(64, 8, 5),
(65, 8, 3),
(66, 8, 2),
(67, 1, 12),
(68, 1, 11),
(69, 1, 11),
(70, 1, 11),
(71, 1, 10),
(72, 1, 10),
(73, 1, 10),
(74, 1, 9),
(75, 1, 9),
(76, 1, 9),
(77, 1, 8),
(78, 1, 8),
(79, 1, 8),
(80, 1, 6),
(81, 1, 6),
(82, 1, 5),
(83, 1, 5),
(84, 1, 2),
(85, 9, 11),
(86, 9, 11),
(87, 9, 10),
(88, 9, 10),
(89, 9, 9),
(90, 9, 9),
(91, 9, 8),
(92, 9, 8),
(93, 9, 7),
(94, 9, 7),
(95, 9, 6),
(96, 9, 6),
(97, 9, 5),
(98, 10, 11),
(99, 10, 10),
(100, 10, 9),
(101, 10, 11),
(102, 10, 10),
(103, 10, 10),
(104, 10, 9),
(105, 10, 8),
(106, 1, 12),
(107, 1, 10),
(108, 1, 16),
(109, 15, 2),
(110, 15, 17),
(111, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id_from`, `user_id_to`, `message_content`, `date`) VALUES
(8, 1, 11, 'Hey Sammy', '2020-10-06 20:30:15'),
(9, 1, 11, 'How are you?', '2020-10-06 20:30:20'),
(10, 1, 11, '&#129303', '2020-10-06 20:30:26'),
(11, 11, 1, 'Im well, thanks.', '2020-10-06 20:30:45'),
(12, 11, 1, 'How are you?', '2020-10-06 20:30:49'),
(13, 1, 11, 'All good thank you', '2020-10-06 20:30:58'),
(14, 11, 1, '&#129303', '2020-10-06 20:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_to` int(11) NOT NULL,
  `notification_from` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_to`, `notification_from`) VALUES
(78, 6, 1),
(79, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posted_by` varchar(50) NOT NULL,
  `post_body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_likes` int(11) NOT NULL DEFAULT '0',
  `post_dislikes` int(11) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `posted_by`, `post_body`, `post_image`, `post_likes`, `post_dislikes`, `date_created`) VALUES
(1, 13, 'Zoey7878', 'Call me hopeless but all I want, all I\'ve ever wanted...is you!', '', 5, 0, '2020-10-06'),
(2, 1, 'ash123', 'There are a few things bigger than the little things in life', '', 5, 0, '2020-10-06'),
(3, 6, 'sylvia777', 'Meet the love of my life...I\'m so smitten', 'images/uploads/sylvia_love.jpg', 7, 1, '2020-10-06'),
(4, 7, 'Haruki976', 'Check out my latest novel. A lot of myself is embedded in those pages. I hope you guys like it', 'images/uploads/1q84.jpg', 4, 0, '2020-10-06'),
(5, 8, 'Salvador85', 'My latest self-portrait. Hauntingly accurate, isn\'t it?', 'images/uploads/salvador_self.jpg', 6, 1, '2020-10-06'),
(6, 8, 'Salvador85', 'Have no fear of perfection - you\'ll never reach it.', '', 9, 0, '2020-10-06'),
(7, 7, 'Haruki976', 'Death is not the opposite of life, but a part of it.', '', 13, 6, '2020-10-06'),
(8, 9, 'Osho444', 'If you love a flower, donâ€™t pick it up.\r\nBecause if you pick it up it dies and it ceases to be what you love.\r\nSo if you love a flower, let it be.\r\nLove is not about possession.\r\nLove is about appreciation.', '', 9, 0, '2020-10-06'),
(9, 9, 'Osho444', 'Simply exquisite', 'images/uploads/osho_flower.jpg', 12, 1, '2020-10-06'),
(10, 10, 'King22', 'Just me doing what I do best', 'images/uploads/elvis_concert.jpg', 12, 2, '2020-10-06'),
(11, 10, 'King22', 'The King has returned', 'images/uploads/elvis_king.jpg', 11, 3, '2020-10-06'),
(12, 11, 'Sammy625', 'My thoughts never quieten, they overflow and overturn...yet my lips won\'t utter a peep.', '', 7, 1, '2020-10-06'),
(15, 12, 'Johnny88', 'Just an amazing quote by an amazing person', 'images/uploads/john_qu.jpg', 8, 2, '2020-10-06'),
(16, 15, 'Alisha', 'Hello,', '', 1, 0, '2020-10-07'),
(17, 1, 'ash123', 'Hello', '', 1, 0, '2020-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `pref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fav_movie` varchar(50) NOT NULL,
  `fav_book` varchar(50) NOT NULL,
  `fav_artist` varchar(50) NOT NULL,
  `fav_song` varchar(50) NOT NULL,
  `fav_food` varchar(50) NOT NULL,
  `bio` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`pref_id`, `user_id`, `fav_movie`, `fav_book`, `fav_artist`, `fav_song`, `fav_food`, `bio`) VALUES
(1, 1, 'The Great Gatsby', 'Looking For Alaska', 'Tupac Shakur', 'As Soon As I Get Home', 'Flapjacks', 'What\'s to say? I love. I hurt. I laugh. I am.'),
(5, 6, 'Casablanca', 'The Lighthouse', 'Pablo Picasso', 'It\'s A Wonderful Morning', 'Mac N\' Cheese', 'Dying Is An Art, Like Everything Else. I Do It Exceptionally Well. I Do It So It Feels Like Hell. I Do It So It Feels Real. I Guess You Could Say I\'ve A Call.'),
(6, 7, 'Mamborosi', 'Kafka On The Shore ... (yes, my own book)', 'Utamaro', 'The Magic Flute', 'Sashimi', 'There\'s No Such Thing As Perfect Writing, Just Like There\'s No Such Thing As Perfect Despair.'),
(7, 8, 'It Happened One Night', 'Their Eyes Were Watching God ', 'RamÃ³n Casas', 'El PaÃ±o Moruno', 'Escalivada ', 'Intelligence Without Ambition Is A Bird Without Wings.'),
(8, 9, ' Satte Pe Satta', ' A Fine Balance By Rohinton Mistry', 'Allauddin Khan', 'Jila Bilambit', 'Chak-Hao Kheer', 'If You Love A Flower, Donâ€™t Pick It Up.\r\nBecause If You Pick It Up It Dies And It Ceases To Be What You Love.\r\nSo If You Love A Flower, Let It Be.\r\nLove Is Not About Possession.\r\nLove Is About Appreciation.'),
(9, 10, 'His Girl Friday', 'Animal Farm', 'Louis Armstrong', 'What A Wonderful World', 'Cheeseburger And Fries', 'Truth Is Like The Sun. You Can Shut It Out For A Time, But It Ain\'t Goin\' Away.'),
(10, 11, 'The Notebook', 'Me Before You', 'Rihanna', 'Umbrella', 'Pizza', 'She Loves Science And Majored In Biology At Arizona State University, Where She Also Earned Her Teaching Credential And Master Of Education Degree. Mrs. Carroll Is Excited To Begin The Best Year Ever!'),
(11, 12, 'Avengers', 'The Girl With A Dragon Tattoo', 'Eminem', 'Mocking Bird', 'Doughnuts', 'After Receiving His Master\'s In Fine Arts From Columbia University, James Wrote Three Nonfiction Novels About His Experiences, Including Under The Streaming Sun, Which Earned The National Prize For Arts And Sciences In 2008. James Is Currently Working On A Collection Of Fictional Short Stories To Be Published In Early 2021'),
(12, 13, 'Gravity', 'Of Mice And Men', 'Monet', 'Shadows', 'Blueberry Pie', 'Zoey Is Currently Finishing Her Bachelor Of Arts In Communications And Hopes To Intern In An Online Marketing Department In The Near Future.'),
(13, 15, 'Grease', 'Peter Pan', 'Dior', 'Dilemma', 'Pizza', 'I Lost Myself In The Music, The Moment\r\nI Owned It, I Never Let It Go\r\nI Only Got One Shot, I Did Not Miss My Chance To Blow This Opportunity Came Once In A Lifetime.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'no',
  `date_created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `username`, `birthday`, `password`, `profile_pic`, `active`, `date_created`) VALUES
(1, 'Ashton', 'Naidoo', 'abc@gmail.com', 'ash123', '1988-10-05', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/lion.png', 'no', '2020-10-05'),
(6, 'Sylvia', 'Plath', 'abc2@gmail.com', 'sylvia777', '1988-08-18', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/uploads/bear.png', 'no', '2020-10-05'),
(7, 'Haruki', 'Murakami', 'abc3@gmail.com', 'Haruki976', '1949-01-12', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/dog.png', 'no', '2020-10-05'),
(8, 'Salvador', 'Dali', 'abc4@gmail.com', 'Salvador85', '1904-05-11', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/deer.png', 'no', '2020-10-05'),
(9, 'Osho', 'Rajneesh', 'abc5@gmail.com', 'Osho444', '1931-12-11', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/horse.png', 'no', '2020-10-05'),
(10, 'Elvis', 'Presley', 'abc6@gmail.com', 'King22', '1935-01-17', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/dog.png', 'no', '2020-10-06'),
(11, 'Samantha', 'Summers', 'abc7@gmail.com', 'Sammy625', '1991-02-02', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/dolphin.png', 'no', '2020-10-06'),
(12, 'John', 'Black', 'abc8@gmail.com', 'Johnny88', '1993-06-16', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/eagle.png', 'no', '2020-10-06'),
(13, 'Zoey', 'Doe', 'abc9@gmail.com', 'Zoey7878', '1995-09-22', 'b0baee9d279d34fa1dfd71aadb908c3f', 'images/panda.png', 'no', '2020-10-06'),
(14, 'Assaa', 'Sssss', 'ass@yhuu.com', 'Hhhhh', '2020-10-16', '6b76b5b54567ec0008287d11a2e9e22a', 'images/lion.png', 'no', '2020-10-07'),
(15, 'Alisha', 'Singh', 'alisha@gmail.com', 'Alisha', '1988-02-04', '1c13465e24d91aca4d3ddaa1bc3e7027', 'images/dolphin.png', 'no', '2020-10-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirations`
--
ALTER TABLE `aspirations`
  ADD PRIMARY KEY (`aspirations_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`dislikes_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_list_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hobbies_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`pref_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirations`
--
ALTER TABLE `aspirations`
  MODIFY `aspirations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `dislikes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hobbies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
