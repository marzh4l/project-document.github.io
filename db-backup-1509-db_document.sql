DROP TABLE IF EXISTS akses;

CREATE TABLE `akses` (
  `id_akses` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `id_unit` int(2) NOT NULL,
  `level` varchar(20) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO akses VALUES("1","Fulan bin Fulan","admin","12345","978545332","1","Admin","avatar_v1.png"),
("2","Fulana, M.Kes","fulana","12345","123456789","2","User",""),
("3","Iqbal","Iqbal","123","124567854","2","User","avatar_v1.png"),
("4","Mr. w","uwe","12345","234987766","9","User",""),
("5","Mr T","mrt","123","12345999","12","user","");



DROP TABLE IF EXISTS aktivitas;

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(10) NOT NULL AUTO_INCREMENT,
  `aktivitas` text NOT NULL,
  `waktu` time NOT NULL,
  `id_log` int(5) NOT NULL,
  PRIMARY KEY (`id_aktivitas`)
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8mb4;

INSERT INTO aktivitas VALUES("1","Login","11:19:24","1"),
("2","Masuk menu Kategori","11:41:24","1"),
("3","Login","12:08:44","2"),
("4","Masuk menu Log Akses","12:08:46","2"),
("5","Masuk menu Log Akses","12:45:56","2"),
("6","Login","01:21:28","3"),
("7","Login","01:28:01","4"),
("8","Masuk menu Kategori","01:28:03","4"),
("9","Masuk menu Log Akses","01:28:06","4"),
("10","Masuk menu Log Akses","01:43:57","4"),
("11","Masuk menu Log Akses","01:44:23","4"),
("12","Masuk menu Log Akses","02:00:07","4"),
("13","Masuk menu Log Akses","02:02:22","4"),
("14","Masuk menu Log Akses","02:02:45","4"),
("15","Masuk menu Log Akses","02:04:29","4"),
("16","Masuk menu Log Akses","02:07:40","4"),
("17","Masuk menu Log Akses","02:09:24","4"),
("18","Masuk menu Log Akses","02:10:56","4"),
("19","Masuk menu Log Akses","02:11:29","4"),
("20","Masuk menu Log Akses","02:12:06","4"),
("21","Masuk menu Document","02:12:55","4"),
("22","Masuk menu Log Akses","02:13:08","4"),
("23","Masuk menu Log Akses","02:18:34","4"),
("24","Masuk menu Log Akses","02:18:54","4"),
("25","Masuk menu Log Akses","02:23:41","4"),
("26","Masuk menu Log Akses","02:24:59","4"),
("27","Masuk menu Log Akses","02:25:38","4"),
("28","Login","02:28:30","4"),
("29","Masuk menu Log Akses","02:28:44","4"),
("30","Login","02:30:46","5"),
("31","Masuk menu Log Akses","02:30:50","5"),
("32","Login","02:30:56","5"),
("33","Masuk menu Log Akses","02:30:59","5"),
("34","Masuk menu Kategori","02:32:26","5"),
("35","Masuk menu User","02:32:29","5"),
("36","Masuk menu Backup","02:32:30","5"),
("37","Login","02:32:32","5"),
("38","Login","02:32:37","5"),
("39","Masuk menu User","02:33:29","5"),
("40","Masuk menu User","02:33:58","5"),
("41","Masuk menu Log Akses","02:34:01","5"),
("42","Login","02:34:11","5"),
("43","Masuk menu Log Akses","02:34:13","5"),
("44","Masuk menu Backup","02:35:03","5"),
("45","Masuk menu Backup","02:35:08","5"),
("46","Masuk menu User","02:35:12","5"),
("47","Masuk menu Document","02:35:14","5"),
("48","Masuk menu Log Akses","02:36:41","4"),
("49","Masuk menu Log Akses","02:37:13","4"),
("50","Masuk menu Log Akses","02:43:23","4"),
("51","Masuk menu Log Akses","02:44:26","4"),
("52","Masuk menu Log Akses","02:45:03","4"),
("53","Masuk menu Log Akses","02:45:23","4"),
("54","Masuk menu Document","02:51:06","5"),
("55","Masuk menu Log Akses","02:51:09","5"),
("56","Masuk menu Log Akses","02:51:34","4"),
("57","Masuk menu User","02:58:18","4"),
("58","Masuk menu Kategori","02:58:22","4"),
("59","Masuk menu Kategori","03:15:28","4"),
("60","Masuk menu Backup","03:15:29","4"),
("61","Masuk menu Log Akses","03:15:31","4"),
("62","Masuk menu Log Akses","03:16:15","4"),
("63","Masuk menu Log Akses","03:16:49","4"),
("64","Masuk menu Kategori","07:57:53","4"),
("65","Masuk menu Log Akses","08:03:19","4"),
("66","Masuk menu Log Akses","08:04:09","4"),
("67","Masuk menu Log Akses","08:06:50","4"),
("68","Masuk menu Log Akses","08:06:51","4"),
("69","Masuk menu Log Akses","08:06:52","4"),
("70","Masuk menu Log Akses","08:08:53","4"),
("71","Masuk menu Log Akses","08:08:53","4"),
("72","Masuk menu Log Akses","08:10:06","4"),
("73","Masuk menu Log Akses","08:12:36","4"),
("74","Masuk menu Log Akses","08:14:58","4"),
("75","Masuk menu Log Akses","08:15:45","4"),
("76","Masuk menu User","08:16:06","4"),
("77","Masuk menu User","08:16:28","4"),
("78","Masuk menu Backup","08:16:42","4"),
("79","Masuk menu Log Akses","08:16:43","4"),
("80","Masuk menu Log Akses","08:18:24","4"),
("81","Masuk menu Log Akses","08:22:37","4"),
("82","Masuk menu Log Akses","08:23:38","4"),
("83","Masuk menu Log Akses","08:24:08","4"),
("84","Masuk menu Log Akses","08:26:54","4"),
("85","Masuk menu Log Akses","08:30:36","4"),
("86","Masuk menu Log Akses","08:34:44","4"),
("87","Masuk menu Log Akses","08:37:38","4"),
("88","Masuk menu Log Akses","08:38:48","4"),
("89","Masuk menu Log Akses","08:40:03","4"),
("90","Masuk menu Log Akses","08:40:31","4"),
("91","Masuk menu Log Akses","08:41:44","4"),
("92","Masuk menu Log Akses","08:42:55","4"),
("93","Masuk menu Log Akses","08:49:52","4"),
("94","Masuk menu Log Akses","08:56:25","4"),
("95","Masuk menu Log Akses","08:58:53","4"),
("96","Masuk menu Log Akses","09:18:57","4"),
("97","Masuk menu Log Akses","09:22:28","4"),
("98","Masuk menu Log Akses","09:22:58","4"),
("99","Masuk menu Log Akses","09:25:23","4"),
("100","Masuk menu Log Akses","09:26:12","4"),
("101","Masuk menu Log Akses","09:26:47","4"),
("102","Masuk menu Log Akses","09:27:42","4"),
("103","Masuk menu Log Akses","09:29:01","4"),
("104","Masuk menu Log Akses","09:32:29","4"),
("105","Masuk menu Log Akses","09:33:52","4"),
("106","Masuk menu Log Akses","09:34:21","4"),
("107","Masuk menu Log Akses","09:34:50","4"),
("108","Masuk menu Log Akses","09:35:05","4"),
("109","Masuk menu Log Akses","09:46:48","4"),
("110","Masuk menu Log Akses","09:47:29","4"),
("111","Masuk menu Log Akses","09:49:53","4"),
("112","Masuk menu Log Akses","09:56:46","4"),
("113","Masuk menu Log Akses","10:05:22","4"),
("114","Masuk menu Log Akses","10:06:25","4"),
("115","Masuk menu Log Akses","10:06:47","4"),
("116","Masuk menu Log Akses","10:07:31","4"),
("117","Masuk menu Log Akses","10:08:17","4"),
("118","Masuk menu Log Akses","10:42:32","4"),
("119","Masuk menu Log Akses","10:44:02","4"),
("120","Login","11:38:33","6"),
("121","Masuk menu Log Akses","11:38:40","6"),
("122","Masuk menu User","11:38:54","6"),
("123","Masuk menu User","11:39:23","4"),
("124","Masuk menu User","11:39:23","4"),
("125","Masuk menu User","11:40:25","6"),
("126","Masuk menu Document","11:40:45","6"),
("127","Login","11:41:05","6"),
("128","Masuk menu Document","11:41:20","6"),
("129","Login","11:42:21","7"),
("130","Masuk menu Log Akses","11:42:25","7"),
("131","Masuk menu User","11:43:22","4"),
("132","Masuk menu User","11:43:44","7"),
("133","Masuk menu User","11:43:56","7"),
("134","Masuk menu Document","11:44:10","7"),
("135","Masuk menu Log Akses","11:44:15","7"),
("136","Masuk menu User","11:45:00","7"),
("137","Masuk menu Document","11:45:02","7"),
("138","Masuk menu User","11:45:54","4"),
("139","Masuk menu User","11:47:04","4"),
("140","Masuk menu User","11:47:30","7"),
("141","Masuk menu User","11:47:41","7"),
("142","Masuk menu User","11:48:30","7"),
("143","Masuk menu Document","11:48:35","7"),
("144","Masuk menu User","11:48:36","7"),
("145","Login","11:50:48","4"),
("146","Login","11:50:52","8"),
("147","Masuk menu User","11:51:26","4"),
("148","Masuk menu Log Akses","11:51:26","4"),
("149","Masuk menu User","11:51:44","4"),
("150","Login","11:51:44","4"),
("151","Masuk menu Log Akses","11:51:48","4"),
("152","Login","11:51:53","4"),
("153","Masuk menu Document","11:51:56","4"),
("154","Masuk menu User","11:52:00","4"),
("155","Login","11:53:50","9"),
("156","Login","11:53:52","9"),
("157","Masuk menu Log Akses","11:53:58","9"),
("158","Masuk menu Log Akses","11:56:35","9"),
("159","login","11:56:36","9"),
("160","login","11:56:39","9"),
("161","login","11:56:40","9"),
("162","Masuk menu Log Akses","11:56:43","9"),
("163","Masuk menu Log Akses","11:56:43","9"),
("164","Masuk menu Home","12:01:16","9"),
("165","Masuk menu Log Akses","12:01:20","9"),
("166","Masuk menu User","12:01:32","9"),
("167","Masuk menu User","12:02:31","9"),
("168","Masuk menu User","12:02:59","9"),
("169","Masuk menu User","12:03:19","9"),
("170","Masuk menu User","01:07:45","9"),
("171","Masuk menu User","01:09:33","9"),
("172","Masuk menu User","01:13:21","9"),
("173","Masuk menu User","01:20:06","9"),
("174","Masuk menu User","01:22:03","9"),
("175","Masuk menu User","01:23:20","9"),
("176","Masuk menu User","01:24:39","9"),
("177","Masuk menu User","01:25:40","9"),
("178","Masuk menu User","01:31:34","9"),
("179","Masuk menu User","01:33:40","9"),
("180","Masuk menu User","01:43:56","9"),
("181","Masuk menu User","01:44:50","9"),
("182","Masuk menu User","01:45:32","9"),
("183","Masuk menu User","01:46:35","9"),
("184","Masuk menu Backup","01:47:53","9"),
("185","Masuk menu Document","01:54:50","8"),
("186","Masuk menu Log Akses","01:54:57","8"),
("187","Masuk menu Backup","02:07:28","9"),
("188","Masuk menu User","02:07:28","9"),
("189","Masuk menu Backup","02:07:32","9"),
("190","Backup Databse","02:08:33","9"),
("191","Masuk menu Backup","02:08:33","9"),
("192","Masuk menu Log Akses","02:08:37","9"),
("193","Masuk menu Backup","02:15:03","9"),
("194","Backup Database","02:15:56","9"),
("195","Masuk menu Backup","02:15:56","9"),
("196","Backup Database","02:15:56","9"),
("197","Masuk menu Backup","02:15:56","9"),
("199","Masuk menu Backup","02:27:42","9"),
("200","Masuk menu Backup","02:27:45","9"),
("201","Masuk menu Backup","02:35:45","9"),
("202","Masuk menu Backup","02:35:45","9"),
("203","Masuk menu Backup","02:35:48","9"),
("204","Masuk menu Backup","02:36:35","9"),
("205","Masuk menu Log Akses","14:36:50","9"),
("206","Masuk menu User","02:36:52","9"),
("207","Masuk menu Backup","02:36:53","9"),
("208","Masuk menu Backup","02:37:34","9"),
("209","Backup Database","14:39:02","9"),
("210","Masuk menu Backup","02:39:02","9"),
("211","Masuk menu Backup","02:39:04","9"),
("212","Masuk menu Backup","02:39:04","9"),
("213","Backup Database","14:39:36","9"),
("214","Backup Database","14:39:36","9"),
("215","Masuk menu Backup","02:39:36","9"),
("216","Masuk menu Log Akses","14:40:27","9"),
("217","Masuk menu Home","02:40:46","10"),
("218","Masuk menu User","02:40:51","10"),
("219","Masuk menu User","02:43:01","10"),
("220","Masuk menu User","08:00:06","10"),
("221","Masuk menu Home","08:05:04","12"),
("222","Masuk menu User","08:05:36","12"),
("223","Masuk menu User","08:08:58","12"),
("224","Masuk menu User","02:20:33","12"),
("225","Masuk menu User","02:21:40","12"),
("226","Masuk menu User","02:24:31","12"),
("227","Masuk menu User","02:26:23","12"),
("228","Masuk menu User","02:26:57","12"),
("229","Masuk menu User","02:39:14","12"),
("230","Masuk menu User","02:39:46","12"),
("231","Masuk menu User","02:40:26","12"),
("232","Masuk menu User","02:41:23","12"),
("233","Masuk menu User","02:46:28","12"),
("234","Masuk menu User","02:48:16","12"),
("235","Masuk menu User","02:49:47","12"),
("236","Masuk menu User","02:51:35","12"),
("237","Masuk menu User","02:52:11","12"),
("238","Masuk menu User","03:01:53","12"),
("239","Masuk menu User","03:06:46","12"),
("240","Masuk menu User","03:11:49","12"),
("241","Masuk menu User","03:15:34","12"),
("242","Masuk menu User","03:16:09","12"),
("243","Masuk menu User","03:17:01","12"),
("244","Masuk menu User","03:19:34","12"),
("245","Masuk menu User","03:20:06","12"),
("246","Masuk menu User","03:21:37","12"),
("247","Masuk menu User","03:22:16","12"),
("248","Masuk menu User","03:23:50","12"),
("249","Masuk menu User","03:25:12","12"),
("250","Masuk menu User","03:25:58","12"),
("251","Masuk menu User","03:26:31","12"),
("252","Masuk menu User","03:26:54","12"),
("253","Masuk menu User","03:27:36","12"),
("254","Masuk menu User","03:27:48","12"),
("255","Masuk menu User","03:28:22","12"),
("256","Masuk menu User","03:36:17","12"),
("257","Input Data UserPak apa","15:36:56","0"),
("258","Masuk menu User","03:36:56","12"),
("259","Masuk menu Log Akses","15:37:00","12"),
("260","Masuk menu User","15:38:34","12"),
("261","Masuk menu User","15:38:39","12"),
("262","Masuk menu User","08:21:59","12"),
("263","Masuk menu User","08:22:00","12"),
("264","Masuk menu Home","08:22:37","14"),
("265","Masuk menu User","08:23:02","14"),
("266","Input Data User apa","08:29:52","0"),
("267","Masuk menu User","08:29:53","14"),
("268","Masuk menu User","08:29:54","14"),
("269","Masuk menu User","08:29:56","14"),
("271","Masuk menu User","08:30:24","14"),
("272","Masuk menu User","08:31:59","14"),
("273","Masuk menu User","08:32:00","14"),
("274","Masuk menu User","08:35:35","14"),
("275","Masuk menu User","08:36:42","14"),
("276","Masuk menu User","08:36:44","14"),
("277","Input Data User Mr. Puskom","08:37:27","14"),
("278","Masuk menu User","08:37:27","14"),
("279","Masuk menu Log Akses","08:38:08","14"),
("280","Masuk menu Kategori","08:52:21","14"),
("281","Input Data Kategori SK Adalah","09:01:22","14"),
("282","Masuk menu Kategori","09:01:22","14"),
("283","Input Data Kategori gagal kare","09:02:31","14"),
("284","Masuk menu Kategori","09:02:31","14"),
("285","Input Data Kategori gagal karena data SK Adalah suda ada","09:02:31","14"),
("286","Masuk menu Kategori","09:02:31","14"),
("287","Masuk menu Unit","09:06:16","14"),
("288","Masuk menu Kategori","10:10:27","14"),
("289","Masuk menu Kategori","10:33:01","14"),
("290","Masuk menu Kategori","10:37:47","14"),
("291","Masuk menu Kategori","10:37:53","14"),
("292","Masuk menu Kategori","10:37:53","14"),
("293","Masuk menu Kategori","10:37:53","14"),
("294","Masuk menu Kategori","10:49:38","14"),
("295","Masuk menu Kategori","10:49:42","14"),
("296","Masuk menu Kategori","10:49:55","14"),
("297","Masuk menu Kategori","10:50:26","14"),
("298","Masuk menu Kategori","10:56:09","14"),
("299","Masuk menu Kategori","10:56:41","14"),
("300","Masuk menu Kategori","13:51:06","14"),
("301","Masuk menu Unit","13:51:06","14"),
("302","Masuk menu Kategori","13:51:13","14"),
("303","Input Data Kategori SK contoh 1","13:51:46","14"),
("304","Input Data Kategori gagal karena data SK contoh 1sudah ada","13:51:46","14"),
("305","Masuk menu Kategori","13:51:46","14"),
("306","Masuk menu Kategori","13:51:46","14"),
("307","Input Data Kategori SK contoh 2","13:52:13","14"),
("308","Masuk menu Kategori","13:52:14","14"),
("309","Hapus Data Kategori SK contoh 1, SK contoh 2","13:52:25","14"),
("310","Masuk menu Kategori","13:52:25","14"),
("311","Hapus Data Kategori SK Adalah","13:53:00","14"),
("312","Masuk menu Kategori","13:53:00","14"),
("313","Masuk menu Home","13:57:14","15"),
("314","Masuk menu Log Akses","13:57:17","15"),
("315","Masuk menu Unit","13:59:45","15"),
("316","Input Data Unit unit1","14:00:17","15"),
("317","Input Data Unit unit1","14:00:18","15"),
("318","Masuk menu Unit","14:00:18","15"),
("321","Input Data Unit unit1","14:04:29","15"),
("322","Masuk menu Unit","14:04:29","15"),
("323","Hapus Data Unit unit1","14:04:50","15"),
("324","Masuk menu Unit","14:04:50","15"),
("325","Masuk menu Kategori","14:07:33","15"),
("326","Input Data Kategori contoh1","14:07:53","15"),
("327","Masuk menu Kategori","14:07:53","15"),
("328","Hapus Data Kategori contoh1","14:08:03","15"),
("329","Masuk menu Kategori","14:08:03","15"),
("330","Masuk menu Unit","14:08:20","15"),
("331","Input Data Unit unit1","14:08:41","15"),
("332","Masuk menu Unit","14:08:41","15"),
("333","Hapus Data Unit unit1","14:08:54","15"),
("334","Masuk menu Unit","14:08:54","15"),
("335","Input Data Unit unit1","14:11:11","15"),
("336","Masuk menu Unit","14:11:11","15"),
("337","Hapus Data Unit unit1","14:11:23","15"),
("338","Masuk menu Unit","14:11:23","15"),
("339","Masuk menu User","14:14:01","15"),
("340","Hapus Data Akses User apa, Mr. Puskom","14:18:12","0"),
("341","Hapus Data Unit , ","14:18:12","0"),
("342","Masuk menu User","14:18:12","15"),
("343","Masuk menu Document","14:19:44","15"),
("344","Masuk menu Document","14:45:12","15"),
("345","Masuk menu Document","14:45:14","15"),
("347","Input Data document No. Surat 20/C1/123/456/0101/2022","14:49:51","15"),
("348","Masuk menu Document","14:49:51","15"),
("349","Masuk menu Backup","03:09:15","15");



DROP TABLE IF EXISTS documen;

CREATE TABLE `documen` (
  `id_document` int(4) NOT NULL AUTO_INCREMENT,
  `nm_document` varchar(50) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_akses` int(2) NOT NULL,
  `id_unit` int(2) NOT NULL,
  `tanggal_document` date NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `status` varchar(3) NOT NULL,
  `file_pdf` varchar(30) NOT NULL,
  `penandatangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO documen VALUES("1","D1","01/D1/123/456/0906/2020","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Wikipedia","1","1","1","2022-04-14","2022-04-15 09:00:00","OFF","file1.pdf","Fulan S.Kom"),
("2","D1 v1","","PHP: Hypertext Preprocessor atau hanya PHP saja, adalah bahasa skrip dengan fungsi umum yang terutama digunakan untuk pengembangan web. Bahasa ini awalnya dibuat oleh seorang pemrogram Denmark-Kanada Rasmus Lerdorf pada tahun 1994. Implementasi referensi PHP sekarang diproduksi oleh The PHP Group","1","1","1","2022-04-15","2022-04-07 11:11:00","OFF","file_D1v1.pdf","Fulan2 S.Kom"),
("3","D3","","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen pada sebuah halaman ","2","1","2","2022-05-05","2022-05-05 12:12:00","ON","file_D3.pdf","Fulan S.Kom"),
("4","D4","","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, ","1","1","1","2022-05-06","2022-05-05 13:13:00","ON","file_D4.pdf","Fulan2 S.Kom"),
("5","Surat 1","","Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak ","2","1","2","2022-05-07","2022-05-04 14:14:00","ON","file_Surat 1.pdf","Fulan2 S.Kom"),
("6","Surat Pembekuan","01/SP/1223/3221/0819/2022","ini hanya contoh surat saja","1","3","2","2022-05-10","2022-05-10 08:30:00","ON","file_Surat Pembekuan.pdf","Mr. X M.Kom"),
("7","Surat Pembekuan","02/SP2/1223/3221/0835/2022","ini contoh surat saja","1","3","2","2022-05-10","2022-05-10 08:47:46","ON","file_Surat Pembekuan.pdf","Mr. X M.Kom"),
("8","Surat Kesehatan","01/SK/1223/3221/1006/2022","ini contoh surat saja","1","4","12","2022-05-10","2022-05-10 10:07:16","ON","file_Surat Kesehatan.pdf","Mrs. X M.Kes"),
("9","Surat Kesehatan2","01/SK2/1223/3221/1036/2022","ini contoh surat saja","3","4","12","2022-05-10","2022-05-10 10:37:37","ON","file_Surat Kesehatan2.pdf","Mrs. X M.Kes"),
("10","Surat Kesehatan2","01/SK2/1223/3221/1036/2022","ini contoh surat saja","3","4","12","2022-05-10","2022-05-10 10:37:37","ON","file_Surat Kesehatan2.pdf","Mrs. X M.Kes"),
("11","contoh1","20/C1/123/456/0101/2022","hanya contoh deskripsi saja ","3","1","11","2022-05-19","2022-05-21 14:49:51","ON","file_contoh1.pdf","Mr. X M.Kom");



DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO kategori VALUES("1","SK","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Wikipedia"),
("2","SK 2","Proident ut veniam nulla fugiat irure mollit duis sint occaecat dolore sit ex fugiat. Et tempor culpa exercitation in dolore ipsum consequat culpa Lorem excepteur nostrud eiusmod. Elit veniam tempor velit et incididunt. In eiusmod tempor tempor incididunt consequat labore do ut. Duis et sit ut mollit Lorem. Est do occaecat mollit esse irure ea aute ut nulla culpa.
("3","SK Dekan Hukum","Perubahan Ketua Kelompok Keahlian/Keilmuan (KK) di Lingkungan Fakultas Matematika dan Ilmu Pengetahuan Alam Institut Teknologi Bandung Periode 2018-2023");



DROP TABLE IF EXISTS log_akses;

CREATE TABLE `log_akses` (
  `id_log` int(5) NOT NULL AUTO_INCREMENT,
  `id_akses` int(2) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `sistem_operasi` varchar(30) NOT NULL,
  `browser` varchar(20) NOT NULL,
  `device` varchar(10) NOT NULL,
  `nama_computer` varchar(30) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO log_akses VALUES("1","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-18 11:19:23","2022-05-18 11:42:00"),
("2","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-18 12:08:44","2022-05-18 13:18:00"),
("3","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-18 13:21:28","2022-05-18 13:26:00"),
("4","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-18 13:28:00","2022-05-19 11:53:44"),
("5","1","192.168.9.3","Windows 7","Chrome","Computer","MASTER-PC","2022-05-18 14:30:46","0000-00-00 00:00:00"),
("6","1","192.168.9.3","Windows 7","Chrome","Computer","MASTER-PC","2022-05-19 11:38:33","2022-05-19 11:41:55"),
("7","1","192.168.9.3","Windows 7","Chrome","Computer","MASTER-PC","2022-05-19 11:42:21","2022-05-19 11:48:55"),
("8","1","192.168.9.3","Windows 7","Chrome","Computer","MASTER-PC","2022-05-19 11:50:51","0000-00-00 00:00:00"),
("9","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-19 11:53:50","2022-05-19 14:40:40"),
("10","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-19 14:40:46","2022-05-20 08:02:49"),
("11","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-19 14:40:46","0000-00-00 00:00:00"),
("12","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-20 08:05:03","2022-05-21 08:22:06"),
("13","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-21 08:22:35","0000-00-00 00:00:00"),
("14","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-21 08:22:36","2022-05-21 13:57:03"),
("15","1","127.0.0.1","Windows 10","Opera","Computer","DESKTOP-1J23KI2","2022-05-21 13:57:14","0000-00-00 00:00:00");



DROP TABLE IF EXISTS unit;

CREATE TABLE `unit` (
  `id_unit` int(2) NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  `pejabat` varchar(50) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO unit VALUES("1","Puskom","Fulan, M.Kom","111115555"),
("2","BAUK","Fulana, M.Kes","123456789"),
("7","BAAK","Mr Q","222225555"),
("8","Fakultas Kesehatan","Mr. x","33334444"),
("9","Fakultas Kebidanan dan Keperawatan","Mr. w","234987766"),
("10","Fakultas Farmasi","Mr. Y","444445555"),
("11","Fakultas Hukum","Mr. S","6666655555"),
("12","Fakultas Ekonomi","Mr T","12345999"),
("13","Pascasarjana","Mr g","666666666"),
("14","LPM","Mr we",""),
("15","LPPM","Mr Sa","");


