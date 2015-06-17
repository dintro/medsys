-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2015 г., 22:26
-- Версия сервера: 5.1.71-community-log
-- Версия PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blogyii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `blog_category`
--

INSERT INTO `blog_category` (`id`, `title`, `position`) VALUES
(1, 'Новости', 'top'),
(2, 'Блог (отзывы)', 'top');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `page_id` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `content`, `page_id`, `created`, `user_id`, `guest`, `status`) VALUES
(14, 'privet', 2, 1422460100, 5, NULL, 1),
(15, 'poka!', 2, 1422460114, 5, NULL, 1),
(17, 'valera', 2, 1422460134, 5, NULL, 1),
(19, '+100500', 2, 1422460154, 5, NULL, 1),
(21, 'qwe', 2, 1422460189, 5, NULL, 1),
(22, 'cool', 3, 1422542020, 5, NULL, 1),
(27, 'Awesome. Breaking & Entering is my favourite song by Tonight Alive.', 4, 1422635625, 5, NULL, 1),
(28, 'qweqwe', 5, 1422695809, 5, NULL, 1),
(29, 'my favourute EP by them', 3, 1422695913, 13, NULL, 1),
(30, 'azaza', 3, 1422710565, NULL, 'azaza', 1),
(31, '123', 2, 1422725809, 13, NULL, 1),
(32, 'very good!', 2, 1422973189, NULL, 'valerka88', 1),
(33, 'dadada', 2, 1422987770, 13, NULL, 1),
(34, 'ттх лалки', 2, 1423234152, NULL, 'димас', 1),
(35, 'список вполне осуществим!!!', 7, 1423849490, 5, NULL, 1),
(36, 'lalka', 5, 1423993389, 14, NULL, 1),
(37, '50% 1го пункта выполнил, просмотр профиля есть. Осталось редактирование профиля.', 7, 1424027664, 14, NULL, 1),
(38, 'пойдет)))', 3, 1424701136, 5, NULL, 1),
(39, 'FA Cup is ours this year!', 2, 1425300557, 21, NULL, 1),
(40, 'youyou youyou', 3, 1425418400, 5, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_deps`
--

CREATE TABLE IF NOT EXISTS `blog_deps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) DEFAULT NULL,
  `staff_cnt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `blog_deps`
--

INSERT INTO `blog_deps` (`id`, `department`, `staff_cnt`) VALUES
(1, 'Педиатрия', 7),
(2, 'Стоматология', 5),
(3, 'Хирургия', 10),
(4, 'Неврология', 11),
(5, 'Травматология', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_hospital`
--

CREATE TABLE IF NOT EXISTS `blog_hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `deps_id` int(11) DEFAULT NULL,
  `datein` date DEFAULT NULL,
  `dateout` date DEFAULT NULL,
  `ward_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `blog_hospital`
--

INSERT INTO `blog_hospital` (`id`, `user_id`, `deps_id`, `datein`, `dateout`, `ward_number`) VALUES
(6, 5, 3, '2015-04-18', '2015-04-30', 53),
(7, 5, 5, '2015-04-10', '2015-04-15', 47);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_mednotes`
--

CREATE TABLE IF NOT EXISTS `blog_mednotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `deps_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `meetdate` date DEFAULT NULL,
  `meettime` time DEFAULT NULL,
  `office_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Дамп данных таблицы `blog_mednotes`
--

