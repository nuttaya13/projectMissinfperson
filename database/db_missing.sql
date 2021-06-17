-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 06:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2020-09-06 18:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'พลัดหลง', '2020-08-18 16:24:34', NULL),
(2, 'อาการป่วย', '2020-08-18 16:24:50', NULL),
(3, 'ลักพาตัว', '2020-08-18 16:25:03', NULL),
(4, 'เกิดอุบัติเหตุ', '2020-08-18 16:25:13', NULL),
(5, 'หนีจากบ้าน', '2020-08-18 16:25:24', NULL),
(10, 'ขาดการติดต่อ', '2020-08-29 04:03:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Thailand', 'nuttaya.f@psru.ac.th', '0613453387');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">We offer a varied fleet of cars, ranging from the compact. All our vehicles have air conditioning, &nbsp;power steering, electric windows. All our vehicles are bought and maintained at official dealerships only. Automatic transmission cars are available in every booking class.&nbsp;</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\">As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent.</span><div><span style=\"color: rgb(62, 62, 62); font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-size: 11px;\">ur mission is to be recognised as the global leader in Car Rental for companies and the public and private sector by partnering with our clients to provide the best and most efficient Cab Rental solutions and to achieve service excellence.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\"><br></span></div>'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(150) NOT NULL,
  `Brand` int(11) DEFAULT NULL,
  `Nickname` varchar(50) DEFAULT NULL,
  `Sex` varchar(11) DEFAULT NULL,
  `Age` int(6) DEFAULT NULL,
  `Typepreson` varchar(100) DEFAULT NULL,
  `Weigh` int(11) NOT NULL,
  `Heigh` int(10) NOT NULL,
  `DateMissing` varchar(10) DEFAULT NULL,
  `TimeMissing` time DEFAULT NULL,
  `Clothes` varchar(255) DEFAULT NULL,
  `Notable` varchar(255) DEFAULT NULL,
  `Place` varchar(255) DEFAULT NULL,
  `Tambol` varchar(100) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `Province` varchar(100) DEFAULT NULL,
  `Overview` varchar(255) DEFAULT NULL,
  `CallPhone` varchar(15) NOT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Status` varchar(11) NOT NULL,
  `userEmail` varchar(110) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`id`, `Fullname`, `Brand`, `Nickname`, `Sex`, `Age`, `Typepreson`, `Weigh`, `Heigh`, `DateMissing`, `TimeMissing`, `Clothes`, `Notable`, `Place`, `Tambol`, `District`, `Province`, `Overview`, `CallPhone`, `Vimage1`, `Vimage2`, `Status`, `userEmail`, `RegDate`, `UpdationDate`) VALUES
(47, 'สุพจน์ พูลคล้าย', 1, 'เต้ย', 'ชาย', 23, 'อื่นๆ', 58, 176, '2020-09-09', '10:49:00', 'ชุดนักศึกษา แขนยาว กางเกงสีดำ', 'ผิวคล้ำ', 'มหาวิทยาลัยราชภัฏพิบูลสงคราม', 'พลายชุมพล', 'เมือง', 'พิษณุโลก', '', '0613453387', '1.jpg', '', '1', 'test@gmail.com', '2020-09-11 07:51:39', NULL),
(48, 'ทศพล กลิ่นทอง', 10, 'มาร์ค', 'ชาย', 20, 'มารดา', 58, 170, '2020-09-08', '11:50:00', 'เสื้อแขนยาว กางเกงยีนส์', 'ผิวขาว', 'หมู่บ้านเกศกาล', 'บ้านคลอง', 'เมือง', 'พิษณุโลก', '', '0956425874', '44345700_1903201743094291_3165181036459982848_n.jpg', '23621592_1506954049385731_4022538276310304844_n.jpg', '1', 'test@gmail.com', '2020-09-11 08:01:46', NULL),
(49, 'ฐาปนี ฉ่ำแสง', 4, 'โบว์', 'หญิง', 22, 'บิดา', 68, 168, '2020-09-04', '20:05:00', 'เสื้อสีน้ำเงิน กางเกงขายาว', 'สูง ผิวคล้ำ ตัวใหญ่', 'สี่แยกบ้านคลอง', 'บ้านคลอง', 'เมือง', 'พิษณุโลก', '', '0856421536', '60012352_1282166251948257_8733589741833814016_n.jpg', '101801932_1640938826070996_5589937299485057785_n.jpg', '1', 'test@gmail.com', '2020-09-11 08:06:13', NULL),
(50, 'จักรกฤษณ์ เหล่าอุดม', 3, 'เจมส์', 'ชาย', 28, 'บิดา', 110, 170, '2020-09-01', '06:10:00', 'เสื้อยืด กางเกงวอร์ม', 'รูปร่างอ้วน ผิวคล้ำ', 'มหาวิทยาลัยนเรศวร', 'ท่าโพธิ์', 'เมือง', 'พิษณุโลก', '', '0856421536', '12019872_721168904653696_6868271159360945551_n.jpg', '10959769_631194610317793_6412933406512685997_n.jpg', '1', 'test@gmail.com', '2020-09-11 08:11:23', NULL),
(51, 'ลัลณภัทร สิงห์ลอ', 1, 'อะตอม', 'หญิง', 5, 'มารดา', 25, 120, '2020-09-03', '18:28:00', 'ชุดกระโปรงสีเหลือง', 'ผิวหยักโศก ผมยาว ผิวคล้ำ', 'งานแข่งเรือ', 'ในเมือง', 'เมือง', 'พิจิตร', '', '0954235895', '93660003.jpg', '936600.jpg', '1', 'test@gmail.com', '2020-09-11 08:30:02', NULL),
(52, 'ลดาณภัทร สิงห์ลอ', 3, 'ไอติม', 'หญิง', 2, 'บิดา', 18, 103, '2020-09-02', '19:30:00', 'ชุดเอี๊ยมสีน้ำเงิน', 'ผิวขาว หน้าหมวยๆ ตัวผอมเล็ก', 'ห้างแฮปปี้พลาซ่า', 'ในเมือง', 'เมือง', 'พิจิตร', '', '0934587569', '93660003_2469.jpg', '93660003_246947310019924.jpg', '1', 'test@gmail.com', '2020-09-11 08:36:04', NULL),
(53, 'ณัฐดนัย เฟื่องห้อย', 5, 'เอฟ', 'ชาย', 16, 'บิดา', 47, 162, '2020-09-02', '20:40:00', 'เสื้อคลุมสีน้ำเงิน กางเกงขายาวสีดำ', 'ผิวคล้ำ สูง', 'โรงเรียนพิจิตรพิทยาคม', 'ในเมือง', 'เมือง', 'พิจิตร', '', '0818888461', '109979103.jpg', '63525072034.jpg', '1', 'test@gmail.com', '2020-09-11 08:41:40', NULL),
(54, 'กฤตชญา สุขเกษม', 3, 'นาขวัญ', 'หญิง', 14, 'มารดา', 35, 132, '2020-09-08', '13:55:00', 'ชุดนักเรียน เอี๊ยมสีแดง', 'ตัวเล็ก ผอม ผิวคล้ำ ผมหยักโศก', 'ห้างแฮปปี้พลาซ่า', 'ในเมือง', 'เมือง', 'พิจิตร', '', '0853135215', 'nakwan.jpg', 'nakwan2.jpg', '1', 'test@gmail.com', '2020-09-11 08:48:29', NULL),
(55, 'ลินลดา เปรมใจ', 4, 'เอวา', 'หญิง', 1, 'บิดา', 20, 86, '2020-08-31', '20:00:00', 'ชุดสีขาว', 'ผิวขาว ตัวเล็ก', 'ถนนพิจิตร-สามง่าม', 'คลองคะเชนทร์', 'เมือง', 'พิจิตร', '', '0957541259', '17220096_n.jpg', '7220096_n.jpg', '1', 'test@gmail.com', '2020-09-11 09:02:14', NULL),
(56, 'สุพจน์ พูลคล้าย', 10, 'เต้ย', 'ชาย', 24, 'อื่นๆ', 68, 171, '2020-09-09', '14:25:00', 'เสื้อยืดสีกรม กางเกงขาสั้น', 'ผิวคล้ำ', 'ตึกIT', 'พลายชุมพล', 'เมือง', 'พิษณุโลก', '', '0874523648', '6_n.jpg', '13914101_1050152721730587_205647446461601313_o.jpg', '1', 'test@gmail.com', '2020-09-11 09:27:32', NULL),
(57, 'นงนุช ศรีแสง', 2, 'นุช', 'หญิง', 63, 'บุตร', 68, 165, '2020-08-12', '06:48:00', 'เสื้อปุ๋ยแขนยาว กาางเกงสามส่วน', 'ท้วม ผิวคล้ำ', 'วัดตลองโพธิ์', 'โรงช้าง', 'เมือง', 'พิจิตร', '', '0953135215', '44_n.jpg', '0096_n.jpg', '1', 'test@gmail.com', '2020-09-12 17:49:33', NULL),
(58, 'ไพทูล ฉ่ำศรี', 10, 'ทูล', 'ชาย', 65, 'บุตร', 85, 176, '2020-07-23', '04:50:00', 'เสื้อกั้กสีดำ กางเกงยีนส์', 'ผิวคล้ำ ผอม สูง', 'วัดโรงช้าง', 'โรงช้าง', 'เมือง', 'พิจิตร', '', '0956425874', '237056_o.jpg', '8123_o.jpg', '1', 'test@gmail.com', '2020-09-12 17:51:41', NULL),
(59, 'สงบ เฟื่องฟู', 2, 'น้อย', 'หญิง', 67, 'อื่นๆ', 64, 158, '2020-08-04', '08:52:00', 'เสื้อสีชมพู กางเกงขาสามส่วนสีกรม', 'รูปร่างท้วม ผิวขาว ตัวเตี้ย', 'บ้านคลองคะเชนทร์', 'คลองคะเชนทร์', 'เมือง', 'พิจิตร', '', '0613453387', '20096_n.jpg', '', '0', 'test@gmail.com', '2020-09-12 17:54:54', '2020-09-13 04:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `idCard` varchar(13) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `idCard`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Test', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6465465465', NULL, '', 'L-890, Gaur City Ghaziabad', 'Ghaziabad', 'India', '2020-07-07 07:00:49', '2020-09-02 07:57:07'),
(3, 'สุพจน์ พูลคล้าย', 'aaa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0613453387', '1465515544555', NULL, NULL, NULL, NULL, '2020-09-06 15:56:37', NULL),
(5, 'ทศพล กลิ่นทอง', 'asd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0122222222', '5464646545858', NULL, NULL, NULL, NULL, '2020-09-06 16:01:40', NULL),
(7, 'ภาวินี อินทร์ทอง', 'pavinee.int@psru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '0991826493', '1669900389126', NULL, NULL, NULL, NULL, '2020-09-07 03:44:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
