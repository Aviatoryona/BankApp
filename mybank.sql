-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mybank
DROP DATABASE IF EXISTS `mybank`;
CREATE DATABASE IF NOT EXISTS `mybank` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mybank`;

-- Dumping structure for table mybank.accounttypes
DROP TABLE IF EXISTS `accounttypes`;
CREATE TABLE IF NOT EXISTS `accounttypes` (
  `accid` int(11) NOT NULL AUTO_INCREMENT,
  `accdate` datetime NOT NULL,
  `accdescription` longtext NOT NULL,
  `accmaxbal` double NOT NULL,
  `accminbal` double NOT NULL,
  `acctype` varchar(255) NOT NULL,
  PRIMARY KEY (`accid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.accounttypes: 5 rows
DELETE FROM `accounttypes`;
/*!40000 ALTER TABLE `accounttypes` DISABLE KEYS */;
INSERT INTO `accounttypes` (`accid`, `accdate`, `accdescription`, `accmaxbal`, `accminbal`, `acctype`) VALUES
	(1, '2020-09-02 16:26:44', '', 0, 0, 'Fixed Account'),
	(2, '2020-09-02 16:26:44', '', 0, 0, 'Savings Account'),
	(3, '2020-09-02 16:26:44', '', 0, 0, 'Children Saving Account'),
	(4, '2020-09-02 16:26:44', '', 0, 0, 'Personal Account'),
	(5, '2020-09-02 16:26:44', '', 0, 0, 'Joint Account');
/*!40000 ALTER TABLE `accounttypes` ENABLE KEYS */;

-- Dumping structure for table mybank.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `ctry_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctry_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ctry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.countries: 10 rows
DELETE FROM `countries`;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`ctry_id`, `ctry_name`) VALUES
	(5, 'Burundi'),
	(8, 'Ethiopia'),
	(1, 'Kenya'),
	(4, 'Rwanda'),
	(7, 'S.Sudan'),
	(6, 'Somali'),
	(9, 'Sudan'),
	(3, 'Tanzania'),
	(2, 'Uganda'),
	(10, 'Zambia');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table mybank.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctDate` datetime DEFAULT NULL,
  `ct_email` varchar(255) DEFAULT NULL,
  `ct_fname` varchar(255) DEFAULT NULL,
  `ct_lname` varchar(255) DEFAULT NULL,
  `ct_phone` varchar(255) DEFAULT NULL,
  `ct_pic` varchar(255) DEFAULT NULL,
  `ct_accbalance` bigint(20) DEFAULT NULL,
  `ct_accesscode` varchar(255) DEFAULT NULL,
  `ct_accountnumber` varchar(255) DEFAULT NULL,
  `ct_accounttype` varchar(255) DEFAULT NULL,
  `ct_address` varchar(255) DEFAULT NULL,
  `ct_city` varchar(255) DEFAULT NULL,
  `ct_country` varchar(255) DEFAULT NULL,
  `ct_gender` varchar(255) DEFAULT NULL,
  `ct_nextkin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.customers: 4 rows
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`ct_id`, `ctDate`, `ct_email`, `ct_fname`, `ct_lname`, `ct_phone`, `ct_pic`, `ct_accbalance`, `ct_accesscode`, `ct_accountnumber`, `ct_accounttype`, `ct_address`, `ct_city`, `ct_country`, `ct_gender`, `ct_nextkin`) VALUES
	(1, '2020-08-21 00:37:11', 'av@gmail.com', 'Someone', 'Aviator', ' 254701953920', NULL, 14900, '$ObCwVp9', '15979594318459446', 'Fixed Account', '80100, Nairobi', 'Nairobi', 'Kenya', 'M', NULL),
	(2, '2020-09-03 12:18:43', 'rvp@arsenal.com', 'Robin Van', 'Persie', '25579539207', NULL, 0, '3pBpDumr', '15991247233803622', 'Savings Account', '661, 8900', 'Nairobi', 'Kenya', 'M', NULL),
	(3, '2020-09-04 08:53:06', 'cena@cena.com', 'Jon', 'Cena', '253770587810', NULL, 40930, 'A9WmcVPo', '15991987861926112', 'Personal Account', '1788, 90000', 'Adis Ababa', 'Ethiopia', 'M', NULL),
	(4, '2020-09-10 18:28:55', 'c@c.com', 'jon', 'Cena', '243678909056', NULL, 219750, '123456', '2345678900', 'Personal Account', '100, 80100', 'Nairobi', 'Kenya', 'M', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table mybank.transactions
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_accountnumber` varchar(255) NOT NULL,
  `tr_amount` bigint(20) NOT NULL,
  `tr_charge` double NOT NULL,
  `tr_date` datetime NOT NULL DEFAULT current_timestamp(),
  `tr_type` varchar(255) NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.transactions: 18 rows
