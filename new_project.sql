-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 02 2017 г., 13:59
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `constants`
--

CREATE TABLE `constants` (
  `id` int(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `domainname` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `constants`
--

INSERT INTO `constants` (`id`, `language`, `domainname`, `site`, `footer`) VALUES
(1, 'ru', 'http://localhost/new_project', 'Название сайта', 'Не является публичной офертой'),
(2, 'en', 'http://localhost/new_project', 'Site name', 'Not a public offer');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `default_lng` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `language`, `title`, `visible`, `default_lng`) VALUES
(1, 'ru', 'русский', '1', '1'),
(2, 'en', 'english', '1', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(3) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `position` int(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `created` int(255) NOT NULL,
  `lastmod` int(255) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `header_visible` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `position`, `language`, `created`, `lastmod`, `visible`, `header_visible`) VALUES
(1, 'Мы предлагаем', 1, 'ru', 1504795508, 0, '1', '1'),
(2, 'We offer', 2, 'en', 1504795508, 0, '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(3) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL,
  `icon_size` varchar(255) NOT NULL,
  `menu_number` int(4) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `language` varchar(255) NOT NULL,
  `created` int(255) NOT NULL,
  `lastmod` int(255) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `visible_in_main_menu` enum('0','1') NOT NULL,
  `visible_in_sidebar` enum('0','1') NOT NULL,
  `active_link_in_sidebar` enum('0','1') NOT NULL,
  `reviews_visible` enum('0','1') NOT NULL,
  `reviews_add` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `description`, `keywords`, `title`, `menu_icon`, `icon_size`, `menu_number`, `menu_name`, `position`, `content`, `language`, `created`, `lastmod`, `visible`, `visible_in_main_menu`, `visible_in_sidebar`, `active_link_in_sidebar`, `reviews_visible`, `reviews_add`) VALUES
(1, 0, '', '', 'адрес сайта | Ключевое слово | Главная', 'icon-home', 'icon-large', 1, 'Главная', 1, 'Главная', 'ru', 1504795508, 0, '1', '1', '1', '1', '1', '1'),
(2, 0, '', '', 'site address | Keyword | Main', 'icon-home', 'icon-large', 2, 'Main', 3, 'Main', 'en', 1504795508, 0, '1', '1', '1', '1', '1', '1'),
(3, 1, '', '', 'адрес сайта | Ключевое слово | Пример страницы', '', '', 1, 'Пример страницы', 2, 'Пример страницы', 'ru', 1504795508, 0, '1', '0', '1', '1', '1', '1'),
(4, 2, '', '', 'site address | Keyword | Example page', '', '', 2, 'Example page', 4, 'Example page', 'en', 1504795508, 0, '1', '0', '1', '1', '1', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(4) NOT NULL,
  `page_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `autor` varchar(255) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `state` varchar(255) NOT NULL,
  `created` int(255) NOT NULL,
  `lastmod` int(255) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `page_id`, `name`, `review`, `autor`, `visible`, `state`, `created`, `lastmod`, `rating`, `email`) VALUES
(1, 3, 'Первый отзыв', 'Очень хороший отзыв на странице "Пример страницы"', 'Администратор сайта', '1', 'new', 0, 0, NULL, NULL),
(2, 4, 'Second review', 'Very good review on page "Example page"', 'Site administrator', '1', 'good', 0, 0, NULL, NULL),
(3, 1, 'Отзыв на главной', 'Пример отзыва на странице "Главная"', 'Администратор сайта', '1', 'good', 1504795508, 0, NULL, NULL),
(4, 1, 'Супер крутой отзыв', 'Лучший сайт', 'Владлен', '', 'new', 0, 0, NULL, NULL),
(5, 1, 'Супер крутой отзыв2', 'qqqqqqqqqqqqqqqqqqqqqqq', 'Владлен Иванович', '1', 'good', 0, 0, NULL, NULL),
(6, 0, 'Король', 'Прекрасный отзыв', 'ццц', '0', 'good', 0, 0, NULL, NULL),
(7, 0, 'Король', 'Прекрасный отзыв', 'ццц', '0', 'good', 0, 0, NULL, NULL),
(8, 0, '1', '2', '3', '0', 'good', 0, 0, NULL, NULL),
(9, 1, '4', '5', '6', '1', 'good', 0, 0, NULL, NULL),
(10, 1, '22', '22', '22', '1', 'new', 0, 0, NULL, NULL),
(11, 1, 'xcv', 'xcv', 'gnom', '1', 'new', 0, 0, NULL, NULL),
(12, 1, 'kkk', 'kkk', 'kkk', '1', 'new', 0, 0, NULL, NULL),
(13, 1, 'jjj', 'jjjj', 'jjj', '1', 'new', 0, 0, NULL, NULL),
(14, 1, 'ttt', 'ttt', 'ttt', '1', 'new', 0, 0, NULL, NULL),
(15, 1, 'ttt', 'ttt', 'ttt', '1', 'new', 0, 0, NULL, NULL),
(16, 1, '7', '7', '7', '1', 'new', 0, 0, NULL, NULL),
(17, 1, '555', '555', '555', '1', 'good', 1507123778, 0, NULL, NULL),
(18, 1, 'мой отзыв', '1111', 'Дядя Ваня', '1', 'good', 1512219199, 0, 0, 'lyubomyr83@gmail.com'),
(19, 1, 'супер', 'Отзыв от Дяди Фёдора', 'Дядя Фёдор', '1', 'new', 1512219331, 0, 0, 'lyubomyr83@gmail.com'),
(20, 1, 'мой отзыв', 'Дядя Фёдор', 'Дядя Фёдор', '1', 'good', 1512219390, 0, 5, 'lyubomyr83@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '42f3d4cf9443bb1cbf053f7933f37d98');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `constants`
--
ALTER TABLE `constants`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `constants`
--
ALTER TABLE `constants`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
