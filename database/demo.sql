CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(1000) NOT NULL,
  `type` varchar(50),
  `price` int(11),
  `detail` varchar(1000),
  `stock` int(11),
  `sold` int(11),
  `status` int(11),
  `id` int(11) NOT NULL,
  `itemImg` varchar(1000) NOT NULL
)