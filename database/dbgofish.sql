-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2022 lúc 07:06 PM
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
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Xuân Bình', 'xb2721', '123'),
(2, 'Administrator', 'admin', 'admin'),
(3, 'Phạm Văn Phú', 'phamvanphu', 'phamvanphu'),
(4, 'Dương Công', 'duongcong', 'duongcong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `time_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`userID`, `productID`, `quantity`, `time_add`) VALUES
(2, 17, 1, '2022-03-17 18:06:07'),
(2, 21, 1, '2022-03-17 18:06:05'),
(2, 22, 1, '2022-03-17 18:06:04'),
(2, 23, 3, '2022-03-17 18:06:28'),
(2, 25, 1, '2022-03-17 18:06:10'),
(2, 30, 2, '2022-03-17 18:06:18'),
(2, 33, 1, '2022-03-17 18:06:12'),
(2, 34, 1, '2022-03-17 18:06:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(1, 'Cá, tép, ốc cảnh'),
(2, 'Cây thủy sinh'),
(3, 'Thức ăn'),
(4, 'Bể cá'),
(5, 'Phụ kiện hồ cá'),
(6, 'Phụ kiện thủy sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productSKU` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` int(11) NOT NULL,
  `detail` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productSKU`, `productName`, `categoryID`, `detail`, `price`, `stock`, `sold`, `status`, `userID`) VALUES
(16, 'VANG-SOC', 'Tép vàng sọc Yellow Golden Line shrimp', 1, 'Tép vàng sọc có cái tên gọi tiếng anh là Yellow Golden Line shrimp, là một trong những dòng tép cảnh nhập khẩu thu hút rất nhiều người chơi bởi vẻ đẹp của chúng', 20000, 234, 0, 1, 2),
(17, 'TBB1', 'Tỳ bà bướm dòng cá vệ sinh hồ tuyệt mỹ', 1, 'Tỳ bà bướm là dòng cá cảnh với chức năng vệ sinh các loại thức ăn dư thừa có trong hồ thủy sinh và cá cảnh, chúng siêng năng hoạt động và đạt hiệu quả cao trong việc vệ sinh hồ.', 20000, 354, 0, 1, 1),
(18, 'OCTAO1', 'Ốc Táo vệ sinh hồ chuyên ăn thức ăn thừa và phân cá', 1, 'Ốc Táo hiện nay đang rất được ưa chuộng không chỉ làm cảnh trong hồ thủy sinh, mà chúng còn có tác dụng dọn vệ sinh hồ vô cùng hiệu quả.', 10000, 0, 0, 1, 3),
(19, 'RLBL1', 'Tép rili đen hay còn gọi là rili carbon', 1, 'Rili đen hay còn gọi là rili carbon là dòng tép cảnh đẹp với đặc điểm nổi bật là các khoang màu đen phân cách bởi phần thân giữa trong suốt rất thu hút người chơi.', 15000, 5466, 0, 1, 1),
(20, 'CAXECAN', 'Cá xecan xanh có sọc.', 1, 'Tên khoa học: Gymnocorymbus ternetzi\r\nHình dáng cá: oval.\r\nĐộ pH: 6,0 – 7,5\r\nNhiệt độ: 21-30 độ C\r\nĐộ cứng nước: 4 đến 8 dKH\r\nTính cách: Hung hăn nhẹ.\r\nMàu sắc: xanh lá và đen.\r\nTuổi thọ: 3-5 năm (môi trường bể kính).', 15000, 576, 0, 1, 2),
(21, 'CLV', 'CÁ LÔNG VŨ', 1, 'Tên tiếng Việt khác: Lông gà\r\nNguồn gốc: Cá nhập\r\nChiều dài cá (cm): >8 \r\nNhiệt độ nước (C): 25-28\r\nĐộ cứng nước (dH): 5 - 20\r\nĐộ pH: 6-8\r\nTầng nước ở: đáy\r\nSinh sản: Cá đẻ trứng, khó cho sinh sản, tuy nhiên hiện đã sản xuất giống thành công (có sử dụng hormone) ở Indonesia và có thể ở Malaysia.', 90000, 657, 0, 1, 3),
(22, 'CRCUUSUNG', 'CÁ RỒNG CỬU SỪNG', 1, 'Cá rất khỏe và dễ nuôi. Cá hoạt động về đêm, khả năng nhìn kém nhưng khứu giác rất phát triển để tìm mồi. Cá có cơ quan hô hấp phụ, thường lên đớp khí và có thể trườn ra khỏi nước.\r\nTên tiếng Việt khác: Khủng long vàng\r\nNguồn gốc: Cá nhập ngoại\r\nChiều dài cá lớn nhất (cm): 50\r\nNhiệt độ nước (C): 24-28\r\nĐộ cứng nước (dH): 5-20\r\nĐộ pH: 6-8\r\nTầng nước ở: tầng đáy\r\nSinh sản: Cá đẻ trứng trên cây thủy sinh, thụ tinh ngoài \r\nHình thức nuôi: nuôi ghép với một số loại cá, nuôi đơn lẻ', 130000, 6879, 0, 1, 1),
(23, 'BETTAA2', 'CÁ BETTA XANH ĐEN', 1, 'Gần gũi với tự nhiên và biển cả nhất chính là giống cá betta với gam màu xanh độc đáo, đẹp mắt. Không hiểu vì sao nhưng khi sở hữu màu xanh biển, các chú betta dường như trở nên phát sáng và lớp vảy lấp lánh tựa như một dải ngân hà thu nhỏ trong bể cá vậy. Cá thường điểm thêm màu tím thơ mộng, chẳng hạn như dòng Koi demeter đang được bán tại cửa hàng Shopheo.com.', 100000, 458, 0, 1, 3),
(24, 'VAY-OC-DO', 'Vảy ốc đỏ dòng cây thủy sinh dễ trồng không cần co2', 2, 'Cây thủy sinh Vảy ốc đỏ là dòng cây dễ trồng thường được anh em chơi thủy sinh sử dụng làm trang trí bể cá, bể thủy sinh. Do đặc thù không cần co2 vẫn phát triển tốt nên Vảy ốc đỏ được rất nhiều anh em chơi thủy sinh yêu thích.', 25000, 764, 0, 1, 2),
(25, 'RAY-JAPAN', 'Ráy nana japan loại cây thủy sinh đẹp dễ chăm sóc', 2, 'Ráy nana japan là một trong những dòng cây thủy sinh đẹp, dễ trồng, dễ chăm sóc đặc biệt là ráy nana Japan có thể trồng được nhiều vị trí bên trong hồ thủy sinh.', 50000, 768, 0, 1, 3),
(26, 'NULL', 'Cây thủy sinh Thanh Đản Hồng', 2, 'Thanh Đản Hồng là dòng cây thủy sinh dễ trồng, dễ chăm sóc, bạn có thể dùng làm trang trí bể cá cảnh, bể thủy sinh đều rất đẹp. Thanh Đản Hồng cũng có thể trồng mà không cần đất nền.', 35000, 467, 0, 1, 1),
(27, 'NANA-WHITE', 'Ráy trắng Nana white hàng ngọn lẻ', 2, 'Nana white là một loại cây trồng thủy sinh thuộc họ ráy, có thể trộng cạn hoặc bán cạn đều được. Ráy trắng Nana white có những chiếc lá trắng tinh khôi tạo nên nét riêng biệt.', 90000, 475, 0, 1, 2),
(28, 'EVERRED1', 'Thức ăn cho cá cảnh La Hán XO EVER RED', 3, 'Thức ăn cho cá cảnh La Hán XO EVER RED được sản xuất tại Singapore hỗ trợ tăng màu cho cá La Hán và tăng kích thước đầu của cá.', 30000, 87, 0, 1, 1),
(29, 'NOVOTAB', 'Thức ăn viên dán cho cá cảnh JBL NOVO TAB', 3, 'JBL NOVO TAB là dạng thức ăn cho cá cảnh có hình dạng viên thuốc nén, có thể dán lên trên mặt kính hoặc thả xuống đáy phù hợp với nhiều dòng cá cảnh khác nhau.', 140000, 769, 0, 1, 3),
(30, '0KAGAYAKI', 'Thức ăn cho cá Koi Kagayaki Koi Food Growth', 3, 'Kagayaki Koi Food Growth là loại thức ăn dạng cám hạt chuyên hỗ trợ cho cá Koi kích màu sắc, phân dải màu chuẩn không bị lem có nguồn gốc Sigapore.', 500000, 54, 0, 1, 1),
(31, 'KOISR12', 'Thức ăn cho cá koi Sera Koi Professional Color tăng màu chuẩn', 3, 'Thức ăn cho cá koi Sera Koi Professional Color giúp cá tăng màu chuẩn ở các dải màu. Đây là loại thức ăn chuẩn mực cho cá Koi hỗ trợ toàn diện về thể chất cho những chú cá Koi.', 1650000, 37, 0, 1, 3),
(32, 'BELUCGIAC', 'Set bể cá mini hình lục giác cực đẹp Aquael Hexa Set Aquarium', 4, 'Aquael Hexa Set Aquarium là loại bể cá mini trọn bộ bao gồm đèn, hồ và lọc. Đây là mẫu bể cá mini vô cùng độc đáo với thiết kế hình lục giác mới lạ.', 3600000, 24, 0, 1, 2),
(33, 'BECAMINI', 'Mẫu bể cá mini nhập khẩu Aquael Classic Oval Aquarium Set 40', 4, 'Bể cá mini nhập khẩu Aquael Classic Oval Aquarium Set 40 được trang bị hồ, đèn, lọc nội bộ rất nhỏ gọn cho anh em chơi thủy sinh và cá cảnh.', 2100000, 45, 0, 1, 1),
(34, 'TX004', 'Hồ thuỷ sinh mini mẫu TX-004', 4, 'Đặc điểm nỗi bật của hồ thuỷ sinh mini để bàn mẫu TX-004:\r\nKích thước hồ: 35x20x23 (dài-rộng-cao)\r\nĐầy đủ phụ kiện, tặng kèm cá khi lắp đặt.\r\nDễ chăm sóc, dễ vệ sinh.\r\nSử dụng hồ kính Đúc nên rất an toàn khi có trẻ em.\r\nBố cục tươi mát, có thể nuôi thêm TÉP và ỐC cảnh.\r\nThuỷ sinh xanh hỗ trợ sửa chữa bảo hành.', 1200000, 32, 0, 1, 3),
(35, 'TX013', 'Hồ thuỷ sinh mini mẫu TX-013, Bố cục núi đá', 4, 'Đặc điểm nỗi bật của hồ thuỷ sinh mini để bàn mẫu TX-013:\r\nKích thước hồ: 60x35x40 (dài-rộng-cao)\r\nĐầy đủ phụ kiện, tặng kèm cá khi lắp đặt.\r\nDễ chăm sóc, dễ vệ sinh.\r\nSử dụng hồ kính Đúc nên rất an toàn khi có trẻ em.\r\nBố cục tươi mát, có thể nuôi thêm TÉP và ỐC cảnh.\r\nThuỷ sinh xanh hỗ trợ sửa chữa bảo hành.', 6000000, 54, 0, 1, 2),
(36, 'DF1000', 'Lọc thùng Atman DF-1000 thiết bị lọc cao cấp', 5, 'Lọc thùng Atman DF-1000 là sản phẩm thiết bị lọc cao cấp đến từ hãng nổi tiếng từ Trung Quốc, một hãng chuyên sản xuất phụ kiện thủy sinh và cá cảnh.', 1250000, 54, 0, 1, 3),
(37, 'HAILEA60', 'Máy sủi oxy dự phòng cúp điện Hailea CP60', 5, '', 1600000, 64, 0, 1, 2),
(38, 'NENGOMTHUYMOC', 'Nền gốm thủy mộc chuyên trang trí bể cá và thủy sinh', 6, 'Có lẽ những anh em chơi thủy sinh và cá cảnh đã không còn xa lạ với bộ nền gốm thủy mộc, nền gốm có đặc điểm nổi bật là một màu đỏ nhạt làm nổi bật cảnh vật bên trong hồ.', 20000, 6853, 0, 1, 2),
(39, 'MALE1', 'Vật liệu lọc Matrix', 6, 'Matrix là loại vật liệu lọc cao cấp của hãng Seachem, là loại đá lọc tự nhiên có cấu trúc mô xốp và bề mặt nhám làm nơi cư trú cho vi sinh cực kì hữu hiệu.', 240000, 356, 0, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `productID` int(11) NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`productID`, `image`) VALUES
(16, '1gpsyekubzmovhtfjcqrl69.jpg'),
(16, '2mdbjshatlcnxprzvikug386.jpg'),
(17, '1vajehkurlmobnpigtdzs775.jpg'),
(17, '2vajehkurlmobnpigtdzs775.jpg'),
(18, '1qwjvfumniklstzogehrp614.jpg'),
(19, '1runihdpmqcswtfvjbole126.jpg'),
(20, '1jrxuvnpizwcaelbmtskd475.jpg'),
(20, '2jrxuvnpizwcaelbmtskd475.jpg'),
(21, '1qnbgoxcdfymuivakzhjt880.jpg'),
(22, '1nvgirxopqfejkbzycswt264.jpg'),
(23, '1sgltojfmrwqdekyvuhni504.jpg'),
(24, '1crqjbgzpkhlsvtndyoma296.jpg'),
(24, '2crqjbgzpkhlsvtndyoma296.jpg'),
(25, '1hakbmzgscytnxwpejdfq97.jpg'),
(26, '1amfglhiyozpkruvswbed929.jpg'),
(26, '2amfglhiyozpkruvswbed929.jpg'),
(27, '1tzpwkgvcnhyubsormiad793.jpg'),
(27, '2tzpwkgvcnhyubsormiad793.jpg'),
(28, '1tcydnprqxbahkefijmzw781.jpg'),
(28, '2tcydnprqxbahkefijmzw781.jpg'),
(29, '1fhwdkjzpxqseuyabnmcv964.jpg'),
(29, '2fhwdkjzpxqseuyabnmcv964.jpg'),
(30, '1lpubxfazochjesgtqwyr370.jpg'),
(30, '2lpubxfazochjesgtqwyr370.jpg'),
(31, '1vwpyesajnluzfchbmkdg296.jpg'),
(31, '2vwpyesajnluzfchbmkdg296.jpg'),
(32, '1fhkdrjpgvxtwmibsauqz370.jpg'),
(32, '2fhkdrjpgvxtwmibsauqz370.jpg'),
(33, '1pemrinfuvhgsaqdcyjkz772.jpg'),
(34, '1nhdbgsefqacyzilkrvxj394.jpg'),
(34, '2nhdbgsefqacyzilkrvxj394.jpg'),
(35, '1fjgsvbuqaznoexymhkci865.jpg'),
(35, '2fjgsvbuqaznoexymhkci865.jpg'),
(36, '1frxwmgtuvijbcqzohady506.jpg'),
(36, '2frxwmgtuvijbcqzohady506.jpg'),
(37, '1nrcmjwkxvspyeiutgazl994.jpg'),
(38, '1sgxvzpilkaunecdtyrfw527.jpg'),
(39, '1pixjalhkncsbotmefgwv858.jpg'),
(39, '2pixjalhkncsbotmefgwv858.jpg');

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
(2, 'Dương Văn Công', 'duongcong', 'duongcong0412hc@gmail.com', '0123456789', 'Bắc Giang', '$2y$10$FgCMKIkt5pvdlSQTcXSQY.n3JyK66iVDZk8Zvj.eg2O9a8L8xo9V6', 1, 'ertujghki67r7iMKIyguSQTcXSQY.n3JyK66iVDZk8Zvj.eg2O9a8L8xo9V6', '2022-03-23 16:32:08'),
(3, 'Công Minh', 'congminh', 'congminh@gmail.com', '03547151268', 'Việt Nam', '$2y$10$UtJ82BrbjIEX0sQ8Vt5Yb.nP1IGKb6m6GFNbVP8GWkN7McGdfpD1K', 1, 'fed0fgu9814398c924fa37eacb36c62863', '2022-03-13 04:47:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`productID`,`image`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
