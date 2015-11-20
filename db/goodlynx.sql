-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2013 at 01:36 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goodlynx`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE IF NOT EXISTS `business_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `business_profile_name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `suite` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `business_hours` varchar(200) NOT NULL,
  `map_url` varchar(100) NOT NULL,
  `section1_title` varchar(50) NOT NULL DEFAULT 'Title1',
  `section1_content` varchar(400) NOT NULL DEFAULT 'Content1',
  `section2_title` varchar(50) NOT NULL DEFAULT 'Title2',
  `section2_content` varchar(400) NOT NULL DEFAULT 'Content2',
  `section3_title` varchar(50) NOT NULL DEFAULT 'Title3',
  `section3_content` varchar(400) NOT NULL DEFAULT 'Content3',
  `header_image` varchar(100) NOT NULL DEFAULT 'header.jpg',
  `image_source` enum('default','gallery','uploaded') NOT NULL DEFAULT 'default',
  `status` enum('Publish','Private') NOT NULL DEFAULT 'Private',
  PRIMARY KEY (`user_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `business_profile_country_id_idx` (`country_id`),
  KEY `business_profile_state_id_idx` (`state_id`),
  KEY `business_profile_city_id_idx` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `business_profile`
--

INSERT INTO `business_profile` (`user_id`, `country_id`, `state_id`, `city_id`, `category_id`, `business_profile_name`, `address`, `street`, `suite`, `postal_code`, `website`, `phone_number`, `business_hours`, `map_url`, `section1_title`, `section1_content`, `section2_title`, `section2_content`, `section3_title`, `section3_content`, `header_image`, `image_source`, `status`) VALUES
(31, 2, 61, 1, 7, 'sajib test', '836 N 20th Street Apt 33', '', 'Milwaukee, WI ', '53233', 'infinitehostbd.com', '123-456-7890', 'Monday to Friday: 10 a.m. to 6 p.m. Saturday: 10:00 a.m. to 6:00 p.m. Sunday: 10 a.m. to 2 p.m ', 'sajib-test', 'Ahanaf Afaham', 'Yes they are', 'Rajib', 'Yes', 'Niha', 'Yes it is', '31_9a345dd31ed5cba5558dfd1632915458.jpg', 'uploaded', 'Private'),
(33, 2, 61, 1, 18, 'ovation printing co.', '2910 Veda street', '', '', '96001', 'www.ovationprinting.com', '530-646-9343', 'Monday to Friday:8:30 a.m. to 5 p.m. Open by appointment only on Saturday. Closed on Sunday.', 'ovation-printing-co-', 'Business Printing', 'Ovation printing operates a full service facility that is capable of producing thousands of products with a one or two day turnaround. We offer full color printing on a variety or papers and substrates. Bindery is also completed in our facility so getting your completed job to you is fast and accurate. Check us out.', 'Banners and Posters', 'Looking for a custom designed banner that will get your message noticed? Let the designers at Ovation Printing design and print your next banner. We can produce a banner as wide as 6 feet and up to 100 feet long.  We offer a huge selection of substrates including vinyl, window film, backlit materials, canvas, cotton bond and many many more. Check out our website for more information.', 'Forms and Menus', 'A well designed business form can save a company thousands of dollars each year in increased productivity and reduced errors. We can design and layout a form that is tailored to your business so your employees can be sure the get the right information the first time around. We can also turn those forms into electronic documents like word files and pdf files. We can also create beautiful menus.', '33_858a02008d5ce75c4a249d8d2b0847a8.jpg', 'uploaded', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `parent_category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_category`) VALUES
(1, 'Fine dining', 0),
(2, 'Food', 0),
(3, 'Family', 0),
(4, 'kids', 0),
(5, 'Pets', 0),
(6, 'Outdoor fun', 0),
(7, 'Recreation', 0),
(8, 'Home', 0),
(9, 'Garden', 0),
(10, 'Night Life', 0),
(11, 'Baby', 0),
(12, 'Clothing', 0),
(13, 'Sports', 0),
(14, 'Health', 0),
(15, 'Beauty', 0),
(16, 'Fitness', 0),
(17, 'Local Art', 0),
(18, 'Crafts', 0),
(19, 'Music', 0),
(20, 'Farmers Market', 0),
(21, 'Organic Foods', 0),
(22, 'Farmer direct', 0),
(23, 'Local Ranchers', 0),
(24, 'Italian', 2),
(25, 'Pizza', 24);

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE IF NOT EXISTS `city_list` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_short_name` varchar(10) DEFAULT NULL,
  `city_long_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `city_list_state_id_idx` (`state_id`),
  KEY `city_list_country_id_idx` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`city_id`, `state_id`, `country_id`, `city_short_name`, `city_long_name`) VALUES
