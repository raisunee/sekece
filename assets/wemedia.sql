-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2020 pada 06.07
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wemedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL DEFAULT 0,
  `suka` int(11) NOT NULL DEFAULT 0,
  `tdk_suka` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `slug`, `gambar`, `isi`, `kategori`, `tag`, `tanggal`, `penulis`, `dilihat`, `suka`, `tdk_suka`, `status`) VALUES
(1, 'Hai Salam Kenal', 'Hai-Salam-Kenal', 'tbb1.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel. Nec ullamcorper sit amet risus nullam eget. Massa tincidunt dui ut ornare lectus sit amet. Eu mi bibendum neque egestas congue. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Sed viverra ipsum nunc aliquet bibendum enim. Imperdiet dui accumsan sit amet. Nisl pretium fusce id velit ut. Volutpat odio facilisis mauris sit. Vel turpis nunc eget lorem dolor sed. Lectus mauris ultrices eros in cursus turpis massa. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Malesuada nunc vel risus commodo viverra maecenas. Nibh praesent tristique magna sit amet purus. Morbi tristique senectus et netus et malesuada fames ac turpis. Consectetur adipiscing elit ut aliquam purus sit.</p>\r\n\r\n<h2><strong>We Are WeMedia !</strong></h2>\r\n\r\n<p>Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus in. Massa ultricies mi quis hendrerit dolor magna. Porttitor leo a diam sollicitudin tempor id. Enim nec dui nunc mattis enim ut tellus. Sit amet commodo nulla facilisi nullam. Lacus vestibulum sed arcu non odio euismod lacinia at quis. Eu feugiat pretium nibh ipsum consequat. Massa sapien faucibus et molestie ac feugiat sed. Accumsan lacus vel facilisis volutpat est. Felis imperdiet proin fermentum leo vel.</p>\r\n\r\n<p>Duis at tellus at urna condimentum mattis. In hac habitasse platea dictumst vestibulum rhoncus est. Elementum sagittis vitae et leo duis ut diam quam. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Sit amet commodo nulla facilisi nullam vehicula ipsum a. Nulla facilisi cras fermentum odio eu feugiat pretium nibh. In aliquam sem fringilla ut morbi. Mollis aliquam ut porttitor leo a diam sollicitudin. Mattis ullamcorper velit sed ullamcorper morbi. Congue nisi vitae suscipit tellus mauris a diam maecenas. Risus commodo viverra maecenas accumsan lacus vel facilisis. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Varius quam quisque id diam. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit. Scelerisque felis imperdiet proin fermentum leo.</p>\r\n\r\n<p>Nisi porta lorem mollis aliquam ut. Arcu risus quis varius quam quisque id diam. Pellentesque id nibh tortor id aliquet. Morbi blandit cursus risus at. Fermentum dui faucibus in ornare quam viverra. Hac habitasse platea dictumst vestibulum rhoncus est. Neque viverra justo nec ultrices dui sapien eget mi proin. Feugiat nisl pretium fusce id velit ut. Pulvinar neque laoreet suspendisse interdum consectetur. Metus dictum at tempor commodo ullamcorper. Amet mauris commodo quis imperdiet massa. Egestas dui id ornare arcu odio. Scelerisque fermentum dui faucibus in ornare quam. Mi quis hendrerit dolor magna eget est lorem.</p>\r\n\r\n<p>Morbi tincidunt augue interdum velit euismod in. Quam id leo in vitae turpis massa sed elementum tempus. Nam at lectus urna duis. Diam maecenas sed enim ut sem viverra aliquet. Morbi tristique senectus et netus. Eget nunc lobortis mattis aliquam faucibus. Porttitor massa id neque aliquam vestibulum. Est placerat in egestas erat imperdiet. Placerat orci nulla pellentesque dignissim enim sit amet venenatis. Lectus urna duis convallis convallis tellus id interdum velit laoreet. Elementum nibh tellus molestie nunc non blandit massa. Turpis in eu mi bibendum neque egestas congue. Pulvinar sapien et ligula ullamcorper malesuada proin libero nunc. Pharetra diam sit amet nisl suscipit. Sit amet consectetur adipiscing elit. Scelerisque varius morbi enim nunc faucibus.</p>\r\n', 1, 'umum', '2020-06-04', 1, 1, 0, 0, 1),
(2, 'S&K WeMedia', 'S-dan-K-WeMedia', 'tbb2.png', '<p>Consequat ac felis donec et odio pellentesque diam. Adipiscing diam donec adipiscing tristique risus nec feugiat in. Netus et malesuada fames ac turpis egestas integer. Mi sit amet mauris commodo quis. Ut lectus arcu bibendum at.</p>\r\n\r\n<h2><strong>Jadi User Yang Baik</strong></h2>\r\n\r\n<p>Ornare suspendisse sed nisi lacus sed viverra tellus. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Volutpat odio facilisis mauris sit amet. Nunc eget lorem dolor sed viverra ipsum. Vitae semper quis lectus nulla. Nisl purus in mollis nunc sed id semper risus in. Hac habitasse platea dictumst quisque sagittis purus sit. Arcu vitae elementum curabitur vitae nunc sed velit. Sed euismod nisi porta lorem. Risus quis varius quam quisque id diam. Viverra adipiscing at in tellus integer feugiat scelerisque varius morbi. Malesuada pellentesque elit eget gravida cum. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Facilisis magna etiam tempor orci eu lobortis. Consectetur adipiscing elit duis tristique sollicitudin. Rutrum quisque non tellus orci ac. Ornare suspendisse sed nisi lacus sed viverra.</p>\r\n\r\n<p>Lacinia at quis risus sed vulputate. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Lectus nulla at volutpat diam ut. Enim eu turpis egestas pretium aenean pharetra magna ac placerat. Hac habitasse platea dictumst quisque sagittis purus sit. Sit amet volutpat consequat mauris nunc congue nisi. Et molestie ac feugiat sed lectus. Odio aenean sed adipiscing diam donec adipiscing. Lorem dolor sed viverra ipsum nunc. Sed augue lacus viverra vitae congue eu. Sed blandit libero volutpat sed cras. Sem viverra aliquet eget sit. Ullamcorper sit amet risus nullam eget. Porttitor massa id neque aliquam vestibulum morbi. Tristique magna sit amet purus gravida quis blandit. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Ut sem nulla pharetra diam sit amet nisl suscipit. Aliquet lectus proin nibh nisl. Nisi porta lorem mollis aliquam ut porttitor leo a.</p>\r\n', 1, 'umum', '2020-06-04', 1, 1, 0, 0, 1),
(3, 'Masker dan Jaga Jarak', 'Masker-dan-Jaga-Jarak', 'tbb3.png', '<p>Ultrices dui sapien eget mi proin sed libero enim sed. Nunc sed blandit libero volutpat. Augue lacus viverra vitae congue eu consequat ac felis. Pretium lectus quam id leo in vitae turpis massa sed.&nbsp;Laoreet sit amet cursus sit amet. Faucibus et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam. Nulla porttitor massa id neque aliquam vestibulum.</p>\r\n\r\n<h2><strong>COVID-19 | Indonesia</strong></h2>\r\n\r\n<p>Aliquet enim tortor at auctor urna nunc id cursus. Ac orci phasellus egestas tellus rutrum tellus pellentesque eu. Amet justo donec enim diam. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Scelerisque purus semper eget duis. Phasellus vestibulum lorem sed risus. Porttitor massa id neque aliquam vestibulum morbi blandit cursus. Pellentesque sit amet porttitor eget dolor morbi non. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Laoreet sit amet cursus sit amet. Faucibus et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam. Nulla porttitor massa id neque aliquam vestibulum.</p>\r\n\r\n<p>Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit. Mi proin sed libero enim sed faucibus turpis. Sit amet risus nullam eget felis eget nunc lobortis mattis. Libero justo laoreet sit amet. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor. Viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas. Morbi tristique senectus et netus et malesuada. Nulla facilisi morbi tempus iaculis urna. Vestibulum lorem sed risus ultricies tristique nulla. Massa massa ultricies mi quis hendrerit. Fames ac turpis egestas maecenas pharetra. Vitae tortor condimentum lacinia quis vel eros donec ac. Purus gravida quis blandit turpis cursus in hac habitasse platea. Urna nec tincidunt praesent semper feugiat nibh. Gravida arcu ac tortor dignissim convallis aenean et tortor. Suscipit tellus mauris a diam maecenas sed enim ut sem.</p>\r\n\r\n<p>A scelerisque purus semper eget duis at tellus at urna. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Ultricies leo integer malesuada nunc vel risus commodo viverra. Erat pellentesque adipiscing commodo elit at. Duis convallis convallis tellus id interdum velit laoreet id. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Tortor condimentum lacinia quis vel eros donec ac odio. Velit euismod in pellentesque massa placerat duis ultricies. Bibendum at varius vel pharetra vel. Pharetra magna ac placerat vestibulum lectus.</p>\r\n\r\n<p>Amet facilisis magna etiam tempor orci. Iaculis nunc sed augue lacus viverra vitae congue eu consequat. Sit amet est placerat in egestas erat imperdiet sed euismod. Donec pretium vulputate sapien nec sagittis aliquam. Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Nam at lectus urna duis convallis convallis tellus id interdum. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Tempor id eu nisl nunc mi ipsum faucibus vitae aliquet. Sit amet risus nullam eget felis. Gravida cum sociis natoque penatibus et magnis dis parturient. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Quisque id diam vel quam elementum pulvinar etiam non quam. Montes nascetur ridiculus mus mauris. Congue eu consequat ac felis donec et odio pellentesque diam. Purus faucibus ornare suspendisse sed nisi lacus. Ut tellus elementum sagittis vitae. Nulla posuere sollicitudin aliquam ultrices sagittis orci a. In nibh mauris cursus mattis molestie a iaculis.</p>\r\n\r\n<p>Cursus turpis massa tincidunt dui ut ornare lectus. Integer vitae justo eget magna fermentum iaculis eu. Habitant morbi tristique senectus et netus et malesuada fames. Quis lectus nulla at volutpat. Purus faucibus ornare suspendisse sed nisi lacus sed viverra. Neque vitae tempus quam pellentesque nec nam aliquam sem. Sed arcu non odio euismod lacinia at quis risus sed. Euismod in pellentesque massa placerat duis ultricies. Vel elit scelerisque mauris pellentesque. Purus gravida quis blandit turpis cursus in hac.</p>\r\n\r\n<p>Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Id nibh tortor id aliquet lectus. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Amet venenatis urna cursus eget. Nisl pretium fusce id velit ut tortor. Vitae tempus quam pellentesque nec nam aliquam. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Vulputate dignissim suspendisse in est ante in nibh mauris. Enim eu turpis egestas pretium aenean pharetra magna ac. Tortor at auctor urna nunc id cursus metus. Enim nec dui nunc mattis enim ut tellus elementum. Aliquet eget sit amet tellus cras.</p>\r\n', 2, 'covid19, virus', '2020-06-04', 2, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guest`
--

INSERT INTO `guest` (`id`, `id_user`, `tanggal_daftar`, `nama`, `foto`, `gender`, `status`) VALUES
(1, 3, '2020-06-03', 'Raihan', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'General'),
(2, 'Viral'),
(3, 'Sosial'),
(4, 'Teknologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `id_user`, `tanggal`, `isi`, `status`, `level`) VALUES
(1, 3, 4, '2020-06-04', 'hai', 1, 1),
(2, 3, 2, '2020-06-04', 'halo', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`id`, `id_user`, `tanggal_daftar`, `nama`, `foto`, `deskripsi`, `status`) VALUES
(1, 2, '2020-06-03', 'Rays', 'creator1.png', 'arafaf', 0),
(2, 4, '2020-06-04', 'Budi', 'man3.png', 'Penulis Handal', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suka`
--

CREATE TABLE `suka` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdk_suka`
--

CREATE TABLE `tdk_suka` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `status`) VALUES
(1, 'a', '356a192b7913b04c54574d18c28d46e6395428ab', 0, 0),
(2, 'rays', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 1),
(3, 'raihan', '356a192b7913b04c54574d18c28d46e6395428ab', 2, 1),
(4, 'budi', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suka`
--
ALTER TABLE `suka`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tdk_suka`
--
ALTER TABLE `tdk_suka`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suka`
--
ALTER TABLE `suka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tdk_suka`
--
ALTER TABLE `tdk_suka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
