-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2025 at 05:21 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultimate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `date_paid` date DEFAULT NULL,
  `percentage_paid` decimal(5,2) DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `days_active` int(11) NOT NULL,
  `revisions` int(11) DEFAULT '0',
  `completed_date` date DEFAULT NULL,
  `next_follow_up` date DEFAULT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` int(99) NOT NULL,
  `checklist_name` varchar(255) NOT NULL,
  `checklist_description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `estimated_time` varchar(255) NOT NULL,
  `actual_time` varchar(255) DEFAULT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `project_id` int(99) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `days_active` int(11) NOT NULL,
  `revisions` int(99) NOT NULL,
  `completed_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `testimonials` text NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `status`, `company_name`, `invoice_number`, `invoice_date`, `assigned_to`, `project_id`, `project_start_date`, `project_type`, `description`, `days_active`, `revisions`, `completed_date`, `deadline_date`, `testimonials`, `last_edited_by`, `created_at`, `updated_at`) VALUES
(1, 'open', 'test client', 'inv12345', '2024-09-11', 'me', 0, '2024-09-11', 'web', 'test description', 2, 1, '2024-09-11', '2024-09-11', 'cool', 'me', '2024-09-16 07:45:33', '2024-09-16 07:45:33'),
(3, 'open', 'test client', '12345', '2024-09-11', 'me', 0, '2024-09-11', 'web', 'test description', 2, 1, '2024-09-11', '2024-09-11', 'cool', 'me', '2024-09-16 07:46:00', '2024-09-16 07:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_management`
--

