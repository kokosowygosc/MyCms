-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 20 Mar 2018, 10:22
-- Wersja serwera: 5.5.21-log
-- Wersja PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `mycms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(10) unsigned NOT NULL,
  `content` varchar(2000) NOT NULL,
  `front_img` varchar(300) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `blog`
--

INSERT INTO `blog` (`id`, `title`, `alias`, `date`, `views`, `content`, `front_img`) VALUES
(14, 'Mój własny system CMS', 'moj-wlasny-system-cms', '2014-06-30 00:00:10', 133, '<p>Witaj na stronie prezentującej m&oacute;j system CMS, nie jest on w pełni ukończony, gdyż zamierzam dostosowywać go do każdego klienta.&nbsp;<br />\nZnajdziesz od kilku do kilkudziesięciu artykuł&oacute;w przedstawiających możliwości mojej małej-wielkiej pracy.&nbsp;</p>\n\n<p>Jeśli właśnie czegoś takiego szukałeś, napisz: mateuszkoski@gmail.com<br />\nPozdrawiam:)</p>', 'http://www.tapeciarnia.pl/tapety/normalne/169767_zachod_slonca_morze_ptaki.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `date`, `email`, `content`) VALUES
(4, 14, 'Użytkownik_nie_zarejestrowany', '2014-06-14', 'mateuszkoski@gmail.com', 'Możesz dodawać również komentarze bez potrzeby logowania się bądź tworzenia konta. Wystarczy podać imię oraz email :)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `config`
--

INSERT INTO `config` (`id`, `option`, `value`) VALUES
(1, 'site_name', 'My Cms Blog'),
(2, 'meta_desc', 'blog, opis, słowo, kluczowe, test, cms, spróbuj'),
(3, 'front_theme', 'Default'),
(4, 'back_theme', 'Default'),
(5, 'num_posts', '7'),
(6, 'num_gal', '4'),
(7, 'text_foot', 'Mój system CMS - buduj, zarządzaj, modyfikuj'),
(8, 'gallery', 'NIE'),
(9, 'text_foot', 'Mój system CMS - buduj, zarządzaj, modyfikuj'),
(10, 'gallery', 'NIE'),
(11, 'fb_link', 'https://www.facebook.com/mateuszm.mtm'),
(12, 'tweet_link', ''),
(13, 'yt_link', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sprzedawcy` int(10) NOT NULL,
  `status_transakcji` varchar(255) NOT NULL,
  `id_transakcji` varchar(500) NOT NULL,
  `kwota_transakcji` varchar(255) NOT NULL,
  `kwota_zaplacona` varchar(255) NOT NULL,
  `blad` varchar(255) NOT NULL,
  `data_transakcji` varchar(255) NOT NULL,
  `opis_transakcji` varchar(255) NOT NULL,
  `ciag_pomocniczy` varchar(255) NOT NULL,
  `email_klienta` varchar(255) NOT NULL,
  `suma_kontrolna` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `order` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `content`, `order`) VALUES
(2, 'Kontakt', 'kontakt', '<h1><strong>KONTAKT TESTOWY:)</strong></h1>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `options` varchar(800) NOT NULL,
  `qtys` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `options`, `qtys`) VALUES
(1, 'spodnie ART', 10.99, '{"color":["czarny","niebieski"],"size":["xs","s","m","l"]}', 8),
(2, 'spodnie ART2', 50.99, '{"color":["czarny"],"size":["m","l","xl"]}', 15),
(3, 'trampki', 25, '{"color":["zielony"],"size":false}', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dostep` varchar(11) NOT NULL,
  `conf` tinyint(1) NOT NULL,
  `names` varchar(50) NOT NULL,
  `names1` varchar(50) NOT NULL,
  `place` varchar(30) NOT NULL,
  `number` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `post` varchar(20) NOT NULL,
  `phone` int(24) NOT NULL,
  `extra` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dostep`, `conf`, `names`, `names1`, `place`, `number`, `code`, `post`, `phone`, `extra`) VALUES
(12, 'Krystian', 'krystian@wp.pl', '2746bdb0cdf6a8f688a1435655bd27bd22e8d49172ad8760427251d54ce0bcc3649db92149922952aef246d7f659156011d02c85ad99efed72bae447f9152a3b', 'user', 1, '', '', '', '', '', '', 0, ''),
(1, 'mateusz', 'mateuszkoski@gmail.com', 'eec0d4ffd8ff1b5de30d3a456a205a61e66a1c450db02a42a7e9224b3b40ffa57c4de2a7d83b578c818f09817201d1305ccff1718773210b98dbe2de0a03b1ad', 'super_admin', 1, '0', '0', '0', '0', '0', '0', 0, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
