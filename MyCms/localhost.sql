-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 03 Kwi 2014, 16:52
-- Wersja serwera: 5.5.21-log
-- Wersja PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `cms`
--
CREATE DATABASE `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

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
  `content` varchar(1000) NOT NULL,
  `front_img` varchar(300) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `blog`
--

INSERT INTO `blog` (`id`, `title`, `alias`, `date`, `views`, `content`, `front_img`) VALUES
(4, 'Artykul 1', 'artykul-1', '2014-03-10 00:00:00', 130, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie nisi a nisl viverra, vel imperdiet risus venenatis. Nam porta odio libero, eu mollis enim euismod id. Maecenas porttitor est id tellus vulputate placerat. Curabitur rutrum tincidunt vel</p>', 'http://www.tapeciarnia.pl/tapety/normalne/167264_bialy_piesek_kolorowe_kwiatki.jpg'),
(6, 'O mnie', 'o-mnie-art-3', '2014-03-14 16:11:53', 54, '<p>sapien tempor sagittis. Sed pretium diam a turpis venenatis, id porta nisl suscipit. Proin sagittis laoreet risus, quis rhoncus nibh semper sed. Morbi suscipit nisi eget risus ultricies, ac volutpat tortor varius. Suspendisse interdum, augue in lacinia in</p>', 'http://s3.flog.pl/media/foto/1716483_kolorowe-kwiatki.jpg'),
(10, 'Wiadomości', 'wiadomosci', '2014-02-28 00:00:00', 45, '<p>Donec pellentesque adipiscing nisi, at hendrerit dolor. Praesent tristique nec leo quis consectetur. Nam sollicitudin leo vel erat fringilla, id ullamcorper nunc vehicula. Phasellus consectetur aliquet eros sit amet laoreet. Proin sit amet mauris dolor. S</p>', ''),
(20, 'Artykuł 3', 'artykul-3', '2014-03-13 00:00:00', 34, '<h2><strong>Lorem,</strong></h2>\r\n\r\n<p>ipsum dolor sit amet, consectetur adipisicing elit. Molestias, dicta omnis sed id non vitae rerum! Quos, ullam vel laudantium.</p>', 'http://fikander.pl/galeria/200807/kwiatki.jpg'),
(21, 'Artykułek', 'artykul-2', '2014-03-14 15:58:41', 40, '<h1><strong>Lorem,</strong></h1>\r\n\r\n<p><em>ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, rerum, laboriosam dignissimos esse reiciendis beatae amet deserunt iusto corrupti voluptatibus laborum sapiente eius ipsa ratione obcaecati culpa cumque atque. Veniam, excepturi, pariatur voluptatem fugit minima aliquam a. Deserunt, quos, blanditiis non architecto deleniti magni assumenda quidem corrupti rerum id sed. &nbsp; &nbsp;</em></p>', 'http://www.tapeciarnia.pl/tapety/normalne/157954_kot_laka_kwiatek.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `date`, `email`, `content`) VALUES
(52, 4, 'adminekkkkk', '2014-02-28 21:34:00', 'mateuszkoski@gmail.com', 'j'),
(53, 20, 'admin', '2014-03-09 13:29:15', 'mateuszkoski@gmail.com', 'aaa'),
(54, 20, 'admin', '2014-03-09 13:29:20', 'mateuszkoski@gmail.com', 'grgdgdg'),
(55, 20, 'admin', '2014-03-09 13:29:22', 'mateuszkoski@gmail.com', 'feeeeeeeeeeeeeeeeeee'),
(56, 20, 'admin', '2014-03-09 13:29:26', 'mateuszkoski@gmail.com', 'htgjhuli;ukhk'),
(57, 21, 'admin', '2014-03-14 16:32:37', 'mateuszkoski@gmail.com', 'fajny'),
(58, 21, 'admin', '2014-03-14 16:32:44', 'mateuszkoski@gmail.com', 'no super'),
(59, 21, 'admin', '2014-03-14 16:32:56', 'mateuszkoski@gmail.com', 'no kurde co Ty'),
(60, 10, 'marcindąprowki', '2014-03-15 11:43:41', 'dabek@wp.pl', 'hej, na prawde fajny art, milo to widziec'),
(61, 6, 'marcindąprowki', '2014-03-15 11:44:44', 'dabek@wp.pl', 'hehe\r\njl'),
(62, 21, 'aaaaaaaaaaaaaa', '2014-03-15 12:09:35', 'paulina@wp.pl', 'sfsfff'),
(63, 6, 'Karolina', '2014-03-19 15:47:53', 'kara.k@wp.pl', 'Bardzo fajnie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `config`
--

INSERT INTO `config` (`id`, `option`, `value`) VALUES
(1, 'site_name', 'Strona'),
(2, 'meta_desc', 'Opis strony'),
(3, 'front_theme', 'Cosmo'),
(4, 'back_theme', 'Spacelab'),
(5, 'num_posts', '5'),
(6, 'num_gal', '4'),
(7, 'text_foot', ''),
(8, 'fb_link', 'http://www.facebook.com/mateuszmarcinkowski4'),
(9, 'tweet_link', 'http://twitter.com'),
(10, 'yt_link', 'http://youtube.pl'),
(11, 'gallery', 'NIE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `content`, `order`) VALUES
(3, 'Kontakt', 'kontakt', 'tel: 546 567 345', 2),
(5, 'O nas', 'o-nas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque posuere ligula, id semper est congue at. Suspendisse scelerisque ac velit nec varius. Etiam cursus fringilla bibendum. Quisque et mattis nibh, nec porta lorem. Pellentesque dictum,', 3),
(7, 'Moje prace', 'moje-praceeeee', '<h2>Tutaj będę zamieszczać moje prace.</h2>\r\n\r\n<p><a href="http://google.pl">Moja pierwsza tapeta:&nbsp;</a></p>\r\n\r\n<p><img alt="" src="http://localhost/images/thumbs/579-geralt-z-rivii-wiedzmin.jpg" /></p>\r\n\r\n<p>Tutaj moja kolejna praca, w postaci gifu:<br />\r\n <img alt="" src="http://localhost/images/33077-friday-friday.gif"  /></p>', 4),
(8, 'Inne', 'strona-inne', '<p>Inna strona, kolejna</p>\r\n\r\n<p>Inna strona, kolejna</p>\r\n\r\n<p>Inna strona, kolejna</p>\r\n\r\n<p>Inna strona, kolejnaInna strona, kolejnaInna strona, kolejnaInna strona, kolejnaInna strona, kolejna</p>\r\n\r\n<p>Inna strona, kolejnaInna strona, kolejnaaaa</p>', 1),
(9, 'Ula ładna Ula', 'ul-ea-be-ke-83484', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ipsa praesentium vitae nihil aspernatur totam vel dolor. Odit, totam, numquam!</p>', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dostep` varchar(255) NOT NULL,
  `conf` tinyint(1) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dostep`, `conf`) VALUES
(1, 'admin', 'mateuszkoski@gmail.com', '6e3bbe27562de0b3f158d8fca3b4e371b5a0425fa77f4719b967ad7f770c727c7aa8f5e165e8a6aeb3567fb9fc3fd708c532683bfadfd23ecc3b997f6af6e9eb', 'super_admin', 1),
(2, 'Mateusz', 'mati.1995.8@wp.pl', '6e3bbe27562de0b3f158d8fca3b4e371b5a0425fa77f4719b967ad7f770c727c7aa8f5e165e8a6aeb3567fb9fc3fd708c532683bfadfd23ecc3b997f6af6e9eb', 'admin', 1),
(3, 'ula', 'ula@gmail.com', '6e3bbe27562de0b3f158d8fca3b4e371b5a0425fa77f4719b967ad7f770c727c7aa8f5e165e8a6aeb3567fb9fc3fd708c532683bfadfd23ecc3b997f6af6e9eb', 'user', 1),
(4, 'marcindąprowki', 'dabek@wp.pl', '6e3bbe27562de0b3f158d8fca3b4e371b5a0425fa77f4719b967ad7f770c727c7aa8f5e165e8a6aeb3567fb9fc3fd708c532683bfadfd23ecc3b997f6af6e9eb', 'user', 1),
(5, 'aaaaaaaaaaaaaa', 'paulina@wp.pl', '6e3bbe27562de0b3f158d8fca3b4e371b5a0425fa77f4719b967ad7f770c727c7aa8f5e165e8a6aeb3567fb9fc3fd708c532683bfadfd23ecc3b997f6af6e9eb', 'user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