CREATE TABLE `client_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `domain_email` varchar(255) DEFAULT NULL,
  `last_edited_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_management`
--

INSERT INTO `client_management` (`id`, `domain`, `company`, `client_name`, `gender`, `birthday`, `mobile`, `work_email`, `domain_email`, `last_edited_by`, `created_at`, `modified_at`) VALUES
(2, 'backstage.travel', 'BACKSTAGE TRAVEL', 'Ross Pallat', 'Male', ' ', '084 260 4245â€¬', 'ross@backstage.travel', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(3, 'ce-tours.com', 'CE TOURS', 'Caleb Veerasamy', 'Male', ' ', NULL, NULL, 'calebveerasamy@gmail.com', '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(4, 'cryptocoffee.co.za', 'CRYPTO COFFEE', 'Arno Visser', 'Male', ' ', 'â€­083 500 3646â€¬', NULL, 'arno.visser.88@gmail.com', '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(5, 'dagdroommedia.co.za', 'DAGDROOM MEDIA', 'Christo du Plessis', 'Male', ' ', NULL, 'dagdroom.media@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(6, 'educationaltraining.co.za', 'EDUCATIONAL TRAINING', 'Cathy Fry', 'Female', ' ', NULL, 'cathy@educationaltraining.co.za', 'cathy.m.fry@gmail.com', '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(7, 'goodify.co.za', 'GOODIFY', 'Garth Galbraith', 'Male', '1986-07-11', NULL, 'garth@garmo.co.za', 'sean@bossenger.co.za', '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(8, 'kzalla.co.za', 'KZALLA', 'Caleb Veerasamy', 'Male', ' ', NULL, 'calebveerasamy@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(9, 'lamula3.co.za', 'LAMULA 3', 'Casey-Lee Rudd', 'Female', ' ', NULL, 'casey@lamula3.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(10, 'opencanvas.co.za', 'OPEN CANVAS', 'Winet Fourie', 'Female', ' ', NULL, 'winet@opencanvas.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(11, 'riskman.co.za', 'RISK MAN', 'Pieter van der Walt', 'Male', ' ', NULL, 'pieter@riskman.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(12, 'elysiumwines.co.za', 'ELYSIUM WINES', 'Arno Visser', 'Male', '1988-11-11', NULL, 'arno@turncoin.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(13, 'katitofarming.com', 'KATITO FARMING', 'Penny Brown', 'Female', ' ', NULL, 'admin@katitofarming.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(14, 'mondiale.co.za', 'MONDIALE SHELF TRADING', 'Trevor Bossenger', 'Male', '1957-10-26', NULL, 'trevalyn@mweb.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(15, 'noteworthy7.co.za', 'NOTEWORTHY 7', 'Rayna Perrins', ' ', ' ', NULL, 'rayna@noteworthy7.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(16, 'sa-psda.co.za', 'SA-PSDA', 'Lizanne Rennie', ' ', ' ', NULL, 'lizanne@pcs.za.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(17, 'vagabondstretchtents.co.za', 'VAGABOND STRETCHTENTS', 'Winet Fourie', 'Female', ' ', NULL, 'vagabondstretchtents@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(18, 'workspectrum.co.za', 'WORK SPECTRUM', 'Dominique', ' ', ' ', NULL, 'dominique@workspectrum.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(19, 'alhi.co.za', 'AL HOME IMPROVEMENTS', 'Andrew Lord', 'Male', ' ', NULL, 'andrewlordb@gmail.com', 'andrewlordb@gmail.com', '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(20, 'assetprotek.co.za', 'ASSET PROTEK', 'Tara van Zyl', 'Male', ' ', NULL, 'info@assetprotek.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(21, 'autobotz.co.za', 'AUTO BOTZ', 'Jason van Zyl', 'Male', ' ', NULL, 'jasonvanzyl86@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(22, 'nextlevelpainting.co.za', 'NEXT LEVEL PAINTING', 'Jason van Zyl', 'Male', ' ', NULL, 'jasonvanzyl86@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(23, 'bayu.co.za', 'BAYU WATER', 'Tara van Zyl', ' ', ' ', NULL, 'tara@bayu.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(24, 'blockchainlegal.co.za', 'ARNO VISSER', 'Arno Visser', ' ', ' ', NULL, 'arno.visser.88@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(25, 'capetownprivateschool.co.za', 'SOMERSET WEST PRIVATE SCHOOL', 'Lana Merlo', ' ', ' ', NULL, 'accounts@swps.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(26, 'kahvohd.co.za', 'KAHVOHD', 'Francois van Louw', ' ', ' ', NULL, 'francois@jbafrica.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(27, 'kayleeandrory.co.za', 'KAYLEE & RORY', 'Kaylee Killin', ' ', ' ', NULL, 'clark.kaylee@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(28, 'martinhouseschool.com', 'MARTIN HOUSE SCHOOL', 'James Shapi', ' ', ' ', NULL, 'financial.martinhouse@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(29, 'mybutchery.co.za', 'MY BUTCHERY', 'Brent te Roller', ' ', ' ', NULL, 'brentteroller@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(30, 'nickhamman.com', 'NICK HAMMAN', 'Nick Hamman', ' ', ' ', NULL, 'Nicholas.hamman@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(31, 'pmuexpert.co.za', 'PMU EXPERT', 'Marina Nemenova', ' ', ' ', NULL, 'marina.nemenova@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(32, 'revitalizewellness.co.za', 'REVITALIZE WELLNESS', 'Chantelle Schreuder', ' ', ' ', NULL, 'revitalize.wellness01@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(33, 'allerleienmeer.co.za', 'ALLERLEI EN MEER', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(34, 'biodyne.co.za', 'BIODYNE', 'Marco Anelli', ' ', ' ', NULL, 'marco@biodyne.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(35, 'funkwa.co.za', 'FUNKWA', 'Francious Kruger', ' ', ' ', NULL, 'francious.kruger@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(36, 'ilovegroup.co.za', 'I LOVE GROUP', 'Gary Wright', ' ', ' ', NULL, 'gary@ilovegroup.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(37, 'kvzproperties.co.za', 'KVZ PROPERTIES', 'Carika de Villiers', ' ', ' ', NULL, 'carika@kvzprop.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(38, 'livegigs.co.za', 'LIVE GIGS', 'Francious Kruger', ' ', ' ', NULL, 'francious.kruger@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(39, 'saisefarming.com', 'SAISE FARMING', 'Penny Brown', ' ', ' ', NULL, 'admin@saisefarming.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(40, 'alectrasecurity.co.za', 'ALECTRA SECURITY', 'Arend Burger', ' ', ' ', NULL, 'arendburger@icloud.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(41, 'bushmanspoort.co.za', 'BUSHMANS POORT', 'Hermanus Visser', ' ', ' ', NULL, 'manus.allsea@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(42, 'rocklandsbrewery.co.za', 'ROCKLANDS BREWERY', 'Hermanus Visser', ' ', ' ', NULL, 'manus.allsea@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(43, 'cartridge-king.co.za', 'CARTRDIGE KING', 'Gareth Murray', ' ', ' ', NULL, 'gareth@cartridge-king.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(44, 'edudite.org.za', 'ERUDITE', 'Levi Schooling', ' ', ' ', NULL, 'lschooling@outlook.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(45, 'frsh.co.za', 'FRSH', 'Ferdi van Niekerk', ' ', ' ', NULL, 'fvn@2ctelecoms.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(46, 'garmo.co.za', 'GARMO', 'Garth Galbraith', ' ', ' ', NULL, 'garth@garmo.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(47, 'hanlievisser.co.za', 'HANLIE VISSER ATTORNEYS', 'Frans Calitz', ' ', ' ', NULL, 'frans@hanlievisser.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(48, 'qabani.co.za', 'QABANI NATIONAL', 'Leslie Jansen', ' ', ' ', NULL, 'leslie@qabani.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(49, 'rainbownourishing.co.za', 'RAINBOW NOURISHING', 'Regaogetswe Chuene', ' ', ' ', NULL, 'pitsichuene@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(50, 'springboknudegirls.co.za', 'SPRINGBOK NUDE GIRLS', 'Francious Kruger', ' ', ' ', NULL, 'francious.kruger@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(51, 'voloprop.co.za', 'VOLO PROPERTIES', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(52, '1on1fitness.co.za', '1 ON 1 FITNESS', 'Ivan Windt', ' ', ' ', NULL, 'ivan@ambitiontech.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(53, 'alixkerrreiki.co.za', 'ALIX KERR REIKI', 'Alix Kerr', ' ', ' ', NULL, 'loolabean@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(54, 'angloboerwarmuseum.co.za', 'ANGLO BOER WAR MUSEUM', 'Xanthe Joubert', ' ', ' ', NULL, 'lalapanz@yebo.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(55, 'earth-ology.co.za', 'EARTHOLOGY', 'Joni Viljoen', ' ', ' ', NULL, 'joni@earth-ology.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(56, 'ghionadvisory.com', 'GHION ADVISORY', 'Meron Demisse', ' ', ' ', NULL, 'meron@candcafrica.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(57, 'lalapanzihotel.co.za', 'LALAPANZI HOTEL', 'Xanthe Joubert', ' ', ' ', NULL, 'lalapanz@yebo.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(58, 'myhome4sale.co.za', 'MY PROPERTY 4 SALE', 'Michael Werneyer', ' ', ' ', NULL, 'michael@thabalanga.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(59, 'oliilo.co.za', 'OLIILO', 'Reinardt Gilfillian', ' ', ' ', NULL, 'reinardt15@yahoo.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(60, 'walkcommunications.co.za', 'WALK COMMUNICATIONS', 'Nick Hamman', ' ', ' ', NULL, 'nick@walkcommunications.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(61, 'wellnessawake.com', 'WELLNESS AWAKE', 'Leanne Schmidt', ' ', ' ', NULL, 'leanne996@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(62, 'gabriellacentre.org.za', 'GABRIELLA CENTRE', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(63, 'africanminingforum.co.za', 'AFRICAN MINING FORUM', 'Graham', ' ', ' ', NULL, 'africanminingforum@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(64, 'braveco.co.za', 'BRAVECO', 'Sandy Turketti', ' ', ' ', NULL, 'sandyturketti@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(65, 'cloverleafservices.co.za', 'CLOVERLEAF SERVICES', 'Joni Viljoen', ' ', ' ', NULL, 'joni@cloverleafservices.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(66, 'crusted.co.za', 'CRUSTED FOOD', 'Chante Enslin', ' ', ' ', NULL, 'crusted.food@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(67, 'evolvemusictuition.com', 'EVOLVE MUSIC TUITION', 'Nick Kuiper', ' ', ' ', NULL, 'nick.kuiper@evolvemusictuition.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(68, 'krigegroup.com', 'KRIGE GROUP', 'Renier Krige', ' ', ' ', NULL, 'renier@krigegroup.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(69, 'libertysecurity.co.za', 'LIBERTY SECURITY', 'Arend Burger', ' ', ' ', NULL, 'arendburger@icloud.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(70, 'locomotion.co.za', 'LOCOMOTION', 'Alan', ' ', ' ', NULL, 'info@locomotion.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(71, 'thehometeam.co.za', 'THE HOME TEAM', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(72, 'andreaphillipsstore.com', 'ANDREA PHILLIPS STORE', 'Andrea Phillips', ' ', ' ', NULL, 'info@andreaphillips.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(73, 'coolcowater.co.za', 'COOLCO WATER', 'Graham Hoare', ' ', ' ', NULL, 'graham@coolcowater.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(74, 'genesisgroup.biz', 'GENESIS GROUP', 'Shaun Brannigan', ' ', ' ', NULL, 'shaun@genesis.com.zm', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(75, 'neorealtydubai.online', 'NEO REALTY DUBAI', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(76, 'senzo.africa', 'SENZO', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(77, 'bayuprint.co.za', 'BAYU PRINT', 'Tara van Zyl', ' ', ' ', NULL, 'info@assetprotek.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(78, 'embroiderymaster.co.za', 'EMBROIDERY MASTER', 'Nicky Whall', ' ', ' ', NULL, 'njwhall@mweb.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(79, 'mafiavapes.co.za', 'MAVIA VAPES', 'Dyaln Rudd', ' ', ' ', NULL, 'dylanrudd953@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(80, 'moerknuckle.co.za', 'MOER KNUCKLE', 'Dale Krige', ' ', ' ', NULL, 'dalekrige1@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(81, 'ambitiontech.co.za', 'AMBTION TECH', 'Ivan Windt', ' ', ' ', NULL, 'ivan@ambitiontech.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(82, 'arnocarstensmusic.com', 'ARNO CARSTENS', 'Melanie Carstens', ' ', ' ', NULL, 'melanie@thearnocarstensstore.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(83, 'bluecranefunerals.co.za', 'BLUE CRANE FUNERALS', 'Kirsty Smallbone', ' ', ' ', NULL, 'kirsty@bluecranefunerals.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(84, 'divorcetalk.co.za', 'DIVORCE TALK ', 'Frans Calitz', ' ', ' ', NULL, 'frans@hanlievisser.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(85, 'kohlersigns.co.za', 'KOHLER SIGNS', 'Russell Kohler', ' ', ' ', NULL, 'russell@kohlersigns.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(86, 'marisahayward.co.za', 'MARISA HAYWARD', 'Marisa Hayward', ' ', ' ', NULL, 'marisa@marisahayward.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(87, 'steilteproteas.co.za', 'STEILTE PROTEAS', 'Antoinette Ludwig', ' ', ' ', NULL, 'admin@steilteproteas.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(88, 'sheepskinkidz.com', 'SHEEPSKIN KIDS', NULL, ' ', ' ', NULL, NULL, NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(89, 'megadrive.co.za', 'MEGA DRIVE', 'Talya Muller', ' ', ' ', NULL, 'design@blacklime.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(90, 'natureworks.co.za', 'NATURE WORKS', 'Jacques Jansen van Rensburg', ' ', ' ', NULL, 'jacques@natureworks.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(91, 'orioleorganics.co.za', 'ORIOLE ORGANICS', 'Neil Rautenbach', ' ', ' ', NULL, 'neilnursery@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(92, 'thetrailsco.co.za', 'THE TRAILS CO', 'Antoinette Ludwig', ' ', ' ', NULL, 'admin@steilteproteas.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(93, 'tiledoctorsa.co.za', 'TILE DOCTOR ', 'Allen Bestbier', ' ', ' ', NULL, 'allen@tiledoctorsa.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(94, 'blbdigitalmarketing.co.za', 'BLB DIGITAL MARKETING', 'Bernadette Basson', ' ', ' ', NULL, 'blbsmm69@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(95, 'elpsych.co.za', 'ELSYCH', 'Brett Hayward', ' ', ' ', NULL, 'brett@voloproperties.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(96, 'mrspitbraai.co.za', 'MR SPITBRAAI', 'Ranier Koen', ' ', ' ', NULL, 'koen@mrspitbraai.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(97, 'vinlaw.co.za', 'VIN LAW', 'Arno Visser', ' ', ' ', NULL, 'arno.visser.88@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(98, 'wickedworldband.com', 'WICKED WORLD BAND', 'Ruan Grobbelaar', ' ', ' ', NULL, 'wickedworldmusic@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(99, 'evomedia.co.za', 'EVO MEDIA', 'Martin de Bruin', ' ', ' ', NULL, 'martin@revolutioninc.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(100, 'turftitan.co.za', 'TITAN TURN', 'Marco Anelli', ' ', ' ', NULL, 'marco@biodyne.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(101, 'beastinteractive.co.za', 'EMERGE DIGITAL', 'Sean Bossenger', ' ', ' ', NULL, 'sean@emergestudio.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(102, 'bossenger.co.za', 'SEAN BOSSENGER', 'Sean Bossenger', ' ', ' ', NULL, 'sean@emergestudio.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(103, 'barefootmagicman.com', 'BAREFOOT MGICMAN', 'Johann van Coller', ' ', ' ', NULL, 'barefootmagicman@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(104, 'coastalcleaning.co.za', 'COASTAL CLEANING', 'Jamie Gray', ' ', ' ', NULL, 'Jamiegray545@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(105, 'hrdirect.co.za', 'HR DIRECT', 'Renier Krige', ' ', ' ', NULL, 'renier@krigegroup.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(106, 'luigisfarmpantry.co.za', 'LUIGIS FARM PANTRY', 'Luigi te Roller', ' ', ' ', NULL, 'luigijnr@gmail.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(107, 'pullockattorneys.co.za', 'PULLOCK ATTORNEYS', 'Tracy Pullock', ' ', ' ', NULL, 'tracy@patt.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(108, 'sapsda.co.za', NULL, 'Lizanne Rennie', ' ', ' ', NULL, 'lizanne@pcs.za.com', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(109, 'ukhanyisoebantwini.co.za', 'EDUCATIONAL TRANINIG', 'Cathy Fry', ' ', ' ', NULL, 'cathy@educationaltraining.co.za', NULL, '6', '2024-10-16 07:47:28', '2024-10-16 07:47:28'),
(110, 'angloboerwarmuseum.co.za', 'LALAPANZI HOTEK', 'Xanthe Joubert', 'Female', '1980-01-01', '+27 82 562 0914', 'xanthe@lalapanzihotel.co.za', 'xanthe@lalapanzihotel.co.za', '9', '2024-10-24 05:29:47', '2024-10-24 05:29:47'),
(111, 'afripaw.org.za', 'AFRIPAW', 'AnÃ©l Wesson', 'Female', '1974-05-30', '072 616 1207', 'anel@afripaw.org.za', 'anelwesson@yahoo.co.uk', '9', '2024-12-06 09:28:16', '2024-12-06 09:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `email`, `phone`) VALUES
(1, 'testCompany', '123 test road', 'test@company.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(99) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `configs_domainextensions`
--

CREATE TABLE `configs_domainextensions` (
  `id` int(99) NOT NULL,
  `domain_extensions` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_domainextensions`
