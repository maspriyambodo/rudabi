
-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_group`
--

DROP TABLE IF EXISTS `sys_menu_group`;
CREATE TABLE `sys_menu_group` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_no` int DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_menu_group`
--

INSERT INTO `sys_menu_group` (`id`, `nama`, `description`, `order_no`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'Applications', 'default menu on system, menghapus grup ini akan membuat error pada system.\r\nmohon untuk tidak menghapus grup ini!', 1, 1, 1, '2021-03-06 00:00:24', 1, '2021-03-15 11:57:32', 0, '2021-03-15 11:25:53'),
(2, 'Report', 'default menu on system, menghapus grup ini akan membuat error pada system.\r\nmohon untuk tidak menghapus grup ini!', 2, 1, 1, '2021-03-06 00:01:41', 1, '2021-03-15 11:58:01', NULL, NULL),
(3, 'Systems', 'default menu on system, menghapus grup ini akan membuat error pada system.\r\nmohon untuk tidak menghapus grup ini!', 999, 1, 1, '2021-03-06 00:02:13', 1, '2021-03-15 11:57:52', NULL, NULL),
(4, 'Blog Post', 'This group menu is for blog type applications', 8, 0, 1, '2021-03-14 00:42:55', NULL, NULL, 0, '2021-03-15 12:12:47'),
(5, 'SEKRETARIAT', 'MENU GROUP FOR APPLICATION SEKRETARIAT', 3, 1, 1, '2021-03-21 04:10:09', NULL, NULL, NULL, NULL),
(6, 'URAIS & BINSYAR', 'Menu Group for application urais dan binsyar', 4, 1, 1, '2021-03-21 04:34:38', NULL, NULL, NULL, NULL),
(7, 'BINA KUA & KELUARGA SAKINAH', 'menu group for application bina kua and keluarga sakinah', 7, 1, 1, '2021-03-21 04:45:59', NULL, NULL, NULL, NULL),
(8, 'PENERANGAN AGAMA ISLAM', 'menu group for applications Penais', 5, 1, 1, '2021-03-21 04:46:42', NULL, NULL, NULL, NULL),
(9, 'PEMBERDAYAAN ZAKAT & WAKAF', 'menu group for applications Zakat & Wakaf', 6, 1, 1, '2021-03-21 04:47:13', NULL, NULL, NULL, NULL);
