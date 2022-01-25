
-- --------------------------------------------------------

--
-- Table structure for table `dt_simkah`
--

DROP TABLE IF EXISTS `dt_simkah`;
CREATE TABLE `dt_simkah` (
  `id` int NOT NULL,
  `provinsi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_simkah`
--

INSERT INTO `dt_simkah` (`id`, `provinsi`, `jumlah`) VALUES
(1, 'ACEH', '29803'),
(2, 'BALI', '2203'),
(3, 'BANTEN', '55024'),
(4, 'BENGKULU', '10493'),
(5, 'D.I. YOGYAKARTA', '16626'),
(6, 'DKI JAKARTA', '36356'),
(7, 'GORONTALO', '7460'),
(8, 'JAMBI', '18947'),
(9, 'JAWA BARAT', '262356'),
(10, 'JAWA TENGAH', '211703'),
(11, 'JAWA TIMUR', '178462'),
(12, 'KALIMANTAN BARAT', '17877'),
(13, 'KALIMANTAN SELATAN', '19991'),
(14, 'KALIMANTAN TENGAH', '10384'),
(15, 'KALIMANTAN TIMUR', '17220'),
(16, 'KALIMANTAN UTARA', '2515'),
(17, 'KEP. BANGKA BELITUNG', '6497'),
(18, 'KEPULAUAN RIAU', '7892'),
(19, 'LAMPUNG', '41665'),
(20, 'MALUKU', '2207'),
(21, 'MALUKU UTARA', '2811'),
(22, 'NUSA TENGGARA BARAT', '24597'),
(23, 'NUSA TENGGARA TIMUR', '1843'),
(24, 'PAPUA', '2611'),
(25, 'PAPUA BARAT', '1603'),
(26, 'RIAU', '32074'),
(27, 'SULAWESI BARAT', '6032'),
(28, 'SULAWESI SELATAN', '48619'),
(29, 'SULAWESI TENGAH', '11621'),
(30, 'SULAWESI TENGGARA', '13577'),
(31, 'SULAWESI UTARA', '4765'),
(32, 'SUMATERA BARAT', '33897'),
(33, 'SUMATERA SELATAN', '34215'),
(34, 'SUMATERA UTARA', '62348');
