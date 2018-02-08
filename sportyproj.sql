-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Février 2018 à 21:54
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sportyproj`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `category_id` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `title` varchar(100) NOT NULL COMMENT 'titre de l''article',
  `content` text NOT NULL COMMENT 'contenu de l''article',
  `image` varchar(200) DEFAULT NULL COMMENT 'image liée à l''article',
  `slug` varchar(100) NOT NULL COMMENT 'titre modifié de l''article',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de création',
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'date de modification de l''article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `author`, `title`, `content`, `image`, `slug`, `creation_date`, `modified_date`) VALUES
(1, 2, 101, 'Ut tellus.', '<p>Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.</p>\r\n', NULL, 'ut-tellus', '2017-02-03 05:40:38', '2017-06-06 11:56:58'),
(2, 1, 101, 'Nunc purus.', '<p>Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.</p>\r\n', NULL, 'nunc-purus', '2016-12-04 16:52:33', '2017-06-06 11:57:11'),
(3, 2, 101, 'Nunc rhoncus dui vel sem.', '<p>In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.</p>\r\n', NULL, 'nunc-rhoncus-dui-vel-sem', '2017-01-22 18:51:17', '2017-06-06 11:57:26'),
(4, 2, 101, 'Nunc nisl.', '<p>Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.</p>\r\n', NULL, 'nunc-nisl', '2017-04-11 13:26:04', '2017-06-06 11:57:32'),
(5, 1, 101, 'Pellentesque at nulla.', '<p>Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.</p>\r\n', NULL, 'pellentesque-at-nulla', '2016-08-06 14:59:03', '2017-06-06 11:57:55'),
(6, 1, 101, 'Proin interdum mauris non ligula pellentesque ultrices.', '<p>Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.</p>\r\n', NULL, 'proin-interdum-mauris-non-ligula-pellentesque-ultrices', '2016-07-06 13:56:28', '2017-06-06 11:58:02'),
(7, 2, 101, 'Cras in purus eu magna vulputate luctus.', '<p>Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.</p>\r\n', NULL, 'cras-in-purus-eu-magna-vulputate-luctus', '2017-02-12 23:30:51', '2017-06-06 11:58:09'),
(8, 2, 101, 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero qu', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.</p>\r\n', NULL, 'nam-congue-risus-semper-porta-volutpat-quam-pede-lobortis-ligula-sit-amet-eleifend-pede-libero-qu', '2017-02-05 23:31:50', '2017-06-06 11:58:15'),
(9, 1, 101, 'Nunc rhoncus dui vel sem.', '<p>Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.</p>\r\n', NULL, 'nunc-rhoncus-dui-vel-sem', '2017-03-27 10:24:17', '2017-06-06 11:58:25'),
(10, 3, 101, 'Integer non velit.', '<p>Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.</p>\r\n', NULL, 'integer-non-velit', '2017-02-10 03:03:39', '2017-06-06 11:58:30'),
(11, 1, 101, 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula ne', '<p>Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.</p>\r\n', NULL, 'in-tempor-turpis-nec-euismod-scelerisque-quam-turpis-adipiscing-lorem-vitae-mattis-nibh-ligula-ne', '2016-10-14 04:55:17', '2017-06-06 11:58:43'),
(12, 3, 101, 'Cras non velit nec nisi vulputate nonummy.', '<p>Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</p>\r\n', NULL, 'cras-non-velit-nec-nisi-vulputate-nonummy', '2017-04-29 16:43:14', '2017-06-06 11:58:48'),
(13, 3, 101, 'Proin eu mi.', '<p>Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.</p>\r\n', NULL, 'proin-eu-mi', '2016-06-16 20:04:58', '2017-06-06 11:58:53'),
(14, 1, 101, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', '<p>Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.</p>\r\n', NULL, 'donec-diam-neque-vestibulum-eget-vulputate-ut-ultrices-vel-augue', '2016-06-13 02:15:15', '2017-06-06 11:58:58'),
(15, 3, 101, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nul', '<p>Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.</p>\r\n', NULL, 'nam-ultrices-libero-non-mattis-pulvinar-nulla-pede-ullamcorper-augue-a-suscipit-nulla-elit-ac-nul', '2016-07-09 04:21:07', '2017-06-06 11:59:04'),
(16, 3, 101, 'Sed vel enim sit amet nunc viverra dapibus.', '<p>Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.</p>\r\n', NULL, 'sed-vel-enim-sit-amet-nunc-viverra-dapibus', '2017-03-31 10:34:47', '2017-06-06 11:59:09'),
(17, 1, 101, 'In hac habitasse platea dictumst.', '<p>Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo.</p>\r\n', NULL, 'in-hac-habitasse-platea-dictumst', '2016-12-18 04:08:35', '2017-06-06 11:59:14'),
(18, 3, 101, 'Donec quis orci eget orci vehicula condimentum.', '<p>In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.</p>\r\n', NULL, 'donec-quis-orci-eget-orci-vehicula-condimentum', '2016-09-24 20:18:36', '2017-06-06 11:59:25'),
(19, 3, 101, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '<p>Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.</p>\r\n', NULL, 'cum-sociis-natoque-penatibus-et-magnis-dis-parturient-montes-nascetur-ridiculus-mus', '2016-07-04 03:38:40', '2017-06-06 11:59:31'),
(20, 3, 101, 'Suspendisse potenti.', '<p>Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.</p>\r\n', NULL, 'suspendisse-potenti', '2016-09-30 22:13:13', '2017-06-06 11:59:35'),
(21, 3, 101, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc', '<p>Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.</p>\r\n', NULL, 'maecenas-tristique-est-et-tempus-semper-est-quam-pharetra-magna-ac-consequat-metus-sapien-ut-nunc', '2017-05-23 06:58:19', '2017-06-06 11:59:44'),
(22, 1, 101, 'Nulla justo.', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n', NULL, 'nulla-justo', '2016-08-13 12:27:33', '2017-06-06 11:59:57'),
(23, 2, 101, 'Suspendisse accumsan tortor quis turpis.', '<p>Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.</p>\r\n', NULL, 'suspendisse-accumsan-tortor-quis-turpis', '2016-12-28 02:57:52', '2017-06-06 12:00:02'),
(24, 2, 101, 'In hac habitasse platea dictumst.', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n', NULL, 'in-hac-habitasse-platea-dictumst', '2017-05-26 17:02:55', '2017-06-06 12:00:06'),
(25, 2, 101, 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '<p>Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.</p>\r\n', NULL, 'nullam-orci-pede-venenatis-non-sodales-sed-tincidunt-eu-felis', '2016-12-22 15:41:28', '2017-06-06 12:00:14'),
(26, 2, 101, 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '<p>Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.</p>\r\n', NULL, 'vivamus-metus-arcu-adipiscing-molestie-hendrerit-at-vulputate-vitae-nisl', '2017-01-18 07:58:30', '2017-06-06 12:00:27'),
(27, 2, 101, 'In congue.', '<p>Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n', NULL, 'in-congue', '2016-06-22 07:24:17', '2017-06-06 12:00:30'),
(28, 2, 101, 'Maecenas ut massa quis augue luctus tincidunt.', '<p>Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui.</p>\r\n', NULL, 'maecenas-ut-massa-quis-augue-luctus-tincidunt', '2016-08-17 05:46:15', '2017-06-06 12:00:36'),
(29, 3, 101, 'In congue.', '<p>Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.</p>\r\n', NULL, 'in-congue', '2017-03-03 20:59:44', '2017-06-06 12:00:40'),
(30, 3, 101, 'Praesent lectus.', '<p>Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.</p>\r\n', NULL, 'praesent-lectus', '2016-10-12 21:25:23', '2017-06-06 12:00:44'),
(31, 1, 101, 'Pellentesque at nulla.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.</p>\r\n', NULL, 'pellentesque-at-nulla', '2017-02-12 21:59:24', '2017-06-06 12:00:49'),
(32, 2, 101, 'Suspendisse ornare consequat lectus.', '<p>Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.</p>\r\n', NULL, 'suspendisse-ornare-consequat-lectus', '2017-01-27 14:31:03', '2017-06-06 12:00:52'),
(33, 2, 101, 'In eleifend quam a odio.', '<p>Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</p>\r\n', NULL, 'in-eleifend-quam-a-odio', '2017-04-24 16:40:04', '2017-06-06 12:00:55'),
(34, 1, 101, 'Suspendisse accumsan tortor quis turpis.', '<p>Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</p>\r\n', NULL, 'suspendisse-accumsan-tortor-quis-turpis', '2016-12-30 19:07:45', '2017-06-06 12:00:59'),
(35, 3, 101, 'Nulla mollis molestie lorem.', '<p>Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.</p>\r\n', NULL, 'nulla-mollis-molestie-lorem', '2016-12-12 17:20:37', '2017-06-06 12:01:03'),
(36, 1, 101, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', '<p>Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.</p>\r\n', NULL, 'mauris-enim-leo-rhoncus-sed-vestibulum-sit-amet-cursus-id-turpis', '2017-02-21 17:03:39', '2017-06-06 12:01:14'),
(37, 3, 101, 'Duis consequat dui nec nisi volutpat eleifend.', '<p>Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.</p>\r\n', NULL, 'duis-consequat-dui-nec-nisi-volutpat-eleifend', '2016-09-14 15:54:26', '2017-06-06 12:01:17'),
(38, 1, 101, 'Pellentesque eget nunc.', '<p>In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.</p>\r\n', NULL, 'pellentesque-eget-nunc', '2016-09-10 22:53:04', '2017-06-06 12:01:21'),
(39, 1, 101, 'Nulla justo.', '<p>Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.</p>\r\n', NULL, 'nulla-justo', '2017-01-28 12:43:20', '2017-06-06 12:01:25'),
(40, 1, 101, 'Curabitur convallis.', '<p>Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.</p>\r\n', NULL, 'curabitur-convallis', '2016-06-28 06:40:56', '2017-06-06 12:01:29'),
(41, 3, 101, 'Nullam sit amet turpis elementum ligula vehicula consequat.', '<p>Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.</p>\r\n', NULL, 'nullam-sit-amet-turpis-elementum-ligula-vehicula-consequat', '2016-07-14 16:57:53', '2017-06-06 12:01:37'),
(42, 2, 101, 'Integer ac neque.', '<p>Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.</p>\r\n', NULL, 'integer-ac-neque', '2016-08-14 17:23:02', '2017-06-06 12:01:41'),
(43, 3, 101, 'Vestibulum sed magna at nunc commodo placerat.', '<p>Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.</p>\r\n', NULL, 'vestibulum-sed-magna-at-nunc-commodo-placerat', '2017-01-28 19:01:46', '2017-06-06 12:01:45'),
(44, 1, 101, 'Praesent id massa id nisl venenatis lacinia.', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', NULL, 'Integer a nibh.', '2016-11-01 18:39:33', NULL),
(45, 1, 101, 'Phasellus sit amet erat.', '<p>Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</p>\r\n', NULL, 'phasellus-sit-amet-erat', '2017-04-08 04:39:16', '2017-06-06 12:01:51'),
(46, 1, 101, 'Aenean fermentum.', '<p>In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.</p>\r\n', NULL, 'aenean-fermentum', '2017-04-13 11:41:36', '2017-06-06 12:02:00'),
(47, 1, 101, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nul', '<p>Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.</p>\r\n', NULL, 'nam-ultrices-libero-non-mattis-pulvinar-nulla-pede-ullamcorper-augue-a-suscipit-nulla-elit-ac-nul', '2016-11-22 21:43:50', '2017-06-06 12:02:06'),
(48, 3, 101, 'Duis bibendum.', '<p>Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.</p>\r\n', NULL, 'duis-bibendum', '2016-08-12 20:46:52', '2017-06-06 12:02:16'),
(49, 2, 101, 'Duis ac nibh.', '<p>Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n', NULL, 'duis-ac-nibh', '2017-03-12 14:25:23', '2017-06-06 12:02:20'),
(50, 3, 101, 'Phasellus in felis.', '<p>In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.</p>\r\n', NULL, 'phasellus-in-felis', '2017-02-09 00:09:09', '2017-06-06 12:02:25'),
(51, 2, 101, 'Nulla tellus.', '<p>Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.</p>\r\n', NULL, 'nulla-tellus', '2017-01-09 00:00:53', '2017-06-06 12:02:35'),
(52, 1, 101, 'Morbi a ipsum.', '<p>Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.</p>\r\n', NULL, 'morbi-a-ipsum', '2017-02-23 16:48:15', '2017-06-06 12:02:39'),
(53, 2, 101, 'Nulla tellus.', '<p>Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.</p>\r\n', NULL, 'nulla-tellus', '2017-01-16 16:58:56', '2017-06-06 12:02:43'),
(54, 3, 101, 'Praesent blandit lacinia erat.', '<p>Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.</p>\r\n', NULL, 'praesent-blandit-lacinia-erat', '2016-06-30 17:17:35', '2017-06-06 12:02:47'),
(55, 1, 101, 'Mauris lacinia sapien quis libero.', '<p>Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n', NULL, 'mauris-lacinia-sapien-quis-libero', '2016-10-28 13:47:12', '2017-06-06 12:02:51'),
(56, 2, 101, 'Vivamus in felis eu sapien cursus vestibulum.', '<p>Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.</p>\r\n', NULL, 'vivamus-in-felis-eu-sapien-cursus-vestibulum', '2017-06-04 02:36:54', '2017-06-06 12:02:56'),
(57, 3, 101, 'Nulla justo.', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', NULL, 'Nullam sit amet turpis elementum ligula vehicula consequat.', '2016-12-12 15:49:50', NULL),
(58, 3, 101, 'Morbi vel lectus in quam fringilla rhoncus.', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', NULL, 'Aenean fermentum.', '2016-06-12 01:41:23', NULL),
(59, 3, 101, 'Integer ac leo.', '<p>In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.</p>\r\n', NULL, 'integer-ac-leo', '2017-03-07 00:10:02', '2017-06-06 12:03:09'),
(60, 1, 101, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '<p>Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.</p>\r\n', NULL, 'lorem-ipsum-dolor-sit-amet-consectetuer-adipiscing-elit', '2017-02-13 12:04:25', '2017-06-06 12:03:13'),
(61, 1, 101, 'Fusce consequat.', '<p>Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.</p>\r\n', NULL, 'fusce-consequat', '2016-09-14 18:33:30', '2017-06-06 12:04:46'),
(62, 2, 101, 'Quisque id justo sit amet sapien dignissim vestibulum.', '<p>Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.</p>\r\n', NULL, 'quisque-id-justo-sit-amet-sapien-dignissim-vestibulum', '2016-10-07 07:48:57', '2017-06-06 12:04:42'),
(63, 1, 101, 'Integer a nibh.', '<p>Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.</p>\r\n', NULL, 'integer-a-nibh', '2017-03-14 18:02:05', '2017-06-06 12:04:40'),
(64, 1, 101, 'Donec ut dolor.', '<p>In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.</p>\r\n', NULL, 'donec-ut-dolor', '2017-01-07 02:17:07', '2017-06-06 12:04:34'),
(65, 1, 101, 'In hac habitasse platea dictumst.', '<p>Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.</p>\r\n', NULL, 'in-hac-habitasse-platea-dictumst', '2016-10-10 17:07:10', '2017-06-06 12:04:31'),
(66, 2, 101, 'Ut tellus.', '<p>Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.</p>\r\n', NULL, 'ut-tellus', '2016-06-19 01:14:22', '2017-06-06 12:04:25'),
(67, 2, 101, 'Sed ante.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.</p>\r\n', NULL, 'sed-ante', '2016-07-02 01:57:18', '2017-06-06 12:04:21'),
(68, 3, 101, 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula ne', '<p>Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.</p>\r\n', NULL, 'in-tempor-turpis-nec-euismod-scelerisque-quam-turpis-adipiscing-lorem-vitae-mattis-nibh-ligula-ne', '2017-02-25 17:22:05', '2017-06-06 12:04:18'),
(69, 2, 101, 'Donec posuere metus vitae ipsum.', '<p>Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.</p>\r\n', NULL, 'donec-posuere-metus-vitae-ipsum', '2016-07-19 03:10:20', '2017-06-06 12:04:15'),
(70, 3, 101, 'Nunc rhoncus dui vel sem.', '<p>Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.</p>\r\n', NULL, 'nunc-rhoncus-dui-vel-sem', '2016-06-25 08:57:55', '2017-06-06 12:04:12'),
(71, 3, 101, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nul', '<p>Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.</p>\r\n', NULL, 'nam-ultrices-libero-non-mattis-pulvinar-nulla-pede-ullamcorper-augue-a-suscipit-nulla-elit-ac-nul', '2017-01-16 05:57:06', '2017-06-06 12:04:05'),
(72, 1, 101, 'Proin eu mi.', '<p>Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.</p>\r\n', NULL, 'proin-eu-mi', '2016-11-12 08:03:33', '2017-06-06 12:04:01'),
(73, 1, 101, 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula ne', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', NULL, 'Donec quis orci eget orci vehicula condimentum.', '2016-06-25 03:01:31', NULL),
(74, 3, 101, 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', '<p>Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.</p>\r\n', NULL, 'morbi-sem-mauris-laoreet-ut-rhoncus-aliquet-pulvinar-sed-nisl', '2016-10-19 23:54:21', '2017-06-06 12:03:57'),
(75, 3, 101, 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', '<p>Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.</p>\r\n', NULL, 'fusce-congue-diam-id-ornare-imperdiet-sapien-urna-pretium-nisl-ut-volutpat-sapien-arcu-sed-augue', '2016-11-22 10:28:29', '2017-06-06 12:03:47'),
(76, 2, 101, 'Nulla ut erat id mauris vulputate elementum.', '<p>Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.</p>\r\n', NULL, 'nulla-ut-erat-id-mauris-vulputate-elementum', '2016-09-04 05:55:36', '2017-06-06 12:03:43'),
(77, 2, 101, 'Nunc purus.', '<p>Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n', NULL, 'nunc-purus', '2017-01-08 08:25:42', '2017-06-06 12:03:31'),
(78, 3, 101, 'Etiam justo.', '<p>Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.</p>\r\n', NULL, 'etiam-justo', '2016-06-20 10:45:21', '2017-06-06 12:03:27'),
(79, 2, 101, 'Morbi non lectus.', '<p>Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.</p>\r\n', NULL, 'morbi-non-lectus', '2016-08-03 22:51:44', '2017-06-06 12:03:23'),
(80, 3, 101, 'Maecenas ut massa quis augue luctus tincidunt.', '<p>Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</p>\r\n', NULL, 'maecenas-ut-massa-quis-augue-luctus-tincidunt', '2016-09-28 15:15:17', '2017-06-06 12:03:19');

-- --------------------------------------------------------

--
-- Structure de la table `athletes`
--

CREATE TABLE `athletes` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `club_id` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'clé étrangère',
  `register_num` int(10) UNSIGNED NOT NULL COMMENT 'numéro de dossard de l''athlète',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'catégorie d''âge de l''athlète'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `athletes`
--

INSERT INTO `athletes` (`id`, `user_id`, `club_id`, `register_num`, `category_id`) VALUES
(1, 102, 1, 1990, 1),
(2, 103, 1, 2488, 2),
(3, 104, 1, 2348, 7),
(4, 105, 1, 3526, 3),
(5, 106, 1, 1308, 6),
(6, 107, 1, 1799, 7),
(7, 108, 1, 3198, 7),
(8, 109, 1, 2195, 4),
(9, 110, 1, 2306, 2),
(10, 111, 1, 3143, 4),
(11, 112, 1, 4867, 3),
(12, 113, 1, 3407, 5),
(13, 114, 1, 4538, 4),
(14, 115, 1, 4315, 4),
(15, 116, 1, 2295, 7),
(16, 117, 1, 3219, 7),
(17, 118, 1, 1968, 2),
(18, 119, 1, 4826, 7),
(19, 120, 1, 3742, 4),
(20, 121, 1, 3313, 6),
(21, 122, 1, 2755, 1),
(22, 123, 1, 1995, 1),
(23, 124, 1, 4431, 1),
(24, 125, 1, 1451, 7),
(25, 126, 1, 3131, 1),
(26, 127, 1, 2478, 5),
(27, 128, 1, 2922, 4),
(28, 129, 1, 2124, 1),
(29, 130, 1, 2845, 4),
(30, 131, 1, 4322, 6),
(31, 132, 1, 3233, 3),
(32, 133, 1, 1658, 3),
(33, 134, 1, 1810, 5),
(34, 135, 1, 2066, 3),
(36, 137, 1, 2738, 3),
(37, 138, 1, 4886, 1),
(38, 139, 1, 1216, 3),
(39, 140, 1, 1547, 3),
(40, 141, 1, 1574, 1),
(41, 142, 1, 3614, 1),
(42, 143, 1, 4833, 4),
(43, 144, 1, 4141, 3),
(44, 145, 1, 3375, 7),
(45, 146, 1, 2853, 3),
(46, 147, 1, 4064, 5),
(48, 149, 1, 2087, 4),
(49, 150, 1, 1731, 5),
(50, 151, 1, 2831, 1),
(52, 44, 1, 4521, 1),
(53, 153, 1, 3625, 7),
(54, 81, 1, 4563, 1),
(55, 82, 1, 45687, 1),
(56, 14, 1, 4521, 1),
(57, 5, 2, 4563, 5);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'réunion'),
(2, 'compétition'),
(3, 'news');

-- --------------------------------------------------------

--
-- Structure de la table `category_athlete`
--

CREATE TABLE `category_athlete` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category_athlete`
--

