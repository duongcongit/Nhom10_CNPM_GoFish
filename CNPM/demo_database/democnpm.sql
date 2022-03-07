-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 07, 2022 lúc 01:46 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `democnpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `detail` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemLeft` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `itemImg` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `type`, `price`, `detail`, `itemLeft`, `id`, `itemImg`) VALUES
(1, 'Cá cảnh biển hoàng gia biển đỏ regal-angelfish-red-sea', 'Cá', 350000, 'Với các sọc dọc đứng sống động màu xanh, trắng, vàng hoặc cam trên cơ thể và vây bụng, Regal Angelfish xứng đáng với cái tên gọi đặc biệt này. Regal Angelfish đến từ Maldives và Biển Đỏ có một đốm ngực màu vàng, Biển Ấn Độ Dương, Biển Coral, Vanuatu và Tahitian lại có đốm ngực xanh/xám. Màu sắc này phổ biến hơn trong loài cá trưởng thành và dài ít nhất 4” (10cm). Cá con sẽ có một “mắt giả” trên vây lưng và mờ đi khi chúng trưởng thành.', 20, 2, 'ca-canh-bien-hoang-gia-bien-do-regal-angelfish-red-sea.jpg'),
(2, 'Cá cảnh biển royal-gramma-basslet', 'Cá', 170000, 'Royal Gramma Basslet mang đến sự bùng nổ màu sắc cho bất kỳ bể cá nước mặn nào. Cơ thể có màu tím sáng nửa thân trước tương phản với màu vàng rực rỡ của thân sau. Một cơ thể vô cùng độc đáo và có kích thước tương đối nhỏ, Gramma loreto là rất thích hợp cho bể cá rạn san hô nano nhỏ.\r\n\r\n                 Loài cá này có nguồn gốc từ các rạn san hô nước sâu ở vùng biển Caribbean, thành viên của gia đình Grammidae này thích những hang động lớn để ẩn nấp và tránh ánh sáng. Khi ở chung các Royal Gramma Basslet sẽ cạnh tranh lãnh thổ, vì vậy chỉ nên nuôi một mình nó trong bể. Tuy nhiên, hầu hết Royal Gramma Basslets đều hòa bình với những con cá cùng kích cỡ và tính khí tương tự.\r\n\r\n                 Để Royal Gramma Basslet phát triển tốt nhất, chúng cần một cái bể rạn san hô có ít nhất 30 gallon (114 lít). Chế độ ăn nên bao gồm các thực phẩm chế biến từ thịt như cá biển, động vật  giáp xác, tôm mysis và các chế phẩm đông lạnh chất lượng.', 15, 1, 'ca-canh-bien-royal-gramma-basslet.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verification_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `telephone`, `address`, `password`, `status`, `email_verification_link`, `email_verified_at`) VALUES
(1, 'xuân bình', 'xb2721', 'binhphan2721@gmail.com', '0974486946', 'HN', '$2y$10$RTg/l1ilFEAOdcKHETSiVedKx7yI64XNKPzjJFvsP3HOlAtVIwbPu', 1, 'f9127d2b51814398c924fa37eacb36c62863', '2022-03-05 16:48:28'),
(2, 'công minh', 'minhlc', 'lecongminh@gmail.com', '0965469464', 'HN', '$2y$10$RTg/l1ilFEAOdcKHETSiVedKx7yI64XNKPzjJFvsP3HOlAtVIwbPu', 1, 'f9127d2b51814398c924fa37eacb36c62863', '2022-03-07 07:48:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `foreignkey1` (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `foreignkey1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
