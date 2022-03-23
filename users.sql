-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 21 2021 г., 12:04
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `pass`) VALUES
(7, 'Владимир', 'vadmak@mail.com', '$2y$10$KwGjYhvLuXMv9UvWIeHE7.dWnvBJUQNJJAYKpTNSb5X4Q4AIteqr2'),
(9, 'Алиса', 'lisa@gmail.com', '$2y$10$tWARtGm0zGlIxr8NwA1m/euhWy9Q2Yl3cI1tGtSYpjYOrt6J8yFge'),
(11, 'Ирина', 'ermilova.irina2000@gmail.com', '$2y$10$/HA3TJJnWVzE5kBb57j4UObKODsuWJ5kTv0KFzCBrOexCjYzpxQg.'),
(18, 'Алексей', 'alex@mail.ru', '$2y$10$CiWuIsmqeSKHjbLvJ3cAGeO1NNT64CakNiP.w1Ht/d5Am6StRv3gu');

-- --------------------------------------------------------

--
-- Структура таблицы `users_info`
--

CREATE TABLE `users_info` (
  `id` int(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` enum('Женский','Мужской') NOT NULL,
  `email` varchar(30) NOT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `branch_city` enum('Самара','Ульяновск','Казань') NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_info`
--

INSERT INTO `users_info` (`id`, `first_name`, `name`, `last_name`, `gender`, `email`, `experience`, `branch_city`, `file_name`, `file_path`, `info`) VALUES
(1, 'Ермилова', 'Ирина', 'Анатольевна', 'Женский', 'ermilova.irina2000@gmail.com', 'PHP HTML CSS', 'Ульяновск', 'Резюме.docx', '60f6b93d5d0492.53913028.docx', ''),
(2, 'Макеев', 'Владимир', 'Антонович', 'Мужской', 'vadmak@mail.com', 'HTML CSS', 'Самара', 'Резюме.docx', '60f6b96b1a0798.34915589.docx', 'I\'m not Vladimir actually.'),
(3, 'Любимова', 'Елена', 'Дмитриевна', 'Женский', 'luda@mail.ru', '', 'Ульяновск', '', NULL, ''),
(4, 'Красов', 'Павел', 'Николаевич', 'Мужской', 'krasarusi@gmail.com', 'PHP HTML', 'Казань', 'Резюме.docx', '60f6b8d68a3699.68547128.docx', ''),
(5, 'Карпов', 'Константин', 'Кириллович', 'Мужской', 'kirill@mail.ru', '', 'Ульяновск', '', NULL, ''),
(6, 'Люмов', 'Антон', 'Антонович', 'Мужской', 'antoha@mail.ru', '', 'Ульяновск', '', NULL, ''),
(7, 'Сторина', 'Алина', 'Аркадьевна', 'Женский', 'malina@gmail.com', 'PHP HTML', 'Самара', '', NULL, ''),
(11, 'Инев', 'Алексей', 'Сергеевич', 'Мужской', 'inei@mail.ru', 'HTML CSS', 'Казань', 'Резюме.docx', '60f6b995b75d09.06963682.docx', ''),
(13, 'Лискова', 'Алиса', 'Дмитриевна', 'Женский', 'lisa2000@gmail.com', '', 'Самара', '', NULL, ''),
(18, 'Шилкова', 'Ксения', 'Алексеевна', 'Женский', 'ksenia@mail.ru', 'HTML CSS', 'Самара', 'Резюме.docx', '60f6b87920e798.13555684.docx', ''),
(33, 'Живина', 'Ульяна', 'Константиновна', 'Женский', 'lol@gmail.com', 'PHP HTML CSS', 'Ульяновск', 'Резюме.docx', '60f8018b5880a5.81680748.docx', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
