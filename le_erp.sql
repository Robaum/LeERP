-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2012 at 11:35 AM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `le_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `picture` varchar(600) NOT NULL,
  `resume` varchar(600) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `position_to_reach` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `picture` varchar(600) NOT NULL,
  `resume` varchar(600) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `position` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `f_name`, `l_name`, `picture`, `resume`, `phone`, `twitter`, `email`, `position`, `date`) VALUES
(8, 'Noe', 'Rodriguez Castro', './uploads/1338488951749foto.png', './uploads/1338488951749CV-Noe.pdf', '5510794562', '@noahrod', 'lahipaloca@gmail.com', 1, '2012-06-01 19:04:50'),
(12, 'Jean Paul', 'Karty Mundo', './uploads/1338481843164577174_4095176657972_444369819_n.jpg', './uploads/1338481843164Proyecto .pdf', '9811544744', '@jpkarty', 'jpkarty@gmail.com', 5, '2012-06-01 23:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `info_jobs`
--

CREATE TABLE IF NOT EXISTS `info_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_structure` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `info_jobs`
--

INSERT INTO `info_jobs` (`id`, `id_structure`, `id_employee`) VALUES
(2, 1, 8),
(6, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jt`
--

CREATE TABLE IF NOT EXISTS `jt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_structure` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `notes` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jt`
--

INSERT INTO `jt` (`id`, `id_structure`, `description`, `notes`) VALUES
(1, 1, 'Jefe de la empresa.', 'Es el encargado de que todo funcione correctamente'),
(2, 12, 'Se requiere algo', 'No menores de 22 a&ntilde;os'),
(3, 4, 'Mano derecha del director.', 'Diputado , antes de que llegue la informacion al jefe , pasa por el.'),
(4, 46, 'Head of Office Administration', 'Head of Office AdministrationHead of Office Administration'),
(5, 5, 'Jefe tecnico de el software usado en la empresa', 'Temporal por 6 meses'),
(6, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.'),
(7, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.'),
(8, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.'),
(9, 44, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget porta turpis. Vestibulum et dui tellus, et semper ante. Proin non lobortis risus. Aenean scelerisque molestie magna, facilisis aliquam nibh molestie ut. Mauris in mi sit amet magna eleifend pretium et at felis. Pellentesque scelerisque porta sapien, ac rutrum leo blandit non. Phasellus velit mi, fringilla ut ultrices eu, mattis at enim. Vestibulum et velit felis, quis lacinia enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus non diam arcu, at ultricies odio. Praesent tempor iaculis eros, et dignissim sapien malesuada id. Suspendisse molestie adipiscing justo, adipiscing bibendum enim interdum eu. Morbi interdum, lectus quis accumsan scelerisque, massa mi cursus urna, eu ornare quam dui ac eros. Sed est odio, ultricies malesuada fringilla nec, dignissim at nisi. Integer eu mi neque. Pellentesque eget dui lectus.'),
(10, 11, 'Este hace algo', 'Bla');

-- --------------------------------------------------------

--
-- Table structure for table `monitoreo`
--

CREATE TABLE IF NOT EXISTS `monitoreo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `notes` longtext NOT NULL,
  `i_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `monitoreo`
--

INSERT INTO `monitoreo` (`id`, `candidate_id`, `notes`, `i_date`) VALUES
(1, 2, 'Esta bien cabron el vato!', '2012-06-01 18:27:35'),
(2, 2, 'No neta, se la rifa mamalon!', '2012-06-01 18:28:26'),
(3, 4, 'Pues no mas no', '2012-06-01 18:28:43'),
(4, 4, 'Bueno, igual y si', '2012-06-01 18:28:54'),
(5, 2, 'Sigamos probando!', '2012-06-01 18:47:33'),
(6, 3, 'Increible, se merece el puesto, el sueldo que pide es el indicado, cheque en blanco.', '2012-06-01 18:52:40'),
(7, 3, 'Lo que sea', '2012-06-01 18:52:54'),
(8, 6, 'No no la rifa, sorry', '2012-06-01 22:05:08'),
(9, 6, 'no, no mas no', '2012-06-01 22:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `punchs`
--

CREATE TABLE IF NOT EXISTS `punchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `punchs`
--

