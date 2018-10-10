-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table project.admin_user
CREATE TABLE IF NOT EXISTS `admin_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('owner','admin') NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table project.admin_user: ~2 rows (approximately)
DELETE FROM `admin_user`;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` (`userid`, `username`, `password`, `role`) VALUES
	(1, 'omar', '$2y$10$UhZCkHD46XHaVe9SpVVIJu5y6U50Q/YqcogKIbPRffXbXmH52RLRK', 'owner'),
	(15, 'test', '$2y$10$yFKAlQWJfYx1osgXyWZR6O9RKhKiSWDbjCl9F/wPAiqe95Pb/RLxy', 'admin');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;


-- Dumping structure for table project.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `pageID` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK1_user_comment` (`userID`),
  CONSTRAINT `FK1_user_comment` FOREIGN KEY (`userID`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- Dumping data for table project.comment: ~9 rows (approximately)
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `userID`, `pageID`, `content`, `date`) VALUES
	(1, 15, 34, 'this is the first comment for this page.', '2018-09-23 17:55:51'),
	(32, 15, 34, 'this is the second comment for this page.', '2018-09-23 17:57:29'),
	(33, 15, 36, 'hello everybody this is the first comment for this page', '2018-09-23 17:59:27'),
	(34, 15, 36, 'hello everybody this is the second comment for this page', '2018-09-23 18:10:42'),
	(35, 20, 34, 'this is the first comment for this page \r\ntest\r\n', '2018-09-24 10:00:17'),
	(36, 20, 34, 'this is the second comment for this page \r\ntest', '2018-09-24 10:07:48'),
	(78, 15, 34, 'this is the third comment for this page.', '2018-09-26 16:30:33'),
	(79, 15, 34, 'this is the fourth comment for this page.', '2018-09-26 16:30:54');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table project.data
CREATE TABLE IF NOT EXISTS `data` (
  `dataid` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) NOT NULL,
  PRIMARY KEY (`dataid`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- Dumping data for table project.data: ~9 rows (approximately)
DELETE FROM `data`;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`dataid`, `text`) VALUES
	(59, 'test'),
	(60, 'test2'),
	(61, 'test3'),
	(62, 'test4'),
	(63, 'test5'),
	(67, 'test6'),
	(73, 'test7'),
	(74, 'test8'),
	(75, 'test9');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;


-- Dumping structure for table project.note
CREATE TABLE IF NOT EXISTS `note` (
  `noteid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`noteid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table project.note: ~5 rows (approximately)
DELETE FROM `note`;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` (`noteid`, `userid`, `title`, `content`, `date_added`) VALUES
	(1, 1, 'test', 'this the test content', '0000-00-00 00:00:00'),
	(2, 1, 'test2', 'this is test2 content', '2018-08-19 05:26:12'),
	(4, 1, 'test4', 'test4', '2018-08-19 05:55:14'),
	(5, 6, 'test', 'test', '2018-08-19 05:59:07'),
	(6, 1, 'test5', 'test5', '2018-08-25 08:57:26');
/*!40000 ALTER TABLE `note` ENABLE KEYS */;


-- Dumping structure for table project.page
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('activ','inactiv') NOT NULL DEFAULT 'activ',
  `creator` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `slider` enum('slider','normal') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Dumping data for table project.page: ~9 rows (approximately)
