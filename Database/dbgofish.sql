-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbgofish`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productSKU` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productSKU`, `productName`, `category`, `detail`, `price`, `stock`, `sold`, `status`, `image`, `userID`) VALUES
(63, 'FH74HD', 'Cá bút chì DỌN DẸP hồ thuỷ sinh', 'Cá, tép, ốc cảnh', 'Đặc điểm của cá bút chì thái:\r\n- Tên khoa học: crossocheilus oblongus\r\n- Xuất xứ: Thái Lan.\r\n- Kích thước: 5-7 cm.\r\n- Màu sắc: trắng và đen.\r\n- Thức ăn: Là giống cá ăn tạp, đặc biệt là rêu hại, nhớt lũa… (nên hạn chế \r\n cho cá ăn bột cám để cá có thể giúp bạn dọn vệ sinh nhé).\r\n- Tuổi thọ: 5-6 năm.', 20000, 645, 0, 1, '63-1.jpg,63-2.jpg', 1),
(64, 'TEPCAM', 'Tép cam một trong những dòng tép cảnh dễ thương nhất', 'Cá, tép, ốc cảnh', 'Với một màu vàng cam phủ đầy khắp mình, tép cam là dòng tép cảnh được anh em chơi thủy sinh tép cảnh chơi phổ biến bậc nhất hiện nay.', 10000, 500, 0, 1, '64-1.jpg,64-2.jpg', 1),
(65, 'NANAW', 'Ráy nana white dòng cây thủy sinh cao cấp dễ trồng', 'Cây thủy sinh', 'Ráy nana white hay còn gọi là ráy trắng là dòng cây thủy sinh được rất nhiều anh em giới chơi thuỷ sinh săn lùng bởi vẻ đẹp sang trọng của chúng.', 300000, 215, 0, 1, '65-1.jpg,65-2.jpg', 1),
(66, 'MYLITTLEOCEAN', 'Bể cá mini dành cho hồ cá biển OF My Little Ocean', 'Bể cá', 'Bể cá mini dành cho hồ cá biển OF My Little Ocean thích hợp với những anh em mới bắt đầu chơi, bởi bộ sản phẩm trang bị hệ thống phụ kiện cho một hồ cá biển', 2700000, 60, 0, 1, '66-1.jpg,66-2.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verification_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `address`, `password`, `status`, `email_verification_link`, `email_verified_at`) VALUES
(1, 'xuân bình', 'xb2721', 'binhphan2721@gmail.com', '0974486946', 'HN', '$2y$10$RTg/l1ilFEAOdcKHETSiVedKx7yI64XNKPzjJFvsP3HOlAtVIwbPu', 1, 'f9127d2b51814398c924fa37eacb36c62863', '2022-03-05 16:48:28'),
(2, 'Dương Văn Công', 'duongcong', 'duongcong0412hc@gmail.com', '0123456789', 'Bắc Giang', 'duongcong', 1, 'qwtegrhtẹ', '2022-03-23 16:32:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
