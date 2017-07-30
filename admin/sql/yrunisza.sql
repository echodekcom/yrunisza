-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2017 at 06:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yrunisza`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `university_id` int(10) NOT NULL,
  `course_name_th` varchar(100) NOT NULL,
  `course_name_eng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `university_id`, `course_name_th`, `course_name_eng`) VALUES
(1, 1, 'วิทยาการคอมพิวเตอร์', 'Computer Science'),
(2, 2, 'Sains Komputer', 'Computer Science'),
(3, 1, 'เทโนโลยีสารสนเทศ', 'Information Technology'),
(4, 3, 'วิศวคอมพิวเตอร์', 'Computer engineering');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(10) NOT NULL,
  `university_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_lastname` varchar(50) NOT NULL,
  `member_tel` varchar(15) NOT NULL,
  `member_email` varchar(30) NOT NULL,
  `member_address` varchar(255) NOT NULL,
  `member_position` int(2) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_verified` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `university_id`, `course_id`, `member_name`, `member_lastname`, `member_tel`, `member_email`, `member_address`, `member_position`, `member_password`, `member_verified`) VALUES
(1, 1, 1, 'นายมูฮามะฟาอิส', 'จูเปาะ', '0908673624', 'mfaiz5605@gmail.com', 'Narathiwat', 1, '698d51a19d8a121ce581499d7b701668', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `subject_name_th` varchar(50) NOT NULL,
  `subject_name_eng` varchar(50) NOT NULL,
  `subject_description_th` text NOT NULL,
  `subject_description_eng` text NOT NULL,
  `subject_credit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `course_id`, `subject_name_th`, `subject_name_eng`, `subject_description_th`, `subject_description_eng`, `subject_credit`) VALUES
