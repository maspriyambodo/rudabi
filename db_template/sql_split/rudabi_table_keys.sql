
-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `id` int UNSIGNED NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `re_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` tinyint DEFAULT '2',
  `ip_addresses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `browser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_trash` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `id_user`, `nama`, `password`, `email`, `re_password`, `key`, `level`, `ip_addresses`, `browser`, `platform`, `created`, `code`, `active`, `is_trash`) VALUES
(17, 1, 'bagus', '699e2547a7781f4775b10a3f0aae5b68', 'penulisblog16@gmail.com', 'hcabscbd', 'boba', 2, '::1', 'Chrome', 'Windows 10', '2020-10-14 05:57:10', 'd95TDPKLOfX2', '0', 1),
(37, 1, 'PRIYAMBODO', '21232f297a57a5a743894a0e4a801fc3', 'maspriyambodo@gmail.com', 'admin', 'GVKLsjt3iOUkaSDFxYXHzvNQJu0', 2, '117.102.89.226', 'Firefox', 'Linux', '2020-10-15 09:18:24', 'PdHzgTmGxflZ', '1', 1),
(43, 2, 'bshbdh', '94fe2251a744f24fc08e9422b3cd003c', 'batursamylas@gmail.com', 'fjndj9789', '5KHuAV2X9p6JRvZjhIYnxP3wSUy', 2, '117.102.89.226', 'Chrome', 'Windows 10', '2020-10-15 01:11:57', 'wCo1Wrlh3VRu', '1', 1),
(44, NULL, 'dian', '5f4dcc3b5aa765d61d8327deb882cf99', 'dianutmibandung@gmail.com', 'password', 'VyzGLX0ikdt8D9Mp1FfPqWcTCSE', 2, '10.1.99.8', 'Firefox', 'Linux', '2021-04-07 06:59:08', 'AfQvsS1LbUqw', '0', 1);
