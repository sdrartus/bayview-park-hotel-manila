-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 05:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `room_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `booked_cid` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1=checked in , 2 = checked out',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `ref_no`, `room_id`, `name`, `contact_no`, `date_in`, `date_out`, `booked_cid`, `status`, `date_updated`) VALUES
(46, '4768765571\n', 34, 'mariann', '123', '2021-07-20 13:47:00', '2021-07-23 13:47:00', 11, 1, '2021-07-22 14:45:41'),
(47, '150710081\n', 0, 'Steven ', '123', '2021-07-20 13:47:00', '2021-07-23 13:47:00', 11, 0, '2021-07-20 19:48:04'),
(48, '4708036499\n', 33, 'zeus', '090312314235', '2021-07-20 16:05:00', '2021-07-27 16:05:00', 11, 2, '2021-07-20 22:12:11'),
(49, '6270104956\n', 0, 'brando', '0392323234532', '2021-07-22 16:39:00', '2021-08-01 16:39:00', 11, 0, '2021-07-20 22:39:40'),
(50, '6981749145\n', 0, 'brando', '0934234235132', '2021-07-20 16:42:00', '2021-07-30 16:42:00', 11, 0, '2021-07-20 22:43:14'),
(51, '9669751325\n', 34, 'brando', '90923432423', '2222-07-22 16:47:00', '2222-07-29 16:47:00', 11, 2, '2021-07-20 22:51:28'),
(52, '8236054793\n', 33, 'BRANDO', '09321312412412', '2021-07-02 18:02:00', '2021-07-09 18:02:00', 11, 2, '2021-07-20 23:07:13'),
(53, '2159801193\n', 0, 'wrandell', '2', '1970-01-01 18:14:00', '1970-01-04 18:14:00', 11, 0, '2021-07-22 00:14:31'),
(54, '3291645414\n', 0, 'wrandell', '123', '2021-07-25 03:49:00', '2021-07-30 03:49:00', 11, 0, '2021-07-22 09:50:20'),
(55, '3016190316\n', 0, '', '', '1970-01-01 11:42:00', '1970-01-01 11:42:00', 11, 0, '2021-07-22 17:46:06'),
(56, '5089127134\n', 35, 'Steph', '1', '2021-07-22 15:25:00', '2021-09-18 15:25:00', 11, 1, '2021-07-22 21:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailables'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `category_id`, `status`) VALUES
(33, '1', 11, 1),
(34, '2', 11, 1),
(35, '3', 11, 1),
(36, '4', 11, 0),
(37, '5', 11, 0),
(38, '1', 13, 0),
(39, '2', 13, 0),
(40, '3', 13, 0),
(41, '4', 13, 0),
(42, '5', 13, 0),
(43, '1', 7, 0),
(44, '2', 7, 0),
(45, '3', 7, 0),
(46, '4', 7, 0),
(47, '5', 7, 0),
(48, '1', 9, 0),
(49, '2', 9, 0),
(50, '3', 9, 0),
(51, '4', 9, 0),
(52, '5', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `price`, `cover_img`) VALUES
(7, 'THE STANDARD (1 KING BED)', 50.27, '1626673260_room1.png'),
(9, 'THE SUPERIOR (1 KING BED)', 72.41, '1626673380_room3.png'),
(11, 'THE DELUXE ROOM (1 KING BED)', 60.37, '1626673560_room5.png'),
(13, 'THE JUNIOR SUITE (1 KING BED)', 63.53, '1626673680_room7.png');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `hotel_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'City Garden Hotel', 'CityGarden@Hotel.com', '+63 917 844 6835', '1626674520_cover.jpg', '&lt;h1 style=&quot;font-size: 36px; margin-bottom: 10px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; line-height: 1.1;&quot;&gt;Status &amp;amp; Availability of Hotel Amenities&lt;/h1&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Gym&amp;nbsp;&lt;/span&gt;CLOSED&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Spa&amp;nbsp;&lt;/span&gt;CLOSED&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Contactless Food Delivery&amp;nbsp;&lt;/span&gt;In-House Room Service Only (available from 7AM - 11PM daily)&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Breakfast Buffet&amp;nbsp;&lt;/span&gt;CLOSED&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Food Delivery (via&amp;nbsp;Encima Delivery, Grab &amp;amp; Food Panda)&amp;nbsp;&lt;/span&gt;&amp;nbsp;CLOSED&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Transport Services&amp;nbsp;&lt;/span&gt;Available. Please book 1 day in advance&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;h1 style=&quot;font-size: 36px; margin-bottom: 10px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; line-height: 1.1;&quot;&gt;Special Practices During Community Quarantine Period&lt;/h1&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;City Garden Grand Hotel is now certified by the Department of Tourism and Bureau of Quarantine to receive guests permitted under Philippine Law.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Although our hotel is operating, we are mandated to follow guidelines from our government. As such,&amp;nbsp;please note that the following guests are only allowed to check-in:&lt;/span&gt;&lt;/p&gt;&lt;ol style=&quot;margin-bottom: 10px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&lt;li&gt;Returning OFWs, Distressed OFWs eligible to avail of accommodation assistance from OWWA;&lt;/li&gt;&lt;li&gt;Repatriated OFWs in compliance with approved quarantine protocols;&lt;/li&gt;&lt;li&gt;Those allowed entry into the Philippines from abroad;&lt;/li&gt;&lt;li&gt;Individuals required to undergo quarantine;&lt;/li&gt;&lt;li&gt;Health care workers and emergency frontline services personnel who need easy access to their work;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Individuals who opt or are required to undergo mandatory Quarantine, such as close contacts, repatriated OFWs, Returning Overseas Filipinos, Foreign Nationals allowed entry into the Philippines, and other individuals required to undergo quarantine; and&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Health and emergency frontline services personnel who need access to their place of work.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Please bring additional documents in order to support your classification. Examples are travel documents, mandatory quarantine requirement, passport, evidence of stranding, COVID-19 test booking / results, work ID, etc.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Maximum occupancy per room is two (2) persons belonging to the same household, if not, only one (1) person will be allowed. Visitors are not permitted at any time and Minors must be travelling with their parents.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&quot;No Face Mask, No Face Shield, No Entry&quot; policy is strictly implemented.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Arrival protocol shall be as follows depending on your vaccination status:&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;for Non-vaccinated travelers&lt;/span&gt;&lt;br&gt;Day 1: Arrival/Check-in&lt;br&gt;Day 7: RT-PCR Test Swabbing&lt;br&gt;Day 9: Release of test results&lt;br&gt;Day 10: Check out of QH&amp;nbsp;(if negative of Covid-19)&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;for Vaccinated travelers (Fully vaccinated and from Green Countries)&lt;/span&gt;&lt;br&gt;Day 1: Arrival/Check in&lt;br&gt;Must present the DOT/BOQ certificate plus any of:&lt;br&gt;I. LGU vaccination card&lt;br&gt;II. POLO vaccination card&lt;br&gt;III. International certificate of vaccination&lt;br&gt;Day 5: RT-PCR Test Swabbing&lt;br&gt;Day 7: Check out of QH (if negative of Covid-19)&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Aside from the above, due to the General Community Quarantine, our hotel Pool and Gym remain closed&amp;nbsp;&amp;nbsp;but Firefly Roofdeck Restaurant is still operating and open to the public (except Quarantine Guests) but following strict protocols.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Our team can also help you arrange daily meals (delivered to your room) at a fixed menu and price. Please take note that for Quarantine Guests, food delivery purchases are strictly prohibited. Moreover, we can also arrange your transportation needs at an additional cost.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Leisure purposes are still prohibited at the moment and should your purpose of stay does not match the above criteria, we are happy to move your booking to a later date or we can process a refund/free cancellation with our online travel partner where you&rsquo;ve made your reservation.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Should you have any further concerns, please do not hesitate to contact us.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;Thank you and stay safe!&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; letter-spacing: 0.2px; font-size: 16px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Due to the paramount nature of the safety of our guests, and in compliance with regulations, City Garden Grand Hotel makes available to its guests the following:&lt;/span&gt;&lt;/p&gt;&lt;ol style=&quot;margin-bottom: 10px; font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&lt;li&gt;Flexible cancellation policy - no cancellation fee / free-rebooking for all bookings made during any level of quarantine period&lt;/li&gt;&lt;li&gt;Enhanced cleaning procedures in all common areas&lt;/li&gt;&lt;li&gt;Limited entry to guest rooms to reduce interaction&lt;/li&gt;&lt;li&gt;Closed / limited interaction and contact with hotel employees&lt;/li&gt;&lt;li&gt;Safety amenities such as masks, gloves, and alcohol&lt;/li&gt;&lt;li&gt;Low-cost menu and delivery options for food straight to your room&lt;/li&gt;&lt;li&gt;Crowd-less check-in&lt;/li&gt;&lt;/ol&gt;&lt;/h2&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1),
(7, 'wrandell', 'group9', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `checked`
--
ALTER TABLE `checked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
