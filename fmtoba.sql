-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2023 pada 15.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pangeran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` INT(11) NOT NULL,
  `nama_kategori` VARCHAR(100) NOT NULL,
  `gambar_kategori` VARCHAR(200) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(2, 'Oleh-Oleh khas Toba', '1686019783_oleh-oleh.jpg'),
(3, 'Makanan', '1686019790_makanan.jpg'),
(24, 'Kaos', '1686281369_TobaAwesome.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` INT(11) NOT NULL,
  `kategori_id` INT(11) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `harga` DOUBLE NOT NULL,
  `foto` TEXT DEFAULT NULL,
  `detail` TEXT DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`) VALUES
(23, 2, 'Tipa Cookies', 40000, '1686020135_tipa cookies.jpg', 'Cookies renyah dengan penambahan Tipa tipa khas Toba dan choco chip adalah kue kering yang memiliki tekstur renyah dan tidak mudah hancur seperti kue-kue kering pada umumnya. Terbuat dari bahan dasar tepung terigu, gula halus, telur ayam, vanili, margarin, tepung maizena, baking powder, dan susu bubuk instant, cookies ini memiliki rasa yang nikmat dan menggoda. Keunikan cookies ini terletak pada penambahan Tipa tipa khas Toba, memberikan sentuhan aroma yang khas dan sedikit kelezatan. Selain itu, choco chip yang meleleh di dalam setiap gigitan menambah kelezatan dan kepuasan bagi pencinta cokelat. Cookies ini cocok dinikmati sebagai camilan di waktu santai atau sebagai hadiah spesial bagi orang terdekat.'),
(24, 2, 'Tipa-tipa', 30000, '1686019369_tipa-tipa.jpg', 'Tipa-tipa adalah makanan ringan khas Batak yang berasal dari Porsea, Toba Samosir, Sumatra Utara. Bentuknya agak keras dan berasal dari beras atau padi muda yang dipilih khusus untuk membuat tipa-tipa. Makanan ringan ini juga dikenal dengan nama emping padi atau sereal khas orang Batak. Tipa-tipa dulunya dibat ketika menjelang musim panen yang dimaksudkan untuk menandai musim panen tiba.'),
(26, 2, 'Sasagun', 25000, '1686019385_sasagun.jpg', 'Sasagun adalah makanan ringan tradisional khas Batak yang terbuat dari tepung beras yang digongseng bersama kelapa dan dicampur dengan gula merah/aren. Makanan ini memiliki tekstur yang lembut dan gurih dengan sentuhan manis dari gula merah/aren. Proses penggongsengan tepung beras dengan kelapa memberikan aroma khas yang menggugah selera. Sasagun sering dijadikan camilan atau hidangan penutup yang nikmat. Rasakan kelezatan tradisional Sasagun dan nikmati perpaduan sempurna antara rasa gurih dan manis dalam setiap gigitannya.'),
(27, 2, 'Sambal Fil-Fil Andaliman', 30000, '1686019434_sambal-fil-fil.jpg', 'Sambal Fil-Fil Andaliman merupakan sambal khas yang berasal dari Sumatera Utara, khususnya suku Batak. Sambal ini menggunakan cabai hijau dan cabai andaliman sebagai bahan utamanya. Cabai hijau memberikan tingkat kepedasan yang tinggi, sementara cabai andaliman memberikan aroma segar dan sedikit kesemutan yang khas. Sambal Fil-Fil Andaliman cocok untuk mereka yang menyukai sensasi pedas dengan sentuhan rempah yang unik'),
(28, 2, 'Sambal Teman ', 30000, '1686019453_sambal teman.jpg', 'Sambal teri dan andaliman adalah hidangan Indonesia yang terkenal dengan kepedasannya dan aroma khasnya. Sambal ini dibuat dengan menggunakan teri, ikan kecil yang diolah menjadi bumbu yang gurih, dan andaliman, sebuah rempah khas dari Indonesia yang memberikan rasa segar dan sedikit kecut. Kombinasi pedas dari teri dan aroma unik dari andaliman menciptakan sensasi yang membangkitkan selera. Sambal teri dan andaliman sering disajikan sebagai tambahan pada hidangan utama, seperti nasi goreng, mi goreng, atau sebagai pelengkap untuk makanan pembuka. Rasanya yang kaya dan pedas membuatnya menjadi pilihan yang populer bagi pecinta makanan pedas di Indonesia.'),
(30, 2, 'Kacang Toba (Toples)', 40000, '1686019576_kacang.jpg', 'Kacang Toba (Toples) adalah kacang Toba yang memiliki rasa gurih dan enak. Kacang Toba ini terkenal karena kualitasnya yang terjamin dan cita rasanya yang memikat. Setiap biji kacang Toba dipanggang dengan sempurna untuk menghasilkan tekstur yang renyah dan kelezatan yang khas. Dengan kemasan dalam toples, kacang ini tetap segar dan mudah disimpan. Nikmati kelezatan kacang Toba dalam Kacang Toples yang akan memenuhi keinginan Anda untuk camilan yang lezat dan memuaskan.'),
(31, 2, 'Kacang Toba (Plastik)', 25000, '1686472436_kacangtobaplastik.jpg', 'Kacang Toba Kemasan Plastik adalah varian kacang Toba yang dijual dalam kemasan plastik. Kacang Toba merupakan makanan ringan tradisional Indonesia yang berasal dari daerah Toba, Sumatera Utara. Kacang Toba ini memiliki cita rasa yang gurih dan renyah, sangat cocok untuk dinikmati sebagai camilan sehari-hari. Kemasan plastiknya memberikan keuntungan dalam hal perlindungan dan kemudahan penyimpanan. Dengan kemasan yang praktis, Kacang Toba Kemasan Plastik dapat mudah dibawa ke mana saja dan tahan lebih lama. Nikmati kelezatan kacang Toba dengan Kacang Toba Kemasan Plastik yang praktis dan lezat!'),
(33, 3, 'Mie Gomak Bapana ', 18000, '1686026310_miegomakbapana.jpg', 'Mie Gomak Bapana adalah hidangan mie yang disajikan dengan udang, telur, bawang, dan andaliman. Dalam hidangan ini, mie kenyal disajikan dengan udang yang segar dan telur yang menambah kelezatan. Bawang merah dan bawang putih memberikan aroma harum dan kelezatan yang khas, serta cita rasa khas dari andaliman. Mie Gomak Bapana adalah pilihan yang tepat untuk sang ayah dikarenakan porsinya sudah diatur sedemikian rupa untuk porsi seorang ayah.'),
(34, 3, 'Mie Gomak Hare', 15000, '1686026319_miegomakhare.jpg', 'Mie Gomak Hare adalah varian mie yang dihidangkan dengan hare, telur, dan kuah tanpa cabai. Dalam hidangan ini, mie kenyal dipadukan dengan hare yang gurih dan beraroma sedap. Telur ditambahkan sebagai pelengkap yang memberikan tekstur lezat pada mie. Kuah tanpa cabai memberikan rasa yang kaya dengan sentuhan rempah yang lezat tanpa kepedasan. Nikmati kelezatan Mie Gomak Hare dengan perpaduan rasa yang lezat dan aromatik yang menggugah selera.'),
(35, 3, 'Mie Gomak Anakna', 13000, '1686026328_Mie Gomak Anakna.jpg', 'Mie Gomak Anakna adalah hidangan mie yang disajikan dengan telur dan kuah tanpa cabai, cocok untuk anak-anak. Dalam hidangan ini, mie kenyal disajikan dengan telur yang memberikan tambahan gizi dan rasa lezat. Kuah tanpa cabai memberikan cita rasa yang kaya tanpa rasa pedas, sehingga cocok untuk lidah anak-anak yang sensitif terhadap cabai. Mie Gomak Anakna adalah pilihan yang sempurna untuk memberikan kelezatan dan nutrisi pada anak-anak, sambil tetap mempertahankan keamanan rasa bagi mereka yang tidak menyukai makanan pedas.'),
(36, 3, 'Mie Gomak Omana', 15000, '1686472657_Omana.jpg', 'Mie Gomak Omana merupakan hidangan mie khas Batak yang menggugah selera. Dalam hidangan ini, mie kenyal disajikan dengan paduan telur, bawang merah, bawang putih, dan andaliman, memberikan kombinasi rasa yang unik. Kelezatan mie ini terletak pada cita rasa pedas yang khas, kesegaran dari andaliman, serta keharmonisan antara bumbu-bumbu yang digunakan. Setiap gigitan mie Gomak Omana menghadirkan sensasi yang menggoyang lidah dan memberikan pengalaman kuliner yang tak terlupakan.'),
(80, 24, 'Kaos Toba Awesome', 40000, '1687145002_TobaAwesome.jpg', 'Kaos Toba awesome\r\n\r\n\r\n'),
(81, 24, 'Kaos Batak Tribe', 40000, '1687145044_BatakTribe.jpg', 'Kaos Batak Tribe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_terlaris`
--

CREATE TABLE `produk_terlaris` (
  `id_produk_terlaris` INT(11) NOT NULL,
  `id_produk` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_terlaris`
--

INSERT INTO `produk_terlaris` (`id_produk_terlaris`, `id_produk`) VALUES
(3, 23),
(2, 24),
(4, 26),
(6, 27),
(13, 28),
(5, 33),
(7, 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(50) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `telepon` VARCHAR(13) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telepon`) VALUES
(1, 'admin', 'ben', 'vivadvent@gmail.com', '6281260392102');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_2` (`nama`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `produk_terlaris`
--
ALTER TABLE `produk_terlaris`
  ADD PRIMARY KEY (`id_produk_terlaris`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `produk_terlaris`
--
ALTER TABLE `produk_terlaris`
  MODIFY `id_produk_terlaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `produk_terlaris`
--
ALTER TABLE `produk_terlaris`
  ADD CONSTRAINT `produk_terlaris_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
