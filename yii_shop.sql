-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 01 2016 г., 10:35
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(255) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'category1'),
(2, 'category 2'),
(3, 'category 3');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(255) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(50) NOT NULL,
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `product_id`) VALUES
(1, '_KsH0cw99qs.jpg', 2),
(2, 'ikOxxOW03RY.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_name`) VALUES
(1, 'product 1'),
(2, 'product 2');

-- --------------------------------------------------------

--
-- Структура таблицы `prod_cat`
--

CREATE TABLE IF NOT EXISTS `prod_cat` (
  `prod_cat_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  PRIMARY KEY (`prod_cat_id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `prod_cat`
--

INSERT INTO `prod_cat` (`prod_cat_id`, `product_id`, `category_id`) VALUES
(1, 2, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_category_id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`) VALUES
(1, 1, 'sub category 1'),
(2, 2, 'sub category 2'),
(3, 3, 'sub category 3');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `prod_cat`
--
ALTER TABLE `prod_cat`
  ADD CONSTRAINT `prod_cat_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `prod_cat_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
