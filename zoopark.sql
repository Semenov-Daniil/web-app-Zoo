-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 14 2023 г., 09:19
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zoopark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accommodation`
--

CREATE TABLE `accommodation` (
  `id` int UNSIGNED NOT NULL,
  `kinds_id` int UNSIGNED NOT NULL,
  `premises_id` int UNSIGNED NOT NULL,
  `count_animals` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `accommodation`
--

INSERT INTO `accommodation` (`id`, `kinds_id`, `premises_id`, `count_animals`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 7),
(3, 3, 4, 2),
(4, 3, 5, 2),
(5, 4, 6, 6),
(6, 5, 6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `kinds`
--

CREATE TABLE `kinds` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `family` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `continent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `count_feed` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `kinds`
--

INSERT INTO `kinds` (`id`, `title`, `family`, `continent`, `count_feed`) VALUES
(1, 'Толстохвостый лемур', 'Карликовые лемуры', 'Африка', 250),
(2, 'Сероспинный лемур', 'Лепилемуры', 'Африка', 250),
(3, 'Карликовый гиппопотам', 'Бегемотовых', 'Африка', 2000),
(4, 'Африканская лисица', 'псовые', 'Африка', 500),
(5, 'Чепрачный шакал', 'псовые', 'Африка', 600);

-- --------------------------------------------------------

--
-- Структура таблицы `premises`
--

CREATE TABLE `premises` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `number` int UNSIGNED NOT NULL,
  `is_pond` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `is_heating` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `premises`
--

INSERT INTO `premises` (`id`, `title`, `number`, `is_pond`, `is_heating`) VALUES
(1, 'приматы', 21, 0, 0),
(4, 'бегемоты1', 3, 0, 0),
(5, 'бегемоты2', 5, 0, 0),
(6, 'псы', 55, 0, 1),
(7, 'бегемоты2', 77, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `email`, `phone`, `login`, `password`, `token`) VALUES
(1, 'Даниил', 'Даниил', NULL, 'daniil@gmail.com', '89817406942', 'Даниил', '$2y$13$hWKuO2Ckwm/eq2xvqQS3vuDOrM9cL4B6VdqD4OWYrnzMjiMLVObSq', 'TmL4nE6frFKSGNmq2SZlAaObEsPkfhmw'),
(2, 'Даниил', 'Даниил', NULL, 'daniil@gmail.com', '89817406942', 'Даниил2', '$2y$13$o.ON84uPlvEUtGXhJE2RM.HzmUrJ/.BfHobXQoT4sBkvi3FLWFFWS', '1bXA7fi-g2rkeL1laXBnNVBTXHoDuYUN'),
(3, 'Даниил', 'Даниил', NULL, 'daniil@gmail.com', '89817406942', 'Daniil', '$2y$13$UcGnvAqkJPt8AKY/a8y2peRDoS6W7AN04D04qIc84xbiYtSK24ZVm', 'oyZIFVKj5eSFrArQ3gWzS8o72cx5qJuy'),
(4, 'Даниил', 'Даниил', NULL, 'daniil@gmail.com', '89817406942', 'Даниил22', '$2y$13$xtgDo3gyAIkpTOqee3wCA.V.mijzC2iGU/5U28Pkno3PqzaG/mgOS', 'BWQp1hptO8nsAqgunzTdWPcjvpYZRHYG');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kinds_id` (`kinds_id`),
  ADD KEY `premises_id` (`premises_id`);

--
-- Индексы таблицы `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `premises`
--
ALTER TABLE `premises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `premises`
--
ALTER TABLE `premises`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`kinds_id`) REFERENCES `kinds` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `accommodation_ibfk_2` FOREIGN KEY (`premises_id`) REFERENCES `premises` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