(1, 61, 2, 'Redding', 'Redding'),
(2, 61, 2, 'Red Bluff', 'Red Bluff'),
(3, 61, 2, 'Chico', 'Chico'),
(4, 61, 2, 'Eureka', 'Eureka'),
(5, 61, 2, ' Mt. Shast', ' Mt. Shasta');

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE IF NOT EXISTS `country_list` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) DEFAULT NULL,
  `iso_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`country_id`, `country_name`, `iso_code`) VALUES
(2, 'United States', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_owner_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `deal_state_id` int(11) DEFAULT NULL,
  `deal_city_id` int(11) DEFAULT NULL,
  `deal_name` varchar(100) NOT NULL,
  `deal_large_image` varchar(100) NOT NULL,
  `deal_small_image` varchar(100) NOT NULL,
  `deal_description1` varchar(50) DEFAULT NULL,
  `deal_description2` varchar(50) DEFAULT NULL,
  `deal_regular_price` decimal(10,2) NOT NULL,
  `deal_sale_price` decimal(10,2) NOT NULL,
  `deal_start_date` int(11) NOT NULL,
  `deal_end_date` int(11) NOT NULL,
  `deal_available` int(11) NOT NULL DEFAULT '1',
  `purchase_min` int(11) NOT NULL,
  `purchase_max` int(11) NOT NULL,
  `limit_per_user` int(11) NOT NULL,
  `lastdate_deal_purchased` int(11) NOT NULL,
  `lastdate_deal_redeemed` int(11) NOT NULL,
  `deal_details` varchar(2000) DEFAULT NULL,
  `deal_fine_print` varchar(1000) NOT NULL,
  `deal_highlights` varchar(1000) NOT NULL,
  `deal_key_word` varchar(200) NOT NULL,
  `deal_key_phrases` varchar(200) DEFAULT NULL,
  `deal_sold` int(11) DEFAULT '0',
  `deal_visit` int(11) DEFAULT '0',
  `deal_created_date` int(11) NOT NULL,
  `deal_misstatements` enum('1','0') DEFAULT '1',
  `deal_commission` enum('1','0') DEFAULT '1',
  `deal_charge_card` enum('1','0') DEFAULT '1',
  `deal_status` enum('Awaiting Approval','Active','Running','Tipped','Closed','Paid','Cancelled') NOT NULL DEFAULT 'Awaiting Approval',
  PRIMARY KEY (`deal_id`),
  KEY `deal_owner_id_idx` (`deal_owner_id`),
  KEY `deal_category_id_idx` (`category_id`),
  KEY `deal_state_id_idx` (`deal_state_id`),
  KEY `deal_city_id_idx` (`deal_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `deal_owner_id`, `category_id`, `deal_state_id`, `deal_city_id`, `deal_name`, `deal_large_image`, `deal_small_image`, `deal_description1`, `deal_description2`, `deal_regular_price`, `deal_sale_price`, `deal_start_date`, `deal_end_date`, `deal_available`, `purchase_min`, `purchase_max`, `limit_per_user`, `lastdate_deal_purchased`, `lastdate_deal_redeemed`, `deal_details`, `deal_fine_print`, `deal_highlights`, `deal_key_word`, `deal_key_phrases`, `deal_sold`, `deal_visit`, `deal_created_date`, `deal_misstatements`, `deal_commission`, `deal_charge_card`, `deal_status`) VALUES
