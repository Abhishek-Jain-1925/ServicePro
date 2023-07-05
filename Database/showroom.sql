--
-- Database: `showroom`
--
create database `showroom`;
----------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` integer PRIMARY KEY AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `mob` char(10) DEFAULT NULL
);


--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `ap_id` integer PRIMARY KEY AUTO_INCREMENT,
  `cid` integer NOT NULL,
  `vehNo` varchar(50) DEFAULT NULL,
  `vehType` varchar(50) DEFAULT NULL,
  `vehName` varchar(50) DEFAULT NULL,
  `timeSlot` varchar(50) DEFAULT NULL,  
  `serviceType` varchar(50) DEFAULT NULL,
  `date` date  NOT NULL,
  `status` varchar(50) DEFAULT NULL,
 Constraint FK_Key1925 Foreign Key(cid) References customer(cid)
);

--Designed and Developed By - Mr.Abhishek Sachin Jain, Fergusson College Pune.