INSERT INTO `category_athlete` (`id`, `name`) VALUES
(1, 'Benjamins'),
(2, 'Minimes'),
(3, 'Cadets'),
(4, 'Juniors'),
(5, 'Espoirs'),
(6, 'Seniors'),
(7, 'Masters');

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6jmqqrhscoqeh6nag0vp3on8phpd09ko', '::1', 1496734327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733343330333b),
('7gs4tg7u717v5eor391vg2ci71ntu0hg', '::1', 1496735740, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733353732353b),
('b260li0thdtjdtp0eo065i9kacq6uchm', '::1', 1496737621, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733373532323b),
('8ei50e6lbmneqnul19q0u5g8vms33q6b', '::1', 1496738636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733383531393b),
('4fjv9b408b4uq4otn0ne6a27i2ikcm0s', '::1', 1496739197, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733383839383b),
('9hapujf3ac07psvt4hjggrf4ln2jqf93', '::1', 1496739530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733393233303b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('mjpttebd8m7qa7ibtel7msdj0lrela7r', '::1', 1496739787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733393533363b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('j4rhvblsfq8jmha7bl2s43pcr3nr4l6g', '::1', 1496740154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363733393835353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a34333a224c277574696c69736174657572206120c3a974c3a920616a6f7574c3a920617578206174686cc3a8746573223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('ugf050lho0jckj4g68060q4mtjuobcqr', '::1', 1496740273, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734303136303b69647c733a313a2231223b6c6f67696e7c733a393a2261646f796c616e6430223b726f6c657c733a373a226174686c657465223b),
('jk95osei9gld5s902cc577n957911bo5', '::1', 1496740613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734303530363b69647c733a333a22313032223b6c6f67696e7c733a393a22726e756361746f7230223b726f6c657c733a373a226174686c657465223b),
('h5dv02l60td6n528m3lbm27sghom34th', '::1', 1496741141, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734303834363b69647c733a333a22313032223b6c6f67696e7c733a393a22726e756361746f7230223b726f6c657c733a373a226174686c657465223b),
('oqecgsnupvo07jm0nla4m162gb4ttiqc', '::1', 1496742326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734323034313b69647c733a333a22313032223b6c6f67696e7c733a393a22726e756361746f7230223b726f6c657c733a373a226174686c657465223b),
('fhpl3fc2t2o4hak2hdfg6tpkc9m3srb6', '::1', 1496742423, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734323336323b69647c733a333a22313032223b6c6f67696e7c733a393a22726e756361746f7230223b726f6c657c733a373a226174686c657465223b),
('iehfik4udgmus5qp7h4v9100tl36o5v2', '::1', 1496743289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734323938393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('1cudapafo7msnmg1v1bkqiv423612db0', '::1', 1496743487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734333239303b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('4229orcempr84tsdvjue6pnqg7rsm3i2', '::1', 1496744787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734343633393b),
('8a88c3eqtpp1ao6gp148i0mp1e92dnsk', '::1', 1496745244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734343934363b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('90b0hqc1eqfh7mfv0obmi0pqag60mft3', '::1', 1496749604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734393533343b),
('1jleq7mfs5j9pfk4nc110tcvr43diaf0', '::1', 1496750145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363734393836353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('9c379656iqr26h4gv176t9lc31m52dog', '::1', 1496750172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363735303137323b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('q7h00o41ioj6rgm5b5favsh41or0ug6a', '::1', 1496751848, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363735313834383b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('ihd89cs46qkgv7409e08rj9puh26357m', '::1', 1496752354, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363735323335303b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('u23cl5mtgru96vu50eet6d9f01vcbtlb', '::1', 1496756281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363735363238313b),
('sbv7vtevcm3eklepmuqm9j02d3itfuj6', '::1', 1496772855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363737323535363b),
('j2cfl1pht51m5lcsd8dea1l3ouuhlpid', '::1', 1496772862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439363737323836323b),
('0b94irulgnj9e60g9qnfmkajh6rddi8g', '::1', 1497773943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373737333930353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('gsb8a7j77r7fe5npjgiv4gbs6dttgekn', '::1', 1497859340, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373835393034373b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a373a226174686c657465223b),
('trpkhqs4gbjrsfann5bf48vh3meh1em1', '::1', 1497859666, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373835393337353b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a373a226174686c657465223b),
('r4gpb7vbemc2n25d1t3g6l7muoknvfiu', '::1', 1499935347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393933353133393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('eir890ap8lb8h4emtkge1tt66i9u24mt', '::1', 1499935958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393933353935383b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('mvfb0quc1ndhc8g8u0pbmpq059u44doc', '::1', 1499936311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393933363236373b),
('7a5ka7gn6mpjrbpoauh7cj1g8grkd147', '::1', 1500296987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303239363932383b),
('4p8hik8smhlamt6seapa853pug3l7knb', '::1', 1500297078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303239373033363b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a373a226174686c657465223b),
('ui32q53n61b6ht3srh44pso89nha48oi', '::1', 1500297959, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303239373836313b),
('1aj0l068800fj34mea80pf0j34mim562', '::1', 1500299711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303239393434353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('v75ucriluav1n5cms2se9vmciffge1df', '::1', 1500299956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303239393839383b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('rvm07fjlamcmhi3f6763jb96qq5iitgq', '::1', 1500300863, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303330303536373b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('525fjt97s58m1jt59odt42jllmr44j5p', '::1', 1500300872, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303330303837323b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('517gvqnvhgm44r0i5bihshprv2qj55i4', '::1', 1500301374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303330313335323b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('dod4p8v0i95141vg5v8qq4hr7et9j1gm', '::1', 1500302489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303330323233373b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('joa6uo4a4oqrrh0633fcciq410t3a6d7', '::1', 1500383025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303338323936313b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('o5kv61156fsi3nqcq81ee2gnug9qpgf9', '::1', 1500383769, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303338333438333b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('faueg0v4qfq2chilh59ae66qjs99r41s', '::1', 1500383825, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303338333832353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('2cmrrkmvhos7vrmjsnmhgt3cr8358njl', '::1', 1500385850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303338353535353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('9iqhve3kosanfb5st461adap85v43a07', '::1', 1500396035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303339353738343b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('2f93enf5lpnogshu7skj6ssrk4qssuea', '::1', 1500396428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303339363138343b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('1q48e0sisjrhk9akhocfuvrinmk9n70k', '::1', 1500396489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530303339363438393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a32333a225574696c69736174657572207375707072696dc3a92021223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('30k81jh8u7abqs89cugeks4vunf7h2av', '::1', 1501676387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637363337353b),
('dv95stj3bhjdmlblsqa8s0k0aqk7tc2t', '::1', 1501676660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637363432373b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('8et7u6levdmmnqf25m1dgslcuku2a3fp', '::1', 1501677150, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637363835303b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('uh4mltl1m1s8vifptl3hpol9drrttil6', '::1', 1501676960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637363935393b),
('7efihnbheillrg4rvugl6msc7am5iq7h', '::1', 1501677421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637373135373b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('r9va9oo1pe81h4k7dd02s1anu0mlkor3', '::1', 1501677458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637373435383b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('8m4qo520u5s1lj5timilok50n3d1ng5c', '::1', 1501678140, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637373835333b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('rfr54oo42asq7l4mk8jmhh2mlh84k0fo', '::1', 1501678349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313637383136343b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('lt1ntgmek0gniue9br8tf1kjetgp7vop', '::1', 1501681128, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313638313130363b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('oklgh78iib6u7dbhvkfopcmsacou8r5n', '::1', 1501681408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313638313430373b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('407o7vb5grh8t36vleunp0pjnoagl71s', '::1', 1501682278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313638323237383b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a31393a2244656d616e6465207375707072696dc3a92021223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('3f63j4p488h1sfifndtjp9h2o05ue42v', '::1', 1501683430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313638333430323b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('6sgrtauf0sav7h2ku0ak3rafkc14rn63', '::1', 1501683798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313638333739383b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('cil9o4g0u2l0uq4n2jmkcor7and2m73d', '::1', 1502108993, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323130383833363b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('qulsefpa6h20nabj7sv3l5b0nulmaafo', '::1', 1502109326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323130393234343b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('0ep9l4bqj7rtc5u4a3t8lkh55cl9ekml', '::1', 1502109897, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323130393634373b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('mqgagslomve569dalpb6o0it005tkvoq', '::1', 1502110073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323130393934383b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('tin2ij6iq5q8ppi2i96calpacpsjbo3l', '::1', 1502110514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323131303530343b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('ro7c32bed1dd3bt9c6o6n9f5chagnjhi', '::1', 1502110920, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323131303932303b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('mhb5j0iq0aikcabfq7fqbqccjcvcifac', '::1', 1502111746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323131313734363b69647c733a333a22313532223b6c6f67696e7c733a343a2275736572223b726f6c657c733a343a2275736572223b),
('5v4ru10q7gipm149hnlr9iof4l7m6ff2', '::1', 1502276356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323237363036363b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('vti5ncojkm3q5ghoonrujib7hgac06qo', '::1', 1502276404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323237363339393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('hg170r3pl7mb3nspc4cqdk5nfpqv2en5', '::1', 1502298270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323239383133393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('jio38c7c7tkl7a8fmvlsck4kcjn5lrdu', '::1', 1502302833, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323330323636323b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('a6oha7j7avr1qp6fuekoonc12i4d6711', '::1', 1502303389, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323330333330363b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('vaknls24ao0jl0qfl614f7vmr4nhlre8', '::1', 1502367032, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323336363833343b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('61mklcj88ad2qu9mp255avhh872fvga8', '::1', 1502367347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323336373334373b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('naabgpsergrnk4agecprieup75avouvl', '::1', 1502368003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323336373738343b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a35393a22566f7573206176657a2061747465696e74206c65206e6f6d627265206d6178696d756d2064276974696ec3a97261697265206372c3a961626c652e223b733a363a22737461747573223b733a353a226572726f72223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('q24v23bgq2namfcud8aq1nvnh03eg8he', '::1', 1506618332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363631383331393b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('uskuduftlk3hc20p7lq0o3lgl2q4mc20', '::1', 1512490276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323439303232313b),
('8d221k33q9k5rl147djomh4e1hl3l0mv', '::1', 1512499722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323439393530353b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b),
('mjb1ajljcplvdrireuq1cf8ri31v3gt8', '::1', 1512500180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323439393838333b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a34313a22566f74726520636f6d6d656e746169726520c3a0206269656e20c3a974c3a920616a6f7574c3a92021223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('eovld7t4r34csid9l96pat75pnsad7ti', '::1', 1512500547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323530303533333b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a34313a22566f74726520636f6d6d656e746169726520c3a0206269656e20c3a974c3a920616a6f7574c3a92021223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('of39np2t46gngvc3bgaa0qj42p1m9jg6', '::1', 1514643797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531343634333530313b69647c733a333a22313031223b6c6f67696e7c733a343a2265706663223b726f6c657c733a353a2261646d696e223b6e6f74696669636174696f6e7c613a323a7b733a333a226d7367223b733a34313a22566f74726520636f6d6d656e746169726520c3a0206269656e20c3a974c3a920616a6f7574c3a92021223b733a363a22737461747573223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('s9j5gk716q3bgp5hq2g4msqu5cfnqm8i', '::1', 1518123258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383132333235313b);

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `localite_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `shortname` varchar(7) NOT NULL COMMENT 'abréviation du club',
  `name` varchar(100) NOT NULL COMMENT 'nom du club',
  `address` varchar(100) NOT NULL,
  `coord` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `localite_id`, `shortname`, `name`, `address`, `coord`) VALUES
(1, 1, 'rsca', 'royal sporting club anderelcht', 'Drève Olympique 1', '50.822350, 4.272951'),
(2, 3, 'cw', 'club woluwe', 'adresse woluwe', '50.833604, 4.440929'),
(3, 10, 'cd', 'club dilbeek', 'adresse dilbeek', '50.859369, 4.215487'),
(4, 6, 'cl', 'club liège', 'adresse liège', NULL),
(5, 9, 'co', 'club ostende', 'adresse ostende', NULL),
(6, 3, 'cn', 'club namur', 'adresse namur', NULL),
(7, 7, 'cc', 'club charleroi', 'adresse charleroi', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `article_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `author_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `content` text NOT NULL COMMENT 'contenu du commentaire',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de création du commentaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author_id`, `content`, `creation_date`) VALUES
(1, 20, 33, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2016-06-27 16:31:04'),
(2, 21, 60, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2017-01-24 20:48:36'),
(3, 57, 19, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2016-12-06 01:30:45'),
(4, 62, 5, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2016-12-07 23:26:23'),
(5, 73, 23, 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', '2017-03-03 09:42:16'),
(6, 67, 47, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', '2017-01-29 04:17:08'),
(7, 54, 81, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2016-10-01 12:26:31'),
(8, 37, 24, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2017-02-26 23:57:48'),
(9, 40, 69, 'In congue. Etiam justo. Etiam pretium iaculis justo.', '2017-01-08 13:04:47'),
(10, 51, 52, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', '2016-12-01 12:11:53'),
(11, 60, 54, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2016-09-02 02:41:23'),
(12, 11, 31, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2017-02-01 15:08:29'),
(13, 46, 87, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2017-04-02 08:57:31'),
(14, 33, 41, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2016-09-05 03:29:51'),
(15, 36, 96, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\n\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '2016-08-16 15:39:01'),
(16, 36, 32, 'Sed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', '2016-07-27 17:35:37'),
(17, 37, 99, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\n\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\n\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2016-06-28 22:34:42'),
(18, 10, 27, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2016-06-25 13:11:24'),
(19, 48, 45, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\n\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2016-12-24 19:25:23'),
(20, 61, 46, 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.', '2016-11-09 02:45:32'),
(21, 11, 48, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', '2016-08-06 10:14:03'),
(22, 16, 68, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '2016-10-03 06:58:40'),
(23, 57, 29, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '2016-07-30 09:23:19'),
(24, 70, 6, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2016-07-18 01:29:02'),
(25, 71, 46, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2017-05-26 00:22:38'),
(26, 21, 30, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.', '2016-07-08 09:33:34'),
(27, 9, 34, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '2016-08-18 15:22:01'),
(29, 19, 81, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.', '2017-01-16 15:50:37'),
(30, 1, 9, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2017-01-10 08:23:26'),
(31, 70, 5, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2017-04-04 20:56:00'),
(32, 19, 92, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', '2016-11-05 21:10:19'),
(33, 64, 41, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2017-01-18 15:51:28'),
(34, 70, 71, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '2016-09-29 03:57:20'),
(35, 40, 57, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2016-11-30 14:22:36'),
(36, 39, 5, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2016-07-28 19:44:09'),
(37, 21, 60, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', '2017-05-12 00:15:42'),
(38, 73, 74, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2017-05-29 10:30:10'),
(39, 9, 34, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2017-02-08 14:48:52'),
(40, 32, 96, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2016-06-25 03:49:56'),
(41, 79, 25, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '2017-04-05 00:15:37'),
(42, 30, 20, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\n\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2016-08-21 08:30:18'),
(43, 73, 87, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\n\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '2016-08-29 16:03:56'),
(44, 72, 68, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\n\nAenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', '2016-12-23 12:27:25'),
(45, 9, 4, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2017-03-03 20:51:49'),
(46, 32, 49, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\n\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2017-02-21 10:26:07'),
(47, 54, 95, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\n\nPhasellus in felis. Donec semper sapien a libero. Nam dui.\n\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2016-12-07 00:24:28'),
(48, 11, 78, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2017-02-28 21:37:15'),
(49, 31, 28, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', '2017-04-24 15:03:54'),
(50, 16, 28, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.', '2017-01-24 04:57:04'),
(51, 26, 75, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2016-11-07 13:06:37'),
(52, 53, 82, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2016-08-10 17:11:08'),
(53, 49, 18, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2016-06-19 12:46:15'),
(54, 5, 68, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', '2017-04-21 12:30:38'),
(55, 36, 12, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', '2017-06-02 23:38:32'),
(56, 77, 2, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2017-05-08 04:54:54'),
(57, 20, 27, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '2017-05-07 10:15:53'),
(58, 40, 68, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2016-09-06 05:43:56'),
(59, 72, 20, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\n\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2016-07-10 07:40:03'),
(60, 13, 15, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2017-01-24 01:58:38'),
(61, 25, 55, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.', '2017-03-07 16:53:47'),
(62, 56, 49, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2017-03-18 01:13:56'),
(63, 63, 45, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\n\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\n\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2017-01-02 19:05:24'),
(64, 75, 70, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2017-05-04 11:56:10'),
(65, 80, 46, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2016-07-28 22:00:19'),
(66, 71, 85, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2016-06-09 05:10:38'),
(67, 68, 75, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2017-05-22 11:16:17'),
(68, 7, 59, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', '2017-04-09 18:49:33'),
(69, 9, 61, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', '2016-11-28 04:45:18'),
(70, 69, 13, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2017-01-28 03:30:41'),
(71, 27, 82, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2016-09-22 04:11:37'),
(72, 57, 73, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '2017-01-23 05:57:31'),
(73, 62, 64, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\n\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2017-05-21 22:58:55'),
(74, 30, 19, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', '2016-07-12 11:29:29'),
(75, 21, 20, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '2016-10-28 18:35:30'),
(76, 52, 19, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '2017-02-07 11:01:44'),
(77, 39, 14, 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2016-09-13 06:43:44'),
(78, 45, 97, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', '2016-10-15 15:12:11'),
(79, 7, 93, 'In congue. Etiam justo. Etiam pretium iaculis justo.', '2017-01-11 23:38:02'),
(80, 39, 16, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2016-06-14 22:44:17'),
(81, 1, 101, 'mon commentaire', '2017-12-05 19:51:23'),
(82, 1, 101, 'formulaire sans slug', '2017-12-05 19:52:47'),
(83, 1, 101, 'slug modifié', '2017-12-05 19:53:24'),
(84, 1, 101, 'dfgdfg', '2017-12-05 19:56:20'),
(85, 1, 101, 'factorisé', '2017-12-05 20:02:27'),
(86, 1, 101, 'dfggd', '2017-12-30 15:22:32'),
(87, 1, 101, 'dfggd', '2017-12-30 15:23:17');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `dossard` int(10) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `processed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `demandes`
--

INSERT INTO `demandes` (`id`, `user_id`, `category_id`, `dossard`, `creation_date`, `processed`) VALUES
(2, 2, 7, 3052, '2017-06-06 10:24:42', 0),
(3, 3, 2, 4551, '2017-06-06 10:24:42', 0),
(4, 4, 2, 2526, '2017-06-06 10:24:42', 0),
(5, 5, 6, 2802, '2017-06-06 10:24:42', 0),
(6, 6, 2, 2877, '2017-06-06 10:24:42', 0),
(7, 7, 6, 4491, '2017-06-06 10:24:42', 0),
(8, 8, 7, 2428, '2017-06-06 10:24:42', 0),
(9, 9, 2, 2538, '2017-06-06 10:24:42', 0),
(11, 11, 1, 2545, '2017-06-06 10:24:42', 0),
(12, 12, 2, 2883, '2017-06-06 10:24:42', 0),
(13, 13, 5, 2078, '2017-06-06 10:24:42', 0),
(14, 14, 2, 2536, '2017-06-06 10:24:42', 0),
(15, 15, 3, 3846, '2017-06-06 10:24:42', 0),
(16, 16, 2, 4085, '2017-06-06 10:24:42', 0),
(17, 17, 6, 4878, '2017-06-06 10:24:42', 0),
(18, 18, 6, 3319, '2017-06-06 10:24:42', 0),
(21, 152, 2, 4521, '2017-08-07 14:55:04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `epreuves`
--

CREATE TABLE `epreuves` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `name` varchar(100) NOT NULL COMMENT 'nom de l''épreuve',
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `epreuves`
--

INSERT INTO `epreuves` (`id`, `name`, `type`) VALUES
(1, '100m hommes', 'course'),
(2, '100m haies hommes', 'course'),
(3, '100m dames', 'course'),
(4, '100m haies dames', 'course'),
(5, '20km hommes', 'marche'),
(6, '20km dames', 'marche'),
(7, 'longueur hommes', 'saut'),
(8, 'longueur dames', 'saut'),
(9, 'poids hommes', 'lancer'),
(10, 'poids dames', 'lancer'),
(11, 'décathlon hommes', 'épreuves combinées'),
(12, 'décathlon dames', 'épreuves combinées');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `localite_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `name` varchar(100) NOT NULL COMMENT 'nom de l''événement',
  `description` text NOT NULL COMMENT 'description de l''événement',
  `address` varchar(100) DEFAULT NULL,
  `coord` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'type d''événement',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de création de l''événement',
  `date` datetime NOT NULL COMMENT 'date de l''événement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `localite_id`, `name`, `description`, `address`, `coord`, `category_id`, `creation_date`, `date`) VALUES
(1, 10, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nul', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '5 Morrow Street', '50.887170, 4.424299', 1, '2016-07-27 18:07:03', '2017-10-17 23:12:50'),
(2, 4, 'Aliquam non mauris.', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.\n\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '11411 Huxley Park', NULL, 1, '2016-09-24 05:23:44', '2017-07-01 18:48:02'),
(3, 7, 'Proin eu mi.', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', '13230 Del Sol Point', NULL, 1, '2017-04-28 12:15:37', '2017-10-10 03:47:12'),
(4, 4, 'Quisque ut erat.', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '67077 Forest Run Drive', NULL, 1, '2017-03-28 19:29:17', '2017-10-13 13:19:43'),
(5, 1, 'Integer ac neque.', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', '30 Kingsford Way', '50.629692, 3.895826', 1, '2016-10-07 21:41:23', '2017-06-26 10:23:01'),
(6, 6, 'Maecenas tincidunt lacus at velit.', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '6 Green Crossing', NULL, 1, '2016-07-11 11:08:55', '2017-10-17 06:44:40'),
(7, 7, 'Morbi vel lectus in quam fringilla rhoncus.', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', '61259 Charing Cross Place', NULL, 1, '2017-01-23 07:41:21', '2017-09-20 08:08:18'),
(8, 5, 'Phasellus id sapien in sapien iaculis congue.', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '28716 Hollow Ridge Lane', NULL, 1, '2016-10-13 18:06:08', '2017-06-25 14:41:02'),
(9, 11, 'Quisque porta volutpat erat.', 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '45 Anniversary Crossing', '51.206487, 2.856493', 1, '2016-06-29 14:26:41', '2017-08-18 16:46:58'),
(10, 4, 'Nulla facilisi.', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '814 Hagan Trail', NULL, 1, '2016-08-22 01:47:47', '2017-09-24 21:18:46'),
(11, 10, 'Praesent id massa id nisl venenatis lacinia.', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '852 Tennessee Center', NULL, 1, '2017-02-21 22:51:14', '2017-12-16 11:43:20'),
(12, 4, 'Nullam porttitor lacus at turpis.', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '3402 Northridge Pass', NULL, 1, '2016-12-21 20:38:20', '2017-09-17 01:47:49'),
(13, 9, 'Aenean auctor gravida sem.', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '71 Charing Cross Parkway', NULL, 1, '2017-05-04 13:28:34', '2017-08-09 05:27:45'),
(14, 8, 'Donec quis orci eget orci vehicula condimentum.', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '00773 Loeprich Way', NULL, 1, '2016-10-02 21:52:10', '2017-08-07 22:00:33'),
(15, 7, 'Nulla nisl.', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\n\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '833 Roxbury Park', NULL, 1, '2017-04-24 09:01:45', '2017-12-09 06:55:40'),
(16, 3, 'Phasellus sit amet erat.', 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '95 Towne Plaza', NULL, 2, '2017-01-13 15:25:59', '2017-09-13 11:14:35'),
(17, 7, 'Fusce posuere felis sed lacus.', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '5363 Doe Crossing Drive', NULL, 2, '2016-10-24 04:34:46', '2017-06-09 12:24:16'),
(18, 9, 'Nam tristique tortor eu pede.', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '99 Lakeland Street', NULL, 2, '2017-03-11 00:12:29', '2017-09-14 02:17:31'),
(19, 9, 'Praesent blandit.', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '7141 Carberry Trail', NULL, 2, '2016-10-09 12:14:35', '2017-06-26 11:53:02'),
(20, 5, 'Nulla suscipit ligula in lacus.', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '96 Maple Road', NULL, 2, '2016-10-18 18:29:57', '2017-12-13 02:39:02'),
(21, 3, 'Etiam faucibus cursus urna.', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', '98198 Dapin Court', NULL, 2, '2016-11-03 23:33:49', '2017-07-18 20:12:57'),
(22, 6, 'Praesent blandit lacinia erat.', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '1558 Londonderry Alley', NULL, 2, '2017-03-26 05:53:56', '2017-11-02 09:26:37'),
(23, 4, 'Suspendisse accumsan tortor quis turpis.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '86 Dunning Place', NULL, 2, '2016-07-07 17:49:07', '2017-07-05 00:17:11'),
(24, 10, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharet', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '54194 Florence Hill', NULL, 2, '2016-09-28 12:47:57', '2017-10-29 09:28:48'),
(25, 1, 'Duis mattis egestas metus.', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', '674 Scoville Trail', NULL, 2, '2016-09-29 16:27:46', '2017-11-21 16:42:39'),
(26, 7, 'Nullam varius.', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '15196 3rd Parkway', NULL, 2, '2016-11-21 13:05:52', '2017-07-16 12:58:20'),
(27, 11, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi e', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '3 North Terrace', NULL, 2, '2017-04-23 23:49:25', '2017-08-13 00:13:23'),
(28, 11, 'In sagittis dui vel nisl.', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '28 Golf View Crossing', NULL, 2, '2016-09-28 11:17:19', '2017-07-08 10:18:13'),
(29, 8, 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula ne', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '0 Service Center', NULL, 2, '2017-01-04 20:28:24', '2017-08-05 12:01:31'),
(30, 2, 'Pellentesque ultrices mattis odio.', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '400 Sugar Point', NULL, 2, '2017-06-03 09:25:59', '2017-06-12 00:28:06');

-- --------------------------------------------------------

--
-- Structure de la table `localites`
--

CREATE TABLE `localites` (
  `id` int(10) UNSIGNED NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `localites`
--

INSERT INTO `localites` (`id`, `postcode`, `city`) VALUES
(1, 1070, 'Anderlecht'),
(2, 1190, 'Forest'),
(3, 1020, 'Laeken'),
(4, 1040, 'Etterbeek'),
(5, 1090, 'Jette'),
(6, 1140, 'Evere'),
(7, 1400, 'Nivelles'),
(8, 1502, 'Lembeek'),
(9, 1750, 'Lennik'),
(10, 1820, 'Perk'),
(11, 2260, 'Oevel');

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `epreuve_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `athlete_id` int(10) UNSIGNED NOT NULL COMMENT 'clé étrangère',
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `results`
--

INSERT INTO `results` (`id`, `epreuve_id`, `event_id`, `athlete_id`, `result`) VALUES
(2, 4, 16, 48, 75.63),
(3, 2, 28, 48, 46.81),
(4, 2, 21, 17, 59.46),
(5, 3, 22, 12, 34.43),
(6, 1, 25, 27, 12.66),
(7, 6, 18, 4, 76.56),
(9, 6, 27, 24, 77.29),
(10, 1, 21, 46, 69.43),
(11, 5, 16, 37, 24.79),
(12, 5, 23, 41, 61.47),
(13, 6, 30, 43, 58.47),
(14, 8, 16, 34, 67.03),
(15, 4, 21, 38, 30.56),
(16, 10, 30, 49, 64.91),
(17, 7, 24, 45, 11.27),
(18, 12, 18, 7, 76.44),
(19, 5, 16, 40, 39.51),
(20, 11, 18, 15, 50.12),
(21, 5, 24, 22, 18.95),
(22, 12, 24, 34, 56.12),
(23, 7, 20, 36, 15.34),
(24, 1, 16, 14, 73.02),
(25, 7, 18, 30, 45.17),
(26, 9, 18, 8, 25.69),
(27, 4, 21, 29, 75.75),
(28, 2, 24, 41, 46.35),
(29, 11, 24, 30, 64.74),
(30, 5, 19, 38, 65.72),
(31, 1, 28, 38, 42.57),
(32, 6, 25, 49, 13.3),
(33, 1, 25, 12, 78.08),
(34, 2, 22, 23, 16.78),
(35, 1, 27, 41, 44.22),
(36, 12, 20, 25, 17.04),
(37, 4, 21, 20, 36.64),
(38, 12, 19, 16, 49.68),
(39, 1, 19, 32, 68.68),
(40, 3, 27, 6, 28.34),
(41, 11, 27, 33, 77.12),
(42, 1, 30, 21, 40.01),
(43, 5, 29, 48, 20.43),
(44, 10, 21, 50, 35.93),
(45, 11, 23, 6, 31.85),
(46, 10, 25, 48, 70.78),
(47, 10, 22, 5, 49.64),
(49, 10, 22, 34, 45.44),
(50, 6, 28, 49, 59.68),
(51, 12, 20, 24, 44.77),
(52, 5, 29, 30, 25.71),
(53, 7, 17, 14, 77.87),
(54, 5, 19, 2, 19.43),
(55, 1, 28, 7, 64.07),
(56, 9, 30, 43, 40.91),
(57, 3, 23, 12, 53.92),
(58, 12, 26, 5, 27.43),
(59, 12, 21, 41, 57.13),
(60, 6, 22, 42, 50),
(61, 11, 27, 45, 59.64),
(62, 9, 26, 17, 36.35),
(63, 12, 27, 11, 33.64),
(64, 1, 30, 22, 61.5),
(65, 2, 26, 11, 44.44),
(66, 8, 21, 38, 28.59),
(67, 4, 21, 45, 57.39),
(68, 2, 30, 23, 76.42),
(70, 4, 20, 7, 51.2),
(72, 3, 29, 15, 51.47),
(73, 12, 27, 39, 12.24),
(74, 8, 29, 4, 77.58),
(75, 4, 17, 1, 76.63),
(76, 10, 19, 36, 53.9),
(77, 12, 28, 30, 56.27),
(78, 2, 29, 38, 76.03),
(79, 9, 30, 19, 47.52),
(80, 4, 28, 26, 52.74),
(81, 11, 24, 45, 26.81),
(82, 4, 18, 38, 70.19),
(83, 3, 26, 2, 38.82),
(84, 6, 25, 4, 44.08),
(85, 5, 19, 49, 50.94),
(86, 10, 17, 37, 50.06),
(87, 3, 22, 36, 12.95),
(88, 9, 23, 48, 61),
(89, 10, 24, 22, 26.97),
(90, 9, 26, 43, 73.29),
(91, 12, 16, 44, 10.45),
(92, 12, 27, 10, 26.76),
(93, 6, 23, 45, 77.72),
(94, 9, 24, 4, 23.04),
(95, 9, 18, 13, 47.98),
(96, 11, 26, 41, 42.65),
(97, 9, 29, 1, 24.81),
(98, 9, 30, 34, 63.79),
(99, 10, 19, 17, 74.54),
(101, 7, 16, 17, 36.74),
(103, 3, 22, 17, 40.71),
(104, 10, 19, 6, 24.73),
(105, 8, 27, 10, 31.64),
(106, 11, 16, 25, 49.37),
(107, 10, 23, 11, 67.17),
(108, 8, 17, 45, 10.07),
(109, 5, 26, 41, 73.93),
(110, 5, 22, 11, 24.82),
(111, 6, 29, 6, 42.22),
(112, 1, 19, 17, 51.78),
(113, 10, 21, 49, 15.85),
(114, 9, 16, 7, 45.22),
(115, 5, 29, 44, 32.17),
(116, 8, 17, 29, 59.07),
(117, 10, 27, 41, 68.45),
(118, 3, 17, 6, 15.85),
(119, 9, 30, 19, 47.79),
(120, 11, 19, 36, 12.99),
(121, 1, 27, 10, 65.05),
(122, 6, 29, 26, 45.15),
(123, 2, 19, 50, 67.46),
(124, 2, 27, 1, 71.57),
(125, 8, 19, 1, 57.42),
(126, 8, 22, 24, 56.84),
(127, 9, 25, 25, 42.01),
(128, 2, 16, 10, 16.94),
(129, 12, 30, 38, 51.66),
(130, 10, 16, 11, 40.75),
(131, 11, 23, 11, 67.15),
(132, 8, 16, 39, 64.42),
(133, 7, 22, 21, 60.55),
(134, 4, 29, 27, 57.19),
(135, 7, 24, 28, 14.01),
(136, 11, 20, 1, 41.67),
(137, 3, 19, 38, 22.28),
(139, 11, 20, 2, 33.32),
(140, 4, 27, 16, 60.54),
(141, 10, 24, 40, 41.14),
(142, 8, 27, 37, 61.83),
(143, 5, 25, 45, 51.53),
(144, 1, 18, 1, 34.33),
(145, 10, 18, 7, 56.31),
(146, 2, 23, 15, 19.73),
(147, 10, 28, 21, 44.88),
(148, 6, 29, 38, 62.8),
(149, 12, 26, 12, 73.67),
(150, 2, 21, 37, 57.44);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `name` varchar(20) NOT NULL COMMENT 'nom du rôle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'athlete'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `coord` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `routes`
--

INSERT INTO `routes` (`id`, `user_id`, `name`, `coord`) VALUES
(1, 101, 'Tour du lac', '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[4.273671582341194,50.82274756416709],[4.274959042668343,50.821663129603614],[4.276976063847542,50.82019910299124],[4.279851391911507,50.82060578165461],[4.282040074467659,50.82052444620529],[4.28375668823719,50.82090401042339],[4.284700825810432,50.82309999997734],[4.286932423710823,50.824835029795445],[4.289807751774788,50.82629891105354],[4.289550259709358,50.82708505056283],[4.288176968693733,50.827112158585635],[4.286331608891487,50.82602782539468],[4.281396344304085,50.82486213912477],[4.279250577092171,50.82513323155225],[4.277619794011116,50.82570252052624],[4.275602772831917,50.826895293962295],[4.274916127324104,50.826244694047695],[4.274057820439339,50.825268777175694],[4.272899106144905,50.824455497532114],[4.273671582341194,50.82274756416709]]},"properties":{}}]}'),
(2, 101, 'Grand tour par Erasme', '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[4.273714497685432,50.82265267714826],[4.275731518864632,50.82129712725385],[4.276847317814827,50.820293994996184],[4.2789072543382645,50.818016533655715],[4.2796797305345535,50.81736581001429],[4.27852101624012,50.817013330922606],[4.272384122014046,50.81571184661481],[4.267835095524788,50.815386469870745],[4.2638010531663895,50.81519666572318],[4.26178403198719,50.815386469870745],[4.258908703923225,50.81638970755095],[4.259166195988655,50.81723024144772],[4.260067418217659,50.819290841188355],[4.261655285954475,50.8210531240935],[4.264144375920296,50.8230593344427],[4.267448857426643,50.82525522263105],[4.269465878605843,50.8242792850754],[4.271096661686897,50.82398107786434],[4.272427037358284,50.82400818768948],[4.273714497685432,50.82265267714826]]},"properties":{}}]}'),
(3, 101, 'Tour pour entrainement à la salle Erasme', '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[4.263758137822151,50.814735709581996],[4.259809926152229,50.81413917135177],[4.260110333561897,50.8126749088472],[4.260711148381233,50.81126483490121],[4.265260174870491,50.811996993993944],[4.268822148442268,50.81224104447456],[4.271053746342659,50.81262067602102],[4.275817349553108,50.81205122754428],[4.276804402470589,50.810424193642156],[4.277834370732307,50.8090411702658],[4.280580952763557,50.809719128017655],[4.283413365483284,50.811617357378424],[4.285687878727913,50.814057824639136],[4.287318661808968,50.81546781426926],[4.28225465118885,50.816416821783754],[4.2795080691576,50.817284468921585],[4.277147725224495,50.816525278557535],[4.269980862736702,50.815413584686],[4.263758137822151,50.814735709581996]]},"properties":{}}]}'),
(5, 153, 'perso', '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[4.271826222538948,50.82491635773619],[4.287533238530159,50.82488924843835],[4.287619069218636,50.81949418491783],[4.276976063847542,50.81653883563654],[4.26453061401844,50.82177157419332],[4.270495846867561,50.82375064371487],[4.271826222538948,50.82491635773619]]},"properties":{}}]}'),
(7, 152, 'Parcours 1', '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[4.273198843002319,50.82325596900098],[4.272855520248413,50.82496388376872],[4.274786710739136,50.82593980701404],[4.27543044090271,50.82702414224935],[4.274057149887085,50.827674731301585],[4.272555112838745,50.82667173606038],[4.269636869430542,50.827349437908815],[4.2689502239227295,50.826617519487506],[4.269551038742065,50.82599402437395],[4.269851446151733,50.82496388376872],[4.271782636642456,50.82490966521249],[4.27143931388855,50.823689731051154],[4.273198843002319,50.82325596900098]]},"properties":{}}]}');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clé primaire',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'clé étrangère',
  `login` varchar(60) NOT NULL COMMENT 'login de l''utilisateur',
  `password` varchar(255) NOT NULL COMMENT 'mot de passe de l''utilisateur',
  `email` varchar(100) NOT NULL COMMENT 'email de l''utilisateur',
  `profile_image` varchar(200) DEFAULT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date d''inscription de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `login`, `password`, `email`, `profile_image`, `inscription_date`) VALUES
(1, 1, 'adoyland', '$2y$10$F7VYssPqLzdOyEPV61l.MOaHAEW4yiVxsMP.XBa6fiWDxtvdzjKtS', 'lyesichev0@di.ne.jp', NULL, '2016-09-27 05:54:28'),
(2, 2, 'jtheobald1', 'a0ff7126fc16c2459f64881d3fd6040c', 'kricciardiello1@cnn.com', NULL, '2016-11-17 10:03:50'),
(3, 2, 'tmacgillacolm2', '5e0b11e1346e422609583efd7bb709db', 'ctruss2@chronoengine.com', NULL, '2016-09-24 00:05:31'),
(4, 2, 'lpitkin3', 'd7b3dbc2286271ddac6d60bbb191281d', 'ktennison3@cam.ac.uk', NULL, '2016-07-09 12:32:14'),
(5, 2, 'rchecketts4', '3c7c23b41fe11acff6f2fe793da45ef1', 'abunce4@ocn.ne.jp', NULL, '2016-07-03 06:39:11'),
(6, 1, 'wcarnow5', 'ae7c7f0173c287abf72c3663f698b893', 'rmcnamee5@vimeo.com', NULL, '2016-10-06 18:12:33'),
(7, 1, 'ggookey6', '81c1d68d05fceb2c730606ff0dc5530d', 'cstribling6@usda.gov', NULL, '2017-03-06 14:30:16'),
(8, 1, 'mcasperri7', '2acb92fd5847c128eea6dd4c75d4aab2', 'dfillan7@yahoo.co.jp', NULL, '2017-05-12 06:58:35'),
(9, 1, 'earndell8', '0910384a443c9254258b96f35cca144c', 'jnutbeem8@taobao.com', NULL, '2016-11-09 13:57:17'),
(11, 1, 'noslera', 'a2a5d27217994419dadff4fdd8f47505', 'taldhousa@cyberchimps.com', NULL, '2016-11-05 08:32:24'),
(12, 1, 'kdengeb', '73aaf54b302df8f599250c46533516ed', 'jconnerryb@tmall.com', NULL, '2016-12-26 14:10:10'),
(13, 1, 'iguthersonc', 'b4f15d5b98d7a11768523efddad09be0', 'bskarrc@usnews.com', NULL, '2016-10-15 10:10:34'),
(14, 2, 'obertenshawd', '2b679fd9b69d5fa35649b77bdb69bbc1', 'kbreydind@dedecms.com', NULL, '2017-05-22 06:38:52'),
(15, 1, 'zhamfleete', '157eb47ea229dffe147345aab61e7684', 'gshorbrooke@slashdot.org', NULL, '2017-03-27 21:55:32'),
(16, 1, 'rstanyanf', 'cb489b45a873db94e932fecd3080b6d6', 'ecransonf@imdb.com', NULL, '2017-04-24 14:24:18'),
(17, 1, 'iduesberryg', '5b437e41541060cb5ca465ad1406053c', 'vtoveyg@woothemes.com', NULL, '2016-09-26 00:16:59'),
(18, 1, 'nsireyh', '8e672af2fd48ef1fb0489a3d4b833f90', 'bwastallh@sciencedaily.com', NULL, '2016-06-14 05:03:17'),
(19, 1, 'hboughi', '2e6809987fe25ada8abb62c5cf05546b', 'efallensi@addtoany.com', NULL, '2017-01-24 00:48:36'),
(20, 1, 'gdalliwaterj', '27cbb60eaecab460a477d71f854ade5b', 'creicharzj@addtoany.com', NULL, '2016-07-19 04:42:34'),
(21, 1, 'ecomizzolik', '2f545bd6f87d1f4652dd31e13f37a29e', 'estoppek@aol.com', NULL, '2016-12-06 18:47:17'),
(22, 1, 'cjaukovicl', 'c78ecbaa63bb847749ebd0a5ae88b491', 'csupplel@discuz.net', NULL, '2017-04-20 23:10:01'),
(23, 1, 'tmuskm', 'd404ba6d2cf1344cdcc9fe9fd4beab03', 'nlegravem@ow.ly', NULL, '2016-12-01 09:15:58'),
(24, 1, 'bmiskimmonn', 'b6888c9930a7b3c4a9d9bd5530d2da92', 'dcordetn@sourceforge.net', NULL, '2017-02-26 21:13:07'),
(25, 1, 'sdedericho', '6ad70b7e3f51a70e7df57a6533563438', 'wgellerto@rediff.com', NULL, '2016-11-26 05:24:30'),
(26, 1, 'vnanop', '4996cae9db959b06ab3bc34aeb69f3f1', 'cmaharryp@jalbum.net', NULL, '2016-08-05 14:13:35'),
(27, 1, 'astraineq', '08f0c91422d3e1b4b5f1f837812a31ac', 'rdunsmuirq@simplemachines.org', NULL, '2016-11-25 03:32:56'),
(28, 1, 'gblazebyr', '6f7b93562a24a26c6a9354ec0d208842', 'bgroomr@about.com', NULL, '2017-04-24 21:29:55'),
(29, 1, 'kboshers', '5bbd31de1ffa50312b2be7c9353300cc', 'dhallibones@wufoo.com', NULL, '2016-11-17 09:00:35'),
(30, 1, 'lkubut', '479d5182e027fbefcafdfb2b60de0d46', 'tasmant@washingtonpost.com', NULL, '2016-09-18 02:27:23'),
(31, 1, 'oguilloneauu', '39883468acff994def04a3867373019a', 'spobjayu@cbslocal.com', NULL, '2017-05-14 20:34:42'),
(32, 1, 'wpulteneyev', '41ad8aba596b03edb5e9f35af45adbfd', 'tsmelliev@nymag.com', NULL, '2016-07-17 20:24:40'),
(33, 1, 'gclutheramw', 'd688689b62ecd04e715ae5d5f7dfb67f', 'bventumw@wp.com', NULL, '2017-02-13 02:14:55'),
(34, 1, 'rtethacotx', 'fb330d016af8d8fd51703f9da6c09429', 'yrubix@wikipedia.org', NULL, '2017-05-06 07:08:24'),
(35, 1, 'mgreydony', '28562dbd56cfa35b8f11a2432d2bea11', 'bpencoty@geocities.com', NULL, '2016-10-22 16:32:17'),
(36, 1, 'adodswellz', '3658764931fc55ad3ad94e128364eb12', 'sgrassettz@behance.net', NULL, '2016-10-20 13:48:16'),
(37, 1, 'gdomeney10', '312b752052cdaaf358e00630d3986ffe', 'arickeard10@phpbb.com', NULL, '2017-05-23 15:53:24'),
(38, 1, 'wbidewell11', 'c909ee13c62fc69b8c456d387192ef24', 'aburnes11@fc2.com', NULL, '2017-03-14 20:40:12'),
(39, 1, 'mrandal12', '$2y$10$tlfbrkjeEDZgJEFOmCWCT.cR.HkOGVnhbsEovah8XvNmNguf1/XwW', 'alownds12@unicef.org', NULL, '2016-11-23 14:30:30'),
(40, 1, 'mmaccoughen13', '62965a4750140eb3e62aa9ebcf20ebfc', 'bpassman13@google.it', NULL, '2017-05-07 17:03:59'),
(41, 1, 'acardozo14', 'fe3513b52f695fc46455bc9d6fd9967a', 'tanthoney14@newyorker.com', NULL, '2016-10-07 15:28:09'),
(42, 1, 'thaysom15', 'c1efe1b786ed2beb1f3fe2de838d8588', 'fprando15@irs.gov', NULL, '2016-06-15 06:00:35'),
(43, 1, 'myve16', '44d8bc011b06c991452aaee30bad2a6c', 'tceles16@wsj.com', NULL, '2016-06-12 10:31:34'),
(44, 2, 'cbeadles17', '$2y$10$JfAoOL3uYmk/baSQIESFdOS22SaUQZZFxCwrqxhEd62GvxjbeTIN.', 'dcitrine17@elpais.com', NULL, '2016-11-10 15:21:46'),
(45, 1, 'ptuppeny18', '098e8268d1f426734ac1853891a1da9a', 'osends18@geocities.jp', NULL, '2016-07-07 07:23:30'),
(46, 1, 'fcaves19', '906d8eb8875cd06cf5f6e7a110ffb58b', 'lduley19@addtoany.com', NULL, '2016-08-02 07:16:04'),
(47, 1, 'aharrill1a', 'be70e3838adcc548ae0fa5da69df00de', 'cburril1a@aol.com', NULL, '2017-03-07 07:57:31'),
(48, 1, 'mstarie1b', 'fb7afc448c3f5aba4f3e221d1cf765cb', 'gjotcham1b@admin.ch', NULL, '2016-07-08 03:32:22'),
(49, 1, 'gjakaway1c', 'f0c39ea1a601ea6c92f02f783c468b72', 'mblackborn1c@yolasite.com', NULL, '2017-05-01 15:49:27'),
(50, 1, 'chegg1d', '83502aa9f66cbc4d4e27086d506a7e60', 'lcarrigan1d@reuters.com', NULL, '2016-11-21 06:10:04'),
(51, 1, 'pcordeau1e', 'a8dd4f07d35715aca6575de5a288ed60', 'fcharnick1e@tinyurl.com', NULL, '2016-08-05 16:36:28'),
(52, 1, 'vbielefeld1f', '1fcdee9cd932469e9c6bf8973a309a14', 'smcgiffie1f@bloomberg.com', NULL, '2017-06-05 20:25:51'),
(53, 1, 'tbodesson1g', '1df6e83e245caac2ccb4c73b731f26e0', 'amuzzillo1g@tinyurl.com', NULL, '2016-07-21 04:30:36'),
(54, 1, 'mfladgate1h', '88ea3dea4980eed825e7e40c3565a6dd', 'bcaistor1h@fc2.com', NULL, '2016-11-11 20:23:17'),
(55, 1, 'twoodus1i', 'b9429d6e368fc8c8ea80021cb5ea5a3d', 'sgiblin1i@paypal.com', NULL, '2017-04-16 20:45:09'),
(56, 1, 'bfriatt1j', '037ac6c11686c9f36a34cf5fc081a83c', 'fwoof1j@slideshare.net', NULL, '2017-02-14 07:55:34'),
(57, 1, 'shadland1k', '56ba545a0d5a38c269dd255747bbfe56', 'dgumme1k@bluehost.com', NULL, '2017-04-10 04:37:16'),
(58, 1, 'rmilsted1l', '16e558df29c32bb3c4f6c6cdd0b5068d', 'cgunston1l@shareasale.com', NULL, '2016-06-10 07:09:58'),
(59, 1, 'cpeagram1m', '1b7d76f3ec4cf23260e1dc3c8108795c', 'hfrance1m@mysql.com', NULL, '2016-06-19 06:06:37'),
(60, 1, 'yarpur1n', '9f6b6b960a45a87b3a730a3168abe771', 'lbottomley1n@surveymonkey.com', NULL, '2017-05-01 12:01:29'),
(61, 1, 'luridge1o', '4dfb4d0aa6f976414def6ca579febb0f', 'clunt1o@home.pl', NULL, '2017-01-31 07:23:32'),
(62, 1, 'dthrelfall1p', '358d6ba4e3dc1020a65d1618cba0e6a0', 'rwerndley1p@alexa.com', NULL, '2016-09-03 02:59:44'),
(63, 1, 'dmcguff1q', '39a026bca6e78ea262e9ec563ea5e860', 'jtanzer1q@imageshack.us', NULL, '2017-05-02 05:33:53'),
(64, 1, 'epovall1r', 'dcbeb3d8984fe73789c05911803e81c2', 'istucke1r@deviantart.com', NULL, '2017-05-13 23:41:10'),
(65, 1, 'jdelnevo1s', 'e8ced1b0ce573ba9b78187cacb24e7e6', 'kkensley1s@clickbank.net', NULL, '2016-10-28 07:02:33'),
(66, 1, 'dsekulla1t', '864287768d486bd13000ed12ad6020d6', 'wspeke1t@nymag.com', NULL, '2016-07-25 13:59:37'),
(67, 1, 'kstrickler1u', '775c9e091d17f62be428a35c501b5173', 'khackett1u@yahoo.co.jp', NULL, '2016-07-19 20:48:29'),
(68, 1, 'echittenden1v', '293fb3f1b97a044c6c20d4e043f57241', 'mbrunnstein1v@free.fr', NULL, '2017-03-17 10:13:41'),
(69, 1, 'aderill1w', '456f6fc524902a7ebe538691174bf446', 'awarbeys1w@vinaora.com', NULL, '2017-04-26 18:34:16'),
(70, 1, 'hmacfadzan1x', 'f63b188daf4bc73c14f2d11ff55b8509', 'abewick1x@usgs.gov', NULL, '2017-02-25 21:39:38'),
(71, 1, 'mbrandle1y', 'b0191eeee605ec8053bdd2a7d7686495', 'fskyrm1y@odnoklassniki.ru', NULL, '2016-07-24 18:36:39'),
(72, 1, 'smarlow1z', '36b511a858bef0212cab280308769c2b', 'agunner1z@blogger.com', NULL, '2016-10-06 19:14:51'),
(73, 1, 'cfrances20', 'd842577fe22177dd66199b60f8bd1d68', 'aullett20@creativecommons.org', NULL, '2016-07-05 21:47:33'),
(74, 1, 'hdaintier21', '1e8a9a1390f03c66086d68b8786c8765', 'nbampkin21@state.gov', NULL, '2017-02-08 07:23:37'),
(75, 1, 'kcramond22', 'a4226f459fc9bb956eed66d65af156fe', 'raffuso22@godaddy.com', NULL, '2017-05-07 10:23:00'),
(76, 2, 'rbosward23', '5f2f34698334c9058a9f1e4cd5aeaece', 'amonck23@yale.edu', NULL, '2017-03-28 04:33:07'),
(77, 1, 'bfossey24', '5fd3c6a2e3ee617a9c404fb706005af7', 'agasken24@51.la', NULL, '2017-05-07 21:13:08'),
(78, 1, 'wbarok25', 'bbdd9ee0022ca840eb9535ba9a1d0f4b', 'fadderson25@go.com', NULL, '2016-07-26 18:26:12'),
(79, 1, 'mroake26', '18cc6a8724055732fb38353f73d00db0', 'jhawkswood26@amazonaws.com', NULL, '2016-07-06 04:25:31'),
(80, 1, 'dedelmann27', 'ce0e34cdbeeb2ab5e9609b4fd437fee1', 'gstibbs27@4shared.com', NULL, '2016-11-18 02:56:35'),
(81, 2, 'agowenlock28', 'c20723dead9a9ca18505ed050fe84503', 'tdrummond28@jigsy.com', NULL, '2017-02-16 06:28:28'),
(82, 2, 'bchaplyn29', 'ff6c0857fc80791f575bb5fc4fbdf3b3', 'pochterlonie29@europa.eu', NULL, '2016-07-20 22:42:37'),
(83, 1, 'avaar2a', '261f69294321227bfaf8770ebbf8823f', 'gsalan2a@themeforest.net', NULL, '2016-08-15 12:57:38'),
(84, 1, 'dantoniazzi2b', '7aa159de83e0f231371b15ebf7c0544d', 'hateridge2b@wsj.com', NULL, '2017-02-18 14:47:43'),
(85, 1, 'cyellowlees2c', '0639955713a958921b33f03267abebaf', 'bdashper2c@quantcast.com', NULL, '2016-07-24 09:15:33'),
(86, 1, 'cleeves2d', '2bf7bcdac818d4b14a5f0a2c020150c0', 'fkas2d@seattletimes.com', NULL, '2017-06-03 17:25:34'),
(87, 1, 'gwaitland2e', '06a14a225916a9cf777d3c05721a6cdf', 'kstollsteimer2e@google.ca', NULL, '2016-06-30 21:26:19'),
(88, 1, 'tiseton2f', '116c6e6b7498e0425cc4cb6c149ff840', 'rverdon2f@jimdo.com', NULL, '2016-08-02 17:45:21'),
(89, 1, 'jjahnig2g', '82dfee4c747f0506fef4750ccf378e85', 'asanham2g@4shared.com', NULL, '2016-07-13 07:44:34'),
(90, 1, 'slelievre2h', '1ca1ecef1e42598ce22c5693ff81f4b0', 'mbarton2h@mayoclinic.com', NULL, '2016-11-09 13:26:51'),
(91, 1, 'bsimmens2i', '89a8b153afe67cd40ab6c3c949b6a74e', 'tkopelman2i@live.com', NULL, '2017-01-27 03:43:19'),
(92, 1, 'epennyman2j', '08e4de374c8172c6a6f1dc7afd9cbb47', 'smcettigen2j@wordpress.org', NULL, '2016-12-17 02:31:58'),
(93, 1, 'mmcgannon2k', '2e52628b9ccd81b1ef341059d2f66856', 'gdalziell2k@blogspot.com', NULL, '2017-06-02 03:11:06'),
(94, 1, 'asimka2l', '2a07efa7c25ba200342aef977abccc23', 'hprynne2l@nature.com', NULL, '2017-03-11 11:21:09'),
(95, 1, 'dphoebe2m', '36747e17cc2743c0873041117b586bba', 'rdaton2m@youku.com', NULL, '2016-09-15 04:31:00'),
(96, 1, 'rwork2n', '650f278b989cad58fbbf249adda8bcae', 'bmouatt2n@auda.org.au', NULL, '2016-12-15 18:33:22'),
(97, 1, 'bshoveller2o', '837f14fb67cf70c7790dac4a91fef6b8', 'jmobbs2o@icio.us', NULL, '2017-04-21 18:10:46'),
(98, 1, 'ksiggers2p', 'f8d19d5a8955fe62de806a1c5c035c33', 'sgoodliffe2p@github.com', NULL, '2016-07-03 10:31:56'),
(99, 1, 'cpirrie2q', '82ab42a2048ed94163623292cde5db22', 'abrake2q@goo.ne.jp', NULL, '2016-10-07 05:08:25'),
(100, 1, 'kloachhead2r', 'b7f357b0bff2ee12a402ef3bce26a356', 'soverthrow2r@trellian.com', NULL, '2017-02-09 02:09:14'),
(101, 3, 'epfc', '$2y$10$rM.WGipaaqJIKTNYReCB6eLpEkjdqGCV5BBi4sxUEsf9GzWoiTDES', 'epfc@example.io', NULL, '2017-06-06 09:55:40'),
(102, 2, 'rnucator0', '$2y$10$ofqm.vSr8pvcJYqxNSntHuvjVYxgGvGQcD4MhGU12C80RyfnfCxNm', 'laron0@amazon.de', NULL, '2017-01-02 16:12:12'),
(103, 2, 'jberrington1', '63328f462a29668104e0d29d4117acad', 'ibwye1@biglobe.ne.jp', NULL, '2016-07-05 23:03:40'),
(104, 2, 'tbaseggio2', 'a59188c9992864a223cc8fa08cd30427', 'ahessay2@nhs.uk', NULL, '2017-06-01 13:50:52'),
(105, 2, 'adadda3', 'f0e5c6975140ef31954b7403ff6d8913', 'krowswell3@newsvine.com', NULL, '2017-01-13 02:03:07'),
(106, 2, 'bmcclune4', '08bef10c1b482b21d7327acac1b00392', 'igolagley4@gizmodo.com', NULL, '2016-09-15 12:56:18'),
(107, 2, 'fbirkby5', 'bf4b54c773cd7d8b2042ce850a09057e', 'jespino5@fc2.com', NULL, '2017-02-15 20:41:23'),
(108, 2, 'adenyakin6', '3bf3a65e47cf371cc869b69f421c42cd', 'ewessel6@homestead.com', NULL, '2017-05-05 23:05:47'),
(109, 2, 'makram7', 'cca91bcf826cc5ad61f137c509e3df53', 'ggisbye7@bloomberg.com', NULL, '2017-05-21 22:10:13'),
(110, 2, 'dmcvee8', 'cfbea99aa9ea837a0b71377f422545c4', 'brattenbury8@boston.com', NULL, '2016-09-15 02:27:17'),
(111, 2, 'wmasdin9', 'ab457c6289d108f2c499c3ecd823dcf6', 'nkenington9@springer.com', NULL, '2017-02-13 15:48:43'),
(112, 2, 'wbidmeada', '2bde691f49103837755aacbddd7c3f85', 'jgabbotta@netscape.com', NULL, '2017-01-22 14:53:40'),
(113, 2, 'jgarryb', 'f0b7a1aee1b0b01da274ef529a78bc44', 'vridulfob@uiuc.edu', NULL, '2017-04-04 21:06:42'),
(114, 2, 'hbissc', '556cbafbc1f9ea092db6b81e22f0dbac', 'dsuttiec@cbc.ca', NULL, '2017-03-30 06:19:03'),
(115, 2, 'gphalpd', '47e2446327fb6bc273fa408500db4c1a', 'sminkerd@dot.gov', NULL, '2017-04-10 17:48:21'),
(116, 2, 'mscoone', '026c2fc010ecd658f23028c5947ce0d8', 'mwhithalghe@ocn.ne.jp', NULL, '2016-11-01 10:45:02'),
(117, 2, 'brenaultf', '28c09e02d456833e7848eadecd36a5da', 'ssweetmanf@ovh.net', NULL, '2017-04-29 16:40:07'),
(118, 2, 'rshaxbyg', 'fb07e4756c305158b60a511fedc5df12', 'cmerrisong@biblegateway.com', NULL, '2017-04-18 11:38:23'),
(119, 2, 'rrolyh', '1e5b6616ba4026f89404e4f61818f03d', 'jfeldfisherh@forbes.com', NULL, '2016-12-01 23:01:36'),
(120, 2, 'gpecketti', '09b9c8f95f36855f71f1ff4445182381', 'smccullochi@biglobe.ne.jp', NULL, '2017-01-01 23:01:58'),
(121, 2, 'ckenewellj', '93c79bdb08ac475c13d124293a84c186', 'dfolkerj@ehow.com', NULL, '2016-09-28 14:27:48'),
(122, 2, 'vlugsdink', 'cd571dda15f9044154e9e0cf3f670a65', 'lbroadfieldk@tinypic.com', NULL, '2016-06-12 19:06:41'),
(123, 2, 'dishaml', '109829971d232df61053b3320e172bc1', 'hschistll@hostgator.com', NULL, '2017-03-05 11:22:37'),
(124, 2, 'cveryanm', 'eaab465f34ed88656155492256f556ba', 'spitceathlym@cargocollective.com', NULL, '2016-08-14 00:31:30'),
(125, 2, 'bconeybearen', '40bbb12406848208929faa72cecf7406', 'mcoppon@youku.com', NULL, '2017-01-07 08:26:17'),
(126, 2, 'sgerblo', '73c685a3454b9f8ddae4c67ddab7e329', 'dsilversmidto@prweb.com', NULL, '2017-05-06 04:48:47'),
(127, 2, 'ereesonp', 'e9b3feac74611d9c0d5c8dbb6e6d1a19', 'chealksp@nba.com', NULL, '2016-08-19 00:01:13'),
(128, 2, 'ogreastyq', '036d471434739dc2c183cc3f3ba64f2f', 'ltomblesonq@smh.com.au', NULL, '2016-09-06 11:22:32'),
(129, 2, 'maltamiranor', '7fa80d119f1df7294f4246a5c792e6c4', 'mdukesburyr@yolasite.com', NULL, '2016-07-26 10:03:58'),
(130, 2, 'sburgwyns', '14ce0794d409ceb1d43d9bc284311809', 'kfossetts@wordpress.com', NULL, '2017-02-12 19:55:04'),
(131, 2, 'dcominot', 'd9a8195855d77c8b13b59d3b7fb2c83c', 'aniset@hp.com', NULL, '2016-11-14 03:20:33'),
(132, 2, 'erisbridgeru', 'e472d1b7c48a00f6a67062216405fc99', 'grealyu@technorati.com', NULL, '2017-02-21 05:28:31'),
(133, 2, 'jpendryv', '3d783398b1c6747ec0f3cbbf5491ab84', 'bwarlowv@angelfire.com', NULL, '2016-11-05 08:12:58'),
(134, 2, 'bmeecherw', '4674d8aaa525fcb8f0fbf7fabc4de33a', 'jpinnellw@xing.com', NULL, '2017-02-01 04:30:49'),
(135, 2, 'kabraminox', '0bad74859b17d89c23714c5f4a98535b', 'oleallx@squidoo.com', NULL, '2017-01-16 16:07:54'),
(136, 1, 'tbarrelly', 'a27d7184e1a029ea137e43c40d934f0f', 'dhuntlyy@parallels.com', NULL, '2017-01-06 00:01:01'),
(137, 2, 'wcosseyz', '5c2035f3abe6ae86c52b8f7defbda0e3', 'ngallegosz@people.com.cn', NULL, '2016-12-01 15:24:49'),
(138, 2, 'agreneham10', '5dae9cf48b31b47a3cf1f2e849e41ff1', 'facres10@cnn.com', NULL, '2016-06-23 08:51:13'),
(139, 2, 'acorck11', 'c6396450184d062e80b48bef2b354097', 'ajanouch11@deliciousdays.com', NULL, '2017-02-07 22:33:00'),
(140, 2, 'mgebbe12', 'a629315a1c1d0719b01cdf5107c3de22', 'hmacard12@lulu.com', NULL, '2016-10-05 09:40:22'),
(141, 2, 'ssheron13', '36840f56d09b3a25c8d2405c32a410cd', 'amalam13@eventbrite.com', NULL, '2017-06-05 15:44:21'),
(142, 2, 'ckohrt14', '80671fadb32a74c1f737c94f9ef445ef', 'kpyke14@parallels.com', NULL, '2016-10-01 12:27:24'),
(143, 2, 'mrustan15', '5d52af602fe39242657e7475cf99b388', 'sclaricoats15@is.gd', NULL, '2016-11-23 05:49:15'),
(144, 2, 'ttrembath16', 'bd47392a0d8e490410255cf7e3d6dd24', 'tgrierson16@whitehouse.gov', NULL, '2016-11-20 10:27:14'),
(145, 2, 'dlightman17', 'f7f919a208e3a5ae99bb2a686dc153e1', 'rruffli17@huffingtonpost.com', NULL, '2016-10-31 19:28:51'),
(146, 2, 'omayhow18', 'eb363a0a8c6b4a00aced4127baf9ebc3', 'gflowerden18@about.com', NULL, '2016-10-16 06:41:09'),
(147, 2, 'gphython19', '17a962f57665707ea0f20d94347baab2', 'nferrer19@xrea.com', NULL, '2017-03-09 14:06:47'),
(149, 2, 'ngozzett1b', '2b1f4be5947b260ad4b4c24360de8d31', 'lcardoo1b@globo.com', NULL, '2016-06-10 07:51:13'),
(150, 2, 'bmasser1c', 'a400732c66f453625eee589e41cae17b', 'bhordell1c@yelp.com', NULL, '2016-11-23 00:47:37'),
(151, 2, 'jharefoot1d', '5db736f99e9ceea0af77ee8e3ff3e73b', 'emcgarrie1d@harvard.edu', NULL, '2017-05-12 12:52:47'),
(152, 1, 'user', '$2y$10$dbcESVb5zZAT4WwTA/09JedaK3/HoHiTPO4vxmpfEET6svte0BRaK', 'user@user.com', NULL, '2017-06-06 13:51:40'),
(153, 2, 'athlete', '$2y$10$5uQe5LRsPTkzaoE.sZgwPOug0Ax/oXqCrEW21ybIZ0XVkyyydD7fW', 'athlete@athlete.com', NULL, '2017-06-06 13:52:23'),
(154, 1, 'sarahTisse', '$2y$10$ESBHfTZhokxuR6SvmJSQoOrGGZcb/obd1uPv2vRYF5SlXzXKS7DdC', 'sara@hotmail.com', NULL, '2017-07-18 18:43:33');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_athlete`
--
ALTER TABLE `category_athlete`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`localite_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `catgory_id` (`category_id`);

--
-- Index pour la table `epreuves`
--
ALTER TABLE `epreuves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localite_id` (`localite_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `localites`
--
ALTER TABLE `localites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `athlete_id` (`athlete_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `epreuve_id` (`epreuve_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_role` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `category_athlete`
--
ALTER TABLE `category_athlete`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `epreuves`
--
ALTER TABLE `epreuves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `localites`
--
ALTER TABLE `localites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=155;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `athletes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `athletes_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `athletes_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category_athlete` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`localite_id`) REFERENCES `localites` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_athlete` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`localite_id`) REFERENCES `localites` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuves` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
