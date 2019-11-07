-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2019 at 01:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bauska_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

DROP TABLE IF EXISTS `projekti`;
CREATE TABLE IF NOT EXISTS `projekti` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE utf8_latvian_ci NOT NULL,
  `Financer` text COLLATE utf8_latvian_ci NOT NULL,
  `Status` text COLLATE utf8_latvian_ci NOT NULL,
  `Number` text COLLATE utf8_latvian_ci NOT NULL,
  `SAM` text COLLATE utf8_latvian_ci NOT NULL,
  `Budget` decimal(10,0) DEFAULT NULL,
  `Purpose` text COLLATE utf8_latvian_ci NOT NULL,
  `Activities` text COLLATE utf8_latvian_ci NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date NOT NULL,
  `CoordinatorName` text COLLATE utf8_latvian_ci NOT NULL,
  `CoordinatorContacts` text COLLATE utf8_latvian_ci NOT NULL,
  `BudgetSpent` float DEFAULT NULL,
  `BudgetMunicipality` float DEFAULT NULL,
  `BudgetOther` float DEFAULT NULL,
  `BudgetELFLA` float DEFAULT NULL,
  `BudgetERAF` float DEFAULT NULL,
  `BudgetESF` float DEFAULT NULL,
  `BudgetKF` float DEFAULT NULL,
  `BudgetKPFI` float DEFAULT NULL,
  `BudgetLAT-LIT` float DEFAULT NULL,
  `BudgetNor` float DEFAULT NULL,
  `BudgetCountry` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`ID`, `Name`, `Financer`, `Status`, `Number`, `SAM`, `Budget`, `Purpose`, `Activities`, `StartDate`, `FinishDate`, `CoordinatorName`, `CoordinatorContacts`, `BudgetSpent`, `BudgetMunicipality`, `BudgetOther`, `BudgetELFLA`, `BudgetERAF`, `BudgetESF`, `BudgetKF`, `BudgetKPFI`, `BudgetLAT-LIT`, `BudgetNor`, `BudgetCountry`) VALUES
(1, 'Bauskas novada pašvaldības grants ceļu pārbūve Mežotnes pagastā', 'ELFLA', 'Aktīvs', 'Nr. 18-06-A00702-000065', 'Latvijas Lauku attīstības programmas 2014.–2020.gadam pasākums „Pamatpakalpojumi un ciematu atjaunošana lauku apvidos”', '630235', 'Projekta mērķis ir veikt grants ceļa „Mežotne – Bajāri – A1”  posma pārbūvi 2,497 km garumā, grants ceļa “Bērzu muiža – Ciņi – Internātvidusskola” posma pārbūvi 2,375 km garumā un grants ceļa “Līdumnieki – Mežstrautnieki” posma pārbūvi 1,231 km garumā.', 'Projektā paredzēts atjaunot ceļa konstrukciju 6,103 km garā posmā ar platumu 3,50 m līdz 5,50 m, nodrošinot ūdens noteci no brauktuves. Tai tiks veidots vismaz 3% liels šķērskritums uz nogāzes pusi vai atbilstoši šķērsprofilu elementiem. Lietus ūdeni paredzēts uztvert esošajos un projektējamajos sāngrāvjos vai ievalkās, caurtekās zem ceļa un nobrauktuvēm un meliorācijas drenāžas sistēmās. Segas konstrukcijas aprēķini veikti ņemot vērā ģeoloģisko izpēti. Pastiprinot slāni ar nesaistītu minerālmateriālu maisījumu 0/32s un atsevišķās vietās atjaunojot salizturīgo slāni, konstrukcija tiks pastiprināta līdz 120 MPa.', '2018-07-25', '2020-08-15', 'Jolanta Kalinka', '+37163922400', 315118, 76926.8, NULL, 553308, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Bauskas novada pašvaldības grants ceļu pārbūve Īslīces pagastā', 'ELFLA', 'Aktīvs', 'Nr. 18-06-A00702-000061', 'Latvijas Lauku attīstības programmas 2014.–2020.gadam pasākums „Pamatpakalpojumi un ciematu atjaunošana lauku apvidos”', '635328', 'Projekta mērķis ir veikt grants ceļa „Stiebriņi – Zeltiņi”  posma pārbūvi 2,960 km garumā, grants ceļa “Karaļi – Kakti” posma pārbūvi 1,682 km garumā, grants ceļa “Vējdzirnavas – Stērstiņi” posma pārbūvi 2,855 km garumā un grants ceļa “Īslīči – Pāce” posma pārbūvi 0,804km. ', 'Projektā paredzēts atjaunot ceļa konstrukciju 8,301 km garā posmā ar platumu 3,50 m līdz 5,50 m, nodrošinot ūdens noteci no brauktuves. Tai tiks veidots vismaz 3% liels šķērskritums uz nogāzes pusi vai atbilstoši šķērsprofilu elementiem. Lietus ūdeni paredzēts uztvert esošajos un projektējamajos sāngrāvjos vai ievalkās, caurtekās zem ceļa un nobrauktuvēm un meliorācijas drenāžas sistēmās. Segas konstrukcijas aprēķini veikti ņemot vērā ģeoloģisko izpēti. Pastiprinot slāni ar nesaistītu minerālmateriālu maisījumu 0/32s un atsevišķās vietās atjaunojot salizturīgo slāni, konstrukcija tiks pastiprināta līdz 120 MPa.', '2018-07-25', '2020-08-09', 'Jolanta Kalinka', '+37163922400', 317664, 82067.6, NULL, 553261, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
