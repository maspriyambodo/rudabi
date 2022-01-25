
-- --------------------------------------------------------

--
-- Table structure for table `sys_roles`
--

DROP TABLE IF EXISTS `sys_roles`;
CREATE TABLE `sys_roles` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '1' COMMENT '1. aktif 0. non-aktif',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_roles`
--

INSERT INTO `sys_roles` (`id`, `parent_id`, `name`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 0, 'Super User', 'Super administrators', 1, 1, '2021-02-25 02:27:34', 1, '2021-03-08 08:29:08', NULL, NULL),
(2, 0, 'Admin Pusat', 'Administrator Pusat', 1, 1, '2021-03-09 18:37:37', 1, '2021-03-20 18:15:58', NULL, NULL),
(3, 0, 'Operator Pusat', 'Operator Pusat', 1, 1, '2021-03-11 23:18:22', 1, '2021-03-20 18:16:12', NULL, NULL),
(4, 0, 'Operator Provinsi (Kanwil)', 'Admin Kanwil', 1, 1, '2021-03-20 18:16:24', NULL, NULL, NULL, NULL),
(5, 0, 'Operator Kabupaten (Kandepag)', 'Operator Kemenag', 1, 1, '2021-03-20 18:16:34', NULL, NULL, NULL, NULL),
(6, 0, 'Operator Kecamatan (KUA)', 'Operator KUA', 1, 1, '2021-03-20 18:16:44', NULL, NULL, NULL, NULL),
(7, 0, 'Auditor', 'Auditor', 1, 1, '2021-03-20 18:16:56', NULL, NULL, NULL, NULL),
(8, 0, 'KanwilDev', 'Admin Kanwil Dev', 1, 1, '2021-03-20 18:17:05', NULL, NULL, NULL, NULL),
(9, 0, 'PTSP SIMAS', 'Operator PTSP', 1, 1, '2021-03-20 18:17:26', NULL, NULL, NULL, NULL),
(10, 0, 'SEKRETARIAT', 'Sub Direktorat Sekertariat', 1, 1, '2021-03-20 18:17:36', NULL, NULL, NULL, NULL),
(11, 0, 'URUSAN AGAMA & BINSYAR', 'DIREKTORAT URUSAN AGAMA ISLAM DAN PEMBINAAN SYARIAH', 1, 1, '2021-03-20 18:17:46', NULL, NULL, NULL, NULL),
(12, 0, 'BINA KUA DAN KELUARGA SAKINAH', 'DIREKTORAT BINA KUA DAN KELUARGA SAKINAH', 1, 1, '2021-03-20 18:17:55', NULL, NULL, NULL, NULL),
(13, 0, 'PENERANGAN AGAMA ISLAM', 'DIREKTORAT PENERANGAN AGAMA ISLAM', 1, 1, '2021-03-20 18:18:08', NULL, NULL, NULL, NULL),
(14, 0, 'PEMBERDAYAAN ZAKAT & WAKAF', 'DIREKTORAT PEMBERDAYAAN ZAKAT DAN WAKAF', 1, 1, '2021-03-20 18:18:17', NULL, NULL, NULL, NULL);
