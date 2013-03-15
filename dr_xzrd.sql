--
-- Create schema dr_xzrd
--

CREATE DATABASE IF NOT EXISTS dr_xzrd;
USE dr_xzrd;

--
-- Definition of table `dr_xzrd`.`dr_admin`
--

DROP TABLE IF EXISTS `dr_xzrd`.`dr_admin`;
CREATE TABLE  `dr_xzrd`.`dr_admin` (
  `usr` varchar(20) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='administrator';

--
-- Dumping data for table `dr_xzrd`.`dr_admin`
--

LOCK TABLES `dr_admin` WRITE;
UNLOCK TABLES;

--
-- Definition of table `dr_xzrd`.`dr_faq`
--

DROP TABLE IF EXISTS `dr_xzrd`.`dr_faq`;
CREATE TABLE  `dr_xzrd`.`dr_faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_bin NOT NULL,
  `answer` text COLLATE utf8_bin NOT NULL,
  `thedate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='faq';

--
-- Dumping data for table `dr_xzrd`.`dr_faq`
--

LOCK TABLES `dr_faq` WRITE;
UNLOCK TABLES;

--
-- Definition of table `dr_xzrd`.`dr_hunter`
--

DROP TABLE IF EXISTS `dr_xzrd`.`dr_hunter`;
CREATE TABLE  `dr_xzrd`.`dr_hunter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `conditions` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='job offer';

--
-- Dumping data for table `dr_xzrd`.`dr_hunter`
--

LOCK TABLES `dr_hunter` WRITE;
UNLOCK TABLES;


--
-- Definition of table `dr_xzrd`.`dr_profile`
--

DROP TABLE IF EXISTS `dr_xzrd`.`dr_profile`;
CREATE TABLE  `dr_xzrd`.`dr_profile` (
  `content` text NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `fax` varchar(20) COLLATE utf8_bin NOT NULL,
  `code` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='company profile';

--
-- Dumping data for table `dr_xzrd`.`dr_profile`
--

LOCK TABLES `dr_profile` WRITE;
UNLOCK TABLES;

--
-- Definition of table `dr_xzrd`.`dr_project`
--

DROP TABLE IF EXISTS `dr_xzrd`.`dr_project`;
CREATE TABLE  `dr_xzrd`.`dr_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='projects';

--
-- Dumping data for table `dr_xzrd`.`dr_project`
--

LOCK TABLES `dr_project` WRITE;
UNLOCK TABLES;
