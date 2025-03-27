-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 01:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neonstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `showHome`, `created_at`, `updated_at`) VALUES
(185, 'Shop Neon', 'shop-neon', 1, 'Yes', '2025-02-20 03:19:14', '2025-02-20 03:19:14'),
(187, 'Frames', 'frames', 1, 'Yes', '2025-02-24 09:33:10', '2025-03-20 02:02:35'),
(188, 'Mug', 'mug', 1, 'Yes', '2025-02-24 09:37:31', '2025-03-20 02:02:58'),
(189, 'Pillow', 'pillow', 1, 'No', '2025-02-24 09:38:50', '2025-03-10 04:36:37'),
(190, 'Acrylic', 'acrylic', 1, 'No', '2025-02-24 09:39:03', '2025-03-10 04:37:16'),
(191, 'Key Chain', 'key-chain', 0, 'No', '2025-02-24 09:39:18', '2025-02-24 09:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `mobile`, `email`, `country_id`, `address`, `apartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(7, 30, 'Mukesh', 'Bhavsar', '09978835005', 'mukeshbhavsar210@gmail.com', 100, 'Keerthi Royal Palms,', NULL, 'Banglore', 'Karnataka', '560100', NULL, '2025-03-12 09:07:18', '2025-03-21 08:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `max_uses` varchar(255) DEFAULT NULL,
  `max_uses_user` varchar(255) DEFAULT NULL,
  `type` enum('percent','fixed') NOT NULL DEFAULT 'fixed',
  `discount_amount` double(10,2) NOT NULL,
  `min_amount` double(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frame_borders`
--

CREATE TABLE `frame_borders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_borders`
--

INSERT INTO `frame_borders` (`id`, `name`, `slug`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mirror Image', 'mirror_image', '0', 'mirror-image.jpg', NULL, NULL),
(2, 'Border Color', 'border_color', '0', 'border-color.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_frames`
--

CREATE TABLE `frame_frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('standard','premium','floating') NOT NULL DEFAULT 'standard',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_frames`
--

INSERT INTO `frame_frames` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Golden', 'golden', '798', 'golden.png', 'standard', NULL, NULL),
(2, 'Cherry Style', 'cherry', '998.00', 'cherry-style.png', 'premium', NULL, NULL),
(3, 'Black Floating Frame', 'black_floating', '1798.00', 'black-floating-frame.png', 'floating', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_metals`
--

CREATE TABLE `frame_metals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `custom_size_1` varchar(255) DEFAULT NULL,
  `custom_size_2` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_metals`
--

INSERT INTO `frame_metals` (`id`, `name`, `shape`, `size`, `custom_size_1`, `custom_size_2`, `price`, `created_at`, `updated_at`) VALUES
(23, '547863', 'Square', '8', '8', '8', 547863.00, '2025-03-21 05:40:27', '2025-03-21 05:40:27'),
(24, '971287', 'Rectangle', '8', '8', '8', 971287.00, '2025-03-21 05:43:56', '2025-03-21 05:43:56'),
(25, '578359', 'Square', '24', '24', '22', 578359.00, '2025-03-21 05:52:52', '2025-03-21 05:52:52'),
(26, '468220', 'Rectangle', '8', '8', '8', 468220.00, '2025-03-21 05:56:47', '2025-03-21 05:56:47'),
(27, '230886', 'Square', '8', '8', '8', 230886.00, '2025-03-21 06:58:19', '2025-03-21 06:58:19'),
(28, '502614', 'Square', '8', '8', '8', 502614.00, '2025-03-21 07:19:35', '2025-03-21 07:19:35'),
(29, '553866', 'Square', '8', '8', '8', 553866.00, '2025-03-21 07:22:13', '2025-03-21 07:22:13'),
(30, '590154', 'Square', '8', '8', '8', 590154.00, '2025-03-21 07:23:03', '2025-03-21 07:23:03'),
(31, '647883', 'Square', '8', '8', '8', 647883.00, '2025-03-21 07:24:12', '2025-03-21 07:24:12'),
(32, '678475', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:30:55', '2025-03-21 07:30:55'),
(33, '355340', 'Square', '8', '8', '8', 700.00, '2025-03-21 07:31:24', '2025-03-21 07:31:24'),
(34, '205907', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:31:46', '2025-03-21 07:31:46'),
(35, '470811', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:33:20', '2025-03-21 07:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `frame_shapes`
--

CREATE TABLE `frame_shapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `types` enum('canvas','acrylic','metal','wood','others') DEFAULT 'canvas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_shapes`
--

INSERT INTO `frame_shapes` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Single Print', 'wood', 143, 'icon_single_print.png', 'canvas', NULL, NULL),
(2, 'Round Canvas', 'metal', 721, 'round_canvas.png', 'canvas', NULL, NULL),
(3, 'Triangle Canvas', 'triangle_canvas', 1250, 'round_canvas.png', 'canvas', NULL, NULL),
(4, 'Single Print', 'single_print', 355, 'round_canvas.png', 'acrylic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_sizes`
--

CREATE TABLE `frame_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `price` int(15) NOT NULL,
  `types` enum('recommended','square','panaromic','large','small') NOT NULL DEFAULT 'recommended',
  `height` int(10) NOT NULL DEFAULT 20,
  `width` int(10) NOT NULL DEFAULT 20,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_sizes`
--

INSERT INTO `frame_sizes` (`id`, `name`, `slug`, `price`, `types`, `height`, `width`, `created_at`, `updated_at`) VALUES
(1, '8\" x 8\"', 'small', 0, 'square', 45, 45, NULL, NULL),
(2, '10\" x 10\"', 'medium', 30, 'square', 47, 47, NULL, NULL),
(3, '16\" x 16\"', 'large', 60, 'square', 49, 49, NULL, NULL),
(4, '24\" x 24\"', 'four', 1066, 'square', 53, 53, NULL, NULL),
(5, '30\" x 30\"', 'five', 1646, 'square', 56, 56, NULL, NULL),
(6, '45\" x 45\"', 'six', 3640, 'square', 64, 64, NULL, NULL),
(7, '11\" x 17\"', 'recommended_01', 379, 'recommended', 32, 50, NULL, NULL),
(8, '22\" x 34\"', 'recommended_02', 1377, 'recommended', 38, 58, NULL, NULL),
(9, '33\" x 51\"', 'recommended_03', 3038, 'recommended', 43, 67, NULL, NULL),
(10, '8\" x 24\"', 'panoromic_01', 396, 'panaromic', 19, 57, NULL, NULL),
(11, '10\" x 40\"', 'panoromic_02', 764, 'panaromic', 17, 70, NULL, NULL),
(12, '12\" x 36\"', 'panoromic_03', 817, 'panaromic', 22, 67, NULL, NULL),
(13, '15\" x 45\"', 'panoromic_04', 1255, 'panaromic', 24, 73, NULL, NULL),
(14, '16\" x 48\"', 'panoromic_05', 1422, 'panaromic', 25, 76, NULL, NULL),
(15, '18\" x 54\"', 'panoromic_06', 1787, 'panaromic', 27, 80, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_wraps`
--

CREATE TABLE `frame_wraps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('wrap','border') NOT NULL DEFAULT 'wrap',
  `border_color` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_wraps`
--

INSERT INTO `frame_wraps` (`id`, `name`, `slug`, `price`, `image`, `types`, `border_color`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Canvas Lite (0.50\")', 'canvas_lite', '110', 'size05.jpg', 'wrap', NULL, NULL, NULL, NULL),
(2, 'Thin Gallery Wrap (0.75\")', 'thin_gallery_wrap', '185.90', 'size75.jpg', 'wrap', NULL, NULL, NULL, NULL),
(3, 'Thick Gallery Wrap (1.5\")', 'thick_gallery_wrap', '223.08', 'size15.jpg', 'wrap', NULL, NULL, NULL, NULL),
(4, 'Hanging Canvas', 'hanging_canvas', '121.55', 'hanging-canvas.jpg', 'wrap', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_displays`
--

CREATE TABLE `hardware_displays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_displays`
--

INSERT INTO `hardware_displays` (`id`, `name`, `slug`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Open Back', 'open_back', '0', NULL, NULL),
(2, 'Dust Cover', 'dust_cover', '49.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_finishings`
--

CREATE TABLE `hardware_finishings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('basic','advance') NOT NULL DEFAULT 'basic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_finishings`
--

INSERT INTO `hardware_finishings` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Original Free', 'original_free', '1000', '0', 'basic', NULL, NULL),
(2, 'Sephia Free', 'sephia_free', '5000', '', 'basic', NULL, NULL),
(3, 'Pixel Painting', 'pixel_painting', '1750', '', 'advance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_styles`
--

CREATE TABLE `hardware_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_styles`
--

INSERT INTO `hardware_styles` (`id`, `name`, `slug`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hooks for Hanging Free', 'hooks_for_hanging_free', '0', '', NULL, NULL),
(2, 'Ready to Hang Free', 'ready_to_hang_free', '0', '', NULL, NULL),
(3, 'No Hooks Free', 'no_hooks_free', '0', '', NULL, NULL),
(4, 'Sawtooth Hanger', 'sawtooth_hanger', '25.00', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_edits`
--

CREATE TABLE `image_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `frame` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `border` varchar(255) NOT NULL,
  `hardware` varchar(255) NOT NULL,
  `display_option` varchar(255) NOT NULL,
  `lamination` varchar(255) NOT NULL,
  `retouching` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`retouching`)),
  `notes` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laminations`
--

CREATE TABLE `laminations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `class` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laminations`
--

INSERT INTO `laminations` (`id`, `name`, `slug`, `price`, `class`, `created_at`, `updated_at`) VALUES
(1, 'No', 'no', 0, 2, NULL, NULL),
(2, 'Standard', 'standard', 149, 5, NULL, NULL),
(3, 'Premium', 'premium', 249, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_18_051106_alter_users_table', 2),
(6, '2023_11_20_052052_create_categories_table', 3),
(7, '2023_11_20_091142_create_temp_images_table', 4),
(8, '2023_11_20_123339_create_sub_categories_table', 5),
(9, '2023_11_21_045811_create_brands_table', 6),
(10, '2023_11_21_063746_create_products_table', 7),
(11, '2023_11_21_063811_create_product_images_table', 7),
(12, '2023_11_23_101727_alter_categories_table', 8),
(13, '2023_11_23_102759_alter_products_table', 9),
(14, '2023_11_23_103442_alter_sub_categories_table', 10),
(15, '2023_11_24_064315_alter_products_table', 11),
(16, '2023_11_25_072939_create_countries_table', 12),
(17, '2023_11_25_075119_create_orders_table', 13),
(18, '2023_11_25_075155_create_orders_items_table', 13),
(19, '2023_11_25_075250_create_customer_addresses_table', 13),
(20, '2023_11_25_135444_create_shipping_charges_table', 14),
(21, '2023_11_28_090521_create_discount_coupons_table', 15),
(22, '2023_11_28_091637_create_discount_coupons_table', 16),
(23, '2023_11_28_091724_create_discount_coupons_table', 17),
(24, '2023_11_28_092025_create_discount_coupons_table', 18),
(25, '2023_11_28_092115_create_discount_coupons_table', 19),
(26, '2023_11_28_092301_create_discount_coupons_table', 20),
(27, '2023_11_29_084104_alter_orders_table', 21),
(28, '2023_11_29_104758_alter_orders_table', 22),
(29, '2023_11_30_051729_create_wishlists_table', 23),
(30, '2023_12_01_060717_alter_users_table', 24),
(31, '2023_12_01_072404_create_pages_table', 25),
(32, '2023_12_02_111056_create_product_ratings_table', 26),
(33, '2023_12_29_074318_create_payments_table', 27),
(34, '2025_01_15_105251_create_sessions_table', 28),
(35, '2025_02_17_052639_create_role_has_permissions_table', 29),
(36, '2025_02_20_110016_create_states_table', 30),
(37, '2025_02_23_120621_create_neon_products_table', 31),
(38, '2025_02_25_050013_create_frame_sizes_table', 32),
(39, '2025_02_25_050601_create_frame_shapes_table', 33),
(40, '2025_02_25_092227_create_frame_wraps_table', 34),
(41, '2025_02_27_093604_create_generated_svgs_table', 35),
(42, '2025_02_27_100638_create_generated_svgs_table', 36),
(43, '2025_02_27_100813_create_svgs_table', 37),
(44, '2025_03_05_074717_create_svg_customizations_table', 37),
(45, '2025_03_05_075806_create_image_edits_table', 38),
(46, '2025_03_05_093247_create_images_table', 39),
(47, '2025_03_05_093935_create_frame_orders_table', 40),
(48, '2025_03_06_054651_create_frame_orders_table', 41),
(49, '2025_03_06_110409_create_frame_borders_table', 42),
(50, '2025_03_06_125835_create_frame_frames_table', 43),
(51, '2025_03_06_142859_create_hardware_style_datas_table', 44),
(52, '2025_03_06_142935_create_hardware_display_datas_table', 44),
(53, '2025_03_06_143003_create_hardware_finishing_datas_table', 44),
(54, '2025_03_08_105709_create_laminations_table', 45),
(55, '2025_03_08_111532_create_modifications_table', 46),
(56, '2025_03_11_092744_create_payments_table', 47),
(57, '2025_03_11_131139_create_new_payments_table', 48),
(58, '2025_03_11_143013_create_payments_table', 49),
(59, '2025_03_12_102735_create_payments_table', 50),
(60, '2025_03_12_104429_create_payments_table', 51),
(61, '2025_03_12_114935_create_temp_orders_table', 52),
(62, '2025_03_21_072404_create_frame_metals_table', 53),
(63, '2025_03_22_073610_create_settings_table', 54);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 4),
(7, 'App\\Models\\User', 7),
(9, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `modifications`
--

CREATE TABLE `modifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modifications`
--

INSERT INTO `modifications` (`id`, `name`, `slug`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Red Eye Removal', 'red_eye_removal', 299, NULL, NULL),
(2, 'Dust/Scratch Removal', 'dust_scratch_removal', 0, NULL, NULL),
(3, 'Enhance Color', 'enhance_color', 0, NULL, NULL),
(4, 'Date Stamp Removal', 'date_stamp_Removal', 0, NULL, NULL),
(5, 'Lighten/Darken Image', 'lighten_darken_image', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT NULL,
  `shipping` double(10,2) DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grandtotal` double(10,2) DEFAULT NULL,
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `grandtotal`, `status`, `shipped_date`, `country_id`, `created_at`, `updated_at`) VALUES
(173, 30, 2000.00, 90.00, '', NULL, 0.00, 2090.00, 'pending', NULL, 100, '2025-03-21 08:22:15', '2025-03-21 08:22:15'),
(174, 30, 2700.00, 90.00, '', NULL, 0.00, 2790.00, 'pending', NULL, 100, '2025-03-21 08:24:30', '2025-03-21 08:24:30'),
(175, 30, 2500.00, 90.00, '', NULL, 0.00, 2590.00, 'pending', NULL, 100, '2025-03-21 08:29:25', '2025-03-21 08:29:25'),
(176, 30, 600.00, 90.00, '', NULL, 0.00, 690.00, 'pending', NULL, 100, '2025-03-21 08:33:51', '2025-03-21 08:33:51'),
(177, 30, 3600.00, 90.00, '', NULL, 0.00, 3690.00, 'pending', NULL, 100, '2025-03-21 08:35:44', '2025-03-21 08:35:44'),
(178, 30, 1800.00, 90.00, '', NULL, 0.00, 1890.00, 'pending', NULL, 100, '2025-03-21 08:39:23', '2025-03-21 08:39:23'),
(179, 30, 2100.00, 90.00, '', NULL, 0.00, 2190.00, 'pending', NULL, 100, '2025-03-21 08:41:38', '2025-03-21 08:41:38'),
(180, 30, 800.00, 90.00, '', NULL, 0.00, 890.00, 'pending', NULL, 100, '2025-03-21 08:43:00', '2025-03-21 08:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `shape` varchar(255) DEFAULT NULL,
  `custom_size1` int(20) DEFAULT NULL,
  `custom_size2` int(20) DEFAULT NULL,
  `font` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `frame` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `border` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `wrap_wrap` varchar(100) DEFAULT NULL,
  `hardware_style` varchar(100) DEFAULT NULL,
  `hardware_display` varchar(100) DEFAULT NULL,
  `lamination` varchar(100) DEFAULT NULL,
  `retouching` varchar(100) DEFAULT NULL,
  `hardware_finishing` varchar(100) DEFAULT NULL,
  `proof` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `category`, `shape`, `custom_size1`, `custom_size2`, `font`, `size`, `color`, `frame`, `image`, `border`, `major`, `wrap_wrap`, `hardware_style`, `hardware_display`, `lamination`, `retouching`, `hardware_finishing`, `proof`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(68, 177, 315, '888521', 'Metal Frame', NULL, NULL, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3600.00, 3600.00, '2025-03-21 08:35:44', '2025-03-21 08:35:44'),
(69, 178, 316, '738610', 'Metal Frame', NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1800.00, 1800.00, '2025-03-21 08:39:23', '2025-03-21 08:39:23'),
(70, 179, 318, '633541', 'Metal Frame', NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2100.00, 2100.00, '2025-03-21 08:41:38', '2025-03-21 08:41:38'),
(71, 180, 321, '646208', 'Metal Frame', NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 800.00, 800.00, '2025-03-21 08:43:01', '2025-03-21 08:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(2, 'About us', 'about-us', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><br></p>', '2023-12-01 03:33:50', '2023-12-01 03:33:50'),
(3, 'Contact', 'contact-us', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>\r\n                    <address>\r\n                    Mukesh Bhavsar<br>\r\n                    711-2880 Nulla St.<br>\r\n                    Mankato Mississippi 96522<br>\r\n                    <a href=\"tel:+xxxxxxxx\">(XXX) 555-2368</a><br>\r\n                    <a href=\"mailto:jim@rock.com\">jim@rock.com</a>\r\n                    </address>', '2023-12-01 03:44:47', '2024-11-20 23:54:11'),
(4, 'Terms', 'terms', '<p>terms</p>', '2023-12-27 08:59:35', '2023-12-27 08:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `razorpay_order_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'INR',
  `payment_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `product_id`, `razorpay_payment_id`, `razorpay_order_id`, `status`, `amount`, `currency`, `payment_data`, `created_at`, `updated_at`) VALUES
(73, 173, 310, 'pay_Q9SnRDnP1anNgK', 'order_Q9SnN3ozE4gac4', 'Paid', 2000.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9SnRDnP1anNgK\\\",\\\"razorpay_order_id\\\":\\\"order_Q9SnN3ozE4gac4\\\",\\\"razorpay_signature\\\":\\\"3c0d2c057ff4fedb7a8ce36dbc5449a7210432d59566d9464e4bdfc927a84fac\\\",\\\"amount\\\":200000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":\\\"Shlok Heights\\\",\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Gujarat\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-03-21 08:22:15', '2025-03-21 08:22:15'),
(74, 174, 311, 'pay_Q9SpoLK4HAYxXj', 'order_Q9Spjn7lsTpefP', 'Paid', 2700.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9SpoLK4HAYxXj\\\",\\\"razorpay_order_id\\\":\\\"order_Q9Spjn7lsTpefP\\\",\\\"razorpay_signature\\\":\\\"ee2a85a42491720503f1ee575448b3fa3a4b29f042d9c536620ed14bcbb43816\\\",\\\"amount\\\":270000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":\\\"Shlok Heights\\\",\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Gujarat\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-03-21 08:24:30', '2025-03-21 08:24:30'),
(75, 175, 312, 'pay_Q9Sv0Lm0ZnqsJs', 'order_Q9SupSAL94oENa', 'Paid', 2500.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9Sv0Lm0ZnqsJs\\\",\\\"razorpay_order_id\\\":\\\"order_Q9SupSAL94oENa\\\",\\\"razorpay_signature\\\":\\\"9498be8c292d99cc14542080a4f00f8c742b04df63101850c501540eabd776cf\\\",\\\"amount\\\":250000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":\\\"Shlok Heights\\\",\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Gujarat\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-03-21 08:29:25', '2025-03-21 08:29:25'),
(76, 176, 314, 'pay_Q9Szgv1Ox3oUX7', 'order_Q9Szd3e0LeLysV', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9Szgv1Ox3oUX7\\\",\\\"razorpay_order_id\\\":\\\"order_Q9Szd3e0LeLysV\\\",\\\"razorpay_signature\\\":\\\"007aefc0fd0368541e32147c02f975afb744b09b9116918209ab8a1046624158\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":\\\"Shlok Heights\\\",\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Gujarat\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-03-21 08:33:51', '2025-03-21 08:33:51'),
(77, 177, 315, 'pay_Q9T1gsRZJhggKD', 'order_Q9T1cyXJAW6CN6', 'Paid', 3600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9T1gsRZJhggKD\\\",\\\"razorpay_order_id\\\":\\\"order_Q9T1cyXJAW6CN6\\\",\\\"razorpay_signature\\\":\\\"5f20c930ef366d6ec05eaa8e9f89a1785a1ecf3b7d75556f6be7ee31e10c1628\\\",\\\"amount\\\":360000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Gujarat\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-03-21 08:35:44', '2025-03-21 08:35:44'),
(78, 178, 316, 'pay_Q9T5XOh6gJI4YI', 'order_Q9T5TSm6jIrOXg', 'Paid', 1800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9T5XOh6gJI4YI\\\",\\\"razorpay_order_id\\\":\\\"order_Q9T5TSm6jIrOXg\\\",\\\"razorpay_signature\\\":\\\"ec826ee236bb0ecbe86e6fd0b5b48ae48199b7925b9fb66c7ecd304a2e56135a\\\",\\\"amount\\\":180000,\\\"first_name\\\":\\\"Mukesh\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"mukeshbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Karnataka\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-21 08:39:23', '2025-03-21 08:39:23'),
(79, 179, 318, 'pay_Q9T7oQUXisW8fW', 'order_Q9T7jdJcKlyCKY', 'Paid', 2100.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9T7oQUXisW8fW\\\",\\\"razorpay_order_id\\\":\\\"order_Q9T7jdJcKlyCKY\\\",\\\"razorpay_signature\\\":\\\"a3a84c103c01e556d01a85c9c02e5010006cf5cc1879fe11dacbfd61806be425\\\",\\\"amount\\\":210000,\\\"first_name\\\":\\\"Mukesh\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"mukeshbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":\\\"Shlok Heights\\\",\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Karnataka\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-21 08:41:39', '2025-03-21 08:41:39'),
(80, 180, 321, 'pay_Q9T9MlGhBfr70o', 'order_Q9T9IcfjHcrC4g', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_Q9T9MlGhBfr70o\\\",\\\"razorpay_order_id\\\":\\\"order_Q9T9IcfjHcrC4g\\\",\\\"razorpay_signature\\\":\\\"2017d156c501fa3eb6f6e57eb8bb076a6051f5e67fcb65cb704af2c0486e21f0\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Mukesh\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"mukeshbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"100\\\",\\\"state\\\":\\\"Karnataka\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-21 08:43:01', '2025-03-21 08:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(21, 'Create user', 'admin', '2025-02-16 23:55:15', '2025-02-17 01:19:00'),
(25, 'Edit users', 'admin', '2025-02-17 01:53:08', '2025-02-17 01:53:08'),
(26, 'Create category', 'admin', '2025-02-17 01:53:24', '2025-02-17 01:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `product_type` varchar(20) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `font` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `compare_price` double(10,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sku` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `track_qty` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `product_type`, `size`, `sizes`, `color`, `colors`, `font`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(259, 'Mukesh', NULL, NULL, 'Neon', NULL, 'Medium', NULL, '#ffffff', 'Passionate', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-18 23:59:09', '2025-03-18 23:59:09'),
(260, '769294', NULL, NULL, NULL, NULL, 'recommended_03 - ₹ 3038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-18 23:59:57', '2025-03-18 23:59:57'),
(264, 'Shirt', 'shirt', '', 'default', NULL, '[\"Small\",\"Medium\",\"Large\"]', NULL, '[\"Red\",\"Blue\",\"Black\"]', NULL, '<p>awesome</p>', NULL, NULL, '', 700.00, 800.00, 185, 27, NULL, 'No', '15784877', '858585', 'Yes', 91, 1, '2025-03-19 00:46:20', '2025-03-19 02:04:13'),
(273, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#ef7b1b', NULL, 'Delight', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-19 05:51:30', '2025-03-19 05:51:30'),
(274, '536651', NULL, NULL, NULL, 'panoromic_01 - ₹ 396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-19 05:51:53', '2025-03-19 05:51:53'),
(277, 'Mukesh', NULL, NULL, 'Neon', 'Large', NULL, '#ffed00', NULL, 'Robo', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-19 06:37:55', '2025-03-19 06:37:55'),
(278, '631993', NULL, NULL, NULL, 'recommended_02 - ₹ 1377', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-19 06:38:50', '2025-03-19 06:41:09'),
(280, 'Personalized Wooden Photo Frames', 'personalized-wooden-photo-frames', 'personalized-wooden-photo-frames_1742447107.jpg', 'default', NULL, '', NULL, '', NULL, '<p><b>Personalized Wooden Photo Frames - Crafted with Love</b></p><p>Have a look at our stunning MDF personalized wooden photo frames - the perfect way to showcase your cherished memories in style! Crafted from high-quality medium density fibreboard wood, these wooden photo frames are not only durable but also incredibly stylish, with a smooth finish that adds a touch of elegance to any room. But what really sets our frames apart is the ability to customize them with your own unique message or design. Even if you want to add your favorite quote, a special date, or any graphic, our expert craftsmen can bring your vision to life. No matter whether you\'re looking to commemorate a special event, give a heartfelt gift, or simply add a touch of personality to your home decor, these are the perfect option.</p><p><br></p><p><b>Features of personalized wooden photo frame</b></p><p>● Personalize your photo frame with your own unique message or design.<br><span style=\"font-size: 1rem;\">● Crafted from high-quality Medium Density Fibreboard wood for durability and style.<br></span><span style=\"font-size: 1rem;\">● Add a touch of elegance to any room with the smooth finish. ps</span></p><div><br></div>', NULL, NULL, '', 800.00, 900.00, 187, 35, NULL, 'No', 'woodenframe_001', 'woodenframe_001', 'Yes', 50, 1, '2025-03-19 23:35:10', '2025-03-19 23:35:10'),
(281, 'Print Metal', 'print-metal', '', 'default', NULL, '[\"Small\",\"Medium\"]', NULL, '[\"Red\"]', NULL, '<p>test</p>', 'test', 'test', '', 800.00, 900.00, 185, 27, NULL, 'No', 'metalframe_001', 'metalframe_001', 'Yes', 8, 1, '2025-03-19 23:38:19', '2025-03-21 07:19:12'),
(288, '903008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 04:59:50', '2025-03-21 04:59:50'),
(289, '719898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 04:59:52', '2025-03-21 04:59:52'),
(290, '958413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:01:03', '2025-03-21 05:01:03'),
(291, '924024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:01:22', '2025-03-21 05:01:22'),
(292, '255508', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:01:54', '2025-03-21 05:01:54'),
(293, '719509', NULL, NULL, NULL, 'recommended_02 - ₹ 1377', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:32:22', '2025-03-21 05:32:22'),
(294, '581738', NULL, NULL, NULL, 'recommended_02 - ₹ 1377', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:32:26', '2025-03-21 05:32:26'),
(295, '543879', NULL, NULL, NULL, 'panoromic_01 - ₹ 396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 05:33:03', '2025-03-21 05:33:03'),
(296, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#62bed3', NULL, 'Robo', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 06:48:13', '2025-03-21 06:48:13'),
(297, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#62bed3', NULL, 'Robo', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 06:48:16', '2025-03-21 06:48:16'),
(298, 'Mukesh Bhavsar', NULL, NULL, 'Neon', 'Medium', NULL, '#ffffff', NULL, 'Robo', NULL, NULL, NULL, NULL, 42000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 06:58:26', '2025-03-21 06:58:26'),
(299, 'Mukesh Bhavsar', NULL, NULL, 'Neon', 'Medium', NULL, '#ffffff', NULL, 'Robo', NULL, NULL, NULL, NULL, 42000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 06:58:28', '2025-03-21 06:58:28'),
(300, 'Mukesh', NULL, NULL, 'Neon', 'Regular', NULL, '#0000ff', NULL, 'Passionate', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 06:59:56', '2025-03-21 06:59:56'),
(301, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#834e98', NULL, 'Romantic', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 07:00:21', '2025-03-21 07:00:21'),
(302, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#62bed3', NULL, 'Passionate', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 07:01:18', '2025-03-21 07:01:18'),
(303, 'Mukesh', NULL, NULL, 'Neon', 'Regular', NULL, '#ef7b1b', NULL, 'Romantic', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 07:19:29', '2025-03-21 07:19:29'),
(304, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#ffffff', NULL, 'Passionate', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 07:53:20', '2025-03-21 07:53:20'),
(305, '943469', NULL, NULL, NULL, 'panoromic_01 - ₹ 396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 07:53:43', '2025-03-21 07:54:45'),
(306, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#ef7b1b', NULL, 'Robo', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 08:03:14', '2025-03-21 08:03:14'),
(307, '33', NULL, NULL, 'Neon', 'Large', NULL, '#ffffff', NULL, 'DOPE', NULL, NULL, NULL, NULL, 6000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 08:03:33', '2025-03-21 08:03:33'),
(308, '281321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:17:12', '2025-03-21 08:17:35'),
(309, '667946', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:18:37', '2025-03-21 08:18:59'),
(310, '634162', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:21:53', '2025-03-21 08:22:15'),
(311, '358761', NULL, NULL, NULL, '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2700.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:24:05', '2025-03-21 08:24:30'),
(312, '724853', NULL, NULL, NULL, '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2500.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:28:57', '2025-03-21 08:29:25'),
(313, '969143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:32:42', '2025-03-21 08:32:42'),
(314, '576473', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:33:28', '2025-03-21 08:33:51'),
(315, '888521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:35:23', '2025-03-21 08:35:44'),
(316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:39:01', '2025-03-21 08:39:23'),
(317, 'Mukesh Bhavsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:39:23', '2025-03-21 08:39:23'),
(318, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:40:58', '2025-03-21 08:41:38'),
(319, 'Mukesh Bhavsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:41:38', '2025-03-21 08:41:38'),
(320, 'Mukesh Bhavsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:41:38', '2025-03-21 08:41:38'),
(321, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', -1, 1, '2025-03-21 08:42:39', '2025-03-21 08:43:00'),
(322, 'Mukesh Bhavsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:43:00', '2025-03-21 08:43:00'),
(323, 'Mukesh Bhavsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 08:43:01', '2025-03-21 08:43:01'),
(324, 'Mukesh', NULL, NULL, 'Neon', 'Medium', NULL, '#ffffff', NULL, 'Passionate', NULL, NULL, NULL, NULL, 18000.00, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', 1, 0, '2025-03-21 22:46:41', '2025-03-21 22:46:41'),
(325, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 22:46:46', '2025-03-21 22:46:46'),
(326, '852491', NULL, NULL, NULL, 'panoromic_01 - ₹ 396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, 1, '2025-03-21 22:47:01', '2025-03-21 22:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(50, NULL, 'uploads/1741580071.JPG', NULL, '2025-03-10 00:07:38', '2025-03-10 00:07:38'),
(204, 259, '642964_Mukesh.svg', NULL, '2025-03-18 23:59:09', '2025-03-18 23:59:09'),
(205, 260, 'uploads/1742362194.JPG', NULL, '2025-03-18 23:59:57', '2025-03-18 23:59:57'),
(207, 273, '748957_Mukesh.svg', NULL, '2025-03-19 05:51:30', '2025-03-19 05:51:30'),
(208, 274, 'uploads/1742362194.JPG', NULL, '2025-03-19 05:51:53', '2025-03-19 05:51:53'),
(209, 277, '164182_Mukesh.svg', NULL, '2025-03-19 06:37:55', '2025-03-19 06:37:55'),
(210, 278, 'uploads/1742386100.JPG', NULL, '2025-03-19 06:38:50', '2025-03-19 06:38:50'),
(211, 293, 'uploads/1742554929.jpg', NULL, '2025-03-21 05:32:22', '2025-03-21 05:32:22'),
(212, 294, 'uploads/1742554929.jpg', NULL, '2025-03-21 05:32:26', '2025-03-21 05:32:26'),
(213, 295, 'uploads/1742554929.jpg', NULL, '2025-03-21 05:33:03', '2025-03-21 05:33:03'),
(214, 296, '578120_Mukesh.svg', NULL, '2025-03-21 06:48:14', '2025-03-21 06:48:14'),
(215, 297, '578120_Mukesh.svg', NULL, '2025-03-21 06:48:16', '2025-03-21 06:48:16'),
(216, 298, '248237_Mukesh Bhavsar.svg', NULL, '2025-03-21 06:58:26', '2025-03-21 06:58:26'),
(217, 299, '248237_Mukesh Bhavsar.svg', NULL, '2025-03-21 06:58:28', '2025-03-21 06:58:28'),
(218, 300, '896322_Mukesh.svg', NULL, '2025-03-21 06:59:56', '2025-03-21 06:59:56'),
(219, 301, '507318_Mukesh.svg', NULL, '2025-03-21 07:00:21', '2025-03-21 07:00:21'),
(220, 302, '458837_Mukesh.svg', NULL, '2025-03-21 07:01:18', '2025-03-21 07:01:18'),
(221, 303, '284431_Mukesh.svg', NULL, '2025-03-21 07:19:29', '2025-03-21 07:19:29'),
(222, 304, '809570_Mukesh.svg', NULL, '2025-03-21 07:53:20', '2025-03-21 07:53:20'),
(223, 305, 'uploads/1742554929.jpg', NULL, '2025-03-21 07:53:43', '2025-03-21 07:53:43'),
(224, 306, '880577_Mukesh.svg', NULL, '2025-03-21 08:03:14', '2025-03-21 08:03:14'),
(225, 307, '652739_33.svg', NULL, '2025-03-21 08:03:33', '2025-03-21 08:03:33'),
(226, 324, '117372_Mukesh.svg', NULL, '2025-03-21 22:46:41', '2025-03-21 22:46:41'),
(227, 326, 'No image found', NULL, '2025-03-21 22:47:01', '2025-03-21 22:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` double(3,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2025-02-17 04:50:22', '2025-02-17 01:52:39'),
(7, 'Super Admin', 'admin', '2025-02-17 00:04:26', '2025-02-17 00:04:26'),
(9, 'Editor', 'admin', '2025-02-17 01:55:01', '2025-02-17 01:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(26, 1),
(21, 1),
(25, 1),
(26, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `business_line` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `banners` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`banners`)),
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `business_line`, `description`, `logo`, `phone`, `whatsapp`, `email`, `address`, `banners`, `facebook`, `instagram`, `twitter`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Mukesh Bhavsar', 'Deloitte Digital', NULL, 'uploads/logo_1742646385.png', '09978835005', NULL, 'mukeshbhavsar210@gmail.com', 'Keerthi Royal Palms,', '[\"uploads\\/banners\\/banner_1742646407.jpg\"]', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, '2025-03-22 07:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(19, '1', 50.00, '2025-02-20 05:35:38', '2025-02-20 05:35:38'),
(22, '100', 90.00, '2025-03-09 23:32:04', '2025-03-09 23:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 'AP', NULL, NULL),
(2, 'Arunachal Pradesh', 'AR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `image`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(27, 'Best Seller', 'best-seller', 'best-seller_1742617420.jpg', 1, 'Yes', 185, '2025-02-20 03:25:59', '2025-03-21 22:53:41'),
(28, 'For Business', 'for-business', 'for-business_1742617375.jpg', 1, 'Yes', 185, '2025-02-20 03:32:27', '2025-03-21 22:52:55'),
(29, 'For Event', 'for-event', 'for-event_1742617358.jpg', 1, 'Yes', 185, '2025-02-20 03:38:31', '2025-03-21 22:52:38'),
(30, 'Under ₹4000', 'under-rs4000', 'under-rs4000_1742617442.jpg', 1, 'Yes', 185, '2025-02-20 03:39:41', '2025-03-21 22:54:02'),
(31, 'For Kids', 'for-kids', 'for-kids_1742617435.jpg', 1, 'Yes', 185, '2025-02-20 03:40:02', '2025-03-21 22:53:55'),
(32, 'Floro Sign', 'floro-sign', '32_Floro Sign.jpg', 1, 'Yes', 185, '2025-02-20 03:40:18', '2025-02-20 03:40:18'),
(35, 'Wooden Frame', 'wooden-frame', 'wooden-frame_1742450047.jpg', 1, 'Yes', 187, '2025-02-24 09:33:30', '2025-03-20 00:24:07'),
(42, 'Metal Frame', 'metal-frame', 'metal-frame_1742540859.jpg', 1, 'Yes', 187, '2025-03-21 01:37:42', '2025-03-21 01:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(201, '1736143887.jpg', '2025-01-06 00:41:27', '2025-01-06 00:41:27'),
(202, '1736143971.jpg', '2025-01-06 00:42:51', '2025-01-06 00:42:51'),
(203, '1736144037.jpg', '2025-01-06 00:43:57', '2025-01-06 00:43:57'),
(204, '1736144107.jpg', '2025-01-06 00:45:07', '2025-01-06 00:45:07'),
(205, '1736144227.jpg', '2025-01-06 00:47:07', '2025-01-06 00:47:07'),
(206, '1736144550.jpg', '2025-01-06 00:52:30', '2025-01-06 00:52:30'),
(207, '1736144578.jpg', '2025-01-06 00:52:58', '2025-01-06 00:52:58'),
(208, '1736144601.jpg', '2025-01-06 00:53:21', '2025-01-06 00:53:21'),
(209, '1736144811.jpg', '2025-01-06 00:56:51', '2025-01-06 00:56:51'),
(210, '1736144899.jpg', '2025-01-06 00:58:19', '2025-01-06 00:58:19'),
(211, '1736144931.jpg', '2025-01-06 00:58:51', '2025-01-06 00:58:51'),
(212, '1736145300.jpg', '2025-01-06 01:05:00', '2025-01-06 01:05:00'),
(213, '1736145344.jpg', '2025-01-06 01:05:44', '2025-01-06 01:05:44'),
(214, '1736145406.jpg', '2025-01-06 01:06:46', '2025-01-06 01:06:46'),
(215, '1736145716.jpg', '2025-01-06 01:11:56', '2025-01-06 01:11:56'),
(216, '1736145787.jpg', '2025-01-06 01:13:07', '2025-01-06 01:13:07'),
(217, '1736145877.jpg', '2025-01-06 01:14:37', '2025-01-06 01:14:37'),
(218, '1736146075.jpg', '2025-01-06 01:17:55', '2025-01-06 01:17:55'),
(219, '1736146213.jpg', '2025-01-06 01:20:13', '2025-01-06 01:20:13'),
(220, '1736146327.jpg', '2025-01-06 01:22:07', '2025-01-06 01:22:07'),
(221, '1736146327.jpg', '2025-01-06 01:22:07', '2025-01-06 01:22:07'),
(222, '1736146327.jpg', '2025-01-06 01:22:07', '2025-01-06 01:22:07'),
(223, '1736146328.jpg', '2025-01-06 01:22:08', '2025-01-06 01:22:08'),
(224, '1736320282.jpg', '2025-01-08 01:41:22', '2025-01-08 01:41:22'),
(225, '1736320340.jpg', '2025-01-08 01:42:20', '2025-01-08 01:42:20'),
(226, '1737978218.jpg', '2025-01-27 06:13:38', '2025-01-27 06:13:38'),
(227, '1737978326.jpg', '2025-01-27 06:15:26', '2025-01-27 06:15:26'),
(228, '1739460833.JPG', '2025-02-13 10:03:53', '2025-02-13 10:03:53'),
(229, '1739460925.JPG', '2025-02-13 10:05:25', '2025-02-13 10:05:25'),
(230, '1740041756.jpg', '2025-02-20 03:25:56', '2025-02-20 03:25:56'),
(231, '1740042139.jpg', '2025-02-20 03:32:19', '2025-02-20 03:32:19'),
(232, '1740042339.jpg', '2025-02-20 03:35:39', '2025-02-20 03:35:39'),
(233, '1740042510.jpg', '2025-02-20 03:38:30', '2025-02-20 03:38:30'),
(234, '1740042552.jpg', '2025-02-20 03:39:12', '2025-02-20 03:39:12'),
(235, '1740042600.webp', '2025-02-20 03:40:00', '2025-02-20 03:40:00'),
(236, '1740042617.jpg', '2025-02-20 03:40:17', '2025-02-20 03:40:17'),
(237, '1740044086.jpg', '2025-02-20 04:04:46', '2025-02-20 04:04:46'),
(238, '1740060596.jpg', '2025-02-20 08:39:56', '2025-02-20 08:39:56'),
(239, '1740060619.jpg', '2025-02-20 08:40:19', '2025-02-20 08:40:19'),
(240, '1740060648.jpg', '2025-02-20 08:40:48', '2025-02-20 08:40:48'),
(241, '1740406833.jpg', '2025-02-24 08:50:33', '2025-02-24 08:50:33'),
(242, '1740409407.webp', '2025-02-24 09:33:27', '2025-02-24 09:33:27'),
(243, '1740409516.jpg', '2025-02-24 09:35:16', '2025-02-24 09:35:16'),
(244, '1741761702.JPG', '2025-03-12 01:11:42', '2025-03-12 01:11:42'),
(245, '1741961225.JPG', '2025-03-14 08:37:05', '2025-03-14 08:37:05'),
(246, '1741962626.JPG', '2025-03-14 09:00:26', '2025-03-14 09:00:26'),
(247, '1741962731.JPG', '2025-03-14 09:02:11', '2025-03-14 09:02:11'),
(248, '1741962748.JPG', '2025-03-14 09:02:28', '2025-03-14 09:02:28'),
(249, '1741962823.JPG', '2025-03-14 09:03:43', '2025-03-14 09:03:43'),
(250, '1741962877.JPG', '2025-03-14 09:04:37', '2025-03-14 09:04:37'),
(251, '1741962902.JPG', '2025-03-14 09:05:02', '2025-03-14 09:05:02'),
(252, '1741962939.JPG', '2025-03-14 09:05:39', '2025-03-14 09:05:39'),
(253, '1741962986.JPG', '2025-03-14 09:06:26', '2025-03-14 09:06:26'),
(254, '1741962995.JPG', '2025-03-14 09:06:35', '2025-03-14 09:06:35'),
(255, '1741963279.JPG', '2025-03-14 09:11:19', '2025-03-14 09:11:19'),
(256, '1741963400.JPG', '2025-03-14 09:13:20', '2025-03-14 09:13:20'),
(257, '1741963494.JPG', '2025-03-14 09:14:54', '2025-03-14 09:14:54'),
(258, '1741963560.JPG', '2025-03-14 09:16:00', '2025-03-14 09:16:00'),
(259, '1741963710.JPG', '2025-03-14 09:18:30', '2025-03-14 09:18:30'),
(260, '1741963750.JPG', '2025-03-14 09:19:10', '2025-03-14 09:19:10'),
(261, '1741963767.JPG', '2025-03-14 09:19:27', '2025-03-14 09:19:27'),
(262, '1742274939.jpg', '2025-03-17 23:45:39', '2025-03-17 23:45:39'),
(263, '1742275083.jpg', '2025-03-17 23:48:03', '2025-03-17 23:48:03'),
(264, '1742275323.jpg', '2025-03-17 23:52:03', '2025-03-17 23:52:03'),
(265, '1742275328.jpg', '2025-03-17 23:52:08', '2025-03-17 23:52:08'),
(266, '1742275358.jpg', '2025-03-17 23:52:38', '2025-03-17 23:52:38'),
(267, '1742275381.jpeg', '2025-03-17 23:53:01', '2025-03-17 23:53:01'),
(268, '1742276196.jpeg', '2025-03-18 00:06:36', '2025-03-18 00:06:36'),
(269, '1742276292.jpg', '2025-03-18 00:08:12', '2025-03-18 00:08:12'),
(270, '1742276303.jpg', '2025-03-18 00:08:23', '2025-03-18 00:08:23'),
(271, '1742276352.jpeg', '2025-03-18 00:09:12', '2025-03-18 00:09:12'),
(272, '1742276837.jpg', '2025-03-18 00:17:17', '2025-03-18 00:17:17'),
(273, '1742276906.jpeg', '2025-03-18 00:18:26', '2025-03-18 00:18:26'),
(274, '1742277034.jpeg', '2025-03-18 00:20:34', '2025-03-18 00:20:34'),
(275, '1742277159.jpeg', '2025-03-18 00:22:39', '2025-03-18 00:22:39'),
(276, '1742277179.jpeg', '2025-03-18 00:22:59', '2025-03-18 00:22:59'),
(277, '1742277424.jpg', '2025-03-18 00:27:04', '2025-03-18 00:27:04'),
(278, '1742277543.jpg', '2025-03-18 00:29:03', '2025-03-18 00:29:03'),
(279, '1742277621.jpeg', '2025-03-18 00:30:21', '2025-03-18 00:30:21'),
(280, '1742277714.jpg', '2025-03-18 00:31:54', '2025-03-18 00:31:54'),
(281, '1742277914.jpg', '2025-03-18 00:35:14', '2025-03-18 00:35:14'),
(282, '1742278029.jpg', '2025-03-18 00:37:09', '2025-03-18 00:37:09'),
(283, '1742278378.jpeg', '2025-03-18 00:42:58', '2025-03-18 00:42:58'),
(284, '1742278538.jpeg', '2025-03-18 00:45:38', '2025-03-18 00:45:38'),
(285, '1742278560.jpg', '2025-03-18 00:46:00', '2025-03-18 00:46:00'),
(286, '1742278660.jpg', '2025-03-18 00:47:40', '2025-03-18 00:47:40'),
(287, '1742279158.jpeg', '2025-03-18 00:55:58', '2025-03-18 00:55:58'),
(288, '1742279177.jpeg', '2025-03-18 00:56:17', '2025-03-18 00:56:17'),
(289, '1742280199.jpg', '2025-03-18 01:13:19', '2025-03-18 01:13:19'),
(290, '1742280428.jpg', '2025-03-18 01:17:08', '2025-03-18 01:17:08'),
(291, '1742280487.jpg', '2025-03-18 01:18:07', '2025-03-18 01:18:07'),
(292, '1742280530.jpg', '2025-03-18 01:18:50', '2025-03-18 01:18:50'),
(293, '1742281767.jpg', '2025-03-18 01:39:27', '2025-03-18 01:39:27'),
(294, '1742282048.JPG', '2025-03-18 01:44:08', '2025-03-18 01:44:08'),
(295, '1742447420.jpg', '2025-03-19 23:40:20', '2025-03-19 23:40:20'),
(296, '1742447461.jpg', '2025-03-19 23:41:01', '2025-03-19 23:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Mukesh Bhavsar', 'mukeshbhavsar210@gmail.com', 2, NULL, '$2y$10$atts/65kfJw0YoA6jw3f2.U0XsNfRera0pwSXdTRmdlQHmvpAIHK2', NULL, '2023-12-19 07:11:37', '2023-12-19 07:11:37'),
(30, 'Dhruv', 'dhruvbhavsar210@gmail.com', 1, NULL, '$2y$10$dae3P.w7vD12DPUw3G9ydOKQ3PRuuxP3KRGIBnbfXnCNIA5uXtVAu', NULL, '2025-02-17 01:03:07', '2025-02-17 01:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(40, 30, 264, '2025-03-19 02:26:26', '2025-03-19 02:26:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`),
  ADD KEY `customer_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frame_borders`
--
ALTER TABLE `frame_borders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_frames`
--
ALTER TABLE `frame_frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_metals`
--
ALTER TABLE `frame_metals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_shapes`
--
ALTER TABLE `frame_shapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_sizes`
--
ALTER TABLE `frame_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_wraps`
--
ALTER TABLE `frame_wraps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_displays`
--
ALTER TABLE `hardware_displays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_finishings`
--
ALTER TABLE `hardware_finishings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_styles`
--
ALTER TABLE `hardware_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_edits`
--
ALTER TABLE `image_edits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laminations`
--
ALTER TABLE `laminations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modifications`
--
ALTER TABLE `modifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_razorpay_payment_id_unique` (`razorpay_payment_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_product_id_foreign` (`product_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frame_borders`
--
ALTER TABLE `frame_borders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frame_frames`
--
ALTER TABLE `frame_frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frame_metals`
--
ALTER TABLE `frame_metals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `frame_shapes`
--
ALTER TABLE `frame_shapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frame_sizes`
--
ALTER TABLE `frame_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `frame_wraps`
--
ALTER TABLE `frame_wraps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hardware_displays`
--
ALTER TABLE `hardware_displays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware_finishings`
--
ALTER TABLE `hardware_finishings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hardware_styles`
--
ALTER TABLE `hardware_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_edits`
--
ALTER TABLE `image_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laminations`
--
ALTER TABLE `laminations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `modifications`
--
ALTER TABLE `modifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