INSERT INTO `punchs` (`id`, `lat`, `long`, `number`, `time`) VALUES
(12, '19.35232615', '-99.06110282499999', '5510794562', '2012-06-02 16:19:08'),
(13, '19.37418', '-99.18299', '9811544744', '2012-06-02 16:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE IF NOT EXISTS `structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posicion` varchar(200) NOT NULL,
  `jefe` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`id`, `posicion`, `jefe`) VALUES
(1, 'Executive Director', ''),
(4, 'Deputy Director', 'Executive Director'),
(5, 'Chief Technical Officer', 'Deputy Director'),
(6, 'Chief Community Officer', 'Deputy Director'),
(7, 'Chief Global Development Officer', 'Deputy Director'),
(8, 'Chief Human Resources Officer', 'Deputy Director'),
(9, 'Chief Financial & Operating Officer', 'Deputy Director'),
(10, 'Executive Assistant', 'Deputy Director'),
(11, 'IT Manager', 'Chief Technical Officer'),
(12, 'Senior Product Manager', 'Chief Technical Officer'),
(13, 'Software Developer', 'Chief Technical Officer'),
(14, 'Researcher - UX', 'Chief Technical Officer'),
(15, 'Networking Coordinator', 'Chief Technical Officer'),
(16, 'Lead Front-End Developer - UX', 'Chief Technical Officer'),
(17, 'Code Maintenance Enginner', 'Chief Technical Officer'),
(18, 'Software Developer - UX', 'Chief Technical Officer'),
(19, 'System Administrator', 'Chief Technical Officer'),
(20, 'Product Manager-Multimedia Usability', 'Chief Technical Officer'),
(21, 'Software Developer & Office IT Support', 'Chief Technical Officer'),
(22, 'Software Developer - Multimedia Usability', 'Chief Technical Officer'),
(23, 'Engineering Program Manager', 'Chief Technical Officer'),
(24, 'Data Analyst', 'Chief Technical Officer'),
(25, 'Software Developer - Fundraising', 'Engineering Program Manager'),
(26, 'Software Developer - Mobile', 'Engineering Program Manager'),
(27, 'Head Of Community Giving', 'Chief Community Officer'),
(28, 'Head of Partnerships & Foundation Relations', 'Chief Community Officer'),
(29, 'Head of Major Gifts', 'Chief Community Officer'),
(30, 'Head of Public Outreach', 'Chief Community Officer'),
(31, 'Head of Reader Relations', 'Chief Community Officer'),
(32, 'Volunteer Coordinator', 'Chief Community Officer'),
(33, 'Stewardship Associate', 'Head Of Community Giving'),
(34, 'Development Associate', 'Head Of Community Giving'),
(35, 'Education Programs Manager', 'Head of Public Outreach'),
(36, 'Outreach Officer', 'Head of Public Outreach'),
(37, 'Project Manager - Bookshelf', 'Head of Public Outreach'),
(38, 'Head of Communications', 'Chief Global Development Officer'),
(39, 'Head of Business Development', 'Chief Global Development Officer'),
(40, 'Communications Officer', 'Head of Communications'),
(41, 'Human Resources Manager', 'Chief Human Resources Officer'),
(42, 'Accounting Manager & Financial Analyst', 'Chief Financial & Operating Officer'),
(43, 'Head of Office Administration', 'Chief Financial & Operating Officer'),
(44, 'Accounting Specialist', 'Accounting Manager & Financial Analyst'),
(47, 'Office IT Manager', 'Head of Office Administration'),
(49, 'Software Analysis', 'Chief Technical Officer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `rol`) VALUES
(1, 'General Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
