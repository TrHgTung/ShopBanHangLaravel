-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 29, 2023 lúc 03:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_17_180757_create_tbl_admin_table', 1),
(6, '2023_06_19_190604_create_tbl_category_product', 2),
(7, '2023_06_27_122043_create_tbl_brand_product', 3),
(8, '2023_06_27_123711_create_tbl_brand_product', 4),
(9, '2023_06_27_151326_create_tbl_product', 5),
(10, '2023_08_17_120700_tbl_customer', 6),
(11, '2023_08_18_045403_tbl_shipping', 7),
(12, '2023_08_29_114659_tbl_payment', 8),
(13, '2023_08_29_114914_tbl_order', 8),
(14, '2023_08_29_114948_tbl_order_details', 8),
(15, '2023_08_30_100654_tbl_shipping_auth', 9),
(16, '2023_08_30_101427_tbl_shipping_auth', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(64) NOT NULL,
  `admin_name` varchar(32) NOT NULL,
  `admin_phone` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@example.com', 'f925916e2754e5e03f75dd58a5733251', 'Tung', '0123456789', '2023-06-17 18:21:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(10, 'Nhà Xuất bản Giáo dục', 'Nhà Xuất bản Giáo dục (hay NXB Giáo dục) là đơn vị xuất bản uy tín về các ấn phẩm giáo dục Việt Nam', 1, NULL, NULL),
(11, 'Nhà Xuất bản Trẻ', 'Nhà Xuất bản Trẻ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(7, 'Sách giáo khoa', 'Dành cho các cấp học sinh', 1, NULL, NULL),
(8, 'Giáo trình', 'Dành cho sinh viên đại học/cao đẳng/cao học', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(32) NOT NULL,
  `customer_password` varchar(64) NOT NULL,
  `customer_phone` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(4, 'Trinh Hoang Tung', '4601104211@student.hcmue', 'f925916e2754e5e03f75dd58a5733251', '090909090', NULL, NULL),
(5, 'admin', 'test@example.com', 'f925916e2754e5e03f75dd58a5733251', '0909909', NULL, NULL),
(6, 'Tun g', '123@email.com', 'f925916e2754e5e03f75dd58a5733251', '322323', NULL, NULL),
(7, 'Admin', 'admin@example.com', '202cb962ac59075b964b07152d234b70', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `shipping_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `order_total` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '6', '7', '1', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(2, '6', '7', '2', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(3, '6', '7', '3', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(4, '6', '7', '4', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(5, '6', '7', '5', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(6, '6', '7', '6', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(7, '6', '7', '7', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(8, '6', '7', '8', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(9, '6', '7', '9', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(10, '6', '7', '10', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(11, '6', '7', '11', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(12, '6', '7', '12', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(13, '6', '7', '13', '170200.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(14, '6', '8', '14', '43700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(15, '6', '8', '15', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(16, '7', '9', '16', '98900.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(17, '6', '10', '17', '49450.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(18, '6', '11', '19', '207,000.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(19, '6', '11', '20', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(20, '6', '11', '21', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(21, '6', '11', '22', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(22, '6', '11', '23', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(23, '6', '11', '24', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(24, '6', '12', '25', '155,250.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(25, '6', '12', '26', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(26, '6', '12', '27', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(27, '6', '12', '28', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(28, '6', '13', '29', '49,450.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(29, '6', '13', '30', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(30, '6', '13', '31', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(31, '6', '13', '32', '0.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(32, '6', '14', '33', '98,900.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(33, '6', '14', '34', '98,900.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(34, '6', '15', '35', '98,900.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(35, '6', '16', '36', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(36, '6', '16', '37', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(37, '6', '16', '38', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(38, '6', '16', '39', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(39, '6', '17', '40', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(40, '6', '17', '41', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(41, '6', '17', '42', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(42, '6', '17', '43', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(43, '6', '17', '44', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(44, '6', '17', '45', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(45, '6', '17', '46', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(46, '6', '17', '47', '21,850.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(47, '6', '18', '48', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(48, '6', '18', '49', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(49, '6', '18', '50', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(50, '6', '18', '51', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(51, '6', '18', '52', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(52, '6', '18', '53', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(53, '6', '18', '54', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(54, '6', '18', '55', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(55, '6', '18', '56', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(56, '6', '18', '57', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(57, '6', '18', '58', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(58, '6', '18', '59', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(59, '6', '18', '60', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(60, '6', '18', '61', '43,700.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(61, '6', '19', '62', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(62, '6', '19', '63', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(63, '6', '19', '64', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(64, '6', '19', '65', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(65, '6', '19', '66', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(66, '6', '19', '67', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(67, '6', '19', '68', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(68, '6', '19', '69', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(69, '6', '19', '70', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(70, '6', '19', '71', '65,550.00', 'Dang cho xu ly (pneding)', NULL, NULL),
(71, '6', '20', '72', '98,900.00', 'pending', NULL, NULL),
(72, '6', '20', '73', '98,900.00', 'pending', NULL, NULL),
(73, '6', '21', '74', '49,450.00', 'pending', NULL, NULL),
(74, '6', '21', '75', '49,450.00', 'pending', NULL, NULL),
(75, '6', '21', '76', '49,450.00', 'pending', NULL, NULL),
(76, '6', '21', '77', '49,450.00', 'pending', NULL, NULL),
(77, '6', '21', '78', '49,450.00', 'pending', NULL, NULL),
(78, '6', '21', '79', '49,450.00', 'pending', NULL, NULL),
(79, '6', '22', '80', '21,850.00', 'pending', NULL, NULL),
(80, '6', '22', '81', '21,850.00', 'pending', NULL, NULL),
(81, '6', '23', '82', '49,450.00', 'pending', NULL, NULL),
(82, '6', '23', '83', '49,450.00', 'pending', NULL, NULL),
(83, '6', '24', '84', '98,900.00', 'pending', NULL, NULL),
(84, '6', '25', '85', '148,350.00', 'pending', NULL, NULL),
(85, '6', '25', '86', '148,350.00', 'pending', NULL, NULL),
(86, '6', '25', '87', '148,350.00', 'pending', NULL, NULL),
(87, '6', '25', '88', '148,350.00', 'pending', NULL, NULL),
(88, '6', '25', '89', '148,350.00', 'pending', NULL, NULL),
(89, '6', '25', '90', '148,350.00', 'pending', NULL, NULL),
(90, '6', '25', '91', '148,350.00', 'pending', NULL, NULL),
(91, '6', '25', '92', '148,350.00', 'pending', NULL, NULL),
(92, '6', '25', '93', '148,350.00', 'pending', NULL, NULL),
(93, '6', '25', '94', '148,350.00', 'pending', NULL, NULL),
(94, '6', '25', '95', '148,350.00', 'pending', NULL, NULL),
(95, '6', '25', '96', '148,350.00', 'pending', NULL, NULL),
(96, '6', '25', '97', '148,350.00', 'pending', NULL, NULL),
(97, '6', '25', '98', '148,350.00', 'pending', NULL, NULL),
(98, '6', '25', '99', '148,350.00', 'pending', NULL, NULL),
(99, '6', '26', '100', '148,350.00', 'pending', NULL, NULL),
(100, '6', '26', '101', '148,350.00', 'pending', NULL, NULL),
(101, '6', '27', '102', '148,350.00', 'pending', NULL, NULL),
(102, '6', '27', '103', '148,350.00', 'pending', NULL, NULL),
(103, '6', '27', '104', '148,350.00', 'pending', NULL, NULL),
(104, '6', '27', '105', '148,350.00', 'pending', NULL, NULL),
(105, '6', '28', '106', '49,450.00', 'pending', NULL, NULL),
(106, '6', '28', '107', '49,450.00', 'pending', NULL, NULL),
(107, '6', '28', '108', '49,450.00', 'pending', NULL, NULL),
(108, '6', '28', '109', '49,450.00', 'pending', NULL, NULL),
(109, '6', '29', '110', '49,450.00', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(2, '1', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(3, '2', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(4, '2', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(5, '3', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(6, '3', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(7, '4', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(8, '4', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(9, '5', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(10, '5', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(11, '6', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(12, '6', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(13, '7', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(14, '7', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(15, '8', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(16, '8', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(17, '9', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(18, '9', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(19, '10', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(20, '10', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(21, '11', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(22, '11', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(23, '12', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(24, '12', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(25, '13', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(26, '13', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(27, '14', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(28, '16', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(29, '17', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(30, '18', '14', 'Tuổi trẻ đáng giá bao nhiêu', '45000', 4, NULL, NULL),
(31, '24', '14', 'Tuổi trẻ đáng giá bao nhiêu', '45000', 3, NULL, NULL),
(32, '28', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(33, '32', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(34, '33', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(35, '34', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(36, '35', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(37, '36', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(38, '37', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(39, '38', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(40, '39', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(41, '40', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(42, '41', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(43, '42', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(44, '43', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(45, '44', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(46, '45', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(47, '46', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(48, '47', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(49, '48', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(50, '49', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(51, '50', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(52, '51', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(53, '52', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(54, '53', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(55, '54', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(56, '55', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(57, '56', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(58, '57', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(59, '58', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(60, '59', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(61, '60', '11', 'Toán bài tập lớp 1', '19000', 2, NULL, NULL),
(62, '61', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(63, '62', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(64, '63', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(65, '64', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(66, '65', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(67, '66', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(68, '67', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(69, '68', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(70, '69', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(71, '70', '11', 'Toán bài tập lớp 1', '19000', 3, NULL, NULL),
(72, '71', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(73, '72', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(74, '73', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(75, '74', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(76, '75', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(77, '76', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(78, '77', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(79, '78', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(80, '79', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(81, '80', '11', 'Toán bài tập lớp 1', '19000', 1, NULL, NULL),
(82, '81', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(83, '82', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(84, '83', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 2, NULL, NULL),
(85, '84', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(86, '85', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(87, '86', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(88, '87', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(89, '88', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(90, '89', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(91, '90', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(92, '91', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(93, '92', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(94, '93', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(95, '94', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(96, '95', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(97, '96', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(98, '97', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(99, '98', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(100, '99', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(101, '100', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(102, '101', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(103, '102', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(104, '103', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(105, '104', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 3, NULL, NULL),
(106, '105', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(107, '106', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(108, '107', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(109, '108', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL),
(110, '109', '13', 'Xác suất thống kê và Ứng dụng (2023)', '43000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(61, '3', 'Dang cho xu ly (pending)', NULL, NULL),
(62, '3', 'Dang cho xu ly (pending)', NULL, NULL),
(63, '3', 'Dang cho xu ly (pending)', NULL, NULL),
(64, '3', 'Dang cho xu ly (pending)', NULL, NULL),
(65, '3', 'pending', NULL, NULL),
(66, '3', 'pending', NULL, NULL),
(67, '3', 'pending', NULL, NULL),
(68, '3', 'pending', NULL, NULL),
(69, '3', 'pending', NULL, NULL),
(70, '3', 'pending', NULL, NULL),
(71, '3', 'pending', NULL, NULL),
(72, '3', 'pending', NULL, NULL),
(73, '3', 'pending', NULL, NULL),
(74, '3', 'pending', NULL, NULL),
(75, '3', 'pending', NULL, NULL),
(76, '3', 'pending', NULL, NULL),
(77, '3', 'pending', NULL, NULL),
(78, '3', 'pending', NULL, NULL),
(79, '3', 'pending', NULL, NULL),
(80, '3', 'pending', NULL, NULL),
(81, '3', 'pending', NULL, NULL),
(82, '3', 'pending', NULL, NULL),
(83, '3', 'pending', NULL, NULL),
(84, '3', 'pending', NULL, NULL),
(85, '3', 'pending', NULL, NULL),
(86, '3', 'pending', NULL, NULL),
(87, '3', 'pending', NULL, NULL),
(88, '3', 'pending', NULL, NULL),
(89, '3', 'pending', NULL, NULL),
(90, '3', 'pending', NULL, NULL),
(91, '3', 'pending', NULL, NULL),
(92, '3', 'pending', NULL, NULL),
(93, '3', 'pending', NULL, NULL),
(94, '3', 'pending', NULL, NULL),
(95, '3', 'pending', NULL, NULL),
(96, '3', 'pending', NULL, NULL),
(97, '3', 'pending', NULL, NULL),
(98, '3', 'pending', NULL, NULL),
(99, '3', 'pending', NULL, NULL),
(100, '3', 'pending', NULL, NULL),
(101, '3', 'pending', NULL, NULL),
(102, '3', 'pending', NULL, NULL),
(103, '3', 'pending', NULL, NULL),
(104, '3', 'pending', NULL, NULL),
(105, '3', 'pending', NULL, NULL),
(106, '3', 'pending', NULL, NULL),
(107, '3', 'pending', NULL, NULL),
(108, '3', 'pending', NULL, NULL),
(109, '3', 'pending', NULL, NULL),
(110, '3', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(11, 'Toán bài tập lớp 1', 7, 10, 'Sách bài tập toán lớp 1', 'Dành cho cấp bậc Tiểu học, cụ thể học sinh lớp 1 chính quy', '19000', 'IMG93_000.jpg', 0, NULL, NULL),
(12, 'Tiếng Việt lớp 2', 7, 10, 'Dành cho cấp bậc Tiểu học', 'Cụ thể học sinh lớp 2 chính quy', '19000', 'IMG66_Screenshot-2022-02-10-204134-58.png', 0, NULL, NULL),
(13, 'Xác suất thống kê và Ứng dụng (2023)', 8, 11, 'XSTK UD cấp Đại học', 'Giáo trình chính quy về học phần Xác suất thống kê và ứng dụng (năm 2023) được nhiều trường Đại học và Cao đẳng áp dụng vào việc giảng dạy và nghiên cứu.', '43000', 'IMG60_xstk_thumbnail.jpg', 0, NULL, NULL),
(14, 'Tuổi trẻ đáng giá bao nhiêu', 8, 11, 'TTDGBN', 'Tình cảm tuổi trẻ trong sáng', '45000', 'IMG69_tuoi-tre-dang-gia-bn.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `customer_sex` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shop_note` varchar(255) NOT NULL,
  `delivery_note` varchar(255) NOT NULL,
  `recipients_name` varchar(255) NOT NULL,
  `recipients_sex` varchar(255) NOT NULL,
  `recipients_address` varchar(255) NOT NULL,
  `recipients_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `customer_sex`, `shipping_address`, `shipping_phone`, `shop_note`, `delivery_note`, `recipients_name`, `recipients_sex`, `recipients_address`, `recipients_phone`) VALUES
(20, 'Hoang Tung', 'anh', 'fdfd77fd', '099986868', 'tirtuirutu', 'erejrhjehrjehr', 'ddjfd', 'co', '885utjjtjt', '97898998'),
(21, 'hsdhsj', 'anh', 'dhsjhdj', '88778', 'jjhhjw', 'hjhhjh', 'uyyu78', 'anh', 'sjdjshd', '909080'),
(22, 'ruuey', 'anh', '676676', '676676', '676767', '66767776', '767tyuy', 'chi', '67yuyuy', '86878'),
(23, '3434', 'ba', 'ewe34', '434343', 'rêr343', 'rẻ344', '434êr', 'ong', 'ẻ334rè', '3434343'),
(24, 'tung', 'chi', 'sdjjfdj', '0909090', 'dsds', 'dsds', 'dssd', 'chi', 'sadsd', '090'),
(25, 'ttrtr', 'anh', 'dfdf', '0909000', 'dmnfdf', 'kdjfkjdkfj', 'fdfjk', 'chi', 'dkfkdjkdfj', '98989898'),
(26, 'ttrtr', 'anh', 'dfdf', '0909000', 'dmnfdf', 'kdjfkjdkfj', 'fdfjk', 'chi', 'dkfkdjkdfj', '98989898'),
(27, 'tung sp', 'anh', 'djfdfj', '434343', 'dsdsd', 'dssd', 'dsds', 'anh', 'dsdsds', '0909094'),
(28, 'jhdfdhfHFD', 'anh', 'dfhjfhjhd', '099099', ',ndjdfhj', 'jjhdfhjdfh', 'djhjdf', 'anh', 'jhjdhf', '8980'),
(29, 'fjdfjd', 'anh', 'djffjdf', '012121', 'sdssdsd', 'bbbnnbn', 'bnbnbb', 'chi', 'dfdfdf', '08438384');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping_auth`
--

CREATE TABLE `tbl_shipping_auth` (
  `shipper_id` int(10) UNSIGNED NOT NULL,
  `shipper_email` varchar(255) NOT NULL,
  `shipper_password` varchar(255) NOT NULL,
  `shipping_id` varchar(255) NOT NULL,
  `shipping_status` varchar(255) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `shipping_fee` varchar(255) NOT NULL,
  `arrival_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping_auth`
--

INSERT INTO `tbl_shipping_auth` (`shipper_id`, `shipper_email`, `shipper_password`, `shipping_id`, `shipping_status`, `arrival_date`, `shipping_fee`, `arrival_image`, `created_at`, `updated_at`) VALUES
(1, 'shipper01@example.com', '123', '1232433434', '1', '12/12/2023', '123333', 'null', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_shipping_auth`
--
ALTER TABLE `tbl_shipping_auth`
  ADD PRIMARY KEY (`shipper_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping_auth`
--
ALTER TABLE `tbl_shipping_auth`
  MODIFY `shipper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
