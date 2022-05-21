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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO akses VALUES("1","Fulan bin Fulan","admin","12345","978545332","1","Admin","avatar_v1.png"),
("6","Fulana","fulana","12345","123456789","2","User",""),
("8","Iqbal","Iqbal","123","124567854","2","User","avatar_v1.png");



DROP TABLE IF EXISTS documen;

CREATE TABLE `documen` (
  `id_document` int(2) NOT NULL AUTO_INCREMENT,
  `nm_document` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_akses` int(2) NOT NULL,
  `id_unit` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(3) NOT NULL,
  `file_pdf` varchar(30) NOT NULL,
  `penandatangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO documen VALUES("2","D1","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Wikipedia","2","1","1","2022-04-15","OFF","file1.pdf","Fulan S.Kom"),
("5","D1 v1","PHP: Hypertext Preprocessor atau hanya PHP saja, adalah bahasa skrip dengan fungsi umum yang terutama digunakan untuk pengembangan web. Bahasa ini awalnya dibuat oleh seorang pemrogram Denmark-Kanada Rasmus Lerdorf pada tahun 1994. Implementasi referensi PHP sekarang diproduksi oleh The PHP Group","2","1","1","2022-04-07","OFF","file_D1v1.pdf","Fulan2 S.Kom"),
("6","D3","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen pada sebuah halaman ","2","1","2","2022-05-05","ON","file_D3.pdf","Fulan S.Kom"),
("7","D4","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, ","2","1","1","2022-05-05","ON","file_D4.pdf","Fulan2 S.Kom"),
("11","Surat 1","Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak ","4","1","2","2022-05-04","ON","file_Surat 1.pdf","Fulan2 S.Kom");



DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO kategori VALUES("2","SK","Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Wikipedia"),
("4","SK 2","Proident ut veniam nulla fugiat irure mollit duis sint occaecat dolore sit ex fugiat. Et tempor culpa exercitation in dolore ipsum consequat culpa Lorem excepteur nostrud eiusmod. Elit veniam tempor velit et incididunt. In eiusmod tempor tempor incididunt consequat labore do ut. Duis et sit ut mollit Lorem. Est do occaecat mollit esse irure ea aute ut nulla culpa.\n\nQui voluptate esse ut ad laboris culpa. Labore ullamco ipsum est qui velit ipsum do id esse ut. Id officia ad in et cillum commodo ad tempor. Velit reprehenderit voluptate laborum dolor id mollit esse adipisicing ut culpa aliqua dolore eu. Laborum aute dolore cillum dolore est labore duis est. Incididunt dolor consequat ullamco ad veniam consequat.\n\nDo fugiat cupidatat id ex irure commodo sint et cupidatat ad reprehenderit irure anim ullamco. Magna adipisicing nisi excepteur et minim. Sint amet anim elit nostrud reprehenderit deserunt cupidatat commodo fugiat sit do."),
("8","SK Dekan Hukum","Perubahan Ketua Kelompok Keahlian/Keilmuan (KK) di Lingkungan Fakultas Matematika dan Ilmu Pengetahuan Alam Institut Teknologi Bandung Periode 2018-2023");



DROP TABLE IF EXISTS unit;

CREATE TABLE `unit` (
  `id_unit` int(2) NOT NULL AUTO_INCREMENT,
  `unit` varchar(30) NOT NULL,
  `pejabat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO unit VALUES("1","Puskom","Fulan, M.Kom"),
("2","BAUK","Fulana, M.Kes");



