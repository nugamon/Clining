-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2025 г., 10:33
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Clining`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Applications`
--

CREATE TABLE `Applications` (
  `Id` int NOT NULL,
  `Id_user` int NOT NULL,
  `Id_sevice` int NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Payment_type` varchar(25) NOT NULL,
  `Комментарий` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Applications`
--

INSERT INTO `Applications` (`Id`, `Id_user`, `Id_sevice`, `Address`, `Date`, `Time`, `Status`, `Payment_type`, `Комментарий`) VALUES
(1, 1, 2, 'Коломна, ул.Ленина, д.33, кв.52', '2025-03-26', '16:30:00', 'В работе', 'Карта', ''),
(2, 1, 1, 'Коломна, ул.Ленина, д.33, кв.52', '2025-03-26', '17:00:00', 'В работе', 'Карта', ''),
(3, 2, 1, 'Коломна, ул.Юбилейная, д.11, кв.88', '2025-03-28', '13:00:00', 'В работе', 'Наличные', ''),
(4, 6, 3, 'Коломна, ул.Гагарина, д.23, кв.77', '2025-03-10', '12:00:00', 'Готово', 'Наличные', ''),
(5, 5, 3, 'Коломна, ул.Зайцева, д.10', '2025-03-20', '16:30:00', 'Готово', 'Карта', ''),
(6, 4, 1, 'Коломна, ул.Спортивная, д.9', '2025-03-25', '14:30:00', 'В работе', 'Наличные', ''),
(7, 6, 3, 'Коломна, ул.Гагарина, д.23, кв.77', '2025-03-10', '12:00:00', 'Готово', 'Наличные', ''),
(8, 5, 3, 'Коломна, ул.Зайцева, д.10', '2025-03-20', '16:30:00', 'Готово', 'Карта', ''),
(9, 4, 1, 'Коломна, ул.Спортивная, д.9', '2025-03-25', '14:30:00', 'В работе', 'Наличные', ''),
(10, 3, 3, 'Коломна, ул.Кирпичная, д.12', '2025-03-18', '13:00:00', 'Отказ', 'Наличные', 'Не открыли дверь'),
(11, 2, 1, 'Коломна, ул.Юбилейная, д.11, кв.88', '2025-03-10', '14:30:00', 'Отказ', 'Наличные', 'Не было свободных уборщиков'),
(12, 3, 3, 'Коломна, ул.Кирпичная, д.12', '2025-03-18', '13:00:00', 'Отказ', 'Наличные', 'Не открыли дверь'),
(13, 2, 1, 'Коломна, ул.Юбилейная, д.11, кв.88', '2025-03-10', '14:30:00', 'Отказ', 'Наличные', 'Не было свободных уборщиков');

-- --------------------------------------------------------

--
-- Структура таблицы `Services`
--

CREATE TABLE `Services` (
  `Id` int NOT NULL,
  `Service_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Services`
--

INSERT INTO `Services` (`Id`, `Service_name`) VALUES
(1, 'Уборка пыли'),
(2, 'Мойка окон'),
(3, 'Вынос мусора');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `Id` int NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Phone`, `Email`, `Login`, `Password`) VALUES
(1, 'Иванов Илья Иванович', '89779328210', 'Ivanov.@mail.ru', 'Ivanilya123', 'Ivan2007'),
(2, 'Козлов Артём Михайлович', '89032773564', 'Kozel.svetlyi@yandex.ru', 'Kozlovich', 'Sahara12345'),
(3, 'Михайлов Даниил Андреевич', '89250243277', 'MixaDIN@yandex.ru', 'MixaDIN', 'MixaLICH2004'),
(4, 'Васильев Виктор Сергеевич', '89432238211', 'VVS.tol@mail.ru', 'VVSnik', 'VV0012KKls'),
(5, 'Зайцев Георгий Владимирович', '89992346655', 'Zaycev.net@yandex.ru', 'Zaycevzdes', 'ZaYc10kk99'),
(6, 'Мальков Семён Игоревич', '89432487624', 'Malek.korolek@yandex.ru', 'MaKoKo', 'M8lodec'),
(7, 'Ромашкин Дмитрий Сергеевич', '89177483898', 'Super1.man@mail.ru', 'admin', 'parol'),
(22, 'Гриша Супер Максбетов', '89167681889', 'ovo.kup@yandex.ru', 'kaka', 'makaka');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_sevice` (`Id_sevice`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Индексы таблицы `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Applications`
--
ALTER TABLE `Applications`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `Services`
--
ALTER TABLE `Services`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Applications`
--
ALTER TABLE `Applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`Id_sevice`) REFERENCES `Services` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `Users` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
