# Тестовое задание в RPT Company

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

## Решение по оптимизации:

1. Использовать индексы:
    ~~~
    CREATE INDEX idx_info_id ON link (info_id);
    CREATE INDEX idx_data_id ON link (data_id);
    CREATE INDEX idx_info_id ON info (id);
    CREATE INDEX idx_data_id ON data (id);
    ~~~

2. Переформулировка запроса 
    1. Использование `JOIN`
    2. Выбор конкретных столбцов, а не всех таблиц
    ~~~
    SELECT data.*, info.*, link.* FROM data
    INNER JOIN info ON link.info_id = info.id
    INNER JOIN link ON data.id = link.data_id;
    ~~~

3. Использовать InnoDB вместо MyISAM, так как она более современная и более безопасная для большого объема данных.