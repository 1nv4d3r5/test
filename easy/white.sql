-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 11:52 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `white`
--

-- --------------------------------------------------------

--
-- Table structure for table `lne_addons`
--

CREATE TABLE IF NOT EXISTS `lne_addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `aname` varchar(20) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `adminlevel` int(11) DEFAULT NULL,
  `header` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lne_addons`
--

INSERT INTO `lne_addons` (`id`, `name`, `fname`, `aname`, `active`, `adminlevel`, `header`) VALUES
(1, 'links', 'links', 'alinks', 1, 4, 0),
(2, 'downloads', 'downloads', 'adownloads', 1, 4, 0),
(3, 'uploads', 'uploads', 'auploads', 1, 2, 0),
(4, 'contact', 'contact', NULL, 1, 1, 1),
(5, 'news', 'shownews', 'adminnews', 1, 4, 1),
(6, 'lastnews', 'lastnews', NULL, 1, 1, 1),
(7, 'gallery', 'galery', 'images', 1, 4, 1),
(8, 'mp3', 'mp3', NULL, 1, 1, 0),
(9, 'videoy', 'youtube', NULL, 1, 1, 0),
(10, 'videog', 'googlev', NULL, 1, 1, 0),
(11, 'wrapper', 'iframe', NULL, 1, 1, 1),
(12, 'lyteframe', 'lyteframe', NULL, 1, 1, 1),
(13, 'survey', 'survey', 'asurvey', 1, 4, 1),
(14, 'dropdown', 'dropdownmenu', 'adropdown', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lne_bannedips`
--

CREATE TABLE IF NOT EXISTS `lne_bannedips` (
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lne_bannedips`
--


-- --------------------------------------------------------

--
-- Table structure for table `lne_comments`
--

CREATE TABLE IF NOT EXISTS `lne_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsid` int(11) NOT NULL,
  `poster` varchar(30) NOT NULL,
  `postermail` varchar(40) DEFAULT NULL,
  `time` varchar(10) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lne_comments`
--

INSERT INTO `lne_comments` (`id`, `newsid`, `poster`, `postermail`, `time`, `text`) VALUES
(1, 1, ' admin', '', '1371462340', 'djvkdsjhdfdfdsfdf');

-- --------------------------------------------------------

--
-- Table structure for table `lne_downloads`
--

CREATE TABLE IF NOT EXISTS `lne_downloads` (
  `reg` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `file` varchar(40) NOT NULL,
  `downloads` int(11) NOT NULL,
  `ex` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lne_downloads`
--


-- --------------------------------------------------------

--
-- Table structure for table `lne_downloadscat`
--

CREATE TABLE IF NOT EXISTS `lne_downloadscat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lne_downloadscat`
--

INSERT INTO `lne_downloadscat` (`id`, `nome`, `descr`) VALUES
(1, 'Downloads', 'Downloads'),
(2, 'Uploads', 'Users upload here');

-- --------------------------------------------------------

--
-- Table structure for table `lne_extras`
--

CREATE TABLE IF NOT EXISTS `lne_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lne_extras`
--

INSERT INTO `lne_extras` (`id`, `content`) VALUES
(1, '&lt;h1&gt;Extra Content&lt;/h1&gt;&lt;p&gt;This is an extra content you can include in all your pages&lt;/p&gt;&lt;p&gt;This is good for announcements, for instance.&lt;/p&gt;&lt;p&gt;You can edit it from the settings menu&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `lne_images`
--

CREATE TABLE IF NOT EXISTS `lne_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lne_images`
--

INSERT INTO `lne_images` (`id`, `file`, `name`) VALUES
(1, 'pgzoom_1.jpg', 'A kid impersonating as the Sun'),
(2, 'pgzoom_5.jpg', 'Rafting'),
(3, 'pgzoom_13.jpg', 'School kid');

-- --------------------------------------------------------

--
-- Table structure for table `lne_links`
--

CREATE TABLE IF NOT EXISTS `lne_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lne_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `lne_linkscat`
--

CREATE TABLE IF NOT EXISTS `lne_linkscat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lne_linkscat`
--

INSERT INTO `lne_linkscat` (`id`, `nome`, `descr`) VALUES
(1, 'Links', 'Links');

-- --------------------------------------------------------

--
-- Table structure for table `lne_menu`
--

CREATE TABLE IF NOT EXISTS `lne_menu` (
  `m1` int(11) NOT NULL,
  `m2` int(11) DEFAULT NULL,
  `m3` int(11) DEFAULT NULL,
  `page` varchar(40) NOT NULL,
  `nome` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lne_menu`
--

INSERT INTO `lne_menu` (`m1`, `m2`, `m3`, `page`, `nome`) VALUES
(1, 0, 0, 'index', 'Home'),
(8, 0, 0, 'gallery', 'Gallery'),
(5, 0, 0, 'news', 'News'),
(2, 0, 0, 'about-us', 'About Us'),
(3, 0, 0, 'admissions', 'Admission'),
(7, 0, 0, 'career', 'Career'),
(9, 0, 0, 'contact-us', 'Contact Us');

-- --------------------------------------------------------

--
-- Table structure for table `lne_newscat`
--

CREATE TABLE IF NOT EXISTS `lne_newscat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lne_newscat`
--

INSERT INTO `lne_newscat` (`id`, `nome`, `descr`) VALUES
(2, 'Test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `lne_noticias`
--

CREATE TABLE IF NOT EXISTS `lne_noticias` (
  `reg` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `titulo` varchar(60) NOT NULL,
  `noticia` text NOT NULL,
  `data` varchar(10) NOT NULL,
  `visto` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`reg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lne_noticias`
--

INSERT INTO `lne_noticias` (`reg`, `autor`, `email`, `titulo`, `noticia`, `data`, `visto`, `cat`) VALUES
(1, 'Fernbap', 'my@email.com', 'News Title', '&lt;p&gt;This is some example news.&lt;/p&gt; &lt;p&gt;You can edit/delete this news and enter your own news.&lt;/p&gt;', '1371456351', 31, 0),
(2, 'admin', 'admin@news.co.uk', 'test', '', '1371798180', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lne_paginas`
--

CREATE TABLE IF NOT EXISTS `lne_paginas` (
  `m1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `content` text,
  `description` text,
  `template` varchar(30) DEFAULT NULL,
  `restricted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lne_paginas`
--

INSERT INTO `lne_paginas` (`m1`, `m2`, `m3`, `page`, `nome`, `content`, `description`, `template`, `restricted`) VALUES
(1, 0, 1, 'index', 'Home', '&lt;div id=&quot;column&quot;&gt;\r\n&lt;div class=&quot;colone&quot;&gt;\r\n&lt;p&gt;Smart Academy is an  educational community where students and staff of various nationalities  and background live, study and work together in a congenial atmosphere.&lt;/p&gt;\r\n&lt;p&gt;Smart Academy was founded in 1980 by founder Principal, Mr. Sujan Rana. It is a  co-educational institution and caters to the educational needs of boys  and girls from Class Nursery to &lt;br /&gt;\r\nClass 12.&lt;/p&gt;\r\n&lt;p&gt;Smart Academy started in 1980 in a tenement house with only nine students and  two teachers. Today, however, this humble beginning has faded away in  the tide of time and a colossal Smart Academy has taken its place with a  phenomenal growth. Smart Academy is one of the largest schools in the valley  with over 3296 students and 400 efficient staff.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;input width=&quot;650&quot; type=&quot;image&quot; height=&quot;433&quot; align=&quot;middle&quot; src=&quot;/images/uploaded/sc-building-big.jpg&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The aim is to provide an all round education in which children are  prepared to face any crisis in life with moral dignity and to become  useful and loyal citizens of the country. This understanding is  reflected in the school motto: LOVE and SERVICE. Smart Academy seeks to prepare  a student, not merely to pass examinations or enter a profession, but  also aims at creating a tolerant, balanced, independent individual with  the right attitude of mind and spirit and a desire to help others. Its  special characteristic is the wide range of activities that it provides  with the idea of developing a full personality and to bring out the  talents of the students for their own benefit and that of society as a  whole. At Smart Academy, every student has the opportunity to participate in  all kinds of activities. That''s not something every school can provide.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;coltwo&quot;&gt;\r\n&lt;p&gt;Smart Academy is dedicated today, as it was in 1980,  to the principle that the future of humanity rests in the hands, hearts  and minds of those who will accept responsibility for themselves and  others in an increasingly diverse society. This principle of individual  and social responsibility is realized in the context of a distinctive  comprehensive experience which nurtures in our students the emergence  and development of skill, perspectives and ethics necessary to better  themselves and society.&lt;/p&gt;\r\n&lt;p&gt;We seek to involve our students in an active academic community which  cherishes diversity of thought and expression. In doing so, we will help  our students discover ways they can most effectively contribute to the  common good with love and service. The school does not subscribe to any  political ideology and discourages its students and members of the staff  from indulging in political activities inside the school premises.&lt;/p&gt;\r\n&lt;p&gt;The school discharges its social obligations by imparting value-based  education in tune with Nepalese culture and traditions. Though the  school does not propagate any particular religion, it encourages  students to respect all positive religions and to imbibe the best from  all religions.&lt;/p&gt;\r\n&lt;p&gt;The school believes that proper education can only be imparted to  children only when the School, the Home and the Society work in tandem  in a spirit of mutual respect. Any misgivings about the integrity of any  of these three agencies could seriously damage the delicate  relationship between three agencies of education.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 'admintemplate', 0),
(4, 0, 1, 'admissiona', 'Admissions', '&lt;h2 class=&quot;LNE_title&quot;&gt;Admissions&lt;/h2&gt;', 'Admissions page', '', 0),
(1, 1, 1, 'home1', 'Home Submenu', '&lt;h2 class=&quot;LNE_title&quot;&gt;Home Submenu&lt;/h2&gt;&lt;p&gt;This is a subpage of Home page, just so that you can look at the menu structure.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt; ', NULL, NULL, 0),
(1, 1, 1, 'home2', 'Home Sub-submenu', '&lt;h2 class=&quot;LNE_title&quot;&gt;Home Sub-submenu&lt;/h2&gt;&lt;p&gt;Yes, you can make sub-subpages.&amp;nbsp;&lt;/p&gt; ', NULL, NULL, 0),
(2, 0, 1, 'about', 'About', '&lt;h2 class=&quot;LNE_title&quot;&gt;LightNEasy runs anywhere&lt;/h2&gt;&lt;p&gt;LightNEasy doesn''t require any fancy server stuff, just pure PHP, so will run smoothly in any web host, including most of the free ones. And yes, it works with PHP safe mode on. As SQLite is a standard feature supported by PHP5, and included also in many PHP4 webservers, LightNEasy uses SQLite for its own SQL database, or MySQL, if your server has MySQL. &lt;/p&gt;&lt;h3&gt;FCK WYSIWYG editor&lt;/h3&gt;&lt;p align=&quot;justify&quot;&gt;LighNEasy was built around the excelent open source online editor &lt;a href=&quot;http://fckeditor.net&quot; target=&quot;_blank&quot; title=&quot;FCK Editor&quot;&gt;FCK Editor&lt;/a&gt;, whose work i thank and apreciate.&lt;/p&gt;&lt;p&gt;FCK is a javascript aplication so you need javascript enabled in your browser in order to edit the content in WYSIYG mode. You don''t need javascript, however, to run the website or LightNEasy.&lt;br /&gt; &lt;/p&gt;', NULL, NULL, 0),
(3, 0, 1, 'news', 'News', '&lt;h2 class=&quot;LNE_title&quot;&gt;News&lt;/h2&gt;\r\n&lt;div id=&quot;post-1757&quot; class=&quot;post&quot;&gt;\r\n&lt;h1&gt;Class 11 (HSEB) Entrance Results Published&lt;/h1&gt;\r\n&lt;div class=&quot;entry&quot;&gt;\r\n&lt;p&gt;Results of the entrance examinations held on 20 June 2013 for a  limited number of seats in class 11 (HSEB) at Smart Academy are published. Please  click&amp;nbsp;&lt;a href=&quot;http://results.hseb.edu.np&quot;&gt;Class 11Entrance  Results&lt;/a&gt; or go to ADMISSION RESULTS page to view the results.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', '', 0),
(5, 0, 1, 'career', 'Career', '&lt;h2 class=&quot;LNE_title&quot;&gt;Career&lt;/h2&gt;\r\n&lt;p align=&quot;center&quot;&gt;&lt;strong&gt;CAREER OPPORTUNITY WITH&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;Smart Academy&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;P O Box 1018, Kathmandu&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;&lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;BOTANY TEACHER WANTED&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Smart Academy, the national school of Nepal, requires an experienced and dynamic teacher to teach &lt;strong&gt;Biology (Botany) &lt;/strong&gt;up to 10+2 and A &amp;ndash;level.&lt;/p&gt;\r\n&lt;p&gt;The candidates should possess the Masters&amp;rsquo; Degree in Botany. They  should also have a B.Ed. or equivalent Degree in education. Experience  of teaching Cambridge Advanced Level will be an added advantage.&lt;/p&gt;\r\n&lt;p&gt;Interested candidates should apply to the Principal with a hand  written cover letter and along with the completed Application Form by 05  June 2013 ( 22 Jestha 2070). The Application Form can be collected from  the school or can be downloaded from &lt;a href=&quot;/images/uploaded/file/downloads/teacherform.doc&quot;&gt;&lt;strong&gt;here&lt;/strong&gt;.&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;The salary and other benefits will be as per the rules of the school.  The school rule has the provision for taking into account the  candidate&amp;rsquo;s experience and qualifications.&lt;/p&gt;\r\n&lt;p&gt;Principal&lt;/p&gt;', 'career', '', 0),
(6, 0, 1, 'contact-us', 'Contact Us', '&lt;h2 class=&quot;LNE_title&quot;&gt;Contact Us&lt;/h2&gt;\r\n\r\n&lt;!-- Do not change the code! --&gt;\r\n&lt;a id=&quot;foxyform_embed_link_438792&quot; href=&quot;http://www.foxyform.com/&quot;&gt;foxyform&lt;/a&gt;\r\n&lt;script type=&quot;text/javascript&quot;&gt;\r\n(function(d, t){\r\n   var g = d.createElement(t),\r\n       s = d.getElementsByTagName(t)[0];\r\n   g.src = &quot;http://www.foxyform.com/js.php?id=438792&amp;sec_hash=20c3a10ec94&amp;width=350px&quot;;\r\n   s.parentNode.insertBefore(g, s);\r\n}(document, &quot;script&quot;));\r\n&lt;/script&gt;\r\n&lt;!-- Do not change the code! --&gt;', 'contact page', '', 0),
(6, 0, 1, 'gallery', 'Gallery', '&lt;h2 class=&quot;LNE_title&quot;&gt;Gallery&lt;/h2&gt;\r\n&lt;p&gt;&lt;embed width=&quot;700&quot; height=&quot;600&quot; menu=&quot;true&quot; loop=&quot;true&quot; play=&quot;true&quot; src=&quot;/images/uploaded/flash/Slideshow1.swf&quot; pluginspage=&quot;http://www.macromedia.com/go/getflashplayer&quot; type=&quot;application/x-shockwave-flash&quot;&gt;&lt;/embed&gt;&lt;/p&gt;', 'gallery page', '', 0),
(2, 0, 1, 'about-us', 'About Us', '&lt;h2 class=&quot;LNE_title&quot; style=&quot;text-align: left;&quot;&gt;About Us&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;&amp;nbsp;The school is headed by the Principal who acts in accordance with the policies framed by a six member apex body called the Governing Body.&lt;/p&gt;\r\n&lt;div id=&quot;column&quot;&gt;\r\n&lt;div class=&quot;colone&quot;&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;The Principal has absolute authority as far management of school is concerned. The Principal appoints the staff, implements the examinations, supports the curriculum and ensures that the school responds effectively to what the parents and the society require of the school. The Principal helps the school maintain a disciplined, orderly atmosphere for teaching and learning.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;&lt;input width=&quot;650&quot; type=&quot;image&quot; height=&quot;433&quot; src=&quot;/images/uploaded/url(1).jpg&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;The Principal is assisted by Head Teachers in academic matters. The school is divided into different wings, such as Pre-School, Primary School, Junior School, Middle School, Secondary School and Higher Secondary School. Each wing has a separate Head Teacher. Besides the Head Teachers, there are Heads of the Science and Technology Department, the Arts, Culture and Sports Department and the Social Service Department.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;coltwo&quot;&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;The Maintenance Department, The Transport Department and the Hostels are supervised by competent In-Charges.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;The administrative staff look after the Accounts Department, and maintain records and documents. The school has various departments. There is a department for each subject taught in the school. All departments are headed by highly qualified and competent teachers.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;The classroom is congenial and democratic and the teachers are encouraged to adopt innovative methods of teaching to make learning meaningful and interesting.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;&amp;nbsp;&lt;/p&gt;', 'about the school', '', 0),
(3, 0, 1, 'admissions', 'Admission', '&lt;h2 class=&quot;LNE_title&quot;&gt;Admission&lt;/h2&gt;\r\n&lt;div id=&quot;column&quot;&gt;\r\n&lt;div class=&quot;colthree&quot;&gt;\r\n&lt;p&gt;Admission is considered on a prescribed Registration form which is attached to this prospectus The Official Application Form must be completed and registered by paying the registration fee. However, registration does not guarantee admission to school. Registration is followed by an Entrance Examination and an interview.&lt;/p&gt;\r\n&lt;strong&gt;To be eligible for admission the child''s age should be &lt;/strong&gt;\r\n&lt;table width=&quot;407&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td width=&quot;118&quot;&gt;2&amp;frac12; + years&lt;/td&gt;\r\n            &lt;td width=&quot;277&quot;&gt;For Class Nursery (Prep.I)&lt;/td&gt;\r\n        &lt;/tr&gt;\r\n        &lt;tr&gt;\r\n            &lt;td&gt;3&amp;frac12; + years&lt;/td&gt;\r\n            &lt;td&gt;For Class Lower KG. (Prep.II)&lt;/td&gt;\r\n        &lt;/tr&gt;\r\n        &lt;tr&gt;\r\n            &lt;td&gt;4&amp;frac12; + years&lt;/td&gt;\r\n            &lt;td&gt;For Class Upper KG.&lt;/td&gt;\r\n        &lt;/tr&gt;\r\n        &lt;tr&gt;\r\n            &lt;td&gt;5&amp;frac12; + years&lt;/td&gt;\r\n            &lt;td&gt;For Class I and so on.&lt;/td&gt;\r\n        &lt;/tr&gt;\r\n    &lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br /&gt;\r\n&lt;p&gt;Students must have passed the class immediately below the one for which admission is sought. This, however, does not apply to those seeking admission to the Nursery class or (Prep.I)&lt;/p&gt;\r\n&lt;p&gt;Admission will be confirmed only after the selected child''s fees and other charges have been paid within the stipulated time, and acknowledged.&lt;/p&gt;\r\n&lt;p&gt;For a child who has been to school previously and is attending this school for the first time, a transfer certificate from the previous school must be furnished before joining school.&lt;/p&gt;\r\n&lt;p&gt;Admission is granted on the basis of the results of these examinations and also on the number of seats available in each class. Admission is made on the basis of entrance tests and interviews. The school reserves the right to admit or reject any application for admission without assigning any reason.&lt;/p&gt;\r\n&lt;p&gt;Registration forms and the prospectus are available at the school office.&lt;/p&gt;\r\n&lt;p&gt;The school has also a provision for on-the-spot admission for the students of classes Nursery to 2 . If a child fulfils the requirements of the school, the child can be admitted on the very day their parents/guardians fill up the Registration Form. Should the Admission Officer be preoccupied on a particular day, the child can be admitted on the day convenient to both the parents/guardians as well as the Admission Office.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', 'admissions', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lne_settings`
--

CREATE TABLE IF NOT EXISTS `lne_settings` (
  `password` varchar(40) NOT NULL,
  `homepath` varchar(60) NOT NULL,
  `template` varchar(20) NOT NULL,
  `title` varchar(40) NOT NULL,
  `subtitle` varchar(60) NOT NULL,
  `keywords` varchar(120) NOT NULL,
  `description` varchar(120) NOT NULL,
  `author` varchar(30) NOT NULL,
  `footer` varchar(120) NOT NULL,
  `openfield` varchar(4) NOT NULL,
  `closefield` varchar(4) NOT NULL,
  `gzip` int(11) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `indexfile` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `wemail` varchar(40) DEFAULT NULL,
  `language` varchar(10) NOT NULL,
  `langeditor` varchar(4) NOT NULL,
  `timeoffset` int(11) NOT NULL,
  `restricted` varchar(40) DEFAULT NULL,
  `dateformat` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lne_settings`
--

INSERT INTO `lne_settings` (`password`, `homepath`, `template`, `title`, `subtitle`, `keywords`, `description`, `author`, `footer`, `openfield`, `closefield`, `gzip`, `extension`, `indexfile`, `email`, `admin`, `wemail`, `language`, `langeditor`, `timeoffset`, `restricted`, `dateformat`) VALUES
('d033e22ae348aeb5660fc2140aec35850c4da997', './', 'admintemplate', 'Smart Academy', 'Center of Excellence', 'Smart Academy', 'smart academy,center of excellence\r\n', 'Deepika K.C.', 'Powered by Deepika K.C. ', '$#', '#$', 1, '1', 'main.php', 'admin@smartacademy.edu.np', 'admin', '', 'en_US', 'en', 0, NULL, '%m/%d/%y - %I:%M %p');

-- --------------------------------------------------------

--
-- Table structure for table `lne_surveynames`
--

CREATE TABLE IF NOT EXISTS `lne_surveynames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surveyid` int(11) NOT NULL,
  `surveyname` varchar(80) DEFAULT NULL,
  `place` int(11) NOT NULL,
  `adminlevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lne_surveynames`
--


-- --------------------------------------------------------

--
-- Table structure for table `lne_surveyvotes`
--

CREATE TABLE IF NOT EXISTS `lne_surveyvotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surveyid` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `voterid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lne_surveyvotes`
--


-- --------------------------------------------------------

--
-- Table structure for table `lne_users`
--

CREATE TABLE IF NOT EXISTS `lne_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handle` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `adminlevel` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `datejoined` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lne_users`
--

INSERT INTO `lne_users` (`id`, `handle`, `password`, `adminlevel`, `ip`, `datejoined`, `email`, `firstname`, `lastname`, `website`, `location`) VALUES
(1, 'admin', '6c55803d6f1d7a177a0db3eb4b343b0d50f9c111', 5, '::1', '1371456351', 'admin@smartacademy.edu.np', '', '', '', ''),
(2, 'new', '6c55803d6f1d7a177a0db3eb4b343b0d50f9c111', 2, '::1', '1371829864', 'a@a.com', 'New', 'Student', './new', 'Lalitpur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
