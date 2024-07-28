-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 03:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Balo đi học'),
(2, 'Túi xách'),
(3, 'Balo du lịch'),
(5, 'Balo chống sốc'),
(6, 'Túi du lịch up');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,0) NOT NULL,
  `quantity` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img_thumbnail`, `overview`, `content`, `created_at`, `updated_at`, `price`, `quantity`) VALUES
(2, 3, 'Balo du lịch đa năng cỡ lớn cao cấp chống nước CHENNY 068', 'assets/uploads/172209778010.png', '+ Kích thước: 31 x 28 x 46 cm\r\n\r\n+ Chất liệu: Vải bố Poly chống nước\r\n\r\n+ Sức chứa: 30L\r\n\r\n+ Trọng lượng chịu lực tối đa: 15kg\r\n\r\n+ Trọng lượng balo: 0.5kg', 'Chào mừng đến với cửa hàng của chúng tôi:\r\n\r\n🍀 Nếu quan tâm đến giá sỉ, bạn có thể chat riêng với chúng tôi.\r\n\r\n🍀 Khi bạn nhận được sản phẩm, vui lòng nhấn chấp nhận.\r\n\r\n🍀Đánh giá 5 sao rất khuyến khích cho cửa hàng của chúng tôi.', '2024-07-27 15:42:24', '2024-07-27 09:29:40', 500000, 10),
(3, 6, 'Balo cặp đi học 2024 NEW Cute nhiều màu sắc để lựa chọn INS phổ biến ', 'assets/uploads/17220976754.png', 'Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️', '100% thương hiệu và chất lượng cao.\r\nTên khoản mục: Ba lô Sanrio\r\nChất liệu: nylon\r\nKích thước: 28 * 12 * 43cm\r\nMàu sắc: Như trong hình\r\nGói bao gồm: 1 * ba lô', '2024-07-27 16:15:13', '2024-07-27 09:27:55', 220000, 18),
(4, 5, 'Balo đựng laptop chống sốc chống nước EZ BALO BLA10 Balo laptop 15.6 inch laptop 17 inch', 'assets/uploads/172209788012.png', 'Tính năng\r\nChống trộm, Ngăn đừng laptop, Khác, Ngăn đựng máy tính bảng, Cổng USB\r\nMẫu\r\nTrơn\r\nĐịa chỉ tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n1 tháng\r\nChất liệu\r\nSợi tổng hợp, Sợi dệt', 'EZ BALO xin giới thiệu mẫu Balo đựng laptop chống sốc chống nước BLA10 áp dụng công nghệ sản xuất mới nhất cùng chất liệu cao cấp giúp đem đến trải nghiệm sử dụng tuyệt vời khi sử dụng. Sản phẩm có thiết kế hiện đại, thời trang phù hợp với nhiều nhu cầu sử dụng khác nhau như đi làm, đi học, du lịch.', '2024-07-27 16:31:20', '2024-07-27 16:31:20', 400000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `avatar`, `email`, `password`, `type`, `created_at`, `updated_at`, `id`) VALUES
('Nguyen Phuong Thanh Trang', 'assets/uploads/1722130954pam1.jpg', 'trangnpt@gmail.com', '$2y$10$H2R9Xq.8G2ZsATn4J8ePyOgYb61CpKCfCIHj2V3EhzPvNkBtrKQkC', 'admin', '2024-07-28 01:42:34', '2024-07-28 01:42:34', 4),
('Nguyen An Hai Duong', 'assets/uploads/1722132952pam.jpg', 'pam@gmail.com', '$2y$10$APs.23Rjj4xx/Ot3BEmiv.SRsNZa5GxrTQdjd3Zlp59jbxn7cLlv.', 'admin', '2024-07-28 02:15:52', '2024-07-28 02:15:52', 5),
('Nguyen Phuong Thanh An  ', 'assets/uploads/172213301533.jpg', 'annpt@gmail.com', '$2y$10$ImKD5SZhR6JYkn5rNKd54u5SRduT/g.q.rIo1LV0.Kd0xprYjAEhW', 'member', '2024-07-28 02:16:55', '2024-07-28 02:16:55', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