DELETE FROM `page`;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `name`, `content`, `date`, `status`, `creator`, `img`, `sectionID`, `slider`) VALUES
	(34, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nCreativityWorks is working with a consortium of leaders to expand knowledge of the breadth and impact of creativity in Ventura County and to collaborate across sectors to develop programs that:\r\n\r\nAttract and Grow the Creative Sector\r\nStrengthen and Circulate the Value of Arts and Culture\r\nActivate and Mobilize Individual Creativity\r\nBy doing this, we believe we can make our economy stronger, our communities more vibrant and we can foster creativity in all sectors in order to meet the challenges and promise of our times.', '2018-09-14 21:20:52', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_08_31_09Pomajevich-17-Nations-Capital-Pomajevich-Sam-Pomajevich-TBX_5652-1-1080x720.jpg', 3, 'normal'),
	(36, 'Why do we use it?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-09-14 22:18:35', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_08_31_26breeja-larson-2016-o-trials-2412-720x500.jpg', 3, 'normal'),
	(37, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium nulla turpis, id faucibus mauris molestie quis. Nulla eu laoreet sapien. Suspendisse potenti. Integer non congue dolor. Vivamus semper erat non elit ornare gravida. Praesent accumsan elementum augue, at venenatis mauris commodo eget. Quisque pharetra, lacus nec tristique ullamcorper, tortor massa varius dolor, sit amet suscipit ligula ante vitae diam. Nunc vitae magna eu felis tristique lacinia. Morbi ut mauris magna.\r\n\r\nPhasellus ultricies nulla nec nisi venenatis consequat non vitae elit. Aliquam vitae vehicula enim, ac varius enim. Maecenas semper gravida iaculis. Maecenas non risus accumsan lacus finibus ullamcorper ac ut tortor. Proin consectetur vestibulum diam, eget dictum nisi dignissim ultricies. Morbi consectetur rhoncus arcu. Nullam lectus tellus, fringilla eu ante ut, congue bibendum sapien. Pellentesque vitae enim vitae mauris tempus sagittis. Suspendisse ligula nulla, elementum eget laoreet ac, rutrum nec felis. Donec auctor risus vel arcu porttitor tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nMaecenas volutpat eu magna eget imperdiet. Maecenas venenatis vel elit non mollis. Phasellus nec ex mauris. Integer auctor magna vel sagittis tempus. Nulla consectetur ipsum ac luctus faucibus. In ut pellentesque mauris. Phasellus sit amet metus aliquam, suscipit lacus eu, bibendum dui. Sed id consequat libero. Donec egestas iaculis lacinia. Nullam et faucibus urna. Proin volutpat sapien nec enim congue eleifend. Sed purus velit, ultricies non justo gravida, suscipit pulvinar ante. Suspendisse vel nisi vitae risus pharetra gravida vel nec nibh. Donec faucibus a ipsum et ultrices. Vivamus vel venenatis ipsum, non consequat augue.\r\n\r\nNunc iaculis vitae lectus at molestie. Donec quis cursus arcu, et ultricies lorem. Mauris nisl felis, scelerisque id lacinia sed, tempor vel sapien. Aliquam erat volutpat. Phasellus odio metus, maximus ut bibendum tristique, scelerisque at ipsum. Aenean maximus ut eros a molestie. Cras et vestibulum augue. Sed facilisis nisl diam, et lobortis sem congue eget. Nunc efficitur nulla id ligula pellentesque ornare. Suspendisse congue, ipsum non imperdiet sodales, ex velit gravida nunc, sit amet finibus metus velit non ante. Donec sed ultricies tellus. Pellentesque at mi at neque consequat blandit.\r\n\r\nCurabitur efficitur iaculis nisl, eu feugiat tellus interdum nec. Proin ut ornare orci. Morbi libero mauris, maximus vel tempus ut, vulputate eget turpis. Nullam venenatis mattis facilisis. Proin magna nibh, ornare sit amet mi non, venenatis auctor velit. Nullam pretium, dolor ornare pretium venenatis, ligula sem elementum elit, a laoreet diam erat vitae est. Sed iaculis elit quis quam fringilla finibus. Nam ante nulla, rhoncus non viverra in, efficitur vel odio. In laoreet consectetur convallis. Nullam ut justo venenatis, molestie neque vitae, luctus dui. Vivamus sed erat sapien. Duis eleifend suscipit pretium. Ut at lacus vel nulla cursus ornare.', '2018-09-14 22:42:15', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_08_31_51doug-erasmus-2016-rsa-2-720x500.jpg', 3, 'normal'),
	(38, 'Self-destructing message app', 'Lorem ipsum dolor sit amet, dui lacus non felis sodales fringilla proin. Ornare sed turpis ut justo elit, nunc massa eget eu, purus mollis erat, eget aenean est, sem urna fermentum nunc malesuada. Penatibus nec sollicitudin. Tincidunt purus eget amet eros, duis justo urna vitae congue, dictum ante vestibulum, ante sit massa enim nec quisque, amet nec a ultricies ut aenean voluptas. Aliquam justo sed nisl ut, congue amet vitae elit vitae pellentesque orci, maecenas vitae mauris, amet eget velit, nulla odio sodales eleifend velit lacinia ut. Neque feugiat in dolor integer sed, sed sit per tellus, ac mauris ligula in bibendum eu sed. Quis lorem velit quam risus vitae fusce, sociis vel sit vitae, suspendisse facilisis nec consectetuer odio justo, vel nec, cras sed integer ipsum elit. Diam luctus morbi integer ut dapibus a, pharetra nonummy arcu nunc etiam integer lacus.\r\n\r\nHabitant diam donec lorem, fermentum tempus ut nisl, blandit class id aliquam, nunc non. Lobortis condimentum quam, quam velit, ligula urna odio tempus curae mauris. Lacinia cras sem hendrerit lectus, vitae class nisl, quis condimentum quisque sed ridiculus, nunc fringilla aliquam tincidunt posuere ut, pulvinar tempus. Suspendisse pellentesque vel quisque at, aliquam at, donec purus hymenaeos, in quis non nunc rhoncus, dis etiam ipsum ut nonummy. Rutrum nibh nam in semper, duis orci sed dolor non eget. Nisl nascetur mattis arcu id. Volutpat sodales eu lorem dolor tempus, ultrices mi duis ac, eget nullam vitae non donec nec, nunc metus egestas aptent elit. Mauris massa donec, netus massa nibh vel, fuga aenean parturient convallis arcu odio, vitae convallis. Massa leo nonummy facilisi nulla placerat, mauris eu integer amet, nec ornare nostra, tincidunt consectetuer eros libero mattis, nullam incidunt lacus sapien ac tellus. Duis turpis cubilia lacinia sed nonummy pede, dui id rutrum dictum sollicitudin, inceptos dictum. Mauris eleifend curabitur egestas, nullam euismod ut, molestie etiam pulvinar sed.', '2018-09-18 13:15:21', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_01_15_21michael-phelps.jpg', 3, 'slider'),
	(39, 'Learn how to build it for iOS', 'Nec facilisis nulla eu viverra ipsum ac, aenean consectetuer ante suspendisse tincidunt varius pulvinar. Molestie in libero a libero. A dui, eget egestas proin nullam nascetur magna, ut duis nunc in massa tempus leo, penatibus arcu quam diam, per ad faucibus luctus. Nec pellentesque quam porttitor risus, lectus tellus ut nec vehicula orci mi. Arcu ipsum sem sed accumsan nulla, proin feugiat nec, phasellus lectus, orci at dolorem arcu vestibulum nec viverra. Diam delectus et pede habitasse, tincidunt malesuada fringilla, ante nisl arcu pellentesque, pharetra pede lacinia rutrum neque at.\r\n\r\nGravida orci porttitor quis, wisi pretium et, lectus tortor maecenas non non, lorem dictumst felis. Massa quam integer amet massa, diam accumsan morbi non magnis, aliquam erat, aenean pharetra autem sem aspernatur commodo ipsum, suspendisse nulla elit libero integer dolor platea. Arcu sociis enim velit mauris ac, ultrices augue elementum amet ante eros cursus. Elementum quis dapibus nam donec nulla, magna libero justo in nulla volutpat ante, penatibus integer quisque ante venenatis in erat, pellentesque turpis et, amet nec mauris pede quis proin. Eros libero. Gravida gravida, justo sed, aliquam quos, massa facilisi orci et in sodales, nibh ac in aptent a pede wisi. Eu pretium faucibus pretium donec sem taciti, cursus gravida omnis taciti rhoncus, lacinia adipiscing ac massa curabitur commodo vulputate. Quis nulla, a non risus, consequat dapibus rhoncus in sed eleifend, congue risus maiores, maecenas vitae in eu eros ipsum. Sollicitudin wisi, nulla augue amet donec suspendisse dolor nullam, sed vehicula lacinia ante. Volutpat sollicitudin at praesent fusce neque, sit amet porta erat quam augue bibendum, mauris in congue eleifend, non curabitur eget id ut sociosqu, quasi nunc dictumst duis sed risus. Hendrerit amet pede dapibus lobortis maecenas proin, ornare dignissim et cras blandit, massa nulla.', '2018-09-18 13:16:11', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_01_16_11michael-phelps-200-fly-prelims-2016-olympics-720x500.jpg', 4, 'slider'),
	(40, 'Learn how to build it for Android', 'Nec facilisis nulla eu viverra ipsum ac, aenean consectetuer ante suspendisse tincidunt varius pulvinar. Molestie in libero a libero. A dui, eget egestas proin nullam nascetur magna, ut duis nunc in massa tempus leo, penatibus arcu quam diam, per ad faucibus luctus. Nec pellentesque quam porttitor risus, lectus tellus ut nec vehicula orci mi. Arcu ipsum sem sed accumsan nulla, proin feugiat nec, phasellus lectus, orci at dolorem arcu vestibulum nec viverra. Diam delectus et pede habitasse, tincidunt malesuada fringilla, ante nisl arcu pellentesque, pharetra pede lacinia rutrum neque at.\r\n\r\nGravida orci porttitor quis, wisi pretium et, lectus tortor maecenas non non, lorem dictumst felis. Massa quam integer amet massa, diam accumsan morbi non magnis, aliquam erat, aenean pharetra autem sem aspernatur commodo ipsum, suspendisse nulla elit libero integer dolor platea. Arcu sociis enim velit mauris ac, ultrices augue elementum amet ante eros cursus. Elementum quis dapibus nam donec nulla, magna libero justo in nulla volutpat ante, penatibus integer quisque ante venenatis in erat, pellentesque turpis et, amet nec mauris pede quis proin. Eros libero. Gravida gravida, justo sed, aliquam quos, massa facilisi orci et in sodales, nibh ac in aptent a pede wisi. Eu pretium faucibus pretium donec sem taciti, cursus gravida omnis taciti rhoncus, lacinia adipiscing ac massa curabitur commodo vulputate. Quis nulla, a non risus, consequat dapibus rhoncus in sed eleifend, congue risus maiores, maecenas vitae in eu eros ipsum. Sollicitudin wisi, nulla augue amet donec suspendisse dolor nullam, sed vehicula lacinia ante. Volutpat sollicitudin at praesent fusce neque, sit amet porta erat quam augue bibendum, mauris in congue eleifend, non curabitur eget id ut sociosqu, quasi nunc dictumst duis sed risus. Hendrerit amet pede dapibus lobortis maecenas proin, ornare dignissim et cras blandit, massa nulla.', '2018-09-18 13:17:00', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_01_47_30Murphy-20-California-Aquatics-Murphy-Ryan-Murphy-TBX_2913--1080x720.jpg', 5, 'slider'),
	(43, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,\r\n looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2018-09-18 18:49:25', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_06_49_25chen-ruolin-liu-huixia-10m-synchro-rio-720x500.jpg', 4, 'normal'),
	(44, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-09-18 20:33:03', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_08_33_03Breaststroke .jpg', 5, 'normal'),
	(45, 'The standard Lorem Ipsum passage, used since the 1', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '2018-09-18 20:33:48', 'activ', 'omar', 'public/images/pagesImg/2018-09-18_08_33_48Chien-Yin-Lionel-Khoo-WCH-by-Peter-Sukenik-www.petersukenik.com-4414.jpg', 7, 'normal');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


-- Dumping structure for table project.section
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('activ','inactiv') NOT NULL DEFAULT 'activ',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentID` (`parentID`),
  CONSTRAINT `FK1` FOREIGN KEY (`parentID`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table project.section: ~8 rows (approximately)
DELETE FROM `section`;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`, `parentID`, `name`, `status`, `date`, `creator`, `sort`) VALUES
	(1, NULL, 'test1', 'activ', '2018-09-10 21:02:24', 'omar', 1),
	(2, NULL, 'test2', 'activ', '2018-09-10 21:10:08', 'omar', 2),
	(3, NULL, 'test3', 'activ', '2018-09-10 21:21:18', 'omar', 3),
	(4, NULL, 'test4', 'activ', '2018-09-13 10:51:13', 'omar', 4),
	(5, 1, 'test5', 'activ', '2018-09-15 09:29:09', 'omar', 5),
	(6, 1, 'test6', 'activ', '2018-09-16 22:19:27', 'omar', 6),
	(7, 2, 'test7', 'activ', '2018-09-16 22:22:57', 'omar', 7),
	(8, 2, 'test8', 'activ', '2018-09-17 19:29:09', 'omar', 8);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;


-- Dumping structure for table project.sittings
CREATE TABLE IF NOT EXISTS `sittings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `fb` varchar(200) NOT NULL,
  `tw` varchar(200) NOT NULL,
  `yt` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table project.sittings: ~3 rows (approximately)
DELETE FROM `sittings`;
/*!40000 ALTER TABLE `sittings` DISABLE KEYS */;
INSERT INTO `sittings` (`id`, `site_name`, `site_email`, `fb`, `tw`, `yt`) VALUES
	(1, 'project', 'project@test.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.youtube.com/'),
	(2, 'POSSI', 'project@test.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.youtube.com/'),
	(3, 'project', 'project@test.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.youtube.com/');
/*!40000 ALTER TABLE `sittings` ENABLE KEYS */;


-- Dumping structure for table project.users
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Dumping data for table project.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userid`, `username`, `password`, `email`, `img`) VALUES
	(15, 'omar', '$2y$10$1Tzqrbovdaaw/C.DcMzRd.lZnXZgPOIlK2kjNYO251SleQH9qrb0W', 'omar@test.com', 'public/images/users/2018-09-20_03_53_17info-box9.png'),
	(20, 'test', '$2y$10$ICiyUExILpFX0zJUOZTPruQI8y0UA.lhbUGvabzucLtXM4pq7hH5e', 'test@test.com', 'public/images/defaultImage/profile.png'),
	(60, 'omartest', '$2y$10$Stsadh15M.p46hO9h1XkE.WTxstHHwxtNWgzUkgEAVfjhJLNDOXaK', 'test@test.com', 'public/images/users/2018-09-25_02_37_06info-box8.png'),
	(67, 'test', '$2y$10$IsNYRcO/xODzaHNYoJ3Kc.xgOaDXyvNnxRFHS5x6Qydw2wal1Cwya', 'test@test.com', 'public/images/defaultImage/profile.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
