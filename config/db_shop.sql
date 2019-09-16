-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 07:55 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Tarek Hossain', 'admin', 'admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Acer'),
(2, 'SAMSUNG'),
(3, 'Canon'),
(4, 'HITACHI'),
(5, 'CONION'),
(6, 'SHARP'),
(7, 'OPPO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(10, '6ba6bt2kavaepdfrl8ijs3dfd3', 14, 'Hitachi Refrigerator R H210PG6 SLS', 40.00, 1, 'uploads/83f8b297e7.jpg'),
(11, 'kj2bgp3slgtiqjhuu211unn6ei', 14, 'Hitachi Refrigerator R H210PG6 SLS', 40.00, 1, 'uploads/83f8b297e7.jpg'),
(12, 'audknhlkrt2solfgu9ldu00pop', 14, 'Hitachi Refrigerator R H210PG6 SLS', 40.00, 1, 'uploads/83f8b297e7.jpg'),
(13, '5vth6tdenn68psdbdl9fg1hegl', 18, 'Panasonic Split Type AC ECONAVI', 106.00, 1, 'uploads/656c1df867.jpg'),
(16, 'je1fivj9htfsk1s8a5dbfvsa98', 14, 'Hitachi Refrigerator R H210PG6 SLS', 40.00, 1, 'uploads/83f8b297e7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(4, 'Laptop'),
(5, 'Mobile Phones'),
(6, 'Accessories'),
(7, 'Software'),
(8, 'Sports &amp; Fitness'),
(9, 'Footwear'),
(10, 'Jewellery'),
(11, 'Clothing'),
(12, 'Home Decor &amp; Kitchen'),
(13, 'Beauty &amp; Healthcare'),
(14, 'Toys, Kids &amp; Babies'),
(15, 'Fruits &amp; Vegetables'),
(16, 'Beverages'),
(17, 'LED Television'),
(18, 'Electrical and Power'),
(19, 'Refrigerator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES
(5, 'Tarek Hossain', 'Dhaka', '1205', 'admin@gmail.com', 'Nilkhet, Dhaka-1205', 'Bangladesh', '01515613274', '75d23af433e0cea4c0e45a56dba18b30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrid` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrid`, `productId`, `productName`, `quantity`, `price`, `image`, `date`) VALUES
(5, 4, 18, 'Panasonic Split Type AC ECONAVI', 1, 106.00, 'uploads/656c1df867.jpg', '2018-07-29 23:27:22'),
(6, 4, 13, 'Samsung LED Television 4K UHD UA65MU6100', 2, 422.00, 'uploads/24a280e9b1.jpg', '2018-07-29 23:27:22'),
(7, 4, 17, 'Conion Emergency Light BE 8825RDL', 2, 68.00, 'uploads/d75da9aa22.jpg', '2018-07-29 23:28:55'),
(8, 4, 13, 'Samsung LED Television 4K UHD UA65MU6100', 1, 211.00, 'uploads/24a280e9b1.jpg', '2018-07-29 23:33:31'),
(9, 4, 12, 'Conion 48EH704U 48â€³ Smart Android Television', 1, 34.00, 'uploads/296cbca656.jpg', '2018-07-29 23:33:51'),
(10, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:32:55'),
(11, 4, 13, 'Samsung LED Television 4K UHD UA65MU6100', 2, 422.00, 'uploads/24a280e9b1.jpg', '2018-08-06 12:32:55'),
(12, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:34:29'),
(13, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:35:23'),
(14, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:35:44'),
(15, 4, 18, 'Panasonic Split Type AC ECONAVI', 2, 212.00, 'uploads/656c1df867.jpg', '2018-08-06 12:35:44'),
(16, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:36:05'),
(17, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 1, 40.00, 'uploads/83f8b297e7.jpg', '2018-08-06 12:36:42'),
(18, 4, 13, 'Samsung LED Television 4K UHD UA65MU6100', 1, 211.00, 'uploads/24a280e9b1.jpg', '2018-08-06 12:36:42'),
(19, 4, 14, 'Hitachi Refrigerator R H210PG6 SLS', 2, 80.00, 'uploads/83f8b297e7.jpg', '2018-08-06 21:45:35'),
(20, 4, 18, 'Panasonic Split Type AC ECONAVI', 1, 106.00, 'uploads/656c1df867.jpg', '2018-10-06 23:02:44'),
(21, 5, 13, 'Samsung LED Television 4K UHD UA65MU6100', 1, 211.00, 'uploads/24a280e9b1.jpg', '2019-09-16 11:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(5, 'Camera', 0, 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 34.0, 'uploads/4f6de8d258.png', 1),
(11, 'Sharp Microwave Oven R 84AO ST V', 12, 6, '<div class=\"electro-description\">\r\n<p><strong>Sharp Microwave Oven R 84AO ST V</strong> featured with 42L capacity with 360mm glass turntable. It&rsquo;s come with the amazing Powerful output (900W) for quick and efficient cooking and LED Display. It has an Easy-to-use door with handle, Tact and dial control and Clock &amp; Kitchen Timer.&nbsp;Now, Microwave cooking just got easier and convenient for daily use with Sharp Microwave Oven R 84AO ST V. Get yours now from Best Electronics Ltd and enjoy easy installment facilities.</p>\r\n<p>So, shop online now from Best Electronics Ltd and get the best price and as well as the best after sales service. Best Electronics Ltd. is the authorized distributor of Sharp Bangladesh. Please visit&nbsp;<a href=\"https://sharp.com.sg/web/products/prodDetail.asp?ProdId=562\">Product&nbsp;Official Page</a> for other ovens.</p>\r\n<p>Capacity: 25 Litres<br /> Color:&nbsp;White<br /> Powerful output for quick and efficient cooking<br /> 10 auto menus<br /> Easy Installment Payment Facilities</p>\r\n<p>&nbsp;</p>\r\n</div>', 55.0, 'uploads/a8a3ad20e3.jpg', 2),
(12, 'Conion 48EH704U 48â€³ Smart Android Television', 17, 5, '<div class=\"electro-description\">\r\n<p>Conion 48EH704U 48&Prime; Smart Android Television is available at all the showrooms of Best Electronics in Bangladesh. Equipped with great picture quality and sound system that&rsquo;ll blow your mind. This 43 inch Smart LED TV equipped with full HD view redefines your TV viewing experience. Never have there been a Smart LED TV with this many features at such an affordable price.</p>\r\n<p>Conion 48EH704U 48&Prime; Smart Android Television flaunts its cutting-edge Eye care Technology that&rsquo;ll keep your eyes safe from excessive TV viewing. Double glass protection gives the TV unprecedented durability. And the unique and innovative stand along with the metallic finish gives the TV a look you can&rsquo;t take your eyes off. Wifi features enables you to access to the internet and download android apps. Some key features of Conion 48EH704U 48&Prime;(FHD) DLED Smart Android Television are:</p>\r\n<ul>\r\n<li>Japan Technology</li>\r\n<li>Wifi and Android Enabled</li>\r\n<li>ECO Saving</li>\r\n<li>Eye Protection Technology</li>\r\n<li>HD Ready</li>\r\n</ul>\r\n<p>Conion is the flagship brand of Best Electronics&nbsp;in Bangladesh. Get your Conion 48EH704U 48&Prime; Smart Television now from your nearest Best Electronics Store and enjoy&nbsp;Easy Installment Payment Facility.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"action-buttons\">\r\n<div class=\"yith-wcwl-add-to-wishlist add-to-wishlist-4758\">\r\n<div class=\"yith-wcwl-add-button show\" style=\"display: block;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"woocommerce-product-details__short-description\">\r\n<p>Screen Size: 48&Prime;<br /> Resolution:&nbsp;HD 1920&times;1080<br /> Japan Technology<br /> Eye Care Technology<br /> USB Support</p>\r\n</div>\r\n</div>', 34.0, 'uploads/296cbca656.jpg', 1),
(13, 'Samsung LED Television 4K UHD UA65MU6100', 17, 2, '<p>Screen Size: 50&Prime;<br /> Resolution: 3840 x 2160<br /> Real 4K RGB<br /> HDR Pro<br /> One Remote &amp; Auto Detection<br /> Easy Installment Payment Facility Available</p>\r\n<p>Samsung LED Television 4K UHD UA50MU6100 is available at all the showrooms of Best Electronics in Bangladesh. Comes with great picture quality and sound system that&rsquo;ll blow your mind.&nbsp;The Samsung 6000 Series is designed to be affordable, high quality and modern. This Ultra HD 4K TV is smart ready and boasts some of Samsung&rsquo;s best features at an entry-level price.</p>', 211.0, 'uploads/24a280e9b1.jpg', 1),
(14, 'Hitachi Refrigerator R H210PG6 SLS', 19, 4, '<p>Hitachi Refrigerator R H210PG6 SLS line of Hitachi can be a perfect choice for you and your family. This wonderfully designed refrigerator is fully equipped with various healthy features to help store your food without any health hazards. Hitachi&rsquo;s innovative convertible compartment lets you switch between the vegetable and dairy/meat modes cooling depending on where you locate the compartment in the refrigerator. So you can customize your refrigerator as desired to match your lifestyle and needs. And it&rsquo;s easy to move and set it place.</p>\r\n<p>&nbsp;</p>\r\n<p>Capacity:&nbsp;203 Litres<br /> Color:&nbsp;Silver<br /> Powerful Cooling<br /> High Power Inverter Compressor<br /> <span style=\"color: #ff9933;\"><strong>10 Years Compressor Warranty</strong></span></p>', 40.0, 'uploads/83f8b297e7.jpg', 1),
(16, 'Conion Emergency Light BE 9001L', 18, 5, '<div class=\"electro-description\">\r\n<p style=\"text-align: justify;\">Latest price on Conion Emergency Light BE 9001L at all the showrooms of Best Electronics Ltd. Bangladesh. This conion emergency light comes with amazing Bright White Light and Heavy Duty. Some features of this great light are Long Battery Life and Rechargeable NiMH battery. The conion light&rsquo;s battery supply is 4.5Ah. It&rsquo;s use in 6V voltage and 19 x 0.25W Hi-Power LED Light watt. This light makes our life easy and convenient.</p>\r\n<p style=\"text-align: justify;\">Get your Conion Emergency Light BE 9001L now from your nearest Best Electronics Ltd. Showroom and enjoy amazing discounts and extended warranties.&nbsp;Best Electronics Ltd. is the&nbsp;Sole Authorized Distributor of Conion in Bangladesh.</p>\r\n<p style=\"text-align: justify;\">Voltage: 6V<br /> Watt: 19 x 0.25W Hi-Power LED Light<br /> Long Battery Life<br /> Rechargeable NiMH battery<br /> 1-year service and parts warranty</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n</div>', 48.0, 'uploads/2b79d598fb.jpg', 2),
(17, 'Conion Emergency Light BE 8825RDL', 18, 5, '<p>Latest price on Conion Emergency Light BE 8825RDL at all the showrooms of Best Electronics Ltd. Bangladesh. This conion emergency light comes with amazing Bright White Light and FM Scan Radio. Some features of this great light are Long Battery Life and Rechargeable NiMH battery. The conion light&rsquo;s battery supply is 900mAh. It&rsquo;s use in 900mAh 2 x 4V voltage and 24 x 0.25W Hi-Power LED Light watt. This light makes our life easy and convenient.</p>\r\n<p>&nbsp;</p>\r\n<p>Voltage: 900mAh 2 x 4V<br /> Watt: 24 x 0.25W Hi-Power LED Light<br /> Long Battery Life<br /> Rechargeable NiMH battery<br /> 1-year service and parts warranty</p>', 34.0, 'uploads/d75da9aa22.jpg', 2),
(18, 'Panasonic Split Type AC ECONAVI', 18, 6, '<p>2 years compressor, spare parts &amp; 5 years after free sales service from the date of supply.<br /> <br /> Installation cost included with price up to 15 feet copper pipe &amp; Angle Base.If need Extra Copper Pipe, buyer will pay @Tk- 300/= per feet. Installation will be started within 24 hours after delivery. However main power line supply *MDB to the unit requires to be provided by the customer. (*MDB- Main Distribution Board.)</p>', 106.0, 'uploads/656c1df867.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
