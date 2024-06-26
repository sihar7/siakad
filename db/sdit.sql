-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 18.24
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nip` char(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `telp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nip`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `telp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, '123456', 36, 'Zahir', 'Bogor', '2020-02-01', 'Laki-laki', 'Islam', '081-8181-8181', 'Bogor, Jawa Barat', NULL, '2020-02-18 20:10:26', '2020-03-29 20:27:27'),
(3, '666666', 43, 'Namaku', 'Jakarta', '2020-03-01', 'Laki-laki', 'Islam', '087-8888-8888', 'sdsd', NULL, '2020-03-29 20:32:56', '2020-03-29 20:32:56'),
(4, '111111', 44, 'test', 'sdf', '2024-01-19', 'Laki-laki', 'Islam', '000-2323-2323', 'alamat', NULL, '2024-01-19 03:07:41', '2024-01-19 03:07:41'),
(5, '976237868', 46, 'Guru baru', 'cek', '2024-01-01', 'Laki-laki', 'Islam', '083-9848-3848', 'alamat', NULL, '2024-01-29 17:35:10', '2024-01-29 17:35:10'),
(6, '55555', 50, 'petugas baru', 'kjshdfs', '2024-02-08', 'Laki-laki', 'Islam', '092-3948-2384', 'ashdasd', NULL, '2024-02-10 03:16:47', '2024-02-10 03:16:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_learns`
--

CREATE TABLE `class_learns` (
  `id` int(11) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class_learns`
--

INSERT INTO `class_learns` (`id`, `class_room_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-02-16 02:30:11', '2020-02-17 02:17:58'),
(9, 3, 1, '2020-02-15 21:53:27', '2020-02-16 04:53:27'),
(10, 1, 2, '2020-02-16 19:43:25', '2020-02-17 02:43:25'),
(12, 2, 1, '2020-02-19 22:47:15', '2020-02-20 05:47:15'),
(13, 3, 2, '2020-02-28 20:23:27', '2020-02-29 03:23:27'),
(14, 1, 4, '2020-03-06 21:13:58', '2020-03-07 04:13:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(11) NOT NULL,
  `kode_kelas` char(6) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `kode_kelas`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'K100', '10 A', '2020-02-11 20:25:15', '2020-03-25 03:17:05'),
(2, 'K101', '10 B', '2020-02-11 20:27:29', '2020-03-25 03:17:38'),
(3, 'K102', '10 C', '2020-02-12 20:33:50', '2020-03-25 03:17:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class_students`
--

INSERT INTO `class_students` (`id`, `class_room_id`, `student_id`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '2020-03-03 04:17:33', NULL),
(4, 2, 11, 1, '2020-03-03 10:40:55', NULL),
(5, 1, 12, 1, '2020-03-07 04:48:01', NULL),
(6, 1, 14, 1, '2020-03-12 03:23:46', '2020-03-12 03:23:46'),
(7, 3, 13, 1, '2020-03-13 03:36:53', '2020-03-13 03:36:53'),
(12, 2, 11, 4, '2020-03-13 21:08:33', '2020-03-13 21:08:33'),
(13, 2, 6, 4, '2020-03-13 21:54:32', '2020-03-13 21:54:32'),
(14, 2, 13, 4, '2020-03-13 21:54:32', '2020-03-13 21:54:32'),
(15, 2, 12, 4, '2020-03-13 21:54:32', '2020-03-13 21:54:32'),
(16, 2, 14, 4, '2020-03-13 21:54:32', '2020-03-13 21:54:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `extracurriculums`
--

CREATE TABLE `extracurriculums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `extracurriculums`
--

INSERT INTO `extracurriculums` (`id`, `name`, `description`) VALUES
(5, 'Produk Kami', '<p>asasa</p>'),
(6, 'aa', '<p>bbb</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `class_learn_id` int(11) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `class_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `nilai_tugas_1` char(3) NOT NULL,
  `nilai_tugas_2` char(3) NOT NULL,
  `nilai_uts` char(3) NOT NULL,
  `nilai_uas` char(3) NOT NULL,
  `tinggibadan` int(11) NOT NULL,
  `beratbadan` int(11) NOT NULL,
  `pendengaran` text NOT NULL,
  `penglihatan` text NOT NULL,
  `gigi` text NOT NULL,
  `prestasi` text NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grades`
--

INSERT INTO `grades` (`id`, `class_learn_id`, `class_room_id`, `semester_id`, `class_student_id`, `student_id`, `teacher_id`, `nilai_tugas_1`, `nilai_tugas_2`, `nilai_uts`, `nilai_uas`, `tinggibadan`, `beratbadan`, `pendengaran`, `penglihatan`, `gigi`, `prestasi`, `sakit`, `izin`, `alpha`, `created_at`, `updated_at`) VALUES
(74, 14, 1, 1, 1, 6, 2, '10', '10', '10', '10', 10, 10, 'aaa', 'aa', 'aa', 'Sakit 50 hari', 1, 1, 1, '2024-05-28 09:04:53', '2024-05-28 09:12:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `homeroom_teachers`
--

CREATE TABLE `homeroom_teachers` (
  `id` int(11) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `homeroom_teachers`
--

INSERT INTO `homeroom_teachers` (`id`, `class_room_id`, `teacher_id`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-03-04 04:30:51', NULL),
(3, 2, 2, 1, '2020-03-04 03:25:44', '2020-03-04 03:25:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informations`
--

INSERT INTO `informations` (`id`, `judul`, `konten`, `user_id`, `updated_by`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Libur', '<p>Besok libur.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <b>Iure </b>ut ipsum quam <i>maxime </i>aspernatur natus voluptates soluta, exercitationem, minus impedit inventore culpa voluptate. Laborum in reprehenderit inventore! Impedit, modi a.</p>', 1, 36, 1, '2020-03-15 04:20:57', '2020-03-15 20:16:44'),
(2, 'Besok Lebaran', '<p>jkshdkjdkdj hdldhkjdh dkjdkjhdj</p>', 36, 0, 0, '2020-03-14 22:23:06', '2020-03-14 22:23:06'),
(3, 'Ujian', '<p>minggu depan ujian</p>', 36, NULL, 1, '2020-03-15 20:24:05', '2020-03-15 20:24:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_07_092805_create_siswa_table', 1),
(4, '2020_02_07_092805_create_students_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` char(6) NOT NULL,
  `jam_selesai` char(6) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `class_learn_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `hari`, `jam_mulai`, `jam_selesai`, `class_room_id`, `class_learn_id`, `semester_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(11, 'Selasa', '09:00', '10:00', 1, 10, 1, 3, '2020-02-23 18:58:57', '2020-02-23 18:58:57'),
(12, 'Selasa', '10:00', '12:00', 1, 1, 1, 2, '2020-02-23 19:23:50', '2024-01-13 19:32:53'),
(17, 'Sabtu', '09:30', '10:30', 1, 1, 1, 2, '2020-02-23 21:32:05', '2020-02-24 03:07:50'),
(18, 'Kamis', '10:00', '10:30', 1, 10, 1, 2, '2020-02-28 20:03:16', '2020-02-28 20:03:16'),
(20, 'Selasa', '12:00', '13:00', 1, 1, 2, 1, '2020-03-03 21:52:01', '2020-03-03 21:52:01'),
(21, 'Senin', '07:00', '08:00', 1, 10, 2, 3, '2020-03-03 21:52:34', '2020-03-03 21:52:34'),
(22, 'Kamis', '09:00', '10:30', 1, 14, 1, 2, '2020-03-06 21:15:10', '2020-03-06 21:15:10'),
(27, 'Senin', '14:30', '15:30', 2, 12, 1, 3, '2020-03-17 21:37:48', '2020-03-17 21:37:48'),
(28, 'Selasa', '09:30', '12:00', 1, 10, 1, 3, '2024-01-13 19:18:43', '2024-01-13 19:18:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `kode_semester` char(8) NOT NULL,
  `semester` varchar(120) NOT NULL,
  `tahun_ajaran` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semesters`
--

INSERT INTO `semesters` (`id`, `kode_semester`, `semester`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, 'SM192001', 'Genap', '2019/2020', '2020-02-14 22:06:45', '2020-02-14 22:06:45'),
(2, 'SM192002', 'Ganjil', '2019/2020', '2020-02-14 22:12:43', '2020-02-14 22:12:43'),
(4, 'SM212201', 'Genap', '2021/2022', '2020-03-03 21:16:22', '2020-03-03 21:16:22'),
(5, 'SM212202', 'Ganjil', '2021/2022', '2020-03-03 21:17:26', '2020-03-03 21:17:26'),
(6, 'SM222301', 'Genap', '2022/2023', '2020-03-13 21:09:26', '2020-03-13 21:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_lengkap_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_lengkap_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pddk_ayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pddk_ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_tk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `anak_ke`, `nm_lengkap_ayah`, `nm_lengkap_ibu`, `no_telp`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pddk_ayah`, `pddk_ibu`, `asal_tk`, `alamat_tk`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(6, '20201000', 23, 'Apri', 'Bogors', '2003-04-01', 'Perempuan', 'Islam', 'Bogor, Jawa Barat', '', '', '', '3e3', '', '', '', '', '', '', NULL, 'siswa', '2020-02-09 19:25:27', '2024-02-10 01:16:08'),
(11, '20201001', 39, 'Udin', 'Bogors', '2020-02-01', 'Laki-laki', 'Islam', 'Cikarangs', '2', 'nm lengkap ayah', 'nm lengkap ibu', '09833', 'pkerjaan ayah', 'pkerjaan ibu', 'pendiikan ayagh', 'pendiikan ibu', 'nama tk', 'alamat tk', NULL, 'siswa', '2020-02-26 20:42:38', '2024-02-10 02:25:19'),
(12, '20201002', 40, 'Izma', 'Bogor', '2020-02-02', 'Perempuan', 'Islam', 'Bekasi', '', '', '', '', '', '', '', '', '', '', NULL, 'siswa', '2020-02-28 21:41:50', '2024-01-13 19:11:52'),
(13, '20201003', 41, 'Arif', 'Bogor', '2017-03-01', 'Laki-laki', 'Islam', 'Garut', '', '', '', '', '', '', '', '', '', '', 'afkarun_depth.jpg', 'siswa', '2020-03-08 21:36:23', '2024-01-13 19:12:06'),
(14, '20201004', 42, 'Rubens', 'Jakarta', '1997-03-09', 'Laki-laki', 'Kristen', 'Bandung', '3', 'ajsdh', 'jg', 'g', 'jhg', 'gj', 'hj', 'hj', 'hjkg', 'khass', NULL, 'siswa', '2020-03-08 22:16:26', '2024-02-10 03:39:51'),
(16, '20201005', 51, 'tests', 'ahjsgd', '2024-02-04', 'Laki-laki', 'Islam', 'asdasd', '2', 'ayah', 'ajksda', '762667', 'asda', 'jhg', 'jhgh', 'hjg', 'g', 'g', NULL, 'calon', '2024-02-10 03:54:35', '2024-02-10 03:56:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students_extracurriculums`
--

CREATE TABLE `students_extracurriculums` (
  `id` int(11) NOT NULL,
  `extracurriculums_id` int(11) NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `class_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `nilai` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `students_extracurriculums`
--

INSERT INTO `students_extracurriculums` (`id`, `extracurriculums_id`, `class_room_id`, `semester_id`, `class_student_id`, `student_id`, `nilai`) VALUES
(1, 5, 1, 1, 1, 6, '90'),
(2, 6, 1, 1, 1, 6, '80'),
(3, 6, 1, 1, 5, 12, '88'),
(4, 6, 1, 1, 6, 14, '89');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `kode_mapel` char(6) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subjects`
--

INSERT INTO `subjects` (`id`, `kode_mapel`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'MP101', 'Matematika', '2020-02-12 18:38:17', '2020-02-12 18:38:17'),
(2, 'MP102', 'Bahasa Indonesia', '2020-02-16 19:43:00', '2020-02-16 19:43:00'),
(4, 'MP103', 'PKN', '2020-03-06 21:13:33', '2020-03-06 21:13:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `nrg` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `telp` char(16) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`id`, `nrg`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'G1234', 24, 'Supardi', 'Arab', '1995-02-10', 'Laki-laki', 'Islam', '087-8555-4444', 'Arab', '2020-02-09 21:41:40', '2020-02-11 19:39:24'),
(2, 'G1235', 29, 'Samson', 'Jakarta', '1988-02-01', 'Laki-laki', 'Islam', '085-0005-5454', 'Jakarta Barat', '2020-02-11 19:13:33', '2020-02-11 19:13:33'),
(3, 'G1236', 30, 'Sayuti', 'Jakarta', '2020-02-02', 'Laki-laki', 'Islam', '090-9090-9090', 'jakarta', '2020-02-12 20:12:28', '2020-02-12 20:12:28'),
(4, 'G1237', 47, 'barug', 'ajhsdj', '2024-01-30', 'Laki-laki', 'Kristen', '019-2938-1828', 'aksjdkja', '2024-01-29 17:44:38', '2024-01-29 17:44:38'),
(5, 'G1238', 48, 'test', '-', '2024-01-08', 'Laki-laki', 'Kristen', '092-9823-9882', 'test', '2024-01-29 17:56:01', '2024-01-29 17:56:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, '20201000', 'siswa', 'Apri', 'apri@mail.com', NULL, '$2y$10$Fn7rNvoA.9uWHpOKGo/4q.xYGubrqnwL2ZbbfD/bgo9.cYZ8KgIBm', '2vuvxVoSBuEgS4K7BBSPqHylAhYStDdaDcJkgLKJfAYLjQqGn4Eqn9jreMbz', '2020-02-09 19:25:27', '2020-03-29 19:38:10'),
(24, 'G1234', 'guru', 'Supardi', 'supardi@mail.com', NULL, '$2y$10$MpzZuI2LRl7qFTcr9/Sy9ezVbXqvLK4sG4W/SJeJHVi1bH8oWPho.', '6E8QqbiurcMHbC1RKM1TsJbhDxPESNpiuJwsI89HZ6lbxt44DjwJ0OXgqrrE', '2020-02-09 21:41:40', '2020-02-09 21:41:40'),
(29, 'G1235', 'guru', 'Samson', 'samson@mail.com', NULL, '$2y$10$pvs48mb4u/w6dXPy1MQ9xObNTl4VYRN7AiPITwazFLi4l2J4YNFna', 'ODWlAZYvgxLU9FUmkE1Lu2t4JVtaNHg4WTduNUfx5DRZyqh7gSy2VaV9ut6j', '2020-02-11 19:13:33', '2020-02-11 19:13:33'),
(30, 'G1236', 'guru', 'Sayuti', 'hgs@jdhd.com', NULL, '$2y$10$sXxNKPGogvwIefpVB20a.Oc/XjOdoCFfas.ZC9oUMNL/gRVDfrywe', '3M35PRNlm4PzBYEJE0PHIs5G7ESJmtuLLcVk89d5c6d6LXQrXuLpmMfPeU3y', '2020-02-12 20:12:28', '2020-02-12 20:12:28'),
(36, '123456', 'admin', 'Zahir', 'zahir@mail.com', NULL, '$2y$10$gruRBsN5LU4MGWOQ1cgD6usFM5QN2BgNRyCkyd.ETAwSYqAKNPziW', 'u03HrBYH0cmIgN7StkaIkI7QjWVHtXkpRdH6ZQrEnW3TLAYfipAgcpNPR4fY', '2020-02-18 20:10:26', '2020-02-18 20:10:26'),
(39, '20201001', 'siswa', 'Udin', 'udin@mail.com', NULL, '$2y$10$1uGt7YoU4yOEmUvr2Fg7Z.Xk.8Od0HztnbV4zXSNO0XdWZC650B5u', 'poecEQnPi3ivIlndqFUSMbfyoFUV0w1pJD8MLVlevGLlTWw0rwwHiDxHzV7d', '2020-02-26 20:42:38', '2020-02-26 20:42:38'),
(40, '20201002', 'siswa', 'Izma', 'izma@mail.com', NULL, '$2y$10$ve6uGfsp3qB3wn2.COqj7.TrqMvyqvsLZ.A1agSHVng7KeTDF7ZLK', '4tFaz989sW8DD56FZoLUdHXcqj3xQxCcnmDJ3g6dLMuCa4taZxulzJvOeiSI', '2020-02-28 21:41:49', '2020-02-28 21:41:49'),
(41, '20201003', 'siswa', 'Arif', 'arif@mail.com', NULL, '$2y$10$WeRmoZ/ghCtUUB8vI2FVxOxOhLRuIu8NiSAGkjD9a1CsHdeV77h8G', 'TkCVzEHcNdyTIO12qRAp9nssdBllsDRAqsZmzpRiM33zgEygT7US1Izs4IHZ', '2020-03-08 21:36:23', '2020-03-08 21:36:23'),
(42, '20201004', 'siswa', 'Ruben', 'ruben@mail.com', NULL, '$2y$10$9b5WuTH2jBc3jjxfLQlUhuxCIsb1fJNl.eD4p.Xvuqw2WUaOus.o2', 'e2iQda8y2cPNE96kMyimzaVWnpNB1h3VMv9O2CrV7iG4wCjm8ZzNssX46tFG', '2020-03-08 22:16:26', '2020-03-08 22:16:26'),
(43, '666666', 'admin', 'Namaku', 'namaku@mail.com', NULL, '$2y$10$pM3cHSYbN63XDtpJI9x4qu6InspuPFECgJkjTJkMkFxPf6z04yuE6', 'ovlOR5TMAFQQe7LCuNNHOPPhYHhij1lfSpF9Z4Iw2m0y7hVAtqn9ysL8yFkU', '2020-03-29 20:32:56', '2020-03-29 20:32:56'),
(44, '111111', 'admin', 'test', 'email@test.com', NULL, '$2y$10$qp5T1A0iEfbC/sFqRYGxjO1RvXWmWxMVYED1Vk31kWZqZeA9IgJx2', 'jLGVYHqbctTKIdEUjZvwH5gfhi0sZx7zflXny9G5W9v64hIxYK5Zhr3KNqcC', '2024-01-19 03:07:41', '2024-01-19 03:07:41'),
(46, '976237868', 'guru', 'Guru baru', 'mam@gmail.com', NULL, '$2y$10$pM3cHSYbN63XDtpJI9x4qu6InspuPFECgJkjTJkMkFxPf6z04yuE6', 'UqyqKcbol9Vwqs1ohllM2bYMp7QqgtWQnMhc9ayGxMaEg2y7p7ygI6MQQOru', '2024-01-29 17:35:10', '2024-01-29 17:35:10'),
(47, 'G1237', 'guru', 'barug', 'jahsjdha@jajd.com', NULL, '$2y$10$2VcyPezNHP./hD7trI.C2.J.jZQDFBnHRuodrB9pJAgAQ1DssPm3G', 'CJOHItSmkNRArqvkPgOZQbP4sauIm3fh1YyWqOC4wSyUPpG6cNyW6vXRraYZ', '2024-01-29 17:44:38', '2024-01-29 17:44:38'),
(48, 'G1238', 'guru', 'test', 'mam@gmaial.com', NULL, '$2y$10$voiBwv3C2depFPYBEIUy1.hM2pYIBCJFRUViXErocW14mJ1N1r6z6', 'jeAnULtAx3QSDemjGjrI4AJgzMXZcZOh67qPxaajdDKe1WuKEWrg3U9enzoS', '2024-01-29 17:56:01', '2024-01-29 17:56:01'),
(50, '55555', 'petugas', 'petugas baru', 'mam@gmails.com', NULL, '$2y$10$Sb6kRpS1cmhNt1DWTDDHl.5vNuCckdU5X1wfEJNjEHUkemcMPRfBe', 'KosuNSw1k90gE37IxnIqgDzHfV7XWT9hBaE7jov1sGq6YEXnOax1PnQl0j5q', '2024-02-10 03:16:47', '2024-02-10 03:16:47'),
(51, '20201005', 'siswa', 'test', 'aasda@email.com', NULL, '$2y$10$VoLSa3XSVQig0K2tqUqxbOMEPghIO3P/c2MuR2NJ2rNeoNsXcCrM6', 'gYrbXCCwhYYEWOko0ZPKIwp4737U9Bb6lWFmZAREhh1nT0p0Xj8RaZeKE5yg', '2024-02-10 03:54:35', '2024-02-10 03:54:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class_learns`
--
ALTER TABLE `class_learns`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `extracurriculums`
--
ALTER TABLE `extracurriculums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `homeroom_teachers`
--
ALTER TABLE `homeroom_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students_extracurriculums`
--
ALTER TABLE `students_extracurriculums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `class_learns`
--
ALTER TABLE `class_learns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `extracurriculums`
--
ALTER TABLE `extracurriculums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `homeroom_teachers`
--
ALTER TABLE `homeroom_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `students_extracurriculums`
--
ALTER TABLE `students_extracurriculums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
