<?php

use Random\Randomizer;

/**
 * Класс для создания, заполнения и выборки из БД.
 * @const FILL_COUNT - количество записей, которые добавляет метод fill;
 * @const RESULTS - варианты значений столбца `results`;
 * @const ALLOWED_RESULTS -  результаты, попадающие в выборку;
 * @property $pdo - PDO соединение с БД.
 */
final class init
{
    const FILL_COUNT = 20;
    const RESULTS = ['normal', 'success', 'error'];
    const ALLOWED_RESULTS = ['normal', 'success'];
    private PDO $pdo;

    /**
     * Конструктор класса
     * @throws PDOException - Если неправильные параметры БД
     */
    function __construct()
    {
        include_once 'env.php';
        $this->create();
        $this->fill();
    }

    /**
     * Создает таблицу test, если ее не существует.
     * @return void
     * @throws PDOException - Если неправильные параметры БД
     */
    private function create(): void
    {
        $this->pdo = new PDO(
            sprintf('mysql:dbname=%s;host=%s', DB_NAME, DB_HOST),
            DB_LOGIN,
            DB_PASSWORD);
        $this->pdo->query('CREATE TABLE IF NOT EXISTS  `test` (`id` INT NOT NULL AUTO_INCREMENT , `test1` INT NOT NULL , `test2` INT NOT NULL , `test3` INT NOT NULL , `result` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');
    }

    /**
     * Заполняет таблицу test
     * @return void
     */
    private function fill(): void
    {
        $sql = $this->pdo->prepare('INSERT INTO test SET test1=?, test2=?, test3=?, result=?');
        for ($i = 0; $i < self::FILL_COUNT; $i++) {
            $sql->execute([
                rand(),
                rand(),
                rand(),
                self::RESULTS[array_rand(self::RESULTS)]
            ]);
        }
    }

    /**
     * Выбрать из таблицы test строки, где results принадлежит константе ALLOWED_RESULTS
     * @return array
     */
    public function get():array
    {
        $inValues = implode(',', array_fill(0, count(self::ALLOWED_RESULTS), '?'));
        $sql = $this->pdo->prepare("SELECT * FROM test WHERE result IN ($inValues)");
        $sql->execute(self::ALLOWED_RESULTS);
        return $sql->fetchAll();
    }
}