--

INSERT INTO `configs_domainextensions` (`id`, `domain_extensions`, `created_at`, `modified_at`) VALUES
(1, '.co.za', '2024-12-22 16:34:16', '2024-12-22 16:34:16'),
(3, '.com', '2024-12-23 18:23:16', '2024-12-23 18:23:16'),
(4, '.gov.za', '2025-01-11 18:39:14', '2025-01-11 18:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `configs_domainlocations`
--

CREATE TABLE `configs_domainlocations` (
  `id` int(99) NOT NULL,
  `domain_locations` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_domainlocations`
--

INSERT INTO `configs_domainlocations` (`id`, `domain_locations`, `created_at`, `modified_at`) VALUES
(1, 'AFRIHOST', '2024-12-22 15:49:01', '2024-12-23 21:25:29'),
(4, 'XNEELO', '2024-12-22 19:20:50', '2024-12-23 21:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `configs_emailpackages`
--

CREATE TABLE `configs_emailpackages` (
  `id` int(99) NOT NULL,
  `email_packages` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_emailpackages`
--

INSERT INTO `configs_emailpackages` (`id`, `email_packages`, `created_at`, `modified_at`) VALUES
(1, '100', '2024-12-22 18:33:03', '2024-12-22 18:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `configs_hostinglocations`
--

CREATE TABLE `configs_hostinglocations` (
  `id` int(99) NOT NULL,
  `hosting_locations` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_hostinglocations`
--

INSERT INTO `configs_hostinglocations` (`id`, `hosting_locations`, `created_at`, `modified_at`) VALUES
(1, 'GoDaddy', '2024-12-22 18:32:22', '2024-12-22 18:32:22'),
(4, '20i', '2024-12-23 22:28:41', '2024-12-23 22:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `configs_hostingpackages`
--

CREATE TABLE `configs_hostingpackages` (
  `id` int(99) NOT NULL,
  `hosting_packages` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_hostingpackages`
--

INSERT INTO `configs_hostingpackages` (`id`, `hosting_packages`, `created_at`, `modified_at`) VALUES
(1, '100', '2024-12-22 18:32:41', '2024-12-22 18:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `configs_ownerships`
--

CREATE TABLE `configs_ownerships` (
  `id` int(99) NOT NULL,
  `ownerships` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs_ownerships`
--

INSERT INTO `configs_ownerships` (`id`, `ownerships`, `created_at`, `modified_at`) VALUES
(1, 'EMERGE', '2024-12-22 16:21:08', '2024-12-23 21:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `disk_usage`
--

CREATE TABLE `disk_usage` (
  `id` int(99) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `registration_date` varchar(255) DEFAULT NULL,
  `renewal_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `transfer_date` varchar(255) DEFAULT NULL,
  `domain_ext` varchar(255) DEFAULT NULL,
  `host_package_gb` int(99) DEFAULT NULL,
  `disk_usage_gb` int(99) DEFAULT NULL,
  `email_usage_mb` int(99) DEFAULT NULL,
  `website_usage_mb` int(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(99) UNSIGNED NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `owned_by` varchar(255) DEFAULT NULL,
  `hosted_by` varchar(255) DEFAULT NULL,
  `domain_ext` varchar(255) DEFAULT NULL,
  `domain_cost` varchar(255) DEFAULT NULL,
  `domain_r` varchar(255) DEFAULT NULL,
  `host_pkg_gb` varchar(255) DEFAULT NULL,
  `hosting_r` varchar(255) DEFAULT NULL,
  `domain_notes` text,
  `last_edited_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `domain`, `company`, `location`, `owned_by`, `hosted_by`, `domain_ext`, `domain_cost`, `domain_r`, `host_pkg_gb`, `hosting_r`, `domain_notes`, `last_edited_by`, `created_at`, `modified_at`) VALUES
(1, 'test.co.za', 'MEGA DRIVE', 'AFRIHOST', 'EMERGE', 'GoDaddy', NULL, '10', '10', '10', '10', 'testing', '6', '2025-02-01 20:12:25', '2025-02-01 20:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `domain_costs`
--

CREATE TABLE `domain_costs` (
  `id` int(99) NOT NULL,
  `domain_ext` varchar(255) DEFAULT NULL,
  `afrihost_purchase` int(99) DEFAULT NULL,
  `afrihost_renewal` int(99) DEFAULT NULL,
  `xneelo_purchase` int(99) DEFAULT NULL,
  `xneelo_renewal` int(99) DEFAULT NULL,
  `domains_purchase` int(99) DEFAULT NULL,
  `domains_renewal` int(99) DEFAULT NULL,
  `go_daddy_purchase` int(99) DEFAULT NULL,
  `go_daddy_renewal` int(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domain_hosting`
--

CREATE TABLE `domain_hosting` (
  `id` int(11) UNSIGNED NOT NULL,
  `domain` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `hosted` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `renewal_date` date NOT NULL,
  `package` varchar(255) NOT NULL,
  `package_cost` decimal(10,2) NOT NULL,
  `domain_cost` decimal(10,2) NOT NULL,
  `retail` decimal(10,2) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `years_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domain_hosting`
--

INSERT INTO `domain_hosting` (`id`, `domain`, `location`, `hosted`, `company`, `reg_date`, `renewal_date`, `package`, `package_cost`, `domain_cost`, `retail`, `website`, `email`, `years_active`, `created_at`, `updated_at`) VALUES
(1, 'example1.com', 'USA', 'Yes', 'HostCompany1', '2023-01-01', '2024-01-01', 'Basic', '29.99', '9.99', '39.99', 'https://example1.com', 'contact@example1.com', 1, '2024-09-10 01:08:57', '2024-09-10 01:08:57'),
(2, 'example2.net', 'Canada', 'Yes', 'HostCompany2', '2022-05-15', '2023-05-15', 'Standard', '49.99', '12.99', '59.99', 'https://example2.net', 'support@example2.net', 2, '2024-09-10 01:08:57', '2024-09-10 01:08:57'),
(3, 'example3.org', 'UK', 'No', 'HostCompany3', '2021-07-20', '2022-07-20', 'Premium', '99.99', '15.99', '114.99', 'https://example3.org', 'info@example3.org', 3, '2024-09-10 01:08:57', '2024-09-10 01:08:57'),
(4, 'example4.io', 'Australia', 'Yes', 'HostCompany4', '2020-11-30', '2023-11-30', 'Enterprise', '199.99', '19.99', '219.99', 'https://example4.io', 'admin@example4.io', 4, '2024-09-10 01:08:57', '2024-09-10 01:08:57'),
(5, 'example5.co', 'Germany', 'No', 'HostCompany5', '2019-09-10', '2021-09-10', 'Startup', '79.99', '11.99', '91.99', 'https://example5.co', 'webmaster@example5.co', 5, '2024-09-10 01:08:57', '2024-09-10 01:08:57'),
(6, 'a', 'a', 'a', 'a', '2024-09-12', '2024-09-26', '600', '500.00', '400.00', '300.00', 'a', 'a@a.com', 2, '2024-09-15 22:01:41', '2024-09-15 22:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `domain_info`
--

CREATE TABLE `domain_info` (
  `id` int(11) UNSIGNED NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `reg_date` varchar(255) DEFAULT NULL,
  `ren_date` varchar(255) DEFAULT NULL,
  `can_date` varchar(255) DEFAULT NULL,
  `trans_date` varchar(255) DEFAULT NULL,
  `domain_ext` varchar(50) DEFAULT NULL,
  `host_pkg_gb` varchar(255) DEFAULT NULL,
  `disk_usg_gb` varchar(255) DEFAULT NULL,
  `email_usg_mb` varchar(255) DEFAULT NULL,
  `website_usg_mb` varchar(255) DEFAULT NULL,
  `last_edited_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain_info`
--

INSERT INTO `domain_info` (`id`, `domain`, `company`, `reg_date`, `ren_date`, `can_date`, `trans_date`, `domain_ext`, `host_pkg_gb`, `disk_usg_gb`, `email_usg_mb`, `website_usg_mb`, `last_edited_by`, `created_at`, `modified_at`) VALUES
(210, '1on1fitness.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(211, 'adventure-guru.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(212, 'africanminingforum.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(213, 'alectrasecurity.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(214, 'alhi.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(215, 'alhomeimprovement.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(216, 'alixkerrreiki.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(217, 'allerleienmeer.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(218, 'ambitiontech.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(219, 'ampd.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(220, 'andreaphillips.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(221, 'andreaphillipsstore.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(222, 'andrewneethling.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(223, 'andrewneethling.me', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(224, 'angloboerwarmuseum.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(225, 'arnocarstens.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(226, 'arnocarstens.xyz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(227, 'arnocarstensmusic.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(228, 'arnovisser.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(229, 'assetengineering.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(230, 'assetprotek.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(231, 'assetprotekengineering.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(232, 'autobotz.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(233, 'backstage.travel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(234, 'backstagetravel.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(235, 'barefootmagicman.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(236, 'barnyarddeli.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(237, 'bayu.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(238, 'bayuprint.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(239, 'beastbrands.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(240, 'beastinteractive.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(241, 'biodyne.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(242, 'blbdigitalmarketing.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(243, 'blockchainlegal.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(244, 'bluecranefunerals.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(245, 'bluecranefunerals.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(246, 'bossenger.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(247, 'bossengerbash.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(248, 'braveco.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(249, 'buffalocoffee.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(250, 'bushmanspoort.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(251, 'capetownprivateschool.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(252, 'cartridge-king.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(253, 'cartridgeking.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(254, 'ce-tours.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(255, 'cloudsofhope.org.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(256, 'cloverleafservices.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(257, 'coastalcleaning.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(258, 'coolcowater.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(259, 'croydonvineyardestate.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(260, 'croydonvineyards.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(261, 'croydonvineyards.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(262, 'crusted.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(263, 'cryptocoffee.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(264, 'dagdroommedia.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(265, 'digconsult.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(266, 'divorcetalk.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(267, 'earth-ology.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(268, 'earthology.online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(269, 'educationaltraining.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(270, 'educationaltraining.online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(271, 'edudite.org.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(272, 'elpsych.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(273, 'elysiumwines.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(274, 'embroiderymaster.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(275, 'emerge3.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(276, 'emergeagency.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(277, 'emergecloud.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(278, 'emergeconcepts.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(279, 'emergecreative.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(280, 'emergedigital.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(281, 'emergefleet.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(282, 'emergeltd.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(283, 'emergenow.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(284, 'emergeone.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(285, 'emergestudio.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(286, 'emergetwo.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(287, 'emerging.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(288, 'erudite.org.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(289, 'evolvemusictuition.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(290, 'evomedia.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(291, 'frsh.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(292, 'funkwa.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(293, 'gabriellacentre.org.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(294, 'garmo.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(295, 'genesisgroup.biz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(296, 'ghionadvisory.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(297, 'gohop.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(298, 'goodify.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(299, 'hanlievisser.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(300, 'horisonproduksies.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(301, 'hrdirect.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(302, 'hvdivorce.online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(303, 'ilovegroup.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(304, 'iloveshade.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(305, 'kahvohd.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(306, 'katitofarming.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(307, 'kayleeandrory.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(308, 'kohlersigns.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(309, 'krigegroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(310, 'kvzprop.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(311, 'kvzproperties.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(312, 'kzalla.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(313, 'lalapanzihotel.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(314, 'lamula3.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(315, 'libertysecurity.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(316, 'libertysecuritystore.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(317, 'littlefoxstudio.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(318, 'livegigs.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(319, 'locomotion.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(320, 'luigisfarmpantry.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(321, 'mafiavapes.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(322, 'marisahayward.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(323, 'martinhouseschool.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(324, 'megadrive.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(325, 'moerknuckle.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(326, 'mondiale.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(327, 'mrspitbraai.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(328, 'mrspitbraai.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(329, 'mybutchery.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(330, 'myhome4sale.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(331, 'myproperty4sale.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(332, 'naturalstonedoctor.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(333, 'natureworks.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(334, 'neorealtydubai.online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(335, 'nextlevelpainting.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(336, 'nickhamman.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(337, 'ninjadrops.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(338, 'nolamula.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(339, 'noteworthy7.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(340, 'okconference2022.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(341, 'oliilo.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(342, 'opencanvas.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(343, 'orioleorganics.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(344, 'pmuexpert.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(345, 'pullockattorneys.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(346, 'qabani.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(347, 'qabaninational.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(348, 'rainbownourishing.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(349, 'revitalizewellness.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(350, 'riskman.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(351, 'rocklandsbrewery.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(352, 'sa-psda.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(353, 'safetysolutions.africa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(354, 'saisefarming.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(355, 'sapsda.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(356, 'senzo.africa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(357, 'sheepskinkidz.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(358, 'somersetwestprivateschool.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(359, 'southafricaprivateschool.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(360, 'spitbraaiking.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(361, 'spitbraaimr.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(362, 'springboknudegirls.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(363, 'stayinspired.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(364, 'steilteproteas.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(365, 'synergyai.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(366, 'thearnocarstensstore.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(367, 'thehometeam.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(368, 'thetrailsco.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(369, 'thetrailsco.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(370, 'thetrailscompany.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(371, 'thetrailscompany.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(372, 'tiledoctorsa.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(373, 'tilespecafrica.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(374, 'tradepath.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(375, 'turftitan.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(376, 'ukhanyisoebantwini.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(377, 'vagabondstretchtents.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(378, 'vinlaw.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(379, 'voloprop.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(380, 'voloproperties.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(381, 'walkcommunications.co.za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(382, 'wellnessawake.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(383, 'wickedworldband.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-12 12:56:42'),
(384, 'workspectrum.co.za', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '2025-01-12 12:56:42', '2025-01-29 00:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `domain_management`
--

CREATE TABLE `domain_management` (
  `id` int(99) UNSIGNED NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `owned_by` varchar(255) DEFAULT NULL,
  `hosted_by` varchar(255) DEFAULT NULL,
  `domain_ext` varchar(255) DEFAULT NULL,
  `domain_cost` varchar(255) DEFAULT NULL,
  `domain_r` varchar(255) DEFAULT NULL,
  `host_pkg_gb` varchar(255) DEFAULT NULL,
  `hosting_r` varchar(255) DEFAULT NULL,
  `domain_notes` text,
  `last_edited_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain_management`
--

INSERT INTO `domain_management` (`id`, `domain`, `company`, `location`, `owned_by`, `hosted_by`, `domain_ext`, `domain_cost`, `domain_r`, `host_pkg_gb`, `hosting_r`, `domain_notes`, `last_edited_by`, `created_at`, `modified_at`) VALUES
(1, 'test.co.za', 'test company', 'xneelo', 'emerge', 'godaddy', '.co.za', '10', '10', '10', '10', 'testing', '1', '2025-01-29 00:51:16', '2025-01-29 00:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `label`, `type`, `category`, `description`, `file_path`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'a', 'a', 'a', 'a', '/media_files/6/RISE-IMS__chnageing-image-02.jpg', '6', '2024-10-18 16:33:22', '2024-10-18 16:33:22'),
(9, 'b', 'b', 'b', 'b', '/media_files/6/clients_profile.png', '6', '2024-10-18 19:23:45', '2024-10-18 19:23:45'),
(10, 'c', 'c', 'c', 'c', '/media_files/6/dashboard_right_background.png', '6', '2024-10-18 19:24:00', '2024-10-18 19:24:00'),
(11, 'd', 'd', 'd', 'd', '/media_files/6/background9.jpg', '6', '2024-10-18 19:24:31', '2024-10-18 19:24:31'),
(12, 'e', 'e', 'e', 'e', '/media_files/6/Screenshot 2024-09-16 181625.png', '6', '2024-10-18 20:47:31', '2024-10-18 20:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(99) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `hosted` varchar(255) NOT NULL,
  `package_size` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `domain`, `hosted`, `package_size`, `quantity`, `cost`, `last_edited_by`, `created_at`, `modified_at`) VALUES
(3, 'marco@biodyne.co.za', '21.08', '30', '2', '480', '9', '2024-10-22 11:50:15', '2024-10-22 11:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_start_date` date NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `project_notes` text,
  `days_active` int(11) NOT NULL,
  `revision` int(11) DEFAULT '0',
  `deadline_date` date NOT NULL,
  `client_feedback` text,
  `last_edited_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `status`, `company_name`, `project_id`, `project_start_date`, `assigned_to`, `project_type`, `description`, `project_notes`, `days_active`, `revision`, `deadline_date`, `client_feedback`, `last_edited_by`, `created_at`, `updated_at`) VALUES
(1, 'My First Calendar', 'In Progress', 'Some Company', '2', '2024-09-11', 'me', 'website development', 'Building a website for Some Company', 'x y z', 10, 2, '2024-09-27', '', '6', '2024-09-15 23:21:35', '2024-10-23 14:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(99) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `user_asigned` int(99) DEFAULT NULL,
  `checklist_id` int(99) NOT NULL,
  `estimated_time` varchar(255) NOT NULL,
  `actual_time` varchar(255) DEFAULT NULL,
  `last_edited_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `mobile` varchar(99) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `access_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `mobile`, `email`, `title`, `branch`, `access_role`, `created_at`, `updated_at`) VALUES
(6, 'gevann', '$2y$10$em.gHMpEkNPYYuaememZaOzHN0mHdkqQ9UsJFpK03Tvd/bT1Baek6', 'gevann', 'mullins', '', 'gevann.mullins@gmail.com', '', '', '1', '2024-09-09 20:06:00', '2024-10-16 12:02:07'),
(8, 'test', '$2y$10$2.1GTbmURxCPxAu.zRKufONh9K9EvH803tbIksRFy4drKzUHXO3j6', 'test', 't', '1234567890', 'test@user.com', '', '', '3', '2024-09-16 09:57:18', '2024-10-16 12:02:14'),
(9, 'sean@emergestudios.co.za', '$2y$10$vu46j/RFgrJ2dGqCqnEc5OGPYqf9hB8b8opuvx4H7GmtPqAOMivSi', 'sean', 'bossenger', '1234567890', 'sean@emergestudios.co.za', 'Admin', 'Cape Town', '1', '2024-10-16 09:02:23', '2024-10-16 09:02:23'),
(10, 'casey-admin', '$2y$10$gNQeK56WLs3Po8UmwU/Z6uS8FYXCGplEANKQOHptsXVwE.l2EeBPa', 'Casey', 'Bossenger', '0810332839', 'casey@emergestudio.co.za', 'Account Manager', 'Cape Town', '1', '2024-10-25 13:57:32', '2025-01-12 15:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_roles`
--

CREATE TABLE `user_access_roles` (
  `id` int(99) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_roles`
--

INSERT INTO `user_access_roles` (`id`, `role_name`, `created_at`, `modified_at`) VALUES
(1, 'Super Admin', '2024-10-15 22:59:13', '2024-10-15 22:59:13'),
(2, 'Admin', '2024-10-15 22:59:13', '2024-10-15 22:59:13'),
(3, 'User', '2024-10-15 22:59:16', '2024-10-15 22:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(99) NOT NULL,
  `user_id` int(99) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image_path` varchar(255) NOT NULL,
  `general_notes` text NOT NULL,
  `company_notes` text NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_type` varchar(255) NOT NULL,
  `company_reg` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `job_title`, `dob`, `gender`, `country`, `mobile`, `email`, `profile_image_path`, `general_notes`, `company_notes`, `company_name`, `company_type`, `company_reg`, `created_at`, `modified_at`) VALUES
(1, 6, 'gevann', 'theMan', 'mullins', 'manager', '1980-01-15', 'Male', 'south africa', '0609564895', 'gevann.mullins@gmail.com', '/media_files/6/RISE-IMS__chnageing-image-02.jpg', 'Just some general notes                                ', 'And some company notes', 'myGM23232', 'general', '', '2024-10-18 21:48:31', '2024-10-19 10:13:08'),
(3, 9, 'Sean', '', 'Bossenger', 'CEO', '', 'Male', '', '', '', '/media_files/6/dashboard_right_background.png', '                                                ', '                                                ', 'Emerge', '', '', '2024-10-18 23:01:38', '2024-10-18 23:05:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `client_management`
--
ALTER TABLE `client_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_domainextensions`
--
ALTER TABLE `configs_domainextensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_domainlocations`
--
ALTER TABLE `configs_domainlocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_emailpackages`
--
ALTER TABLE `configs_emailpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_hostinglocations`
--
ALTER TABLE `configs_hostinglocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_hostingpackages`
--
ALTER TABLE `configs_hostingpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs_ownerships`
--
ALTER TABLE `configs_ownerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disk_usage`
--
ALTER TABLE `disk_usage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_index` (`company`) USING BTREE,
  ADD KEY `last_edited_by` (`last_edited_by`);

--
-- Indexes for table `domain_costs`
--
ALTER TABLE `domain_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_hosting`
--
ALTER TABLE `domain_hosting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_info`
--
ALTER TABLE `domain_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_management`
--
ALTER TABLE `domain_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_roles`
--
ALTER TABLE `user_access_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_management`
--
ALTER TABLE `client_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs_domainextensions`
--
ALTER TABLE `configs_domainextensions`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configs_domainlocations`
--
ALTER TABLE `configs_domainlocations`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configs_emailpackages`
--
ALTER TABLE `configs_emailpackages`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs_hostinglocations`
--
ALTER TABLE `configs_hostinglocations`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configs_hostingpackages`
--
ALTER TABLE `configs_hostingpackages`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs_ownerships`
--
ALTER TABLE `configs_ownerships`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disk_usage`
--
ALTER TABLE `disk_usage`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domain_costs`
--
ALTER TABLE `domain_costs`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domain_hosting`
--
ALTER TABLE `domain_hosting`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `domain_info`
--
ALTER TABLE `domain_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `domain_management`
--
ALTER TABLE `domain_management`
  MODIFY `id` int(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_roles`
--
ALTER TABLE `user_access_roles`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
