

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `department`
--
CREATE DATABASE `department` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `department`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` longtext NOT NULL,
  `rollno` mediumtext NOT NULL,
  `regno` int(11) NOT NULL,
  `dname` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sname`, `rollno`, `regno`, `dname`) VALUES
(32, 'Anil Magar', 'BIT-07-45', 2147483647, 'Information Technology'),
