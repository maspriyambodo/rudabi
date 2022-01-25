
-- --------------------------------------------------------

--
-- Table structure for table `dt_simkah_beta`
--

DROP TABLE IF EXISTS `dt_simkah_beta`;
CREATE TABLE `dt_simkah_beta` (
  `id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_simkah_beta`
--

INSERT INTO `dt_simkah_beta` (`id`, `provinsi`, `jumlah`) VALUES
('1', 'ACEH', '23922'),
('2', 'BALI', '1801'),
('3', 'BANTEN', '45029'),
('4', 'BENGKULU', '8246'),
('5', 'D.I. YOGYAKARTA', '13626'),
('6', 'DKI JAKARTA', '29572'),
('7', 'GORONTALO', '5715'),
('8', 'JAMBI', '15309'),
('9', 'JAWA BARAT', '216546'),
('10', 'JAWA TENGAH', '177748'),
('11', 'JAWA TIMUR', '149324'),
('12', 'KALIMANTAN BARAT', '14757'),
('13', 'KALIMANTAN SELATAN', '16030'),
('14', 'KALIMANTAN TENGAH', '8336'),
('15', 'KALIMANTAN TIMUR', '13972'),
('16', 'KALIMANTAN UTARA', '2060'),
('17', 'KEP. BANGKA BELITUNG', '5006'),
('18', 'KEPULAUAN RIAU', '6272'),
('19', 'LAMPUNG', '33111'),
('20', 'MALUKU', '1795'),
('21', 'MALUKU UTARA', '2241'),
('22', 'NUSA TENGGARA BARAT', '18769'),
('23', 'NUSA TENGGARA TIMUR', '1343'),
('24', 'PAPUA', '2158'),
('25', 'PAPUA BARAT', '1295'),
('26', 'RIAU', '25912'),
('27', 'SULAWESI BARAT', '4769'),
('28', 'SULAWESI SELATAN', '37796'),
('29', 'SULAWESI TENGAH', '9331'),
('30', 'SULAWESI TENGGARA', '10931'),
('31', 'SULAWESI UTARA', '3770'),
('32', 'SUMATERA BARAT', '28071'),
('33', 'SUMATERA SELATAN', '26862'),
('34', 'SUMATERA UTARA', '50889');
