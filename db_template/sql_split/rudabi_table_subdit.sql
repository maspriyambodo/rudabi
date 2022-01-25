
-- --------------------------------------------------------

--
-- Table structure for table `subdit`
--

DROP TABLE IF EXISTS `subdit`;
CREATE TABLE `subdit` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT '1970-01-01 00:00:00',
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT '1970-01-01 00:00:00',
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `subdit`
--

INSERT INTO `subdit` (`id`, `nama`, `keterangan`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'SUPER ADMIN', '', 1, 1, '2020-07-29 09:53:52', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(2, 'Admin Pusat', 'Administrator Pusat', 1, 1, '2021-03-18 15:28:55', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(3, 'Operator Pusat', 'Operator Pusat', 1, 1, '2021-03-18 15:29:06', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(4, 'Operator Provinsi (Kanwil)', 'Admin Kanwil', 1, 1, '2021-03-18 15:29:15', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(5, 'Operator Kabupaten (Kandepag)', 'Operator Kemenag', 1, 1, '2021-03-18 15:29:23', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(6, 'Operator Kecamatan (KUA)', 'Operator KUA', 1, 1, '2021-03-18 15:29:32', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(7, 'Auditor', 'Auditor', 1, 1, '2021-03-18 15:29:39', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(8, 'KanwilDev', 'Admin Kanwil Dev', 1, 1, '2021-03-18 15:29:48', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(9, 'PTSP SIMAS', 'Operator PTSP', 1, 1, '2021-03-18 15:29:58', 0, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(10, 'SEKRETARIAT', 'Sub Direktorat Sekertariat', 1, 1, '1970-01-01 00:00:00', 1, '2021-03-17 11:06:52', NULL, '2020-07-29 14:16:20'),
(11, 'URUSAN AGAMA & BINSYAR', 'DIREKTORAT URUSAN AGAMA ISLAM DAN PEMBINAAN SYARIAH', 1, NULL, '2020-07-29 14:17:24', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(12, 'BINA KUA DAN KELUARGA SAKINAH', 'DIREKTORAT BINA KUA DAN KELUARGA SAKINAH', 1, NULL, '2020-07-29 14:17:52', NULL, '1970-01-01 00:00:00', NULL, '2020-07-29 15:45:54'),
(13, 'PENERANGAN AGAMA ISLAM', 'DIREKTORAT PENERANGAN AGAMA ISLAM', 1, NULL, '2020-07-29 14:18:15', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(14, 'PEMBERDAYAAN ZAKAT & WAKAF', 'DIREKTORAT PEMBERDAYAAN ZAKAT DAN WAKAF', 1, NULL, '2020-07-29 14:18:32', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00');
