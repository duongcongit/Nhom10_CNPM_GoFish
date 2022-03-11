-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 08:48 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

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
(1, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Dù Tím', 'Cá cảnh', ' Cá Dù Tím( Xì Bích Tím) Purple Tang, còn được gọi là Yellowtail Sailfin Tang, Yellowtail Surgeonfish và Blue Surgeonfish. Thân chúng có màu xanh xen lẫn đỏ tía với những hoa văn sọc và chưng diện một chiếc đuôi màu vàng. ', 1089000, 60, 225, 1, 'product3.jpg', 1),
(2, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Nẻ Điện', 'Cá cảnh', 'Powder Brown Tang, còn được gọi là Powder Brown Surgeonfish, Surgeonfish Nhật, và White-faced Surgeonfish, chúng có một cơ thể màu nâu với một đốm trắng trên má giữa miệng và mắt.', 1350000, 60, 265, 1, 'product1.jpg', 1),
(3, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Platinum', 'Cá cảnh', ' Amphiprion Percula có bản chất hiền lành. Đây là một tin tốt vì chủ thể cộng sinh của Percula Clownfish, loài hải quỳ. Trong tự nhiên, Percula Clownfish sống nhờ hải quỳ như Heteractis magnifica hoặc Stichodactyla mertansii.', 2059000, 60, 149, 1, 'product2.jpg', 1),
(4, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Khoan cổ', 'Cá cảnh', 'Cá Khoang Cổ là một loài cá độc đáo của Clark’s Clownfish hay Clarkii Anemonefish. Chúng có một cơ thể màu vàng với một đốm trắng được tô đen phía sau mắt của nó với 3 sọc trắng. Đuôi của chúng có màu vàng và trắng. ', 865000, 60, 98, 1, 'product4.jpg', 1),
(5, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Maroon đỏ', 'Cá cảnh', 'Cá Khoang Cổ là một loài cá độc đáo của Clark’s Clownfish hay Clarkii Anemonefish. Chúng có một cơ thể màu vàng với một đốm trắng được tô đen phía sau mắt của nó với 3 sọc trắng. Đuôi của chúng có màu vàng và trắng. ', 1170000, 60, 108, 1, 'fish5.jpg', 1),
(6, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Lemon Peel', 'Cá cảnh', 'Cá Khoang Cổ là một loài cá độc đáo của Clark’s Clownfish hay Clarkii Anemonefish. Chúng có một cơ thể màu vàng với một đốm trắng được tô đen phía sau mắt của nó với 3 sọc trắng. Đuôi của chúng có màu vàng và trắng. ', 765000, 60, 568, 1, 'fish6.jpg', 1),
(7, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Nẻ nhật', 'Cá cảnh', 'Cá Khoang Cổ là một loài cá độc đáo của Clark’s Clownfish hay Clarkii Anemonefish. Chúng có một cơ thể màu vàng với một đốm trắng được tô đen phía sau mắt của nó với 3 sọc trắng. Đuôi của chúng có màu vàng và trắng. ', 2365000, 60, 189, 1, 'fish7.jpg', 1),
(8, 'MYLITTLEOCEAN', 'Cá Cảnh Biển Yellowtail', 'Cá cảnh', ' Yellow Tang là một trong những loài cá nước mặn phổ biến nhất. Chúng có một màu vàng sặc sỡ với những chiếc ngạnh màu trắng được ví như là những thanh kiếm ở đầu vây đuôi.', 2509000, 60, 435, 1, 'fish8.jpg', 1);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
