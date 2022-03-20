-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 05:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `idBill` int(11) NOT NULL COMMENT 'Hóa đơn',
  `idUser` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `total` float NOT NULL COMMENT 'Tổng tiền',
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập',
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`idBill`, `idUser`, `total`, `date`, `status`) VALUES
(16, 9, 1150, '2021-07-15 17:19:24', 1),
(17, 9, 35, '2021-07-15 20:25:39', 1),
(18, 9, 35, '2021-07-15 21:15:47', 1),
(19, 9, 390, '2021-07-16 07:56:51', 1),
(21, 12, 5016, '2021-08-03 10:50:07', 1),
(22, 13, 5016, '2021-08-09 05:55:24', 1),
(23, 13, 9516, '2021-08-09 05:55:55', 1),
(24, 13, 14532, '2021-08-09 05:56:15', 1),
(25, 13, 19032, '2021-08-09 05:56:34', 1),
(26, 13, 680, '2021-08-09 05:57:05', 1),
(27, 13, 1360, '2021-08-09 05:57:19', 0),
(28, 13, 7180, '2021-08-10 10:13:39', 0),
(29, 13, 3450, '2021-08-10 11:01:19', 1),
(30, 13, 8450, '2021-08-10 11:01:56', 1),
(31, 13, 6150, '2021-08-17 16:43:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billdetail`
--

CREATE TABLE `billdetail` (
  `idBillDetails` int(11) NOT NULL COMMENT 'Mã chi tiết hóa đơn',
  `idBill` int(11) NOT NULL COMMENT 'Mã hóa đơn',
  `idProductDetail` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `unitPrice` float NOT NULL COMMENT 'Đơn giá',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng',
  `discount` int(11) DEFAULT NULL COMMENT '% giảm giá',
  `subtotal` float NOT NULL COMMENT 'Thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billdetail`
--

INSERT INTO `billdetail` (`idBillDetails`, `idBill`, `idProductDetail`, `unitPrice`, `quantity`, `discount`, `subtotal`) VALUES
(13, 13, 84, 4500, 1, NULL, 4500),
(14, 13, 79, 1150, 1, NULL, 1150),
(15, 13, 83, 3900, 1, NULL, 3900),
(16, 14, 84, 4500, 1, NULL, 4500),
(17, 14, 79, 1150, 1, NULL, 1150),
(18, 14, 83, 3900, 1, NULL, 3900),
(19, 15, 87, 1980, 1, NULL, 1980),
(21, 15, 83, 3900, 1, NULL, 3900),
(22, 16, 79, 1150, 1, NULL, 1150),
(23, 17, 95, 35, 1, NULL, 35),
(24, 18, 95, 35, 1, NULL, 35),
(25, 19, 108, 390, 1, NULL, 390),
(26, 20, 95, 35, 2, NULL, 70),
(27, 21, 98, 5016, 1, NULL, 5016),
(28, 22, 98, 5016, 1, NULL, 5016),
(29, 23, 98, 5016, 1, NULL, 5016),
(30, 23, 84, 4500, 1, NULL, 4500),
(31, 24, 98, 5016, 2, NULL, 10032),
(32, 24, 84, 4500, 1, NULL, 4500),
(33, 25, 98, 5016, 2, NULL, 10032),
(34, 25, 84, 4500, 2, NULL, 9000),
(35, 26, 85, 680, 1, NULL, 680),
(36, 27, 85, 680, 2, NULL, 1360),
(37, 28, 85, 680, 1, NULL, 680),
(38, 28, 88, 1500, 1, NULL, 1500),
(39, 28, 80, 5000, 1, NULL, 5000),
(40, 29, 79, 1150, 3, NULL, 3450),
(41, 30, 79, 1150, 3, NULL, 3450),
(42, 30, 80, 5000, 1, NULL, 5000),
(43, 31, 79, 1150, 1, NULL, 1150),
(44, 31, 80, 5000, 1, NULL, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL COMMENT 'Mã loại sản phẩm',
  `nameCategory` varchar(50) NOT NULL COMMENT 'Tên loại sản phẩm ( shirt, sweater,…)',
  `idGroupProduct` int(11) NOT NULL COMMENT 'Nhóm sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`, `idGroupProduct`) VALUES
(1, 'T-shirt', 1),
(2, 'Áo khoác', 1),
(3, 'Sweater', 1),
(4, 'Jeans', 2),
(5, 'Baggy', 2),
(7, 'Sneakers', 3),
(8, 'Giày lười', 3),
(9, 'Thắt lưng', 4),
(10, 'Phụ kiện công nghệ', 4),
(11, 'Kính râm', 4),
(12, 'Đồng hồ cổ điển', 5),
(13, 'Đồng hồ thông minh', 5),
(14, 'Đồng hồ Rolex', 5),
(15, 'Pants', 2),
(16, 'Vòng đeo', 4),
(17, 'Nhẫn', 4),
(18, 'Túi Xách', 4),
(19, 'Áo khoác ngoài', 1),
(20, 'Quần Short nam', 6),
(21, 'Ba lô vải', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL COMMENT 'id comment',
  `idUser` int(11) NOT NULL COMMENT 'id user',
  `content` varchar(100) NOT NULL COMMENT 'content',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(Default: 0- unapproved, 1-approved) ',
  `idProduct` int(11) NOT NULL COMMENT 'id Product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groupproduct`
--

CREATE TABLE `groupproduct` (
  `idGroupProduct` int(11) NOT NULL COMMENT 'Mã nhóm sản phẩm',
  `nameGroupProduct` varchar(50) NOT NULL COMMENT 'Tên nhóm sản phẩm ( áo, quần,…)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupproduct`
--

INSERT INTO `groupproduct` (`idGroupProduct`, `nameGroupProduct`) VALUES
(1, 'Shirt'),
(2, 'Quần'),
(3, 'Giày'),
(4, 'Phụ kiện'),
(5, 'Đồng hồ'),
(6, 'Quần Short'),
(7, 'Balo');

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `idProductDetail` int(11) NOT NULL COMMENT 'id Product Detail',
  `idProduct` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `price` double NOT NULL COMMENT 'Giá',
  `oldPrice` double NOT NULL COMMENT 'Old price',
  `imgUrl` text DEFAULT NULL COMMENT 'Ảnh sản phẩm',
  `quantity` int(50) NOT NULL COMMENT 'Số lượng chi tiết sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`idProductDetail`, `idProduct`, `price`, `oldPrice`, `imgUrl`, `quantity`) VALUES
(79, 33, 1150, 1450, 'louis-vuitton-cloud-print-t-shirt-ready-to-wear--HJY79WNPG617_PM2_Front view.webp', 15),
(80, 34, 5000, 7500, 'louis-vuitton-sculptural-jacket-ready-to-wear--HJJ75WTCX900_PM2_Front view.webp', 22),
(81, 35, 2330, 2900, 'louis-vuitton-clouds-90s-slim-pants-ready-to-wear--HJP70WYFE600_PM2_Front view.webp', 9),
(83, 36, 3900, 4400, 'louis-vuitton-giant-damier-waves-monogram-denim-jacket-ready-to-wear--HJA10WUZC650_PM2_Front view.webp', 5),
(84, 37, 4500, 4700, 'louis-vuitton-tambour-slim-monogram-watches-and-jewellery--QBB162_PM2_Front view.webp', 4),
(85, 38, 680, 700, '429446_02JP0_9064_002_100_0000_Light-Mens-Ace-embroidered-sneaker.png', 16),
(87, 39, 1980, 2080, '636706_HUHHG_8565_001_080_0000_Light-Jackie-1961-small-hobo-bag.jpg', 25),
(88, 40, 1500, 1620, '638043_XJCZ8_4581_001_100_0000_Light-Online-Exclusive-Gucci-Liberty-sweatshirt.jpg', 9),
(89, 41, 980, 1500, '636396_4G355_9575_002_100_0000_Light-FakeNot-print-GG-nylon-cape.jpg', 13),
(90, 34, 5000, 6500, 'louis-vuitton-sculptural-jacket-ready-to-wear--HJJ75WTCX900_PM1_Detail view.webp', 10),
(92, 43, 18, 25, 'HNS_GT78H586826_Scarlet_Coed.jpg', 16),
(94, 45, 1280, 1315, 'louis-vuitton-time-out-sneaker-shoes--AK3U1ASL33_PM2_Front view.webp', 5),
(95, 47, 35, 40, 'simple1.jpeg', 100),
(96, 44, 1800, 1900, 'Medium-620613Y3A434000_A.jpg', 7),
(97, 42, 30, 35, '8435327808_1_1_1.webp', 5),
(98, 102, 5016, 6010, 'lv-volt-one-small-pendant-yellow-gold-and-diamond-jewellery - Q93805_PM2_Front view.jpg', 1),
(99, 103, 1000, 1140, 'lv-volt-one-band-ring-yellow-gold-and-diamond-jewellery - Q9O58A_PM2_Front view.jpg', 10),
(100, 104, 1000, 1400, 'lv-volt-multi-bracelet-yellow-gold-jewellery - Q95954_PM2_Front view.jpg', 5),
(101, 105, 1200, 1350, '1024x1536SCHzR7tj8fCM6f5yLXn7tbZeOdyGJXXamyD04dZM.jpeg', 15),
(102, 106, 1500, 1650, '1024x1536xiDZo6KdeQflvsu15aOXHcH0SUSlhoMqkSnZgl8I.jpeg', 2),
(103, 107, 525, 600, '1024x15368r5TYuPypSlu2adnSN4xhs4Dbx7Y2fTfu5ldSTgY.jpeg', 30),
(104, 108, 336, 350, '1024x1536D2rMRDmvhyLTz7e6IlGeT3TKwuyFYMNExZDOuDAu.jpeg', 30),
(105, 109, 720, 810, '1024x1536cj0KEjcBIrhGSdhR7N0r0diB9WY9nVzqiDHRJK7p.jpeg', 10),
(106, 110, 1145, 1200, 'tui-xach-burberry-mini-quilted-lola-shoulder-bag-mau-den-60e8173706dd7-09072021163031.jpg', 5),
(107, 111, 5321, 5600, 'giay-burberry-checked-suede-calfskin-sneaker-5cb068d21a4cf-12042019173042.jpg', 2),
(108, 112, 390, 260, 'ao-phong-burberry-logo-print-t-shirt-mau-trang-5e62108e368ae-06032020155750.jpg', 160),
(109, 113, 500, 520, '3213820032_6_1_1.webp', 20),
(110, 114, 30, 35, '3362720010_6_1_1.webp', 200),
(111, 115, 560, 580, '2501820500_6_1_1.webp', 12),
(112, 119, 3000000, 3500000, 'gucci-rhyton.jpg', 3),
(113, 120, 2300000, 2500000, 'áo chuột.jpg', 3),
(114, 121, 8600000, 9000000, 'Thom-Browne-Grosgrain-Armbands.jpg', 2),
(115, 122, 4000000, 4500000, 'that-lung-gucci.webp', 2),
(116, 123, 500000, 550000, 'ao-somi-mrsimple.jpeg', 2),
(117, 124, 4000000, 4500000, 'zara-ao-khoac.jpg', 2),
(118, 125, 2300000, 2500000, 'ao-thun-zara-nam.jpg', 2),
(119, 126, 2300000, 2500000, 'áo-khoac-zara-2.jpg', 2),
(120, 127, 500000, 550000, 'ao-khoac-zara-3.jpg', 2),
(121, 128, 2300000, 2500000, 'polo-Zara.jpg', 2),
(122, 129, 2300000, 2500000, 'tee-champion-den.jpg', 2),
(123, 130, 500000, 550000, 'tee-champion-trang.jfif', 2),
(124, 131, 4000000, 4500000, 'hoodie-champion-den.jpg', 5),
(125, 132, 3000000, 3500000, 'Hoodie-Champion-do.jpg', 7),
(126, 133, 2300000, 2500000, 'hoodie-champion-xanh.webp', 9),
(127, 134, 2300000, 2500000, 'tee-champiom.jfif', 9),
(128, 135, 3000000, 3500000, 'mũ-champion.jpg', 6),
(129, 136, 500000, 550000, 'burberrry-non.jpg', 5),
(130, 137, 400000, 550000, 'burberrry-mask.jpg', 6),
(131, 138, 11600000, 12000000, 'SL.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `nameProduct` varchar(50) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `idCategory` int(11) NOT NULL COMMENT 'Loại sản phẩm',
  `idBrand` int(11) NOT NULL COMMENT 'Thương hiệu',
  `flashSale` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'flash sale',
  `note` int(10) NOT NULL COMMENT '% discount',
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày ra mắt',
  `description` varchar(300) NOT NULL COMMENT 'Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `nameProduct`, `idCategory`, `idBrand`, `flashSale`, `note`, `date`, `description`) VALUES
(33, 'Áo Thun Louis Vuitton', 1, 1, 1, 10, '2020-12-02 13:49:13', 'Với họa tiết Đám mây đồ họa, chiếc áo phông này mang chủ đề Thiên đường trên Trái đất của mùa. Thiết kế được in kỹ thuật số trên áo bông nhẹ, tạo cảm giác thủ công cổ điển. Được thiết kế vừa vặn, chiếc đồng hồ có chữ ký LV Cloud kín đáo.'),
(34, 'Áo khoác SCULPTURAL JACKET Louis Vuitton', 19, 1, 1, 35, '2020-12-02 14:17:44', 'Phần đặc biệt này giúp tái cấu trúc bộ sưu tập các quy tắc ăn mặc của công ty, với một phiên bản cải tiến của áo khoác vest truyền thống. Được may từ sợi len vừa vặn, nó được chia thành nhiều mảnh và được ráp lại bằng sợi thêu, tạo ra hiệu ứng điêu khắc. Mặt sau được ký với một Hoa LV nạm.'),
(35, 'Quần ôm Clouds 90s Louis Vuitton', 15, 1, 1, 23, '2020-12-02 14:19:47', 'Tác phẩm này tái hiện lại chủ đề thiên đường trên trái đất của mùa trong hình dạng chiếc quần mang tính biểu tượng của bộ sưu tập: một chiếc quần vừa vặn với điếu thuốc. vải pha len được in nổi với chữ nổi của louis vuitton và được tô điểm bằng họa tiết những đám mây đồ họa. quần có thể được kết hợp'),
(36, 'Áo Giant Damier Waves Denim', 1, 1, 0, 5, '2020-12-02 15:41:30', 'Được thiết kế với sự hợp tác của nhà thiết kế mang tính biểu tượng của Nhật Bản Nigo, mẫu denim này mang đến sự chắp vá các chữ ký của Louis Vuitton. Nó được làm thủ công từ hai loại vải jacquard denim, một loại được trang trí bằng Monogram và một có họa tiết Damier khổng lồ. Các đường may gợn sóng '),
(37, 'Đồng hồ Tambour Slim Monogram', 12, 1, 0, 5, '2020-12-02 16:28:16', 'Hãy biến chiếc đồng hồ Tambour của riêng bạn. Chọn một dây đeo có thể hoán đổi cho nhau từ nhiều màu sắc và chất liệu, đồng thời thay đổi nhanh chóng và dễ dàng bằng một dây đeo bổ sung để phù hợp với phong cách của riêng bạn.'),
(38, 'Giày sneaker nam Ace', 7, 2, 0, 5, '2020-12-02 16:40:31', 'Giày sneaker Ace cổ thấp bằng da được tô điểm bằng hình con ong thêu vàng trên nền sọc Web. Con ong là một mã lưu trữ lần đầu tiên được giới thiệu trong trang phục may sẵn của Gucci vào những năm 1970.'),
(39, 'Túi Jackie 1961 Small Hobo Bag', 18, 2, 0, 5, '2020-12-08 15:26:28', 'Việc giới thiệu lại chiếc túi Jackie cho mùa Thu Đông 2020 thể hiện một hình ảnh mới về một biểu tượng lịch sử của Gucci. Được đưa trở lại vị trí hàng đầu, hình dạng dễ nhận biết được thể hiện bằng da đen và được tăng cường với một dây đeo vai bổ sung, có thể tháo rời. Được gắn vào túi bằng khóa đón'),
(40, ' Áo khoác Gucci Liberty', 3, 2, 0, 7, '2020-12-08 15:31:00', 'Trong sự hợp tác độc quyền cho mùa Thu Đông 2020, các họa tiết in hoa mang tính biểu tượng của Liberty London xác định bộ sưu tập phụ kiện Gucci và các kiểu quần áo may sẵn. Với bộ sưu tập đồ trang trí, vải và đồ trang sức cao cấp từ khắp nơi trên thế giới, cửa hàng bách hóa sang trọng phục hưng Tud'),
(41, 'Áo choàng nylon GG in \'Fake / Not\'', 2, 2, 0, 5, '2020-12-08 15:35:12', 'Một chiếc áo choàng có mũ trùm đầu được làm bằng nylon in GG. Chữ in hoa mỉa mai \'Fake\' chống lại việc diễn giải lại sọc Web màu xanh lá cây và màu đỏ, một mã đặc biệt từ các kho lưu trữ. Hoàn thành phần chơi chữ, chữ in \'Not\' được hiển thị ở phía bên kia.'),
(42, 'Dây chuyền CHUNKY', 16, 8, 0, 3, '2020-12-08 20:03:54', 'BẠC - 8435/327\r\n\r\nMặt hàng này có các điều kiện đặc biệt để trả lại\r\n\r\nChuỗi dày bằng kim loại có liên kết. Thắt lưng buộc chặt tôm hùm.\r\n'),
(43, 'Áo thun tay dài JERSEY - Đỏ', 1, 3, 0, 5, '2020-12-08 20:28:39', 'Áo thun nam dài tay cần thiết mà bạn cần trong đội hình của mình, nó đủ lớp nhưng vẫn đủ nặng để mặc một mình. Đồ họa phiên bản đặc biệt cho một phong cách thể thao mới mẻ. Một phần trong sáng kiến ​​Champion® Made của chúng tôi, Áo thun Jersey dài tay của chúng tôi được làm bằng bông trồng tại Hoa '),
(44, 'Áo khoác nữ DOUBLE-BREASTED BLAZER Xanh', 19, 5, 0, 6, '2020-12-08 20:31:51', 'Áo hai dây màu xanh navy của Saint Laurent. Làm bằng len. Được cắt tỉa bằng cashmere. Gắn chặt với các nút trang trí trong tông màu vàng. Túi trượt và hai nắp túi ở mặt trước. Lót lụa đen. Màu sắc: xanh lam'),
(45, 'Giày TIME OUT SNEAKER', 7, 1, 0, 7, '2020-12-08 20:34:48', 'Giày sneaker Time Out của Louis Vuitton được tái hiện bằng chất liệu da bê mềm mại, được dập chìm với chữ Monogram mang tính biểu tượng để tạo ra một họa tiết nổi. Trang trí bằng vải chữ nổi ở phía sau bổ sung cho thiết kế giàu chi tiết này, cũng có các khoen màu vàng được chạm khắc. Đế ngoài của đô'),
(47, 'Áo Jacket Kaki 2 túi hộp xanh NAVY - Bản giới hạn', 1, 7, 0, 20, '2021-07-15 23:05:11', 'Áo Jacket 2 túi vải kaki - điểm nổi bật ở loại vải này chính là cảm giác thoáng khí mát mẻ, cấu trúc chắc chắn bền bỉ, ít nhăn và không xù lông. Áo form relaxed fit rộng rãi thoải mái cực thích hợp để làm 1 chiếc áo sơ mi khoác ngoài, hoặc một chiếc áo khoác trong mùa hè này. Áo có logo ở Mr Simple '),
(102, 'Vòng đeo cổ Louis Vuitton Vàng - Kim Cương', 16, 1, 1, 15, '2021-07-16 11:02:47', 'Là một phần của bộ sưu tập LV Volt dành cho nam và nữ, để tôn vinh năng lượng và nhịp điệu của các chữ cái đầu của LV, mặt dây chuyền nhỏ LV Volt được chế tác từ vàng 18 karat và được treo trên một dây chuyền có thể điều chỉnh được. Chữ L lớn chứa một chữ V nhỏ, bên trong là một viên kim cương rực r'),
(103, 'Nhẫn Vàng - Kim Cương Louis Vuitton', 17, 1, 1, 10, '2021-07-16 11:23:50', 'Lấy cảm hứng từ năng lượng và nhịp điệu, chiếc nhẫn LV Volt bằng vàng 18 karat tôn vinh chữ viết tắt của LV: một chữ V nhỏ, đính một viên kim cương rực rỡ, được tích hợp trong một chữ L. lớn hơn. Các lát cắt sắc nét của thiết kế mang lại sự mạnh mẽ và hiện đại cho đồng hồ Chữ ký. Các mảnh từ bộ sưu '),
(104, 'Vòng tay vàng Mr.Simple', 16, 7, 1, 10, '2021-07-16 11:27:30', 'Chiếc vòng tay Mr Simple bằng vàng 18 karat thuộc bộ sưu tập MR, nhằm tôn vinh năng lượng của các chữ cái đầu MR. Trên thiết kế này, chữ M và R tách ra và lặp lại đều đặn, tạo ra một nhịp độ mượt mà. Chiếc vòng tay này dành cho cả nam và nữ rất lý tưởng để xếp chồng lên nhau và có thể tạo kiểu'),
(105, 'Quần jean nam có wax', 4, 7, 0, 0, '2021-07-16 11:31:16', 'Quần Jean Nam chất liệu Cotton pha Poly dày dặn vừa đủ đồng thời chất vải có co giãn nhẹ. Form short skinny ôm chân , tôn dáng người mặc.\r\nQuần jean màu xanh nhạt nhẹ nhàng, có wax rách nhẹ ở đùi và ống chân. Nút quần chất liệu innox cơ bản.'),
(106, 'Áo Blazer 6 nút sọc xám', 19, 7, 0, 0, '2021-07-16 11:33:36', 'ÁO BLAZER 6 NÚT SỌC XÁM Với sắc màu trung tính, bạn có thể dễ dàng phối hợp chiếc áo blazer này cùng các loại trang phục sáng hoặc tối, anh chàng bảnh bao khi kết hợp chúng cùng quần trắng trơn cũng như màu đen truyền thống.'),
(107, 'Quần Short nam wax ', 20, 7, 0, 0, '2021-07-16 11:35:47', 'hort jean Mr Simple chất liệu vải jean dày dặn có co giãn nhẹ, form slimfit ôm chân vừa vặn, quần có wax 2 bên đùi, cắt lai. Sẽ là một chiếc quần must have vào mùa hè này, vừa thoải mái tiện dụng lại có thể mix match được với rất nhiều items khác nhau, chọn cho mình một chiếc thôi nào.'),
(108, 'Áo thun Mr.Simple phiên bản mới', 1, 7, 0, 0, '2021-07-16 11:43:41', 'Dòng áo mucle fit T-shirt đã và đang được sự yêu thích từ các thành viên Mr Simple với tính ứng dụng cao và đặc biệt là form dáng rất chuẩn, rất tôn dáng khiến ai khi mặc vào cũng thích mê. Nay ra mắt với phiên bản mới được nâng cấp chất liệu lên từ form áo cũ, chất liệu mới này có độ dày dặn nhất đ'),
(109, 'Áo thun nam Mr.Simple Raglan', 1, 7, 0, 0, '2021-07-16 11:45:02', 'Áo thun chất liệu Cotton 100% vải thun mềm mịn rất xịn xò, áo raglan đen tay trắng có bo chun ở cổ và viền đen ở tay áo. Form muscle fit Gen 1 ôm body tôn dáng cực chuẩn,chọn vừa size để tôn dáng hoặc lên 1 size để thoải mái hơn. Áo có logo Mr Simple ở ngực in nổi bật trên nền áo đen.'),
(110, 'Túi Xách Burberry Mini Quilted Lola Shoulder Bag M', 18, 6, 0, 0, '2021-07-16 12:00:58', 'Túi Xách Burberry Mini Quilted Lola Shoulder Bag Màu Đen là chiếc túi xách thời trang dành cho nữ đến từ thương hiệu Burberry nổi tiếng. Túi được làm từ chất liệu cao cấp bền đẹp trong suốt quá trình sử dụng.'),
(111, 'Giày Thể Thao Burberry Checked Suede Calfskin Snea', 7, 6, 0, 10, '2021-07-16 12:11:59', 'Một mẫu giày Burberry Checked Suede Calfskin Sneaker mang họa tiết Checked (kẻ ô) truyền thống từ hãng Burberry - mẫu họa tiết thời thượng ở mọi thời đại.\r\nThiết kế đầy thanh lịch, khỏe khoắn và năng động với sự kết hợp giữa những mảnh cắt da bê mịn, da lộn và họa tiết kẻ ô \"Novacheck\" màu: trắng, b'),
(112, 'Áo Phông Burberry Logo Print T-Shirt Màu Trắng', 1, 6, 0, 12, '2021-07-16 12:15:37', 'Một chiếc áo phông cotton cổ điển được gắn logo của chúng tôi với chữ cái tương phản.\r\nChiều dài áo: 75cm / 29.5in. Điều này dựa trên kích thước UK M vì tỷ lệ thay đổi một chút theo kích thước.\r\nChiều cao của mô hình: 188cm / 6ft 2in. Người mẫu mặc size UK M.\r\n100% chất liệu cotton'),
(113, 'Ba lô vải Zara', 21, 4, 0, 10, '2021-07-16 12:21:57', 'Ba lô màu trơn. chất liệu vải dệt. ngăn chính cài khóa kéo, bên trong có hai ngăn nhỏ hơn. có một ngăn cài khóa kéo phía trước. mỗi bên thân có một ngăn có nắp cài băng khóa nhám. có một quai xách tay và hai quai đeo vai. có nhiều màu để lựa chọn.\r\ncao x rộng x sâu: 45 x 31 x 18 cm.'),
(114, 'Túi xách gập gọn Zara', 18, 4, 0, 13, '2021-07-16 12:24:34', 'Túi xách. thân túi bằng vải, có thể gập gọn. bên trong ngăn chính có một ngăn nhỏ. có hai quai đeo vai. kèm một túi vải cài khóa kéo, có thể dùng để đựng túi đã gập gọn hoặc dùng như túi đựng đồ cá nhân. có nhiều màu để lựa chọn.'),
(115, 'Giày da lộn Zara', 8, 4, 0, 10, '2021-07-16 12:27:08', 'Giày Blucher da lộn. có nhiều màu để lựa chọn. có dây buộc với 4 hàng lỗ xỏ dây. Chần chỉ nổi trên thân giày. đế có rãnh răng cưa. Khuôn tròn. '),
(118, 'Rhyton Logo Gucci  _ Giày Rhyton Logo Gucci', 7, 2, 0, 0, '2021-08-09 10:59:06', 'Giày sneaker nam với dáng đế thời thượng, giúp bạn trở nên phong cách và ấn tượng hơn'),
(119, 'Rhyton Logo Gucci  _ Giày Rhyton Logo Gucci', 7, 2, 0, 5, '2021-08-10 00:39:37', 'Giày sneaker với phần đế được thiết kế theo phong cách hiện đại, đem lại phonh cách đặc biệt cho người manng'),
(120, 'Áo thun Gucci họa tiết chuột Mickey', 1, 2, 0, 5, '2021-08-10 00:44:28', 'ÁO PHÔNG GUCCI X DISNEY MICKEY MOUSE CHUẨN AUTHENTIC'),
(121, 'Áo Sơ Mi Thom Browne Grosgrain Armbands', 1, 2, 0, 5, '2021-08-10 00:47:49', 'Nổi tiếng với những bộ suits được may đo tuyệt hảo, Thom Browne là thương hiệu thời trang nam mà mọi quý ông đều biết tới. Với cuộc cách mạng về âu phục của Thom Browne, những bộ suit không chỉ giới hạn trong một sắc thái nghiêm cẩn, đứng đắn và đôi phần cứng nhắc mà trở nên gần gũi, quyến rũ và hiệ'),
(122, 'Thắt lưng Gucci chính hãng', 9, 2, 0, 5, '2021-08-10 00:52:13', 'Thắt lưng được làm từ da cá sấu nguyên chất với dấu ấn từ logo Gucci tinh tế'),
(123, 'Áo sơ mi trắng Mr.Simple', 1, 7, 0, 5, '2021-08-10 00:55:23', 'Áo sơ mi form slim fit phiên bản Classic Edtion.  Cổ áo nhọn cổ điển với độ mở cổ áo hẹp luôn phù hợp với những trang phục công sở hàng ngày của phái mạnh. Chính vì vậy, bạn cũng không cần lo ngại khi diện áo sơ mi nhọn cổ điển. \r\n\r\nSản phẩm có độ bền cao vì sợi vải rất nhỏ với mật độ dày đặc và độ '),
(124, 'Áo khoác Zara', 2, 4, 0, 5, '2021-08-10 01:00:09', 'Áo khoác Zara túi hộp với chất liệu vải kaki cao cấp'),
(125, 'Áo Polo Zara ', 1, 4, 0, 5, '2021-08-10 01:03:23', 'Áo Polo Zara chính hãng với chất liệu cá sấu thoáng mát và mềm mại. Giúp cho bạn trở nên lịch lãm và năng động hơn'),
(126, 'Áo khoác bomber Zara ', 2, 4, 0, 5, '2021-08-10 01:06:06', 'Áo khoác Bomber Zara chính hãng'),
(127, 'Áo khoác Jean Zara', 2, 4, 0, 5, '2021-08-10 01:07:44', 'Áo khoác Denim Zara giúp bạn trở nên phong trần và lãng tử hơn'),
(128, 'Polo Zara có viền cổ', 1, 4, 0, 5, '2021-08-10 01:09:57', 'Áo Polo Zara với màu trắng tinh tế cùng viền cổ phối màu đen đem đến sự phá cách cho chiếc áo của bạn'),
(129, 'Tee Champion Đen', 1, 3, 0, 5, '2021-08-10 01:14:32', 'Áo Tee Champion chính hãng màu đen đơn giản dễ phối đồ'),
(130, 'Tee Champion Trắng', 1, 3, 0, 5, '2021-08-10 01:27:02', 'Tee trắng đến từ thương hiệu Champion. Đơn giản và rất dễ phối quần áo. Đem lại sự trẻ trung cho bạn'),
(131, 'Hoodie Champion màu đen', 2, 3, 0, 5, '2021-08-10 01:29:44', 'Phong cách:	Đường phố\r\nMàu sắc:	Màu đen\r\nKiểu mẫu:	Logo\r\nChiều dài:	Thường xuyên\r\nMùa:	Mùa Xuân/ Mùa Thu\r\nKiểu:	Áo chui\r\nChi tiết:	Dây kéo\r\nLoại Phù hợp:	Phù hợp thường\r\nViền:	áo có mũ\r\nChiều dài tay:	Tay áo dài\r\nLoại tay áo:	Tay thường\r\nMỏng:	Không\r\nVật liệu:	Bông\r\nThành phần:	100% Bông\r\nSợi vải:	C'),
(132, 'Hoodie Champion màu đỏ', 2, 3, 0, 5, '2021-08-10 01:31:14', 'Phong cách:	Đường phố\r\nMàu sắc:	Màu đỏ\r\nKiểu mẫu:	Logo\r\nChiều dài:	Thường xuyên\r\nMùa:	Mùa Xuân/ Mùa Thu\r\nKiểu:	Áo chui\r\nChi tiết:	Dây kéo\r\nLoại Phù hợp:	Phù hợp thường\r\nViền:	áo có mũ\r\nChiều dài tay:	Tay áo dài\r\nLoại tay áo:	Tay thường\r\nMỏng:	Không\r\nVật liệu:	Bông\r\nThành phần:	100% Bông\r\nSợi vải:	Că'),
(133, 'Hoodie Champion màu xanh dương', 2, 3, 0, 5, '2021-08-10 01:32:26', 'Phong cách:	Đường phố\r\nMàu sắc:	Màu xanh\r\nKiểu mẫu:	Logo\r\nChiều dài:	Thường xuyên\r\nMùa:	Mùa Xuân/ Mùa Thu\r\nKiểu:	Áo chui\r\nChi tiết:	Dây kéo\r\nLoại Phù hợp:	Phù hợp thường\r\nViền:	áo có mũ\r\nChiều dài tay:	Tay áo dài\r\nLoại tay áo:	Tay thường\r\nMỏng:	Không\r\nVật liệu:	Bông\r\nThành phần:	100% Bông\r\nSợi vải:	'),
(134, 'Tee Champion đặc biệt', 21, 3, 0, 5, '2021-08-10 01:34:32', 'Áo thun dáng tee với logo Champion được cách điệu với màu cầu vòng'),
(135, 'Mũ Champion', 10, 3, 0, 5, '2021-08-10 01:38:38', 'Mũ Champion chính hãng'),
(136, 'Nón Bucket Burberry', 10, 6, 0, 10, '2021-08-10 01:52:40', 'Nón bucket Burberry chính hãng phù hợp đi chơi, đi biển'),
(137, 'Khẩu trang Burberry', 10, 6, 0, 5, '2021-08-10 01:54:49', 'Khẩu trang Burberry-chống Covid  mà vẫn sang'),
(138, 'Saint Laurent Court Sneakers', 7, 5, 0, 5, '2021-08-10 01:57:35', '[Hàng Có Sẵn]\r\n\r\nMàu sắc: Kem/Đen\r\n\r\nHãng sản xuất: Saint Laurent\r\n\r\nNơi sản xuất: Italy\r\n\r\nChất liệu: Canvas\r\n\r\nMùa: SS2021');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `idRating` int(11) NOT NULL COMMENT 'id rating',
  `points` tinyint(4) NOT NULL COMMENT 'points rating',
  `idProduct` int(11) NOT NULL COMMENT 'id Product',
  `idUser` int(11) NOT NULL COMMENT 'id user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `idReport` int(11) NOT NULL COMMENT 'Mã report',
  `date` datetime NOT NULL COMMENT 'Ngày xuất report',
  `link` varchar(150) NOT NULL COMMENT 'link report'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL COMMENT 'id role',
  `level` varchar(20) NOT NULL COMMENT 'Chức vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `level`) VALUES
(1, 'Quản trị'),
(2, 'Giữ xe'),
(3, 'Lao công'),
(4, 'Thành viên');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `fullName` varchar(50) DEFAULT NULL COMMENT 'Tên khách hàng',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ',
  `phoneNumber` varchar(15) DEFAULT NULL COMMENT 'Số điện thoại',
  `dateOfBirth` date NOT NULL COMMENT 'Ngày sinh',
  `username` varchar(50) NOT NULL COMMENT 'tài khoản',
  `password` varchar(200) NOT NULL COMMENT 'mật khẩu',
  `idRole` int(11) NOT NULL COMMENT 'id Role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `fullName`, `email`, `address`, `phoneNumber`, `dateOfBirth`, `username`, `password`, `idRole`) VALUES
(9, 'Phạm Thị Nhung', 'kinhbach999@gmail.com', 'quận 12', '0387500411', '1992-11-11', 'nhungpham', '56c5cc15600407c080bebbab4f232c20', 4),
(12, 'Kính', 'kinhbach2402@gmail.com', 'Hồ Chí Minh', '0344334303', '2001-02-24', 'kinhbach', '4dd9cec1c21bc54eecb53786a2c5fa09', 1),
(13, 'Nguyệt', 'Nguyetvo1305@gmail.com', 'Ho Chi Minh City', '0978261116', '2000-06-18', 'nguyet23', 'c8b1fbf78770d50d829e7e0e013320dd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `FK_bill_user` (`idUser`);

--
-- Indexes for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`idBillDetails`),
  ADD KEY `FK_billdetail_bill` (`idBill`),
  ADD KEY `FK_billdetail_productdetail` (`idProductDetail`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`),
  ADD KEY `FK_category_groupproduct` (`idGroupProduct`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_comment_products` (`idProduct`),
  ADD KEY `FK_comment_user` (`idUser`);

--
-- Indexes for table `groupproduct`
--
ALTER TABLE `groupproduct`
  ADD PRIMARY KEY (`idGroupProduct`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`idProductDetail`),
  ADD KEY `FK_productdetail_products` (`idProduct`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `FK_products_category` (`idCategory`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idRating`),
  ADD KEY `FK_rating_user` (`idUser`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idReport`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_user_role` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Hóa đơn', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `idBillDetails` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết hóa đơn', AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại sản phẩm', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id comment', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groupproduct`
--
ALTER TABLE `groupproduct`
  MODIFY `idGroupProduct` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm sản phẩm', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `idProductDetail` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Product Detail', AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `idRating` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id rating', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã report';

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id role', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_bill_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `FK_billdetail_productdetail` FOREIGN KEY (`idProductDetail`) REFERENCES `productdetail` (`idProductDetail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_category_groupproduct` FOREIGN KEY (`idGroupProduct`) REFERENCES `groupproduct` (`idGroupProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_products` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `FK_productdetail_products` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_brand` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idThuongHieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_rating_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
