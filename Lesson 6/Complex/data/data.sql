-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 26 2019 г., 14:49
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `message`) VALUES
(1, 'Вася', 'Первый отзыв'),
(3, 'Федя', 'второй отзыв');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`, `image`) VALUES
(2, 'Товар 1', 'Описание товара 1', '100.50', '01.jpg'),
(3, 'Товар 2', 'Описание товара 2', '200.50', '02.jpg'),
(4, 'Товар 3', 'Описание товара 3', '300.50', '03.jpg'),
(5, 'Товар 4', 'Описание товара 4', '400.50', '04.jpg'),
(6, 'Товар 5', 'Описание товара 5', '500.50', '05.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `filename`, `likes`) VALUES
(1, '01.jpg', 0),
(2, '02.jpg', 0),
(3, '03.jpg', 0),
(4, '04.jpg', 0),
(5, '05.jpg', 0),
(6, '06.jpg', 0),
(7, '07.jpg', 0),
(8, '08.jpg', 0),
(9, '09.jpg', 0),
(10, '10.jpg', 0),
(11, '11.jpg', 0),
(12, '12.jpg', 0),
(13, '13.jpg', 0),
(14, '14.jpg', 0),
(15, '15.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `prev` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `prev`, `text`) VALUES
(1, 'Алексей Леонов: космонавт, без которого не было бы МКС', 'МОСКВА, 11 окт — РИА Новости, Альфия Еникеева. В пятницу на 86-м году в Москве скончался космонавт Алексей Леонов — первый, вышедший в открытый космос, и первый, совершивший стыковку пилотируемых космических кораблей с несовместимыми системами жизнеобеспечения. РИА Новости рассказывает о человеке, прославившем советскую космонавтику.', 'МОСКВА, 11 окт — РИА Новости, Альфия Еникеева. В пятницу на 86-м году в Москве скончался космонавт Алексей Леонов — первый, вышедший в открытый космос, и первый, совершивший стыковку пилотируемых космических кораблей с несовместимыми системами жизнеобеспечения. РИА Новости рассказывает о человеке, прославившем советскую космонавтику.\r\nКак Леонов чуть не погиб в космосе\r\nРовно в 10:00 по московскому времени 18 марта 1965 года с космодрома Байконур стартовала ракета-носитель с экипажем корабля \"Восход-2\". Командиром был Павел Беляев, вторым пилотом — Алексей Леонов, и именно ему через полтора часа предстояло стать первым человеком, вышедшим в открытый космос.\r\nПуть в открытое безвоздушное пространство начинался в специальной шлюзовой камере (кодовое название \"Волга\"), которая соединялась с кабиной корабля люком с герметизирующей крышкой. Второй люк находился в верхней части камеры. Открыв его в 11:32, Алексей Леонов вышел из шлюзовой камеры в открытый космос. С кораблем его связывал пятиметровый фал из стального троса и электрических проводов. По ним на борт поступали медицинские и технические данные. Также был провод телефонной связи между космонавтами.\r\nПробыв в открытом космосе 12 минут девять секунд, Леонов успел провести несколько научных экспериментов. Он пять раз отдалялся от корабля на разные расстояния. При этом внешняя часть скафандра нагревалась на солнце до 60 градусов Цельсия и охлаждалась в тени до минус ста. Но внутри поддерживалась комнатная температура и избыточное давление, обеспечивающее нормальную жизнедеятельность космонавта.'),
(2, 'Акции \"Яндекса\" обвалились более чем на 20%', 'МОСКВА, 11 окт — РИА Новости. Акции \"Яндекса\" в ходе пятничных торгов на Московской бирже обваливались на 20,3 процента — до 1855 рублей, обновив минимум с декабря 2018 года.', 'Объем торгов бумагами \"Яндекса\" побил исторический рекорд для этой компании на Московской бирже, составив почти 8,5 миллиарда рублей.\r\nНа американской фондовой бирже NASDAQ акции \"Яндекса\" падают примерно на 16,4 процента.\r\nНа падение акций компании могла повлиять новость об утечке данных клиентов системы \"Яндекс.Деньги\", считает аналитик компании \"Фридом Финанс\" Евгений Миронюк.\r\nОн добавил, что игроки также могли таким образом отреагировать на готовящийся законопроект о значимых ресурсах, ограничивающий двадцатью процентами долю иностранного участия в компании. Как отметил Миронюк, нарушителю могут запретить размещение рекламы, что является основной статьей дохода для \"Яндекса\". Аналитик посоветовал дождаться конкретики о внесенных в законопроект поправках.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
