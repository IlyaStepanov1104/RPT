# [Тестовое задание в RPT Company](https://docs.google.com/document/d/11zvCpAEh0Fbjd_SIHzLqr4ImVhODnMbqujEtmeFI6YA/edit?pli=1)

## [Задача №1](/1)
Написать класс `init`, от которого нельзя сделать наследника, состоящий из 3 методов:
- `create()` - 
доступен только для методов класса
создает таблицу test, содержащую 5 полей
- `fill()` - доступен только для методов класса
заполняет таблицу случайными данными
- `get()` - доступен извне класса. Выбирает из таблицы `test`, данные по критерию: `result` среди значений `normal` и `success`

В конструкторе выполняются методы `create` и `fill`.

Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

## [Задача №2](/2)

Имеется 3 таблицы: `info`, `data`, `link`, есть запрос для получения данных: 

~~~
select * from data,link,info where link.info_id = info.id and link.data_id = data.id
~~~
Предложить варианты оптимизации:
- таблиц 
- запроса.

Запросы для создания таблиц:
~~~
CREATE TABLE `info` (
`id` int(11) NOT NULL auto_increment,
`name` varchar(255) default NULL,
`desc` text default NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
~~~
~~~
CREATE TABLE `data` (
`id` int(11) NOT NULL auto_increment,
`date` date default NULL,
`value` INT(11) default NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
~~~
~~~
CREATE TABLE `link` (
`data_id` int(11) NOT NULL,
`info_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
~~~

## [Задача №3](/3)
Создать скрипт, который в папке **[/datafiles](/3/datafiles)** найдет все файлы, 
имена которых состоят из цифр и букв латинского алфавита, имеют расширение `.ixt` и 
выведет на экран имена этих файлов, упорядоченных по имени.

Задание должно быть выполнено с использованием регулярных выражений.
Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

## [Задача №4](/4)

Cоздать 3 кнопки с названиями `1`, `2`, `3`, расположенные друг над другом.

Начальный вид:

![](/img/1.jpg)

Нажали на любую кнопку, меняется порядок на:

![](/img/2.jpg)

Нажали на любую кнопку, меняется порядок на:

![](/img/3.jpg)

Нажали на любую кнопку, меняется порядок на:

![](/img/1.jpg)

Код должен быть написан с использованием библиотеки jQuery.