INSERT INTO `blog_mednotes` (`id`, `user_id`, `deps_id`, `staff_id`, `meetdate`, `meettime`, `office_num`) VALUES
(69, 26, 1, 6, '2015-04-23', '11:35:00', 95),
(70, 5, 3, 5, '2015-04-23', '10:35:00', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_page`
--

CREATE TABLE IF NOT EXISTS `blog_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `blog_page`
--

INSERT INTO `blog_page` (`id`, `title`, `content`, `created`, `status`, `category_id`) VALUES
(2, 'Пробная новость', '<p>\r\n	<img alt="" height="162" src="/upload/userfiles/images/38d2691033c300a6297432c42f911dc9.jpg" width="169" /></p>\r\n<p>\r\n	Первая!!!</p>\r\n', 1421422363, 1, 1),
(4, 'Tonight Alive', '<p>\r\n	<img alt="" height="281" src="/upload/userfiles/images/bf061958b7c4641cbf4be779c717b640.jpg" width="500" /></p>\r\n<p>\r\n	<span style="color:#008080;">Jenna McDougall<br />\r\n	</span></p>\r\n', 1422635526, 1, 1),
(7, 'На ферваль', '<p>\r\n	<img alt="" height="230" src="/upload/userfiles/images/fb09b86e915adf5202ee55d21f1c13a9.jpg" width="230" /></p>\r\n<p>\r\n	1.Профиль (просмотр/редактирование)</p>\r\n<p>\r\n	2.Поиск</p>\r\n<p>\r\n	3.Теги (можно в приницпе сделать)</p>\r\n<p>\r\n	4. Функционал расписания работников (осн. функционал, скорее всего еще и на март)</p>\r\n', 1423849448, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_settings`
--

CREATE TABLE IF NOT EXISTS `blog_settings` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `defaultStatusComment` tinyint(1) DEFAULT NULL,
  `defaultStatusUser` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `blog_settings`
--

INSERT INTO `blog_settings` (`id`, `defaultStatusComment`, `defaultStatusUser`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_staff`
--

CREATE TABLE IF NOT EXISTS `blog_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `jobtitle` varchar(255) DEFAULT NULL,
  `expe` varchar(255) DEFAULT NULL,
  `deps_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `blog_staff`
--

INSERT INTO `blog_staff` (`id`, `firstname`, `fathername`, `lastname`, `birthday`, `jobtitle`, `expe`, `deps_id`, `email`) VALUES
(1, 'Игорь', 'Иванович', 'Петров', '1963-05-22', 'Старший врач', '20', 2, 'petrovii@mail.ru'),
(2, 'Иван', 'Петрович', 'Иванов', '1985-06-20', 'Доктор', '7', 3, 'ivaaaaan@mail.ru'),
(3, 'Петр', 'Олегович', 'Сидоров', '1970-04-16', 'Старший врач', '14', 1, 'petrosidor@gmail.com'),
(4, 'Леонид', 'Валерьевич', 'Костыль', '1960-08-17', 'Хирург-травматолог', '13', 5, 'kostyl60@mail.ru'),
(5, 'Валентин', 'Станиславович', 'Сурикат', '1970-04-08', 'Старший врач', '19', 3, 'valik_surikat70@mail.ru'),
(6, 'Станислав', 'Антонович', 'Валик', '1973-02-01', 'Старший врач', '34', 1, 'salik43@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_user`
--

CREATE TABLE IF NOT EXISTS `blog_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `ban` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `blog_user`
--

INSERT INTO `blog_user` (`id`, `username`, `password`, `created`, `ban`, `role`, `email`, `name`, `fname`, `lastname`, `birthdate`) VALUES
(5, 'admin', '61944f767576e88911457b6dce889a18', 1422041495, 1, 2, 'admin@admin.ru', 'Дмитрий', 'Евгеньевич', 'Черкасов', '2015-02-25'),
(23, 'arik', 'ad3691e042df485cc4d3c2f76d33d4d3', 1424173442, 0, 1, 'arik@mail.ru', 'Аристарх', 'Владиленович', 'Валеркин', '1992-02-29'),
(24, 'oleg', 'd2056b87e1f54cdba6a65e92eeafffc3', 1424860743, 0, 1, 'oleg@mail.ru', 'Олег', 'Викторович', 'Шматько', '2000-10-12'),
(25, 'lol', '716f0a4b47111ae5f032261e1b401fa4', 1425051103, 0, 1, 'lol@mail.ru', 'Лол', 'Лолович', 'Лолов', '1997-06-18'),
(26, 'zac', '8d1cc57d29ec87f3210e961919c2b571', 1425582611, 1, 1, 'zac123@mail.ru', 'Зак', 'Грекович', 'Галифианакис', '1973-02-15'),
(27, 'qweasd', '579f084ade4c6cb11d3b0f5d2b6b0396', 1425636871, 1, 1, 'qweasd@mail.ru', 'Иван', 'Валентинович', 'Додик', '1974-05-24'),
(29, 'lal', '3b677c8d8df6710cceefa0208bb455c8', 1428671625, 1, 1, 'lal@mail.ru', 'Лал', 'Лалович', 'Лалка', '1999-03-24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