(1, 31, 11, 61, 1, 'Baby Food', '33_518bf003390d5.png', '33_518bf003390bc.png', 'Hurry Up', 'offer', 20.00, 10.00, 1364792400, 1367298000, 100, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', 'Yes', 0, 95, 1365975372, '1', '1', '1', 'Active'),
(2, 31, 15, 61, 1, 'baahhh', '33_518bf003390d5.png', '33_518bf003390bc.png', 'ahem', 'ahem ahem', 10.00, 14.00, 1364878800, 1367298000, 0, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 48, 1365976918, '1', '1', '1', 'Active'),
(3, 33, 3, 61, 1, 'Wall Decal', '33_518bf003390d5.png', '33_518bf003390bc.png', 'Life Size Poster', 'Turn your pictures', 96.00, 45.00, 1366261200, 1367298000, 50, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 39, 1365977473, '1', '1', '1', 'Active'),
(4, 33, 2, 61, 1, 'Burgers', '33_518bf003390d5.png', '33_518bf003390bc.png', '1/2 price burgers', 'Free Fries and Drink', 15.00, 7.00, 1366002000, 1368594000, 500, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 33, 1365988402, '1', '1', '1', 'Active'),
(5, 33, 4, 61, 1, 'Tumblin Turtle', '33_518bf003390d5.png', '33_518bf003390bc.png', 'one month 1/2 price', '4 Clases each month', 40.00, 20.00, 1366002000, 1366088400, 20, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 15, 1366054490, '1', '1', '1', 'Active'),
(6, 31, 15, 61, 1, 'DR.sajib', '33_518bf003390d5.png', '33_518bf003390bc.png', 'good specialist', 'Hatori Doctor', 500.00, 300.00, 1364792400, 1366779600, 0, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', 'Nurology,medicine', 0, 24, 1366087037, '1', '1', '1', 'Active'),
(7, 33, 1, 61, 1, 'Appetizer', '33_518bf003390d5.png', '33_518bf003390bc.png', 'buy one get one 1/2 ', 'night time only', 15.00, 6.00, 1364792400, 1366002000, 20, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 17, 1366217077, '1', '1', '1', 'Active'),
(8, 33, 3, 61, 1, 'day at park', '33_518bf003390d5.png', '33_518bf003390bc.png', 'full day of fun', 'good for the entire ', 75.00, 25.00, 1364878800, 1367298000, 5, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 16, 1366219193, '1', '1', '1', 'Active'),
(9, 33, 4, 61, 1, 'Wall Decal', '33_518bf003390d5.png', '33_518bf003390bc.png', 'life size print', 'fully removable!', 95.00, 45.00, 1366174800, 1368766800, 50, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 8, 1366248306, '1', '1', '1', 'Active'),
(10, 33, 1, 61, 1, 'Discount Entre', '33_518bf003390d5.png', '33_518bf003390bc.png', '$30 worth of food ', 'Buy it now for $15', 30.00, 15.00, 1366606800, 1367557200, 100, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 12, 1366651246, '1', '1', '1', 'Active'),
(11, 33, 3, 61, 1, 'Canvas Print', '33_518bf003390d5.png', '33_518bf003390bc.png', 'Gallery wrapped ', 'Fine art print', 65.00, 29.00, 1365483600, 1369976400, 100, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 11, 1366914032, '1', '1', '1', 'Active'),
(13, 31, 8, 61, 1, 'Afham', '33_518bf003390d5.png', '33_518bf003390bc.png', 'hahaha', 'Yes it is', 20.00, 10.00, 1368061440, 1369962240, 0, 0, 0, 0, 0, 0, '      <p><a href="#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n            <p>Pizza, in the US often called pizza pie, is an oven-baked, flat, disc-shaped bread typically topped with a tomato sauce, cheese (usually mozzarella) and various toppings depending on the culture. Since the original pizza, several other types of pizzas have evolved.</p>\r\n            <p>Originating in Neapolitan cuisine, the dish has become popular in many different parts of the world. An establishment that primarily makes and sells pizzas is called a "pizzeria". The phrases "pizza parlor", "pizza place", "pizza house" and "pizza shop" are used in the United States. The term pizza pie is dialectal, and pie is used for simplicity in some contexts, such as among pizzeria staff.</p>\r\n            <p>The bottom of the pizza, called the "crust", may vary widely according to style?thin as in a typical hand-tossed pizza or Roman pizza, or thick as in a typical pan pizza or Chicago-style pizza. It is traditionally plain, but may also be seasoned with garlic, or herbs, or stuffed with cheese.</p>\r\n            <p>In restaurants, pizza can be baked in an oven with stone bricks above the heat source, an electric deck oven, a conveyor belt oven or, in the case of more expensive restaurants, a wood- or coal-fired brick oven. On deck ovens, the pizza can be slid into the oven on a long paddle, called a peel, and baked directly on the hot bricks or baked on a screen (a round metal grate, typically aluminum). When making pizza at home, it can be baked on a pizza stone in a regular oven to reproduce the effect of a brick oven. Another option is grilled pizza, in which the crust is baked directly on a barbecue grill. Greek pizza, like Chicago-style pizza, is baked in a pan rather than directly on the bricks of the pizza oven.</p>\r\n', 'Limit 1 per person. New customers only. Not valid with other offers.', 'Easily removable from one wall to another. These can be printed in all sorts of sizes. Kids will love them and their friends will be so jealous. ', '', '', 0, 8, 1368047120, '1', '1', '1', 'Active'),
(14, 31, 11, 61, 1, 'Yes', '31_518bfc762bd52.png', '31_518bfc762bd3a.png', 'asdf', 'df', 20.00, 12.00, 1368142920, 1369957260, 0, 0, 0, 0, 0, 0, '<p><a href="http://localhost/goodlynx/index.php/ca/redding/baby/1#">Image: Suat Eman / FreeDigitalPhotos.net</a></p>\r\n\r\n            <p>Pizza, in the US often called pizza pie, is an \r\noven-baked, flat, disc-shaped bread typically topped with a tomato \r\nsauce, cheese (usually mozzarella) and various toppings depending on the\r\n culture. Since the original pizza, several other types of pizzas have \r\nevolved.</p>\r\n\r\n            <p>Originating in Neapolitan cuisine, the dish has become \r\npopular in many different parts of the world. An establishment that \r\nprimarily makes and sells pizzas is called a "pizzeria". The phrases \r\n"pizza parlor", "pizza place", "pizza house" and "pizza shop" are used \r\nin the United States. The term pizza pie is dialectal, and pie is used \r\nfor simplicity in some contexts, such as among pizzeria staff.</p>\r\n\r\n            <p>The bottom of the pizza, called the "crust", may vary \r\nwidely according to style?thin as in a typical hand-tossed pizza or \r\nRoman pizza, or thick as in a typical pan pizza or Chicago-style pizza. \r\nIt is traditionally plain, but may also be seasoned with garlic, or \r\nherbs, or stuffed with cheese.</p>\r\n\r\n            <p>In restaurants, pizza can be baked in an oven with stone \r\nbricks above the heat source, an electric deck oven, a conveyor belt \r\noven or, in the case of more expensive restaurants, a wood- or \r\ncoal-fired brick oven. On deck ovens, the pizza can be slid into the \r\noven on a long paddle, called a peel, and baked directly on the hot \r\nbricks or baked on a screen (a round metal grate, typically aluminum). \r\nWhen making pizza at home, it can be baked on a pizza stone in a regular\r\n oven to reproduce the effect of a brick oven. Another option is grilled\r\n pizza, in which the crust is baked directly on a barbecue grill. Greek \r\npizza, like Chicago-style pizza, is baked in a pan rather than directly \r\non the bricks of the pizza oven.<span id="pastemarkerend">&nbsp;</span></p>\r\n', 'Nothing', '<ul>\r\n	<li>&nbsp;Test</li>\r\n	<li>Test</li>\r\n	<li>Test</li>\r\n	<li>Tes</li></ul>\r\n', 'se', 'se', 0, 10, 1368128562, '1', '1', '1', 'Active'),
(15, 33, 12, 61, 1, 'Embroidery', '', '', 'Custom logo ', 'On your shirt', 89.00, 29.00, 1368345600, 1375293600, 30, 0, 0, 0, 0, 0, 'We will digitize your company logo and put it on your own shirt for one low incredible price. ', 'Limit one deal per person. Buy it now or you lose out.', 'fasdfjadsfkladjfa\r\na\r\nfads\r\nfa\r\ndsf\r\nadsf\r\nads\r\n\r\nfasdf\r\nadsf\r\ndsafadsfjadsglasdfgjasd\r\nf\r\nadsf\r\nadsfadsfads\r\n\r\nf\r\nasdf\r\nadsf\r\nads\r\nfads\r\nfads\r\n', 'buy it\r\nOk\r\n', '', 0, 0, 1368507929, '1', '1', '1', ''),
(16, 31, 11, 61, 1, 'Ahanaf', '31_5196a51fdfc7e.png', '31_5196a51fdfc06.png', 'Test Text 1', 'Test Text 2', 10.00, 3.00, 1368859500, 1369982700, 100, 1, 1000, 1, 0, 0, 'nothing', 'nothing', 'nothing', 'nothing', 'nothing', 0, 6, 1368819940, '1', '1', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `deal_interest`
--

CREATE TABLE IF NOT EXISTS `deal_interest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interested_deal_user_id_idx` (`user_id`),
  KEY `interested_deal_category_id\_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_format`
--

CREATE TABLE IF NOT EXISTS `email_format` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_title` varchar(45) DEFAULT NULL,
  `email_text` text,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `keyphrases` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `name`, `start_date`, `location`, `start_time`, `end_time`, `price`, `description`, `keyphrases`) VALUES
(5, 31, 'Bar B Que', '2013-06-03', 'My house', '09:00:00', '11:00:00', 12.50, 'Bring your favorite drinks', 'Test 1\r\nTest 2');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE IF NOT EXISTS `state_list` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `state_iso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `state_list_country_id_idx` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`state_id`, `country_id`, `state_name`, `state_iso`) VALUES
(61, 2, 'California', 'ca');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_status` enum('Private','Public') NOT NULL DEFAULT 'Public',
  `password` varchar(128) NOT NULL,
  `activationkey` varchar(128) DEFAULT NULL,
  `reset_password_validity` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `create_at` int(11) DEFAULT NULL,
  `lastvisit_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type_id_idx` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type_id`, `email`, `email_status`, `password`, `activationkey`, `reset_password_validity`, `status`, `create_at`, `lastvisit_at`) VALUES
(1, 1, 'admin@goodlynx.com ', 'Public', '7c4a8d09ca3762af61e59520943dc26494f8941b', '369e12b27b6c1dcef3b06f0394d473807cf7686b', 0, 'Active', 1362257282, NULL),
(31, 7, 'sajib.cse03@gmail.com', 'Private', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ae9dcfcdc090747ec983e1d942e6ab99e05ab322', NULL, 'Active', 1365973500, NULL),
(32, 6, 'jonathanderek@gmail.com', 'Public', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0ef6a123a304ffaed49d8773d418bfe9ddbd25f3', NULL, 'Active', 1365977081, NULL),
(33, 7, 'jonathan@ovationprinting.com', 'Private', '7c4a8d09ca3762af61e59520943dc26494f8941b', '32d4ef62cd5aa4c423bffa64a411f2d0054cd21e', NULL, 'Active', 1365977329, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT 'Male',
  `street` varchar(50) DEFAULT NULL,
  `suite` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_details_user_id_idx` (`user_id`),
  KEY `user_details_country_id_idx` (`country_id`),
  KEY `user_details_state_id_idx` (`state_id`),
  KEY `user_details_city_id_idx` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `country_id`, `state_id`, `city_id`, `first_name`, `last_name`, `cell_phone`, `dob`, `sex`, `street`, `suite`, `postal_code`) VALUES
(1, 2, 61, 2, 'admin', 'goodlynx', '123-456-7890', NULL, 'Male', NULL, NULL, '12000'),
(32, 2, 61, 1, 'Jonathan', 'Resendez', '530-646-9343', '2013-04-01', 'Male', '2910 Veda street', '', '96001');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`, `status`) VALUES
(1, 'Super Admin', 'Active'),
(3, 'Admin', 'Active'),
(4, 'Manager', 'Active'),
(5, 'Regular User', 'Active'),
(6, 'VIP User', 'Active'),
(7, 'Business Owner', 'Active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD CONSTRAINT `business_profile_city_id` FOREIGN KEY (`city_id`) REFERENCES `city_list` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `business_profile_country_id` FOREIGN KEY (`country_id`) REFERENCES `country_list` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `business_profile_state_id` FOREIGN KEY (`state_id`) REFERENCES `state_list` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `business_profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city_list`
--
ALTER TABLE `city_list`
  ADD CONSTRAINT `city_list_country_id` FOREIGN KEY (`country_id`) REFERENCES `country_list` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `city_list_state_id` FOREIGN KEY (`state_id`) REFERENCES `state_list` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deal_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deal_city_id` FOREIGN KEY (`deal_city_id`) REFERENCES `city_list` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deal_owner_id` FOREIGN KEY (`deal_owner_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deal_state_id` FOREIGN KEY (`deal_state_id`) REFERENCES `state_list` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deal_interest`
--
ALTER TABLE `deal_interest`
  ADD CONSTRAINT `interested_deal_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `interested_deal_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `state_list`
--
ALTER TABLE `state_list`
  ADD CONSTRAINT `state_list_country_id` FOREIGN KEY (`country_id`) REFERENCES `country_list` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_city_id` FOREIGN KEY (`city_id`) REFERENCES `city_list` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_details_country_id` FOREIGN KEY (`country_id`) REFERENCES `country_list` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_details_state_id` FOREIGN KEY (`state_id`) REFERENCES `state_list` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_details_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