('4111244', 1, 'การเขียนโปรแกรมขั้นสูง', 'Advance Computer Programming', 'ความรู้พื้นฐาน แนวคิด โครงสร้างโปรแกรมภาษาเชิงวัตถุ ความหมายของวัตถุแล้วคลาสคุณลักษณะและพฤติกรรมของวัตถุ เช่น การสืบทอด แถวลำดับ การนำเอาส่วนประกอบของซอฟต์แวร์กลับมาใช้อีก ', 'Basic concept of object-oriented programming, the meaning of object and classes, attributes and behavior of objects such as inheritance, array, reusable programming, foundations information security and secure programming', 3),
('4111248', 1, 'ปฏิบัติการทางวิทยาการคอมพิวเตอร์', 'Practicing Of Computer Science', 'ปฏิบัติการพื้นฐานทางวิทยาการคอมพิวเตอร์ ฝึกทักษะตามกิจกรรมที่กำหนด', 'Practicing and operating in computer science, skill improvement based on assigned activities.', 1),
('CSF11103', 2, 'Penyelesaian Masalah Dan Pengaturcaraan Komputer', 'Problem Solving And Computer Programming', 'Perkara ini adalah satu siri studio intensif dan dinamik dalam Seni Visual diajar oleh artis amalan profesional. Studio-studio yang ditawarkan akan berbeza-beza bergantung pada medan yang pensyarah kepakaran dan ketersediaan. Contoh bengkel pelajarannya ialah Lukisan, Seni Cetak dan Lukisan. Tujuan subjek ini adalah untuk memperkenalkan pelajar kepada pelbagai studio yang membangunkan kemahiran teknikal dan potensi kreatif setiap pelajar. Studio-studio yang ditawarkan setiap sesi akan diiklankan di dalam pangkalan data subjek, terbuka kepada pelajar-pelajar dari seluruh universiti dan tidak memerlukan pengetahuan yang diperlukan. Walaupun bengkel ini direka untuk memperkenalkan pelajar kepada Seni Visual mereka juga akan membolehkan pelajar yang telah menamatkan CAVA111 dan / atau CAVA112 peluang untuk membangunkan lagi kemahiran teknikal mereka.', 'This subject is a series of intensive and dynamic studios in the Visual Arts taught by professional practicing artists. The studios offered will vary depending on the lecturers’ fields of expertise and availability. Examples of the workshops taught include Drawing, Printmaking and Painting. The aim of the subject is to introduce students to various studios that develop the technical skills and creative potential of each student. The studios being offered each session will be advertised on the subject database, open to students from across the university and require no requisite knowledge. Whilst these workshops are designed to introduce students to the Visual Arts they will also enable students who have completed CAVA111 and/or CAVA112 the opportunity to further develop their technical skills.', 3),
('CSF11203', 2, 'Organisasi Komputer dan Seni Bina', 'Computer Organization And Architecture', 'Anda akan belajar mata pelajaran dalam Computational Intelligence, Persepsi dan Perancangan, dan penalaran dan Pembelajaran. Anda akan dapat untuk meletakkan teori ke dalam amalan dengan projek capstone individu.', 'You will study subjects in Computational Intelligence, Perception and Planning, and Reasoning and Learning. You will be able to put theory into practice with an individual capstone project.', 3),
('วพ.201', 4, 'โครงสร้างข้อมูลและขั้นตอนวิธี 1', 'Data Structures and Algorithms I', 'การวิเคราะห์ความซับซ้อนของขั้นตอนวิธี ขั้นตอนวิธีพื้นฐานสาหรับการจัดเรียงข้อมูล ชนิดข้อมูลแบบนามธรรม ดิกชันนารี ขั้นตอนวิธีสาหรับการค้นหาข้อมูล กองซ้อน แถวคอย รายการ การเขียนโปรแกรมแบบเรียกซ้า ต้นไม้ค้นหาแบบทวิภาค', 'Analysis of algorithm complexity Basic algorithms for defragmentation. Abstract data type dictionary algorithm for finding stack data queues; Binary search tree', 3),
('วพ.210', 4, 'การออกแบบวงจรดิจิตอล', 'Digital Circuits Design', 'ระบบจานวน รหัส พีชคณิตบูลีน โลจิกเกต หลักในการออกแบบวงจรโลจิกแบบคอมไบเนชั่นนอลและแบบซีเควนเชียล (ทั้งวงจรซิงโครนัสและวงจรอะซิงโครนัส) สาหรับการสร้างเป็นวงจรจริงเริ่มตั้งแต่วงจรเกตพื้นฐานจนถึงการใช้อุปกรณ์พีแอลดี', 'Number System Boolean Logic Algebraic Number System for Logical and Combinational Logic Design. (Both synchronous and asynchronous) for the creation of real circuits, starting from basic circuit boards to using PLD devices.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(10) NOT NULL,
  `selector_id` int(10) NOT NULL,
  `subject_id1` varchar(10) NOT NULL,
  `university_id1` int(10) NOT NULL,
  `subject_id2` varchar(10) NOT NULL,
  `university_id2` int(10) NOT NULL,
  `transfer_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_detail`
--

CREATE TABLE `transfer_detail` (
  `td_id` int(10) NOT NULL,
  `transfer_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `td_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(10) NOT NULL,
  `university_name_th` varchar(100) NOT NULL,
  `university_name_eng` varchar(100) NOT NULL,
  `university_status` int(1) NOT NULL,
  `university_country` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university_name_th`, `university_name_eng`, `university_status`, `university_country`) VALUES
(1, 'มหาวิทยาลัยราชภัฏยะลา', 'Yala Rajabhat University', 1, 'TH'),
(2, 'Universiti Sultan Zainal Abidin', 'Sultan Zainal Abidin University', 2, 'MY'),
(3, 'มหาวิทยาลัยราชภัฏสงขลา', 'Songkhla Rajabhat University', 1, 'TH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `subject_id1` (`subject_id1`),
  ADD KEY `subject_id2` (`subject_id2`);

--
-- Indexes for table `transfer_detail`
--
ALTER TABLE `transfer_detail`
  ADD PRIMARY KEY (`td_id`),
  ADD KEY `transfer_id` (`transfer_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_detail`
--
ALTER TABLE `transfer_detail`
  MODIFY `td_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`subject_id1`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `transfer_ibfk_2` FOREIGN KEY (`subject_id2`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `transfer_detail`
--
ALTER TABLE `transfer_detail`
  ADD CONSTRAINT `transfer_detail_ibfk_1` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`transfer_id`),
  ADD CONSTRAINT `transfer_detail_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
