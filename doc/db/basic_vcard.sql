-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 07:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_vcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'backend/image/default-user.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'arobil@gmail.com', '2022-07-25 05:09:47', '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'uploads/admin/2-665ff8415c1ab.png', 'wArU8bg7sIvacA4XN3oHVijlS7yXn2Jy6Aew70dhQ1pcTUFYqGXkF7oOWDWe', '2022-07-25 05:09:47', '2024-06-12 14:13:43', 1),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'backend/image/default-user.png', NULL, '2022-08-22 05:56:33', '2022-08-22 05:56:33', 1),
(5, 'Cüneyt Kurt', 'Cuneytkurt63@gmail.com', NULL, '$2y$10$gIZOrEH1Lj/1olpcLbqBMOpd6TEzlQ9bnGPAES/0zwxjlwOJEzlm.', 'backend/image/default-user.png', NULL, '2024-06-15 18:52:34', '2024-06-15 18:52:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_de` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `details_de` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_de` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) NOT NULL,
  `config_value` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'cricketspain', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(2, 'currency', 'USD', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(3, 'timezone', 'America/New_York', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(4, 'paypal_mode', 'sandbox', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(5, 'paypal_client_id', 'Aa8_7OJaxmCZQpkx3hbzdySDz7haM0Wu6c6MmzX5JQsaywY1i8HMJo2ddnr9-pEEoRP3qvjflrxOVoXL', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(6, 'paypal_secret', 'ELMx8Z_ddA0Z597lD-dDPssM4VxBbnWvvoxb1mjuIiMCHLRSzbSN6owESivW4moqRPPYOTyl1J9QxSx0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(7, 'razorpay_key', 'YOUR_RAZORPAY_KEY', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(8, 'razorpay_secret', 'YOUR_RAZORPAY_SECRET', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(9, 'term', 'monthly', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(10, 'stripe_publishable_key', 'pk_test_51M9pqYBIRmXVjgUGW3b1i91X0uTNeU6umRaoD9UprcFLotiHpfdBwgr4MnkbZoPuKKPFmdWJFVzWTwvUgxBrcl1d00OcqJU0Ta', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(11, 'stripe_secret', 'sk_test_51M9pqYBIRmXVjgUG4VjKaH21Jm0s6KvLTcIZ6fgTqpvfIbfuVocHbjn4vOeVHX6yrJekPPw4xfphkU4EN7ItAqr500Q3kUMHc8', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(12, 'app_theme', 'blue', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(13, 'primary_image', '/frontend/assets/elements/home.gif', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(14, 'secondary_image', '/frontend/assets/elements/home.svg', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(15, 'tax_type', 'exclusive', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(16, 'invoice_prefix', 'INV-', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(17, 'invoice_name', 'mtgpro', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(18, 'invoice_email', 'sales@mtgpro.me', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(19, 'invoice_phone', '+88 01767671133', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(20, 'invoice_address', '123, lorem ipsum', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(21, 'invoice_city', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(22, 'invoice_state', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(23, 'invoice_zipcode', '1212', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(24, 'invoice_country', 'Bangaldesh', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(25, 'tax_name', 'Goods and Service Tax', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(26, 'tax_value', '0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(27, 'tax_number', '0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(28, 'email_heading', 'Thanks for using mtgpro.me. This is an invoice for your recent purchase.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(29, 'email_footer', 'If you’re having trouble with the button above, please login into your web browser.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(30, 'invoice_footer', 'Thank you very much for doing business with us. We look forward to working with you again!', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(31, 'share_content', 'Welcome to { business_name }, Here is my digital Digital Business Card, { business_url } \r\nPowered by: { appName }', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(32, 'bank_transfer', 'Bank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366\r\n\r\nBank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(33, 'stripe_endpoint_secret', 'whsec_akol6QZWkkwjhIsX5crV0PwYNGyLnRcx', '2022-06-28 16:41:12', '2022-06-28 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(255) NOT NULL DEFAULT '0',
  `message` text  NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `reason`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Dora Craft', 'kydor@mailinator.com', 0, '0', 'Omnis porro aut esse', '2024-05-30 04:22:40', '2024-05-30 04:22:40'),
(5, 'Mike Ford Mike Ford', 'peterAccelodow@gmail.com', 0, '0', 'Hi there \r\n \r\nI have just verified your SEO on  venmeo.de for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.co/unbeatable-seo/ \r\n \r\nRegards \r\nMike Ford\r\n \r\nDigital X SEO Experts \r\nhttps://www.digital-x-press.co/whatsapp-us/', '2024-06-21 03:10:07', '2024-06-21 03:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `iso_code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `symbol` varchar(191) NOT NULL,
  `subunit` varchar(191) NOT NULL,
  `subunit_to_unit` int(11) NOT NULL,
  `symbol_first` varchar(191) NOT NULL,
  `html_entity` varchar(191) NOT NULL,
  `decimal_mark` varchar(191) NOT NULL,
  `thousands_separator` varchar(191) NOT NULL,
  `iso_numeric` int(11) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `priority`, `iso_code`, `name`, `symbol`, `subunit`, `subunit_to_unit`, `symbol_first`, `html_entity`, `decimal_mark`, `thousands_separator`, `iso_numeric`, `is_default`) VALUES
(1, 1, 'EUR', 'Euro', '€', 'Cent', 100, 'true', '&#x20AC;', ',', '.', 978, 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_de` varchar(255) DEFAULT NULL,
  `url_slug` longtext NOT NULL,
  `body` longtext DEFAULT NULL,
  `body_de` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT 1,
  `meta_title` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `display_in` enum('col-1','col-2','col-3','col-4') DEFAULT NULL,
  `is_editable` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = ''Yes'', 0 = ''No''',
  `image_1` varchar(100) DEFAULT NULL,
  `content_1` text DEFAULT NULL,
  `image_2` varchar(100) DEFAULT NULL,
  `content_2` text DEFAULT NULL,
  `content_1_de` text DEFAULT NULL,
  `content_2_de` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `title`, `title_de`, `url_slug`, `body`, `body_de`, `is_active`, `order_id`, `meta_title`, `meta_keywords`, `meta_description`, `update_by`, `created_by`, `created_at`, `updated_at`, `position`, `updated_by`, `display_in`, `is_editable`, `image_1`, `content_1`, `image_2`, `content_2`, `content_1_de`, `content_2_de`) VALUES
(4, 'Privacy Policy', NULL, 'privacy-policy', '<div class=\"content_wrap mb-5\" style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><h1 class=\"mb-4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-size: 24px; font-family: Pridi, sans-serif; background-color: rgb(255, 255, 255);\"><div class=\"page\" title=\"Page 1\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Datenschutzerklärung</span></p><p><span style=\"font-family: DejaVuSans; font-size: 12pt; font-weight: 700;\">Verantwortlicher für die Datenverarbeitung ist:</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><h5 class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Cüneyt Kurt<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Westbahnhof&nbsp;</span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">1B<br> </span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">38118 Braunschweig</span></h5><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Email: info@venmeo.de</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir freuen uns über Ihr Interesse an unserem Online-Shop. Der Schutz Ihrer Privatsphäre ist für uns sehr wichtig. Nachstehend informieren wir Sie ausführlich über den Umgang mit Ihren Daten.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">1. Zugriffsdaten und Hosting</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sie können unsere Webseiten besuchen, ohne Angaben zu Ihrer Person zu machen. Bei jedem Aufruf einer Webseite speichert der Webserver lediglich automatisch ein sogenanntes Server-Logfile, das z.B. den Namen der angeforderten Datei, Ihre IP- Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert. Diese Zugriffsdaten werden ausschließlich zum Zwecke der Sicherstellung eines störungsfreien Betriebs der Seite sowie der Verbesserung unseres Angebots ausgewertet. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer korrekten Darstellung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Hosting</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Dienste zum Hosting und zur Darstellung der Webseite werden teilweise durch unsere Dienstleister im Rahmen einer Verarbeitung in unserem Auftrag erbracht. Soweit im Rahmen der vorliegenden Datenschutzerklärung nichts anderes erläutert wird, werden alle Zugriffsdaten sowie alle Daten, die in dafür vorgesehenen Formularen auf dieser Webseite erhoben werden, auf ihren Servern verarbeitet. Bei Fragen zu unseren Dienstleistern und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA</span></p></div></div></div><div class=\"page\" title=\"Page 2\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Bis zur Zertifizierung durch unsere Dienstleister stützt sich die Datenübermittlung weiterhin auf diese Grundlage: Standarddatenschutzklauseln der Europäischen Kommission</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">2. Datenverarbeitung zur Vertragsabwicklung und zur Kontaktaufnahme</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.1 Datenverarbeitung zur Vertragsabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke der Vertragsabwicklung (inkl. Anfragen zu und Abwicklung von ggf. bestehenden Gewährleistungs- und Leistungsstörungsansprüchen sowie etwaiger gesetzlicher Aktualisierungspflichten) gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO erheben wir personenbezogene Daten, wenn Sie uns diese im Rahmen Ihrer Bestellung freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Vertragsabwicklung benötigen und wir ohne deren Angabe die Bestellung nicht versenden können. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Weitere Informationen zu der Verarbeitung Ihrer Daten, insbesondere zu der Weitergabe an unsere Dienstleister zum Zwecke der Bestellungs-, Zahlungs- und Versandabwicklung, finden Sie in den nachfolgenden Abschnitten dieser Datenschutzerklärung. Nach vollständiger Abwicklung des Vertrages werden Ihre Daten für die weitere Verarbeitung eingeschränkt und nach Ablauf der steuer- und handelsrechtlichen Aufbewahrungsfristen gemäß Art. 6 Abs. 1 S. 1 lit. c DSGVO gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.2 Kundenkonto</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie hierzu Ihre Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO erteilt haben, indem Sie sich für die Eröffnung eines Kundenkontos entscheiden, verwenden wir Ihre Daten zum Zwecke der Kundenkontoeröffnung sowie zur Speicherung Ihrer Daten für weitere zukünftige Bestellungen auf unserer Webseite. Die Löschung Ihres Kundenkontos ist jederzeit möglich und kann entweder durch eine Nachricht an die in dieser Datenschutzerklärung beschriebene Kontaktmöglichkeit oder über eine dafür vorgesehene Funktion im Kundenkonto erfolgen. Nach Löschung Ihres Kundenkontos werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine</span></p></div></div></div><div class=\"page\" title=\"Page 3\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir erheben personenbezogene Daten, wenn Sie uns diese bei Eröffnung eines Kundenkontos freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Eröffnung des Kundenkontos benötigen und Sie ohne deren Angabe die Kontoeröffnung nicht abschließen können. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich. Wir verwenden die von Ihnen mitgeteilten Daten zur Vertragsabwicklung und Bearbeitung Ihrer Anfragen gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO. Die Löschung Ihres<br>Kundenkontos ist jederzeit möglich und kann entweder durch eine Nachricht an die in dieser Datenschutzerklärung beschriebene Kontaktmöglichkeit oder über eine dafür vorgesehene Funktion im Kundenkonto erfolgen. Nach Löschung Ihres Kundenkontos werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.3 Kontaktaufnahme</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der Kundenkommunikation erheben wir zur Bearbeitung Ihrer Anfragen gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO personenbezogene Daten, wenn Sie uns diese bei einer Kontaktaufnahme mit uns (z.B. per Kontaktformular oder E-Mail) freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Bearbeitung Ihrer Kontaktaufnahme benötigen. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich. Nach vollständiger Bearbeitung Ihrer Anfrage werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">3. Datenverarbeitung zum Zwecke der Versandabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Vertragserfüllung gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO geben wir Ihre Daten an den mit der Lieferung beauftragten Versanddienstleister weiter, soweit dies zur Lieferung bestellter Waren erforderlich ist.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">4. Datenverarbeitung zur Zahlungsabwicklung</span></p></div></div></div><div class=\"page\" title=\"Page 4\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei der Abwicklung von Zahlungen in unserem Online-Shop arbeiten wir mit diesen Partnern zusammen: technische Dienstleister, Kreditinstitute, Zahlungsdienstleister.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">4.1 Datenverarbeitung zur Transaktionsabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Je nach ausgewählter Zahlungsart geben wir die für die Abwicklung der Zahlungstransaktion notwendigen Daten an unsere technischen Dienstleister, die im Rahmen einer Auftragsverarbeitung für uns tätig sind, oder an die beauftragten Kreditinstitute oder an den ausgewählten Zahlungsdienstleister weiter, soweit dies zur Abwicklung der Zahlung erforderlich ist. Dies dient der Vertragserfüllung gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO. Zum Teil erheben die Zahlungsdienstleister die für die Abwicklung der Zahlung erforderlichen Daten selbst, z.B. auf ihrer eigenen Webseite oder über eine technische Einbindung im Bestellprozess. Es gilt insoweit die Datenschutzerklärung des jeweiligen Zahlungsdienstleisters.<br>Bei Fragen zu unseren Partnern für die Zahlungsabwicklung und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">4.2 Datenverarbeitung zum Zwecke der Betrugsprävention und der Optimierung unserer Zahlungsprozesse</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Gegebenenfalls geben wir unseren Dienstleistern weitere Daten, die sie zusammen mit den für die Abwicklung der Zahlung notwendigen Daten als unsere Auftragsverarbeiter zum Zwecke der Betrugsprävention und der Optimierung unserer Zahlungsprozesse (z.B. Rechnungsstellung, Abwicklung von angefochtenen Zahlungen, Unterstützung der Buchhaltung) verwenden. Dies dient gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an unserer Absicherung gegen Betrug bzw. an einem effizienten Zahlungsmanagement.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">5. Werbung per E-Mail&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">E-Mail-Newsletter mit Anmeldung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wenn Sie sich zu unserem Newsletter anmelden, verwenden wir die hierfür erforderlichen oder gesondert von Ihnen mitgeteilten Daten, um Ihnen regelmäßig unseren E-Mail-Newsletter aufgrund Ihrer Einwilligung gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO zuzusenden. Die Abmeldung vom Newsletter ist jederzeit möglich und kann entweder durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder über einen dafür vorgesehenen Link im Newsletter erfolgen. Nach Abmeldung löschen wir Ihre E-Mail-Adresse aus der Empfängerliste, soweit Sie nicht ausdrücklich in eine</span></p></div></div></div><div class=\"page\" title=\"Page 5\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">6. Cookies und weitere Technologien&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Allgemeine Informationen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Um den Besuch unserer Webseite attraktiv zu gestalten und die Nutzung bestimmter Funktionen zu ermöglichen, verwenden wir auf verschiedenen Seiten Technologien einschließlich sogenannter Cookies. Cookies sind kleine Textdateien, die automatisch auf Ihrem Endgerät gespeichert werden. Einige der von uns verwendeten Cookies werden nach Ende der Browser-Sitzung, also nach Schließen Ihres Browsers, wieder gelöscht (sog. Sitzungs-Cookies). Andere Cookies verbleiben auf Ihrem Endgerät und ermöglichen uns, Ihren Browser beim nächsten Besuch wiederzuerkennen (persistente Cookies).</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Schutz der Privatsphäre bei Endgeräten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Nutzung unseres Online-Angebots setzen wir unbedingt notwendige Technologien ein, um den ausdrücklich gewünschten Telemediendienst zur Verfügung stellen zu können. Die Speicherung von Informationen in Ihrem Endgerät oder der Zugriff auf Informationen, die bereits in Ihrem Endgerät gespeichert sind, bedürfen insoweit keiner Einwilligung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei nicht unbedingt erforderlichen Funktionen bedarf die Speicherung von Informationen in Ihrem Endgerät oder der Zugriff auf Informationen, die bereits in Ihrem Endgerät gespeichert sind, Ihrer Einwilligung. Wir weisen Sie darauf hin, dass bei Nichterteilung der Einwilligung ggf. Teile der Webseite nicht uneingeschränkt nutzbar sein können. Ihre etwaig erteilten Einwilligungen bleiben solange bestehen, bis Sie die jeweiligen Einstellungen in Ihrem Endgerät anpassen oder zurücksetzen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Etwaig nachgelagerte Datenverarbeitung durch Cookies und weitere Technologien<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden solche Technologien, die für die Nutzung bestimmter Funktionen unserer Webseite (z.B. Warenkorbfunktion) zwingend erforderlich sind. Durch diese Technologien werden IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser- Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite (z. B. Informationen zum Inhalt des Warenkorbs) erhoben und verarbeitet. Dies dient im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer optimierten Darstellung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO.</span></p></div></div></div><div class=\"page\" title=\"Page 6\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zudem verwenden wir Technologien zur Erfüllung der rechtlichen Verpflichtungen, denen wir unterliegen (z.B. um Einwilligungen in die Verarbeitung Ihrer personenbezogenen Daten nachweisen zu können) sowie zu Webanalyse und Online- Marketing. Weitere Informationen hierzu einschließlich der jeweiligen Rechtsgrundlage für die Datenverarbeitung finden Sie in den nachfolgenden Abschnitten dieser Datenschutzerklärung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Cookie-Einstellungen für Ihren Browser finden Sie unter den folgenden Links:</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Microsoft EdgeTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">SafariTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">ChromeTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">FirefoxTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">OperaTM</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie in die Verwendung der Technologien gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben, können Sie Ihre Einwilligung jederzeit widerrufen durch eine Nachricht an die in der Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">7. Einsatz von Cookies und anderen Technologien</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden auf unserer Webseite die nachfolgenden Cookies und andere Technologien von Drittanbietern. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt dies auf Grundlage Ihrer Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO. Nach Zweckfortfall und Ende des Einsatzes der jeweiligen Technologie durch uns werden die in diesem Zusammenhang erhobenen Daten gelöscht. Sie können Ihre Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen. Weitere Informationen zu Ihren Widerrufsmöglichkeiten finden Sie in dem Abschnitt \"Cookies und weitere Technologien\". Weitere Informationen einschließlich der Grundlage unserer Zusammenarbeit mit den einzelnen Anbietern finden Sie bei den einzelnen Technologien. Bei Fragen zu den Anbietern und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.1 Einsatz von Google-Diensten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden die nachfolgend dargestellten Technologien der Google Ireland Ltd., Gordon House, Barrow Street, Dublin 4, Irland („Google“). Die durch die Google Technologien automatisch erhobenen Informationen über Ihre Nutzung unserer Webseite werden in der Regel an einen Server der Google LLC, 1600 Amphitheatre Parkway Mountain View, CA 94043, USA übertragen und dort gespeichert. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt die Datenverarbeitung auf Grundlage einer für die jeweilige Technologie geschlossenen Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitergehende Informationen über die Datenverarbeitung durch Google finden Sie in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzhinweisen von Google</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p></div></div><img src=\"blob:https://venmeo.de/9804a883-4736-4056-8660-80ca6cae7228\" alt=\"page6image5557504\" width=\"101.640000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/6cf3fa6e-3333-473c-b345-fff47dfca791\" alt=\"page6image5556880\" width=\"47.352000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/91a16668-9b86-4ce3-9bbc-238a073c8915\" alt=\"page6image5556672\" width=\"59.856000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/8f57567b-fc05-4bab-9bf9-394e1e9a4265\" alt=\"page6image5556464\" width=\"53.748000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/1bd74939-4ab7-4357-92af-3b0a548ef5e3\" alt=\"page6image5556256\" width=\"49.260000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/28af2326-cad8-4594-9b1d-f0f0574fc23e\" alt=\"page6image5556048\" width=\"208.224000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 7\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google Analytics</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zweck der Webseitenanalyse werden mit Google Analytics Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite) automatisch erhoben und gespeichert, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Hierzu können Cookies eingesetzt werden. Wenn Sie unsere Webseite aus der EU besuchen, wird Ihre IP-Adresse auf einem Server mit Stand in der EU zur Ableitung von Standortdaten gespeichert und danach sofort gelöscht, bevor der Traffic zur Verarbeitung auf weiteren Servern von Google weitergeleitet wird. Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung über die Auftragsverarbeitung durch Google.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke der optimierten Vermarktung unserer Webseite haben wir die&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Datenfreigabeeinstellungen für \"Google-Produkte und -Dienste\"&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">aktiviert. So kann Google auf die von Google Analytics erhobenen und verarbeiteten Daten zugreifen und anschließend zur Verbesserung der Google-Dienste verwenden. Die Datenfreigabe an Google im Rahmen dieser Datenfreigabeeinstellungen erfolgt auf Grundlage einer zusätzlichen Vereinbarung zwischen Verantwortlichen. Wir haben keinen Einfluss auf die anschließende Datenverarbeitung durch Google.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wenn Sie uns&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">keine Einwilligung&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO in den Einsatz von Google Analytics erteilen, werden keine Cookies auf Ihr Gerät gespeichert oder ausgelesen. Die in den vorigen Absätzen beschriebene Datenverarbeitung findet nicht statt. Um Lücken in der Webanalyse durch Verhaltens- und Conversion-Modellierung zu schließen, werden Pings mit Daten (User-Agent, Informationen zu Ihrem Einwilligungsverhalten, Bildschirmauflösung, IP-Adresse) an Google gesendet.&nbsp;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google Maps</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur visuellen Darstellung von geographischen Informationen werden durch Google Maps Daten über Ihre Nutzung der Maps-Funktionen, insbesondere die IP-Adresse sowie Standortdaten, erhoben, an Google übermittelt und anschließend von Google verarbeitet. Wir haben keinen Einfluss auf diese anschließende Datenverarbeitung.</span></p></div></div></div><div class=\"page\" title=\"Page 8\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google reCAPTCHA</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke des Schutzes vor Missbrauch unserer Web-Formulare sowie vor Spam durch automatisierte Software (sog. Bots) erhebt Google reCAPTCHA Daten (IP- Adresse, Zeitpunkt des Besuchs, Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite) und führt mittels eines sog. JavaScript sowie Cookies eine Analyse Ihrer Nutzung unserer Webseite durch. Daneben werden andere, durch Google Dienste in Ihrem Browser gespeicherte Cookies ausgewertet. Ein Auslesen oder Speichern von personenbezogenen Daten aus den Eingabefeldern des jeweiligen Formulars findet nicht statt.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">YouTube Video Plugin</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Einbindung von Inhalten Dritter werden über das YouTube Video Plugin in dem von uns verwendeten erweiterten Datenschutzmodus Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen) erhoben, an Google übermittelt und anschließend von Google verarbeitet, nur wenn Sie ein Video abspielen.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.2 Einsatz von Microsoft-Diensten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden die nachfolgend dargestellten Technologien der Microsoft Ireland Operations Ltd., One Microsoft Place, South County Business Park, Leopardstown, Dublin 18, D18 P521, Irland („Microsoft“). Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Die durch die Microsoft Technologien automatisch erhobenen Informationen über Ihre Nutzung unserer Webseite werden in der Regel an einen Server der Microsoft Corporation, One Microsoft Way, Redmond, WA 98052-6399, USA übertragen und dort gespeichert. Weitergehende Informationen über die Datenverarbeitung durch Microsoft finden Sie in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzhinweisen von Microsoft</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Webseitenanalyse und Ereignisverfolgung messen wir über das Microsoft Advertising&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Universal Event Tracking&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">(UET) Ihr nachfolgendes Nutzungsverhalten, wenn Sie über eine Werbeanzeige von Microsoft Advertising auf unsere Website</span></p></div></div><img src=\"blob:https://venmeo.de/9e4c7bc4-00c4-4f6d-981d-b111a85240f2\" alt=\"page8image5879616\" width=\"220.992000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 9\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gelangt sind. Hierzu können Cookies eingesetzt und Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite anhand von uns vorgegebenen Ereignissen wie z.B. Besuch einer Webseite oder Newsletteranmeldung) erfasst werden, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Soweit Ihre internetfähigen Geräte mit Ihrem Microsoft-Konto verknüpft sind und Sie die Einstellung „Interessensbezogene Werbung“ in Ihrem Microsoft Konto nicht deaktiviert haben, kann Microsoft Berichte über das Nutzungsverhalten (insb. die geräteübergreifenden Nutzerzahlen) erstellen, auch wenn Sie Ihr Endgerät wechseln, sog. „Cross-Device Tracking“. Eine Verarbeitung von personenbezogenen Daten findet durch uns insoweit nicht statt, wir erhalten lediglich auf Basis von Microsoft UET erstellte Statistiken.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Bing Maps</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur visuellen Darstellung von geographischen Informationen werden durch Bing Maps Daten über Ihre Nutzung der Maps-Funktionen, insbesondere die IP-Adresse sowie Standortdaten, erhoben, an Microsoft übermittelt und von Microsoft verarbeitet. Wir haben keinen Einfluss auf diese Datenverarbeitung.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.3 Einsatz von Facebook-Diensten&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Facebook Analysen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der Facebook Business-Tools werden aus den mit dem Facebook Pixel erhobenen Daten über Ihre Nutzung unserer Webseite Statistiken über Besucheraktivitäten auf unserer Webseite erstellt. Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung über die Auftragsverarbeitung durch Facebook (by Meta). Ihre Analyse dient der optimalen Darstellung und Vermarktung unserer Webseite.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Facebook Ads (Werbeanzeigenmanager)</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Über Facebook Ads werben wir für diese Website auf Facebook (by Meta) sowie auf anderen Plattformen. Wir bestimmen die Parameter der jeweiligen Werbekampagne. Für die genaue Umsetzung, insbesondere die Entscheidung über die Platzierung der Anzeigen bei einzelnen Nutzern, ist Facebook (by Meta) verantwortlich. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt die Datenverarbeitung auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Die gemeinsame Verantwortlichkeit beschränkt sich auf die Erhebung der Daten und ihre Übermittlung an Meta Platforms Ireland. Die anschließende Datenverarbeitung durch Meta Platforms Ireland ist hiervon nicht erfasst.</span></p></div></div></div><div class=\"page\" title=\"Page 10\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">8. Integration des Trusted Shops Trustbadges/ sonstiger Widgets</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sofern Sie hierzu Ihre Einwilligung gem. Art. 6 Abs. 1 S. 1 lit. a DSGVO erteilt haben, sind auf dieser Webseite Trusted Shops Widgets zur Anzeige der Trusted Shops Leistungen (z. B. Gütesiegel, gesammelte Bewertungen) sowie zum Angebot der Trusted Shops Produkte für Käufer nach einer Bestellung eingebunden.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge und die damit beworbenen Dienste sind ein Angebot der Trusted Shops AG, Subbelrather Str. 15C, 50823 Köln (\"Trusted Shops\"), mit der wir gemeinsam nach Art. 26 DSGVO datenschutzrechtlich Verantwortlicher sind. Wir informieren Sie im Rahmen dieser Datenschutzhinweise im Folgenden über die wesentlichen Vertragsinhalte nach Art. 26 Abs. 2 DSGVO.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der zwischen uns und der Trusted Shops AG bestehenden gemeinsamen Verantwortlichkeit wenden Sie sich bei Datenschutzfragen und zur Geltendmachung Ihrer Rechte bitte bevorzugt an die Trusted Shops unter Nutzung der in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzinformationen&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">angegebenen Kontaktmöglichkeiten. Unabhängig davon können Sie sich aber immer an den Verantwortlichen Ihrer Wahl wenden. Ihre Anfrage wird dann, falls erforderlich, zur Beantwortung an den weiteren Verantwortlichen weitergegeben.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">8.1 Datenverarbeitung bei Einbindung des Trustbadges/ sonstiger Widgets</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge wird durch einen US-amerikanischen CDN-Anbieter (Content-Delivery- Network) zur Verfügung gestellt. Ein angemessenes Datenschutzniveau wird jeweils durch einen Angemessenheitsbeschluss der EU Kommission sichergestellt, der für die USA&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">abrufbar ist. Eingesetzte Dienstleister aus den USA sind in der Regel unter dem EU-U.S. Data Privacy Framework (DPF) zertifiziert. Weitere Informationen erhalten Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern eingesetzte Dienstleister nicht unter dem DPF zertifiziert sind, wurden Standardvertragsklauseln als geeignete Garantie abgeschlossen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Aufruf des Trustbadges speichert der Webserver automatisch ein sogenanntes Server-Logfile, das auch Ihre IP-Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert. Die IP-Adresse wird unmittelbar nach der Erhebung anonymisiert, sodass die gespeicherten Daten Ihrer Person nicht zugeordnet werden können. Die anonymisierten Daten werden insbesondere für statistische Zwecke und zur Fehleranalyse genutzt.</span></p></div></div><img src=\"blob:https://venmeo.de/b046f83b-5658-40a5-9622-9cfa2cd84fd4\" alt=\"page10image6370512\" width=\"160.356000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/ac5202f4-1fce-4c1e-b1b6-140708003b54\" alt=\"page10image6370928\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/df22ada5-de25-42a7-b4b1-f48fcee95385\" alt=\"page10image6371136\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 11\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">8.2 Datenverarbeitung nach Bestellabschluss</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sofern Sie Ihre Einwilligung erteilt haben, greift das Trustbadge nach Bestellabschluss auf in Ihrer Endeinrichtung gespeicherte Bestellinformationen (Bestellsumme, Bestellnummer, ggf. gekauftes Produkt) sowie E-Mailadresse zu und Ihre E-Mail- Adresse wird per kryptologischer Einwegfunktion gehasht. Der Hash-Wert wird anschließend mit den Bestellinformationen gem. Art. 6 Abs. 1 S. 1 lit. a DSGVO an Trusted Shops übermittelt.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Dies dient der Überprüfung, ob Sie bereits für Dienste von Trusted Shops registriert sind. Ist dies der Fall, so erfolgt die weitere Verarbeitung gemäß der zwischen Ihnen und Trusted Shops getroffenen&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">vertraglichen Vereinbarung</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern Sie noch nicht für die Services registriert sind oder Ihre Einwilligung zur automatischen Erkennung über das Trustbadge nicht erteilen, erhalten Sie im Anschluss die Möglichkeit, sich manuell für die Nutzung der Services zu registrieren bzw. die Absicherung im Rahmen Ihres ggf. bereits bestehenden Nutzungsvertrages abzuschließen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge greift zu diesem Zwecke nach Abschluss Ihrer Bestellung auf folgende Informationen zu, die in der von Ihnen verwendeten Endeinrichtung gespeichert sind: Bestellsumme, Bestellnummer und E-Mail-Adresse. Dies ist erforderlich, damit wir Ihnen den Käuferschutz anbieten können. Eine Übermittlung der Daten an Trusted Shops erfolgt erst, wenn Sie sich aktiv für den Abschluss des Käuferschutzes durch Klick auf den entsprechend bezeichneten Button in der sogenannten Trustcard entscheiden. Sofern Sie sich für die Nutzung der Services entscheiden, richtet sich die weitere Verarbeitung nach der vertraglichen Vereinbarung mit Trusted Shops gem. Art. 6 Abs. 1 lit. b DSGVO, um Ihre Registrierung für den Käuferschutz abschließen und die Bestellung absichern zu können sowie Ihnen ggf. im Anschluss Bewertungseinladungen per E-Mail zusenden zu können.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Trusted Shops setzt Dienstleister in den Bereichen Hosting, Monitoring und Logging ein. Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO zum Zwecke der Sicherstellung eines störungsfreien Betriebs. Dabei kann eine Verarbeitung in Drittländern (USA und Israel) stattfinden. Ein angemessenes Datenschutzniveau wird jeweils durch einen Angemessenheitsbeschluss der EU Kommission sichergestellt, der für die USA&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">und für Israel&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">abrufbar ist. Eingesetzte Dienstleister aus den USA sind in der Regel unter dem EU-U.S. Data Privacy Framework (DPF) zertifiziert. Weitere Informationen erhalten Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern eingesetzte Dienstleister nicht unter dem DPF zertifiziert sind, wurden Standardvertragsklauseln als geeignete Garantie abgeschlossen.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">9. Social Media</span></p></div></div><img src=\"blob:https://venmeo.de/27de7cae-60ed-4dc4-a618-b592d6d5c670\" alt=\"page11image5980160\" width=\"165.828000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/0296e5e6-8354-447e-94c4-b2c6d9c6bb42\" alt=\"page11image5980368\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/13ddfc87-dcf7-4789-b8ad-e28fb7db1ecc\" alt=\"page11image5980576\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/6b4a5d84-66dd-4550-bd75-a2a4a0db1f23\" alt=\"page11image5980784\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 12\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Unsere Onlinepräsenz auf Facebook (by Meta), X (ehemals: Twitter), Instagram (by Meta), Youtube, Pinterest, LinkedIn, Xing</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie hierzu Ihre Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO gegenüber dem jeweiligen Social Media Betreiber erteilt haben, werden bei Besuch unserer Onlinepräsenzen auf den in der oben genannten sozialen Medien Ihre Daten für Marktforschungs- und Werbezwecke automatisch erhoben und gespeichert, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Diese können verwendet werden, um z.B. Werbeanzeigen innerhalb und außerhalb der Plattformen zu schalten, die mutmaßlich Ihren Interessen entsprechen. Hierzu werden im Regelfall Cookies eingesetzt. Die detaillierten Informationen zur Verarbeitung und Nutzung der Daten durch den jeweiligen Social Media Betreiber sowie eine Kontaktmöglichkeit und Ihre diesbezüglichen Rechte und Einstellungsmöglichkeiten zum Schutz Ihrer Privatsphäre, entnehmen Sie bitte den unten verlinkten Datenschutzhinweisen der Anbieter. Sollten Sie diesbezüglich dennoch Hilfe benötigen, können Sie sich an uns wenden.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Facebook&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">(by Meta)&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Meta Platforms Ireland Ltd., Block J, Serpentine Avenue, Dublin 4, Irland („Meta Platforms Ireland“). Die durch Meta Platforms Ireland automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Facebook (by Meta) werden in der Regel an einen Server der Meta Platforms, Inc., 1601 Willow Road, Menlo Park, California 94025, USA übertragen und dort gespeichert. Die Datenverarbeitung im Rahmen des Besuchs einer Facebook (by Meta) Fanpage erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitere Informationen (Informationen zu Insights-Daten) finden Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA, Kanada, Japan, Südkorea, Neuseeland, Vereinigtes Königreich, Argentinien.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Eine Zertifizierung liegt vor.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in diesen Ländern: Australien, Hongkong, Indien, Indonesien, Malaysia, Singapur, Thailand, Taiwan, Brasilien, Mexiko. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit Ihnen stützt sich auf diese Garantien: Standarddatenschutzklauseln der Europäischen Kommission.</span></p></div></div><img src=\"blob:https://venmeo.de/eb6179cd-f1ca-494c-87b3-1f37fe46d8c5\" alt=\"page12image5763680\" width=\"69.312000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/c38478a5-ac3d-495a-9c38-a13dff4c17c1\" alt=\"page12image5340816\" width=\"58.224000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/cc541db2-4a0e-4be0-a295-aa35295a6b95\" alt=\"page12image5340608\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 13\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">X&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Twitter International Unlimited Company, One Cumberland Place, Fenian Street, Dublin 2, D02 AX07, Irland („X“). Die von X automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf X werden in der Regel an einen Server der X Corp., 1355 Market Street, Suite 900, San Francisco, CA 94103, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Instagram&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">(by Meta)&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Meta Platforms Ireland Ltd., Block J, Serpentine Avenue, Dublin 4, Irland („Meta Platforms Ireland“) Die durch Meta Platforms Ireland automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Instagram werden in der Regel an einen Server der Meta Platforms, Inc., 1601 Willow Road, Menlo Park, CA 94025, USA, Menlo Park, California 94025, USA übertragen und dort gespeichert. Die Datenverarbeitung im Rahmen des Besuchs einer Instagram (by Meta) Fanpage erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitere Informationen (Informationen zu Insights-Daten) finden Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA, Kanada, Japan, Südkorea, Neuseeland, Vereinigtes Königreich, Argentinien.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Eine Zertifizierung liegt vor.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in diesen Ländern: Australien, Hongkong, Indien, Indonesien, Malaysia, Singapur, Thailand, Taiwan, Brasilien, Mexiko. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit Ihnen stützt sich auf diese Garantien: Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">YouTube&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Google Ireland Ltd., Gordon House, Barrow Street, Dublin 4, Irland („Google“). Die von Google automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf YouTube werden in der Regel an einen Server der</span></p></div></div><img src=\"blob:https://venmeo.de/4407f624-6a84-4160-a04b-abd696162503\" alt=\"page13image6062496\" width=\"69.624000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/2d10ce84-394e-494a-a9ec-bfb19f19fa54\" alt=\"page13image6062912\" width=\"62.040000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/0b31b558-1a8b-45bd-b711-04d15e28d77a\" alt=\"page13image6063120\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/6437b076-b30f-46b7-8678-2a3ece1d93d4\" alt=\"page13image6063328\" width=\"59.460000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 14\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Google LLC, 1600 Amphitheatre Parkway Mountain View, CA 94043, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Pinterest&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Pinterest Europe Ltd., Palmerston House, 2nd Floor, Fenian Street, Dublin 2, Irland („Pinterest“). Die von Pinterest automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Pinterest werden in der Regel an einen Server der Pinterest, Inc., 505 Brannan St., San Francisco, CA 94107, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">LinkedIn&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der LinkedIn Ireland Unlimited Company, Wilton Place, Dublin 2, Irland („LinkedIn“). Die von LinkedIn automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf LinkedIn werden in der Regel an einen Server der LinkedIn Corporation, 1000 W. Maude Avenue, Sunnyvale, CA 94085, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Bis zur Zertifizierung durch unsere Dienstleister stützt sich die Datenübermittlung weiterhin auf diese Grundlage: Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Xing&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der New Work SE, Am Strandkai 1, 20457 Hamburg, Deutschland.</span></p></div></div><img src=\"blob:https://venmeo.de/cfb1337b-33ac-48d1-8331-f5bee646f679\" alt=\"page14image6272000\" width=\"66.960000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/b9b3b493-efaa-4618-84fe-e5efc9490b24\" alt=\"page14image6272416\" width=\"62.724000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/95d5f919-a8d6-4114-9f66-796a2b8e8102\" alt=\"page14image6272624\" width=\"35.208000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 15\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">10. Kontaktmöglichkeiten und Ihre Rechte&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">10.1 Ihre Rechte</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Als Betroffener haben Sie folgende Rechte:</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 15 DSGVO das Recht, in dem dort bezeichneten Umfang Auskunft über Ihre von uns verarbeiteten personenbezogenen Daten zu verlangen; gemäß Art. 16 DSGVO das Recht, unverzüglich die Berichtigung unrichtiger oder Vervollständigung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 17 DSGVO das Recht, die Löschung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen, soweit nicht die weitere Verarbeitung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">zur Ausübung des Rechts auf freie Meinungsäußerung und Information; zur Erfüllung einer rechtlichen Verpflichtung;<br>aus Gründen des öffentlichen Interesses oder<br>zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen erforderlich ist;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 18 DSGVO das Recht, die Einschränkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen, soweit</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">die Richtigkeit der Daten von Ihnen bestritten wird;<br>die Verarbeitung unrechtmäßig ist, Sie aber deren Löschung ablehnen;<br>wir die Daten nicht mehr benötigen, Sie diese jedoch zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder<br>Sie gemäß Art. 21 DSGVO Widerspruch gegen die Verarbeitung eingelegt haben;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 20 DSGVO das Recht, Ihre personenbezogenen Daten, die Sie uns bereitgestellt haben, in einem strukturierten, gängigen und maschinenlesbaren Format zu erhalten oder die Übermittlung an einen anderen Verantwortlichen zu verlangen;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 77 DSGVO das Recht, sich bei einer Aufsichtsbehörde zu beschweren. In der Regel können Sie sich hierfür an die Aufsichtsbehörde Ihres üblichen Aufenthaltsortes oder Arbeitsplatzes oder unseres Unternehmenssitzes wenden.</span></p></div></div></div><div class=\"page\" title=\"Page 16\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"section\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Widerspruchsrecht</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit wir zur Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen personenbezogene Daten wie oben erläutert verarbeiten, können Sie dieser Verarbeitung mit Wirkung für die Zukunft widersprechen. Erfolgt die Verarbeitung zu Zwecken des Direktmarketings, können Sie dieses Recht jederzeit wie oben beschrieben ausüben. Soweit die Verarbeitung zu anderen Zwecken erfolgt, steht Ihnen ein Widerspruchsrecht nur bei Vorliegen von Gründen, die sich aus Ihrer besonderen Situation ergeben, zu.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Nach Ausübung Ihres Widerspruchsrechts werden wir Ihre personenbezogenen Daten nicht weiter zu diesen Zwecken verarbeiten, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder wenn die Verarbeitung der Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen dient.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Dies gilt nicht, wenn die Verarbeitung zu Zwecken des Direktmarketings erfolgt. Dann werden wir Ihre personenbezogenen Daten nicht weiter zu diesem Zweck verarbeiten.</span></p></div></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">10.2 Kontaktmöglichkeiten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Fragen zur Erhebung, Verarbeitung oder Nutzung Ihrer personenbezogenen Daten, bei Auskünften, Berichtigung, Einschränkung oder Löschung von Daten sowie Widerruf erteilter Einwilligungen oder Widerspruch gegen eine bestimmte Datenverwendung wenden Sie sich bitte direkt an uns über die Kontaktdaten in unserem Impressum.</span></p></div></div></div></h1></div>', '<div class=\"page\" title=\"Page 1\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Datenschutzerklärung</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Verantwortlicher für die Datenverarbeitung ist:</span></p><h5 class=\"\" style=\"font-family: Pridi, sans-serif; color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Cüneyt Kurt<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Westbahnhof&nbsp;</span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">1B<br></span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">38118 Braunschweig</span></h5><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Email: info@venmeo.de</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir freuen uns über Ihr Interesse an unserem Online-Shop. Der Schutz Ihrer Privatsphäre ist für uns sehr wichtig. Nachstehend informieren wir Sie ausführlich über den Umgang mit Ihren Daten.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">1. Zugriffsdaten und Hosting</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sie können unsere Webseiten besuchen, ohne Angaben zu Ihrer Person zu machen. Bei jedem Aufruf einer Webseite speichert der Webserver lediglich automatisch ein sogenanntes Server-Logfile, das z.B. den Namen der angeforderten Datei, Ihre IP- Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert. Diese Zugriffsdaten werden ausschließlich zum Zwecke der Sicherstellung eines störungsfreien Betriebs der Seite sowie der Verbesserung unseres Angebots ausgewertet. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer korrekten Darstellung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Hosting</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Dienste zum Hosting und zur Darstellung der Webseite werden teilweise durch unsere Dienstleister im Rahmen einer Verarbeitung in unserem Auftrag erbracht. Soweit im Rahmen der vorliegenden Datenschutzerklärung nichts anderes erläutert wird, werden alle Zugriffsdaten sowie alle Daten, die in dafür vorgesehenen Formularen auf dieser Webseite erhoben werden, auf ihren Servern verarbeitet. Bei Fragen zu unseren Dienstleistern und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA</span></p></div></div></div><div class=\"page\" title=\"Page 2\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Bis zur Zertifizierung durch unsere Dienstleister stützt sich die Datenübermittlung weiterhin auf diese Grundlage: Standarddatenschutzklauseln der Europäischen Kommission</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">2. Datenverarbeitung zur Vertragsabwicklung und zur Kontaktaufnahme</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.1 Datenverarbeitung zur Vertragsabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke der Vertragsabwicklung (inkl. Anfragen zu und Abwicklung von ggf. bestehenden Gewährleistungs- und Leistungsstörungsansprüchen sowie etwaiger gesetzlicher Aktualisierungspflichten) gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO erheben wir personenbezogene Daten, wenn Sie uns diese im Rahmen Ihrer Bestellung freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Vertragsabwicklung benötigen und wir ohne deren Angabe die Bestellung nicht versenden können. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Weitere Informationen zu der Verarbeitung Ihrer Daten, insbesondere zu der Weitergabe an unsere Dienstleister zum Zwecke der Bestellungs-, Zahlungs- und Versandabwicklung, finden Sie in den nachfolgenden Abschnitten dieser Datenschutzerklärung. Nach vollständiger Abwicklung des Vertrages werden Ihre Daten für die weitere Verarbeitung eingeschränkt und nach Ablauf der steuer- und handelsrechtlichen Aufbewahrungsfristen gemäß Art. 6 Abs. 1 S. 1 lit. c DSGVO gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.2 Kundenkonto</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie hierzu Ihre Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO erteilt haben, indem Sie sich für die Eröffnung eines Kundenkontos entscheiden, verwenden wir Ihre Daten zum Zwecke der Kundenkontoeröffnung sowie zur Speicherung Ihrer Daten für weitere zukünftige Bestellungen auf unserer Webseite. Die Löschung Ihres Kundenkontos ist jederzeit möglich und kann entweder durch eine Nachricht an die in dieser Datenschutzerklärung beschriebene Kontaktmöglichkeit oder über eine dafür vorgesehene Funktion im Kundenkonto erfolgen. Nach Löschung Ihres Kundenkontos werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine</span></p></div></div></div><div class=\"page\" title=\"Page 3\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir erheben personenbezogene Daten, wenn Sie uns diese bei Eröffnung eines Kundenkontos freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Eröffnung des Kundenkontos benötigen und Sie ohne deren Angabe die Kontoeröffnung nicht abschließen können. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich. Wir verwenden die von Ihnen mitgeteilten Daten zur Vertragsabwicklung und Bearbeitung Ihrer Anfragen gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO. Die Löschung Ihres<br>Kundenkontos ist jederzeit möglich und kann entweder durch eine Nachricht an die in dieser Datenschutzerklärung beschriebene Kontaktmöglichkeit oder über eine dafür vorgesehene Funktion im Kundenkonto erfolgen. Nach Löschung Ihres Kundenkontos werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">2.3 Kontaktaufnahme</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der Kundenkommunikation erheben wir zur Bearbeitung Ihrer Anfragen gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO personenbezogene Daten, wenn Sie uns diese bei einer Kontaktaufnahme mit uns (z.B. per Kontaktformular oder E-Mail) freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Bearbeitung Ihrer Kontaktaufnahme benötigen. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich. Nach vollständiger Bearbeitung Ihrer Anfrage werden Ihre Daten gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">3. Datenverarbeitung zum Zwecke der Versandabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Vertragserfüllung gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO geben wir Ihre Daten an den mit der Lieferung beauftragten Versanddienstleister weiter, soweit dies zur Lieferung bestellter Waren erforderlich ist.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">4. Datenverarbeitung zur Zahlungsabwicklung</span></p></div></div></div><div class=\"page\" title=\"Page 4\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei der Abwicklung von Zahlungen in unserem Online-Shop arbeiten wir mit diesen Partnern zusammen: technische Dienstleister, Kreditinstitute, Zahlungsdienstleister.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">4.1 Datenverarbeitung zur Transaktionsabwicklung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Je nach ausgewählter Zahlungsart geben wir die für die Abwicklung der Zahlungstransaktion notwendigen Daten an unsere technischen Dienstleister, die im Rahmen einer Auftragsverarbeitung für uns tätig sind, oder an die beauftragten Kreditinstitute oder an den ausgewählten Zahlungsdienstleister weiter, soweit dies zur Abwicklung der Zahlung erforderlich ist. Dies dient der Vertragserfüllung gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO. Zum Teil erheben die Zahlungsdienstleister die für die Abwicklung der Zahlung erforderlichen Daten selbst, z.B. auf ihrer eigenen Webseite oder über eine technische Einbindung im Bestellprozess. Es gilt insoweit die Datenschutzerklärung des jeweiligen Zahlungsdienstleisters.<br>Bei Fragen zu unseren Partnern für die Zahlungsabwicklung und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">4.2 Datenverarbeitung zum Zwecke der Betrugsprävention und der Optimierung unserer Zahlungsprozesse</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Gegebenenfalls geben wir unseren Dienstleistern weitere Daten, die sie zusammen mit den für die Abwicklung der Zahlung notwendigen Daten als unsere Auftragsverarbeiter zum Zwecke der Betrugsprävention und der Optimierung unserer Zahlungsprozesse (z.B. Rechnungsstellung, Abwicklung von angefochtenen Zahlungen, Unterstützung der Buchhaltung) verwenden. Dies dient gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an unserer Absicherung gegen Betrug bzw. an einem effizienten Zahlungsmanagement.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">5. Werbung per E-Mail&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">E-Mail-Newsletter mit Anmeldung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wenn Sie sich zu unserem Newsletter anmelden, verwenden wir die hierfür erforderlichen oder gesondert von Ihnen mitgeteilten Daten, um Ihnen regelmäßig unseren E-Mail-Newsletter aufgrund Ihrer Einwilligung gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO zuzusenden. Die Abmeldung vom Newsletter ist jederzeit möglich und kann entweder durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder über einen dafür vorgesehenen Link im Newsletter erfolgen. Nach Abmeldung löschen wir Ihre E-Mail-Adresse aus der Empfängerliste, soweit Sie nicht ausdrücklich in eine</span></p></div></div></div><div class=\"page\" title=\"Page 5\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">weitere Nutzung Ihrer Daten gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">6. Cookies und weitere Technologien&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Allgemeine Informationen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Um den Besuch unserer Webseite attraktiv zu gestalten und die Nutzung bestimmter Funktionen zu ermöglichen, verwenden wir auf verschiedenen Seiten Technologien einschließlich sogenannter Cookies. Cookies sind kleine Textdateien, die automatisch auf Ihrem Endgerät gespeichert werden. Einige der von uns verwendeten Cookies werden nach Ende der Browser-Sitzung, also nach Schließen Ihres Browsers, wieder gelöscht (sog. Sitzungs-Cookies). Andere Cookies verbleiben auf Ihrem Endgerät und ermöglichen uns, Ihren Browser beim nächsten Besuch wiederzuerkennen (persistente Cookies).</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Schutz der Privatsphäre bei Endgeräten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Nutzung unseres Online-Angebots setzen wir unbedingt notwendige Technologien ein, um den ausdrücklich gewünschten Telemediendienst zur Verfügung stellen zu können. Die Speicherung von Informationen in Ihrem Endgerät oder der Zugriff auf Informationen, die bereits in Ihrem Endgerät gespeichert sind, bedürfen insoweit keiner Einwilligung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei nicht unbedingt erforderlichen Funktionen bedarf die Speicherung von Informationen in Ihrem Endgerät oder der Zugriff auf Informationen, die bereits in Ihrem Endgerät gespeichert sind, Ihrer Einwilligung. Wir weisen Sie darauf hin, dass bei Nichterteilung der Einwilligung ggf. Teile der Webseite nicht uneingeschränkt nutzbar sein können. Ihre etwaig erteilten Einwilligungen bleiben solange bestehen, bis Sie die jeweiligen Einstellungen in Ihrem Endgerät anpassen oder zurücksetzen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Etwaig nachgelagerte Datenverarbeitung durch Cookies und weitere Technologien<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden solche Technologien, die für die Nutzung bestimmter Funktionen unserer Webseite (z.B. Warenkorbfunktion) zwingend erforderlich sind. Durch diese Technologien werden IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser- Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite (z. B. Informationen zum Inhalt des Warenkorbs) erhoben und verarbeitet. Dies dient im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer optimierten Darstellung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO.</span></p></div></div></div><div class=\"page\" title=\"Page 6\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zudem verwenden wir Technologien zur Erfüllung der rechtlichen Verpflichtungen, denen wir unterliegen (z.B. um Einwilligungen in die Verarbeitung Ihrer personenbezogenen Daten nachweisen zu können) sowie zu Webanalyse und Online- Marketing. Weitere Informationen hierzu einschließlich der jeweiligen Rechtsgrundlage für die Datenverarbeitung finden Sie in den nachfolgenden Abschnitten dieser Datenschutzerklärung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Cookie-Einstellungen für Ihren Browser finden Sie unter den folgenden Links:</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Microsoft EdgeTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">SafariTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">ChromeTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">FirefoxTM&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">/&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">OperaTM</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie in die Verwendung der Technologien gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO eingewilligt haben, können Sie Ihre Einwilligung jederzeit widerrufen durch eine Nachricht an die in der Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">7. Einsatz von Cookies und anderen Technologien</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden auf unserer Webseite die nachfolgenden Cookies und andere Technologien von Drittanbietern. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt dies auf Grundlage Ihrer Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO. Nach Zweckfortfall und Ende des Einsatzes der jeweiligen Technologie durch uns werden die in diesem Zusammenhang erhobenen Daten gelöscht. Sie können Ihre Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen. Weitere Informationen zu Ihren Widerrufsmöglichkeiten finden Sie in dem Abschnitt \"Cookies und weitere Technologien\". Weitere Informationen einschließlich der Grundlage unserer Zusammenarbeit mit den einzelnen Anbietern finden Sie bei den einzelnen Technologien. Bei Fragen zu den Anbietern und der Grundlage unserer Zusammenarbeit mit ihnen wenden Sie sich bitte an die in dieser Datenschutzerklärung beschriebenen Kontaktmöglichkeit.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.1 Einsatz von Google-Diensten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden die nachfolgend dargestellten Technologien der Google Ireland Ltd., Gordon House, Barrow Street, Dublin 4, Irland („Google“). Die durch die Google Technologien automatisch erhobenen Informationen über Ihre Nutzung unserer Webseite werden in der Regel an einen Server der Google LLC, 1600 Amphitheatre Parkway Mountain View, CA 94043, USA übertragen und dort gespeichert. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt die Datenverarbeitung auf Grundlage einer für die jeweilige Technologie geschlossenen Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitergehende Informationen über die Datenverarbeitung durch Google finden Sie in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzhinweisen von Google</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p></div></div><img src=\"blob:https://venmeo.de/876c9fbc-7e3b-4250-823f-6d3e2d5db262\" alt=\"page6image5557504\" width=\"101.640000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/40a6f202-3ef6-4967-9f60-6accb35f7f43\" alt=\"page6image5556880\" width=\"47.352000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/1321250f-315e-4132-b7d7-0b94fd1ad1fd\" alt=\"page6image5556672\" width=\"59.856000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/92da85a4-5206-423d-a7a1-e47d3ff3b494\" alt=\"page6image5556464\" width=\"53.748000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/b2915ef2-10a0-4d56-b4d0-c5046128c468\" alt=\"page6image5556256\" width=\"49.260000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/4eeff525-b875-436b-92d1-93349f64711c\" alt=\"page6image5556048\" width=\"208.224000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 7\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google Analytics</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zweck der Webseitenanalyse werden mit Google Analytics Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite) automatisch erhoben und gespeichert, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Hierzu können Cookies eingesetzt werden. Wenn Sie unsere Webseite aus der EU besuchen, wird Ihre IP-Adresse auf einem Server mit Stand in der EU zur Ableitung von Standortdaten gespeichert und danach sofort gelöscht, bevor der Traffic zur Verarbeitung auf weiteren Servern von Google weitergeleitet wird. Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung über die Auftragsverarbeitung durch Google.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke der optimierten Vermarktung unserer Webseite haben wir die&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Datenfreigabeeinstellungen für \"Google-Produkte und -Dienste\"&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">aktiviert. So kann Google auf die von Google Analytics erhobenen und verarbeiteten Daten zugreifen und anschließend zur Verbesserung der Google-Dienste verwenden. Die Datenfreigabe an Google im Rahmen dieser Datenfreigabeeinstellungen erfolgt auf Grundlage einer zusätzlichen Vereinbarung zwischen Verantwortlichen. Wir haben keinen Einfluss auf die anschließende Datenverarbeitung durch Google.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wenn Sie uns&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">keine Einwilligung&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO in den Einsatz von Google Analytics erteilen, werden keine Cookies auf Ihr Gerät gespeichert oder ausgelesen. Die in den vorigen Absätzen beschriebene Datenverarbeitung findet nicht statt. Um Lücken in der Webanalyse durch Verhaltens- und Conversion-Modellierung zu schließen, werden Pings mit Daten (User-Agent, Informationen zu Ihrem Einwilligungsverhalten, Bildschirmauflösung, IP-Adresse) an Google gesendet.&nbsp;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google Maps</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur visuellen Darstellung von geographischen Informationen werden durch Google Maps Daten über Ihre Nutzung der Maps-Funktionen, insbesondere die IP-Adresse sowie Standortdaten, erhoben, an Google übermittelt und anschließend von Google verarbeitet. Wir haben keinen Einfluss auf diese anschließende Datenverarbeitung.</span></p></div></div></div><div class=\"page\" title=\"Page 8\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Google reCAPTCHA</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zum Zwecke des Schutzes vor Missbrauch unserer Web-Formulare sowie vor Spam durch automatisierte Software (sog. Bots) erhebt Google reCAPTCHA Daten (IP- Adresse, Zeitpunkt des Besuchs, Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite) und führt mittels eines sog. JavaScript sowie Cookies eine Analyse Ihrer Nutzung unserer Webseite durch. Daneben werden andere, durch Google Dienste in Ihrem Browser gespeicherte Cookies ausgewertet. Ein Auslesen oder Speichern von personenbezogenen Daten aus den Eingabefeldern des jeweiligen Formulars findet nicht statt.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">YouTube Video Plugin</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Einbindung von Inhalten Dritter werden über das YouTube Video Plugin in dem von uns verwendeten erweiterten Datenschutzmodus Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen) erhoben, an Google übermittelt und anschließend von Google verarbeitet, nur wenn Sie ein Video abspielen.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.2 Einsatz von Microsoft-Diensten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir verwenden die nachfolgend dargestellten Technologien der Microsoft Ireland Operations Ltd., One Microsoft Place, South County Business Park, Leopardstown, Dublin 18, D18 P521, Irland („Microsoft“). Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Die durch die Microsoft Technologien automatisch erhobenen Informationen über Ihre Nutzung unserer Webseite werden in der Regel an einen Server der Microsoft Corporation, One Microsoft Way, Redmond, WA 98052-6399, USA übertragen und dort gespeichert. Weitergehende Informationen über die Datenverarbeitung durch Microsoft finden Sie in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzhinweisen von Microsoft</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur Webseitenanalyse und Ereignisverfolgung messen wir über das Microsoft Advertising&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Universal Event Tracking&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">(UET) Ihr nachfolgendes Nutzungsverhalten, wenn Sie über eine Werbeanzeige von Microsoft Advertising auf unsere Website</span></p></div></div><img src=\"blob:https://venmeo.de/236237e7-1b37-4d55-8f2e-c0ef5c7ec72f\" alt=\"page8image5879616\" width=\"220.992000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 9\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gelangt sind. Hierzu können Cookies eingesetzt und Daten (IP-Adresse, Zeitpunkt des Besuchs, Geräte- und Browser-Informationen sowie Informationen zu Ihrer Nutzung unserer Webseite anhand von uns vorgegebenen Ereignissen wie z.B. Besuch einer Webseite oder Newsletteranmeldung) erfasst werden, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Soweit Ihre internetfähigen Geräte mit Ihrem Microsoft-Konto verknüpft sind und Sie die Einstellung „Interessensbezogene Werbung“ in Ihrem Microsoft Konto nicht deaktiviert haben, kann Microsoft Berichte über das Nutzungsverhalten (insb. die geräteübergreifenden Nutzerzahlen) erstellen, auch wenn Sie Ihr Endgerät wechseln, sog. „Cross-Device Tracking“. Eine Verarbeitung von personenbezogenen Daten findet durch uns insoweit nicht statt, wir erhalten lediglich auf Basis von Microsoft UET erstellte Statistiken.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Bing Maps</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Zur visuellen Darstellung von geographischen Informationen werden durch Bing Maps Daten über Ihre Nutzung der Maps-Funktionen, insbesondere die IP-Adresse sowie Standortdaten, erhoben, an Microsoft übermittelt und von Microsoft verarbeitet. Wir haben keinen Einfluss auf diese Datenverarbeitung.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">7.3 Einsatz von Facebook-Diensten&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Facebook Analysen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der Facebook Business-Tools werden aus den mit dem Facebook Pixel erhobenen Daten über Ihre Nutzung unserer Webseite Statistiken über Besucheraktivitäten auf unserer Webseite erstellt. Die Datenverarbeitung erfolgt auf Grundlage einer Vereinbarung über die Auftragsverarbeitung durch Facebook (by Meta). Ihre Analyse dient der optimalen Darstellung und Vermarktung unserer Webseite.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Facebook Ads (Werbeanzeigenmanager)</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Über Facebook Ads werben wir für diese Website auf Facebook (by Meta) sowie auf anderen Plattformen. Wir bestimmen die Parameter der jeweiligen Werbekampagne. Für die genaue Umsetzung, insbesondere die Entscheidung über die Platzierung der Anzeigen bei einzelnen Nutzern, ist Facebook (by Meta) verantwortlich. Soweit bei den einzelnen Technologien nichts Abweichendes angeben ist, erfolgt die Datenverarbeitung auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Die gemeinsame Verantwortlichkeit beschränkt sich auf die Erhebung der Daten und ihre Übermittlung an Meta Platforms Ireland. Die anschließende Datenverarbeitung durch Meta Platforms Ireland ist hiervon nicht erfasst.</span></p></div></div></div><div class=\"page\" title=\"Page 10\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">8. Integration des Trusted Shops Trustbadges/ sonstiger Widgets</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sofern Sie hierzu Ihre Einwilligung gem. Art. 6 Abs. 1 S. 1 lit. a DSGVO erteilt haben, sind auf dieser Webseite Trusted Shops Widgets zur Anzeige der Trusted Shops Leistungen (z. B. Gütesiegel, gesammelte Bewertungen) sowie zum Angebot der Trusted Shops Produkte für Käufer nach einer Bestellung eingebunden.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge und die damit beworbenen Dienste sind ein Angebot der Trusted Shops AG, Subbelrather Str. 15C, 50823 Köln (\"Trusted Shops\"), mit der wir gemeinsam nach Art. 26 DSGVO datenschutzrechtlich Verantwortlicher sind. Wir informieren Sie im Rahmen dieser Datenschutzhinweise im Folgenden über die wesentlichen Vertragsinhalte nach Art. 26 Abs. 2 DSGVO.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Im Rahmen der zwischen uns und der Trusted Shops AG bestehenden gemeinsamen Verantwortlichkeit wenden Sie sich bei Datenschutzfragen und zur Geltendmachung Ihrer Rechte bitte bevorzugt an die Trusted Shops unter Nutzung der in den&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Datenschutzinformationen&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">angegebenen Kontaktmöglichkeiten. Unabhängig davon können Sie sich aber immer an den Verantwortlichen Ihrer Wahl wenden. Ihre Anfrage wird dann, falls erforderlich, zur Beantwortung an den weiteren Verantwortlichen weitergegeben.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">8.1 Datenverarbeitung bei Einbindung des Trustbadges/ sonstiger Widgets</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge wird durch einen US-amerikanischen CDN-Anbieter (Content-Delivery- Network) zur Verfügung gestellt. Ein angemessenes Datenschutzniveau wird jeweils durch einen Angemessenheitsbeschluss der EU Kommission sichergestellt, der für die USA&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">abrufbar ist. Eingesetzte Dienstleister aus den USA sind in der Regel unter dem EU-U.S. Data Privacy Framework (DPF) zertifiziert. Weitere Informationen erhalten Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern eingesetzte Dienstleister nicht unter dem DPF zertifiziert sind, wurden Standardvertragsklauseln als geeignete Garantie abgeschlossen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Aufruf des Trustbadges speichert der Webserver automatisch ein sogenanntes Server-Logfile, das auch Ihre IP-Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert. Die IP-Adresse wird unmittelbar nach der Erhebung anonymisiert, sodass die gespeicherten Daten Ihrer Person nicht zugeordnet werden können. Die anonymisierten Daten werden insbesondere für statistische Zwecke und zur Fehleranalyse genutzt.</span></p></div></div><img src=\"blob:https://venmeo.de/310196e3-bc31-432b-a072-cf9dfa808b53\" alt=\"page10image6370512\" width=\"160.356000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/771315d2-5f01-4c7d-88cb-25ed0300326d\" alt=\"page10image6370928\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/7ec3d249-8d61-475a-9d69-9571cb6b4410\" alt=\"page10image6371136\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 11\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">8.2 Datenverarbeitung nach Bestellabschluss</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Sofern Sie Ihre Einwilligung erteilt haben, greift das Trustbadge nach Bestellabschluss auf in Ihrer Endeinrichtung gespeicherte Bestellinformationen (Bestellsumme, Bestellnummer, ggf. gekauftes Produkt) sowie E-Mailadresse zu und Ihre E-Mail- Adresse wird per kryptologischer Einwegfunktion gehasht. Der Hash-Wert wird anschließend mit den Bestellinformationen gem. Art. 6 Abs. 1 S. 1 lit. a DSGVO an Trusted Shops übermittelt.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Dies dient der Überprüfung, ob Sie bereits für Dienste von Trusted Shops registriert sind. Ist dies der Fall, so erfolgt die weitere Verarbeitung gemäß der zwischen Ihnen und Trusted Shops getroffenen&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">vertraglichen Vereinbarung</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern Sie noch nicht für die Services registriert sind oder Ihre Einwilligung zur automatischen Erkennung über das Trustbadge nicht erteilen, erhalten Sie im Anschluss die Möglichkeit, sich manuell für die Nutzung der Services zu registrieren bzw. die Absicherung im Rahmen Ihres ggf. bereits bestehenden Nutzungsvertrages abzuschließen.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Das Trustbadge greift zu diesem Zwecke nach Abschluss Ihrer Bestellung auf folgende Informationen zu, die in der von Ihnen verwendeten Endeinrichtung gespeichert sind: Bestellsumme, Bestellnummer und E-Mail-Adresse. Dies ist erforderlich, damit wir Ihnen den Käuferschutz anbieten können. Eine Übermittlung der Daten an Trusted Shops erfolgt erst, wenn Sie sich aktiv für den Abschluss des Käuferschutzes durch Klick auf den entsprechend bezeichneten Button in der sogenannten Trustcard entscheiden. Sofern Sie sich für die Nutzung der Services entscheiden, richtet sich die weitere Verarbeitung nach der vertraglichen Vereinbarung mit Trusted Shops gem. Art. 6 Abs. 1 lit. b DSGVO, um Ihre Registrierung für den Käuferschutz abschließen und die Bestellung absichern zu können sowie Ihnen ggf. im Anschluss Bewertungseinladungen per E-Mail zusenden zu können.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Trusted Shops setzt Dienstleister in den Bereichen Hosting, Monitoring und Logging ein. Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO zum Zwecke der Sicherstellung eines störungsfreien Betriebs. Dabei kann eine Verarbeitung in Drittländern (USA und Israel) stattfinden. Ein angemessenes Datenschutzniveau wird jeweils durch einen Angemessenheitsbeschluss der EU Kommission sichergestellt, der für die USA&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">und für Israel&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">abrufbar ist. Eingesetzte Dienstleister aus den USA sind in der Regel unter dem EU-U.S. Data Privacy Framework (DPF) zertifiziert. Weitere Informationen erhalten Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Sofern eingesetzte Dienstleister nicht unter dem DPF zertifiziert sind, wurden Standardvertragsklauseln als geeignete Garantie abgeschlossen.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">9. Social Media</span></p></div></div><img src=\"blob:https://venmeo.de/2158d7e0-5819-43a6-962c-330ef02bcc32\" alt=\"page11image5980160\" width=\"165.828000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/711bafd3-7f8c-4c60-9c67-7bd678b36ffe\" alt=\"page11image5980368\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/3922804a-559b-4117-9ea1-84909cc66174\" alt=\"page11image5980576\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/6e37432e-3758-49fb-979e-346f4fc9804f\" alt=\"page11image5980784\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 12\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Unsere Onlinepräsenz auf Facebook (by Meta), X (ehemals: Twitter), Instagram (by Meta), Youtube, Pinterest, LinkedIn, Xing</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit Sie hierzu Ihre Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a DSGVO gegenüber dem jeweiligen Social Media Betreiber erteilt haben, werden bei Besuch unserer Onlinepräsenzen auf den in der oben genannten sozialen Medien Ihre Daten für Marktforschungs- und Werbezwecke automatisch erhoben und gespeichert, aus denen unter Verwendung von Pseudonymen Nutzungsprofile erstellt werden. Diese können verwendet werden, um z.B. Werbeanzeigen innerhalb und außerhalb der Plattformen zu schalten, die mutmaßlich Ihren Interessen entsprechen. Hierzu werden im Regelfall Cookies eingesetzt. Die detaillierten Informationen zur Verarbeitung und Nutzung der Daten durch den jeweiligen Social Media Betreiber sowie eine Kontaktmöglichkeit und Ihre diesbezüglichen Rechte und Einstellungsmöglichkeiten zum Schutz Ihrer Privatsphäre, entnehmen Sie bitte den unten verlinkten Datenschutzhinweisen der Anbieter. Sollten Sie diesbezüglich dennoch Hilfe benötigen, können Sie sich an uns wenden.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Facebook&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">(by Meta)&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Meta Platforms Ireland Ltd., Block J, Serpentine Avenue, Dublin 4, Irland („Meta Platforms Ireland“). Die durch Meta Platforms Ireland automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Facebook (by Meta) werden in der Regel an einen Server der Meta Platforms, Inc., 1601 Willow Road, Menlo Park, California 94025, USA übertragen und dort gespeichert. Die Datenverarbeitung im Rahmen des Besuchs einer Facebook (by Meta) Fanpage erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitere Informationen (Informationen zu Insights-Daten) finden Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA, Kanada, Japan, Südkorea, Neuseeland, Vereinigtes Königreich, Argentinien.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Eine Zertifizierung liegt vor.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in diesen Ländern: Australien, Hongkong, Indien, Indonesien, Malaysia, Singapur, Thailand, Taiwan, Brasilien, Mexiko. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit Ihnen stützt sich auf diese Garantien: Standarddatenschutzklauseln der Europäischen Kommission.</span></p></div></div><img src=\"blob:https://venmeo.de/9a9c7ca7-599e-4617-9346-ad5d59fbf3eb\" alt=\"page12image5763680\" width=\"69.312000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/8cf3ad51-5c6b-41a9-a261-895f74dc809f\" alt=\"page12image5340816\" width=\"58.224000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/ee3fd345-5cbd-4156-aadc-57f467e623e1\" alt=\"page12image5340608\" width=\"23.784000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 13\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">X&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Twitter International Unlimited Company, One Cumberland Place, Fenian Street, Dublin 2, D02 AX07, Irland („X“). Die von X automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf X werden in der Regel an einen Server der X Corp., 1355 Market Street, Suite 900, San Francisco, CA 94103, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Instagram&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">(by Meta)&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Meta Platforms Ireland Ltd., Block J, Serpentine Avenue, Dublin 4, Irland („Meta Platforms Ireland“) Die durch Meta Platforms Ireland automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Instagram werden in der Regel an einen Server der Meta Platforms, Inc., 1601 Willow Road, Menlo Park, CA 94025, USA, Menlo Park, California 94025, USA übertragen und dort gespeichert. Die Datenverarbeitung im Rahmen des Besuchs einer Instagram (by Meta) Fanpage erfolgt auf Grundlage einer Vereinbarung zwischen gemeinsam Verantwortlichen gemäß Art. 26 DSGVO. Weitere Informationen (Informationen zu Insights-Daten) finden Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA, Kanada, Japan, Südkorea, Neuseeland, Vereinigtes Königreich, Argentinien.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Eine Zertifizierung liegt vor.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in diesen Ländern: Australien, Hongkong, Indien, Indonesien, Malaysia, Singapur, Thailand, Taiwan, Brasilien, Mexiko. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit Ihnen stützt sich auf diese Garantien: Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">YouTube&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Google Ireland Ltd., Gordon House, Barrow Street, Dublin 4, Irland („Google“). Die von Google automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf YouTube werden in der Regel an einen Server der</span></p></div></div><img src=\"blob:https://venmeo.de/5bd0c407-a840-42de-bb9b-8f2fa3e2fc18\" alt=\"page13image6062496\" width=\"69.624000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/0c1145d4-8026-46d2-a74f-6001abb22281\" alt=\"page13image6062912\" width=\"62.040000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/8e8eb998-ff07-4d27-8a21-89f8685cc559\" alt=\"page13image6063120\" width=\"23.784000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/e4f8249c-b3c9-4796-93e0-c062d4ecf8e9\" alt=\"page13image6063328\" width=\"59.460000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 14\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Google LLC, 1600 Amphitheatre Parkway Mountain View, CA 94043, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Pinterest&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der Pinterest Europe Ltd., Palmerston House, 2nd Floor, Fenian Street, Dublin 2, Irland („Pinterest“). Die von Pinterest automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf Pinterest werden in der Regel an einen Server der Pinterest, Inc., 505 Brannan St., San Francisco, CA 94107, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in Ländern außerhalb der EU und des EWR. Für diese Länder liegt kein Angemessenheitsbeschluss der Europäischen Kommission vor. Unsere Zusammenarbeit mit ihnen stützt sich auf Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">LinkedIn&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der LinkedIn Ireland Unlimited Company, Wilton Place, Dublin 2, Irland („LinkedIn“). Die von LinkedIn automatisch erhobenen Informationen über Ihre Nutzung unserer Online-Präsenz auf LinkedIn werden in der Regel an einen Server der LinkedIn Corporation, 1000 W. Maude Avenue, Sunnyvale, CA 94085, USA übertragen und dort gespeichert.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Unsere Dienstleister sitzen und/oder verwenden Server in folgenden Ländern, für die die Europäische Kommission durch Beschluss ein angemessenes Datenschutzniveau festgestellt hat: USA.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Angemessenheitsbeschluss für die USA gilt als Grundlage für die Drittlandsübermittlung, soweit der jeweilige Dienstleister zertifiziert ist. Bis zur Zertifizierung durch unsere Dienstleister stützt sich die Datenübermittlung weiterhin auf diese Grundlage: Standarddatenschutzklauseln der Europäischen Kommission.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700; color: rgb(0, 0, 204);\">Xing&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">ist ein Angebot der New Work SE, Am Strandkai 1, 20457 Hamburg, Deutschland.</span></p></div></div><img src=\"blob:https://venmeo.de/d6d1c4fb-ca83-4dfd-99c8-4fcf8dc0b321\" alt=\"page14image6272000\" width=\"66.960000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/2614ed53-80a8-481f-becf-037cb0d542c6\" alt=\"page14image6272416\" width=\"62.724000\" height=\"0.528000\">&nbsp;<img src=\"blob:https://venmeo.de/2a3dfa20-91ad-455d-916f-52304b7e9806\" alt=\"page14image6272624\" width=\"35.208000\" height=\"0.528000\"></div><div class=\"page\" title=\"Page 15\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">10. Kontaktmöglichkeiten und Ihre Rechte&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">10.1 Ihre Rechte</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Als Betroffener haben Sie folgende Rechte:</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 15 DSGVO das Recht, in dem dort bezeichneten Umfang Auskunft über Ihre von uns verarbeiteten personenbezogenen Daten zu verlangen; gemäß Art. 16 DSGVO das Recht, unverzüglich die Berichtigung unrichtiger oder Vervollständigung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 17 DSGVO das Recht, die Löschung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen, soweit nicht die weitere Verarbeitung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">zur Ausübung des Rechts auf freie Meinungsäußerung und Information; zur Erfüllung einer rechtlichen Verpflichtung;<br>aus Gründen des öffentlichen Interesses oder<br>zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen erforderlich ist;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 18 DSGVO das Recht, die Einschränkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen, soweit</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">die Richtigkeit der Daten von Ihnen bestritten wird;<br>die Verarbeitung unrechtmäßig ist, Sie aber deren Löschung ablehnen;<br>wir die Daten nicht mehr benötigen, Sie diese jedoch zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder<br>Sie gemäß Art. 21 DSGVO Widerspruch gegen die Verarbeitung eingelegt haben;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 20 DSGVO das Recht, Ihre personenbezogenen Daten, die Sie uns bereitgestellt haben, in einem strukturierten, gängigen und maschinenlesbaren Format zu erhalten oder die Übermittlung an einen anderen Verantwortlichen zu verlangen;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">gemäß Art. 77 DSGVO das Recht, sich bei einer Aufsichtsbehörde zu beschweren. In der Regel können Sie sich hierfür an die Aufsichtsbehörde Ihres üblichen Aufenthaltsortes oder Arbeitsplatzes oder unseres Unternehmenssitzes wenden.</span></p></div></div></div><div class=\"page\" title=\"Page 16\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"section\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Widerspruchsrecht</span></p></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Soweit wir zur Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen personenbezogene Daten wie oben erläutert verarbeiten, können Sie dieser Verarbeitung mit Wirkung für die Zukunft widersprechen. Erfolgt die Verarbeitung zu Zwecken des Direktmarketings, können Sie dieses Recht jederzeit wie oben beschrieben ausüben. Soweit die Verarbeitung zu anderen Zwecken erfolgt, steht Ihnen ein Widerspruchsrecht nur bei Vorliegen von Gründen, die sich aus Ihrer besonderen Situation ergeben, zu.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Nach Ausübung Ihres Widerspruchsrechts werden wir Ihre personenbezogenen Daten nicht weiter zu diesen Zwecken verarbeiten, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder wenn die Verarbeitung der Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen dient.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Dies gilt nicht, wenn die Verarbeitung zu Zwecken des Direktmarketings erfolgt. Dann werden wir Ihre personenbezogenen Daten nicht weiter zu diesem Zweck verarbeiten.</span></p></div></div></div><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">10.2 Kontaktmöglichkeiten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Bei Fragen zur Erhebung, Verarbeitung oder Nutzung Ihrer personenbezogenen Daten, bei Auskünften, Berichtigung, Einschränkung oder Löschung von Daten sowie Widerruf erteilter Einwilligungen oder Widerspruch gegen eine bestimmte Datenverwendung wenden Sie sich bitte direkt an uns über die Kontaktdaten in unserem Impressum.</span></p></div></div></div>', 1, 1, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:03:52', '2024-07-01 22:20:19', NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `custom_pages` (`id`, `title`, `title_de`, `url_slug`, `body`, `body_de`, `is_active`, `order_id`, `meta_title`, `meta_keywords`, `meta_description`, `update_by`, `created_by`, `created_at`, `updated_at`, `position`, `updated_by`, `display_in`, `is_editable`, `image_1`, `content_1`, `image_2`, `content_2`, `content_1_de`, `content_2_de`) VALUES
(5, 'Terms & Conditions', NULL, 'terms-and-conditions', '<h1 class=\"mb-4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-size: 24px; font-family: Pridi, sans-serif;\"><div class=\"page\" title=\"Page 1\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Allgemeine Geschäftsbedingungen&nbsp;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\"><br></span><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">1. Geltungsbereich</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Für alle Bestellungen über unseren Online-Shop gelten die nachfolgenden AGB. Unser Online-Shop richtet sich ausschließlich an Verbraucher.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Verbraucher ist jede natürliche Person, die ein Rechtsgeschäft zu Zwecken abschließt, die überwiegend weder ihrer gewerblichen noch ihrer selbständigen beruflichen Tätigkeit zugerechnet werden können. Unternehmer ist eine natürliche oder juristische Person oder eine rechtsfähige Personengesellschaft, die bei Abschluss eines Rechtsgeschäfts in Ausübung ihrer gewerblichen oder selbständigen beruflichen Tätigkeit handelt.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">2. Vertragspartner, Vertragsschluss, Korrekturmöglichkeiten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Kaufvertrag kommt zustande mit Venmeo.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Darstellung der Produkte im Online-Shop stellt kein rechtlich bindendes Angebot, sondern einen unverbindlichen Online-Katalog dar. Sie können unsere Produkte zunächst unverbindlich in den Warenkorb legen und Ihre Eingaben vor Absenden Ihrer verbindlichen Bestellung jederzeit korrigieren, indem Sie die hierfür im Bestellablauf vorgesehenen und erläuterten Korrekturhilfen nutzen. Durch Anklicken des Bestellbuttons geben Sie ein verbindliches Angebot über die im Warenkorb enthaltenen Produkte ab. Die Bestätigung des Zugangs Ihrer Bestellung erfolgt per E- Mail unmittelbar nach dem Absenden der Bestellung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir nehmen Ihr Angebot innerhalb von zwei Tagen an, indem</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">wir eine Annahmeerklärung in separater E-Mail abgeben oder<br>gegebenenfalls die Zahlungstransaktion durch unseren Dienstleister oder den ausgewählten Zahlungsdienstleister durchgeführt wird. Der Durchführungszeitpunkt der Zahlungstransaktion richtet sich nach der jeweils ausgewählten Zahlungsart (s. unter „Bezahlung“).</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die für Sie relevante Alternative richtet sich danach, welches der aufgezählten Ereignisse als erstes eintritt.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">3. Vertragssprache, Vertragstextspeicherung</span></p></div></div></div><div class=\"page\" title=\"Page 2\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die für den Vertragsschluss zur Verfügung stehende(n) Sprache(n): Deutsch Der Vertragstext wird von uns nicht gespeichert.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">4. Lieferbedingungen&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Lieferoptionen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir versenden die Produkte an die im Bestellprozess angegebene Lieferadresse.<br>Wir liefern nur im Versandweg. Eine Selbstabholung der Ware ist leider nicht möglich. Wir liefern nicht an Packstationen.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">5. Bezahlung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">In unserem Shop stehen Ihnen grundsätzlich die nachfolgenden Zahlungsarten zur Verfügung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">PayPal<br>Um den Rechnungsbetrag über den Zahlungsdienstleister PayPal (Europe) S.à r.l. et Cie, S.C.A, 22-24 Boulevard Royal, L-2449 Luxembourg („PayPal“) bezahlen zu können, müssen Sie bei PayPal registriert sein, sich mit Ihren Zugangsdaten legitimieren und die Zahlungsanweisung bestätigen. Die Zahlungstransaktion wird durch PayPal unmittelbar nach Abgabe der Bestellung durchgeführt. Weitere Hinweise erhalten Sie im Bestellvorgang.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">PayPal kann registrierten und nach eigenen Kriterien ausgewählten PayPal-Kunden weitere Zahlungsmodalitäten im Kundenkonto anbieten. Auf das Anbieten dieser Modalitäten haben wir allerdings keinen Einfluss; weitere individuell angebotene Zahlungsmodalitäten betreffen Ihr Rechtsverhältnis mit PayPal. Weitere Informationen hierzu finden Sie in Ihrem PayPal-Konto.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">6. Gewährleistung und Garantien​​​​​​​</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">6.1 Mängelhaftungsrecht</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Es gilt das gesetzliche Mängelhaftungsrecht.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">6.2 Garantien und Kundendienst</span></p></div></div></div><div class=\"page\" title=\"Page 3\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Informationen zu gegebenenfalls geltenden zusätzlichen Garantien und deren genaue Bedingungen finden Sie jeweils beim Produkt und auf besonderen Informationsseiten im Online-Shop.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">7. Streitbeilegung​​​​​​​</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">finden. Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir nicht verpflichtet und nicht bereit.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">AGB&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">erstellt mit dem&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Trusted Shops&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Rechtstexter</span></p></div></div></div></h1>', '<div class=\"page\" title=\"Page 1\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Allgemeine Geschäftsbedingungen&nbsp;</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\"><br></span><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">1. Geltungsbereich</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Für alle Bestellungen über unseren Online-Shop gelten die nachfolgenden AGB. Unser Online-Shop richtet sich ausschließlich an Verbraucher.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Verbraucher ist jede natürliche Person, die ein Rechtsgeschäft zu Zwecken abschließt, die überwiegend weder ihrer gewerblichen noch ihrer selbständigen beruflichen Tätigkeit zugerechnet werden können. Unternehmer ist eine natürliche oder juristische Person oder eine rechtsfähige Personengesellschaft, die bei Abschluss eines Rechtsgeschäfts in Ausübung ihrer gewerblichen oder selbständigen beruflichen Tätigkeit handelt.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">2. Vertragspartner, Vertragsschluss, Korrekturmöglichkeiten</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Der Kaufvertrag kommt zustande mit Venmeo.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Darstellung der Produkte im Online-Shop stellt kein rechtlich bindendes Angebot, sondern einen unverbindlichen Online-Katalog dar. Sie können unsere Produkte zunächst unverbindlich in den Warenkorb legen und Ihre Eingaben vor Absenden Ihrer verbindlichen Bestellung jederzeit korrigieren, indem Sie die hierfür im Bestellablauf vorgesehenen und erläuterten Korrekturhilfen nutzen. Durch Anklicken des Bestellbuttons geben Sie ein verbindliches Angebot über die im Warenkorb enthaltenen Produkte ab. Die Bestätigung des Zugangs Ihrer Bestellung erfolgt per E- Mail unmittelbar nach dem Absenden der Bestellung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir nehmen Ihr Angebot innerhalb von zwei Tagen an, indem</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">wir eine Annahmeerklärung in separater E-Mail abgeben oder<br>gegebenenfalls die Zahlungstransaktion durch unseren Dienstleister oder den ausgewählten Zahlungsdienstleister durchgeführt wird. Der Durchführungszeitpunkt der Zahlungstransaktion richtet sich nach der jeweils ausgewählten Zahlungsart (s. unter „Bezahlung“).</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die für Sie relevante Alternative richtet sich danach, welches der aufgezählten Ereignisse als erstes eintritt.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">3. Vertragssprache, Vertragstextspeicherung</span></p></div></div></div><div class=\"page\" title=\"Page 2\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die für den Vertragsschluss zur Verfügung stehende(n) Sprache(n): Deutsch Der Vertragstext wird von uns nicht gespeichert.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">4. Lieferbedingungen&nbsp;</span><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">Lieferoptionen</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Wir versenden die Produkte an die im Bestellprozess angegebene Lieferadresse.<br>Wir liefern nur im Versandweg. Eine Selbstabholung der Ware ist leider nicht möglich. Wir liefern nicht an Packstationen.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">5. Bezahlung</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">In unserem Shop stehen Ihnen grundsätzlich die nachfolgenden Zahlungsarten zur Verfügung.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">PayPal<br>Um den Rechnungsbetrag über den Zahlungsdienstleister PayPal (Europe) S.à r.l. et Cie, S.C.A, 22-24 Boulevard Royal, L-2449 Luxembourg („PayPal“) bezahlen zu können, müssen Sie bei PayPal registriert sein, sich mit Ihren Zugangsdaten legitimieren und die Zahlungsanweisung bestätigen. Die Zahlungstransaktion wird durch PayPal unmittelbar nach Abgabe der Bestellung durchgeführt. Weitere Hinweise erhalten Sie im Bestellvorgang.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">PayPal kann registrierten und nach eigenen Kriterien ausgewählten PayPal-Kunden weitere Zahlungsmodalitäten im Kundenkonto anbieten. Auf das Anbieten dieser Modalitäten haben wir allerdings keinen Einfluss; weitere individuell angebotene Zahlungsmodalitäten betreffen Ihr Rechtsverhältnis mit PayPal. Weitere Informationen hierzu finden Sie in Ihrem PayPal-Konto.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">6. Gewährleistung und Garantien​​​​​​​</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">6.1 Mängelhaftungsrecht</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Es gilt das gesetzliche Mängelhaftungsrecht.</span></p><p><span style=\"font-size: 14pt; font-family: DejaVuSans; font-weight: 700;\">6.2 Garantien und Kundendienst</span></p></div></div></div><div class=\"page\" title=\"Page 3\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Informationen zu gegebenenfalls geltenden zusätzlichen Garantien und deren genaue Bedingungen finden Sie jeweils beim Produkt und auf besonderen Informationsseiten im Online-Shop.</span></p><p><span style=\"font-size: 18pt; font-family: DejaVuSans; font-weight: 700;\">7. Streitbeilegung​​​​​​​</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">hier&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">finden. Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir nicht verpflichtet und nicht bereit.</span></p><p><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">AGB&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">erstellt mit dem&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">Trusted Shops&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Rechtstexter</span></p></div></div></div>', 1, 1, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-27 16:21:29', NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'About Us', NULL, 'about-us', NULL, NULL, 1, 1, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-10 15:24:25', NULL, 1, NULL, 1, 'uploads/admin/about-666587e0c9cf3.jpg', '<h1 class=\"mb-4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Pridi, sans-serif; color: rgb(33, 33, 33); font-size: 25px;\">Who Are We?</h1><div class=\"desc\" style=\"font-family: Roboto, sans-serif; color: rgb(68, 68, 68) !important;\"><p>At venmeo.de, we believe in the power of first impressions. That\'s why we\'ve created a platform dedicated to revolutionizing the way professionals showcase themselves in the digital world. With an unwavering commitment to innovation and user-centric design, we\'ve developed an intuitive and feature-rich platform that empowers individuals and businesses to create stunning digital business cards effortlessly. Our team is passionate about helping our users unlock their full networking potential by providing them with the tools they need to make a lasting impact. Whether you\'re a freelancer, entrepreneur, or established business, our platform is designed to meet your unique needs. Join us on our mission to simplify networking and elevate your digital presence today!<br></p></div>', NULL, NULL, '<h3 style=\"font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\"></h3><h6 class=\"\"><span style=\"font-family: Arial;\">Willkommen bei Venmeo, Ihrem zuverlässigen Partner für innovative digitale Visitenkarten. Unser Ziel ist es, die Art und Weise, wie Sie Ihre beruflichen Kontakte pflegen und präsentieren, zu revolutionieren. In einer zunehmend vernetzten Welt glauben wir an die Kraft der Digitalisierung und bieten Lösungen, die sowohl praktisch als auch zukunftsweisend sind.<br></span><span style=\"font-family: Arial;\">Unsere Mission bei Venmeo ist es, Ihnen die besten Werkzeuge an die Hand zu geben, um Ihre professionelle Identität digital zu präsentieren. Wir möchten das Networking vereinfachen und optimieren, indem wir traditionelle Visitenkarten durch eine moderne, umweltfreundliche und interaktive Alternative ersetzen.<br></span><span style=\"font-family: Arial;\">Was uns auszeichnet, ist unsere Hingabe zur Innovation. Wir setzen auf die neuesten Technologien, um digitale Visitenkarten zu erstellen, die nicht nur Ihre Kontaktdaten, sondern auch Ihr gesamtes berufliches Portfolio abbilden können. Durch den Verzicht auf Papier tragen unsere digitalen Visitenkarten zu einem umweltfreundlicheren Geschäftsalltag bei. Unsere Lösungen sind benutzerfreundlich und intuitiv, sodass Sie sich voll und ganz auf das Wesentliche konzentrieren können – das Netzwerken. Zudem bieten wir Ihnen vielfältige Gestaltungsmöglichkeiten, damit Ihre digitale Visitenkarte genau so einzigartig ist wie Sie selbst.<br></span><span style=\"font-family: Arial;\">Unser engagiertes Team besteht aus Experten in den Bereichen Digitalisierung, Design und Technologie. Gemeinsam arbeiten wir daran, Ihnen stets die besten und innovativsten Lösungen zu bieten. Bei Venmeo steht der Kunde im Mittelpunkt – Ihre Zufriedenheit ist unser größtes Anliegen.<br></span><span style=\"font-family: Arial;\">Haben Sie Fragen oder möchten mehr über unsere Produkte erfahren? Unser Kundenservice steht Ihnen jederzeit zur Verfügung. Besuchen Sie unsere Website oder kontaktieren Sie uns direkt – wir freuen uns darauf, von Ihnen zu hören!</span><hr style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><strong>Venmeo<br></strong>Die Zukunft des Networkings.<br>Ihre digitale Visitenkarte, jederzeit und überall.<br><br><b>Venmeo – weil der erste Eindruck zählt.</b></h6>', NULL),
(22, 'Imprint', NULL, 'imprint', '<p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Venmeo</span></p><p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-family: DejaVuSans; font-size: 12pt;\">Geschäftsführer: Cüneyt Kurt</span></p><p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Westbahnhof&nbsp;</span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">1B&nbsp;<br></span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">38118 Braunschweig<br></span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">Deutschland</span></p><p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Telefon: 01733910844<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Mail: info@venmeo.de</span></p><p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Umsatzsteuer-Identifikationsnummer(n): DE341872974</span></p><p class=\"\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie hier finden&nbsp;</span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">https://ec.europa.eu/consumers/odr/</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir nicht verpflichtet und nicht bereit.</span></p>', '<div class=\"page\" title=\"Page 1\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0);\"><div class=\"layoutArea\"><div class=\"column\"><p class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans; font-weight: 700;\">Venmeo</span></p><p class=\"\"><span style=\"font-family: DejaVuSans; font-size: 12pt;\">Geschäftsführer: Cüneyt Kurt</span></p><p class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Westbahnhof </span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">1B <br></span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">38118 Braunschweig<br> </span><span style=\"font-family: DejaVuSans; font-size: 12pt;\">Deutschland</span></p><p class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Telefon: 01733910844<br></span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Mail: info@venmeo.de</span></p><p class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Umsatzsteuer-Identifikationsnummer(n): DE341872974</span></p><p class=\"\"><span style=\"font-size: 12pt; font-family: DejaVuSans;\">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie hier finden </span><span style=\"font-size: 12pt; font-family: DejaVuSans; color: rgb(0, 0, 204);\">https://ec.europa.eu/consumers/odr/</span><span style=\"font-size: 12pt; font-family: DejaVuSans;\">. Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir nicht verpflichtet und nicht bereit.</span></p></div></div></div>', 1, 1, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-27 14:24:29', NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Right of withdrawal', NULL, 'right-of-withdrawal', '', NULL, 1, 5, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-03 05:04:38', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'General terms and conditions', NULL, 'general-terms-and-conditions', NULL, NULL, 0, 1, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-27 16:31:12', NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Data protection declaration', NULL, 'data-protection-declaration', '', NULL, 1, 7, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-03 05:04:38', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Shipping Conditions', NULL, 'shipping-conditions', '', NULL, 1, 8, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-03 05:04:38', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Returns', NULL, 'returns', '', NULL, 1, 9, 'Welcome To Venmeo.de', 'venmeo, digital card, vcard, business cards', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', NULL, 1, '2022-11-26 10:17:15', '2024-06-03 05:04:38', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vcard_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `job_title` varchar(256) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `vcard_id`, `name`, `email`, `phone`, `job_title`, `company`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Michael Braun', 'michael@example.com', '4915987651234', 'Product Manager', 'Innovative Tech Corp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum lobortis viverra. Vestibulum pharetra ligula nec congue elementum. Duis et quam dapibus augue interdum commodo id sed mauris. In egestas lorem eu tortor imperdiet, at dapibus nunc he', '2024-06-01 11:47:14', '2024-06-01 18:00:00'),
(33, 2, 'Michael Braun', 'michael@example.com', '4915987651234', 'Product Manager', 'Innovative Tech Corp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum lobortis viverra. Vestibulum pharetra ligula nec congue elementum. Duis et quam dapibus augue interdum commodo id sed mauris. In egestas lorem eu tortor imperdiet, at dapibus nunc he', '2024-06-01 11:47:14', '2024-06-01 18:00:00'),
(34, 3, 'Michael Braun', 'michael@example.com', '4915987651234', 'Product Manager', 'Innovative Tech Corp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum lobortis viverra. Vestibulum pharetra ligula nec congue elementum. Duis et quam dapibus augue interdum commodo id sed mauris. In egestas lorem eu tortor imperdiet, at dapibus nunc he', '2024-06-01 11:47:14', '2024-06-01 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_de` varchar(255) NOT NULL,
  `body` longtext DEFAULT NULL,
  `body_de` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT 1,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `title_de`, `body`, `body_de`, `is_active`, `order_id`, `update_by`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(28, 'What is a Smart Business Card?', 'Was ist eine Smart Business Card?', 'A Smart Business Card is a digital representation of your professional identity. It includes interactive features, instant contact sharing, and real-time updates', 'Eine Smart Business Card ist eine digitale Darstellung deiner beruflichen Identität. Sie enthält interaktive Funktionen, sofortiges Kontakt-Sharing und Echtzeitaktualisierungen.', 1, 1, NULL, NULL, '2024-02-27 11:14:12', '2024-06-10 16:04:58', 1),
(29, 'How do I share my Smart Business Card?', 'Wie teile ich meine Smart Business Card?\"', 'Sharing is easy! Simply use the built-in nfc tag, the sharing feature on the app, send it via email, or scan the QR code on the card.', 'Das Teilen ist einfach! Nutze einfach den integrierten NFC-Tag, die Teilen-Funktion in der App, sende sie per E-Mail oder scanne den QR-Code auf der Karte.', 1, 2, NULL, NULL, '2024-02-27 11:15:28', '2024-04-12 07:14:00', NULL),
(30, 'Can I customize my Smart Business Card?', 'Kann ich meine Smart Business Card anpassen?', 'Absolutely! Tailor your card with personalized details, including your logo, social media links, and a unique design that reflects your brand.', 'Absolut! Gestalte deine Karte mit persönlichen Details, einschließlich deines Logos, Links zu sozialen Medien und einem einzigartigen Design, das deine Marke widerspiegelt.', 1, 3, NULL, NULL, '2024-02-27 11:16:40', '2024-04-12 07:11:50', NULL),
(31, 'Is the Smart Business Card compatible with all devices?', 'Ist die Smart Business Card mit allen Geräten kompatibel?', 'Yes, our platform ensures compatibility across various devices, making it accessible to a wide range of professionals.', 'Unsere Plattform ist auf vielen Geräten nutzbar und für jeden leicht zugänglich.', 1, 4, NULL, NULL, '2024-02-27 11:18:21', '2024-06-20 12:06:21', 5),
(32, 'What makes a Smart Business Card better than traditional ones?', 'Was macht eine Smart Business Card besser als traditionelle?', 'Smart Business Cards offer instant updates, interactivity, and a modern touch, enhancing your networking experience and leaving a lasting impression.', 'Smart Business Cards bieten sofortige Aktualisierungen, Interaktivität und einen modernen Touch, verbessere dein Networking-Erlebnis und hinterlassen einen bleibenden Eindruck.', 1, 5, NULL, NULL, '2024-02-27 11:18:41', '2024-06-20 12:07:22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `home_page_contents`
--

CREATE TABLE `home_page_contents` (
  `id` bigint(20) NOT NULL,
  `col1_en` text DEFAULT NULL,
  `col1_gr` text DEFAULT NULL,
  `col2_en` text DEFAULT NULL,
  `col2_gr` text DEFAULT NULL,
  `col3_en` text DEFAULT NULL,
  `col3_gr` text DEFAULT NULL,
  `col4_en` text DEFAULT NULL,
  `col4_gr` text DEFAULT NULL,
  `col5_en` text DEFAULT NULL,
  `col5_gr` text DEFAULT NULL,
  `col6_en` text DEFAULT NULL,
  `col6_gr` text DEFAULT NULL,
  `col7_en` text DEFAULT NULL,
  `col7_gr` text DEFAULT NULL,
  `col8_en` text DEFAULT NULL,
  `col8_gr` text DEFAULT NULL,
  `col9_en` text DEFAULT NULL,
  `col9_gr` text DEFAULT NULL,
  `col10_en` text DEFAULT NULL,
  `col10_gr` text DEFAULT NULL,
  `col11_en` text DEFAULT NULL,
  `col11_gr` text DEFAULT NULL,
  `col12_en` text DEFAULT NULL,
  `col12_gr` text DEFAULT NULL,
  `col13_en` text DEFAULT NULL,
  `col13_gr` text DEFAULT NULL,
  `col14_en` text DEFAULT NULL,
  `col14_gr` text DEFAULT NULL,
  `col15_en` text DEFAULT NULL,
  `col15_gr` text DEFAULT NULL,
  `col16_en` text DEFAULT NULL,
  `col16_gr` text DEFAULT NULL,
  `col17_en` text DEFAULT NULL,
  `col17_gr` text DEFAULT NULL,
  `col18_en` text DEFAULT NULL,
  `col18_gr` text DEFAULT NULL,
  `col19_en` text DEFAULT NULL,
  `col19_gr` text DEFAULT NULL,
  `col20_en` text DEFAULT NULL,
  `col21_gr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `faq_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page_contents`
--

INSERT INTO `home_page_contents` (`id`, `col1_en`, `col1_gr`, `col2_en`, `col2_gr`, `col3_en`, `col3_gr`, `col4_en`, `col4_gr`, `col5_en`, `col5_gr`, `col6_en`, `col6_gr`, `col7_en`, `col7_gr`, `col8_en`, `col8_gr`, `col9_en`, `col9_gr`, `col10_en`, `col10_gr`, `col11_en`, `col11_gr`, `col12_en`, `col12_gr`, `col13_en`, `col13_gr`, `col14_en`, `col14_gr`, `col15_en`, `col15_gr`, `col16_en`, `col16_gr`, `col17_en`, `col17_gr`, `col18_en`, `col18_gr`, `col19_en`, `col19_gr`, `col20_en`, `col21_gr`, `image`, `faq_image`, `created_at`, `updated_at`) VALUES
(1, 'Modernize Your Connections with Personalized Digital.', 'Setze neue Maßstäbe mit deinen digitalen Visitenkarten', 'Quick, Convenient, and Customizable Digital vCards for Professionals', 'Einfach, modern, persönlich – deine digitale Visitenkarte.', 'How it work', 'Wie es funktioniert', 'Modern Networking with a Personal Touch', 'Modernes Networking mit persönlicher Note', 'Get all of your steps, exercise, sleep and meds in one place.', 'Zeitgemäß vernetzt mit unserer digitalen Visitenkarte', 'In today’s fast-paced world, managing your health and wellness can be challenging. Our service is designed to simplify this process by bringing all your vital health information together in one place. Track your daily steps, monitor your exercise routines, keep an eye on your sleep patterns, and manage your medications effortlessly. Our platform is tailored to meet your unique needs, making it easier than ever to stay on top of your health. Experience seamless integration and take control of your wellness journey with just a few clicks.', 'In der heutigen schnelllebigen Welt ist eine professionelle und sofort verfügbare Präsenz unerlässlich. Mit unserer digitalen Visitenkarte hast du die perfekte Lösung, um dich und dein Unternehmen modern und effizient zu präsentieren. Deine Kontaktdaten, Links zu sozialen Medien und weitere wichtige Informationen sind auf allen Geräten abrufbar. Unsere digitale Visitenkarte ist flexibel, stets aktuell und nachhaltig. Verzichte auf gedruckte Karten und hinterlasse einen bleibenden Eindruck bei Kunden und Geschäftspartnern. Vernetze dich professionell und zeitgemäß mit unserer digitalen Visitenkarte.', 'Create your Account', 'Erstelle deinen Account', 'Simplify health: track steps, exercise, sleep, meds effortlessly. Tailored for seamless wellness control.', 'Registriere dich ganz einfach. Gib deine Daten ein, bestätige deine E-Mail-Adresse und personalisiere dein Profil für einen reibungslosen Start.', 'Login your Dashboard', 'Melde dich in deinem Dashboard an', 'Access your dashboard: update info, customize VCard, monitor connections - your central hub for digital presence.', 'Logge dich mit deinen Zugangsdaten ein, um auf dein persönliches Dashboard zuzugreifen. Verwalte deine vCards, aktualisiere deine Informationen und behalte den Überblick über deine Kontakte.', 'Create your vCard', 'Erstellen deine vCard', 'Design your digital business card with ease. Enter details, add photo, customize for instant sharing.', 'Gestalte ganz einfach deine digitale Visitenkarte. Gib deine Daten ein, füge ein Foto hinzu und passe sie für die sofortige Weitergabe an.', 'Share your vCard', 'Teilen deine vCard', 'Grow your network effortlessly. Share your VCard via QR, email, or social media. Instant connections, lasting impact.', 'Erweitere dein Netzwerk mühelos. Teile deine VCard per QR, E-Mail oder über soziale Medien. Sofortige Verbindungen, nachhaltige Wirkung.', 'Pricing', 'Unsere Preise', 'Discover optimal cost-functionality balance with our tailored pricing plans. Maximize networking potential within budget.', 'Erfahre mehr über unsere Abo-Modelle.', 'Frequently Asked Questions', 'Häufig gestellte Fragen', 'If you don\'t see an answer to your question, you can send us an email\r\n from our contact form.', 'Wenn Du keine Antwort auf deine Frage findest, kontaktiere uns bitte per Email über unser Kontaktformular.', 'Ready to dive in? Create Your Card today.', 'Erstelle noch heute deine individuelle Karte!', 'Recommended by leading experts in marketing and SEO', 'Das sagen unsere Kunden:', '/assets/uploads/banner/banner-6666ca3b192f0.png', NULL, '2024-06-04 10:27:06', '2024-07-01 14:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso_code` varchar(191) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `is_default`, `created_at`, `updated_at`, `flag`) VALUES
(1, 'German', 'de', 1, '2023-12-20 07:01:23', '2023-12-20 07:01:23', 'assets/images/flags/german.png'),
(2, 'English', 'en', 0, '2023-12-20 07:01:23', '2023-12-20 07:01:23', 'assets/images/flags/english.png');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_18_050842_create_roles_table', 1),
(6, '2023_01_24_100950_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 5),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` float(14,2) DEFAULT 0.00,
  `coupon_discount` float(14,2) NOT NULL DEFAULT 0.00,
  `total_price` float(14,2) DEFAULT 0.00,
  `payment_fee` float(14,2) NOT NULL DEFAULT 0.00,
  `vat` float(14,2) DEFAULT 0.00,
  `grand_total` float DEFAULT 0,
  `discount_percentage` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Photo Frame,2=gift card'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wotirehu@mailinator.com', '$2y$10$HOVzY9pivvnX4B.t.moCAelBLY6ijAVzQeXibS0mQ3GjFg5b6oXiS', '2024-06-09 14:48:58'),
('shuvo.bg7@gmail.com', '$2y$10$Wrs43U.dEww.geGV5WS4Qe3afOJiYVsHKTCvScNsT0MmIkVPPvSgy', '2024-06-09 15:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(124) NOT NULL,
  `group_name` varchar(124) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.user.index', 'admin', 'admin', '2023-01-24 01:52:41', '2023-01-24 01:52:41'),
(2, 'admin.user.create', 'admin', 'admin', '2023-01-24 01:52:50', '2023-01-24 01:52:50'),
(3, 'admin.user.edit', 'admin', 'admin', NULL, NULL),
(4, 'admin.user.destroy', 'admin', 'admin', NULL, NULL),
(5, 'admin.cpage.index', 'custom-page', 'admin', NULL, NULL),
(6, 'admin.cpage.create', 'custom-page', 'admin', NULL, NULL),
(7, 'admin.cpage.store', 'custom-page', 'admin', NULL, NULL),
(8, 'admin.cpage.edit', 'custom-page', 'admin', NULL, NULL),
(9, 'admin.cpage.view', 'custom-page', 'admin', NULL, NULL),
(10, 'admin.cpage.update', 'custom-page', 'admin', NULL, NULL),
(11, 'admin.cpage.delete', 'custom-page', 'admin', NULL, NULL),
(16, 'admin.faq.index', 'faq', 'admin', '2023-01-23 19:52:41', '2023-01-23 19:52:41'),
(17, 'admin.faq.create', 'faq', 'admin', '2023-01-23 19:52:50', '2023-01-23 19:52:50'),
(18, 'admin.faq.store', 'faq', 'admin', '2023-01-23 19:52:41', '2023-01-23 19:52:41'),
(19, 'admin.faq.edit', 'faq', 'admin', '2023-01-23 19:52:50', '2023-01-23 19:52:50'),
(20, 'admin.faq.view', 'faq', 'admin', '2023-01-23 19:52:41', '2023-01-23 19:52:41'),
(21, 'admin.faq.update', 'faq', 'admin', '2023-01-23 19:52:50', '2023-01-23 19:52:50'),
(29, 'admin.faq.delete', 'faq', 'admin', '2023-01-23 19:52:50', '2023-01-23 19:52:50'),
(30, 'admin.customer.index', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(31, 'admin.customer.create', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(32, 'admin.customer.store', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(33, 'admin.customer.edit', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(34, 'admin.customer.update', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(35, 'admin.customer.delete', 'customer', 'admin', '2024-05-31 22:40:49', '2024-05-31 22:40:49'),
(36, 'admin.contact.index', 'contact', 'admin', '2024-06-01 00:24:41', '2024-06-01 00:37:14'),
(37, 'admin.contact.create', 'contact', 'admin', '2024-06-01 00:24:55', '2024-06-01 00:37:08'),
(38, 'admin.contact.store', 'contact', 'admin', '2024-06-01 00:25:02', '2024-06-01 00:37:03'),
(39, 'admin.contact.edit', 'contact', 'admin', '2024-06-01 00:25:08', '2024-06-01 00:36:59'),
(40, 'admin.contact.update', 'contact', 'admin', '2024-06-01 00:25:15', '2024-06-01 00:36:55'),
(41, 'admin.contact.delete', 'contact', 'admin', '2024-06-01 00:25:21', '2024-06-01 00:36:51'),
(42, 'admin.contact.view', 'contact', 'admin', '2024-06-01 00:25:53', '2024-06-01 00:36:30'),
(46, 'admin.seo.index', 'seo', 'admin', '2024-06-01 17:30:49', '2024-06-01 17:30:49'),
(47, 'admin.seo.create', 'seo', 'admin', '2024-06-01 17:56:27', '2024-06-01 17:56:27'),
(48, 'admin.seo.store', 'seo', 'admin', '2024-06-01 17:56:35', '2024-06-01 17:56:35'),
(49, 'admin.seo.edit', 'seo', 'admin', '2024-06-01 17:56:43', '2024-06-01 17:56:43'),
(50, 'admin.seo.update', 'seo', 'admin', '2024-06-01 17:56:53', '2024-06-01 17:56:53'),
(51, 'admin.seo.delete', 'seo', 'admin', '2024-06-01 18:04:53', '2024-06-01 18:04:53'),
(52, 'admin.seo.view', 'seo', 'admin', '2024-06-01 18:05:01', '2024-06-01 18:05:01'),
(53, 'admin.transaction.index', 'transaction', 'admin', '2024-06-04 18:01:05', '2024-06-04 18:01:05'),
(54, 'admin.plan.index', 'plan', 'admin', '2024-06-04 18:03:27', '2024-06-04 18:03:27'),
(55, 'admin.card.index', 'card', 'admin', '2024-06-04 18:04:33', '2024-06-04 18:04:33'),
(56, 'admin.settings.home.content', 'home-content', 'admin', '2024-06-04 18:06:04', '2024-06-04 18:06:04'),
(57, 'admin.settings.general', 'settings', 'admin', '2024-06-04 18:07:36', '2024-06-04 18:07:36'),
(58, 'admin.settings.Smtp.mail', 'settings', 'admin', '2024-06-04 18:12:33', '2024-06-04 18:12:33'),
(59, 'admin.roles.index', 'roles', 'admin', '2024-06-04 18:15:14', '2024-06-04 18:15:14'),
(60, 'admin.customer.view', 'customer', 'admin', '2024-06-01 08:40:49', '2024-06-01 08:40:49'),
(63, 'admin.plan.edit', 'plan', 'admin', '2024-06-05 04:03:27', '2024-06-05 04:03:27'),
(64, 'admin.user.password.edit', 'admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_de` varchar(255) DEFAULT NULL,
  `no_of_vcards` int(11) DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `price` double(8,2) DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `frequency` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Month, 2 = Year',
  `day` int(3) NOT NULL DEFAULT 0,
  `bg_color` varchar(255) DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `digital_wallet` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No , 1 = Yes',
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `self_branding` int(1) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `analytics` int(1) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `name_de`, `no_of_vcards`, `currency_id`, `currency`, `price`, `status`, `frequency`, `day`, `bg_color`, `is_default`, `digital_wallet`, `order_number`, `created_at`, `updated_at`, `created_by`, `updated_by`, `self_branding`, `analytics`) VALUES
(1, 'Free', 'Free', 1, 1, '€', 0.00, 1, 1, 30, '#53d5fd', 1, 0, 1, NULL, '2024-06-23 16:54:33', NULL, NULL, 0, 0),
(2, 'Gold', 'Business', 50, 1, '€', 1.99, 1, 2, 30, '#53d5fd', 0, 0, 4, NULL, '2024-07-02 13:49:56', NULL, NULL, 1, 1),
(3, 'Enterprise', 'Enterprise', 1000, 1, '€', 5000.00, 0, 2, 365, '#53d5fd', 0, 1, 3, '2024-06-09 16:06:51', '2024-06-29 13:22:55', NULL, NULL, 1, 1),
(4, 'Paki Logan', 'Wendy Martinez', 165, 1, '€', 0.01, 1, 1, 753, '#53d5fd', 0, 1, 660, '2024-06-09 16:47:19', '2024-07-02 13:50:13', NULL, NULL, 1, 1),
(5, 'Platinum', 'Platin', 2, 1, '€', 25.00, 1, 1, 30, '#53d5fd', 0, 0, 2, '2024-06-11 14:58:20', '2024-06-23 16:54:22', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `feature_name` varchar(500) DEFAULT NULL,
  `feature_name_de` varchar(500) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `feature_name`, `feature_name_de`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(121, 1, 'Add Your Photo, Contact Details, Bio, Logo and Links', 'Fügen Sie Ihr Foto, Ihre Kontaktdaten, Ihre Biografie, Ihr Logo und Links hinzu', NULL, '2024-06-23 16:54:33', '2024-06-23 16:54:33', NULL),
(122, 1, 'Create Unique Digital Business Card', 'Erstellen Sie eine einzigartige digitale Visitenkarte', NULL, '2024-06-23 16:54:33', '2024-06-23 16:54:33', NULL),
(123, 1, 'Unlimited Card Sharing', 'Unbegrenztes Teilen von Karten', NULL, '2024-06-23 16:54:33', '2024-06-23 16:54:33', NULL),
(124, 1, 'Contact Exchange', 'Kontaktbörse', NULL, '2024-06-23 16:54:33', '2024-06-23 16:54:33', NULL),
(131, 3, 'Add Your Photo, Contact Details, Bio, Logo and Links', 'Fügen Sie Ihr Foto, Kontaktdaten, Biografie, Logo und Links hinzu', NULL, '2024-06-29 13:22:55', '2024-06-29 13:22:55', NULL),
(132, 3, 'Import contacts from or export vCards to other platforms and devices', 'Kontakte importieren oder vCards auf andere Plattformen und Geräte exportieren', NULL, '2024-06-29 13:22:55', '2024-06-29 13:22:55', NULL),
(133, 3, 'Easily share vCards with individuals or groups via email, messaging apps, or social media.', 'Teilen Sie vCards einfach mit Einzelpersonen oder Gruppen per E-Mail, Messaging-Apps oder sozialen Medien.', NULL, '2024-06-29 13:22:55', '2024-06-29 13:22:55', NULL),
(138, 2, 'Add Your Photo, Contact Details, Bio, Logo and Links', 'Fügen Sie Ihr Foto, Ihre Kontaktdaten, Ihre Biografie, Ihr Logo und Links hinzu', NULL, '2024-07-02 13:49:56', '2024-07-02 13:49:56', NULL),
(139, 2, 'Create Unique Digital Business Card', 'Unbegrenzte Anzahl von Teammitgliedern', NULL, '2024-07-02 13:49:56', '2024-07-02 13:49:56', NULL),
(140, 2, 'Unlimited Card Sharing', 'Unbegrenztes Teilen deiner digitalen Visitenkarte', NULL, '2024-07-02 13:49:56', '2024-07-02 13:49:56', NULL),
(141, 2, 'Contact Exchange', 'Persönlicher Support per Mail', NULL, '2024-07-02 13:49:56', '2024-07-02 13:49:56', NULL),
(142, 4, 'Wanda Pratt', 'Daryl Cook', NULL, '2024-07-02 13:50:13', '2024-07-02 13:50:13', NULL),
(143, 4, 'Guinevere Blevins', 'Chanda Gonzales', NULL, '2024-07-02 13:50:13', '2024-07-02 13:50:13', NULL),
(144, 4, 'Len Henderson', 'Hadassah Cook', NULL, '2024-07-02 13:50:13', '2024-07-02 13:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(320) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-01-17 23:50:17', NULL),
(2, 'admin', 'admin', '2023-01-17 23:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(29, 1),
(29, 2),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `page_slug`, `title`, `description`, `keywords`, `image`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Welcome To Venmeo.de', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', 'venmeo, digital card, vcard, business cards', 'uploads/seo/logovenmeo-6666c014183a9.png', '2022-08-19 23:31:12', '2024-06-10 12:57:56'),
(2, 'faq', 'Welcome To Venmeo.de', 'Venmeo.de is a portal to buy and handle digital business cards', 'venmeo, digital card, vcard, business cards', 'uploads/seo/logovenmeo-6666c0083ba12.png', '2022-08-19 23:31:12', '2024-06-10 12:57:44'),
(3, 'contact', 'Welcome To Venmeo.de', 'Venmeo.de is a portal to buy and handle digital business cards', 'venmeo, digital card, vcard, business cards', 'uploads/seo/logovenmeo-6666bff1a2d2b.png', '2022-08-19 23:31:12', '2024-06-10 12:57:21'),
(4, 'pricing', 'Welcome To Venmeo.de', 'Venmeo.de is a classifieds portal to buy and handle digital business cards', 'venmeo, digital card, vcard, business cards', 'uploads/seo/logovenmeo-6666bfd14f2f3.png', '2022-08-19 23:31:12', '2024-06-10 12:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_key` varchar(191) DEFAULT NULL,
  `google_analytics_id` varchar(191) DEFAULT NULL,
  `site_name` longtext DEFAULT NULL,
  `site_logo` varchar(191) DEFAULT NULL,
  `admin_logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `seo_meta_description` longtext DEFAULT NULL,
  `seo_keywords` longtext DEFAULT NULL,
  `seo_image` varchar(191) DEFAULT NULL,
  `tawk_chat_bot_key` varchar(191) DEFAULT NULL,
  `name` longtext NOT NULL,
  `address` longtext NOT NULL,
  `driver` varchar(191) NOT NULL,
  `host` varchar(191) NOT NULL,
  `port` int(11) NOT NULL,
  `encryption` varchar(191) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_type` varchar(50) DEFAULT NULL,
  `app_mode` enum('local','live') DEFAULT NULL COMMENT 'local/live',
  `facebook_client_id` varchar(150) DEFAULT NULL,
  `facebook_client_secret` varchar(150) DEFAULT NULL,
  `facebook_callback_url` varchar(255) DEFAULT NULL,
  `google_client_id` varchar(150) DEFAULT NULL,
  `google_client_secret` varchar(150) DEFAULT NULL,
  `google_callback_url` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(124) DEFAULT NULL,
  `office_address` varchar(150) DEFAULT NULL,
  `facebook_url` varchar(150) DEFAULT NULL,
  `youtube_url` varchar(150) DEFAULT NULL,
  `twitter_url` varchar(150) DEFAULT NULL,
  `linkedin_url` varchar(150) DEFAULT NULL,
  `telegram_url` varchar(150) DEFAULT NULL,
  `whatsapp_number` varchar(150) DEFAULT NULL,
  `ios_app_url` varchar(150) DEFAULT NULL,
  `android_app_url` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_no` varchar(150) DEFAULT NULL,
  `support_email` varchar(30) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `invoice_footer` text DEFAULT NULL,
  `invoice_footer_de` text DEFAULT NULL,
  `tax` float(13,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_key`, `google_analytics_id`, `site_name`, `site_logo`, `admin_logo`, `favicon`, `seo_meta_description`, `seo_keywords`, `seo_image`, `tawk_chat_bot_key`, `name`, `address`, `driver`, `host`, `port`, `encryption`, `username`, `password`, `status`, `created_at`, `updated_at`, `application_type`, `app_mode`, `facebook_client_id`, `facebook_client_secret`, `facebook_callback_url`, `google_client_id`, `google_client_secret`, `google_callback_url`, `copyright_text`, `office_address`, `facebook_url`, `youtube_url`, `twitter_url`, `linkedin_url`, `telegram_url`, `whatsapp_number`, `ios_app_url`, `android_app_url`, `email`, `phone_no`, `support_email`, `instagram_url`, `map_link`, `invoice_footer`, `invoice_footer_de`, `tax`) VALUES
(1, NULL, NULL, 'cricketspain', '/assets/uploads/logo/ce-logo-6688c9cf5b211.png', '/assets/uploads/logo/v-66687bc2b63a0.png', '/assets/uploads/icon/ce-logo-6688c9cf5a398.png', 'Welcome to cricketspain.es  It’s more than a digital business card, it’s a networking sales generator.', 'cricketspain', '/assets/uploads/logo/ce-logo-6688c9cf5b467.png', NULL, '', '', '', 'smtp.mailtrap.io', 2525, 'tls', 'maidul@gmailc.om', '123456', '1', '2022-03-12 14:54:38', '2024-07-05 22:36:31', NULL, NULL, NULL, NULL, 'https://letsconnectv2.webdevs4u.com/auth/facebook/callback', NULL, NULL, 'https://letsconnectv2.webdevs4u.com/auth/google/callback', 'Copyright © LetsConnect. All rights reserved.', 'Wipperstraße 4 38120 Braunschweig  Deutschland', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'info@cricketspain.es', '+491733910844', 'info@cricketspain.es', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.9694101549608!2d10.470471276664389!3d52.24393927199012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47aff62f43813d0d%3A0x59a85600bd7d45eb!2sWipperstra%C3%9Fe%204%2C%2038120%20Braunschweig%2C%20Germany!5e0!3m2!1sen!2sbd!4v1718101537960!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Thank you for choosing our services! For any queries, we are here to help.', 'Vielen Dank, dass du dich für unsere Dienste entschieden hast! Bei Fragen stehen wir dir gerne zur Verfügung.', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(255) NOT NULL,
  `name` varchar(224) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL COMMENT '\r\n',
  `details` varchar(1024) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(255) NOT NULL,
  `image` varchar(512) DEFAULT NULL,
  `name_ar` varchar(1024) DEFAULT NULL,
  `details_de` text DEFAULT NULL,
  `rates` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `order_id`, `details`, `status`, `created_at`, `updated_at`, `created_by`, `image`, `name_ar`, `details_de`, `rates`) VALUES
(1, 'Michael S', 'Informatiker E Data Systems', 1, 'Since I started using the digital business card, my networking has improved dramatically. It\'s so easy to share my contact information and I always make a professional impression. Highly recommended!', 1, '2024-06-27 16:32:53', '2024-06-27 20:32:53', 5, 'uploads/testimonial/pexels-italo-melo-2379004(1)-666ac592d9ff4.jpg', NULL, 'Seit ich die digitale Visitenkarte nutze, hat sich mein Networking drastisch verbessert. Es ist so einfach, meine Kontaktdaten zu teilen, und ich hinterlasse immer einen professionellen Eindruck. Absolut empfehlenswert!', 1),
(3, 'Thomas B', 'Eventmanager', 2, 'With the digital business card, I can share my contact details quickly and easily. The integration with social media is a huge plus. It makes networking much more effective!', 1, '2024-06-27 16:33:49', '2024-06-27 20:33:49', 5, 'uploads/testimonial/pexels-nicholas-swatz-2770600-666ad299704f1.jpg', NULL, 'Mit der digitalen Visitenkarte kann ich meine Kontaktdaten schnell und unkompliziert weitergeben. Die Integration mit sozialen Medien ist ein großer Pluspunkt. Es macht das Netzwerken viel effektiver!', 1),
(4, 'Martin Biedermann', 'Immobilienmakler', 3, 'I love the flexibility and sustainability of the digital business card. No more printed cards that can get lost. My data is always up to date and immediately available. Simply brilliant!', 1, '2024-06-27 16:35:12', '2024-06-27 20:35:12', 5, 'uploads/testimonial/pexels-andrea-piacquadio-3779414-666ad2b5e6190.jpg', NULL, 'Ich liebe die Flexibilität und die Nachhaltigkeit der digitalen Visitenkarte. Keine gedruckten Karten mehr, die verloren gehen können. Meine Daten sind immer aktuell und sofort verfügbar. Einfach genial!', 1),
(5, 'Lisa K.', 'Marketing Managerin', 4, 'The digital business card has helped me manage my contacts more efficiently. The ability to share it via QR code or email saves time and is extremely convenient. A must-have for every professional!', 1, '2024-06-27 16:36:09', '2024-06-27 20:36:09', 5, NULL, NULL, 'Die digitale Visitenkarte hat mir geholfen, meine Kontakte effizienter zu verwalten. Die Möglichkeit, sie per QR-Code oder E-Mail zu teilen, spart Zeit und ist extrem praktisch. Ein Muss für jeden Profi!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_number` varchar(50) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `plan_id` int(2) DEFAULT NULL,
  `amount` double NOT NULL,
  `pay_date` date NOT NULL,
  `payment_method` varchar(124) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `transaction_number`, `user_id`, `plan_id`, `amount`, `pay_date`, `payment_method`, `currency`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'trx_66617ea85c1c6', 20, 2, 20, '2024-06-06', NULL, 'Euro', NULL, 2, '2024-06-06 03:17:28', '2024-06-06 03:17:28'),
(2, NULL, 'trx_66617f026797b', 20, 2, 20, '2024-06-06', NULL, 'Euro', NULL, 2, '2024-06-06 03:18:58', '2024-06-06 03:18:58'),
(3, NULL, 'trx_66617f2a359cb', 20, 2, 20, '2024-06-06', NULL, 'Euro', NULL, 2, '2024-06-06 03:19:38', '2024-06-06 03:19:38'),
(4, '5N43214036742234W', 'trx_6661a625dee30', 20, 2, 20, '2024-06-06', 'PayPal', 'Euro', NULL, 1, '2024-06-06 06:05:57', '2024-06-06 06:05:57'),
(5, '4L4748538N240694M', 'trx_6665898a92ae4', 22, 2, 20, '2024-06-09', 'PayPal', 'Euro', NULL, 1, '2024-06-09 14:52:58', '2024-06-09 14:52:58'),
(7, '1FV6652346044493J', 'trx_6666cb01de8a4', 29, 3, 22.5, '2024-06-10', 'PayPal', 'Euro', NULL, 1, '2024-06-10 13:44:33', '2024-06-10 13:44:33'),
(8, '7JE05296X8411854C', 'trx_6666cd50898fd', 29, 2, 20, '2024-06-10', 'PayPal', 'Euro', NULL, 1, '2024-06-10 13:54:24', '2024-06-10 13:54:24'),
(9, '4C544621YD398493U', 'trx_6666d88db81ed', 28, 2, 20, '2024-06-10', 'PayPal', 'Euro', NULL, 1, '2024-06-10 14:42:21', '2024-06-10 14:42:21'),
(10, '7VN00510KW807053T', 'trx_6667ec53606cd', 31, 3, 22.5, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 10:18:59', '2024-06-11 10:18:59'),
(11, '7SH36775AA433143C', 'trx_6667fa76ebfcc', 31, 2, 20, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 11:19:18', '2024-06-11 11:19:18'),
(12, '1BG83713EW423771F', 'trx_6667fbda3abff', 31, 3, 22.5, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 11:25:14', '2024-06-11 11:25:14'),
(13, '0K807697TG9500902', 'trx_66682e992f583', 31, 5, 25, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 15:01:45', '2024-06-11 15:01:45'),
(14, '3Y9961680S219293U', 'trx_66682faa582e5', 31, 2, 30, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 15:06:18', '2024-06-11 15:06:18'),
(15, '9M5879744R231022J', 'trx_66682fc7a7089', 31, 5, 25, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 15:06:47', '2024-06-11 15:06:47'),
(16, '4U524549V4450472G', 'trx_666844a3b9b55', 31, 2, 30, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 16:35:47', '2024-06-11 16:35:47'),
(17, '3B755897Y7902014X', 'trx_666844d0ed7c1', 31, 3, 22.5, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 16:36:32', '2024-06-11 16:36:32'),
(18, '77A7600081888344F', 'trx_666844e574023', 31, 5, 25, '2024-06-11', 'PayPal', 'Euro', NULL, 1, '2024-06-11 16:36:53', '2024-06-11 16:36:53'),
(19, '9NC918811N318441D', 'trx_666973db1a549', 32, 3, 22.5, '2024-06-12', 'PayPal', 'Euro', NULL, 1, '2024-06-12 14:09:31', '2024-06-12 14:09:31'),
(20, '8HS57138T9784603M', 'trx_667670cec5ffa', 26, 3, 5000, '2024-06-22', 'PayPal', 'Euro', NULL, 1, '2024-06-22 10:35:58', '2024-06-22 10:35:58'),
(21, '24C44397DH197461A', 'trx_667bab390d105', 26, 2, 1.99, '2024-06-26', 'PayPal', 'Euro', NULL, 1, '2024-06-26 09:46:33', '2024-06-26 09:46:33'),
(22, '4X543751EA163154C', 'trx_667d352c68b8b', 26, 2, 1.99, '2024-06-27', 'PayPal', 'Euro', NULL, 1, '2024-06-27 13:47:24', '2024-06-27 13:47:24'),
(23, '8F148034807477635', 'trx_668402aa69678', 34, 5, 25, '2024-07-02', 'PayPal', 'Euro', NULL, 1, '2024-07-02 07:37:46', '2024-07-02 07:37:46'),
(24, '76H660776W718325C', 'trx_6685450bdc27a', 31, 2, 1.99, '2024-07-03', 'PayPal', 'Euro', NULL, 1, '2024-07-03 06:33:15', '2024-07-03 06:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_code` int(10) NOT NULL COMMENT 'unique code ',
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT 1 COMMENT '1=active,0=inactive',
  `current_pan_id` int(10) NOT NULL,
  `current_pan_name` varchar(255) NOT NULL,
  `current_pan_valid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `username`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `remember_token`, `created_at`, `updated_at`, `status`, `current_pan_id`, `current_pan_name`, `current_pan_valid_date`) VALUES
(19, 1001, '74684356', 'Md Maidul', 'maidul@gmail.com', NULL, '$2y$10$hXrPoHSHvBGx46bNknNX9.SjSE5L5kATpUlbR0kvrQVm19FcFtm4y', NULL, NULL, NULL, NULL, '2024-06-04 23:58:18', '2024-06-04 23:58:18', 1, 1, 'Free', '2024-07-05'),
(20, 1001, '310666204', 'akhi', 'akhi@gmail.com', NULL, '$2y$10$n2kPNC1PKFOnJjznslSlgeWlzoCA4pF.XIMjqrmCbpEO0VfkPE0yG', '01681944126', NULL, 'uploads/UserInfo/water-66617cec7c425.png', NULL, '2024-06-06 03:09:23', '2024-06-06 06:05:57', 1, 2, 'Gold', '2024-07-06'),
(21, 1001, '1029181467', 'Silathi', 'silathi@gmail.com', NULL, '$2y$10$JUgASN5cdcYC8oepSGGjNuCTyB47p9crvziXZJYJN6IoXnoc1LDtO', '0168194426', NULL, 'uploads/UserInfo/2-6661aaa5627ea.png', NULL, '2024-06-06 06:22:55', '2024-06-06 06:25:09', 1, 1, 'Free', '2024-07-06'),
(22, 1001, '1461736652', 'Brenna Salas', 'wotirehu@mailinator.com', NULL, '$2y$10$qcjdgqXD5HAZA7p5AtiNo.tBPpsVApVdJNlP3UO2LJBoKyG9rc95C', NULL, NULL, NULL, 'EL0k76ltUE7fNK5aoUUMN601n8BB7Blx6tDwLQfWKCh00HqYi1DMqT3D4pXl', '2024-06-09 14:48:45', '2024-06-09 14:52:58', 1, 2, 'Gold', '2024-07-09'),
(23, 1001, '1993855518', 'Mr.smith', '280marty@fthcapital.com', NULL, '$2y$10$5hEPuj6IS6jj5CJF2elPhe8wD18D7sGOUnzX.TDPF2a8U4CUnCUue', NULL, NULL, NULL, NULL, '2024-06-09 15:05:59', '2024-06-09 15:05:59', 1, 1, 'Free', '2024-07-09'),
(26, 1001, '422755653', 'rijon', 'dvlpr.rijon@gmail.com', NULL, '$2y$10$.OHvzrmABjTzAvB6OLEJo.ZeDaVfv59DwbJEyKS2mC/lyqtZMKwCC', NULL, NULL, NULL, 'xoqEt6rZIei5d0kmuwA4haCRgYWqlOBQSZWGLKtfvUdVYAxsOh06b0iCZ3hE', '2024-06-09 15:30:41', '2024-06-27 13:47:24', 1, 2, 'Gold', '2024-07-27'),
(28, 1001, '1074078502', 'Maidul Islam', 'maidul.tech@gmail.com', NULL, '$2y$10$vk45eKEZX4pJrLbW/RhYOuE0JWc9YvjpGsrCUgQCNGo45cscL01PS', '01681944126', 'Unit 10A, House 21, Road 17 \r\nBanani C/A, Dhaka 1213', 'uploads/UserInfo/my-6666c19769248.jpg', NULL, '2024-06-10 13:00:17', '2024-06-10 14:42:21', 1, 2, 'Gold', '2024-07-10'),
(29, 1001, '101810182', 'Rabin Mia', 'arobilrbn@gmail.com', NULL, '$2y$10$hTVDMTJ19TzJvlHRqXgYg.wN9c0QRDBJQ/pWl7KQRNzYCUhqfgLYi', '484845151', 'dhaka', NULL, NULL, '2024-06-10 13:42:32', '2024-06-10 13:54:24', 1, 2, 'Gold', '2024-07-10'),
(31, 1001, '474063789', 'Sajjel Hossain', 'shuvo.bg75@gmail.com', NULL, '$2y$10$8q5lJv3cUIW0..VyTwg5TeocO98lHIbrpf0EosVz5WF6jEllmmuoq', '016819445588', 'H21, R17, Banani\r\nDhaka, Bangladesh', 'uploads/UserInfo/65fcf790d0adc-668516d85a331.png', 'Du8LOZYYljWI23okW5pMsj4NTV0Ft52oTujevtIjBnkzRZF0OxPRxUdNl9H3', '2024-06-11 09:04:12', '2024-07-03 06:33:15', 1, 2, 'Gold', '2024-08-02'),
(32, 1001, '81761143', 'Rony Mia', 'ronymia2211@gmail.com', NULL, '$2y$10$PiMP7wUELBRJ00ZPieISH..tB/jnu53K4N09Tl34tVwIFGE3.Ra2K', '01767671133', 'dhaka', 'uploads/UserInfo/3-66697426051d4.png', NULL, '2024-06-12 13:59:58', '2024-06-12 14:10:46', 1, 3, 'Silver', '2024-07-12'),
(33, 1002, '695137592', 'Cüneyt', 'Cuneytkurt63@gmail.com', NULL, '$2y$10$zHl.MkzWqJjHpsVrN.i0W.0uTI.6BupLCHhnl3mF6HzH988cNSKl.', '01733910844', NULL, NULL, NULL, '2024-06-16 15:41:13', '2024-06-16 15:41:13', 1, 1, 'Free', '2024-07-16'),
(34, 1001, '1315291764', 'Cüneyt Kurt', 'Cuneytkurt63@web.de', NULL, '$2y$10$hzZzJ0OnSlfuG.aMCKEhQ.AA43dCuCylrooAQ/u8PFclxkrYHRKtC', '01733910844', 'Westbahnhof 1b, 38118 Braunschweig', 'uploads/UserInfo/v-new-667c1a4d8a35f.png', NULL, '2024-06-16 15:44:06', '2024-07-02 07:37:46', 1, 5, 'Platinum', '2024-08-01'),
(35, 1001, '1466777361', 'rabin', 'rabinarobil@gmail.com', NULL, '$2y$10$Z0uPrLD7JOWm2ijL96Ux/edIBrEd/KqbZWaq9I61bR.ZBKpIaYmLu', NULL, NULL, NULL, NULL, '2024-06-22 17:54:40', '2024-06-26 09:44:31', 1, 5, 'Platinum', '2024-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `vcards`
--

CREATE TABLE `vcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `url_alias` varchar(191) NOT NULL COMMENT 'User Name',
  `default_language_code` varchar(10) DEFAULT NULL,
  `template_id` int(2) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `font_size` int(2) DEFAULT 14,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `google_analytics` varchar(1000) DEFAULT NULL,
  `enable_enquiry_form` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `total_view` int(128) NOT NULL DEFAULT 0,
  `total_contact_saved` int(128) NOT NULL DEFAULT 0,
  `paypal_account` varchar(512) DEFAULT NULL,
  `self_branding` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vcards`
--

INSERT INTO `vcards` (`id`, `user_id`, `url_alias`, `default_language_code`, `template_id`, `status`, `first_name`, `last_name`, `phone`, `phone_2`, `email`, `occupation`, `description`, `location`, `company`, `job_title`, `dob`, `font_size`, `meta_title`, `meta_keyword`, `meta_description`, `google_analytics`, `enable_enquiry_form`, `created_at`, `updated_at`, `cover_image`, `profile_image`, `total_view`, `total_contact_saved`, `paypal_account`, `self_branding`) VALUES
(1, 20, '6661a9b197f88', 'de', 1, 1, 'Md Maidul', 'Islam', '01681944126', NULL, 'maidul.tech@gmail.com', NULL, NULL, 'Banani, Dhaka', 'Arobil Ltd', 'Php Developer', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-06 06:21:05', '2024-06-06 06:21:05', 'uploads/vcard/306a36422cf0e1c9f0c3437a6870a5fc-6661a9b198279.jpg', 'uploads/vcard/my-6661a9b1983cf.jpg', 0, 0, NULL, NULL),
(2, 22, '666590113debf', 'de', 1, 1, 'Myras', 'Reeds', '15658053934', NULL, 'lydedes@mailinator.com', NULL, NULL, 'Kayes', 'Duncans', 'Maliks', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-09 15:20:49', '2024-06-14 00:56:55', 'uploads/vcard/1717931993.png', 'uploads/vcard/1717932018.png', 4, 0, 'https://www.sypusaheviduzet.org.uk', 'Fleur'),
(5, 26, 'sakibdev', 'de', 1, 1, 'Shakib Hossain', 'Rijon', '01679185540', '01679185541', 'sakibrrb77@gmail.com', NULL, NULL, 'Naraygan, Dhaka, Bangladesh', 'Arobil IT Ltd', 'Full Stack Developer', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-09 17:36:28', '2024-06-27 13:36:21', 'uploads/vcard/1717939635.png', 'uploads/vcard/1717939669.png', 34, 10, NULL, NULL),
(6, 28, '6666c485841ed', 'de', 2, 1, 'Maidul', 'Islam', '01681944126', NULL, 'maidul.tech@gmail.com', NULL, NULL, 'Unit 10A, House 21, Road 17, Banani C/A, Dhaka 1213', 'Arobil Ltd', 'PHP Developer', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-10 13:16:53', '2024-06-27 16:28:35', 'uploads/vcard/1718013656.png', 'uploads/vcard/1718010824.png', 29, 2, 'maidul.tech@gmail.com', NULL),
(8, 31, 'shuvo23', 'de', 2, 1, 'Isabella', 'Martinez', '785457547', NULL, 'shuvo.bg7@gmail.com', NULL, NULL, 'Auguststraße 3, 38100 Braunschweig', 'Fashion 4U', 'Designerin bei', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-11 09:35:27', '2024-07-03 05:20:22', 'uploads/vcard/1719510806.png', 'uploads/vcard/1719510824.png', 29, 4, NULL, NULL),
(9, 31, 'shakib75', 'de', 1, 1, 'Shakib', 'Al Hasan', '14579854', NULL, 'shuvo.bg7@gmail.com', NULL, NULL, 'Mirpur,Dhaka,Bangladesh', 'Bangladesh Cricket', 'Allrounder', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-11 10:26:59', '2024-06-14 00:50:00', 'uploads/vcard/1718087119.png', 'uploads/vcard/1718087140.png', 8, 1, 'https://paypal.com', 'shakib75'),
(10, 31, 'Tamim28', 'de', 2, 1, 'Tamim', 'Iqbal', '1664544', NULL, 'shuvo.bg7@gmail.com', NULL, NULL, 'Mirpur,Dhaka,Bangladesh', 'Bangladesh Cricket', 'Opener Batsman', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-11 10:29:40', '2024-06-14 00:50:27', 'uploads/vcard/1718087356.png', 'uploads/vcard/1718087371.png', 5, 0, NULL, 'tamim28'),
(11, 31, '6667fb2d8755b', 'de', 1, 1, 'Sajjel Hossain', 'Smith', '4849884', NULL, 'shuvo.bg7@gmail.com', NULL, NULL, 'Australia', 'Australia Team', 'Batsman', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-11 11:23:13', '2024-06-17 15:28:39', 'uploads/vcard/1718090572.png', 'uploads/vcard/1718090586.png', 2, 0, NULL, 'smith 45555555555555555555555'),
(13, 32, 'ronymia', 'de', 1, 1, 'Cüneyt', 'Kurt', '01767671133', NULL, 'Cuneytkurt63@gmail.com', NULL, NULL, 'Wipperstrasse 4', 'Venmeo', 'Geschäftsführer', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-12 14:03:14', '2024-06-29 13:17:59', 'uploads/vcard/1718531209.png', 'uploads/vcard/1718531156.png', 23, 1, 'arobiloutsourcing@gmail.com', NULL),
(14, 34, 'Cueneytkurt', 'de', 2, 1, 'Cüneyt', 'Kurt', '01733910844', NULL, 'Cuneytkurt63@web.de', NULL, NULL, 'Westbahnhof 1b, 38118 Braunschweig', 'Venmeo', 'Geschäftsführer bei', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-16 15:49:00', '2024-07-01 17:05:28', 'uploads/vcard/1718538498.png', 'uploads/vcard/1718538287.png', 66, 0, NULL, NULL),
(15, 26, 'Brock', 'de', 2, 1, 'Kai', 'Casey', '14335292056', '18762018191', 'wawidy@mailinator.com', NULL, NULL, 'Chantale', 'Stuart', 'Ginger', NULL, 14, NULL, NULL, NULL, NULL, 1, '2024-06-27 13:49:08', '2024-06-29 13:17:35', 'uploads/vcard/1719481737.png', 'uploads/vcard/1719481743.png', 12, 0, 'Jena', 'Shakib');

-- --------------------------------------------------------

--
-- Table structure for table `vcard_analytics`
--

CREATE TABLE `vcard_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `vcard_id` int(10) UNSIGNED DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `meta` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vcard_analytics`
--

INSERT INTO `vcard_analytics` (`id`, `session`, `vcard_id`, `uri`, `source`, `country`, `browser`, `device`, `operating_system`, `ip`, `language`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'CGypWO6VT6a3CeDw2zTzejMSae3ZHHHUNIfyaFwr', 2, '/666590113debf', 'https://venmeo.de/user/card', NULL, 'Chrome', 'desktop', 'Windows', '103.112.206.220', 'en', 'false', '2024-06-09 15:20:56', '2024-06-09 15:20:56'),
(10, 'qn6WyFpCtRK7eUAtjGuV8Nkvd50eeNtw9VF6NCZZ', 5, '/6665afdc82841', 'https://venmeo.de/user/card', NULL, 'Chrome', 'phone', 'AndroidOS', '103.112.206.220', 'en', 'false', '2024-06-09 17:39:42', '2024-06-09 17:39:42'),
(11, '2tdth4koBWUn2YtA9LK6qyeq3PTrnNO4nOCBvvm1', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '103.112.206.220', 'en', 'false', '2024-06-09 17:42:29', '2024-06-09 17:42:29'),
(12, 'sTJL8YHJMQMO4Q88KPJu29d6hcKxQolwTG8xyGKL', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '37.34.247.176', 'en', 'false', '2024-06-09 18:58:14', '2024-06-09 18:58:14'),
(13, 'F1PlCHcwTeZW8iugypTUFpPDYXtZBS6t7RTUeocu', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '37.231.194.171', 'en', 'false', '2024-06-09 19:46:58', '2024-06-09 19:46:58'),
(14, 'mxu9BX1iuiUv7YsdAjK0e9nCVsVAR2gs950wfEH3', 5, '/6665afdc82841', 'https://venmeo.de/user/card', NULL, 'Chrome', 'desktop', 'Windows', '103.112.206.220', 'en', 'false', '2024-06-09 21:00:55', '2024-06-09 21:00:55'),
(15, '42PAjUlTk5Smg7V9HR9zib4nXcEtUOuSCwgI9OAD', 5, '/6665afdc82841', 'https://venmeo.de/admin/card', NULL, 'Chrome', 'desktop', 'Windows', '58.145.184.228', 'en', 'false', '2024-06-10 08:17:48', '2024-06-10 08:17:48'),
(16, 'HCRte02GTVmRJOK6qvXIoLyAvqHvIYWkBhHWMRKD', 5, '/6665afdc82841', NULL, NULL, 'Chrome', 'desktop', 'Windows', '58.145.184.228', 'en', 'false', '2024-06-10 08:20:35', '2024-06-10 08:20:35'),
(17, '44G5fYPYHcxBY6OqeqRNOIPWgQpUvwwilMr1r9RH', 5, '/6665afdc82841', NULL, NULL, 'Chrome', 'desktop', 'Windows', '169.60.172.117', '', 'false', '2024-06-10 08:24:11', '2024-06-10 08:24:11'),
(18, 'IERgUyyZAQT9Lg6xG98N78XlJp1bs8k2UopErZIZ', 5, '/6665afdc82841', 'https://venmeo.de/user/dashboard', NULL, 'Chrome', 'desktop', 'Windows', '58.145.184.228', 'en', 'false', '2024-06-10 08:42:39', '2024-06-10 08:42:39'),
(19, 'IdCy380ElZ3u7kWTuMofjUolTWisMI6mjJXPkRfp', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '58.145.184.228', 'en', 'false', '2024-06-10 08:53:37', '2024-06-10 08:53:37'),
(20, 'wMp6gzr1XuMst03Dqyvclc1DVQ4Mfe9X7DZsRmFH', 5, '/6665afdc82841', NULL, NULL, 'Chrome', 'phone', 'AndroidOS', '58.145.184.228', 'en', 'false', '2024-06-10 08:54:17', '2024-06-10 08:54:17'),
(21, 'G4h9LVctPSb6LKY46IG3aGva42lT2714TS3ydiye', 6, '/6666c485841ed', 'https://venmeo.de/user/card', NULL, 'Chrome', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-10 13:22:22', '2024-06-10 13:22:22'),
(22, '3y4eM6lZjncaB4T8XoO960uIEHHvLTbyQwd8yti0', 6, '/6666c485841ed', NULL, NULL, 'Chrome', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-10 14:00:26', '2024-06-10 14:00:26'),
(23, 'AbxhWCODxyeNiiJinkZrfDNqm78rsSiIswtKpaLa', 6, '/6666c485841ed', NULL, NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-10 14:25:52', '2024-06-10 14:25:52'),
(24, 'sWfX7pQjol8xVX4IJ8OdVJu4NlkNpNCUEih7UZy5', 6, '/6666c485841ed', NULL, NULL, 'Chrome', 'phone', 'AndroidOS', '118.179.40.152', 'en', 'false', '2024-06-10 14:26:21', '2024-06-10 14:26:21'),
(25, '4NP0kspkTew2xkAsX93QCp9QnBlZv61urU1vFF2m', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '103.112.206.220', 'en', 'false', '2024-06-10 17:23:32', '2024-06-10 17:23:32'),
(26, 'vpOLW2xZhRyXpjQU5ksFVD4qgd5MzpMP9TXfKY7H', 5, '/6665afdc82841', NULL, NULL, 'Chrome', 'phone', 'AndroidOS', '103.112.206.220', 'en', 'false', '2024-06-10 17:23:45', '2024-06-10 17:23:45'),
(27, '2N9QhmHgpvjTNGJMrgodbjliE11sSkGsa2cIYR9D', 6, '/6666c485841ed', 'https://venmeo.de/admin/customer/28/view', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-10 19:01:21', '2024-06-10 19:01:21'),
(28, '2N9QhmHgpvjTNGJMrgodbjliE11sSkGsa2cIYR9D', 5, '/6665afdc82841', 'https://venmeo.de/admin/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-10 19:04:35', '2024-06-10 19:04:35'),
(31, 'qiyATfa7uuzfgW6WmuUFP8FM7SsCtsmahYJPTFMP', 6, '/6666c485841ed', 'https://venmeo.de/admin/customer/28/view', NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-10 19:06:52', '2024-06-10 19:06:52'),
(37, 'rB7trKeg9DoYmW8JoHksCSbvW8O0U0QNomJmsGob', 8, '/shuvo23', NULL, NULL, 'Firefox', 'desktop', 'Windows', '118.179.179.232', 'en', 'false', '2024-06-11 09:38:47', '2024-06-11 09:38:47'),
(38, 'h2GNR6cM3ufpuUpQLViySm3frYGWWuexfX6K1pW8', 9, '/shakib75', NULL, NULL, 'Chrome', 'desktop', 'Windows', '118.179.179.232', 'en', 'false', '2024-06-11 10:34:11', '2024-06-11 10:34:11'),
(39, 'h2GNR6cM3ufpuUpQLViySm3frYGWWuexfX6K1pW8', 10, '/tamim28', NULL, NULL, 'Chrome', 'desktop', 'Windows', '118.179.179.232', 'en', 'false', '2024-06-11 10:40:02', '2024-06-11 10:40:02'),
(40, 'f21IIqyZGFVWXJt6T64mlOHzMDGZG6mBqjD5NmUH', 9, '/shakib75', NULL, NULL, 'Chrome', 'phone', 'AndroidOS', '118.179.179.232', 'en', 'false', '2024-06-11 11:09:46', '2024-06-11 11:09:46'),
(48, 'kZHFCNOoH4OrJvPysjPy4c6sSchOKPhpacwcCcx6', 13, '/ronymia', NULL, NULL, 'Chrome', 'desktop', 'Windows', '118.179.179.232', 'en', 'false', '2024-06-12 14:06:39', '2024-06-12 14:06:39'),
(49, 'sxB71ZE4mISZUe6Qm9ne9lxeWyRelT9R8XOaMTXj', 13, '/ronymia', 'https://venmeo.de/admin/dashboard', NULL, 'Chrome', 'desktop', 'Windows', '118.179.179.232', 'en', 'false', '2024-06-12 14:12:15', '2024-06-12 14:12:15'),
(55, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 13, '/ronymia', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:47:03', '2024-06-14 00:47:03'),
(56, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 9, '/shakib75', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:47:34', '2024-06-14 00:47:34'),
(57, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 8, '/shuvo23', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:47:38', '2024-06-14 00:47:38'),
(58, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 10, '/Tamim28', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:47:42', '2024-06-14 00:47:42'),
(59, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 6, '/6666c485841ed', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:47:50', '2024-06-14 00:47:50'),
(60, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 2, '/666590113debf', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:48:07', '2024-06-14 00:48:07'),
(61, 'iuZXuq4olcNH0VLXAD9kyENdpCpjkeacuUIlbZpJ', 2, '/666590113debf', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-14 00:48:38', '2024-06-14 00:48:38'),
(62, 'iuZXuq4olcNH0VLXAD9kyENdpCpjkeacuUIlbZpJ', 13, '/ronymia', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-14 00:49:33', '2024-06-14 00:49:33'),
(63, 'm7pYDHmxPY5oQOK37Utz65TWlKXgwoIHp4sK4ijA', 11, '/6667fb2d8755b', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-14 00:49:47', '2024-06-14 00:49:47'),
(64, 'iuZXuq4olcNH0VLXAD9kyENdpCpjkeacuUIlbZpJ', 10, '/Tamim28', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-14 00:50:27', '2024-06-14 00:50:27'),
(67, '5AZ5NznbFo2GDcfZucRgwc57C7SjAVh1Ps2B2pQv', 5, '/6665afdc82841', 'http://m.facebook.com/', NULL, 'Chrome', 'phone', 'AndroidOS', '103.188.136.188', 'en', 'false', '2024-06-14 02:14:11', '2024-06-14 02:14:11'),
(69, 'hc6NZLsp9ZNJE90eCmiBWhksqJ2LkKsMPzXgJzgO', 13, '/ronymia', 'https://venmeo.de/admin/customer/32/view', NULL, 'Safari', 'phone', 'iOS', '109.42.114.122', 'de', 'false', '2024-06-16 13:25:29', '2024-06-16 13:25:29'),
(70, 'cfqwkDb8a8brUAEouYNgcyCQfMeY7AZQH4NZHkRd', 13, '/ronymia', 'https://venmeo.de/admin/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-16 15:42:49', '2024-06-16 15:42:49'),
(71, 'ghgB0JLcP1O6EM5R3ylgNBjNr5qLZnKTcbFGHcO2', 13, '/ronymia', 'https://venmeo.de/admin/card', NULL, 'Safari', 'phone', 'iOS', '178.7.223.99', 'de', 'false', '2024-06-16 16:52:37', '2024-06-16 16:52:37'),
(72, 'WHtfHW1gRJagbs3bJklarcPUCaXwtPdRBV2ZSnXv', 14, '/666ed017cafcd', 'https://venmeo.de/admin/card', NULL, 'Safari', 'phone', 'iOS', '178.7.223.99', 'de', 'false', '2024-06-16 16:53:17', '2024-06-16 16:53:17'),
(73, 'MmHRyNOjLzzWZB13Xd8ROJGBqBGCsEVdujmzjNMe', 14, '/666ed017cafcd', 'https://venmeo.de/user/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-17 14:20:07', '2024-06-17 14:20:07'),
(74, 'HSD6ilIdxckp8n128Y3gRbZASdeyZwmh2CbSG9Cp', 8, '/shuvo23', 'https://venmeo.de/admin/card?user_id=31', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-17 15:27:48', '2024-06-17 15:27:48'),
(75, 'HSD6ilIdxckp8n128Y3gRbZASdeyZwmh2CbSG9Cp', 14, '/Cueneytkurt', 'https://venmeo.de/admin/card?user_id=34', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-17 15:28:02', '2024-06-17 15:28:02'),
(76, 'HSD6ilIdxckp8n128Y3gRbZASdeyZwmh2CbSG9Cp', 13, '/ronymia', 'https://venmeo.de/admin/card?user_id=32', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-17 15:28:24', '2024-06-17 15:28:24'),
(77, 'HSD6ilIdxckp8n128Y3gRbZASdeyZwmh2CbSG9Cp', 11, '/6667fb2d8755b', 'https://venmeo.de/admin/card?user_id=31', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-17 15:28:39', '2024-06-17 15:28:39'),
(78, 'ug6PjocrqmEdQIwpIUpgna8wqUSfvYx1Cw76ibLG', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-22 18:56:21', '2024-06-22 18:56:21'),
(79, 'R35eYFXLlXblFYQF84HgeFeq0Lmq0RSKsfiNsw6T', 14, '/Cueneytkurt', 'https://venmeo.de/admin/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-23 14:54:18', '2024-06-23 14:54:18'),
(80, 'yYi2YUbZkSyUrDQHzxo1Nplt3u7B7fpEmKu62nbP', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-23 16:55:09', '2024-06-23 16:55:09'),
(81, 'Mh31h6onfv7pNy45PGCFATgIcts5r2B4GVv7YV2u', 14, '/Cueneytkurt', 'https://venmeo.de/admin/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-26 17:35:19', '2024-06-26 17:35:19'),
(82, 'bIZeokoev7Ihuc3WVZv4mY51I7gXedoJPRHnZKy0', 14, '/Cueneytkurt', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-26 18:55:02', '2024-06-26 18:55:02'),
(83, 'rIpeu6Cuslwv7MwkNzAISfFdMNl2YL0TvSBL9DXo', 14, '/Cueneytkurt', 'https://venmeo.de/admin/card', NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-26 18:56:42', '2024-06-26 18:56:42'),
(84, 'AY0iJs1bV67mj9sFnF70PtjGHFMLpTefo5ogSb8b', 14, '/Cueneytkurt', NULL, NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-26 19:13:24', '2024-06-26 19:13:24'),
(85, 'EnPstd7uUK0EDfbnbcPJMhXXabRas63rw0q8eHMw', 14, '/Cueneytkurt', 'https://www.venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-26 19:39:59', '2024-06-26 19:39:59'),
(86, 'TrXIZYmQEw0F9hnpu16ioKgE4QnKBXyIwYkziI6M', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-26 19:40:10', '2024-06-26 19:40:10'),
(87, 'YepoTklXTXLBs7BPqciTAkkFE9yfDWc54hFPHqgG', 5, '/sakibdev', 'android-app://com.google.android.googlequicksearchbox/', NULL, 'Chrome', 'phone', 'AndroidOS', '103.112.206.223', 'en', 'false', '2024-06-27 12:37:17', '2024-06-27 12:37:17'),
(88, '2kZsuPQs7zbgl9xfTYvIMIXfbFV8pAgfIE8zN4SS', 15, '/Brock', NULL, NULL, 'Chrome', 'desktop', 'Windows', '103.112.206.223', 'en', 'false', '2024-06-27 13:57:23', '2024-06-27 13:57:23'),
(89, 'DfRzAkJDgd4bMif9KwxRqFOYLW3yeOCBsUR9waa5', 15, '/Brock', 'https://www.venmeo.de/admin/dashboard', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-27 15:13:45', '2024-06-27 15:13:45'),
(90, 'DfRzAkJDgd4bMif9KwxRqFOYLW3yeOCBsUR9waa5', 14, '/Cueneytkurt', 'https://www.venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-27 15:14:44', '2024-06-27 15:14:44'),
(91, 'Cjsw9hXyomwVWDhUHn1ZYaemnE702DLo0Yg2JQTz', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-27 15:15:34', '2024-06-27 15:15:34'),
(92, 'nxcE9VUGVR50tokUZsWlBcTMwtLcUkUJ4ak3ZgY1', 15, '/Brock', 'https://www.venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-27 15:35:56', '2024-06-27 15:35:56'),
(93, '63VoTQhS7TynNmDyHRiMh2yyLnGNA6nXhuyQRpMF', 6, '/6666c485841ed', NULL, NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-27 16:09:18', '2024-06-27 16:09:18'),
(94, 'e7WhfoHMXSj73GgK8njJK3GjKshn9o1BtWaqutGV', 6, '/6666c485841ed', NULL, NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-27 16:09:32', '2024-06-27 16:09:32'),
(95, 'hhgEjHSfNM8kg3J6XxbdlsMGbWfjSKSc7iMMMHQt', 15, '/Brock', 'https://venmeo.de/public/admin/dashboard', NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-27 17:42:17', '2024-06-27 17:42:17'),
(96, 'gvLlb6WNZ72jlbOqFqhw9U8ymJe27O6ViMyelJTr', 15, '/Brock', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-27 17:43:32', '2024-06-27 17:43:32'),
(97, '3pOpRETwuWMkY9EKur99HeXHNQ5OwCGqfMa4wufs', 14, '/Cueneytkurt', 'https://www.venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-27 18:38:15', '2024-06-27 18:38:15'),
(98, 't85PnGGUJKzEnDn0z6vLlgHtspUwaSfQfjoWiu85', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-27 18:38:59', '2024-06-27 18:38:59'),
(99, 'WSDELntGHFrPY0szPxVPEUV4vH3kdTcp0muvCdMu', 8, '/shuvo23', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-06-27 21:54:57', '2024-06-27 21:54:57'),
(100, 'USao9H0K9eoKfbH7lSO3wKrxbQrUdXZO2lqcOgfo', 8, '/shuvo23', NULL, NULL, 'Safari', 'phone', 'iOS', '31.18.248.219', 'de', 'false', '2024-06-27 21:55:06', '2024-06-27 21:55:06'),
(101, 'XN0DIFBaC86dZqnBeleg38DuFz8n3GZm0kvNgg6s', 8, '/shuvo23', NULL, NULL, 'Safari', 'phone', 'iOS', '87.149.179.130', 'de', 'false', '2024-06-29 01:24:28', '2024-06-29 01:24:28'),
(102, 'kiWuT0UON8KIlFykRGGPXxcpTd9MkFURNvjXbiKi', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '87.149.179.130', 'de', 'false', '2024-06-29 01:24:28', '2024-06-29 01:24:28'),
(103, '3eVuceHy6wsINosgR6yYPGfiAnZPYpiJHgVIlQRp', 15, '/Brock', 'https://venmeo.de/public/admin/card', NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-29 13:17:35', '2024-06-29 13:17:35'),
(104, '3eVuceHy6wsINosgR6yYPGfiAnZPYpiJHgVIlQRp', 14, '/Cueneytkurt', 'https://venmeo.de/public/admin/card', NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-29 13:17:38', '2024-06-29 13:17:38'),
(105, '3eVuceHy6wsINosgR6yYPGfiAnZPYpiJHgVIlQRp', 13, '/ronymia', 'https://venmeo.de/public/admin/card', NULL, 'Firefox', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-29 13:17:39', '2024-06-29 13:17:39'),
(106, 'xOqxpX6ZoJDPCMotJbw6D3J5z4YUEu3dAqIuNsGS', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '87.149.179.130', 'de', 'false', '2024-06-29 13:20:25', '2024-06-29 13:20:25'),
(107, 'tDmxLM1LqbdDXD58T1sDCYwarfEshq5wXUagDJYQ', 8, '/shuvo23', NULL, NULL, 'Safari', 'phone', 'iOS', '94.220.88.224', 'de', 'false', '2024-06-29 15:11:14', '2024-06-29 15:11:14'),
(108, 'fVbsW1uruf57FZnV8rDikxRgHxIgwx53Uy0IcU5P', 14, '/Cueneytkurt', 'https://venmeo.de/admin/card', NULL, 'Safari', 'phone', 'iOS', '94.220.88.224', 'de', 'false', '2024-06-29 15:13:22', '2024-06-29 15:13:22'),
(109, 'XPSUxrgmZw4pDIKoOavCJmkfpfvMPL3mHO4AhTgW', 14, '/cueneytkurt', NULL, NULL, 'Chrome', 'phone', 'iOS', '118.179.40.152', 'en', 'false', '2024-06-29 15:47:19', '2024-06-29 15:47:19'),
(110, 'Ai6taDRkcppatXExRCPaCEB6wbcW51TZdKGjdQxs', 14, '/Cueneytkurt', NULL, NULL, 'Chrome', 'desktop', 'Windows', '118.179.40.152', 'en', 'false', '2024-06-29 15:50:23', '2024-06-29 15:50:23'),
(111, 'GDQNNnxNSajqcCmQce7o0yx1FPxKXwU3CfHEqD6J', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '109.42.115.136', 'de', 'false', '2024-06-29 16:07:19', '2024-06-29 16:07:19'),
(112, 'Dh1yWeeEtpZ7bZ3kdm8fuTlPFj5xpdSbvDSNU9af', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '176.7.197.168', 'de', 'false', '2024-06-29 20:07:45', '2024-06-29 20:07:45'),
(113, 'XBe6kEcAVDIBUorIaYSOW0q75CPc2jX3XQEJ1YwA', 8, '/shuvo23', NULL, NULL, 'Safari', 'phone', 'iOS', '109.43.115.189', 'de', 'false', '2024-06-29 21:19:07', '2024-06-29 21:19:07'),
(114, 'jdf0d9Wk2QTryxMBXkRxsPuwxOFWcNHfn9NOD4Up', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '109.43.115.189', 'de', 'false', '2024-06-30 01:44:53', '2024-06-30 01:44:53'),
(115, 'IhmhnfRmRHYtMFaRH79ncaXdGVbGTjWZu4ubnbvg', 14, '/Cueneytkurt', NULL, NULL, 'Safari', 'phone', 'iOS', '84.179.99.205', 'de', 'false', '2024-07-01 01:06:55', '2024-07-01 01:06:55'),
(116, 'SlhW6w10DBKQuocTXIatjvLM9aEkmc8WvdU5HZkx', 8, '/shuvo23', 'https://venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-07-01 14:49:49', '2024-07-01 14:49:49'),
(117, 'XV7B2VYEqJpeHYrpwxYUanIdRBp5m3Og52mZlchx', 14, '/Cueneytkurt', 'https://www.venmeo.de/admin/card', NULL, 'Safari', 'desktop', 'OS X', '31.18.248.219', 'de', 'false', '2024-07-01 14:50:31', '2024-07-01 14:50:31'),
(118, 'ZcDsIeQUjCPrEgJQA9fhyrcnaYekqnGVC8TU3Sxs', 14, '/Cueneytkurt', NULL, NULL, 'Chrome', 'desktop', 'Linux', '52.2.212.237', 'en', 'false', '2024-07-01 17:05:28', '2024-07-01 17:05:28'),
(119, 'mgVMKExKZuYTtQ2dz08wIvFavUSVampjs4AFq9yQ', 8, '/shuvo23', NULL, NULL, 'Edge', 'desktop', 'Windows', '127.0.0.1', 'en', 'false', '2024-07-03 04:14:36', '2024-07-03 04:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `vcard_enquiries`
--

CREATE TABLE `vcard_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vcard_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text NOT NULL,
  `job_title` varchar(1024) DEFAULT NULL,
  `company_name` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vcard_enquiries`
--

INSERT INTO `vcard_enquiries` (`id`, `vcard_id`, `name`, `email`, `phone`, `message`, `job_title`, `company_name`, `created_at`, `updated_at`) VALUES
(3, 5, 'Neehal Alam', 'akadora28080@gmail.com', '56694962', 'Abchirijonxyz', 'ABC', 'Abc', '2024-06-09 19:47:38', '2024-06-09 19:47:38'),
(4, 5, 'Sakib Hossain Rijon', 'dvlpr.rijon@gmail.com', '01679185540', 'test', 'test', 'test', '2024-06-10 08:22:07', '2024-06-10 08:22:07'),
(5, 6, 'Mahi Chowdury', 'mahibc1@gmail.com', '01781631681', 'jQuery Developer: Leverage your skills to create dynamic, responsive features for \r\nour digital business card platform. \r\nJoin our team today!', 'Jquery Developer', 'Arobil', '2024-06-10 14:35:28', '2024-06-10 14:35:28'),
(6, 9, 'rabin mia', 'rabinarobil@gmail.com', '01320325852', 'fdsf', 'fdsf', 'arobil', '2024-06-11 11:10:55', '2024-06-11 11:10:55'),
(7, 13, 'Rakib Hasan', 'ronymia2211@gmail.com', '01767671133', 'Hello, I want to know more about you', 'Develoepr', 'Arobil', '2024-06-12 14:07:23', '2024-06-12 14:07:23'),
(9, 8, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'arobil@gmail.com', '016555588', 'test', 'test', 'test', '2024-07-03 04:46:40', '2024-07-03 04:46:40'),
(10, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'exampl.email.address@gmail.com', '01658899556655', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2024-07-03 05:20:16', '2024-07-03 05:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `vcard_social_links`
--

CREATE TABLE `vcard_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vcard_id` int(10) UNSIGNED NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `threads` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `twitch` varchar(255) DEFAULT NULL,
  `xing` varchar(255) DEFAULT NULL,
  `flickr` varchar(255) DEFAULT NULL,
  `messenger` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `wechat` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `reddit` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `tumblr` varchar(255) DEFAULT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `bereal` varchar(255) DEFAULT NULL,
  `spotify` varchar(255) DEFAULT NULL,
  `website_2` varchar(255) DEFAULT NULL,
  `calendly` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vcard_social_links`
--

INSERT INTO `vcard_social_links` (`id`, `vcard_id`, `website`, `facebook`, `instagram`, `youtube`, `linkedin`, `whatsapp`, `threads`, `twitter`, `tiktok`, `vimeo`, `twitch`, `xing`, `flickr`, `messenger`, `pinterest`, `wechat`, `telegram`, `reddit`, `snapchat`, `tumblr`, `discord`, `bereal`, `spotify`, `website_2`, `calendly`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://arobil.com', 'https://www.facebook.com/profile.php?id=61555158461771', 'https://www.instagram.com/', NULL, 'https://www.linkedin.com/feed/', '+8801681944126', NULL, 'https://x.com/?lang=en', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.pinterest.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-06 06:21:05', '2024-06-06 06:21:05'),
(2, 2, 'https://www.sddddddddddddddddddddddypusaheviduzet.org.uk', 'https://www.gule.tv', 'https://www.nixi.co.uk', NULL, 'https://www.qyduhopy.co', '+19379577328', NULL, 'https://www.jecij.ca', NULL, NULL, 'https://www.fyfevidi.org', 'https://www.wukyfux.ws', NULL, NULL, 'https://www.kaxujedequqo.co', NULL, 'https://www.jivyxyviryrab.in', NULL, NULL, NULL, NULL, NULL, 'https://www.duwufijyfenoq.net', NULL, NULL, '2024-06-09 15:20:49', '2024-06-09 15:20:49'),
(10, 6, 'https://arobil.com', 'https://www.facebook.com/maidulislam.tech', 'https://www.instagram.com/maidul.tecbd/', NULL, 'https://www.linkedin.com/in/maidulislambd/', '+8801681944126', NULL, 'https://x.com/?lang=en', NULL, NULL, 'https://www.twitch.tv/maidulislam1990', 'https://www.xing.com/profile/Maidul_Islam088953', NULL, NULL, 'https://za.pinterest.com/ekayzone777/', NULL, 'https://t.me/maidul1990', NULL, NULL, NULL, NULL, NULL, 'https://open.spotify.com/user/315wdwubozhkrgeq3lnf3bcr2jz4?si=51690d7d51614a7a', NULL, NULL, '2024-06-10 14:01:01', '2024-06-10 14:01:01'),
(17, 9, 'hhtps://bcbcricket.com', 'https://facebook.com/', 'https://instagram.com', NULL, 'https://linkedin.com/', '145456445', NULL, 'https://twitter.com/', NULL, NULL, 'https://www.fam.cm', 'https://www.xakunepet.com.au', NULL, NULL, 'https://pirnterest.com/', NULL, 'https://www.kyxorob.org', NULL, NULL, NULL, NULL, NULL, 'https://www.dub.cm', NULL, NULL, '2024-06-11 10:27:18', '2024-06-11 10:27:18'),
(18, 10, 'https://bcbcricket.com', 'https://facebook.com/', NULL, NULL, 'https://linkedin.com/', '1564584', NULL, 'https://twitter.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-11 10:29:40', '2024-06-11 10:29:40'),
(19, 11, 'https://abc.com', 'https://facebook.com/', NULL, NULL, 'https://linkedin.com/', '3423423', NULL, 'https://twitter.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-11 11:23:13', '2024-06-11 11:23:13'),
(27, 13, 'https://www.venmeo.de', 'https://www.facebook.com/ronymia', 'https://www.twitter.com/ronymia', NULL, 'https://www.twitter.com/ronymia', '+491733910844', NULL, 'https://www.twitter.com/ronymia', NULL, NULL, 'https://www.twitter.com/ronymia', 'https://www.twitter.com/ronymia', NULL, NULL, 'https://www.twitter.com/ronymia', NULL, 'https://t.me/rony', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-16 13:49:16', '2024-06-16 13:49:16'),
(36, 5, 'https://venmeo.de/', 'https://www.duneqom.ws', 'https://www.sakib.com', NULL, 'https://www.sakib.com', '12343465', NULL, 'https://venmeo.de/', NULL, NULL, 'https://www.sakib.com', 'https://www.sakib.com', NULL, NULL, 'https://www.sakib.com', NULL, 'https://www.sakib.com', NULL, NULL, NULL, NULL, NULL, 'https://www.sakib.com', 'https://venmeo.de/', NULL, '2024-06-27 13:36:28', '2024-06-27 13:36:28'),
(38, 15, 'https://www.joqoqulezydid.com', 'https://www.bobikutiharal.cc', 'https://www.tugyjagyge.ca', NULL, 'https://www.munojamafe.ws', '+19771297039', NULL, 'https://www.qunukub.tv', NULL, NULL, 'https://www.xyderasizobu.co', 'https://www.qapysuje.info', NULL, NULL, 'https://www.cofeseh.biz', NULL, 'https://www.cowyqu.me.uk', NULL, NULL, NULL, NULL, NULL, 'https://www.muruqyqak.mobi', 'https://www.tijidanatab.cc', 'Anthony', '2024-06-27 13:58:34', '2024-06-27 13:58:34'),
(39, 8, 'https://arobil.com', 'https://facebook.com/', 'https://instagram.com', NULL, 'https://linkedin.com/', '784557844', NULL, 'https://twitter.com/', NULL, NULL, 'https://twitch.com', 'https://xing.com', NULL, NULL, 'https://pirnterest.com/', NULL, 'https://telegram.com', NULL, NULL, NULL, NULL, NULL, 'https://telegram.com', NULL, NULL, '2024-06-27 21:53:58', '2024-06-27 21:53:58'),
(40, 14, 'https://venmeo.de', 'https://www.facebook.com/cuneytatay63/', 'https://www.instagram.com/cuni63/', NULL, 'https://www.linkedin.com/in/cüneyt-kurt-b41569305/', '+491733910844', NULL, 'https://www.linkedin.com/in/cüneyt-kurt-b41569305/', NULL, NULL, 'https://www.instagram.com/cuni63/', 'https://www.instagram.com/cuni63/', NULL, NULL, 'https://www.instagram.com/cuni63/', NULL, 'https://www.instagram.com/cuni63/', NULL, NULL, NULL, NULL, NULL, 'https://www.instagram.com/cuni63/', NULL, NULL, '2024-06-29 15:13:17', '2024-06-29 15:13:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `home_page_contents`
--
ALTER TABLE `home_page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_features_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vcards`
--
ALTER TABLE `vcards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vcards_url_alias_unique` (`url_alias`);

--
-- Indexes for table `vcard_analytics`
--
ALTER TABLE `vcard_analytics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analytics_vcard_id_foreign` (`vcard_id`);

--
-- Indexes for table `vcard_enquiries`
--
ALTER TABLE `vcard_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_vcard_id_foreign` (`vcard_id`);

--
-- Indexes for table `vcard_social_links`
--
ALTER TABLE `vcard_social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_links_vcard_id_foreign` (`vcard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `home_page_contents`
--
ALTER TABLE `home_page_contents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vcards`
--
ALTER TABLE `vcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vcard_analytics`
--
ALTER TABLE `vcard_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `vcard_enquiries`
--
ALTER TABLE `vcard_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vcard_social_links`
--
ALTER TABLE `vcard_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
