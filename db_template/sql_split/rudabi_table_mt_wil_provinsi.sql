
-- --------------------------------------------------------

--
-- Table structure for table `mt_wil_provinsi`
--

DROP TABLE IF EXISTS `mt_wil_provinsi`;
CREATE TABLE `mt_wil_provinsi` (
  `id_provinsi` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_abbr` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_actived` int NOT NULL DEFAULT '1',
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mt_wil_provinsi`
--

INSERT INTO `mt_wil_provinsi` (`id_provinsi`, `nama`, `nama_abbr`, `is_actived`, `latitude`, `longitude`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
('11', 'ACEH', NULL, 1, 4.0432596, 94.403799, 1, NULL, 1, '2021-03-20 16:23:15', 0, '2021-03-16 15:57:12'),
('12', 'SUMATERA UTARA', NULL, 1, 1.8353858, 96.4965324, 1, NULL, 1, '2021-03-20 16:23:09', 1, '2021-03-17 17:55:39'),
('13', 'SUMATERA BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('14', 'RIAU', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('15', 'JAMBI', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('16', 'SUMATERA SELATAN', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('17', 'BENGKULU', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('18', 'LAMPUNG', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('19', 'KEPULAUAN BANGKA BELITUNG', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('21', 'KEPULAUAN RIAU', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('31', 'DKI JAKARTA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('32', 'JAWA BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('33', 'JAWA TENGAH', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('34', 'DAERAH ISTIMEWA YOGYAKARTA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('35', 'JAWA TIMUR', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('36', 'BANTEN', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('51', 'BALI', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('52', 'NUSA TENGGARA BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('53', 'NUSA TENGGARA TIMUR', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('61', 'KALIMANTAN BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('62', 'KALIMANTAN TENGAH', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('63', 'KALIMANTAN SELATAN', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('64', 'KALIMANTAN TIMUR', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('65', 'KALIMANTAN UTARA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('71', 'SULAWESI UTARA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('72', 'SULAWESI TENGAH', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('73', 'SULAWESI SELATAN', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('74', 'SULAWESI TENGGARA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('75', 'GORONTALO', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('76', 'SULAWESI BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('81', 'MALUKU', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('82', 'MALUKU UTARA', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('91', 'P A P U A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('92', 'PAPUA BARAT', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL);
