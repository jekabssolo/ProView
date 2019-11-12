-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 09:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `atjauninajumi`
--

CREATE TABLE `atjauninajumi` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Comments` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atjauninajumi`
--

INSERT INTO `atjauninajumi` (`ID`, `Date`, `Comments`, `projectID`) VALUES
(9, '2019-11-12', 'Test of new relations1', 8),
(10, '2019-11-03', 'Test of new realtions 33', 9),
(11, '2019-11-01', 'Very first test', 8);

-- --------------------------------------------------------

--
-- Table structure for table `finansetajs`
--

CREATE TABLE `finansetajs` (
  `ID` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `ERAF` int(11) NOT NULL DEFAULT '0',
  `RSF` int(11) NOT NULL DEFAULT '0',
  `KF` int(11) NOT NULL DEFAULT '0',
  `ELFLA` int(11) NOT NULL DEFAULT '0',
  `municipality` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finansetajs`
--

INSERT INTO `finansetajs` (`ID`, `project_id`, `ERAF`, `RSF`, `KF`, `ELFLA`, `municipality`) VALUES
(4, 8, 0, 0, 0, 55330833, 7692678),
(5, 9, 0, 0, 0, 55326072, 8206761),
(6, 10, 46479846, 7167220, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

CREATE TABLE `projekti` (
  `ID` int(11) NOT NULL,
  `Name` text COLLATE utf8_latvian_ci NOT NULL,
  `Financer` text COLLATE utf8_latvian_ci NOT NULL,
  `Status` text COLLATE utf8_latvian_ci NOT NULL,
  `Number` text COLLATE utf8_latvian_ci NOT NULL,
  `SAM` text COLLATE utf8_latvian_ci NOT NULL,
  `Budget` int(11) DEFAULT NULL,
  `Purpose` text COLLATE utf8_latvian_ci NOT NULL,
  `Activities` text COLLATE utf8_latvian_ci NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date NOT NULL,
  `CoordinatorName` text COLLATE utf8_latvian_ci NOT NULL,
  `CoordinatorContacts` text COLLATE utf8_latvian_ci NOT NULL,
  `BudgetSpent` int(11) DEFAULT '0',
  `BudgetMunicipality` int(11) DEFAULT NULL,
  `BudgetOther` int(11) DEFAULT NULL,
  `BudgetELFLA` int(11) DEFAULT NULL,
  `BudgetERAF` int(11) DEFAULT NULL,
  `BudgetESF` int(11) DEFAULT NULL,
  `BudgetKF` int(11) DEFAULT NULL,
  `BudgetKPFI` int(11) DEFAULT NULL,
  `BudgetLAT-LIT` int(11) DEFAULT NULL,
  `BudgetNor` int(11) DEFAULT NULL,
  `BudgetCountry` int(11) DEFAULT NULL,
  `Entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`ID`, `Name`, `Financer`, `Status`, `Number`, `SAM`, `Budget`, `Purpose`, `Activities`, `StartDate`, `FinishDate`, `CoordinatorName`, `CoordinatorContacts`, `BudgetSpent`, `BudgetMunicipality`, `BudgetOther`, `BudgetELFLA`, `BudgetERAF`, `BudgetESF`, `BudgetKF`, `BudgetKPFI`, `BudgetLAT-LIT`, `BudgetNor`, `BudgetCountry`, `Entry`) VALUES
