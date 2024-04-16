-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 16, 2024 lúc 11:38 PM
-- Phiên bản máy phục vụ: 8.0.36-cll-lve
-- Phiên bản PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cqfzvzkv_eatez`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_dish`
--

CREATE TABLE `category_dish` (
  `cid` int NOT NULL,
  `cname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category_dish`
--

INSERT INTO `category_dish` (`cid`, `cname`, `cimage`) VALUES
(1, 'Rice', 'https://htthuan.id.vn/images/categories/category_rice.png'),
(2, 'Breakfast', 'https://htthuan.id.vn/images/categories/category_breakfast.png'),
(3, 'Noodles', 'https://htthuan.id.vn/images/categories/category_noodles.png'),
(4, 'Salad/Healthy', 'https://htthuan.id.vn/images/categories/category_saladhealthy.png'),
(5, 'Drink', 'https://htthuan.id.vn/images/categories/category_drink.png'),
(6, 'Seafood', 'https://htthuan.id.vn/images/categories/category_seafood.png'),
(7, 'Fruit Juice', 'https://htthuan.id.vn/images/categories/category_juice.png'),
(8, 'Bread', 'https://htthuan.id.vn/images/categories/category_bread.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_post`
--

CREATE TABLE `comment_post` (
  `cmt_id` int NOT NULL,
  `userid` int NOT NULL,
  `post_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dish`
--

CREATE TABLE `dish` (
  `dish_id` int NOT NULL,
  `dish_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dish_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dish_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cid` int NOT NULL,
  `res_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dish`
--

INSERT INTO `dish` (`dish_id`, `dish_name`, `dish_desc`, `dish_image`, `cid`, `res_id`) VALUES
(1, 'Mì Quảng 1', 'Món ăn đặc sản của miền Trung Việt Nam.', 'mi-quang.jpg', 3, 1),
(2, 'Bún Riêu', 'Một món ăn ngon với nước dùng đậm đà.', 'bun-rieu.jpg', 3, 1),
(3, 'Gỏi cuốn', 'Món ăn tráng miệng phổ biến với rau sống và thịt.', 'goi-cuon.jpg', 4, 1),
(4, 'Bánh mì thịt', 'Một món bánh mì phổ biến với thịt heo và rau sống.', 'banh-mi-thit.jpg', 8, 2),
(5, 'Mì Quảng', 'Món ăn đặc sản của miền Trung Việt Nam.', 'mi-quang.jpg', 3, 1),
(6, 'Bún Riêu', 'Một món ăn ngon với nước dùng đậm đà.', 'bun-rieu.jpg', 3, 1),
(7, 'Gỏi cuốn', 'Món ăn tráng miệng phổ biến với rau sống và thịt.', 'goi-cuon.jpg', 4, 1),
(8, 'Bánh mì thịt', 'Một món bánh mì phổ biến với thịt heo và rau sống.', 'banh-mi-thit.jpg', 8, 2),
(9, 'Nem nướng Nha Trang', 'Nem nướng Nha Trang vô cùng tuyệt vời ...', '', 4, 1),
(10, 'Bánh mì thịt nướng', 'Bánh mì thịt nướng với rau sống, sốt me...', '', 8, 1),
(11, 'Phở bò', 'Phở bò nóng hổi, thơm phức, với nước dùng đậm đà...', '', 3, 1),
(12, 'Bún chả Hà Nội', 'Bún chả Hà Nội với chả nướng và bún thơm lừng...', '', 3, 1),
(13, 'Cơm gà Hải Nam', 'Cơm gà Hải Nam thơm ngon với gà luộc và cơm trắng...', '', 1, 1),
(14, 'Bún riêu cua', 'Bún riêu cua nổi tiếng với hương vị đặc trưng...', '', 6, 1),
(15, 'Bún bò Huế', 'Bún bò Huế thơm ngon, cay nồng với nước dùng đậm đà...', '', 3, 1),
(16, 'Gỏi cuốn', 'Gỏi cuốn tươi mát với rau sống, tôm, thịt bò hoặc thịt gà...', '', 4, 1),
(17, 'Bánh xèo', 'Bánh xèo giòn tan với nhân thịt heo, tôm và rau sống...', '', 4, 1),
(18, 'Bún thịt nướng', 'Bún thịt nướng với thịt nướng, rau sống và nước mắm...', '', 3, 1),
(19, 'Cơm tấm Sài Gòn', 'Cơm tấm Sài Gòn với cơm dẻo, thịt heo nướng, trứng ốp la...', '', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite_post`
--

CREATE TABLE `favourite_post` (
  `favourite_id` int NOT NULL,
  `post_id` int NOT NULL,
  `date` datetime NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite_post`
--

INSERT INTO `favourite_post` (`favourite_id`, `post_id`, `date`, `userid`) VALUES
(4, 17, '2024-04-10 08:29:21', 1),
(5, 1, '2024-04-11 08:29:21', 1),
(6, 7, '2024-04-11 08:29:21', 1),
(7, 2, '2024-04-11 08:29:21', 1),
(8, 3, '2024-04-11 08:29:21', 1),
(9, 4, '2024-04-11 08:29:21', 1),
(10, 5, '2024-04-11 08:29:21', 1),
(11, 6, '2024-04-11 08:29:21', 1),
(12, 7, '2024-04-11 08:29:21', 1),
(13, 17, '2024-04-10 08:29:21', 1),
(14, 1, '2024-04-11 08:29:21', 1),
(15, 7, '2024-04-11 08:29:21', 1),
(16, 2, '2024-04-11 08:29:21', 1),
(17, 3, '2024-04-11 08:29:21', 1),
(18, 4, '2024-04-11 08:29:21', 1),
(19, 5, '2024-04-11 08:29:21', 1),
(20, 6, '2024-04-11 08:29:21', 1),
(21, 7, '2024-04-11 08:29:21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `dish_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_grab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `dish_id`, `title`, `content`, `thumbnail_image`, `order_grab`, `date`) VALUES
(1, 1, 'Món Spaghetti Bolognese ngon tuyệt', 'Hãy thưởng thức món Spaghetti Bolognese ngon tuyệt tại nhà hàng chúng tôi.', 'https://htthuan.id.vn/images/categories/category_saladhealthy.png', '', '2024-04-01 09:00:00'),
(2, 2, 'Salad Caesar tươi mát', 'Thưởng thức một tô salad Caesar tươi mát và bổ dưỡng cùng gia vị đặc trưng.', 'caesar_salad_thumbnail.jpg', '', '2024-04-01 09:30:00'),
(3, 3, 'Tiramisu hấp dẫn', 'Một món tiramisu hấp dẫn với hương vị đặc trưng của cà phê và mascarpone.', 'tiramisu_thumbnail.jpg', '', '2024-04-01 10:00:00'),
(4, 1, 'Mì Quảng tuyệt vời', 'Hôm nay tôi đã thưởng thức một tô Mì Quảng thật ngon.', 'https://cdn.tgdd.vn/2021/02/CookProduct/1200-1200x676-16.jpg', '', '2024-04-03 08:00:00'),
(5, 2, 'Bún Riêu ngon tuyệt', 'Bún Riêu ở đây thật sự ngon và thơm.', 'https://i.ytimg.com/vi/C1P1Cw9J1-I/maxresdefault.jpg', '', '2024-04-03 09:00:00'),
(6, 3, 'Gỏi cuốn tươi ngon', 'Gỏi cuốn với rau tươi và thịt thật là một lựa chọn tuyệt vời.', 'https://i.ytimg.com/vi/C1P1Cw9J1-I/maxresdefault.jpg', '', '2024-04-03 10:00:00'),
(7, 1, 'Món ngon bánh mì thịt nướng', 'Hôm nay chúng ta sẽ cùng khám phá món ngon bánh mì thịt nướng. Đây là một món ăn truyền thống của Việt Nam, thường được chế biến từ thịt nướng, rau sống, sốt me và bánh mì.', 'https://images2.thanhnien.vn/zoom/700_438/Uploaded/trantam/2022_11_17/anh-chup-man-hinh-2022-10-07-luc-172838-4541-9511.png', '', '2024-04-07 13:04:36'),
(8, 2, 'Khám phá hương vị phở bò', 'Món phở bò nổi tiếng với hương vị đậm đà của nước dùng, sự mềm mại của thịt bò và sự thơm phức của gia vị. Hãy cùng nhau thưởng thức và khám phá hương vị tuyệt vời của món ăn này.', 'https://cdn.tgdd.vn/2021/11/CookRecipe/Avatar/pho-bo-nau-voi-goi-gia-vi-pho-thumbnail-1.jpg', '', '2024-04-07 13:04:36'),
(9, 3, 'Bún chả Hà Nội - Hương vị truyền thống', 'Bún chả Hà Nội là một món ăn đặc trưng của miền Bắc Việt Nam. Nó bao gồm chả nướng, bún và rau sống, thường được ăn kèm với nước mắm pha chua ngọt.', 'https://media.mia.vn/uploads/blog-du-lich/mach-ban-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-1639474555.jpg', '', '2024-04-07 13:04:36'),
(10, 4, 'Nem nướng Nha Trang - Một hương vị đặc biệt', 'Nem nướng Nha Trang là một món ăn ngon và độc đáo của miền Trung Việt Nam. Với hương vị đặc trưng và cách chế biến độc đáo, món này sẽ chinh phục vị giác của bạn.', 'https://owa.bestprice.vn/images/articles/uploads/tho-dia-chia-se-10-quan-nem-nuong-ngon-o-nha-trang-khien-van-nguoi-me-5f44bb1716c54.jpg', '', '2024-04-07 13:04:36'),
(11, 5, 'Cơm gà Hải Nam - Hòa quyện hương vị', 'Cơm gà Hải Nam là một món ăn truyền thống của đảo Hải Nam, Trung Quốc. Hương vị thơm ngon của gà, cơm và nước mắm sẽ khiến bạn phải mê mẩn.', 'https://file.hstatic.net/200000385717/article/bia_6294906d3b774dd7a08e6515512360e2.jpg', '', '2024-04-07 13:04:36'),
(12, 6, 'Bún riêu cua - Hương vị đặc biệt', 'Bún riêu cua là một món ăn phổ biến ở miền Nam Việt Nam. Với nước dùng đậm đà, chả cua và rau sống, món này chắc chắn sẽ khiến bạn thích thú.', 'https://cdn.tgdd.vn/Files/2020/10/23/1301370/bi-kip-nau-rieu-cua-thom-ngon-dong-thanh-mieng-to-khong-bi-nat-202201051441411998.jpg', '', '2024-04-07 13:04:36'),
(13, 7, 'Bún bò Huế - Hương vị cay nồng', 'Bún bò Huế là một món ăn ngon và đặc trưng của miền Trung Việt Nam. Với hương vị cay nồng của nước dùng và hỗn hợp gia vị, món này sẽ khiến bạn không thể quên.', 'https://monngonmoingay.com/wp-content/uploads/2021/05/bun-bo-gan-880.webp', '', '2024-04-07 13:04:36'),
(14, 8, 'Gỏi cuốn - Món ngon mát lạnh', 'Gỏi cuốn là một món ăn tươi mát và lạ miệng. Với những lá rau sống, tôm, thịt bò hoặc thịt gà, và bánh tráng mỏng, món này sẽ làm hài lòng mọi thực khách.', 'https://mevacon.giaoduc.edu.vn/wp-content/uploads/2023/03/cach-lam-goi-cuon-3.jpeg', '', '2024-04-07 13:04:36'),
(15, 9, 'Nem Nướng Nha Trang Cô Hơn :3', '<p>Được biết đến như một trong những điểm đến ẩm thực tin cậy, <span style=\"color:#33691e;\"><code>Nem Nướng Nha Trang Cô Hơn</code></span> luôn giữ vững vị thế trong danh sách những quán Nem Nướng Nha Trang hàng đầu tại Hà Nội. Với không gian sạch sẽ, thoáng đãng, quán luôn thu hút sự chú ý của thực khách. Với đội ngũ nhân viên tận tâm và chu đáo, quý khách sẽ được tận hưởng trọn vẹn hương vị tinh tế của những chiếc nem nướng tại đây. Chất lượng và vệ sinh luôn được quan tâm hàng đầu, đảm bảo mọi khách hàng đều hài lòng từng phút giây thưởng thức.</p>\n<p>&nbsp;</p>\n<p>Với nguyên liệu nhập khẩu chất lượng, Nem Nướng Nha Trang Cô Hơn không chỉ làm hài lòng người ưa ẩm thực mà còn chinh phục những thực khách khó tính nhất. Mỗi chiếc nem nướng ở đây đều được chế biến công phu, giữ nguyên hương vị đặc trưng, cuốn hút từng thực khách. Nước chấm độc đáo và thơm ngon là điểm nhấn tạo nên sự khác biệt cho quán.</p>\n<p><strong>THÔNG TIN LIÊN HỆ:</strong></p>\n<p><strong>Địa chỉ: </strong>13H2 Ngõ 130 Xuân Thủy, Quận Cầu Giấy, Hà Nội<br>Ngõ 69 Chùa Láng, Đống Đa, Hà Nội<br>Điện thoại: 0917 102 615 &amp; 0827 012 678</p>\n<p><i><strong><u>Fanpage: www.facebook.com/NemnuongNT.cohon/</u></strong></i></p>\n<p><strong>Giờ mở cửa: 09:30 - 21:00</strong></p>', 'https://gcs.tripi.vn/public-tripi/tripi-feed/img/473668iPc/hat-2-o-nem-nuong-nha-trang-851615.jpg', 'https://food.grab.com/vn/vi/restaurant/elly-nem-n%C6%B0%E1%BB%9Bng-nha-trang-delivery/5-CY3XMEBWT8AVEN?', '2024-04-07 13:04:36'),
(16, 10, 'Bún chả Sinh Từ', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\n\nMức giá tham khảo: 6:30 - 21:30\n\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\n\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(17, 10, 'Bún chả 1', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(18, 10, 'Bún chả 2', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(19, 10, 'Bún chả 3', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(20, 10, 'Bún chả 4', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(21, 10, 'Bún chả 5', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(22, 10, 'Bún chả 6', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(23, 10, 'Bún chả 7', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(24, 10, 'Bún chả 8', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(25, 10, 'Bún chả 9', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36'),
(26, 10, 'Bún chả 10', 'Địa chỉ: 316 Phố Vọng, quận Hai Bà Trưng, Hà Nội\r\n\r\nMức giá tham khảo: 6:30 - 21:30\r\n\r\nMức giá tham khảo: 20.000 - 39.000 VNĐ / phần\r\n\r\nĐến với quán Bún chả Sinh Từ, bạn sẽ hài lòng bởi thái độ phục vụ thân thiện, vui vẻ và cực kỳ nhanh nhẹn của nhân viên phục vụ. Một suất bún ở đây cực nhiều với nước chấm mặn mặn, ngọt ngọt vừa miệng, thịt nướng vừa chín tới đảm bảo độ mềm mềm, dai dai. Ngoài ra, gỏi đu đủ và rau sống được mua từ nơi bán rau sạch và được nhặt, rửa sạch sẽ.', 'https://mia.vn/media/uploads/blog-du-lich/mach-b%E1%BA%A1n-top-10-quan-bun-cha-ha-noi-ngon-tru-danh-dat-ha-thanh-07-1639475003.png', '', '2024-04-07 13:04:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int NOT NULL,
  `res_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `res_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `res_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `res_phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `res_name`, `res_address`, `res_image`, `res_phone`) VALUES
(1, 'Nhà hàng A', '123 Đường ABC, Thành phố XYZ', 'nhahang1.jpg', 123456789),
(2, 'Nhà hàng B', '456 Đường DEF, Thành phố XYZ', 'nhahang2.jpg', 987654321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `sid` int NOT NULL,
  `sname` varchar(50) NOT NULL,
  `simage` varchar(255) NOT NULL,
  `slink` varchar(255) NOT NULL,
  `sdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`sid`, `sname`, `simage`, `slink`, `sdate`) VALUES
(1, 'Ads_1', 'https://i.pinimg.com/originals/1a/e3/2a/1ae32a19d958002c7fb2a99c9a53f012.jpg', 'https://www.grab.com/vn/', '2024-04-07 11:00:14'),
(2, 'Ads_2', 'https://blog.dktcdn.net/files/quang-cao-bida.jpg', 'https://www.grab.com/vn/', '2024-04-07 11:00:14'),
(3, 'Ads_3', 'https://graphicsfamily.com/wp-content/uploads/edd/2023/05/Website-Food-Banner-Design-1180x664.jpg', 'https://www.grab.com/vn/', '2024-04-07 11:01:50'),
(4, 'Ads_4', 'https://warningzone.com/wp-content/uploads/2023/08/lyb_web_2.jpg', 'https://www.grab.com/vn/', '2024-04-07 11:36:32'),
(5, 'Ads_5', 'https://img.freepik.com/free-psd/flat-design-ugadi-template_23-2149336650.jpg?size=626&ext=jpg', 'https://htthuan.id.vn/images/sliders/sliderhome_img5.jpg', '2024-04-07 11:41:18'),
(6, 'Ads_6', 'https://htthuan.id.vn/images/sliders/sliderhome_img6.jpg', 'https://htthuan.id.vn/images/sliders/sliderhome_img6.jpg', '2024-04-07 11:41:18'),
(7, 'Ads_7', 'https://img.freepik.com/premium-vector/healthy-food-banner-design-paper-bag-fruit-cucumber-greenery-grocery-shopping_598594-201.jpg', '', '2024-04-08 12:25:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trending`
--

CREATE TABLE `trending` (
  `id` int NOT NULL,
  `dish_id` int NOT NULL,
  `date` datetime NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `trending`
--

INSERT INTO `trending` (`id`, `dish_id`, `date`, `image`) VALUES
(1, 10, '2024-04-16 21:37:35', 'https://monngonmoingay.com/wp-content/uploads/2020/12/banh-mi-thit-nuong-sa-mayo-880.webp'),
(2, 19, '2024-04-16 21:37:35', 'https://tiki.vn/blog/wp-content/uploads/2023/07/com-tam.jpeg'),
(3, 10, '2024-04-16 21:37:35', 'https://monngonmoingay.com/wp-content/uploads/2020/12/banh-mi-thit-nuong-sa-mayo-880.webp'),
(4, 19, '2024-04-16 21:37:35', 'https://tiki.vn/blog/wp-content/uploads/2023/07/com-tam.jpeg'),
(5, 10, '2024-04-16 21:37:35', 'https://monngonmoingay.com/wp-content/uploads/2020/12/banh-mi-thit-nuong-sa-mayo-880.webp'),
(6, 19, '2024-04-16 21:37:35', 'https://tiki.vn/blog/wp-content/uploads/2023/07/com-tam.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL,
  `fullName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `fullName`, `email`, `password`, `avatar_image`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@example.com', 'password123', 'avatar1.jpg'),
(2, 'Trần Thị B', 'tranthib@example.com', 'password456', 'avatar2.jpg'),
(3, 'Lê Văn C', 'levanc@example.com', 'password789', 'avatar3.jpg'),
(4, 'HoangTienThuan', 'thuan@gmail.com', '123', NULL),
(5, '123', 'nam@gmail.com', '123', NULL),
(6, '123', 'dkak@gmail.com', '123', NULL),
(7, '123', 'nam11@gamil.com', '123', NULL),
(8, 'nam', 'vuanm1111@gmail.com', '1234', 'https://htthuan.id.vn/images/temp/nammuito.jpg'),
(9, 'ThuanDz', 'thuan2682k3@gmail.com', '123', 'https://htthuan.id.vn/images/temp/htthuan_avt.png'),
(10, 'Mazh', 'bomanhne@gmail.com', '123456', 'https://htthuan.id.vn/images/temp/mitmoi.jpeg'),
(11, 'hi', 'hihi@gmail.com', '123', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_dish`
--
ALTER TABLE `category_dish`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

--
-- Chỉ mục cho bảng `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `Id` (`cmt_id`,`userid`,`post_id`),
  ADD KEY `cmt_id` (`cmt_id`),
  ADD KEY `fk_comment_post` (`post_id`),
  ADD KEY `fk_comment_user` (`userid`);

--
-- Chỉ mục cho bảng `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `dish_id` (`dish_id`,`cid`,`res_id`),
  ADD KEY `fk_dish_category` (`cid`),
  ADD KEY `fk_dish_restaurant` (`res_id`);

--
-- Chỉ mục cho bảng `favourite_post`
--
ALTER TABLE `favourite_post`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `Id` (`favourite_id`,`post_id`,`date`),
  ADD KEY `fk_favourite_post` (`post_id`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `Id` (`post_id`,`dish_id`),
  ADD KEY `post_id` (`post_id`,`dish_id`),
  ADD KEY `fk_post_dish` (`dish_id`);

--
-- Chỉ mục cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `Id` (`res_id`),
  ADD KEY `Id_2` (`res_id`),
  ADD KEY `res_id` (`res_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `sid` (`sid`);

--
-- Chỉ mục cho bảng `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`dish_id`),
  ADD KEY `fk_trend_dish` (`dish_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `Id` (`userid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_dish`
--
ALTER TABLE `category_dish`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `cmt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dish`
--
ALTER TABLE `dish`
  MODIFY `dish_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `favourite_post`
--
ALTER TABLE `favourite_post`
  MODIFY `favourite_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment_post`
--
ALTER TABLE `comment_post`
  ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Các ràng buộc cho bảng `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_dish_category` FOREIGN KEY (`cid`) REFERENCES `category_dish` (`cid`),
  ADD CONSTRAINT `fk_dish_restaurant` FOREIGN KEY (`res_id`) REFERENCES `restaurant` (`res_id`);

--
-- Các ràng buộc cho bảng `favourite_post`
--
ALTER TABLE `favourite_post`
  ADD CONSTRAINT `fk_favourite_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `fk_user_favourite` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_dish` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`dish_id`);

--
-- Các ràng buộc cho bảng `trending`
--
ALTER TABLE `trending`
  ADD CONSTRAINT `fk_trend_dish` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`dish_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
