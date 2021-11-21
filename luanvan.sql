-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2021 lúc 05:22 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luanvan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonthuoc`
--

CREATE TABLE `chitietdonthuoc` (
  `IDChiTietDonThuoc` int(11) NOT NULL,
  `MoTa` varchar(1000) DEFAULT NULL,
  `LoaiMoTa` tinyint(1) DEFAULT NULL,
  `Tuoi` int(11) DEFAULT NULL,
  `IDHoaDonXuatHang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonnhaphang`
--

CREATE TABLE `chitiethoadonnhaphang` (
  `IDChiTietHoaDonNhapHang` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `DonVi` varchar(100) DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL,
  `IDHoaDonNhapHang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonnhaphang`
--

INSERT INTO `chitiethoadonnhaphang` (`IDChiTietHoaDonNhapHang`, `SoLuong`, `Gia`, `DonVi`, `IDSanPham`, `IDHoaDonNhapHang`) VALUES
(3, 100, 35000000, 'Hộp', 3, 3),
(4, 50, 15000000, 'Hộp', 4, 4),
(5, 100, 35000000, 'Hộp', 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonxuathang`
--

CREATE TABLE `chitiethoadonxuathang` (
  `IDChiTietHoaDonXuatHang` int(11) NOT NULL,
  `IDHoaDonXuatHang` int(11) DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaoHang` tinyint(1) DEFAULT NULL,
  `IDNguoiDung` int(11) DEFAULT NULL,
  `IDHoaDonPayPal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtyduoc`
--

CREATE TABLE `congtyduoc` (
  `IDCongTyDuoc` int(11) NOT NULL,
  `TenCongTyDuoc` varchar(100) DEFAULT NULL,
  `WebSite` varchar(100) DEFAULT NULL,
  `AnhDaiDien` varchar(1000) DEFAULT NULL,
  `HienThi` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `congtyduoc`
--

INSERT INTO `congtyduoc` (`IDCongTyDuoc`, `TenCongTyDuoc`, `WebSite`, `AnhDaiDien`, `HienThi`) VALUES
(2, 'Dược Hậu Giang', 'dhgpharma.com.vn', '1-duochaugiang.png', 1),
(3, 'Dược Hải Dương', 'haiduongduoc.com', '3-HDPharma.png', 1),
(4, 'Imexpharm', 'imexpharm.com', '4-Imexpharm.jpg', 1),
(5, 'Mekophar', 'mekophar.com', '5-Mekophar.png', 1),
(6, 'OPC', 'opcpharma.com', '6-OPC.jpg', 1),
(7, 'Pymepharco', 'pymepharco.com', '7-Pymepharco.png', 1);

--
-- Bẫy `congtyduoc`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaCongTyDuoc` BEFORE DELETE ON `congtyduoc` FOR EACH ROW UPDATE `hoadonnhaphang` SET IDCongTyDuoc = NULL WHERE `hoadonnhaphang`.IDCongTyDuoc = OLD.IDCongTyDuoc
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `IDDanhGiaSanPham` int(11) NOT NULL,
  `SoSao` int(11) DEFAULT NULL,
  `MoTa` varchar(1000) DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL,
  `IDNguoiDung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucnhathuoc`
--

CREATE TABLE `danhmucnhathuoc` (
  `IDDanhMucNhaThuoc` int(11) NOT NULL,
  `TenDanhMucNhaThuoc` varchar(100) DEFAULT NULL,
  `IDDanhMucTongQuat` int(11) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmucnhathuoc`
--

INSERT INTO `danhmucnhathuoc` (`IDDanhMucNhaThuoc`, `TenDanhMucNhaThuoc`, `IDDanhMucTongQuat`, `IDNhaThuoc`) VALUES
(3, 'Thuốc da liễu', 3, 1),
(4, 'Viên uống bổ sung vitamin', 4, 1),
(5, 'Khẩu trang', 2, 1),
(6, 'Oxy già', 5, 1),
(7, 'Thuốc tránh thai', 3, 1),
(8, 'Thuốc kháng viêm', 5, 1);

--
-- Bẫy `danhmucnhathuoc`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaDanhMucNhaThuoc` BEFORE DELETE ON `danhmucnhathuoc` FOR EACH ROW UPDATE `sanpham` SET IDDanhMucNhaThuoc = NULL WHERE `sanpham`.IDDanhMucNhaThuoc = OLD.IDDanhMucNhaThuoc
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctongquat`
--

CREATE TABLE `danhmuctongquat` (
  `IDDanhMucTongQuat` int(11) NOT NULL,
  `TenDanhMucTongQuat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuctongquat`
--

INSERT INTO `danhmuctongquat` (`IDDanhMucTongQuat`, `TenDanhMucTongQuat`) VALUES
(2, 'Dụng cụ y tế'),
(3, 'Thuốc không kê đơn'),
(4, 'Thực phẩm chức năng'),
(5, 'Thuốc sát trùng'),
(6, 'Thuốc kháng sinh');

--
-- Bẫy `danhmuctongquat`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaDanhMucTongQuat` BEFORE DELETE ON `danhmuctongquat` FOR EACH ROW UPDATE `danhmucnhathuoc` SET IDDanhMucTongQuat = NULL WHERE `danhmucnhathuoc`.IDDanhMucTongQuat = OLD.IDDanhMucTongQuat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgiasanpham`
--

CREATE TABLE `giamgiasanpham` (
  `IDGiamGiaSanPham` int(11) NOT NULL,
  `Gia` int(11) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giasanpham`
--

CREATE TABLE `giasanpham` (
  `IDGiaSanPham` int(11) NOT NULL,
  `Gia` int(11) DEFAULT NULL,
  `DonVi` varchar(100) DEFAULT NULL,
  `NgayCapNhat` date DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giasanpham`
--

INSERT INTO `giasanpham` (`IDGiaSanPham`, `Gia`, `DonVi`, `NgayCapNhat`, `IDSanPham`) VALUES
(3, 330000, 'Hộp', NULL, 3),
(4, 200000, 'Hộp', NULL, 4),
(5, 240000, 'Hộp', NULL, 5),
(6, 240000, 'Hộp', NULL, 6),
(7, 120000, 'Hộp', NULL, 7),
(8, 240000, 'Hộp', NULL, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `IDHinhAnh` int(11) NOT NULL,
  `HinhAnh` varchar(1000) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`IDHinhAnh`, `HinhAnh`, `IDNhaThuoc`) VALUES
(3, '1-images (3).jpg', 1),
(4, '4-images (2).jpg', 1),
(5, '5-images (4).jpg', 1),
(6, '6-images (5).jpg', 1),
(7, '7-images.jpg', 1),
(8, '8-images (6).jpg', 1);

--
-- Bẫy `hinhanh`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaHinhAnh` BEFORE DELETE ON `hinhanh` FOR EACH ROW UPDATE `sanpham` SET IDHinhAnh = NULL WHERE `sanpham`.IDHinhAnh = OLD.IDHinhAnh
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhaphang`
--

CREATE TABLE `hoadonnhaphang` (
  `IDHoaDonNhapHang` int(11) NOT NULL,
  `NgayThanhToan` date DEFAULT NULL,
  `IDCongTyDuoc` int(11) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhaphang`
--

INSERT INTO `hoadonnhaphang` (`IDHoaDonNhapHang`, `NgayThanhToan`, `IDCongTyDuoc`, `IDNhaThuoc`) VALUES
(3, '2021-06-27', 2, 1),
(4, '2021-06-27', 3, 1),
(5, '2021-06-27', 2, 1);

--
-- Bẫy `hoadonnhaphang`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaHoaDonNhapHang` BEFORE DELETE ON `hoadonnhaphang` FOR EACH ROW DELETE FROM `chitiethoadonnhaphang` WHERE `chitiethoadonnhaphang`.IDHoaDonNhapHang = OLD.IDHoaDonNhapHang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonpaypal`
--

CREATE TABLE `hoadonpaypal` (
  `IDHoaDonPayPal` varchar(100) NOT NULL,
  `Intent` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `CurrencyCode` varchar(10) DEFAULT NULL,
  `MerchantId` varchar(100) DEFAULT NULL,
  `PayeeEmail` varchar(100) DEFAULT NULL,
  `PayerId` varchar(100) DEFAULT NULL,
  `PayerName` varchar(100) DEFAULT NULL,
  `AddressLine1` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `AdminArea2` varchar(100) DEFAULT NULL,
  `AdminArea1` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(100) DEFAULT NULL,
  `CountryCode` varchar(10) DEFAULT NULL,
  `PayerEmail` varchar(100) DEFAULT NULL,
  `CreateTime` date DEFAULT NULL,
  `GiaoHang` tinyint(1) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `hoadonpaypal`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaHoaDonPayPal` BEFORE DELETE ON `hoadonpaypal` FOR EACH ROW BEGIN
DELETE FROM `chitiethoadonxuathang` WHERE `chitiethoadonxuathang`.IDHoaDonPayPal = OLD.IDHoaDonPayPal;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonxuathang`
--

CREATE TABLE `hoadonxuathang` (
  `IDHoaDonXuatHang` int(11) NOT NULL,
  `TenNguoiMua` varchar(100) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(1000) DEFAULT NULL,
  `ToaDo` varchar(100) DEFAULT NULL,
  `NgayThanhToan` date DEFAULT NULL,
  `GiaoHang` tinyint(1) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `hoadonxuathang`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaHoaDonXuatHang` BEFORE DELETE ON `hoadonxuathang` FOR EACH ROW BEGIN
DELETE FROM `chitiethoadonxuathang` WHERE `chitiethoadonxuathang`.IDHoaDonXuatHang = OLD.IDHoaDonXuatHang;
DELETE FROM `chitietdonthuoc` WHERE `chitietdonthuoc`.IDHoaDonXuatHang = OLD.IDHoaDonXuatHang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luotchon`
--

CREATE TABLE `luotchon` (
  `IDLuotChon` int(11) NOT NULL,
  `IDNguoiDung` int(11) DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL,
  `SoLanChon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luotchon`
--

INSERT INTO `luotchon` (`IDLuotChon`, `IDNguoiDung`, `IDSanPham`, `SoLanChon`) VALUES
(8, 1, 3, 3),
(9, 1, 4, 2),
(10, 1, 5, 1),
(11, 3, 3, 3),
(12, 3, 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `IDNguoiDung` int(11) NOT NULL,
  `TenNguoiDung` varchar(100) DEFAULT NULL,
  `SDT` varchar(100) DEFAULT NULL,
  `CMND` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `TaiKhoan` varchar(100) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL,
  `LoaiTaiKhoan` int(11) DEFAULT NULL,
  `NguoiDangKy` tinyint(1) DEFAULT NULL,
  `AnhDaiDien` varchar(1000) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`IDNguoiDung`, `TenNguoiDung`, `SDT`, `CMND`, `Email`, `TaiKhoan`, `MatKhau`, `LoaiTaiKhoan`, `NguoiDangKy`, `AnhDaiDien`, `IDNhaThuoc`) VALUES
(1, 'Admin', '0123456789', '0123456789', 'hieuyeu111987@gmail.com', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, '1-012478400_1519378048-1.jpg', NULL),
(2, 'Người dùng 1', '0987654321', '0987654321', 'nguoidung1@gmail.com', 'nguoidung1', '21232f297a57a5a743894a0e4a801fc3', 2, NULL, '2-12C4.png', 2),
(3, 'hieu', '0123456789', '0123456789', 'hieuyeu987@gmail.com', 'hieu', '968855132dc5d0eb2ed7c0fc4ef3421e', 2, NULL, '3-HH.jpg', 1),
(4, 'Lê Võ Trung Hiếu', '0972639656', '362522688', 'hieuyeu987@gmail.com', 'lvthieu', '968855132dc5d0eb2ed7c0fc4ef3421e', 2, 1, '12C4.png', 3);

--
-- Bẫy `nguoidung`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaNguoiDung` BEFORE DELETE ON `nguoidung` FOR EACH ROW UPDATE `yeuthich` SET IDNguoiDung = NULL WHERE `yeuthich`.IDNguoiDung = OLD.IDNguoiDung
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhathuoc`
--

CREATE TABLE `nhathuoc` (
  `IDNhaThuoc` int(11) NOT NULL,
  `TenNhaThuoc` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `GiayPhep` varchar(100) DEFAULT NULL,
  `SDT` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `WebSite` varchar(100) DEFAULT NULL,
  `ToaDo` varchar(1000) DEFAULT NULL,
  `NgayDangKy` date DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL,
  `AnhDaiDien` varchar(1000) DEFAULT NULL,
  `IDPayPal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhathuoc`
--

INSERT INTO `nhathuoc` (`IDNhaThuoc`, `TenNhaThuoc`, `DiaChi`, `GiayPhep`, `SDT`, `Email`, `WebSite`, `ToaDo`, `NgayDangKy`, `TrangThai`, `AnhDaiDien`, `IDPayPal`) VALUES
(1, 'Hieu', 'abc', '1-Giay-phep-nha-thuoc-2.jpg', '0123456789', 'hieu@gmail.com', 'abc.com', '10.046985402339846, 105.76678049550094', '2021-03-01', 1, '1-icon-bo-y-te.png', 'DA8Z2U5WKDN46'),
(2, 'Test01', '123', '2-Giay-phep-nha-thuoc-2.jpg', '0123456789', 'Test01@gmail.com', 'Test01.com', '10.043963995683745, 105.76390805859756', '2021-04-06', 1, 'Logo_macdinh.png', 'DA8Z2U5WKDN46'),
(3, 'LVT Hiếu', '256 Đ. Nguyễn Văn Cừ, An Hoà, Ninh Kiều, Cần Thơ', '3-Giay-phep-nha-thuoc-2.jpg', '0972639656', 'hieuyeu987@gmail.com', 'lvthieu.com', '10.046835191027945, 105.76810330152513', '2021-06-27', 1, '3-Icon-Web-150-x-150-08.png', 'DA8Z2U5WKDN46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) DEFAULT NULL,
  `Mota` varchar(1000) DEFAULT NULL,
  `IDHinhAnh` int(11) DEFAULT NULL,
  `IDDanhMucNhaThuoc` int(11) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `Mota`, `IDHinhAnh`, `IDDanhMucNhaThuoc`, `IDNhaThuoc`) VALUES
(3, 'Otiv', 'Mô tả', 3, 4, 1),
(4, 'Hewel 30VQ', 'Mô tả 2', 6, 4, 1),
(5, 'SP 3', 'Mô tả 3', 4, 4, 1),
(6, 'SP 4', 'Mô tả 4', 5, 4, 1),
(7, 'SP 5', 'Mô tả 5', 7, 4, 1),
(8, 'SP 6', 'Mô tả 6', 8, 4, 1);

--
-- Bẫy `sanpham`
--
DELIMITER $$
CREATE TRIGGER `TrG_XoaSanPham` BEFORE DELETE ON `sanpham` FOR EACH ROW BEGIN
DELETE FROM `chitiethoadonxuathang` WHERE `chitiethoadonxuathang`.IDSanPham = OLD.IDSanPham;
DELETE FROM `chitiethoadonnhaphang` WHERE `chitiethoadonnhaphang`.IDSanPham = OLD.IDSanPham;
DELETE FROM `yeuthich` WHERE `yeuthich`.IDSanPham = OLD.IDSanPham;
DELETE FROM `giasanpham` WHERE `giasanpham`.IDSanPham = OLD.IDSanPham;
DELETE FROM `danhgiasanpham` WHERE `danhgiasanpham`.IDSanPham = OLD.IDSanPham;
DELETE FROM `giamgiasanpham` WHERE `giamgiasanpham`.IDSanPham = OLD.IDSanPham;
DELETE FROM `chitiethoadonxuathang` WHERE `chitiethoadonxuathang`.IDSanPham = OLD.IDSanPham;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `IDTinTuc` int(11) NOT NULL,
  `TenTinTuc` varchar(100) DEFAULT NULL,
  `AnhDaiDien` varchar(1000) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trungbay`
--

CREATE TABLE `trungbay` (
  `IDTrungBay` int(11) NOT NULL,
  `NoiDung` varchar(100) DEFAULT NULL,
  `KichThuoc` int(11) DEFAULT NULL,
  `MauSac` varchar(100) DEFAULT NULL,
  `Khac` varchar(100) DEFAULT NULL,
  `IDNhaThuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trungbay`
--

INSERT INTO `trungbay` (`IDTrungBay`, `NoiDung`, `KichThuoc`, `MauSac`, `Khac`, `IDNhaThuoc`) VALUES
(1, 'AnhDaiDien', 1, 'info', NULL, 1),
(2, 'TenNhaThuoc', 11, 'info', NULL, 1),
(3, 'Trong', 12, 'white', NULL, 1),
(4, 'Trong', 1, 'white', NULL, 1),
(5, 'DanhMucNhaThuoc', 10, 'info', NULL, 1),
(6, 'Trong', 1, 'white', NULL, 1),
(7, 'Trong', 12, 'white', NULL, 1),
(8, 'Trong', 1, 'white', NULL, 1),
(9, 'DanhSachSanPham', 10, 'info', NULL, 1),
(10, 'Trong', 1, 'white', NULL, 1),
(11, 'Trong', 12, 'white', NULL, 1),
(12, 'Trong', 1, 'white', NULL, 1),
(13, 'Trong', 10, 'info', NULL, 1),
(14, 'Trong', 1, 'white', NULL, 1),
(15, 'AnhDaiDien', 1, 'info', NULL, 3),
(16, 'TenNhaThuoc', 11, 'info', NULL, 3),
(17, 'DanhMucNhaThuoc', 12, 'info', NULL, 3),
(18, 'DanhSachSanPham', 12, 'info', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthich`
--

CREATE TABLE `yeuthich` (
  `IDYeuThich` int(11) NOT NULL,
  `IDNguoiDung` int(11) DEFAULT NULL,
  `IDSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD PRIMARY KEY (`IDChiTietDonThuoc`),
  ADD KEY `FK_ChiTietDonThuoc_HoaDonXuatHang` (`IDHoaDonXuatHang`);

--
-- Chỉ mục cho bảng `chitiethoadonnhaphang`
--
ALTER TABLE `chitiethoadonnhaphang`
  ADD PRIMARY KEY (`IDChiTietHoaDonNhapHang`),
  ADD KEY `FK_ChiTietHoaDonNhapHang_SanPham` (`IDSanPham`),
  ADD KEY `FK_ChiTietHoaDonNhapHang_HoaDonNhapHang` (`IDHoaDonNhapHang`);

--
-- Chỉ mục cho bảng `chitiethoadonxuathang`
--
ALTER TABLE `chitiethoadonxuathang`
  ADD PRIMARY KEY (`IDChiTietHoaDonXuatHang`),
  ADD KEY `FK_ChiTietHoaDonXuatHang_HoaDonXuatHang` (`IDHoaDonXuatHang`),
  ADD KEY `FK_ChiTietHoaDonXuatHang_NguoiDung` (`IDNguoiDung`),
  ADD KEY `FK_ChiTietHoaDonXuatHang_HoaDonPayPal` (`IDHoaDonPayPal`),
  ADD KEY `FK_ChiTietHoaDonXuatHang_SanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `congtyduoc`
--
ALTER TABLE `congtyduoc`
  ADD PRIMARY KEY (`IDCongTyDuoc`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`IDDanhGiaSanPham`),
  ADD KEY `FK_DanhGiaSanPham_SanPham` (`IDSanPham`),
  ADD KEY `FK_DanhGiaSanPham_NguoiDung` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `danhmucnhathuoc`
--
ALTER TABLE `danhmucnhathuoc`
  ADD PRIMARY KEY (`IDDanhMucNhaThuoc`),
  ADD KEY `FK_DanhMucNhaThuoc_NhaThuoc` (`IDNhaThuoc`),
  ADD KEY `FK_DanhMucNhaThuoc_DanhMucTongQuat` (`IDDanhMucTongQuat`);

--
-- Chỉ mục cho bảng `danhmuctongquat`
--
ALTER TABLE `danhmuctongquat`
  ADD PRIMARY KEY (`IDDanhMucTongQuat`);

--
-- Chỉ mục cho bảng `giamgiasanpham`
--
ALTER TABLE `giamgiasanpham`
  ADD PRIMARY KEY (`IDGiamGiaSanPham`),
  ADD KEY `FK_GiamGiaSanPham_SanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `giasanpham`
--
ALTER TABLE `giasanpham`
  ADD PRIMARY KEY (`IDGiaSanPham`),
  ADD KEY `FK_GiaSanPham_SanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`IDHinhAnh`),
  ADD KEY `FK_KhoAnh_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `hoadonnhaphang`
--
ALTER TABLE `hoadonnhaphang`
  ADD PRIMARY KEY (`IDHoaDonNhapHang`),
  ADD KEY `FK_HoaDonNhapHang_CongTyDuoc` (`IDCongTyDuoc`),
  ADD KEY `FK_HoaDonNhapHang_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `hoadonpaypal`
--
ALTER TABLE `hoadonpaypal`
  ADD PRIMARY KEY (`IDHoaDonPayPal`),
  ADD KEY `FK_HoaDonPayPal_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `hoadonxuathang`
--
ALTER TABLE `hoadonxuathang`
  ADD PRIMARY KEY (`IDHoaDonXuatHang`),
  ADD KEY `FK_HoaDonXuatHang_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `luotchon`
--
ALTER TABLE `luotchon`
  ADD PRIMARY KEY (`IDLuotChon`),
  ADD KEY `FK_LuotChon_SanPham` (`IDSanPham`),
  ADD KEY `FK_LuotChon_NguoiDung` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`IDNguoiDung`),
  ADD KEY `FK_NguoiDung_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `nhathuoc`
--
ALTER TABLE `nhathuoc`
  ADD PRIMARY KEY (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `FK_SanPham_HinhAnh` (`IDHinhAnh`),
  ADD KEY `FK_SanPham_DanhMucNhaThuoc` (`IDDanhMucNhaThuoc`),
  ADD KEY `FK_SanPham_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`IDTinTuc`);

--
-- Chỉ mục cho bảng `trungbay`
--
ALTER TABLE `trungbay`
  ADD PRIMARY KEY (`IDTrungBay`),
  ADD KEY `FK_TrungBay_NhaThuoc` (`IDNhaThuoc`);

--
-- Chỉ mục cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`IDYeuThich`),
  ADD KEY `FK_YeuThich_NguoiDung` (`IDNguoiDung`),
  ADD KEY `FK_YeuThich_SanPham` (`IDSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  MODIFY `IDChiTietDonThuoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiethoadonnhaphang`
--
ALTER TABLE `chitiethoadonnhaphang`
  MODIFY `IDChiTietHoaDonNhapHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chitiethoadonxuathang`
--
ALTER TABLE `chitiethoadonxuathang`
  MODIFY `IDChiTietHoaDonXuatHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `congtyduoc`
--
ALTER TABLE `congtyduoc`
  MODIFY `IDCongTyDuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `IDDanhGiaSanPham` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmucnhathuoc`
--
ALTER TABLE `danhmucnhathuoc`
  MODIFY `IDDanhMucNhaThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhmuctongquat`
--
ALTER TABLE `danhmuctongquat`
  MODIFY `IDDanhMucTongQuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giamgiasanpham`
--
ALTER TABLE `giamgiasanpham`
  MODIFY `IDGiamGiaSanPham` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giasanpham`
--
ALTER TABLE `giasanpham`
  MODIFY `IDGiaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `IDHinhAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadonnhaphang`
--
ALTER TABLE `hoadonnhaphang`
  MODIFY `IDHoaDonNhapHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadonxuathang`
--
ALTER TABLE `hoadonxuathang`
  MODIFY `IDHoaDonXuatHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `luotchon`
--
ALTER TABLE `luotchon`
  MODIFY `IDLuotChon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `IDNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhathuoc`
--
ALTER TABLE `nhathuoc`
  MODIFY `IDNhaThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `IDTinTuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trungbay`
--
ALTER TABLE `trungbay`
  MODIFY `IDTrungBay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `IDYeuThich` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD CONSTRAINT `FK_ChiTietDonThuoc_HoaDonXuatHang` FOREIGN KEY (`IDHoaDonXuatHang`) REFERENCES `hoadonxuathang` (`IDHoaDonXuatHang`);

--
-- Các ràng buộc cho bảng `chitiethoadonnhaphang`
--
ALTER TABLE `chitiethoadonnhaphang`
  ADD CONSTRAINT `FK_ChiTietHoaDonNhapHang_HoaDonNhapHang` FOREIGN KEY (`IDHoaDonNhapHang`) REFERENCES `hoadonnhaphang` (`IDHoaDonNhapHang`),
  ADD CONSTRAINT `FK_ChiTietHoaDonNhapHang_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `chitiethoadonxuathang`
--
ALTER TABLE `chitiethoadonxuathang`
  ADD CONSTRAINT `FK_ChiTietHoaDonXuatHang_HoaDonPayPal` FOREIGN KEY (`IDHoaDonPayPal`) REFERENCES `hoadonpaypal` (`IDHoaDonPayPal`),
  ADD CONSTRAINT `FK_ChiTietHoaDonXuatHang_HoaDonXuatHang` FOREIGN KEY (`IDHoaDonXuatHang`) REFERENCES `hoadonxuathang` (`IDHoaDonXuatHang`),
  ADD CONSTRAINT `FK_ChiTietHoaDonXuatHang_NguoiDung` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `FK_ChiTietHoaDonXuatHang_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `FK_DanhGiaSanPham_NguoiDung` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `FK_DanhGiaSanPham_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `danhmucnhathuoc`
--
ALTER TABLE `danhmucnhathuoc`
  ADD CONSTRAINT `FK_DanhMucNhaThuoc_DanhMucTongQuat` FOREIGN KEY (`IDDanhMucTongQuat`) REFERENCES `danhmuctongquat` (`IDDanhMucTongQuat`),
  ADD CONSTRAINT `FK_DanhMucNhaThuoc_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `giamgiasanpham`
--
ALTER TABLE `giamgiasanpham`
  ADD CONSTRAINT `FK_GiamGiaSanPham_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `giasanpham`
--
ALTER TABLE `giasanpham`
  ADD CONSTRAINT `FK_GiaSanPham_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `FK_KhoAnh_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `hoadonnhaphang`
--
ALTER TABLE `hoadonnhaphang`
  ADD CONSTRAINT `FK_HoaDonNhapHang_CongTyDuoc` FOREIGN KEY (`IDCongTyDuoc`) REFERENCES `congtyduoc` (`IDCongTyDuoc`),
  ADD CONSTRAINT `FK_HoaDonNhapHang_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `hoadonpaypal`
--
ALTER TABLE `hoadonpaypal`
  ADD CONSTRAINT `FK_HoaDonPayPal_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `hoadonxuathang`
--
ALTER TABLE `hoadonxuathang`
  ADD CONSTRAINT `FK_HoaDonXuatHang_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `luotchon`
--
ALTER TABLE `luotchon`
  ADD CONSTRAINT `FK_LuotChon_NguoiDung` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `FK_LuotChon_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `FK_NguoiDung_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_DanhMucNhaThuoc` FOREIGN KEY (`IDDanhMucNhaThuoc`) REFERENCES `danhmucnhathuoc` (`IDDanhMucNhaThuoc`),
  ADD CONSTRAINT `FK_SanPham_HinhAnh` FOREIGN KEY (`IDHinhAnh`) REFERENCES `hinhanh` (`IDHinhAnh`),
  ADD CONSTRAINT `FK_SanPham_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `trungbay`
--
ALTER TABLE `trungbay`
  ADD CONSTRAINT `FK_TrungBay_NhaThuoc` FOREIGN KEY (`IDNhaThuoc`) REFERENCES `nhathuoc` (`IDNhaThuoc`);

--
-- Các ràng buộc cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `FK_YeuThich_NguoiDung` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `FK_YeuThich_SanPham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
