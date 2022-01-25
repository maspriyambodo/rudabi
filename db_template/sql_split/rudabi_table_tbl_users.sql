
-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id_user` int NOT NULL,
  `role_id` tinyint DEFAULT '2',
  `nama_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_trash` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `role_id`, `nama_user`, `username`, `password`, `created_at`, `updated_at`, `is_trash`) VALUES
(1, 1, 'Administrator', 'bagus', '0cc175b9c0f1b6a831c399e269772661', '2017-02-21 04:14:16', '2017-03-06 13:42:37', 1),
(2, 2, 'User', 'user', '0cc175b9c0f1b6a831c399e269772661', '2017-02-21 04:14:16', '2017-03-06 13:42:37', 1);
