-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 15 2018 г., 21:06
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpexam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int(11) NOT NULL,
  `tov` text NOT NULL,
  `cena` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `tov`, `cena`, `opis`, `img`) VALUES
(14, 'Джинсовая куртка', '10000000', 'Джинсовая куртка самого Хренова Максима Дмитриевича', '15154236353l2CvQYYgBc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cena` int(11) NOT NULL,
  `fio` text NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `name`, `cena`, `fio`, `phone`, `mail`) VALUES
(1, 'Джинсовая куртка', 10000000, 'ппукппу', 98746454, 'укпукпукпукп'),
(2, 'Джинсовая куртка', 10000000, 'пмыапмыа', 3453545, 'ыпыап'),
(3, 'Джинсовая куртка', 10000000, 'пмыапмыа', 3453545, 'ыпыап'),
(4, 'Джинсовая куртка', 10000000, 'ыфасфв', 24245, 'ваприрртап'),
(5, 'Джинсовая куртка', 10000000, 'ыфасфв', 24245, 'ваприрртап'),
(6, 'Джинсовая куртка', 10000000, 'укненекн', 345345, 'уепнеу'),
(7, 'Джинсовая куртка', 10000000, 'еперкер', 345365, 'кркерк'),
(8, 'Джинсовая куртка', 10000000, 'еперкер', 345365, 'кркерк');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
