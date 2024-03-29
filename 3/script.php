<?php
/**
 * Константа с путем для поиска
 */
const DIR_PATH = 'datafiles/';

/**
 * Сканируем все файлы директории и сохраняем их в массив в отсортированном порядке
 */
$files = scandir(DIR_PATH);

/**
 * Просматриваем все файлы:
 * Если подходит, то выводим (тк они уже в лексикографическом порядке)
 */
foreach ($files as $key => $file) {
    if (preg_match('/^[a-zA-Z0-9]*\.ixt$/', $file)) {
        echo $file . PHP_EOL;
    }
}