(8, 'Bauskas novada pašvaldības grants ceļu pārbūve Mežotnes pagastā', 'ELFLA', 'Aktīvs', 'Nr. 18-06-A00702-000065', 'Latvijas Lauku attīstības programmas 2014.–2020.gadam pasākums „Pamatpakalpojumi un ciematu atjaunošana lauku apvidos”', 63023511, 'Projekta mērķis ir veikt grants ceļa „Mežotne – Bajāri – A1”  posma pārbūvi 2,497 km garumā, grants ceļa “Bērzu muiža – Ciņi – Internātvidusskola” posma pārbūvi 2,375 km garumā un grants ceļa “Līdumnieki – Mežstrautnieki” posma pārbūvi 1,231 km garumā.', 'Projektā paredzēts atjaunot ceļa konstrukciju 6,103 km garā posmā ar platumu 3,50 m līdz 5,50 m, nodrošinot ūdens noteci no brauktuves. Tai tiks veidots vismaz 3% liels šķērskritums uz nogāzes pusi vai atbilstoši šķērsprofilu elementiem. Lietus ūdeni paredzēts uztvert esošajos un projektējamajos sāngrāvjos vai ievalkās, caurtekās zem ceļa un nobrauktuvēm un meliorācijas drenāžas sistēmās. Segas konstrukcijas aprēķini veikti ņemot vērā ģeoloģisko izpēti. Pastiprinot slāni ar nesaistītu minerālmateriālu maisījumu 0/32s un atsevišķās vietās atjaunojot salizturīgo slāni, konstrukcija tiks pastiprināta līdz 120 MPa.', '2018-07-25', '2020-08-15', 'Jolanta Kalinka', '+37163922400', 31511756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-12 23:35:29'),
(9, 'Bauskas novada pašvaldības grants ceļu pārbūve Īslīces pagastā', 'ELFLA', 'Aktīvs', 'Nr. 18-06-A00702-000061', 'Latvijas Lauku attīstības programmas 2014.–2020.gadam pasākums „Pamatpakalpojumi un ciematu atjaunošana lauku apvidos”', 63532833, 'Projekta mērķis ir veikt grants ceļa „Stiebriņi – Zeltiņi”  posma pārbūvi 2,960 km garumā, grants ceļa “Karaļi – Kakti” posma pārbūvi 1,682 km garumā, grants ceļa “Vējdzirnavas – Stērstiņi” posma pārbūvi 2,855 km garumā un grants ceļa “Īslīči – Pāce” posma pārbūvi 0,804km. ', 'Projektā paredzēts atjaunot ceļa konstrukciju 8,301 km garā posmā ar platumu 3,50 m līdz 5,50 m, nodrošinot ūdens noteci no brauktuves. Tai tiks veidots vismaz 3% liels šķērskritums uz nogāzes pusi vai atbilstoši šķērsprofilu elementiem. Lietus ūdeni paredzēts uztvert esošajos un projektējamajos sāngrāvjos vai ievalkās, caurtekās zem ceļa un nobrauktuvēm un meliorācijas drenāžas sistēmās. Segas konstrukcijas aprēķini veikti ņemot vērā ģeoloģisko izpēti. Pastiprinot slāni ar nesaistītu minerālmateriālu maisījumu 0/32s un atsevišķās vietās atjaunojot salizturīgo slāni, konstrukcija tiks pastiprināta līdz 120 MPa.', '2018-07-25', '2020-08-09', 'Jolanta Kalinka', '+37163922400', 31766417, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-12 23:36:46'),
(10, 'Teritorijas revitalizācija Codes pagastā, rekonstruējot vietējā autoceļa posmu', 'ERAF', 'Arhivēts', '5.6.2.0./17/I/011', '5.6.2.specifiskā atbalsta mērķis „Teritoriju revitalizācija, reģenerējot degradētās teritorijas atbilstoši pašvaldību integrētajām attīstības programmām”', 43913755, 'Projekta mērķis ir degradētās teritorijas atjaunošana Codes pagastā, pārbūvējot autoceļa posmu, atbilstoši pašvaldības attīstības prioritātei pievilcīga un droša dzīves un darba vide. ', 'Codes pagasta pašvaldības autoceļa „A7-Rotkalni-A7 šoseja” posma no A7 šosejas 1.081 km garumā pārbūve; būvuzraudzība; autoruzraudzība.\r\n\r\nProjekta rezultāti - 2,7 ha teritorijas revitalizācija, izveidotas  jaunas darbavietas, ieguldītas 1 208 253.28  EUR privātās investīcijas. ', '2018-04-09', '2018-09-30', 'Ilze Tijone', '63922233; 20213021', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-12 23:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `relacijas`
--

CREATE TABLE `relacijas` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `financer_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `relacijas`
--

INSERT INTO `relacijas` (`id`, `log_id`, `financer_id`, `project_id`) VALUES
(4, 9, 4, 8),
(5, 10, 5, 9),
(6, NULL, 6, 10),
(7, 11, 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atjauninajumi`
--
ALTER TABLE `atjauninajumi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `finansetajs`
--
ALTER TABLE `finansetajs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projekti`
--
ALTER TABLE `projekti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `relacijas`
--
ALTER TABLE `relacijas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `financer_id` (`financer_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atjauninajumi`
--
ALTER TABLE `atjauninajumi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `finansetajs`
--
ALTER TABLE `finansetajs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `projekti`
--
ALTER TABLE `projekti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `relacijas`
--
ALTER TABLE `relacijas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atjauninajumi`
--
ALTER TABLE `atjauninajumi`
  ADD CONSTRAINT `atjauninajumi_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projekti` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finansetajs`
--
ALTER TABLE `finansetajs`
  ADD CONSTRAINT `finansetajs_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projekti` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relacijas`
--
ALTER TABLE `relacijas`
  ADD CONSTRAINT `relacijas_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `atjauninajumi` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relacijas_ibfk_2` FOREIGN KEY (`financer_id`) REFERENCES `finansetajs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relacijas_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projekti` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