DELETE FROM `transactions`;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`tr_id`, `tr_accountnumber`, `tr_amount`, `tr_charge`, `tr_date`, `tr_type`) VALUES
	(1, '15979594318459446', 4000, 10, '2020-09-03 16:20:22', 'Deposit'),
	(2, '15979594318459446', 200, 50.5, '2020-09-03 16:34:59', 'Withdraw'),
	(3, '15979594318459446', 2000, 50.5, '2020-09-03 16:35:06', 'Withdraw'),
	(4, '15979594318459446', 40000, 10, '2020-09-03 16:40:28', 'Deposit'),
	(5, '15979594318459446', 1000, 50.5, '2020-09-03 17:42:46', 'Withdraw'),
	(6, '15979594318459446', 1000, 50.5, '2020-09-03 18:00:20', 'Withdraw'),
	(7, '15979594318459446', 2000, 10, '2020-09-03 18:46:58', 'Deposit'),
	(8, '15979594318459446', 2500, 10, '2020-09-03 18:50:31', 'Deposit'),
	(9, '15979594318459446', 1000, 10, '2020-09-03 18:52:55', 'Deposit'),
	(10, '15979594318459446', 1000, 10, '2020-09-03 18:54:27', 'Deposit'),
	(11, '15979594318459446', 1500, 50.5, '2020-09-03 18:57:33', 'Withdraw'),
	(12, '15979594318459446', 9790, 50.5, '2020-09-03 18:58:55', 'Withdraw'),
	(13, '15979594318459446', 25000, 50.5, '2020-09-03 19:03:56', 'Withdraw'),
	(14, '15991987861926112', 40000, 10, '2020-09-04 08:53:37', 'Deposit'),
	(15, '15991987861926112', 8000, 50.5, '2020-09-17 08:54:32', 'Withdraw'),
	(16, '15991987861926112', 9000, 10, '2020-09-17 08:56:13', 'Deposit'),
	(17, '2345678900', 211850, 50, '2020-09-24 18:35:47', 'Deposit'),
	(18, '2345678900', 215800, 50, '2020-09-24 18:36:48', 'Deposit'),
	(19, '2345678900', 4000, 50, '2020-09-24 18:38:13', 'Deposit');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table mybank.transactiontypes
DROP TABLE IF EXISTS `transactiontypes`;
CREATE TABLE IF NOT EXISTS `transactiontypes` (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_charge` double DEFAULT NULL,
  `tp_type` varchar(50) NOT NULL,
  PRIMARY KEY (`tp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.transactiontypes: 4 rows
DELETE FROM `transactiontypes`;
/*!40000 ALTER TABLE `transactiontypes` DISABLE KEYS */;
INSERT INTO `transactiontypes` (`tp_id`, `tp_charge`, `tp_type`) VALUES
	(1, 220.2, 'Transfer'),
	(2, 10, 'Deposit'),
	(3, 50.5, 'Withdraw'),
	(4, 0, 'Balance');
/*!40000 ALTER TABLE `transactiontypes` ENABLE KEYS */;

-- Dumping structure for table mybank.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctDate` datetime DEFAULT NULL,
  `ct_email` varchar(255) DEFAULT NULL,
  `ct_fname` varchar(255) DEFAULT NULL,
  `ct_lname` varchar(255) DEFAULT NULL,
  `ct_phone` varchar(255) DEFAULT NULL,
  `ct_pic` varchar(255) DEFAULT NULL,
  `usr_pwd` varchar(255) DEFAULT NULL,
  `usr_role` varchar(255) DEFAULT NULL,
  `usr_status` smallint(6) NOT NULL,
  `usr_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table mybank.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`usr_id`, `ctDate`, `ct_email`, `ct_fname`, `ct_lname`, `ct_phone`, `ct_pic`, `usr_pwd`, `usr_role`, `usr_status`, `usr_username`) VALUES
	(1, '2020-09-13 22:46:03', 'admin@mybank.com', 'Aviator', 'K', '234567890', NULL, '123456', '1', 1, 'Aviator');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
