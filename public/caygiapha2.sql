-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 07, 2018 lúc 06:13 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `caygiapha2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghinhanketthuc`
--

CREATE TABLE `ghinhanketthuc` (
  `id` int(11) NOT NULL,
  `id_hoso` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `nguyenhan` varchar(50) NOT NULL,
  `thoigianmat` date NOT NULL,
  `diadiem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ghinhanketthuc`
--

INSERT INTO `ghinhanketthuc` (`id`, `id_hoso`, `hoten`, `nguyenhan`, `thoigianmat`, `diadiem`) VALUES
(1, 1, 'Phan Minh Ngọc', 'Bệnh', '2000-02-02', 'Long An'),
(2, 3, 'ádsdsa', 'ádsadsada', '2018-05-19', 'ádasdasda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghinhanthanhtich`
--

CREATE TABLE `ghinhanthanhtich` (
  `id` int(11) NOT NULL,
  `id_hoso` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `loaithanhtich` varchar(50) NOT NULL,
  `ngayphatsinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ghinhanthanhtich`
--

INSERT INTO `ghinhanthanhtich` (`id`, `id_hoso`, `ten`, `loaithanhtich`, `ngayphatsinh`) VALUES
(1, 1, 'Phan Minh Ngọc', 'Huân Chương Lao Động Hạng 3', '1940-12-22'),
(2, 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', '2018-05-13'),
(3, 1, 'aaaaaaa', 'AAAAAAAAAAa', '2018-05-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hosothanhvien`
--

CREATE TABLE `hosothanhvien` (
  `id` int(11) NOT NULL,
  `thanviencu` varchar(50) NOT NULL,
  `doi` varchar(50) NOT NULL,
  `loaiquanhe` varchar(50) NOT NULL COMMENT 'Cha, Mẹ, Ông, Bà, Con, Cháu',
  `ngayphatsinh` date NOT NULL,
  `hovaten` varchar(50) NOT NULL,
  `cha` varchar(50) NOT NULL,
  `me` varchar(50) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `ngaygiosinh` date NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `nghenghiep` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hosothanhvien`
--

INSERT INTO `hosothanhvien` (`id`, `thanviencu`, `doi`, `loaiquanhe`, `ngayphatsinh`, `hovaten`, `cha`, `me`, `gioitinh`, `ngaygiosinh`, `quequan`, `nghenghiep`, `diachi`, `deleted`) VALUES
(1, 'Lạc Long Quân', 'Đời 1', 'Con', '1930-04-01', 'Phan Minh Ngọc', 'Lạc Long Quân', 'Âu Cơ', 'Nam', '1930-04-01', 'Long An', 'Long An', 'Long An', 1),
(2, 'Phan Minh Ngọc', 'Đời 1', 'Chồng', '1935-04-01', 'Đặng Ngọc Ngân', 'Dương Quá', 'Tiểu Long Nữ', 'Nữ', '1910-03-11', 'Vĩnh Long', 'Chưa rõ', 'Long An', 1),
(3, 'Phan Minh Ngọc', 'Đời 2', 'Con', '1955-01-16', 'Phan Minh Huy', 'Phan Minh Ngọc', 'Đặng Ngọc Ngân', 'Nam', '1955-01-16', 'Long An', 'Giáo Viên Toán', 'Quận 10, TPHCM', 1),
(4, 'Phan Minh Huy ', 'Đời 2', 'Vợ', '1975-07-22', 'Trần Hải Yến', 'Trần Minh Tiến', 'Nguyên Thanh Thuỷ', 'Nữ', '1957-09-14', 'Cà Mau', 'Nội Trợ', 'Quận 10, TPHCM', 1),
(5, 'Phan Minh Ngọc', 'Đời 2', 'Con', '1954-03-17', 'Phan Hà My', 'Phan Minh Ngọc', 'Đặng Ngọc Ngân', 'Nữ', '1954-03-17', 'Long An', 'Kinh Doanh', 'Quận 1 , TPHCM', 1),
(6, 'Phan Hà My', 'Đời 2', 'Chồng', '1978-12-12', 'Trần Thanh Tú', 'Trần Thanh Hải', 'Nguyễn Hồng Ánh', 'Nam', '1953-12-22', 'Tiềng Giang', 'Kinh Doanh', 'Quận 1 , TPHCM', 1),
(7, 'Phan Minh Huy', 'Đời 3', 'Con', '1997-11-14', 'Phan Tùng Lâm', 'Phan Minh Huy', 'Trần Hải Yến', 'Nam', '1997-11-14', 'Long An', 'Sinh Viên Năm 3', 'Quận 10, TPHCM', 1),
(8, 'Phan Minh Huy', 'Đời 3', 'Con', '2000-03-27', 'Phan Phúc Nguyên', 'Phan Minh Huy', 'Trần Hải Yến', 'Nam', '2000-03-27', 'Long An', 'Học Sinh Cấp 3', 'Quận 10, TPHCM', 1),
(9, 'Trần Thanh Tú', 'Đời 3', 'Con', '1998-07-12', 'Trần Mỹ Linh', 'Trần Thanh Tú', 'Phan Hà My', 'Nữ', '1998-07-12', 'Tiềng Giang', 'Sinh Viên Năm 2', 'Quận 1 , TPHCM', 1),
(10, 'Trần Thanh Tú', 'Đời 3', 'Con', '1999-02-14', 'Trần Văn Minh', 'Trần Thanh Tú', 'Phan Hà My', 'Nam', '1999-02-14', 'Tiềng Giang', 'Sinh Viên Năm 2', 'Quận 1 , TPHCM', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tanggiamthanhvien`
--

CREATE TABLE `tanggiamthanhvien` (
  `id` int(11) NOT NULL,
  `nam` int(11) NOT NULL,
  `soluongsinh` int(11) NOT NULL,
  `soluongkethon` int(11) NOT NULL,
  `soluongmat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tanggiamthanhvien`
--

INSERT INTO `tanggiamthanhvien` (`id`, `nam`, `soluongsinh`, `soluongkethon`, `soluongmat`) VALUES
(1, 2000, 0, 1, 0),
(2, 2001, 2, 0, 0),
(3, 2005, 4, 0, 0),
(4, 2018, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'G2GP', 'cnpmnc@gmail.com', '$2y$10$MkUlg7KTF7xfuWYUz5S3qOvac1k24n5OXndUEfRRHtb9Ifspzt3..', NULL, '2018-05-06 09:47:46', '2018-05-06 09:47:46'),
(2, 'CNPMNC', 'cnpmncgp@gmail.com', '$2y$10$JqoLw9FUlBH8zNLpvebX2OqXDwk5.ibpU7EVMMyPn6tbgdSv724m.', 'IDupMamAR9NoRkpwalr78idwAGZyl0BZMJz2ALu4cMQt0xYww4ABRsfOz3zi', '2018-05-06 09:47:46', '2018-05-06 09:47:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ghinhanketthuc`
--
ALTER TABLE `ghinhanketthuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hoso` (`id_hoso`);

--
-- Chỉ mục cho bảng `ghinhanthanhtich`
--
ALTER TABLE `ghinhanthanhtich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hoso` (`id_hoso`);

--
-- Chỉ mục cho bảng `hosothanhvien`
--
ALTER TABLE `hosothanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tanggiamthanhvien`
--
ALTER TABLE `tanggiamthanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ghinhanketthuc`
--
ALTER TABLE `ghinhanketthuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ghinhanthanhtich`
--
ALTER TABLE `ghinhanthanhtich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hosothanhvien`
--
ALTER TABLE `hosothanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tanggiamthanhvien`
--
ALTER TABLE `tanggiamthanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ghinhanketthuc`
--
ALTER TABLE `ghinhanketthuc`
  ADD CONSTRAINT `ghinhanketthuc_ibfk_1` FOREIGN KEY (`id_hoso`) REFERENCES `hosothanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ghinhanthanhtich`
--
ALTER TABLE `ghinhanthanhtich`
  ADD CONSTRAINT `ghinhanthanhtich_ibfk_1` FOREIGN KEY (`id_hoso`) REFERENCES `hosothanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
