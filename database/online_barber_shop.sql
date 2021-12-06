-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 09:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_barber_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adposts`
--

CREATE TABLE `adposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adposts`
--

INSERT INTO `adposts` (`id`, `content`, `time_start`, `time_end`) VALUES
(1, 'advertising content is here', '2021-04-27 10:25:47', '2021-04-27 02:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `service_id`, `user_id`, `customer_id`, `time_start`, `time_end`) VALUES
(9, 1, 7, 3, '2021-09-07 14:00:00', '2021-09-07 15:00:00'),
(10, 7, 3, 3, '2021-09-07 15:00:00', '2021-09-07 16:00:00'),
(11, 7, 2, 1, '2021-09-11 00:00:00', '2021-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Promos'),
(2, 'Hair'),
(3, 'Skin'),
(4, 'Nail'),
(5, 'Body'),
(6, 'Bridal'),
(7, 'Kids'),
(9, 'Head Massage');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `telephone`, `message`, `created`) VALUES
(4, 'Gayan Sandakelum', 'gayan@gmail.com', 715023698, 'I want to contact the manager.', '2021-09-11 03:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `created`) VALUES
(1, 'thilini', '$2y$10$tHma9HJLlH5C7vnuuUXiyeITgOp2gQUDEN3YbHm.ZccGjVQ9hM0GC', 'customer@gmail.com', '2021-04-27 09:25:48'),
(2, 'john', '$2y$10$vmoBtMBy9bxnTvs8KteWjujDADMjiq7bUjohzCrv7V8Xi08eJQ2Tu', 'john@gmail.com', '2021-04-27 09:25:48'),
(3, 'alice', '$2y$10$yWLMO390LzGSkJqNU.8n8uwScuWvi2LkV.6dw6Tgb8vpHBlIdQWsi', 'alice@gmail.com', '2021-04-27 09:25:48'),
(4, 'ranathunga', '$2y$10$g2mflP2AK48vG/dbsY7Rqe4dWMrQL1umOM1vYd1JH5QjORPtnLDh2', 'ranathunga@gmail.com', '2021-05-29 05:48:15'),
(5, 'imran', '$2y$10$JgZSTUcB1J43tQuQF9sB8e7LJPw5BPJxY14jax17BODfzjW.RIwRC', 'imran@gmail.com', '2021-09-10 03:15:28'),
(6, 'sanduni', '$2y$10$JqQeQ7nb1dWbpmCi.pGfo.6ndlPRccTATc1xa3uA3BMoJ5K3qUd0a', 'sanduni@gmail.com', '2021-09-10 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`) VALUES
(3, 'We are Closed!', 'According to the rules of the corona epidemic on government, we will close our shop on poya day (2021/08/28) onwards. Please so sorry for your doubts.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `directory`, `image`) VALUES
(1, 'service', 'bundled-services.jpg'),
(35, 'service', 'Naturals Cleanup with Classic Pedicure.jpg'),
(36, 'service', 'Sothy’s Cleanup with Classic Pedicure.jpg'),
(37, 'service', 'Gents Hair Cut With Head Wash - Senior.jpg'),
(40, 'service', 'Gents Hair Cut - Junior.jpg'),
(41, 'service', 'Express Color (10 Mins).jpg'),
(42, 'service', 'Grey coverage.jpg'),
(44, 'service', 'Clean Up (15 Mins).jpg'),
(45, 'service', 'Classic Clean Up.jpg'),
(46, 'service', 'Natural Glow Facial.jpg'),
(47, 'service', 'Young Radiance.jpg'),
(51, 'service', 'Spa Manicure.jpg'),
(52, 'service', 'Classic Manicure.jpg'),
(55, 'service', 'Full Arm to Full Leg.jpg'),
(56, 'service', 'Full Arms , Full Legs, Under Arms.jpg'),
(57, 'service', 'Ume Care Cleanup with Classic Pedicure.jpg'),
(58, 'service', 'Acne Treatment for Clear Skin.jpg'),
(60, 'service', 'Hair Cut.jpg'),
(61, 'service', 'Cut & Re-Style.jpg'),
(62, 'service', 'Hair Wash & Blast Dry.jpg'),
(63, 'service', 'Classic Clean Up-2.jpg'),
(64, 'service', 'Brightening Clean Up (Ume Care).jpg'),
(65, 'service', 'Natural Glow Facial-2.jpg'),
(66, 'service', 'Young Radiance Facial (Anti-Agining).jpg'),
(67, 'service', 'Classic Manicure-2.jpg'),
(68, 'service', 'Spa Manicure-Pedicure-2.jpg'),
(69, 'service', 'Nail Color.jpg'),
(70, 'service', 'Nail Color French Tip.jpg'),
(71, 'service', 'Full Arms & Full Legs.jpg'),
(72, 'service', 'Full Arms , Full Legs, Under Arms.jpg'),
(73, 'service', 'Face Waxing.jpg'),
(74, 'gallery', 'Gallery Image 1.jpg'),
(75, 'gallery', 'Gallery Image 2.jpg'),
(76, 'gallery', 'Gallery Image 3.jpg'),
(77, 'gallery', 'Gallery Image 4.jpg'),
(78, 'gallery', 'Gallery Image 5.jpg'),
(79, 'gallery', 'Gallery Image 6.jpg'),
(80, 'gallery', 'Gallery Image 7.jpg'),
(81, 'gallery', 'Gallery Image 8.jpg'),
(82, 'gallery', 'Gallery Image 9.jpg'),
(83, 'gallery', 'Gallery Image 10.jpg'),
(84, 'gallery', 'Gallery Image 11.jpg'),
(85, 'gallery', 'Gallery Image 12.jpg'),
(86, 'gallery', 'Gallery Image 13.jpg'),
(87, 'gallery', 'Gallery Image 14.jpg'),
(90, 'service', 'Grey Coverage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_11_121433_create_users_table', 1),
(2, '2021_04_11_123448_create_adposts_table', 1),
(3, '2021_04_12_023043_create_categories_table', 1),
(4, '2021_04_12_023138_create_sub_categories_table', 1),
(5, '2021_04_12_032311_create_images_table', 1),
(6, '2021_04_12_032833_create_services_table', 1),
(7, '2021_04_12_040339_create_contacts_table', 1),
(8, '2021_04_12_040735_create_events_table', 1),
(9, '2021_04_12_041006_create_posts_table', 1),
(10, '2021_04_15_060744_create_customers_table', 1),
(11, '2021_04_15_061430_create_appointments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`) VALUES
(1, '8 Attractive Offers For Your Salon To Drive Clients', 'Running a salon is a serious business and getting clients through the door is a big part of that business. Let’s face it, your salon business would be nowhere if you didn’t get repeat business from returning customers. Your business is thriving because of them and you need to give it your all to retain them. The best way to make sure they stay is by rolling out attractive salon offers.\nPromotions, offers and deals is a fool-proof way to attract new clients and retain old ones. However, do not end up lowering your prices to such an extent that you hurt long-term business. Your offers for salon should be such that you are bringing clients through the door by adding value but not compromising on your prices.'),
(2, 'Top Ideas & Inspiration to Decorate your Dream Salon', 'The hair and beauty industry are all about appearance and visual aesthetics. A client leaves their home and visits a salon to get pampered in an environment that is soothing, tranquilising and visually-stunning. The goal is to make your customer feel good from the moment he or she walks into your salon. Without a doubt, salon décor plays an important role in determining your success and bottom line.\nSetting up a new or existing salon can be quite an overwhelming process because you have many things to look into such as salon layout, interior design schemes, services, products, hiring staff and so on. However, designing your salon is supposed to be fun. Try not to make it stressful.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `amount`, `status`, `user_id`, `sub_category_id`, `image_id`) VALUES
(1, 'Naturals Cleanup with Classic Pedicure', 4000, 'ENABLE', 2, 1, 35),
(2, 'Ume Care Cleanup with Classic Pedicure', 4900, 'ENABLE', 3, 1, 57),
(3, 'Sothy’s Cleanup with Classic Pedicure', 5400, 'ENABLE', 2, 1, 36),
(4, 'Acne Treatment for Clear Skin (Book 4 Treatments and Get Fourth One Free)', 4800, 'ENABLE', 3, 1, 58),
(5, 'Hair cut', 1800, 'ENABLE', 3, 2, 60),
(6, 'Cut & Re-Style', 2500, 'ENABLE', 3, 2, 61),
(7, 'Hair Wash & Blast Dry', 1000, 'ENABLE', 3, 3, 62),
(8, 'Gents Hair Cut - Junior', 500, 'ENABLE', 2, 4, 40),
(9, 'Gents Hair Cut With Head Wash - Senior', 800, 'ENABLE', 2, 4, 37),
(10, 'Express Color (10 Mins)', 450, 'ENABLE', 2, 5, 41),
(11, 'Grey Coverage', 2800, 'ENABLE', 2, 5, 90),
(12, 'Classic Clean Up', 1900, 'ENABLE', 3, 6, 63),
(13, 'Brightening Clean Up (Ume Care)', 3900, 'ENABLE', 3, 6, 64),
(14, 'Natural Glow Facial', 2900, 'ENABLE', 3, 7, 65),
(15, 'Young Radiance Facial (Anti-Agining)', 4000, 'ENABLE', 3, 7, 66),
(16, 'Clean Up (15 Mins)', 750, 'ENABLE', 2, 8, 44),
(17, 'Classic Clean Up', 1900, 'ENABLE', 2, 8, 45),
(18, 'Natural Glow Facial', 2900, 'ENABLE', 2, 6, 46),
(19, 'Young Radiance', 4000, 'ENABLE', 2, 9, 47),
(20, 'Classic Manicure / Pedicure', 1200, 'ENABLE', 3, 10, 67),
(21, 'Spa Manicure/Pedicure', 2300, 'ENABLE', 3, 10, 68),
(22, 'Nail Color', 525, 'ENABLE', 3, 11, 69),
(23, 'Nail Color French Tip', 1000, 'ENABLE', 3, 11, 70),
(24, 'Classic Manicure / Pedicure', 1200, 'ENABLE', 2, 12, 52),
(25, 'Spa Manicure/Pedicure', 2300, 'ENABLE', 2, 12, 51),
(26, 'Full arms & Full Legs', 2200, 'ENABLE', 3, 13, 71),
(27, 'Full Arms , Full Legs, Under Arms', 4000, 'ENABLE', 3, 13, 72),
(28, 'Face Waxing', 450, 'ENABLE', 3, 14, 73),
(29, 'Full Arm to Full Leg', 2200, 'ENABLE', 2, 15, 55),
(30, 'Full Arms , Full Legs, Under Arms', 4000, 'ENABLE', 2, 15, 56);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`) VALUES
(1, 'Bundled Services', 1),
(2, 'Women Hair Cut', 2),
(3, 'Women Hair Wash & Blast Dry', 2),
(4, 'Men Hair Cut', 2),
(5, 'Men Grey Coverage', 2),
(6, 'Women Clean-up', 3),
(7, 'Women Facials', 3),
(8, 'Men Clean-up', 3),
(9, 'Men Facials', 3),
(10, 'Women Hand & Feet Care', 4),
(11, 'Women Nail Lacquer', 4),
(12, 'Men Hand & Feet Care', 4),
(13, 'Women Classic Waxing', 5),
(14, 'Women Premium Waxing', 5),
(15, 'Men Classic Waxing', 5),
(16, 'Men Premium Waxing', 5),
(17, 'Women Bridal', 6),
(18, 'Women Dressing', 6),
(19, 'Men Dressing', 6),
(20, 'Girls', 7),
(21, 'Boys', 7),
(22, 'Boys & Girls', 7),
(24, 'Special Berum Oil Head Massage', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `status`) VALUES
(1, 'ashan', '$2y$10$N0APWKaJZn02naKL90S0d.y/hKhRZiqPFA2LZn1YDRe11sXP4prxK', 'admin@empirecuts.com', '2021-04-27 09:25:47', 1),
(2, 'amal', '$2y$10$qgtusqrst7WHE0a4w3U8yeg46CaGMvorQUMGOm5ufi/hHY1OHlx4C', 'amal@empirecuts.com', '2021-04-27 09:25:47', 1),
(3, 'tharuni', '$2y$10$VqL7jSd2SmD1eSf64Hqu1u/Ihcw.0zYzeSUIIUlnNfJZyA44UDIJe', 'tharuni@empirecuts.com', '2021-04-27 09:25:47', 1),
(7, 'radeesha', '$2y$10$02QXuOsGWWQuaUka9X0RI.MUKkk/Blvhihb8w/30aY7yWK3QKyJx.', 'radeesha@empirecuts.com', '2021-09-10 03:12:42', 1),
(8, 'ravindu', '$2y$10$3Daa4rmOJTGzBFC/DF2Wq.V4FLZloOFJoO.2M8E8Vz/zPkQ/kgvBe', 'ravindu@empirecuts.com', '2021-09-10 03:13:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adposts`
--
ALTER TABLE `adposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`),
  ADD KEY `services_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `services_image_id_foreign` (`image_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adposts`
--
ALTER TABLE `adposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `services_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
