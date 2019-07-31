-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 29 2019 г., 15:35
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rpgu`
--
CREATE DATABASE IF NOT EXISTS `rpgu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rpgu`;

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `lastin_rpgu_date` varchar(10) NOT NULL,
  `count_childs` tinyint(4) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `lastservice_use_frguid` char(20) NOT NULL,
  `lastservice_use_date` varchar(10) NOT NULL,
  `drivelicence` char(1) NOT NULL,
  `adresschangedate` varchar(10) NOT NULL,
  `drive_licencechange_date` varchar(10) NOT NULL,
  `cars_change_date` varchar(10) NOT NULL,
  `count_cars` tinyint(4) NOT NULL,
  `familyname_change_date` varchar(10) NOT NULL,
  `telephone` char(11) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `userid`, `lastin_rpgu_date`, `count_childs`, `birthdate`, `lastservice_use_frguid`, `lastservice_use_date`, `drivelicence`, `adresschangedate`, `drive_licencechange_date`, `cars_change_date`, `count_cars`, `familyname_change_date`, `telephone`, `email`) VALUES
(1, 1, '22.03.2014', 0, '22.01.1956', '﻿7400000000178208002', '21.03.2014', '1', '22.05.2015', '22.05.2013', '', 0, '22.01.2017', '79000000001', 'pochta1@mininform74.ru'),
(2, 2, '22.03.2015', 1, '22.01.1957', '﻿7400000010000116046', '21.03.2015', '1', '', '22.05.2013', '22.05.2013', 1, '', '79000000002', 'pochta2@mininform74.ru'),
(3, 3, '22.03.2016', 2, '22.01.1958', '﻿7440100010002734387', '21.03.2016', '0', '22.05.2015', '', '22.05.2014', 2, '22.05.2015', '79000000003', 'pochta4@mininform74.ru'),
(4, 4, '22.03.2017', 3, '22.01.1959', '﻿7400000010000001440', '21.03.2017', '1', '', '22.05.2015', '22.05.2015', 3, '', '79000000004', 'pochta3@mininform74.ru'),
(5, 5, '22.03.2018', 4, '22.01.1960', '﻿7400000010000001949', '21.03.2018', '0', '22.05.2015', '', '22.05.2016', 4, '', '79000000005', 'pochta5@mininform74.ru'),
(6, 6, '22.03.2019', 5, '22.01.1961', '7400000010000001170', '21.03.2019', '1', '', '22.05.2015', '22.05.2015', 5, '22.05.2014', '79000000006', 'pochta6@mininform74.ru'),
(7, 7, '22.03.2019', 5, '27.06.1961', '7400000010000001170', '21.03.2019', '1', '', '22.05.2015', '22.05.2015', 5, '22.05.2014', '79000000006', 'flightofdeath@mail.ru'),
(8, 8, '22.03.2019', 5, '27.07.1999', '7400000010000001170', '21.03.2019', '1', '', '22.05.2015', '22.05.2015', 5, '22.05.2014', '79000000006', 'flightofdeath@mail.ru'),
(9, 9, '17.112019', 7, '17.11.2000', '7400000000178208002', '17.112019', '1', '17.11.1998', '17.11.2003', '17.11.2014', 3, '17.11.2019', '79000000001', 'flightofdeath@mail.ru'),
(10, 10, '18.092019', 4, '18.09.1963', '7400000000178208002', '18.092019', '0', '18.09.2011', '18.09.2013', '18.09.2011', 0, '18.09.2019', '79000000001', 'flightofdeath@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `table_name` char(50) NOT NULL,
  `cell_name` char(50) NOT NULL,
  `day` smallint(4) NOT NULL,
  `year` tinyint(3) UNSIGNED DEFAULT NULL,
  `text_mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `templates`
--

INSERT INTO `templates` (`id`, `table_name`, `cell_name`, `day`, `year`, `text_mail`) VALUES
(1, 'data', 'birthdate', 0, NULL, 'С днём рождения, {name}!'),
(2, 'data', 'birthdate', -30, 20, 'Здравствуйте, {name}!\r\nЗакончивается срок действия вашего российского паспорта.'),
(3, 'data', 'birthdate', 1, 20, 'Здравствуйте, {name}!\r\nЗакончился срок действия вашего российского паспорта.'),
(4, 'data', 'birthdate', -30, 45, 'Здравствуйте, {name}!\r\nЗакончивается срок действия вашего российского паспорта.'),
(5, 'data', 'birthdate', 1, 45, 'Здравствуйте, {name}!\r\nЗакончился срок действия вашего российского паспорта.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
