-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 06:13 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhoa1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Madanhmuc` int(11) NOT NULL,
  `Tendanhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Madanhmuc`, `Tendanhmuc`) VALUES
(1, 'Hoa Sinh Nhật'),
(2, 'Hoa Tình Yêu'),
(3, 'Hoa Bó'),
(4, 'Hoa Giỏ'),
(5, 'Hoa Bình'),
(6, 'Hoa Khai Trương'),
(7, 'Hoa Tang Lễ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `MaHang` int(11) NOT NULL,
  `TenHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Madanhmuc` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `Mota` text COLLATE utf8_unicode_ci NOT NULL,
  `LinkAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`MaHang`, `TenHang`, `Madanhmuc`, `GiaBan`, `Mota`, `LinkAnh`) VALUES
(1, 'First Kiss', 1, 500000, '', 'hinhhoa/First Kiss.jpg'),
(2, 'Real Love', 2, 650000, 'BÃ³ hoa Ä‘Æ°á»£c thiáº¿t káº¿ vá»›i tÃ´ng mÃ u Ä‘á» nÃ³ng bá»ng lÃ  biá»ƒu tÆ°á»£ng cho má»™t tÃ¬nh yÃªu mÃ£nh liá»‡t, tÃ¬nh cáº£m chÃ¢n thÃ nh, lÃ£ng máº¡n, sáºµn sÃ ng bÃ¹ng chÃ¡y vÃ  mang thÃ´ng thÃ´ng Ä‘iá»‡p: â€œI love youâ€ . HÃ£y táº¡o báº¥t ngá» cho ngÆ°á»i báº¡n yÃªu thÆ°Æ¡ng trong nhá»¯ng dá»‹p ká»· niá»‡m nhÃ©, cháº¯c cháº¯n nÃ ng sáº½ cáº£m nháº­n Ä‘Æ°á»£c tÃ¬nh yÃªu chÃ¢n thÃ nh mÃ  báº¡n dÃ nh cho nÃ ng Ä‘áº¥y.', 'hinhhoa/Real Love.jpg'),
(3, 'Phút Yêu Đầu', 3, 450000, 'Với tone màu hồng nhẹ nhàng, nữ tính. Bó hoa là món quà tuyệt vời dành tặng cho những bạn nữ yêu thích sự lãng mạn và tràn đầy yêu thương. Thích hợp tặng dịp sinh nhật, làm quen, kỷ niệm ...', 'hinhhoa/Tinhamap2.jpg'),
(4, 'Ngày Nắng Lên', 4, 1000000, 'Sau cơn mưa, những tia nắng ấm áp chiếu rọi lên mọi vật, sưởi ấm tình cảm giữa những con người. Những tháng năm ngày nào ta có nhau, nồng nàn lời nói trao nhau, dịu dàng bàn tay nắm bàn tay, khẽ đến bên bên nhau cùng nhau đắm mình trong những tia nắng ấm áp cũng như là \"trong cuộc đời này, muốn thấy cầu vồng, phải chờ hết cơn mưa, chờ ngày nắng lên\".', 'hinhhoa/Dong_dao_mua_he.jpg'),
(5, 'Hoa Ánh Dương', 5, 150000, 'Ánh Dương được thiết kế từ 1 hoa hướng dương cùng giấy gói cao cấp. Với cách bó dài, và tông màu vàng tươi sáng, bó hoa sẽ mang đến người nhận thật nhiều niềm vui, may mắn và sức khỏe để tận hưởng cuộc sống tươi đẹp muôn màu muôn vẻ xung quanh mình. Thích hợp để tặng chúc mừng, chúc sức khỏe, kỉ niệm,...', 'hinhhoa/Anh_duong.jpg'),
(6, 'Yêu xa', 6, 200000, 'Yêu xa là một mẫu hoa cao cấp được thiết kế lấy cảm hứng thiết kế dành cho tình yêu lớn lao của các cặp đôi yêu xa cách. Mẫu kết hợp hoa hồng da và các loại hoa lá phụ khác cùng giấy gói cao cấp với mong muốn sớm được xum vầy.', 'hinhhoa/YeuXa.jpg'),
(7, 'My Friends', 1, 450000, 'Trong cuộc sống, tình bạn luôn là thứ tình cảm thiêng liêng và đang được trân trọng. Cuộc sống bận rộn thật, nhưng đừng lấy đó là lý do biến các bạn thành những con người vô tâm. Vì sẽ có những lúc cô đơn hay có những niềm vui, các bạn sẽ chẳng có ai để mà sẻ chia nữa đâu. Hãy trân trọng những người bạn đang có xung quanh mình bạn nhé.', 'hinhhoa/My Friends.jpg'),
(8, 'Believe Me', 1, 600000, 'Trong tình cảm thì việc tin tưởng nhau chính là thước đo cho sự bền lâu của mối quan hệ đó. Trong cuộc sống, có những thứ mất đi có thể tìm lại được. Nhưng có một vài thứ mất đi là mất mãi mãi, đó là thời gian, là thanh xuân, là tuổi trẻ… nhưng có một thứ vô cùng quý giá giữa con người với con người đó là niềm tin. Niềm tin trong con người cũng chia thành hai, niềm tin trong tình yêu và niềm tin trong cuộc sống', 'hinhhoa/Believe Me.jpg'),
(9, 'Only You', 1, 150000, '-', 'hinhhoa/Only You.jpg'),
(10, 'Hồng Xinh 2', 1, 350000, 'Bó hồng xinh được thiết kế với tông hồng nhẹ, thích hợp tặng cho việc tặng các tình cảm nhẹ nhàng. Người nhận là nữ ở tuổi từ 18-24.', 'hinhhoa/Trọn Vẹn Bên Nhau.jpg'),
(11, 'Tình ấm áp 2', 1, 350000, 'Hoa hồng đỏ - nữ hoàng của loài hoa hồng. Dù có bao nhiêu loại hoa khác thì hoa hồng đỏ vẫn luôn là ưu tiên hàng đầu trong các dịp lễ. Được thiết kế đơn giản kết hợp thêm một ít hoa baby trắng đan xen lẫn nhau giúp bó hoa càng thêm nổi bật. Mẫu hoa thích hợp tặng trong mọi dịp dành cho người mà bạn yêu mến.', 'hinhhoa/TÃ¬nh áº¥m Ã¡p 2.jpg'),
(12, 'Memory Of Love', 1, 450000, 'Bó hoa của những dịu dàng, những ngây thơ và cả những hoài niệm về những phút giây đầu gặp gỡ. Ký ức về tình yêu đôi ta thật tự nhiên, đằm thắm mà vẫn để lại biết bao xúc cảm trong lòng của ta. Đó là những kỉ niệm đẹp, chỉ nghĩ cần đến thôi thì nụ cười hạnh phúc bất chợt nở trên mội.', 'hinhhoa/Memory of Love.jpg'),
(13, 'Bản nhạc dịu êm', 1, 400000, '', 'hinhhoa/Ban_nhac_ diu_em.jpg'),
(14, 'Trọn vẹn bên nhau', 1, 500000, '', 'hinhhoa/TronVenBenNhau.jpg'),
(15, 'Gold FriendShip', 2, 550000, '-', 'hinhhoa/Gold FriendShip.jpg'),
(16, 'Điều ngọt ngào', 2, 650000, '-', 'hinhhoa/Dieu_Ngot_Ngao.jpg'),
(17, 'Sum họp', 2, 400000, '-', 'hinhhoa/Sumhop.jpg'),
(18, 'Sắc hồng xinh', 2, 500000, '-', 'hinhhoa/SacHongXinh.jpg'),
(19, 'Colorfull Story', 2, 600000, '-', 'hinhhoa/Colorfull Story.jpg'),
(20, 'Nhịp điệu thành công', 2, 750000, '-', 'hinhhoa/NhipDieuThanhCong.jpg'),
(21, 'Hạnh phúc nhỏ nhoi', 1, 500000, '', 'hinhhoa/HanhPhucNhoNho.jpg'),
(22, 'Nàng thơ', 1, 800000, '', 'hinhhoa/NangTho.jpg'),
(23, 'Nắng hạ', 3, 800000, '-', 'hinhhoa/NangHa.jpg'),
(24, 'Hè rực rỡ', 3, 800000, '-', 'hinhhoa/HeRucRo.jpg'),
(25, 'Giỏ hoa hồng', 4, 550000, '-', 'hinhhoa/Gio_Hoa_Hồng.jpg'),
(26, 'Từng phút giây', 3, 800000, '-', 'hinhhoa/Tungphutgiay.jpg'),
(27, 'Thay lời muốn nói', 3, 900000, '-', 'hinhhoa/ThayLoiMuonNoi.jpg'),
(28, 'Ngày cuối tuần', 4, 650000, '', 'hinhhoa/Ngaycuoituan.jpg'),
(29, 'Rose Rapture', 4, 1500000, 'Ná»¯ tÃ­nh vÃ  Tuyá»‡t vá»i. Sá»± ngoáº¡n má»¥c cá»§a Hoa há»“ng Da vÃ  Hoa há»“ng Tráº¯ng trong chiáº¿c bÃ¬nh hÃ¬nh ly sang trá»ng Ä‘áº£m báº£o sáº½ mang Ä‘áº¿n sá»± vui sÆ°á»›ng khÃ´ng nÃ³i nÃªn lá»i tá»« cÃ´ áº¥y. Cho Ä‘áº¿n khi cÃ´ áº¥y nÃ³i yÃªu báº¡n bá»Ÿi sá»± chá»n lá»±a Ä‘Ãºng Ä‘áº¯n nÃ y.', 'hinhhoa/Rose Rapture.jpg'),
(30, 'Red Roses', 4, 2000000, '-', 'hinhhoa/Red Roses.jpg'),
(31, 'Màu của nắng', 4, 2500000, '-', 'hinhhoa/MauCuaNang.jpg'),
(32, 'Đồng dao mùa hè', 4, 600000, '-', 'hinhhoa/Dong_dao_mua_he.jpg'),
(33, 'Hạnh phúc bền lâu', 4, 1200000, '-', 'hinhhoa/HanhPhucBenLau.jpg'),
(34, 'Màu nỗi nhớ', 4, 1000000, '-', 'hinhhoa/MauNoiNho.jpg'),
(35, 'Tình yêu ngọt ngào', 4, 900000, '-', 'hinhhoa/Tinhyeungotngao.jpg'),
(36, 'Ánh dương', 3, 1500000, '- Ánh Dương được thiết kế từ 1 hoa hướng dương cùng giấy gói cao cấp. Với cách bó dài, và tông màu vàng tươi sáng, bó hoa sẽ mang đến người nhận thật nhiều niềm vui, may mắn và sức khỏe để tận hưởng cuộc sống tươi đẹp muôn màu muôn vẻ xung quanh mình. Thích hợp để tặng chúc mừng, chúc sức khỏe, kỉ niệm,...', 'hinhhoa/Anh_duong.jpg'),
(37, 'Lộc phát', 6, 1200000, '-', 'hinhhoa/LocPhat.jpg'),
(38, 'Đại phú quí', 6, 1400000, '-', 'hinhhoa/Dai_Phu_Qui.jpg'),
(39, 'Hưng Thịnh 2', 6, 2000000, '-', 'hinhhoa/HungThinh2.jpg'),
(40, 'Thắng lợi', 6, 650000, '-', 'hinhhoa/Thangloi.jpg'),
(41, 'Success Flowers', 6, 900000, '-', 'hinhhoa/Success Flowers.jpg'),
(42, 'Dẫn lối thành công', 7, 3000000, '', 'hinhhoa/Dan_Loi_Thanh_Cong.jpg'),
(43, 'Trường thịnh', 7, 1000000, '-', 'hinhhoa/TruongThinh.jpg'),
(44, 'Tương lai tươi sáng', 7, 1800000, '-', 'hinhhoa/TuongLaiTuoiSang.jpg'),
(45, 'Vạn Đạt', 7, 1100000, '-', 'hinhhoa/VanĐat.jpg'),
(46, 'Nhịp đập yêu thương', 5, 1500000, '', 'hinhhoa/NhipDapYeuThuong.jpg'),
(47, 'Hạnh phúc bắt đầu', 5, 600000, '', 'hinhhoa/Hanh_phuc_bat_dau.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `HoTenLot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `DC_Ap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DC_MaHuyen` int(11) NOT NULL,
  `Quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `HoTenLot`, `Ten`, `Email`, `SoDienThoai`, `MatKhau`, `DC_Ap`, `DC_MaHuyen`, `Quyen`) VALUES
(1, '-', 'admin', 'admin', '-', '202cb962ac59075b964b07152d234b70', '-', 1, 2),
(3, 'TrÆ°Æ¡ng SÆ¡n', 'SÃ´ Phol', '110116055@gmail.com', '0344874366', '202cb962ac59075b964b07152d234b70', 'KhÃ³m 6, PhÆ°á»ng 8', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen_huyen`
--

CREATE TABLE `vanchuyen_huyen` (
  `Mahuyen` int(11) NOT NULL,
  `Tenhuyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PhiVanchuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vanchuyen_huyen`
--

INSERT INTO `vanchuyen_huyen` (`Mahuyen`, `Tenhuyen`, `PhiVanchuyen`) VALUES
(1, 'Thành Phố Trà Vinh', 0),
(2, 'Càng Long', 15000),
(3, 'Châu Thành', 20000),
(4, 'Trà Cú', 25000),
(5, 'Cầu Kè', 30000),
(6, 'Duyên Hải', 30000),
(7, 'Cầu Ngang', 25000),
(8, 'Tiểu Cần', 30000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Madanhmuc`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `vanchuyen_huyen`
--
ALTER TABLE `vanchuyen_huyen`
  ADD PRIMARY KEY (`Mahuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Madanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vanchuyen_huyen`
--
ALTER TABLE `vanchuyen_huyen`
  MODIFY `Mahuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
