CREATE TABLE products (
  productID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  productSKU char(50) NOT NULL,
  productName varchar(1000) NOT NULL,
  category varchar(300) NOT NULL,
  detail varchar(5000) NOT NULL,
  price int(11) NOT NULL,
  stock int(11) NOT NULL,
  sold int(11) NOT NULL,
  status int(11) NOT NULL,
  image varchar(1000) NOT NULL,
  userID varchar(10) NOT NULL,
  FOREIGN KEY (userID) REFERENCES users(userID)
)

CREATE TABLE users (
  id int(11) NOT NULL,
  userID varchar(10) NOT NULL PRIMARY KEY,
  fullname varchar(250) NOT NULL,
  username varchar(30) NOT NULL,
  email varchar(100) NOT NULL,
  phone varchar(11) NOT NULL,
  address varchar(250) NOT NULL,
  password varchar(250) NOT NULL,
  status int(11) NOT NULL DEFAULT 0,
  email_verification_link varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL
)

INSERT INTO `users` (`id`, `userID`, `fullname`, `username`, `email`, `phone`, `address`, `password`, `status`, `email_verification_link`, `email_verified_at`) VALUES ('1', 'U001', 'Dương Văn Công', 'duongcong', 'duongcong0412hc@gmail.com', '0123456789', 'Bắc Giang', 'duongcong', '1', 'qwtegrhtẹ', '2022-03-23 23:32:08');


INSERT INTO `products` (`productID`, `productSKU`, `productName`, `category`, `detail`, `price`, `stock`, `sold`, `status`, `image`, `userID`) VALUES (NULL, 'CHIHIROS-A2', 'Đèn thủy sinh Chihiros A2 - Phù hợp với mọi loại cây', 'Thiết bị', 'Chihiros A2 version 2 là một phiên bản đèn hoàn hảo để dùng cho các loại cây thủy sinh hiện nay với mức giá nằm ở phân khúc thấp, nhưng hiệu quả lại rất cao.', '750000', '256', '4', '1', 'cá.jpg', 'U001');

INSERT INTO products (productID, productSKU, productName, category, detail, price, stock, sold, status, image, userID) VALUES (NULL, '', '', '', '', '', '', '', '', '', '');

